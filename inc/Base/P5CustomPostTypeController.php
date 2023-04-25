<?php
/**
* @package  p5galleryPatients
 * ===========================
 * Base Controller Plugin
 * ===========================
*/
namespace Inc\Base;

use \Inc\Api\P5SettingsApi;
use \Inc\Base\P5Basecontroller;
//use \Inc\Api\Callbacks\P5AdminCallbacks;



class P5CustomPostTypeController extends P5Basecontroller
{
    public $new_patients;

    public function register()
    {
        $this->settings = new P5SettingsApi();

       // $this->callbacks = new P5AdminCallbacks();

        add_action('init', array($this, 'patientsCustomPostType'));

        add_action( 'add_meta_boxes', array($this,'addCustomFieldsPatients') );

        add_action('save_post', array($this, 'saveCustomFieldsPatients'),  1, 2);
    }
    
    public function patientsCustomPostType()
    {
        register_post_type('patients', 
            array(
                'labels' => array(
                    'name' => _x('All Patients gallery', 'textdomain'),
                    'singular_name' => _x('Patients', 'textdomain'),
                    'menu_name' => _x('Main Patients Gallery', 'textdomain'),
                    'name_admin_bar' =>  _x('Admin bar', 'textdomain'),
                    'add_new' =>  _x('Add New Patient' , 'textdomain'),
                    'add_new_item' =>  _x('Add new patient', 'textdomain'),
                    'new_item' =>  _x('New Patient', 'textdomain'),
                    'edit_item' =>  _x('Edit Patient', 'textdomain'),
                    'view_item' =>  _x('View Patient', 'textdomain'),
                    'all_items' =>  _x('All patients', 'textdomain'),
                    'search_item' =>  _x('Search Patient', 'textdomain'),
                    'parent_item_colon' =>  _x('Parent item colon', 'textdomain'),
                    'not_found' =>  _x('Patient not found ', 'textdomain'),
                    'not_found_in_trash' => _x('Patient not found in trash', 'textdomain'),
                   'featured_image'        => __( 'Featured Image', 'textdomain' ),
                    'set_featured_image'    => __( 'Set featured image', 'textdomain' ),
                    'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
                    'use_featured_image'    => __( 'Use as featured image', 'textdomain' ),
                    'insert_into_item'      => __( 'Insert into item', 'textdomain' ),
                    'uploaded_to_this_item' => __( 'Uploaded to this item', 'textdomain' ),
                    'items_list'            => __( 'Items list', 'textdomain' ),
                    'items_list_navigation' => __( 'Items list navigation', 'textdomain' ),
                    'filter_items_list'     => __( 'Filter items list', 'textdomain' ),
                ),
                'public'             => true,
               'publicly_queryable' => true,
               'show_ui'            => true,
               'query_var'          => true,
               'description' => __('Post images types', 'textdomain'),
               'show_ui' => true,
               'show_in_menu' => true,
               'rewrite' => array('slug' => 'patients'),
                'has_archive' => true,
                'menu_position' => 10,
                'supports' =>  array( 
                                    'title',
                                    'editor',
                                    'thumbnail',
                                    'author',
                                    'custom-fields',
                                ),
               'can_export' => true,
                'menu_icon' => 'dashicons-format-gallery',
                'taxonomies'    => array(
                    'procedures'
                )    
            )
        );
    }

    public function addCustomFieldsPatients() {
        $page = 'patients';
        $context = 'normal';
        $priority = 'high';
        
        add_meta_box( 'case_details', 'Patients Info', array($this, 'patientsData'), $page, $context, $priority );
        
    }

    public function patientsData($post){
        //recover data from db to edit
        global $wpdb, $post;
        $id = get_the_ID();
        foreach ($this->new_patients as $key => $value) {
            $field = get_post_meta($post->ID, 'gcase_details', true);
            print_r($field);
                ?>
                <fieldset>
                    <div class="custom-fields">
                        <div class="custom-fields-title">
                            <label for="<?php echo $key ?>"><?php echo $value ?>:</label>
                        </div>
                        <div class="custom-fields-input">
                            <?php 
                                switch($key){
                                    case 'hide_from_live':
                                    ?> 
                                        <input type="checkbox" name="<?php echo $key ?>" id="<?php echo $key ?>"  />
                                    <?php
                                    break;
                                    
                                    case 'surgeon':
                                    ?> 
                                        <select name="<?php echo $key ?>" id="<?php echo $key ?>">Surgeon </select>
                                    <?php
                                    break;
                                    
                                    default:
                                    ?>
                                        <input type="text" name="<?php echo $key ?>" id="<?php echo $key ?>" value="<?php if(isset($field)) { echo $field; } ?>"  />
                                    <?php
                                }
                            ?>
                        </div> 
                    </div>
                </fieldset>
                <?php
            wp_nonce_field( '_namespace_form_metabox_patients', '_namespace_form_metabox_patients_fields' );
        }
    }

    public function saveCustomFieldsPatients($post_id, $post){
        print_r($_POST);
        exit();
        die();
        // Verify that our security field exists. If not, bail.
        if ( !isset( $_POST['_namespace_form_metabox_patients_fields'] ) ) return;
    
        // Verify data came from edit/dashboard screen
        if ( !wp_verify_nonce( $_POST['_namespace_form_metabox_patients_fields'], '_namespace_form_metabox_patients' ) ) {
            return $post->ID;
        }
    
        // Verify user has permission to edit post
        if ( !current_user_can( 'edit_post', $post->ID )) {
            return $post->ID;
        }
        
        // Check that our custom fields are being passed along
        // This is the `name` value array. We can grab all
        // of the fields and their values at once.
        if ( !isset( $_POST['gcase_details'] ) ) {
            return $post->ID;
        }
        if ( !isset( $_POST['gcase_notes'] ) ) {
            return $post->ID;
        }
        if ( !isset( $_POST['surgeon'] ) ) {
            return $post->ID;
        }
        if ( !isset( $_POST['hide_from_live'] ) ) {
            return $post->ID;
        }
        if ( !isset( $_POST['gheight'] ) ) {
            return $post->ID;
        }
        if ( !isset( $_POST['gweight'] ) ) {
            return $post->ID;
        }
        if ( !isset( $_POST['age'] ) ) {
            return $post->ID;
        }
        if ( !isset( $_POST['implant_size_left'] ) ) {
            return $post->ID;
        }
        if ( !isset( $_POST['implant_size_right'] ) ) {
            return $post->ID;
        }
        if ( !isset( $_POST['cup_size_before'] ) ) {
            return $post->ID;
        }
        if ( !isset( $_POST['cup_size_after'] ) ) {
            return $post->ID;
        }
        if ( !isset( $_POST['images_array'] ) ) {
            return $post->ID;
        }
        
        /**
         * Sanitize the submitted data
         * This keeps malicious code out of our database.
         * `wp_filter_post_kses` strips our dangerous server values
         * and allows through anything you can include a post.
         */
        //save and update case details
        $sanitized_gcase_details     = wp_filter_post_kses( $_POST['gcase_details'] );
        update_post_meta( $post->ID, 'gcase_details', $sanitized_gcase_details );

        // Save and update case notes
        $sanitized_gcase_notes       = wp_filter_post_kses( $_POST['gcase_notes'] );
        update_post_meta( $post->ID, 'gcase_notes', $sanitized_gcase_notes );
        // Save and update surgeon
        $sanitized_surgeon       = wp_filter_post_kses( $_POST['surgeon'] );
        update_post_meta( $post->ID, 'surgeon', $sanitized_surgeon );
        // Save and update surgeon
        $sanitized_hide_from_live       = wp_filter_post_kses( $_POST['hide_from_live'] );
        update_post_meta( $post->ID, 'hide_from_live', $sanitized_hide_from_live );
        // Save and update surgeon
        $sanitized_gheight       = wp_filter_post_kses( $_POST['gheight'] );
        update_post_meta( $post->ID, 'gheight', $sanitized_gheight );
        // Save and update surgeon
        $sanitized_gweight       = wp_filter_post_kses( $_POST['gweight'] );
        update_post_meta( $post->ID, 'gweight', $sanitized_gweight );
        // Save and update surgeon
        $sanitized_age       = wp_filter_post_kses( $_POST['age'] );
        update_post_meta( $post->ID, 'age', $sanitized_age );
        // Save and update surgeon
        $sanitized_implant_size_left       = wp_filter_post_kses( $_POST['implant_size_left'] );
        update_post_meta( $post->ID, 'implant_size_left', $sanitized_implant_size_left );
        // Save and update surgeon
        $sanitized_implant_size_right       = wp_filter_post_kses( $_POST['implant_size_right'] );
        update_post_meta( $post->ID, 'implant_size_right', $sanitized_implant_size_right );
        // Save and update surgeon
        $sanitized_cup_size_before       = wp_filter_post_kses( $_POST['cup_size_before'] );
        update_post_meta( $post->ID, 'cup_size_before', $sanitized_cup_size_before );
        // Save and update surgeon
        $sanitized_cup_size_after        = wp_filter_post_kses( $_POST['cup_size_after'] );
        update_post_meta( $post->ID, 'cup_size_after', $sanitized_cup_size_after  );
        // Save and update images
        $sanitized_images_array        = wp_filter_post_kses( $_POST['images'] );
        update_post_meta( $post->ID, 'images_array', $sanitized_images_array  );
   }

    
}