<?php

namespace App\Controllers\Backend;

use \App\Controllers\BaseController;
use App\Entities\ImageEntity;
use App\Models\ImageModel;

class Images extends BaseController
{
    protected $imageModel;
    protected $imageEntity;
    protected $imageSetting;

    public function __construct()
    {
        $this->imageModel   = new ImageModel();
        $this->imageEntity  = new ImageEntity();
        $this->imageSetting = config('images');
    }

    public function listing()
    {
        $getDateFilter = $this->request->getGet('dateFilter');
        $dateFilter = explode(' - ', $getDateFilter ?? '');
        $dateFilter = count($dateFilter) > 1 ? $dateFilter : null;

        $perPage = $this->request->getGet('perPage');
        $perPage = !empty($perPage) ? $perPage : 10;

        $search = $this->request->getGet('search');
        $search = !empty($search) ? $search : null;

        $data = [
            'perPage'    => $perPage,
            'dateFilter' => $getDateFilter,
            'search'     => $search,
        ];

        $getModel = $this->imageModel->getListing($search, $dateFilter, $perPage);
        $data = array_merge($data,$getModel);

        return view('admin/pages/image/listing', $data);
    }

    public function singleImagePickerModal()
    {
        $srcID   = $this->request->getGet('src');
        $inputID = $this->request->getGet('input');
        $images  = $this->imageModel->findAll();

        return view('admin/pages/image/picker/single', [
            'srcID'    => $srcID,
            'inputID'  => $inputID,
            'variable' => random_string('alpha',16),
            'divId'    => random_string('alpha',16),
            'images'   => $images
        ]);
    }

    public function multiImagePickerModal()
    {
        $area      = $this->request->getGet('area');
        $inputName = $this->request->getGet('input');
        $images    = $this->imageModel->findAll();

        return view('admin/pages/image/picker/multi', [
            'area'      => $area,
            'inputName' => $inputName,
            'variable'  => random_string('alpha',16),
            'divId'     => random_string('alpha',16),
            'images'    => $images
        ]);
    }

    public function upload()
    {
        helper(['text', 'inflector']);
        $function_number = $this->request->getGet('CKEditorFuncNum');

        if (!isset($function_number)){
            $file = $this->request->getFile('file');
        } else {
            $file = $this->request->getFile('upload');
        }

        $fileName = convert_accented_characters(underscore($file->getName()));

        if (!$this->validation->run(['file' => $file], 'imageUpload') && !isset($function_number)){
            return $this->response->setJSON([
                'status'  => false,
                'message' => $this->validation->getErrors()
            ]);
        }

        $file->move(ROOTPATH. UPLOAD_FOLDER_PATH, $fileName);
        if (!$file->hasMoved()) {
            return $this->response->setJSON([
                'status'  => false,
                'message' => 'Resim yüklenirken bir hata meydana geldi.'
            ]);
        }

        $this->imageEntity->setName($file->getClientName());
        $this->imageEntity->setSlug($file->getName());
        $this->imageEntity->setUrl($file->getName());
        $this->imageEntity->setSize($file->getSize());
        $this->imageEntity->setType($file->getClientExtension());

        $insert = $this->imageModel->insert($this->imageEntity);
        if ($this->imageModel->errors()){
            return $this->response->setJSON([
                'status'  => false,
                'message' => 'Resim veritabanına yazılırken bir hata meydana geldi.'
            ]);
        }

      // $this->manipulation($file);

        if (!isset($function_number)){
            return $this->response->setJSON([
                'status' => true,
                'id'     => $insert,
                'src'    => $this->imageEntity->getUrl() //'187x134'
            ]);
        }
        $url = $this->imageEntity->getUrl();
        echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($function_number, '$url', 'Resim Yüklendi');</script>";
    }

    public function delete()
    {
        helper('filesystem');

        if ($this->request->isAJAX()){
            $id = $this->request->getPost('id');
            $image = $this->imageModel->find($id);

            if ($image){
                $delete = $this->imageModel->delete($id);
            }

            $folderImages = directory_map(ROOTPATH. UPLOAD_FOLDER_PATH);

            $setting = $this->imageSetting->imageDelete;

            if ($setting == 'all') {
                foreach ($folderImages as $key => $value) {
                    if (strstr($value, $image->getSlug())){
                        unlink(ROOTPATH. UPLOAD_FOLDER_PATH . '/' . $value);
                    }
                }
            }

            if ($setting == 'original') {
                unlink(ROOTPATH. UPLOAD_FOLDER_PATH . '/' . $image->getSlug() . '.' . $image->getType());
            }

            return $this->response->setJSON([
                'status'  => true,
                'message' => 'Silme işlemi başarılı bir şekilde gerçekleşti.'
            ]);
        }

        return $this->response->setJSON([
            'status'  => false,
            'message' => 'Silme işlemi esnasında bir hata meydana geldi.'
        ]);
    }

//    private function manipulation($file)
//    {
//        $manipulation = \Config\Services::image();
//
//        $thumbnail = $this->imageSetting->thumbnail;
//        $imagePath = ROOTPATH . UPLOAD_FOLDER_PATH . $file->getName();
//
//        foreach ($thumbnail as $key => $value){
//            $manipulation->withFile($imagePath);
//            $nameExp = explode('.', $file->getName());
//            $sizeExp = explode('x', $value);
//            $width = $sizeExp[0];
//            $height = $sizeExp[1];
//            $name = $nameExp[0];
//            $path = ROOTPATH . UPLOAD_FOLDER_PATH .$name . '-'.$value.'.' . $file->getSharedInstance();
//            $manipulation->fit($width, $height, 'center');
//            $manipulation->save($path);
//        }
//
//        if($this->imageSetting)->imageCompressor != 0){
//            $manipulation->withFile($imagePath);
//            $manipulation->save($imagePath, $this->imageSetting)->imageCompressor);
//        }
//
//        $watermark = $this->imageSetting->watermark;
//        if ($watermark['status']){
//            $manipulation->withFile($imagePath);
//            $manipulation->text($watermark['text'], [
//                'color' => $watermark['color'],
//                'opacity' => $watermark['opacity'],
//                'withShadow' => $watermark['withShadow'],
//                'fontSize' => $watermark['fontSize'],
//                'hAlign' => $watermark['hAlign'],
//                'vAlign' => $watermark['vAlign'],
//            ]);
//            $manipulation->save($imagePath);
//        }
//
//    }
}