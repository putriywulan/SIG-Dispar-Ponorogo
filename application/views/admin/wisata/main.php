<style>
	.modal-body iframe {
		width: 100%;
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
							<a data-toggle="modal" data-target="#modalWisata" href="<?= base_url('Admin/Wisata/add') ?>" class="btn btn-dark btn-add"><i class="fas fa-plus"></i> Tambah</a>
							<br><br>
							<div class="table-responsive">
								<table class="table table-bordered" id="dataTables">
									<thead>
										<tr>
											<th width="5%;">No.</th>
											<th>Kategori</th>
											<th>Nama</th>
											<th width="25%;" class="text-center">Gambar</th>
											<th>Deskripsi</th>
											<th class="text-center" width="15%;">Action</th>
										</tr>
									</thead>
									<tbody id="onLoad">
										<?php
										$no = 1;
										foreach ($result as $row) :
										?>
											<tr>
												<td><?= $no++; ?></td>
												<td><?= $row->nama_kategori_wisata; ?></td>
												<td><?= $row->nama_wisata; ?></td>

												<td class="text-center">
													<a href="<?= base_url('public/image/wisata/' . $row->gambar) ?>" target="_blank">
														<img src="<?= base_url('public/image/wisata/' . $row->gambar) ?>" class="w-50" alt="" />
													</a>
												</td>
												<td><?= $row->alamat_wisata; ?></td>
												<td class="text-center">
													<a class="btn btn-success btn-sm btn-edit" data-id_wisata="<?= $row->id_wisata; ?>" href="<?= base_url('Admin/Wisata/edit/' . $row->id_wisata) ?>"><i class="fas fa-pencil-alt"></i> Edit</a>
													<a class="btn btn-danger btn-sm btn-delete" data-id_wisata="<?= $row->id_wisata; ?>" href="<?= base_url('Admin/Wisata/delete/' . $row->id_wisata) ?>"><i class="fas fa-trash"></i> Delete</a>
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
<div class="modal fade" id="modalWisata" tabindex="-1" role="dialog" aria-labelledby="modalWisataLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalWisataLabel">Form Wisata</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<form action="<?= base_url('Admin/Wisata/process') ?>" method="post" enctype="multipart/form-data">
				<div class="modal-body">
					<input type="hidden" name="id_wisata" value="<?= $modal->id_wisata; ?>">
					<input type="hidden" name="page" value="<?= $page; ?>">
					<div class="form-group">
						<label for="">Kategori Wisata</label>
						<?php
						$kategoriWisata = $modal->kategori_wisata_id != null ? $modal->kategori_wisata_id : set_value('kategori_wisata_id');
						?>
						<select name="kategori_wisata_id" class="form-control  <?= form_error('kategori_wisata_id') != null ? 'border border-danger' : '' ?>">
							<option value="">-- Kategori Wisata --</option>
							<?php foreach ($kategori_wisata as $v_KategoriWisata) : ?>
								<option value="<?= $v_KategoriWisata->id_kategori_wisata ?>" <?= $kategoriWisata == $v_KategoriWisata->id_kategori_wisata ? 'selected' : '' ?>>
									<?= $v_KategoriWisata->nama_kategori_wisata ?>
								</option>
							<?php endforeach; ?>
						</select>
						<?= form_error('kategori_wisata_id') ?>
						<span class="error_kategori_wisata_id"></span>
						</select>
					</div>
					<div class="row">
						<div class="col-lg-4">
							<div class="form-group">
								<label for="">Kabupaten</label>
								<input type="text" class="form-control" readonly value="Kabupaten Ponorogo" placeholder="Kabupaten Ponorogo">
								<input type="hidden" name="kabupaten_id" value="">
								<span class="error_kabupaten_id"></span>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label for="">Kecamatan</label>
								<select name="kecamatan_id" class="form-control" id="">
									<option value="">--Kecamatan--</option>

								</select>
								<span class="error_kecamatan_id"></span>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label for="">Kelurahan</label>
								<select name="kelurahan_id" class="form-control" id="">
									<option value="">--Kelurahan--</option>

								</select>
								<span class="error_kelurahan_id"></span>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="">Nama Wisata</label>
						<input type="text" name="nama_wisata" class="form-control  <?= form_error('nama_wisata') != null ? 'border border-danger' : '' ?>" placeholder="Nama wisata" value="<?= $modal->nama_wisata != null ? $modal->nama_wisata : set_value('nama_wisata') ?>">
						<?= form_error('nama_wisata') ?>
						<span class="error_nama_wisata"></span>
					</div>


					<div class="form-group">
						<label for="">Deskripsi</label>
						<textarea name="deskripsi" id="deskripsi" class="form-control  <?= form_error('deskripsi') != null ? 'border border-danger' : '' ?>" placeholder="Deskripsi">
                                    <?= $modal->deskripsi != null ? $modal->deskripsi : set_value('deskripsi') ?>
                                    </textarea>
						<?= form_error('deskripsi') ?>
						<span class="error_deskripsi"></span>
					</div>

					<div class="form-group">
						<label for="">Alamat Wisata</label>
						<textarea name="alamat_wisata" id="alamat_wisata" class="form-control  <?= form_error('alamat_wisata') != null ? 'border border-danger' : '' ?>" placeholder="Nama Dusun/ Nama Jalan/ RT/RW">
                                    <?= $modal->alamat_wisata != null ? $modal->alamat_wisata : set_value('alamat_wisata') ?>
                                    </textarea>
						<?= form_error('alamat_wisata') ?>
						<span class="error_alamat_wisata"></span>
					</div>
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label for="">Latitude</label>
								<input type="text" name="latitude" class="form-control  <?= form_error('latitude') != null ? 'border border-danger' : '' ?>" placeholder="Latitude" value="<?= $modal->latitude != null ? $modal->latitude : set_value('latitude') ?>">
								<?= form_error('latitude') ?>
								<span class="error_latitude"></span>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label for="">Longitude</label>
								<input type="text" name="longitude" class="form-control  <?= form_error('longitude') != null ? 'border border-danger' : '' ?>" placeholder="Longitude" value="<?= $modal->longitude != null ? $modal->longitude : set_value('longitude') ?>">
								<?= form_error('longitude') ?>
								<span class="error_longitude"></span>
							</div>
						</div>
						<div class="col-lg-12">
							<div id="map" style="width: 100%; height:450px;"></div>
						</div>
					</div>

					<div class="form-group">
						<label for="">Video</label>
						<div id="vidio"></div>
						<?= $modal->vidio != null ? $modal->vidio : set_value('vidio') ?>
						<textarea name="vidio" class="form-control  <?= form_error('vidio') != null ? 'border border-danger' : '' ?>" placeholder="Video"></textarea>
						<?= form_error('vidio') ?>
						<span class="error_vidio"></span>
					</div>
					<div class="form-group">
						<?php
						$fasilitas_id = $modal->fasilitas_id != null ? $modal->fasilitas_id : set_value('fasilitas_id[]');
						$fasilitasId = explode(',', $fasilitas_id);
						?>
						<label for="">Fasilitas</label><br>
						<?php foreach ($fasilitas as $index => $vFasilitas) : ?>
							<div class="form-check form-check-inline">
								<input name="fasilitas_id[]" class="form-check-input fasilitas_id" type="checkbox" id="nama_fasilitas<?= $index ?>" value="<?= $vFasilitas->id_fasilitas; ?>" <?php
																																																if (in_array($vFasilitas->id_fasilitas, $fasilitasId)) {
																																																	echo 'checked';
																																																}
																																																?>>
								<label class="form-check-label" for="nama_fasilitas<?= $index ?>"><?= $vFasilitas->nama_fasilitas; ?></label>
							</div>
						<?php endforeach; ?> <br>
						<?= form_error('fasilitas_id') ?>
						<span class="error_fasilitas_id"></span>
					</div>
					<div class="form-group">
						<label for="">Harga tiket masuk</label>
						<input type="text" name="harga_tiket_masuk" class="form-control price  <?= form_error('harga_tiket_masuk') != null ? 'border border-danger' : '' ?>" placeholder="Harga tiket masuk" value="<?= $modal->harga_tiket_masuk != null ? $modal->harga_tiket_masuk : set_value('harga_tiket_masuk') ?>">
						<?= form_error('harga_tiket_masuk') ?>
						<span class="error_harga_tiket_masuk"></span>
					</div>
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label for="">Buka</label>
								<input type="text" name="buka" class="form-control timepicker  <?= form_error('buka') != null ? 'border border-danger' : '' ?>" placeholder="buka" value="<?= $modal->buka != null ? $modal->buka : set_value('buka') ?>">
								<?= form_error('buka') ?>
								<span class="error_buka"></span>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label for="">Tutup</label>
								<input type="text" name="tutup" class="form-control timepicker  <?= form_error('tutup') != null ? 'border border-danger' : '' ?>" placeholder="tutup" value="<?= $modal->tutup != null ? $modal->tutup : set_value('tutup') ?>">
								<?= form_error('tutup') ?>
								<span class="error_tutup"></span>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="">Hari Buka</label><br>
						<div class="form-check form-check-inline">
							<input name="hari_buka[]" class="form-check-input hari_buka" type="checkbox" id="hari_buka0" value="Senin">
							<label class="form-check-label" for="hari_buka0">Senin</label>
						</div>
						<div class="form-check form-check-inline">
							<input name="hari_buka[]" class="form-check-input hari_buka" type="checkbox" id="hari_buka1" value="Selasa">
							<label class="form-check-label" for="hari_buka1">Selasa</label>
						</div>
						<div class="form-check form-check-inline">
							<input name="hari_buka[]" class="form-check-input hari_buka" type="checkbox" id="hari_buka2" value="Rabu">
							<label class="form-check-label" for="hari_buka2">Rabu</label>
						</div>
						<div class="form-check form-check-inline">
							<input name="hari_buka[]" class="form-check-input hari_buka" type="checkbox" id="hari_buka3" value="Kamis">
							<label class="form-check-label" for="hari_buka3">Kamis</label>
						</div>
						<div class="form-check form-check-inline">
							<input name="hari_buka[]" class="form-check-input hari_buka" type="checkbox" id="hari_buka4" value="Jumat">
							<label class="form-check-label" for="hari_buka4">Jumat</label>
						</div>
						<div class="form-check form-check-inline">
							<input name="hari_buka[]" class="form-check-input hari_buka" type="checkbox" id="hari_buka5" value="Sabtu">
							<label class="form-check-label" for="hari_buka5">Sabtu</label>
						</div>
						<div class="form-check form-check-inline">
							<input name="hari_buka[]" class="form-check-input hari_buka" type="checkbox" id="hari_buka6" value="Minggu">
							<label class="form-check-label" for="hari_buka6">Minggu</label>
						</div>
						<br>
						<span class="error_hari_buka[]"></span>
					</div>
					<div class="form-group">
						<label for="">Kontak</label>
						<input type="number" name="kontak" class="form-control  <?= form_error('kontak') != null ? 'border border-danger' : '' ?>" placeholder="kontak" value="<?= $modal->kontak != null ? $modal->kontak : set_value('kontak') ?>">
						<?= form_error('kontak') ?>
						<span class="error_kontak"></span>
					</div>
					<div class="row">
						<div class="col-lg-4">
							<div class="form-group">
								<label for="">Facebook</label>
								<input type="text" name="facebook" class="form-control  <?= form_error('facebook') != null ? 'border border-danger' : '' ?>" placeholder="facebook" value="<?= $modal->facebook != null ? $modal->facebook : set_value('facebook') ?>">
								<?= form_error('facebook') ?>
								<span class="error_facebook"></span>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label for="">Twitter</label>
								<input type="text" name="twitter" class="form-control  <?= form_error('twitter') != null ? 'border border-danger' : '' ?>" placeholder="twitter" value="<?= $modal->twitter != null ? $modal->twitter : set_value('twitter') ?>">
								<?= form_error('twitter') ?>
								<span class="error_twitter"></span>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label for="">Instagram</label>
								<input type="text" name="instagram" class="form-control  <?= form_error('instagram') != null ? 'border border-danger' : '' ?>" placeholder="instagram" value="<?= $modal->instagram != null ? $modal->instagram : set_value('instagram') ?>">
								<?= form_error('instagram') ?>
								<span class="error_instagram"></span>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="">Gambar Utama</label>
						<input type="file" name="gambar" class="form-control  <?= form_error('gambar') != null ? 'border border-danger' : '' ?>">
						<?php
						if ($modal->gambar != null) {
							echo '<img src="' . base_url('public/image/wisata/' . $modal->gambar) . '" class="img-thumbnail w-25" target="_blank"></img>';
						}
						?>
						<div id="gambar"></div>
						<?= form_error('gambar') ?>
						<span class="error_gambar"></span>
					</div>
					<div class="form-group">
						<label for="">Gambar lainnya</label>
						<div class="input-images"></div>
						<span class="error_images"></span>
					</div>
					<!-- <div class="form-group">
                        <label for="">Gambar Lainnya</label>
                        <input type="file" name="nama_gambar_wisata[]" class="form-control" id="gambar_upload" multiple>
                        <?= form_error('nama_gambar_wisata') ?>
                        <?php if ($gambar_wisata != null) : ?>
                            <?php foreach ($gambar_wisata as $rGambarWisata) : ?>
                                <img src="<?= base_url('public/image/wisatalainnya/' . $rGambarWisata->nama_gambar_wisata) ?>" class="img-thumbnail" style="width:10%;" target="_blank"></img>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        <span class="error_nama_gambar_wisata[]"></span>
                    </div> -->
					<div id="nama_gambar_wisata"></div>
					<div id="preview"></div>
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
<script src="https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js"></script>
<script src="https://cdn.jsdelivr.net/npm/autonumeric@4.5.4"></script>

<script>
	$(document).ready(function() {

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
		var pane = $('#deskripsi');
		pane.val($.trim(pane.val()).replace(/\s*[\r\n]+\s*/g, '\n')
			.replace(/(<[^\/][^>]*>)\s*/g, '$1')
			.replace(/\s*(<\/[^>]+>)/g, '$1'));

		var pane = $('#alamat_wisata');
		pane.val($.trim(pane.val()).replace(/\s*[\r\n]+\s*/g, '\n')
			.replace(/(<[^\/][^>]*>)\s*/g, '$1')
			.replace(/\s*(<\/[^>]+>)/g, '$1'));

		function clearForm() {
			$('#gambar').html('');
			$('.image-uploader.has-files').remove();

			$('textarea[name="alamat_wisata"]').removeClass('border border-danger');
			$('.error_alamat_wisata').html('').removeClass('text-danger');

			$('input[name="nama_fasilitas"]').removeClass('border border-danger');
			$('.error_nama_fasilitas').html('').removeClass('text-danger');

			$('input[name="buka"]').removeClass('border border-danger');
			$('.error_buka').html('').removeClass('text-danger');

			$('input[name="tanggal"]').removeClass('border border-danger');
			$('.error_tanggal').html('').removeClass('text-danger');

			$('textarea[name="deskripsi"]').removeClass('border border-danger');
			$('.error_deskripsi').html('').removeClass('text-danger');

			$('input[name="fasilitas_id[]"]').removeClass('border border-danger');
			$('.error_fasilitas_id').html('').removeClass('text-danger');

			$('input[name="gambar"]').removeClass('border border-danger');
			$('.error_gambar').html('').removeClass('text-danger');

			$('input[name="harga_tiket_masuk"]').removeClass('border border-danger');
			$('input[name="harga_tiket_masuk"]').val('').trigger('change');
			$('.error_harga_tiket_masuk').html('').removeClass('text-danger');

			$('select[name="kategori_wisata_id"]').removeClass('border border-danger');
			$('.error_kategori_wisata_id').html('').removeClass('text-danger');

			$('select[name="kelurahan_id"]').removeClass('border border-danger');
			$('.error_kelurahan_id').html('').removeClass('text-danger');

			$('select[name="kecamatan_id"]').removeClass('border border-danger');
			$('.error_kecamatan_id').html('').removeClass('text-danger');

			$('input[name="kontak"]').removeClass('border border-danger');
			$('.error_kontak').html('').removeClass('text-danger');

			$('input[name="latitude"]').removeClass('border border-danger');
			$('.error_latitude').html('').removeClass('text-danger');

			$('input[name="longitude"]').removeClass('border border-danger');
			$('.error_longitude').html('').removeClass('text-danger');

			$('input[name="nama_wisata"]').removeClass('border border-danger');
			$('.error_nama_wisata').html('').removeClass('text-danger');

			$('input[name="tutup"]').removeClass('border border-danger');
			$('.error_tutup').html('').removeClass('text-danger');

			$('input[name="hari_buka[]"]').removeClass('border border-danger');
			$('.error_hari_buka').html('').removeClass('text-danger');


		}
		$(document).on('click', '.btn-submit', function(e) {
			e.preventDefault();
			var form = $('form')[0];
			var data = new FormData(form);
			$.ajax({
				url: '<?= base_url('Admin/Wisata/process') ?>',
				type: "POST",
				data: data,
				dataType: 'json',
				enctype: 'multipart/form-data',
				processData: false, // Important!
				contentType: false,
				cache: false,
				success: function(data) {
					console.log(data);
					var pane = $('#deskripsi');
					pane.val($.trim(pane.val()).replace(/\s*[\r\n]+\s*/g, '\n')
						.replace(/(<[^\/][^>]*>)\s*/g, '$1')
						.replace(/\s*(<\/[^>]+>)/g, '$1'));

					var pane = $('#alamat_wisata');
					pane.val($.trim(pane.val()).replace(/\s*[\r\n]+\s*/g, '\n')
						.replace(/(<[^\/][^>]*>)\s*/g, '$1')
						.replace(/\s*(<\/[^>]+>)/g, '$1'));

					if (data.status == 'error') {
						if (data.output.nama_wisata != null) {
							$('input[name="nama_wisata"]').addClass('border border-danger');
							$('.error_nama_wisata').html(data.output.nama_wisata).addClass('text-danger');
						}

						if (data.output.kategori_wisata_id != null) {
							$('select[name="kategori_wisata_id"]').addClass('border border-danger');
							$('.error_kategori_wisata_id').html(data.output.kategori_wisata_id).addClass('text-danger');
						}
						if (data.output.alamat_wisata != null) {
							$('textarea[name="alamat_wisata"]').addClass('border border-danger');
							$('.error_alamat_wisata').html(data.output.alamat_wisata).addClass('text-danger');
						}
						if (data.output.buka != null) {
							$('input[name="buka"]').addClass('border border-danger');
							$('.error_buka').html(data.output.buka).addClass('text-danger');
						}

						if (data.output.tutup != null) {
							$('input[name="tutup"]').addClass('border border-danger');
							$('.error_tutup').html(data.output.tutup).addClass('text-danger');
						}

						if (data.output.harga_tiket_masuk != null) {
							$('input[name="harga_tiket_masuk"]').addClass('border border-danger');
							$('.error_harga_tiket_masuk').html(data.output.harga_tiket_masuk).addClass('text-danger');
						}

						if (data.output.deskripsi != null) {
							$('textarea[name="deskripsi"]').addClass('border border-danger');
							$('.error_deskripsi').html(data.output.deskripsi).addClass('text-danger');
						}

						if (data.output.tanggal != null) {
							$('input[name="tanggal"]').addClass('border border-danger');
							$('.error_tanggal').html(data.output.tanggal).addClass('text-danger');
						}

						if (data.output.fasilitas_id != null) {
							$('input[name="fasilitas_id[]"]').addClass('border border-danger');
							$('.error_fasilitas_id').html(data.output.fasilitas_id).addClass('text-danger');
						}

						if (data.output.hari_buka != null) {
							$('input[name="hari_buka[]"]').addClass('border border-danger');
							$('.error_hari_buka').html(data.output.hari_buka).addClass('text-danger');
						}

						if (data.output.gambar != null) {
							$('input[name="gambar"]').addClass('border border-danger');
							$('.error_gambar').html(data.output.gambar).addClass('text-danger');
						}

						if (data.output.kontak != null) {
							$('input[name="kontak"]').addClass('border border-danger');
							$('.error_kontak').html(data.output.kontak).addClass('text-danger');
						}
						if (data.output.latitude != null) {
							$('input[name="latitude"]').addClass('border border-danger');
							$('.error_latitude').html(data.output.latitude).addClass('text-danger');
						}

						if (data.output.longitude != null) {
							$('input[name="longitude"]').addClass('border border-danger');
							$('.error_longitude').html(data.output.longitude).addClass('text-danger');
						}

						if (data.output.kelurahan_id != null) {
							$('select[name="kelurahan_id"]').addClass('border border-danger');
							$('.error_kelurahan_id').html(data.output.kelurahan_id).addClass('text-danger');
						}

						if (data.output.kecamatan_id != null) {
							$('select[name="kecamatan_id"]').addClass('border border-danger');
							$('.error_kecamatan_id').html(data.output.kecamatan_id).addClass('text-danger');
						}
						if (data.output.images != null) {
							$('.error_images').html(data.output.images).addClass('text-danger');
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
						$('#modalWisata').modal('hide');
						$("#onLoad").load("<?= current_url() ?> #onLoad > *");
						$('.input-images').imageUploader();
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
			clearForm();
			const id_kategori_wisata = $(this).data('id_kategori_wisata');
			$('form')[0].reset();
			$('.btn-submit').attr('name', 'add');
			$('input[name="page"]').val('add');
			var pane = $('#deskripsi');
			pane.val($.trim(pane.val()).replace(/\s*[\r\n]+\s*/g, '\n')
				.replace(/(<[^\/][^>]*>)\s*/g, '$1')
				.replace(/\s*(<\/[^>]+>)/g, '$1'));

			var pane = $('#alamat_wisata');
			pane.val($.trim(pane.val()).replace(/\s*[\r\n]+\s*/g, '\n')
				.replace(/(<[^\/][^>]*>)\s*/g, '$1')
				.replace(/\s*(<\/[^>]+>)/g, '$1'));
			$('#vidio').html('');
		})
		$(document).on('click', '.btn-edit', function(e) {
			e.preventDefault();
			clearForm();
			$('form')[0].reset();
			const id_wisata = $(this).data('id_wisata');

			$.ajax({
				url: '<?= base_url('Admin/Wisata/edit/') ?>' + id_wisata,
				method: 'get',
				dataType: 'json',
				success: function(data) {
					const {
						row,
						gambar_wisata
					} = data;
					$('input[name="id_wisata"]').val(row.id_wisata);
					$('select[name="kategori_wisata_id"]').val(row.kategori_wisata_id).trigger('change');
					$('textarea[name="alamat_wisata"]').val(row.alamat_wisata);
					$('input[name="nama_wisata"]').val(row.nama_wisata);
					$('textarea[name="deskripsi"]').val(row.deskripsi_wisata);
					$('input[name="latitude"]').val(row.latitude);
					$('input[name="tanggal"]').val(row.tanggal);
					$('input[name="longitude"]').val(row.longitude);
					$('textarea[name="vidio"]').val(row.vidio);
					$('#vidio').html(row.vidio);
					$('input[name="harga_tiket_masuk"]').val(row.harga_tiket_masuk);
					$('input[name="buka"]').val(row.buka);
					$('input[name="tutup"]').val(row.tutup);
					$('input[name="kontak"]').val(row.kontak);
					$('input[name="facebook"]').val(row.facebook);
					$('input[name="twitter"]').val(row.twitter);
					$('input[name="instagram"]').val(row.instagram);
					mapbox(row.longitude, row.latitude);
					$('#gambar').html(`
                <a target="_blank" href="<?= base_url('public/image/wisata/') ?>` + row.gambar + `">
                    <img src="<?= base_url('public/image/wisata/') ?>` + row.gambar + `" class="w-25"></img>
                </a>
                `);

					const fasilitas_id = row.fasilitas_id;
					const id_fasilitas = fasilitas_id.split(",");
					$.each(id_fasilitas, function(index, value) {
						$('.fasilitas_id[value="' + value + '"]').prop('checked', true);
					})

					const hari_buka = row.hari_buka;
					const buka_hari = hari_buka.split(",");
					$.each(buka_hari, function(index, value) {
						$('.hari_buka[value="' + value + '"]').prop('checked', true);
					})
					$('.input-images').imageUploader({
						preloaded: gambar_wisata,
						imagesInputName: 'images',
						preloadedInputName: 'old'
					});
					// $('#nama_gambar_wisata').html(gambar_wisata);
					kecamatan(row.kecamatan_id);
					kelurahan(row.kecamatan_id, row.kelurahan_id);
					$('#modalWisata').modal('show');
					$('.btn-submit').attr('name', 'edit');
					$('input[name="page"]').val('edit');
					new AutoNumeric('.price', {
						decimalCharacter: '.',
						digitGroupSeparator: ',',
						decimalPlaces: 0,
					});
				},
				error: function(x, t, m) {
					console.log(x.responseText);
				}
			})
		})
		$(document).on('click', '.btn-delete', function(e) {
			e.preventDefault();
			const id_wisata = $(this).data("id_wisata");
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
						url: "<?= base_url('Admin/Wisata/delete') ?>",
						dataType: 'json',
						type: 'post',
						data: {
							id_wisata
						},
						success: function(data) {
							if (data.status == 'success') {
								Swal.fire(
									'Deleted!',
									'Your file has been deleted.',
									'success'
								);
								$('.btn-delete[data-id_wisata="' + id_wisata + '"]').closest('tr').load("<?= current_url() ?> .btn-delete[data-id_wisata='" + id_wisata + "']");
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

		var pane = $('#deskripsi');
		pane.val($.trim(pane.val()).replace(/\s*[\r\n]+\s*/g, '\n')
			.replace(/(<[^\/][^>]*>)\s*/g, '$1')
			.replace(/\s*(<\/[^>]+>)/g, '$1'));
		var pane = $('#alamat_wisata');
		pane.val($.trim(pane.val()).replace(/\s*[\r\n]+\s*/g, '\n')
			.replace(/(<[^\/][^>]*>)\s*/g, '$1')
			.replace(/\s*(<\/[^>]+>)/g, '$1'));

		// preview images
		// function previewImages() {

		//     var preview = document.querySelector('#preview');

		//     if (this.files) {
		//         [].forEach.call(this.files, readAndPreview);
		//     }

		//     function readAndPreview(file) {

		//         // Make sure `file.name` matches our extensions criteria
		//         if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
		//             return alert(file.name + " is not an image");
		//         } // else...

		//         var reader = new FileReader();

		//         reader.addEventListener("load", function() {
		//             var image = new Image();
		//             image.height = 100;
		//             image.title = file.name;
		//             image.src = this.result;
		//             preview.appendChild(image);
		//         });

		//         reader.readAsDataURL(file);

		//     }

		// }

		// document.querySelector('#gambar_upload').addEventListener("change", previewImages);

		// function readURL(input) {
		//     if (input.files && input.files[0]) {
		//         var reader = new FileReader();
		//         reader.onload = function(e) {
		//             $('#picture').attr('src', e.target.result);
		//         }

		//         reader.readAsDataURL(input.files[0]);
		//     }
		// }

		// $("#gambar_upload").change(function() {
		//     readURL(this);
		//     $('#picture').removeClass('d-none');
		// });

		new AutoNumeric('.price', {
			decimalCharacter: '.',
			digitGroupSeparator: ',',
			decimalPlaces: 0,
		});

		// api alamat
		// api alamat
		const id_kabupaten = 3502;

		function kabupaten() {
			api("kota/" + id_kabupaten);
		}

		function kecamatan(id_kecamatan = null) {
			api("kecamatan?id_kota=" + id_kabupaten, id_kecamatan);
		}

		function kelurahan(id_kecamatan = null, id_kelurahan = null) {
			$(document).on('change', 'select[name="kecamatan_id"]', function() {
				var value = $(this).val();
				api("kelurahan?id_kecamatan=" + value, id_kecamatan, id_kelurahan);
			})
		}

		function api(api, id_kecamatan, id_kelurahan) {
			$.ajax({
				url: "https://dev.farizdotid.com/api/daerahindonesia/" + api,
				method: 'get',
				dataType: 'json',
				success: function(data) {
					console.log(data);
					if (data.nama == 'Kabupaten Ponorogo') {
						$('input[name="kabupaten_id"]').val(data.id);
					}
					if (data.kecamatan != null) {
						var output = '<option value="">-- Kecamatan --</option>';
						var kecamatan = data.kecamatan;
						$.each(kecamatan, function(index, data) {
							output += `
                    <option value="` + data.id + `">` + data.nama + `</option>
                    `;
						});
						$('select[name="kecamatan_id"]').html(output);
						// focus
						var kecamatan = id_kecamatan;
						$('select[name="kecamatan_id"]').val(id_kecamatan).trigger('change');
					}
					if (data.kelurahan != null) {
						var output = '<option>-- Kelurahan --</option>';
						var kelurahan = data.kelurahan;
						$.each(kelurahan, function(index, data) {
							output += `
                    <option value="` + data.id + `">` + data.nama + `</option>
                    `;
						});
						$('select[name="kelurahan_id"]').html(output);
						var kelurahan = id_kelurahan;
						$('select[name="kelurahan_id"]').val(kelurahan).trigger('change');
					}
				},
				error: function(x, t, m) {
					console.log(x.responseText);
				}
			})
		}

		// run api
		kabupaten();
		kecamatan();
		kelurahan();

		mapbox(111.467604, -7.867153);

		function mapbox(longitude, latitude) {
			mapboxgl.accessToken = 'pk.eyJ1IjoiYmltYWVnYTEyIiwiYSI6ImNrcXFxbDd6cTAza3oyd215dDNvNWJ2d20ifQ.obyTqre9zTXcmd5XXWvw1A';
			var map = new mapboxgl.Map({
				container: 'map',
				style: 'mapbox://styles/mapbox/streets-v11',
				center: [111.467604, -7.867153],
				zoom: 12
			});
			// fullscreen
			map.addControl(new mapboxgl.FullscreenControl(), 'top-right');

			var marker = new mapboxgl.Marker({
					draggable: true
				})

				.setLngLat([longitude, latitude])
				.addTo(map);

			function onDragEnd() {
				var lngLat = marker.getLngLat();
				var longitude = lngLat.lng;
				var latitude = lngLat.lat

				$('input[name="latitude"]').val(latitude);
				$('input[name="longitude"]').val(longitude);
			}

			marker.on('dragend', onDragEnd);
		}
	})
</script>
