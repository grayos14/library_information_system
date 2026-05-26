<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMemberTable extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id_member' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'name_member' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'email_member' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'contact_member' => [
                'type' => 'VARCHAR',
                'constraint' => 30,
            ],
            'status_member' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id_member', true);
        $this->forge->createTable('members');
    }

    public function down()
    {
        //
        $this->forge->dropTable('members');
    }
}
