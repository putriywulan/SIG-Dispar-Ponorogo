<?php

$konfigurasi = check_konfigurasi();
?>

<div class="login-box">
    <div class="login-logo">
        <a href="<?= base_url('Login') ?>"><?= $konfigurasi->nama_aplikasi; ?></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <!-- <?php $this->view('session'); ?> -->
        <div class="card-body login-card-body">
            <p class="login-box-msg"><?= $title ?></p>

            <form action="<?= base_url('Forgot/process/') ?>" method="post">
                <div class="input-group">
                    <input name="tanggal_lahir" type="text" class="form-control datepicker <?= form_error('tanggal_lahir') != null ? 'border border-danger' : '' ?>" placeholder="Tanggal lahir">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-calendar-day"></span>
                        </div>
                    </div>
                </div>
                <?= form_error('tanggal_lahir') ?>
                <div class="mb-3"></div>
                <div class="input-group">
                    <input name="username" type="text" class="form-control <?= form_error('username') != null ? 'border border-danger' : '' ?>" placeholder="Username">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user-lock"></span>
                        </div>
                    </div>
                </div>
                <?= form_error('username') ?>
                <div class="mb-3"></div>

                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
                    </div>
                </div>
            </form>

            <div class="d-flex justify-content-between mt-2">
                <a href="<?= base_url('Login') ?>">Login</a>
                <!-- <a href="<?= base_url('Register') ?>">Register</a> -->
            </div>

        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->
<script src="<?= base_url('assets/') ?>plugins/jquery/jquery.min.js"></script>
<script src="<?= base_url('node_modules/sweetalert2/dist/sweetalert2.min.js') ?>"></script>


<script>
    $(document).ready(function() {
        const success = "<?= $this->session->flashdata('success'); ?>";
        const error = "<?= $this->session->flashdata('error'); ?>";

        if (success != '') {
            Swal.fire({
                icon: 'success',
                title: 'Successfully',
                html: success,
                showConfirmButton: true,
            })
        }
        if (error != '') {
            Swal.fire({
                icon: 'error',
                title: 'Fail',
                html: error,
                showConfirmButton: true,
            })
        }

       
    })
</script>