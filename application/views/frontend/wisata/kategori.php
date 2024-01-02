<?php
$kategoriWisata = check_kategori_wisata($id_kategori_wisata);
?>
<section class="page-title-area">
	<div class="page-title-overlay">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="page-title">
						<h3><?= $kategoriWisata->nama_kategori_wisata; ?></h3>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<div class="title-breadcrumb">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="bred-title">
					<h3>Kategori Wisata</h3>
				</div>
				<ol class="breadcrumb">
					<li><a href="<?= base_url('Home') ?>">Home</a>
					</li>
					<li><a href="<?= base_url('SigPonorogo/Wisata/index/' . $id_kategori_wisata) ?>">Kategori Wisata</a>
					</li>
				</ol>
			</div>
		</div>
	</div>
</div>
<!-- HOT-DEAL-AREA -->
<section class="hot-deal-area section-padding">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="headline">

					<h2><?= $kategoriWisata->nama_kategori_wisata; ?></h2>
				</div>
				<div class="row">
					<?php foreach ($wisata as $rWisata) : ?>
						<div class="col-lg-3" style="min-height: auto; margin-bottom:15px;">
							<div class="w-100 d-block" style="border: 1px solid #f1f1f1;">
								<a href="<?= base_url('SigPonorogo/Wisata/detail/' . $rWisata->id_wisata) ?>" class="w-100 text-center">
									<h5><?= wordText($rWisata->nama_wisata, 20); ?></h3>
								</a>
								<div class="mt-5" style="text-align: justify; padding:0 15px;">
									<p>
										<?= wordText($rWisata->alamat_wisata, 200); ?>
									</p>
									<a href="<?= base_url('SigPonorogo/Wisata/detail/' . $rWisata->id_wisata) ?>" style="text-decoration: none;"> Detail <i class="fas fa-arrow-right"></i></a>
									<br><br>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- HOT-DEAL-AREA END -->
