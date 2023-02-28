<?php
/**
 * @package  p5galleryPatients
 * ===========================
 * Deactivation plugin
 * ===========================
*/
namespace Inc\Base;

class P5Deactivate{
    
    public static function deactivate()
    {
        flush_rewrite_rules();
    }
    
}