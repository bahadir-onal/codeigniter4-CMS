<?php
namespace App\Controllers;

use App\Entities\MessageEntity;
use App\Entities\ThemeEntity;
use App\Models\MessageModel;
use App\Models\ThemeModel;

class Home extends BaseController
{
	public function index()
	{

        print_r(config('contact'));

    }
}

