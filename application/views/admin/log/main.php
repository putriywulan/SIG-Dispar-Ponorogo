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
				<div class="card-body">
					<div class="row">
						<div class="col-lg-12">

							<div class="table-responsive">
								<table class="table table-bordered" id="dataTables">
									<thead>
										<tr>
											<th width="5%;">No.</th>
											<th width="15%;">Users</th>
											<th width="15%;">Aktifitas</th>
											<th width="15%;">Tanggal</th>
											<!-- <th width="10%;" class="text-center">Action</th> -->
										</tr>
									</thead>
									<tbody id="onLoad">
										<?php
										$no = 1;
										foreach ($result as $row) :
											$users = check_users($row->users_id);
										?>
											<tr>
												<td><?= $no++; ?></td>
												<td><?= $users->nama_profile; ?></td>
												<td><?= $row->aktifitas; ?></td>
												<td><?= tanggal_waktu_indo($row->diinsert_pada); ?></td>
												<!-- <td class="text-center">
                                                    <a class="btn btn-danger btn-delete" data-id_log="<?= $row->id_log; ?>" href="#"><i class="fas fa-trash"></i> Delete</a>
                                                </td> -->
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

<script src="<?= base_url('assets/') ?>plugins/jquery/jquery.min.js"></script>
<script src="<?= base_url('node_modules/sweetalert2/dist/sweetalert2.min.js') ?>"></script>

<script>
	$(document).on('click', '.btn-delete', function(e) {
		e.preventDefault();
		const id_log = $(this).data("id_log");
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
					url: "<?= base_url('Admin/Log/delete') ?>",
					dataType: 'json',
					type: 'post',
					data: {
						id_log
					},
					success: function(data) {
						if (data.status == 'success') {
							Swal.fire(
								'Deleted!',
								'Your file has been deleted.',
								'success'
							);
							$('.btn-delete[data-id_log="' + id_log + '"]').closest('tr').load("<?= current_url() ?> .btn-delete[data-id_log='" + id_log + "']");
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
