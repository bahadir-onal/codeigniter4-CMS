<?php

namespace App\Models;

use App\Entities\MessageEntity;
use \CodeIgniter\Model;

class MessageModel extends Model
{
    protected $table = "messages";
    protected $primaryKey = "id";

    protected $returnType = MessageEntity::class;
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'message_id',
        'name',
        'email',
        'phone',
        'web',
        'subject',
        'message',
        'status',
        'deleted_at'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules = [
        'message_id' => 'permit_empty|numeric',
        'name'       => 'required|string',
        'email'      => 'required|valid_email',
        'phone'      => 'permit_empty|string',
        'web'        => 'permit_empty|valid_url',
        'subject'    => 'required|string',
        'message'    => 'required|string|min_length[20]'
    ];
}