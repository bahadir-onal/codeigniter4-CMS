<?php

namespace App\Database\Seeds\Settings;

use App\Entities\SettingEntity;
use App\Models\SettingModel;
use \CodeIgniter\Database\Seeder;

class MailSeeder extends Seeder
{
    public function run()
    {
        $entity = new SettingEntity();
        $model  = new SettingModel();

        $default = config('email');
        $data = [
            'protocol'   => $default->protocol,
            'fromEmail'  => $default->fromEmail,
            'fromName'   => $default->fromName,
            'SMTPHost'   => $default->SMTPHost,
            'SMTPUser'   => $default->SMTPUser,
            'SMTPPass'   => $default->SMTPPass,
            'SMTPPort'   => $default->SMTPPort,
            'SMTPCrypto' => $default->SMTPCrypto,
            'mailType'   => $default->mailType
        ];
        $entity->setKey('email');
        $entity->setValue($data);
        $model->insert($entity);
    }
}