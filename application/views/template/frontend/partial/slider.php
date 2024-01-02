<div class="main_slider">
    <div class="tp-banner-container">
        <div class="tp-banner">
            <ul>
                <?php foreach ($slider as $vSlider) : ?>
                    <li data-transition="zoomout" data-slotamount="7" data-masterspeed="1000">
                        <!-- MAIN IMAGE -->
                        <img src="<?= base_url('public/image/slider/' . $vSlider->nama_file) ?>" alt="darkblurbg">
                        <!-- LAYER NR. 1 -->
                        <div class="tp-caption black_heavy_60 skewfromleftshort tp-resizeme rs-parallaxlevel-0" data-x="50" data-y="133" data-speed="500" data-start="1850" data-easing="Power3.easeInOut" data-splitin="chars" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" style="z-index: 7; max-width: auto; max-height: auto; white-space: nowrap;"><?= $vSlider->judul; ?>
                        </div>
                        <!-- LAYER NR. 2 -->
                        <div class="tp-caption grey_regular_18 customin tp-resizeme rs-parallaxlevel-0" data-x="50" data-y="200" data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="500" data-start="2600" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.05" data-endelementdelay="0.1" style="z-index: 9; max-width: auto; max-height: auto; white-space: nowrap;">
                            <div style="text-align:left;">
                                <?= $vSlider->deskripsi ?>
                            </div>
                        </div>
                        <!-- LAYER NR. 3 -->
                    </li>
                <?php endforeach; ?>

            </ul>
            <div class="tp-bannertimer"></div>
        </div>
    </div>
</div>