jQuery(document).ready(function(){

    var mediaUploader;
    var loadName;

    jQuery(document).on('click','.addSingleImage', function(e){
        e.preventDefault();
        loadName = jQuery(this).attr('name');
        loadImages(this);
    });

    function loadImages(){
        
        if(mediaUploader){
            mediaUploader.open();
            return;
        }

        mediaUploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
            text: 'Choose Image'
        }, multiple: false });

        mediaUploader.on('select', function() {
            attachment = mediaUploader.state().get('selection').first().toJSON();
            switch(loadName){
                case 'load_logo':
                    jQuery('#logo_url').val(attachment.url);
                    jQuery('.gallery_image_logo').attr('src',attachment.url );
                    break;
            }
        });
        mediaUploader.open();
  };

});// end document.ready