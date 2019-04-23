<?php
function cd_meta_box_add()
{
    add_meta_box('trackfree-meta-box', 'TrackFree - Delivery Tracker', 'trackfree_editable_order_meta_general', 'shop_order', 'side', 'high');
}

function trackfree_editable_order_meta_general()
{
    global $post;
    global $wpdb;

    $trackfree_account_api_key = get_option('trackfree_account_api_key');
    $trackfree_account_verify = get_option('trackfree_account_verify');

    if (($trackfree_account_api_key) && ($trackfree_account_verify)) {
        //Delete old trackfree options
        if (get_option('trackfree_option_name'))
        {
            $old_courier_data = get_option('trackfree_option_name');
            if ($old_courier_data['couriers']) {
                $courier_request = array(
                    'key' => $trackfree_account_api_key,
                    'courier_data' => $old_courier_data['couriers']
                );
                $response_data = wp_remote_get(trackfree_url() . '/api/wc_get_couriers',array(
                    'sslverify' => false,
                    'timeout' => 15,
                    'body' => $courier_request
                    )
                );
                $courier_data = wp_remote_retrieve_body( $response_data );
                $updated_couriers = sanitize_text_field($courier_data);
                add_option('trackfree_preferred_couriers');
                update_option('trackfree_preferred_couriers', $updated_couriers);
                delete_option('trackfree_option_name');
            }
        }

        $trackfree_courier_name = '';
        $trackfree_tracking_number = '';
        $shipment_details = get_post_meta($post->ID, '_trackfree_shipment_details', true);
        $total_shipments = $shipment_details ? sizeof($shipment_details) : 0;
        if ($shipment_details) {
            $couriers_json = file_get_contents( plugins_url('/trackfree-woocommerce-tracking/assets/js/trackfree_couriers.json'));
            $courier_list = json_decode($couriers_json, true);

            $track_nums = '';
            foreach ($shipment_details as $ship_detail) {
                if ($ship_detail['tracking_num']) {
                    $track_nums .= $ship_detail['tracking_num'] . ',';
                }
            }
            $tracking_nums = substr($track_nums, 0, -1); ?>
            <div>
                <div>
                    <table>
                        <tr class="tf_add_and_view">
                            <td>
                                <a href="<?php echo get_option('trackfree_tracking_domain') . '/t/' . $tracking_nums; ?>" target="_blank" style="text-decoration: none;"><?php _e('View tracking', 'trackfree-woocommerce-tracking');?><span aria-hidden="true" class="dashicons dashicons-external"></span></a>
                            </td>
                            <?php if ($total_shipments < 3) { ?>
                                <td>&nbsp; | &nbsp;
                                    <a href="javascript:void(0);" id="new_track_add" class="welcome-icon welcome-add-page" style="text-decoration: none;"><?php _e('Add new', 'trackfree-woocommerce-tracking');?> <span aria-hidden="true" class="dashicons dashicons-external"></span></a>
                                </td>
                            <?php } ?>
                        </tr>
                    </table>
                    <?php if ($total_shipments < 3) { ?>
                        <div id="add_tracking" style="display:none">
                            <?php echo add_tracking_template($post->ID);?>
                        </div>
                        <?php
                    } ?>
                </div>
                <input type="hidden" id="trackfree_account_api_key" value="<?php echo $trackfree_account_api_key;?>" />
                <hr/>
                <?php
                $i = 1;
                foreach ($shipment_details as $key => $shipment_values) {
                    $trackfree_courier_name = $shipment_values['courier_name'];
                    $trackfree_tracking_number = $shipment_values['tracking_num'];

                    $courier_logo = '';
                    $courier_key = array_search($trackfree_courier_name, array_column($courier_list, 'name'));
                    if ($courier_key) {
                        $courier_logo = $courier_list[$courier_key]['logo'];
                    }

                    if ($trackfree_tracking_number) { ?>
                        <div id="track_details_<?php echo $key;?>">
                            <div>
                                <table width="100%">
                                    <tr>
                                        <td>
                                            <?php if ($courier_logo) { ?>
                                                <img src="//trackfree.sfo2.digitaloceanspaces.com/courier-logo/<?php echo $courier_logo;?>.png" alt="<?php echo $trackfree_courier_name;?>" width="36" style="opacity: 0.4;"/>
                                                <?php
                                            } else {
                                                echo $trackfree_courier_name;
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php echo $trackfree_tracking_number; ?>
                                        </td>
                                        <td>
                                            <a href="javascript:void(0);" class="delete_tracking" id="<?php echo $key;?>">
                                                <img src="<?php echo plugins_url('trackfree-woocommerce-tracking/assets/images/delete.png');?>" alt="<?php _e('Delete', 'trackfree-woocommerce-tracking');?>"/>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <a href="javascript:void(0);" class="show_shipment_detail" id="<?php echo $key;?>"><?php _e('View shipment details', 'trackfree-woocommerce-tracking');?>
                                            </a>
                                        </td>
                                    </tr>
                                </table>
                                <div class="tf-shipment-content" id="tf_ship_detail_<?php echo $key;?>">

                                </div>
                            </div>
                            <?php if ($total_shipments != $i) {
                                echo '<hr>';
                            } ?>
                        </div>
                        <input type="hidden" id="order_id" value="<?php echo $post->ID; ?>"/>
                        <?php
                    }
                    $i++;
                } ?>
            </div>
            <?php
        } else {
            echo add_tracking_template($post->ID);
        }
    } else {
        echo '<a href="'.admin_url('options-general.php?page=trackfree-getting-started') . '">' . __('Connect with TrackFree', 'trackfree-woocommerce-tracking') .'</a>';
    }
}

function add_tracking_template($order_id)
{
    $couriers = array();
    $preferred_couriers = get_option('trackfree_preferred_couriers');
    if ($preferred_couriers) {
        $couriers = explode(',', $preferred_couriers);
    } ?>
    <div id="add_new_tracking" style="margin: 10px; 0">
        <div style="margin:5px 0;">
            <label><?php _e('Courier Name', 'trackfree-woocommerce-tracking');?> </label>
            <select name="_trackfree_courier_name" id="trackfree_courier_name" class="form-field-wide">
                <?php
                foreach ($couriers as $courier) { ?>
                    <option value="<?php echo $courier;?>"><?php echo $courier; ?></option>
                    <?php
                } ?>
            </select>
        </div>
        <div style="margin:5px 0;">
            <label><?php _e('Tracking Number', 'trackfree-woocommerce-tracking');?> </label>
            <input type="text" id="trackfree_tracking_number" name="_trackfree_tracking_number" class="form-field-wide">
            <input type="hidden" id="ord_id" value="<?php echo $order_id; ?>"/>
        </div>
        <div style="margin:5px 0;">
            <input type="button" class="button button-primary" id="btn_add_tracking" value="<?php _e('Add new tracking', 'trackfree-woocommerce-tracking');?>">
        </div>
    </div>
    <input type="hidden" id="get_tracking_alert" value="<?php _e('Please wait, we are getting tracking info from the carrier.', 'trackfree-woocommerce-tracking');?>">
    <?php
}

add_action('wp_ajax_show_shipment_detail_action', 'show_shipment_detail_action');

function show_shipment_detail_action()
{
    $user_id = get_current_user_id();
    if (current_user_can('edit_user', $user_id)) {
        $trackfree_account_api_key = get_option('trackfree_account_api_key');
        $trackfree_account_verify = get_option('trackfree_account_verify');

        if (($trackfree_account_api_key) && ($trackfree_account_verify)) {
            $shipment_details = get_post_meta($_POST['order_id'], '_trackfree_shipment_details', true);
            $key = $_POST['shipment_id'];
            $trackfree_courier_name = $shipment_details[$key]['courier_name'];
            $trackfree_tracking_number = $shipment_details[$key]['tracking_num'];
           if ($trackfree_tracking_number) {
                $track_request = array(
                    'key' => $trackfree_account_api_key,
                    'tracking_num' => $trackfree_tracking_number,
                    'courier_name' => $trackfree_courier_name,
                    'request_type' => 'details'
                );

                $response_data = wp_remote_get(trackfree_url() . '/api/wc_track_data',array(
                    'sslverify' => false,
                    'timeout' => 15,
                    'body' => $track_request
                    )
                );
                $track_data = json_decode( wp_remote_retrieve_body( $response_data ), true );
                if ($track_data['response'] == 'success') {
                    $shipment_details[$key] = array(
                        'tracking_num' => $trackfree_tracking_number,
                        'courier_name' => $trackfree_courier_name,
                        'status' => $track_data['status'],
                        'estimated_delivery' => $track_data['estimateDeliveryDate'],
                        'delivered_date' => $track_data['deliveredDate']
                    );
                    update_post_meta($_POST['order_id'], '_trackfree_shipment_details', wc_clean($shipment_details));
                    ?>
                    <div id="track_details_<?php echo $key;?>">
                        <div style="padding-top:20px">
                            <table style="width:100%">
                                <tr>
                                    <td align="center" style="width: 50%; border-right: solid 1px #ddd;">
                                        <span class="trackfree-status"><?php _e('STATUS', 'trackfree-woocommerce-tracking');?></span>
                                        <br/>
                                        <span class="tf-status">
                                            <?php echo $track_data['status']; ?>
                                        </span>
                                    </td>
                                    <td align="center" style="width: 50%">
                                        <span class="trackfree-status"><?php _e('FEEDBACK', 'trackfree-woocommerce-tracking');?></span>
                                        <br/>
                                        <?php
                                        if ($track_data['feedback'] == 0) { ?>
                                            <span class="trackfree-feedback">N/A</span>
                                            <?php
                                        } else if ($track_data['feedback'] == 1) { ?>
                                            <span class="trackfree-feedback"><?php _e('Satisfied', 'trackfree-woocommerce-tracking');?></span>
                                            <?php
                                        } else if ($track_data['feedback'] == 2) { ?>
                                            <span class="trackfree-feedback"><?php _e('Not satisfied', 'trackfree-woocommerce-tracking');?></span>
                                            <?php
                                        } ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <?php
                        if ($track_data['status'] == 'Delivered') { ?>
                            <div class="trackfree-delivered">
                                <div class="trackfree-scheduled-delivery-o"><?php _e('Delivered on', 'trackfree-woocommerce-tracking');?> <?php echo $track_data['deliveredDate'];?></div>
                            </div>
                            <?php
                        } else if ($track_data['status'] == 'Exception') { ?>
                            <div class="trackfree-exception">
                                <div class="trackfree-scheduled-delivery-o"><?php echo 'Exception';?></div>
                            </div>
                            <?php
                        } else { ?>
                            <div class="trackfree-scheduled">
                                <div class="trackfree-scheduled-delivery-o">
                                    <?php
                                    if ($track_data['estimateDeliveryDate']) {
                                        _e('Estimated delivery on', 'trackfree-woocommerce-tracking'); ?> <?php
                                        echo $track_data['estimateDeliveryDate'];
                                    } else {
                                        _e('No estimated delivery date', 'trackfree-woocommerce-tracking');
                                    } ?>
                                </div>
                            </div>
                            <?php
                        } ?>

                        <?php if (get_option('trackfree_shipment_details_in_order_details') == 1) { ?>
                            <div class="media-router" style="margin-top:10px;">
                                <a href="javascript:void(0);" style="font-size:12px;" class="media-menu-item active" id="shipping-link_<?php echo $key;?>"><?php _e('Shipping Activity', 'trackfree-woocommerce-tracking');?></a>
                                <a href="javascript:void(0);" style="font-size:12px;" class="media-menu-item" id="carrier-link_<?php echo $key;?>"><?php _e('Contact Carrier', 'trackfree-woocommerce-tracking');?></a>
                            </div>
                            <div style="clear: both;"></div>
                            <div class="trackfree-tab-content trackfree_active" id="shipping-detail_<?php echo $key;?>">
                                <?php
                                echo show_shipment_details($track_data['trackDetails']['trackValues'], $key, 'tf', 'overflow-y: auto; height: 300px;'); ?>
                            </div>
                            <div class="trackfree-tab-content" id="carrier-detail_<?php echo $key;?>">
                                <table class="trackfree-table" style="padding:10px 0;">
                                    <?php
                                    if ($track_data['carrierContact']['phoneNumber']) { ?>
                                        <tr>
                                            <td>
                                                <?php echo $track_data['carrierContact']['phoneNumber'];?>
                                            </td>
                                        </tr>
                                        <?php
                                    } if ($track_data['carrierContact']['website']) { ?>
                                        <tr>
                                            <td>
                                                <a href="<?php echo $track_data['carrierContact']['website'];?>" target="_blank"><?php echo $track_data['carrierContact']['website'];?></a>
                                            </td>
                                        </tr>
                                        <?php
                                    } ?>
                                </table>
                            </div>
                            <?php
                        } ?>
                    </div>
                    <?php
                } else {
                    if ($track_data['message'] == 'tracking_not_exist') {
                        $shipment_details[$key] = array(
                            'tracking_num' => $trackfree_tracking_number,
                            'courier_name' => $trackfree_courier_name,
                            'status' => '',
                            'estimated_delivery' => '',
                            'delivered_date' => ''
                        );
                        update_post_meta($_POST['order_id'], '_trackfree_shipment_details', wc_clean($shipment_details));
                        ?>
                        <div id="track_details_<?php echo $key;?>">
                            <p>
                                <?php _e('This tracking does not exist', 'trackfree-woocommerce-tracking'); ?>
                            </p>
                        </div>
                        <?php
                    } else if ($track_data['message'] == 'user_not_exist') {
                        update_option('trackfree_account_api_key', '');
                        update_option('trackfree_account_verify', 0);
                    }
                }
            }
        }
    }
    wp_die();
}
