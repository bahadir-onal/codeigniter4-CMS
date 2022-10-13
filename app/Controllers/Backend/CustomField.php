<?php

namespace App\Controllers\Backend;

use \App\Controllers\BaseController;

class CustomField extends BaseController
{
    public function add()
    {
        $type = $this->request->getGet('type');
        return $this->response->setJSON([
            'status' => true,
            'message' => 'Özel alan başarılı bir şekilde eklendi.',
            'view' => view('admin/pages/field/' . $type, [
                'random' =>  random_string('alpha', 4)
            ])
        ]);
    }
}