( function( $) {
    $.wpMediaUploader = function( options ) {

        var settings = $.extend({

            target : '.tf-img-uploader',
            uploaderTitle : 'Select image',
            uploaderButton : 'Select',
            multiple : false,
            buttonText : 'Select image',
            buttonClass : '.button',
            previewSize : '150px',
            modal : false,
            buttonStyle : {
            },

        }, options );

        $( settings.target ).prepend('<div class="thumb-view" style="margin: 10px 0;"><img src="#" class="tf-img" style="display: none; width: ' + settings.previewSize + '"/></div>')

        $( settings.buttonClass ).css( settings.buttonStyle );

        $('.tf-uploader').on('click', function(e) {

            e.preventDefault();
            var selector = $(this).parent( settings.target );
            var selector_id = $(this).parent().attr("id");
            var alt_id = selector_id.replace('tf', 'tb');
            var custom_uploader = wp.media({
                title: settings.uploaderTitle,
                button: {
                    text: settings.uploaderButton
                },
                library: {
                    type: 'image'
                },
                multiple: settings.multiple
            })
            .on('select', function() {
                var attachment = custom_uploader.state().get('selection').first().toJSON();
                var image_type  = selector.find( '.tf_uploads' ).attr( 'id');
                var allowed_ext = ['gif','png','jpg','jpeg'];
                if (image_type == 'site_fav_icon') {
                    allowed_ext = ['png','ico'];
                }
                var ext = attachment.filename.split('.').pop().toLowerCase();
                if($.inArray(ext, allowed_ext) == -1) {
                    alert('Invalid image format.');
                    return false;
                }
                selector.find( '.thumb-view' ).attr( 'id', alt_id);
                selector.find( '.tf-img' ).attr( 'src', attachment.url).show();
                selector.find( '.tf_uploads' ).val(attachment.url);
                selector.find( '.show_image' ).remove();
                var image_url = attachment.url;
                if( settings.modal ) {
                    $('.modal').css( 'overflowY', 'auto');
                }
                jQuery.ajax({
                    type: 'POST',
                    data: {
                        action: 'trackfree_upload_images',
                        image_type: image_type,
                        image_url: image_url
                    },
                    url: ajax_object.ajax_url,
                    success: function(data) {
                        jQuery('#change_' + image_type).show();
                        jQuery('#upload_' + image_type).hide();
                        jQuery('#remove_' + image_type).show();
                        if (image_type == 'site_banner') {
                            jQuery('#banner_link_container').show();
                        }
                        alert(data);
                    }
                });
            })
            .open();
        });

    }
})(jQuery);

jQuery(function () {
    jQuery.wpMediaUploader();
});
