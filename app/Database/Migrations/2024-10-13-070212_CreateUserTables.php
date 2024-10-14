<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUserTables extends Migration {
    public function up() {
        //
        $this->forge->addField([
            'id_user' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'role' => [
                'type' => 'ENUM',
                'constraint' => ['admin_plut', 'admin_dkupp', 'umkm', 'operator'],
                'default' => 'umkm',
            ],
            'foto' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'kode_umkm' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
            ],

        ]);

        $this->forge->addKey('id_user', true);

        $this->forge->addKey('kode_umkm');
        $this->forge->addForeignKey('kode_umkm', 't_umkm', 'kode_umkm', 'CASCADE', 'CASCADE');

        $this->forge->addUniqueKey('email');
        $this->forge->createTable('t_users');
    }

    public function down() {
        //
        $this->forge->dropTable('t_users');
    }
}