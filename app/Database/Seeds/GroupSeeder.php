<?php
namespace App\Database\Seeds;

use \CodeIgniter\Database\Seeder;

class GroupSeeder extends Seeder
{
    public function run()
    {
        $admin = [
            'slug' => DEFAULT_ADMIN_GROUP,
            'title' => json_encode([
                'tr' => 'Root Sistem Yöneticileri',
                'en' => 'Root System Manager'
            ],JSON_UNESCAPED_UNICODE),
            'permissions' => json_encode([

            ])
        ];
        $this->db->table('groups')->insert($admin);

        $user = [
            'slug' => DEFAULT_REGISTER_USER,
            'title' => json_encode([
                'tr' => 'Kayıtlı Kullanıcılar',
                'en' => 'Registered Users'
            ],JSON_UNESCAPED_UNICODE),
            'permissions' => json_encode([

            ])
        ];
        $this->db->table('groups')->insert($user);
    }
}