<?php
/**
 * Plugin Name: WPEasy Features
 * Plugin URI:
 * Description: Common features for WP Easy clients
 * Version: 1.0.4
 * Author: Alan Blair
 * Author URI:
 * Text Domain: wpeasy
 */

namespace WPEasyFeaturesPlugin;

use WPEasyLibrary\WordPress\UpdateFromGithubController;
use WPEasyLibrary\WordPress\WPEasyApplication;

require_once __DIR__ . '/vendor/autoload.php';

if ( is_admin() ) {
    new UpdateFromGithubController( __FILE__, 'wpeasy', "wpe-features" );

}

$config = require __DIR__ . '/application.config.php';
WPEasyApplication::init($config);
WPEasyApplication::registerLoadedPlugin($config);

