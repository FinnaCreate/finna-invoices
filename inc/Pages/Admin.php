<?php
/**
 * Admin pages.
 *
 * @package Finna Invoices
 */
namespace Inc\Pages;

use \Inc\Base\BaseController;

/**
*
*/
class Admin extends BaseController
{
	public function register() {
		add_action( 'admin_menu', array( $this, 'add_admin_pages' ) );
	}

	public function add_admin_pages() {
        add_menu_page($this->plugin_name, $this->plugin_name, 'manage_options', $this->plugin_slug, array( $this, 'admin_index' ), 'dashicons-book-alt', 110 );
	}

	public function admin_index() {
		require_once $this->plugin_path . '/templates/admin.php';
	}
}
