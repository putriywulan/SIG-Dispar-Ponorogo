<?php
$konfigurasi = check_konfigurasi();
?>
<footer class="entire_footer">

	<!-- FOOTER-WIDGET-AREA -->
	<div class="footer-widget">
		<div class="ovelay">
			<div class="container">
				<div class="row">
					<div class="col-sm-4 col-sm-4 col-xs-12">
						<div class="widget_logo">
							<a href="<?= base_url('public/image/konfigurasi/' . $konfigurasi->gambar_konfigurasi) ?>"><img width="40%;" src="<?= base_url('public/image/konfigurasi/' . $konfigurasi->gambar_konfigurasi) ?>" alt="<?= $konfigurasi->nama_aplikasi; ?>"></a>
							<ul>
								<li>
									<div class="wl_left">
										<i class="fa fa-location-arrow"></i>
									</div>
									<div class="wl_right">
										<a href="#"><span>Address :</span> <?= $konfigurasi->alamat; ?></a>
									</div>
								</li>
								<li>
									<div class="wl_left">
										<i class="fas fa-envelope"></i>
									</div>
									<div class="wl_right">
										<a href="#"><span>E-mail :</span> <?= $konfigurasi->email; ?></a>
									</div>
								</li>
								<li>
									<div class="wl_left">
										<i class="fa fa-phone"></i>
									</div>
									<div class="wl_right">
										<a href="#"><span>phone :</span> <?= $konfigurasi->no_hp; ?></a>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-lg-8 col-xs-12">
						<div class="widget_single">
							<h4 style="color: #fff;"><?= $konfigurasi->nama_aplikasi; ?></h4>
							<p style="color: #fff;text-align: justify;"><?= $konfigurasi->keterangan; ?></p>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
	<!-- FOOTER-WIDGET-AREA:END -->

	<!-- FOOTER-AREA -->
	<div class="footer_area">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<div class="footer_text">
						<p class="font-weight-bold" style="margin: 0;">&copy;2021 <?= $konfigurasi->created_by; ?>.</p>
						<small>Dinas Pariwisata Kebudayaan Pemudan dan Olahraga Kabupaten Ponorogo</small>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- FOOTER-AREA:END -->
</footer>
