<link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.0/mapbox-gl-directions.css" type="text/css">
<link rel="stylesheet" href="<?= base_url('public/js/starrr-gh-pages/dist/starrr.css') ?>">



<?php
$wisata = check_wisata($id_wisata);
$gambarWisata = check_gambar_wisata($id_wisata);
$c_gmail = new Auth();
$google_client = $c_gmail->connect();

$firstName = $this->session->userdata('user_first_name');
$lastName = $this->session->userdata('user_last_name');
$email = $this->session->userdata('user_email_address');
$gender = $this->session->userdata('user_gender');
$image = $this->session->userdata('user_image');
?>

<style>
    .touch-left iframe {
        width: 100%;
    }

    .contact_map {
        position: relative;
    }

    .contact_map .btn-route-wisata {
        position: absolute;
        top: 10px;
        left: 10px;
        z-index: 9999;
    }

    .touch-left iframe {
        width: 100%;
    }

    .contact_map_area {
        position: relative;
    }

    .btn-rekomendasi {
        position: absolute;
        top: 10px;
        z-index: 9999;
        left: 10px;
    }

    .btn-kategori {
        position: absolute;
        bottom: 40px;
        z-index: 9999;
        left: 60px;
    }

    .btn-toggle-1 {
        position: absolute;
        top: 10px;
        z-index: 9999;
        right: 155px;
    }

    .btn-toggle-2 {
        position: absolute;
        top: 10px;
        z-index: 9999;
        right: 10px;
    }

    body {
        color: #404040;
        font: 400 15px/22px 'Source Sans Pro', 'Helvetica Neue', Sans-serif;
        margin: 0;
        padding: 0;
        -webkit-font-smoothing: antialiased;
    }

    * {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }

    .sidebar {
        position: absolute;
        width: 25%;
        height: 370px;
        top: 50px;
        left: 10px;
        overflow: hidden;
        border-right: 1px solid rgba(0, 0, 0, 0.25);
        z-index: 9999;
        background-color: #fff;
    }

    .pad2 {
        padding: 20px;
    }

    .map {
        position: absolute;
        left: 33.3333%;
        width: 66.6666%;
        top: 0;
        bottom: 0;
    }

    h1 {
        font-size: 22px;
        margin: 0;
        font-weight: 400;
        line-height: 20px;
        padding: 20px 2px;
    }

    a {
        color: #404040;
        text-decoration: none;
    }

    a:hover {
        color: #101010;
    }

    .heading {
        background: #fff;
        border-bottom: 1px solid #eee;
        min-height: 60px;
        line-height: 60px;
        padding: 0 10px;
        background-color: #00853e;
        color: #fff;
    }

    .listings {
        height: 100%;
        overflow: auto;
        padding-bottom: 60px;
    }

    .listings .item {
        display: block;
        border-bottom: 1px solid #eee;
        padding: 10px;
        text-decoration: none;
    }

    .listings .item:last-child {
        border-bottom: none;
    }

    .listings .item .title {
        display: block;
        color: #00853e;
        font-weight: 700;
    }

    .listings .item .title small {
        font-weight: 400;
    }

    .listings .item.active .title,
    .listings .item .title:hover {
        color: #8cc63f;
    }

    .listings .item.active {
        background-color: #f8f8f8;
    }

    ::-webkit-scrollbar {
        width: 3px;
        height: 3px;
        border-left: 0;
        background: rgba(0, 0, 0, 0.1);
    }

    ::-webkit-scrollbar-track {
        background: none;
    }

    ::-webkit-scrollbar-thumb {
        background: #00853e;
        border-radius: 0;
    }

    .clearfix {
        display: block;
    }

    .clearfix:after {
        content: '.';
        display: block;
        height: 0;
        clear: both;
        visibility: hidden;
    }

    /* Marker tweaks */
    .mapboxgl-popup {
        padding-bottom: 50px;
    }

    .mapboxgl-popup-close-button {
        display: none;
    }

    .mapboxgl-popup-content {
        font: 400 15px/22px 'Source Sans Pro', 'Helvetica Neue', Sans-serif;
        padding: 0;
        width: 180px;
    }

    .mapboxgl-popup-content-wrapper {
        padding: 1%;
    }

    .mapboxgl-popup-content h3 {
        background: #91c949;
        color: #fff;
        margin: 0;
        display: block;
        padding: 10px;
        border-radius: 3px 3px 0 0;
        font-weight: 700;
        margin-top: -15px;
    }

    .mapboxgl-popup-content h4 {
        margin: 0;
        display: block;
        padding: 10px 10px 10px 10px;
        font-weight: 400;
    }

    .mapboxgl-popup-content div {
        padding: 10px;
    }

    .mapboxgl-container .leaflet-marker-icon {
        cursor: pointer;
    }

    .mapboxgl-popup-anchor-top>.mapboxgl-popup-content {
        margin-top: 15px;
    }

    .mapboxgl-popup-anchor-top>.mapboxgl-popup-tip {
        border-bottom-color: #91c949;
    }

    .mapboxgl-ctrl-geocoder {
        border: 2px solid #00853e;
        border-radius: 0;
        position: relative;
        top: 0;
        width: 800px;
        margin-top: 0;
        border: 0;
    }

    .mapboxgl-ctrl-geocoder>div {
        min-width: 100%;
        margin-left: 0;
    }

    .mapboxgl-ctrl-geocoder {
        width: 0px;
    }

    .mapboxgl-ctrl-top-left .mapboxgl-ctrl {

        position: relative;
        left: 130%;
        width: 300px;
    }

    .mapboxgl-ctrl-geocoder input[type='text'] {
        padding-left: 20px;
        ;
    }

    .mapboxgl-ctrl-geocoder input::placeholder {
        padding-left: 20px;
    }

    .mapboxgl-popup {
        max-width: 200px;
    }

    .mapboxgl-popup-content {
        text-align: center;
        font-family: 'Open Sans', sans-serif;
    }

    .mapboxgl-ctrl-geocoder.mapboxgl-ctrl {
        display: none;
    }

    .text-danger {
        color: #FF3D68;
    }

    #star_media {
        font-size: 14px;
        color: #FFD119;
    }
</style>
<div class="main_slider">
    <div class="tp-banner-container">
        <div class="tp-banner">
            <ul>
                <li data-transition="zoomout" data-slotamount="7" data-masterspeed="1000">
                    <!-- MAIN IMAGE -->
                    <img src="<?= base_url('public/image/wisata/' . $wisata->gambar) ?>" alt="darkblurbg">
                    <!-- LAYER NR. 1 -->
                    <div class="tp-caption black_heavy_60 skewfromleftshort tp-resizeme rs-parallaxlevel-0" data-x="50" data-y="133" data-speed="500" data-start="1850" data-easing="Power3.easeInOut" data-splitin="chars" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" style="z-index: 7; max-width: auto; max-height: auto; white-space: nowrap;"><?= $wisata->nama_wisata; ?>
                    </div>
                    <!-- LAYER NR. 2 -->
                    <div class="tp-caption grey_regular_18 customin tp-resizeme rs-parallaxlevel-0" data-x="50" data-y="200" data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="500" data-start="2600" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.05" data-endelementdelay="0.1" style="z-index: 9; max-width: auto; max-height: auto; white-space: nowrap;">
                        <div style="text-align:left; color:#fff; font-weight:bold;">
                            <?= $wisata->alamat_wisata ?>
                        </div>
                    </div>
                    <!-- LAYER NR. 3 -->
                </li>
                <?php $no = 1;
                foreach ($gambarWisata as $index => $vGambarWisata) : ?>
                    <li data-transition="zoomout" data-slotamount="7" data-masterspeed="1000">
                        <!-- MAIN IMAGE -->
                        <img src="<?= base_url('public/image/wisatalainnya/' . $vGambarWisata->nama_gambar_wisata) ?>" alt="darkblurbg">
                        <!-- LAYER NR. 1 -->
                        <div class="tp-caption black_heavy_60 skewfromleftshort tp-resizeme rs-parallaxlevel-0" data-x="50" data-y="133" data-speed="500" data-start="1850" data-easing="Power3.easeInOut" data-splitin="chars" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" style="z-index: 7; max-width: auto; max-height: auto; white-space: nowrap;">

                        </div>
                        <!-- LAYER NR. 2 -->
                        <div class="tp-caption grey_regular_18 customin tp-resizeme rs-parallaxlevel-0" data-x="50" data-y="200" data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="500" data-start="2600" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.05" data-endelementdelay="0.1" style="z-index: 9; max-width: auto; max-height: auto; white-space: nowrap;">
                            <div style="text-align:left;">
                            </div>
                        </div>
                        <!-- LAYER NR. 3 -->
                    </li>
                <?php endforeach; ?>

            </ul>
            <div class="tp-bannertimer"></div>
        </div>
    </div>
</div>
<div class="title-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="bred-title">
                    <h3>Wisata</h3>
                </div>
                <ol class="breadcrumb">
                    <li><a href="<?= base_url('Home') ?>">Home</a>
                    </li>
                    <li><a href="<?= base_url('SigPonorogo/Wisata/index/' . $wisata->kategori_wisata_id) ?>">Kategori Wisata</a>
                    </li>
                    <li><a href="<?= base_url('SigPonorogo/Wisata/detail/' . $wisata->id_wisata) ?>">Wisata</a>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="contact_map_area">
    <div class="map_wrapper">
        <div class="contact_map">
            <a href="#" class="btn btn-primary btn-sm btn-route-wisata"><i class="fas fa-route"></i> Rute</a>
            <div id="map" style="width:100%; height: 650px;"></div>
        </div>
    </div>
</div>


<div class="touch-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="headline">
                    <h2><?= $wisata->nama_wisata; ?></h2>
                </div>
                <div class="stay-left">
                    <p><?= $wisata->deskripsi_wisata ?></p>
                    <form method="post">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="touch-left">
                                    Video
                                    <br>
                                    <?= $wisata->vidio; ?>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 20px;">
                            <div class="col-md-6">
                                <div class="touch-single">
                                    Fasilitas
                                    <br>
                                    <?php
                                    $fasilitas = $wisata->fasilitas_id;
                                    $fasilitasId = explode(',', $fasilitas);
                                    foreach ($fasilitasId as $vFasilitas) {
                                        $getFasilitas = check_fasilitas($vFasilitas);
                                    ?>
                                        <span style="margin-right: 20px;"><i class="fas fa-check"></i> <?= $getFasilitas->nama_fasilitas; ?></span>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="touch-single">
                                    Harga tiket masuk
                                    <br>
                                    <?= rupiah($wisata->harga_tiket_masuk); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-6">
                                <div class="touch-single">
                                    Buka
                                    <br>
                                    <?= $wisata->buka; ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="touch-single">
                                    Tutup
                                    <br>
                                    <?= $wisata->tutup; ?>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-12">
                                <div class="touch-left">
                                    Hari Buka
                                    <br>
                                    <?php
                                    $hari_buka = explode(',', $wisata->hari_buka);
                                    foreach ($hari_buka as $vHariBuka) {
                                        echo '<i class="fas fa-tag"></i> <span>' . $vHariBuka . '</span><br>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-6" style="margin-top: 10px;">
                                <div class="touch-single">
                                    Kabupaten
                                    <br>
                                    <i class="fas fa-map-pin"></i> <?= $kabupaten->nama; ?>
                                </div>
                            </div>
                            <div class="col-md-6" style="margin-top: 10px;">
                                <div class="touch-single">
                                    Kecamatan
                                    <br>
                                    <i class="fas fa-map-pin"></i> <?= $kecamatan->nama; ?>
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-top: 10px;">
                                <div class="touch-single">
                                    Kelurahan
                                    <br>
                                    <i class="fas fa-map-pin"></i> <?= $kelurahan->nama; ?>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-md-3">
                <div class="stay-single">
                    <i class="fa fa-map-marker"></i>
                    <div class="stay-text">
                        <h5>Address :</h5>
                        <p>
                            <?= $wisata->alamat_wisata; ?>
                        </p>
                    </div>
                </div>
                <div class="stay-single">
                    <div class="stay-single">
                        <i class="fab fa-facebook"></i>
                        <div class="stay-text">
                            <h5>Facebook :</h5>
                            <p>
                                <a href="<?= $wisata->facebook; ?>" target="_blank">Facebook</a>

                            </p>
                        </div>
                    </div>
                </div>
                <div class="stay-single">
                    <div class="stay-single">
                        <i class="fab fa-twitter"></i>
                        <div class="stay-text">
                            <h5>Twitter :</h5>
                            <p>
                                <a href="<?= $wisata->twitter; ?>" target="_blank">Twitter</a>

                            </p>
                        </div>
                    </div>
                </div>
                <div class="stay-single">
                    <div class="stay-single">
                        <i class="fab fa-instagram"></i>
                        <div class="stay-text">
                            <h5>Instagram :</h5>
                            <p>
                                <a href=" <?= $wisata->instagram; ?>" target="_blank">Instagram</a>

                            </p>
                        </div>
                    </div>
                </div>
                <div class="stay-single">
                    <div class="stay-single">
                        <i class="fas fa-phone"></i>
                        <div class="stay-text">
                            <h5>Kontak :</h5>
                            <p>
                                <?= $wisata->kontak; ?>

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-12">
                <div class="headline">
                    <h2>REVIEW DAN ULASAN</h2>
                    <form action="" method="post">
                        <input type="hidden" name="page" value="add">
                        <div class="stay-left" style="margin-top: 20px;">
                            <?php
                            $rating = '
                          <div class="form-group">
                              <h5>Click to rate:</h5>
                              <div class="starrr" id="star1"></div>
                              <div>
                                  <span class="your-choice-was" style="display: none;">
                                      Your rating was <span class="choice"></span>.
                                  </span><br>
                                  <span class="error_rating"></span>
                              </div>
                          </div>
                          ';
                            echo $rating;
                            ?>

                            <div class="form-group">
                                <label for="">Tulis Ulasan</label>
                                <textarea name="ulasan" id="ulasan" cols="30" rows="10" class="form-control ulasan" placeholder="Tuliskan ulasan anda" style="border: 1px solid #ccc;">
                                </textarea>
                                <span class="error_ulasan"></span>
                            </div>
                            <div class="form-group">
                                <?php
                                if (!$this->session->has_userdata('access_token')) {
                                    //Create a URL to obtain user authorization
                                    $button = '<a style="background-color:#eaeaea;" class="btn btn-dark btn-lg" href="' . $google_client->createAuthUrl() . '">
                                    <img src="https://img.icons8.com/color/452/google-logo.png" width="20px;" /> Login</a>';
                                } else {
                                    $button = '<button type="submit" class="btn btn-dark btn-lg shadow-lg btn-submit"><i class="fas fa-paper-plane"></i> Submit</button>';
                                }
                                echo $button;
                                ?>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-lg-12">
                <div class="headline">
                    <h2>REVIEW ULASAN</h2>
                    <div id="media_output" style="margin-top: 20px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modalEditLabel">Edit</h4>
            </div>
            <form action="" method="post">
                <input type="hidden" name="page_edit" value="edit">
                <input type="hidden" name="id_ulasan">
                <div class="modal-body">
                    <div class="form-group">
                        <h5>Click to rate:</h5>
                        <div class="starrr" id="star2"></div>
                        <div id="load_star_edit"></div>
                        <span id="html_star"></span>
                        <div>
                            <span class="your-choice-was" style="display: none;">
                                Your rating was <span class="choice"></span>.
                            </span><br>
                            <span class="error_rating_edit"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Ulasan</label>
                        <textarea name="ulasan_edit" id="ulasan" cols="30" rows="10" class="form-control ulasan" placeholder="Tuliskan ulasan anda" style="border: 1px solid #ccc"></textarea>
                        <span class="error_ulasan_edit"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="fas fa-window-close"></i> Close</button>
                    <?php
                    if (!$this->session->has_userdata('access_token')) {
                        //Create a URL to obtain user authorization
                        $button = '<a style="background-color:#eaeaea;" class="btn btn-dark btn-lg" href="' . $google_client->createAuthUrl() . '">
                                    <img src="https://img.icons8.com/color/452/google-logo.png" width="20px;" /> Login</a>';
                    } else {
                        $button = '<button type="submit" class="btn btn-dark shadow-lg btn-submit-edit"><i class="fas fa-paper-plane"></i> Submit</button>';
                    }
                    echo $button;
                    ?>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.js"></script>
<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.0/mapbox-gl-directions.js"></script>
<script src="<?= base_url('public/js/starrr-gh-pages/dist/starrr.js') ?>"></script>
<script src="<?= base_url('node_modules/sweetalert2/dist/sweetalert2.min.js') ?>"></script>
<script>
    $('#star1').starrr({
        change: function(e, value) {
            if (value) {
                $('.your-choice-was').show();
                $('.choice').text(value);
            } else {
                $('.your-choice-was').hide();
            }
        }
    });
    $('#star2').starrr({
        change: function(e, value) {
            if (value) {
                $('.your-choice-was').show();
                $('.choice').text(value);
            } else {
                $('.your-choice-was').hide();
            }
        }
    });
</script>
<script type="text/javascript" src="<?= base_url('assets/frontend/ecomshop/') ?>js/jQuery.2.1.4.js"></script>
<script src='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js'></script>
<script>
    $(document).ready(function() {
        var pane = $('#ulasan');
        pane.val($.trim(pane.val()).replace(/\s*[\r\n]+\s*/g, '\n')
            .replace(/(<[^\/][^>]*>)\s*/g, '$1')
            .replace(/\s*(<\/[^>]+>)/g, '$1'));

        mapboxgl.accessToken = 'pk.eyJ1IjoiYmltYWVnYTEyIiwiYSI6ImNrcXFxbDd6cTAza3oyd215dDNvNWJ2d20ifQ.obyTqre9zTXcmd5XXWvw1A';
        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v11',
            center: [111.467604, -7.867153],
            zoom: 12
        });


        var longitude = <?= $wisata->longitude != null ? $wisata->longitude : 111.467604; ?>;
        var latitude = <?= $wisata->latitude != null ? $wisata->latitude : -7.867153; ?>;

        var marker = new mapboxgl.Marker({
                draggable: false
            })

            .setLngLat([longitude, latitude])
            .addTo(map);

        // geolocate
        var geolocate = new mapboxgl.GeolocateControl({
            positionOptions: {
                enableHighAccuracy: true
            },
            trackUserLocation: true
        });
        // Add the control to the map.
        map.addControl(geolocate, 'bottom-left');

        // when a geolocate event occurs.
        geolocate.on('geolocate', function(e) {
            var lon = e.coords.longitude;
            var lat = e.coords.latitude
            var position = [lon, lat];
            console.log(position);
        });

        // navigation
        // Add zoom and rotation controls to the map.
        map.addControl(new mapboxgl.NavigationControl(), 'bottom-left');
        // fullscreen
        map.addControl(new mapboxgl.FullscreenControl(), 'bottom-left');
        // direction
        var directions = new MapboxDirections({
            accessToken: mapboxgl.accessToken,
            interactive: false
        });

        // click map
        map.on('click', function(e) {
            const lnglat = (e.lngLat);
            const longitude = lnglat.lng;
            const latitude = lnglat.lat;
            const location = [longitude, latitude];
            $.ajax({
                url: 'https://api.mapbox.com/geocoding/v5/mapbox.places/' + location + '.json?access_token=pk.eyJ1IjoiYmltYWVnYTEyIiwiYSI6ImNrcXFxbDd6cTAza3oyd215dDNvNWJ2d20ifQ.obyTqre9zTXcmd5XXWvw1A',
                type: 'get',
                dataType: 'json',
                success: function(data) {
                    const locate = data.features[0].place_name;
                    var popUp = new mapboxgl.Popup({
                            closeOnClick: true
                        })
                        .setLngLat(location)
                        .setHTML(`<h3 style="font-size:12px;">You Clicked Here
						</h3>
							<i class="fas fa-window-close text-danger clost-pop-up" style="position:absolute; cursor:pointer; top:-10px; right:5px;"></i>
						<br>
					<div style="display:block;">
						<span style="font-size:12px;">Anda berada di lokasi: ` + locate + `</span>
					</div>
					<hr style="margin:0;padding:0;">
					<div style="display:flex; justify-content:space-between;">
						<a style="font-size:10px;" class='set_lokasi_awal' data-locate='` + locate + `' href="#">Set Origin</a>
						<a style="font-size:10px;" class='set_lokasi_tujuan' data-locate='` + locate + `' href="#">Set Destination</a>
					</div>
					`)
                        .addTo(map);

                    $(document).on('click', '.set_lokasi_awal', function(e) {
                        e.preventDefault();
                        $(".mapboxgl-ctrl-directions.mapboxgl-ctrl").css('display', 'block');
                        var locate = $(this).data('locate');
                        directions.setOrigin(locate);

                    })
                    $(document).on('click', '.set_lokasi_tujuan', function(e) {
                        e.preventDefault();
                        $(".mapboxgl-ctrl-directions.mapboxgl-ctrl").css('display', 'block');
                        var locate = $(this).data('locate');
                        directions.setDestination(locate);
                    })

                    $(document).on('click', '.clost-pop-up', function() {
                        popUp.remove();
                    })

                },
                error: function(x, t, m) {
                    console.log(x.responseText);
                }
            })

        });


        $(document).on('click', '.mapbox-directions-origin .mapboxgl-ctrl-geocoder input', function() {
            navigator.geolocation.getCurrentPosition(position => {
                var from = [position.coords.longitude, position.coords.latitude];
                $.ajax({
                    url: 'https://api.mapbox.com/geocoding/v5/mapbox.places/' + from + '.json?access_token=pk.eyJ1IjoiYmltYWVnYTEyIiwiYSI6ImNrcXFxbDd6cTAza3oyd215dDNvNWJ2d20ifQ.obyTqre9zTXcmd5XXWvw1A',
                    type: 'get',
                    dataType: 'json',
                    success: function(data) {
                        const locate = data.features[0].place_name;
                        $('#mapbox-directions-destination-input .suggestions').css('display', 'block');
                        var list = `
									<li class="click_lokasi_saya"><a><strong>Lokasi Saya</strong></a></li>
									`;

                        $('#mapbox-directions-destination-input .suggestions').html(list);

                        $(document).on('click', '.click_lokasi_saya', function(e) {
                            e.preventDefault();
                            directions.setOrigin(locate);
                            $('#mapbox-directions-destination-input .suggestions').css('display', 'none');
                        })
                    },
                    error: function(x, t, m) {
                        console.log(x.responseText);
                    }
                })
            })
        })


        map.addControl(directions, 'top-right');

        // detail wisata
        $(document).on('click', '.btn-route-wisata', function(e) {
            e.preventDefault();

            var longitude = <?= $wisata->longitude != null ? $wisata->longitude : 111.467604; ?>;
            var latitude = <?= $wisata->latitude != null ? $wisata->latitude : -7.867153; ?>;


            navigator.geolocation.getCurrentPosition(position => {
                var from = [position.coords.longitude, position.coords.latitude];
                var to = [longitude, latitude];
                $.ajax({
                    url: 'https://api.mapbox.com/geocoding/v5/mapbox.places/' + from + '.json?access_token=pk.eyJ1IjoiYmltYWVnYTEyIiwiYSI6ImNrcXFxbDd6cTAza3oyd215dDNvNWJ2d20ifQ.obyTqre9zTXcmd5XXWvw1A',
                    type: 'get',
                    dataType: 'json',
                    success: function(data) {
                        const from = data.features[0].place_name;
                        $.ajax({
                            url: 'https://api.mapbox.com/geocoding/v5/mapbox.places/' + to + '.json?access_token=pk.eyJ1IjoiYmltYWVnYTEyIiwiYSI6ImNrcXFxbDd6cTAza3oyd215dDNvNWJ2d20ifQ.obyTqre9zTXcmd5XXWvw1A',
                            type: 'get',
                            dataType: 'json',
                            success: function(data) {
                                const to = data.features[0].place_name;
                                directions.setOrigin(from); // can be address in form setOrigin("12, Elm Street, NY")
                                let bounds = new mapboxgl.LngLatBounds();
                                bounds.extend(from);
                                bounds.extend(to);
                                directions.setDestination(to) // can be address

                                map.fitBounds(bounds, {
                                    padding: 90,
                                    duration: 1000
                                });
                            },
                            error: function(x, t, m) {
                                console.log(x.responseText);
                            }
                        })


                    },
                    error: function(x, t, m) {
                        console.log(x.responseText);
                    }
                })



            })
        })


        function clearForm() {
            $('textarea[name="ulasan"]').css({
                border: '1px solid #ccc'
            }).val('');
            $('.error_ulasan').html('').removeClass('text-danger');
            $('.error_rating').html('').removeClass('text-danger');
            $('textarea[name="ulasan_edit"]').css({
                border: '1px solid #ccc'
            }).val('');
            $('.error_ulasan_edit').html('').removeClass('text-danger');
            $('.error_rating_edit').html('').removeClass('text-danger');
            $('#star1 a').attr('class', 'far fa-star');
            $('#star2 a').attr('class', 'far fa-star');

        }

        $(document).on('click', '.btn-submit', function(e) {
            e.preventDefault();
            let rating = [];
            rating = $('#star1 a[class="fas fa-star"]').length;
            let ulasan = $('textarea[name="ulasan"]').val();
            let page = $('input[name="page"]').val();
            $.ajax({
                url: '<?= base_url('SigPonorogo/Wisata/rating') ?>',
                method: 'post',
                dataType: 'json',
                data: {
                    rating,
                    ulasan,
                    id_wisata: '<?= $id_wisata ?>',
                    firstName: '<?= $firstName ?>',
                    lastName: '<?= $lastName ?>',
                    email: '<?= $email ?>',
                    gender: '<?= $gender ?>',
                    image: '<?= $image ?>',
                    page: page
                },
                success: function(data) {
                    if (data.status == 'error') {
                        if (data.output.ulasan != null) {
                            $('textarea[name="ulasan"]').css({
                                border: '1px solid #FF3D68'
                            });
                            $('.error_ulasan').addClass('text-danger').html(data.output.ulasan);
                        }
                        if (data.output.rating != null) {
                            $('.error_rating').addClass('text-danger').html(data.output.rating);
                        }
                    }
                    if (data.status_alert == 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Successfully',
                            text: data.msg,
                            showConfirmButton: false,
                            timer: 1500
                        })
                        clearForm();
                        load();
                        $('form')[0].reset();
                    } else {
                        if (data.status_alert == 'error') {
                            Swal.fire({
                                icon: 'error',
                                title: 'Fail!',
                                text: data.msg,
                                showConfirmButton: false,
                                timer: 1500
                            })
                        }
                    }
                },
                error: function(x, t, m) {
                    console.log(x.responseText);
                }
            })
        })

        $(document).on('click', '.btn-submit-edit', function(e) {
            e.preventDefault();
            let rating = [];
            rating = $('#star2 a[class="fas fa-star"]').length;
            let ulasan = $('textarea[name="ulasan_edit"]').val();
            let page = $('input[name="page_edit"]').val();
            let id_ulasan = $('input[name="id_ulasan"]').val();
            $.ajax({
                url: '<?= base_url('SigPonorogo/Wisata/rating') ?>',
                method: 'post',
                dataType: 'json',
                data: {
                    rating,
                    ulasan,
                    id_wisata: '<?= $id_wisata ?>',
                    firstName: '<?= $firstName ?>',
                    lastName: '<?= $lastName ?>',
                    email: '<?= $email ?>',
                    gender: '<?= $gender ?>',
                    image: '<?= $image ?>',
                    page: page,
                    id_ulasan: id_ulasan
                },
                success: function(data) {
                    console.log(data);
                    if (data.status == 'error') {
                        if (data.output.ulasan != null) {
                            $('textarea[name="ulasan_edit"]').css({
                                border: '1px solid #FF3D68'
                            });
                            $('.error_ulasan_edit').addClass('text-danger').html(data.output.ulasan);
                        }
                        if (data.output.rating != null) {
                            $('.error_rating_edit').addClass('text-danger').html(data.output.rating);
                        }
                    }
                    if (data.status_alert == 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Successfully',
                            text: data.msg,
                            showConfirmButton: false,
                            timer: 1500
                        })
                        clearForm();
                        load();
                        $('form')[0].reset();
                        $('#modalEdit').modal('hide');
                    } else {
                        if (data.status_alert == 'error') {
                            Swal.fire({
                                icon: 'error',
                                title: 'Fail!',
                                text: data.msg,
                                showConfirmButton: false,
                                timer: 1500
                            })
                        }
                    }
                },
                error: function(x, t, m) {
                    console.log(x.responseText);
                }
            })
        })

        $(document).on('click', '.btn-edit', function(e) {
            e.preventDefault();
            const id_ulasan = $(this).data('id');
            let rating = [];
            rating = $('#star2 a[class="fas fa-star"]').length;
            let ulasan = $('textarea[name="ulasan"]').val();
            $('input[name="id_ulasan"]').val(id_ulasan);
            $.ajax({
                url: '<?= base_url('SigPonorogo/Wisata/editUlasan') ?>',
                method: 'post',
                dataType: 'json',
                data: {
                    id_ulasan: id_ulasan,
                    email: '<?= $email ?>',
                    id_wisata: '<?= $id_wisata ?>'
                },
                success: function(data) {
                    console.log(data);
                    $('textarea[name="ulasan_edit"]').val(data.row.message);
                    $('#load_star_edit').html(`
                    <span style="margin-top:15px;">Penilaian anda sebelumnya: </span> <br>
                    ` + data.output + `
                    `);
                },
                error: function(x, t, m) {
                    console.log(x.responseText);
                }
            })
        })


        $(document).on('click', '.btn-delete', function(e) {
            e.preventDefault();
            const id_ulasan = $(this).data("id");
            Swal.fire({
                title: 'Deleted',
                text: "Yakin ingin menghapus item ini?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '<?= base_url('SigPonorogo/Wisata/deleteUlasan') ?>',
                        dataType: 'json',
                        type: 'post',
                        data: {
                            id_ulasan: id_ulasan,
                            email: '<?= $email ?>',
                            id_wisata: '<?= $id_wisata ?>'
                        },
                        success: function(data) {
                            console.log(data);
                            if (data.status == 'success') {
                                Swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                );
                                load();
                            } else {
                                Swal.fire(
                                    'Fail!',
                                    'Your file has been not deleted.',
                                    'error'
                                )
                            }

                        },
                        error: function(x, t, m) {
                            console.log(x.responseText);
                        }
                    })
                }
            })

        })

        // sweet alert
        const success = "<?= $this->session->flashdata('success'); ?>";
        const error = "<?= $this->session->flashdata('error'); ?>";
        if (success != '') {
            Swal.fire({
                icon: 'success',
                title: 'Successfully',
                text: success,
                showConfirmButton: false,
                timer: 1500
            }).then((result) => {
                window.location = "<?= base_url('SigPonorogo/Wisata/detail/' . $id_wisata) ?>";
            })
        }
        if (error != '') {
            Swal.fire({
                icon: 'error',
                title: 'Fail',
                text: error,
                showConfirmButton: true,
            })
        }
        load();

        function load() {
            $.ajax({
                url: '<?= base_url('SigPonorogo/Wisata/outputUlasan') ?>',
                method: 'post',
                dataType: 'json',
                data: {
                    id_wisata: '<?= $id_wisata ?>'
                },
                success: function(data) {
                    console.log(data);
                    $('#media_output').html(data.output);
                },
                error: function(x, t, m) {
                    console.log(x.responseText);
                }
            })
        }
    })
</script>
