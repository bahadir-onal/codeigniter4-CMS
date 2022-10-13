<?php

namespace App\Models;

use App\Entities\ContentEntity;
use \CodeIgniter\Model;

class ContentModel extends Model
{
    protected $table      = 'contents';
    protected $primaryKey = 'id';

    protected $returnType = ContentEntity::class;
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'module',
        'user_id',
        'slug',
        'title',
        'description',
        'content',
        'keywords',
        'thumbnail',
        'gallery',
        'views',
        'comment',
        'field',
        'page_type',
        'similar',
        'status',
        'deleted_at'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [
        'module'      => 'required|alpha_numeric',
        'user_id'     => 'required|numeric',
        'slug'        => 'required|alpha_numeric_punct|is_unique[contents.slug,id,{id}]',
        'title'       => 'required|string',
        'description' => 'permit_empty|string',
        'content'     => 'permit_empty|string',
        'keywords'    => 'permit_empty|string',
        'thumbnail'   => 'permit_empty|numeric',
        'gallery'     => 'permit_empty|string',
        'comment'     => 'required|string',
        'field'       => 'permit_empty|string',
        'page_type'   => 'permit_empty|string',
        'similar'     => 'permit_empty|string',
        'status'      => 'required|string',
    ];

    public function getListing(?string $module = null, ?string $status = null, ?string $user = null, ?int $category = null, ?string $search = null, ?array $dateFilter = null, ?int $perPage = 20)
    {
        $builder = $this->setTable($this->table);
        $builder = $builder->select('contents.*');

        $module = !is_null($module) ? config('system')->blog : $module;
        $builder = $builder->where('module', $module);

        $builder = $status == 'deleted' ? $builder->onlyDeleted() : $builder;
        $builder = $status == strtolower(STATUS_ACTIVE)  ? $builder->where('contents.status',STATUS_ACTIVE)  : $builder;
        $builder = $status == strtolower(STATUS_PASSIVE) ? $builder->where('contents.status',STATUS_PASSIVE) : $builder;
        $builder = $status == strtolower(STATUS_PENDING) ? $builder->where('contents.status',STATUS_PENDING) : $builder;

        $builder = !is_null($user) ? $builder->where('user_id',$user) : $builder;

        if (!is_null($category)){
            $builder = $builder->where('category_id', $category)->join('content_categories', 'content_categories.content_id = contents.id');
        }

        if (!is_null($search)){
            $builder = $builder->groupStart();
            $builder = $builder->like('contents.title', $search);
            $builder = $builder->orLike('contents.description', $search);
            $builder = $builder->orLike('contents.keywords', $search);
            $builder = $builder->groupEnd();
        }

        if (!is_null($dateFilter)) {
            $builder = $builder->where('contents.created_at >', $dateFilter[0]);
            $builder = $builder->where('contents.created_at <', $dateFilter[1]);
        }
        $builder = $builder->orderBy('contents.created_at', 'DESC');

        return [
            'blogs' => $builder->paginate($perPage),
            'pager' => $builder->pager
        ];
    }

    public function category($type = null, $content_id = null, $categories = null)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('content_categories');

        if ($type == 'update' || $type == 'delete'){
            $builder->where('content_id', $content_id)->delete();
        }

        if ($type == 'insert' || $type == 'update'){
            foreach ($categories as $category) {
                $builder->insert([
                    'content_id'  => $content_id,
                    'category_id' => $category
                ]);
            }
        }
        if ($type == 'get'){
            return $builder->where('content_id', $content_id)->get()->getResult();
        }
    }
}