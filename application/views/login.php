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
            <p class="login-box-msg"><?= $title; ?></p>

            <form action="<?= base_url('Login/process/') ?>" method="post">
                <div class="input-group">
                    <input name="username" type="text" class="form-control <?= form_error('username') != null ? 'border border-danger' : '' ?>" placeholder="Username" value="<?= set_value('username') ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user-lock"></span>
                        </div>
                    </div>
                </div>
                <?= form_error('username') ?>
                <div class="mb-3"></div>
                <div class="input-group">
                    <input type="password" name="password" class="form-control <?= form_error('password') != null ? 'border border-danger' : '' ?>" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <?= form_error('password') ?>
                <div class="mb-3"></div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input name="remember" type="checkbox" id="remember">
                            <label for="remember">
                                Remember Me
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <div class="d-flex justify-content-between mt-2">
                <a href="<?= base_url('Forgot') ?>">I forgot my password</a>
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
                text: success,
                showConfirmButton: false,
                timer: 1500
            }).then((result) => {
                window.location = "<?= base_url('Admin/Home') ?>";
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
    })
</script>