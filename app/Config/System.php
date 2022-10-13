<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class System extends BaseConfig
{

    public $maintenance  = false;
    public $register     = true;
    public $login        = true;
    public $emailVerify  = true;
    public $defaultGroup = 2;

    public $perPageList = [5];

    public $blog      = 'blog';
    public $page      = 'page';
    public $services  = 'services';
    public $project   = 'project';
    public $ecommerce = 'ecommerce';

    public $modules = [
        'blog'      => true,
        'page'      => true,
        'services'  => false,
        'project'   => false,
        'ecommerce' => false
    ];

    public static $registrars = [
        'App\Controllers\Config'
    ];
}

