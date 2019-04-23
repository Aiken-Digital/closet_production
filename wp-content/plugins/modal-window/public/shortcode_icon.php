<?php
/**
 * Icon shortcode
 *
 * @package     Public
 * @subpackage
 * @copyright   Copyright (c) 2017, Dmytro Lobov
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       3.0
 */

if ( !defined( 'ABSPATH' ) ) exit;

$params = shortcode_atts( array(
  'name'   => "",
  'size'   => "",
  'color'  => "",
  'link'   => "",
  'target' => "",
), $atts );

if ( !empty( $params[ 'size' ] ) || !empty( $params[ 'color' ] ) ) {
  $size = (!empty( $params[ 'size' ] )) ? "font-size:" . $params[ 'size' ] . "px;" : '';
  $color = (!empty( $params[ 'color' ] )) ? "color:" . $params[ 'color' ] : '';
  $style = ' style="' . $size . $color . '"';
} else {
  $style = '';
}
if ( !empty( $params[ 'link' ] ) ) {
  $icon = '<a href="' . $params[ 'link' ] . '" target="' . $params[ 'target' ] . '"><i class="' . $params[ 'name' ] . '"' . $style . '></i></a>';
} else {
  $icon = '<i class="' . $params[ 'name' ] . '"' . $style . '></i>';
}
wp_enqueue_style( 'wow-plugin-fontawesome', $this->plugin_url . 'assets/vendors/fontawesome/css/fontawesome-all.min.css', null, '5.6.3' );

echo $icon;