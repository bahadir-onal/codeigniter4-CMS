<?php namespace Config;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var array
	 */
	public $ruleSets = [
		\CodeIgniter\Validation\Rules::class,
		\CodeIgniter\Validation\FormatRules::class,
		\CodeIgniter\Validation\FileRules::class,
		\CodeIgniter\Validation\CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------

    public $register = [
        'first_name' => [
            'rules' => 'required|string|min_length[3]',
        ],
        'sur_name' => [
            'rules' => 'required|string|min_length[3]',
        ],
        'email' => [
            'rules' => 'required|valid_email',
        ],
        'password' => [
            'rules' => 'required|min_length[3]',
        ],
        'password2' => [
            'rules' => 'required|min_length[3]|matches[password]',
        ]
    ];

    public $forgot = [
        'email' => [
            'rules' => 'required|valid_email',
        ]
    ];

    public $resetPassword = [
        'password' => [
            'rules' => 'required|min_length[3]',
        ],
        'password2' => [
            'rules' => 'required|min_length[3]|matches[password]',
        ]
    ];

    public $login = [
        'email' => [
            'rules' => 'required|valid_email',
        ],
        'password' => [
            'rules' => 'required|min_length[3]',
        ]
    ];

    public $imageUpload = [
        'file' => [
            'rules'  => 'uploaded[file]|mime_in[file,image/png,image/jpg,image/jpeg]|max_size[file,100240]',
        ]
    ];
}