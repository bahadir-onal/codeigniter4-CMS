<?php

namespace App\Database\Seeds\Settings;

use App\Entities\SettingEntity;
use App\Models\SettingModel;
use \CodeIgniter\Database\Seeder;

class CacheSeeder extends Seeder
{
    public function run()
    {
        $entity = new SettingEntity();
        $model  = new SettingModel();

        $default = config('cache');
        $data = [
            'html'      => $default->html,
            'raw'       => $default->raw,
            'html_time' => $default->html_time,
            'raw_time'  => $default->raw_time,
            'handler'   => $default->handler,
            'prefix'    => $default->prefix,
            'memcached' => $default->memcached,
            'redis'     => $default->redis,
        ];
        $entity->setKey('cache');
        $entity->setValue($data);
        $model->insert($entity);
    }
}