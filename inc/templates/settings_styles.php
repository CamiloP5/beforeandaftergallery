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
            settings_fields('p5_option_group_settings_styles'); // 'option_group' from inc/Pages/Admin.php function p5SetSettings()
            do_settings_sections( 'p5_gallery_settings' ); // 'page' from inc/Pages/Admin.php function p5SetSections()
            submit_button();
        ?>
        
    </form>
</div>
