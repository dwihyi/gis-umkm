<?php echo view('layout/header');?>
<?=$this->include('layout/sidebar'); ?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data Kritik & Saran</h1>
          </div>

          <div class="row mt-4">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <!-- <div class="float-left">
                      <select class="form-control selectric">
                        <option>Action For Selected</option>
                        <option>Move to Draft</option>
                        <option>Move to Pending</option>
                        <option>Delete Pemanently</option>
                      </select>
                    </div> -->

                    <div class="table-responsive">
                      <table class="table table-striped">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Pesan</th>
                            <th>Created At</th>
                            <th>Aksi</th>
                        </tr>
                        <?php $no= 1 + (5 * ($currentPage -1)); foreach ($kontak as $key => $value) {?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $value['nama']; ?></td>
                                <td><?= $value['email']; ?></td>
                                <td><?= $value['pesan']; ?></td>
                                <td><?= $value['created_at']; ?></td>
                                <td>
                                    <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#delete<?= $value['id_kontak']; ?>"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                        <?php }?>
                      </table>
                    </div>
                    <div class="float-right">
                    <?= $pager->links('kontak','template_pagination'); ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
        </section>
      </div>
      <?php echo view('layout/footer');?>
    </div>
  </div>
  <?php foreach ($kontak as $key => $value) {?>
    <div class="modal fade" tabindex="-1" role="dialog" id="delete<?= $value['id_kontak']; ?>">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header bg-whitesmoke br">
                <h5 class="modal-title">Hapus Pesan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Yakin Ingin Hapus Pesan ?
              </div>
              <div class="modal-footer ">
                <a href="<?= base_url('/admin/deleteKontak/' . $value['id_kontak'])?>" type="submit" class="btn btn-danger">Ya</a>
                <a href="<?= base_url('/admin/kontak')?>" class="btn btn-warning">Tidak</a>
              </div>
            </div>
          </div>
        </div>
      </div>
  <?php } ?>
  
  