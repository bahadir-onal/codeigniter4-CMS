<?php

namespace Config;

use \CodeIgniter\Config\BaseConfig;

class Permissions extends BaseConfig
{
    public $list = [
        'admin_login'       => 'Admin/Permissions.text.admin_login',

        'group_listing'      => 'Admin/Permissions.text.group_listing',
        'group_create'       => 'Admin/Permissions.text.group_create',
        'group_edit'         => 'Admin/Permissions.text.group_edit',
        'group_delete'       => 'Admin/Permissions.text.group_delete',
        'group_undo_delete'  => 'Admin/Permissions.text.group_undo_delete',
        'group_purge_delete' => 'Admin/Permissions.text.group_purge_delete',

        'user_listing'      => 'Admin/Permissions.text.user_listing',
        'user_create'       => 'Admin/Permissions.text.user_create',
        'user_delete'       => 'Admin/Permissions.text.user_delete',
        'user_undo_delete'  => 'Admin/Permissions.text.user_undo_delete',
        'user_purge_delete' => 'Admin/Permissions.text.user_purge_delete',
        'user_edit'         => 'Admin/Permissions.text.user_edit',
        'user_status'       => 'Admin/Permissions.text.user_status',

        'image_modal'   => 'Admin/Permissions.text.image_modal',
        'image_upload'  => 'Admin/Permissions.text.image_upload',
        'image_listing' => 'Admin/Permissions.text.image_listing',
        'image_delete'  => 'Admin/Permissions.text.image_delete',

        'setting_site'       => 'Admin/Permissions.text.setting_site',
        'setting_system'     => 'Admin/Permissions.text.setting_system',
        'setting_email'      => 'Admin/Permissions.text.setting_email',
        'setting_cache'      => 'Admin/Permissions.text.setting_cache',
        'setting_image'      => 'Admin/Permissions.text.setting_image',
        'setting_webmaster'  => 'Admin/Permissions.text.setting_webmaster',
        'setting_firebase'   => 'Admin/Permissions.text.setting_firebase',
        'setting_autoshare'  => 'Admin/Permissions.text.setting_autoshare',
        'setting_contact'    => 'Admin/Permissions.text.setting_contact',

        'category_create'        => 'Admin/Permissions.text.category_create',
        'category_edit'          => 'Admin/Permissions.text.category_edit',
        'category_listing'       => 'Admin/Permissions.text.category_listing',
        'category_status'        => 'Admin/Permissions.text.category_status',
        'category_delete'        => 'Admin/Permissions.text.category_delete',
        'category_undo_delete'   => 'Admin/Permissions.text.category_undo_delete',
        'category_purge_delete'  => 'Admin/Permissions.text.category_purge_delete',

        'field_add'                    => 'Admin/Permissions.text.field_add',
        'blog_listing'                 => 'Admin/Permissions.text.blog_listing',
        'blog_create'                  => 'Admin/Permissions.text.blog_create',
        'blog_edit'                    => 'Admin/Permissions.text.blog_edit',
        'blog_status'                  => 'Admin/Permissions.text.blog_status',
        'blog_delete'                  => 'Admin/Permissions.text.blog_delete',
        'blog_undo_delete'             => 'Admin/Permissions.text.blog_undo_delete',
        'blog_purge_delete'            => 'Admin/Permissions.text.blog_purge_delete',
        'admin_blog_listing_all'       => 'Admin/Permissions.text.admin_blog_listing_all',
        'admin_blog_edit_all'          => 'Admin/Permissions.text.admin_blog_edit_all',
        'admin_blog_status_all'        => 'Admin/Permissions.text.admin_blog_status_all',
        'admin_blog_delete_all'        => 'Admin/Permissions.text.admin_blog_delete_all',
        'admin_blog_undo-delete_all'   => 'Admin/Permissions.text.admin_blog_undo-delete_all',
        'admin_blog_purge-delete_all'  => 'Admin/Permissions.text.admin_blog_purge-delete_all',

        'language_listing'      => 'Admin/Permissions.text.language_listing',
        'language_create'       => 'Admin/Permissions.text.language_create',
        'language_edit'         => 'Admin/Permissions.text.language_edit',
        'language_status'       => 'Admin/Permissions.text.language_status',
        'language_default'      => 'Admin/Permissions.text.language_default',
        'language_delete'       => 'Admin/Permissions.text.language_delete',
        'language_undo_delete'  => 'Admin/Permissions.text.language_undo_delete',
        'language_purge_delete' => 'Admin/Permissions.text.language_purge_delete',

        'comment_status'                 => 'Admin/Permissions.text.comment_status',
        'comment_delete'                 => 'Admin/Permissions.text.comment_delete',
        'comment_undo_delete'            => 'Admin/Permissions.text.comment_undo_delete',
        'comment_purge_delete'           => 'Admin/Permissions.text.comment_purge_delete',
        'comment_reply'                  => 'Admin/Permissions.text.comment_reply',
        'comment_listing'                => 'Admin/Permissions.text.comment_listing',
        'admin_comment_status_all'       => 'Admin/Permissions.text.admin_comment_status_all',
        'admin_comment_delete_all'       => 'Admin/Permissions.text.admin_comment_delete_all',
        'admin_comment_undo_delete_all'  => 'Admin/Permissions.text.admin_comment_undo_delete_all',
        'admin_comment_purge_delete_all' => 'Admin/Permissions.text.admin_comment_purge_delete_all',
        'admin_comment_reply_all'        => 'Admin/Permissions.text.admin_comment_reply_all',
        'admin_comment_listing_all'      => 'Admin/Permissions.text.admin_comment_listing_all',

        'menu_listing'      => 'Admin/Permissions.text.menu_listing',
        'menu_create'       => 'Admin/Permissions.text.menu_create',
        'menu_delete'       => 'Admin/Permissions.text.menu_delete',
        'menu_undo_delete'  => 'Admin/Permissions.text.menu_undo_delete',
        'menu_purge_delete' => 'Admin/Permissions.text.menu_purge_delete',

        'message_listing'      => 'Admin/Permissions.text.message_listing',
        'message_detail'       => 'Admin/Permissions.text.message_detail',
        'message_reply'        => 'Admin/Permissions.text.message_reply',
        'message_delete'       => 'Admin/Permissions.text.message_delete',
        'message_undo_delete'  => 'Admin/Permissions.text.message_undo_delete',
        'message_purge_delete' => 'Admin/Permissions.text.message_purge_delete',

        'translation_listing'         => 'Admin/Permissions.text.translation_listing',
        'translation_file_list'       => 'Admin/Permissions.text.translation_file_list',
        'admin_translation_translate' => 'Admin/Permissions.text.admin_translation_translate',

        'theme_listing'              => 'Admin/Permissions.text.theme_listing',
        'theme_delete'               => 'Admin/Permissions.text.theme_delete',
        'theme_active'               => 'Admin/Permissions.text.theme_active',
        'theme_setting'              => 'Admin/Permissions.text.theme_setting',
        'admin_theme_setting_update' => 'Admin/Permissions.text.admin_theme_setting_update',

        'page_listing'                 => 'Admin/Permissions.text.page_listing',
        'page_create'                  => 'Admin/Permissions.text.page_create',
        'page_edit'                    => 'Admin/Permissions.text.page_edit',
        'page_status'                  => 'Admin/Permissions.text.page_status',
        'page_delete'                  => 'Admin/Permissions.text.page_delete',
        'page_undo_delete'             => 'Admin/Permissions.text.page_undo_delete',
        'page_purge_delete'            => 'Admin/Permissions.text.page_purge_delete',
        'admin_page_listing_all'       => 'Admin/Permissions.text.admin_page_listing_all',
        'admin_page_edit_all'          => 'Admin/Permissions.text.admin_page_edit_all',
        'admin_page_status_all'        => 'Admin/Permissions.text.admin_page_status_all',
        'admin_page_delete_all'        => 'Admin/Permissions.text.admin_page_delete_all',
        'admin_page_undo_delete_all'   => 'Admin/Permissions.text.admin_page_undo_delete_all',
        'admin_page_purge_delete_all'  => 'Admin/Permissions.text.admin_page_purge_delete_all',
    ];
}