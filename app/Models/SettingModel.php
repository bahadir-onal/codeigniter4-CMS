<?php

namespace App\Models;

use App\Entities\SettingEntity;
use \CodeIgniter\Model;

class SettingModel extends Model
{
    protected $table = 'settings';
    protected $primaryKey = 'id';
    protected $returnType = SettingEntity::class;
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'skey',
        'svalue'
    ];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    protected $validationRules = [
        'skey'   => 'required',
        'svalue' => 'required'
    ];
}