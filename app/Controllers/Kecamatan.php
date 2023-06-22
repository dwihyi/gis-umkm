<?php

namespace App\Controllers;
use CodeIgniter\Controllers;
use App\Models\M_kecamatan;
use phpDocumentor\Reflection\DocBlock\Tags\See;

class Kecamatan extends BaseController
{

	public function __construct()
	{
		$this->M_kecamatan = new M_kecamatan();
		$this->pager = \Config\Services::pager();
	}

	public function index()
	{
		$currentPage = $this->request->getVar('page_kecamatan') ? $this->request->getVar('page_kecamatan') : 1;

		$data = [
			'title' => 'Data Kecamatan - UMKM Bengkalis',
			'kecamatan' => $this->M_kecamatan->paginate(5, 'kecamatan'),
			'pager' => $this->M_kecamatan->pager,
			'currentPage' => $currentPage
		];
		
		return view('admin/data_kecamatan', $data);
	}

	public function add()
	{
		$data = [
			'title' => 'Tambah Data - UMKM Bengkalis',
			
		];
		return view('admin/addKecamatan', $data);
	}

	public function store()
	{
		$valid = $this->validate([
				'kode_kemendagri' => [
					'label' => 'Kode Kemendagri',
					'rules' => 'required|is_unique[kecamatan.kode_kemendagri]|exact_length[5] or exact_length[5,8,12]',
					'errors' => [
						'required' => '{field} tidak boleh kosong',
						'is_unique' => '{field} sudah diinputkan',
						'exact_length' => '{field} berpola berikut 00.00.00',
					]
			],
				'kecamatan' => [
				'label' => 'Kecamatan',
				'rules' => 'required|is_unique[kecamatan.kecamatan]',
				'errors' => [
					'required' => '{field} tidak boleh kosong',
					'is_unique' => '{field} sudah diinputkan'
				]
			]
		]);

		if(!$valid){
			session()->setFlashdata('message',  \Config\Services::validation()->listErrors());
			return redirect()->to(base_url('/kecamatan/add'));
		}else{
			$data=[
				'kode_kemendagri' => $this->request->getPost('kode_kemendagri'),
		 		'kecamatan' => $this->request->getPost('kecamatan'),
			];
			$this->M_kecamatan->addKecamatan($data);
			session()->setFlashdata('message', 'Data Berhasil Ditambahkan');
			return redirect()->to('/kecamatan/index');
		}
	
	}

	public function edit($id)
	{
		$data = [
			'title' => 'Edit Data - UMKM Bengkalis',
			'kecamatan' => $this->M_kecamatan->editKecamatan($id),	
		];
		return view('admin/editKecamatan', $data);
	}

	public function update($id)
	{

		$valid = $this->validate([
			'kode_kemendagri' => [
				'label' => 'Kode Kemendagri',
				'rules' => 'required|exact_length[5,8,12]',
				'errors' => [
					'required' => '{field} tidak boleh kosong',
					'exact_length' => '{field} berpola berikut 00.00.00',
				]
			],
				'kecamatan' => [
				'label' => 'Kecamatan',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} tidak boleh kosong',
					
				]
			]
		]);

		if(!$valid){
			session()->setFlashdata('message',  \Config\Services::validation()->listErrors());
			return redirect()->to(base_url('/kecamatan/edit/' .$id));
		}else{
			//jika valid
			$data=[
				'id_kecamatan' => $id,
				'kode_kemendagri' => $this->request->getPost('kode_kemendagri'),
				'kecamatan' => $this->request->getPost('kecamatan'),
			];
			$this->M_kecamatan->updateKecamatan($data, $id);
			session()->setFlashdata('message', 'Data Berhasil Diupdate');
			return redirect()->to('/kecamatan/index');
		}

	}

	public function delete($id)
	{
		$this->M_kecamatan->deleteKecamatan($id);
		session()->setFlashdata('message', 'Data berhasil dihapus');
		return redirect()->to(base_url('kecamatan'));
	}
}
