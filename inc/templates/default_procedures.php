<?php
/**
 * @package  p5galleryPatients
 * ===========================
 * Init plugin
 * ===========================
*/
?>
<div class="wrap">
    <?php settings_errors(); ?>
        <form action="options.php" method="post">
            <?php
                settings_fields('p5_option_group_face_procedures'); // 'option_group' from inc/Pages/SettingsStyles.php function p5SetSettings()
                do_settings_sections( 'p5_gallery_default_procedures' ); // 'page' from inc/Pages/SettingsStyles.php function p5SetSections()
                submit_button();
            ?>
            
        </form>
</div>

