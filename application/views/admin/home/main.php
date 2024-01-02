<?php
$konfigurasi = check_konfigurasi();
$profile = check_profile();
?>
<style>
	@import 'https://code.highcharts.com/css/highcharts.css';

	.highcharts-pie-series .highcharts-point {
		stroke: #EDE;
		stroke-width: 2px;
	}

	.highcharts-pie-series .highcharts-data-label-connector {
		stroke: silver;
		stroke-dasharray: 2, 2;
		stroke-width: 2px;
	}

	.highcharts-figure,
	.highcharts-data-table table {
		min-width: 320px;
		max-width: 600px;
		margin: 1em auto;
	}

	.highcharts-data-table table {
		font-family: Verdana, sans-serif;
		border-collapse: collapse;
		border: 1px solid #EBEBEB;
		margin: 10px auto;
		text-align: center;
		width: 100%;
		max-width: 500px;
	}

	.highcharts-data-table caption {
		padding: 1em 0;
		font-size: 1.2em;
		color: #555;
	}

	.highcharts-data-table th {
		font-weight: 600;
		padding: 0.5em;
	}

	.highcharts-data-table td,
	.highcharts-data-table th,
	.highcharts-data-table caption {
		padding: 0.5em;
	}

	.highcharts-data-table thead tr,
	.highcharts-data-table tr:nth-child(even) {
		background: #f8f8f8;
	}

	.highcharts-data-table tr:hover {
		background: #f1f7ff;
	}


	body {
		margin-top: 20px;
		background: #eee;
	}

	.timeline {
		list-style-type: none;
		margin: 0;
		padding: 0;
		position: relative
	}

	.timeline:before {
		content: '';
		position: absolute;
		top: 5px;
		bottom: 5px;
		width: 5px;
		background: #2d353c;
		left: 20%;
		margin-left: -2.5px
	}

	.timeline>li {
		position: relative;
		min-height: 50px;
		padding: 20px 0
	}

	.timeline .timeline-time {
		position: absolute;
		left: 0;
		width: 18%;
		text-align: right;
		top: 30px
	}

	.timeline .timeline-time .date,
	.timeline .timeline-time .time {
		display: block;
		font-weight: 600
	}

	.timeline .timeline-time .date {
		line-height: 16px;
		font-size: 12px
	}

	.timeline .timeline-time .time {
		line-height: 24px;
		font-size: 20px;
		color: #242a30
	}

	.timeline .timeline-icon {
		left: 15%;
		position: absolute;
		width: 10%;
		text-align: center;
		top: 40px
	}

	.timeline .timeline-icon a {
		text-decoration: none;
		width: 20px;
		height: 20px;
		display: inline-block;
		border-radius: 20px;
		background: #d9e0e7;
		line-height: 10px;
		color: #fff;
		font-size: 14px;
		border: 5px solid #2d353c;
		transition: border-color .2s linear
	}

	.timeline .timeline-body {
		margin-left: 23%;
		margin-right: 17%;
		background: #fff;
		position: relative;
		padding: 20px 25px;
		border-radius: 6px
	}

	.timeline .timeline-body:before {
		content: '';
		display: block;
		position: absolute;
		border: 10px solid transparent;
		border-right-color: #fff;
		left: -20px;
		top: 20px
	}

	.timeline .timeline-body>div+div {
		margin-top: 15px
	}

	.timeline .timeline-body>div+div:last-child {
		margin-bottom: -20px;
		padding-bottom: 20px;
		border-radius: 0 0 6px 6px
	}

	.timeline-header {
		padding-bottom: 10px;
		border-bottom: 1px solid #e2e7eb;
		line-height: 30px
	}

	.timeline-header .userimage {
		float: left;
		width: 34px;
		height: 34px;
		border-radius: 40px;
		overflow: hidden;
		margin: -2px 10px -2px 0
	}

	.timeline-header .username {
		font-size: 16px;
		font-weight: 600
	}

	.timeline-header .username,
	.timeline-header .username a {
		color: #2d353c
	}

	.timeline img {
		max-width: 100%;
		display: block
	}

	.timeline-content {
		letter-spacing: .25px;
		line-height: 18px;
		font-size: 13px
	}

	.timeline-content:after,
	.timeline-content:before {
		content: '';
		display: table;
		clear: both
	}

	.timeline-title {
		margin-top: 0
	}

	.timeline-footer {
		background: #fff;
		border-top: 1px solid #e2e7ec;
		padding-top: 15px
	}

	.timeline-footer a:not(.btn) {
		color: #575d63
	}

	.timeline-footer a:not(.btn):focus,
	.timeline-footer a:not(.btn):hover {
		color: #2d353c
	}

	.timeline-likes {
		color: #6d767f;
		font-weight: 600;
		font-size: 12px
	}

	.timeline-likes .stats-right {
		float: right
	}

	.timeline-likes .stats-total {
		display: inline-block;
		line-height: 20px
	}

	.timeline-likes .stats-icon {
		float: left;
		margin-right: 5px;
		font-size: 9px
	}

	.timeline-likes .stats-icon+.stats-icon {
		margin-left: -2px
	}

	.timeline-likes .stats-text {
		line-height: 20px
	}

	.timeline-likes .stats-text+.stats-text {
		margin-left: 15px
	}

	.timeline-comment-box {
		background: #f2f3f4;
		margin-left: -25px;
		margin-right: -25px;
		padding: 20px 25px
	}

	.timeline-comment-box .user {
		float: left;
		width: 34px;
		height: 34px;
		overflow: hidden;
		border-radius: 30px
	}

	.timeline-comment-box .user img {
		max-width: 100%;
		max-height: 100%
	}

	.timeline-comment-box .user+.input {
		margin-left: 44px
	}

	.lead {
		margin-bottom: 20px;
		font-size: 21px;
		font-weight: 300;
		line-height: 1.4;
	}

	.text-danger,
	.text-red {
		color: #ff5b57 !important;
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
			<!-- Small boxes (Stat box) -->
			<div class="row">
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-info">
						<div class="inner">
							<h3><?= $admin ?></h3>

							<p>Admin</p>
						</div>
						<div class="icon">
							<i class="ion ion-ios-person"></i>
						</div>
						<?php if ($profile->level == 'super admin') : ?>
							<!-- <a href="<?= base_url('Admin/Users') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
						<?php endif; ?>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-success">
						<div class="inner">
							<h3><?= $superadmin ?></h3>

							<p>Super Admin</p>
						</div>
						<div class="icon">
							<i class="ion ion-ios-person"></i>
						</div>
						<?php if ($profile->level == 'super admin') : ?>
							<!-- <a href="<?= base_url('Admin/Users') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
						<?php endif; ?>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-warning">
						<div class="inner">
							<h3><?= $kategori_wisata ?></h3>

							<p>Kategori Wisata</p>
						</div>
						<div class="icon">
							<i class="ion ion-map"></i>
						</div>
						<?php if ($profile->level == 'super admin') : ?>
							<!-- <a href="<?= base_url('Admin/KategoriWisata') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
						<?php endif; ?>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-danger">
						<div class="inner">
							<h3><?= $wisata ?></h3>

							<p>Wisata</p>
						</div>
						<div class="icon">
							<i class="ion ion-android-map"></i>
						</div>
						<?php if ($profile->level == 'super admin') : ?>
							<!-- <a href="<?= base_url('Admin/Wisata') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
						<?php endif; ?>
					</div>
				</div>
				<!-- ./col -->
			</div>
			<!-- /.row -->

			<div class="row mb-3">
				<div class="col-lg-6">
					<div class="card">
						<div class="card-body">
							<figure class="highcharts-figure">
								<div id="container"></div>
								<p class="highcharts-description">
									Data Master Sistem Informasi Seografis Sebaran Tempat Wisata
								</p>
							</figure>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="calendar calendar-first" id="calendar_first">
						<div class="calendar_header">
							<button class="switch-month switch-left"> <i class="fa fa-chevron-left"></i></button>
							<h2></h2>
							<button class="switch-month switch-right"> <i class="fa fa-chevron-right"></i></button>
						</div>
						<div class="calendar_weekdays"></div>
						<div class="calendar_content"></div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- /.content -->
</div>
<script src="<?= base_url('assets/') ?>plugins/jquery/jquery.min.js"></script>
<script src="<?= base_url('node_modules/sweetalert2/dist/sweetalert2.min.js') ?>"></script>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>



<script>
	$(document).ready(function() {
		Highcharts.chart('container', {

			chart: {
				styledMode: true
			},

			title: {
				text: 'Data Master'
			},
			series: [{
				type: 'pie',
				allowPointSelect: true,
				keys: ['name', 'y', 'selected', 'sliced'],
				data: [
					['Admin', <?= $admin ?>, false],
					['Super Admin', <?= $superadmin ?>, false],
					['Kategori Wisata', <?= $kategori_wisata ?>, false],
					['Wisata', <?= $wisata ?>, false],
				],
				showInLegend: true
			}]
		});
		const success = "<?= $this->session->flashdata('success'); ?>";
		const error = "<?= $this->session->flashdata('error'); ?>";
		if (success != '') {
			Swal.fire({
				icon: 'success',
				title: 'Successfully',
				text: 'Berhasil login',
				showConfirmButton: false,
				timer: 1500
			})
		}

	})
</script>
