<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Slider extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Slider_model']);
        check_not_login();
        $profile = check_profile();
        if ($profile->level != 'admin') {
            show_404();
        }
    }
    public function index()
    { // add breadcrumbs
        $this->breadcrumbs->push('Home', 'Admin/Home');
        $this->breadcrumbs->push('Slider', 'Admin/Slider');
        // output
        $data['title'] = 'Management Slider';
        $data['breadcrumb'] = $this->breadcrumbs->show();
        $data['result'] = $this->Slider_model->get()->result();
        // add breadcrumbs
        $obj = new stdClass();
        $obj->id_slider = null;
        $obj->judul = null;
        $obj->deskripsi = null;
        $obj->nama_file = null;

        $data['modal'] = $obj;
        $data['page'] = 'add';
        $this->template->admin('admin/slider/main', $data);
    }
    public function add()
    {

        // add breadcrumbs
        $this->breadcrumbs->push('Home', 'Admin/Home');
        $this->breadcrumbs->push('Slider', 'Admin/Slider');
        $this->breadcrumbs->push('Form Data', 'Admin/Slider/add');
        // output
        $data['title'] = 'Form Slider';
        $data['breadcrumb'] = $this->breadcrumbs->show();
        // add breadcrumbs
        $obj = new stdClass();
        $obj->id_slider = null;
        $obj->judul = null;
        $obj->deskripsi = null;
        $obj->nama_file = null;

        $data['row'] = $obj;
        $data['page'] = 'add';
        $this->template->admin('admin/slider/form_data', $data);
    }
    public function process()
    {

        $this->form_validation->set_rules('nama_file', 'Nama File', 'callback_validate_image');
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_message('required', '{field} Wajib diisi');
        $this->form_validation->set_error_delimiters('<small class="text-danger">', '</small><br>');
        if ($_POST['page'] == 'add') {
            if ($this->form_validation->run() == false) {
                $data = [
                    'status' => 'error',
                    'output' => $this->form_validation->error_array()
                ];
                echo json_encode($data);
            } else {
                $gambar = $this->uploadGambar();
                $data_Slider = [
                    'judul' => htmlspecialchars($this->input->post('judul', true)),
                    'deskripsi' => htmlspecialchars($this->input->post('deskripsi', true)),
                    'nama_file' => $gambar,
                ];
                $insert_Slider = $this->Slider_model->insert($data_Slider);
                if ($insert_Slider > 0) {
                    checkLog('Menambahkan data slider dengan id = ' . $insert_Slider);
                    $data = [
                        'status' => 'success',
                        'output' => 'Berhasil menambahkan data'
                    ];
                    echo json_encode($data);
                } else {
                    $data = [
                        'status_error' => 'error',
                        'output' => 'Gagal menambahkan data'
                    ];
                    echo json_encode($data);
                }
            }
        } else if ($_POST['page'] == 'edit') {
            if ($this->form_validation->run() == false) {
                $id = htmlspecialchars($this->input->post('id_slider', true));
                $data = [
                    'status' => 'error',
                    'output' => $this->form_validation->error_array()
                ];
                echo json_encode($data);
            } else {
                $id = htmlspecialchars($this->input->post('id_slider', true));
                $gambar = $this->uploadGambar(null, $id);
                $data_Slider = [
                    'judul' => htmlspecialchars($this->input->post('judul', true)),
                    'deskripsi' => htmlspecialchars($this->input->post('deskripsi', true)),
                    'nama_file' => $gambar,
                ];
                $update_Slider = $this->Slider_model->update($data_Slider, $id);

                if ($update_Slider > 0) {
                    checkLog('Mengubah data slider dengan id = ' . $id);
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
        $get = $this->Slider_model->get($id)->row();

        $data = [
            'row' => $get,
        ];
        echo json_encode($data);
    }

    public function delete()
    {
        $id_slider = htmlspecialchars($this->input->post('id_slider', true));
        $delete = $this->Slider_model->delete($id_slider);
        if ($delete) {
            checkLog('Menghapus data slider dengan id = ' . $id_slider);
            $data = [
                'status' => "success",
                'msg' => 'Success hapus data'
            ];
            echo json_encode($data);
        } else {
            $data = [
                'status' => "error",
                'msg' => 'Gagal hapus data'
            ];
            echo json_encode($data);
        }
    }

    private function uploadGambar($jenis_kelamin = '', $id_slider = '')
    {
        $nama_file = $_FILES["nama_file"]['name'];
        if ($nama_file != null) {
            $this->removeImage($id_slider);
            $config['upload_path'] = './public/image/slider';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['overwrite'] = true;
            $new_name = rand(1000, 100000) . time() . $_FILES["nama_file"]['name'];
            $config['file_name'] = $new_name;
            // $config['max_size'] = 1024;
            // $config['max_width'] = 1024;
            // $config['max_height'] = 768;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('nama_file')) {
                echo $this->upload->display_errors();
            } else {
                $nama_file = $this->upload->data();
                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = './public/image/slider/' . $nama_file['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = '50%';
                $config['new_image'] = './public/image/slider/' . $nama_file['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                return $nama_file['file_name'];
            }
        } else {
            $slider = $this->Slider_model->get($id_slider)->row();
            if ($slider->nama_file != null) {
                return $slider->nama_file;
            } else {
                return 'default.png';
            }
        }
    }
    private function removeImage($id)
    {
        if ($id != null) {
            $img = $this->Slider_model->get($id)->row();
            $filename = explode('.', $img->nama_file)[0];
            return array_map('unlink', glob(FCPATH . "public/image/slider/" . $filename . '.*'));
        }
    }
    public function validate_image()
    {
        $check = TRUE;
        if ((!isset($_FILES['nama_file'])) || $_FILES['nama_file']['size'] == 0 && $_POST['page'] == 'add') {
            $this->form_validation->set_message('validate_image', '{field} harus di upload');
            $check = FALSE;
        } else if (isset($_FILES['nama_file']) && $_FILES['nama_file']['size'] != 0) {
            $allowedExts = array("gif", "jpeg", "jpg", "png", "JPG", "JPEG", "GIF", "PNG");
            $allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
            $extension = pathinfo($_FILES["nama_file"]["name"], PATHINFO_EXTENSION);
            $detectedType = exif_imagetype($_FILES['nama_file']['tmp_name']);
            $type = $_FILES['nama_file']['type'];
            if (!in_array($detectedType, $allowedTypes)) {
                $this->form_validation->set_message('validate_image', 'Type Gambar tidak didukung');
                $check = FALSE;
            }
            if (filesize($_FILES['nama_file']['tmp_name']) > 1000000) {
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
}
