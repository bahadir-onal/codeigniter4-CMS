<?php

namespace Config;

use \CodeIgniter\Config\BaseConfig;

class AutoShare extends BaseConfig
{
    public $twitter = [

        'status'            => false,
        'apiKey'            => '',
        'apiKeySecret'      => '',
        'accessToken'       => '',
        'accessTokenSecret' => '',
        'callbackUrl'       => ''
    ];

    public $facebook = [
        'status'      => false,
        'appId'       => '',
        'appSecret'   => '',
        'pageId'      => '',
        'permissions' => '',
        'accessToken' => '',
        'callbackUrl' => '',

    ];

    public $linkedin = [
        'status'      => false,
        'appId'       => '',
        'appSecret'   => '',
        'accountId'   => '',
        'scopes'      => '',
        'accessToken' => '',
        'callbackUrl' => '',

    ];

    public $pinterest = [

    ];
    public $medium = [

    ];
    public $googleMyBusiness = [

    ];

    public static $registrars = [
        'App\Controllers\Config'
    ];
}