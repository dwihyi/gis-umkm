<?php echo view('layout/header');?>
<?=$this->include('layout/sidebar'); ?>
      <!-- Main Content -->
        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>Data Pengelompokan Tahun <?php echo $thn ?> Iterasi Ke-1</h1>
                </div>
                <div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
       <h6 class="m-0 font-weight-bold text-black"><i class="fa fa-table"></i> Centroid Medoids</h6>
    </div>
	
	<div class="card-body">
  <div class="float-right">
  <a href="<?php echo site_url('Klastering/iterasi_lanjut/'.$thn.'/'.$jml.'/1') ?>" class="btn btn-primary"><i class="fa fa-share"></i> Lanjutkan Iterasi</a>
  </div>
  <div class="clearfix mb-3"></div>
	<div class="table-responsive">
	<table class="table table-bordered" width="100%" cellspacing="0">
            <thead class="bg-light text-white">
                <tr align="center">
					<th>Centroid ke-</th>
					<th>Nama Usaha</th>
					<th>Modal Usaha (Rp.)</th>
					<th>Hasil Penjualan Tahunan (Rp.)</th>
					<th>Jumlah Tenaga Kerja</th>
					<th>Tahun</th>
				  </tr>
	            </thead>
	            <tbody>
              <?php $no = 1 ?>
						  <?php foreach ($umkm_rand as $m1) { ?>
							<tr align="center">
								<td><?php echo $no ?></td>
								<td class="text-left"><?php echo $m1->nama_usaha ?></td>
								<td><?php echo $m1->modal_usaha ?></td>
								<td><?php echo $m1->hasil_penjualan ?></td>
								<td><?php echo $m1->jmlh_tenaga_kerja ?></td>
								<td><?php echo $m1->tahun ?></td>
								<?php $no++ ?>
							</tr>
						<?php } ?>
	            </tbody>
	          </table>
          </div>
        </div>
      </div>
      <div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success"><i class="fa fa-table"></i> Iterasi Medoids</h6>
    </div>
	
	<div class="card-body">
	<div class="table-responsive">
	<table class="table table-bordered" width="100%" cellspacing="0">
            <thead class="bg-success text-white">
                <tr align="center">
								<th rowspan="2">No</th>
								<th rowspan="2">Nama Usaha</th>
								<th rowspan="2">Modal Usaha (Rp.)</th>
								<th rowspan="2">Penjualan Tahunan (Rp.)</th>
								<th rowspan="2">Jumlah Tenaga Kerja</th>
								<th rowspan="2">Tahun</th>
								<?php $c = 1 ?>
								<?php foreach ($umkm_rand as $m) { ?>
									<th colspan="3">Centroid <?php echo $c; $c++ ?></th>
								<?php } ?>
								<?php $d = 1 ?>
								<?php foreach ($umkm_rand as $m) { ?>
									<th rowspan="2">C<?php echo $d; $d++ ?></th>
								<?php } ?>
							</tr>
							<tr align="center">
								<?php foreach ($umkm_rand as $m1) { ?>
									<th><?php $c_prod[] = $m1->modal_usaha; echo $m1->modal_usaha ?></th>
									<th><?php $c_prodt[] = $m1->hasil_penjualan; echo $m1->hasil_penjualan ?></th>
									<th><?php $c_lp[] = $m1->jmlh_tenaga_kerja; echo $m1->jmlh_tenaga_kerja ?></th>
								<?php } ?>
							</tr>
						</thead>
						<tbody>
							<?php $no = 1;
							$tc0 = 0;
							$tc = 0 ?>
							<?php foreach ($umkm_klaster as $key) { ?>
								<tr align="center">
									<td class="align-middle"><?php echo $no ?></td>
									<td class="text-left align-middle"><?php echo $key->nama_usaha ?></td>
									<td class="align-middle"><?php echo $key->modal_usaha ?></td>
									<td class="align-middle"><?php echo $key->hasil_penjualan ?></td>
									<td class="align-middle"><?php echo $key->jmlh_tenaga_kerja ?></td>
									<td class="align-middle"><?php echo $key->tahun ?></td>
									<?php $no++ ?>
									<!-- <td><?php $hm1 = sqrt(pow(($key->modal_usaha-$c_prod[0]),2)+pow(($key->hasil_penjualan-$c_prodt[0]),2)+pow(($key->jmlh_tenaga_kerja-$c_lp[0]),2));
										echo $hm1;?>
									</td>
									<td>
										<?php $hm2 = sqrt(pow(($key->modal_usaha-$c_prod[0]),2)+pow(($key->hasil_penjualan-$c_prodt[0]),2)+pow(($key->jmlh_tenaga_kerja-$c_lp[0]),2));
										echo $hm2;?>
									</td>
									<td>
										<?php $hm3 = sqrt(pow(($key->modal_usaha-$c_prod[0]),2)+pow(($key->hasil_penjualan-$c_prodt[0]),2)+pow(($key->jmlh_tenaga_kerja-$c_lp[0]),2));
										echo $hm3;?>
									</td>
									<td><?php echo $c_prod[0]; ?></td>
									<td><?php echo $c_prodt[0]; ?></td>
									<td><?php echo $c_lp[0]; ?></td> -->
									<?php $e = 0;
									$tc = array(); ?>
									<?php foreach ($umkm_rand as $k) { ?>
										<td class="align-middle" colspan="3"><?php $hm[$e] = sqrt(pow(($key->modal_usaha-$c_prod[$e]),2)+pow(($key->hasil_penjualan-$c_prodt[$e]),2)+pow(($key->jmlh_tenaga_kerja-$c_lp[$e]),2));
										echo $hm[$e];
										$hc[$e] = $hm[$e];
										?>
										</td>
										<?php $e++ ?>
									<?php } ?>
									<?php for ($i=0; $i < COUNT($hc); $i++) { ?>
										<?php if ($hc[$i] == MIN($hc)) {
											echo "<td class='align-middle bg-success text-white font-weight-bold'>1</td>";
											$cm = $i+1;
											$q = "insert into centroid_temp(jenis,iterasi,c) values('M',1,'c".$cm."')";
	              			$this->db->query($q);
										}
										else{
											echo "<td class='align-middle'>0</td>";
										}
										?>
									<?php } ?>
									<?php 
										for ($j=0; $j < COUNT($hc); $j++) { 
												$tc0 = $tc0 + $hc[$j];
												$ttc[] = $tc0;
										}
									?>
								</tr>
							<?php } ?>
							<tr align="center">
								<td class="align-middle" colspan="6"><b>TOTAL</b></td>
								<td class="align-middle" colspan="12"><b><?php echo $tc0 ?></b></td>
							</tr>
						</tbody>
		          </table>
              </div>
          </div>
        </div>




<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success"><i class="fa fa-table"></i> Centroid Non Medoids</h6>
    </div>
	
	<div class="card-body">
	<div class="table-responsive">
	<table class="table table-bordered" width="100%" cellspacing="0">
            <thead class="bg-success text-white">
                <tr align="center">
								<th>Centroid ke-</th>
								<th>Nama Usaha</th>
								<th>Modal Usaha (Rp.)</th>
								<th>Hasil Penjualan (Rp.)</th>
								<th>Jumlah Tenaga Kerja </th>
								<th>Tahun</th>
							</tr>
						</thead>
						<tbody>
							<?php $nom = 1 ?>
							<?php foreach ($umkm_rand2 as $nm1) { ?>
								<tr align="center">
									<td><?php echo $nom ?></td>
									<td class="text-left"><?php echo $nm1->nama_usaha ?></td>
									<td><?php echo $nm1->modal_usaha ?></td>
									<td><?php echo $nm1->hasil_penjualan ?></td>
									<td><?php echo $nm1->jmlh_tenaga_kerja ?></td>
									<td><?php echo $nm1->tahun ?></td>
									<?php $nom++ ?>
								</tr>
							<?php } ?>
						</tbody>
		          </table>
            </div>
          </div>
        </div>


<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success"><i class="fa fa-table"></i> Iterasi Non Medoids</h6>
    </div>
	
	<div class="card-body">
	<div class="table-responsive">
	<table class="table table-bordered" width="100%" cellspacing="0">
            <thead class="bg-success text-white">
                <tr align="center">
								<th rowspan="2">No</th>
								<th rowspan="2">Nama Usaha</th>
								<th rowspan="2">Modal Usaha (Rp.)</th>
								<th rowspan="2">Hasil Penjualan (Rp.)</th>
								<th rowspan="2">Jumlah Tenaga Kerja</th>
								<th rowspan="2">Tahun</th>
								<?php $f = 1 ?>
								<?php foreach ($umkm_rand2 as $m) { ?>
									<th colspan="3">Centroid <?php echo $f; $f++ ?></th>
								<?php } ?>
								<?php $g = 1 ?>
								<?php foreach ($umkm_rand2 as $m) { ?>
									<th rowspan="2">C<?php echo $g; $g++ ?></th>
								<?php } ?>
							</tr>
							<tr align="center">
								<?php foreach ($umkm_rand2 as $nm1) { ?>
									<th><?php $cn_prod[] = $nm1->modal_usaha; echo $nm1->modal_usaha ?></th>
									<th><?php $cn_prodt[] = $nm1->hasil_penjualan; echo $nm1->hasil_penjualan ?></th>
									<th><?php $cn_lp[] = $nm1->jmlh_tenaga_kerja; echo $nm1->jmlh_tenaga_kerja ?></th>
								<?php } ?>
							</tr>
						</thead>
						<tbody>
							<?php $no = 1;
							$tcnm0 = 0;
							$tcnm = 0 ?>
							<?php foreach ($umkm_klaster as $key) { ?>
								<tr align="center">
									<td class="align-middle"><?php echo $no ?></td>
									<td class="text-left align-middle"><?php echo $key->nama_usaha ?></td>
									<td class="align-middle"><?php echo $key->modal_usaha?></td>
									<td class="align-middle"><?php echo $key->hasil_penjualan ?></td>
									<td class="align-middle"><?php echo $key->jmlh_tenaga_kerja ?></td>
									<td class="align-middle"><?php echo $key->tahun ?></td>
									<?php $no++ ?>
									<!-- <td><?php $hm1 = sqrt(pow(($key->modal_usaha-$c_prod[0]),2)+pow(($key->hasil_penjualan-$c_prodt[0]),2)+pow(($key->jmlh_tenaga_kerja-$c_lp[0]),2));
										echo $hm1;?>
									</td>
									<td>
										<?php $hm2 = sqrt(pow(($key->modal_usaha-$c_prod[0]),2)+pow(($key->hasil_penjualan-$c_prodt[0]),2)+pow(($key->mlh_tenaga_kerja-$c_lp[0]),2));
										echo $hm2;?>
									</td>
									<td>
										<?php $hm3 = sqrt(pow(($key->modal_usaha-$c_prod[0]),2)+pow(($key->hasil_penjualan-$c_prodt[0]),2)+pow(($key->mlh_tenaga_kerja-$c_lp[0]),2));
										echo $hm3;?>
									</td>
									<td><?php echo $c_prod[1]; ?></td>
									<td><?php echo $c_prodt[1]; ?></td>
									<td><?php echo $c_lp[1]; ?></td> -->
									<?php $l = 0;
									$tcnm = array(); ?>
									<?php foreach ($umkm_rand2 as $k) { ?>
										<td class="align-middle" colspan="3"><?php $hnm[$l] = sqrt(pow(($key->modal_usaha-$cn_prod[$l]),2)+pow(($key->hasil_penjualan-$cn_prodt[$l]),2)+pow(($key->jmlh_tenaga_kerja-$cn_lp[$l]),2));
										echo $hnm[$l];
										$hcnm[$l] = $hnm[$l];
										
										?>
										</td>
										<?php $l++ ?>
									<?php } ?>
									<?php for ($i=0; $i < COUNT($hcnm); $i++) { ?>
										<?php if ($hcnm[$i] == MIN($hcnm)) {
											echo "<td class='align-middle bg-success text-white font-weight-bold'>1</td>";
											$cnm = $i+1;
											$q = "insert into centroid_temp(jenis,iterasi,c) values('NM',1,'c".$cnm."')";
	              							$this->db->query($q);
										}
										else{
											echo "<td class='align-middle'>0</td>";
										}
										?>
									<?php } ?>
									<?php 
										for ($j=0; $j < COUNT($hcnm); $j++) { 
											// if ($j == 0) {
												$tcnm0 = $tcnm0 + $hcnm[$j];
												$ttcnm[] = $tcnm0;
											// }
											// else{
												
											// }
										}
										// echo "<td>".$tc0."</td>";
									?>
								</tr>
							<?php } ?>
							<tr align="center">
								<td class="align-middle" colspan="6"><b>TOTAL</b></td>
								<td class="align-middle" colspan="12"><b><?php echo $tcnm0 ?></b></td>
							</tr>
						</tbody>
		          </table>
            </div>
          </div>
        </div>
        <div class="card shadow mb-4">
            <!-- /.card-header -->
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-success"><i class="fa fa-table"></i> Selisih antara Non-Medoids dengan Medoids</h6>
            </div>
          
          <div class="card-body">
          <table class="table table-bordered">
          <tr>
          <th width="30%">Total Medoids</th>
          <td><?php echo $tc0 ?></td>
          </tr>
          
          <tr>
          <th>Total Non Medoids</th>
          <td><?php echo $tcnm0 ?></td>
          </tr>
          
          <tr>
          <th>Selisih</th>
          <td><?php echo $selisih = $tcnm0 - $tc0 ?></td>
          </tr>
          
          </table>
          
          <?php $n = "insert into hasil_iterasi(iterasi,total_medoids,total_non_medoids,selisih) values('1','".$tc0."','".$tcnm0."','".$selisih."')";
            $this->db->query($n); ?>
          
          </div>
        </div>
          
      </section>
        </div>
      <?php echo view('layout/footer');?>
    </div>
</div>