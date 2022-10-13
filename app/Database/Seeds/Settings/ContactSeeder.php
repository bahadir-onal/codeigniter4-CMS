<?php


namespace App\Database\Seeds\Settings;

use App\Entities\SettingEntity;
use App\Models\SettingModel;
use \CodeIgniter\Database\Seeder;

class ContactSeeder extends Seeder
{
    public function run()
    {
        $entity = new SettingEntity();
        $model = new SettingModel();

        $data = [
            'office' => [
                'name' => '',
                'address' => '',
                'phones' => [
                    'phone' => [
                        'name' => '',
                        'number' => ''
                    ]
                ],
                'emails' => [
                    'email' => [
                        'name' => '',
                        'email' => '',
                    ]
                ],
                'fax' => '',
                'map' => ''
            ]
        ];

        $entity->setKey('contact');
        $entity->setValue($data);
        $model->insert($entity);
    }
}