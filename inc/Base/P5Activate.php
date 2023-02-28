<?php
/**
 * @package  p5galleryPatients
 * ===========================
 * Activation plugin
 * ===========================
*/

namespace Inc\Base;


class P5Activate{
    
    public static function activate()
    {
        flush_rewrite_rules();
    }

}