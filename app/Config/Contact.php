<?php

namespace Config;

use \CodeIgniter\Config\BaseConfig;

class Contact extends BaseConfig
{
    public $offices = [];

    public static $registrars = [
        'App\Controllers\Config'
    ];
}