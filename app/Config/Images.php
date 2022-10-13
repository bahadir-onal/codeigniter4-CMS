<?php namespace Config;

use CodeIgniter\Config\BaseConfig;

class Images extends BaseConfig
{
	/**
	 * Default handler used if no other handler is specified.
	 *
	 * @var string
	 */
	public $defaultHandler = 'gd';

	/**
	 * The path to the image library.
	 * Required for ImageMagick, GraphicsMagick, or NetPBM.
	 *
	 * @var string
	 */
	public $libraryPath = '/usr/local/bin/convert';

	/**
	 * The available handler classes.
	 *
	 * @var \CodeIgniter\Images\Handlers\BaseHandler[]
	 */
	public $handlers = [
		'gd'      => \CodeIgniter\Images\Handlers\GDHandler::class,
		'imagick' => \CodeIgniter\Images\Handlers\ImageMagickHandler::class,
	];

    public $imageDelete = 'all';

    //TODO: Thumbnailları yap. hata var daha sonra onu çöz
    public $thumbnail = ['187x134'];

    public $imageCompressor = 0;

    public $watermark = [
        'status'     => false,
        'text'       => 'Bahadır Önal',
        'color'      => '#ffffff',
        'opacity'    => 0,
        'withShadow' => true,
        'fontSize'   => 500,
        'hAlign'     => 'center',
        'vAlign'     => 'bottom'
    ];

    public static $registrars = [
        'App\Controllers\Config'
    ];
}
