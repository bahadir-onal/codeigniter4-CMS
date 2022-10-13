<?php


namespace App\Models;

use App\Entities\UserEntity;
use \CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $returnType = UserEntity::class;
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'group_id',
        'first_name',
        'sur_name',
        'email',
        'password',
        'verify_key',
        'verify_code',
        'bio',
        'status',
        'deleted_at'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules = [
        'group_id'    => 'required|numeric',
        'first_name'  => 'required|string|min_length[3]',
        'sur_name'    => 'required|string|min_length[3]',
        'email'       => 'required|valid_email|is_unique[users.email,id,{id}]',
        'password'    => 'required',
        'verify_key'  => 'required|alpha',
        'verify_code' => 'numeric|min_length[6]',
        'status'      => 'required'
    ];

    public function getListing(string $status = null, string $search = null, int $group = null, array $dateFilter = null, int $perPage = 20)
    {
        $builder = $this->setTable($this->table);
        $builder = $builder->select('users.*, groups.title');

        $builder = $status == 'deleted' ? $builder->onlyDeleted() : $builder;
        $builder = $status == strtolower(STATUS_ACTIVE)  ? $builder->where('users.status',STATUS_ACTIVE)  : $builder;
        $builder = $status == strtolower(STATUS_PENDING) ? $builder->where('users.status',STATUS_PENDING) : $builder;
        $builder = $status == strtolower(STATUS_PASSIVE) ? $builder->where('users.status',STATUS_PASSIVE) : $builder;

        $builder = !is_null($group) ? $builder->where('users.group_id',$group) : $builder;

        if (!is_null($search)){
            $builder = $builder->groupStart();
            $builder = $builder->like('users.first_name', $search);
            $builder = $builder->orLike('users.sur_name', $search);
            $builder = $builder->orLike('users.email', $search);
            $builder = $builder->groupEnd();
        }

        if (!is_null($dateFilter)) {
            $builder = $builder->where('users.created_at >', $dateFilter[0]);
            $builder = $builder->where('users.created_at <', $dateFilter[1]);
        }

        $builder = $builder->join('groups', 'groups.id = users.group_id');

        $builder = $builder->orderBy('users.id','ASC');

        return [
            'users' => $builder->paginate($perPage),
            'pager' => $builder->pager
        ];
    }
}