<?php

return [
    'title' => 'Doğrulama Sistemi Mesajları Çeviri Dosyası',
    'description' => 'Bu alanda ki veriler doğrulama sistemi için kullanılan metinleri içermektedir.',
    'text' => [
        'group_id_required' => 'Grup ID Zorunlu alandır. Lütfen tekrar deneyin.',
        'group_id_numeric'  => 'Grup ID sadece rakamlardan oluşabilir. Lütfen tekrar deneyin.',

        'first_name_required'   => 'İsim alanı zorunlu bir alandır. Lütfen tekrar deneyin.',
        'first_name_string'     => 'İsim alanı sadece alfabetik karakterlerden oluşabilir. Lütfen tekrar deneyin.',
        'first_name_min_length' => 'İsim en az 3 karakterden oluşmalıdır.',

        'sur_name_required'   => 'Soyisim alanı zorunlu bir alandır. Lütfen tekrar deneyin.',
        'sur_name_string'     => 'Soyisim alanı sadece alfabetik karakterlerden oluşabilir. Lütfen tekrar deneyin.',
        'sur_name_min_length' => 'Soyisim en az 3 karakterden oluşmalıdır.',

        'email_required'        => 'Eposta alanı zorunlu bir alandır. Lütfen tekrar deneyin.',
        'email_valid_email'     => 'Eposta adresiniz kurallara uygun değil. Lütfen tekrar deneyin.',
        'email_valid_is_unique' => 'Bu Eposta adresi başka bir kullanıcı tarafından kullanılıyor. Lütfen tekrar deneyiniz.',

        'password_required'   => 'Şifre alanı zorunlu bir alandır. Lütfen tekrar deneyin.',
        'password_min_length' => 'Şifre en az 3 karakterden oluşmalıdır. Lütfen tekrar deneyin.',

        'password2_required'   => 'Şifre alanı zorunlu bir alandır. Lütfen tekrar deneyin.',
        'password2_min_length' => 'Şifre en az 3 karakterden oluşmalıdır. Lütfen tekrar deneyin.',
        'password2_matches'    => 'Girmiş olduğunuz şifreler eşleşmiyor. Lütfen tekrar deneyin.',

        'verify_key_required' => 'Doğrulama anahtarı zorunlu alandır. Lütfen tekrar deneyin.',
        'verify_key_alpha'    =>  'Doğrulama anahtarı sadece alfabetik karakterlerden oluşabilir. Lütfen tekrar deneyin.',

        'verify_code_numeric'    =>  'Doğrulama kodu sadece rakamlardan oluşabilir lütfen tekrar deneyin.',
        'verify_code_min_length' =>  'Doğrulama kodu en az 6 karakterden oluşmalıdır. Lütfen tekrar deneyin.',

        'status_required'  =>  'Kullanıcı durumu zorunlu alandır. Lütfen tekrar deneyin.',

        'slug_required'        => 'Grup slug değeri zorunlu alandır. Lütfen tekrar deneyiniz.',
        'slug_unique'          => 'Grup slug değeri benzersiz olmalıdır. Lütfen tekrar deneyiniz.',
        'title_required'       => 'Başlık adı zorunlu alandır. Lütfen tekrar deneyiniz.',
        'permissions_required' => 'Grup izinlerini belirlemeniz gerekmektedir. Lütfen tekrar deneyiniz.',

        'code_required'   => 'Ülke kodu zorunlu alandır. Lütfen tekrar deneyiniz.',
        'code_min_length' => 'Ülke kodu en az 2 karakterli olmalıdır. Lütfen tekrar deneyiniz.',
        'code_is_unique'  => 'Ülke kodu daha önce eklenmiş. Lütfen tekrar deneyiniz.',
        'flag_required'   => 'Ülke bayrak kodu zorunlu alandır. Lütfen tekrar deneyiniz.',
        'flag_min_length' => 'Ülke bayrak kodu en az 2 karakterli olmalıdır. Lütfen tekrar deneyiniz.',

        'image_name_required'     => 'Resim adı zorunlu alandır. Lütfen tekrar deneyiniz.',
        'image_slug_required'     => 'Resim slug zorunlu alandır. Lütfen tekrar deneyiniz.',
        'image_URL_required'      => 'Resim URL zorunlu alandır. Lütfen tekrar deneyiniz.',
        'image_type_required'     => 'Resim türü zorunlu alandır. Lütfen tekrar deneyiniz.',
        'image_size_required'     => 'Resim boyutu zorunlu alandır. Lütfen tekrar deneyiniz.',
        'image_upload_input_name' => 'Resim yükleme inputu gerekli şartları sağlamıyor. Lütfen tekrar deneyiniz.',
        'image_upload_mime_in'    => 'Resim dosya uzantısı sadece PNG, JPG ve JPEG olabilir. Lütfen tekrar deneyiniz.',
        'image_upload_max_size'   => 'Resim dosya boyutu çok büyük. Lürfen tekrar deneyiniz.',

        'setting_skey_required'   => 'Ayarlar anahtar zorunlu alandır. Lütfen tekrar deneyiniz',
        'settins_svalue_required' => 'Ayarlar değer zorunlu alandır. Lütfen tekrar deneyiniz.',

        'category_module_required'          => 'Kategori moddülü zorunlu bir alandır. Lütfen tekrar deneyiniz.',
        'category_module_alpha_numeric'     => 'Kategori moddülü alfabetik ve rakamlardan oluşmalıdır. Lütfen tekrar deneyiniz.',
        'category_user_id_required'         => 'Kategori oluşturan kullanıcı ID zorunlu alandır. Lütfen tekrar deneyiniz.',
        'category_user_id_numeric'          => 'Kategori oluşturan kullanıcı ID rakamlardan oluşmalıdır. Lütfen tekrar deneyiniz.',
        'category_parent_id_numeric'        => 'Üst kategori ID rakamlardan oluşmalıdır. Lütfen tekrar deneyiniz.',
        'category_slug_required'            => 'Kategori Slug değeri zorunlu alandır. Lütfen tekrar deneyiniz.',
        'category_slug_alpha_numeric_punct' => 'Kategori Slug değeri harf, rakam ve işaretlerden oluşabilir. Lütfen tekrar deneyiniz.',
        'category_slug_is_unique'           => 'Kategori Slug değeri bir başka kategori Slug tarafından kullanılıyor. Lütfen tekrar deneyiniz.',
        'category_title_required'           => 'Kategori başlığı zorunlu alandır. Lütfen tekrar deneyiniz.',
        'category_title_string'             => 'Kategori başlığı sadece harflerden oluşmalıdır. Lütfen tekrar deneyiniz.',
        'category_description_string'       => 'Kategori açıklaması sadece metin olmak zorunda. Lütfen tekrar deneyiniz.',
        'category_keywords_string'          => 'Kategori açıklaması sadece metin olmak zorunda. Lütfen tekrar deneyiniz.',
        'category_image_numeric'            => 'Kategori resim değeri sadece rakamlardan oluşmalıdır. Lütfen tekrar deneyiniz.',
        'category_status_alpha'             => 'Kategori durumu sadece alfabetik karakterlerden oluşabilir. Lütfen tekrar deneyiniz.',
    ]
];