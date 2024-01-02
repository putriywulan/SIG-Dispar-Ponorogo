<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AuthSession extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function logout()
    {
        $auth = new Auth();
        $google_client = $auth->connect();
        $google_client->revokeToken();
        $this->session->sess_destroy();
        return redirect(base_url('/'));
    }
}
