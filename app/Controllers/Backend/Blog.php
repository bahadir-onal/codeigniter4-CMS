<?php

namespace App\Controllers\Backend;

use \App\Controllers\BaseController;
use App\Entities\ContentEntity;
use App\Libraries\Twitter;
use App\Models\CategoryModel;
use App\Models\ContentModel;
use App\Models\UserModel;

class Blog extends BaseController
{
    protected $userModel;
    protected $categoryModel;
    protected $contentModel;
    protected $contentEntity;
    protected $twitter;
    protected $module;

    public function __construct()
    {
        $this->userModel     = new UserModel();
        $this->categoryModel = new CategoryModel();
        $this->contentModel  = new ContentModel();
        $this->contentEntity = new ContentEntity();
        $this->twitter       = new Twitter();
        $this->module        = config('system');
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
        if (!bo_permit_control('admin_blog_listing_all')){
            $user = session('userData.id');
        }

        $category = $this->request->getGet('category');
        $category = !empty($category) ? $category : null;

        $data = [
            'categories' => $this->categoryModel->findAll(),
            'category'   => $category,
            'users'      => $this->userModel->findAll(),
            'user'       => $user,
            'perPage'    => $perPage,
            'dateFilter' => $getDateFilter,
            'search'     => $search
        ];

        $getModel = $this->contentModel->getListing($this->module->blog, $status, $user, $category, $search, $dateFilter, $perPage);
        $data = array_merge($data,$getModel);

        return view('admin/pages/blog/listing', $data);
    }

    public function create()
    {
        if ($this->request->getMethod() == 'post'){

            $field=[];
            $getField = $this->request->getPost('field');
            if (isset($getField)){
                foreach ($this->request->getPost('field') as $key => $value) {
                    $field[$value['key']] = $value['value'];
                }
            }
            $field = count($field) > 0 ? $field : null;
            $this->contentEntity->setModule($this->module->blog);
            $this->contentEntity->setUserId();
            $this->contentEntity->setTitle($this->request->getPost('title'));
            $this->contentEntity->setSlug();
            $this->contentEntity->setDescription($this->request->getPost('description'));
            $this->contentEntity->setContent($this->request->getPost('content'));
            $this->contentEntity->setKeywords($this->request->getPost('keywords'));
            $this->contentEntity->setThumbnail($this->request->getPost('thumbnail'));
            $this->contentEntity->setGallery($this->request->getPost('gallery'));
            $this->contentEntity->setViews();
            $this->contentEntity->setField($field);
            $this->contentEntity->setStatus($this->request->getPost('status'));
            $this->contentEntity->setComment($this->request->getPost('comment'));
            $this->contentEntity->setSimilar($this->request->getPost('similar'));

            $insertID = $this->contentModel->insert($this->contentEntity);

            if ($this->contentModel->errors()){
                return redirect()->back()->with('error', $this->contentModel->errors());
            }

            $this->contentModel->category('insert', $insertID, $this->request->getPost('categories'));

            $this->twitter->config()->post($insertID)->publish();

            return redirect()->back()->with('success', 'Blog ekleme işlemi başarılı.');
        }
        return view('admin/pages/blog/create',[
            'categories' => $this->categoryModel->where('module', $this->module->blog)->findAll(),
            'blogs' => $this->contentModel->where('module', $this->module->blog)->findAll()
        ]);
    }

    public function edit($id)
    {
        $blog = $this->contentModel->find($id);
        if ($blog->getUserId() != session('userData.id')){
            if (!bo_permit_control('admin_blog_edit_all')){
                return redirect()->back()->with('error', 'Bu yazıyı düzenleme yetkisine sahip değilsiniz.');
            }
        }

        if ($this->request->getMethod() == 'post'){
            $field=[];
            $getField = $this->request->getPost('field');
            if (isset($getField)){
                foreach ($this->request->getPost('field') as $key => $value) {
                    $field[$value['key']] = $value['value'];
                }
            }
            $field = count($field) > 0 ? $field : null;
            $this->contentEntity->setId($id);
            $this->contentEntity->setModule($this->module->blog);
            $this->contentEntity->setUserId();
            $this->contentEntity->setTitle($this->request->getPost('title'));
            $this->contentEntity->setSlug();
            $this->contentEntity->setDescription($this->request->getPost('description'));
            $this->contentEntity->setContent($this->request->getPost('content'));
            $this->contentEntity->setKeywords($this->request->getPost('keywords'));
            $this->contentEntity->setThumbnail($this->request->getPost('thumbnail'));
            $this->contentEntity->setGallery($this->request->getPost('gallery'));
            $this->contentEntity->setViews();
            $this->contentEntity->setField($field);
            $this->contentEntity->setStatus($this->request->getPost('status'));
            $this->contentEntity->setComment($this->request->getPost('comment'));
            $this->contentEntity->setSimilar($this->request->getPost('similar'));

            $this->contentModel->update($id, $this->contentEntity);

            if ($this->contentModel->errors()){
                return redirect()->back()->with('error', $this->contentModel->errors());
            }

            $this->contentModel->category('update', $id, $this->request->getPost('categories'));

            return redirect()->back()->with('success', 'Blog yazısı başarılı bir şekilde güncellendi.');
        }

        return view('admin/pages/blog/edit', [
            'categories' => $this->categoryModel->findAll(),
            'blogs' => $this->contentModel->where('module', $this->module->blog)->findAll(),
            'blog' => $blog
        ]);
    }

    public function status()
    {
        if ($this->request->isAJAX()){
            $data   = $this->request->getPost('id');
            $status = $this->request->getPost('status');

            $blog = $this->contentModel->where('user_id !=', session('userData.id'))->find($data);
            if ($blog){
                if (!bo_permit_control('admin_blog_status_all')){
                    return $this->response->setJSON([
                        'status' => false,
                        'message' => 'Size ait olmayan bir yazının durumunu değiştiremezsiniz.'
                    ]);
                }
            }

            $update = $this->contentModel->update($data, ['status' => $status]);
            if (!$update){
                return $this->response->setJSON([
                    'status' => false,
                    'message' => 'Blog yazısı durum değiştirme esnasında bir hata meydana geldi.'
                ]);
            }
            return $this->response->setJSON([
                'status' => true,
                'message' => 'Blog yazısı durum değiştime işlemi başarılı.'
            ]);
        }
        return $this->response->setJSON([
            'status' => false,
            'message' => 'Blog yazısı durum değiştirme esnasında bir hata meydana geldi.'
        ]);
    }

    public function delete()
    {
        if ($this->request->isAJAX()){
            $data = $this->request->getPost('id');

            $blog = $this->contentModel->where('user_id !=', session('userData.id'))->find($data);
            if ($blog){
                if (!bo_permit_control('admin_blog_status_all')){
                    return $this->response->setJSON([
                        'status' => false,
                        'message' => 'Size ait olmayan bir blog yazısını silemezsiniz.'
                    ]);
                }
            }
            $delete = $this->contentModel->delete($data);
            if (!$delete){
                return $this->response->setJSON([
                    'status'  => false,
                    'message' => 'Silme işlemi esnasında bir hata meydana geldi.'
                ]);
            }
            return $this->response->setJSON([
                'status'  => true,
                'message' => 'Silme işlemi başarılı bir şekilde tamamlandı.'
            ]);
        }
        return $this->response->setJSON([
            'status'  => false,
            'message' => 'Silme işlemi esnasında bir hata meydana geldi.'
        ]);
    }

    public function undoDelete()
    {
        if ($this->request->isAJAX()){
            $data = $this->request->getPost('id');

            $blog = $this->contentModel->where('user_id !=', session('userData.id'))->find($data);
            if ($blog){
                if (!bo_permit_control('admin_blog_undo-delete_all')){
                    return $this->response->setJSON([
                        'status'  => false,
                        'message' => 'Kendinize ait olmayan silinmiş blog yazısını geri alamazsınız.'
                    ]);
                }
            }

            $update = $this->contentModel->update($data, ['deleted_at' => null]);
            if (!$update){
                return $this->response->setJSON([
                    'status'  => false,
                    'message' => 'Silinen blog yazısını geri alma işlemi esnasında bir hata meydana geldi.'
                ]);
            }
            return $this->response->setJSON([
                'status'  => true,
                'message' => 'Silinen blog yazısını geri alma işlemi başarılı.'
            ]);
        }
        return $this->response->setJSON([
            'status'  => false,
            'message' => 'Silinen blog yazısını geri alma işlemi esnasında bir hata meydana geldi.'
        ]);
    }

    public function purgeDelete()
    {
        if ($this->request->isAJAX()){
            $data = $this->request->getPost('id');

            $blog = $this->contentModel->where('user_id !=', session('userData.id'))->find($data);
            if ($blog){
                if (!bo_permit_control('admin_blog_purge-delete_all')){
                    return $this->response->setJSON([
                        'status'  => false,
                        'message' => 'Kendinize ait olmayan blog yazısını kalıcı olarak silemezsiniz.'
                    ]);
                }
            }

            $purgeDelete = $this->contentModel->delete($data, true);
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
}