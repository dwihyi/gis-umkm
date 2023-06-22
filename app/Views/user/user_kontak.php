<?php echo view('layout/user-header');?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Hubungi Kami</h1>
          </div>
          <div class="section-body">
            <div class="card">
              <div class="card card-primary">
                <div class="row m-0">
                    <div class="col-12 col-md-12 col-lg-5 p-0">
                    <div class="card-header text-left"><h4>Kritik & Saran</h4></div>
                    <div class="card-body">
                      
                        <?php
                        if(!empty(session()->getFlashdata('message'))){?>
                          <div class="alert alert-success alert-dismissible show fade">
                            <div class="alert-body">
                              <button class="close" data-dismiss="alert">
                                <span>&times;</span>
                              </button>
                                <?= session()->getFlashdata('message'); ?>
                            </div>
                          </div>
                        <?php }?>
                      
                        <form class="needs-validation" novalidate="" method="POST" action="<?= base_url('/user/store') ?>">
                        <?= csrf_field(); ?>
                          <div class="form-group floating-addon">
                              <label>Nama</label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                      <i class="far fa-user"></i>
                                    </div>
                                </div>
                                <input id="name" type="text" class="form-control" name="nama" autofocus placeholder="Nama" required="">
                                  <div class="invalid-feedback">
                                      Nama masih kosong   
                                  </div>
                              </div>
                          </div>

                        <div class="form-group floating-addon">
                            <label>Email</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                  <div class="input-group-text">
                                    <i class="fas fa-envelope"></i>
                                  </div>
                              </div>
                                <input id="email" type="email" class="form-control" name="email" placeholder="Email" required="">
                                  <div class="invalid-feedback">
                                      Email masih kosong   
                                  </div>  
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Kritik & Saran</label>
                            <textarea class="form-control" name="pesan" placeholder="Masukkan kritik & saran di sini!!" data-height="150" required=""></textarea>
                            <div class="invalid-feedback">
                              Pesan masih kosong   
                            </div>
                        </div>

                        <div class="form-group text-right">
                            <input type="submit" value="Kirim" class="btn btn-primary"/>
                        </div>
                        </form>
                    </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-7 p-0">
                    <div class="card-header text-left"><h6>Informasi UMKM Bengkalis lebih lanjut, kunjungi Dinas terkait</h6></div>
                    <div id="mapid" class="contact-map" style="height: 500px;">
                    <!-- <div id="mapid" style="width: 600px; height: 400px;"></div> -->
                    <script>

                        var mymap = L.map('mapid').setView([1.4809077,102.1287382], 15);

                        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                            maxZoom: 18,
                            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
                                'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                            id: 'mapbox/streets-v11',
                            tileSize: 512,
                            zoomOffset: -1
                        }).addTo(mymap);

                        L.marker([1.481700, 102.129548]).addTo(mymap)
                            .bindPopup("<b>Hello world!</b><br />Di sini Kantor Dinas Koperasi <br> dan UMK Kabupaten Bengkalis").openPopup();

                    </script>

        
                </div>
                </div>
                </div>
              </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      <?php echo view('layout/footer');?>
    </div>
  </div>

  