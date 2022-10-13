<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;

class Translation extends BaseController
{
    public function listing()
    {
        return view('admin/pages/translation/listing');
    }

    public function folderList()
    {
        if ($this->request->isAJAX()){
            if (!bo_permit_control('translation_listing')){
                return $this->response->setJSON([
                    'status' => false,
                    'message' => 'Bu işlem için izniniz bulunmamaktadır..'
                ]);
            }

            $lang = $this->request->getPost('lang');

            helper('filesystem');

            $folder = directory_map(APPPATH . 'Language/' . $lang);

            return $this->response->setJSON([
                'status'  => true,
                'message' => 'İşlem başarılı.',
                'view'    => view('admin/pages/translation/partials/folder-list', [
                    'folder_list' => $folder,
                    'lang' => $lang
                ])
            ]);
        }
        return $this->response->setJSON([
            'status' => false,
            'message' => 'Bu istek için uygun değil.'
        ]);
    }

    public function files($lang, $folder)
    {
        helper('filesystem');
        $files = directory_map(APPPATH . 'Language/' . $lang . '/' .$folder);

        return view('admin/pages/translation/files',[
            'files'  => $files,
            'path'   => APPPATH . 'Language/'.$lang.'/'.$folder.'/',
            'lang'   => $lang,
            'folder' => $folder
        ]);
    }

    public function translate($lang, $folder, $file)
    {
        $path = APPPATH . 'Language/' . $lang . '/' . $folder . '/' . $file . '.php';

        if ($this->request->getMethod() == 'post'){

            $translate = $this->request->getPost('translate');

            $str = "";
            foreach ($translate['text'] as $key => $value){
                $str .= "'".$key."' => '".$value."', \n";
            }


            $text = "<?php 
            return [
                'title' => '".$translate["title"]."',
                'description' => '".$translate["description"]."',
                    'text' => [
                        ".$str."
                    ]
                ];";

            $t_file = fopen($path, 'w');
            fwrite($t_file, $text);
            fclose($t_file);

            return redirect()->back()->with('success', 'Çeviri işlemi başarılı bir şekilde tamamlandı.');
        }

        $strings = include $path;

        return view('admin/pages/translation/translate', [
            'strings' => $strings
        ]);
    }
}