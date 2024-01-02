<link href="https://api.tiles.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.css" rel="stylesheet" />
<link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.css' type='text/css' />

<!-- Import jQuery -->
<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.css" type="text/css">
<!-- Promise polyfill script required to use Mapbox GL Geocoder in IE 11 -->
<script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.auto.min.js"></script>
<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.0/mapbox-gl-directions.js"></script>
<link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.0/mapbox-gl-directions.css" type="text/css"><!-- Import Assembly -->

<!-- Geocoder plugin -->
<script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.min.js'></script>
<!-- Turf.js plugin -->
<script src='https://npmcdn.com/@turf/turf/turf.min.js'></script>

<style>
	.touch-left iframe {
		width: 100%;
	}

	.contact_map_area {
		position: relative;
	}

	.btn-rekomendasi {
		position: absolute;
		top: 10px;
		z-index: 9999;
		left: 10px;
	}

	.btn-kategori {
		position: absolute;
		bottom: 40px;
		z-index: 9999;
		left: 60px;
	}

	.btn-toggle-1 {
		position: absolute;
		top: 10px;
		z-index: 9999;
		right: 155px;
	}

	.btn-toggle-2 {
		position: absolute;
		top: 10px;
		z-index: 9999;
		right: 10px;
	}

	.mapboxgl-ctrl-top-right .mapboxgl-ctrl {
		margin: 70px 10px 0 0;
		float: right;
	}

	body {
		color: #404040;
		font: 400 15px/22px 'Source Sans Pro', 'Helvetica Neue', Sans-serif;
		margin: 0;
		padding: 0;
		-webkit-font-smoothing: antialiased;
	}

	* {
		-webkit-box-sizing: border-box;
		-moz-box-sizing: border-box;
		box-sizing: border-box;
	}

	.sidebar {
		position: absolute;
		width: 25%;
		height: 370px;
		top: 50px;
		left: 10px;
		overflow: hidden;
		border-right: 1px solid rgba(0, 0, 0, 0.25);
		z-index: 9999;
		background-color: #fff;
	}

	.pad2 {
		padding: 20px;
	}

	.map {
		position: absolute;
		left: 33.3333%;
		width: 66.6666%;
		top: 0;
		bottom: 0;
	}

	h1 {
		font-size: 22px;
		margin: 0;
		font-weight: 400;
		line-height: 20px;
		padding: 20px 2px;
	}

	a {
		color: #404040;
		text-decoration: none;
	}

	a:hover {
		color: #101010;
	}

	.heading {
		background: #fff;
		border-bottom: 1px solid #eee;
		min-height: 60px;
		line-height: 60px;
		padding: 0 10px;
		background-color: #00853e;
		color: #fff;
	}

	.listings {
		height: 100%;
		overflow: auto;
		padding-bottom: 60px;
	}

	.listings .item {
		display: block;
		border-bottom: 1px solid #eee;
		padding: 10px;
		text-decoration: none;
	}

	.listings .item:last-child {
		border-bottom: none;
	}

	.listings .item .title {
		display: block;
		color: #00853e;
		font-weight: 700;
	}

	.listings .item .title small {
		font-weight: 400;
	}

	.listings .item.active .title,
	.listings .item .title:hover {
		color: #8cc63f;
	}

	.listings .item.active {
		background-color: #f8f8f8;
	}

	::-webkit-scrollbar {
		width: 3px;
		height: 3px;
		border-left: 0;
		background: rgba(0, 0, 0, 0.1);
	}

	::-webkit-scrollbar-track {
		background: none;
	}

	::-webkit-scrollbar-thumb {
		background: #00853e;
		border-radius: 0;
	}

	.clearfix {
		display: block;
	}

	.clearfix:after {
		content: '.';
		display: block;
		height: 0;
		clear: both;
		visibility: hidden;
	}

	/* Marker tweaks */
	.mapboxgl-popup {
		padding-bottom: 50px;
	}

	.mapboxgl-popup-close-button {
		display: none;
	}

	.mapboxgl-popup-content {
		font: 400 15px/22px 'Source Sans Pro', 'Helvetica Neue', Sans-serif;
		padding: 0;
		width: 180px;
	}

	.mapboxgl-popup-content-wrapper {
		padding: 1%;
	}

	.mapboxgl-popup-content h3 {
		background: #91c949;
		color: #fff;
		margin: 0;
		display: block;
		padding: 10px;
		border-radius: 3px 3px 0 0;
		font-weight: 700;
		margin-top: -15px;
	}

	.mapboxgl-popup-content h4 {
		margin: 0;
		display: block;
		padding: 10px 10px 10px 10px;
		font-weight: 400;
	}

	.mapboxgl-popup-content div {
		padding: 10px;
	}

	.mapboxgl-container .leaflet-marker-icon {
		cursor: pointer;
	}

	.mapboxgl-popup-anchor-top>.mapboxgl-popup-content {
		margin-top: 15px;
	}

	.mapboxgl-popup-anchor-top>.mapboxgl-popup-tip {
		border-bottom-color: #91c949;
	}

	.mapboxgl-ctrl-geocoder {
		border: 2px solid #00853e;
		border-radius: 0;
		position: relative;
		top: 0;
		width: 800px;
		margin-top: 0;
		border: 0;
	}

	.mapboxgl-ctrl-geocoder>div {
		min-width: 100%;
		margin-left: 0;
	}

	.mapboxgl-ctrl-geocoder {
		width: 0px;
	}

	.mapboxgl-ctrl-top-left .mapboxgl-ctrl {

		position: relative;
		left: 130%;
		width: 300px;
	}

	.mapboxgl-ctrl-geocoder input[type='text'] {
		padding-left: 20px;
		;
	}

	.mapboxgl-ctrl-geocoder input::placeholder {
		padding-left: 20px;
	}

	.mapboxgl-popup {
		max-width: 200px;
	}

	.mapboxgl-popup-content {
		text-align: center;
		font-family: 'Open Sans', sans-serif;
	}

	.mapboxgl-ctrl-geocoder.mapboxgl-ctrl {
		display: none;
	}
</style>
<section class="page-title-area">
	<div class="page-title-overlay">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="page-title">
						<h3>PETA SEBARAN LOKASI KABUPATEN PONOROGO</h3>
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
					<h3>Wisata</h3>
				</div>
				<ol class="breadcrumb">
					<li><a href="<?= base_url('Home') ?>">Home</a>
					</li>
					<li><a href="<?= base_url('SigPonorogo/Peta/') ?>">Kategori Wisata</a>
					</li>
				</ol>
			</div>
		</div>
	</div>
</div>

<div class="contact_map_area">
	<div class="map_wrapper">
		<div class="contact_map">
			<a href="#" class="btn btn-primary btn-kategori"><i class="fas fa-layer-group"></i> Kategori</a>
			<a href="#" class="btn btn-primary btn-rekomendasi"><i class="fas fa-star"></i> Wisata Terdekat</a>
			<a href="#" class="btn btn-primary btn-toggle-1"><i class="fas fa-route"></i> Petunjuk Arah</a>
			<a href="#" id="btn-toggle-2"></a>
			<div class="sidebar">
				<div class="heading">
					<h1>Lokasi</h1>
				</div>
				<div id="listings" class="listings"></div>
			</div>
			<form class="kategori_filter" method="get" action="">
				<div class="panel panel-default" style="width:65%; background-color:#fff; height:auto; position:absolute; bottom:20px; z-index:999; left:12%;">
					<div class="panel-heading">
						Kategori
					</div>
					<div class="panel-body">
						<?php foreach ($kategori_wisata as $vKategoriWisata) :
							$icon = $vKategoriWisata->icon_id;
							$icon = check_icon($icon);
						?>
							<label class="checkbox-inline">
								<input name="id_kategori_wisata[]" class="id_kategori_wisata" type="checkbox" value="<?= $vKategoriWisata->id_kategori_wisata; ?>" <?php if (in_array($vKategoriWisata->id_kategori_wisata, $id_kategori_wisata)) {
																																										echo 'checked';
																																									}
																																									?>> <i class='<?= $icon->icon; ?>'></i> <?= $vKategoriWisata->nama_kategori_wisata; ?></label>
						<?php endforeach; ?>
						<br><br>
						<button type="submit" class="btn btn-primary btn-kategori-filter"><i class="fas fa-search"></i> Filter</button>
					</div>
				</div>
			</form>
			<div id="map" style="width:100%; height: 650px;"></div>
		</div>
	</div>
</div>
<input type="hidden" name="boolean" value="true">

<script type="text/javascript" src="<?= base_url('assets/frontend/ecomshop/') ?>js/jQuery.2.1.4.js"></script>
<script src='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js'></script>
<script>
	$(document).ready(function() {
		/* This will let you use the .remove() function later on */
		if (!('remove' in Element.prototype)) {
			Element.prototype.remove = function() {
				if (this.parentNode) {
					this.parentNode.removeChild(this);
				}
			};
		}

		mapboxgl.accessToken = 'pk.eyJ1IjoiYmltYWVnYTEyIiwiYSI6ImNrcXFxbDd6cTAza3oyd215dDNvNWJ2d20ifQ.obyTqre9zTXcmd5XXWvw1A';
		var map = new mapboxgl.Map({
			container: 'map',
			style: 'mapbox://styles/mapbox/streets-v11',
			center: [111.467604, -7.867153],
			zoom: 12,
		})


		// Add geolocate control to the map.
		map.addControl(
			new mapboxgl.GeolocateControl({
				positionOptions: {
					enableHighAccuracy: true
				},
				trackUserLocation: true
			}),
			'bottom-left'
		);

		// navigation
		map.addControl(new mapboxgl.NavigationControl(), 'bottom-left');

		// fullscreen
		map.addControl(new mapboxgl.FullscreenControl(), 'bottom-left');

		// search map
		var coordinatesGeocoder = function(query) {
			// Match anything which looks like
			// decimal degrees coordinate pair.
			var matches = query.match(
				/^[ ]*(?:Lat: )?(-?\d+\.?\d*)[, ]+(?:Lng: )?(-?\d+\.?\d*)[ ]*$/i
			);
			if (!matches) {
				return null;
			}

			function coordinateFeature(lng, lat) {
				return {
					center: [lng, lat],
					geometry: {
						type: 'Point',
						coordinates: [lng, lat]
					},
					place_name: 'Lat: ' + lat + ' Lng: ' + lng,
					place_type: ['coordinate'],
					properties: {},
					type: 'Feature'
				};
			}

			var coord1 = Number(matches[1]);
			var coord2 = Number(matches[2]);
			var geocodes = [];

			if (coord1 < -90 || coord1 > 90) {
				// must be lng, lat
				geocodes.push(coordinateFeature(coord1, coord2));
			}

			if (coord2 < -90 || coord2 > 90) {
				// must be lat, lng
				geocodes.push(coordinateFeature(coord2, coord1));
			}

			if (geocodes.length === 0) {
				// else could be either lng, lat or lat, lng
				geocodes.push(coordinateFeature(coord1, coord2));
				geocodes.push(coordinateFeature(coord2, coord1));
			}

			return geocodes;
		};
		// Add polygon
		map.on('load', function() {
			// Add a data source containing GeoJSON data.
			map.addSource('maine', {
				'type': 'geojson',
				'data': '<?= base_url('public/json/ponorogo_warna.geojson') ?>'
			});

			// Add a new layer to visualize the polygon.
			map.addLayer({
				'id': 'maine',
				'type': 'fill',
				'source': 'maine', // reference the data source
				'layout': {
					'visibility': 'visible'
				},
				'paint': {
					'fill-color': '#cbe4f9', // blue color fill
					'fill-opacity': 0.5
				}
			});
			// Add a black outline around the polygon.
			map.addLayer({
				'id': 'outline',
				'type': 'line',
				'source': 'maine',
				'layout': {
					'visibility': 'visible'
				},
				'paint': {
					'line-color': '#a0d3fb',
					'line-width': 3
				}
			});
		});

		// toggle polygon
		// After the last frame rendered before the map enters an "idle" state.
		map.on('idle', function() {
			// If these two layers have been added to the style,
			// add the toggle buttons.
			if (map.getLayer('maine')) {
				// Enumerate ids of the layers.
				var toggleableLayerIds = ['maine'];
				// Set up the corresponding toggle button for each layer.
				for (var i = 0; i < toggleableLayerIds.length; i++) {
					var id = toggleableLayerIds[i];
					if (!document.getElementById(id)) {
						// Create a link.
						var link = document.createElement('a');
						link.id = id;
						link.href = '#';
						link.innerHTML = "<i class='fas fa-eye'></i> Toogle Wilayah";
						link.className = 'btn btn-primary btn-toggle-2';
						// Show or hide layer when the toggle is clicked.
						link.onclick = function(e) {
							var clickedLayer = id;
							e.preventDefault();
							e.stopPropagation();

							var visibility = map.getLayoutProperty(
								clickedLayer,
								'visibility'
							);

							// Toggle layer visibility by changing the layout object's visibility property.
							if (visibility === 'visible') {
								map.setLayoutProperty(
									clickedLayer,
									'visibility',
									'none'
								);
								this.className = 'btn btn-primary btn-toggle-2';
							} else {
								this.className = 'btn btn-primary btn-toggle-2';
								map.setLayoutProperty(
									clickedLayer,
									'visibility',
									'visible'
								);
							}
						};

						var layers = document.getElementById('btn-toggle-2');
						layers.appendChild(link);
					}
				}
			}
		});


		var longitude = 111.467604;
		var latitude = -7.867153;

		// directions
		var directions = new MapboxDirections({
			accessToken: mapboxgl.accessToken,
			interactive: false
		});
		map.addControl(directions, 'top-right');

		// mouse move
		var num = 1;
		var from_map = null;
		var to_map = null;

		map.on('click', function(e) {
			const lnglat = (e.lngLat);
			const longitude = lnglat.lng;
			const latitude = lnglat.lat;
			const location = [longitude, latitude];
			$.ajax({
				url: 'https://api.mapbox.com/geocoding/v5/mapbox.places/' + location + '.json?access_token=pk.eyJ1IjoiYmltYWVnYTEyIiwiYSI6ImNrcXFxbDd6cTAza3oyd215dDNvNWJ2d20ifQ.obyTqre9zTXcmd5XXWvw1A',
				type: 'get',
				dataType: 'json',
				success: function(data) {
					const locate = data.features[0].place_name;
					var popUp = new mapboxgl.Popup({
							closeOnClick: true
						})
						.setLngLat(location)
						.setHTML(`<h3 style="font-size:12px;">You Clicked Here
						</h3>
							<i class="fas fa-window-close text-danger clost-pop-up" style="position:absolute; cursor:pointer; top:-10px; right:5px;"></i>
						<br>
					<div style="display:block;">
						<span style="font-size:12px;">Anda berada di lokasi: ` + locate + `</span>
					</div>
					<hr style="margin:0;padding:0;">
					<div style="display:flex; justify-content:space-between;">
						<a style="font-size:10px;" class='set_lokasi_awal' data-locate='` + locate + `' href="#">Set Origin</a>
						<a style="font-size:10px;" class='set_lokasi_tujuan' data-locate='` + locate + `' href="#">Set Destination</a>
					</div>
					`)
						.addTo(map);

					$(document).on('click', '.set_lokasi_awal', function(e) {
						e.preventDefault();
						$(".mapboxgl-ctrl-directions.mapboxgl-ctrl").css('display', 'block');
						var locate = $(this).data('locate');
						directions.setOrigin(locate);

					})
					$(document).on('click', '.set_lokasi_tujuan', function(e) {
						e.preventDefault();
						$(".mapboxgl-ctrl-directions.mapboxgl-ctrl").css('display', 'block');
						var locate = $(this).data('locate');
						directions.setDestination(locate);
					})

					$(document).on('click', '.clost-pop-up', function() {
						popUp.remove();
					})

				},
				error: function(x, t, m) {
					console.log(x.responseText);
				}
			})

		});
		$(document).on('click', '.mapbox-directions-origin .mapboxgl-ctrl-geocoder input', function() {
			navigator.geolocation.getCurrentPosition(position => {
				var from = [position.coords.longitude, position.coords.latitude];
				$.ajax({
					url: 'https://api.mapbox.com/geocoding/v5/mapbox.places/' + from + '.json?access_token=pk.eyJ1IjoiYmltYWVnYTEyIiwiYSI6ImNrcXFxbDd6cTAza3oyd215dDNvNWJ2d20ifQ.obyTqre9zTXcmd5XXWvw1A',
					type: 'get',
					dataType: 'json',
					success: function(data) {
						const locate = data.features[0].place_name;
						$('#mapbox-directions-destination-input .suggestions').css('display', 'block');
						var list = `
									<li class="click_lokasi_saya"><a><strong>Lokasi Saya</strong></a></li>
									`;

						$('#mapbox-directions-destination-input .suggestions').html(list);

						$(document).on('click', '.click_lokasi_saya', function(e) {
							e.preventDefault();
							directions.setOrigin(locate);
							$('#mapbox-directions-destination-input .suggestions').css('display', 'none');
						})
					},
					error: function(x, t, m) {
						console.log(x.responseText);
					}
				})
			})
		})

		$(document).on('input', '.mapboxgl-ctrl-geocoder input', function() {
			$('.click_lokasi_saya').remove();
		});

		// store distance
		var stores1 = <?php echo ($stores) ?>;
		var no = 1;
		// check
		if (stores1.features != null) {
			// custom marker
			var geojson = {
				'type': 'FeatureCollection',
				'features': <?= $geojson ?>
			};
			// custom marker
			geojson.features.forEach(function(marker) {
				// Create a DOM element for each marker.
				var el = document.createElement('div');
				el.className = 'marker';
				el.style.backgroundImage =
					'url(<?= base_url('public/image/konfigurasi/marker.png') ?>)';
				el.style.width = marker.properties.iconSize[0] + 'px';
				el.style.height = marker.properties.iconSize[1] + 'px';
				el.style.backgroundSize = '100%';

			});




			navigator.geolocation.getCurrentPosition(position => {
				let stores_new = [];
				$.each(stores1.features, function(index, value) {
					var from = [position.coords.longitude, position.coords.latitude];
					const to = value.geometry.coordinates;

					var options = {
						units: 'kilometers'
					};
					var distance = turf.distance(from, to, options);
					var roundedDistance = distance.toFixed(2);
					stores_new.push(roundedDistance);
				})
				const id_kategori_wisata = <?= json_encode($id_kategori_wisata) ?>;

				$.ajax({
					url: "<?= base_url('SigPonorogo/Peta/distance') ?>",
					method: 'post',
					dataType: 'json',
					data: {
						id_kategori_wisata,
						distance: stores_new
					},
					success: function(data) {
						console.log(data);
						var stores = data[0];
						var stores2 = data[1];
						/**
						 * Assign a unique id to each store. You'll use this `id`
						 * later to associate each point on the map with a listing
						 * in the sidebar.
						 */
						stores.features.forEach(function(store, i) {
							store.properties.id = i;
						});

						/**
						 * Wait until the map loads to make changes to the map.
						 */
						map.on('load', function(e) {
							/**
							 * This is where your '.addLayer()' used to be, instead
							 * add only the source without styling a layer
							 */
							map.addSource('places', {
								'type': 'geojson',
								'data': stores
							});

							/**
							 * Create a new MapboxGeocoder instance.
							 */
							var geocoder = new MapboxGeocoder({
								accessToken: mapboxgl.accessToken,
								mapboxgl: mapboxgl,
								marker: true,
								bbox: [111.467604, -7.867153]
							});

							/**
							 * Add all the things to the page:
							 * - The location listings on the side of the page
							 * - The search box (MapboxGeocoder) onto the map
							 * - The markers onto the map
							 */
							buildLocationList(stores2);
							map.addControl(geocoder, 'top-left');
							addMarkers();

							/**
							 * Listen for when a geocoder result is returned. When one is returned:
							 * - Calculate distances
							 * - Sort stores by distance
							 * - Rebuild the listings
							 * - Adjust the map camera
							 * - Open a popup for the closest store
							 * - Highlight the listing for the closest store.
							 */
							geocoder.on('result', function(ev) {
								/* Get the coordinate of the search result */
								var searchResult = ev.result.geometry;

								/**
								 * Calculate distances:
								 * For each store, use turf.disance to calculate the distance
								 * in miles between the searchResult and the store. Assign the
								 * calculated value to a property called `distance`.
								 */
								var options = {
									units: 'miles'
								};
								stores.features.forEach(function(store) {
									Object.defineProperty(store.properties, 'distance', {
										value: turf.distance(searchResult, store.geometry, options),
										writable: true,
										enumerable: true,
										configurable: true
									});
								});

								/**
								 * Sort stores by distance from closest to the `searchResult`
								 * to furthest.
								 */
								stores.features.sort(function(a, b) {
									if (a.properties.distance > b.properties.distance) {
										return 1;
									}
									if (a.properties.distance < b.properties.distance) {
										return -1;
									}
									return 0; // a must be equal to b
								});

								/**
								 * Rebuild the listings:
								 * Remove the existing listings and build the location
								 * list again using the newly sorted stores.
								 */
								var listings = document.getElementById('listings');
								while (listings.firstChild) {
									listings.removeChild(listings.firstChild);
								}
								buildLocationList(stores2);

								/* Open a popup for the closest store. */
								createPopUp(stores2.features[0]);

								/** Highlight the listing for the closest store. */
								var activeListing = document.getElementById(
									'listing-' + stores2.features[0].properties.id
								);
								activeListing.classList.add('active');

								/**
								 * Adjust the map camera:
								 * Get a bbox that contains both the geocoder result and
								 * the closest store. Fit the bounds to that bbox.
								 */
								var bbox = getBbox(stores, 0, searchResult);
								map.fitBounds(bbox, {
									padding: 100
								});
							});
						});

						/**
						 * Using the coordinates (lng, lat) for
						 * (1) the search result and
						 * (2) the closest store
						 * construct a bbox that will contain both points
						 */
						function getBbox(sortedStores, storeIdentifier, searchResult) {
							var lats = [
								sortedStores.features[storeIdentifier].geometry.coordinates[1],
								searchResult.coordinates[1]
							];
							var lons = [
								sortedStores.features[storeIdentifier].geometry.coordinates[0],
								searchResult.coordinates[0]
							];
							var sortedLons = lons.sort(function(a, b) {
								if (a > b) {
									return 1;
								}
								if (a.distance < b.distance) {
									return -1;
								}
								return 0;
							});
							var sortedLats = lats.sort(function(a, b) {
								if (a > b) {
									return 1;
								}
								if (a.distance < b.distance) {
									return -1;
								}
								return 0;
							});
							return [
								[sortedLons[0], sortedLats[0]],
								[sortedLons[1], sortedLats[1]]
							];
						}

						/**
						 * Add a marker to the map for every store listing.
						 **/
						function addMarkers() {
							/* For each feature in the GeoJSON object above: */
							stores.features.forEach(function(marker) {
								/* Create a div element for the marker. */
								var el = document.createElement('div');
								el.innerHTML = "<i class='" + marker.properties.icon_id + " fa-2x text-info'></i>";
								// el.style.backgroundImage = 'url("<?= base_url('public/image/konfigurasi/marker.png') ?>")';
								// /* Assign a unique `id` to the marker. */
								// el.id = 'marker-' + marker.properties.id;
								// /* Assign the `marker` class to each marker for styling. */
								// el.className = 'marker';

								/**
								 * Create a marker using the div element
								 * defined above and add it to the map.
								 **/
								new mapboxgl.Marker(el, {
										offset: [0, -23]
									})
									.setLngLat(marker.geometry.coordinates)
									.addTo(map);

								/**
								 * Listen to the element and when it is clicked, do three things:
								 * 1. Fly to the point
								 * 2. Close all other popups and display popup for clicked store
								 * 3. Highlight listing in sidebar (and remove highlight for all other listings)
								 **/
								el.addEventListener('click', function(e) {
									flyToStore(marker);
									createPopUp(marker);
									var activeItem = document.getElementsByClassName('active');
									e.stopPropagation();
									if (activeItem[0]) {
										activeItem[0].classList.remove('active');
									}
									var listing = document.getElementById(
										'listing-' + marker.properties.id
									);
									listing.classList.add('active');
								});
							});
						}

						/**
						 * Add a listing for each store to the sidebar.
						 **/
						function buildLocationList(data) {
							data.features.forEach(function(store, i) {
								console.log(store);
								/**
								 * Create a shortcut for `store.properties`,
								 * which will be used several times below.
								 **/
								var prop = store.properties;
								var geometry = store.geometry;

								/* Add a new listing section to the sidebar. */
								var listings = document.getElementById('listings');
								var listing = listings.appendChild(document.createElement('div'));
								/* Assign a unique `id` to the listing. */
								listing.id = 'listing-' + prop.id;
								/* Assign the `item` class to each listing for styling. */
								listing.className = 'item';

								/* Add the link to the individual listing created above. */
								var link = listing.appendChild(document.createElement('a'));
								link.href = '#';
								link.className = 'title';
								link.id = 'link-' + prop.id;
								link.innerHTML = prop.nama_wisata;

								/* Add details to the individual listing. */
								var details = listing.appendChild(document.createElement('div'));
								details.innerHTML = '<small>' + prop.rating + ' / ' + prop.total_rating + ' Reviews</small><br>';
								if (prop.rating == 1) {
									var rating = `
								<span>
									<i class="fas fa-star"></i>
								</span>
								<span>
									<i class="far fa-star"></i>
								</span>
								<span>
									<i class="far fa-star"></i>
								</span>
								<span>
									<i class="far fa-star"></i>
								</span>
								<span>
									<i class="far fa-star"></i>
								</span>
								`;
								} else if (prop.rating == 2) {
									var rating = `
								<span>
									<i class="fas fa-star"></i>
								</span>
								<span>
									<i class="fas fa-star"></i>
								</span>
								<span>
									<i class="far fa-star"></i>
								</span>
								<span>
									<i class="far fa-star"></i>
								</span>
								<span>
									<i class="far fa-star"></i>
								</span>
								`;
								} else if (prop.rating == 3) {
									var rating = `
								<span>
									<i class="fas fa-star"></i>
								</span>
								<span>
									<i class="fas fa-star"></i>
								</span>
								<span>
									<i class="fas fa-star"></i>
								</span>
								<span>
									<i class="far fa-star"></i>
								</span>
								<span>
									<i class="far fa-star"></i>
								</span>
								`;
								} else if (prop.rating == 4) {
									var rating = `
								<span>
									<i class="fas fa-star"></i>
								</span>
								<span>
									<i class="fas fa-star"></i>
								</span>
								<span>
									<i class="fas fa-star"></i>
								</span>
								<span>
									<i class="fas fa-star"></i>
								</span>
								<span>
									<i class="far fa-star"></i>
								</span>
								`;
								} else if (prop.rating == 5) {
									var rating = `
								<span>
									<i class="fas fa-star"></i>
								</span>
								<span>
									<i class="fas fa-star"></i>
								</span>
								<span>
									<i class="fas fa-star"></i>
								</span>
								<span>
									<i class="fas fa-star"></i>
								</span>
								<span>
									<i class="fas fa-star"></i>
								</span>
								`;
								} else {
									var rating = `
								<span>
									<i class="far fa-star"></i>
								</span>
								<span>
									<i class="far fa-star"></i>
								</span>
								<span>
									<i class="far fa-star"></i>
								</span>
								<span>
									<i class="far fa-star"></i>
								</span>
								<span>
									<i class="far fa-star"></i>
								</span>
								`;
								}
								details.innerHTML += '<small style="color:#FFD119;">' + rating + '</small>';
								details.innerHTML += `
            <div style="display:flex;justify-content:center">
                <img style='width:50%; text-align:center;' src='<?= base_url('public/image/wisata/') ?>` + prop.gambar + `'></img>
            </div>
            <br>
            `;
								if (prop.phone) {
									details.innerHTML += '<small>' + prop.deskripsi + '</small>' + '<br>Hp: ' + prop.phoneFormatted;
								}

								// check
								navigator.geolocation.getCurrentPosition(position => {
									details.innerHTML +=
										'<p><strong>' + prop.distance + ' KM</strong></p>';

								});





								/**
								 * Listen to the element and when it is clicked, do four things:
								 * 1. Update the `currentFeature` to the store associated with the clicked link
								 * 2. Fly to the point
								 * 3. Close all other popups and display popup for clicked store
								 * 4. Highlight listing in sidebar (and remove highlight for all other listings)
								 **/
								link.addEventListener('click', function(e) {
									for (var i = 0; i < data.features.length; i++) {
										if (this.id === 'link-' + data.features[i].properties.id) {
											var clickedListing = data.features[i];
											flyToStore(clickedListing);
											createPopUp(clickedListing);
										}
									}
									var activeItem = document.getElementsByClassName('active');
									if (activeItem[0]) {
										activeItem[0].classList.remove('active');
									}
									this.parentNode.classList.add('active');
								});
							});
						}

						/**
						 * Use Mapbox GL JS's `flyTo` to move the camera smoothly
						 * a given center point.
						 **/
						function flyToStore(currentFeature) {
							map.flyTo({
								center: currentFeature.geometry.coordinates,
								zoom: 12
							});
						}

						/**
						 * Create a Mapbox GL JS `Popup`.
						 **/
						function createPopUp(currentFeature) {
							var popUps = document.getElementsByClassName('mapboxgl-popup');
							if (popUps[0]) popUps[0].remove();

							var popup = new mapboxgl.Popup({
									closeOnClick: true
								})
								.setLngLat(currentFeature.geometry.coordinates)
								.setHTML(
									`
                    <div class="panel panel-default" style="margin:0; padding:0;">
                        <div class="panel-body" style="margin:0; padding:0;">
                            <h3 style="font-size:12px;">` + currentFeature.properties.nama_wisata + `</h3>
                            <img src='<?= base_url("public/image/wisata/") ?>` + currentFeature.properties.gambar + `'>
                            <div style="text-align:left;">
                                <small style="font-size:12px;">` + currentFeature.properties.deskripsi + `</small>
                                <br>
                            </div>
                            <div style="display:flex; justify-content: space-between; margin-top:-20px; font-size:10px;">
                                <small>Buka : </small>
                                <small>` + currentFeature.properties.buka.substr(0, 5) + `</small>
                            </div>
                            <div style="display:flex; justify-content: space-between; margin-top:-20px; font-size:10px;">
                                <small>Tutup : </small>
                                <small>` + currentFeature.properties.tutup.substr(0, 5) + `</small>
                            </div>
                            <div style="display:flex; justify-content: space-between; margin-top:-20px; font-size:10px;">
                                <small>Tiket: </small>
                                <small>` + currentFeature.properties.harga_tiket_masuk + `</small>
                            </div>
                            <div style="margin-top:-20px; text-align:left;">
                                <small>
                                    <a target="_blank" class="btn btn-primary btn-sm" href="<?= base_url('SigPonorogo/Wisata/detail/') ?>` + currentFeature.properties.id_wisata + `"> Detail >> </a> 
                                </small>
                            </div>
                        </div>
                    </div>
                    `
								)
								.addTo(map);
						}
					},
					error: function(x, t, m) {
						console.log(x.responseText);
					}
				})
			});
		}


		$(document).on('click', '.btn-toggle', function(e) {
			e.preventDefault();
			var boolean = $('input[name="boolean"]').val();
			if (boolean == 'true') {
				$('input[name="boolean"]').val(false).trigger('change');
			} else {
				$('input[name="boolean"]').val(true).trigger('change');
			}
			var boolean = $('input[name="boolean"]').val();
		})
		$(".sidebar").hide();
		$(".kategori_filter").hide();
		$(".mapboxgl-ctrl-directions.mapboxgl-ctrl").hide();
		// rekomendasi
		$(document).on('click', '.btn-rekomendasi', function(e) {
			e.preventDefault();
			$(".sidebar").toggle();
		})
		$(document).on('click', '.btn-kategori', function(e) {
			e.preventDefault();
			$(".kategori_filter").toggle();
		})
		$(document).on('click', '.btn-toggle-1', function(e) {
			e.preventDefault();
			$(".mapboxgl-ctrl-directions.mapboxgl-ctrl").toggle();
		})
		$(document).on('click', '.btn-toggle-2', function(e) {
			e.preventDefault();
		})
	})
</script>
