<?php

namespace App\Controllers;
use App\Models\M_kecamatan;
use App\Models\M_umkm;
use App\Models\M_users;
use App\Models\M_klaster;

class Klustering extends BaseController
{
    public function __construct()
	{
		helper('form');
		$this->M_kecamatan = new M_kecamatan();
		$this->M_users = new M_users();
		$this->M_klaster = new M_klaster();
		$this->M_umkm = new M_umkm();
	}

    public function index()
    {
		$data ['title'] = 'Data Pengelompokan - UMKM Bengkalis';
		$hasil = $this->M_klaster->get_hasil();
		$data ['tahun'] = $this->M_klaster->get_tahun();
		$data['hasil'] = $hasil;
		// foreach ($hasil as $key) {
		// 	$tahun = $key->tahun;
		// }
		// $data['thn'] = $tahun;
        return view ('admin/kluster', $data);
    }

	public function iterasi_klaster()
	{
		$data['title'] = 'Iterasi Data - UMKM Bengkalis';
		$data ['tahun'] = $this->M_klaster->get_tahun();
		$valid = $this->validate(['tahun' => 'required|trim']);
		if(!$valid){
			session()->setFlashdata('message',  \Config\Services::validation()->listErrors());
			return redirect()->to(base_url('admin/kluster'));
		}else{
			$tahun = $this->request->getPost('tahun');
			$jumlah = $this->request->getPost('jumlah');
			
			if ($jumlah < 2) {
				?>
					<script>
						alert("Jumlah Klaster harus lebih dari 1");
					</script>
				<?php
					redirect('Klastering','refresh');
			}else{
				$data['umkm_klaster'] = $this->M_klaster->get_umkm_klaster($tahun);
				$data['thn'] = $tahun;
				$data['jml'] = $jumlah;
				$data['umkm_rand'] = $this->M_klaster->get_umkm_rand($tahun,$jumlah);
				$data['umkm_rand2'] = $this->M_klaster->get_umkm_rand($tahun,$jumlah);
				// $this->load->view('admin/iterasi_view',$data);
				return view('admin/iterasi_view', $data);
			}
		}
		// $this->form_validation->set_rules('hidden', 'tahun', 'trim|required');
	

		// if ($this->form_validation->run() == FALSE) {
		// 	$data['error'] = "Pilih Tahun";
		// 	$this->load->view('admin/kluster', $data);
		// } else {
		// 	$tahun = $this->input->post('tahun');
		// 	$jumlah = $this->input->post('jumlah');
		// 	if ($jumlah < 2) {
		// 		?>
		// 			<script>
		// 				alert("Jumlah Klaster harus lebih dari 1");
		// 			</script>
		// 		<?php
		// 			redirect('Klastering','refresh');
		// 	}
		// 	else{
		// 		$data['umkm_klaster'] = $this->M_klaster->get_umkm_klaster($tahun);
		// 		$data['thn'] = $tahun;
		// 		$data['jml'] = $jumlah;
		// 		$data['umkm_rand'] = $this->M_klaster->get_umkm_rand($tahun,$jumlah);
		// 		$data['umkm_rand2'] = $this->M_klaster->get_umkm_rand($tahun,$jumlah);
		// 		$this->load->view('admin/iterasi_view',$data);
		// 	}
		// }
		// return view ('admin/iterasi_view', $data);
	}
}