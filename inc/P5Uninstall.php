<?php
/**
 * @package  p5galleryPatients
 * ===========================
 * Uninstall plugin
 * ===========================
*/

namespace Inc;

class P5Uninstall{

    if(!defined('WP_UNINSTALL_PLUGIN')) ? die;

    $patients = get_posts(array('post_type'=>'patients', 'numberposts' => -1));

    foreach($patients as $patient){
        wp_delete_post($patient->ID, true);
    }

}

