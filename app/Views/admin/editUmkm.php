<?php echo view('layout/header');?>
<?=$this->include('layout/sidebar'); ?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
    <div class="section-header">
            <h1>Edit Data UMKM</h1>
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
                        <form class="needs-validation" novalidate="" method="post" action="<?= base_url('umkm/update/'.$umkm['id_umkm']); ?>">
                        <?= csrf_field(); ?>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">NIB</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" value="<?=$umkm['nib'] ?>" required="" name="nib">
                                    <div class="invalid-feedback">
                                      NIB Tidak Boleh Kosong
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Nama Pemilik</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" required="" value="<?=$umkm['nama_pemilik'] ?>" name="nama_pemilik">
                                    <div class="invalid-feedback">
                                      Nama Pemilik Tidak Boleh Kosong
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Nama Usaha</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" required="" value="<?=$umkm['nama_usaha'] ?>" name="nama_usaha">
                                    <div class="invalid-feedback">
                                      Nama Usaha Tidak Boleh Kosong
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Sektor Usaha</label>
                                <div class="col-sm-9">
                                    <select name="id_sektor" class="form-control">
                                      <option value="<?= $umkm['id_sektor'] ?>"><?= $umkm['sektor'] ?></option>
                                      <?php foreach ($sektor as $key => $value){?>
                                          <option value="<?= $value['id_sektor'] ?>"><?= $value['sektor'] ?></option>
                                      <?php }?>
                                    </select>
                                    <div class="invalid-feedback">
                                      Sektor Usaha Tidak Boleh Kosong
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Alamat</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" required="" value="<?=$umkm['alamat'] ?>" name="alamat">
                                    <div class="invalid-feedback">
                                      Alamat Tidak Boleh Kosong
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Kecamatan</label>
                                <div class="col-sm-9">
                                <select class="form-control" name="id_kecamatan">
                                <option value="<?= $umkm['id_kecamatan'] ?>"><?= $umkm['kecamatan'] ?></option>
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
                                  <input type="number" class="form-control" required="" value="<?=$umkm['modal_usaha'] ?>" name="modal_usaha">
                                    <div class="invalid-feedback">
                                      Modal Usaha Tidak Boleh Kosong
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Hasil Penjualan Tahunan</label>
                                <div class="col-sm-9">
                                  <input type="number" class="form-control" required="" value="<?=$umkm['hasil_penjualan'] ?>" name="hasil_penjualan">
                                    <div class="invalid-feedback">
                                      Hasil PenjualanTidak Boleh Kosong
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Jumlah Tenaga Kerja</label>
                                <div class="col-sm-9">
                                  <input type="number" class="form-control" required="" value="<?=$umkm['jmlh_tenaga_kerja'] ?>" name="jmlh_tenaga_kerja">
                                    <div class="invalid-feedback">
                                      Jumlah Tenaga Kerja Tidak Boleh Kosong
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Latitude</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" required="" value="<?=$umkm['latitude'] ?>" name="latitude">
                                    <div class="invalid-feedback">
                                      Latitude Tidak Boleh Kosong
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Longitude</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" required="" value="<?=$umkm['longitude'] ?>" name="longitude">
                                    <div class="invalid-feedback">
                                      Longiitude Tidak Boleh Kosong
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <input type="submit" value="Update" class="btn btn-primary"/>
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

  