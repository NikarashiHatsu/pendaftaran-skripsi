<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProdisTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id INT(11) PRIMARY KEY AUTO_INCREMENT',
            'kode_fakultas VARCHAR(3) NOT NULL',
            'kode_prodi VARCHAR(3) NOT NULL',
            'nama VARCHAR(255) NOT NULL',
            'created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP()',
            'updated_at TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP()',
        ]);

        $this->forge->createTable('prodis');
    }

    public function down()
    {
        $this->forge->dropTable('prodis');
    }
}
