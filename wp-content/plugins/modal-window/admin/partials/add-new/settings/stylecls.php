<?php if ( ! defined( 'ABSPATH' ) ) {
  exit;
}
/**
 * Close button Style
 *
 * @package     Wow_Pluign
 * @subpackage  Settings
 * @copyright   Copyright (c) 2018, Dmytro Lobov
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */

// Location of the close button
$close_location  = array(
  'id'   => 'close_location',
  'name' => 'param[close_location]',
  'type' => 'select',
  'val' => isset( $param['close_location'] ) ? $param['close_location'] : 'topRight',
  'option' => array(
    'topRight'      => __('Top Right location on the popup', $this->text_domain),
  ),
  'func' => 'closelocation()',
);

// Location helper
$close_location_help = array (
  'text' => __('Specify close button location.', $this->text_domain),
);

// Location Top
$close_top_position = array(
  'id'   => 'close_top_position',
  'name' => 'param[close_top_position]',
  'type' => 'number',
  'val' => isset( $param['close_top_position'] ) ? round($param['close_top_position']) : '-15',
  'option' => array (
    'step' => '1',
    'placeholder' => '0',
    'readonly' => 'readonly',
  ),
);

// Location Top helper
$close_top_position_help = array (
  'text' => __('Distance from the top edge of the popup in px.', $this->text_domain),
);

// Location Bottom
$close_bottom_position = array(
  'id'   => 'close_bottom_position',
  'name' => 'param[close_bottom_position]',
  'type' => 'number',
  'val' => isset( $param['close_bottom_position'] ) ?  round($param['close_bottom_position']) : '0',
  'option' => array (
    'step' => '1',
    'placeholder' => '0',
  ),
);

// Location Bottom helper
$close_bottom_position_help = array (
  'text' => __('Distance from the bottom  edge of the popup in px.', $this->text_domain),
);

// Location Left
$close_left_position = array(
  'id'   => 'close_left_position',
  'name' => 'param[close_left_position]',
  'type' => 'number',
  'val' => isset( $param['close_left_position'] ) ?  round($param['close_left_position']) : '0',
  'option' => array (
    'step' => '1',
    'placeholder' => '0',
  ),
);

// Location Left helper
$close_left_position_help = array (
  'text' => __('Distance from the left edge of the popup in px.', $this->text_domain),
);

// Location Right
$close_right_position = array(
  'id'   => 'close_right_position',
  'name' => 'param[close_right_position]',
  'type' => 'number',
  'val' => isset( $param['close_right_position'] ) ?  round($param['close_right_position']) : '-15',
  'option' => array (
    'step' => '1',
    'placeholder' => '0',
    'readonly' => 'readonly',
  ),
);

// Location Right helper
$close_right_position_help = array (
  'text' => __('Distance from the right edge of the popup in px.', $this->text_domain),
);

$close_type = array(
  'name'   => 'param[close_type]',
  'id'     => 'close_type',
  'class'  => '',
  'type'   => 'select',
  'val'    => isset( $param['close_type'] ) ? $param['close_type'] : 'image',
  'option' => array(
    'image'      => __('Icon', $this->text_domain),
  ),
  'func'   => 'closetype()',
  'readonly' => 'readonly',
);

$close_content = array (
  'name' => 'param[$close_content]',
  'id'   => '$close_content',
  'type' => 'text',
  'val'  => isset( $param['$close_content'] ) ? $param['$close_content'] : 'Close',
  'option' => array(
    'placeholder' => __('Close',$this->text_domain),
    'class' => '',
  ),
  'func' => '',
  'sep'  => '',
);

// Text helper
$close_content_help = array (
  'text' => __('Enter the close button text.', $this->text_domain),
);

$close_padding_top = isset( $param['close_padding_top'] ) ? $param['close_padding_top'] . 'px' : '6px';
$close_padding_left = isset( $param['close_padding_left'] ) ? $param['close_padding_left'] . 'px' : '12px';

// Close Button Text Padding
$close_padding = array(
  'id'   => 'close_padding',
  'name' => 'param[close_padding]',
  'type' => 'text',
  'val' => isset( $param['close_padding'] ) ? $param['close_padding'] : $close_padding_top . ' ' . $close_padding_left,
  'option' => array (
    'placeholder' => '6px 12px',
  ),
);

// Close Button Padding helper
$close_padding_help = array (
  'title' => __('Specify button text inner padding. Can be:', $this->text_domain),
  'ul' => array (
    __('any integer value in px (for example: "10px" will set popup inner paddings to 10px)', $this->text_domain),
    __('if you enter 0, the popup will have not paddings', $this->text_domain),
    __('when four values are specified, the paddings apply to the top, right, bottom, and left in that order (clockwise)', $this->text_domain),
  ),
);

// Icon Button Box Size
$close_box_size = array(
  'id'   => 'close_box_size',
  'name' => 'param[close_box_size]',
  'type' => 'number',
  'val' => isset( $param['close_box_size'] ) ?  round($param['close_box_size']) : '32',
  'option' => array (
    'min' => '0',
    'step' => '1',
    'placeholder' => '32',
    'readonly' => 'readonly',
  ),
);




// Close Button helper
$close_box_size_help = array (
  'text' => __('Specify box size for close button icon.', $this->text_domain),
);

// Close Button Font Size
$close_size = array(
  'id'   => 'btn_size',
  'name' => 'param[close_size]',
  'type' => 'number',
  'val' => isset( $param['close_size'] ) ?  round($param['close_size']) : '14',
  'option' => array (
    'min' => '1',
    'step' => '1',
    'placeholder' => '14',
    'readonly' => 'readonly',
  ),
);

// Close Button font size helper
$close_size_help = array (
  'text' => __('Set the font size for close button content in px', $this->text_domain),
);

// Close Button Font Family
$close_font = array(
  'id'   => 'close_font',
  'name' => 'param[close_font]',
  'type' => 'select',
  'val' => isset( $param['close_font'] ) ? $param['close_font'] : 'inherit',
  'option' => array (
    'inherit' => __('Use Your Themes', $this->text_domain),
  ),
  'readonly' => 'readonly',
);

// Close Button Font Weight
$close_weight = array(
  'id'   => 'close_weight',
  'name' => 'param[close_weight]',
  'type' => 'select',
  'val' => isset( $param['close_weight'] ) ? $param['close_weight'] : 'normal',
  'option' => array (
    'normal' => 'Normal',
  ),
  'readonly' => 'readonly',
);

// Close Button Font Style
$close_font_style = array(
  'id'   => 'close_font_style',
  'name' => 'close_font_style',
  'type' => 'select',
  'val' => isset( $param['close_font_style'] ) ? $param['close_font_style'] : 'normal',
  'option' => array (
    'normal' => 'Normal',
  ),
  'readonly' => 'readonly',
);

// Icon Button Box Size
$close_border_radius = array(
  'id'   => 'close_border_radius',
  'name' => 'param[close_border_radius]',
  'type' => 'number',
  'val' => isset( $param['close_border_radius'] ) ?  round($param['close_border_radius']) : '25',
  'option' => array (
    'placeholder' => '0',
    'step' => '1',
    'readonly' => 'readonly',
  ),
);

// Close border width
$close_border_width = array(
  'name'   => 'param[close_border_width]',
  'id'     => 'close_border_width',
  'type'   => 'number',
  'val'    => isset( $param[ 'close_border_width' ] ) ?  round($param[ 'close_border_width' ]) : '0',
  'option' => array(
    'min'         => '0',
    'step'        => '1',
    'placeholder' => '1',
  ),
);

$close_border_width_help = array (
	'text' => __( 'Set the border width in pixels.', $this->text_domain ),
);

// Close Button Text Color
$close_content_color  = array(
  'id'   => 'close_content_color',
  'name' => 'param[close_content_color]',
  'type' => 'color',
  'val' => isset( $param['close_content_color'] ) ? $param['close_content_color'] : '#fff',
  'option' => array (
    'placeholder' => '#ffffff',
  ),
);

// Close Button Color helper
$close_content_color_help = array (
  'text' => __('Specify popup close button color.', $this->text_domain),
);

// Close Button Color hover
$close_content_color_hover = array(
  'id'   => 'close_content_color_hover',
  'name' => 'param[close_content_color_hover]',
  'type' => 'color',
  'val' => isset( $param['close_content_color_hover'] ) ? $param['close_content_color_hover'] : '#000',
  'option' => array (
    'placeholder' => '#000000',
  ),
);

// Close Button Text Color helper
$close_content_color_hover_help = array (
  'text' => __('Specify popup close button hover text color.', $this->text_domain),
);

// Close Button Background
$close_background_color  = array(
  'id'   => 'close_background_color',
  'name' => 'param[close_background_color]',
  'type' => 'color',
  'val' => isset( $param['close_background_color'] ) ? $param['close_background_color'] : '#000',
  'option' => array (
    'placeholder' => '#000000',
  ),
);

// Close Button Background helper
$close_background_color_help = array (
  'text' => __('Specify popup close button background color.', $this->text_domain),
);

// Close Button Background hover
$close_background_hover = array(
  'id'   => 'close_background_hover',
  'name' => 'param[close_background_hover]',
  'type' => 'color',
  'val' => isset( $param['close_background_hover'] ) ? $param['close_background_hover'] : '#fff',
  'option' => array (
    'placeholder' => '#fff',
  ),
);

// Close Button Background hover helper
$close_background_hover_help = array (
  'text' => __('Specify popup close button hover background color.', $this->text_domain),
);

// Close border color
$close_border_color = array(
  'name' => 'param[close_border_color]',
  'id'   => 'close_border_color',
  'type' => 'color',
  'val'  => isset( $param[ 'close_border_color' ] ) ? $param[ 'close_border_color' ] : '#ffffff',
  'sep'  => '',
);