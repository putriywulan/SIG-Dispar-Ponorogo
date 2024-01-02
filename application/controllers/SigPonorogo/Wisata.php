<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Wisata extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // check_not_login();
        $this->load->model(['Wisata_model', 'Slider_model', 'Wisata_model', 'Ulasan_model', 'Rating_model']);
    }
    public function index($id_kategori_wisata = null)
    {
        $data['title'] = 'Wisata Page';
        $search = null;
        if (isset($_GET['search'])) {
            $search = htmlspecialchars($this->input->get('search', true));
        }

        if ($id_kategori_wisata != null) {
            $wisata = $this->Wisata_model->get(null, $id_kategori_wisata, $search)->result()[0];
        } else {
            $wisata = $this->Wisata_model->get(null, $id_kategori_wisata, $search)->result()[0];
        }
        if ($wisata == null) {
            $this->session->set_flashdata('error', 'Tidak ditemukan');
            return redirect(base_url('Home'));
        }
        $id_kategori_wisata = $wisata->id_kategori_wisata;
        $data['wisata'] = check_wisata(null, $id_kategori_wisata);
        $data['id_kategori_wisata'] = $id_kategori_wisata;
        $this->template->frontend('frontend/wisata/kategori', $data);
    }
    public function detail($id_wisata)
    {
        $data['title'] = 'Wisata Page';
        $wisata = $this->Wisata_model->get($id_wisata)->row();
        $data['wisata'] = $wisata;
        $data['id_wisata'] = $id_wisata;
        $kabupaten = $this->curl->simple_get('https://dev.farizdotid.com/api/daerahindonesia/kota/' . $wisata->kabupaten_id);
        $kecamatan = $this->curl->simple_get('https://dev.farizdotid.com/api/daerahindonesia/kecamatan/' . $wisata->kecamatan_id);
        $kelurahan = $this->curl->simple_get('https://dev.farizdotid.com/api/daerahindonesia/kelurahan/' . $wisata->kelurahan_id);
        $kabupaten =  json_decode($kabupaten);
        $kecamatan =  json_decode($kecamatan);
        $kelurahan =  (json_decode($kelurahan));

        $data['kabupaten'] = $kabupaten;
        $data['kecamatan'] = $kecamatan;
        $data['kelurahan'] = $kelurahan;
        $data['ulasan'] = $this->Ulasan_model->get(null, $id_wisata)->result();
        $data['rating'] = $this->Rating_model->get(null, $id_wisata)->result();
        $this->template->frontend('frontend/wisata/detail', $data);
    }
    public function rating()
    {

        if ($_POST['page'] == 'add') {
            $this->form_validation->set_rules('rating', 'Rating', 'callback_validate_rating');
        }
        $this->form_validation->set_rules('ulasan', 'Ulasan', 'required');
        $this->form_validation->set_message('required', '{field} Wajib diisi');
        $this->form_validation->set_error_delimiters('<small class="text-danger">', '</small><br>');
        if ($this->form_validation->run() == false) {
            $data = [
                'status' => 'error',
                'output' => $this->form_validation->error_array()
            ];
            echo json_encode($data);
        } else {
            $rating = htmlspecialchars($this->input->post('rating', true));
            $ulasan = htmlspecialchars($this->input->post('ulasan', true));
            $id_wisata = htmlspecialchars($this->input->post('id_wisata', true));

            $firstName = $this->input->post('firstName');
            $lastName = $this->input->post('lastName');
            $email = $this->input->post('email');
            $gender = $this->input->post('gender');
            $image = $this->input->post('image');

            if ($_POST['page'] == 'add') {
                // cek email
                $check = $this->db->get_where('rating', ['email' => $email, 'wisata_id' => $id_wisata])->num_rows();
                $dataRate  = null;
                if ($check > 0) {
                    if ($rating != 0) {
                        $row = $this->db->get_where('rating', ['email' => $email, 'wisata_id' => $id_wisata])->row();
                        $data_rate = [
                            'wisata_id' => $id_wisata,
                            'email' => $email,
                            'rate' => $rating
                        ];
                        $dataRate = $this->Rating_model->update($data_rate, $row->id_rating);
                    }
                } else {
                    if ($rating != 0) {
                        $data_rate = [
                            'wisata_id' => $id_wisata,
                            'email' => $email,
                            'rate' => $rating
                        ];
                        $dataRate = $this->Rating_model->insert($data_rate);
                    }
                }

                $insertUlasan = null;
                if ($ulasan != null) {
                    $data = [
                        'message' => $ulasan,
                        'wisata_id' => $id_wisata,
                        'first_name' => $firstName,
                        'last_name' => $lastName,
                        'email' => $email,
                        'gender' => $gender,
                        'image' => $image,
                    ];
                    $insertUlasan = $this->Ulasan_model->insert($data);
                }


                if ($insertUlasan > 0 || $dataRate > 0) {
                    $data = [
                        'status_alert' => 'success',
                        'msg' => 'Berhasil tulis ulasan anda'
                    ];
                } else {
                    $data = [
                        'status_alert' => 'error',
                        'msg' => 'Gagal tulis ulasan anda'
                    ];
                }
            } else {
                // cek email

                $check = $this->db->get_where('rating', ['email' => $email, 'wisata_id' => $id_wisata])->num_rows();
                $dataRate  = null;
                if ($check > 0) {
                    if ($rating != 0) {
                        $row = $this->db->get_where('rating', ['email' => $email, 'wisata_id' => $id_wisata])->row();
                        $data_rate = [
                            'wisata_id' => $id_wisata,
                            'email' => $email,
                            'rate' => $rating
                        ];
                        $dataRate = $this->Rating_model->update($data_rate, $row->id_rating);
                    }
                } else {
                    if ($rating != 0) {
                        $data_rate = [
                            'wisata_id' => $id_wisata,
                            'email' => $email,
                            'rate' => $rating
                        ];
                        $dataRate = $this->Rating_model->insert($data_rate);
                    }
                }

                $updateUlasan = null;
                $id_ulasan = $this->input->post('id_ulasan', true);
                if ($ulasan != null) {
                    $data = [
                        'message' => $ulasan,
                        'wisata_id' => $id_wisata,
                        'first_name' => $firstName,
                        'last_name' => $lastName,
                        'email' => $email,
                        'gender' => $gender,
                        'image' => $image,
                    ];
                    $updateUlasan = $this->Ulasan_model->update($data, $id_ulasan);
                }


                if ($updateUlasan > 0 || $dataRate > 0) {
                    $data = [
                        'status_alert' => 'success',
                        'msg' => 'Berhasil tulis ulasan anda'
                    ];
                } else {
                    $data = [
                        'status_alert' => 'error',
                        'msg' => 'Gagal tulis ulasan anda'
                    ];
                }
            }

            echo json_encode($data);
        }
    }
    public function outputUlasan()
    {
        $id_wisata = htmlspecialchars($this->input->post('id_wisata', true));
        $ulasan = $this->Ulasan_model->get(null, $id_wisata)->result();
        $rating = $this->Rating_model->get(null, $id_wisata)->result();

        $output = '';
        foreach ($ulasan as $r_ulasan) :
            $output .= '<div class="media">
                            <img class="mr-3" src="' . $r_ulasan->image . '" width="80px;" alt="Generic placeholder image" style="float: left; margin-right:10px;">
                <div class="media-body">
                    <h5 style="margin: 0;">' . $r_ulasan->first_name . ' ' . $r_ulasan->last_name . '</h5>
                    ';
            $get = $this->db->get_where('rating', ['email' => $r_ulasan->email, 'wisata_id' => $id_wisata])->row();
            if ($get != null) {
                $output .= '
                    <span id="star_media">';
                if ($get->rate == 1) {
                    $rating = '
                            <span>
                                <i class="fas fa-star"></i>
                            </span>
                            <span>
                                <i class="far fa-star"></i>
                            </span>
                            <span>
                                <i class="far fa-star"></i>
                            </span>
                            <span>
                                <i class="far fa-star"></i>
                            </span>
                            <span>
                                <i class="far fa-star"></i>
                            </span>
                            ';
                } else if ($get->rate == 2) {
                    $rating = '
                            <span>
                                <i class="fas fa-star"></i>
                            </span>
                            <span>
                                <i class="fas fa-star"></i>
                            </span>
                            <span>
                                <i class="far fa-star"></i>
                            </span>
                            <span>
                                <i class="far fa-star"></i>
                            </span>
                            <span>
                                <i class="far fa-star"></i>
                            </span>
                            ';
                } else if ($get->rate == 3) {
                    $rating = '
                            <span>
                                <i class="fas fa-star"></i>
                            </span>
                            <span>
                                <i class="fas fa-star"></i>
                            </span>
                            <span>
                                <i class="fas fa-star"></i>
                            </span>
                            <span>
                                <i class="far fa-star"></i>
                            </span>
                            <span>
                                <i class="far fa-star"></i>
                            </span>
                            ';
                } else if ($get->rate == 4) {
                    $rating = '
                            <span>
                                <i class="fas fa-star"></i>
                            </span>
                            <span>
                                <i class="fas fa-star"></i>
                            </span>
                            <span>
                                <i class="fas fa-star"></i>
                            </span>
                            <span>
                                <i class="fas fa-star"></i>
                            </span>
                            <span>
                                <i class="far fa-star"></i>
                            </span>
                            ';
                } else if ($get->rate == 5) {
                    $rating = '
                            <span>
                                <i class="fas fa-star"></i>
                            </span>
                            <span>
                                <i class="fas fa-star"></i>
                            </span>
                            <span>
                                <i class="fas fa-star"></i>
                            </span>
                            <span>
                                <i class="fas fa-star"></i>
                            </span>
                            <span>
                                <i class="fas fa-star"></i>
                            </span>
                            ';
                } else {
                    $rating = '
                        <span>
                                <i class="far fa-star"></i>
                            </span>
                            <span>
                                <i class="far fa-star"></i>
                            </span>
                            <span>
                                <i class="far fa-star"></i>
                            </span>
                            <span>
                                <i class="far fa-star"></i>
                            </span>
                            <span>
                                <i class="far fa-star"></i>
                            </span>
                ';
                }
                $output .= $rating;
                $output .= '</span>
                        <br>
                        ' . $r_ulasan->message;
            }
            $numRows = $this->db->get_where('rating', ['email' => $r_ulasan->email, 'wisata_id' => $id_wisata])->num_rows();

            if ($numRows > 0) {
                $output .= '<div style="float:right;">
                            <a data-id="' . $r_ulasan->id_ulasan . '" href="#" data-toggle="modal" data-target="#modalEdit" class="btn btn-edit btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                            <a data-id="' . $r_ulasan->id_ulasan . '" href="#" class="btn btn-delete btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                        </div>';
            }

            $output .= '
                </div>
                        </div>
                        <hr>
                        ';
        endforeach;

        echo json_encode([
            'output' => $output
        ]);
    }
    public function validate_rating()
    {
        $rating = $this->input->post('rating', true);
        if ($rating == 0) {
            $this->form_validation->set_message('validate_rating', '{field} wajib dinilai');
            return FALSE;
        }
        return TRUE;
    }
    public function editUlasan()
    {
        $id_ulasan = $this->input->post('id_ulasan', true);
        $id_wisata = $this->input->post('id_wisata', true);
        $email = $this->input->post('email', true);
        $row = $this->Ulasan_model->get($id_ulasan)->row();
        $rating_row = $this->db->get_where('rating', ['email' => $email, 'wisata_id' => $id_wisata])->row();



        if ($rating_row->rate == 1) {
            $rating = '
                <span>
                    <i class="fas fa-star"></i>
                </span>
                <span>
                    <i class="far fa-star"></i>
                </span>
                <span>
                    <i class="far fa-star"></i>
                </span>
                <span>
                    <i class="far fa-star"></i>
                </span>
                <span>
                    <i class="far fa-star"></i>
                </span>
                ';
        } else if ($rating_row->rate == 2) {
            $rating = '
                <span>
                    <i class="fas fa-star"></i>
                </span>
                <span>
                    <i class="fas fa-star"></i>
                </span>
                <span>
                    <i class="far fa-star"></i>
                </span>
                <span>
                    <i class="far fa-star"></i>
                </span>
                <span>
                    <i class="far fa-star"></i>
                </span>
                ';
        } else if ($rating_row->rate == 3) {
            $rating = '
                <span>
                    <i class="fas fa-star"></i>
                </span>
                <span>
                    <i class="fas fa-star"></i>
                </span>
                <span>
                    <i class="fas fa-star"></i>
                </span>
                <span>
                    <i class="far fa-star"></i>
                </span>
                <span>
                    <i class="far fa-star"></i>
                </span>
                ';
        } else if ($rating_row->rate == 4) {
            $rating = '
                <span>
                    <i class="fas fa-star"></i>
                </span>
                <span>
                    <i class="fas fa-star"></i>
                </span>
                <span>
                    <i class="fas fa-star"></i>
                </span>
                <span>
                    <i class="fas fa-star"></i>
                </span>
                <span>
                    <i class="far fa-star"></i>
                </span>
                ';
        } else if ($rating_row->rate == 5) {
            $rating = '
                <span>
                    <i class="fas fa-star"></i>
                </span>
                <span>
                    <i class="fas fa-star"></i>
                </span>
                <span>
                    <i class="fas fa-star"></i>
                </span>
                <span>
                    <i class="fas fa-star"></i>
                </span>
                <span>
                    <i class="fas fa-star"></i>
                </span>
                ';
        } else {
            $rating = '
                <span>
                    <i class="far fa-star"></i>
                </span>
                <span>
                    <i class="far fa-star"></i>
                </span>
                <span>
                    <i class="far fa-star"></i>
                </span>
                <span>
                    <i class="far fa-star"></i>
                </span>
                <span>
                    <i class="far fa-star"></i>
                </span>
    ';
        }
        $output = '
        <span id="star_media">
        ' . $rating . '
        </span>
        ';
        echo json_encode([
            'output' => $output,
            'rating_row' => $rating_row,
            'row' => $row
        ]);
    }

    public function deleteUlasan()
    {
        $id_ulasan = $this->input->post('id_ulasan', true);
        $id_wisata = $this->input->post('id_wisata', true);
        $email = $this->input->post('email', true);
        $row = $this->Ulasan_model->get($id_ulasan)->row();
        $rowRating = $this->db->get_where('ulasan', ['email' => $email, 'wisata_id' => $id_wisata])->num_rows();
        $rating = $this->db->get_where('rating', ['email' => $email, 'wisata_id' => $id_wisata])->row();
        if ($rowRating == 1) {
            $deleteRating = $this->Rating_model->delete($rating->id_rating);
        } else {
            $deleteRating = 0;
        }
        $deleteUlasanNow = $this->Ulasan_model->delete($id_ulasan);
        if ($deleteRating > 0 || $deleteUlasanNow > 0) {
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
}
