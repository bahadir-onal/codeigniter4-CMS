<?php

namespace App\Controllers\Backend;

use \App\Controllers\BaseController;
use App\Entities\CategoryEntity;
use App\Models\CategoryModel;
use App\Models\UserModel;

class Category extends BaseController
{
    protected $categoryModel;
    protected $categoryEntity;
    protected $userModel;
    protected $module;

    public function __construct()
    {
        $this->categoryEntity = new CategoryEntity();
        $this->categoryModel  = new CategoryModel();
        $this->userModel      = new UserModel();
        $this->module         = config('system');
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

        $user = $this->request->getGet('user');
        $user = !empty($user) ? $user : null;

        $module = $this->request->getGet('module');
        $module = !empty($module) ? $module : null;

        $data = [
            'perPage'    => $perPage,
            'dateFilter' => $getDateFilter,
            'search'     => $search,
            'user'       => $user,
            'module'     => $module,
            'groups'     => $this->categoryModel->findAll(),
            'users'      => $this->userModel->findAll()
        ];

        $getModel = $this->categoryModel->getListing($status, $user, $module, $search, $dateFilter, $perPage);
        $data = array_merge($data,$getModel);

        return view('admin/pages/category/listing', $data);
    }

    public function create()
    {
        if ($this->request->getMethod() == 'post'){
            $this->categoryEntity->setModule($this->request->getPost('module'));
            $this->categoryEntity->setUserId();
            $this->categoryEntity->setParentId($this->request->getPost('parent_id'));
            $this->categoryEntity->setTitle($this->request->getPost('title'));
            $this->categoryEntity->setSlug();
            $this->categoryEntity->setDescription($this->request->getPost('description'));
            $this->categoryEntity->setKeywords($this->request->getPost('keywords'));
            $this->categoryEntity->setImage($this->request->getPost('image'));
            $this->categoryEntity->setStatus($this->request->getPost('status'));

            $this->categoryModel->insert($this->categoryEntity);

            if ($this->categoryModel->errors()){
                return redirect()->back()->with('error', $this->categoryModel->errors());
            }
            return redirect()->back()->with('success', 'Ekleme i??lemi ba??ar??l??');
        }

        return view('admin/pages/category/create', [
            'categories' => $this->categoryModel->findAll(),
        ]);
    }

    public function edit(int $id)
    {
        if ($this->request->getMethod() == 'post'){
            $this->categoryEntity->setId($id);
            $this->categoryEntity->setModule($this->request->getPost('module'));
            $this->categoryEntity->setUserId();
            $this->categoryEntity->setParentId($this->request->getPost('parent_id'));
            $this->categoryEntity->setTitle($this->request->getPost('title'));
            $this->categoryEntity->setSlug();
            $this->categoryEntity->setDescription($this->request->getPost('description'));
            $this->categoryEntity->setKeywords($this->request->getPost('keywords'));
            $this->categoryEntity->setImage($this->request->getPost('image'));
            $this->categoryEntity->setStatus($this->request->getPost('status'));

            $this->categoryModel->update($id,$this->categoryEntity);

            if ($this->categoryModel->errors()){
                return redirect()->back()->with('error', $this->categoryModel->errors());
            }
            return redirect()->back()->with('success', 'G??ncelleme i??lemi ba??ar??l??');
        }

        return view('admin/pages/category/edit', [
            'categories' => $this->categoryModel->where('module', $this->module->blog)->findAll(),
            'category' => $this->categoryModel->find($id)
        ]);
    }

    public function status()
    {
        if($this->request->isAJAX()){
            $data = $this->request->getPost('id');
            $status = $this->request->getPost('status');

            $update = $this->categoryModel->update($data, ['status' => $status]);
            if(!$update){
                return $this->response->setJSON([
                    'status' => false,
                    'message' => 'Durum de??i??tirme esnas??nda bir hata meydana geldi.'
                ]);
            }
            return $this->response->setJSON([
                'status' => true,
                'message' => 'Durum de??i??tirme ba??ar??l??.'
            ]);
        }
        return $this->response->setJSON([
            'status' => false,
            'message' => 'Durum de??i??tirme esnas??nda bir hata meydana geldi.'
        ]);
    }

    public function delete()
    {
        if($this->request->isAJAX()){
            $data = $this->request->getPost('id');

            $delete = $this->categoryModel->delete($data);
            if (!$delete){
                return $this->response->setJSON([
                    'status'  => false,
                    'message' => 'Silme i??lemi esnas??nda bir hata meydana geldi.'
                ]);
            }
            return $this->response->setJSON([
                'status'  => true,
                'message' => 'Silme i??lemi ba??ar??l??.'
            ]);
        }
        return $this->response->setJSON([
            'status'  => false,
            'message' => 'Silme i??lemi esnas??nda bir hata meydana geldi.'
        ]);
    }

    public function undoDelete()
    {
        if($this->request->isAJAX()){
            $data = $this->request->getPost('id');

            $update = $this->categoryModel->update($data,['deleted_at' => null]);
            if (!$update){
                return $this->response->setJSON([
                    'status'  => false,
                    'message' => 'Geri alma i??lemi esnas??nda bir hata meydana geldi.'
                ]);
            }
            return $this->response->setJSON([
                'status'  => true,
                'message' => 'Geri alma i??lemi ba??ar??l??'
            ]);
        }
        return $this->response->setJSON([
            'status'  => false,
            'message' => 'Geri alma i??lemi esnas??nda bir hata meydana geldi.'
        ]);
    }

    public function purgeDelete()
    {
        if ($this->request->isAJAX()){
            $data = $this->request->getPost('id');

            $purgeDelete = $this->categoryModel->delete($data, true);
            if (!$purgeDelete){
                return $this->response->setJSON([
                    'status'  => false,
                    'message' => 'Kal??c?? olarak siilme i??lemi esnas??nda bir hata meydana geldi'
                ]);
            }

            return $this->response->setJSON([
                'status'  => true,
                'message' => 'Kategori kal??c?? olarak silindi.'
            ]);
        }

        return $this->response->setJSON([
            'status'  => false,
            'message' => 'Kal??c?? olarak siilme i??lemi esnas??nda bir hata meydana geldi'
        ]);
    }
}