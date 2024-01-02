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
                            <a data-toggle="modal" data-target="#modalSlider" href="<?= base_url('Admin/Slider/add') ?>" class="btn btn-dark btn-add"><i class="fas fa-plus"></i> Tambah</a>
                            <br><br>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTables">
                                    <thead>
                                        <tr>
                                            <th width="5%;">No.</th>
                                            <th width="15%;">Judul</th>
                                            <th width="15%;">Deskripsi</th>
                                            <th width="5%;">File</th>
                                            <th width="10%;" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="onLoad">
                                        <?php
                                        $no = 1;
                                        foreach ($result as $row) :
                                        ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $row->judul; ?></td>
                                                <td><?= $row->deskripsi; ?></td>
                                                <td>
                                                    <a href="<?= base_url('public/image/slider/' . $row->nama_file) ?>" target="_blank">
                                                        <img src="<?= base_url('public/image/slider/' . $row->nama_file) ?>" alt="" class="w-100">
                                                    </a>
                                                </td>
                                                <td class="text-center">
                                                    <a class="btn btn-success btn-sm btn-edit" data-id_slider="<?= $row->id_slider; ?>" href="<?= base_url('Admin/Slider/edit/' . $row->id_slider) ?>"><i class="fas fa-pencil-alt"></i> Edit</a>
                                                    <a class="btn btn-danger btn-sm btn-delete" data-id_slider="<?= $row->id_slider; ?>" href="#"><i class="fas fa-trash"></i> Delete</a>
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
<div class="modal fade" id="modalSlider" tabindex="-1" role="dialog" aria-labelledby="modalSliderLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalSliderLabel">Form Slider</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?= base_url('Admin/Slider/process') ?>" method="post" enctype="multipart/form-data" id="formslider">
                <div class="modal-body">
                    <input type="hidden" name="id_slider" value="<?= $modal->id_slider; ?>">
                    <input type="hidden" name="page" value="<?= $page ?>">
                    <div class="form-group">
                        <label for="">Judul</label>
                        <input placeholder="Judul" type="text" name="judul" class="form-control  <?= form_error('judul') != null ? 'border border-danger' : '' ?>" value="<?= $modal->judul != null ? $modal->judul : set_value('judul') ?>">
                        <?= form_error('judul') ?>
                        <span class="error_judul"></span>
                    </div>
                    <div class="form-group">
                        <label for="">Deskripsi</label>
                        <textarea id="deskripsi" placeholder="Deskripsi" name="deskripsi" class="form-control  <?= form_error('deskripsi') != null ? 'border border-danger' : '' ?>">
                                    <?= $modal->deskripsi != null ? $modal->deskripsi : set_value('deskripsi') ?>
                                    </textarea>
                        <?= form_error('deskripsi') ?>
                        <span class="error_deskripsi"></span>
                    </div>
                    <div class="form-group">
                        <label for="">File</label>
                        <input type="file" name="nama_file" id="nama_file" class="form-control">
                        <?php
                        if ($modal->nama_file != null) {
                            echo '<img class="w-25" src="' . base_url('public/image/slider/' . $modal->nama_file) . '"></img>';
                        }
                        ?>
                        <div id="nama_file"></div>
                        <?= form_error('nama_file') ?>
                        <span class="error_nama_file"></span>
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
            window.location = "<?= base_url('Admin/Slider') ?>";
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
        var form = $('#formslider')[0];
        var data = new FormData(form);
        $.ajax({
            url: '<?= base_url('Admin/Slider/process') ?>',
            type: "POST",
            data: data,
            enctype: 'multipart/form-data',
            processData: false, // Important!
            contentType: false,
            cache: false,
            dataType: 'json',
            success: function(data) {
                if (data.status == 'error') {
                    if (data.output.judul != null) {
                        $('input[name="judul"]').addClass('border border-danger');
                        $('.error_judul').html(data.output.judul).addClass('text-danger');
                    }

                    if (data.output.deskripsi != null) {
                        $('textarea[name="deskripsi"]').addClass('border border-danger');
                        $('.error_deskripsi').html(data.output.deskripsi).addClass('text-danger');
                    }

                    if (data.output.nama_file != null) {
                        $('input[name="nama_file"]').addClass('border border-danger');
                        $('.error_nama_file').html(data.output.nama_file).addClass('text-danger');
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
                    $('#modalSlider').modal('hide');
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

    function clearForm() {
        $('input[name="judul"]').removeClass('border border-danger');
        $('.error_judul').html('').removeClass('text-danger');

        $('textarea[name="deskripsi"]').removeClass('border border-danger');
        $('.error_deskripsi').html('').removeClass('text-danger');

        $('input[name="nama_file"]').removeClass('border border-danger');
        $('.error_nama_file').html('').removeClass('text-danger');
    }
    $(document).on('click', '.btn-add', function(e) {
        e.preventDefault();
        clearForm();
        const id_slider = $(this).data('id_slider');
        $('#formslider')[0].reset();
        $('input[name="page"]').val('add');
        $('.btn-submit').attr('name', 'add');
        var pane = $('#deskripsi');
        pane.val($.trim(pane.val()).replace(/\s*[\r\n]+\s*/g, '\n')
            .replace(/(<[^\/][^>]*>)\s*/g, '$1')
            .replace(/\s*(<\/[^>]+>)/g, '$1'));
    })
    $(document).on('click', '.btn-edit', function(e) {
        e.preventDefault();
        const id_slider = $(this).data('id_slider');
        $.ajax({
            url: '<?= base_url('Admin/Slider/edit/') ?>' + id_slider,
            method: 'get',
            dataType: 'json',
            success: function(data) {
                const {
                    row
                } = data;
                $('input[name="id_slider"]').val(row.id_slider);
                $('input[name="judul"]').val(row.judul);
                $('textarea[name="deskripsi"]').val(row.deskripsi);
                $('#nama_file').html(`
                <a href="<?= base_url('public/image/slider/') ?>` + row.nama_file + `" target="_blank">
                    <img class="w-100" src="<?= base_url('public/image/slider/') ?>` + row.nama_file + `"></img>
                </a>
                `);
                $('#modalSlider').modal('show');
                $('input[name="page"]').val('edit');
                $('.btn-submit').attr('name', 'edit');
            },
            error: function(x, t, m) {
                console.log(x.responseText);
            }
        })
    })
    $(document).on('click', '.btn-delete', function(e) {
        e.preventDefault();
        const id_slider = $(this).data("id_slider");
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
                    url: "<?= base_url('Admin/Slider/delete') ?>",
                    dataType: 'json',
                    type: 'post',
                    data: {
                        id_slider
                    },
                    success: function(data) {
                        if (data.status == 'success') {
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            );
                            $('.btn-delete[data-id_slider="' + id_slider + '"]').closest('tr').load("<?= current_url() ?> .btn-delete[data-id_slider='" + id_slider + "']");
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