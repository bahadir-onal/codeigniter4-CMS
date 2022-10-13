<?php

namespace App\Models;

use App\Entities\ThemeEntity;
use CodeIgniter\Model;

class ThemeModel extends Model
{
    protected $table = 'themes';
    protected $primaryKey = 'id';

    protected $returnType = ThemeEntity::class;
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'folder',
        'name',
        'author',
        'web',
        'email',
        'status',
        'settings'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules = [
        'folder'   => 'required|string|is_unique[themes.folder,id,{id}]',
        'name'     => 'required|string',
        'author'   => 'permit_empty|string',
        'web'      => 'permit_empty|valid_url',
        'email'    => 'permit_empty|valid_email',
        'status'   => 'required',
        'settings' => 'permit_empty'
    ];
}