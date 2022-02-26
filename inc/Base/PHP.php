<?php
/**
 * PHP version compatibility functionality.
 *
 * @package Finna Invoices
 */

namespace Inc\Base;

abstract class PHP {

	/**
	 * @var string
	 */
	public static $minimum_version = '7.4';

	/**
	 * @return bool
	 */
	public static function version_met() {
		return version_compare( PHP_VERSION, self::$minimum_version, '>=' );
	}

	/**
	 * @return void
	 */
	public static function incorrect_php_version() {
		printf(
			'<div id="qm-php-nope" class="notice notice-error is-dismissible"><p>%s</p></div>',
			wp_kses(
				sprintf(
					/* translators: 1: Plugin name, 2: Required PHP version number, 3: Current PHP version number, 4: URL of PHP update help page, 5: domain */
					__( 'The %1$s plugin requires PHP version %2$s or higher. This site is running PHP version %3$s. <a href="%4$s">Learn about updating PHP</a>.', '%5$s' ),
                    PLUGIN_NAME,
					self::$minimum_version,
					PHP_VERSION,
					'https://wordpress.org/support/update-php/',
                    strtolower(str_replace(" ", "-", PLUGIN_NAME))
				),
				array(
					'a' => array(
						'href' => array(),
					),
				)
			)
		);
	}

}
