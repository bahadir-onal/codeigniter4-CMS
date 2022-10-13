<?php

$routes->group('admin', function ($routes){

    $routes->match(['get','post'],'login', 'Backend\Login::index', ['as' => 'admin_login']);
    $routes->get('logout', 'Backend\Login::logout',['as' => 'admin_logout']);
    $routes->match(['get','post'],'register', 'Backend\Register::index', ['as' => 'admin_register']);
    $routes->match(['get','post'],'forgot-password', 'Backend\Forgot::index', ['as' => 'admin_forgot_password']);
    $routes->match(['get','post'],'reset-password', 'Backend\Forgot::resetPassword', ['as' => 'admin_reset_password']);
    $routes->get('permissions/failed','Backend\Permissions::error',['as' => 'admin_permissions_error']);
    $routes->group('verification', function ($routes){

        $routes->get('account/(:segment)', 'Backend\Verification::account/$1', ['as' => 'admin_account_verify']);
        $routes->get('forgot-password/(:segment)', 'Backend\Verification::forgot/$1', ['as' => 'admin_forgot_verify']);

    });
    $routes->get('dashboard', 'Backend\Dashboard::index', ['as' => 'admin_dashboard']);

    $routes->group('group', function ($routes){

        $routes->get('listing(:any)','Backend\Groups::listing$1',['as' => 'admin_group_listing']);
        $routes->match(['get','post'],'create','Backend\Groups::create',['as' => 'admin_group_create']);
        $routes->match(['get','post'],'edit/(:num)','Backend\Groups::edit/$1',['as' => 'admin_group_edit']);
        $routes->post('delete','Backend\Groups::delete',['as' => 'admin_group_delete']);
        $routes->post('undo-delete','Backend\Groups::undoDelete',['as' => 'admin_group_undo_delete']);
        $routes->post('purge-delete','Backend\Groups::purgeDelete',['as' => 'admin_group_purge_delete']);

    });

    $routes->group('user',function ($routes){

        $routes->get('listing(:any)','Backend\Users::listing$1',['as' => 'admin_users_listing']);
        $routes->post('delete', 'Backend\Users::delete', ['as' => 'admin_users_delete']);
        $routes->post('status', 'Backend\Users::status', ['as' => 'admin_users_status']);
        $routes->post('undo-delete','Backend\Users::undoDelete',['as' => 'admin_users_undo_delete']);
        $routes->post('purge-delete','Backend\Users::purgeDelete',['as' => 'admin_users_purge_delete']);
        $routes->match(['get','post'],'create','Backend\Users::create',['as' => 'admin_users_create']);
        $routes->match(['get','post'],'edit/(:num)','Backend\Users::edit/$1',['as' => 'admin_users_edit']);
    });

    $routes->group('image',function ($routes){

        $routes->get('modal/single','Backend\Images::singleImagePickerModal',['as' => 'admin_image_single_modal']);
        $routes->get('modal/multi','Backend\Images::multiImagePickerModal',['as' => 'admin_image_multi_modal']);
        $routes->post('upload','Backend\Images::upload',['as' => 'admin_image_upload']);
        $routes->get('listing','Backend\Images::listing',['as' => 'admin_image_listing']);
        $routes->post('delete', 'Backend\Images::delete', ['as' => 'admin_image_delete']);
    });

    $routes->group('setting',function ($routes){

        $routes->get('home','Backend\Settings::home',['as' => 'admin_setting_home']);
        $routes->match(['get','post'],'site','Backend\Settings::site',['as' => 'admin_setting_site']);
        $routes->match(['get','post'],'system','Backend\Settings::system',['as' => 'admin_setting_system']);
        $routes->match(['get','post'],'email','Backend\Settings::email',['as' => 'admin_setting_email']);
        $routes->match(['get','post'],'cache','Backend\Settings::cache',['as' => 'admin_setting_cache']);
        $routes->match(['get','post'],'image','Backend\Settings::image',['as' => 'admin_setting_image']);
        $routes->match(['get','post'],'webmaster','Backend\Settings::webmaster',['as' => 'admin_setting_webmaster']);
        $routes->match(['get','post'],'firebase','Backend\Settings::firebase',['as' => 'admin_setting_firebase']);
        $routes->match(['get','post'],'autoshare','Backend\Settings::autoshare',['as' => 'admin_setting_autoshare']);
        $routes->match(['get','post'],'contact','Backend\Settings::contact',['as' => 'admin_setting_contact']);
    });

    $routes->group('category',function ($routes){
        $routes->get('listing(:any)','Backend\Category::listing$1',['as' => 'admin_category_listing']);
        $routes->match(['get','post'],'create','Backend\Category::create',['as' => 'admin_category_create']);
        $routes->match(['get','post'],'edit/(:num)','Backend\Category::edit/$1',['as' => 'admin_category_edit']);
        $routes->post('status', 'Backend\Category::status', ['as' => 'admin_category_status']);
        $routes->post('delete', 'Backend\Category::delete', ['as' => 'admin_category_delete']);
        $routes->post('undo-delete','Backend\Category::undoDelete',['as' => 'admin_category_undo_delete']);
        $routes->post('purge-delete','Backend\Category::purgeDelete',['as' => 'admin_category_purge_delete']);
    });

    $routes->group('field',function ($routes){
        $routes->get('add', 'Backend\CustomField::add', ['as' => 'admin_field_add']);
    });

    $routes->group('blog',function ($routes){
        $routes->match(['get','post'],'create', 'Backend\Blog::create', ['as' => 'admin_blog_create']);
        $routes->match(['get','post'],'edit/(:num)','Backend\Blog::edit/$1',['as' => 'admin_blog_edit']);
        $routes->get('listing(:any)','Backend\Blog::listing$1',['as' => 'admin_blog_listing']);
        $routes->post('status', 'Backend\Blog::status', ['as' => 'admin_blog_status']);
        $routes->post('delete', 'Backend\Blog::delete', ['as' => 'admin_blog_delete']);
        $routes->post('undo-delete','Backend\Blog::undoDelete',['as' => 'admin_blog_undo_delete']);
        $routes->post('purge-delete','Backend\Blog::purgeDelete',['as' => 'admin_blog_purge_delete']);
    });

    $routes->group('language',function ($routes){
        $routes->get('listing(:any)','Backend\Language::listing$1',['as' => 'admin_language_listing']);
        $routes->match(['get','post'],'create', 'Backend\Language::create', ['as' => 'admin_language_create']);
        $routes->match(['get','post'],'edit/(:num)','Backend\Language::edit/$1',['as' => 'admin_language_edit']);
        $routes->post('status', 'Backend\Language::status', ['as' => 'admin_language_status']);
        $routes->post('default', 'Backend\Language::default', ['as' => 'admin_language_default']);
        $routes->post('delete', 'Backend\Language::delete', ['as' => 'admin_language_delete']);
        $routes->post('undo-delete','Backend\Language::undoDelete',['as' => 'admin_language_undo_delete']);
        $routes->post('purge-delete','Backend\Language::purgeDelete',['as' => 'admin_language_purge_delete']);
        $routes->get('change/(:alpha)', 'Backend\Language::change/$1', ['as' => 'admin_language_change']);
    });

    $routes->group('comment',function ($routes){
        $routes->get('listing(:any)','Backend\Comment::listing$1',['as' => 'admin_comment_listing']);
        $routes->post('status', 'Backend\Comment::status', ['as' => 'admin_comment_status']);
        $routes->post('delete', 'Backend\Comment::delete', ['as' => 'admin_comment_delete']);
        $routes->get('reply-modal', 'Backend\Comment::replyModal', ['as' => 'admin_comment_reply_modal']);
        $routes->post('reply', 'Backend\Comment::reply', ['as' => 'admin_comment_reply']);
        $routes->post('undo-delete','Backend\Comment::undoDelete',['as' => 'admin_comment_undo_delete']);
        $routes->post('purge-delete','Backend\Comment::purgeDelete',['as' => 'admin_comment_purge_delete']);
    });

    $routes->group('menu',function ($routes){
        $routes->get('listing(:any)','Backend\Menu::listing$1',['as' => 'admin_menu_listing']);
        $routes->post('create', 'Backend\Menu::create', ['as' => 'admin_menu_create']);
        $routes->post('delete', 'Backend\Menu::delete', ['as' => 'admin_menu_delete']);
        $routes->post('undo-delete','Backend\Menu::undoDelete',['as' => 'admin_menu_undo_delete']);
        $routes->post('purge-delete','Backend\Menu::purgeDelete',['as' => 'admin_menu_purge_delete']);
        $routes->match(['get','post'],'edit/(:num)','Backend\Menu::edit/$1',['as' => 'admin_menu_edit']);
        $routes->post('select','Backend\Menu::getMenu',['as' => 'admin_menu_select']);
    });

    $routes->group('message',function ($routes){
        $routes->get('listing(:any)','Backend\Messages::listing$1',['as' => 'admin_message_listing']);
        $routes->post('detail','Backend\Messages::detail',['as' => 'admin_message_detail']);
        $routes->post('mark-all-read','Backend\Messages::markAllRead',['as' => 'admin_message_all_read']);
        $routes->post('reply','Backend\Messages::reply',['as' => 'admin_message_reply']);
        $routes->post('delete', 'Backend\Messages::delete', ['as' => 'admin_message_delete']);
        $routes->post('undo-delete','Backend\Messages::undoDelete',['as' => 'admin_message_undo_delete']);
        $routes->post('purge-delete','Backend\Messages::purgeDelete',['as' => 'admin_message_purge_delete']);
    });

    $routes->group('translation',function ($routes){
        $routes->get('listing','Backend\Translation::listing',['as' => 'admin_translation_listing']);
        $routes->post('folder-list','Backend\Translation::folderList',['as' => 'admin_translation_folder_listing']);
        $routes->get('files/(:any)/(:any)','Backend\Translation::files/$1/$2',['as' => 'admin_translation_files']);
        $routes->match(['get','post'],'translate/(:any)/(:any)/(:any)','Backend\Translation::translate/$1/$2/$3',['as' => 'admin_translation_translate']);
    });

    $routes->group('theme',function ($routes){
        $routes->get('listing','Backend\Themes::listing',['as' => 'admin_theme_listing']);
        $routes->get('delete/(:any)','Backend\Themes::delete/$1', ['as' => 'admin_theme_delete']);
        $routes->get('active/(:any)','Backend\Themes::active/$1', ['as' => 'admin_theme_active']);
        $routes->match(['get','post'],'setting','Backend\Themes::setting', ['as' => 'admin_theme_setting']);
    });

    $routes->group('page',function ($routes){
        $routes->get('listing(:any)','Backend\Page::listing$1',['as' => 'admin_page_listing']);
        $routes->match(['get','post'],'create', 'Backend\Page::create', ['as' => 'admin_page_create']);
    });
});



