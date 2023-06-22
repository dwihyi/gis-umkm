<?php

namespace App\Controllers;
use CodeIgniter\Controllers;
use App\Models\M_kontak;
use phpDocumentor\Reflection\DocBlock\Tags\See;

class kontak extends BaseController
{

	public function __construct()
	{
		$this->M_kontak = new M_kontak();
		$this->pager = \Config\Services::pager();
	}

// 	public function index()
// 	{
// 		$currentPage = $this->request->getVar('page_kontak') ? $this->request->getVar('page_kontak') : 1;

// 		$data = [
// 			'title' => 'Data Kritik & Saran - UMKM Bengkalis',
// 			'kontak' => $this->M_kontak->paginate(5, 'kontak'),
// 			'pager' => $this->M_kontak->pager,
// 			'currentPage' => $currentPage
// 		];
		
// 		return view('admin/data_kontak', $data);
// 	}


	public function delete($id)
	{
		$this->M_kontak->deletePesan($id);
		session()->setFlashdata('message', 'Data berhasil dihapus');
		return redirect()->to(base_url('kontak'));
	}
}
