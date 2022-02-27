<?php
/**
 * Enqueue admin dashboard styles and scripts.
 *
 * @package Finna Invoices
 */

namespace Inc\Base;

/**
 * Main plugin class with initialization tasks.
 */
class Enqueue extends BaseController
{

    public function register() {
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );
	}

	public function enqueue() {
		// enqueue all our scripts
		wp_enqueue_style( 'fi_styles', $this->plugin_url . 'build/css/app.css' );
		wp_enqueue_script( 'fi_scripts', $this->plugin_url . 'build/js/app.js' );

        if(wp_get_environment_type() === 'local'){
            wp_enqueue_script('browser-sync', '//wordpress.test:3000/browser-sync/browser-sync-client.js?v=2.27.7', array(), null, true);
        }
	}

}
