<?php
$konfigurasi = check_konfigurasi();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>
    <meta name="description" content="<?= $konfigurasi->keterangan; ?>">
    <meta name="author" content="<?= $konfigurasi->created_by; ?>">
    <?php header('Access-Control-Allow-Origin: *'); ?>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>dist/css/adminlte.min.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css"> -->
    <link rel="shortcut icon" href="<?= base_url('public/image/konfigurasi/' . $konfigurasi->gambar_konfigurasi) ?>" type="image/x-icon">
    <link rel="stylesheet" href="<?= base_url('node_modules/sweetalert2/dist/sweetalert2.min.css') ?>">
    <link href="<?= base_url('') ?>/public/js/bootstrap-datepicker-master/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">
</head>

<body class="hold-transition login-page">
    <?= $content; ?>
    <!-- jQuery -->
    <script src="<?= base_url('assets/') ?>plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('assets/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets/') ?>dist/js/adminlte.min.js"></script>
    <script src="<?= base_url('node_modules/sweetalert2/dist/sweetalert2.min.js') ?>"></script>
    <script src="<?= base_url('') ?>/public/js/bootstrap-datepicker-master/dist/js/bootstrap-datepicker.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.datepicker').datepicker({
                toggleActive: true,
                autoclose: true,
                format: 'dd-mm-yyyy',
                todayHighlight: true,
            });
        })
    </script>
</body>

</html>