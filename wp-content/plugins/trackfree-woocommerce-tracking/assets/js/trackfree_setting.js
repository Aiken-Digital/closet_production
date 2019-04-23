jQuery(function () {

    var appendthis =  ("<div class='modal-overlay trackfree-modal-close'></div>");

    jQuery('a[data-modal-id]').click(function(e) {
        jQuery('#trackfree-shipment-content').html('<img src="'+ ajax_object.image_url + 'preloader.gif" alt="Please wait...">');
        var id = this.id;
        e.preventDefault();
        jQuery("body").append(appendthis);
        jQuery(".trackfree-modal-overlay").fadeTo(500, 0.7);
        var modalBox = jQuery(this).attr('data-modal-id');
        jQuery('#'+modalBox).fadeIn(jQuery(this).data());
        jQuery.ajax({
            type: 'POST',
            data: {
                action: 'get_shipment_action',
                order_id: id
            },
            url: ajax_object.ajax_url,
            success: function(data) {
                jQuery('#trackfree-shipment-content').html(data);
            }
        });
    });

    jQuery(".trackfree-modal-close, .trackfree-modal-overlay").click(function() {
        jQuery(".trackfree-modal-box, .trackfree-modal-overlay").fadeOut(500, function() {
            jQuery(".trackfree-modal-overlay").remove();
        });
    });

    jQuery(window).resize(function() {
        jQuery(".trackfree-modal-box").css({
            top: (jQuery(window).height() - jQuery(".trackfree-modal-box").outerHeight()) / 2,
            left: (jQuery(window).width() - jQuery(".trackfree-modal-box").outerWidth()) / 2
        });
    });

    jQuery(window).resize();

    jQuery('.shipement-menu-item').live('click', function() {
        var id = this.id;
        var new_id = id.replace('shipment-item-link_', 'shipment-detail_');
        jQuery('.shipement-menu-item').removeClass('active');
        jQuery(this).addClass('active');
        jQuery('.trackfree-shipment-content').removeClass('trackfree_active');
        jQuery('#' + new_id).addClass('trackfree_active');
    });

    jQuery('.media-menu-item').live('click', function() {
        var id  = this.id.split('_');
        if (id[0] == 'shipping-link')
        {
            jQuery('#carrier-link_' + id[1]).removeClass('active');
            jQuery('#carrier-detail_' + id[1]).removeClass('trackfree_active');
            jQuery('#shipping-detail_' + id[1]).addClass('trackfree_active');
        }
        if (id[0] == 'carrier-link')
        {
            jQuery('#shipping-link_' + id[1]).removeClass('active');
            jQuery('#shipping-detail_' + id[1]).removeClass('trackfree_active');
            jQuery('#carrier-detail_' + id[1]).addClass('trackfree_active');
        }
        jQuery(this).addClass('active');
    });

    jQuery('.mb-btn-show-more').live('click', function() {
        var id  = this.id.split('_');
        jQuery('#mb-show-more-data_' + id[1]).show();
        jQuery(this).hide();
        jQuery('#mb-btn-hide-more_' + id[1]).show();
    });

    jQuery('.mb-btn-hide-more').live('click', function() {
        var id  = this.id.split('_');
        jQuery('#mb-show-more-data_' + id[1]).hide();
        jQuery(this).hide();
        jQuery('#mb-btn-show-more_' + id[1]).show();
    });

    jQuery('.tf-btn-show-more').live('click', function() {
        var id  = this.id.split('_');
        jQuery('#tf-show-more-data_' + id[1]).show();
        jQuery(this).hide();
        jQuery('#tf-btn-hide-more_' + id[1]).show();
    });

    jQuery('.tf-btn-hide-more').live('click',function() {
        var id  = this.id.split('_');
        jQuery('#tf-show-more-data_' + id[1]).hide();
        jQuery(this).hide();
        jQuery('#tf-btn-show-more_' + id[1]).show();
    });

    function set_trackfree_provider(selected_couriers) {
        jQuery.getJSON(ajax_object.plugins_url + "/trackfree-woocommerce-tracking/assets/js/trackfree_couriers.json", function(couriers) {
            jQuery.each(couriers, function (key, courier) {
                var str = '<option ';
                str += 'value="' + courier['name'] + '" ';
                if (selected_couriers.hasOwnProperty(courier['name'])) {
                    str += 'selected="selected"';
                }
                str += '>' + courier['name'] + '</option>';
                jQuery('#trackfree_couriers').append(str);
            });

            jQuery('#trackfree_couriers').val(selected_couriers);
            jQuery('#trackfree_couriers').chosen();
            jQuery('#trackfree_couriers').trigger('chosen:updated');
        });
    }

    jQuery('#trackfree_couriers').change(function () {
        var trackfree_couriers = jQuery('#trackfree_couriers').val();
        var value = (trackfree_couriers) ? trackfree_couriers.join(',') : '';
        jQuery('#track_couriers').val(value);
    });

    if (jQuery('#track_couriers')) {
        var trackfree_couriers = jQuery('#track_couriers').val();
        var couriers_select_array = (trackfree_couriers) ? trackfree_couriers.split(',') : [];
        set_trackfree_provider(couriers_select_array);
    }

    jQuery('.remove_image').click(function() {
        var cfm = confirm('Are you sure you want to delete?');
        if (cfm) {
            var id = this.id;
            var img_type = id.split('remove_');
            jQuery('#img_' + img_type[1]).remove();
            jQuery('#tb_' + img_type[1]).remove();
            jQuery('#change_' + img_type[1]).hide();
            jQuery('#upload_' + img_type[1]).show();
            jQuery('#remove_' + img_type[1]).hide();
            if (img_type[1] == 'site_banner') {
                jQuery('#banner_link_container').hide();
            }
            jQuery.ajax({
                type: 'POST',
                data: {
                    action: 'trackfree_remove_upload_images',
                    image_type: img_type[1]
                },
                url: ajax_object.ajax_url,
                success: function(data) {
                    alert(data);
                }
            });
        }
    });

    jQuery('#save_banner_url').click(function() {
        jQuery.ajax({
            type: 'POST',
            data: {
                action: 'trackfree_site_banner_action',
                site_banner_url: $('#trackfree_banner_url').val()
            },
            url: ajax_object.ajax_url,
            success: function(data) {
                alert(data);
            }
        });
    });
});

jQuery('#btn_add_tracking').live('click', function() {
    var trackfree_tracking_number = jQuery('#trackfree_tracking_number').val();
    var trackfree_courier_name = jQuery("select#trackfree_courier_name option").filter(":selected").val();
    var ord_id = jQuery('#ord_id').val();
    if((trackfree_tracking_number) && (trackfree_courier_name)) {

        jQuery.getJSON(ajax_object.plugins_url + "/trackfree-woocommerce-tracking/assets/js/trackfree_couriers.json", function(couriers) {
            jQuery.each(couriers, function (key, courier) {
                if (courier['name'] == trackfree_courier_name) {
                    jQuery('#add_new_tracking').html('<div style="margin:5px">' +  trackfree_tracking_number + '</div><div style="margin:5px"><img src="//trackfree.sfo2.digitaloceanspaces.com/courier-logo/' +  courier['logo'] + '.png" alt="' +  trackfree_courier_name + '" style="opacity: 0.4;"></div><div>' + jQuery('#get_tracking_alert').val() + '</div><div><img src="'+ ajax_object.image_url + 'preloader.gif" alt="Please wait..."></div>');
                }
            });
        });

        jQuery.ajax({
            type: 'POST',
            data: {
                action: 'add_new_shipment',
                ord_id: ord_id,
                trackfree_tracking_number: trackfree_tracking_number,
                trackfree_courier_name: trackfree_courier_name
            },
            url: ajax_object.ajax_url,
            success: function(data) {
                alert(data);
                location.reload();
            }
        });
    }
});

jQuery('.delete_tracking').live('click', function() {
    var cfm = confirm('Are you sure you want to delete?');
    if (cfm) {
        var id = this.id;
        var order_id = jQuery('#order_id').val();
        jQuery.ajax({
            type: 'POST',
            data: {
                action: 'tracking_delete_action',
                track_id: id,
                order_id: order_id
            },
            url: ajax_object.ajax_url,
            success: function(data) {
                jQuery('#track_details_' + id).remove();
                if (data == 0) {
                    jQuery('#add_tracking').show();
                    jQuery(".tf_add_and_view").remove();
                }
            }
        });
    }
});

jQuery('#new_track_add').live('click', function() {
    jQuery('#add_tracking').toggle();
});

jQuery('.show_shipment_detail').live('click', function() {
    jQuery("#tf_ship_detail_" + this.id).html('<img src="'+ ajax_object.image_url + 'preloader.gif" alt="Please wait...">');
    var shipment_id = this.id;
    var order_id = jQuery('#order_id').val();
    jQuery.ajax({
        type: 'POST',
        data: {
            action: 'show_shipment_detail_action',
            shipment_id: shipment_id,
            order_id: order_id
        },
        url: ajax_object.ajax_url,
        success: function(data) {
            jQuery("#tf_ship_detail_" + shipment_id).html(data);
        }
    });
});
