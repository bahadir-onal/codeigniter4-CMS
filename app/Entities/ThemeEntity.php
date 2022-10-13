<?php

namespace App\Entities;

use CodeIgniter\Entity;
use CodeIgniter\I18n\Time;

class ThemeEntity extends Entity
{
    protected $id;
    protected $folder;
    protected $name;
    protected $author;
    protected $web;
    protected $email;
    protected $status;
    protected $settings;

    public function setId(int $id): void
    {
        $this->attributes['id'] = $id;
    }
    public function setFolder(string $folder): void
    {
        $this->attributes['folder'] =$folder;
    }
    public function setName(string $name): void
    {
        $this->attributes['name'] = $name;
    }
    public function setAuthor(?string $author = null): void
    {
        $this->attributes['author'] = $author;
    }
    public function setWeb(?string $web = null): void
    {
        $this->attributes['web'] = $web;
    }
    public function setEmail(?string $email = null): void
    {
        $this->attributes['email'] = $email;
    }
    public function setStatus(?string $status = STATUS_ACTIVE): void
    {
        $this->attributes['status'] = $status;
    }
    public function setSetting(?array $setting = null): void
    {
        if (is_null($setting)){
            $this->attributes['settings'] = $setting;
        } else{
            $this->attributes['settings'] = json_encode($setting, JSON_UNESCAPED_UNICODE);
        }
    }

    public function getFolder(): string
    {
        return $this->attributes['folder'];
    }
    public function getName(): string
    {
        return $this->attributes['name'];
    }
    public function getAuthor(): ?string
    {
        return $this->attributes['author'];
    }
    public function getWeb(): ?string
    {
        return $this->attributes['web'];
    }
    public function getEmail(): ?string
    {
        return $this->attributes['email'];
    }
    public function getStatus(): ?string
    {
        return $this->attributes['status'];
    }
    public function getSetting(string $key = null, $is_array = false)
    {
        if (is_null($this->attributes['settings'])){
            return null;
        }

        $settings = json_decode($this->attributes['settings']);
        if (is_null($key)){
            if (is_null($settings)){
                return [];
            }

            if ($is_array){
                return json_decode($this->attributes['settings'], true);
            }
            return $settings;

        }
        if (isset($settings->$key)){
            return $settings->$key;
        }
        return null;
    }
    public function getCreatedAt($humanize = false): ?string
    {
        if($humanize){
            $date = Time::parse($this->attributes['created_at']);
            return $date->humanize();
        }

        return $this->attributes['created_at'];
    }
    public function getUpdatedAt($humanize = false): ?string
    {
        if($humanize){
            $date = Time::parse($this->attributes['updated_at']);
            return $date->humanize();
        }

        return $this->attributes['updated_at'];
    }

}








