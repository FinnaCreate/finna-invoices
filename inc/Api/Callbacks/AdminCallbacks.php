<?php
/**
 * @package  finna-plugin
 */

namespace Inc\Api\Callbacks;

use Inc\Base\BaseController;

class AdminCallbacks extends BaseController
{
    public function adminDashboard()
    {
        return require_once($this->plugin_path . '/views/admin.php');
    }

    public function adminCpt()
    {
        return require_once($this->plugin_path . '/views/cpt.php');
    }

    public function adminTaxonomy()
    {
        return require_once($this->plugin_path . '/views/taxonomy.php');
    }

    public function adminWidget()
    {
        return require_once($this->plugin_path . '/views/widget.php');
    }
}
