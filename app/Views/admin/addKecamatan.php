<?php echo view('layout/header');?>
<?=$this->include('layout/sidebar'); ?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
    <div class="section-header">
            <h1>Tambah Data UMKM</h1>
          </div>
        <div class="section-body">
            <div class="col-12 col-md-10 col-lg-10">
                <div class="card">
                    <div class="card-header">
                        <a href="<?=base_url('kecamatan') ?>" class="btn btn-icon icon-left btn-warning"><i class="fa fa-arrow-left"></i> Kembali</a>
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
                        <form class="needs-validation" novalidate="" method="post" action="<?= base_url('kecamatan/store') ?>">
                        <?= csrf_field(); ?>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Kode Kemendagri</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="kode_kemendagri" placeholder="Kode Kemendagri" required="">
                                        <div class="invalid-feedback">
                                             Kode Kemendagri Tidak Boleh Kosong   
                                        </div>
                                    </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Kecamatan</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="kecamatan" placeholder="Kecamatan" required="">
                                        <div class="invalid-feedback">
                                            Kecamatan Tidak Boleh Kosong
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
        </div>
    </section>
</div>
      <?php echo view('layout/footer');?>
</div>
</div>

  