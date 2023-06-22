<?php

namespace App\Models;
use CodeIgniter\Model;

class M_users extends Model
{
	protected $table = 'users';
	protected $primaryKey = 'id';
	protected $allowedFields = [
        'email', 'username', 'fullname',
        'user_image', 'password_hash', 'reset_hash',
        'reset_at', 'reset_expires', 'activate_hash',
        'status', 'status_message', 'active', 
        'force_pass_reset', 'created_at', 'updated_at', 'deleted_at'
    ];

	public function get_all_data()
	{
		return $this->db->table('users')->get()->getResultArray();
	}
}