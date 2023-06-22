<?php echo view('layout/user-header');?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Klasifikasi Sektor Usaha</h1>
          </div>
          <div class="section-body">
            <div class="card">
              <div class="card-body">
                <div class="float-left">
                  <?= $pager->links('sektor','template_pagination'); ?>
                </div>
                <div class="float-right">
                    <form method="GET" action="" class="form-group">
                        <div class="input-group">
                          <input type="text" class="form-control" name="cari" placeholder="Cari">
                          <div class="input-group-append">
                            <button class="btn btn-primary" type="Submit"><i class="fas fa-search"></i></button>
                          </div>
                      </div>
                    </form>
      
                  </div>
                <div class="clearfix mb-1"></div>
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">KLBI</th>
                      <th scope="col">Sektor</th>
                      <th scope="col">Deskripsi Usaha</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=1 + (5 * ($currentPage - 1)); foreach ($sektor as $key => $value) {?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><?= $value['klbi']; ?></td>
                      <td><?= $value['sektor']; ?></td>
                      <td><?= $value['deskripsi']; ?></td>
                    </tr>
                    <?php }?>
                  </tbody>
                </table>
                
              </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      <?php echo view('layout/footer');?>
    </div>
  </div>

  