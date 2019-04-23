<?php
/*
Plugin Name: TrackFree - WooCommerce Tracking
Plugin URI: https://trackfree.io/
Description: TrackFree is hassle-free automated shipment tracking plugin for WooCommerce.
Version: 1.16.0
Author: TrackFree
Author URI: https://trackfree.io
Text Domain: trackfree-woocommerce-tracking
Domain Path: /languages
*/

if (!defined('ABSPATH'))
    exit;

if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {

    wp_enqueue_script('jquery');

    wp_enqueue_script('trackfree_script_setting', plugins_url('/assets/js/trackfree_setting.js', __FILE__), array('jquery'));
    wp_enqueue_script('trackfree_bootstrap', plugins_url('/assets/js/bootstrap.min.js', __FILE__), array('jquery'));
    wp_localize_script('trackfree_script_setting', 'ajax_object', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'admin_url' => admin_url(),
        'plugins_url' => plugins_url(),
        'image_url' => plugins_url('trackfree-woocommerce-tracking/assets/images/')
    ));
    wp_enqueue_style('trackfree_style_script', plugins_url('/assets/css/trackfree.css', __FILE__));

    register_activation_hook(__FILE__, 'trackfree_activation');

    register_uninstall_hook(__FILE__, 'trackfree_uninstall');

    function trackfree_activation()
    {
        $trackfree_account_api_key = get_option('trackfree_account_api_key');
        if ($trackfree_account_api_key) {
            wp_remote_post(trackfree_url() . '/api/wc_plugin_activation?key=' . $trackfree_account_api_key,
                array(
                    'sslverify' => false,
                    'timeout' => 15
                )
            );
        }
    }

    function trackfree_uninstall()
    {
        wp_remote_post(trackfree_url() . '/api/wc_plugin_uninstall?key=' . get_option('trackfree_account_api_key'),
            array(
                'sslverify' => false,
                'timeout' => 15
            )
        );
    }

    function trackfree_url() {
        return "https://trackfree.io";
    }

    function trackfree_load_plugin_textdomain() {
        load_plugin_textdomain( 'trackfree-woocommerce-tracking', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
    }
    add_action( 'plugins_loaded', 'trackfree_load_plugin_textdomain' );

    add_action( 'upgrader_process_complete', array('trackfree-woocommerce-tracking', 'trackfree_plugin_upgrade'), 10, 2 );

    add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'trackfree_action_links');

    function trackfree_plugin_upgrade()
    {
        $user_id = get_current_user_id();
        if (current_user_can('edit_user', $user_id)) {
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

                wp_remote_post(trackfree_url() . '/api/wc_plugin_upgrade?key=' . $trackfree_account_api_key,
                    array(
                        'sslverify' => false,
                        'timeout' => 15
                    )
                );
            }
        }
    }

    function trackfree_action_links($links)
    {
        $links[] = '<a href="'. esc_url( get_admin_url(null, 'admin.php?page=trackfree-setting') ) .'">Settings</a>';
        return $links;
    }

    include_once('settings.php');
    include_once('includes/tf-order-details-page.php');
    include_once('includes/trackfree-shipment-overview.php');
    include_once('includes/trackfree-shipment-details.php');

    if (($_REQUEST['page'] == 'trackfree-getting-started') || ($_REQUEST['page'] == 'trackfree-dashboard') || ($_REQUEST['page'] == 'trackfree-setting')) {
        add_filter('admin_footer_text', 'admin_footer_text_action', 1);
        function admin_footer_text_action()
        {
            return 'Thank you for using TrackFree!';
        }
    }

    add_action('admin_init', 'redirect_to_settings_page');

    function redirect_to_settings_page()
    {
        if ($_REQUEST['page'] == 'trackfree-getting-started') {
            $trackfree_account_api_key = get_option('trackfree_account_api_key');
            $trackfree_account_verify  = get_option('trackfree_account_verify');
            if (($trackfree_account_api_key) && ($trackfree_account_verify == 1)) {
                header('Location: ' . admin_url('admin.php?page=trackfree-setting'));
            }
        }
    }

    add_action('admin_menu', 'trackfree_admin_menus');

    function trackfree_admin_menus()
    {
        $trackfree_account_api_key = get_option('trackfree_account_api_key');
        $trackfree_account_verify  = get_option('trackfree_account_verify');
        if (($trackfree_account_api_key) && ($trackfree_account_verify == 1)) {
            add_menu_page('TrackFree', 'TrackFree', '', 'trackfree-menu', 'trackfree_dashboard_page', plugins_url('trackfree-woocommerce-tracking/assets/images/trackfree.png'), 56);
            add_submenu_page('trackfree-menu', 'TrackFree Dashboard', 'Dashboard', 'manage_options', 'trackfree-dashboard', 'trackfree_dashboard_page');
            add_submenu_page('trackfree-menu', 'TrackFree Settings', 'Settings', 'manage_options', 'trackfree-setting', 'trackfree_settings_page');
        } else {
            add_menu_page('TrackFree', 'TrackFree', 'manage_options', 'trackfree-getting-started', 'trackfree_settings_page', plugins_url('trackfree-woocommerce-tracking/assets/images/trackfree.png'), 56);
        }
    }

    function trackfree_dashboard_page()
    {
        echo '<div class="wrap">';
        $trackfree_account_api_key = get_option('trackfree_account_api_key'); ?>
        <iframe src="<?php echo trackfree_url();?>/wc_user_connect?key=<?php
        echo $trackfree_account_api_key; ?>" width="1200px" height = "1200px"></iframe>
        <?php
        echo '</div>';
    }

    add_action('wp_ajax_add_new_shipment', 'add_new_shipment_action');
    function add_new_shipment_action()
    {
        $user_id = get_current_user_id();
        if (current_user_can('edit_user', $user_id)) {
            $plugin_data = get_plugin_data(dirname(__FILE__) . '/trackfree.php');
            $plugin_version = $plugin_data['Version'];

            $trackfree_account_api_key = get_option('trackfree_account_api_key');
            $ord_id = $_POST['ord_id'];
            $trackfree_courier_name = sanitize_text_field($_POST['trackfree_courier_name']);
            $trackfree_tracking_number = sanitize_text_field(preg_replace('/\s+|[^a-zA-Z0-9\-]/', '', $_POST['trackfree_tracking_number']));
            if ($trackfree_tracking_number) {
                $order = wc_get_order($ord_id);
                $order_data = $order->get_data();
                $first_name = $order_data['shipping']['first_name'] ? $order_data['shipping']['first_name'] : $order_data['billing']['first_name'];
                $last_name = $order_data['shipping']['last_name'] ? $order_data['shipping']['last_name'] : $order_data['billing']['last_name'];
                $order_items  = array();
                $exclude_item = array();
                foreach ($order->get_items() as $item_key => $item_values) {
                    $item_data = $item_values->get_data();
                    $product_data = wc_get_product($item_data['product_id']);
                    $order_items[]  = array(
                        'product_id' => $item_data['product_id'],
                        'name' => $product_data->get_name(),
                        'price' => $product_data->get_price(),
                        'sku' => $product_data->get_sku(),
                        'quantity' => $item_data['quantity'],
                        'slug' => $product_data->get_slug(),
                        'image' => get_the_post_thumbnail_url($product_data->get_id(), 'full')
                    );
                    $exclude_item[] = $item_data['product_id'];
                }
                $args = array(
                    'orderby' => 'rand',
                    'limit' => 4,
                    'return' => 'ids',
                    'exclude' => $exclude_item
                );
                $storeProducts = wc_get_products($args);
                $recommendProducts = array();
                foreach ($storeProducts as $product_id) {
                    $product = wc_get_product($product_id);
                    $recommendProducts[] = array(
                        'product_id' => $product->get_id(),
                        'name' => $product->get_name(),
                        'slug' => $product->get_slug(),
                        'price' => $product->get_price(),
                        'sku' => $product->get_sku(),
                        'image' => get_the_post_thumbnail_url($product->get_id(), 'full')
                    );
                }
                $track_request = array(
                    'key' => $trackfree_account_api_key,
                    'tracking_num' => $trackfree_tracking_number,
                    'courier_name' => $trackfree_courier_name,
                    'order_id' => $order_data['id'],
                    'customer_email' => $order_data['billing']['email'],
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                    'customer_phone' => $order_data['billing']['phone'],
                    'customer_country' => $order_data['billing']['country'],
                    'order_currency' => $order_data['currency'],
                    'order_total' => $order_data['total'],
                    'order_created_at' => $order_data['date_created']->date('Y-m-d H:i:s'),
                    'shipping_address_1' => $order_data['shipping']['address_1'],
                    'shipping_address_2' => $order_data['shipping']['address_2'],
                    'shipping_city' => $order_data['shipping']['city'],
                    'shipping_state' => $order_data['shipping']['state'],
                    'shipping_postcode' => $order_data['shipping']['postcode'],
                    'shipping_country' => $order_data['shipping']['country'],
                    'order_items' => $order_items,
                    'site_url' => home_url(),
                    'recommendProducts' => $recommendProducts,
                    'plugin_version' => $plugin_version
                );

                $response_data = wp_remote_get(trackfree_url() . '/api/wc_add_new_track', array(
                    'sslverify' => false,
                    'timeout' => 15,
                    'body' => $track_request
                ));
                $track_data = json_decode(wp_remote_retrieve_body($response_data), true);
                if ($track_data['status'] == 'success') {
                    $new_shipment[] = array(
                        'tracking_num' => $trackfree_tracking_number,
                        'courier_name' => sanitize_text_field($_POST['trackfree_courier_name']),
                        'status' => '',
                        'estimated_delivery' => '',
                        'delivered_date' => ''
                    );
                    $existing_shipments = get_post_meta($ord_id, '_trackfree_shipment_details', true);
                    if ($existing_shipments) {
                        $shipments = array_merge($new_shipment, $existing_shipments);
                        update_post_meta($ord_id, '_trackfree_shipment_details', wc_clean($shipments));
                    } else {
                        update_post_meta($ord_id, '_trackfree_shipment_details', wc_clean($new_shipment));
                    }
                    _e('Shipment details added successfully', 'trackfree-woocommerce-tracking');
                } else {
                    if ($track_data['message'] == 'already_exist') {
                        _e('This tracking number already exists', 'trackfree-woocommerce-tracking');
                    } else if ($track_data['message'] == 'limit_exceed') {
                        _e('You can add only up to 3 shipments', 'trackfree-woocommerce-tracking');
                    } else if ($track_data['message'] == 'invalid_user') {
                        _e('Invalid user', 'trackfree-woocommerce-tracking');
                    } else if ($track_data['message'] == 'credit_exceed') {
                        _e('Your credit limit is over. Please upgrade', 'trackfree-woocommerce-tracking');
                    } else if ($track_data['message'] == 'invalid_tracking') {
                        _e('Invalid tracking number', 'trackfree-woocommerce-tracking');
                    }
                }
            }
        }
        wp_die();
    }

    add_action('add_meta_boxes', 'cd_meta_box_add');

    //Show shipment status in order list page
    if (get_option('trackfree_shipment_status_in_orders') == 1) {
        add_filter('manage_edit-shop_order_columns', 'show_shipment_status', 20);
        function show_shipment_status($columns)
        {
            $new_columns = array();
            foreach ($columns as $key => $column) {
                $new_columns[$key] = $column;
                if ($key == 'order_status') {
                    $new_columns['shipment_status'] = __('Shipment Status', 'trackfree-woocommerce-tracking');
                }
            }
            return $new_columns;
        }
    }

    if (get_option('trackfree_shipment_status_in_orders') == 1) {
        add_action('manage_shop_order_posts_custom_column', 'orders_list_shipment_action', 20, 2);
        function orders_list_shipment_action($column, $post_id)
        {
            if ('shipment_status' === $column) {
                $shipment_details = get_post_meta($post_id, '_trackfree_shipment_details', true);
                $i = 0;
                if ($shipment_details) {
                    if (checkShipmentStatus($shipment_details)) { ?>
                        <a href="javascript:void(0);" id="<?php echo $post_id; ?>" class="js-open-modal" data-modal-id="popup" title="Click to show current status">
                            <img src="<?php echo plugins_url('trackfree-woocommerce-tracking/assets/images/shipment-preview.png'); ?>" alt="Shipment Status"/>
                        </a>
                        <?php
                    } else {
                        foreach ($shipment_details as $shipment_values) {
                            if ($i == 0) {
                                echo '<span style="color: #5b841b;">' . $shipment_values['status'] . '</span><br>' . $shipment_values['delivered_date'];
                            }
                            $i++;
                        }
                    } ?>
                    <div id="popup" class="trackfree-modal-box">
                        <header>
                            <a href="javascript:void(0);" class="trackfree-modal-close trackfree-close">X</a>
                            <h3><?php _e('Shipment Status', 'trackfree-woocommerce-tracking'); ?></h3>
                        </header>
                        <div class="modal-body">
                            <div id="trackfree-shipment-content">
                            </div>
                        </div>
                        <footer>
                            <a href="javascript:void(0);" class="trackfree-modal-close"><?php _e('Close', 'trackfree-woocommerce-tracking'); ?>
                            </a>
                        </footer>
                    </div>
                    <?php
                }
            }
        }
    }

    function checkShipmentStatus($array)
    {
        foreach ($array as $val) {
            if ($val['status'] != 'Delivered') {
                return 1;
            }
        }
        return 0;
    }

    add_action('wp_ajax_tracking_delete_action', 'tracking_delete_action');
    function tracking_delete_action()
    {
        $user_id = get_current_user_id();
        if (current_user_can('edit_user', $user_id)) {
            $order_id = $_POST['order_id'];
            $track_id = $_POST['track_id'];
            $shipment_details = get_post_meta($order_id, '_trackfree_shipment_details', true);
            $trackfree_account_api_key = get_option('trackfree_account_api_key');
            $track_data = array(
                'tracking_num' => $shipment_details[$track_id]['tracking_num']
            );
            wp_remote_get(trackfree_url() . '/api/wc_delete_tracking?key=' . $trackfree_account_api_key, array(
                'sslverify' => false,
                'timeout' => 15,
                'body' => $track_data
            ));
            unset($shipment_details[$track_id]);
            update_post_meta($order_id, '_trackfree_shipment_details', $shipment_details);
            $get_shipment_details = get_post_meta($order_id, '_trackfree_shipment_details', true);
            echo $total_shipments = $get_shipment_details ? sizeof($get_shipment_details) : 0;
        }
        wp_die();
    }
}
