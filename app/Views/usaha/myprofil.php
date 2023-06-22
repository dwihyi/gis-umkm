<?php

use App\Controllers\sektor;

echo view('layout/header');?>
<?=$this->include('layout/sidebar'); ?>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Profil UMKM</h1>
          </div>

          <div class="section-body">
          <a href="<?=base_url('usaha/add') ?>" class="btn btn-icon-left btn-warning " ><i class="fas fa-plus"></i> Tambah Data</a><br><br>
            <div class="row">
            <?php foreach ($tb_umkm as $key => $value) {?>
              <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                  <div class="card-body">
                  <h4 class="card-title"><?= $value['nama_usaha'] ?></h4>
                    <article class="article article-style-c">

                      <div class="article-header">
                        <div class="article-image" data-background="<?= base_url('foto/'. $value['foto']);?>" width="100px" height="200px">
                         
                        </div>
                      </div>
                      <div class="article-details">
                        <div class="article-category">Sektor Usaha : <?= $value['sektor'] ?></div>
                        <div class="article-title">
                          <h2></h2>
                        </div>
                        <p><?= $value['deskripsi'] ?></p>
                        <div class="article-user">
                          <img alt="image" src="../assets/img/avatar/avatar-2.png">
                          <div class="article-user-details">
                            <div class="user-detail-name">
                              <a href="#"> <?= user()->username?></a>
                            </div>
                            <div class="text-job">Pemilik</div>
                          </div>
                          <div class="float-right">
                            <a href="<?=base_url('usaha/edit/'.$value['id_umkm'])?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"> Edit</i></a>
                            <a href="<?=base_url('usaha/delete/'.$value['id_umkm'])?>" class="btn btn-sm btn-warning"><i class="fas fa-edit"> Delete</i></a>
                          </div>
                        </div>
                      </div>
                    </article>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php } ?>
        </section>
      </div>
      <?php echo view('layout/footer');?>
    </div>
  </div>

  