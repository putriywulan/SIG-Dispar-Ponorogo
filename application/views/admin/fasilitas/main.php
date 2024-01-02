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
                            <a data-toggle="modal" data-target="#modalFasilitas" href="<?= base_url('Admin/Fasilitas/add') ?>" class="btn btn-dark btn-add"><i class="fas fa-plus"></i> Tambah</a>
                            <br><br>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTables">
                                    <thead>
                                        <tr>
                                            <th width="5%;">No.</th>
                                            <th width="15%;">Nama Fasilitas</th>
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
                                                <td><?= $row->nama_fasilitas; ?></td>
                                                <td class="text-center">
                                                    <a class="btn btn-success btn-edit btn-sm" data-id_fasilitas="<?= $row->id_fasilitas; ?>" _ href="<?= base_url('Admin/Fasilitas/edit/' . $row->id_fasilitas) ?>"><i class="fas fa-pencil-alt"></i> Edit</a>
                                                    <a class="btn btn-danger btn-sm btn-delete" data-id_fasilitas="<?= $row->id_fasilitas; ?>" href="#"><i class="fas fa-trash"></i> Delete</a>
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
<div class="modal fade" id="modalFasilitas" tabindex="-1" role="dialog" aria-labelledby="modalFasilitasLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalFasilitasLabel">Form Fasilitas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('Admin/Fasilitas/process') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" name="id_fasilitas" value="<?= $modal->id_fasilitas; ?>">
                    <input type="hidden" name="page" value="<?= $page; ?>">
                    <div class="form-group">
                        <label for="">Nama Fasilitas</label>
                        <input placeholder="Nama fasilitas" type="text" name="nama_fasilitas" class="form-control  <?= form_error('nama_fasilitas') != null ? 'border border-danger' : '' ?>" value="<?= $modal->nama_fasilitas != null ? $modal->nama_fasilitas : set_value('nama_fasilitas') ?>">
                        <?= form_error('nama_fasilitas') ?>
                        <span class="error_nama_fasilitas"></span>
                    </div>
                    <div class="form-group">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-danger" data-dismiss="modal"> Close</button>
                    <button name="<?= $page; ?>" type="submit" class="btn btn-primary btn-submit"> Submit</button>
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

    function clearForm() {
        $('input[name="nama_fasilitas"]').removeClass('border border-danger');
        $('.error_nama_fasilitas').html('').removeClass('text-danger');
    }

    $(document).on('click', '.btn-submit', function(e) {
        e.preventDefault();
        clearForm();
        var form = $('form').serialize();
        var data = form;
        $.ajax({
            url: '<?= base_url('Admin/Fasilitas/process') ?>',
            type: "POST",
            data: data,
            dataType: 'json',
            success: function(data) {
                console.log(data);
                if (data.status == 'error') {
                    if (data.output.nama_fasilitas != null) {
                        $('input[name="nama_fasilitas"]').addClass('border border-danger');
                        $('.error_nama_fasilitas').html(data.output.nama_fasilitas).addClass('text-danger');
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
                    $('#modalFasilitas').modal('hide');
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
        const id_fasilitas = $(this).data('id_fasilitas');
        $('form')[0].reset();
        clearForm();
        $('.btn-submit').attr('name', 'add');
        $('input[name="page"]').val('add');
    })
    $(document).on('click', '.btn-edit', function(e) {
        e.preventDefault();
        const id_fasilitas = $(this).data('id_fasilitas');
        $.ajax({
            url: '<?= base_url('Admin/Fasilitas/edit/') ?>' + id_fasilitas,
            method: 'get',
            dataType: 'json',
            success: function(data) {
                const {
                    row
                } = data;
                $('input[name="id_fasilitas"]').val(row.id_fasilitas);
                $('input[name="nama_fasilitas"]').val(row.nama_fasilitas);
                $('#modalFasilitas').modal('show');
                $('.btn-submit').attr('name', 'edit');
                $('input[name="page"]').val('edit');
            },
            error: function(x, t, m) {
                console.log(x.responseText);
            }
        })
    })
    $(document).on('click', '.btn-delete', function(e) {
        e.preventDefault();
        const id_fasilitas = $(this).data("id_fasilitas");
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
                    url: "<?= base_url('Admin/Fasilitas/delete') ?>",
                    dataType: 'json',
                    type: 'post',
                    data: {
                        id_fasilitas
                    },
                    success: function(data) {
                        if (data.status == 'success') {
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            );
                            $('.btn-delete[data-id_fasilitas="' + id_fasilitas + '"]').closest('tr').load("<?= current_url() ?> .btn-delete[data-id_fasilitas='" + id_fasilitas + "']");
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