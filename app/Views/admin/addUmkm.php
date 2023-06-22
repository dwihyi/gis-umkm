<?php echo view('layout/header');?>
<?=$this->include('layout/sidebar'); ?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Tambah Data Usaha</h1>
          </div>
          <div class="section-body">
            <div class="col-12 col-md-10 col-lg-10">
              <div class="card">
                <div class="card-header">
                  <a href="<?=base_url('umkm') ?>" class="btn btn-icon icon-left btn-warning"><i class="fa fa-arrow-left"></i> Kembali</a>
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
                <form class="needs-validation" novalidate="" method="post" action="<?= base_url('umkm/store') ?>">
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
                      <label class="col-sm-3 col-form-label">Jenis Usaha</label>
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
                      <label class="col-sm-3 col-form-label">Hasil Penjualan</label>
                        <div class="col-sm-9">
                          <input type="number" class="form-control" required="" name="hasil_penjualan">
                            <div class="invalid-feedback">
                              Modal Usaha Tidak Boleh Kosong
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Jumlah Tenaga Kerja</label>
                        <div class="col-sm-9">
                          <input type="number" class="form-control" required="" name="jmlh_tenaga_kerja">
                            <div class="invalid-feedback">
                              Jumlah Tenaga Kerja Boleh Kosong
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Latitude</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" required="" name="latitude">
                            <div class="invalid-feedback">
                              Latitude Tidak Boleh Kosong
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Longitude</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" required="" name="longitude">
                            <div class="invalid-feedback">
                              Longitude Tidak Boleh Kosong
                            </div>
                        </div>
                    </div>  
                  </div>
                  <div class="card-footer text-right">
                      <input type="submit" value="Tambah Data" class="btn btn-primary"/>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </section>
      </div>
      <?php echo view('layout/footer');?>
    </div>
  </div>

  