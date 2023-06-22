<?php

namespace App\Models;
use CodeIgniter\Model;

class M_umkm extends Model
{
	protected $table = 'umkm';
	protected $primaryKey = 'id_umkm';
	protected $allowedFields = [
		'id_umkm',
		'id_user',
		'nib',
		'nama_pemilik',
		'nama_usaha',
		'id_sektor',
		'alamat',
		'id_kecamatan',
		'latitude',
		'longitude',
		'foto',
		'modal_usaha',
		'hasil_penjualan',
		'jmlh_tenaga_kerja',
		'tahun',
	];


	public function get_umkm()
	{
		return $this->db->table('umkm')
		 ->join('kecamatan', 'kecamatan.id_kecamatan = umkm.id_kecamatan')
		 ->join('sektor', 'sektor.id_sektor = umkm.id_sektor')
		 ->get()
		 ->getResultArray();
	}

	// public function get_umkm()
	// {
	// 	return $this->db->table('tb_umkm')
	// 	->join('kecamatan', 'kecamatan.id_kecamatan = tb_umkm.id_kecamatan')
	// 	 ->join('sektor', 'sektor.id_sektor = tb_umkm.id_sektor')
	// 	// ->join('users', 'users.id = tb_umkm.id_user')
	// 	 ->get()
	// 	 ->getResultArray();
	// }

	public function addUmkm($data)
	{
		return $this->db->table('umkm')->insert($data);
	}

	public function editUmkm($id)
	{
		return $this->db->table('umkm')
		->join('kecamatan', 'kecamatan.id_kecamatan = umkm.id_kecamatan')
		->join('sektor', 'sektor.id_sektor = umkm.id_sektor')
		->where('id_umkm', $id)
		->get()
		->getRowArray();
	}

	public function detail($id)
	{
		return $this->db->table('tb_umkm')
		->join('kecamatan', 'kecamatan.id_kecamatan = tb_umkm.id_kecamatan')
		->join('sektor', 'sektor.id_sektor = tb_umkm.id_sektor')
		->where('id_umkm', $id)
		->get()
		->getRowArray();
	}

	public function updateUmkm($data, $id)
	{
		return $this->db->table('umkm')->update($data, array('id_umkm'=> $id));
		
	}

	public function deleteUmkm($id)
	{
		return $this->db->table('umkm')->delete(array('id_umkm'=> $id));
	}
	
	public function cekdata($nib)
	{
		return $this->db->table('umkm')
				->where('nib', $nib)
				->get()->getRowArray();
	}

	public  function pencarian($keyword)
	{
		$builder = $this->table('umkm');
		$builder->like('nama_usaha', $keyword);
		$builder->orLike('sektor', $keyword);
		$builder->orLike('kecamatan', $keyword);
		return $builder;
	}

}