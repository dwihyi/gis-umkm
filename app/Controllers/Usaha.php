<?php

namespace App\Controllers;
use App\Models\M_kecamatan;
use App\Models\M_sektor;
use App\Models\M_usaha;
use App\Models\M_users;


class Usaha extends BaseController
{
	
	public function __construct()
	{
		helper('form');
		$this->M_usaha = new M_usaha();
		$this->M_sektor = new M_sektor();
		$this->M_kecamatan = new M_kecamatan();
		$this->M_users = new M_users();
	}

	public function index()
	{
		$data= [
			'title'=>'Home - UMKM Bengkalis',
		];
        return view ('usaha/home', $data);
		

	}

	public function myprofil()
	{
		$data = array(
			'title' => 'Profil UMKM - UMKM Bengkalis',
			'sektor' => $this->M_sektor->get_all_data(),
			'kecamatan' => $this->M_kecamatan->get_all_data(),
			'tb_umkm' => $this->M_usaha->get_umkm(),
		);
		return view('usaha/myprofil', $data);
	}

	public function add()
	{
		$data = array(
				'title' => 'Lengkapi Profil - UMKM Bengkalis',
				'sektor' => $this->M_sektor->get_all_data(),
				'kecamatan' => $this->M_kecamatan->get_all_data(),
		);
		return view('usaha/addProfil', $data);
	}

	public function store()
	{
		if (!$this->validate([
			'nib' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Tidak boleh kosong'
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
				'label' => 'Hasil Penjualan',
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
			'foto' => [
				'rules' => 'uploaded[foto]|mime_in[foto,image/jpg,image/jpeg,image/gif,image/png]|max_size[foto,2048]',
				'errors' => [
					'uploaded' => 'Harus Ada File yang diupload',
					'mime_in' => 'File Extention Harus Berupa jpg,jpeg,gif,png',
					'max_size' => 'Ukuran File Maksimal 2 MB'
				]
 
			]
		])) {
			session()->setFlashdata('error', $this->validator->listErrors());
			return redirect()->back()->withInput();
		}
 
		$M_usaha = new M_usaha();
		$datafoto = $this->request->getFile('foto');
		$fileName = $datafoto->getRandomName();
		$M_usaha->insert([
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
			'foto' => $fileName,
			
		]);
		$datafoto->move('foto', $fileName);
		session()->setFlashdata('success', 'foto Berhasil diupload');
		return redirect()->to(base_url('/usaha/myprofil'));
		
	}

	public function edit($id)
	{
		$data = [
			'title' => 'Edit Data - UMKM Bengkalis',
			'sektor' => $this->M_sektor->get_all_data(),
			'kecamatan' => $this->M_kecamatan->get_all_data(),
			'tb_umkm' => $this->M_umkm->detail($id),
			
		];
		return view('usaha/editProfil', $data);
	}

	public function update($id)
	{
		if (!$this->validate([
			'nib' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Tidak boleh kosong'
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
			'foto' => [
				'rules' => 'uploaded[foto]|mime_in[foto,image/jpg,image/jpeg,image/gif,image/png]|max_size[foto,2048]',
				'errors' => [
					'uploaded' => 'Harus Ada File yang diupload',
					'mime_in' => 'File Extention Harus Berupa jpg,jpeg,gif,png',
					'max_size' => 'Ukuran File Maksimal 2 MB'
				]
 
			]
		])) {
			session()->setFlashdata('error', $this->validator->listErrors());
			return redirect()->back()->to(base_url('usaha/edit'.$id));
		}
 
		$M_umkm2 = new M_umkm();
		$datafoto = $this->request->getFile('foto');
		$fileName = $datafoto->getRandomName();
		$M_umkm2->update($id,[
			'id' =>$id,
			'nib' => $this->request->getPost('nib'),
			'nama_usaha' => $this->request->getPost('nama_usaha'),
			'id_sektor' => $this->request->getPost('id_sektor'),
			'alamat' => $this->request->getPost('alamat'),
			'id_kecamatan' => $this->request->getPost('id_kecamatan'),
			'latitude' => $this->request->getPost('latitude'),
			'longitude' => $this->request->getPost('longitude'),
			'foto' => $fileName,
			
		]);
		$datafoto->move('foto', $fileName);
		session()->setFlashdata('success', 'foto Berhasil diupload');
		return redirect()->to(base_url('/usaha/myprofil'));
		
	}

	public function delete($id)
	{
		$this->M_umkm2->deleteUmkm($id);
		session()->setFlashdata('message', 'Data berhasil dihapus');
		return redirect()->to(base_url('/usaha/myprofil'));
	}
}
