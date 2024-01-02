<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model(['Users_model', 'Kategori_wisata_model', 'Wisata_model']);
    }
    public function index()
    {
        $this->breadcrumbs->push('Home', 'Admin/Home');
        // output
        $data['title'] = 'Dashboard';
        $data['breadcrumb'] = $this->breadcrumbs->show();
        $data['admin'] = $this->Users_model->joinProfile(null, null, 'admin', null)->num_rows();
        $data['superadmin'] = $this->Users_model->joinProfile(null, null, 'super admin', null)->num_rows();
        $data['kategori_wisata'] = $this->Kategori_wisata_model->get()->num_rows();
        $data['wisata'] = $this->Wisata_model->get()->num_rows();
        $this->template->admin('admin/home/main', $data);
    }
}
