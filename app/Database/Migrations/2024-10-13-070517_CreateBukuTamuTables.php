<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBukuTamuTables extends Migration {
    public function up() {
        //
        $this->forge->addField([
            'id_buku_tamu' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'layanan' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'kategori_layanan' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'deskripsi' => [
                'type' => 'TEXT',
            ],
            'jam_kedatangan' => [
                'type' => 'TIME',
            ],
            'jam_pulang' => [
                'type' => 'TIME',
            ],
            'tanggal_kedatangan' => [
                'type' => 'DATE',
            ],
            'tanggal_pulang' => [
                'type' => 'DATE',
            ],
            'foto' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id_buku_tamu', true);
        $this->forge->createTable('t_buku_tamu');
    }

    public function down() {
        //
        $this->forge->dropTable('t_buku_tamu');
    }
}