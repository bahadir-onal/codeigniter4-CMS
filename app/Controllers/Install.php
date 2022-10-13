<?php


namespace App\Controllers;

use App\Controllers\BaseController;

class Install extends BaseController
{
    public function createTable()
    {
        $migrate = \Config\Services::migrations();
        $migrate->latest();
    }

    public function createAdmin()
    {
        $seeder = \Config\Database::seeder();
        $seeder->call('App\Database\Seeds\Settings\SiteSeeder');
        $seeder->call('App\Database\Seeds\GroupSeeder');
        $seeder->call('App\Database\Seeds\AdminSeeder');
        $seeder->call('App\Database\Seeds\LanguageSeeder');
        $seeder->call('App\Database\Seeds\Settings\SystemSeeder');
        $seeder->call('App\Database\Seeds\Settings\MailSeeder');
        $seeder->call('App\Database\Seeds\Settings\CacheSeeder');
        $seeder->call('App\Database\Seeds\Settings\ImageSeeder');
        $seeder->call('App\Database\Seeds\Settings\WebmasterSeeder');
        $seeder->call('App\Database\Seeds\Settings\FirebaseSeeder');
        $seeder->call('App\Database\Seeds\Settings\AutoShareSeeder');
        $seeder->call('App\Database\Seeds\Settings\ContactSeeder');
        $seeder->call('App\Database\Seeds\ThemeSeeder');
    }

    public function createDemo()
    {
        $seeder = \Config\Database::seeder();
        $seeder->call('App\Database\Seeds\Demo\UserSeeder');
    }
}