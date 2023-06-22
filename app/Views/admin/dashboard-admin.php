<?php echo view('layout/header');?>
<?=$this->include('layout/sidebar'); ?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Peta UMKM Bengkalis</h1>
          </div>
          <div class="section-body">
            <div id="map" style=" height: 550px;"></div>
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
        </div>
        </section>
      </div>
      <?php echo view('layout/footer');?>
    </div>
  </div>

  