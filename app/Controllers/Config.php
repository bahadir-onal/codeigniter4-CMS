<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SettingModel;
use App\Models\ThemeModel;
use Config\Services;

class Config extends BaseController
{
    public static function Site()
    {
        try {
            $model = new SettingModel();

            helper('bo');
            $setting = bo_cache('site_setting', function () use($model) {
                return $model->where('skey', 'site')->first();
            });

            if ($setting){
                return [
                    'title'       => $setting->getValue('title', true),
                    'description' => $setting->getValue('description', true),
                    'keywords'    => $setting->getValue('keywords', true),
                    'headerLogo'  => $setting->getValue('headerLogo'),
                    'footerLogo'  => $setting->getValue('footerLogo'),
                    'mobileLogo'  => $setting->getValue('mobileLogo'),
                    'favicon'     => $setting->getValue('favicon'),
                ];
            }
            return [];

        } catch (\Exception $exception){
            return [];
        }
    }

    public static function System()
    {
        try {
            $model = new SettingModel();

            helper('bo');
            $setting = bo_cache('system_setting', function () use($model) {
                return $model->where('skey', 'system')->first();
            });

            if ($setting){
                return [
                    'maintenance'  => $setting->getValue('maintenance'),
                    'register'     => $setting->getValue('register'),
                    'login'        => $setting->getValue('login'),
                    'emailVerify'  => $setting->getValue('emailVerify'),
                    'defaultGroup' => $setting->getValue('defaultGroup'),
                    'perPageList'  => explode(',', $setting->getValue('perPageList')),
                    'modules'      => $setting->getValue('modules', true)
                ];
            }
            return [];

        } catch (\Exception $exception){
            return [];
        }
    }

    public static function Email()
    {
        try {
            $model = new SettingModel();

            helper('bo');
            $setting = bo_cache('email_setting', function () use($model) {
                return $model->where('skey', 'email')->first();
            });

            if ($setting){
                return [
                    'protocol'   => $setting->getValue('protocol'),
                    'fromEmail'  => $setting->getValue('fromEmail'),
                    'fromName'   => $setting->getValue('fromName'),
                    'SMTPHost'   => $setting->getValue('SMTPHost'),
                    'SMTPUser'   => $setting->getValue('SMTPUser'),
                    'SMTPPass'   => $setting->getValue('SMTPPass'),
                    'SMTPPort'   => $setting->getValue('SMTPPort'),
                    'SMTPCrypto' => $setting->getValue('SMTPCrypto'),
                    'mailType'   => $setting->getValue('mailType'),
                ];
            }
            return [];

        } catch (\Exception $exception){
            return [];
        }
    }

//    public static function Cache()
//    {
//        try {
//            $model = new SettingModel();
//            helper('bo');
//
//            if(session()->has('cache_conf')){
//                $config = session()->getTempdata('cache_conf');
//                $cache = Services::cache($config);
//                if (!$setting = $cache->get('cache_setting')){
//                    $setting = $model->where('skey', 'cache')->first();
//                    $cache->save('cache_setting', $setting, $config->raw_time);
//                }
//            }else{
//                $setting = $model->where('skey', 'cache')->first();
//            }
//
//            if ($setting){
//                return [
//                    'html'      => $setting->getValue('html'),
//                    'raw'       => $setting->getValue('raw'),
//                    'html_time' => $setting->getValue('html_time'),
//                    'raw_time'  => $setting->getValue('raw_time'),
//                    'handler'   => $setting->getValue('handler'),
//                    'prefix'    => $setting->getValue('prefix'),
//                    'memcached' => $setting->getValue('memcached', true),
//                    'redis'     => $setting->getValue('redis', true),
//                ];
//            }
//            return [];
//        }catch (\Exception $exception){
//            return [];
//        }
//
//    }

    public static function Images()
    {
        try {
            $model = new SettingModel();

            helper('bo');
            $setting = bo_cache('image_setting', function () use($model) {
                return $model->where('skey', 'image')->first();
            });

            if ($setting){
                return [
                    'defaultHandler'  => $setting->getValue('defaultHandler'),
                    'thumbnail'       => explode(',', $setting->getValue('thumbnail')),
                    'imageCompressor' => $setting->getValue('imageCompressor'),
                    'imageDelete'     => $setting->getValue('imageDelete'),
                    'watermark'       => $setting->getValue('watermark', true),
                ];
            }
            return [];

        } catch (\Exception $exception){
            return [];
        }
    }

    public static function Webmaster()
    {
        try {
            $model = new SettingModel();

            helper('bo');
            $setting = bo_cache('webmaster_setting', function () use($model) {
                return $model->where('skey', 'webmaster')->first();
            });

            if ($setting){
                return [
                    'googleVerify'     => $setting->getValue('googleVerify'),
                    'googleAnalytics'  => $setting->getValue('googleAnalytics'),
                    'yandexVerify'     => $setting->getValue('yandexVerify'),
                    'yandexMetrika'    => $setting->getValue('yandexMetrika')
                ];
            }
            return [];

        } catch (\Exception $exception){
            return [];
        }
    }

    public static function Firebase()
    {
        try {
            $model = new SettingModel();

            helper('bo');
            $setting = bo_cache('firebase_setting', function () use($model) {
                return $model->where('skey', 'firebase')->first();
            });

            if ($setting){
                return [
                    'status'            => $setting->getValue('status'),
                    'serverKey'         => $setting->getValue('serverKey'),
                    'apiKey'            => $setting->getValue('apiKey'),
                    'authDomain'        => $setting->getValue('authDomain'),
                    'databaseURL'       => $setting->getValue('databaseURL'),
                    'projectId'         => $setting->getValue('projectId'),
                    'storageBucket'     => $setting->getValue('storageBucket'),
                    'messagingSenderId' => $setting->getValue('messagingSenderId'),
                    'appId'             => $setting->getValue('appId'),
                    'measurementId'     => $setting->getValue('measurementId'),
                ];
            }
            return [];

        } catch (\Exception $exception){
            return [];
        }
    }

    public static function AutoShare()
    {
        try {
            $model = new SettingModel();

            helper('bo');
            $setting = bo_cache('autoshare_setting', function () use($model) {
                return $model->where('skey', 'autoshare')->first();
            });

            if ($setting){
                return [
                    'twitter'          => $setting->getValue('twitter'),
                    'facebook'         => $setting->getValue('facebook'),
                    'linkedin'         => $setting->getValue('linkedin'),
                    'pinterest'        => $setting->getValue('pinterest'),
                    'medium'           => $setting->getValue('medium'),
                    'googleMyBusiness' => $setting->getValue('googleMyBusiness')
                ];
            }
            return [];

        } catch (\Exception $exception){
            return [];
        }
    }

    public static function Contact()
    {
        try {
            $model = new SettingModel();

            helper('bo');
            $setting = bo_cache('contact_setting', function () use($model){
                return $model->where('skey', 'contact')->first();
            });

            $settings = $setting->getValue(null, true);

            if($setting){
                return [
                    'offices' => $settings,
                ];
            }
            return [];
        }catch (\Exception $exception){
            return [];
        }
    }

    public static function Theme()
    {
        try {
            $model = new ThemeModel();

            helper('bo');
            $setting = bo_cache('theme_setting', function () use($model){
                return $model->where('status', STATUS_ACTIVE)->first();
            });

            if($setting){
                return $setting->getSetting(null, true);
            }
            return [];
        }catch (\Exception $exception){
            return [];
        }
    }
}