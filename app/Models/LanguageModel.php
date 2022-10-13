<?php

namespace App\Models;

use App\Entities\LanguageEntity;
use \CodeIgniter\Model;

class LanguageModel extends Model
{
    protected $table = 'languages';
    protected $primaryKey = 'id';

    protected $returnType = LanguageEntity::class;
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'code',
        'flag',
        'title',
        'status',
        'deleted_at'
    ];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    protected $validationRules = [
        'code'  => 'required|min_length[2]|is_unique[languages.code,id,{id}]',
        'flag'  => 'required|min_length[2]',
        'title' => 'required'
    ];

    public function getListing(string $status = null, string $search = null, array $dateFilter = null, int $perPage = 20)
    {
        $builder = $this->setTable($this->table);
        $builder = $builder->select('languages.*');

        $builder = $status == 'deleted' ? $builder->onlyDeleted() : $builder;
        $builder = $status == strtolower(STATUS_ACTIVE)  ? $builder->where('status',STATUS_ACTIVE)  : $builder;
        $builder = $status == strtolower(STATUS_PASSIVE) ? $builder->where('status',STATUS_PASSIVE) : $builder;

        if (!is_null($search)){
            $builder = $builder->like('title', $search);
        }

        if (!is_null($dateFilter)) {
            $builder = $builder->where('created_at >', $dateFilter[0]);
            $builder = $builder->where('created_at <', $dateFilter[1]);
        }

        $builder = $builder->orderBy('id','DESC');

        return [
            'languages' => $builder->paginate($perPage),
            'pager'     => $builder->pager
        ];
    }
}