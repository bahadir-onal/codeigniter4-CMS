<?php

namespace App\Entities;

use App\Models\CategoryModel;
use App\Models\ImageModel;
use App\Models\UserModel;
use \CodeIgniter\Entity;
use CodeIgniter\I18n\Time;

class CategoryEntity extends Entity
{
    protected $id;
    protected $module;
    protected $user_id;
    protected $parent_id;
    protected $slug;
    protected $title;
    protected $description;
    protected $keywords;
    protected $image;
    protected $status;

    public function setId(int $id): void
    {
        $this->attributes['id'] = $id;
    }
    public function setModule(string $module): void
    {
        $this->attributes['module'] = $module;
    }
    public function setUserId(int $userId = null): void
    {
        if (is_null($userId)){
            $this->attributes['user_id'] = session('userData.id');
        } else {
            $this->attributes['user_id'] = $userId;
        }
    }
    public function setParentId(string $parentId = '0'): void
    {
        $this->attributes['parent_id'] = $parentId;
    }
    public function setSlug(array $title = null): void
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

        $this->attributes['title'] = json_encode($title, JSON_UNESCAPED_UNICODE);

    }
    public function setDescription(array $description): void
    {

        $this->attributes['description'] = json_encode($description, JSON_UNESCAPED_UNICODE);

    }
    public function setKeywords(array $keywords): void
    {
        $this->attributes['keywords'] = json_encode($keywords, JSON_UNESCAPED_UNICODE);
    }
    public function setImage($imageId = null): void
    {
        $this->attributes['image'] = $imageId;
    }
    public function setStatus(string $status = STATUS_ACTIVE): void
    {
        $this->attributes['status'] = $status;
    }

    public function getModule() : string
    {
        return $this->attributes['module'];
    }
    public function getUserId() : int
    {
        return $this->attributes['user_id'];
    }
    public function getParentId() : int
    {
        return $this->attributes['parent_id'];
    }
    public function getSlug() : string
    {
        return $this->attributes['slug'];
    }
    public function getTitle(string $lang = null) : string
    {
        $locale = !is_null($lang) ? $lang : service('request')->getLocale();
        $title = json_decode($this->attributes['title']);
        if (!isset($title->$locale)){
            $locale = config('app')->defaultLocale;
        }
        return $title->$locale;
    }
    public function getDescription(string $lang = null) : string
    {
        $locale = !is_null($lang) ? $lang : service('request')->getLocale();
        $description = json_decode($this->attributes['description']);
        if (!isset($description->$locale)){
            $locale = config('app')->defaultLocale;
        }
        return $description->$locale;
    }
    public function getKeywords(string $lang = null, bool $is_array = false)
    {
        $locale = !is_null($lang) ? $lang : service('request')->getLocale();
        $keywords = json_decode($this->attributes['keywords']);
        if (!isset($keywords->$locale)){
            $locale = config('app')->defaultLocale;
        }

        if ($is_array) {
            return explode(',', $keywords->$locale);
        }
        return $keywords->$locale;
    }
    public function getImage() : int
    {
        return $this->attributes['image'];
    }
    public function getStatus() : string
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
    public function withParent(): ?object
    {
        $model = new CategoryModel();
        if ($this->attributes['parent_id'] != 0){
            return $model->find($this->attributes['parent_id']);
        }
        return null;
    }
    public function withImage(): ?object
    {
        $model = new ImageModel();
        if ($this->attributes['image']){
            return $model->find($this->attributes['image']);
        }
        return null;
    }
    public function withUser(): ?object
    {
        $model = new UserModel();
        return $model->find($this->attributes['user_id']);
    }
}