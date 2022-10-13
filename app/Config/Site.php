<?php

namespace Config;

use \CodeIgniter\Config\BaseConfig;

class Site extends BaseConfig
{
    public $title = [
        'tr' => 'BO CMS Başlık',
        'en' => 'BO CMS Ingilizce Baslik'
    ];
    public $description = [
        'tr' => 'BO CMS Blog Açıklama',
        'en' => 'BO CMS Blog Açıklama'
    ];
    public $keywords = [
        'tr' => 'cms,bo,blog,php,codeigniter,bahadir,tr',
        'en' => 'cms,bo,blog,php,codeigniter,ci4,bahadir,en'
    ];
    public $headerLogo = 'public/admin/img/header-logo.jpg';
    public $footerLogo = 'public/admin/img/footer-logo.jpg';
    public $mobileLogo = 'public/admin/img/mobile-logo.jpg';
    public $favicon    = 'public/admin/img/favicon.jpg';

    public static $registrars = [
        'App\Controllers\Config'
    ];
}