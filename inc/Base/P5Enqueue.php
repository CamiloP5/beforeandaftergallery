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
        add_action( 'wp_enqueue_scripts', array($this, 'enqueue') );
    }

    public function enqueue(){
        wp_enqueue_style('p5_gallery_styles', $this->plugin_path.'assets/css/P5Styles.css', 1.0);
        wp_enqueue_script('p5_gallery_styles', $this->plugin_path.'assets/js/P5Scripts.js', 1.0);
    }
}
