<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Log extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Log_model']);
        check_not_login();
        $profile = check_profile();
        if ($profile->level != 'super admin') {
            show_404();
        }
    }
    public function index()
    { // add breadcrumbs
        $this->breadcrumbs->push('Home', 'Admin/Home');
        $this->breadcrumbs->push('Log', 'Admin/Log');
        // output
        $data['title'] = 'Management Log';
        $data['breadcrumb'] = $this->breadcrumbs->show();
        $id_login = $this->session->userdata('id_login');
        $data['result'] = $this->Log_model->get()->result();
        // add breadcrumbs
        $this->template->admin('admin/log/main', $data);
    }



    public function delete()
    {
        $id_log = htmlspecialchars_decode($this->input->post('id_log', true));
        $delete = $this->Log_model->delete($id_log);
        if ($delete) {
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
