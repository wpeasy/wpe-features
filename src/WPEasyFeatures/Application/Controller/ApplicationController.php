<?php


namespace WPEasyFeatures\Application\Controller;

use WPEasyFeatures\Application\Model\ApplicationModel;
use WPEasyLibrary\Helpers\View\ViewHelper;
use WPEasyLibrary\WordPress\WPEasyApplication;

class ApplicationController {

	private static $_init;

	static function init($config) {
		if ( self::$_init ) {
			return;
		}
		self::$_init  = true;
		ApplicationModel::$config = $config;

		add_action( 'admin_menu', [ __CLASS__, 'admin_menu' ] );
		add_action( 'wp_enqueue_scripts', [ __CLASS__, 'wp_enqueue_scripts' ] );
		add_action( 'admin_enqueue_scripts', [ __CLASS__, 'admin_enqueue_scripts' ] );
	}

	static function wp_enqueue_scripts()
	{
		self::_common_enqueue_scripts();
	}

	static function admin_enqueue_scripts()
	{
		self::_common_enqueue_scripts();
	}

	private static function _common_enqueue_scripts()
	{
		$assetsURL = ApplicationModel::$config['assetsURL'];
		wp_register_script('wpe-features-vendor', $assetsURL . 'js/vendor.bundle.js',['jquery'], false, true );
		wp_enqueue_script('wpe-features-common', $assetsURL . 'js/wpe-common.bundle.js', ['wpe-features-vendor'], false, true);

		wp_enqueue_style('wpe-features-common', $assetsURL . 'css/wpe-common.style.css');
	}



	static function registerModule($controllerClass, $moduleConfig)
	{
		ApplicationModel::$loadedModules[$controllerClass] = $moduleConfig;
	}

	static function admin_menu()
	{
		$config = ApplicationModel::$config['adminMenu'];
		add_submenu_page(
			WPEasyApplication::MENU_PAGE_SLUG,
			$config['pageTitle'],
			$config['menuTitle'],
			$config['capability'],
			$config['slug'],
			[__CLASS__, 'admin_menu_callback']
		);
	}

	static function admin_menu_callback()
	{
		wp_enqueue_script( 'wpe-lib-admin');
		wp_enqueue_style('wpe-lib-admin');

		ViewHelper::getView(dirname(__DIR__) . '/View/applicationView.phtml',[], true);
	}
}