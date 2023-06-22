<?php echo view('layout/header');?>
<?=$this->include('layout/sidebar'); ?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data Pengelompokan</h1>
          </div>
          <div class="section-body">
            <div class="card">
                <div class="card-body">
                <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold"><i class="fa fa-table"></i> Masukkan Data Pengelompokan</h6>
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
            <form class="needs-validation" novalidate="" method="post" action="<?= base_url('klustering/iterasi_klaster') ?>">
              <?= csrf_field(); ?>
              <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                          <label class="font-weight-bold">Pilih Tahun</label>
                          <select name="tahun" id="inputTahun" class="form-control" required>
                            <?php foreach ($tahun->getResult() as $key)  { ?>
                            <?php if ($key->tahun == $key->tahun) : ?>
                              <option value="<?php echo $key->tahun?>"><?php echo $key->tahun?></option>
                            <?php endif ?>
                            <?php } ?>
                          </select>

                        </div>
                
                        <div class="form-group col-md-6">
                              <label class="font-weight-bold">Jumlah Klaster</label>

                              <input type="text" name="jumlah" autocomplete="off" id="inputJumlah" class="form-control" required="required" placeholder="Jumlah Klaster Harus > 1">
                              <input type="hidden" name="hidden" class="form-control" value="Tahun">
                        </div>
                    </div>
              </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Kelompokan</button>
                    <button type="reset" class="btn btn-info"><i class="fa fa-sync-alt"></i> Reset</button>
                </div>
	
            </form>
          </div>
          
      </section>
      <div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Data Hasil Pengelompokan </h6>
    </div>

    <div class="card-body">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead class="bg-light text-white">
                <tr align="center">
	                <th width="5%">No</th>
					<th>Nama Usaha</th>
          <th>Kecamatan</th>
					<th width="15%">Klaster</th>
	              </tr>
	            </thead>
	            <tbody>
	            	<?php $no = 1 ?>
					
						<tr>
							<td class="text-center"></td>
							<td></td>
              <td></td>
							<td class="text-center"></td>
							<?php $no++ ?>
						</tr>
				
	            </tbody>
	          </table>
          </div>
        </div>
</div>
      </div>
      <?php echo view('layout/footer');?>
    </div>
</div>