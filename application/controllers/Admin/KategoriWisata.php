<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KategoriWisata extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Kategori_wisata_model', 'Icon_model']);
        check_not_login();
        $profile = check_profile();
        if ($profile->level != 'admin') {
            show_404();
        }
    }
    public function index()
    { // add breadcrumbs
        $this->breadcrumbs->push('Home', 'Admin/Home');
        $this->breadcrumbs->push('Kategori Wisata', 'Admin/KategoriWisata');
        // output
        $data['title'] = 'Management Kategori Wisata';
        $data['breadcrumb'] = $this->breadcrumbs->show();
        $data['result'] = $this->Kategori_wisata_model->get()->result();
        // add breadcrumbs

        $obj = new stdClass();
        $obj->id_kategori_wisata = null;
        $obj->nama_kategori_wisata = null;
        $obj->icon_id = null;
        $obj->deskripsi = null;
        $data['modal'] = $obj;
        $data['page'] = 'add';
        $data['icon'] = $this->Icon_model->get()->result();
        $this->template->admin('admin/kategoriwisata/main', $data);
    }
    public function add()
    {

        // add breadcrumbs
        $this->breadcrumbs->push('Home', 'Admin/Home');
        $this->breadcrumbs->push('Kategori Wisata', 'Admin/KategoriWisata');
        $this->breadcrumbs->push('Form Data', 'Admin/KategoriWisata/add');
        // output
        $data['title'] = 'Form KategoriWisata';
        $data['breadcrumb'] = $this->breadcrumbs->show();
        // add breadcrumbs
        $obj = new stdClass();
        $obj->id_kategori_wisata = null;
        $obj->nama_kategori_wisata = null;
        $obj->icon_id = null;
        $obj->deskripsi = null;

        $data['row'] = $obj;
        $data['page'] = 'add';
        $data['icon'] = $this->Icon_model->get()->result();
        $this->template->admin('admin/kategoriwisata/form_data', $data);
    }
    public function process()
    {
        $this->form_validation->set_rules('nama_kategori_wisata', 'Nama Kategori Wisata', 'required');
        $this->form_validation->set_rules('icon_id', 'Icon', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
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
                $id_users = $this->session->userdata('id_users');
                $data_KategoriWisata = [
                    'icon_id' => htmlspecialchars($this->input->post('icon_id', true)),
                    'nama_kategori_wisata' => htmlspecialchars($this->input->post('nama_kategori_wisata', true)),
                    'deskripsi' => htmlspecialchars($this->input->post('deskripsi', true)),
                    'users_id' => $id_users
                ];
                $insert_KategoriWisata = $this->Kategori_wisata_model->insert($data_KategoriWisata);

                if ($insert_KategoriWisata > 0) {
                    checkLog('Menambahkan data kategori wisata dengan id = ' . $insert_KategoriWisata);
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
                $id = htmlspecialchars($this->input->post('id_kategori_wisata', true));
                $data = [
                    'status' => 'error',
                    'output' => $this->form_validation->error_array()
                ];
                echo json_encode($data);
            } else {
                $id = htmlspecialchars($this->input->post('id_kategori_wisata', true));
                $id_users = $this->session->userdata('id_users');
                $data_KategoriWisata = [
                    'icon_id' => htmlspecialchars($this->input->post('icon_id', true)),
                    'nama_kategori_wisata' => htmlspecialchars($this->input->post('nama_kategori_wisata', true)),
                    'deskripsi' => htmlspecialchars($this->input->post('deskripsi', true)),
                    'users_id' => $id_users
                ];
                $update_KategoriWisata = $this->Kategori_wisata_model->update($data_KategoriWisata, $id);

                if ($update_KategoriWisata > 0) {
                    checkLog('Mengubah data kategori wisata dengan id = ' . $id);
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

        $get = $this->Kategori_wisata_model->get($id)->row();
        $data = [
            'row' => $get,
        ];
        echo json_encode($data);
    }

    public function delete()
    {
        $id_kategori_wisata = htmlspecialchars($this->input->post('id_kategori_wisata', true));
        $delete = $this->Kategori_wisata_model->delete($id_kategori_wisata);
        if ($delete) {
            checkLog('Menghapus data kategori wisata dengan id = ' . $id_kategori_wisata);
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
