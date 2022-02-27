<?php
/**
 * Activate plugin.
 *
 * @package Finna Invoices
 */

namespace Inc\Base;

class Activate
{
	public static function activate() {
		flush_rewrite_rules();
	}
}
