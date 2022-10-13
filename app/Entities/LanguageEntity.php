<?php

namespace App\Entities;

use \CodeIgniter\Entity;
use CodeIgniter\I18n\Time;

class LanguageEntity extends Entity
{
    protected $id;
    protected $code;
    protected $flag;
    protected $title;
    protected $status;

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function setId(int $id): void
    {
        $this->attributes['id'] = $id;
    }
    public function setCode(string $code) :void
    {
        $this->attributes['code'] = $code;
    }
    public function setFlag(?string $flag = null) :void
    {
        if (is_null($flag)){
            $this->attributes['flag'] = $this->attributes['code'];
        } else {
            $this->attributes['flag'] = $flag;
        }
    }
    public function setTitle(array $title) :void
    {
        $this->attributes['title'] = json_encode($title,JSON_UNESCAPED_UNICODE);
    }
    public function setStatus(string $status = STATUS_PASSIVE) :void
    {
        $this->attributes['status'] = $status;
    }
    public function setDeletedAt() :void
    {
        $this->attributes['deleted_at'] = date('Y.m.d H:i:s');
    }


    public function getCode(): string
    {
        return $this->attributes['code'];
    }
    public function getFlag(): string
    {
        return base_url('public/admin/flag/' . $this->attributes['flag'] . '.svg');
    }
    public function getTitle(string $lang = null): string
    {
        $locale = !is_null($lang) ? $lang : service('request')->getLocale();
        $title = json_decode($this->attributes['title']);
        if (!isset($title->$locale)){
            $locale = config('app')->defaultLocale;
        }
        return $title->$locale;
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


}