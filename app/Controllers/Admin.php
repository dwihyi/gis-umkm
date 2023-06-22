<?php

namespace App\Controllers;
use App\Models\M_kecamatan;
use App\Models\M_sektor;
use App\Models\M_umkm;
use App\Models\M_kontak;


class Admin extends BaseController
{
	
	public function __construct()
	{
		$this->M_umkm = new M_umkm();
		$this->M_sektor = new M_sektor();
		$this->M_kontak = new M_kontak();
		$this->M_kecamatan = new M_kecamatan();
	}

	public function index()
	{
		$data= [
			'title'=>'Home - UMKM Bengkalis',
			'umkm' => $this->M_umkm->get_umkm(),
		];
        return view ('admin/dashboard-admin', $data);

	}
	
	public function kontak()
	{
		$currentPage = $this->request->getVar('page_kontak') ? $this->request->getVar('page_kontak') : 1;

		$data = [
			'title' => 'Data Kritik & Saran - UMKM Bengkalis',
			'kontak' => $this->M_kontak->paginate(5, 'kontak'),
			'pager' => $this->M_kontak->pager,
			'currentPage' => $currentPage
		];
		
		return view('admin/data_kontak', $data);
	}
	
	public function deleteKontak($id)
	{
		$this->M_kontak->deletePesan($id);
		session()->setFlashdata('message', 'Data berhasil dihapus');
		return redirect()->to(base_url('/admin/kontak'));
	}
	
}
