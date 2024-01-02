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
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <a href="<?= base_url('Admin/Wisata') ?>" class="btn btn-warning"><i class="fas fa-backward"></i> Kembali</a>
                            <br><br>
                            <form action="<?= base_url('Admin/Wisata/process') ?>" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id_wisata" value="<?= $row->id_wisata; ?>">
                                <div class="form-group">
                                    <label for="">Kategori Wisata</label>
                                    <?php
                                    $kategoriWisata = $row->kategori_wisata_id != null ? $row->kategori_wisata_id : set_value('kategori_wisata_id');
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
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="">Kabupaten</label>
                                            <input type="text" class="form-control" readonly value="Kabupaten Ponorogo" placeholder="Kabupaten Ponorogo">
                                            <input type="hidden" name="kabupaten_id" value="">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="">Kecamatan</label>
                                            <select name="kecamatan_id" class="form-control" id="">
                                                <option value="">--Kecamatan--</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="">Kelurahan</label>
                                            <select name="kelurahan_id" class="form-control" id="">
                                                <option value="">--Kelurahan--</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="">Nama Wisata</label>
                                    <input type="text" name="nama_wisata" class="form-control  <?= form_error('nama_wisata') != null ? 'border border-danger' : '' ?>" placeholder="Nama Dusun/ Nama Jalan/ RT/RW" value="<?= $row->nama_wisata != null ? $row->nama_wisata : set_value('nama_wisata') ?>">
                                    <?= form_error('nama_wisata') ?>
                                </div>


                                <div class="form-group">
                                    <label for="">Deskripsi</label>
                                    <textarea name="deskripsi" id="deskripsi" class="form-control  <?= form_error('deskripsi') != null ? 'border border-danger' : '' ?>" placeholder="Deskripsi">
                                    <?= $row->deskripsi_wisata != null ? $row->deskripsi_wisata : set_value('deskripsi') ?>
                                    </textarea>
                                    <?= form_error('deskripsi') ?>
                                </div>

                                <div class="form-group">
                                    <label for="">Alamat Wisata</label>
                                    <textarea name="alamat_wisata" id="alamat_wisata" class="form-control  <?= form_error('alamat_wisata') != null ? 'border border-danger' : '' ?>" placeholder="Alamat Wisata">
                                    <?= $row->alamat_wisata != null ? $row->alamat_wisata : set_value('alamat_wisata') ?>
                                    </textarea>
                                    <?= form_error('alamat_wisata') ?>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">Latitude</label>
                                            <input type="text" name="latitude" class="form-control  <?= form_error('latitude') != null ? 'border border-danger' : '' ?>" placeholder="Latitude" value="<?= $row->latitude != null ? $row->latitude : set_value('latitude') ?>">
                                            <?= form_error('latitude') ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">Longitude</label>
                                            <input type="text" name="longitude" class="form-control  <?= form_error('longitude') != null ? 'border border-danger' : '' ?>" placeholder="Longitude" value="<?= $row->longitude != null ? $row->longitude : set_value('longitude') ?>">
                                            <?= form_error('longitude') ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div id="map" style="width: 100%; height:450px;"></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="">Vidio</label>
                                    <textarea name="vidio" class="form-control  <?= form_error('vidio') != null ? 'border border-danger' : '' ?>" placeholder="vidio"><?= $row->vidio != null ? $row->vidio : set_value('vidio') ?></textarea>
                                    <?= form_error('vidio') ?>
                                </div>
                                <div class="form-group">
                                    <?php
                                    $fasilitas_id = $row->fasilitas_id != null ? $row->fasilitas_id : set_value('fasilitas_id[]');
                                    $fasilitasId = explode(',', $fasilitas_id);
                                    ?>
                                    <label for="">Fasilitas</label><br>
                                    <?php foreach ($fasilitas as $index => $vFasilitas) : ?>
                                        <div class="form-check form-check-inline">
                                            <input name="fasilitas_id[]" class="form-check-input" type="checkbox" id="nama_fasilitas<?= $index ?>" value="<?= $vFasilitas->id_fasilitas; ?>" <?php
                                                                                                                                                                                                if (in_array($vFasilitas->id_fasilitas, $fasilitasId)) {
                                                                                                                                                                                                    echo 'checked';
                                                                                                                                                                                                }
                                                                                                                                                                                                ?>>
                                            <label class="form-check-label" for="nama_fasilitas<?= $index ?>"><?= $vFasilitas->nama_fasilitas; ?></label>
                                        </div>
                                    <?php endforeach; ?> <br>
                                    <?= form_error('fasilitas_id[]') ?>
                                </div>
                                <div class="form-group">
                                    <label for="">Harga tiket masuk</label>
                                    <input type="text" name="harga_tiket_masuk" class="form-control price  <?= form_error('harga_tiket_masuk') != null ? 'border border-danger' : '' ?>" placeholder="Harga tiket masuk" value="<?= $row->harga_tiket_masuk != null ? $row->harga_tiket_masuk : set_value('harga_tiket_masuk') ?>">
                                    <?= form_error('harga_tiket_masuk') ?>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">Buka</label>
                                            <input type="text" name="buka" class="form-control timepicker  <?= form_error('buka') != null ? 'border border-danger' : '' ?>" placeholder="buka" value="<?= $row->buka != null ? $row->buka : set_value('buka') ?>">
                                            <?= form_error('buka') ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">Tutup</label>
                                            <input type="text" name="tutup" class="form-control timepicker  <?= form_error('tutup') != null ? 'border border-danger' : '' ?>" placeholder="tutup" value="<?= $row->tutup != null ? $row->tutup : set_value('tutup') ?>">
                                            <?= form_error('tutup') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Kontak</label>
                                    <input type="number" name="kontak" class="form-control  <?= form_error('kontak') != null ? 'border border-danger' : '' ?>" placeholder="kontak" value="<?= $row->kontak != null ? $row->kontak : set_value('kontak') ?>">
                                    <?= form_error('kontak') ?>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="">Facebook</label>
                                            <input type="text" name="facebook" class="form-control  <?= form_error('facebook') != null ? 'border border-danger' : '' ?>" placeholder="facebook" value="<?= $row->facebook != null ? $row->facebook : set_value('facebook') ?>">
                                            <?= form_error('facebook') ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="">Twitter</label>
                                            <input type="text" name="twitter" class="form-control  <?= form_error('twitter') != null ? 'border border-danger' : '' ?>" placeholder="twitter" value="<?= $row->twitter != null ? $row->twitter : set_value('twitter') ?>">
                                            <?= form_error('twitter') ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="">Instagram</label>
                                            <input type="text" name="instagram" class="form-control  <?= form_error('instagram') != null ? 'border border-danger' : '' ?>" placeholder="instagram" value="<?= $row->instagram != null ? $row->instagram : set_value('instagram') ?>">
                                            <?= form_error('instagram') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Gambar Utama</label>
                                    <input type="file" name="gambar" class="form-control  <?= form_error('gambar') != null ? 'border border-danger' : '' ?>">
                                    <?php
                                    if ($row->gambar != null) {
                                        echo '<img src="' . base_url('public/image/wisata/' . $row->gambar) . '" class="img-thumbnail w-25" target="_blank"></img>';
                                    }
                                    ?>
                                    <?= form_error('gambar') ?>
                                </div>

                                <div class="form-group">
                                    <label for="">Gambar Lainnya</label>
                                    <input type="file" name="nama_gambar_wisata[]" class="form-control" id="gambar_upload" multiple>
                                    <?= form_error('nama_gambar_wisata') ?>
                                    <?php if ($gambar_wisata != null) : ?>
                                        <?php foreach ($gambar_wisata as $rGambarWisata) : ?>
                                            <img src="<?= base_url('public/image/wisatalainnya/' . $rGambarWisata->nama_gambar_wisata) ?>" class="img-thumbnail" style="width:10%;" target="_blank"></img>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                                <div id="preview"></div>
                                <div class="form-group">
                                    <button type="reset" class="btn btn-danger"><i class="fas fa-undo"></i> Reset</button>
                                    <button name="<?= $page; ?>" type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- /.content -->
</div>
<script src="<?= base_url('assets/') ?>plugins/jquery/jquery.min.js"></script>
<script src="https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js"></script>
<script src="<?= base_url('node_modules/sweetalert2/dist/sweetalert2.min.js') ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/autonumeric@4.5.4"></script>
<script>
    $(document).ready(function() {
        $('.timepicker').timepicker({
            timeFormat: 'HH:mm',
            scrollbar: true
        });

        var pane = $('#deskripsi');
        pane.val($.trim(pane.val()).replace(/\s*[\r\n]+\s*/g, '\n')
            .replace(/(<[^\/][^>]*>)\s*/g, '$1')
            .replace(/\s*(<\/[^>]+>)/g, '$1'));
        var pane = $('#alamat_wisata');
        pane.val($.trim(pane.val()).replace(/\s*[\r\n]+\s*/g, '\n')
            .replace(/(<[^\/][^>]*>)\s*/g, '$1')
            .replace(/\s*(<\/[^>]+>)/g, '$1'));

        function previewImages() {

            var preview = document.querySelector('#preview');

            if (this.files) {
                [].forEach.call(this.files, readAndPreview);
            }

            function readAndPreview(file) {

                // Make sure `file.name` matches our extensions criteria
                if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
                    return alert(file.name + " is not an image");
                } // else...

                var reader = new FileReader();

                reader.addEventListener("load", function() {
                    var image = new Image();
                    image.height = 100;
                    image.title = file.name;
                    image.src = this.result;
                    preview.appendChild(image);
                });

                reader.readAsDataURL(file);

            }

        }

        document.querySelector('#gambar_upload').addEventListener("change", previewImages);

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#picture').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#gambar_upload").change(function() {
            readURL(this);
            $('#picture').removeClass('d-none');
        });

        new AutoNumeric('.price', {
            decimalCharacter: '.',
            digitGroupSeparator: ',',
            decimalPlaces: 0,
        });

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
                    if (data.nama == 'Kabupaten Ponorogo') {
                        $('input[name="kabupaten_id"]').val(data.id);
                    }
                    if (data.kecamatan != null) {
                        var output = '<option>-- Kecamatan --</option>';
                        var kecamatan = data.kecamatan;
                        $.each(kecamatan, function(index, data) {
                            output += `
                            <option value="` + data.id + `">` + data.nama + `</option>
                            `;
                        });
                        $('select[name="kecamatan_id"]').html(output);
                        // focus
                        var id_kecamatan = id_kecamatan;
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
                        var id_kelurahan = id_kelurahan;
                        $('select[name="kelurahan_id"]').val(id_kelurahan).trigger('change');
                    }
                },
                error: function(x, t, m) {
                    console.log(x.responseText);
                }
            })
        } // api alamat
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
                    if (data.nama == 'Kabupaten Ponorogo') {
                        $('input[name="kabupaten_id"]').val(data.id);
                    }
                    if (data.kecamatan != null) {
                        var output = '<option>-- Kecamatan --</option>';
                        var kecamatan = data.kecamatan;
                        $.each(kecamatan, function(index, data) {
                            output += `
                            <option value="` + data.id + `">` + data.nama + `</option>
                            `;
                        });
                        $('select[name="kecamatan_id"]').html(output);
                        // focus
                        var id_kecamatan = id_kecamatan;
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
                        var id_kelurahan = id_kelurahan;
                        $('select[name="kelurahan_id"]').val(id_kelurahan).trigger('change');
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

        mapboxgl.accessToken = 'pk.eyJ1IjoiYmltYWVnYTEyIiwiYSI6ImNrcXFxbDd6cTAza3oyd215dDNvNWJ2d20ifQ.obyTqre9zTXcmd5XXWvw1A';
        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v11',
            center: [111.467604, -7.867153],
            zoom: 12
        });
        // fullscreen
        map.addControl(new mapboxgl.FullscreenControl(), 'top-right');
        var longitude = <?= $row->longitude != null ? $row->longitude : 111.467604; ?>;
        var latitude = <?= $row->latitude != null ? $row->latitude : -7.867153; ?>;

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


    })
</script>