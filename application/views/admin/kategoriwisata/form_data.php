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
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <a href="<?= base_url('Admin/KategoriWisata') ?>" class="btn btn-warning"><i class="fas fa-backward"></i> Kembali</a>
                            <br><br>
                            <form action="<?= base_url('Admin/KategoriWisata/process') ?>" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id_kategori_wisata" value="<?= $row->id_kategori_wisata; ?>">
                                <div class="form-group">
                                    <label for="">Icon</label>
                                    <?php
                                    $iconId = $row->icon_id != null ? $row->icon_id : set_value('icon_id');
                                    ?>
                                    <select name="icon_id" class="form-control" id="">
                                        <option value="">-- Icon --</option>
                                        <?php foreach ($icon as $vIcon) : ?>
                                            <option value="<?= $vIcon->id_icon ?>" <?= $iconId == $vIcon->id_icon ? 'selected' : '' ?>><?= $vIcon->icon ?></option>

                                        <?php endforeach ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="">Nama kategori</label>
                                    <input name="nama_kategori_wisata" class="form-control  <?= form_error('nama_kategori_wisata') != null ? 'border border-danger' : '' ?>" placeholder="Nama kategori wisata" value="<?= $row->nama_kategori_wisata != null ? $row->nama_kategori_wisata : set_value('nama_kategori_wisata') ?>">
                                    <?= form_error('nama_kategori_wisata') ?>
                                </div>
                                <div class="form-group">
                                    <label for="">Deskripsi</label>
                                    <textarea name="deskripsi" id="deskripsi" class="form-control  <?= form_error('deskripsi') != null ? 'border border-danger' : '' ?>" placeholder="Deskripsi">
                                    <?= $row->deskripsi != null ? $row->deskripsi : set_value('deskripsi') ?>
                                    </textarea>
                                    <?= form_error('deskripsi') ?>
                                </div>
                                <div class="form-group">
                                    <button type="reset" class="btn btn-danger"><i class="fas fa-undo"></i> Reset</button>
                                    <button name="<?= $page; ?>" type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Submit</button>
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
        var pane = $('#deskripsi');
        pane.val($.trim(pane.val()).replace(/\s*[\r\n]+\s*/g, '\n')
            .replace(/(<[^\/][^>]*>)\s*/g, '$1')
            .replace(/\s*(<\/[^>]+>)/g, '$1'));
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
                window.location = "<?= base_url('Admin/KategoriWisata') ?>";
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