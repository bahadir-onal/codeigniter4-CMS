<?php

namespace App\Entities;

use \CodeIgniter\Entity;
use CodeIgniter\I18n\Time;

class ImageEntity extends Entity
{
    protected $id;
    protected $name;
    protected $url;
    protected $type;
    protected $size;

    protected $dates = ['created_at', 'updated_at'];

    public function setId(int $id)
    {
        $this->attributes['id'] = $id;
    }
    public function setName(string $name)
    {
        $this->attributes['name'] = $name;
    }
    public function setSlug(string $name)
    {
        $slug = explode('.', $name);
        $this->attributes['slug'] = $slug[0];
    }
    public function setUrl(string $param)
    {
        $this->attributes['url'] = UPLOAD_FOLDER_PATH . '/' . $param;
    }
    public function setType(string $type)
    {
        $this->attributes['type'] = $type;
    }
    public function setSize(int $size)
    {
        $this->attributes['size'] = $size;
    }


    public function getName()
    {
        return $this->attributes['name'];
    }
    public function getSlug()
    {
        return $this->attributes['slug'];
    }
    public function getUrl($size = null): string
    {
        if (!is_null($size)){
            $image = UPLOAD_FOLDER_PATH . $this->attributes['slug'] . '-' . $size . '.' . $this->attributes['type'];
            return base_url($image);
        }
        return base_url($this->attributes['url']);
    }
    public function getType()
    {
        return $this->attributes['type'];
    }
    public function getSize()
    {
        return $this->attributes['size'];
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
}