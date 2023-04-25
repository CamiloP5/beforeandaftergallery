<?php
/**
 * @package  p5galleryPatients
 * ===========================
 * Init plugin
 * ===========================
*/
?>
<div class="wrap">
    <h1> Admin Dashboard</h1>    
    <?php settings_errors(); ?>

    <form action="options.php" method="post">
        <?php
            settings_fields(''); // 'option_group' from inc/Pages/SettingsStyles.php function p5SetSettings()
            do_settings_sections( '' ); // 'page' from inc/Pages/SettingsStyles.php function p5SetSections()
            //submit_button();
        ?>
        
    </form>
</div>
