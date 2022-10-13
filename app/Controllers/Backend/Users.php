<?php

namespace App\Controllers\Backend;

use \App\Controllers\BaseController;
use App\Entities\UserEntity;
use App\Models\GroupModel;
use App\Models\UserModel;

class Users extends BaseController
{
    protected $groupModel;
    protected $userModel;
    protected $userEntity;

    public function __construct()
    {
        $this->groupModel = new GroupModel();
        $this->userModel  = new UserModel();
        $this->userEntity = new UserEntity();
    }

    public function listing(string $status = null)
    {
        $getDateFilter = $this->request->getGet('dateFilter');
        $dateFilter = explode(' - ', $getDateFilter ?? '');
        $dateFilter = count($dateFilter) > 1 ? $dateFilter : null;

        $perPage = $this->request->getGet('perPage');
        $perPage = !empty($perPage) ? $perPage : 10;

        $search = $this->request->getGet('search');
        $search = !empty($search) ? $search : null;

        $group = $this->request->getGet('group');
        $group = !empty($group) ? $group : null;

        $data = [
            'perPage'    => $perPage,
            'dateFilter' => $getDateFilter,
            'search'     => $search,
            'groups'     => $this->groupModel->findAll()
        ];

        $getModel = $this->userModel->getListing($status, $search, $group, $dateFilter,$perPage);
        $data = array_merge($data,$getModel);

        return view('admin/pages/user/listing', $data);
    }

    public function create()
    {
        if ($this->request->getMethod() == 'post'){
            $this->userEntity->setFirstName($this->request->getPost('first_name'));
            $this->userEntity->setSurName($this->request->getPost('sur_name'));
            $this->userEntity->setEmail($this->request->getPost('email'));
            $this->userEntity->setPassword($this->request->getPost('password'));
            $this->userEntity->setGroupID($this->request->getPost('group_id'));
            $this->userEntity->setBio($this->request->getPost('bio'));
            $this->userEntity->setStatus($this->request->getPost('status'));
            $this->userEntity->setVerifyKey();
            $this->userEntity->setVerifyCode();

            $this->userModel->save($this->userEntity);

            if($this->userModel->errors()){

                return redirect()->back()->with('error', $this->userModel->errors());
            }

            return redirect()->back()->with('success', lang('Success.text.user_create'));
        }

        $data = ['groups' => $this->groupModel->findAll()];

        return view('admin/pages/user/create', $data);
    }

    public function edit(int $id)
    {
        if ($this->request->getMethod() == 'post'){
            $this->userEntity->setId($id);
            $this->userEntity->setFirstName($this->request->getPost('first_name'));
            $this->userEntity->setSurName($this->request->getPost('sur_name'));
            $this->userEntity->setEmail($this->request->getPost('email'));
            if (!empty($this->request->getPost('password'))){
                $this->userEntity->setPassword($this->request->getPost('password'));
            }
            $this->userEntity->setGroupID($this->request->getPost('group_id'));
            $this->userEntity->setBio($this->request->getPost('bio'));
            $this->userEntity->setStatus($this->request->getPost('status'));

            $this->userModel->update($id,$this->userEntity);

            if ($this->userModel->errors()){
                return redirect()->back()->with('error', $this->userModel->errors());
            }
            return redirect()->back()->with('success', lang('Success.text.user_update'));
        }

        $data = [
            'groups' => $this->groupModel->findAll(),
            'user'   => $this->userModel->find($id)
        ];

        return view('admin/pages/user/edit', $data);
    }

    public function status()
    {
        if($this->request->isAJAX()){
            $data = $this->request->getPost('id');
            $status = $this->request->getPost('status');

            $update = $this->userModel->update($data, ['status' => $status]);
            if(!$update){
                return $this->response->setJSON([
                    'status' => false,
                    'message' => lang('Errors.text.user_status_change_error')
                ]);
            }

            return $this->response->setJSON([
                'status' => true,
                'message' => lang('Success.text.user_status_change'),
            ]);
        }

        return $this->response->setJSON([
            'status' => false,
            'message' => lang('Errors.text.user_status_change_error')
        ]);

    }

    public function delete()
    {
        if($this->request->isAJAX()){
            $data = $this->request->getPost('id');
            $data = !is_array($data) ? [$data] : $data;

            $adminGroup = $this->groupModel->where('slug', DEFAULT_ADMIN_GROUP)->first();
            $user = $this->userModel->whereIn('id', $data)->where('group_id', $adminGroup->id)->first();

            if($user){
                return $this->response->setJSON([
                    'status' => false,
                    'message' => lang('Errors.text.delete_admin_user_error')
                ]);
            }

            $delete = $this->userModel->delete($data);
            if (!$delete){
                return $this->response->setJSON([
                    'status'  => false,
                    'message' => lang('Errors.text.delete_error')
                ]);
            }
            return $this->response->setJSON([
                'status'  => true,
                'message' => lang('Success.text.delete')
            ]);
        }

        return $this->response->setJSON([
            'status'  => false,
            'message' => lang('Errors.text.delete_error')
        ]);
    }

    public function undoDelete()
    {
        if($this->request->isAJAX()){
            $data = $this->request->getPost('id');

            $update = $this->userModel->update($data,['deleted_at' => null]);
            if (!$update){
                return $this->response->setJSON([
                    'status'  => false,
                    'message' => lang('Errors.text.undo_delete_error')
                ]);
            }
            return $this->response->setJSON([
                'status'  => true,
                'message' => lang('Success.text.undo_delete')
            ]);
        }
        return $this->response->setJSON([
            'status'  => false,
            'message' => lang('Errors.text.undo_delete_error')
        ]);
    }

    public function purgeDelete()
    {
        if ($this->request->isAJAX()){
            $data = $this->request->getPost('id');

            $purgeDelete = $this->userModel->delete($data, true);
            if (!$purgeDelete){
                return $this->response->setJSON([
                    'status'  => false,
                    'message' => lang('Errors.text.purge_delete_error')
                ]);
            }

            return $this->response->setJSON([
                'status'  => true,
                'message' => lang('Success.text.purge_delete')
            ]);
        }

        return $this->response->setJSON([
            'status'  => false,
            'message' => lang('Errors.text.purge_delete_error')
        ]);
    }
}