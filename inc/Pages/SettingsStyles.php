<?php
/**
 * @package  p5galleryPatients
 * ===========================
 * Admin page plugin
 * ===========================
*/

namespace Inc\Pages;

use \Inc\Pages\AdminPages;
use \Inc\Api\P5SettingsApi;
use \Inc\Base\P5Basecontroller;
use \Inc\Api\Callbacks\P5AdminCallbacks;
use \Inc\Api\Callbacks\P5AdminFields;

class SettingsStyles extends P5Basecontroller
{
    public $settings;
    public $callbacks;
    public $admin_pages;
    public $admin_fields; 

    public function register()
    {
        $this->callbacks = new P5AdminCallbacks();

        $this->admin_fields = new P5AdminFields();

        $this->admin_pages = new P5AdminPages();

        $this->settings = new P5SettingsApi();

        $this->p5SetSettingsStyles();

        $this->p5SetSectionsStyles();

        $this->p5SetFieldsStyles();
    }

    public function p5SetSettingsStyles()
    {
        
        foreach ($this->checkbox_styles_fields as $key => $checkbox_field) {
            $args[] = array(
                'option_group'  => 'p5_option_group_settings_manager',
                'option_name'   => $key,
                'callback'      =>  array( $this->admin , 'p5SettingsCheckBoxSanitize' ) 
            );
        }

        foreach ($this->input_image_styles_fields as $key => $input_sfield) {
            $args[] = array(
                'option_group'  => 'p5_option_group_settings_manager',
                'option_name'   => $key,
                'callback'      =>  array( $this->admin , 'p5InputSanitize' ) 
            );
        }

        foreach ($this->input_styles_fields as $key => $input_sfield) {
            $args[] = array(
                'option_group'  => 'p5_option_group_settings_manager',
                'option_name'   => $key,
                'callback'      =>  array( $this->admin , 'p5InputSanitize' ) 
            );
        }
        $this->settings->p5SetSettings($args);
    }

    public function p5SetSectionsStyles()
    {
        $args = array(
            array(
                'id'        => 'p5_section_settings_styles',
                'title'     => 'Settings Manager',
                'callback'  => array($this->admin,'p5AdminSectionSettingsStyles'),
                'page'      => 'p5_gallery_settings' // 'menu_slug' from setPages or setSubPages
            )
        );
        $this->settings->p5SetSections($args);
    }

    public function p5SetFieldsStyles()
    {
        $args = array();

        foreach ($this->checkbox_styles_fields as $key => $checkbox_field) {
            $args[] = array(
                'id'        => $key, // 'option_name' from setSettings
                'title'     => $checkbox_field,
                'callback'  => array($this->admin, 'p5GenerateCheckBox'),
                'page'      => 'p5_gallery_settings', // 'menu_slug' from setPages or setSubPages
                'section'   => 'p5_section_settings_styles', // 'id' from setSections
                'args'      => array(
                                    'label_for' => $key, // 'id' from this field
                                    'class'     => 'ui-toggle'
                                )
            );
        }

        foreach ($this->input_image_styles_fields as $key => $input_image_field) {
            $args[] = array(
                'id'        => $key, // 'option_name' from setSettings
                'title'     => $input_image_field,
                'callback'  => array($this->admin, 'p5AdminSettingsInputLogo'),
                'page'      => 'p5_gallery_settings', // 'menu_slug' from setPages or setSubPages
                'section'   => 'p5_section_settings_styles', // 'id' from setSections
                'args'      => array(
                                    'label_for' => $key, // 'id' from this field
                                    'class'     => 'p5-input'
                                )
            );
        }

        foreach ($this->input_styles_fields as $key => $input_field) {
            $args[] = array(
                'id'        => $key, // 'option_name' from setSettings
                'title'     => $input_field,
                'callback'  => array($this->admin, 'p5AdminSettingsInput'),
                'page'      => 'p5_gallery_settings', // 'menu_slug' from setPages or setSubPages
                'section'   => 'p5_section_settings_styles', // 'id' from setSections
                'args'      => array(
                                    'label_for' => $key, // 'id' from this field
                                    'class'     => 'p5-input'
                                )
            );
        }
        $this->settings->p5SetFields($args);
    }

}