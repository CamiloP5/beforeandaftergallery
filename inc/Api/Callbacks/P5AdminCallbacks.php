<?php
/**
 * @package  p5galleryPatients
 * ===========================
 * Redirects Api
 * ===========================
*/

namespace Inc\Api\Callbacks;

use Inc\Base\P5Basecontroller;

class P5AdminCallbacks extends P5Basecontroller
{
    // Templates redirects
    public function p5AdminDashboard()
    {
        return require_once("$this->plugin_path/inc/templates/admin.php");
    }

    public function p5AdminSettingsStyles()
    {
        return require_once("$this->plugin_path/inc/templates/settings_styles.php");
    }
    
    public function p5AdminProceduresCategories()
    {
        return require_once("$this->plugin_path/inc/templates/procedures_categories.php");
    }

    public function p5AdminDefaultProcedures()
    {
        return require_once("$this->plugin_path/inc/templates/default_procedures.php");
    }
    //End Templates redirects

}