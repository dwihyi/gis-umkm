<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Sektor extends Migration
{
	public function up()
	{
		$this->forge->addField([
            'id_sektor'           => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => TRUE,
                'auto_increment'    => TRUE
            ],
            'klbi'         => [
                'type'              => 'INT',
                'constraint'        => 5,
            ],
			'sektor'         => [
                'type'              => 'VARCHAR',
                'constraint'        => 200,
            ],
            'deskripsi'       => [
                'type'        => 'TEXT',
                'null'        => TRUE,
            ],
        ]);
        $this->forge->addKey('id_sektor', TRUE);
        $this->forge->createTable('sektor');
	}

	public function down()
	{
		$this->forge->dropTable('sektor');
	}
}
