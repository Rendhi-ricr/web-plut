<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUmkmPerkembanganTables extends Migration {
    public function up() {
        //
        $this->forge->addField([
            'id_perkembangan' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'kode_umkm' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
            ],
            'tahun' => [
                'type' => 'YEAR',
                'null' => true,
            ],
            'asset' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'omzet' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'produk_unggulan' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => true,
            ],
            'foto_produk' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'jumlah_tenaga_kerja' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id_perkembangan', true, true);
        $this->forge->addKey('kode_umkm');
        $this->forge->addForeignKey('kode_umkm', 't_umkm', 'kode_umkm', 'CASCADE', 'CASCADE');

        $this->forge->createTable('t_umkm_perkembangan');
    }

    public function down() {
        //
        $this->forge->dropTable('t_umkm_perkembangan');
    }
}