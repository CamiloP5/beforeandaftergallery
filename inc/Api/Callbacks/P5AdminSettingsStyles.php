<?php
/**
 * @package  p5galleryPatients
 * ===========================
 * Settings Api
 * ===========================
*/

namespace Inc\Api\Callbacks;

use Inc\Base\P5Basecontroller;

class P5AdminSettingsStyles extends P5Basecontroller
{

    public function p5CheckBoxSanitize( $input )
    {
        $output = array();
        foreach($this->checkbox_styles_fields as $key => $value)
        {
            $output[] = isset($input[$key]) ? true : false;
        }
        return $output;
    }

    public function p5InputSanitize($input)
    {
        return $input;
    }

    public function p5AdminSectionSettingsStyles()
    {
        echo 'Styles Sections Manager';
    }

    public function p5GenerateCheckBox($args)
    {
        $name = $args['label_for'];
        $classes = $args['class'];
        $checkbox = get_option($name);

        echo '<div class="'.$classes.'">
                        <input  type="checkbox" 
                                id="'.$name.'" 
                                name="'.$name.'"
                                value="1" 
                                '.($checkbox ? "checked" : "").'   
                                class="'.$classes.'"
                        >
                        <label for="'.$name .'">
                            <div></div>
                        </label>
                    </div>';
        
    }

    public function p5AdminSettingsInputLogo($args)
    {
        $input_name = $args['label_for'];
        $input_classes = $args['class'];
        $input_get_value = get_option($input_name);
        $input_field = '<input type="text"  class="'.$input_classes.'" name="'.$input_name.'" id="'.$input_name.'" value="'.(isset($input_get_value) ? $input_get_value : "").'">';
        $button_image = '<input type="button" name="load_logo" class="'.$input_classes.' button button-primary addSingleImage" addSingleImage value="'.(!empty($input_get_value) ? "Replace" : "Choose a Logo").'">';
        $logo_image = '<img src="'.(isset($input_get_value) ? $input_get_value : "").'" class="gallery_image_logo">';
        echo '<div class="logo_container">'.$input_field." ".$button_image ." ".$logo_image.'</div>';
    }

    public function p5AdminSettingsInput($args)
    {
        $input_name = $args['label_for'];
        $input_classes = $args['class'];
        $input_get_value = get_option($input_name);
        $input_field = '<input type="text"  class="'.$input_classes.'" name="'.$input_name.'" id="'.$input_name.'" value="'.(isset($input_get_value) ? $input_get_value : "").'">';
        echo $input_field;
    }

    // Procedures

    public function p5DefaultProceduresSection(){
        echo 'Default Procedures';
    }
    //Face
    public function p5FaceProceduresCheckBoxSanitize($input)
    {
        $output = array();
        foreach($this->face_procedures as $key => $value)
        {
            $output[] = isset($input[$key]) ? true : false;
        }
        return $output;
    }
    //Breast
    public function p5BreastProceduresCheckBoxSanitize($input)
    {
        $output = array();
        foreach($this->breats_procedures as $key => $value)
        {
            $output[] = isset($input[$key]) ? true : false;
        }
        return $output;
    }

    
}