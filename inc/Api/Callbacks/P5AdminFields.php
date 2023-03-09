<?php
/**
 * @package  p5galleryPatients
 * ===========================
 * Settings Api
 * ===========================
*/

namespace Inc\Api\Callbacks;

use Inc\Base\P5Basecontroller;

class P5AdminFields extends P5Basecontroller
{

    public function p5SettingsCheckBoxSanitize( $input )
    {
        return (isset($input) ? true : false);
        /*$output = array();
        foreach($this->default_procedures as $key => $value)
        {
            $output[] = isset($input[$key]) ? true : false;
        }
        return $output;*/
    }

    public function p5SettingsInputSanitize($input)
    {
        return $input;
    }

    public function p5AdminSectionSettingsStyles()
    {
        echo 'Styles Sections Manager';
    }

    public function p5AdminSectionProcedures(){
        echo 'Default Procedures';
    }

    public function p5AdminSettingsCheckBox($args)
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
        print_r($input_get_value);
        $input_field = '<input type="text"  class="'.$input_classes.'" name="'.$input_name.'" id="'.$input_name.'" value="'.(isset($input_get_value) ? $input_get_value : "").'">';
        $button_image = '<input type="button" class="'.$input_classes.' button button-primary load-image" value="'.(!empty($input_get_value) ? "Replace" : "Choose a Logo").'">';
        echo $input_field." ". $button_image;
    }

    public function p5AdminSettingsInput($args)
    {
        $input_name = $args['label_for'];
        $input_classes = $args['class'];
        $input_get_value = get_option($input_name);
        $input_field = '<input type="text"  class="'.$input_classes.'" name="'.$input_name.'" id="'.$input_name.'" value="'.(isset($input_get_value) ? $input_get_value : "").'">';
        echo $input_field;
    }

    
}