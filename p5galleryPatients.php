<?php
/**
 * @package  p5galleryPatients
 * Plugin Name:  P5Marketing Before and After Gallery By Classes
 * Description: Pictures Gallery Before and After
 * Version: 1.1.0
 * Author: P5marketing team
 * Text Domain: patients_gallery
 */
/**
 * patients main plugin file.
*/
// db Connection

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Invalid request.' );
}

// Require once the Composer Autoload
if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}


use Inc\Base\P5Activate;
use Inc\Base\P5Deactivate;


register_activation_hook(__FILE__, 'p5activate_plugin' );
function p5activate_plugin(){
    P5Activate::activate();
}

register_deactivation_hook( __FILE__ , 'p5deactivate_plugin');
function p5deactivate_plugin(){
    P5Deactivate::deactivate();
}

if( class_exists('Inc\\Init')){
    Inc\Init::register_services();
}