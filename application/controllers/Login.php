<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Users_model', 'Log_model']);
    }
    public function index()
    {
        check_already_login();
        $data['title'] = 'Login Session';
        $url = null;
        if (isset($_GET['url'])) {
            $url = $_GET['url'];
        }
        $data['url'] = $url;
        $this->template->login('login', $data);
    }
    public function process()
    {
        check_already_login();
        $this->form_validation->set_rules('username', 'Username', 'trim|alpha_numeric_spaces|required');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|trim|alpha_numeric_spaces');
        $this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');
        if ($this->form_validation->run() == false) {
            return $this->index();
        } else {
            $url = $this->input->post('url', true);
            $username = htmlspecialchars($this->input->post('username', true));
            $password = htmlspecialchars($this->input->post('password', true));
            $remember = htmlspecialchars($this->input->post('remember', true));
            $model = $this->Users_model->login($username, $password);
            if ($model->num_rows() > 0) {
                $row = $model->row();
                if ($remember != null) {
                    $key = hash('sha256', $row->username);
                    $this->db->update('users', ['cookie' => $key], ['id_users' => $row->id_users]);
                    set_cookie('cookie', $key, 60 * 60 * 24);
                }
                $this->session->set_userdata([
                    'id_users' => $row->id_users,
                ]);
                checkLog('Login users');
                $this->session->set_flashdata('success', 'Selamat login! ' . $row->nama_users);
                if ($url != null) {
                    return redirect($url);
                } else {
                    return redirect(base_url('Login'));
                }
            } else {
                $this->session->set_flashdata('error', 'Username atau password salah');
                return redirect('/Login');
            }
        }
    }
    public function logout()
    {
        checkLog('Logout users');
        $this->session->sess_destroy();
        delete_cookie('cookie');
        return redirect(base_url('Login'));
    }
}
