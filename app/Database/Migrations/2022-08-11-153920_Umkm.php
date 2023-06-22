<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Umkm extends Migration
{
	public function up()
	{
		$this->db->enableForeignKeyChecks();
		$this->forge->addField([
			'id_umkm' => [
				'type'	=> 'INT',
				'constraint' => 11,
				'unsigned'   => TRUE,
				'auto_increment' => TRUE
			],
			'id_user' => [
				'type'	=> 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
			],
			'nib' => [
				'type'	=> 'VARCHAR',
				'constraint' => '13',
			],
			'nama_pemilik' => [
				'type'	=> 'VARCHAR',
				'constraint' => '50',
			],
			'nama_usaha' => [
				'type'	=> 'VARCHAR',
				'constraint' => '50',
			],
			'id_sektor' => [
				'type'	=> 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
                'null' => TRUE
			],
			'nama_usaha' => [
				'type'	=> 'VARCHAR',
				'constraint' => '50',
			],
			'alamat' => [
				'type'	=> 'VARCHAR',
				'constraint' => '50',
			],
			'id_kecamatan' => [
				'type'	=> 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
                'null' => TRUE
			],
			'latitude' => [
				'type'	=> 'VARCHAR',
				'constraint' => '25',
			],
			'longitude' => [
				'type'	=> 'VARCHAR',
				'constraint' => '25',
			],
			'foto' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
			],
			'created_at'       => ['type' => 'datetime', 'null' => true],
            'updated_at'       => ['type' => 'datetime', 'null' => true],
            'deleted_at'       => ['type' => 'datetime', 'null' => true],
		]);
		$this->forge->addKey('id_umkm', TRUE);
		$this->forge->addForeignKey('id_sektor', 'sektor', 'id_sektor', 'CASCADE', 'CASCADE');
		$this->forge->addForeignKey('id_kecamatan', 'kecamatan', 'id_kecamatan', 'CASCADE', 'CASCADE');
		$this->forge->addForeignKey('id', 'users', 'id_users', 'CASCADE', 'CASCADE');
		$this->forge->createTable('umkm');
	}

	public function down()
	{
		$this->forge->dropTable('umkm');
	}
}
