<?= $slider; ?>
<!-- HOT-DEAL-AREA -->
<!-- <section class="hot-deal-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="headline">
                    <h2>CARA KERJA</h2>
                </div>
                <div class="row">

                    <div class="col-lg-3" style="min-height: auto; margin-bottom:15px;">
                        <div class="w-100 d-block" style="border: 1px solid #f1f1f1;">
                            <a href="#" class="w-100 text-center">
                                <h3>Pemetaan</h3>
                            </a>
                            <div class="mt-5" style="text-align: justify; padding:0 15px;">
                                <p>
                                    <?php
                                    $text = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, repudiandae repellat perferendis sit id nobis quis quam nulla consequuntur quibusdam itaque blanditiis ut ex harum.';
                                    ?>
                                    <?= wordText($text, 200); ?>
                                    <br>

                                </p>
                                <a href="#" style="text-decoration: none;"> Detail <i class="fas fa-arrow-right"></i></a>
                                <br><br>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3" style="min-height: auto; margin-bottom:15px;">
                        <div class="w-100 d-block" style="border: 1px solid #f1f1f1;">
                            <a href="#" class="w-100 text-center">
                                <h3>Rekomendasi</h3>
                            </a>
                            <div class="mt-5" style="text-align: justify; padding:0 15px;">
                                <p>
                                    <?php
                                    $text = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, repudiandae repellat perferendis sit id nobis quis quam nulla consequuntur quibusdam itaque blanditiis ut ex harum.';
                                    ?>
                                    <?= wordText($text, 200); ?>
                                    <br>

                                </p>
                                <a href="#" style="text-decoration: none;"> Detail <i class="fas fa-arrow-right"></i></a>
                                <br><br>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3" style="min-height: auto; margin-bottom:15px;">
                        <div class="w-100 d-block" style="border: 1px solid #f1f1f1;">
                            <a href="#" class="w-100 text-center">
                                <h3>Rute Wisata</h3>
                            </a>
                            <div class="mt-5" style="text-align: justify; padding:0 15px;">
                                <p>
                                    <?php
                                    $text = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, repudiandae repellat perferendis sit id nobis quis quam nulla consequuntur quibusdam itaque blanditiis ut ex harum.';
                                    ?>
                                    <?= wordText($text, 200); ?>
                                    <br>

                                </p>
                                <a href="#" style="text-decoration: none;"> Detail <i class="fas fa-arrow-right"></i></a>
                                <br><br>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3" style="min-height: auto; margin-bottom:15px;">
                        <div class="w-100 d-block" style="border: 1px solid #f1f1f1;">
                            <a href="#" class="w-100 text-center">
                                <h3>Wilayah Administratif</h3>
                            </a>
                            <div class="mt-5" style="text-align: justify; padding:0 15px;">
                                <p>
                                    <?php
                                    $text = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, repudiandae repellat perferendis sit id nobis quis quam nulla consequuntur quibusdam itaque blanditiis ut ex harum.';
                                    ?>
                                    <?= wordText($text, 200); ?>
                                    <br>

                                </p>
                                <a href="#" style="text-decoration: none;"> Detail <i class="fas fa-arrow-right"></i></a>
                                <br><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!-- HOT-DEAL-AREA END -->

<!-- HOT-DEAL-AREA -->
<section class="hot-deal-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="headline">
                    <h2>KATEGORI WISATA</h2>
                </div>
                <div class="row">
                    <?php foreach ($kategori_wisata as $vKategoriWisata) :
                        $vIcon = check_icon($vKategoriWisata->icon_id);
                    ?>
                        <div class="col-lg-3" style="min-height: auto; margin-bottom:15px;">
                            <div class="w-100 d-block" style="border: 1px solid #f1f1f1;">
                                <a href="<?= base_url('SigPonorogo/Wisata/index/' . $vKategoriWisata->id_kategori_wisata) ?>" class="w-100 text-center">
                                    <h3><i class="<?= $vIcon->icon; ?> fa-4x"></i></h3>
                                </a>
                                <div class="wid-rating mt-5 text-center">
                                    <h4><a href="<?= base_url('SigPonorogo/Wisata/index/' . $vKategoriWisata->id_kategori_wisata) ?>">
                                            <?= wordText($vKategoriWisata->nama_kategori_wisata, 30); ?></a></h4>

                                    <!-- <div class="d-block text-left">
                                        <p><?= $vKategoriWisata->deskripsi; ?></p>
                                    </div> -->
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
            showConfirmButton: false,
            timer: 1500
        }).then((result) => {
            window.location = "<?= base_url('Admin/Wisata') ?>";
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
</script>
