<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MemberSeeder extends Seeder
{
    public function run()
    {
        //
        $data = [
            [
                'name_member' => 'Yunus',
                'email_member' => 'yunus@example.com',
                'contact_member' => '081234567890',
                'status_member' => 'aktif',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name_member' => 'Siti Aminah',
                'email_member' => 'siti@example.com',
                'contact_member' => '082233445566',
                'status_member' => 'aktif',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name_member' => 'Budi Santoso',
                'email_member' => 'budi@example.com',
                'contact_member' => '083344556677',
                'status_member' => 'tdk_aktif',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('members')->insertBatch($data);
    }
}
