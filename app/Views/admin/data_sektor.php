<?php echo view('layout/header');?>
<?=$this->include('layout/sidebar'); ?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Klasifikasi Sektor Usaha</h1>
          </div>
          <div class="section-body">
          <div class="card">
          <br><br>    
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
                <div class="float-left">
                  <button class="btn btn-icon icon-left btn-warning shadow" data-toggle="modal" data-target="#import"><i class="fas fa-upload"></i>Import Data</button>
                  <a href="<?=base_url('sektor/add') ?>" class="btn btn-icon-left btn-primary" ><i class="fas fa-plus"></i> Tambah Data</a>
                </div>
                <div class="float-right">
                  <form action="" method="post">
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Search" name="keyword">
                      <div class="input-group-append">
                        <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="clearfix mb-3"></div>
                <div class="table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">KLBI</th>
                        <th scope="col">Sektor</th>
                        <th scope="col">Deskripsi Usaha</th>
                        <th scope="col">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no=1 + (5 * ($currentPage - 1)); foreach ($sektor as $key => $value) {?>
                      <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $value['klbi']; ?></td>
                        <td><?= $value['sektor']; ?></td>
                        <td><?= $value['deskripsi']; ?></td>
                        <td>
                          <a href="<?=base_url('sektor/edit/'.$value['id_sektor'])?>" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                          <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete<?= $value['id_sektor']; ?>"><i class="fas fa-trash"></i></button>
                        </td>
                      </tr>

                      <?php }?>
                    </tbody>
                  </table>
                </div>
                <?= $pager->links('sektor','template_pagination'); ?>
              </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      <?php echo view('layout/footer');?>
    </div>
  </div>

  <?php foreach ($sektor as $key => $value) {?>
    <div class="modal fade" tabindex="-1" role="dialog" id="delete<?= $value['id_sektor']; ?>">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header bg-whitesmoke br">
                <h5 class="modal-title">Hapus Sektor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Yakin Ingin Hapus Sektor Usaha?
              </div>
              <div class="modal-footer ">
                <a href="<?= base_url('sektor/delete/' . $value['id_sektor'])?>" type="submit" class="btn btn-danger">Ya</a>
                <a href="<?= base_url('sektor')?>" class="btn btn-warning">Tidak</a>
              </div>
            </div>
          </div>
        </div>
      </div>
  <?php } ?>
  <div class="modal fade" tabindex="-1" role="dialog" id="import">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Import Data Sektor Usaha</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
          <form method="post" action="sektor/import" enctype="multipart/form-data">
            <div class="form-group">
              <label>File Excel</label>
              <input type="file" name="fileexcel" class="form-control" id="file" required accept=".xls, .xlsx" />
            </div>
            <div class="form-group" class="modal-footer bg-whitesmoke br">
              <button class="btn btn-primary shadow float-right" type="submit">Upload</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  
  