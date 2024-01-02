<style>
    .password {
        position: relative;
    }

    .password .password_1,
    .password_2 {
        position: absolute;
        bottom: 25px;
        right: 25px;
        cursor: pointer;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= $title; ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <?= $breadcrumb; ?>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header"><i class="fas fa-user"></i> Profile</div>
                        <div class="card-body">
                            <a href="<?= base_url('public/image/users/' . $profile->gambar_profile) ?>" target="_blank">
                                <img src="<?= base_url('public/image/users/' . $profile->gambar_profile) ?>" alt="" style="height:250px; width:100%;">
                                <?= form_error('gambar_profile') ?>
                            </a>
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <td>No. Induk</td>
                                        <td>:</td>
                                        <td><?= $profile->no_hp; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nama</td>
                                        <td>:</td>
                                        <td><?= $profile->nama_profile ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card">
                        <!-- <?php $this->view('session'); ?> -->
                        <div class="card-header"><i class="fas fa-pencil-alt"></i> My Profile</div>
                        <div class="card-body">
                            <form action="<?= base_url('Admin/Profile/process') ?>" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id_users" value="<?= $profile->id_users; ?>">
                                <input type="hidden" name="password_old" value="<?= $profile->password; ?>">
                                <h4>Data pribadi</h4>
                                <hr>
                                <div class="form-group">
                                    <label for="">Username</label>
                                    <input type="text" name="username" class="form-control  <?= form_error('username') != null ? 'border border-danger' : '' ?>" placeholder="Username" value="<?= $profile->username != null ? $profile->username : set_value('username') ?>">
                                    <?= form_error('username') ?>
                                </div>
                                <div class="row password">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">Password</label>
                                            <input type="password" name="password" class="form-control  <?= form_error('password') != null ? 'border border-danger' : '' ?>" placeholder="Password">
                                            <i class="fas fa-eye password_1"></i>
                                        </div>

                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">Confirm Password</label>
                                            <input type="password" name="confirm_password" class="form-control  <?= form_error('confirm_password') != null ? 'border border-danger' : '' ?>" placeholder="Confirm password">
                                            <i class="fas fa-eye password_2"></i>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" style="margin-top: -15px;">
                                        <div class="text-info">* Kosongkan password jika tidak ingin merubah</div>
                                    </div>
                                    <div class="col-lg-6">
                                        <?= form_error('password') ?>
                                    </div>
                                    <div class="col-lg-6">
                                        <?= form_error('confirm_password') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Nama</label>
                                    <input type="text" name="nama_profile" class="form-control  <?= form_error('nama_profile') != null ? 'border border-danger' : '' ?>" placeholder="Nama" value="<?= $profile->nama_profile != null ? $profile->nama_profile : set_value('nama_profile') ?>">
                                    <?= form_error('nama_profile') ?>
                                </div>
                                <div class="form-group">
                                    <label for="">Jenis kelamin</label> <br>
                                    <?php
                                    $jenis_kelamin = $profile->jenis_kelamin != null ? $profile->jenis_kelamin : set_value('jenis_kelamin');
                                    ?>
                                    <input type="hidden" name="jenis_kelamin" value="<?= $jenis_kelamin; ?>">
                                    <p><?= $profile->jenis_kelamin == 'L' ? 'Laki laki' : 'Perempuan' ?></p>

                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">No. handphone</label>
                                            <input type="number" name="no_hp" class="form-control  <?= form_error('no_hp') != null ? 'border border-danger' : '' ?>" placeholder="No. Handphone" value="<?= $profile->no_hp != null ? $profile->no_hp : set_value('no_hp') ?>">
                                            <?= form_error('no_hp') ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">Alamat</label>
                                            <textarea id="alamat" name="alamat" class="form-control  <?= form_error('alamat') != null ? 'border border-danger' : '' ?>" placeholder="Alamat">
                                            <?= $profile->alamat != null ? $profile->alamat : set_value('alamat') ?>
                                            </textarea>
                                            <?= form_error('alamat') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Gambar</label>
                                    <input type="file" name="gambar_profile" class="form-control">
                                </div>
                                <div class="form-group">
                                    <button type="reset" class="btn btn-danger"><i class="fas fa-undo"></i> Reset</button>
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<script src="<?= base_url('assets/') ?>plugins/jquery/jquery.min.js"></script>
<script src="<?= base_url('node_modules/sweetalert2/dist/sweetalert2.min.js') ?>"></script>

<script>
    $(document).ready(function() {
        var pane = $('#alamat');
        pane.val($.trim(pane.val()).replace(/\s*[\r\n]+\s*/g, '\n')
            .replace(/(<[^\/][^>]*>)\s*/g, '$1')
            .replace(/\s*(<\/[^>]+>)/g, '$1'));
        var pane = $('#alamat_ayah');
        pane.val($.trim(pane.val()).replace(/\s*[\r\n]+\s*/g, '\n')
            .replace(/(<[^\/][^>]*>)\s*/g, '$1')
            .replace(/\s*(<\/[^>]+>)/g, '$1'));
        var pane = $('#alamat_ibu');
        pane.val($.trim(pane.val()).replace(/\s*[\r\n]+\s*/g, '\n')
            .replace(/(<[^\/][^>]*>)\s*/g, '$1')
            .replace(/\s*(<\/[^>]+>)/g, '$1'));
        $(document).on('click', '.password_1', function() {
            const type = $('input[name="password"]').attr('type');
            if (type == 'password') {
                $('.password_1').attr('class', 'fas fa-eye-slash password_1');
                $('input[name="password"]').attr('type', 'text')
            } else {
                $('.password_1').attr('class', 'fas fa-eye password_1');
                $('input[name="password"]').attr('type', 'password')
            }
        })
        $(document).on('click', '.password_2', function() {
            const type = $('input[name="confirm_password"]').attr('type');
            if (type == 'password') {
                $('.password_2').attr('class', 'fas fa-eye-slash password_2');
                $('input[name="confirm_password"]').attr('type', 'text')
            } else {
                $('.password_2').attr('class', 'fas fa-eye password_2');
                $('input[name="confirm_password"]').attr('type', 'password')
            }
        })

        const success = "<?= $this->session->flashdata('success'); ?>";
        const error = "<?= $this->session->flashdata('error'); ?>";
        if (success != '') {
            Swal.fire({
                icon: 'success',
                title: 'Successfully',
                text: success,
                showConfirmButton: true,
            }).then((result) => {
                window.location = "<?= base_url('Admin/Profile') ?>";
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