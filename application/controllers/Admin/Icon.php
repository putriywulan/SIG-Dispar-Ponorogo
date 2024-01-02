<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Icon extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Icon_model']);
        check_not_login();
        $profile = check_profile();
        if ($profile->level != 'admin') {
            show_404();
        }
    }
    public function index()
    { // add breadcrumbs
        $this->breadcrumbs->push('Home', 'Admin/Home');
        $this->breadcrumbs->push('Icon', 'Admin/Icon');
        // output
        $data['title'] = 'Management Icon';
        $data['breadcrumb'] = $this->breadcrumbs->show();
        $data['result'] = $this->Icon_model->get()->result();

        $obj = new stdClass();
        $obj->id_icon = null;
        $obj->icon = null;

        $data['modal'] = $obj;
        $data['page'] = 'add';


        $this->template->admin('admin/icon/main', $data);
    }
    public function add()
    {

        // add breadcrumbs
        $this->breadcrumbs->push('Home', 'Admin/Home');
        $this->breadcrumbs->push('Icon', 'Admin/Icon');
        $this->breadcrumbs->push('Form Data', 'Admin/Icon/add');
        // output
        $data['title'] = 'Form Icon';
        $data['breadcrumb'] = $this->breadcrumbs->show();
        // add breadcrumbs

        $obj = new stdClass();
        $obj->id_icon = null;
        $obj->icon = null;

        $data['row'] = $obj;
        $data['page'] = 'add';
        $this->template->admin('admin/icon/form_data', $data);
    }
    public function process()
    {

        $this->form_validation->set_rules('icon', 'Icon', 'required');
        $this->form_validation->set_message('required', '{field} Wajib diisi');
        $this->form_validation->set_error_delimiters('<small class="text-danger">', '</small><br>');
        if (($_POST['page']) == 'add') {
            if ($this->form_validation->run() == false) {
                $data = [
                    'status' => 'error',
                    'output' => $this->form_validation->error_array()
                ];
                echo json_encode($data);
            } else {
                $data_Icon = [
                    'icon' => htmlspecialchars($this->input->post('icon', true)),
                ];
                $insert_Icon = $this->Icon_model->insert($data_Icon);
                if ($insert_Icon > 0) {
                    checkLog('Menambahkan data icon dengan id = ' . $insert_Icon);
                    $data = [
                        'status' => 'success',
                        'output' => 'Berhasil menambah data'
                    ];
                    echo json_encode($data);
                } else {
                    $data = [
                        'status_error' => 'error',
                        'output' => 'Gagal menambah data'
                    ];
                    echo json_encode($data);
                }
            }
        } else if (($_POST['page']) == 'edit') {
            if ($this->form_validation->run() == false) {
                $id = htmlspecialchars($this->input->post('id_icon', true));
                $data = [
                    'status' => 'error',
                    'output' => $this->form_validation->error_array()
                ];
                echo json_encode($data);
            } else {
                $id = htmlspecialchars($this->input->post('id_icon', true));
                $data_Icon = [
                    'icon' => htmlspecialchars($this->input->post('icon', true)),
                ];
                $update_Icon = $this->Icon_model->update($data_Icon, $id);

                if ($update_Icon > 0) {
                    checkLog('Mengubah data icon dengan id = ' . $id);
                    $data = [
                        'status' => 'success',
                        'output' => 'Berhasil mengubah data'
                    ];
                    echo json_encode($data);
                } else {
                    $data = [
                        'status_error' => 'error',
                        'output' => 'Gagal mengubah data'
                    ];
                    echo json_encode($data);
                }
            }
        }
    }
    public function edit($id)
    {
        $get = $this->Icon_model->get($id)->row();
        $data = [
            'row' => $get,
        ];
        echo json_encode($data);
    }

    public function delete()
    {
        $id_icon = htmlspecialchars($this->input->post('id_icon', true));
        $delete = $this->Icon_model->delete($id_icon);
        if ($delete) {
            checkLog('Menghapus data icon dengan id = ' . $id_icon);
            $data = [
                'status' => "success",
                'msg' => 'Success hapus data'
            ];
            echo json_encode($data);
        } else {
            $data = [
                'status' => "error",
                'msg' => 'Error hapus data'
            ];
            echo json_encode($data);
        }
    }
}
