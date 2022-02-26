<?php
/**
 * @package  Finna Invoices
 */
namespace Inc\Pages;

/**
*
*/
class Admin
{
	public function register() {
		add_action( 'admin_menu', array( $this, 'add_admin_pages' ) );
	}

	public function add_admin_pages() {
        $menu_slug = strtolower(str_replace(" ", "_", PLUGIN_NAME));
        add_menu_page(PLUGIN_NAME, PLUGIN_NAME, 'manage_options', $menu_slug, array( $this, 'admin_index' ), 'dashicons-book-alt', 110 );
	}

	public function admin_index() {
		require_once PLUGIN_PATH . 'templates/admin.php';
	}
}
