<?php
/**
 * Admin pages.
 *
 * @package Finna Invoices
 */

namespace Inc\Pages;

use Inc\Api\SettingsApi;
use Inc\Base\BaseController;
use Inc\Api\Callbacks\AdminCallbacks;

class Admin extends BaseController
{
    public $settings;

    public $callbacks;

    public $pages = [];

    public $subpages = [];

    public function register()
    {
        $this->settings = new SettingsApi();

        $this->callbacks = new AdminCallbacks();

        $this->setPages();

        $this->setSubpages();

        $this->settings->addPages($this->pages)->withSubPage('Dashboard')->addSubPages($this->subpages)->register();
    }

    public function setPages()
    {
        $this->pages = [
            [
                'page_title' => $this->plugin_name,
                'menu_title' => $this->plugin_name,
                'capability' => 'manage_options',
                'menu_slug' => $this->plugin_slug,
                'callback' => [$this->callbacks, 'adminDashboard'],
                'icon_url' => 'dashicons-book-alt',
                'position' => 110
            ]
        ];
    }

    public function setSubpages()
    {
        $this->subpages = [
            [
                'parent_slug' => $this->plugin_slug,
                'page_title' => 'Custom Post Types',
                'menu_title' => 'CPT',
                'capability' => 'manage_options',
                'menu_slug' => 'finna_cpt',
                'callback' => [$this->callbacks, 'adminCpt']
            ],
            [
                'parent_slug' => $this->plugin_slug,
                'page_title' => 'Custom Taxonomies',
                'menu_title' => 'Taxonomies',
                'capability' => 'manage_options',
                'menu_slug' => 'finna_taxonomies',
                'callback' => [$this->callbacks, 'adminTaxonomy']
            ],
            [
                'parent_slug' => $this->plugin_slug,
                'page_title' => 'Custom Widgets',
                'menu_title' => 'Widgets',
                'capability' => 'manage_options',
                'menu_slug' => 'finna_widgets',
                'callback' => [$this->callbacks, 'adminWidget']
            ]
        ];
    }
}
