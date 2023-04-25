<?php
/**
* @package  p5galleryPatients
 * ===========================
 * Base Controller Plugin
 * ===========================
*/
namespace Inc\Base;

use \Inc\Api\P5SettingsApi;
use \Inc\Base\P5Basecontroller;
use \Inc\Api\Callbacks\P5AdminSettingsStyles;
use \Inc\Api\Callbacks\P5AdminCallbacks;


class P5SettingsStylesController extends P5Basecontroller
{
    public $callbacks;
    public $styles; 
    public $subpages = array();

    public function register()
    {
        $this->settings = new P5SettingsApi();

        $this->callbacks = new P5AdminCallbacks();

        $this->styles = new P5AdminSettingsStyles();

        $this->p5SetSubPages();

        $this->p5SetSettings();

        $this->p5SetSections();

        $this->p5SetFields();

        $this->settings->p5addSubPages( $this->subpages )->register();
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
            )
            
        );
    }

    public function p5SetSettings()
    {
        foreach ($this->checkbox_styles_fields as $key => $checkbox_field) {
            $args[] = array(
                'option_group'  => 'p5_option_group_settings_manager',
                'option_name'   => $key,
                'callback'      =>  array( $this->styles , 'p5SettingsCheckBoxSanitize' ) 
            );
        }

        foreach ($this->input_image_styles_fields as $key => $input_sfield) {
            $args[] = array(
                'option_group'  => 'p5_option_group_settings_manager',
                'option_name'   => $key,
                'callback'      =>  array( $this->styles , 'p5InputSanitize' ) 
            );
        }

        foreach ($this->input_styles_fields as $key => $input_sfield) {
            $args[] = array(
                'option_group'  => 'p5_option_group_settings_manager',
                'option_name'   => $key,
                'callback'      =>  array( $this->styles , 'p5InputSanitize' ) 
            );
        }

        $this->settings->p5SetSettings($args);
    }

    public function p5SetSections()
    {
        $args = array(
            //Procedures
            array(
                'id'        => 'p5_section_settings_styles',
                'title'     => 'Settings Manager',
                'callback'  => array($this->styles,'p5AdminSectionSettingsStyles'),
                'page'      => 'p5_gallery_settings' // 'menu_slug' from setPages or setSubPages
            )
        );
        $this->settings->p5SetSections($args);
    }

    public function p5SetFields()
    {
        $args = array();
        foreach ($this->checkbox_styles_fields as $key => $checkbox_field) {
            $args[] = array(
                'id'        => $key, // 'option_name' from setSettings
                'title'     => $checkbox_field,
                'callback'  => array($this->styles, 'p5GenerateCheckBox'),
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
                'callback'  => array($this->styles, 'p5AdminSettingsInputLogo'),
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
                'callback'  => array($this->styles, 'p5AdminSettingsInput'),
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