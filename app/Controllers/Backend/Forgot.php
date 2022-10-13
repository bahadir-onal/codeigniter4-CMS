<?php


namespace App\Controllers\Backend;

use \App\Controllers\BaseController;
use App\Entities\UserEntity;
use App\Libraries\EmailTo;
use App\Models\UserModel;

class Forgot extends BaseController
{
    protected $userModel;
    protected $userEntity;
    protected $emailTo;

    public function __construct()
    {
        $this->userModel  = new UserModel();
        $this->userEntity = new UserEntity();
        $this->emailTo    = new EmailTo();
    }

    public function index()
    {
        if($this->request->getMethod() == 'post'){

            $data = [
              'email' => $this->request->getPost('email')
            ];

            if(!$this->validation->run($data, 'forgot')){
                return redirect()->back()->with('error', $this->validation->getErrors());
            }

            $user = $this->userModel->where('email',$data['email'])->first();
            if (!$user){
                return redirect()->back()->with('error', lang('Errors.text.user_not_found'));
            }

            $send = $this->emailTo->setUser($user)->forgotPassword()->send();
            if(!$send){
                return redirect()->back()->with('error', lang('Errors.text.email_send_faild'));
            }

            return view('admin/pages/verify/forgot-success');

        }

        return view('admin/pages/auth/forgot-password');
    }

    public function resetPassword()
    {
        $userID = $this->session->getTempdata('userID');
        if($userID){
            if($this->request->getMethod() == 'post'){
                $data = [
                    'password' => $this->request->getPost('password'),
                    'password2' => $this->request->getPost('password2')
                ];

                if(!$this->validation->run($data, 'resetPassword')){
                    return redirect()->back()->with('error', $this->validation->getErrors());
                }

                $this->userEntity->setVerifyKey();
                $this->userEntity->setPassword($data['password']);

                $update = $this->userModel->update($userID, $this->userEntity);
                if(!$update){
                    return redirect()->back()->with('error', lang('Errors.text.password_update_faild'));
                }

                $this->session->destroy();
                return view('admin/pages/verify/reset-password-success');
            }

            return view('admin/pages/auth/reset-password');
        }

        return view('admin/pages/verify/reset-password-error');
    }
}