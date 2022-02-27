<?php
/**
 * Admin pages.
 *
 * @package Finna Invoices
 */
namespace Inc\Pages;

use \Inc\Base\BaseController;
use \Inc\Api\SettingsApi;

class Admin extends BaseController
{
    public $settings;

    public $pages = [];

    public $subpages = [];

    public function __construct()
    {
        $this->settings = new SettingsApi();

        $this->pages = [
            [
                'page_title' => 'Finna Invoices',
                'menu_title' => 'Finna Invoices',
                'capability' => 'manage_options',
                'menu_slug' => 'finna_invoices',
                'callback' => function() { echo '<h1>Finna Invoices</h1>';},
                'icon_url' => 'dashicons-book-alt',
                'position' => 110
            ]
        ];

        $this->subpages = [
			[
				'parent_slug' => 'finna_invoices',
				'page_title' => 'Custom Post Types',
				'menu_title' => 'CPT',
				'capability' => 'manage_options',
				'menu_slug' => 'finna_cpt',
				'callback' => function() { echo '<h1>CPT Manager</h1>'; }
			],
			[
				'parent_slug' => 'finna_invoices',
				'page_title' => 'Custom Taxonomies',
				'menu_title' => 'Taxonomies',
				'capability' => 'manage_options',
				'menu_slug' => 'finna_taxonomies',
				'callback' => function() { echo '<h1>Taxonomies Manager</h1>'; }
			],
			[
				'parent_slug' => 'finna_invoices',
				'page_title' => 'Custom Widgets',
				'menu_title' => 'Widgets',
				'capability' => 'manage_options',
				'menu_slug' => 'finna_widgets',
				'callback' => function() { echo '<h1>Widgets Manager</h1>'; }
			]
		];
    }

	public function register()
    {
        $this->settings->addPages($this->pages)->withSubPage('Dashboard')->addSubPages($this->subpages)->register();
	}
}
