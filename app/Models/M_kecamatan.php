<?php

namespace App\Models;
use CodeIgniter\Model;

class M_kecamatan extends Model
{
	protected $table = 'kecamatan';
	protected $allowedFields = ['kode_kemendagri', 'kecamatan'];
	
	public function get_all_data()
	{
		return $this->db->table('kecamatan')->get()->getResultArray();
	}

	public function addKecamatan($data)
	{
		return $this->db->table('kecamatan')->insert($data);
	}

	public function editKecamatan($id)
	{
		return $this->db->table('kecamatan')->where('id_kecamatan', $id)->get()->getRowArray();
	}

	public function updateKecamatan($data, $id)
	{
		return $this->db->table('kecamatan')->update($data, array('id_kecamatan'=> $id));
		
	}

	public function deleteKecamatan($id)
	{
		return $this->db->table('kecamatan')->delete(array('id_kecamatan'=> $id));
	}

}