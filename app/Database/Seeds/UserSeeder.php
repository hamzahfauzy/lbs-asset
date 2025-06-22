<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'name' => 'admin',
            'email'    => 'admin@admin.com',
            'role'    => 'Admin',
            'password' => password_hash('admin', PASSWORD_BCRYPT)
        ];

        // Using Query Builder
        $this->db->table('users')->insert($data);
    }
}