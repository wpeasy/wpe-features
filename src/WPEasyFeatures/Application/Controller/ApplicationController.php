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
        $assetsURL = ApplicationModel::$config['assetsURL'];
		self::_common_enqueue_scripts();
        wp_register_script('wpe-features-frontend', $assetsURL . 'js/frontend.bundle.js',['wpe-features-common'], false, true );

        wp_register_style('wpe-features-frontend', $assetsURL . 'css/frontend.style.css', ['wpe-features-common'] );
        //Enqueue on evey page
        wp_enqueue_style('wpe-features-frontend');
	}

	static function admin_enqueue_scripts()
	{
        $assetsURL = ApplicationModel::$config['assetsURL'];
        self::_common_enqueue_scripts();
        wp_register_script('wpe-features-admin', $assetsURL . 'js/admin.bundle.js',['wpe-features-common'], false, true );

        wp_register_style('wpe-features-admin', $assetsURL . 'css/admin.style.css', ['wpe-features-common']);
        //Enqueue on evey page
        wp_enqueue_style('wpe-features-admin');
	}

	private static function _common_enqueue_scripts()
	{
		$assetsURL = ApplicationModel::$config['assetsURL'];
		wp_register_script('wpe-features-vendor', $assetsURL . 'js/vendor.bundle.js',['jquery'], false, true );
		wp_register_script('wpe-features-common', $assetsURL . 'js/common.bundle.js', ['wpe-features-vendor'], false, true);

		//Loads on every page so css is at top
        wp_register_style('wpe-features-vendor', $assetsURL . 'css/vendor.style.css');
        wp_register_style('wpe-features-common', $assetsURL . 'css/common.style.css', ['wpe-features-vendor']);
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