<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMahasiswasTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id INT(11) PRIMARY KEY AUTO_INCREMENT',
            'nim VARCHAR(255) NOT NULL',
            'nama VARCHAR(255) NOT NULL',
            'jk TINYINT(1) NOT NULL', # 1 = Laki-lai, 0 = Perempuan
            'kode_fakultas VARCHAR(3) NOT NULL',
            'kode_prodi VARCHAR(3) NOT NULL',
            'nip_pembimbing1 VARCHAR(16) NOT NULL',
            'nip_pembimbing2 VARCHAR(16) NOT NULL',
            'foto VARCHAR(255) NOT NULl',
            'alamat TEXT',
            'created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP()',
            'updated_at TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP()',
        ]);

        $this->forge->createTable('mahasiswas');
    }

    public function down()
    {
        $this->forge->dropTable('mahasiswas');
    }
}
