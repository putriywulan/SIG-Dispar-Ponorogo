<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konfigurasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Konfigurasi_model');
    }
    public function index()
    {
        $this->breadcrumbs->push('Home', 'Admin/Home');
        // output
        $data['title'] = 'Dashboard';
        $data['breadcrumb'] = $this->breadcrumbs->show();
        $konfigurasi = check_konfigurasi();
        if ($konfigurasi != null) {
            $data['row'] = $konfigurasi;
            $data['page'] = 'edit';
        } else {
            $obj = new stdClass();
            $obj->id_konfigurasi = null;
            $obj->nama_aplikasi = null;
            $obj->keterangan = null;
            $obj->gambar_konfigurasi = null;
            $obj->created_by = null;
            $obj->facebook = null;
            $obj->instagram = null;
            $obj->youtube = null;
            $obj->alamat = null;
            $obj->no_hp = null;
            $data['page'] = 'add';
            $data['row'] = $obj;
        }
        $this->template->admin('admin/konfigurasi/main', $data);
    }
    public function process()
    {
        $this->form_validation->set_rules('nama_aplikasi', 'Nama aplikasi', 'required|trim');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');
        $this->form_validation->set_rules('created_by', 'Created By', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('no_hp', 'No. Handphone', 'required|trim');
        $this->form_validation->set_message('required', '{field} Wajib diisi');
        $this->form_validation->set_error_delimiters('<small class="text-danger">', '</small><br>');

        if (isset($_POST['add'])) {
            if ($this->form_validation->run() == false) {
                return $this->index();
            } else {
                $gambar_konfigurasi = $this->uploadGambar();
                $data_Konfigurasi = [
                    'nama_aplikasi' => htmlspecialchars($this->input->post('nama_aplikasi', true)),
                    'keterangan' => htmlspecialchars($this->input->post('keterangan', true)),
                    'created_by' => htmlspecialchars($this->input->post('created_by', true)),
                    'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                    'no_hp' => htmlspecialchars($this->input->post('no_hp', true)),
                    'facebook' => htmlspecialchars($this->input->post('facebook', true)),
                    'instagram' => htmlspecialchars($this->input->post('instagram', true)),
                    'youtube' => htmlspecialchars($this->input->post('youtube', true)),
                    'gambar_konfigurasi' => $gambar_konfigurasi,
                ];
                $insert_Konfigurasi = $this->Konfigurasi_model->insert($data_Konfigurasi);
                if ($insert_Konfigurasi > 0) {
                    checkLog('Melakukan konfigurasi sistem');
                    $this->session->set_flashdata('success', 'Berhasil tambah data');
                    return redirect(base_url('Admin/Konfigurasi'));
                } else {
                    $this->session->set_flashdata('error', 'Gagal tambah data');
                    return redirect(base_url('Admin/Konfigurasi'));
                }
            }
        } else if (isset($_POST['edit'])) {
            if ($this->form_validation->run() == false) {
                return $this->index();
            } else {
                $id = htmlspecialchars($this->input->post('id_konfigurasi', true));
                $gambar_konfigurasi = $this->uploadGambar(null, $id);
                $data_Konfigurasi = [
                    'nama_aplikasi' => htmlspecialchars($this->input->post('nama_aplikasi', true)),
                    'keterangan' => htmlspecialchars($this->input->post('keterangan', true)),
                    'created_by' => htmlspecialchars($this->input->post('created_by', true)),
                    'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                    'no_hp' => htmlspecialchars($this->input->post('no_hp', true)),
                    'facebook' => htmlspecialchars($this->input->post('facebook', true)),
                    'instagram' => htmlspecialchars($this->input->post('instagram', true)),
                    'youtube' => htmlspecialchars($this->input->post('youtube', true)),
                    'gambar_konfigurasi' => $gambar_konfigurasi,
                ];
                $update_Konfigurasi = $this->Konfigurasi_model->update($data_Konfigurasi, $id);

                if ($update_Konfigurasi > 0) {
                    checkLog('Melakukan konfigurasi sistem');
                    $this->session->set_flashdata('success', 'Berhasil update data');
                    return redirect(base_url('Admin/Konfigurasi'));
                } else {
                    $this->session->set_flashdata('success', 'Berhasil update data');
                    return redirect(base_url('Admin/Konfigurasi'));
                }
            }
        }
    }
    private function uploadGambar($jenis_kelamin = '', $id_konfigurasi = '')
    {
        $gambar = $_FILES["gambar_konfigurasi"]['name'];
        if ($gambar != null) {
            $this->removeImage($id_konfigurasi);
            $config['upload_path'] = './public/image/konfigurasi';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['overwrite'] = true;
            $new_name = rand(1000, 100000) . time() . $_FILES["gambar_konfigurasi"]['name'];
            $config['file_name'] = $new_name;
            // $config['max_size'] = 1024;
            // $config['max_width'] = 1024;
            // $config['max_height'] = 768;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('gambar_konfigurasi')) {
                echo $this->upload->display_errors();
            } else {
                $gambar = $this->upload->data();
                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = './public/image/konfigurasi/' . $gambar['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = '50%';
                $config['width'] = 600;
                $config['height'] = 600;
                $config['new_image'] = './public/image/konfigurasi/' . $gambar['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                return $gambar['file_name'];
            }
        } else {
            $konfigurasi = $this->Konfigurasi_model->get($id_konfigurasi)->row();
            if ($konfigurasi->gambar_konfigurasi != 'default.png') {
                return $konfigurasi->gambar_konfigurasi;
            } else {
                return 'default.png';
            }
        }
    }

    private function removeImage($id)
    {
        if ($id != null) {
            $img = $this->Konfigurasi_model->get($id)->row();
            if ($img->gambar_konfigurasi != 'default.png') {
                $filename = explode('.', $img->gambar_konfigurasi)[0];
                return array_map('unlink', glob(FCPATH . "public/image/konfigurasi/" . $filename . '.*'));
            }
        }
    }
}
