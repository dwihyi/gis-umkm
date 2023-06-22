<?php echo view('layout/header');?>
<?=$this->include('layout/sidebar'); ?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Lengkapi Profil UMKM</h1>
          </div>
          <div class="section-body">
            <div class="col-12 col-md-10 col-lg-10">
              <div class="card">
                <div class="card-header">
                  <a href="<?=base_url('usaha') ?>" class="btn btn-icon icon-left btn-warning"><i class="fa fa-arrow-left"></i> Kembali</a>
                </div>
                <div class="col-lg-8">
                  <?php
                  if(!empty(session()->getFlashdata('message'))){?>
                  <div class="alert alert-danger alert-dismissible show fade">
                      <div class="alert-body">
                          <button class="close" data-dismiss="alert">
                              <span>&times;</span>
                          </button>
                              <?= session()->getFlashdata('message'); ?>
                      </div>
                  </div>
                  <?php }?>
                </div>

                <div class="card-body">
                  <form class="needs-validation" novalidate="" enctype= "multipart/form-data" method="post" action="<?= base_url('usaha/store'); ?>">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">NIB</label>
                        <div class="col-sm-9">
                          <input type="number" class="form-control" required="" name="nib">
                            <div class="invalid-feedback">
                              NIB Tidak Boleh Kosong
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Nama Pemilik</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" required="" name="nama_pemilik">
                            <div class="invalid-feedback">
                              Nama Pemilik Tidak Boleh Kosong
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Nama Usaha</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" required="" name="nama_usaha">
                            <div class="invalid-feedback">
                              Nama Usaha Tidak Boleh Kosong
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Sektor Usaha</label>
                        <div class="col-sm-9">
                            <select name="id_sektor" class="form-control" required="">
                              <option value="">-- Pilih Jenis Usaha --</option>
                              <?php foreach ($sektor as $key => $value){?>
                                  <option value="<?= $value['id_sektor'] ?>"><?= $value['sektor'] ?></option>
                              <?php }?>
                            </select>
                            <div class="invalid-feedback">
                              Jenis Usaha Tidak Boleh Kosong
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Alamat</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" required="" name="alamat">
                            <div class="invalid-feedback">
                              Alamat Tidak Boleh Kosong
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Kecamatan</label>
                        <div class="col-sm-9">
                          <select class="form-control" name="id_kecamatan" required="">
                            <option value="" >-- Pilih Kecamatan --</option>
                                <?php foreach ($kecamatan as $key => $value){?>
                                    <option value="<?= $value['id_kecamatan'] ?>"><?= $value['kecamatan'] ?></option>
                                <?php }?>
                          </select>
                            <div class="invalid-feedback">
                              Kecamatan Tidak Boleh Kosong
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Modal Usaha</label>
                        <div class="col-sm-9">
                          <input type="number" class="form-control" required="" name="modal_usaha">
                            <div class="invalid-feedback">
                              Modal Usaha Tidak Boleh Kosong
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Hasil Penjualan Tahunan</label>
                        <div class="col-sm-9">
                          <input type="number" class="form-control" required="" name="hasil_penjualan">
                            <div class="invalid-feedback">
                              Hasil Penjualan Tahunan Tidak Boleh Kosong
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Jumlah Tenaga Kerja</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" required="" name="jmlh_tenaga_kerja">
                            <div class="invalid-feedback">
                              Jumlah Tenaga Kerja Tidak Boleh Kosong
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Latitude</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="latitude" required="" name="latitude">
                            <div class="invalid-feedback">
                              Latitude Tidak Boleh Kosong
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Longitude</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" required="" id="longitude" name="longitude">
                            <div class="invalid-feedback">
                              Longiitude Tidak Boleh Kosong
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Foto</label>
                        <div class="col-sm-9">
                          
                          <input type="file" class="form-control" required="" value="" name="foto">
                            <div class="invalid-feedback">
                              Foto Tidak Boleh Kosong
                            </div>
                        </div>
                    </div>  
                </div>
                <div style="overflow-x:auto;">
                  <div id="mapid" style="width: 795px; height: 400px;"></div>
                    <script>
                      var curLocation = [0,0];
                      if (curLocation[0] == 0 && curLocation[1] ==0){
                        curLocation = [1.4809077,102.1287382];
                      }
                      var map = L.map('mapid').setView([1.4809077,102.1287382], 13);
                      L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                      attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
                          'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                      id: 'mapbox/streets-v11'}).addTo(map);

                        map.attributionControl.setPrefix(false);
                        var marker = new L.marker(curLocation,{
                          draggable: 'true',
                        });

                        marker.on('dragend', function(event){
                          var position = marker.getLatLng();
                            marker.setLatLng(position,{
                              draggable:'true'
                            }).bindPopup(position).update(); 
                              $("#latitude").val(position.lat);
                              $("#longitude").val(position.lng).keyup();
                        
   
                          $("#latitude, #longitude").change(function(){
                            var position = [parseInt($("#latitude").val()), parseInt($("#longitude"))];
                            marker.setLatLng(
                              position, {
                                draggable: 'true'
                              }).bindPopup(position).update();
                              map.panTo(position);
                          });
                        });

                          map.addLayer(marker);
                    </script>
                </div>
                  <div class="card-footer text-right">
                      <input type="submit" value="Simpan" class="btn btn-primary"/>
                  </div>
                </form>
              </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      <?php echo view('layout/footer');?>
    </div>
  </div>

  