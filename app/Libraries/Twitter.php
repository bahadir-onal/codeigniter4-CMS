<?php

namespace App\Libraries;
//TODO: twitter da api hatası almam nedeni ile rafa kaldırdım tekrar döneceğim
use App\Models\ContentModel;
use DG\Twitter\Twitter as DGTwitter;

class Twitter
{
    protected $contentModel;
    protected $setting;
    protected $twitter;
    protected $title;
    protected $url;

    public function __construct()
    {
        $this->setting = config('autoshare')->twitter;
        $this->contentModel = new ContentModel();
    }

//    public function config()
//    {
//        $this->twitter = new DGTwitter(
//            $this->setting['apiKey'],
//            $this->setting['apiKeySecret'],
//            $this->setting['accessToken'],
//            $this->setting['accessTokenSecret']
//        );
//        return $this;
//    }

    public function post($content_id)
    {
        $content = $this->contentModel->find($content_id);
        $this->title = $content->getTitle();
        $this->url = base_url();
        return $this;
    }

    public function publish()
    {
        if ($this->setting['status']){
            $this->twitter->send($this->title . ' ' . $this->url);
        }
    }
}