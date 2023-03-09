<?php
/**
 * @package  p5galleryPatients
 * ===========================
 * Enqueue Styles and Scripts
 * ===========================
*/

namespace Inc\Base;

use \Inc\Base\P5Basecontroller;

class P5Enqueue  extends P5Basecontroller
{
    public function register(){
        add_action( 'wp_enqueue_scripts', array($this, 'enqueueWaterMark') );
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );
    }

    public function enqueue(){
        wp_enqueue_style('p5_gallery_css', $this->plugin_url.'assets/css/P5AdminStyles.css', 1.0);
        wp_enqueue_style('color_picker_css', $this->plugin_url.'assets/color-picker/css/wheelcolorpicker.min.css', 1.0);
        wp_enqueue_script('p5_gallery_js', $this->plugin_url.'assets/js/P5Scripts.js', 1.0);
        wp_enqueue_script('color_picker_js', $this->plugin_url.'assets/color-picker/jquery.wheelcolorpicker.min.js', 1.0);
    }

    public function enqueueWaterMark()
    {
         wp_enqueue_script('water_mark', $this->plugin_url.'assets/water-mark/dist/jquery.watermark.min.js', 1.0);
    }
}
