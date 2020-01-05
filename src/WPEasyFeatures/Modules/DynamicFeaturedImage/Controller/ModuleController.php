<?php


namespace WPEasyFeatures\Modules\DynamicFeaturedImage\Controller;


use WPEasyFeatures\Application\Controller\ApplicationController;
use WPEasyLibrary\Helpers\View\ViewHelper;
use WPEasyLibrary\Interfaces\IWordPressModule;

class ModuleController implements IWordPressModule {

	static $moduleConfig;

	/********************************
	 * Interface Methods
	 */
	static function init() {
		// TODO: Implement init() method.
		self::$moduleConfig = require_once dirname( __DIR__ ) . '/config.php';
		ApplicationController::registerModule( __CLASS__, self::$moduleConfig );
		self::_initShortcodes();
	}


	static function getDashboardView() {
		return ViewHelper::getView( dirname( __DIR__ ) . '/View/dashboardView.phtml' );
	}

	static function getDescription() {
		// TODO: Implement getDescription() method.
	}

	static function activate() {
		// TODO: Implement activate() method.
	}

	static function deactivate() {
		// TODO: Implement deactivate() method.
	}

	static function upgrade() {
		// TODO: Implement upgrade() method.
	}

	/**********************************
	 * Extra Methods
	 */
	private static function _initShortcodes() {
		$conf = self::$moduleConfig['shortcodes'];
		foreach ( $conf as $tag => $shortcode ) {
			add_shortcode( $tag, $shortcode['callback'] );
		}
	}

	/********************************
	 * Shortcode callbacks
	 */
	static function wpe_dfi_slider( $atts ) {
		if ( ! class_exists( 'Dynamic_Featured_Image' ) ) {
			return 'Dynamic Featured Image is not installed or activated.';
		}

		//Scripts loaded in SC to not loaded unnecessarily
		wp_enqueue_script('wpe-features-frontend');

		$conf     = self::$moduleConfig['shortcodes']['wpe_dfi_slider'];
		$callback = function ( $value ) {
			return $value['default'];
		};
		$defaults = array_map( $callback, $conf['attributes'] );

		$attributes = shortcode_atts(
			$defaults,
			$atts
		);

		return self::wpe_dfi_slick_common($attributes);
	}

	static function wpe_dfi_carousel( $atts ) {
		if ( ! class_exists( 'Dynamic_Featured_Image' ) ) {
			return 'Dynamic Featured Image is not installed or activated.';
		}

        //Scripts loaded in SC to not loaded unnecessarily
        wp_enqueue_script('wpe-features-frontend');

		$conf     = self::$moduleConfig['shortcodes']['wpe_dfi_carousel'];
		$callback = function ( $value ) {
			return $value['default'];
		};
		$defaults = array_map( $callback, $conf['attributes'] );

		$attributes = shortcode_atts(
			$defaults,
			$atts
		);

		return self::wpe_dfi_slick_common($attributes);
	}

	static function wpe_dfi_slick_common( $attributes ) {

		global $dynamic_featured_image, $post;

		$featured = [];
		//Don't get main featured image as it is not cropped to a square. Dynamic Features Inage crops to a square.

		//Get extra images from DFI
		$dfi_images = $dynamic_featured_image->get_featured_images( $post->ID );

		$images = array_merge( $featured, $dfi_images );

		//You can now loop through the image to display them as required

		if(count($images) === 0 ) return 'No Dynamic Featured images for this Page/Post';

		return ViewHelper::getView( dirname( __DIR__ ) . '/View/sliderView.phtml',
			[
				'atts'   => $attributes,
				'images' => $images
			] );

	}


}