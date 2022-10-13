<?php

namespace App\Models;

use App\Entities\ImageEntity;
use \CodeIgniter\Model;

class ImageModel extends Model
{
    protected $table = 'images';
    protected $primaryKey = 'id';

    protected $returnType = ImageEntity::class;
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'name',
        'slug',
        'url',
        'type',
        'size'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules = [
        'name' => 'required',
        'url'  => 'required',
        'slug' => 'required',
        'type' => 'required',
        'size' => 'required'
    ];

    public function getListing(string $search = null, array $dateFilter = null, int $perPage = 20)
    {
        $builder = $this->setTable($this->table);
        $builder = $builder->select('*');

        if (!is_null($search)){
            $builder = $builder->like('name', $search);
        }

        if (!is_null($dateFilter)) {
            $builder = $builder->where('created_at >', $dateFilter[0]);
            $builder = $builder->where('created_at <', $dateFilter[1]);
        }

        $builder = $builder->orderBy('id','ASC');
        return [
            'images' => $builder->paginate($perPage),
            'pager'  => $builder->pager
        ];
    }
 }