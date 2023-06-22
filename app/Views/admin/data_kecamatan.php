<?php echo view('layout/header');?>
<?=$this->include('layout/sidebar'); ?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data Kecamatan Kab. Bengkalis</h1>
          </div>
          <div class="section-body">
          <div class="card">
                  <div class="card-header">
                    <a href="<?=base_url('kecamatan/add') ?>" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> Tambah Data</a>
                  </div>
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
                  <!-- <div class="swal" data-swal="<?= session()->get('message'); ?>">   -->
                  
                  <div class="card-body">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">Kode Kemendagri</th>
                          <th scope="col">Kecamatan</th>
                          <th scope="col">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no= 1 + (5 * ($currentPage -1)); foreach ($kecamatan as $key => $value) {?>
                        <tr>
                          <td><?= $no++; ?></td>
                          <td><?= $value['kode_kemendagri']; ?></td>
                          <td><?= $value['kecamatan']; ?></td>
                          <td>
                            <a href="<?=base_url('kecamatan/edit/'.$value['id_kecamatan'])?>" class="btn btn-xs btn-info"><i class="fas fa-edit"></i></a>
                            <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#delete<?= $value['id_kecamatan']; ?>"><i class="fas fa-trash"></i></button>
                          </td>
                        </tr>

                        <?php }?>
                      </tbody>
                    </table>
                    <?= $pager->links('kecamatan','template_pagination'); ?>
                  </div>
                  </div>
                </div>
          </div>
        </section>
      </div>
      <?php echo view('layout/footer');?>
    </div>
  </div>

  <?php foreach ($kecamatan as $key => $value) {?>
    <div class="modal fade" tabindex="-1" role="dialog" id="delete<?= $value['id_kecamatan']; ?>">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header bg-whitesmoke br">
                <h5 class="modal-title">Hapus Kecamatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Yakin Ingin Hapus Kecamatan <?= $value['kecamatan'];?> ?
              </div>
              <div class="modal-footer ">
                <a href="<?= base_url('kecamatan/delete/' . $value['id_kecamatan'])?>" type="submit" class="btn btn-danger">Ya</a>
                <a href="<?= base_url('kecamatan')?>" class="btn btn-warning">Tidak</a>
              </div>
            </div>
          </div>
        </div>
      </div>
  <?php } ?>
  