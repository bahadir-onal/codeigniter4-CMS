<?php


namespace App\Database\Seeds;

use \CodeIgniter\Database\Seeder;

class ThemeSeeder extends Seeder
{
    public function run()
    {
        $this->db->table('themes')->insert([
            'folder'   => 'default',
            'name'     => 'Default Theme',
            'author'   => 'Bahadır Önal',
            'web'      => 'www.bahadironal.com',
            'email'    => 'bahadironal@gmail.com',
            'status'   => STATUS_ACTIVE,
            'settings' => null
        ]);
    }
}