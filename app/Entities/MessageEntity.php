<?php

namespace App\Entities;

use App\Models\MessageModel;
use \CodeIgniter\Entity;
use CodeIgniter\I18n\Time;
use phpDocumentor\Reflection\Types\This;

class MessageEntity extends Entity
{
    protected $message_id;
    protected $name;
    protected $email;
    protected $phone;
    protected $web;
    protected $subject;
    protected $message;
    protected $status;

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function setMessageId(int $message_id): void
    {
        $this->attributes['message_id'] = $message_id;
    }
    public function setName(string $name): void
    {
        $this->attributes['name'] = $name;
    }
    public function setEmail(string $email): void
    {
        $this->attributes['email'] = $email;
    }
    public function setPhone(?string $phone = null): void
    {
        $this->attributes['phone'] = $phone;
    }
    public function setWeb(?string $web = null): void
    {
        $this->attributes['web'] = $web;
    }
    public function setSubject(string $subject): void
    {
        $this->attributes['subject'] = $subject;
    }
    public function setMessage(string $message): void
    {
        $this->attributes['message'] = $message;
    }
    public function setStatus(string $status = STATUS_UNREAD): void
    {
        $this->attributes['status'] = $status;
    }

    public function getMessageId()
    {
        return $this->attributes['message_id'];
    }
    public function getName()
    {
        return $this->attributes['name'];
    }
    public function getEmail()
    {
        return $this->attributes['email'];
    }
    public function getPhone()
    {
        return $this->attributes['phone'];
    }
    public function getWeb()
    {
        return $this->attributes['web'];
    }
    public function getSubject()
    {
        return $this->attributes['subject'];
    }
    public function getMessage()
    {
        return $this->attributes['message'];
    }
    public function getStatus()
    {
        return $this->attributes['status'];
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
    public function getDeletedAt($humanize = false): ?string
    {
        if($humanize){
            $date = Time::parse($this->attributes['deleted_at']);
            return $date->humanize();
        }

        return $this->attributes['deleted_at'];
    }
    public function getReply()
    {
        $model = new MessageModel();
        $reply = $model->where('message_id', $this->attributes['id'])->findAll();
        if ($reply){
            return $reply;
        }
        return false;
    }
}