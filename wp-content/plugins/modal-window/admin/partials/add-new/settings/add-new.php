<?php
/**
 * Main Settings
 *
 * @package     Wow_Plugin
 * @copyright   Copyright (c) 2018, Dmytro Lobov
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */

// include icon to
include_once ('icons.php');

// create array of the icons
$icons_new = array();
foreach ( $icons as $key => $value ) {
  $icons_new[$value] = $value;
}


$popup_title = array(
  'name'  => 'param[popup_title]',
  'id'    => 'popuptitle',
  'class' => '',
  'type'  => 'checkbox',
  'val'   => isset( $param[ 'popup_title' ] ) ? $param[ 'popup_title' ] : 0,
  'sep'   => '',
);

$content = array(
  'name' => 'param[content]',
  'id'   => 'content',
  'type' => 'editor',
  'val'  => isset( $param[ 'content' ] ) ? $param[ 'content' ] : '',
);

$tax_args   = array(
	'public'   => true,
	'_builtin' => false
);
$output     = 'names';
$operator   = 'and';
$taxonomies = get_taxonomies( $tax_args, $output, $operator );

$show_option = array(
  'shortecode' => __( 'Where shortcode is inserted', $this->text_domain ),
	'all'        => __( 'All posts and pages', $this->text_domain ),

);

$show = array(
	'id'     => 'show',
	'name'   => 'param[show]',
	'type'   => 'select',
	'val'    => isset( $param['show'] ) ? $param['show'] : 'all',
	'option' => $show_option,
	'func'   => 'showchange(this);',
	'sep'    => '<p/>',
);

$show_help = array(
	'text' => __( 'Choose a condition to target to specific content.', $this->text_domain ),
);

// Taxonomy
$taxonomy_option = array();
if ( $taxonomies ) {
	foreach ( $taxonomies as $taxonomy ) {
		$taxonomy_option[ $taxonomy ] = $taxonomy;
	}
}

