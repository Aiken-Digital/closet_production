<?php
/**
 * Plugin Name:       Modal Window
 * Plugin URI:        https://wordpress.org/plugins/modal-window/
 * Description:       Create popups. Insert any content. Trigger on anything.
 * Version:           4.0.3
 * Author:            Wow-Company
 * Author URI:        https://wow-estore.com/author/admin/?author_downloads=true
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       modal-window
 */

namespace modal_window;

if ( !defined( 'ABSPATH' ) ) {
  exit;
}


if ( !class_exists( 'Wow_Plugin_Class' ) ) {

  final class Wow_Plugin_Class
  {

    private static $instance;

    const PREF = 'mwp';

    public static function instance() {

      if ( !isset( self::$instance ) && !(self::$instance instanceof Wow_Plugin_Class) ) {

        $info = array(
          'plugin_name'     => 'Modal Window',
          'plugin_menu'     => 'Modal Window',
          'plugin_home_url' => 'https://wordpress.org/plugins/modal-window/',
          'plugin_version'  => '4.0.3',
          'plugin_file'     => __FILE__,
          'plugin_slug'     => dirname( plugin_basename( __FILE__ ) ),
          'plugin_dir'      => plugin_dir_path( __FILE__ ),
          'plugin_url'      => plugin_dir_url( __FILE__ ),
          'plugin_pref'     => self::PREF,
          'author_url'      => 'https://wow-estore.com',
          'pro_url'         => 'https://wow-estore.com/item/wow-modal-windows-pro/',
          'shortcode'       => 'Modal-Window',
          'text_domain'     => 'modal-window',
          'author'          => 'Wow-Company',
        );
				
        self::$instance = new Wow_Plugin_Class;

        register_activation_hook( __FILE__, array( self::$instance, 'plugin_activate' ) );
        register_deactivation_hook( __FILE__, array( self::$instance, 'plugin_deactivate' ) );

        add_action( 'plugins_loaded', array( self::$instance, 'load_textdomain' ) );
        add_action( 'admin_init', array( self::$instance, 'create_field' ) );


        self::$instance->includes();
        self::$instance->admin = new Wow_Admin_Class( $info );
        self::$instance->public = new Wow_Public_Class( $info );
      }

      return self::$instance;
    }

    public function __clone() {
      // Cloning instances of the class is forbidden.
      _doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'modal-window' ), '4.0.2' );
    }

    public function __wakeup() {
      // Unserializing instances of the class is forbidden.
      _doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'modal-window' ), '4.0.2' );
    }


    private function includes() {
      if ( !class_exists( 'Wow_Company' ) ) {
        require_once plugin_dir_path( __FILE__ ) . 'includes/class-wow-company.php';
      }
      require_once plugin_dir_path( __FILE__ ) . 'includes/class-js-packer.php';
      require_once plugin_dir_path( __FILE__ ) . 'includes/class-db-update.php';
      require_once plugin_dir_path( __FILE__ ) . 'admin/class-admin.php';
      require_once plugin_dir_path( __FILE__ ) . 'public/class-public.php';

    }

    public function plugin_activate() {
      update_option( 'wow_' . self::PREF . '_notice_action', 'read' );
      $upload = wp_upload_dir();
      $field = dirname( plugin_basename( __FILE__ ) );
      $basedir = $upload[ 'basedir' ] . '/' . $field . '/';
      if ( !file_exists( $basedir ) ) {
        wp_mkdir_p( $basedir );
      }

      require_once plugin_dir_path( __FILE__ ) . 'includes/activator.php';
    }

    public function plugin_deactivate() {
      $upload = wp_upload_dir();
      $field = dirname( plugin_basename( __FILE__ ) );
      $basedir = $upload[ 'basedir' ] . '/' . $field . '/';
      require_once plugin_dir_path( __FILE__ ) . 'includes/deactivator.php';
    }

    public function create_field() {
      $upload = wp_upload_dir();
      $field = dirname( plugin_basename( __FILE__ ) );
      $basedir = $upload[ 'basedir' ] . '/' . $field . '/';
      if ( !file_exists( $basedir ) ) {
        wp_mkdir_p( $basedir );
      }
      // Update database to version 4.0
      require_once plugin_dir_path( __FILE__ ) . 'includes/data-update.php';
    }

    public function load_textdomain() {
      load_plugin_textdomain( 'modal-window', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
    }

  }
}
function wow_plugin_run() {
  return Wow_Plugin_Class::instance();
}

// Get Running.
wow_plugin_run();