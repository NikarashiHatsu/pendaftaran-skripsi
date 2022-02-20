<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSidangsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id INT(11) PRIMARY KEY AUTO_INCREMENT',
            'nomor_bukti VARCHAR(255) NOT NULL',
            'tanggal_sidang DATE NOT NULL',
            'nip_penguji1 VARCHAR(16) NOT NULL',
            'nip_penguji2 VARCHAR(16) NOT NULL',
            'ruangan VARCHAR(32) NOT NULL',
            'created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP()',
            'updated_at TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP()',
        ]);

        $this->forge->createTable('sidangs');
    }

    public function down()
    {
        $this->forge->dropTable('sidangs');
    }
}
