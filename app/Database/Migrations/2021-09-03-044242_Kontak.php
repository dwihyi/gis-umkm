<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kontak extends Migration
{
	public function up()
	{
		$this->forge->addField([
            'id_kontak'           => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => TRUE,
                'auto_increment'    => TRUE
            ],
            'nama'         => [
                'type'              => 'VARCHAR',
                'constraint'        => '50',
            ],
            'email'       => [
                'type'        => 'VARCHAR',
                'constraint'  => '100',
            ],
			'pesan'       => [
                'type'        => 'TEXT',
                'null'        => TRUE,
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP'
        ]);
        $this->forge->addKey('id_kontak', TRUE);
        $this->forge->createTable('kontak');
	}

	public function down()
	{
		$this->forge->dropTable('kontak');
	}
}

