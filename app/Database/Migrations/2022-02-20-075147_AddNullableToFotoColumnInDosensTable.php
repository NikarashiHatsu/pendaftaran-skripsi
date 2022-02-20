<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddNullableToFotoColumnInDosensTable extends Migration
{
    public function up()
    {
        $this->forge->modifyColumn('dosens', [
            'foto' => [
                'type' => 'VARCHAR(255)',
                'null' => true,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->modifyColumn('dosens', [
            'foto' => [
                'type' => 'VARCHAR(255)',
                'null' => false,
            ],
        ]);
    }
}
