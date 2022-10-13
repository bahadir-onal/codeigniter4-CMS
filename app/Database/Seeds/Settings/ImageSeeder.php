<?php

namespace App\Database\Seeds\Settings;

use App\Entities\SettingEntity;
use App\Models\SettingModel;
use \CodeIgniter\Database\Seeder;

class ImageSeeder extends Seeder
{
    public function run()
    {
        $entity = new SettingEntity();
        $model  = new SettingModel();

        $default = config('images');
        $data = [
            'defaultHandler'  => $default->defaultHandler,
            'thumbnail'       => implode(',', $default->thumbnail),
            'imageCompressor' => $default->imageCompressor,
            'imageDelete'     => $default->imageDelete,
            'watermark'       => $default->watermark,
        ];
        $entity->setKey('image');
        $entity->setValue($data);
        $model->insert($entity);
    }
}