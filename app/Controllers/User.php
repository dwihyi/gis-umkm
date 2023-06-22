<?php

namespace App\Controllers;
use App\Models\M_kecamatan;
use App\Models\M_sektor;
use App\Models\M_umkm;
use App\Models\M_kontak;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class User extends BaseController
{
	
	public function register()
	{
		return view('auth/register');
	}

	public function __construct()
	{
		$this->M_umkm = new M_umkm();
		$this->M_sektor = new M_sektor();
		$this->M_kecamatan = new M_kecamatan();
	    $this->M_kontak = new M_kontak();
		$this->pager = \Config\Services::pager();
	}

	public function index()
	{
		$data= [
			'title'=>'Peta Sebaran UMKM Bengkalis',
			'umkm' => $this->M_umkm->get_umkm(),
		];
        return view ('user/home', $data);
	}

	public function dataSektor()
	{
		$currentPage = $this->request->getVar('page_sektor') ? $this->request->getVar('page_sektor') : 1;
        $pager = \Config\Services::pager();
    	$model = new M_sektor();
    	$kunci = $this->request->getVar('cari');

        if ($kunci) {
            $query = $model->pencarian($kunci);
        } else {
            $query = $model;
        }

		$data['title'] = "Data Sektor - UMKM Bengkalis";
        $data['sektor'] = $query->paginate(10,'sektor');
        $data['pager'] = $model->pager;
		$data ['currentPage'] = $currentPage;

        echo view('user/user_sektor',$data);
    }

    public function dataUMKM()
	{
		$currentPage = $this->request->getVar('page_umkm') ? $this->request->getVar('page_umkm') : 1;
        $pager = \Config\Services::pager();
    	$model = new M_umkm();
    	$kunci = $this->request->getVar('cari');

        if ($kunci) {
            $query = $model->pencarian($kunci);
           
        } else {
            $query = $model;
           
        }

		$data['title'] = "Data UMKM - UMKM Bengkalis";
        $data['umkm'] = $query->join('kecamatan', 'kecamatan.id_kecamatan = umkm.id_kecamatan','left')
		 						->join('sektor', 'sektor.id_sektor = umkm.id_sektor','left')
		 						->paginate(10,'umkm');
        $data['pager'] = $model->pager;
        $data['page'] = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        
		$data ['currentPage'] = $currentPage;

        echo view('user/user_umkm',$data);
    }


	public function export()
    {
        $M_umkm = new M_umkm();
        $umkm = $M_umkm->findAll();

        $spreadsheet = new Spreadsheet();

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'NIB')
            ->setCellValue('B1', 'Nama Pemilik')
            ->setCellValue('C1', 'Nama Usaha')
			->setCellValue('E1', 'Alamat');

        $column = 2;

        foreach ($umkm as $u) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $column, $u['nib'])
                ->setCellValue('B' . $column, $u['nama_pemilik'])
                ->setCellValue('C' . $column, $u['nama_usaha'])
				->setCellValue('E' . $column, $u['alamat']);

            $column++;
        }

        $writer = new Xlsx($spreadsheet);
        $filename = date('Y-m-d-His'). '-Data-UMKM-Bengkalis';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $filename . '.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

	public function tentang()
	{
		$data= [
			'title'=>'Tentang - UMKM Bengkalis',
		];
        return view ('user/tentang', $data);
	}

	public function kontak()
	{
		$data= [
			'title'=>'Hubungi Kami - UMKM Bengkalis',
		];
        return view ('user/user_kontak', $data);
	}
	
		public function store()
	{
		$valid = $this->validate([
				'nama' => [
					'label' => 'Nama',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong',
					]
			],
				'email' => [
				'label' => 'Email',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} tidak boleh kosong',
				]
			],
				'pesan' => [
					'label' => 'Pesan',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong',
					]
				]
		]);

		if(!$valid){
			session()->setFlashdata('message',  \Config\Services::validation()->listErrors());
			return redirect()->to(base_url('/user/kontak'));
		}else{
			$data=[
				'nama' => $this->request->getPost('nama'),
		 		'email' => $this->request->getPost('email'),
				'pesan' => $this->request->getPost('pesan'),
			];
			$this->M_kontak->addPesan($data);
			session()->setFlashdata('message', 'Kritik & Saran mu terkirim');
			return redirect()->to('/user/kontak');
		}
	
	}

}
