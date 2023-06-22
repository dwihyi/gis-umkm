<?php

namespace App\Controllers;
use App\Models\M_sektor;

class Sektor extends BaseController
{

	public function __construct()
	{
		$this->M_sektor = new M_sektor();
		$this->pager = \Config\Services::pager();
	}

	public function index()
	{
		$currentPage = $this->request->getVar('page_sektor') ? $this->request->getVar('page_sektor') : 1;
		$keyword = $this->request->getVar('keyword');
		if($keyword) {
			$varSektor = $this->M_sektor->pencarian($keyword);
		}else{
			$varSektor = $this->M_sektor;
		}

		$data = [
			'title' => 'Klasifikasi Sektor Usaha - UMKM Bengkalis',
			'sektor' => $varSektor->orderBy('id_sektor','DESC'),
			'sektor' => $varSektor->paginate(10, 'sektor'),
			'pager' => $this->M_sektor->pager,
			'currentPage' => $currentPage
		];
		return view('admin/data_sektor', $data);
	}

	public function add()
	{
		$data = [
			'title' => 'Tambah Data - UMKM Bengkalis',
			
		];
		return view('admin/addSektor', $data);
	}

	public function store()
	{
		$valid = $this->validate([
			'klbi' => [
				'label' => 'Kode KLBI',
				'rules' => 'required|is_unique[sektor.klbi]|exact_length[5]|numeric',
				'errors' => [
					'required' => '{field} tidak boleh kosong',
					'is_unique' => '{field} sudah diinputkan',
					'exact_length' => '{field} harus berjumlah 5 karakter',
					'numeric' => '{field} harus berupa angka '
				]
			],
			'sektor' => [
				'label' => 'Sektor',
				'rules' => 'required|is_unique[sektor.sektor]',
				'errors' => [
					'required' => '{field} tidak boleh kosong',
					'is_unique' => '{field} sudah diinputkan',
				]
			],
			'deskripsi' => [
				'label' => 'Deskripsi Usaha',
				'rules' => 'required|is_unique[sektor.deskripsi]',
				'errors' => [
					'required' => '{field} tidak boleh kosong',
					'is_unique' => '{field} sudah diinputkan',
				]
			]
		]);

		if(!$valid){
			session()->setFlashdata('message',  \Config\Services::validation()->listErrors());
			return redirect()->to(base_url('/sektor/add'));
		}else{
			$data=[
				'klbi' => $this->request->getPost('klbi'),
				'sektor' => $this->request->getPost('sektor'),
				'deskripsi' => $this->request->getPost('deskripsi'),
			];
			$this->M_sektor->addSektor($data);
			session()->setFlashdata('message', 'Data berhasil ditambahkan');
			return redirect()->to(base_url('sektor'));
		}
			
	}

	public function edit($id)
	{
		$data = [
			'title' => 'Edit Data - UMKM Bengkalis',
			'sektor' => $this->M_sektor->editSektor($id),	
		];
		return view('admin/editSektor', $data);
	}

	public function update($id)
	{
		$valid = $this->validate([
			'klbi' => [
				'label' => 'Kode KLBI',
				'rules' => 'required|exact_length[5]|numeric',
				'errors' => [
					'required' => '{field} tidak boleh kosong',
					'exact_length' => '{field} harus berjumlah 5 karakter',
					'numeric' => '{field} harus berupa angka '
				]
			],
			'sektor' => [
				'label' => 'Sektor',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} tidak boleh kosong',	
				]
			],
			'deskripsi' => [
				'label' => 'Deskripsi Usaha',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} tidak boleh kosong',	
				]
			]
		]);

		if(!$valid){
			session()->setFlashdata('message',  \Config\Services::validation()->listErrors());
			return redirect()->to(base_url('/sektor/edit/' .$id));
		}else{
			$data=[
				'id_sektor' => $id,
				'klbi' => $this->request->getPost('klbi'),
				'sektor' => $this->request->getPost('sektor'),
				'deskripsi' => $this->request->getPost('deskripsi'),
			];
			$this->M_sektor->updateSektor($data, $id);
			session()->setFlashdata('message', 'Data berhasil diperbarui');
			return redirect()->to(base_url('sektor'));
		}
		
	}

	public function delete($id)
	{
		$this->M_sektor->deleteSektor($id);
		session()->setFlashdata('message', 'Data berhasil dihapus');
		return redirect()->to(base_url('sektor'));
	}

	public function import()
	{
		$file = $this->request->getFile('fileexcel');
		$ext = $file->getClientExtension();

		if($ext == 'xls'){
			$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
		}else{
			$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
		}

		$spreadsheet = $reader->load($file);
		$sheet = $spreadsheet->getActiveSheet()->toArray();

		foreach($sheet as $x=>$excel){
			//skip judul tabel
			if($x==0){
				continue;
			}

			//skip jika ada data yang sama
			$klbi = $this->M_sektor->cekdata($excel['0']);
			if(isset($excel['0']) == isset ($klbi['klbi'])){
				continue;
			}
			
			$data = [
				'klbi' => $excel['0'],
				'sektor' => $excel['1'],
				'deskripsi' => $excel['2'],
			];
			$this->M_sektor->addSektor($data);
		}
		session()->setFlashdata('message', 'Data Berhasil Diimport');
		return redirect()->to(base_url('sektor'));
	}
}
