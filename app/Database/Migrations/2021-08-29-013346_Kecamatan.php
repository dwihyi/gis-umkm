<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kecamatan extends Migration
{
	public function up()
	{
		$this->forge->addField([
            'id_kecamatan'           => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => TRUE,
                'auto_increment'    => TRUE
            ],
            'kode_kemendagri'         => [
                'type'              => 'VARCHAR',
                'constraint'        => '8',
            ],
			'kecamatan'         => [
                'type'              => 'VARCHAR',
                'constraint'        => '30',
            ],
        ]);
        $this->forge->addKey('id_kecamatan', TRUE);
        $this->forge->createTable('kecamatan');
	}

	public function down()
	{
		$this->forge->dropTable('kecamatan');
	}
}
