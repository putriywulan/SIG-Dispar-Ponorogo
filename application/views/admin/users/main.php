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
							<a data-toggle="modal" data-target="#modalUsers" href=" <?= base_url('Admin/Users/add') ?>" class="btn btn-dark btn-add"><i class="fas fa-plus"></i> Tambah</a>
							<br><br>
							<div class="table-responsive">
								<table class="table table-bordered" id="dataTables">
									<thead>
										<tr>
											<th width="5%;">No.</th>
											<th>Username</th>
											<th>No. HP</th>
											<th>Level</th>
											<th>Nama</th>
											<th>J.K</th>
											<th width="10%;">Gambar</th>
											<th width="15%;" class="text-center">Aksi</th>
										</tr>
									</thead>
									<tbody id="onLoad">
										<?php
										$no = 1;
										foreach ($result as $row) :
										?>
											<tr>
												<td><?= $no++; ?></td>
												<td><?= $row->username; ?></td>
												<td><?= $row->no_hp; ?></td>
												<td><?= $row->level; ?></td>
												<td><?= $row->nama_profile; ?></td>
												<td><?= $row->jenis_kelamin; ?></td>
												<td>
													<a href="<?= base_url('public/image/users/' . $row->gambar_profile) ?>" target="_blank">
														<img src="<?= base_url('public/image/users/' . $row->gambar_profile) ?>" alt="" width="100%;">
													</a>
												</td>
												<td class="text-center">
													<a class="btn btn-success btn-sm btn-edit" data-id_users="<?= $row->id_users; ?>" href="<?= base_url('Admin/Users/edit/' . $row->id_users) ?>"><i class="fas fa-pencil-alt"></i> Edit</a>
													<a class="btn btn-danger btn-sm btn-delete" data-id_users="<?= $row->id_users; ?>" href="<?= base_url('Admin/Users/delete/' . $row->id_users) ?>"><i class="fas fa-trash"></i> Delete</a>
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
<div class="modal fade" id="modalUsers" tabindex="-1" role="dialog" aria-labelledby="modalUsersLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalUsersLabel">Form Users</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('Admin/Users/process') ?>" method="post" enctype="multipart/form-data">
				<div class="modal-body">
					<input type="hidden" name="id_users" value="<?= $modal->id_users; ?>">
					<input type="hidden" name="page" value="<?= $page; ?>">
					<input type="hidden" name="password_old" value="<?= $modal->password; ?>">
					<div class="form-group">
						<label for="">Username</label>
						<input type="text" name="username" class="form-control  <?= form_error('username') != null ? 'border border-danger' : '' ?>" placeholder="Username" value="<?= $modal->username != null ? $modal->username : set_value('username') ?>" <?= $page == 'edit' ? 'readonly' : '' ?>>
						<?= form_error('username') ?>
						<span class="error_username"></span>
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
						<div class="col-lg-12" style="margin-top: -10px;">
							<small class="font-weight-bold text-info">* Kosongkan password jika tidak ingin mengubah password</small>
						</div>
						<div class="col-lg-6">
							<?= form_error('password') ?>
							<span class="error_password"></span>
						</div>
						<div class="col-lg-6">
							<?= form_error('confirm_password') ?>
							<span class="error_confirm_password"></span>
						</div>
					</div>

					<div class="form-group">
						<label for="">Nama</label>
						<input type="text" name="nama_profile" class="form-control  <?= form_error('nama_profile') != null ? 'border border-danger' : '' ?>" placeholder="Nama" value="<?= $modal->nama_profile != null ? $modal->nama_profile : set_value('nama_profile') ?>">
						<?= form_error('nama_profile') ?>
						<span class="error_nama_profile"></span>
					</div>
					<div class="form-group">
						<label for="">Tanggal lahir</label>
						<input type="text" name="tanggal_lahir" class="form-control datepicker  <?= form_error('tanggal_lahir') != null ? 'border border-danger' : '' ?>" placeholder="Tanggal lahir" value="<?= $modal->tanggal_lahir != null ? $modal->tanggal_lahir : set_value('tanggal_lahir') ?>">
						<?= form_error('tanggal_lahir') ?>
						<span class="error_tanggal_lahir"></span>
					</div>
					<div class="form-group">
						<label for="">Level</label> <br>
						<?php
						$level = $modal->level != null ? $modal->level : set_value('level');

						?>
						<select name="level" class="form-control" id="">
							<option value="">-- Level --</option>
							<option value="admin" <?= $level == 'admin' ? 'selected' : '' ?>>Admin</option>
							<option value="super admin" <?= $level == 'super admin' ? 'selected' : '' ?>>Super Admin</option>
						</select>
						<span class="error_level"></span>
					</div>
					<div class="form-group">
						<label for="">Jenis kelamin</label> <br>
						<?php
						$jenis_kelamin = $modal->jenis_kelamin != null ? $modal->jenis_kelamin : set_value('jenis_kelamin');
						?>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="jenis_kelamin" id="p" value="P" <?= $jenis_kelamin == 'P' ? 'checked' : '' ?>>
							<label class="form-check-label" for="p">Perempuan</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="jenis_kelamin" id="l" value="L" <?= $jenis_kelamin == 'L' ? 'checked' : '' ?>>
							<label class="form-check-label" for="l">Laki laki</label>
						</div>
						<br>
						<span class="error_jenis_kelamin"></span>
					</div>
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label for="">No. handphone</label>
								<input type="number" name="no_hp" class="form-control  <?= form_error('no_hp') != null ? 'border border-danger' : '' ?>" placeholder="No. Handphone" value="<?= $modal->no_hp != null ? $modal->no_hp : set_value('no_hp') ?>">
								<?= form_error('no_hp') ?>
								<span class="error_no_hp"></span>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label for="">Alamat</label>
								<textarea id="alamat" name="alamat" class="form-control  <?= form_error('alamat') != null ? 'border border-danger' : '' ?>" placeholder="Alamat">
                                            <?= $modal->alamat != null ? $modal->alamat : set_value('alamat') ?>
                                            </textarea>
								<?= form_error('alamat') ?>
								<span class="error_alamat"></span>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="">Gambar</label>
						<input type="file" name="gambar_profile" class="form-control">
						<?php
						if ($modal->gambar_profile != null) { ?>
							<a href="<?= base_url('image/users/' . $modal->gambar_profile) ?>" target="_blank">
								<img src="<?= base_url('public/image/users/' . $modal->gambar_profile) ?>" alt="" class="w-25">
							</a>

						<?php
						}
						?>
						<span class="error_gambar_profile"></span>
						<div id="gambar_profile"></div>
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
	var pane = $('#alamat');
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

	$(document).on('click', '.btn-add', function(e) {
		e.preventDefault();
		const id_users = $(this).data('id_users');
		$('form')[0].reset();
		clearForm();
		$('.btn-submit').attr('name', 'add');
		$('input[name="page"]').val('add');
		var pane = $('#alamat');
		pane.val($.trim(pane.val()).replace(/\s*[\r\n]+\s*/g, '\n')
			.replace(/(<[^\/][^>]*>)\s*/g, '$1')
			.replace(/\s*(<\/[^>]+>)/g, '$1'));
	})
	$(document).on('click', '.btn-edit', function(e) {
		e.preventDefault();
		const id_users = $(this).data('id_users');
		$.ajax({
			url: '<?= base_url('Admin/Users/edit/') ?>' + id_users,
			method: 'get',
			dataType: 'json',
			success: function(data) {
				const {
					row
				} = data;
				const get_tanggal = row.tanggal_lahir;
				const split = get_tanggal.split('-');
				const tanggal = split[2];
				const bulan = split[1];
				const tahun = split[0];
				const fix_tanggal = tanggal + '-' + bulan + '-' + tahun;
				$('input[name="id_users"]').val(row.id_users);
				$('input[name="password_old"]').val(row.password);
				$('input[name="tanggal_lahir"]').val(fix_tanggal);
				$('input[name="username"]').val(row.username);
				$('input[name="nama_profile"]').val(row.nama_profile);
				$('select[name="level"]').val(row.level).trigger('change');
				$('input[name="jenis_kelamin"][value="' + row.jenis_kelamin + '"]').prop('checked', true);
				$('input[name="no_hp"]').val(row.no_hp);
				$('textarea[name="alamat"]').val(row.alamat);
				$('#gambar_profile').html(`
                <a target='_blank' href="<?= base_url('public/image/users/') ?>` + row.gambar_profile + `">
                    <img class='w-25' src="<?= base_url('public/image/users/') ?>` + row.gambar_profile + `"></img>
                </a>
                `);

				$('#modalUsers').modal().show();
				$('.btn-submit').attr('name', 'edit');
				$('input[name="page"]').val('edit');
			},
			error: function(x, t, m) {
				console.log(x.responseText);
			}
		})
	})

	function clearForm() {

		$('#gambar_profile').html('');
		$('select[name="level"]').removeClass('border border-danger');
		$('.error_level').html('').removeClass('text-danger');

		$('input[name="confirm_password"]').removeClass('border border-danger');
		$('.error_confirm_password').html('').removeClass('text-danger');

		$('input[name="gambar_profile"]').removeClass('border border-danger');
		$('.error_gambar_profile').html('').removeClass('text-danger');

		$('input[name="jenis_kelamin"]').removeClass('border border-danger');
		$('.error_jenis_kelamin').html('').removeClass('text-danger');


		$('input[name="nama_profile"]').removeClass('border border-danger');
		$('.error_nama_profile').html('').removeClass('text-danger');


		$('input[name="no_hp"]').removeClass('border border-danger');
		$('.error_no_hp').html('').removeClass('text-danger');


		$('input[name="password"]').removeClass('border border-danger');
		$('.error_password').html('').removeClass('');

		$('input[name="username"]').removeClass('border border-danger');
		$('.error_username').html('').removeClass('text-danger');
	}
	$(document).on('click', '.btn-submit', function(e) {
		e.preventDefault();
		clearForm();
		var form = $('form')[0];
		var data = new FormData(form);
		$.ajax({
			url: '<?= base_url('Admin/Users/process') ?>',
			type: "POST",
			data: data,
			enctype: 'multipart/form-data',
			processData: false, // Important!
			contentType: false,
			cache: false,
			dataType: 'json',
			success: function(data) {
				console.log(data);
				var pane = $('#alamat');
				pane.val($.trim(pane.val()).replace(/\s*[\r\n]+\s*/g, '\n')
					.replace(/(<[^\/][^>]*>)\s*/g, '$1')
					.replace(/\s*(<\/[^>]+>)/g, '$1'));
				if (data.status == 'error') {
					if (data.output.confirm_password != null) {
						$('input[name="confirm_password"]').addClass('border border-danger');
						$('.error_confirm_password').html(data.output.confirm_password).addClass('text-danger');
					}

					if (data.output.gambar_profile != null) {
						$('input[name="gambar_profile"]').addClass('border border-danger');
						$('.error_gambar_profile').html(data.output.gambar_profile).addClass('text-danger');
					}

					if (data.output.jenis_kelamin != null) {
						$('input[name="jenis_kelamin"]').addClass('border border-danger');
						$('.error_jenis_kelamin').html(data.output.jenis_kelamin).addClass('text-danger');
					}
					if (data.output.level != null) {
						$('select[name="level"]').addClass('border border-danger');
						$('.error_level').html(data.output.level).addClass('text-danger');
					}
					if (data.output.nama_profile != null) {
						$('input[name="nama_profile"]').addClass('border border-danger');
						$('.error_nama_profile').html(data.output.nama_profile).addClass('text-danger');
					}
					if (data.output.no_hp != null) {
						$('input[name="no_hp"]').addClass('border border-danger');
						$('.error_no_hp').html(data.output.no_hp).addClass('text-danger');
					}
					if (data.output.password != null) {
						$('input[name="password"]').addClass('border border-danger');
						$('.error_password').html(data.output.password).addClass('text-danger');
					}
					if (data.output.username != null) {
						$('input[name="username"]').addClass('border border-danger');
						$('.error_username').html(data.output.username).addClass('text-danger');
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
					$('#modalUsers').modal('hide');
					$("#onLoad").load("<?= current_url() ?> #onLoad > *");
					$('#gambar_profile').html('');

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
	$(document).on('click', '.btn-delete', function(e) {
		e.preventDefault();
		const id_users = $(this).data("id_users");
		Swal.fire({
			title: 'Deleted',
			text: "Yakin ingin menghapus item ini?",
			users: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					url: "<?= base_url('Admin/Users/delete') ?>",
					dataType: 'json',
					type: 'post',
					data: {
						id_users
					},
					success: function(data) {
						if (data.status == 'success') {
							Swal.fire(
								'Deleted!',
								'Your file has been deleted.',
								'success'
							);
							$('.btn-delete[data-id_users="' + id_users + '"]').closest('tr').load("<?= current_url() ?> .btn-delete[data-id_users='" + id_users + "']");
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
	$(document).on('click', '.password_1', function() {
		alert('ofiwejfw');
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
</script>
