<?php
$konfigurasi = check_konfigurasi();
?>

<footer class="main-footer">
    <strong>Copyright &copy; 2021 <a href="<?= $konfigurasi->youtube ?>"><?= $konfigurasi->created_by; ?></a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.1
    </div>
</footer>