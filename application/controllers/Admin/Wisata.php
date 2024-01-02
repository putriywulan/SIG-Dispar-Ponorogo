<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Wisata extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Wisata_model', 'Kategori_wisata_model', 'Fasilitas_model']);
        check_not_login();
        $profile = check_profile();
        if ($profile->level != 'admin') {
            show_404();
        }
    }
    public function index($id = null)
    { // add breadcrumbs
        $this->breadcrumbs->push('Home', 'Admin/Home');
        $this->breadcrumbs->push('wisata', 'Admin/Wisata');
        // output
        $data['title'] = 'Management wisata';
        $data['breadcrumb'] = $this->breadcrumbs->show();
        $data['result'] = $this->Wisata_model->get()->result();
        // add breadcrumbs
        if ($id != null) {
            $id_wisata = $id;
        } else {
            $id_wisata = null;
        }
        $obj = new stdClass();
        $obj->id_wisata = $id_wisata;
        $obj->gambar = null;
        $obj->nama_wisata = null;
        $obj->deskripsi = null;
        $obj->kategori_wisata_id = null;
        $obj->alamat_wisata = null;
        $obj->latitude = null;
        $obj->longitude = null;
        $obj->vidio = null;
        $obj->fasilitas_id = null;
        $obj->buka = null;
        $obj->tutup = null;
        $obj->kontak = null;
        $obj->facebook = null;
        $obj->twitter = null;
        $obj->instagram = null;
        $obj->harga_tiket_masuk = null;
        $obj->users_id = null;
        $obj->kabupaten_id = null;
        $obj->hari_buka = null;
        $obj->kecamatan_id = null;
        $obj->kelurahan_id = null;

        $data['gambar_wisata'] = null;
        $data['modal'] = $obj;
        $data['page'] = 'add';
        $data['kategori_wisata'] = $this->Kategori_wisata_model->get()->result();
        $data['fasilitas'] = $this->Fasilitas_model->get()->result();
        $this->template->admin('admin/wisata/main', $data);
    }
    public function add()
    {

        // add breadcrumbs
        $this->breadcrumbs->push('Home', 'Admin/Home');
        $this->breadcrumbs->push('wisata', 'Admin/Wisata');
        $this->breadcrumbs->push('Form Data', 'Admin/Wisata/add');
        // output
        $data['title'] = 'Form Wisata';
        $data['breadcrumb'] = $this->breadcrumbs->show();
        // add breadcrumbs
        $obj = new stdClass();
        $obj->id_wisata = null;
        $obj->gambar = null;
        $obj->nama_wisata = null;
        $obj->deskripsi = null;
        $obj->kategori_wisata_id = null;
        $obj->alamat_wisata = null;
        $obj->latitude = null;
        $obj->longitude = null;
        $obj->vidio = null;
        $obj->fasilitas_id = null;
        $obj->buka = null;
        $obj->tutup = null;
        $obj->kontak = null;
        $obj->facebook = null;
        $obj->twitter = null;
        $obj->hari_buka = null;
        $obj->instagram = null;
        $obj->harga_tiket_masuk = null;
        $obj->users_id = null;
        $obj->kabupaten_id = null;
        $obj->kecamatan_id = null;
        $obj->kelurahan_id = null;

        $data['gambar_wisata'] = null;
        $data['row'] = $obj;
        $data['page'] = 'add';
        $data['kategori_wisata'] = $this->Kategori_wisata_model->get()->result();
        $data['fasilitas'] = $this->Fasilitas_model->get()->result();
        $this->template->admin('admin/wisata/form_data', $data);
    }
    public function process()
    {

        $this->form_validation->set_rules('gambar', 'Gambar', 'callback_validate_image');
        // $this->form_validation->set_rules('images', 'Gambar Lainnya', 'callback_validate_image_multiple');
        $this->form_validation->set_rules('hari_buka[]', 'Hari Buka', 'required');
        $this->form_validation->set_rules('kontak', 'Kontak', 'required');
        $this->form_validation->set_rules('tutup', 'Tutup', 'required');
        $this->form_validation->set_rules('buka', 'Buka', 'required');
        $this->form_validation->set_rules('kategori_wisata_id', 'wisata', 'required');
        $this->form_validation->set_rules('fasilitas_id[]', 'Fasilitas', 'required');
        $this->form_validation->set_rules('latitude', 'Latitude', 'required');
        $this->form_validation->set_rules('longitude', 'Longitude', 'required');
        $this->form_validation->set_rules('longitude', 'Longitude', 'required');
        $this->form_validation->set_rules('nama_wisata', 'Nama wisata', 'required');
        $this->form_validation->set_rules('alamat_wisata', 'Alamat wisata', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('kabupaten_id', 'Kabupaten', 'required');
        $this->form_validation->set_rules('kecamatan_id', 'Kecamatan', 'required');
        $this->form_validation->set_rules('kelurahan_id', 'Kelurahan', 'required');
        $this->form_validation->set_rules('harga_tiket_masuk', 'Harga tiket masuk', 'required');
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
                $gambar = $this->uploadGambar();
                $fasilitas_id = implode(',', $this->input->post('fasilitas_id', true));
                $hari_buka = implode(',', $this->input->post('hari_buka', true));
                $id_users = $this->session->userdata('id_users');
                $data_Wisata = [
                    'gambar' => $gambar,
                    'deskripsi' => $this->input->post('deskripsi', true),
                    'nama_wisata' => htmlspecialchars($this->input->post('nama_wisata', true)),
                    'alamat_wisata' => htmlspecialchars($this->input->post('alamat_wisata', true)),
                    'latitude' => htmlspecialchars($this->input->post('latitude', true)),
                    'longitude' => htmlspecialchars($this->input->post('longitude', true)),
                    'vidio' => htmlspecialchars_decode(trim($this->input->post('vidio'))),
                    'fasilitas_id' => $fasilitas_id,
                    'hari_buka' => $hari_buka,
                    'buka' => htmlspecialchars($this->input->post('buka', true)),
                    'tutup' => htmlspecialchars($this->input->post('tutup', true)),
                    'kontak' => htmlspecialchars($this->input->post('kontak', true)),
                    'facebook' => htmlspecialchars($this->input->post('facebook', true)),
                    'twitter' => htmlspecialchars($this->input->post('twitter', true)),
                    'instagram' => htmlspecialchars($this->input->post('instagram', true)),
                    'kabupaten_id' => htmlspecialchars($this->input->post('kabupaten_id', true)),
                    'kecamatan_id' => htmlspecialchars($this->input->post('kecamatan_id', true)),
                    'kelurahan_id' => htmlspecialchars($this->input->post('kelurahan_id', true)),
                    'harga_tiket_masuk' => htmlspecialchars(str_replace(',', '', $this->input->post('harga_tiket_masuk', true))),
                    'kategori_wisata_id' => htmlspecialchars($this->input->post('kategori_wisata_id', true)),
                    'users_id' => $id_users
                ];

                $insert_Wisata = $this->Wisata_model->insert($data_Wisata);
                $gambarWisata = $this->uploadMultipleImage($insert_Wisata);

                if ($insert_Wisata > 0 || $gambarWisata > 0) {
                    checkLog('Menambahkan data wisata dengan id = ' . $insert_Wisata);
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
                $id = htmlspecialchars($this->input->post('id_wisata', true));
                $data = [
                    'status' => 'error',
                    'output' => $this->form_validation->error_array()
                ];
                echo json_encode($data);
            } else {

                $id = htmlspecialchars($this->input->post('id_wisata', true));
                $id_users = $this->session->userdata('id_users');
                $fasilitas_id = implode(',', $this->input->post('fasilitas_id', true));
                $hari_buka = implode(',', $this->input->post('hari_buka', true));
                $gambar = $this->uploadGambar(null, $id);
                $data_Wisata = [
                    'gambar' => $gambar,
                    'deskripsi' => $this->input->post('deskripsi', true),
                    'nama_wisata' => htmlspecialchars($this->input->post('nama_wisata', true)),
                    'alamat_wisata' => htmlspecialchars($this->input->post('alamat_wisata', true)),
                    'latitude' => htmlspecialchars($this->input->post('latitude', true)),
                    'longitude' => htmlspecialchars($this->input->post('longitude', true)),
                    'vidio' => htmlspecialchars_decode(trim($this->input->post('vidio'))),
                    'fasilitas_id' => $fasilitas_id,
                    'hari_buka' => $hari_buka,
                    'buka' => htmlspecialchars($this->input->post('buka', true)),
                    'tutup' => htmlspecialchars($this->input->post('tutup', true)),

                    'kontak' => htmlspecialchars($this->input->post('kontak', true)),
                    'facebook' => htmlspecialchars($this->input->post('facebook', true)),
                    'twitter' => htmlspecialchars($this->input->post('twitter', true)),
                    'instagram' => htmlspecialchars($this->input->post('instagram', true)),
                    'kabupaten_id' => htmlspecialchars($this->input->post('kabupaten_id', true)),
                    'kecamatan_id' => htmlspecialchars($this->input->post('kecamatan_id', true)),
                    'kelurahan_id' => htmlspecialchars($this->input->post('kelurahan_id', true)),
                    'harga_tiket_masuk' => htmlspecialchars(str_replace(',', '', $this->input->post('harga_tiket_masuk', true))),
                    'kategori_wisata_id' => htmlspecialchars($this->input->post('kategori_wisata_id', true)),
                    'users_id' => $id_users
                ];

                $update_Wisata = $this->Wisata_model->update($data_Wisata, $id);
                $gambarWisata = $this->uploadMultipleImage($id);
                if ($update_Wisata > 0 || $gambarWisata > 0) {
                    checkLog('Mengubah data wisata dengan id = ' . $id);
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

        $get = $this->Wisata_model->get($id)->row();
        $getLainnya = $this->Wisata_model->getLainnya($id)->result();

        foreach ($getLainnya as $vGetLainnya) {
            $gambar_wisata[] = [
                'id' => $vGetLainnya->id_gambar_wisata,
                'src' => base_url('public/image/wisatalainnya/' . $vGetLainnya->nama_gambar_wisata)
            ];
        }
        $data = [
            'row' => $get,
            'gambar_wisata' => ($gambar_wisata)
        ];
        echo json_encode($data);
    }

    public function delete()
    {
        $id_wisata = htmlspecialchars($this->input->post('id_wisata', true));
        $delete = $this->Wisata_model->delete($id_wisata);
        if ($delete) {
            checkLog('Menghapus data wisata dengan id = ' . $id_wisata);
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

    private function uploadGambar($jenis_kelamin = '', $id_wisata = '')
    {
        $gambar = $_FILES["gambar"]['name'];
        if ($gambar != null) {
            $this->removeImage($id_wisata);
            $config['upload_path'] = './public/image/wisata';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['overwrite'] = true;
            $new_name = rand(1000, 100000) . time() . $_FILES["gambar"]['name'];
            $config['file_name'] = $new_name;
            // $config['max_size'] = 1024;
            // $config['max_width'] = 1024;
            // $config['max_height'] = 768;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('gambar')) {
                $this->upload->display_errors();
            } else {
                $gambar = $this->upload->data();
                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = './public/image/wisata/' . $gambar['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = '50%';
                $config['new_image'] = './public/image/wisata/' . $gambar['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                return $gambar['file_name'];
            }
        } else {
            $Wisata = $this->Wisata_model->get($id_wisata)->row();
            if ($Wisata->gambar != 'default.png') {
                return $Wisata->gambar;
            } else {
                return 'default.png';
            }
        }
    }


    public function uploadMultipleImage($id_wisata)
    {
        if ($_FILES["images"]["name"][0] != '') {
            if (!isset($_POST['add'])) {
                $this->removeImageLainnya($id_wisata);
                $this->Wisata_model->delete_gambar_wisata($id_wisata);
            }
            $config['upload_path'] = './public/image/wisatalainnya';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            for ($count = 0; $count < count($_FILES["images"]["name"]); $count++) {
                $_FILES["file"]["name"] = rand(1000, 100000) . time() . $_FILES["images"]['name'][$count];
                $_FILES["file"]["type"] = $_FILES["images"]["type"][$count];
                $_FILES["file"]["tmp_name"] = $_FILES["images"]["tmp_name"][$count];
                $_FILES["file"]["error"] = $_FILES["images"]["error"][$count];
                $_FILES["file"]["size"] = $_FILES["images"]["size"][$count];
                if (!$this->upload->do_upload('file')) {
                    $this->upload->display_errors();
                } else {
                    $nama_gambar_wisata = $this->upload->data();
                    $data = [
                        'nama_gambar_wisata' => $nama_gambar_wisata['file_name'],
                        'wisata_id' => $id_wisata
                    ];
                    $insertGambar[] = $this->Wisata_model->insertGambar($data);
                }
            }
            return count($insertGambar);
        }
    }


    private function removeImage($id)
    {
        if ($id != null) {
            $img = $this->Wisata_model->get($id)->row();
            $filename = explode('.', $img->gambar)[0];
            return array_map('unlink', glob(FCPATH . "public/image/wisata/" . $filename . '.*'));
        }
    }
    private function removeImageLainnya($id)
    {
        if ($id != null) {
            $img = $this->Wisata_model->getLainnya($id)->result();
            foreach ($img as $r_img) {
                $filename = $r_img->nama_gambar_wisata;
                $filename = explode('.', $filename)[0];
                array_map('unlink', glob(FCPATH . "public/image/wisatalainnya/" . $filename . '.*'));
            }
            return;
        }
    }

    public function validate_image()
    {
        $check = TRUE;
        if ((!isset($_FILES['gambar'])) || $_FILES['gambar']['size'] == 0 && $_POST['page'] == 'add') {
            $this->form_validation->set_message('validate_image', '{field} harus di upload');
            $check = FALSE;
        } else if (isset($_FILES['gambar']) && $_FILES['gambar']['size'] != 0) {
            $allowedExts = array("gif", "jpeg", "jpg", "png", "JPG", "JPEG", "GIF", "PNG");
            $allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
            $extension = pathinfo($_FILES["gambar"]["name"], PATHINFO_EXTENSION);
            $detectedType = exif_imagetype($_FILES['gambar']['tmp_name']);
            $type = $_FILES['gambar']['type'];
            if (!in_array($detectedType, $allowedTypes)) {
                $this->form_validation->set_message('validate_image', 'Type gambar tidak didukung');
                $check = FALSE;
            }
            if (filesize($_FILES['gambar']['tmp_name']) > 1000000) {
                $this->form_validation->set_message('validate_image', 'Gambar melebihi 1 MB');
                $check = FALSE;
            }
            if (!in_array($extension, $allowedExts)) {
                $this->form_validation->set_message('validate_image', "Tidak didukung format {$extension}");
                $check = FALSE;
            }
        }
        return $check;
    }
    public function validate_image_multiple()
    {
        $check = TRUE;
        for ($count = 0; $count < count($_FILES["images"]["name"]); $count++) {
            $allowedExts = array("gif", "jpeg", "jpg", "png", "JPG", "JPEG", "GIF", "PNG");
            $allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
            $extension = pathinfo($_FILES["images"]["name"][$count], PATHINFO_EXTENSION);
            $detectedType = exif_imagetype($_FILES['images']['tmp_name'][$count]);
            $type = $_FILES['images']['type'][$count];
            if (!in_array($detectedType, $allowedTypes)) {
                $this->form_validation->set_message('validate_image_multiple', 'Type gambar tidak didukung');
                $check = FALSE;
            }
            if (filesize($_FILES['images']['tmp_name'][$count]) > 1000000) {
                $this->form_validation->set_message('validate_image_multiple', 'Gambar melebihi 1 MB');
                $check = FALSE;
            }
            if (!in_array($extension, $allowedExts)) {
                $this->form_validation->set_message('validate_image_multiple', "Tidak didukung format {$extension}");
                $check = FALSE;
            }
        }
        return $check;
    }
}
