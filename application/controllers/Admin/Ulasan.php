<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ulasan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model(['Ulasan_model', 'Rating_model']);
		check_not_login();
		$profile = check_profile();
		if ($profile->level != 'admin') {
			show_404();
		}
	}
	public function index()
	{ // add breadcrumbs
		$this->breadcrumbs->push('Home', 'Admin/Home');
		$this->breadcrumbs->push('Ulasan', 'Admin/Ulasan');
		// output
		$data['title'] = 'Review / Ulasan';
		$data['breadcrumb'] = $this->breadcrumbs->show();
		$data['ulasan'] = $this->Ulasan_model->get()->result();
		$data['rating'] = $this->Rating_model->get()->result();
		// add breadcrumbs
		$this->template->admin('admin/ulasan/main', $data);
	}
	public function delete()
	{
		$id_ulasan = $this->input->post('id_ulasan', true);
		$ulasan = $this->Ulasan_model->get($id_ulasan)->row();
		$email = $ulasan->email;
		$wisata_id = $ulasan->wisata_id;

		$rowUlasan = $this->db->get_where('ulasan', ['wisata_id' => $wisata_id, 'email' => $email])->num_rows();
		if ($rowUlasan == 1) {
			$ratingRow = $this->db->get_where('rating', ['wisata_id' => $wisata_id, 'email' => $email])->row();
			$deleteRating = $this->Rating_model->delete($ratingRow->id_rating);
		}
		$deleteUlasan = $this->Ulasan_model->delete($id_ulasan);
		if ($deleteUlasan > 0) {
			checkLog('Menghapus ulasan dengan id = ' . $id_ulasan);
			$data = [
				'status' => "success",
				'msg' => 'Sucess menghapus data'
			];
			echo json_encode($data);
		} else {
			$data = [
				'status' => "error",
				'msg' => 'Gagal menghapus data'
			];
			echo json_encode($data);
		}
	}
}
