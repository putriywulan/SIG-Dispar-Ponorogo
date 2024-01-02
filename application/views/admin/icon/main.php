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
                            <a data-toggle="modal" data-target="#modalIcon" href="<?= base_url('Admin/Icon/add') ?>" class="btn btn-dark btn-add"><i class="fas fa-plus"></i> Tambah</a>
                            <br><br>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTables">
                                    <thead>
                                        <tr>
                                            <th width="5%;">No.</th>
                                            <th>Nama Icon</th>
                                            <th width="15%;">Icon</th>
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
                                                <td><?= $row->icon; ?></td>
                                                <td>
                                                    <i class="<?= $row->icon; ?>">
                                                    </i>
                                                </td>
                                                <td class="text-center">
                                                    <a class="btn btn-success btn-edit btn-sm" data-id_icon="<?= $row->id_icon; ?>" href="<?= base_url('Admin/Icon/edit/' . $row->id_icon) ?>"><i class="fas fa-pencil-alt"></i> Edit</a>
                                                    <a class="btn btn-danger btn-delete btn-sm" href="#" data-id_icon="<?= $row->id_icon; ?>"><i class="fas fa-trash"></i> Delete</a>
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
<div class="modal fade" id="modalIcon" tabindex="-1" role="dialog" aria-labelledby="modalIconLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalIconLabel">Form Icon</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?= base_url('Admin/Icon/process') ?>" method="post" enctype="multipart/form-data" id="formIcon">
                <div class="modal-body">
                    <input type="hidden" name="id_icon" value="<?= $modal->id_icon; ?>">
                    <input type="hidden" name="page" value="<?= $page; ?>">
                    <div class="form-group">
                        <label for="">Icon</label>
                        <?php
                        $icon = $modal->icon != null ? $modal->icon : set_value('icon');
                        ?>
                        <input type="text" name="icon" class="form-control  <?= form_error('icon') != null ? 'border border-danger' : '' ?>" placeholder="Icon" value="<?= $icon; ?>">

                        <?= form_error('icon') ?>
                        <span class="error_icon"></span>
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
            url: '<?= base_url('Admin/Icon/process') ?>',
            type: "POST",
            data: data,
            dataType: 'json',
            success: function(data) {
                if (data.status == 'error') {
                    if (data.output.icon != null) {
                        $('input[name="icon"]').addClass('border border-danger');
                        $('.error_icon').html(data.output.icon).addClass('text-danger');
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
                    $('#modalIcon').modal('hide');
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
        $('input[name="icon"]').removeClass('border border-danger');
        $('.error_icon').html('').removeClass('text-danger');
    }
    $(document).on('click', '.btn-add', function(e) {
        e.preventDefault();
        const id_icon = $(this).data('id_icon');
        $('form')[0].reset();
        clearForm();
        $('.btn-submit').attr('name', 'add');
        $('input[name="page"]').val('add');
    })
    $(document).on('click', '.btn-edit', function(e) {
        e.preventDefault();
        const id_icon = $(this).data('id_icon');
        $.ajax({
            url: '<?= base_url('Admin/Icon/edit/') ?>' + id_icon,
            method: 'get',
            dataType: 'json',
            success: function(data) {
                const {
                    row
                } = data;
                $('input[name="id_icon"]').val(row.id_icon);
                $('input[name="icon"]').val(row.icon);
                $('#modalIcon').modal('show');
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
        const id_icon = $(this).data("id_icon");
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
                    url: "<?= base_url('Admin/Icon/delete') ?>",
                    dataType: 'json',
                    type: 'post',
                    data: {
                        id_icon
                    },
                    success: function(data) {
                        if (data.status == 'success') {
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            );
                            $('.btn-delete[data-id_icon="' + id_icon + '"]').closest('tr').load("<?= current_url() ?> .btn-delete[data-id_icon='" + id_icon + "']");
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