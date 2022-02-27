<?php
/**
 * Define constants.
 *
 * @package Finna Invoices
 */

namespace Inc\Base;

class BaseController
{
    public $plugin_path;

    public $plugin_name;

    public $plugin_slug;

    public $plugin_basename;

    public $plugin_url;

    public $plugin_js_dir;

    public $plugin_css_dir;


    public function __construct()
    {
        $this->plugin_name = ucwords(str_replace("-", " ", trim(dirname(plugin_basename(dirname(__FILE__, 2))), '/')));
        $this->plugin_slug = str_replace("-", "_", trim(dirname(plugin_basename(dirname(__FILE__, 2))), '/'));
        $this->plugin_basename = plugin_basename(dirname(__FILE__, 3)) . '/' . plugin_basename(dirname(__FILE__, 3)) . '.php';
        $this->plugin_path = plugin_dir_path(dirname(__FILE__, 2));
        $this->plugin_url = plugin_dir_url(dirname(__FILE__, 2));
        $this->plugin_js_dir = plugins_url('build/js/', dirname(__FILE__, 2));
        $this->plugin_css_dir = plugins_url('build/css/', dirname(__FILE__, 2));
    }
}
