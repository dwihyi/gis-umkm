<?php

namespace App\Models;
use CodeIgniter\Model;

class M_kontak extends Model
{
	protected $table = 'kontak';
	protected $allowedFields = ['nama', 'email', 'pesan'];
	
	public function get_all_data()
	{
		return $this->db->table('kontak')->get()->getResultArray();
	}

	public function addPesan($data)
	{
		return $this->db->table('kontak')->insert($data);
	}


	public function deletePesan($id)
	{
		return $this->db->table('kontak')->delete(array('id_kontak'=> $id));
	}

}