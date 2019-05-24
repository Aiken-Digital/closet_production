<?php
/**
 * Public Class
 *
 * @package     Wow_Plugin
 * @subpackage  Public
 * @copyright   Copyright (c) 2018, Dmytro Lobov
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */

namespace modal_window;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Wow_Public_Class {

	private $arg;

	public function __construct( $arg ) {

		$this->plugin_name     = $arg['plugin_name'];
		$this->plugin_menu     = $arg['plugin_menu'];
		$this->plugin_home_url = $arg['plugin_home_url'];
		$this->plugin_version  = $arg['plugin_version'];
		$this->plugin_file     = $arg['plugin_file'];
		$this->plugin_slug     = $arg['plugin_slug'];
		$this->plugin_dir      = $arg['plugin_dir'];
		$this->plugin_url      = $arg['plugin_url'];
		$this->plugin_pref     = $arg['plugin_pref'];
		$this->author_url      = $arg['author_url'];
		$this->pro_url         = $arg['pro_url'];
		$this->shortcode       = $arg['shortcode'];

		$upload        = wp_upload_dir();
		$this->basedir = $upload['basedir'] . '/' . $this->plugin_slug . '/';
		$this->baseurl = $upload['baseurl'] . '/' . $this->plugin_slug . '/';

    // add general style
    add_action( 'wp_enqueue_scripts', array($this, 'plugin_scripts') );

		add_shortcode( $this->shortcode, array( $this, 'shortcode' ) );

    // old shortcode
		add_shortcode( 'Wow-Modal-Windows', array( $this, 'shortcode' ) );

    // shortcode for icon
    add_shortcode('wow-icon', array($this, 'shortcode_icon') );
		add_action( 'wp_footer', array( $this, 'display') );



    // Shortcodes for columns
    add_shortcode( 'w-row', array( $this, 'shortcode_row' ) );
    add_shortcode( 'w-column', array( $this, 'shortcode_columns' ) );
	}

	function plugin_scripts() {
    wp_enqueue_style( $this->plugin_slug, $this->plugin_url . 'assets/css/style.min.css', array(), $this->plugin_version);

  }
	function shortcode( $atts ) {
		ob_start();
		require plugin_dir_path( __FILE__ ) . 'shortcode.php';
		$shortcode = ob_get_contents();
		ob_end_clean();
		return $shortcode;
	}

	function shortcode_icon( $atts ) {
		ob_start();
		require plugin_dir_path( __FILE__ ) . 'shortcode_icon.php';
		$shortcode = ob_get_contents();
		ob_end_clean();
		return $shortcode;
	}

	function display() {
		require plugin_dir_path( __FILE__ ) . 'display.php';
	}



  function shortcode_row ( $atts, $content = null ) {
    return '<div class="wow-col">' . do_shortcode( $content ) . '</div>';
  }

  function shortcode_columns ( $atts, $content = null ) {
    extract( shortcode_atts( array( 'width' => "", 'align' => '' ), $atts ) );
    $width = !empty( $width ) ? $width : '12';
    $align = !empty( $align ) ? $align : 'left';
    return '<div class="wow-col-' . $width . '" style="text-align: ' . $align . '">' . do_shortcode( $content ) . '</div>';
  }


}