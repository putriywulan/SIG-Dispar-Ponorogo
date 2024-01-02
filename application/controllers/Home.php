<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // check_not_login();
        $this->load->model(['Wisata_model', 'Slider_model', 'Kategori_wisata_model']);
    }
    public function index()
    {
        $data['title'] = 'Home Page';
        $data['wisata'] = $this->Wisata_model->get()->result();
        $data['slider'] = $this->Slider_model->get()->result();
        $data['kategori_wisata'] = $this->Kategori_wisata_model->get()->result();
        $this->template->frontend('frontend/home/main', $data);
    }
}
