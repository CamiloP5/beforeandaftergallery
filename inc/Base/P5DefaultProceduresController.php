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
use \Inc\Api\Callbacks\P5AdminProcedures;
use \Inc\Api\Callbacks\P5AdminCallbacks;


class P5DefaultProceduresController extends P5Basecontroller
{
    public $callbacks;
    public $settings;
    public $procedures; 
    public $subpages = array();

    public function register()
    {
        $this->settings = new P5SettingsApi();

        $this->callbacks = new P5AdminCallbacks();

        $this->procedures = new P5AdminProcedures();

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
                'page_title'    => 'Surgery Default Procedures',
                'menu_title'    => 'Surgery Default Procedures',
                'capability'    => 'manage_options',
                'menu_slug'     => 'p5_gallery_default_procedures',
                'callback'      => array($this->callbacks, 'p5AdminDefaultProcedures'),
            )  
        );
    }

    public function p5SetSettings()
    {
        //Procedures
        //Face
        foreach ($this->face_procedures as $key => $checkbox_field) {
            $args[] = array(
                'option_group'  => 'p5_option_group_default_procedures',
                'option_name'   => $key,
                'callback'      =>  array( $this->procedures , 'p5FaceProceduresCheckBoxSanitize' ) 
            );
        }
        //Breast
        foreach ($this->breast_procedures as $key => $checkbox_field) {
            $args[] = array(
                'option_group'  => 'p5_option_group_default_procedures',
                'option_name'   => $key,
                'callback'      =>  array( $this->procedures , 'p5BreastProceduresCheckBoxSanitize' ) 
            );
        }

         //Body
        foreach ($this->body_procedures as $key => $checkbox_field) {
            $args[] = array(
                'option_group'  => 'p5_option_group_default_procedures',
                'option_name'   => $key,
                'callback'      =>  array( $this->procedures , 'p5BodyProceduresCheckBoxSanitize' ) 
            );
        }
        
         //Skin
        foreach ($this->skin_procedures as $key => $checkbox_field) {
            $args[] = array(
                'option_group'  => 'p5_option_group_default_procedures',
                'option_name'   => $key,
                'callback'      =>  array( $this->procedures , 'p5SkinProceduresCheckBoxSanitize' ) 
            );
        }

         //Female
        foreach ($this->female_procedures as $key => $checkbox_field) {
            $args[] = array(
                'option_group'  => 'p5_option_group_default_procedures',
                'option_name'   => $key,
                'callback'      =>  array( $this->procedures , 'p5FemaleProceduresCheckBoxSanitize' ) 
            );
        }

        //Male
        foreach ($this->male_procedures as $key => $checkbox_field) {
            $args[] = array(
                'option_group'  => 'p5_option_group_default_procedures',
                'option_name'   => $key,
                'callback'      =>  array( $this->procedures , 'p5MaleProceduresCheckBoxSanitize' ) 
            );
        }

        $this->settings->p5SetSettings($args);
    }

    public function p5SetSections()
    {
        $args = array(
            //Procedures
            array(
                'id'        => 'p5_section_default_procedures',
                'title'     => 'Default Procedures',
                'callback'  => array($this->procedures,'p5DefaultProceduresSection'),
                'page'      => 'p5_gallery_default_procedures' // 'menu_slug' from setPages or setSubPages
            ),

        );
        $this->settings->p5SetSections($args);
    }

    public function p5SetFields()
    {
        $args = array();
        //Procedures 
        //Face
        foreach ($this->face_procedures as $key => $checkbox_field) {
            $args[] = array(
                'id'        => $key, // 'option_name' from setSettings
                'title'     => $checkbox_field,
                'callback'  => array($this->procedures, 'p5GenerateProceduresCheckBox'),
                'page'      => 'p5_gallery_default_procedures', // 'menu_slug' from setPages or setSubPages
                'section'   => 'p5_section_default_procedures', // 'id' from setSections
                'args'      => array(
                                    'label_for' => $key, // 'id' from this field
                                    'class'     => 'ui-toggle'
                                )
            );
        }
        //Breast
        foreach ($this->breast_procedures as $key => $checkbox_field) {
            $args[] = array(
                'id'        => $key, // 'option_name' from setSettings
                'title'     => $checkbox_field,
                'callback'  => array($this->procedures, 'p5GenerateProceduresCheckBox'),
                'page'      => 'p5_gallery_default_procedures', // 'menu_slug' from setPages or setSubPages
                'section'   => 'p5_section_default_procedures', // 'id' from setSections
                'args'      => array(
                                    'label_for' => $key, // 'id' from this field
                                    'class'     => 'ui-toggle'
                                )
            );
        }
        //body
        foreach ($this->body_procedures as $key => $checkbox_field) {
            $args[] = array(
                'id'        => $key, // 'option_name' from setSettings
                'title'     => $checkbox_field,
                'callback'  => array($this->procedures, 'p5GenerateProceduresCheckBox'),
                'page'      => 'p5_gallery_default_procedures', // 'menu_slug' from setPages or setSubPages
                'section'   => 'p5_section_default_procedures', // 'id' from setSections
                'args'      => array(
                                    'label_for' => $key, // 'id' from this field
                                    'class'     => 'ui-toggle'
                                )
            );
        }
        //Skin
        foreach ($this->skin_procedures as $key => $checkbox_field) {
            $args[] = array(
                'id'        => $key, // 'option_name' from setSettings
                'title'     => $checkbox_field,
                'callback'  => array($this->procedures, 'p5GenerateProceduresCheckBox'),
                'page'      => 'p5_gallery_default_procedures', // 'menu_slug' from setPages or setSubPages
                'section'   => 'p5_section_default_procedures', // 'id' from setSections
                'args'      => array(
                                    'label_for' => $key, // 'id' from this field
                                    'class'     => 'ui-toggle'
                                )
            );
        }
        //Female
        foreach ($this->female_procedures as $key => $checkbox_field) {
            $args[] = array(
                'id'        => $key, // 'option_name' from setSettings
                'title'     => $checkbox_field,
                'callback'  => array($this->procedures, 'p5GenerateProceduresCheckBox'),
                'page'      => 'p5_gallery_default_procedures', // 'menu_slug' from setPages or setSubPages
                'section'   => 'p5_section_default_procedures', // 'id' from setSections
                'args'      => array(
                                    'label_for' => $key, // 'id' from this field
                                    'class'     => 'ui-toggle'
                                )
            );
        }
        //Male
        foreach ($this->male_procedures as $key => $checkbox_field) {
            $args[] = array(
                'id'        => $key, // 'option_name' from setSettings
                'title'     => $checkbox_field,
                'callback'  => array($this->procedures, 'p5GenerateProceduresCheckBox'),
                'page'      => 'p5_gallery_default_procedures', // 'menu_slug' from setPages or setSubPages
                'section'   => 'p5_section_default_procedures', // 'id' from setSections
                'args'      => array(
                                    'label_for' => $key, // 'id' from this field
                                    'class'     => 'ui-toggle'
                                )
            );
        }
        $this->settings->p5SetFields($args);
    }
}