<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peta extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// check_not_login();
		$this->load->model(['Wisata_model', 'Slider_model', 'Wisata_model', 'Kategori_wisata_model', 'Rating_model']);
	}
	public function index()
	{
		$data['title'] = 'Peta Page';
		$id_kategori_wisata = [];
		if (isset($_GET['id_kategori_wisata'])) {
			$id_kategori_wisata = $this->input->get('id_kategori_wisata');
		}

		$wisata = $this->Wisata_model->get(null, null, null, $id_kategori_wisata)->result();

		// marker
		$coordinates = [];
		$latitude = array_column($wisata, 'latitude');
		$longitude = array_column($wisata, 'longitude');
		$nama_wisata = array_column($wisata, 'nama_wisata');
		$deskripsi = array_column($wisata, 'deskripsi');
		$alamat_wisata = array_column($wisata, 'alamat_wisata');
		$buka = array_column($wisata, 'buka');
		$tutup = array_column($wisata, 'tutup');
		$kontak = array_column($wisata, 'kontak');
		$harga_tiket_masuk = array_column($wisata, 'harga_tiket_masuk');
		$gambar = array_column($wisata, 'gambar');
		$icon_id = array_column($wisata, 'icon_id');
		$id_wisata = array_column($wisata, 'id_wisata');

		$numberRate = 0;
		for ($i = 0; $i < count($latitude); $i++) {
			$rowRate = $this->db->get_where('rating', ['wisata_id' => $id_wisata[$i]])->num_rows();
			$rateWisata = $this->db->get_where('rating', ['wisata_id' => $id_wisata[$i]])->result();
			foreach ($rateWisata as $rRateWisata) {
				$numberRate += $rRateWisata->rate;
			}
			if ($rowRate == 0) {
				$totalRate[] = 0;
				$rowRateColumn[] = $rowRate;
			} else {
				$totalRate[] = $numberRate / $rowRate;
				$rowRateColumn[] = $rowRate;
			}
		}

		$geojson = null;
		$geojson2 = null;
		$coor = null;

		for ($i = 0; $i < count($latitude); $i++) {
			$geojson[] =
				[
					'type' => 'Feature',
					'properties' => [
						'iconSize' => [40, 40]
					],
					'geometry' => [
						'type' => 'point',
						'coordinates' => [
							doubleval($longitude[$i]),
							doubleval($latitude[$i])
						],
						'id_wisata' =>  $id_wisata[$i],
						'nama_wisata' =>  $nama_wisata[$i],
						'deskripsi' =>  wordText($deskripsi[$i], 200),
						'alamat_wisata' =>  $alamat_wisata[$i],
						'buka' =>  $buka[$i],
						'tutup' =>  $tutup[$i],
						'kontak' =>  $kontak[$i],
						'harga_tiket_masuk' => rupiah($harga_tiket_masuk[$i]),
						'gambar' =>  $gambar[$i],
						'icon_id' =>  check_icon($icon_id[$i])->icon,
						'rating' => $totalRate[$i],
						'total_rating' => $rowRateColumn[$i]
					],
				];

			$geojson2[] =
				[
					'type' => 'Feature',
					'geometry' => [
						'type' => 'Point',
						'coordinates' => [
							doubleval($longitude[$i]),
							doubleval($latitude[$i])
						],
					],
					'properties' => [
						'phoneFormatted' => $kontak[$i],
						'phone' => $kontak[$i],
						'address' => $alamat_wisata[$i],
						'city' => $nama_wisata[$i],
						'id' => intval($id_wisata[$i]),

						'id_wisata' =>  $id_wisata[$i],
						'nama_wisata' =>  $nama_wisata[$i],
						'deskripsi' =>  wordText($deskripsi[$i], 200),
						'alamat_wisata' =>  $alamat_wisata[$i],
						'buka' =>  $buka[$i],
						'tutup' =>  $tutup[$i],
						'kontak' =>  $kontak[$i],
						'harga_tiket_masuk' => rupiah($harga_tiket_masuk[$i]),
						'gambar' =>  $gambar[$i],
						'icon_id' =>  check_icon($icon_id[$i])->icon,
						'rating' => $totalRate[$i]
					]
				];
		}
		$features = [
			'type' => 'FeatureCollection',
			'features' =>  $geojson2
		];
		if ($geojson != null) {
			foreach ($geojson as $in => $vGeoJson) {
				$coor[] = ($vGeoJson['geometry']['coordinates']);
			}
		}

		$data['kategori_wisata'] = $this->Kategori_wisata_model->get()->result();
		$data['stores'] = json_encode($features);
		$data['coordinates'] = json_encode($coor);
		$data['geojson'] =  json_encode($geojson);
		$data['id_kategori_wisata'] = $id_kategori_wisata;
		$this->template->frontend('frontend/peta/peta', $data);
	}
	public function distance()
	{
		$distance = $this->input->post('distance', true);
		$sort = $distance;
		sort($sort);
		$id_kategori_wisata = $this->input->post('id_kategori_wisata', true);
		$wisata = $this->Wisata_model->get(null, null, null, $id_kategori_wisata)->result();

		// marker
		$coordinates = [];
		$latitude = array_column($wisata, 'latitude');
		$longitude = array_column($wisata, 'longitude');
		$nama_wisata = array_column($wisata, 'nama_wisata');
		$deskripsi = array_column($wisata, 'deskripsi');
		$alamat_wisata = array_column($wisata, 'alamat_wisata');
		$buka = array_column($wisata, 'buka');
		$tutup = array_column($wisata, 'tutup');
		$kontak = array_column($wisata, 'kontak');
		$harga_tiket_masuk = array_column($wisata, 'harga_tiket_masuk');
		$gambar = array_column($wisata, 'gambar');
		$icon_id = array_column($wisata, 'icon_id');
		$id_wisata = array_column($wisata, 'id_wisata');

		$numberRate = 0;
		for ($i = 0; $i < count($latitude); $i++) {
			$rowRate = $this->db->get_where('rating', ['wisata_id' => $id_wisata[$i]])->num_rows();
			$rateWisata = $this->db->get_where('rating', ['wisata_id' => $id_wisata[$i]])->result();
			foreach ($rateWisata as $rRateWisata) {
				$numberRate += $rRateWisata->rate;
			}
			if ($rowRate == 0) {
				$totalRate[] = 0;
				$rowRateColumn[] = $rowRate;
			} else {
				$totalRate[] = $numberRate / $rowRate;
				$rowRateColumn[] = $rowRate;
			}
		}

		for ($i = 0; $i < count($latitude); $i++) {
			$geojson2[] =
				[
					'type' => 'Feature',
					'geometry' => [
						'type' => 'Point',
						'coordinates' => [
							doubleval($longitude[$i]),
							doubleval($latitude[$i])
						],
					],
					'properties' => [
						'phoneFormatted' => $kontak[$i],
						'phone' => $kontak[$i],
						'address' => $alamat_wisata[$i],
						'city' => $nama_wisata[$i],
						'id' => intval($id_wisata[$i]),

						'id_wisata' =>  $id_wisata[$i],
						'nama_wisata' =>  $nama_wisata[$i],
						'deskripsi' =>  wordText($deskripsi[$i], 200),
						'alamat_wisata' =>  $alamat_wisata[$i],
						'buka' =>  $buka[$i],
						'tutup' =>  $tutup[$i],
						'kontak' =>  $kontak[$i],
						'harga_tiket_masuk' => rupiah($harga_tiket_masuk[$i]),
						'gambar' =>  $gambar[$i],
						'icon_id' =>  check_icon($icon_id[$i])->icon,
						'distance' => $distance[$i],
						'rating' => $totalRate[$i],
						'total_rating' => $rowRateColumn[$i]
					]
				];
		}

		foreach ($sort as $rSort) {
			foreach ($geojson2 as $rGeojson2) {
				$distance = $rGeojson2['properties']['distance'];
				if ($rSort == $distance) {
					$geojson1[] = $rGeojson2;
				}
			}
		}

		// count
		$count = count($geojson1) >= 3 ? 3 : count($geojson1);
		foreach ($geojson1 as $index => $rGeojson1) {
			if ($index < $count) {
				$rekomendasi[] = $rGeojson1;
			}
		}

		$features = [
			'type' => 'FeatureCollection',
			'features' =>  $geojson2
		];
		$features2 = [
			'type' => 'FeatureCollection',
			'features' =>  $rekomendasi
		];
		$data = [
			$features,
			$features2,
		];

		echo json_encode($data);
	}
}
