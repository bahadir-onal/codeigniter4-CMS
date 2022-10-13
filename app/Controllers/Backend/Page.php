<?php

namespace App\Controllers\Backend;

use \App\Controllers\BaseController;
use App\Entities\ContentEntity;
use App\Models\ContentModel;
use App\Models\ThemeModel;
use App\Models\UserModel;

class Page extends BaseController
{
    protected $userModel;
    protected $contentModel;
    protected $contentEntity;
    protected $module;

    public function __construct()
    {
        $this->userModel     = new UserModel();
        $this->contentModel  = new ContentModel();
        $this->contentEntity = new ContentEntity();
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
        if (!bo_permit_control('admin_page_listing_all')){
            $user = session('userData.id');
        }

        $data = [
            'users'      => $this->userModel->findAll(),
            'user'       => $user,
            'perPage'    => $perPage,
            'dateFilter' => $getDateFilter,
            'search'     => $search
        ];

        $getModel = $this->contentModel->getListing($this->module->page, $status, $user, null, $search, $dateFilter, $perPage);
        $data = array_merge($data,$getModel);

        return view('admin/pages/page/listing', $data);
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

            $this->contentEntity->setModule($this->module->page);
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
            $this->contentEntity->setPageType($this->request->getPost('page_type'));
            $this->contentEntity->setComment();
            $this->contentEntity->setSimilar();

            $insertID = $this->contentModel->insert($this->contentEntity);

            if ($this->contentModel->errors()){
                return redirect()->back()->with('error', $this->contentModel->errors());
            }
            return redirect()->back()->with('success', bo_admin_translate('Page', 'success_create'));
        }
        return view('admin/pages/page/create', [
            'template_list' => $this->getPageTemplate()
        ]);
    }

    private function getPageTemplate()
    {
        helper('filesystem');
        $themeModel = new ThemeModel();
        $active_theme = $themeModel->where('status', STATUS_ACTIVE)->first();

        $find_folder = directory_map(APPPATH . 'Views/themes/' . $active_theme->getFolder() . '/page');
        $template_list = [];
        foreach ($find_folder as $key => $value) {
            $get_file = file_get_contents(APPPATH . 'Views/themes/' . $active_theme->getFolder() . '/page/' . $value);
            preg_match_all('#<!-- (.*?) -->#', $get_file, $find);
            $file_name = str_replace('.php', '', $value);
            $template_name = $find[1][0];
            $template_list[$file_name] = $template_name;
        }
        return $template_list;
    }
}