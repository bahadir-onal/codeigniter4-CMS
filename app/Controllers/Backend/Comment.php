<?php

namespace App\Controllers\Backend;

use \App\Controllers\BaseController;
use App\Entities\CommentEntity;
use App\Models\CommentModel;
use App\Models\ContentModel;

class Comment extends BaseController
{
    protected $commentModel;
    protected $commentEntity;
    protected $contentModel;
    protected $comment_list;
    protected $comment_reply;

    public function __construct()
    {
        $this->commentModel  = new CommentModel();
        $this->commentEntity = new CommentEntity();
        $this->contentModel  = new ContentModel();
        $this->comment_list  = [];
        $this->comment_reply = [];
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

        $content = $this->request->getGet('content');
        $content = !empty($content) ? $content : null;

        $user_content_list = [];
        if (!bo_permit_control('admin_comment_listing_all')){
            $user_content = $this->contentModel->where('user_id', session('userData.id'))->findAll();
            foreach ($user_content as $item) {
                array_push($user_content_list, $item->id);
            }
        } else {
            $user_content = $this->contentModel->findAll();
        }

        $data = [
            'contents'   => $user_content,
            'search'     => $search,
            'dateFilter' => $getDateFilter,
            'perPage'    => $perPage,
            'content'    => $content,
        ];
        $getModel = $this->commentModel->getListing($status, $content, $user_content_list, $search, $dateFilter, $perPage);

        if (is_null($status) || $status == strtolower(STATUS_ACTIVE)){
            foreach ($getModel['comments'] as $key => $value) {
                $this->comment_reply = [];
                $value->level = 0;
                array_push($this->comment_list, $value);
                $this->parentComment($value, 1);
                $this->comment_list = array_merge($this->comment_list, $this->comment_reply);
            }

            $getModel['comments'] = $this->comment_list;
        }

        $data = array_merge($data, $getModel);

        return view('admin/pages/comment/listing', $data);
    }

    public function replyModal()
    {
        $data = $this->request->getGet('id');
        return view('admin/pages/comment/reply-modal', [
            'comment' => $this->commentModel->find($data)
        ]);
    }

    public function reply()
    {
        if ($this->request->isAJAX()){
            $data = $this->request->getPost('id');
            $reply = $this->request->getPost('reply');
            $level = $this->request->getPost('level');

            $comment = $this->commentModel->find($data);
            $blog = $this->contentModel->find($comment->getContentId());

            if ($blog->getUserId() != session('userData.id')){
                if (!bo_permit_control('admin_comment_reply_all')){
                    return $this->response->setJSON([
                        'status' => false,
                        'message' => 'Sana ait olmayan yorumlara cevap veremezsin.'
                    ]);
                }
            }

            $this->commentEntity->setName(session('userData.name'));
            $this->commentEntity->setEmail(session('userData.email'));
            $this->commentEntity->setComment($reply);
            $this->commentEntity->setCommentId($comment->id);
            $this->commentEntity->setContentId($comment->getContentId());
            $this->commentEntity->setStatus(STATUS_ACTIVE);

            $insertID = $this->commentModel->insert($this->commentEntity);

            if ($this->commentModel->errors()){
                return $this->response->setJSON([
                    'status' => false,
                    'message' => 'Yorum eklenirken bir hata meydana geldi.'
                ]);
            }
            return $this->response->setJSON([
                'status' => true,
                'message' => 'Yorum başarılı bir şekilde eklendi.',
                'comment' => view('admin/pages/comment/reply-comment',[
                    'comment' => $this->commentModel->find($insertID),
                    'level' => $level+1
                ])
            ]);
        }
        return $this->response->setJSON([
            'status' => false,
            'message' => 'Yorum eklenirken bir hata meydana geldi.'
        ]);
    }

    public function status()
    {
        if ($this->request->isAJAX()){
            $data = $this->request->getPost('id');
            $status = $this->request->getPost('status');

            $comment = $this->commentModel->find($data);
            $blog = $this->contentModel->find($comment->getContentId());

            if ($blog->getUserId() != session('userData.id')){
                if (!bo_permit_control('admin_comment_status_all')){
                    return $this->response->setJSON([
                        'status' => false,
                        'message' => 'Sana ait olmayan yorumları değiştiremezsin.'
                    ]);
                }
            }

            $update = $this->commentModel->update($data, ['status' => $status]);
            if (!$update){
                return $this->response->setJSON([
                    'status' => false,
                    'message' => 'Yorum durumunu değiştirme esnasında bir hata meydana geldi.'
                ]);
            }
            return $this->response->setJSON([
                'status' => true,
                'message' => 'Yorum durumunu değiştirme başarılı bir şekilde tamamlandı'
            ]);
        }
        return $this->response->setJSON([
            'status' => false,
            'message' => 'Yorum durumunu değiştirme esnasında bir hata meydana geldi.'
        ]);
    }

    public function delete()
    {
        if ($this->request->isAJAX()){
            $data = $this->request->getPost('id');

            $comment = $this->commentModel->find($data);
            $blog = $this->contentModel->find($comment->getContentId());

            if ($blog->getUserId() != session('userData.id')){
                if (!bo_permit_control('admin_comment_delete_all')){
                    return $this->response->setJSON([
                        'status' => false,
                        'message' => 'Sana ait olmayan yorumu silemezsin.'
                    ]);
                }
            }

            $parent = $this->commentModel->where('comment_id', $comment->id)->update(null, ['comment_id' => $comment->getCommentId()]);

            $delete = $this->commentModel->delete($data);
            if (!$delete){
                return $this->response->setJSON([
                    'status' => false,
                    'message' => 'Yorum silme işlemi esnasında bir hata meydana geldi.'
                ]);
            }
            return $this->response->setJSON([
                'status' => true,
                'message' => 'Yorum silme işlemi başarılı.'
            ]);
        }
        return $this->response->setJSON([
            'status' => false,
            'message' => 'Yorum silme işlemi esnasında bir hata meydana geldi.'
        ]);
    }

    public function undoDelete()
    {
        if ($this->request->isAJAX()){
            $data = $this->request->getPost('id');

            $comment = $this->commentModel->onlyDeleted()->find($data);
            $content = $this->contentModel->find($comment->getContentId());

            if ($content->getUserId() != session('userData.id')){
                if (!bo_permit_control('admin_comment_undo_delete_all')){
                    return $this->response->setJSON([
                        'status'  => false,
                        'message' => 'Senin yazına ait olmayan silinmiş yorumları geri alamazsın.'
                    ]);
                }
            }

            $update = $this->commentModel->update($data, ['deleted_at' => null]);
            if (!$update){
                return $this->response->setJSON([
                    'status'  => false,
                    'message' => 'Silinen yorumu geri alma işlemi esnasında bir hata meydana geldi.'
                ]);
            }
            return $this->response->setJSON([
                'status'  => true,
                'message' => 'Silinen yorumu geri alma işlemi başarılı.'
            ]);
        }
        return $this->response->setJSON([
            'status'  => false,
            'message' => 'Silinen yorumu geri alma işlemi esnasında bir hata meydana geldi.'
        ]);
    }

    public function purgeDelete()
    {
        if ($this->request->isAJAX()){
            $data = $this->request->getPost('id');

            $comment = $this->commentModel->onlyDeleted()->find($data);
            $content = $this->contentModel->find($comment->getContentId());

            if ($content->getUserId() != session('userData.id')){
                if (!bo_permit_control('admin_comment_purge_delete_all')){
                    return $this->response->setJSON([
                        'status'  => false,
                        'message' => 'Senin yazına ait olmayan silinmiş yorumları kalıcı olarak silemezsin.'
                    ]);
                }
            }

            $delete = $this->commentModel->delete($data, true);
            if (!$delete){
                return $this->response->setJSON([
                    'status'  => false,
                    'message' => 'Yorumu kalıcı olarak sistemden silme işlemi esnasında bir hata meydana geldi.'
                ]);
            }
            return $this->response->setJSON([
                'status'  => true,
                'message' => 'Yorum kalıcı olarak sistemden silindi.'
            ]);
        }
        return $this->response->setJSON([
            'status'  => false,
            'message' => 'Yorumu kalıcı olarak sistemden silme işlemi esnasında bir hata meydana geldi.'
        ]);
    }

    private function parentComment($comment, $level)
    {
        $parent_list = $this->commentModel->where('comment_id', $comment->id)->orderBy('created_at', 'ASC')->findAll();

        foreach ($parent_list as $item) {
            $item->level = $level;
            array_push($this->comment_reply, $item);
            $this->parentComment($item, $level+1);
        }
    }
}