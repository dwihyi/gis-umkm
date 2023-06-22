<?php echo view('layout/header');?>
<?=$this->include('layout/sidebar'); ?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data UMKM Bengkalis</h1>
          </div>
          <div class="section-body">
            <div class="card"><br>
                <div class="col-lg-8">
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
                </div>
                <div class="card-body">
                <div class="float-right">
                  <button class="btn btn-icon-left btn-warning " data-toggle="modal" data-target="#import"><i class="fas fa-upload"></i> Import Data</button>
                  <!-- <a href="/umkm/export" class="btn btn-icon-left btn-danger "><i class="fas fa-file-download"></i> Export Data</a> -->
                  <a href="<?=base_url('umkm/add') ?>" class="btn btn-icon-left btn-primary " ><i class="fas fa-plus"></i> Tambah Data</a>
                </div>
                <div class="clearfix mb-3"></div>
                <div class="float-left">
                  <?= $pager->links('umkm','template_pagination'); ?> 
                </div>
                  <div class="float-right">
                    <form method="GET" action="" class="form-group" enctype="multipart-form-data">
                        <div class="input-group">
                          <input type="text" class="form-control" name="cari" placeholder="Cari UMKM">
                          <div class="input-group-append">
                            <button class="btn btn-primary" type="Submit"><i class="fas fa-search"></i></button>
                          </div>
                      </div>
                    </form>
                    <div class="float-right">
                      <?php echo $jumlah; ?>
                    </div>
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
                        <th scope="col">Modal usaha</th>
                        <th scope="col">Hasil Penjualan</th>
                        <th scope="col">Jumlah Tenaga Kerja</th>
                        <th scope="col">Aksi</th>
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
                        <td><?= $value['modal_usaha']; ?></td>
                        <td><?= $value['hasil_penjualan'] ;?></td>
                        <td><?= $value['jmlh_tenaga_kerja'] ;?></td>
                        <td>
                          <a href="<?=base_url('umkm/edit/'.$value['id_umkm'])?>" class="btn btn-xs btn-info"><i class="fas fa-edit"></i></a>
                          <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#delete<?= $value['id_umkm']; ?>"><i class="fas fa-trash"></i></button>
                        </td>
                      </tr>
                      <?php }?>
                    </tbody>
                  </table>
                </div><br><br>
                
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      <?php echo view('layout/footer');?>
    </div>
  </div>
  <div class="modal fade" tabindex="-1" role="dialog" id="import">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Import Data UMKM Bengkalis</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
          <form method="post" action="umkm/import" enctype="multipart/form-data">
            <div class="form-group">
              <label>File Excel</label>
              <input type="file" name="import_file" class="form-control" id="file" required accept=".xls,.xlsx" />
            </div>
            <div class="form-group" class="modal-footer bg-whitesmoke br">
              <button class="btn btn-primary shadow float-right" type="submit">Upload</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php foreach ($umkm as $key => $value) {?>
    <div class="modal fade" tabindex="-1" role="dialog" id="delete<?= $value['id_umkm']; ?>">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header bg-whitesmoke br">
                <h5 class="modal-title">Hapus UMKM</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Yakin Ingin Hapus UMKM ?
              </div>
              <div class="modal-footer ">
                <a href="<?= base_url('umkm/delete/' . $value['id_umkm'])?>" type="submit" class="btn btn-danger">Ya</a>
                <a href="<?= base_url('umkm')?>" class="btn btn-warning">Tidak</a>
              </div>
            </div>
          </div>
        </div>
      </div>
  <?php } ?>