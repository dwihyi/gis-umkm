<?php echo view('layout/header');?>
<?=$this->include('layout/sidebar'); ?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Peta UMKM Bengkalis</h1>
          </div>
          <div class="section-body">
            <div id="mapid" style=" height: 550px;"></div>
            <script>
                var data = [
                    <?php foreach($umkm as $key=> $value){ ?>
                        {"lokasi":[<?= $value['latitude']?>, <?= $value['longitude']?>],"nama_usaha":"<?= $value['nama_usaha']?>","alamat":"<?= $value['alamat']?>","id_kecamatan":"<?= $value['kecamatan']?>", "id_sektor":"<?= $value['klbi']?>"},
                    <?php } ?>
        
                ];
                var map = L.map('mapid').setView([1.4809077,102.1287382], 14);
                //var map = new L.Map('map', {zoom: 10, center: new L.latLng(1.4809077,102.1287382) });
                map.addLayer(new L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
                    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                id: 'mapbox/streets-v11'}));

                //layer contain searched elements
                var markersLayer = new L.LayerGroup();	
                map.addLayer(markersLayer);

                var controlSearch = new L.Control.Search({
                    position:'topleft',		
                    layer: markersLayer,
                    initial: false,
                    zoom: 20,
                    marker: false
                });

                map.addControl( new L.Control.Search({
                    layer: markersLayer,
                    initial: false,
                    collapsed: true,
                    zoom: 20,
                }) );
                ////////////populate map with markers from sample data
                for(i in data) {
                    var nama_usaha = data[i].nama_usaha;
                    var alamat = data[i].alamat;
                    var kecamatan = data[i].kecamatan;
                    var sektor = data[i].klbi;	//value searched
                    var lokasi = data[i].lokasi;		//position found
                    var marker = new L.Marker(new L.latLng(lokasi), {title: nama_usaha} );//se property searched
                    marker.bindPopup('Nama Usaha : '+nama_usaha 
                    +'</br>Alamat : '+alamat);
                    markersLayer.addLayer(marker);
                }
            </script>
        </div>
        </section>
      </div>
      <?php echo view('layout/footer');?>
    </div>
  </div>

  