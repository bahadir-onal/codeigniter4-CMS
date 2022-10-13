<?php
namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Models\CommentModel;
use App\Models\ContentModel;
use App\Models\UserModel;

class Dashboard extends BaseController
{
    protected $contentModel;
    protected $userModel;
    protected $commentModel;

    public function __construct()
    {
        $this->contentModel = new ContentModel();
        $this->userModel = new UserModel();
        $this->commentModel = new CommentModel();
    }

    public function index()
    {
        return view('admin/pages/dashboard',[
            'blogs' => $this->contentModel->where('module', config('system')->blog)->findAll(6),
            'users' => $this->userModel->findAll(12),
            'count' => [
                'user' => $this->userModel->countAllResults(),
                'blog' => $this->contentModel->where('module', config('system')->blog)->countAllResults(),
                'comment' => $this->commentModel->countAllResults()
            ]
        ]);
    }
}