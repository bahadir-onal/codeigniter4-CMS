<?php

namespace App\Database\Seeds\Settings;

use App\Entities\SettingEntity;
use App\Models\SettingModel;
use \CodeIgniter\Database\Seeder;

class WebmasterSeeder extends Seeder
{
    public function run()
    {
        $entity = new SettingEntity();
        $model  = new SettingModel();

        $default = config('webmaster');
        $data = [
            'googleVerify'     => $default->googleVerify,
            'googleAnalytics'  => $default->googleAnalytics,
            'yandexVerify'     => $default->yandexVerify,
            'yandexMetrika'    => $default->yandexMetrika
        ];
        $entity->setKey('webmaster');
        $entity->setValue($data);
        $model->insert($entity);
    }
}