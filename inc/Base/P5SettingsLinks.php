<?php
/**
 * @package  p5galleryPatients
 * ===========================
 * Settings links plugin
 * ===========================
*/

namespace Inc\Base;

use \Inc\Base\P5Basecontroller;

class P5SettingsLinks extends P5Basecontroller
{
	public function register(){
		add_filter( 'plugin_action_links_' . $this->plugin_dirname , array($this, 'settings_link'));
	}

	public function settings_link( $links ){

		$settings_link = '<a href="admin.php?page=patients_gallery"> Settings </a> '; 
		array_push($links, $settings_link);
		return $links;
	}

}
