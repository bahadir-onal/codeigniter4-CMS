<?php

namespace App\Database\Seeds\Settings;

use App\Entities\SettingEntity;
use App\Models\SettingModel;
use \CodeIgniter\Database\Seeder;

class FirebaseSeeder extends Seeder
{
    public function run()
    {
        $entity = new SettingEntity();
        $model  = new SettingModel();

        $default = config('firebase');
        $data = [
            'status'            => $default->status,
            'serverKey'         => $default->serverKey,
            'apiKey'            => $default->apiKey,
            'authDomain'        => $default->authDomain,
            'databaseURL'       => $default->databaseURL,
            'projectId'         => $default->projectId,
            'storageBucket'     => $default->storageBucket,
            'messagingSenderId' => $default->messagingSenderId,
            'appId'             => $default->appId,
            'measurementId'     => $default->measurementId,
        ];
        $entity->setKey('firebase');
        $entity->setValue($data);
        $model->insert($entity);
    }
}

