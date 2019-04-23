<?php if ( ! defined( 'ABSPATH' ) ) {
  exit;
}
/**
 * Icon generator settings
 *
 * @package     Wow_Pluign
 * @subpackage  Settings
 * @copyright   Copyright (c) 2019, Dmytro Lobov
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */

$icongenerate = array(
  'id'   => 'icongenerate',
  'name' => 'font_icon',
  'class' => 'font_icon',
  'type' => 'select',
  'val'  => '',
  'option' => $icons_new,
);

$color_icon = array(
  'name' => 'color_icon',
  'id'   => 'color_icon',
  'type' => 'color',
  'val'  => '#797979',
);

$size_icon = array(
  'name'   => 'size_icon',
  'id'     => 'size_icon',
  'type'   => 'number',
  'val'    => '24',
  'option' => array(
    'min'         => '0',
    'step'        => '0.1',
    'placeholder' => '24',
  ),
);

$link_icon = array (
	'name' => 'link_icon',
	'id'   => 'link_icon',
	'type' => 'text',
	'val'  => '',
	'option' => array(
		'placeholder' => 'https://wow-estore.com/',
	),
);

$target_icon = array(
	'name'   => 'target_icon',
	'id'     => 'target_icon',
	'type'   => 'select',
	'val'    => '_blank',
	'option' => array(
		'_blank' => __( 'In a new window', $this->text_domain ),
		'_self' => __( 'In the same window', $this->text_domain ),
	),
);
