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


class Admin extends P5Basecontroller
{
    public $settings;
    public $callbacks;
    public $pages = array();
    public $subpages = array();

    public function register()
    {
        $this->callbacks = new P5AdminCallbacks();

        $this->settings = new P5SettingsApi();

        $this->p5SetPages();

         $this->p5SetSubPages();

         $this->p5SetSettings();

         $this->p5SetSections();

         $this->p5SetFields();

        $this->settings->p5addPages( $this->pages )->p5widthSubPage('Dashboard')->p5addSubPages( $this->subpages )->register();
    }

    public function p5SetPages()
    {
        $this->pages = array(
            array(
                'page_title'    => 'Before and After Gallery',
                'menu_title'    => 'Before and After Gallery',
                'capability'    => 'manage_options',
                'menu_slug'     => 'patients_gallery',
                'callback'      => array($this->callbacks, 'p5AdminDashboard'),
                'icon_url'      => 'dashicons-universal-access',
                'position'      => 110
            ),
        ); 


    }

    public function p5SetSubPages()
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
                'page_title'    => 'Procedures Categories',
                'menu_title'    => 'Procedures Categories',
                'capability'    => 'manage_options',
                'menu_slug'     => 'p5_gallery_procedures',
                'callback'      => array($this->callbacks, 'p5AdminProceduresCategories'),
            ),
            array(
                'parent_slug'   => 'patients_gallery',
                'page_title'    => 'Default Procedures',
                'menu_title'    => 'Default Procedures',
                'capability'    => 'manage_options',
                'menu_slug'     => 'p5_gallery_default_procedures',
                'callback'      => array($this->callbacks, 'p5AdminDefaultProcedures'),
            ),
        );
    }

    //Custom Fields 

    public function p5SetSettings()
    {
        $args = array(
            array(
                'option_group'  => 'p5_option_group_settings_styles',
                'option_name'   => 'sensitive_image',
                'callback'      =>  array( $this->callbacks , 'p5OptionGroupSettingsStyles' ) 
            )
        );

        $this->settings->p5SetSettings($args);
    }

    public function p5SetSections()
    {
        $args = array(
            array(
                'id'        => 'p5_section_settings_styles',
                'title'     => 'Settings Styles',
                'callback'  => array($this->callbacks,'p5AdminSectionSettingsStyles'),
                'page'      => 'p5_gallery_settings' // 'menu_slug' from setPages or setSubPages
            )
        );

        $this->settings->p5SetSections($args);
    }

    public function p5SetFields()
    {
        $args = array(
            //settings styles fields
            array(
                'id'        => 'sensitive_image', // 'option_name' from setSettings
                'title'     => 'Sensitive Image Protection',
                'callback'  => array($this->callbacks, 'p5AdminFieldsSettingsStyles'),
                'page'      => 'p5_gallery_settings', // 'menu_slug' from setPages or setSubPages
                'section'   => 'p5_section_settings_styles', // 'id' from setSections
                'args'      => array(
                                    'label_for' => 'settings_styles', // 'id' from this field
                                    'class'     => 'p5-input-class'
                                )
            )
            //settings styles fields

        );

        $this->settings->p5SetFields($args);
    }


}

