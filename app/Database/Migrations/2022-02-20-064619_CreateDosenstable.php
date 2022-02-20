<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDosenstable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id INT(11) PRIMARY KEY AUTO_INCREMENT',
            'nip VARCHAR(16) NOT NULL',
            'nama VARCHAR(255) NOT NULL',
            'jk TINYINT(1) NOT NULL', # 1 = Laki-lai, 0 = Perempuan
            'email VARCHAR(255) NOT NULL',
            'foto VARCHAR(255) NOT NULl',
            'alamat TEXT',
            'created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP()',
            'updated_at TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP()',
        ]);

        $this->forge->createTable('dosens');
    }

    public function down()
    {
        $this->forge->dropTable('dosens');
    }
}
