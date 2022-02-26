<?php

/**
 * Plugin Name: Finna Invoices
 * Plugin URI: https://github.com/FinnaCreate/finna-invoices
 * Description: Fully featured invoicing system built directly into your WordPress website.
 * Version: 1.0
 * Author: Finna Create
 * Author URI: https://finnacreate.com
 *
 * @package finna-invoices
 */


/**
 * Block direct access to the main plugin file.
 */
defined('ABSPATH') || exit;

if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}



define('PLUGIN_NAME', 'Finna Invoices');
define('PLUGIN_PATH', plugin_dir_path(__FILE__));
define('PLUGIN_URL', plugin_dir_url(__FILE__));

if (! Inc\Base\PHP::version_met()) {
    add_action('admin_notices', 'Inc\Base\PHP::incorrect_php_version');
    return;
}

if (class_exists('Inc\\Init')) {
    Inc\Init::register_services();
}
