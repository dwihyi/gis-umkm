<?php echo view('layout/user-header');?>
<!-- Main Content -->
<div class="main-content">
<section class="section">

<div id="map" style="width: 1100px; height: 550px;"></div>
<script>

	var map = L.map('map').setView([1.4809077,102.1287382], 14);
	L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
		maxZoom: 19,
		attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
	}).addTo(map);

	<?php foreach($umkm as $key=> $value){ ?>
		L.marker([<?= $value['latitude']?>, <?=$value['longitude']?>])
		.bindPopup("<b>Nama Usaha: <?=$value['nama_usaha']?></b><br>Alamat:<?=$value['alamat']?><br>Sektor Usaha: <?=$value['klbi']?>")
		.addTo(map);
	<?php } ?>

</script>

</section>
</div>
<?php echo view('layout/footer');?>
</div>
</div>

