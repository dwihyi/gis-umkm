<?php echo view('layout/header');?>
<?=$this->include('layout/sidebar'); ?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
    <div class="section-header">
            <h1>Edit Data Klasifikasi Usaha</h1>
          </div>
        <div class="section-body">
            <div class="col-12 col-md-10 col-lg-10">
                <div class="card">
                    <div class="card-header">
                    <a href="<?=base_url('sektor') ?>" class="btn btn-icon icon-left btn-warning"><i class="fa fa-arrow-left"></i> Kembali</a>
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
                        <form class="needs-validation" novalidate="" method="post" action="<?= base_url('sektor/update/'.$sektor['id_sektor']); ?>">
                        <?= csrf_field(); ?>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">KLBI</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="klbi" value="<?= $sektor['klbi'] ?>" placeholder="KLBI" required>
                                        <div class="invalid-feedback">
                                            KLBI Tidak Boleh Kosong
                                        </div>
                                    </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Sektor </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="sektor" value="<?= $sektor['sektor'] ?>" placeholder="KLBI" required>
                                        <div class="invalid-feedback">
                                            Sektor Tidak Boleh Kosong
                                        </div>
                                    </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Deskripsi Usaha</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="deskripsi" placeholder="Deskripsi Usaha" required data-height="150"><?= $sektor['deskripsi'] ?></textarea>
                                        <div class="invalid-feedback">
                                           Deskripsi Tidak Boleh Kosong
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

  