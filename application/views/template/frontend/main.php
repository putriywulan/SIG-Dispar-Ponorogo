<?php
$konfigurasi = check_konfigurasi();
$uri = $this->uri->segment(1);
$subUri = $this->uri->segment(2);
?>
<!DOCTYPE html>

<html lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>

    <!-- Font css  -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:400,400italic,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?= base_url('assets/frontend/ecomshop/') ?>fonts/fonts.css">

    <!-- Fontawesome css      -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="<?= base_url('assets/frontend/ecomshop/') ?>css/normalize.css">

    <!-- Bootstrap css      -->
    <link rel="stylesheet" href="<?= base_url('assets/frontend/ecomshop/') ?>css/bootstrap.css">

    <!-- Owncarousel css      -->
    <link rel="stylesheet" href="<?= base_url('assets/frontend/ecomshop/') ?>css/owl.carousel.css">

    <!-- image zoom -->
    <link rel="stylesheet" href="<?= base_url('assets/frontend/ecomshop/') ?>css/glasscase.css">
    <link rel="stylesheet" href="<?= base_url('assets/frontend/ecomshop/') ?>css/glasscase.minf195.css">

    <!-- CSS STYLE-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/frontend/ecomshop/') ?>css/style.css" media="screen" />

    <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/frontend/ecomshop/') ?>css/extralayers.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/frontend/ecomshop/') ?>rs-plugin/css/settings.css" media="screen" />

    <!-- Main css   -->
    <link rel="stylesheet" href="<?= base_url('assets/frontend/ecomshop/') ?>style.css">
    <link rel="stylesheet" href="<?= base_url('assets/frontend/ecomshop/') ?>css/responsive.css">

    <!-- Favicons -->
    <link rel="apple-touch-icon-precomposed" href="<?= base_url('assets/frontend/ecomshop/') ?>images/apple-touch-icon-precomposed.png">
    <link rel="shortcut icon" type="image/png" href="<?= base_url('public/image/konfigurasi/' . $konfigurasi->gambar_konfigurasi) ?>" />
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.css' rel='stylesheet' />
    <link rel="stylesheet" href="<?= base_url('node_modules/sweetalert2/dist/sweetalert2.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('public/js/SlickNav-master/dist/slicknav.min.css') ?>">



    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
	  <script src="<?= base_url('assets/frontend/ecomshop/') ?>https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="<?= base_url('assets/frontend/ecomshop/') ?>https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="<?= base_url('assets/frontend/ecomshop/') ?>http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <!--  HEADER-AREA  -->
    <?= $header ?>
    <!-- Header-AREA END -->

    <?= $content; ?>

    <!-- Entire FOOTER START -->
    <?= $footer; ?>

    <!-- Entire FOOTER END -->

    <!-- jQuery latest -->
    <script type="text/javascript" src="<?= base_url('assets/frontend/ecomshop/') ?>js/jQuery.2.1.4.js"></script>

    <!-- js Modernizr -->
    <script src="<?= base_url('assets/frontend/ecomshop/') ?>js/modernizr-2.6.2.min.js"></script>

    <!-- js Modernizr -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>

    <!-- js CounterUp -->
    <script src="<?= base_url('assets/frontend/ecomshop/') ?>js/jquery.counterup.min.js"></script>

    <!-- Revolution slider -->
    <script type="text/javascript" src="<?= base_url('assets/frontend/ecomshop/') ?>rs-plugin/js/jquery.themepunch.tools.min.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/frontend/ecomshop/') ?>rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

    <!-- Bootsrap js -->
    <script src="<?= base_url('assets/frontend/ecomshop/') ?>js/bootstrap.min.js"></script>

    <!-- Plugins js -->
    <script src="<?= base_url('assets/frontend/ecomshop/') ?>js/plugins.js"></script>

    <!-- Owl js -->
    <script src="<?= base_url('assets/frontend/ecomshop/') ?>js/owl.carousel.min.js"></script>

    <!-- Custom js -->
    <script src="<?= base_url('assets/frontend/ecomshop/') ?>js/main.js"></script>
    <script src="<?= base_url('public/js/SlickNav-master/jquery.slicknav.js') ?>"></script>
    <script src="<?= base_url('public/js/SlickNav-master/dist/jquery.slicknav.min.js') ?>"></script>
   
    <script type="text/javascript">
        $(document).ready(function() {
            $('.counter').counterUp({
                delay: 10,
                time: 1000
            });
        });
    </script>

</body>

</html>