<?php


namespace WPEasyFeatures\Modules\Placeholders\Controller;


use WPEasyFeatures\Application\Controller\ApplicationController;
use WPEasyFeatures\Application\Model\ApplicationModel;
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
		ApplicationController::registerModule(__CLASS__, self::$moduleConfig);
		SettingsController::init(self::$moduleConfig);
		self::_initShortcodes();

		add_action('admin_head', [__CLASS__, 'add_mce_button']);
		add_action('add_meta_boxes', [__CLASS__, 'register_meta_box_cb']);
		add_action( 'wp_ajax_wpe_policy_get', [ __CLASS__, 'wpe_policy_get' ] );
	}

	static function getDashboardView() {
		// TODO: Implement getDashboardView() method.
		return ViewHelper::getView(dirname(__DIR__) . '/View/dashboardView.phtml', [], false);
	}

	static function activate() {
		// TODO: Implement activate() method.
	}

	static function upgrade() {
		// TODO: Implement upgrade() method.
	}

	static function getDescription() {
		// TODO: Implement getDescription() method.
	}

	static function deactivate() {
		// TODO: Implement deactivate() method.
	}

	/**********************************
	 * Extra Methods
	 */
	private static function _initShortcodes() {
		$conf = @self::$moduleConfig['shortcodes'];
		foreach ( $conf as $tag => $shortcode ) {
			add_shortcode( $tag, $shortcode['callback'] );
		}
	}

	/****************************
	 * Shortcode callbacks
	 */
	static function wpe_company_trading_name()
	{
		return SettingsController::$currentOptions['company_trading_name'];
	}

	static function wpe_company_legal_name()
	{
		return SettingsController::$currentOptions['company_legal_name'];
	}

	static function wpe_company_abn_acn()
	{
		return SettingsController::$currentOptions['company_abn_acn'];
	}

	static function wpe_company_phone()
	{
		return SettingsController::$currentOptions['company_phone'];
	}

	static function wpe_company_email()
	{
		return SettingsController::$currentOptions['company_email'];
	}
	static function wpe_company_address()
	{
		return SettingsController::$currentOptions['company_address'];
	}
	static function wpe_company_postal_address()
	{
		return SettingsController::$currentOptions['company_postal_address'];
	}
	static function wpe_site_url()
	{
		return site_url();
	}

	/*****************************
	 * AJAX Functions
	 */
	static function wpe_policy_get() {
		if ( !wp_verify_nonce( $_REQUEST['nonce'], 'wpe_policy_get')) {
			status_header(401);
			die("Not Authorized");
		}
		$path = dirname(__DIR__) . '/templates/' . $_POST['fileName'];
		if(!file_exists($path)){
			status_header(404);
			die('File does not exist');
		}

		$fileContents = file_get_contents($path);
		echo $fileContents;
		die();
	}

	/********************************
	 * Polict MetaBox
	 */
	static function register_meta_box_cb($post)
	{
		add_meta_box('policy_templates', 'Policy Templates', [__CLASS__, 'policy_meta_box'], null, 'side', 'high');
	}

	static function policy_meta_box()
	{
		ViewHelper::getView(dirname(__DIR__) . '/View/policyMetaBoxView.phtml', ['templates' => self::$moduleConfig['templates']], true);
	}


	/******************************
	 * Editor button
	 */
	static function add_mce_button()
	{
		if ( 'true' == get_user_option( 'rich_editing' ) ) {
			add_filter( 'mce_external_plugins', [__CLASS__, 'add_tinymce_plugin'] );
			add_filter( 'mce_buttons', [__CLASS__, 'register_mce_button'] );
		}
	}

	static function register_mce_button( $buttons ) {
		array_push( $buttons, 'policy_mce_button' );
		return $buttons;
	}

	static function add_tinymce_plugin( $plugin_array ) {
		//$plugin_array['policy_mce_button'] = ApplicationModel::$config['assetsURL'] .'/js/policy-mce-button.js';
		return $plugin_array;
	}
}