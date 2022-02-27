<?php
/**
 * Admin pages.
 *
 * @package Finna Invoices
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
        add_menu_page(PLUGIN_NAME, PLUGIN_NAME, 'manage_options', PLUGIN_SLUG, array( $this, 'admin_index' ), 'dashicons-book-alt', 110 );
	}

	public function admin_index() {
		require_once PLUGIN_PATH . '/templates/admin.php';
	}
}
