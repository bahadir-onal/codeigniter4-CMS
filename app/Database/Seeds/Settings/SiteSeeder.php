<?php

namespace App\Database\Seeds\Settings;

use App\Entities\SettingEntity;
use App\Models\SettingModel;
use \CodeIgniter\Database\Seeder;

class SiteSeeder extends Seeder
{
    public function run()
    {
        $entity = new SettingEntity();
        $model = new SettingModel();

        $default = config('site');
        $data = [
            'title'       => $default->title,
            'description' => $default->description,
            'keywords'    => $default->keywords,
            'headerLogo'  => $default->headerLogo,
            'footerLogo'  => $default->footerLogo,
            'mobilLogo'   => $default->mobileLogo,
            'favicon'     => $default->favicon
        ];
        $entity->setKey('site');
        $entity->setValue($data);
        $model->insert($entity);
    }
}