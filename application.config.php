<?php
$pluginUrl = plugin_dir_url( __FILE__ );

return [
	'isDebug'           => defined( 'WP_DEBUG' && WP_DEBUG === true ),
	'currentVersion'    => '1.0.0',
	'updateURL'         => 'https://www.wpeasy.net/ext/plugins/wpe-features/latest/',
	'pluginSlug'        => basename( __DIR__ ) . '/' . basename( __DIR__ ) . '.php',
	'pluginController'  => '\WPEasyFeatures\Application\Controller\ApplicationController',
	'pluginName'        => 'WPEasy Features',
	'pluginDescription' => 'Common WPEasy Features',
	'moduleDir'         => __DIR__ . '/src/WPEasyFeatures/Modules/',
	'pluginURL'         => $pluginUrl,
	'assetsURL'         => $pluginUrl . 'assets/',
	//Modules Controllers to initialise
	'modules'           => [
		'\WPEasyFeatures\Modules\Placeholders\Controller\ModuleController',
		'\WPEasyFeatures\Modules\DynamicFeaturedImage\Controller\ModuleController'
	],
	'adminMenu'         =>
		[
			'slug'       => 'wpe_features',
			'pageTitle'  => 'WP Easy Features',
			'menuTitle'  => 'WP Easy Features',
			'capability' => 'manage_options'
		]
];
