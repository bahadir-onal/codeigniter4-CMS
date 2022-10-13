<?php

return [
    'title' => 'Verification System Messages Translation File',
    'description' => '',
    'text' => [
        'group_id_required' => 'Group ID is required field. Please try again.',
        'group_id_numeric'  => 'Group ID can only contain numbers. Please try again.',

        'first_name_required'   => 'Namespace is a required field. Please try again.',
        'first_name_string'     => 'The namespace can only contain alphabetic characters. Please try again.',
        'first_name_min_length' => 'The name must contain at least 3 characters.',

        'sur_name_required'   => 'The last name field is a required field. Please try again.',
        'sur_name_string'     => 'The last name field can only contain alphabetic characters. Please try again.',
        'sur_name_min_length' => 'The surname must contain at least 3 characters.',

        'email_required'        => 'The email field is a required field. Please try again.',
        'email_valid_email'     => 'Your e-mail address is not legal. Please try again.',
        'email_valid_is_unique' => 'This Email address is being used by another user. Please try again.',


        'password_required'   => 'The password field is a required field. Please try again.',
        'password_min_length' => 'Password must be at least 3 characters. Please try again.',

        'password2_required'   => 'The password field is a required field. Please try again.',
        'password2_min_length' => 'Password must be at least 3 characters. Please try again.',
        'password2_matches'    => 'The passwords you entered do not match. Please try again.',

        'verify_key_required' => 'The authentication key is a required field. Please try again.',
        'verify_key_alpha'    => 'The verification key can only contain alphabetic characters. Please try again.',

        'verify_code_numeric'    =>  'The verification code can only contain numbers, please try again.',
        'verify_code_min_length' =>  'The verification code must be at least 6 characters. Please try again.',

        'status_required'  =>  'User status is a required field. Please try again.',

        'slug_required'        => 'The group slug value is a required field. Please try again.',
        'slug_unique'          => 'The group slug value must be unique. Please try again.',
        'title_required'       => 'Title name is a required field. Please try again.',
        'permissions_required' => 'You need to set group permissions. Please try again.',

        'code_required'   => 'Country code is a required field. Please try again.',
        'code_min_length' => 'Country code must be at least 2 characters. Please try again.',
        'code_is_unique'  => 'Country code has already been added. Please try again.',
        'flag_required'   => 'Country flag code is a required field. Please try again.',
        'flag_min_length' => 'Country flag code must be at least 2 characters. Please try again.',

        'image_name_required'     => 'Image name is a required field. Please try again.',
        'image_slug_required'     => 'Image slug is a required field. Please try again.',
        'image_URL_required'      => 'Image URL is a required field. Please try again.',
        'image_type_required'     => 'Image type is a required field. Please try again.',
        'image_size_required'     => 'Image size is a required field. Please try again.',
        'image_upload_input_name' => 'The image upload input does not meet the required conditions. Please try again.',
        'image_upload_mime_in'    => 'Image file extension can only be PNG, JPG and JPEG. Please try again.',
        'image_upload_max_size'   => 'Image file size is too large. Please try again.',

        'setting_skey_required'   => 'Settings is the key required field. Please try again.',
        'settins_svalue_required' => 'Settings value is a required field. Please try again.',

        'category_module_required'          => 'The category module is a required field. Please try again.',
        'category_module_alpha_numeric'     => 'The category module should consist of alphabets and numbers. Please try again.',
        'category_user_id_required'         => 'The user ID that created the category is a required field. Please try again.',
        'category_user_id_numeric'          => 'The user ID that creates the category must consist of numbers. Please try again.',
        'category_parent_id_numeric'        => 'The upper category ID must consist of numbers. Please try again.',
        'category_slug_required'            => 'The Category Slug value is a required field. Please try again.',
        'category_slug_alpha_numeric_punct' => 'Category Slug value can consist of letters, numbers and signs. Please try again.',
        'category_slug_is_unique'           => 'The Category Slug value is being used by another category Slug. Please try again.',
        'category_title_required'           => 'Category title is a required field. Please try again.',
        'category_title_string'             => 'The category title should only consist of letters. Please try again.',
        'category_description_string'       => 'The category description has to be text only. Please try again.',
        'category_keywords_string'          => 'The category description has to be text only. Please try again.',
        'category_image_numeric'            => 'Category image value should consist of numbers only. Please try again.',
        'category_status_alpha'             => 'Category status can only consist of alphabetic characters. Please try again.',
    ]
];