<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateKegiatanTables extends Migration {
    public function up() {
        $this->forge->addField([
            'id_kegiatan' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'tanggal_kegiatan' => [
                'type' => 'DATE',
                'null' => false,
            ],
            'jenis_kategori_layanan' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => false,
            ],
            'deskripsi_kegiatan' => [
                'type' => 'TEXT',
                'null' => false,
            ],
            'hasil_kegiatan' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => false,
            ],
            'rencana_tindak_lanjut' => [
                'type' => 'TEXT',
                'null' => false,
            ],
            'foto_kegiatan' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => false,
            ],
            'penanggung_jawab_kegiatan' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => false,
            ],
        ]);
        $this->forge->addKey('id_kegiatan', true);
        $this->forge->createTable('t_kegiatan', true);
    }

    public function down() {
        //
        $this->forge->dropTable('t_kegiatan', true);
    }
}