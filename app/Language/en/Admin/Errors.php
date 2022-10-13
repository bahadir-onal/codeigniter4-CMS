<?php

return [
    'title' => 'Error Messages Translation File',
    'description' => '',
    'text' => [
        'email_send_faild'          => 'An error occurred while sending mail.',
        'user_info_failed'          => 'Login failed. Please check your information.',
        'password_update_faild'     => 'An error occurred while updating the password. Please try again.',
        'user_not_found'            => 'No such user was found.',
        'user_login_pending_failed' => 'You must confirm your account. Please check your email address.',
        'user_login_passive_failed' => 'You cannot log into your account. Please contact the administrator',
        'not_login_permit'          => 'You are not authorized to login.',
        'delete_error'              => 'Deletion failed.',
        'delete_admin_group_error'  => 'You cannot delete the Root Administrator group. Please try again.',
        'delete_group_with_user'    => 'There are users connected to the group. You cannot delete. Please try again.',
        'undo_delete_error'         => 'An error occurred during the rollback operation. Please try again.',
        'delete_admin_user_error'   => 'You cannot delete admins.',
        'purge_delete_error'        => 'An error occurred during the permanent deletion process. Please try again.',
        'user_status_change_error'  => 'An error occurred while changing the user state.'
    ]
];