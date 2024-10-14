<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUmkmTables extends Migration {
    public function up() {
        //
        $this->forge->addField([
            'kode_umkm' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama_umkm' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'alamat' => [
                'type' => 'TEXT',
            ],
            'desa' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'kecamatan' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'kode_pos' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
            ],
            'telp' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'nik_pemilik' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'nama_pemilik' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'alamat_pemilik' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'pendidikan_terakhir' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'tahun_beroperasi' => [
                'type' => 'VARCHAR',
                'constraint' => '10',
            ],
            'jenis_usaha' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'wilayah_pemasaran' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'media_pemasaran' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'jumlah_modal_sendiri' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'jumlah_modal_pinjaman' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'dokumen_nib' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'dokumen_pirt' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'dokumen_halal' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'dokumen_npwp' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'dokumen_lh' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'dokumen_lainnya' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('kode_umkm', true);

        //Unique key
        $this->forge->addUniqueKey('email');
        $this->forge->addUniqueKey('nik_pemilik');

        $this->forge->createTable('t_umkm');
    }

    public function down() {
        //
        $this->forge->dropTable('t_umkm');
    }
}