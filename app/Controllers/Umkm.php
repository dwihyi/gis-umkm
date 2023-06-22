<?php

namespace App\Controllers;

use App\Models\M_kecamatan;
use App\Models\M_sektor;
use App\Models\M_umkm;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PHPExcel;
use PHPExcel_IOFactory;

class Umkm extends BaseController
{

	public function __construct()
	{
		$this->M_umkm = new M_umkm();
		$this->M_sektor = new M_sektor();
		$this->M_kecamatan = new M_kecamatan();
		$this->pager = \Config\Services::pager();
	}

	

	public function index()
    {
		$currentPage = $this->request->getVar('page_umkm') ? $this->request->getVar('page_umkm') : 1;
        $pager = \Config\Services::pager();
    	$model = new M_umkm();
    	$kunci = $this->request->getVar('cari');

        if ($kunci) {
            $query = $model->pencarian($kunci);
            $jumlah = "Pencarian dengan nama <B>$kunci</B> ditemukan ".$query->affectedRows()." Data";
        } else {
            $query = $model;
            $jumlah = "";
        }

		$data['title'] = "Data UMKM - UMKM Bengkalis";
        $data['umkm'] = $query->join('kecamatan', 'kecamatan.id_kecamatan = umkm.id_kecamatan','left')
		 						->join('sektor', 'sektor.id_sektor = umkm.id_sektor','left')
								->orderBy('id_umkm', 'DESC')
		 						->paginate(10,'umkm');
        $data['pager'] = $model->pager;
        $data['page'] = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        $data['jumlah'] = $jumlah;
		$data ['currentPage'] = $currentPage;

        echo view('admin/data_umkm',$data);
    }

	public function add()
	{
		$data = array(
				'title' => 'Tambah Data - UMKM Bengkalis',
				'sektor' => $this->M_sektor->get_all_data(),
				'kecamatan' => $this->M_kecamatan->get_all_data(),
		);
		return view('admin/addUmkm', $data);
	}

	public function store()
	{
		$valid = $this->validate([
				'nib' => [
					'label' => 'NIB',
					'rules' => 'required|is_unique[umkm.nib]|exact_length[13]|numeric',
					'errors' => [
						'required' => '{field} tidak boleh kosong',
						'is_unique' => '{field} sudah diinputkan',
						'exact_length' => '{field} berjumlah 13 karakter',
						'numeric' => '{field} harus berupa angka',
					]
			],
				'nama_pemilik' => [
				'label' => 'Nama Pemilik',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} tidak boleh kosong',
				]
			],
				'nama_usaha' => [
				'label' => 'Nama Usaha',
				'rules' => 'required|is_unique[umkm.nama_usaha]',
				'errors' => [
					'required' => '{field} tidak boleh kosong',
					'is_unique' => '{field} sudah diinputkan',
				]
			],
				'id_sektor' => [
				'label' => 'Sektor Usaha',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} tidak boleh kosong',	
				]
			],
				'alamat' => [
				'label' => 'Alamat',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} tidak boleh kosong',
				]
			],
				'id_kecamatan' => [
				'label' => 'Kecamatan',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} tidak boleh kosong',	
				]
			],
				'modal_usaha' => [
				'label' => 'Modal Usaha',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} tidak boleh kosong',
				]
			],
			'hasil_penjualan' => [
				'label' => 'Hasil Penjulan',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} tidak boleh kosong',
				]
			],
			'jmlh_tenaga_kerja' => [
				'label' => 'Jumlah Tenaga Kerja',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} tidak boleh kosong',
				]
			],
				'latitude' => [
				'label' => 'Latitude',
				'rules' => 'required|decimal',
				'errors' => [
					'required' => '{field} tidak boleh kosong',
					'decimal' => '{field} berbentuk desimal'
				]
			],
				'longitude' => [
				'label' => 'Longitude',
				'rules' => 'required|decimal',
				'errors' => [
					'required' => '{field} tidak boleh kosong',
					'decimal' => '{field} berbentuk desimal'
				]
			],
		]);

		if(!$valid){
			session()->setFlashdata('message',  \Config\Services::validation()->listErrors());
			return redirect()->to(base_url('/umkm/add'));
		}else{
			$data=[
				'nib' => $this->request->getPost('nib'),
				'nama_pemilik' => $this->request->getPost('nama_pemilik'),
				'nama_usaha' => $this->request->getPost('nama_usaha'),
				'id_sektor' => $this->request->getPost('id_sektor'),
				'alamat' => $this->request->getPost('alamat'),
				'id_kecamatan' => $this->request->getPost('id_kecamatan'),
				'modal_usaha' => $this->request->getPost('modal_usaha'),
				'hasil_penjualan' => $this->request->getPost('hasil_penjualan'),
				'jmlh_tenaga_kerja' => $this->request->getPost('jmlh_tenaga_kerja'),
				'latitude' => $this->request->getPost('latitude'),
				'longitude' => $this->request->getPost('longitude'),
		];

		$this->M_umkm->addUmkm($data);
		session()->setFlashdata('message', 'Data berhasil ditambahkan');
		return redirect()->to(base_url('umkm'));
		}
		
	}
	
	public function edit($id)
	{
		$data = [
			'title' => 'Edit Data - UMKM Bengkalis',
			'sektor' => $this->M_sektor->get_all_data(),
			'kecamatan' => $this->M_kecamatan->get_all_data(),
			'umkm' => $this->M_umkm->editUmkm($id),
			
		];
		return view('admin/editUmkm', $data);
	}

	public function update($id)
	{
		$valid = $this->validate([
			'nib' => [
				'label' => 'NIB',
				'rules' => 'required|exact_length[13]|numeric',
				'errors' => [
					'required' => '{field} tidak boleh kosong',
					'is_unique' => '{field} sudah diinputkan',
					'exact_length' => '{field} harus berjumlah 13 karakter',
					'numeric' => '{field} harus berupa angka'
				]
		],
			'nama_pemilik' => [
			'label' => 'Nama Pemilik',
			'rules' => 'required',
			'errors' => [
				'required' => '{field} tidak boleh kosong',
			]
		],
			'nama_usaha' => [
			'label' => 'Nama Usaha',
			'rules' => 'required',
			'errors' => [
				'required' => '{field} tidak boleh kosong',
			]
		],
			'id_sektor' => [
			'label' => 'Sektor Usaha',
			'rules' => 'required',
			'errors' => [
				'required' => '{field} tidak boleh kosong',	
			]
		],
			'alamat' => [
			'label' => 'Alamat',
			'rules' => 'required',
			'errors' => [
				'required' => '{field} tidak boleh kosong',
			]
		],
			'id_kecamatan' => [
			'label' => 'Kecamatan',
			'rules' => 'required',
			'errors' => [
				'required' => '{field} tidak boleh kosong',	
			]
		],
			'modal_usaha' => [
			'label' => 'Modal Usaha',
			'rules' => 'required',
			'errors' => [
				'required' => '{field} tidak boleh kosong',
			]
		],
		'hasil_penjualan' => [
			'label' => 'Hasil Penjualan Tahunan',
			'rules' => 'required',
			'errors' => [
				'required' => '{field} tidak boleh kosong',
			]
		],
		'jmlh_tenaga_kerja' => [
			'label' => 'Modal Usaha',
			'rules' => 'required',
			'errors' => [
				'required' => '{field} tidak boleh kosong',
			]
		],
			'latitude' => [
			'label' => 'Latitude',
			'rules' => 'required|decimal',
			'errors' => [
				'required' => '{field} tidak boleh kosong',
				'decimal' => '{field} berbentuk desimal'
			]
		],
			'longitude' => [
			'label' => 'Longitude',
			'rules' => 'required|decimal',
			'errors' => [
				'required' => '{field} tidak boleh kosong',
				'decimal' => '{field} berbentuk desimal'
			]
		],
	]);

	if(!$valid){
		session()->setFlashdata('message',  \Config\Services::validation()->listErrors());
		return redirect()->to(base_url('/umkm/edit/' .$id));
	}else{
		$data=[
			'id_umkm' => $id,
			'nib' => $this->request->getPost('nib'),
			'nama_pemilik' => $this->request->getPost('nama_pemilik'),
			'nama_usaha' => $this->request->getPost('nama_usaha'),
			'id_sektor' => $this->request->getPost('id_sektor'),
			'alamat' => $this->request->getPost('alamat'),
			'id_kecamatan' => $this->request->getPost('id_kecamatan'),
			'modal_usaha' => $this->request->getPost('modal_usaha'),
			'hasil_penjualan' => $this->request->getPost('hasil_penjualan'),
			'jmlh_tenaga_kerja' => $this->request->getPost('jmlh_tenaga_kerja'),
			'latitude' => $this->request->getPost('latitude'),
			'longitude' => $this->request->getPost('longitude'),
		];

		$this->M_umkm->updateUmkm($data, $id);
			session()->setFlashdata('message', 'Data berhasil diperbarui');
			return redirect()->to(base_url('umkm'));
		}
	}

	public function delete($id)
	{
		$this->M_umkm->deleteUmkm($id);
		session()->setFlashdata('message', 'Data berhasil dihapus');
		return redirect()->to(base_url('umkm'));
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
			->setCellValue('D1', 'ID Sektor')
			->setCellValue('E1', 'Alamat')
			->setCellValue('F1', 'ID Kecamatan');

        $column = 2;

        foreach ($umkm as $u) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $column, $u['nib'])
                ->setCellValue('B' . $column, $u['nama_pemilik'])
                ->setCellValue('C' . $column, $u['nama_usaha'])
				->setCellValue('D' . $column, $u['id_sektor'])
				->setCellValue('E' . $column, $u['alamat'])
				->setCellValue('F' . $column, $u['id_kecamatan']);

            $column++;
        }

        $writer = new Xlsx($spreadsheet);
        $filename = date('Y-m-d-His'). '-Data-UMKM-Bengkalis';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $filename . '.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

	public function import()
	{
		$validation =  \Config\Services::validation();
 
		$file = $this->request->getFile('import_file');
		$ext = $file->getClientExtension();

		if('ext' == 'xls'){
			$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
		}else{
			$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
		}

		$spreadsheet = $reader->load($file);
		$sheet = $spreadsheet->getActiveSheet()->toArray();

		foreach($sheet as $x => $excel){
			//skip foto
			if($x == 0){
				continue;
			}
			//skip data yg sama
			
			$data = [
				'nib' => $excel['2'],
				'nama_pemilik' => $excel['3'],
				'nama_usaha' => $excel['4'],
				'id_sektor' => $excel['5'],
				'alamat' => $excel['6'],
				'id_kecamatan' => $excel['7'],
				'latitude' => $excel['8'],
				'longitude' => $excel['9'],
				'modal_usaha' => $excel['11'],
				'hasil_penjualan' => $excel['12'],
				'jmlh_tenaga_kerja' => $excel['13'],
				'tahun' => $excel['14'],
			];

			$this->M_umkm->addUmkm($data);
		}
		session()->setFlashdata('message', 'Data Berhasil Diimport');
		return redirect()->to(base_url('umkm'));
		
		// $data = array(
		// 	'import_file' => $file,
		// );
	
		// if($validation->run($data, 'umkm') == FALSE){
	
		// 	session()->setFlashdata('errors', $validation->getErrors());
		// 	return redirect()->to(base_url('umkm'));
		
		// } else {
	
		// 	// ambil extension dari file excel
		// 	$extension = $file->getClientExtension();
			
		// 	// format excel 2007 ke bawah
		// 	if('xls' == $extension){
		// 		$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
		// 	// format excel 2010 ke atas
		// 	} else {
		// 		$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
		// 	}
			
		// 	$spreadsheet = $reader->load($file);
		// 	$data = $spreadsheet->getActiveSheet()->toArray();
	
		// 	foreach($data as $idx => $row){
				
		// 		// lewati baris ke 0 pada file excel
		// 		// dalam kasus ini, array ke 0 adalahpara title
		// 		if($idx == 0) {
		// 			continue;
		// 		}

		// 		$nib = $this->M_umkm->cekdata($row[0]);
		// 		if($row !== null && $row[0] == $nib['nib']){
		// 			continue;
		// 		}
				
		// 		// get nib from excel
		// 		$nib     = $row[0];
		// 		$pemilik = $row[1];
		// 		$usaha = $row[2];
		// 		$sektor = $row[3];
		// 		$alamat = $row[4];
		// 		$kecamatan = $row[5];
		// 		$latitude = $row[6];
		// 		$longitude = $row[7];
	
		// 		$data = [
		// 			"nib"    => $nib,
		// 			"nama_pemilik"    => $pemilik,
		// 			"nama_usaha"    => $usaha,
		// 			"id_sektor"    => $sektor,
		// 			"alamat"    => $alamat,
		// 			"id_kecamatan"    => $kecamatan,
		// 			"latitude"    => $latitude,
		// 			"longitude"    => $longitude,
		// 		];
	
		// 		$this->M_umkm->addUmkm($data);
		// 	}
	
		// 	session()->setFlashdata('message', 'Data Berhasil Diimport');
		// 	return redirect()->to(base_url('umkm')); 
			
		// }
    }
}
