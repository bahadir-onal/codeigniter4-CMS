<?php

namespace App\Models;

use App\Entities\CategoryEntity;
use \CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'id';

    protected $returnType = CategoryEntity::class;
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'module',
        'user_id',
        'parent_id',
        'slug',
        'title',
        'description',
        'keywords',
        'image',
        'status',
        'deleted_at',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules = [
        'module'      => 'required|alpha_numeric',
        'user_id'     => 'required|numeric',
        'parent_id'   => 'permit_empty|numeric',
        'slug'        => 'required|alpha_numeric_punct|is_unique[categories.slug,id,{id}]',
        'title'       => 'required',
        'image'       => 'permit_empty|numeric',
        'status'      => 'permit_empty|alpha'
    ];

    public function getListing(string $status = null, string $user = null, string $module = null, string $search = null, array $dateFilter = null, int $perPage = 20)
    {
        $builder = $this->setTable($this->table);
        $builder = $builder->select('categories.*, users.first_name, users.sur_name');

        $builder = $status == 'deleted' ? $builder->onlyDeleted() : $builder;
        $builder = $status == strtolower(STATUS_ACTIVE)  ? $builder->where('categories.status',STATUS_ACTIVE)  : $builder;
        $builder = $status == strtolower(STATUS_PASSIVE) ? $builder->where('categories.status',STATUS_PASSIVE) : $builder;

        $builder = !is_null($user) ? $builder->where('categories.user_id',$user) : $builder;
        $builder = !is_null($module) ? $builder->where('categories.module',$module) : $builder;

        if (!is_null($search)){
            $builder = $builder->groupStart();
            $builder = $builder->like('categories.title', $search);
            $builder = $builder->orLike('categories.description', $search);
            $builder = $builder->orLike('categories.keywords', $search);
            $builder = $builder->groupEnd();
        }

        if (!is_null($dateFilter)) {
            $builder = $builder->where('categories.created_at >', $dateFilter[0]);
            $builder = $builder->where('categories.created_at <', $dateFilter[1]);
        }

        $builder = $builder->join('users', 'users.id = categories.user_id');
        $builder = $builder->orderBy('categories.created_at', 'ASC');

        return [
            'categories' => $builder->paginate($perPage),
            'pager'      => $builder->pager
        ];
    }
}