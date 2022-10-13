<?php

namespace App\Database\Seeds\Settings;

use App\Entities\SettingEntity;
use App\Models\SettingModel;
use \CodeIgniter\Database\Seeder;

class AutoShareSeeder extends Seeder
{

    public function run()
    {
        $entity = new SettingEntity();
        $model  = new SettingModel();

        $default = config('autoshare');
        $data = [
            'twitter'          => $default->twitter,
            'facebook'         => $default->facebook,
            'linkedin'         => $default->linkedin,
            'pinterest'        => $default->pinterest,
            'medium'           => $default->medium,
            'googleMyBusiness' => $default->googleMyBusiness,
        ];
        $entity->setKey('autoshare');
        $entity->setValue($data);
        $model->insert($entity);
    }

}