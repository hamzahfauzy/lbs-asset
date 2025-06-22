<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class InitLbsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'            => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
            'nama' => ['type' => 'VARCHAR', 'constraint' => 100],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('tb_desa');

        $this->forge->addField([
            'id'            => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
            'nama' => ['type' => 'VARCHAR', 'constraint' => 100],
            'alamat' => ['type' => 'VARCHAR', 'constraint' => 100],
            'no_hp' => ['type' => 'VARCHAR', 'constraint' => 100],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('tb_pemilik');

        $this->forge->addField([
            'id'   => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
            'desa_id'   => ['type' => 'BIGINT', 'unsigned' => true, 'null' => true],
            'pemilik_id'   => ['type' => 'BIGINT', 'unsigned' => true, 'null' => true],
            'nama' => ['type' => 'VARCHAR', 'constraint' => 100],
            'alamat' => ['type' => 'TEXT'],
            'data_lokasi' => ['type' => 'TEXT'],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('desa_id', 'tb_desa', 'id', '', 'RESTRICT', 'fk_tb_lokasi_desa_id');
        $this->forge->addForeignKey('pemilik_id', 'tb_pemilik', 'id', '', 'RESTRICT', 'fk_tb_lokasi_pemilik_id');
        $this->forge->createTable('tb_lokasi');
    }

    public function down()
    {
        $this->forge->dropTable('tb_desa');
        $this->forge->dropTable('tb_pemilik');
        $this->forge->dropTable('tb_lokasi');
    }
}
