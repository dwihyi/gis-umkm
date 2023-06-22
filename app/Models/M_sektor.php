<?php

namespace App\Models;
use CodeIgniter\Model;

class M_sektor extends Model
{
	protected $table = 'sektor';
	protected $primaryKey = 'id_sektor';
	protected $allowedFields = ['klbi', 'sektor', 'deskripsi'];

	public function get_all_data()
	{
		return $this->db->table('sektor')
		->orderBy('id_sektor', 'DESC')
		->get()
		->getResultArray();
	}

	public function addSektor($data)
	{
		return $this->db->table('sektor')->insert($data);
	}

	public function editSektor($id)
	{
		return $this->db->table('sektor')->where('id_sektor', $id)->get()->getRowArray();
	}

	public function updateSektor($data, $id)
	{
		return $this->db->table('sektor')->update($data, array('id_sektor'=> $id));
		
	}

	public function deleteSektor($id)
	{
		return $this->db->table('sektor')->delete(array('id_sektor'=> $id));
	}

	public function cekdata($klbi)
	{
		return $this->db->table('sektor')
					->where('klbi', $klbi)
					->get()->getRowArray();
	}

	
	public function pencarian($keyword) 
	{
		$builder = $this->table('sektor');
		$builder->like('klbi', $keyword);
		$builder->orLike('sektor', $keyword);
		$builder->orLike('deskripsi', $keyword);
		return $builder;
	}
	
}