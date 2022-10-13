<?php


namespace App\Libraries;


class EmailTo
{
    protected $email;
    protected $user;

    public function __construct()
    {
        $this->email = \Config\Services::email();
    }

    public function setUser($user)
    {
        $this->user = $user;
        $this->email->setTo($this->user->getEmail());
        return $this;
    }

    public function accountVerify()
    {
        $this->email->setSubject('Hesabınızı Doğrulayın');
        $this->email->setMessage(view('admin/email/account-verify', ['user' => $this->user]));
        return $this;
    }

    public function accountVerifySuccess()
    {
        $this->email->setSubject('Hesabınız Doğrulandı');
        $this->email->setMessage(view('admin/email/account-verify-success', ['user' => $this->user]));
        return $this;
    }

    public function forgotPassword()
    {
        $this->email->setSubject('Şifre Sıfırlama Talebi');
        $this->email->setMessage(view('admin/email/forgot-password', ['user' => $this->user]));
        return $this;
    }

    public function passwordChangeSuccess()
    {
        $this->email->setSubject('Şifre Sıfırlama Talebi');
        $this->email->setMessage(view('admin/email/password-change-success', ['user' => $this->user]));
        return $this;
    }

    public function send()
    {
        return $this->email->send();
    }


}