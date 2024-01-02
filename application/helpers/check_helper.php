<?php
function timeZone()
{
    $ci = &get_instance();
    date_default_timezone_set('Asia/Jakarta');
}

function check_not_login()
{
    $ci = &get_instance();
    $url = current_url();

    if (!$ci->session->has_userdata('id_users')) {
        redirect(base_url('Login?url=' . $url));
    }
}
function check_already_login()
{
    $ci = &get_instance();
    $ci->load->model('Users_model');
    if (get_cookie('cookie')) {
        $cookie = get_cookie('cookie');
        $get = $ci->Users_model->getCookie($cookie)->row();
        $data = [
            'id_users' => $get->id_users
        ];
        $ci->session->set_userdata($data);
    }
    $session = $ci->session->userdata('id_users');
    if ($session != null) {
        $ci->session->set_flashdata('success', 'Anda sudah login');
        return redirect(base_url('Admin/Home'));
    }
}
function check_konfigurasi()
{
    $ci = &get_instance();
    $ci->load->model('Konfigurasi_model');
    $row = $ci->Konfigurasi_model->get()->row();
    return $row;
}
function check_profile()
{
    $ci = &get_instance();
    $id_users = $ci->session->userdata('id_users');
    $ci->load->model('Users_model');
    $row = $ci->Users_model->joinProfile($id_users)->row();
    return $row;
}
function rupiah($nominal)
{
    return number_format($nominal, 2, '.', ',');
}
function check_users($id_users = null)
{
    $ci = &get_instance();
    $ci->load->model('Users_model');
    if ($id_users != null) {
        $row = $ci->Users_model->joinProfile($id_users)->row();
    } else {
        $row = $ci->Users_model->joinProfile($id_users)->result();
    }
    return $row;
}

function check_icon($id_icon = null)
{
    $ci = &get_instance();
    $ci->load->model('Icon_model');
    if ($id_icon != null) {
        $row = $ci->Icon_model->get($id_icon)->row();
    } else {
        $row = $ci->Icon_model->get($id_icon)->result();
    }
    return $row;
}
function check_fasilitas($id_fasilitas = null)
{
    $ci = &get_instance();
    $ci->load->model('Fasilitas_model');
    if ($id_fasilitas != null) {
        $row = $ci->Fasilitas_model->get($id_fasilitas)->row();
    } else {
        $row = $ci->Fasilitas_model->get($id_fasilitas)->result();
    }
    return $row;
}
function check_kategori_wisata($id_kategori_wisata = null)
{
    $ci = &get_instance();
    $ci->load->model('Kategori_wisata_model');
    if ($id_kategori_wisata != null) {
        $row = $ci->Kategori_wisata_model->get($id_kategori_wisata)->row();
    } else {
        $row = $ci->Kategori_wisata_model->get($id_kategori_wisata)->result();
    }
    return $row;
}

function check_wisata($id_wisata = null, $id_kategori_wisata = null)
{
    $ci = &get_instance();
    $ci->load->model('Wisata_model');
    if ($id_wisata != null) {
        $row = $ci->Wisata_model->get($id_wisata, $id_kategori_wisata)->row();
    } else {
        $row = $ci->Wisata_model->get($id_wisata, $id_kategori_wisata)->result();
    }
    return $row;
}

function check_gambar_wisata($id_wisata = null)
{
    $ci = &get_instance();
    $ci->load->model('Wisata_model');
    $row = $ci->Wisata_model->getLainnya($id_wisata)->result();
    return $row;
}
function wordText($text, $limit)
{
    if (strlen($text) > $limit) {
        $word = strip_tags($text);
        $word = mb_substr($word, 0, $limit) . " ... ";
    } else {
        $word = $text;
    }
    return ($word);
}


function relative_time($datetime)
{
    $CI = &get_instance();
    $CI->lang->load('date');

    if (!is_numeric($datetime)) {
        $val = explode(" ", $datetime);
        $date = explode("-", $val[0]);
        $time = explode(":", $val[1]);
        $datetime = mktime($time[0], $time[1], $time[2], $date[1], $date[2], $date[0]);
    }

    $difference = time() - $datetime;
    $periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
    $lengths = array("60", "60", "24", "7", "4.35", "12", "10");

    if ($difference > 0) {
        $ending = $CI->lang->line('date_ago');
    } else {
        $difference = -$difference;
        $ending = $CI->lang->line('date_to_go');
    }
    for ($j = 0; $difference >= $lengths[$j]; $j++) {
        $difference /= $lengths[$j];
    }
    $difference = round($difference);

    if ($difference != 1) {
        $period = strtolower($CI->lang->line('date_' . $periods[$j] . 's'));
    } else {
        $period = strtolower($CI->lang->line('date_' . $periods[$j]));
    }

    return "$difference $period $ending";
}

function checkLog($pesan)
{
    date_default_timezone_set('Asia/Jakarta');
    $ci = &get_instance();
    $ci->load->model('Log_model');
    $id_users = $ci->session->userdata('id_users');

    $data = [
        'users_id' => $id_users,
        'aktifitas' => $pesan,
        'diinsert_pada' => date('Y-m-d H:i:s')
    ];
    $insert = $ci->Log_model->insert($data);
}
function tanggal_indo_convert($tanggal)
{
    $get = explode('-', $tanggal);
    $tanggal_in = $get[0];
    $bulan_in = $get[1];
    $tahun_in = $get[2];
    $fix_tanggal = $tahun_in . '-' . $bulan_in . '-' . $tanggal_in;
    return $fix_tanggal;
}
function tanggal_indo($tanggal)
{
    $get = explode('-', $tanggal);
    $tahun_in = $get[0];
    $bulan_in = $get[1];
    $tanggal_in = $get[2];
    $fix_tanggal = $tanggal_in . '-' . $bulan_in . '-' . $tahun_in;
    return $fix_tanggal;
}
function tanggal_waktu_indo($tanggal)
{
    $get = explode('-', $tanggal);
    $tanggal_in = $get[2];
    $exp_tanggal = explode(' ', $tanggal_in);
    $waktu = explode(':', $exp_tanggal[1]);

    $bulan_in = $get[1];
    $tahun_in = $get[0];
    $fix_tanggal = $exp_tanggal[0] . '-' . $bulan_in . '-' . $tahun_in . ' ' . $waktu[0] . ':' . $waktu[1];

    $output = $fix_tanggal;
    return $output;
}
