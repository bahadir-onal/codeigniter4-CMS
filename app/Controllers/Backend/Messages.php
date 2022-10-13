<?php

namespace App\Controllers\Backend;

use \App\Controllers\BaseController;
use App\Entities\MessageEntity;
use App\Models\MessageModel;

class Messages extends BaseController
{
    protected $messageModel;
    protected $messageEntity;

    public function __construct()
    {
        $this->messageModel = new MessageModel();
        $this->messageEntity = new MessageEntity();
    }

    public function listing($status = null)
    {
        if ($this->request->isAJAX()){
            $message = $this->messageModel
                ->where('status', STATUS_UNREAD)
                ->orderBy('created_at', 'DESC')
                ->paginate(3);

            return $this->response->setJSON([
                'status'  => true,
                'message' => 'Mesaj içeriği getirildi.',
                'data'    => view('admin/pages/message/partial/navbar-last-messages', [
                    'messages' => $message,
                ]),
                'length' => count($message)
            ]);
        }

        if ($status == 'deleted'){
            $messages = $this->messageModel
                ->where('message_id', null)
                ->onlyDeleted()
                ->orderBy('created_at', 'DESC')
                ->paginate(5);
        } else {
            $messages = $this->messageModel
                ->where('message_id', null)
                ->orderBy('created_at', 'DESC')
                ->paginate(5);
        }


        return view('admin/pages/message/listing', [
            'messages' => $messages,
            'pager' => $this->messageModel->pager
        ]);
    }

    public function detail()
    {
        if ($this->request->isAJAX()){
            $id = $this->request->getPost('id');
            $message = $this->messageModel->withDeleted()->find($id);
            if (!$message){
                return $this->response->setJSON([
                    'status'  => false,
                    'message' => 'Böyle bir mesaj bulunamadı.'
                ]);
            }

            $this->messageModel->update($id, [
                'status' => STATUS_READ
            ]);
            if ($this->messageModel->errors()){
                return $this->response->setJSON([
                    'status'  => false,
                    'message' => 'Mesaj okundu olarak işaretlenirken bir hata meydana geldi.'
                ]);
            }
            return $this->response->setJSON([
                'status'  => true,
                'message' => 'Mesaj içeriği getirildi.',
                'data'    => view('admin/pages/message/detail', [
                    'message' => $message
                ])
            ]);
        }
        return $this->response->setJSON([
            'status'  => false,
            'message' => 'Lütfen isteğinizi kontrol ediniz.'
        ]);
    }

    public function reply()
    {
        if ($this->request->isAJAX()){
            $id      = $this->request->getPost('id');
            $message = $this->messageModel->find($id);
            $reply   = $this->request->getPost('reply');

            $this->messageEntity->setMessageId($message->id);
            $this->messageEntity->setName(session('userData.name'));
            $this->messageEntity->setEmail(session('userData.email'));
            $this->messageEntity->setSubject($message->getSubject());
            $this->messageEntity->setMessage($reply);
            $this->messageEntity->setStatus(STATUS_READ);

            $this->messageModel->insert($this->messageEntity);
            if ($this->messageModel->errors()){
                return $this->response->setJSON([
                    'status'  => false,
                    'message' => 'Cevap gönderiirken bir hata meydana geldi.'
                ]);
            }
            return $this->response->setJSON([
                'status'  => true,
                'message' => 'Cevap başarılı bir şekilde gönderildi.'
            ]);
        }
        return $this->response->setJSON([
            'status'  => false,
            'message' => 'Geçersiz istek. Lütfen daha sonra tekrar deneyin.'
        ]);
    }

    public function delete()
    {
        if ($this->request->isAJAX()){
            $id = $this->request->getPost('id');

            $delete = $this->messageModel->delete($id);
            if (!$delete){
                return $this->response->setJSON([
                    'status'  => false,
                    'message' => 'Mesaj silme esnasında bir hata meydana geldi.'
                ]);
            }
            return $this->response->setJSON([
                'status'  => true,
                'message' => 'Mesaj başarılı bir şekilde silindi.'
            ]);
        }
        return $this->response->setJSON([
            'status'  => false,
            'message' => 'Geçersiz istek. Lütfen daha sonra tekrar deneyin.'
        ]);
    }

    public function undoDelete()
    {
        if ($this->request->isAJAX()){

            $id = $this->request->getPost('id');

            $update = $this->messageModel->update($id, ['deleted_at' => null]);
            if (!$update){
                return $this->response->setJSON([
                    'status'  => false,
                    'message' => 'Mesajı silme işlemini geri alma esnasında bir hata meydana geldi.'
                ]);
            }
            return $this->response->setJSON([
                'status'  => true,
                'message' => 'Mesajı silme işlemini başarılı bir şekilde tamalandı.'
            ]);
        }
        return $this->response->setJSON([
            'status'  => false,
            'message' => 'Geçersiz istek. Lütfen daha sonra tekrar deneyin.'
        ]);
    }

    public function purgeDelete()
    {
        if ($this->request->isAJAX()){

            $id = $this->request->getPost('id');

            $delete = $this->messageModel->delete($id, true);
            if (!$delete){
                return $this->response->setJSON([
                    'status'  => false,
                    'message' => 'Mesajı kalıcı olarak silme işlemi esnasında bir hata meydana geldi.'
                ]);
            }
            return $this->response->setJSON([
                'status'  => true,
                'message' => 'Mesajı kalıcı olarak silme işlemi başarılı.'
            ]);
        }
        return $this->response->setJSON([
            'status'  => false,
            'message' => 'Geçersiz istek. Lütfen daha sonra tekrar deneyin.'
        ]);
    }

    public function markAllRead()
    {
        if ($this->request->isAJAX()){

            if (!bo_permit_control('message_detail')){
                return $this->response->setJSON([
                    'status'  => false,
                    'message' => 'Bu işlemi yapma yetkisine sahip değilsin.'
                ]);
            }

            $this->messageModel->where('status', STATUS_UNREAD)->update(null, [
                'status' => STATUS_READ
            ]);

            if ($this->messageModel->errors()){
                return $this->response->setJSON([
                    'status'  => false,
                    'message' => 'Mesaj okundu olarak işaretlenirken bir hata meydana geldi.'
                ]);
            }
            return $this->response->setJSON([
                'status'  => true,
                'message' => 'Mesajlar okundu olarak işaretlendi.'
            ]);
        }
        return $this->response->setJSON([
            'status'  => false,
            'message' => 'Geçersiz istek. Lütfen daha sonra tekrar deneyin.'
        ]);
    }
}