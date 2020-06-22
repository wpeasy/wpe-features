<?php
/**
 * Plugin Name: WPEasy Features
 * Plugin URI:
 * Description: Common features for WP Easy clients
 * Version: 1.0.13
 * Author: Alan Blair
 * Author URI:
 * Text Domain: wpeasy
 */

namespace WPEasyFeaturesPlugin;

use WPEasyLibrary\WordPress\WPE_PluginUpdateFromGithub;
use WPEasyLibrary\WordPress\WPEasyApplication;

require_once __DIR__ . '/vendor/autoload.php';
$config = require __DIR__ . '/application.config.php';
/*
if ( is_admin() ) {
    $conf = $config['github'];
    $updater = new WPE_PluginUpdateFromGithub(__FILE__);
    $updater->set_username($conf['user']);
    $updater->set_repository($conf['repo']);
    $updater->authorize($conf['token']);
    $updater->initialize();
}
*/


WPEasyApplication::init($config);
WPEasyApplication::registerLoadedPlugin($config);

