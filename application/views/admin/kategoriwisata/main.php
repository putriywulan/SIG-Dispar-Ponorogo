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
                <!-- <?php $this->view('session'); ?> -->
                <?php
                if (validation_errors()) { ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= validation_errors(); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php
                }
                ?>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <a data-toggle="modal" data-target="#modalKategoriWisata" href="<?= base_url('Admin/KategoriWisata/add') ?>" class="btn btn-dark btn-add"><i class="fas fa-plus"></i> Tambah</a>
                            <br><br>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTables">
                                    <thead>
                                        <tr>
                                            <th width="5%;">No.</th>
                                            <th>Nama Kategori</th>
                                            <th width="20%;" class="text-center">Ikon</th>
                                            <th>Deskripsi</th>
                                            <th width="15%;" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="onLoad">
                                        <?php
                                        $no = 1;
                                        foreach ($result as $row) :
                                            $Vicon = check_icon($row->icon_id);
                                        ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $row->nama_kategori_wisata; ?></td>
                                                <td class="text-center">
                                                    <i class="<?= $Vicon->icon ?>">
                                                    </i>
                                                </td>
                                                <td><?= $row->deskripsi; ?></td>
                                                <td class="text-center">
                                                    <a data-id_kategori_wisata="<?= $row->id_kategori_wisata; ?>" class="btn btn-success btn-sm btn-edit" href="<?= base_url('Admin/KategoriWisata/edit/' . $row->id_kategori_wisata) ?>"><i class="fas fa-pencil-alt"></i> Edit</a>
                                                    <a class="btn btn-danger btn-sm btn-delete" data-id_kategori_wisata="<?= $row->id_kategori_wisata; ?>" href="#"><i class="fas fa-trash"></i> Delete</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- /.content -->
</div>
<!-- Modal -->
<div class="modal fade" id="modalKategoriWisata" tabindex="-1" role="dialog" aria-labelledby="modalKategoriWisataLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalKategoriWisataLabel">Form Kategori Wisata</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('Admin/KategoriWisata/process') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" name="id_kategori_wisata" value="<?= $modal->id_kategori_wisata; ?>">
                    <input type="hidden" name="page" value="<?= $page; ?>">
                    <div class="form-group">
                        <label for="">Icon</label>
                        <div style="width: 100%; height:180px; display:flex; flex-direction: column; flex-wrap:wrap;">
                            <?php
                            $iconId = $modal->icon_id != null ? $modal->icon_id : set_value('icon_id');
                            ?>
                            <?php foreach ($icon as $index => $vIcon) : ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="icon_id" id="icon_id<?= $index; ?>" <?= $iconId == $Vicon->id_icon ? 'checked' : '' ?> value="<?= $vIcon->id_icon; ?>">
                                    <label class="form-check-label" for="icon_id<?= $index; ?>">
                                        <i class="<?= $vIcon->icon; ?>"></i>
                                    </label>
                                </div>
                            <?php endforeach ?>
                        </div>
                        <?= form_error('icon_id') ?>
                        <span class="error_icon_id"></span>
                    </div>

                    <div class="form-group">
                        <label for="">Nama kategori</label>
                        <input name="nama_kategori_wisata" class="form-control  <?= form_error('nama_kategori_wisata') != null ? 'border border-danger' : '' ?>" placeholder="Nama kategori wisata" value="<?= $modal->nama_kategori_wisata != null ? $modal->nama_kategori_wisata : set_value('nama_kategori_wisata') ?>">
                        <?= form_error('nama_kategori_wisata') ?>
                        <span class="error_nama_kategori_wisata"></span>
                    </div>
                    <div class="form-group">
                        <label for="">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" class="form-control  <?= form_error('deskripsi') != null ? 'border border-danger' : '' ?>" placeholder="Deskripsi"><?= $modal->deskripsi != null ? $modal->deskripsi : set_value('deskripsi') ?></textarea>
                        <?= form_error('deskripsi') ?>
                        <span class="error_deskripsi"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-danger" data-dismiss="modal"> Close</button>
                    <button type="submit" name="<?= $page; ?>" class="btn btn-primary btn-submit"> Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="<?= base_url('assets/') ?>plugins/jquery/jquery.min.js"></script>
<script src="<?= base_url('node_modules/sweetalert2/dist/sweetalert2.min.js') ?>"></script>

<script>
    const success = "<?= $this->session->flashdata('success'); ?>";
    const error = "<?= $this->session->flashdata('error'); ?>";
    if (success != '') {
        Swal.fire({
            icon: 'success',
            title: 'Successfully',
            text: success,
            showConfirmButton: true,
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

    $(document).on('click', '.btn-submit', function(e) {
        e.preventDefault();
        clearForm();
        var form = $('form').serialize();
        var data = form;
        $.ajax({
            url: '<?= base_url('Admin/KategoriWisata/process') ?>',
            type: "POST",
            data: data,
            dataType: 'json',
            success: function(data) {
                console.log(data);
                if (data.status == 'error') {
                    if (data.output.deskripsi != null) {
                        $('textarea[name="deskripsi"]').addClass('border border-danger');
                        $('.error_deskripsi').html(data.output.deskripsi).addClass('text-danger');
                    }
                    if (data.output.icon_id != null) {
                        $('input[name="icon_id"]').addClass('border border-danger');
                        $('.error_icon_id').html(data.output.icon_id).addClass('text-danger');
                    }
                    if (data.output.nama_kategori_wisata != null) {
                        $('input[name="nama_kategori_wisata"]').addClass('border border-danger');
                        $('.error_nama_kategori_wisata').html(data.output.nama_kategori_wisata).addClass('text-danger');
                    }
                }

                if (data.status == 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Successfully',
                        text: data.output,
                        showConfirmButton: false,
                        timer: 1500
                    })

                    clearForm();
                    $('#modalKategoriWisata').modal('hide');
                    $("#onLoad").load("<?= current_url() ?> #onLoad > *");
                }

                if (data.status_error == 'error') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Failed',
                        text: data.output,
                        showConfirmButton: false,
                        timer: 1500
                    })
                }

            },
            error: function(x, t, m) {
                console.log(x.responseText);
            }
        });
    })

    $(document).on('click', '.btn-add', function(e) {
        e.preventDefault();
        const id_kategori_wisata = $(this).data('id_kategori_wisata');
        $('form')[0].reset();
        $('.btn-submit').attr('name', 'add');
        $('input[name="page"]').val('add');
    })
    $(document).on('click', '.btn-edit', function(e) {
        e.preventDefault();
        const id_kategori_wisata = $(this).data('id_kategori_wisata');
        $.ajax({
            url: '<?= base_url('Admin/KategoriWisata/edit/') ?>' + id_kategori_wisata,
            method: 'get',
            dataType: 'json',
            success: function(data) {
                const {
                    row
                } = data;
                $('input[name="id_kategori_wisata"]').val(row.id_kategori_wisata);
                $('input[name="nama_kategori_wisata"]').val(row.nama_kategori_wisata);
                $('textarea[name="deskripsi"]').val(row.deskripsi);
                $('input[name="icon_id"][value="' + row.icon_id + '"]').prop('checked', true);
                $('#modalKategoriWisata').modal('show');
                $('.btn-submit').attr('name', 'edit');
                $('input[name="page"]').val('edit');
            },
            error: function(x, t, m) {
                console.log(x.responseText);
            }
        })
    })

    function clearForm() {
        $('input[name="nama_kategori_wisata"]').removeClass('border border-danger');
        $('.error_nama_kategori_wisata').html('').removeClass('text-danger');
        $('input[name="icon_id"]').removeClass('border border-danger');
        $('.error_icon_id').html('').removeClass('text-danger');
        $('textarea[name="deskripsi"]').removeClass('border border-danger');
        $('.error_deskripsi').html('').removeClass('text-danger');
    }
    $(document).on('click', '.btn-delete', function(e) {
        e.preventDefault();
        const id_kategori_wisata = $(this).data("id_kategori_wisata");
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
                    url: "<?= base_url('Admin/KategoriWisata/delete') ?>",
                    dataType: 'json',
                    type: 'post',
                    data: {
                        id_kategori_wisata
                    },
                    success: function(data) {
                        if (data.status == 'success') {
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            );
                            $('.btn-delete[data-id_kategori_wisata="' + id_kategori_wisata + '"]').closest('tr').load("<?= current_url() ?> .btn-delete[data-id_kategori_wisata='" + id_kategori_wisata + "']");
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
</script>
