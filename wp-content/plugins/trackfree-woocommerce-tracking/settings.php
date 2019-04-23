<?php
if (!defined( 'ABSPATH'))
    exit;

if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {

    wp_enqueue_style('trackfree_styles_chosen', plugins_url('/assets/plugin/chosen/chosen.min.css', __FILE__));
    wp_enqueue_script('trackfree_styles_chosen_jquery', plugins_url('/assets/plugin/chosen/chosen.jquery.min.js', __FILE__));
    wp_enqueue_script('trackfree_styles_chosen_proto', plugins_url('/assets/plugin/chosen/chosen.proto.min.js', __FILE__));
    wp_enqueue_script('trackfree_script_setting', plugins_url('/assets/js/trackfree_setting.js', __FILE__));
    wp_enqueue_style( 'wp-codemirror-css', plugins_url('/assets/plugin/codemirror/codemirror.css', __FILE__));
    wp_enqueue_script( 'wp-codemirror-js', plugins_url('/assets/plugin/codemirror/codemirror.js', __FILE__));
    wp_enqueue_script( 'wp-codemirror-script', plugins_url('/assets/plugin/codemirror/javascript.js', __FILE__));
    wp_enqueue_script( 'muse-button-bundle-js', plugins_url('/assets/js/muse-button-bundle.js', __FILE__));

    function trackfree_uploader_enqueue()
    {
        wp_enqueue_media();
        wp_register_script( 'wp-media-uploader', plugins_url( '/assets/js/wp_media_uploader.js' , __FILE__ ), array('jquery') );
        wp_enqueue_script( 'wp-media-uploader' );
    }

    add_action('admin_enqueue_scripts', 'trackfree_uploader_enqueue');

    function trackfree_error_notice($errors)
    {
        if (isset($errors)) {
            foreach($errors as $error) {
                if ($error['empty_name']) {
                    $trackfree_error .= '<p>' . __( $error['empty_name'][0]) . '</p>';
                }
                if ($error['empty_storename']) {
                    $trackfree_error .= '<p>' . __( $error['empty_storename'][0]) . '</p>';
                }
                if ($error['invalid_email']) {
                    $trackfree_error .= '<p>' . __($error['invalid_email'][0]) .'</p>';
                }
            }
            if ($trackfree_error) {
                echo '<div class="error notice"> ' . $trackfree_error . '</div>';
                return 1;
            }
            return 0;
        }
    }

    function trackfree_register_settings()
    {
        $trackfree_options = '';
        if (isset($_POST['trackfree_preferred_couriers'])) {
            $trackfree_options = sanitize_text_field($_POST['trackfree_preferred_couriers']);
        }
        add_option('trackfree_preferred_couriers');
        update_option('trackfree_preferred_couriers', $trackfree_options);
    }

    function trackfree_settings_page()
    {
        $user_id = get_current_user_id();
        if (current_user_can('edit_user', $user_id)) {
            $trackfree_account_api_key = get_option('trackfree_account_api_key');
            $trackfree_account_verify = get_option('trackfree_account_verify');

            if (isset($_POST['_wpnonce']) && wp_verify_nonce($_POST['_wpnonce'], 'TrackFree')) {
                if (isset($_POST['trackfree'])) {
                    trackfree_action();
                }
                if ($_POST['trackfree_preferred_couriers']) {
                    trackfree_register_settings();
                    echo '<div id="message" class="updated notice notice-success is-dismissible"><p>' . __('Preferred couriers updated successfully', 'trackfree-woocommerce-tracking') .'</p></div>';
                }
            }
            $nonce = wp_create_nonce( 'TrackFree' );
            if ($trackfree_account_api_key == '') {
                include ('getting-started.php');
            }
            if (($trackfree_account_api_key) && ($trackfree_account_verify == 0)) {
                $appVerifyContent = '<div class="error notice">' . __('Your app is not verified. Click verify link and activate your app in your mail. Please refresh this page if you have already verified.', 'trackfree-woocommerce-tracking') . '</div>';
                include ('getting-started.php');
            }

            if (($trackfree_account_verify == 0) && ($trackfree_account_api_key)) {
                trackfree_verification_status();
            }

            if (($trackfree_account_api_key) && ($trackfree_account_verify)) {
                screen_icon();
                trackfree_account_info_action();
            }
        }
    }

    function trackfree_account_info_action()
    {
        $user_id = get_current_user_id();
        if (current_user_can('edit_user', $user_id)) {
            if (isset($_POST['_wpnonce']) && wp_verify_nonce($_POST['_wpnonce'], 'TrackFree')) {
                $errors = new WP_Error();
                if (isset($_POST['update_custom_domain'])) {
                    if ( empty( $_POST['trackfree_custom_domain'] ) || ! is_string( $_POST['trackfree_custom_domain'] ) ) {
                        $errors->add('empty_name', __('<strong>ERROR</strong>: Enter a domain name.', 'trackfree-woocommerce-tracking'));
                    }
                    if (trackfree_error_notice($errors) == 0) {
                        trackfree_custom_domain_action();
                    }
                }
                if (isset($_POST['update_sub_domain'])) {
                    if ( empty( $_POST['trackfree_sub_domain'] ) || ! is_string( $_POST['trackfree_sub_domain'] ) ) {
                        $errors->add('empty_name', __('<strong>ERROR</strong>: Enter a sub-domain name.', 'trackfree-woocommerce-tracking'));
                    }
                    if (trackfree_error_notice($errors) == 0) {
                        trackfree_sub_domain_action();
                    }
                }
                if ($_POST['trackfree_footer_script']) {
                    trackfree_footer_script_action();
                }
                if ($_POST['email_sender_options']) {
                    if ( empty( $_POST['trackfree_sender_name'] ) || ! is_string( $_POST['trackfree_sender_name'] ) ) {
                        $errors->add('empty_name', __('<strong>ERROR</strong>: Enter a Sender name.', 'trackfree-woocommerce-tracking'));
                    }
                    if (empty( $_POST['trackfree_sender_email'] ) || ! is_email( $_POST['trackfree_sender_email']) ) {
                        $errors->add('invalid_email', __("<strong>ERROR</strong>: The email address is not correct.", 'trackfree-woocommerce-tracking'));
                    }
                    if (trackfree_error_notice($errors) == 0) {
                        trackfree_email_sender_action();
                    }
                }
                if ($_POST['trackfree_test_mail']) {
                    trackfree_test_mail_action();
                }
                if ($_POST['trackfree_theme_update']) {
                    trackfree_theme_action();
                }
                if ($_POST['trackfree_general_settings']) {
                    if ( empty( $_POST['trackfree_fullname'] ) || ! is_string( $_POST['trackfree_fullname'] ) ) {
                        $errors->add('empty_name', __('<strong>ERROR</strong>: Enter your name.', 'trackfree-woocommerce-tracking'));
                    }
                    if ( empty( $_POST['trackfree_storename'] ) || ! is_string( $_POST['trackfree_storename'] ) ) {
                        $errors->add('empty_storename', __('<strong>ERROR</strong>: Enter your storename.', 'trackfree-woocommerce-tracking'));
                    }
                    if (empty( $_POST['trackfree_email'] ) || ! is_email( $_POST['trackfree_email']) ) {
                        $errors->add('invalid_email', __("<strong>ERROR</strong>: The email address is not correct.", 'trackfree-woocommerce-tracking'));
                    }
                    if (trackfree_error_notice($errors) == 0) {
                        trackfree_general_settings_action();
                    }
                }
            }
            $nonce = wp_create_nonce( 'TrackFree' );
            $trackfree_account_api_key = get_option('trackfree_account_api_key');
            $response = wp_remote_get(trackfree_url() . '/api/wc_get_account_info?key=' . $trackfree_account_api_key,
                array(
                    'sslverify' => false,
                    'timeout' => 15
                )
            );
            $response_data = json_decode( wp_remote_retrieve_body( $response ), true );
            if ($response_data['status'] == 'success') {
                $plugin_data = get_plugin_data(dirname(__FILE__) . '/trackfree.php');
                $plugin_version = $plugin_data['Version'];
                $latest_version = $response_data['plugin_version'];

                add_option('trackfree_tracking_domain');
                update_option('trackfree_tracking_domain', $response_data['domain_name']);

                if (($plugin_version) && ($latest_version)) {
                    if ($plugin_version < $latest_version) {
                        $nonce = wp_create_nonce( 'TrackFree' );
                        ?>
                        <div class="update-message notice inline notice-warning notice-alt">
                            <p><?php _e('There is a new version available.', 'trackfree-woocommerce-tracking');?> <a href="<?php echo home_url(); ?>/wp-admin/plugins.php" class="update-link" aria-label="Update now"><?php _e('Update now', 'trackfree-woocommerce-tracking');?></a></p>
                        </div>
                        <?php
                    }
                }
                ?>
                <div class="wrap">
                    <h1 class="wp-heading-inline"><?php _e('Settings', 'trackfree-woocommerce-tracking');?></h1>
                    <p class="nav-tab-wrapper"><p>
                    <p><?php _e('View and update basic settings', 'trackfree-woocommerce-tracking');?></p>
                    <?php
                    include_once('includes/tf-settings-template.php');
                    ?>
                </div>
                <?php
            } else {
                if (($response_data['status'] == 'error') && ($response_data['message'] == 'user_not_exist')) {
                    update_option('trackfree_account_api_key', '');
                    update_option('trackfree_account_verify', 0);
                    header('Location: ' . admin_url('admin.php?page=trackfree-getting-started'));
                } else {
                    $appVerifyContent = '<div class="error notice">' . __('This account not verified or locked. Please contact TrackFree support team.', 'trackfree-woocommerce-tracking') . '</div>';
                    include ('getting-started.php');
                }
            }
        }
    }

    function trackfree_action()
    {
        $user_id = get_current_user_id();
        if (current_user_can('edit_user', $user_id)) {
            $user_info = get_userdata($user_id);
            $user_email = sanitize_text_field($_POST['trackfree_account_email']);
            if ((empty( $user_email )) || ! (is_email( $user_email))) {
                $errors = new WP_Error();
                $errors->add('invalid_email', __("<strong>ERROR</strong>: The email address is not correct.", 'trackfree-woocommerce-tracking'));
            }
            if (trackfree_error_notice($errors) == 0) {
                $custom_logo_id = get_theme_mod( 'custom_logo' );
                $store_logo_url = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                $plugin_data = get_plugin_data(dirname(__FILE__) . '/trackfree.php');
                $plugin_version = $plugin_data['Version'];
                $user_data = array(
                    'full_name' => $user_info->nickname,
                    'store_url' => get_option('siteurl'),
                    'store_name' => get_option('blogname'),
                    'address_1' => get_option('woocommerce_store_address'),
                    'address_2' => get_option('woocommerce_store_address_2'),
                    'city' => get_option('woocommerce_store_city'),
                    'country' => get_option('woocommerce_default_country'),
                    'post_code' => get_option('woocommerce_store_postcode'),
                    'gmt_offset' => get_option('gmt_offset'),
                    'timezone_string' => get_option('timezone_string'),
                    'store_icon_url' => get_site_icon_url(),
                    'store_logo_url' => $store_logo_url[0],
                    'plugin_version' => $plugin_version
                );
                $response = wp_remote_get(trackfree_url() . '/api/wc_create_user?email=' . $user_email,
                    array(
                        'sslverify' => false,
                        'timeout' => 15,
                        'body' => $user_data
                    )
                );
                $response_data = json_decode( wp_remote_retrieve_body( $response ), true );
                if ($response_data['status'] == 'success') {
                    add_option('trackfree_account_api_key');
                    update_option('trackfree_account_api_key', $response_data['api_key']);
                    add_option('trackfree_account_verify');
                    update_option('trackfree_account_verify', 1);
                    add_option('trackfree_shipment_status_in_orders');
                    update_option('trackfree_shipment_status_in_orders', 0);
                    add_option('trackfree_shipment_details_in_order_details');
                    update_option('trackfree_shipment_details_in_order_details', 0);
                    header('Location: ' . admin_url('admin.php?page=trackfree-setting'));
                } else if ($response_data['status'] == 'app_verify_mail') {
                    add_option('trackfree_account_api_key');
                    update_option('trackfree_account_api_key', $response_data['api_key']);
                    add_option('trackfree_account_verify');
                    update_option('trackfree_account_verify', 0);
                    add_option('trackfree_shipment_status_in_orders');
                    update_option('trackfree_shipment_status_in_orders', 0);
                    add_option('trackfree_shipment_details_in_order_details');
                    update_option('trackfree_shipment_details_in_order_details', 0);
                    header('Location: ' . admin_url('admin.php?page=trackfree-getting-started'));
                } else if ($response_data['status'] == 'app_already_exist') {
                    echo '<div class="error notice">' . __('App already installed. Please contact TrackFree support team.', 'trackfree-woocommerce-tracking') . '</div>';
                } else if ($response_data['status'] == 'account_inactive')  {
                    echo '<div class="error notice">'. __('Something went wrong. Please contact TrackFree support team.', 'trackfree-woocommerce-tracking') . '</div>';
                } else if ($response_data['status'] == 'error') {
                    echo '<div class="error notice">'. $response_data['message'] . '</div>';
                }
                if ($response_data['couriers']) {
                    $trackfree_options = sanitize_text_field($response_data['couriers']);
                    add_option('trackfree_preferred_couriers');
                    update_option('trackfree_preferred_couriers', $trackfree_options);
                }
            }
        }
    }

    function trackfree_verification_status()
    {
        $user_id = get_current_user_id();
        if (current_user_can('edit_user', $user_id)) {
            $trackfree_account_api_key = get_option('trackfree_account_api_key');
            $response = wp_remote_get(trackfree_url() . '/api/wc_verify_status?key=' . $trackfree_account_api_key,
                array(
                    'sslverify' => false,
                    'timeout' => 15
                )
            );
            $response_data = $response['body'];
            if ($response_data == 'success') {
                update_option('trackfree_account_verify', 1);
                header('Location: ' . admin_url('admin.php?page=trackfree-setting'));
            } else if ($response_data == 'expired') {
                add_option('trackfree_account_api_key');
                update_option('trackfree_account_api_key', '');
                add_option('trackfree_account_verify');
                update_option('trackfree_account_verify', 0);
                header('Location: ' . admin_url('admin.php?page=trackfree-getting-started'));
            }
        }
    }

    function trackfree_custom_domain_action()
    {
        $user_id = get_current_user_id();
        if (current_user_can('edit_user', $user_id)) {
            $trackfree_account_api_key = get_option('trackfree_account_api_key');
            $domain_data = array(
                'custom_domain' => $_POST['trackfree_custom_domain']
            );
            $response = wp_remote_get(trackfree_url() . '/api/wc_custom_domain_update?key=' . $trackfree_account_api_key,
                array(
                    'sslverify' => false,
                    'timeout' => 15,
                    'body' => $domain_data
                )
            );
            $response_data = json_decode( wp_remote_retrieve_body( $response ), true );
            if ($response_data['status'] == 'success') {
                echo '<div id="message" class="updated notice notice-success is-dismissible"><p>' . $response_data['message'] . '</p></div>';
            } else if ($response_data['status'] == 'error') {
                switch ($response_data['error_type']) {
                    case "domain_exist":
                        $error_message = __('This domain already account with us', 'trackfree-woocommerce-tracking');
                        break;
                    case "Subdomain_error":
                        $error_message = __('Only one subdomain allowed for this TrackFree account', 'trackfree-woocommerce-tracking');
                        break;
                    case "invalid_domain_format":
                        $error_message = __('Invalid domain format', 'trackfree-woocommerce-tracking');
                        break;
                    case "user_error":
                        $error_message = __('This feature for premium user only. Please subscribe premium plan', 'trackfree-woocommerce-tracking');
                        break;
                    case "invalid_auth":
                        $error_message = __('Invalid authentication', 'trackfree-woocommerce-tracking');
                        break;
                    case "invalid_request":
                       $error_message = __('Invalid request', 'trackfree-woocommerce-tracking');
                       break;
                }
                echo '<div id="message" class="updated error notice is-dismissible"><p>' . $error_message . '</p></div>';
            }
        }
    }

    function trackfree_sub_domain_action()
    {
        $user_id = get_current_user_id();
        if (current_user_can('edit_user', $user_id)) {
            $trackfree_account_api_key = get_option('trackfree_account_api_key');
            $domain_data = array(
                'sub_domain' => $_POST['trackfree_sub_domain']
            );
            $response = wp_remote_get(trackfree_url() . '/api/wc_sub_domain_update?key=' . $trackfree_account_api_key,
                array(
                    'sslverify' => false,
                    'timeout' => 15,
                    'body' => $domain_data
                )
            );
            $response_data = json_decode( wp_remote_retrieve_body( $response ), true );
            if ($response_data['status'] == 'success') {
                echo '<div id="message" class="updated notice notice-success is-dismissible"><p>' . __('Subdomain updated successfully', 'trackfree-woocommerce-tracking') . '</p></div>';
            } else if ($response_data['status'] == 'error') {
                switch ($response_data['error_type']) {
                    case "invalid_subdomain":
                        $error_message = __('Subdomain name must be at least minimum 4 characters to maximum 64 characters', 'trackfree-woocommerce-tracking');
                        break;
                    case "name_not_allowed":
                        $error_message = __('This subdomain name not allowed with TrackFree', 'trackfree-woocommerce-tracking');
                        break;
                    case "name_already_exist":
                        $error_message = __('This name already taken with us', 'trackfree-woocommerce-tracking');
                        break;
                }
                echo '<div id="message" class="updated error notice is-dismissible"><p>' . $error_message . '</p></div>';
            }
        }
    }

    function trackfree_footer_script_action()
    {
        $user_id = get_current_user_id();
        if (current_user_can('edit_user', $user_id)) {
            $trackfree_account_api_key = get_option('trackfree_account_api_key');
            $footer_data = array(
                'footer_script' => $_POST['footer_script']
            );
            $response = wp_remote_get(trackfree_url() . '/api/wc_footer_script_update?key=' . $trackfree_account_api_key,
                array(
                    'sslverify' => false,
                    'timeout' => 15,
                    'body' => $footer_data
                )
            );
            $response_data = json_decode( wp_remote_retrieve_body( $response ), true );
            if ($response_data['status'] == 'success') {
                echo '<div id="message" class="updated notice is-dismissible"><p>' . __('Footer script updated successfully', 'trackfree-woocommerce-tracking') . '</p></div>';
            } else if ($response_data['status'] == 'error') {
                switch ($response_data['error_type']) {
                    case "script_error":
                        $error_message = __('Footer script content inside have some invalid tag or keyword. If you have any script tag inside please remove and update', 'trackfree-woocommerce-tracking');
                        break;
                    case "user_error":
                        $error_message = __('This feature for premium user only. Please subscribe premium plan', 'trackfree-woocommerce-tracking');
                        break;
                    case "invalid_auth":
                        $error_message = __('Invalid authentication', 'trackfree-woocommerce-tracking');
                        break;
                    case "invalid_request":
                       $error_message = __('Invalid request', 'trackfree-woocommerce-tracking');
                       break;
                }
                echo '<div id="message" class="updated error notice is-dismissible"><p>' . $error_message . '</p></div>';
            }
        }
    }

    function trackfree_email_sender_action()
    {
        $user_id = get_current_user_id();
        if (current_user_can('edit_user', $user_id)) {
            $trackfree_account_api_key = get_option('trackfree_account_api_key');
            $email_sender_data = array(
                'trackfree_sender_name' => sanitize_text_field($_POST['trackfree_sender_name']),
                'trackfree_sender_email' => sanitize_text_field($_POST['trackfree_sender_email'])
            );
            $response = wp_remote_get(trackfree_url() . '/api/wc_email_sender_option_update?key=' . $trackfree_account_api_key,
                array(
                    'sslverify' => false,
                    'timeout' => 15,
                    'body' => $email_sender_data
                )
            );
            $response_data = json_decode( wp_remote_retrieve_body( $response ), true );
            if ($response_data['status'] == 'success') {
                echo '<div id="message" class="updated notice notice-success is-dismissible"><p>' . __('Sender options updated successfully', 'trackfree-woocommerce-tracking') . '</p></div>';
            } else if ($response_data['status'] == 'error') {
                if ($response_data['error_type'] == 'invalid_email') {
                    echo '<div id="message" class="updated error notice is-dismissible"><p>' . $_POST['trackfree_sender_email'] . ' ' . __('is not a valid email address', 'trackfree-woocommerce-tracking') . '</p></div>';
                } else if ($response_data['error_type'] == 'empty_field') {
                    echo '<div id="message" class="updated error notice is-dismissible"><p>' . __('Fill sender name and email', 'trackfree-woocommerce-tracking') . '</p></div>';
                }
            }
        }
    }

    function trackfree_test_mail_action()
    {
        $user_id = get_current_user_id();
        if (current_user_can('edit_user', $user_id)) {
            $trackfree_account_api_key = get_option('trackfree_account_api_key');
            $shipment_email_data = array(
                'trackfree_send_mail' => $_POST['trackfree_send_mail']
            );
            $response = wp_remote_get(trackfree_url() . '/api/wc_shipment_test_mail?key=' . $trackfree_account_api_key,
                array(
                    'sslverify' => false,
                    'timeout' => 15,
                    'body' => $shipment_email_data
                )
            );
            $response_data = json_decode( wp_remote_retrieve_body( $response ), true );
            if ($response_data['status'] == 'success') {
                echo '<div id="message" class="updated notice notice-success is-dismissible"><p>' . __('Shipment test mail sent successfully', 'trackfree-woocommerce-tracking') . '</p></div>';
            } else if ($response_data['status'] == 'error') {
                if ($response_data['message'] == 'user_not_exist') {
                    $error_message = __('Invalid authentication', 'trackfree-woocommerce-tracking');
                } else if ($response_data['error_type'] == 'invalid_request') {
                    $error_message = __('Invalid request', 'trackfree-woocommerce-tracking');
                } else if ($response_data['error_type'] == 'no_tracking') {
                    $error_message = __('Sorry! unable to send shipment test mail, because there is no tracking number for you', 'trackfree-woocommerce-tracking');
                }
                echo '<div id="message" class="updated error notice is-dismissible"><p>' . $error_message . '</p></div>';
            }
        }
    }

    function trackfree_theme_action()
    {
        $user_id = get_current_user_id();
        if (current_user_can('edit_user', $user_id)) {
            $trackfree_account_api_key = get_option('trackfree_account_api_key');
            $theme_data = array(
                'trackfree_theme' => $_POST['trackfree_theme']
            );
            $response = wp_remote_get(trackfree_url(). '/api/wc_apply_theme?key=' . $trackfree_account_api_key,
                array(
                    'sslverify' => false,
                    'timeout' => 15,
                    'body' => $theme_data
                )
            );
            $response_data = json_decode( wp_remote_retrieve_body( $response ), true );
            if ($response_data['status'] == 'success') {
                echo '<div id="message" class="updated notice notice-success is-dismissible"><p>' . __('Theme updated successfully', 'trackfree-woocommerce-tracking') . '</p></div>';
            } else if ($response_data['status'] == 'error') {
                if ($response_data['message'] == 'user_not_exist') {
                    $error_message = __('Invalid authentication', 'trackfree-woocommerce-tracking');
                } else if ($response_data['error_type'] == 'invalid_request') {
                    $error_message = __('Invalid request', 'trackfree-woocommerce-tracking');
                }
                echo '<div id="message" class="updated error notice is-dismissible"><p>' . $error_message . '</p></div>';
            }
        }
    }

    add_action( 'wp_ajax_trackfree_upload_images', 'trackfree_upload_images_action' );

    function trackfree_upload_images_action()
    {
        $user_id = get_current_user_id();
        if (current_user_can('edit_user', $user_id)) {
            $trackfree_account_api_key = get_option('trackfree_account_api_key');
            $upload_data = array(
                'image_type' => $_POST['image_type'],
                'image_url' => $_POST['image_url']
            );
            $response = wp_remote_get(trackfree_url() . '/api/wc_image_upload?key=' . $trackfree_account_api_key,
            array(
                'sslverify' => false,
                'timeout' => 15,
                'body' => $upload_data
                )
            );
            $response_data = json_decode( wp_remote_retrieve_body( $response ), true );
            if ($response_data['status'] == 'success') {
                _e('Image uploaded successfully', 'trackfree-woocommerce-tracking');
            } else {
                echo $response_data['message'];
            }
        }
        wp_die();
    }

    add_action( 'wp_ajax_trackfree_site_banner_action', 'trackfree_site_banner_action' );

    function trackfree_site_banner_action()
    {
        $user_id = get_current_user_id();
        if (current_user_can('edit_user', $user_id)) {
            $trackfree_account_api_key = get_option('trackfree_account_api_key');
            $upload_data = array(
                'banner_link' => $_POST['site_banner_url']
            );
            $response = wp_remote_get(trackfree_url() . '/api/wc_site_banner_url?key=' . $trackfree_account_api_key,
            array(
                'sslverify' => false,
                'timeout' => 15,
                'body' => $upload_data
                )
            );
            $response_data = json_decode( wp_remote_retrieve_body( $response ), true );
            if ($response_data['status'] == 'success') {
                _e('Banner URL updated successfully', 'trackfree-woocommerce-tracking');
            } else {
                echo $response_data['message'];
            }
        }
        wp_die();
    }

    add_action( 'wp_ajax_trackfree_remove_upload_images', 'trackfree_remove_upload_images_action' );

    function trackfree_remove_upload_images_action()
    {
        $user_id = get_current_user_id();
        if (current_user_can('edit_user', $user_id)) {
            $trackfree_account_api_key = get_option('trackfree_account_api_key');
            $upload_data = array(
                'image_type' => $_POST['image_type']
            );
            $response = wp_remote_get(trackfree_url() . '/api/wc_remove_site_image?key=' . $trackfree_account_api_key,
            array(
                'sslverify' => false,
                'timeout' => 15,
                'body' => $upload_data
                )
            );
            $response_data = json_decode( wp_remote_retrieve_body( $response ), true );
            if ($response_data['status'] == 'success') {
                _e('Image removed successfully', 'trackfree-woocommerce-tracking');
            } else {
                echo $response_data['message'];
            }
        }
        wp_die();
    }

    function trackfree_general_settings_action()
    {
        $user_id = get_current_user_id();
        if (current_user_can('edit_user', $user_id)) {
            $trackfree_account_api_key = get_option('trackfree_account_api_key');
            $general_setting_data = array(
                'trackfree_fullname' => $_POST['trackfree_fullname'],
                'trackfree_storename' => $_POST['trackfree_storename'],
                'trackfree_email' => $_POST['trackfree_email'],
                'delivered_mail_to_customer' => $_POST['delivered_mail_to_customer'],
                'show_shipment_status_order_list' => $_POST['show_shipment_status_order_list'],
                'show_shipment_details_order_details' => $_POST['show_shipment_details_order_details']
            );
            $response = wp_remote_get(trackfree_url() . '/api/wc_general_settings?key=' . $trackfree_account_api_key,
                array(
                    'sslverify' => false,
                    'timeout' => 15,
                    'body' => $general_setting_data
                )
            );
            $response_data = json_decode( wp_remote_retrieve_body( $response ), true );
            if ($response_data['status'] == 'success') {
                add_option('trackfree_shipment_status_in_orders');
                update_option('trackfree_shipment_status_in_orders', $_POST['show_shipment_status_order_list']);

                add_option('trackfree_shipment_details_in_order_details');
                update_option('trackfree_shipment_details_in_order_details', $_POST['show_shipment_details_order_details']);

                echo '<div id="message" class="updated notice notice-success is-dismissible"><p>' . __('General settings updated successfully', 'trackfree-woocommerce-tracking') . '</p></div>';
                if ($response_data['verify_message']) {
                    echo '<div id="message" class="error notice is-dismissible"><p class="description" id="trackfree-email-description"><strong>' . __('The new address will not be active until confirmed.', 'trackfree-woocommerce-tracking') . '</strong></p></div>';
                }
            } else if ($response_data['status'] == 'error') {
                switch ($response_data['error_type']) {
                    case "user_not_exist":
                        $error_message = __('Invalid authentication', 'trackfree-woocommerce-tracking');
                        break;
                    case "invalid_email":
                        $error_message = $_POST['trackfree_email'] . ' ' . __('is not a valid email address', 'trackfree-woocommerce-tracking');
                        break;
                    case "email_exists":
                        $error_message = __('Email address already account with us', 'trackfree-woocommerce-tracking');
                        break;
                    case "all_fields_required":
                        $error_message = __('All fields required', 'trackfree-woocommerce-tracking');
                        break;
                    case "invalid_request":
                       $error_message = __('Invalid request', 'trackfree-woocommerce-tracking');
                       break;
                }
                echo '<div id="message" class="updated error notice is-dismissible"><p>' . $error_message . '</p></div>';
            }
        }
    }
}
