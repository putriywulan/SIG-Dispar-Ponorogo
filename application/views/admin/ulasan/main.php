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
				<?php $this->view('session'); ?>
				<div class="card-body">
					<div class="row">
						<div class="col-lg-12">
							<div class="table-responsive">
								<table class="table table-bordered" id="dataTables">
									<thead>
										<tr>
											<th width="5%;">No.</th>
											<th width="10%;">Email</th>
											<th width="15%;">Gambar</th>
											<th>Pesan</th>
											<th>Rating</th>
											<th>Wisata</th>
											<th width="10%;">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										foreach ($ulasan as $row) :
											$rating = $this->db->get_where('rating', ['email' => $row->email, 'wisata_id' => $row->wisata_id])->row()->rate;
										?>
											<tr>
												<td><?= $no++; ?></td>
												<td style="font-size: 12px;">
													<?= $row->email; ?> <br>
													<?= $row->first_name; ?> <?= $row->last_name; ?>
												</td>
												<td>
													<img src="<?= $row->image; ?>" alt="" width="100%;">
												</td>
												<td><?= $row->message; ?></td>
												<td style="color: #FFD119;">
													<?php
													if ($rating == 1) {
														$rating_output = '
														<span>
															<i class="fas fa-star"></i>
														</span>
														<span>
															<i class="far fa-star"></i>
														</span>
														<span>
															<i class="far fa-star"></i>
														</span>
														<span>
															<i class="far fa-star"></i>
														</span>
														<span>
															<i class="far fa-star"></i>
														</span>
														';
													} else if ($rating == 2) {
														$rating_output = '
														<span>
															<i class="fas fa-star"></i>
														</span>
														<span>
															<i class="fas fa-star"></i>
														</span>
														<span>
															<i class="far fa-star"></i>
														</span>
														<span>
															<i class="far fa-star"></i>
														</span>
														<span>
															<i class="far fa-star"></i>
														</span>
														';
													} else if ($rating == 3) {
														$rating_output = '
														<span>
															<i class="fas fa-star"></i>
														</span>
														<span>
															<i class="fas fa-star"></i>
														</span>
														<span>
															<i class="fas fa-star"></i>
														</span>
														<span>
															<i class="far fa-star"></i>
														</span>
														<span>
															<i class="far fa-star"></i>
														</span>
														';
													} else if ($rating == 4) {
														$rating_output = '
														<span>
															<i class="fas fa-star"></i>
														</span>
														<span>
															<i class="fas fa-star"></i>
														</span>
														<span>
															<i class="fas fa-star"></i>
														</span>
														<span>
															<i class="fas fa-star"></i>
														</span>
														<span>
															<i class="far fa-star"></i>
														</span>
														';
													} else if ($rating == 5) {
														$rating_output = '
														<span>
															<i class="fas fa-star"></i>
														</span>
														<span>
															<i class="fas fa-star"></i>
														</span>
														<span>
															<i class="fas fa-star"></i>
														</span>
														<span>
															<i class="fas fa-star"></i>
														</span>
														<span>
															<i class="fas fa-star"></i>
														</span>
														';
													} else {
														$rating_output = '
														<span>
															<i class="far fa-star"></i>
														</span>
														<span>
															<i class="far fa-star"></i>
														</span>
														<span>
															<i class="far fa-star"></i>
														</span>
														<span>
															<i class="far fa-star"></i>
														</span>
														<span>
															<i class="far fa-star"></i>
														</span>
														';
													}
													echo $rating_output;
													?>
												</td>
												<td><?= check_wisata($row->wisata_id)->nama_wisata; ?></td>
												<td class="text-center">
													<a class="btn btn-danger btn-sm btn-delete" data-id_ulasan="<?= $row->id_ulasan; ?>" href="#"><i class="fas fa-trash"></i></a>
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
<script src="<?= base_url('assets/') ?>plugins/jquery/jquery.min.js"></script>
<script src="<?= base_url('node_modules/sweetalert2/dist/sweetalert2.min.js') ?>"></script>
<script>
	$(document).on('click', '.btn-delete', function(e) {
		e.preventDefault();
		const id_ulasan = $(this).data("id_ulasan");
		Swal.fire({
			title: 'Reset',
			text: "Yakin ingin menghapus item ini ?",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Iya'
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					url: "<?= base_url('Admin/Ulasan/delete') ?>",
					dataType: 'json',
					type: 'post',
					data: {
						id_ulasan
					},
					success: function(data) {
						if (data.status == 'success') {
							Swal.fire(
								'Successfully',
								'Data berhasil di hapus',
								'success'
							);
							$('.btn-delete[data-id_ulasan="' + id_ulasan + '"]').closest('tr').load("<?= current_url() ?> .btn-delete[data-id_ulasan='" + id_ulasan + "']");
						} else {
							Swal.fire(
								'Fail!',
								'Gagal menghapus data',
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