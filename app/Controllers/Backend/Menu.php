<?php

namespace App\Controllers\Backend;

use \App\Controllers\BaseController;
use App\Entities\MenuEntity;
use App\Models\CategoryModel;
use App\Models\ContentModel;
use App\Models\MenuModel;

class Menu extends BaseController
{
    protected $menuModel;
    protected $menuEntity;

    public function __construct()
    {
        $this->menuModel = new MenuModel();
        $this->menuEntity = new MenuEntity();
    }

    public function listing(string $status = null)
    {
        if (!is_null($status)){
            $menus = $this->menuModel->onlyDeleted()->paginate(20);
        } else {
            $menus = $this->menuModel->paginate(20);
        }

        return view('admin/pages/menu/listing',[
            'menus' => $menus,
            'pager' => $this->menuModel->pager
        ]);
    }

    public function create()
    {
        $name = $this->request->getPost('name');

        $this->menuEntity->setKey($name);
        $this->menuEntity->setValue();

        $this->menuModel->insert($this->menuEntity);
        if ($this->menuModel->errors()){
            return redirect()->back()->with('error', $this->menuModel->errors());
        }
        return redirect()->back()->with('success', 'Yeni menü başarılı bir şekilde eklendi.');
    }

    public function edit(int $id)
    {
        if ($this->request->getMethod() == 'post'){
            $name = $this->request->getPost('name');
            $menu = $this->request->getPost('menu');

            $this->menuEntity->setId($id);
            $this->menuEntity->setKey($name);
            $this->menuEntity->setValue($menu);

            $this->menuModel->update($id, $this->menuEntity);

            if($this->menuModel->errors()){
                return redirect()->back()->with('error', $this->menuModel->errors());
            }
            return redirect()->back()->with('success', 'Menü başarılı bir şekilde güncellendi.');

        }

        return view('admin/pages/menu/edit',[
            'data' => $this->menuModel->find($id)
        ]);
    }

    public function delete()
    {
        if ($this->request->isAJAX()){
            $data = $this->request->getPost('id');

            $delete = $this->menuModel->delete($data);
            if (!$delete){
                return $this->response->setJSON([
                    'status'  => false,
                    'message' => 'Menüyü silme işlemi esnasında bir hata meydana geldi.'
                ]);
            }
            return $this->response->setJSON([
                'status'  => true,
                'message' => 'Menüyü silme işlemi başarılı bir şekilde tamamlandı.'
            ]);
        }
        return $this->response->setJSON([
            'status'  => false,
            'message' => 'Menüyü silme işlemi esnasında bir hata meydana geldi.'
        ]);
    }

    public function undoDelete()
    {
        if ($this->request->isAJAX()){
            $data = $this->request->getPost('id');

            $update = $this->menuModel->update($data, ['deleted_at' => null]);
            if (!$update){
                return $this->response->setJSON([
                    'status'  => false,
                    'message' => 'Silinen menüyü geri alma işlemi esnasında bir hata meydana geldi.'
                ]);
            }
            return $this->response->setJSON([
                'status'  => true,
                'message' => 'Silinen menüyü geri alma işlemi başarılı bir şekilde tamamlandı.'
            ]);
        }
        return $this->response->setJSON([
            'status'  => false,
            'message' => 'Silinen menüyü geri alma işlemi esnasında bir hata meydana geldi.'
        ]);
    }

    public function purgeDelete()
    {
        if ($this->request->isAJAX()){
            $data = $this->request->getPost('id');

            $purgeDelete = $this->menuModel->delete($data, true);
            if (!$purgeDelete){
                return $this->response->setJSON([
                    'status'  => false,
                    'message' => 'Kalıcı olarak silme işlemi esnasında bir hata meydana geldi'
                ]);
            }
            return $this->response->setJSON([
                'status'  => true,
                'message' => 'Kalıcı olarak silme işlemi başarı ile gerçekleşti.'
            ]);
        }
        return $this->response->setJSON([
            'status'  => false,
            'message' => 'Kalıcı olarak silme işlemi esnasında bir hata meydana geldi'
        ]);
    }

    public function getMenu()
    {
        $module = $this->request->getPost('module');
        $type = $this->request->getPost('type');

        if ($type == 'category'){
            $model = new CategoryModel();
        }elseif($type == 'content'){
            $model = new ContentModel();
        }

        return $this->response->setJSON([
            'status' => true,
            'message' => 'Menü içerikleri getirildi',
            'data' => view('admin/pages/menu/partials/option', [
                'data' => $model->where('module', $module)->findAll(),
            ]),
            'type' => $type
        ]);

    }
}