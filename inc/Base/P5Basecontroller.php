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

	public $checkbox_styles_fields;
	public $input_styles_fields;
	public $input_image_styles_fields;

	public $face_procedures;
	public $breast_procedures;
	public $body_procedures;
	public $skin_procedures;
	public $male_procedures;
	public $female_procedures;

	public $new_patients;

	public function __construct(){

		$this->plugin_path 	= plugin_dir_path(dirname(__FILE__,2));
		$this->plugin_url 	= plugin_dir_url(dirname(__FILE__,2));
		$this->plugin_dirname 	= plugin_basename(dirname(__FILE__,3)) .'/p5galleryPatients.php';

		$this->checkbox_styles_fields = array(
			'add_sensitive_image'=> 'Add Sensitive Image Protection?',
			'display_excerpt_in_gallery' => 'Display Excerpt In Gallery?',
		);

		$this->input_styles_fields = array(
			'gallery_slug' 						=> 'Page Gallery Slug',
			'contact_slug' 						=> 'Page Contact Slug',
			'procedure_title_color' 			=> "Color to Procedures Title's ",
			'title_color' 						=> "Gallery Title's Color",
			'primary_button_background_color' 	=> 'Background Color Primary Button',
			'primary_button_border_color' 		=> 'Border Color Primary Button',
			'primary_button_font_color' 		=> 'Font Color Primary Button',
			'secondary_button_background_color' => 'Background Color Secondary Button',
			'secondary_button_border_color' 	=> 'Border Color Secondary Button',
			'secondary_button_font_color' 		=> 'Font Color Secondary Button'
		);

		$this->input_image_styles_fields = array(
			'logo_url' 							=> 'Logo Url'
		);

		//Procedures
		
		$this->face_procedures = array(
			'blepharoplasty'	=>	'Blepharoplasty'	,
			'facelift'	=>	'Facelift'	,
			'neck_lift'	=>	'Neck Lift'	,
			'rhinoplasty'	=>	'Rhinoplasty'	,
			'otoplasty'	=>	'Otoplasty'	,
			'upper_eyelid_blepharoplasty'	=>	'Upper Eyelid Blepharoplasty'
		);

		$this->breast_procedures = array(
			'breast_asymmetry_correction'	=>	'Breast Asymmetry Correction'	,
			'breast_augmentation'	=>	'Breast Augmentation'	,
			'breast_augmentation_with_lift'	=>	'Breast Augmentation With Lift'	,
			'breast_lift'	=>	'Breast Lift'	,
			'breast_reduction'	=>	'Breast Reduction'
		);

		$this->body_procedures = array(
			'body_lift'	=>	'Body Lift'	,
			'buttock_augmentation'	=>	'Buttock Augmentation'	,
			'liposuction'	=>	'Liposuction'	,
			'mommy_makeover'	=>	'Mommy Makeover'	,
			'smartLipo'	=>	'SmartLipo'	,
			'tummy_tuck'	=>	'Tummy Tuck'	,
			'emsculpt'	=>	'Emsculpt'	,
			'sculpSure'	=>	'SculpSure'
		);

		$this->skin_procedures = array(
			'dermabrasion'	=>	'Dermabrasion'	,
			'phototherapy'	=>	'Phototherapy'	,
			'vascular_and_redness_treatment'	=>	'Vascular And Redness Treatment'	,
			'skin_resurfacing'	=>	'Skin Resurfacing'	,
			'fractional_resurfacing'	=>	'Fractional Resurfacing'	,
			'laser_peel'	=>	'Laser Peel'	,
			'skin_firming'	=>	'Skin Firming'
		);

		$this->female_procedures = array(
			'labia_minora_reduction_standing'	=>	'Labia Minora Reduction Standing'	,
			'labia_minora_reduction_lithotomy'	=>	'Labia Minora Reduction Lithotomy'	,
			'clitoral_hood_reduction'	=>	'Clitoral Hood Reduction'	,
			'labia_majora_labial_puff_standing'	=>	'Labia Majora Labial Puff Standing'	,
			'labia_majora_labial_puff_lithotomy'	=>	'Labia Majora Labial Puff Lithotomy'	,
			'mons_pubis_reduction'	=>	'Mons Pubis Reduction'
		);

		$this->male_procedures = array(
			'male_breast_reduction'	=>	'Male Breast Reduction'	,
			'male_blepharoplasty'	=>	'Male Blepharoplasty'	,
			'male_liposuction'	=>	'Male Liposuction'	,
			'male_neck_lift'	=>	'Male Neck Lift'	,
			'male_otoplasty'	=>	'Male Otoplasty'	,
			'male_rhinoplasty'	=>	'Male Rhinoplasty'	,
			'male_thigh_lift'	=>	'Male Thigh Lift'	,
			'injectables_for_men'	=>	'Injectables For Men'
		);
		
		//Add metaboxes

		$this->new_patients = array(
			'gcase_details' => 'Case Details',
			'gcase_notes' => 'Case Notes',
			'surgeon' => 'Surgeon',
			'hide_from_live'=> 'Hide From Live',
			'gheight'=> 'Height',
			'gweight' => 'Weight',
			'age' => 'Age',
			'implant_size_left' => 'Implant Size Left',
			'implant_size_right' => 'Implant Size Right',
			'cup_size_before' => 'Cup Size Before',
			'cup_size_after' => 'Cup Sizen After',
			'images_array' => 'Images'
		);

		
		
	}
	
}

