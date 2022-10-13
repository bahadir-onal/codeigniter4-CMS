<?php

namespace App\Entities;

use App\Models\GroupModel;
use \CodeIgniter\Entity;
use CodeIgniter\I18n\Time;

class UserEntity extends Entity
{
    protected $group_id;
    protected $first_name;
    protected $sur_name;
    protected $email;
    protected $password;
    protected $verify_key;
    protected $verify_code;
    protected $bio;
    protected $status;

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function setId(int $id):void{
        $this->attributes['id'] = $id;
    }
    public function setGroupID(int $group_id):void{
        $this->attributes['group_id'] = $group_id;
    }
    public function setFirstName(string $first_name):void
    {
        $this->attributes['first_name'] = $first_name;
    }
    public function setSurName(string $sur_name):void
    {
        $this->attributes['sur_name'] = $sur_name;
    }
    public function setEmail(string $email):void
    {
        $this->attributes['email'] = $email;
    }
    public function setVerifyKey():void
    {
        helper('text');
        $this->attributes['verify_key'] = random_string('alpha', 64);
    }
    public function setVerifyCode():void
    {
        $this->attributes['verify_code'] = random_int(100000, 999999);
    }
    public function setBio(string $bio):void
    {
        $this->attributes['bio'] = $bio;
    }
    public function setStatus($status = STATUS_PENDING):void{
        $this->attributes['status'] = $status;
    }
    public function setDeletedAt():void
    {
        $this->attributes['deleted_at'] =  date('Y-m-d H:i:s');
    }
    public function setPassword(string $password):void
    {
        $this->attributes['password'] = password_hash($password, PASSWORD_DEFAULT);
    }

    public function getGroupID(): int
    {
        return $this->attributes['group_id'];
    }
    public function getFirstName(): string
    {
        return $this->attributes['first_name'];
    }
    public function getSurName(): string
    {
        return $this->attributes['sur_name'];
    }
    public function getFullName(): string
    {
        return $this->attributes['first_name'] . ' ' . $this->attributes['sur_name'];
    }
    public function getEmail(): string
    {
        return $this->attributes['email'];
    }
    public function getVerifyKey(): string
    {
        return $this->attributes['verify_key'];
    }
    public function getVerifyCode(): int
    {
        return $this->attributes['verify_code'];
    }
    public function getBio(): string
    {
        return $this->attributes['bio'];
    }
    public function getStatus(): string
    {
        return $this->attributes['status'];
    }
    public function getCreatedAt($humanize = false)
    {
        if($humanize){
            $date = Time::parse($this->attributes['created_at']);
            return $date->humanize();
        }

        return $this->attributes['created_at'];
    }
    public function getUpdatedAt($humanize = false)
    {
        if($humanize){
            $date = Time::parse($this->attributes['updated_at']);
            return $date->humanize();
        }

        return $this->attributes['updated_at'];
    }
    public function getDeletedAt($humanize = false)
    {
        if($humanize){
            $date = Time::parse($this->attributes['deleted_at']);
            return $date->humanize();
        }

        return $this->attributes['deleted_at'];
    }
    public function getVerifyToken(): string
    {
        return base64_encode($this->attributes['id'] . '.' . $this->attributes['verify_key']);
    }
    public function getPasswordVerify(string $password): bool
    {
        if (password_verify($password, $this->attributes['password'])){
            return true;
        }

        return false;
    }
    public function getGroupTitle(string $lang = null)
    {
        $locale = !is_null($lang) ? $lang : service('request')->getLocale();
        $title = json_decode($this->attributes['title']);
        if (!isset($title->$locale)){
            $locale = config('app')->defaultLocale;
        }
        return $title->$locale;
    }
    public function withGroup(): object
    {
        $model = new GroupModel();
        return $model->find($this->attributes['group_id']);
    }

}