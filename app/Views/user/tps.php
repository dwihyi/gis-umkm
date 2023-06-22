<?php echo view('layout/user-header');?>
<!-- Main Content -->
<div class="main-content">
<section class="section">
    
    <div class="section-body">
        <div id="mapid" style=" height: 550px;"></div>
        <script>
            var mymap = L.map('mapid').setView([-6.912988,107.625302], 10);
  
            L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
                'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            id: 'mapbox/streets-v11',
            
            }).addTo(mymap);

            <?php  foreach ($umkm as $key => $value) { ?>
            L.marker([<?= $value['latitude']?>, <?= $value['longitude']?>]).addTo(mymap)
            .bindPopup("<b><?= $value['nama_tps'] ?></b>");
            <?php } ?>
        </script>
    </div>
</section>
</div>
<?php echo view('layout/footer');?>
</div>
</div>

