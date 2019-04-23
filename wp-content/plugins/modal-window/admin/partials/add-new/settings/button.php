<?php if ( ! defined( 'ABSPATH' ) ) {
  exit;
}
/**
 * Float button settings
 *
 * @package     Wow_Pluign
 * @subpackage  Settings
 * @copyright   Copyright (c) 2018, Dmytro Lobov
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */

$umodal_button = array(
	'name'   => 'param[umodal_button]',
	'id'     => 'umodal_button',
	'class'  => '',
	'type'   => 'select',
	'val'    => isset( $param['umodal_button'] ) ? $param['umodal_button'] : 'no',
	'option' => array(
		'no' => __( 'no', $this->text_domain ),
		'yes' => __( 'yes', $this->text_domain ),
	),
	'func'   => 'displaybutton();',
);

$button_type = array(
	'name'   => 'param[button_type]',
	'type'   => 'select',
	'val'    => isset( $param['button_type'] ) ? $param['button_type'] : '',
	'option' => array(
		'1' => __( 'Only Text', $this->text_domain ),
	),
	'func'   => 'buttontype();',
);

// Type helper
$button_type_help = array (
  'text' => __('Set the button appearance.', $this->text_domain),
);

$umodal_button_text = array (
	'name' => 'param[umodal_button_text]',
	'id'   => 'umodal_button_text',
	'type' => 'text',
	'val'  => isset( $param['umodal_button_text'] ) ? $param['umodal_button_text'] : 'Feedback',
	'option' => array(
		'placeholder' => __('Feedback',$this->text_domain),
		'class' => '',
	),
);

$umodal_button_text_help = array (
  'text' => __('Enter Text for button.', $this->text_domain),
);

// Button Icon
$button_icon = array(
  'id'   => 'button_icon',
  'name' => 'param[button_icon]',
  'class' => 'font_icon',
  'type' => 'select',
  'val' => isset( $param['button_icon'] ) ? $param['button_icon'] : '',
  'option' => $icons_new,
);

// Button Icon helper
$button_icon_help = array (
  'text' => __('Select the Icon for button', $this->text_domain),
);

$rotate_icon = array(
	'name'   => 'param[rotate_icon]',
	'id'     => 'rotate_icon',
	'class'  => '',
	'type'   => 'select',
	'val'    => isset( $param['rotate_icon'] ) ? $param['rotate_icon'] : '0deg',
	'option' => array(
    ''       => __('none', $this->text_domain),
    'fa-rotate-90'     => __('90&deg;', $this->text_domain),
    'fa-rotate-180'    => __('180&deg;', $this->text_domain),
    'fa-rotate-270'    => __('270&deg;', $this->text_domain),
	),
	'func'   => '',	
);

$button_icon_after = array(
	'name'   => 'param[button_icon_after]',
	'id'     => 'button_icon_after',
	'class'  => '',
	'type'   => 'select',
	'val'    => isset( $param['button_icon_after'] ) ? $param['button_icon_after'] : '0',
	'option' => array(
		'0' => __( 'Before Icon', $this->text_domain ),
		'1' => __( 'After Icon', $this->text_domain ),
	),
);

$button_icon_after_help = array (
  'text' => __('Set where the button text will be displayed.', $this->text_domain),
);

$button_shape = array(
	'name'   => 'param[button_shape]',
	'id'     => 'button_shape',
	'class'  => 'shape_icon',
	'type'   => 'select',
	'val'    => isset( $param['button_shape'] ) ? $param['button_shape'] : '',
	'option' => array(
    ''                   => 'none',
    'fas fa-circle'      => 'fas fa-circle',
    'far fa-circle'      => 'far fa-circle',
    'fas fa-square'      => 'fas fa-square',
    'far fa-square'      => 'far fa-square',
    'fas fa-bookmark'    => 'fas fa-bookmark',
    'far fa-bookmark'    => 'far fa-bookmark',
    'fas fa-calendar'    => 'fas fa-calendar',
    'far fa-calendar'    => 'far fa-calendar',
    'fas fa-certificate' => 'fas fa-certificate',
		'fas fa-ban'         => __( 'fas fa-ban', $this->text_domain ),
	),
	'func'   => '',
);

$umodal_button_position = array(
	'name'   => 'param[umodal_button_position]',
	'id'     => 'umodal_button_position',
	'class'  => '',
	'type'   => 'select',
	'val'    => isset( $param['umodal_button_position'] ) ? $param['umodal_button_position'] : '',
	'option' => array(
    'wow_modal_button_right'  => __( 'Right', $this->text_domain ),
    'wow_modal_button_left'   => __( 'Left', $this->text_domain ),
    'wow_modal_button_top'    => __( 'Top', $this->text_domain ),
    'wow_modal_button_bottom' => __( 'Bottom', $this->text_domain ),
	),
	'func'   => 'butonnposition();',
);

$umodal_button_position_help = array (
  'text' => __('Set where the button text will be displayed.', $this->text_domain),
);

$button_position = array(
  'name'   => 'param[button_position]',
  'id'     => 'button_position',
  'type'   => 'number',
  'val'    => isset( $param[ 'button_position' ] ) ? $param[ 'button_position' ] : '50',
  'option' => array(
    'step'        => '0.1',
    'placeholder' => '0',
  ),
);

$button_margin = array(
  'name'   => 'param[button_margin]',
  'id'     => 'button_margin',
  'type'   => 'number',
  'val'    => isset( $param[ 'button_margin' ] ) ? $param[ 'button_margin' ] : '-4',
  'option' => array(
    'step'        => '0.1',
    'placeholder' => '0',
  ),
);

$button_animate = array(
	'name'   => 'param[button_animate]',
	'id'     => 'button_animate',
	'class'  => '',
	'type'   => 'select',
	'val'    => isset( $param['button_animate'] ) ? $param['button_animate'] : 'no',
	'option' => array(
    'no'         => __( 'no', $this->text_domain ),
  ),
	'func'   => '',
  'readonly' => 'readonly',
);

$button_animate_duration = array(
  'name'   => 'param[button_animate_duration]',
  'id'     => 'button_animate_duration',
  'type'   => 'number',
  'val'    => isset( $param[ 'button_animate_duration' ] ) ? $param[ 'button_animate_duration' ] : '5',
  'option' => array(
    'min'         => '0',
    'step'        => '0.1',
    'placeholder' => '5',
    'readonly' => 'readonly',
  ),
);

$button_animate_time = array(
  'name'   => 'param[button_animate_time]',
  'id'     => 'button_animate_time',
  'type'   => 'number',
  'val'    => isset( $param[ 'button_animate_time' ] ) ? $param[ 'button_animate_time' ] : '5',
  'option' => array(
    'min'         => '0',
    'step'        => '0.1',
    'placeholder' => '5',
    'readonly' => 'readonly',
  ),
);

$button_animate_pause = array(
  'name'   => 'param[button_animate_pause]',
  'id'     => 'button_animate_pause',
  'type'   => 'number',
  'val'    => isset( $param[ 'button_animate_pause' ] ) ? $param[ 'button_animate_pause' ] : '5',
  'option' => array(
    'min'         => '0',
    'step'        => '0.1',
    'placeholder' => '5',
    'readonly' => 'readonly',
  ),
);

$button_padding_top = isset( $param['button_padding_top'] ) ? $param['button_padding_top'] . 'px' : '14px';
$button_padding_left = isset( $param['button_padding_left'] ) ? $param['button_padding_left'] . 'px' : '14px';
$button_padding_old = $button_padding_top . ' ' . $button_padding_left;

$button_padding = array (
	'name' => 'param[button_padding]',
	'id'   => 'button_padding',
	'type' => 'text',
	'val'  => isset( $param['button_padding'] ) ? $param['button_padding'] : $button_padding_old,
);

// Button Padding helper
$button_padding_help = array (
  'title' => __('Specify button text inner padding. Can be:', $this->text_domain),
  'ul' => array (
    __('any integer value in px (for example: "10px" will set popup inner paddings to 10px)', $this->text_domain),
    __('if you enter 0, the popup will have not paddings', $this->text_domain),
    __('when four values are specified, the paddings apply to the top, right, bottom, and left in that order (clockwise)', $this->text_domain),
  ),
);

$button_radius = array(
  'name'   => 'param[button_radius]',
  'id'     => 'button_radius',
  'type'   => 'number',
  'val'    => isset( $param[ 'button_radius' ] ) ? $param[ 'button_radius' ] : '4',
  'option' => array(
    'min'         => '0',
    'step'        => '0.1',
    'placeholder' => '0',
  ),
  'func'   => '',
  'sep'    => '',
);

// Border Radius helper
$button_radius_help = array(
  'text' => __( 'Specify modal window border radius in px.', $this->text_domain ),
);

$button_text_size = array(
  'name'   => 'param[button_text_size]',
  'id'     => 'button_text_size',
  'type'   => 'number',
  'val'    => isset( $param[ 'button_text_size' ] ) ? $param[ 'button_text_size' ] : '1.2',
  'option' => array(
    'min'         => '0',
    'step'        => '0.1',
    'placeholder' => '0',
  ),
);

// Close Button font size helper
$button_text_size_help = array (
  'text' => __('Set the font size for close button content in em', $this->text_domain),
);

$button_text_color = array(
  'name' => 'param[button_text_color]',
  'id'   => 'button_text_color',
  'type' => 'color',
  'val'  => isset( $param[ 'button_text_color' ] ) ? $param[ 'button_text_color' ] : '#ffffff',
  'sep'  => '',
);

$button_text_hcolor = array(
  'name' => 'param[button_text_hcolor]',
  'id'   => 'button_text_hcolor',
  'type' => 'color',
  'val'  => isset( $param[ 'button_text_hcolor' ] ) ? $param[ 'button_text_hcolor' ] : '#ffffff',
  'sep'  => '',
);

$umodal_button_color = array(
  'name' => 'param[umodal_button_color]',
  'id'   => 'umodal_button_color',
  'type' => 'color',
  'val'  => isset( $param[ 'umodal_button_color' ] ) ? $param[ 'umodal_button_color' ] : '#383838',
  'sep'  => '',
);

$umodal_button_hover = array(
  'name' => 'param[umodal_button_hover]',
  'id'   => 'umodal_button_hover',
  'type' => 'color',
  'val'  => isset( $param[ 'umodal_button_hover' ] ) ? $param[ 'umodal_button_hover' ] : '#797979',
  'sep'  => '',
);