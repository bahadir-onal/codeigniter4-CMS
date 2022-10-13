<?php


namespace App\Database\Seeds;

use \CodeIgniter\Database\Seeder;

class LanguageSeeder extends Seeder
{
    public function run()
    {
        $dataTR = [
            'code' => 'tr',
            'flag' => 'tr',
            'title' => json_encode([
                'tr' => 'Türkçe',
                'en' => 'Turkish'
            ],JSON_UNESCAPED_UNICODE),
            'status' => 'STATUS_ACTIVE'
        ];

        $dataEN = [
            'code' => 'en',
            'flag' => 'us',
            'title' => json_encode([
                'tr' => 'İngilizce',
                'en' => 'English'
            ],JSON_UNESCAPED_UNICODE),
            'status' => 'STATUS_ACTIVE'
        ];
        $this->db->table('languages')->insert($dataTR);
        $this->db->table('languages')->insert($dataEN);
    }
}