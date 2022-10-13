<?php
 namespace App\Controllers\Backend;

 use App\Controllers\BaseController;

 class Permissions extends BaseController
 {
     public function error()
     {
         if ($this->request->isAJAX()){
             return $this->response->setJSON([
                 'status'  => false,
                 'message' => bo_admin_translate('Errors', 'not_permit')
             ]);
         }

         return view('admin/pages/verify/permissions-error');
     }
 }