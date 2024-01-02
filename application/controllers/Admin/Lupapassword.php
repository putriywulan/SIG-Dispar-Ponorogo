<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lupapassword extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model(['Users_model']);
		check_not_login();
		$profile = check_profile();
		if ($profile->level != 'admin') {
			show_404();
		}
	}
	public function index()
	{ // add breadcrumbs
		$this->breadcrumbs->push('Home', 'Admin/Home');
		$this->breadcrumbs->push('Lupapassword', 'Admin/Lupapassword');
		// output
		$data['title'] = 'Management Lupa password';
		$data['breadcrumb'] = $this->breadcrumbs->show();
		$data['result'] = $this->Users_model->joinProfile(null, null, null, 'iya')->result();
		// add breadcrumbs
		$this->template->admin('admin/lupapassword/main', $data);
	}

	public function process()
	{
		$id_users = htmlspecialchars($this->input->post('id_users', true));
		$users = check_users($id_users);
		$password = $users->username;

		$data_Lupapassword = [
			'forgot' => 'tidak',
			'password' => md5($password),
		];
		$update_Lupapassword = $this->Users_model->update_users($data_Lupapassword, $id_users);
		if ($update_Lupapassword > 0) {
			checkLog('Mereset password users dengan id = ' . $id_users);
			$data = [
				'status' => "success",
				'msg' => 'Sucess mengubah password'
			];
			echo json_encode($data);
		} else {
			$data = [
				'status' => "error",
				'msg' => 'Gagal mengubah password'
			];
			echo json_encode($data);
		}
	}
}
