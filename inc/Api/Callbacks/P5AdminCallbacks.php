<?php
/**
 * @package  p5galleryPatients
 * ===========================
 * Settings Api
 * ===========================
*/

namespace Inc\Api\Callbacks;

use Inc\Base\P5Basecontroller;

class P5AdminCallbacks extends P5Basecontroller
{
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



    public function p5OptionGroupSettingsStyles( $input )
    {
        return $input;
    }

    public function p5AdminSectionSettingsStyles()
    {
        echo 'Settings Sections Fields';
    }

    public function p5AdminFieldsSettingsStyles()
    {
        $sensitive_image = esc_attr(get_option('sensitive_image'));

        echo '<input type="text" name="sensitive_image" id="sensitive_image" placeholder="do you like to be a sensitive image?" value="'.(isset($sensitive_image) ? $sensitive_image : "" ).'">';
    }
}