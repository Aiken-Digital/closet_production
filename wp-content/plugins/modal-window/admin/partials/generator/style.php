/* ========= INFORMATION ============================
- document:  Wow Modal Windows Pro - The most powerful creator of popups & flyouts!
- author:    Wow-Company & Dmytro Lobov
- url:       https://wow-estore.com/item/wow-modal-windows-pro/
- version:   2.3
- email:     support@wow-company.com
==================================================== */
<?php
include('style_data.php');

// Close Button


  $close_css = '
			content: "\00d7";	
			text-align: center;
			width: ' . $btn_box_size . 'px;
			height: ' . $btn_box_size . 'px;
			line-height: ' . $btn_box_size . 'px;
			color: ' . $btn_color . ';			
			font-family: ' . $btn_font . ';
			font-size: ' . $btn_size . 'px;
			font-weight: ' . $btn_font_weight . ';
			font-style: ' . $btn_font_style . ';
			background: ' . $btn_background . ';	
			border-radius: ' . $btn_border_radius . ';
		';
  $close_hover_css = '
			color: ' . $btn_color_hover . ';
			background: ' . $btn_background_hover . ';
		';


$css = '';

  $css .= '
		#wow-modal-overlay-' . $id . ' {
			z-index: ' . $modal_zindex . '; 
			background-color: ' . $overlay_color . ';
		}
		#wow-modal-overclose-' . $id . ' {
			z-index: ' . $modal_zindex . ';		
		}		
		';

$css .= '
	#wow-modal-window-' . $id . '{
		width: ' . $modal_width . $modal_width_par . '; 
		padding: ' . $modal_padding . 'px; 
		border: ' . $border_width . 'px '. $border_style .' ' . $border_color . '; 
		z-index: ' . $modal_zindex . '; 
		position: ' . $modal_position . '; 
		' . $include_modal_top . '
		right: 0;
		left: 0;	
		border-radius:' . $border_radius . 'px;		
		height: ' . $modal_height . ';	
		background: ' . $bg_color . ';			
		font-family: ' . $content_font . ';
		font-size: ' . $content_size . 'px;	
		' . $box_shadow . '
	}
	
	.wow-modal-botton-' . $id . ' {
		' . $button_position . '		
		font-size: ' . $button_text_size . 'em;
		text-decoration: none;	
		float: none;
		text-shadow: none;
		cursor:pointer;
		z-index: 9999;	
	}
	';

// Close Button
$css .= '
	#wow-modal-close-' . $id . ' {
		' . $btn_loc . '
	}	
	';
$css .= '
	#wow-modal-close-' . $id . '.mw-close-btn.image:before {
		' . $close_css . '
	}	
	#wow-modal-close-' . $id . '.mw-close-btn.image:hover:before {
		' . $close_hover_css . '
	}	
	';

// Title
$css .= '
	#wow-modal-window-' . $id . ' .mw-title {
		font-family: ' . $title_font . ';
		font-size: ' . $title_size . 'px;
		font-weight: ' . $title_font_weight . ';
		font-style: ' . $title_font_style . ';
		line-height: ' . $title_line_height . 'px;
		text-align: ' . $title_align . ';
		color: ' . $title_color . ';	
	}	
	';


  $css .= '
		.wow-modal-botton-' . $id . ' {
			color: ' . $button_text_color . ';	
			border-radius: ' . $button_radius . 'px;
			padding: ' . $button_padding_top . 'px ' . $button_padding_left . 'px;
			line-height: ' . $button_padding_top . 'px;
			background: ' . $umodal_button_color . '; 
			}
		.wow-modal-botton-' . $id . ':hover {	
			background: ' . $umodal_button_hover . '; 
			color: ' . $button_text_hcolor . ';
		}		
		';


$css .= '
	
	@media only screen and (max-width: ' . $screen_size . 'px){
		#wow-modal-window-' . $val->id . ' {
				width:' . $mobile_width . $mobile_width_par . ';
		}
	}
		
	';
if ( !empty( $param[ 'include_mobile' ] ) ) {
  $css .= '
			@media only screen and (max-width: ' . $screen . 'px){
			.wow-modal-botton-' . $id . ' {
					display:none;
				}
			}
		';
}

if ( !empty( $param[ 'include_more_screen' ] ) ) {
  $css .= '
			@media only screen and (min-width: ' . $screen_more . 'px){
			.wow-modal-botton-' . $id . ' {
					display:none;
				}
			}
		';
}

$css = trim( preg_replace( '~\s+~s', ' ', $css ) );
echo $css;

?>
