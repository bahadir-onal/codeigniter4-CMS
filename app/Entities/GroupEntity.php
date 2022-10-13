<?php

namespace App\Entities;

use \CodeIgniter\Entity;
use CodeIgniter\I18n\Time;

class GroupEntity extends Entity
{
    protected $id;
    protected $slug;
    protected $title;
    protected $permissions;

    public function setId(int $id): void
    {
        $this->attributes['id'] = $id;
    }
    public function setSlug($title = null): void
    {
        $defaultLang = config('app')->defaultLocale;
        if (!is_null($title)){
            if(is_array($title)){
                $slug = slugify($title[$defaultLang]);
            }else{
                $slug = slugify($title);
            }
        } else {
             $slug = slugify(json_decode($this->attributes['title'])->$defaultLang);
        }
        $this->attributes['slug'] = $slug;
    }
    public function setTitle(array $title): void
    {
        $this->attributes['title'] = json_encode($title);
    }
    public function setPermit($permissions = null): void
    {
        $this->attributes['permissions'] = json_encode($permissions, JSON_UNESCAPED_UNICODE);
    }

    public function getSlug(): string
    {
        return $this->attributes['slug'];
    }
    public function getTitle(string $lang = null): string
    {
        $locale = !is_null($lang) ? $lang : service('request')->getLocale();
        $title = json_decode($this->attributes['title']);
        if (!isset($title->$locale)){
            $locale = config('app')->defaultLocale;
        }
        return $title->$locale;

//        $lang = 'tr'
//        $locale = $lang;
//        $title  = json_decode($this->attributes['title']);
//        return $title->$locale;
    }
    public function getTitleLang(string $lang)
    {
        $title  = json_decode($this->attributes['title']);
        return $title->$lang;
    }
    public function getPermit()
    {
        return json_decode($this->attributes['permissions']);
    }
    public function haveLoginPermit(): bool
    {
        if ($this->attributes['slug'] == DEFAULT_ADMIN_GROUP){
            return true;
        }

        $permit = json_decode($this->attributes['permissions']);
        if (in_array(LOGIN_PERMIT_KEY, $permit)){
            return true;
        }
        return false;
    }
    public function permitControl(string $permit): bool
    {
        if ($this->attributes['slug'] == DEFAULT_ADMIN_GROUP){
            return true;
        }

        $userPermissionList = json_decode($this->attributes['permissions']);
        if (in_array($permit,$userPermissionList)){
            return true;
        }

        return false;
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