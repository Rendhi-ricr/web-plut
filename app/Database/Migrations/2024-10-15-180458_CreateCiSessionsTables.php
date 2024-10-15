<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCiSessionsTables extends Migration {
    public function up() {
        //

        $fields = [
            'id' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => false,
            ],
            'ip_address' => [
                'type' => 'VARCHAR',
                'constraint' => 45,
                'null' => false,
            ],
            'timestamp TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'data' => [
                'type' => 'BLOB',
                'null' => false,
            ],
        ];

        $this->forge->addField($fields);
        $this->forge->addKey(['id', 'ip_address'], true);
        $this->forge->addUniqueKey('id');
        $this->forge->addKey('timestamp');
        $this->forge->createTable('ci_sessions', true);
    }

    public function down() {
        //
        $this->forge->dropTable('ci_sessions', true);
    }
}