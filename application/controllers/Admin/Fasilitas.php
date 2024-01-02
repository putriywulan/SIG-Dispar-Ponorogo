<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fasilitas extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Fasilitas_model']);
        check_not_login();
        $profile = check_profile();
        if ($profile->level != 'admin') {
            show_404();
        }
    }
    public function index()
    { // add breadcrumbs
        $this->breadcrumbs->push('Home', 'Admin/Home');
        $this->breadcrumbs->push('Fasilitas', 'Admin/Fasilitas');
        // output
        $data['title'] = 'Management Fasilitas';
        $data['breadcrumb'] = $this->breadcrumbs->show();
        $data['result'] = $this->Fasilitas_model->get()->result();
        $obj = new stdClass();
        $obj->id_fasilitas = null;
        $obj->nama_fasilitas = null;

        $data['modal'] = $obj;
        $data['page'] = 'add';
        $this->template->admin('admin/fasilitas/main', $data);
    }
    public function add()
    {

        // add breadcrumbs
        $this->breadcrumbs->push('Home', 'Admin/Home');
        $this->breadcrumbs->push('Fasilitas', 'Admin/Fasilitas');
        $this->breadcrumbs->push('Form Data', 'Admin/Fasilitas/add');
        // output
        $data['title'] = 'Form Fasilitas';
        $data['breadcrumb'] = $this->breadcrumbs->show();
        // add breadcrumbs
        $obj = new stdClass();
        $obj->id_fasilitas = null;
        $obj->nama_fasilitas = null;

        $data['row'] = $obj;
        $data['page'] = 'add';
        $this->template->admin('admin/fasilitas/form_data', $data);
    }
    public function process()
    {
        $this->form_validation->set_rules('nama_fasilitas', 'Nama Fasilitas', 'required|callback_unique_name');
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
                $data_Fasilitas = [
                    'nama_fasilitas' => htmlspecialchars($this->input->post('nama_fasilitas', true)),
                ];
                $insert_Fasilitas = $this->Fasilitas_model->insert($data_Fasilitas);
                if ($insert_Fasilitas > 0) {
                    checkLog('Menambahkan data fasilitas dengan id = ' . $insert_Fasilitas);
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
                $id = htmlspecialchars($this->input->post('id_fasilitas', true));
                $data = [
                    'status' => 'error',
                    'output' => $this->form_validation->error_array()
                ];
                echo json_encode($data);
            } else {
                $id = htmlspecialchars($this->input->post('id_fasilitas', true));

                $data_Fasilitas = [
                    'nama_fasilitas' => htmlspecialchars($this->input->post('nama_fasilitas', true)),
                ];
                $update_Fasilitas = $this->Fasilitas_model->update($data_Fasilitas, $id);

                if ($update_Fasilitas > 0) {
                    checkLog('Mengubah data fasilitas dengan id = ' . $id);
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
        $get = $this->Fasilitas_model->get($id)->row();

        $data = [
            'row' => $get,
        ];
        echo json_encode($data);
    }

    public function delete()
    {
        $id_fasilitas = htmlspecialchars($this->input->post('id_fasilitas', true));
        $delete = $this->Fasilitas_model->delete($id_fasilitas);
        if ($delete) {
            checkLog('Menghapus data fasilitas dengan id = ' . $id_fasilitas);
            $data = [
                'status' => "success",
                'msg' => 'Success hapus data'
            ];
            echo json_encode($data);
        } else {
            $data = [
                'status' => "error",
                'msg' => 'Gagal hapus data'
            ];
            echo json_encode($data);
        }
    }
    public function unique_name()
    {
        if (($_POST['page']) == 'add') {
            $nama_fasilitas = htmlspecialchars($this->input->post('nama_fasilitas', true));
            $get = $this->db->get_where('fasilitas', ['nama_fasilitas' => $nama_fasilitas]);
            if ($get->num_rows() > 0) {
                $this->form_validation->set_message('unique_name', '{field} sudah digunakan pada fasilitas lain');
                return FALSE;
            }
        } else if (($_POST['page']) == 'edit') {
            $id = htmlspecialchars($this->input->post('id_fasilitas', true));
            $nama_fasilitas = htmlspecialchars($this->input->post('nama_fasilitas', true));
            $get = $this->db->get_where('fasilitas', ['id_fasilitas <>' => $id, 'nama_fasilitas' => $nama_fasilitas]);
            if ($get->num_rows() > 0) {
                $this->form_validation->set_message('unique_name', '{field} sudah digunakan pada fasilitas lain');
                return FALSE;
            }
        }
        return TRUE;
    }
}
