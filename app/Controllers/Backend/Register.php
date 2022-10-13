<?php


namespace App\Controllers\Backend;

use \App\Controllers\BaseController;
use App\Entities\UserEntity;
use App\Libraries\EmailTo;
use App\Models\GroupModel;
use App\Models\UserModel;

class Register extends BaseController
{
    protected $userEntity;
    protected $userModel;
    protected $groupModel;
    protected $system;

    public function __construct()
    {
        $this->userEntity = new UserEntity();
        $this->userModel  = new UserModel();
        $this->groupModel = new GroupModel();
        $this->system = config('system');
    }

    public function index()
    {
        if($this->request->getMethod() == 'post'){
            if (!$this->system->register){
                return redirect()->back()->with('error', 'Kayıt sistemi şuan aktif değildir. Lütfen daha sonra tekrar deneyiniz.');
            }
            $data = [
                'first_name' => $this->request->getPost('first_name'),
                'sur_name'   => $this->request->getPost('sur_name'),
                'email'      => $this->request->getPost('email'),
                'password'   => $this->request->getPost('password'),
                'password2'  => $this->request->getPost('password2'),
            ];
            if(!$this->validation->run($data, 'register')){
                return redirect()->back()->with('error', $this->validation->getErrors());
            }

            $status = $this->system->emailVerify ? STATUS_PENDING : STATUS_ACTIVE;

            $this->userEntity->setGroupID($this->system->defaultGroup);
            $this->userEntity->setFirstName($data['first_name']);
            $this->userEntity->setSurName($data['sur_name']);
            $this->userEntity->setEmail($data['email']);
            $this->userEntity->setVerifyKey();
            $this->userEntity->setVerifyCode();
            $this->userEntity->setStatus($status);
            $this->userEntity->setPassword($data['password']);

            $insert = $this->userModel->insert($this->userEntity);

            if($this->userModel->errors()){
                return redirect()->back()->with('error', $this->userModel->errors());
            }

            $email = new EmailTo();
            $user = $this->userModel->find($insert);

            if ($this->system->emailVerify){
                $to = $email->setUser($user)->accountVerify()->send();
                if($to){
                    return redirect()->back()->with('success', lang('Success.text.register'));
                }
                return redirect()->back()->with('error', lang('Errors.text.email_send_faild'));
            }
            return redirect()->back()->with('success', lang('Success.text.register_success'));
        }
        return view('admin/pages/auth/register');
    }
}