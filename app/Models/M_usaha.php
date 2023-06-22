<?php

namespace App\Models;
use CodeIgniter\Model;

class M_usaha extends Model
{
	
	protected $DBGroup              = 'default';
	protected $table                = 'umkm';
	protected $primaryKey           = 'id_umkm';
	protected $returnType           = 'object';
	//protected $useTimestamps = true;
	protected $allowedFields        = [
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
		//->join('users', 'users.id = tb_umkm.id_user')
		 ->get()
		 ->getResultArray();
	}

	public function get_tahun()
	{
		$this->db->distinct();
		$this->db->group_by('tahun');
		return $this->db->get('umkm')->result();
	}
	// function get_profile()
	// {
	// 	$this->db->where('umkm.id_user', $this->session->userdata('id'));
	// 	return $this->db->get('umkm')->result();
	// }

    public function addUmkm($data)
	{
		return $this->db->table('umkm')->insert($data);
	}

	public function detail($id)
	{
		return $this->db->table('umkm')
		->join('kecamatan', 'kecamatan.id_kecamatan = umkm.id_kecamatan')
		->join('sektor', 'sektor.id_sektor = umkm.id_sektor')
		->where('id_umkm', $id)
		->get()
		->getRowArray();
	}

	public function deleteUmkm($id)
	{
		return $this->db->table('umkm')->delete(array('id_umkm'=> $id));
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