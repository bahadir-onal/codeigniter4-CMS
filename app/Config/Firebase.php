<?php

namespace Config;

use \CodeIgniter\Config\BaseConfig;

class Firebase extends BaseConfig
{
    public $status            = false;
    public $serverKey         = 'AXzaSyAzgpvLhQ5IyXXSMcX6Qi3Z_XEKMXzCzXEAXzaSyAzgpvLhQ5IyXXSMcX6Qi3Z_XEKMXzCzXE';
    public $apiKey            = 'AXzaSyAzgpvLhQ5IyXXSMcX6Qi3Z_XEKMXzCzXE';
    public $authDomain        = 'fcm-xxxxxxxx.firebaseapp.com';
    public $databaseURL       = 'https://fcm-xxxxxxxx.firebaseio.com';
    public $projectId         = 'fcm-xxxxxxxxt';
    public $storageBucket     = 'fcm-xxxxxxxx.appspot.com';
    public $messagingSenderId = '3xxxx98xxx74';
    public $appId             = '1:xxxxx9834474:web:xxxxxx26c25c4894693e93';
    public $measurementId     = 'G-KQ7xxxxxBT';

    public static $registrars = [
        'App\Controllers\Config'
    ];
}