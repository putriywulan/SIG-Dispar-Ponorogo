<?php
$konfigurasi = check_konfigurasi();
$uri = $this->uri->segment(1);
$subUri = $this->uri->segment(2);
$subSubUri = $this->uri->segment(3);
$profile = check_profile();
?>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="<?= base_url('Admin/Home') ?>" class="brand-link">
		<img src="<?= base_url('public/image/konfigurasi/' . $konfigurasi->gambar_konfigurasi) ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
		<span class="brand-text font-weight-light"><?= $konfigurasi->nama_aplikasi; ?></span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user panel (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img src="<?= base_url('public/image/users/' . $profile->gambar_profile) ?>" class="img-circle elevation-2" alt="User Image">
			</div>
			<div class="info">
				<a href="<?= base_url('Admin/Profile') ?>" class="d-block"><?= $profile->nama_profile; ?></a>
			</div>
		</div>

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<li class="nav-item">
					<a href="<?= base_url('Admin/Home') ?>" class="nav-link <?= $uri == 'Admin' && $subUri == 'Home' ? 'active' : '' ?>">
						<i class="nav-icon fas fa-home"></i>
						<p>
							Home
						</p>
					</a>
				</li>
				<?php if ($profile->level == 'admin') : ?>
					<li class="nav-item <?= $uri == 'Admin' && $subUri == 'Icon' || $uri == 'Admin' && $subUri == 'Fasilitas' || $uri == 'Admin' && $subUri == 'KategoriWisata' || $uri == 'Admin' && $subUri == 'Wisata' ? 'menu-is-opening menu-open' : '' ?> ">
						<a href="#" class="nav-link <?= $uri == 'Admin' && $subUri == 'Icon' || $uri == 'Admin' && $subUri == 'Fasilitas' || $uri == 'Admin' && $subUri == 'KategoriWisata' || $uri == 'Admin' && $subUri == 'Wisata' ? 'active' : '' ?>">
							<i class="nav-icon fas fa-map-marked-alt"></i>
							<p>
								Management Wisata
								<i class="right fas fa-angle-left"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">
							<!-- <li class="nav-item">
                                <a href="<?= base_url('Admin/Icon') ?>" class="nav-link <?= $uri == 'Admin' && $subUri == 'Icon' ? 'active' : '' ?>">
                                    <i class="fas fa-mouse-pointer nav-icon"></i>
                                    <p>Icon</p>
                                </a>
                            </li> -->
							<li class="nav-item">
								<a href="<?= base_url('Admin/Fasilitas') ?>" class="nav-link <?= $uri == 'Admin' && $subUri == 'Fasilitas' ? 'active' : '' ?>">
									<i class="fas fa-archive nav-icon"></i>
									<p>Fasilitas</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="<?= base_url('Admin/KategoriWisata') ?>" class="nav-link <?= $uri == 'Admin' && $subUri == 'KategoriWisata' ? 'active' : '' ?>">
									<i class="fas fa-layer-group nav-icon"></i>
									<p>Kategori Wisata</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="<?= base_url('Admin/Wisata') ?>" class="nav-link <?= $uri == 'Admin' && $subUri == 'Wisata' ? 'active' : '' ?>">
									<i class="fas fa-map-marker-alt nav-icon"></i>
									<p>Wisata</p>
								</a>
							</li>
						</ul>
					</li>
					<li class="nav-item">
						<a href="<?= base_url('Admin/Slider') ?>" class="nav-link <?= $uri == 'Admin' && $subUri == 'Slider' ? 'active' : '' ?>">
							<i class="nav-icon fas fa-sliders-h"></i>
							<p>
								Slider
							</p>
						</a>
					</li>
				<?php endif; ?>
				<?php if ($profile->level == 'super admin') : ?>
					<li class="nav-item">
						<a href="<?= base_url('Admin/Users') ?>" class="nav-link <?= $uri == 'Admin' && $subUri == 'Users' ? 'active' : '' ?>">
							<i class="nav-icon fas fa-user-lock"></i>
							<p>
								Users
							</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?= base_url('Admin/Log') ?>" class="nav-link <?= $uri == 'Admin' && $subUri == 'Log' ? 'active' : '' ?>">
							<i class="nav-icon fas fa-user-tag"></i>
							<p>
								Log
							</p>
						</a>
					</li>
				<?php endif; ?>
				<?php if ($profile->level == 'admin') : ?>
					<li class="nav-item">
						<a href="<?= base_url('Admin/Lupapassword') ?>" class="nav-link <?= $uri == 'Admin' && $subUri == 'Lupapassword' ? 'active' : '' ?>">
							<i class="nav-icon fas fa-key"></i>
							<p>
								Lupa password
							</p>
						</a>
					</li>
				<?php endif; ?>

				<?php if ($profile->level == 'admin') : ?>
					<li class="nav-item">
						<a href="<?= base_url('Admin/Ulasan') ?>" class="nav-link <?= $uri == 'Admin' && $subUri == 'Ulasan' ? 'active' : '' ?>">
							<i class="nav-icon fas fa-star"></i>
							<p>
								Review / Ulasan
							</p>
						</a>
					</li>
				<?php endif; ?>

				<li class="nav-item">
					<a href="<?= base_url('Login/logout') ?>" class="nav-link <?= $uri == 'Admin' && $subUri == 'logout' ? 'active' : '' ?>">
						<i class="nav-icon fas fa-sign-out-alt"></i>
						<p>
							Logout
						</p>
					</a>
				</li>
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>
