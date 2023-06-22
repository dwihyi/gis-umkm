<?php echo view('layout/user-header');?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data UMKM Bengkalis</h1>
          </div>
          <div class="section-body">
          <div class="card"><br>  
            <div class="card-body">
            <div class="float-right">
                <a href="<?=base_url('/user/export') ?>" class="btn btn-icon icon-left btn-danger shadow float-right"><i class="fas fa-file-download"></i>Download Dokumen</a>
              </div>
                <div class="float-left">
                  <form method="GET" action="" class="form-group">
                      <div class="input-group">
                        <input type="text" class="form-control" name="cari" placeholder="Cari UMKM">
                        <div class="input-group-append">
                          <button class="btn btn-primary" type="Submit"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                  </form>
                  
                </div>
                <div class="clearfix mb-1"></div>
              <div style="overflow-x:auto;">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">NIB</th>
                      <th scope="col">Pemilik</th>
                      <th scope="col">Nama Usaha</th>
                      <th scope="col">Sektor</th>
                      <th scope="col">Alamat</th>
                      <th scope="col">Kecamatan</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1 + (10 * ($currentPage -1)); foreach ($umkm as $key => $value) {?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><?= $value['nib']; ?></td>
                      <td><?= $value['nama_pemilik']; ?></td>
                      <td><?= $value['nama_usaha']; ?></td>
                      <td><?= $value['sektor']; ?></td>
                      <td><?= $value['alamat'] ;?></td>
                      <td><?= $value['kecamatan'] ;?></td>
                    </tr>
                    <?php }?>
                  </tbody>
                </table>
              </div><br>
              <?= $pager->links('umkm','template_pagination'); ?>
              </div>
            </div>
          </div>
        </section>
      </div>
      <?php echo view('layout/footer');?>
    </div>
  </div>

  