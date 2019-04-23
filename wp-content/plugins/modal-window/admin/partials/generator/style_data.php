<?php
if ( !defined( 'ABSPATH' ) ) exit;
$id = $val->id;
$modal_zindex = !empty( $param[ 'modal_zindex' ] ) ? $param[ 'modal_zindex' ] : '999999';
$overlay_color = !empty( $param[ 'overlay_color' ] ) ? $param[ 'overlay_color' ] : 'rgba(0, 0, 0, 0.7)';

$modal_width = !empty( $param[ 'modal_width' ] ) ? $param[ 'modal_width' ] : '662';
$modal_width_par = ($param[ 'modal_width_par' ] == 'pr') ? '%' : 'px';
$modal_padding = !empty( $param[ 'modal_padding' ] ) ? $param[ 'modal_padding' ] : '10';
$border_width = empty( $param[ 'border_width' ] ) ? '0' : $param[ 'border_width' ];
$border_color = !empty( $param[ 'border_color' ] ) ? $param[ 'border_color' ] : '#000000';
$modal_position = empty( $param[ 'modal_position' ] ) ? 'fixed' : $param[ 'modal_position' ];
$include_modal_top = !empty( $param[ 'modal_top' ] ) ? 'top: ' . $param[ 'modal_top' ] . '%;' : 'top: 10%;';
$include_modal_bottom = !empty( $param[ 'include_modal_bottom' ] ) ? 'bottom: ' . $param[ 'modal_bottom' ] . '%;' : '';
$include_modal_left = !empty( $param[ 'include_modal_left' ] ) ? 'left: ' . $param[ 'modal_left' ] . '%;' : '';
$include_modal_right = !empty( $param[ 'include_modal_right' ] ) ? 'right: ' . $param[ 'modal_right' ] . '%;' : '';
$border_radius = empty( $param[ 'border_radius' ] ) ? '5' : $param[ 'border_radius' ];
$border_style = !empty( $param[ 'border_style' ] ) ? $param[ 'border_style' ] : 'solid';

if ( empty( $param[ 'modal_height' ] ) ) {
  $modal_height = 'auto';
} else {
  switch ( $param[ 'modal_height_par' ] ) {
    case 'pr':
      $modal_height = $param[ 'modal_height' ] . '%';
      break;
    case 'auto':
      $modal_height = 'auto';
      break;
    default:
      $modal_height = $param[ 'modal_height' ] . 'px';

  }
}
$bg_color = !empty( $param[ 'bg_color' ] ) ? $param[ 'bg_color' ] : '#ffffff';
$modal_background_img = !empty( $param[ 'modal_background_img' ] ) ? 'background-image: url(' . $param[ 'modal_background_img' ] . ');background-size:cover;' : '';

// Modal window shadows
$shadow = !empty( $param['shadow'] ) ? $param['shadow'] : 'none';
$shadow_h_offset = !empty( $param['shadow_h_offset'] ) ? $param['shadow_h_offset'] . 'px' : '0';
$shadow_v_offset = !empty( $param['shadow_v_offset'] ) ? $param['shadow_v_offset'] . 'px' : '0';
$shadow_blur = !empty( $param['shadow_blur'] ) ? $param['shadow_blur'] . 'px' : '0';
$shadow_spread = !empty( $param['shadow_spread'] ) ? $param['shadow_spread'] . 'px' : '0';
$shadow_color = !empty( $param['border_color'] ) ? $param['border_color'] : '#020202';
switch( $shadow ) {
  case 'none':
    $box_shadow = 'box-shadow: none;';
    break;
  case 'outset':
    $box_shadow = 'box-shadow: ' . $shadow_h_offset .' ' . $shadow_v_offset .' ' . $shadow_blur .' ' . $shadow_spread .' ' . $shadow_color .';';
    break;
  default:
    $box_shadow = 'box-shadow: inset ' . $shadow_h_offset .' ' . $shadow_v_offset .' ' . $shadow_blur .' ' . $shadow_spread .' ' . $shadow_color .';';
}

// Close Button Style

$close_type = 'image';
$close_location = !empty( $param['close_location'] ) ? $param['close_location'] : 'topRight';

$close_top_position = !empty( $param[ 'close_top_position' ] ) ? $param[ 'close_top_position' ] : '-15';
$close_right_position = !empty( $param[ 'close_right_position' ] ) ? $param[ 'close_right_position' ] : '-15';

$close_bottom_position = !empty( $param[ 'close_bottom_position' ] ) ? $param[ 'close_bottom_position' ] : '-10';
$close_left_position = !empty( $param[ 'close_left_position' ] ) ? $param[ 'close_left_position' ] : '0';

switch( $close_location ) {
  case 'topLeft':
    $btn_loc = 'top: ' . $close_top_position . 'px;';
    $btn_loc .= 'left: ' . $close_left_position . 'px;';
    break;
  case 'topRight':
    $btn_loc = 'top: ' . $close_top_position . 'px;';
    $btn_loc .= 'right: ' . $close_right_position . 'px;';
    break;
  case 'bottomLeft':
    $btn_loc = 'bottom: ' . $close_bottom_position . 'px;';
    $btn_loc .= 'left: ' . $close_left_position . 'px;';
    break;
  case 'bottomRight':
    $btn_loc = 'bottom: ' . $close_bottom_position . 'px;';
    $btn_loc .= 'right: ' . $close_right_position . 'px;';
    break;
  default:
    $btn_loc = '';
}

$btn_text = !empty( $param['close_content'] ) ? $param['close_content'] : 'Close';
$btn_text_padding = !empty( $param['close_padding'] ) ? $param['close_padding'] : '6px 12px';
$btn_box_size = !empty( $param['close_box_size'] ) ? $param['close_box_size'] : '32';
$btn_size = !empty( $param['close_size'] ) ? $param['close_size'] : '14';
$btn_font = !empty( $param['close_font'] ) ? $param['close_font'] : 'inherit';
$btn_font_weight = !empty( $param['close_weight'] ) ? $param['close_weight'] : 'normal';
$btn_font_style = !empty( $param['close_font_style'] ) ? $param['close_font_style'] : 'normal';
$btn_color = !empty( $param['close_content_color'] ) ? $param['close_content_color'] : '#fff';
$btn_color_hover = !empty( $param['close_content_color_hover'] ) ? $param['close_content_color_hover'] : '#000';
$btn_background = !empty( $param['close_background_color'] ) ? $param['close_background_color'] : '#000';
$btn_background_hover = !empty( $param['close_background_hover'] ) ? $param['close_background_hover'] : '#fff';
$btn_border_radius = !empty( $param['close_border_radius'] ) ? $param['close_border_radius'] . 'px' : '25px';


// Popup Title style
$title_font = !empty( $param['title_font'] ) ? $param['title_font'] : 'inherit';
$title_size = !empty( $param['title_size'] ) ? $param['title_size'] : '32';
$title_line_height = !empty( $param['title_line_height'] ) ? $param['title_line_height'] : '36';
$title_font_weight = !empty( $param['title_font_weight'] ) ? $param['title_font_weight'] : 'normal';
$title_font_style = !empty( $param['title_font_style'] ) ? $param['title_font_style'] : 'normal';
$title_align = !empty( $param['title_align'] ) ? $param['title_align'] : 'center';
$title_color = !empty( $param['title_color'] ) ? $param['title_color'] : '#383838';

// Content Style
$content_size = !empty( $param['content_size'] ) ? $param['content_size'] : '16';
$content_font = !empty( $param['content_font'] ) ? $param['content_font'] : 'inherit';


$margin = !empty( $param[ 'button_margin' ] ) ? $param[ 'button_margin' ] : '-4';
$position = !empty( $param[ 'button_position' ] ) ? $param[ 'button_position' ] : '50';

switch ( $param[ 'umodal_button_position' ] ) {
  case 'wow_modal_button_right':
    $button_position = 'top:' . $position . '%; right:' . $margin . 'px;';
    break;
  case 'wow_modal_button_left':
    $button_position = 'top:' . $position . '%; left:' . $margin . 'px;';
    break;
  case 'wow_modal_button_top':
    $button_position = 'left:' . $position . '%; top:' . $margin . 'px;';
    break;
  case 'wow_modal_button_bottom':
    $button_position = 'left:' . $position . '%; bottom:' . $margin . 'px;';
    break;
}

$button_text_size = !empty( $param[ 'button_text_size' ] ) ? $param[ 'button_text_size' ] : '1.2';
$umodal_button_color = !empty( $param[ 'umodal_button_color' ] ) ? $param[ 'umodal_button_color' ] : '#383838';
$button_text_color = !empty( $param[ 'button_text_color' ] ) ? $param[ 'button_text_color' ] : '#ffffff';
$form_button_text_color = !empty( $param[ 'form_button_text_color' ] ) ? $param[ 'form_button_text_color' ] : '#ffffff';
$umodal_button_hover = !empty( $param[ 'umodal_button_hover' ] ) ? $param[ 'umodal_button_hover' ] : '#797979';
$button_text_hcolor = !empty( $param[ 'button_text_hcolor' ] ) ? $param[ 'button_text_hcolor' ] : '#ffffff';
$button_radius = !empty( $param[ 'button_radius' ] ) ? $param[ 'button_radius' ] : '4';
$button_padding_top = !empty( $param[ 'button_padding_top' ] ) ? $param[ 'button_padding_top' ] : '14';
$button_padding_left = !empty( $param[ 'button_padding_left' ] ) ? $param[ 'button_padding_left' ] : '14';
$button_animate_duration = !empty( $param[ 'button_animate_duration' ] ) ? $param[ 'button_animate_duration' ] : '1';
$screen_size = !empty( $param[ 'screen_size' ] ) ? $param[ 'screen_size' ] : '1024';
$mobile_width = !empty( $param[ 'mobile_width' ] ) ? $param[ 'mobile_width' ] : '85';
$mobile_width_par = ($param[ 'mobile_width_par' ] == 'pr') ? '%' : 'px';

$screen = !empty( $param[ 'screen' ] ) ? $param[ 'screen' ] : '480';
$screen_more = !empty( $param[ 'screen_more' ] ) ? $param[ 'screen_more' ] : '1400';




	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
