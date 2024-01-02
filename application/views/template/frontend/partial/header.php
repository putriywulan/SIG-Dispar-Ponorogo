<?php
$konfigurasi = check_konfigurasi();
$uri = $this->uri->segment(1);
$subUri = $this->uri->segment(2);
$kategori_wisata = check_kategori_wisata();
$auth = new Auth();
$google_client = $auth->connect();

if (isset($_GET["code"])) {
    //It will Attempt to exchange a code for an valid authentication token.
    $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

    //This condition will check there is any error occur during geting authentication token. If there is no any error occur then it will execute if block of code/
    if (!isset($token['error'])) {
        //Set the access token used for requests
        $google_client->setAccessToken($token['access_token']);

        //Store "access_token" value in $this->session->userdata(variable for future use.
        $this->session->set_userdata('access_token',  $token['access_token']);

        //Create Object of Google Service OAuth 2 class
        $google_service = new Google_Service_Oauth2($google_client);

        //Get user profile data from google
        $data = $google_service->userinfo->get();

        //Below you can find Get profile data and store into $this->session->userdata(variable
        if (!empty($data['given_name'])) {
            $this->session->set_userdata('user_first_name', $data['given_name']);
        }

        if (!empty($data['family_name'])) {
            $this->session->set_userdata('user_last_name', $data['family_name']);
        }

        if (!empty($data['email'])) {
            $this->session->set_userdata('user_email_address', $data['email']);
        }

        if (!empty($data['gender'])) {
            $this->session->set_userdata('user_gender', $data['gender']);
        }

        if (!empty($data['picture'])) {
            $this->session->set_userdata('user_image', $data['picture']);
        }
    }
}

$firstName = $this->session->userdata('user_first_name');
$lastName = $this->session->userdata('user_last_name');
$email = $this->session->userdata('user_email_address');
$gender = $this->session->userdata('user_gender');
$image = $this->session->userdata('user_image');
?>
<style>
    .slicknav_menu {
        display: none;
    }

    @media only screen and (max-width: 650px) {
        .slicknav_menu {
            display: block;
        }
    }
</style>
<link rel="stylesheet" href="<?= base_url('public/js/SlickNav-master/dist/slicknav.min.css') ?>">
<header class="entire_header">
    <!-- Logo-area -->
    <div class="logo_area">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-md-4 col-xs-12">
                    <div class="logo">
                        <a href="<?= base_url('Home') ?>"><img width="65px;" src="<?= base_url('public/image/konfigurasi/' . $konfigurasi->gambar_konfigurasi) ?>" alt="">
                        </a> &emsp;
                        <span><?= $konfigurasi->nama_aplikasi; ?></span>
                    </div>
                </div>
                <div class="col-sm-8 col-md-8 col-xs-12">
                    <div class="search-area">
                        <form method="get" action="<?= base_url('SigPonorogo/Wisata/index/') ?>">
                            <div class="control-group">

                                <ul class="categories-filter animate-dropdown">
                                    <li class="text-center">
                                        <i class="fa fa-search"></i> Pencarian
                                    </li>
                                </ul>
                                <input class="search-field" name="search" placeholder="Search here..." />
                                <button type="submit" class="btn btn-default">
                                    <span style="vertical-align: middle; display: flex; padding:6px; justify-content: center;" href="#">
                                        <i class="fas fa-search"></i>
                                    </span>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="logo_right">
                        <span style="width: 100%;"><i class="fa fa-phone"></i> &nbsp; <?= $konfigurasi->no_hp; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- LOGO-AREA:END -->

    <!-- MENU-AREA -->
    <div class="menu-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <nav class="main-menu">
                        <ul id="navigation">
                            <li class="<?= $uri == 'Admin' && $subUri == 'Home' ? 'active' : '' ?>">
                                <a href="<?= base_url('Home') ?>">Home</a>
                            </li>
                            <li><a href="#">Wisata <i class="fa fa-caret-down"></i></a>
                                <ul class="drop_nav">
                                    <?php
                                    foreach ($kategori_wisata as $rKategoriWisata) :
                                    ?>
                                        <li><a href="<?= base_url('SigPonorogo/Wisata/index/' . $rKategoriWisata->id_kategori_wisata) ?>"><?= $rKategoriWisata->nama_kategori_wisata; ?></a></li>
                                    <?php
                                    endforeach;
                                    ?>
                                </ul>
                            </li>
                            <li><a href="<?= base_url('SigPonorogo/Peta') ?>">Peta</a>
                            </li>
                            <?php
                            if (!$this->session->has_userdata('access_token')) {
                                //Create a URL to obtain user authorization
                                $button =
                                    '
                                    <li>
                                        <a href="' . $google_client->createAuthUrl() . '">Login</a>
                                    </li>
                                    ';
                            } else {
                                $button = '
                                <li class="dropdown" style="float:right; cursor:pointer;">
                                    <a style="text-transform:none;" id="drop1" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <img style="border-radius: 30px;" width="30px;" src="' . $image . '"></img> &nbsp;
                                        <span style="">' . $firstName . ' ' . $lastName . '</span><br>
                                        <small>' . $email . '</small>
                                        <span class="caret"></span>
                                    </a>
                                    <ul style="padding:0 10px;" class="dropdown-menu" aria-labelledby="drop1">
                                        <li style="padding:0; 10px">
                                            <a href="' . base_url('SigPonorogo/AuthSession/logout') . '"> Logout</a>
                                        </li>
                                    </ul>
                                </li>';
                            }
                            echo $button;
                            ?>
                        </ul>

                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- MENU-AREA:END -->
</header>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="<?= base_url('public/js/SlickNav-master/dist/jquery.slicknav.min.js') ?>"></script>
<script>
    $('#navigation').slicknav();
</script>