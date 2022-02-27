<?php

/**
 * @package Finna Invoices
 * @copyright Copyright (C) 2021-2022, Finna Create - support@finnacreate.com
 * @license   http://www.gnu.org/licenses/gpl-3.0.html GNU General Public License, version 3 or higher
 *
 * Plugin Name: Finna Invoices
 * Plugin URI: https://github.com/FinnaCreate/finna-invoices
 * Description: Fully featured invoicing system built directly into your WordPress website.
 * Version: 1.0
 * Author: Finna Create
 * Author URI: https://finnacreate.com
 * Text Domain: finna-invoices
 * License: GPL v3
 * Requires at least: 5.6
 * Requires PHP: 5.6.20
 *
 * WC requires at least: 3.0
 * WC tested up to: 6.1
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * Block direct access to the main plugin file.
 */
defined('ABSPATH') || exit;

if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

/**
 * Set constants
 */
if (!defined('PLUGIN_NAME'))
    define('PLUGIN_NAME', ucwords(str_replace("-", " ", trim(dirname(plugin_basename(__FILE__)), '/'))));

if (!defined('PLUGIN_SLUG'))
    define('PLUGIN_SLUG', str_replace("-", "_", trim(dirname(plugin_basename(__FILE__)), '/')));

if (!defined('PLUGIN_BASENAME'))
    define('PLUGIN_BASENAME', plugin_basename(__FILE__));

if (!defined('PLUGIN_URL'))
    define('PLUGIN_URL', plugin_dir_url(__FILE__));

if (!defined('PLUGIN_PATH'))
    define('PLUGIN_PATH', plugin_dir_path(__FILE__));

if (!defined('PLUGIN_JS_DIR'))
    define('PLUGIN_JS_DIR', plugins_url('build/js/', __FILE__));

if (!defined('PLUGIN_CSS_DIR'))
    define('PLUGIN_CSS_DIR', plugins_url('build/css/', __FILE__));

use Inc\Base\Activate;
use Inc\Base\Deactivate;

function activate_finna_invoices() {
    Activate::activate();
}

function deactivate_finna_invoices() {
    Deactivate::deactivate();
}

register_activation_hook(__FILE__, 'activate_finna_invoices');
register_deactivation_hook(__FILE__, 'deactivate_finna_invoices');

if (! Inc\Base\PHP::version_met()) {
    add_action('admin_notices', 'Inc\Base\PHP::incorrect_php_version');
    return;
}

if (class_exists('Inc\\Init')) {
    Inc\Init::register_services();
}
