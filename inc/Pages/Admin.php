<?php
/**
 * @package  p5galleryPatients
 * ===========================
 * Admin page plugin
 * ===========================
*/

namespace Inc\Pages;

use \Inc\Api\P5SettingsApi;
use \Inc\Base\P5Basecontroller;
use \Inc\Api\Callbacks\P5AdminCallbacks;
use \Inc\Api\Callbacks\P5AdminSettingsStyles;

class Admin extends P5Basecontroller
{
    public $settings;
    public $callbacks;
    public $admin;
    public $procedures;

    public $pages = array();
    //public $subpages = array();

    public function register()
    {
        $this->callbacks = new P5AdminCallbacks();

        $this->admin = new P5AdminSettingsStyles();

        $this->settings = new P5SettingsApi();

        $this->p5SetPages();

       // $this->p5SetSubPages();

       // $this->p5SetSettings();

       // $this->p5SetSections();

       // $this->p5SetFields();

        $this->settings->p5addPages( $this->pages )->p5widthSubPage('Dashboard')->register();
    }

    public function p5SetPages()
    {
        $this->pages = array(
            array(
                'page_title'    => 'Dashboard',
                'menu_title'    => 'Dashboard',
                'capability'    => 'manage_options',
                'menu_slug'     => 'patients_gallery',
                'callback'      => array($this->callbacks, 'p5AdminDashboard'),
                'icon_url'      => 'dashicons-universal-access',
                'position'      => 110
            ),
        ); 
    }

    /*public function p5SetSubPages()
    {
        $this->subpages = array(
            array(
                'parent_slug'   => 'patients_gallery',
                'page_title'    => 'Gallery Settings',
                'menu_title'    => 'Gallery Settings',
                'capability'    => 'manage_options',
                'menu_slug'     => 'p5_gallery_settings',
                'callback'      => array($this->callbacks, 'p5AdminSettingsStyles'),
            ),
            array(
                'parent_slug'   => 'patients_gallery',
                'page_title'    => 'Default Procedures',
                'menu_title'    => 'Default Procedures',
                'capability'    => 'manage_options',
                'menu_slug'     => 'p5_gallery_default_procedures',
                'callback'      => array($this->callbacks, 'p5AdminDefaultProcedures'),
            ),
            array(
                'parent_slug'   => 'patients_gallery',
                'page_title'    => 'Procedures Categories',
                'menu_title'    => 'Procedures Categories',
                'capability'    => 'manage_options',
                'menu_slug'     => 'p5_gallery_procedures',
                'callback'      => array($this->callbacks, 'p5AdminProceduresCategories'),
            ),
            
        );
    }*/

    //Settings admin 

    /*public function p5SetSettings()
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
    }*/

   /* public function p5SetSections()
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
    }*/

   /* public function p5SetFields()
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
    }*/
}