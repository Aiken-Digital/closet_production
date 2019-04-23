<?php
/**
 * Plugin Name: DHL Express Shipping for WooCommerce
 * Plugin URI: https://a2zplugins.com/product/dhl-express-shipping-with-label-printing/
 * Description: Realtime Shipping Rates, Premium Version Supports DHL Label and Pickup
 * Version: 1.2.1
 * Author: a2zplugins
 * Author URI: https://a2zplugins.com
 * Developer: a2zplugins
 * Developer URI: https://a2zplugins.com
 * Text Domain: a2z_dhlexpress
 * Domain Path: /i18n/languages/
 *
 * WC requires at least: 2.6
 * WC tested up to: 3.5
 *
 *
 * @package WooCommerce
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Define WC_PLUGIN_FILE.
if ( ! defined( 'A2Z_DHLEXPRESS_PLUGIN_FILE' ) ) {
	define( 'A2Z_DHLEXPRESS_PLUGIN_FILE', __FILE__ );
}

// Include the main WooCommerce class.
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	
	if( !class_exists('a2z_dhlexpress_parent') ){
		Class a2z_dhlexpress_parent
		{
			public function __construct() {
				add_action( 'woocommerce_shipping_init', array($this,'a2z_dhlexpress_init') );
				add_filter( 'woocommerce_shipping_methods', array($this,'a2z_dhlexpress_method') );
				add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), array( $this, 'a2z_dhlexpress_plugin_action_links' ) );
			
			}
			public function a2z_dhlexpress_init()
			{
				include_once("controllors/a2z_dhlexpress_init.php");
			}
			public function a2z_dhlexpress_method( $methods )
			{
				$methods['a2z_dhlexpress'] = 'a2z_dhlexpress'; 
				return $methods;
			}
			public function a2z_dhlexpress_plugin_action_links($links)
			{
				$setting_value = version_compare(WC()->version, '2.1', '>=') ? "wc-settings" : "woocommerce_settings";
				$plugin_links = array(
					'<a href="' . admin_url( 'admin.php?page=' . $setting_value  . '&tab=shipping&section=az_dhlexpress' ) . '" style="color:green;">' . __( 'Configure', 'a2z_dhlexpress' ) . '</a>',
					'<a href="#" target="_blank" >' . __('Support', 'a2z_dhlexpress') . '</a>'
					);
				return array_merge( $plugin_links, $links );
			}
		}
		
	}
	new a2z_dhlexpress_parent();
}

