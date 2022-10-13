<?php

namespace App\Entities;

use App\Models\ContentModel;
use \CodeIgniter\Entity;
use CodeIgniter\I18n\Time;

class CommentEntity extends Entity
{
    protected $id;
    protected $content_id;
    protected $comment_id;
    protected $name;
    protected $email;
    protected $comment;
    protected $status;

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function setId(int $id): void
    {
        $this->attributes['id'] = $id;
    }
    public function setContentId(int $content_id): void
    {
        $this->attributes['content_id'] = $content_id;
    }
    public function setCommentId(?int $comment_id = null): void
    {
        $this->attributes['comment_id'] = $comment_id;
    }
    public function setName(string $name): void
    {
        $this->attributes['name'] = $name;
    }
    public function setEmail(string $email): void
    {
        $this->attributes['email'] = $email;
    }
    public function setComment(string $comment): void
    {
        $this->attributes['comment'] = $comment;
    }
    public function setStatus(string $status = STATUS_PENDING): void
    {
        $this->attributes['status'] = $status;
    }

    public function getContentId(): int
    {
        return $this->attributes['content_id'];
    }
    public function getCommentId(): ?int
    {
        return $this->attributes['comment_id'];
    }
    public function getName(): string
    {
        return $this->attributes['name'];
    }
    public function getEmail()
    {
        return $this->attributes['email'];
    }
    public function getComment()
    {
        return $this->attributes['comment'];
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
    public function withContent()
    {
        $model = new ContentModel();
        return $model->find($this->attributes['content_id']);
    }
}