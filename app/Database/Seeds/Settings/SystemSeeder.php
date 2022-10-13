<?php

namespace App\Database\Seeds\Settings;

use App\Entities\SettingEntity;
use App\Models\GroupModel;
use App\Models\SettingModel;
use CodeIgniter\Database\Seeder;

class SystemSeeder extends Seeder
{
    public function run()
    {
        $entity     = new SettingEntity();
        $model      = new SettingModel();
        $groupModel = new GroupModel();

        $default = config('system');

        $group = $groupModel->where('slug', DEFAULT_REGISTER_USER)->first();

        $data = [
            'maintenance'  => $default->maintenance,
            'register'     => $default->register,
            'login'        => $default->login,
            'emailVerify'  => $default->emailVerify,
            'defaultGroup' => $group->id,
            'perPageList'  => implode(',', $default->perPageList),
            'modules'      => $default->modules
        ];
        $entity->setKey('system');
        $entity->setValue($data);
        $model->insert($entity);
    }
}