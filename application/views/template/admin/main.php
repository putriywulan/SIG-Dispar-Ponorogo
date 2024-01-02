<?php
$konfigurasi = check_konfigurasi();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="<?= base_url('public/') ?>js/select2-develop/dist/css/select2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('public/') ?>js/timepicker/timepicker.css">
    <link href="<?= base_url('') ?>/public/js/bootstrap-datepicker-master/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="<?= base_url('public/image/konfigurasi/' . $konfigurasi->gambar_konfigurasi) ?>" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('public/') ?>js/calendar-01/css/style.css">
    <link rel="stylesheet" href="<?= base_url('node_modules/sweetalert2/dist/sweetalert2.min.css') ?>">
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link type="text/css" rel="stylesheet" href="<?= base_url('public/js/jquery-image-uploader-preview-and-delete/dist/image-uploader.min.css') ?>">

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <?= $topbar; ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?= $sidebar; ?>

        <!-- Content Wrapper. Contains page content -->
        <?= $content; ?>
        <!-- /.content-wrapper -->
        <?= $footer; ?>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="<?= base_url('assets/') ?>plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?= base_url('assets/') ?>plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('assets/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="<?= base_url('assets/') ?>plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <!-- <script src="<?= base_url('assets/') ?>plugins/sparklines/sparkline.js"></script> -->
    <!-- JQVMap -->
    <!-- <script src="<?= base_url('assets/') ?>plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="<?= base_url('assets/') ?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script> -->
    <!-- jQuery Knob Chart -->
    <script src="<?= base_url('assets/') ?>plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="<?= base_url('assets/') ?>plugins/moment/moment.min.js"></script>
    <script src="<?= base_url('assets/') ?>plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?= base_url('assets/') ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="<?= base_url('assets/') ?>plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="<?= base_url('assets/') ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets/') ?>dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url('assets/') ?>dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <!-- <script src="<?= base_url('assets/') ?>dist/js/pages/dashboard.js"></script> -->
    <script src="<?= base_url('public/') ?>js/select2-develop/dist/js/select2.min.js"></script>
    <script src="<?= base_url('public/') ?>js/timepicker/timepicker.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url('') ?>/public/js/bootstrap-datepicker-master/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="<?= base_url('') ?>/public/js/jQuery.print-master/dist/jQuery.print.min.js"></script>
    <script src="<?= base_url('public/') ?>js/calendar-01/js/main.js"></script>
    <script src="<?= base_url('node_modules/sweetalert2/dist/sweetalert2.min.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('public/js/jquery-image-uploader-preview-and-delete/dist/image-uploader.min.js') ?>"></script>



    <script>
        $('#dataTables').DataTable();
        $('.select2').select2({
            theme: 'bootstrap4',
        });
        $('.timepicker').timepicker({
            timeFormat: 'HH:mm',
            scrollbar: true,
            zindex: 9999999
        });
        $('.datepicker').datepicker({
            toggleActive: true,
            autoclose: true,
            format: 'dd-mm-yyyy',
            todayHighlight: true,
        });
        $('.input-images').imageUploader();
    </script>
</body>

</html>