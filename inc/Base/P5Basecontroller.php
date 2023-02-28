<?php
/**
 * @package  p5galleryPatients
 * ===========================
 * Base Controller Plugin
 * ===========================
*/
namespace Inc\Base;

class P5Basecontroller
{
	public $plugin_path;
	public $plugin_url;
	public $plugin_dirname;

	public function __construct(){

		$this->plugin_path 	= plugin_dir_path(dirname(__FILE__,2));
		$this->plugin_url 	= plugin_dir_url(dirname(__FILE__,2));
		$this->plugin_dirname 	= plugin_basename(dirname(__FILE__,3)) .'/p5galleryPatients.php';

	}

}
