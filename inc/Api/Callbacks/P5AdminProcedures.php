<?php
/**
 * @package  p5galleryPatients
 * ===========================
 * Settings Api
 * ===========================
*/

namespace Inc\Api\Callbacks;

use Inc\Base\P5Basecontroller;

class P5AdminProcedures extends P5Basecontroller
{
    // Procedures

    public function p5GenerateProceduresCheckBox($args)
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
     //body
    public function p5BodyProceduresCheckBoxSanitize($input)
    {
        $output = array();
        foreach($this->body_procedures as $key => $value)
        {
            $output[] = isset($input[$key]) ? true : false;
        }
        return $output;
    }

     //Skin
    public function p5SkinProceduresCheckBoxSanitize($input)
    {
        $output = array();
        foreach($this->skin_procedures as $key => $value)
        {
            $output[] = isset($input[$key]) ? true : false;
        }
        return $output;
    }

    //Female
    public function p5FemaleProceduresCheckBoxSanitize($input)
    {
        $output = array();
        foreach($this->female_procedures as $key => $value)
        {
            $output[] = isset($input[$key]) ? true : false;
        }
        return $output;
    }

    //Male
    public function p5MaleProceduresCheckBoxSanitize($input)
    {
        $output = array();
        foreach($this->male_procedures as $key => $value)
        {
            $output[] = isset($input[$key]) ? true : false;
        }
        return $output;
    }
}