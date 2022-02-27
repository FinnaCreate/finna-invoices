<?php
/**
 * PHP version compatibility functionality.
 *
 * @package Finna Invoices
 */

namespace Inc\Base;

class SettingsLinks
{
    public function register()
    {
        add_filter('plugin_action_links_' . PLUGIN_BASENAME, array($this, 'settings_link'));
    }

    public function settings_link($links)
    {
        $settings_link = '<a href="admin.php?page=' . PLUGIN_SLUG .'">Settings</a>';
        array_push($links, $settings_link);
        return $links;
    }
}
