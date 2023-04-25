<?php
/**
 * @package  p5galleryPatients
 * ===========================
 * Settings Api
 * ===========================
*/

namespace Inc\Api;


class P5SettingsApi
{
	
// Variables

	public $fields = array();

	public $sections = array();

	public $settings = array();

	public $admin_pages = array();

	public $admin_subpages = array();

// Functions

	public function register()
	{
		if(!empty ($this->admin_pages) || !empty ($this->admin_subpages)  ){
			add_action('admin_menu', array($this, 'p5addAdminMenu'));
		}

		if(!empty($this->settings)){
			add_action('admin_init', array($this, 'p5RegisterCustomFields'));
		}
	} // End Function 


	public function p5addPages(array $pages){
		$this->admin_pages = $pages;
		return $this;
	} // End Function 


	public function p5widthSubPage( string $title = null)
	{
		if(empty ($this->admin_pages)  ){			
			return $this;
		}

		$admin_page = $this->admin_pages[0];

		$subpage = array(
            array(
            	'parent_slug'	=> $admin_page['menu_slug'],
                'page_title'    => $admin_page['page_title'],
                'menu_title'    => ($title) ? $title : $admin_page['menu_title'],
                'capability'    => $admin_page['capability'],
                'menu_slug'     => $admin_page['menu_slug'],
                'callback'      => $admin_page['callback'],
            )
        );

        $this->admin_subpages  = $subpage;

        return $this;
	} // End Function 


	public function p5addSubPages( array $pages)
	{
		$this->admin_subpages = array_merge($this->admin_subpages , $pages);

		return $this;
	} // End Function 


	public function p5addAdminMenu(){
		
		//Add pages in admin menus

		foreach ($this->admin_pages as $page) {
			add_menu_page(
				$page['page_title'],
				$page['menu_title'],
				$page['capability'],
				$page['menu_slug'],
				$page['callback'], 
				$page['icon_url'], 
				$page['position']
			);
		}

		//Add Subpages in admin menu

		foreach ($this->admin_subpages as $page) {
			add_submenu_page(
				$page['parent_slug'],
				$page['page_title'],
				$page['menu_title'],
				$page['capability'],
				$page['menu_slug'],
				$page['callback'],
			);
		}
	} // End Function 

	public function p5SetSettings(array $settings){
		$this->settings = $settings;
		return $this;
	} // End Function 

	public function p5SetSections(array $sections){
		$this->sections = $sections;
		return $this;
	} // End Function 

	public function p5SetFields(array $fields){
		$this->fields = $fields;
		return $this;
	} // End Function 


	public function p5RegisterCustomFields()
	{
		//Register Settings

		foreach ($this->settings as $key => $setting) {
			register_setting(
				$setting['option_group'], 
				$setting['option_name'], 
				(isset( $setting['callback']) ? $setting['callback'] : '' )
			);
		}
			//Add Settings Section
		foreach ($this->sections as $key => $section) {
			add_settings_section(
				$section['id'], 
				$section['title'], 
				(isset($section['callback']) ? $section['callback'] : ''), 
				$section['page']
			);
		}
		
			//Add Settings Field
		foreach ($this->fields as $key => $field) {
			add_settings_field(
				$field['id'], 
				$field['title'], 
				(isset($field['callback']) ? $field['callback'] : ''), 
				$field['page'], 
				$field['section'], 
				(isset($field['args']) ? $field['args'] : '')
			);
		}
	} // End Function 

}// End Class
