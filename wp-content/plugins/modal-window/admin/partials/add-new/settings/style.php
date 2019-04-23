<?php if ( !defined( 'ABSPATH' ) ) {
  exit;
}
/**
 * Style settings
 *
 * @package     Wow_Pluign
 * @subpackage  Settings
 * @copyright   Copyright (c) 2018, Dmytro Lobov
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */

$modal_width = array(
  'name'   => 'param[modal_width]',
  'type'   => 'number',
  'val'    => isset( $param[ 'modal_width' ] ) ? round($param[ 'modal_width' ]) : '662',
  'option' => array(
    'min'         => '0',
    'step'        => '1',
    'placeholder' => '662',
  ),
);

$modal_width_par = array(
  'name'   => 'param[modal_width_par]',
  'type'   => 'radio',
  'val'    => isset( $param[ 'modal_width_par' ] ) ? $param[ 'modal_width_par' ] : 'px',
  'option' => array(
    'px' => __( 'px', $this->text_domain ),
    'pr' => __( '%', $this->text_domain ),
  ),
  'func'   => '',
  'sep'    => ' &nbsp',
);

$modal_height = array(
  'name'   => 'param[modal_height]',
  'type'   => 'number',
  'val'    => isset( $param[ 'modal_height' ] ) ? round($param[ 'modal_height' ]) : '',
  'option' => array(
    'min'         => '0',
    'step'        => '1',
    'placeholder' => 'auto',
  ),
);

$modal_height_par = array(
  'name'   => 'param[modal_height_par]',
  'type'   => 'radio',
  'val'    => isset( $param[ 'modal_height_par' ] ) ? $param[ 'modal_height_par' ] : 'px',
  'option' => array(
    'auto' => __( 'auto', $this->text_domain ),
    'px'   => __( 'px', $this->text_domain ),
    'pr'   => __( '%', $this->text_domain ),
  ),
  'func'   => '',
  'sep'    => ' &nbsp',
);

$modal_padding = array(
  'name'   => 'param[modal_padding]',
  'type'   => 'number',
  'val'    => isset( $param[ 'modal_padding' ] ) ? round($param[ 'modal_padding' ]) : '10',
  'option' => array(
    'min'         => '0',
    'step'        => '1',
    'placeholder' => '10',
    'readonly' => 'readonly',
  ),
);

// Padding helper
$modal_padding_help = array(
  'text' => __( 'Specify modal window inner padding.', $this->text_domain ),
);

$modal_zindex = array(
  'name'   => 'param[modal_zindex]',
  'type'   => 'number',
  'val'    => isset( $param[ 'modal_zindex' ] ) ? round($param[ 'modal_zindex' ]) : '999999',
  'option' => array(
    'min'         => '0',
    'step'        => '1',
    'placeholder' => '999999',
  ),
);

// Z-index helper
$modal_zindex_help = array(
  'text' => __( 'The z-index property specifies the stack order of an element. An element with greater stack order is always in front of an element with a lower stack order.', $this->text_domain ),
);

$modal_background_img = array(
  'name' => 'param[modal_background_img]',
  'type' => 'text',
  'val'  => isset( $param[ 'modal_background_img' ] ) ? $param[ 'modal_background_img' ] : '',
  'option' => array(
    'readonly' => 'readonly',
  ),
);

// Popup Background Image helper
$modal_background_img_help = array(
  'text' => __( 'Specify the modal window background image. Enter the URL of the image which you want to use as a background.', $this->text_domain ),
);

// Popup Position
$modal_position = array(
  'name'   => 'param[modal_position]',
  'type'   => 'select',
  'val'    => isset( $param[ 'modal_position' ] ) ? $param[ 'modal_position' ] : 'fixed',
  'option' => array(
    'fixed'    => __( 'Fixed', $this->text_domain ),
    'absolute' => __( 'Absolute', $this->text_domain ),
  ),
);

// Popup Position helper
$modal_position_help = array(
  'title' => __( 'Set the positioning of the popup. Can be:', $this->text_domain ),
  'ul'    => array(
    __( '<strong>fixed</strong> - popup is positioned relative to the browser window;', $this->text_domain ),
    __( '<strong>absolute</strong> - the popup is positioned relative to its place;', $this->text_domain ),
  ),
);

// Popup Background
$bg_color = array(
  'name' => 'param[bg_color]',
  'type' => 'color',
  'val'  => isset( $param[ 'bg_color' ] ) ? $param[ 'bg_color' ] : '#ffffff',
);

// Popup Background helper
$bg_color_help = array(
  'text' => __( 'Specify modal window background color.', $this->text_domain ),
);


$include_overlay = array(
  'name'  => 'param[include_overlay]',
  'id'    => 'overlay',
  'class' => '',
  'type'  => 'checkbox',
  'val'   => isset( $param[ 'include_overlay' ] ) ? $param[ 'include_overlay' ] : 1,
  'func'  => 'overlayEnable()',

);

// Overlay helper
$include_overlay_help = array(
  'text' => __( 'Specify if overlay should be active or not. If you uncheck, the modal will have no background overlay.', $this->text_domain ),
);

$overlay_color = array(
  'name' => 'param[overlay_color]',
  'type' => 'color',
  'val'  => isset( $param[ 'overlay_color' ] ) ? $param[ 'overlay_color' ] : 'rgba(0,0,0,.7)',
  'sep'  => '',
);


$border_width = array(
  'name'   => 'param[border_width]',
  'type'   => 'number',
  'val'    => isset( $param[ 'border_width' ] ) ? round($param[ 'border_width' ]) : '0',
  'option' => array(
    'min'         => '0',
    'step'        => '1',
    'placeholder' => '0',
  ),
);

$border_radius = array(
  'name'   => 'param[border_radius]',
  'type'   => 'number',
  'val'    => isset( $param[ 'border_radius' ] ) ? round($param[ 'border_radius' ]) : '5',
  'option' => array(
    'min'         => '0',
    'step'        => '1',
    'placeholder' => '5',
  ),
);

// Border Radius helper
$border_radius_help = array(
  'text' => __( 'Specify modal window border radius in px.', $this->text_domain ),
);

$border_color = array(
  'name' => 'param[border_color]',
  'id'   => 'border_color',
  'type' => 'color',
  'val'  => isset( $param[ 'border_color' ] ) ? $param[ 'border_color' ] : '#383838',
  'sep'  => '',
);


// Border Style
$border_style = array(
  'id'     => 'border_style',
  'name'   => 'param[border_style]',
  'type'   => 'select',
  'val'    => isset( $param[ 'border_style' ] ) ? $param[ 'border_style' ] : 'solid',
  'option' => array(
    'none'   => __( 'None', $this->text_domain ),
    'solid'  => __( 'Solid', $this->text_domain ),
    'dotted' => __( 'Dotted', $this->text_domain ),
    'dashed' => __( 'Dashed', $this->text_domain ),
    'double' => __( 'Double', $this->text_domain ),
    'groove' => __( 'Groove', $this->text_domain ),
    'inset'  => __( 'Inset', $this->text_domain ),
    'outset' => __( 'Outset', $this->text_domain ),
    'ridge'  => __( 'Ridge', $this->text_domain ),
  ),
  'func'   => 'border()',
);

// Border Style helper
$border_style_help = array(
  'text' => __( 'Choose a border style for your popup.', $this->text_domain ),
);

// Top location

$include_modal_top = array(
  'name'  => 'param[include_modal_top]',
  'id'    => 'include_modal_top',
  'class' => 'location',
  'type'  => 'checkbox',
  'val'   => isset( $param[ 'include_modal_top' ] ) ? $param[ 'include_modal_top' ] : 1,
  'func'  => '',
  'sep'   => '',
);

$modal_top = array(
  'name'   => 'param[modal_top]',
  'type'   => 'number',
  'val'    => isset( $param[ 'modal_top' ] ) ? round($param[ 'modal_top' ]) : '10',
  'option' => array(
    'min'         => '-100',
    'max'         => '100',
    'step'        => '1',
    'placeholder' => '0',
  ),
);

// Location Top helper
$modal_top_help = array(
  'text' => __( 'Distance from the top edge of the screen in %.', $this->text_domain ),
);

// Bottom location

$include_modal_bottom = array(
  'name'  => 'param[include_modal_bottom]',
  'id'    => 'include_modal_bottom',
  'class' => 'location',
  'type'  => 'checkbox',
  'val'   => isset( $param[ 'include_modal_bottom' ] ) ? $param[ 'include_modal_bottom' ] : 0,
  'func'  => '',
  'sep'   => '',
);

$modal_bottom = array(
  'name'   => 'param[modal_bottom]',
  'type'   => 'number',
  'val'    => isset( $param[ 'modal_bottom' ] ) ? round($param[ 'modal_bottom' ]) : '0',
  'option' => array(
    'min'         => '-100',
    'max'         => '100',
    'step'        => '1',
    'placeholder' => '0',
  ),
);

// Location Bottom helper
$modal_bottom_help = array(
  'text' => __( 'Distance from the bottom  edge of the screen in %.', $this->text_domain ),
);

// Left location

$include_modal_left = array(
  'name'  => 'param[include_modal_left]',
  'id'    => 'include_modal_left',
  'class' => 'location',
  'type'  => 'checkbox',
  'val'   => isset( $param[ 'include_modal_left' ] ) ? $param[ 'include_modal_left' ] : 1,
  'func'  => '',
  'sep'   => '',
);

$modal_left = array(
  'name'   => 'param[modal_left]',
  'type'   => 'number',
  'val'    => isset( $param[ 'modal_left' ] ) ? round($param[ 'modal_left' ]) : '0',
  'option' => array(
    'min'         => '-100',
    'max'         => '100',
    'step'        => '1',
    'placeholder' => '0',
    'readonly' => 'readonly',
  ),
);

// Location Left helper
$modal_left_help = array(
  'text' => __( 'Distance from the left edge of the screen in %.', $this->text_domain ),
);

// Right location

$include_modal_right = array(
  'name'  => 'param[include_modal_right]',
  'id'    => 'include_modal_right',
  'class' => 'location',
  'type'  => 'checkbox',
  'val'   => isset( $param[ 'include_modal_right' ] ) ? $param[ 'include_modal_right' ] : 1,
  'func'  => '',
  'sep'   => '',
);

$modal_right = array(
  'name'   => 'param[modal_right]',
  'type'   => 'number',
  'val'    => isset( $param[ 'modal_right' ] ) ? round($param[ 'modal_right' ]) : '0',
  'option' => array(
    'min'         => '-100',
    'max'         => '100',
    'step'        => '1',
    'placeholder' => '0',
    'readonly' => 'readonly',
  ),
);

// Location Right helper
$modal_right_help = array(
  'text' => __( 'Distance from the right edge of the screen in %.', $this->text_domain ),
);

// Popup Shadow
$shadow = array(
  'id'     => 'shadowtype',
  'name'   => 'param[shadow]',
  'type'   => 'select',
  'val'    => isset( $param[ 'shadow' ] ) ? $param[ 'shadow' ] : 'none',
  'option' => array(
    'none'   => __( 'None', $this->text_domain ),    
  ),
  'func'   => 'shadow();',
  'readonly' => 'readonly',
);

$shadow_help = array(
  'title' => __( 'Set the box shadow.', $this->text_domain ),
  'ul'    => array(
    __( 'None - no shadow is displayed', $this->text_domain ),
    __( 'Outset - outer shadow of popup', $this->text_domain ),
    __( 'Inset - inner shadow of popup', $this->text_domain ),
  ),
);

// Popup Shadow Horizontal Position
$shadow_h_offset = array(
  'id'     => 'shadow_h_offset',
  'name'   => 'param[shadow_h_offset]',
  'type'   => 'number',
  'val'    => isset( $param[ 'shadow_h_offset' ] ) ? $param[ 'shadow_h_offset' ] : '0',
  'option' => array(
    'step'        => '1',
    'placeholder' => '0',
  ),
);

$shadow_h_offset_help = array(
  'text' => __( 'The horizontal offset of the shadow. A positive value puts the shadow on the right side of the box, a negative value puts the shadow on the left side of the box.', $this->text_domain ),
);

// Popup Shadow Vertical Position
$shadow_v_offset = array(
  'id'     => 'shadow_v_offset',
  'name'   => 'param[shadow_v_offset]',
  'type'   => 'number',
  'val'    => isset( $param[ 'shadow_v_offset' ] ) ? $param[ 'shadow_v_offset' ] : '0',
  'option' => array(
    'step'        => '1',
    'placeholder' => '0',
  ),
);

$shadow_v_offset_help = array(
  'text' => __( 'The vertical offset of the shadow. A positive value puts the shadow below the box, a negative value puts the shadow above the box.', $this->text_domain ),
);

// Popup Shadow Blur Radius
$shadow_blur = array(
  'id'     => 'shadow_blur',
  'name'   => 'param[shadow_blur]',
  'type'   => 'number',
  'val'    => isset( $param[ 'shadow_blur' ] ) ? $param[ 'shadow_blur' ] : '3',
  'option' => array(
    'step'        => '1',
    'placeholder' => '0',
  ),
);

$shadow_blur_help = array(
  'text' => __( 'The blur radius. The higher the number, the more blurred the shadow will be.', $this->text_domain ),
);

// Popup Shadow Spread
$shadow_spread = array(
  'id'     => 'shadow_spread',
  'name'   => 'param[shadow_spread]',
  'type'   => 'number',
  'val'    => isset( $param[ 'shadow_spread' ] ) ? $param[ 'shadow_spread' ] : '0',
  'option' => array(
    'step'        => '1',
    'placeholder' => '0',
  ),
);

$shadow_spread_help = array(
  'text' => __( 'The spread radius. A positive value increases the size of the shadow, a negative value decreases the size of the shadow.', $this->text_domain ),
);

// Popup Shadow Color
$shadow_color = array(
  'id'     => 'shadow_color',
  'name'   => 'param[shadow_color]',
  'type'   => 'color',
  'val'    => isset( $param[ 'shadow_color' ] ) ? $param[ 'shadow_color' ] : '#020202',
  'option' => array(
    'placeholder' => '#020202',
  ),
);

$shadow_color_help = array(
  'text' => __( 'The color of the shadow.', $this->text_domain ),
);

// Popup Title font size
$title_size = array(
  'id'     => 'title_size',
  'name'   => 'param[title_size]',
  'type'   => 'number',
  'val'    => isset( $param[ 'title_size' ] ) ? $param[ 'title_size' ] : '32',
  'option' => array(
    'min'         => '0',
    'step'        => '1',
    'placeholder' => '32',
  ),
);

// Popup Title font size helper
$title_size_help = array(
  'text' => __( 'Set the font size for popup content in px', $this->text_domain ),
);

// Popup Title Line Height
$title_line_height = array(
  'id'     => 'title_line_height',
  'name'   => 'param[title_line_height]',
  'type'   => 'number',
  'val'    => isset( $param[ 'title_line_height' ] ) ? $param[ 'title_line_height' ] : '36',
  'option' => array(
    'min'         => '1',
    'step'        => '1',
    'placeholder' => '36',
  ),
);

// Popup Title Line Height helper
$title_line_height_help = array(
  'text' => __( 'The line-height property defines the amount of space above and below inline elements in px.', $this->text_domain ),
);

// Popup Title Font Family
$title_font = array(
  'id'     => 'title_font',
  'name'   => 'param[title_font]',
  'type'   => 'select',
  'val'    => isset( $param[ 'title_font' ] ) ? $param[ 'title_font' ] : 'inherit',
  'option' => array(
    'inherit'         => __( 'Use Your Themes', $this->text_domain ),
  ),
  'readonly' => 'readonly'
);

// Popup Title Font Weight
$title_font_weight = array(
  'id'     => 'title_font_weight',
  'name'   => 'param[title_font_weight]',
  'type'   => 'select',
  'val'    => isset( $param[ 'title_font_weight' ] ) ? $param[ 'title_font_weight' ] : 'normal',
  'option' => array(
    'normal' => 'Normal',
  ),
  'readonly' => 'readonly',
);

// Popup Title Font Style
$title_font_style = array(
  'id'     => 'title_font_style',
  'name'   => 'param[title_font_style]',
  'type'   => 'select',
  'val'    => isset( $param[ 'title_font_style' ] ) ? $param[ 'title_font_style' ] : 'normal',
  'option' => array(
    'normal' => 'Normal',
  ),
  'readonly' => 'readonly',
);

// Popup Title Align
$title_align = array(
  'id'     => 'title_align',
  'name'   => 'param[title_align]',
  'type'   => 'select',
  'val'    => isset( $param[ 'title_align' ] ) ? $param[ 'title_align' ] : 'center',
  'option' => array(
    'left'   => 'Left',
    'center' => 'Center',
    'right'  => 'Right',
  ),
);

// Popup Title Color
$title_color = array(
  'id'     => 'title_color',
  'name'   => 'param[title_color]',
  'type'   => 'color',
  'val'    => isset( $param[ 'title_color' ] ) ? $param[ 'title_color' ] : '#383838',
  'option' => array(
    'placeholder' => '#383838',
  ),
);


$content_size = array(
  'id'     => 'content_size',
  'name'   => 'param[content_size]',
  'type'   => 'number',
  'val'    => isset( $param[ 'content_size' ] ) ? $param[ 'content_size' ] : '16',
  'option' => array(
    'min'         => '8',
    'max'         => '54',
    'step'        => '1',
    'placeholder' => '16',
  ),
);

// Close Button font size helper
$content_size_help = array (
  'text' => __('Set the font size for close button content in px', $this->text_domain),
);

$content_font = array(
  'id'     => 'content_font',
  'name'   => 'param[content_font]',
  'type'   => 'select',
  'val'    => isset( $param[ 'content_font' ] ) ? $param[ 'content_font' ] : 'inherit',
  'option' => array(
    'inherit'         => __( 'Use Your Themes', $this->text_domain ),
  ),
  'readonly' => 'readonly'
);

// Screen for mobile version
$screen_size = array(
  'name'   => 'param[screen_size]',
  'id'     => 'screen_size',
  'type'   => 'number',
  'val'    => isset( $param[ 'screen_size' ] ) ? $param[ 'screen_size' ] : '480',
  'option' => array(
    'step'        => '1',
    'placeholder' => '480',
  ),
  'func'   => '',
  'sep'    => '',
);

$screen_size_help = array(
  'text' => __( 'Set the screen size in px of mobile devices for which the this option of the modal window size will be applied.', $this->text_domain ),
);

// Modal window mobile Width

$mobile_width = array(
  'name'   => 'param[mobile_width]',
  'type'   => 'number',
  'val'    => isset( $param[ 'mobile_width' ] ) ? $param[ 'mobile_width' ] : '85',
  'option' => array(
    'min'         => '0',
    'step'        => '1',
    'placeholder' => '85',
  ),
);

$mobile_width_help = array(
  'text' => __( 'Set the width of the modal window for mobile devices', $this->text_domain ),
);

$mobile_width_par = array(
  'name'   => 'param[mobile_width_par]',
  'type'   => 'radio',
  'val'    => isset( $param[ 'mobile_width_par' ] ) ? $param[ 'mobile_width_par' ] : 'pr',
  'option' => array(
    'px' => __( 'px', $this->text_domain ),
    'pr' => __( '%', $this->text_domain ),
  ),
  'func'   => '',
  'sep'    => ' &nbsp',
);


