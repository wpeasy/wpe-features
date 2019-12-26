<?php
/**
 * Plugin Name: WPEasy Features
 * Plugin URI:
 * Description: Common features for WP Easy clients
 * Version: 1.0.0
 * Author: Alan Blair
 * Author URI:
 * Text Domain: wpeasy
 */

namespace WPEasyFeaturesPlugin;

use WPEasyLibrary\WordPress\WPEasyApplication;

require_once __DIR__ . '/vendor/autoload.php';

$config = require __DIR__ . '/application.config.php';
WPEasyApplication::init($config);
WPEasyApplication::registerLoadedPlugin($config);

