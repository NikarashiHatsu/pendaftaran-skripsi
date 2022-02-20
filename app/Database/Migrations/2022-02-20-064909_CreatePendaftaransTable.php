<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePendaftaransTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id INT(11) PRIMARY KEY AUTO_INCREMENT',
            'nomor_bukti VARCHAR(255) NOT NULL',
            'tanggal DATE NOT NULL',
            'judul_skripsi VARCHAR(255) NOT NULL',
            'nim VARCHAR(255) NOT NULL',
            'nip_pembimbing1 VARCHAR(16) NOT NULL',
            'nip_pembimbing2 VARCHAR(16) NOT NULL',
            'file_laporan VARCHAR(255) NOT NULL',
            'file_rekomendasi VARCHAR(255) NOT NULL',
            'is_diterima TINYINT(1) NOT NULL DEFAULT 0',
            'created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP()',
            'updated_at TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP()',
        ]);

        $this->forge->createTable('pendaftarans');
    }

    public function down()
    {
        $this->forge->dropTable('pendaftarans');
    }
}
