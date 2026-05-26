<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePeminjamanTable extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id_peminjaman' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_member' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'id_book' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'tgl_pinjam' => [
                'type' => 'DATE',
            ],
            'tgl_harus_kembali' => [
                'type' => 'DATE',
            ],
        ]);
        $this->forge->addKey('id_peminjaman', true);
        $this->forge->createTable('peminjaman');
    }

    public function down()
    {
        //
        $this->forge->dropTable('peminjaman');
    }
}
