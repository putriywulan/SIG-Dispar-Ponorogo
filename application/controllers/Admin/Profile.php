<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Users_model']);
    }
    public function index()
    {
        $this->breadcrumbs->push('Home', 'Admin/Home');
        $this->breadcrumbs->push('Profile', 'Admin/Profile');
        // output
        $data['title'] = 'Profile';
        $data['breadcrumb'] = $this->breadcrumbs->show();
        $data['profile'] = check_profile();
        $this->template->admin('admin/profile/main', $data);
    }
    public function process()
    {
        $profile = check_profile();
        $this->form_validation->set_rules('username', 'Username', 'required|trim|callback_username_check');
        $this->form_validation->set_rules('nama_profile', 'Nama profile', 'required|trim');
        $this->form_validation->set_rules('no_hp', 'No. handphone', 'required|trim');
        $this->form_validation->set_rules('gambar_profile', 'Gambar Profile', 'callback_validate_image');
        $password = htmlspecialchars($this->input->post('password', true));
        if ($password != null) {
            $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]');
            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|trim|min_length[6]|matches[password]');
        }
        $this->form_validation->set_message('min_length', '{field} Harus berisi {param} karakter');
        $this->form_validation->set_message('required', '{field} Wajib diisi');
        $this->form_validation->set_error_delimiters('<small class="text-danger">', '</small><br>');

        if ($this->form_validation->run() == false) {
            return $this->index();
        } else {
            $jenis_kelamin = htmlspecialchars($this->input->post('jenis_kelamin', true));
            $id = htmlspecialchars($this->input->post('id_users', true));
            $gambar_profile = $this->uploadGambar($jenis_kelamin, $id);
            $password = htmlspecialchars($this->input->post('password', true));
            if ($password != null) {
                $password_fix = md5($password);
            } else {
                $password_fix = htmlspecialchars($this->input->post('password_old', true));
            }
            $data_users = [
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => $password_fix,
            ];
            $update_users = $this->Users_model->update_users($data_users, $id);

            $data_profile = [
                'nama_profile' =>  htmlspecialchars($this->input->post('nama_profile', true)),
                'no_hp' =>  htmlspecialchars($this->input->post('no_hp', true)),
                'alamat' =>  htmlspecialchars($this->input->post('alamat', true)),
                'gambar_profile' =>  $gambar_profile,
            ];

            $update_profile = $this->Users_model->update_profile($data_profile, $id);
            if ($update_users > 0 || $update_profile > 0) {
                checkLog('Mengubah data profile dengan id = ' . $id);
                $this->session->set_flashdata('success', 'Berhasil update data');
                return redirect(base_url('Admin/Profile'));
            } else {
                $this->session->set_flashdata('success', 'Berhasil update data');
                return redirect(base_url('Admin/Profile'));
            }
        }
    }
    public function validate_image()
    {
        $check = TRUE;
        if (isset($_FILES['gambar_profile']) && $_FILES['gambar_profile']['size'] != 0) {
            $allowedExts = array("gif", "jpeg", "jpg", "png", "JPG", "JPEG", "GIF", "PNG");
            $allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
            $extension = pathinfo($_FILES["gambar_profile"]["name"], PATHINFO_EXTENSION);
            $detectedType = exif_imagetype($_FILES['gambar_profile']['tmp_name']);
            $type = $_FILES['gambar_profile']['type'];
            if (!in_array($detectedType, $allowedTypes)) {
                $this->form_validation->set_message('validate_image', 'Type gambar tidak didukung');
                $check = FALSE;
            }
            if (filesize($_FILES['gambar_profile']['tmp_name']) > 1000000) {
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

    private function uploadGambar($jenis_kelamin = '', $id_users = '')
    {
        $gambar = $_FILES["gambar_profile"]['name'];
        if ($gambar != null) {
            $this->removeImage($id_users);
            $config['upload_path'] = './public/image/users';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['overwrite'] = true;
            $new_name = rand(1000, 100000) . time() . $_FILES["gambar_profile"]['name'];
            $config['file_name'] = $new_name;
            // $config['max_size'] = 1024;
            // $config['max_width'] = 1024;
            // $config['max_height'] = 768;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('gambar_profile')) {
                echo $this->upload->display_errors();
            } else {
                $gambar = $this->upload->data();
                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = './public/image/users/' . $gambar['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = '50%';
                $config['new_image'] = './public/image/users/' . $gambar['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                return $gambar['file_name'];
            }
        } else {
            $users = $this->Users_model->joinProfile($id_users)->row();
            if ($users->gambar_profile != 'male.png' && $users->gambar_profile != 'female.png') {
                return $users->gambar_profile;
            } else {
                if ($jenis_kelamin == 'L') {
                    return 'male.png';
                } else {
                    return 'female.png';
                }
            }
        }
    }

    private function removeImage($id)
    {
        if ($id != null) {
            $img = $this->Users_model->joinProfile($id)->row();
            if ($img->gambar_profile != 'female.png' && $img->gambar_profile != 'male.png') {
                $filename = explode('.', $img->gambar_profile)[0];
                return array_map('unlink', glob(FCPATH . "public/image/users/" . $filename . '.*'));
            }
        }
    }
    public function username_check($str)
    {
        $id_users = $this->input->post('id_users', true);
        $str = $this->input->post('username', true);
        $users = $this->Users_model->joinProfile(null, $id_users, null, null, $str)->num_rows();
        if ($users > 0) {
            $this->form_validation->set_message('username_check', '{field} sudah digunakan pada user lain');
            return FALSE;
        } else {
            return TRUE;
        }
    }
}
