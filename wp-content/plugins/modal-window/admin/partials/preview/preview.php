<?php if ( !defined( 'ABSPATH' ) ) exit;
/**
 * Preview
 *
 * @package     Wow_Plugin
 * @copyright   Copyright (c) 2018, Dmytro Lobov
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */

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
		border: ' . $border_width . 'px ' . $border_style . ' ' . $border_color . '; 
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
	#wow-modal-close-' . $id . '.mw-close-btn.' . $close_type . ':before {
		' . $close_css . '
	}	
	#wow-modal-close-' . $id . '.mw-close-btn.' . $close_type . ':hover:before {
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


$css = trim( preg_replace( '~\s+~s', ' ', $css ) );
echo '<style>' . $css . '</style>';
?>
  <style>
    .wow-modal-overlay {
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      position: fixed;
      cursor: default;
      display: none;
      width: 100%;
      height: 100%;
      overflow: auto;
    }

    .wow-modal-overclose {
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      cursor: default;
      width: 100%;
      height: 100%;
    }

    .wow-modal-window {
      margin: auto;
      display: none;
    }

    /* ========================
    Close buttons
    ======================== */
    .mw-close-btn {

    }

    .mw-close-btn.topLeft {
      top: 0;
      left: 0;
    }

    .mw-close-btn.topRight {
      top: 0;
      right: 0;
    }

    .mw-close-btn.bottomLeft {
      bottom: 0;
      left: 0;
    }

    .mw-close-btn.bottomRight {
      bottom: 0;
      right: 0;
    }

    .mw-close-btn {
      cursor: pointer;
      position: absolute;
      display: none;
    }

    .mw-close-btn,
    .mw-close-btn:before {
      transition: all 0.1s ease;
    }

    .mw-close-btn:before {
      white-space: nowrap;
      display: block;
      position: relative;
      transition: all 0.1s ease;
    }
    /* ========================
	Columns
======================== */

    .wow-col {
      display: flex;
      flex-wrap: wrap;
    }
    .wow-col-1, .wow-col-2, .wow-col-3, .wow-col-4, .wow-col-5, .wow-col-6, .wow-col-7, .wow-col-8, .wow-col-9, .wow-col-10, .wow-col-11, .wow-col-12 {
      -moz-box-sizing: border-box;
      box-sizing: border-box;
    }

    .wow-col-12 {
      width: 100%;
    }
    .wow-col-11 {
      width: 91.66666667%;
    }
    .wow-col-10 {
      width: 83.33333333%;
    }
    .wow-col-9 {
      width: 75%;
    }
    .wow-col-8 {
      width: 66.66666667%;
    }
    .wow-col-7 {
      width: 58.33333333%;
    }
    .wow-col-6 {
      width: 50%;
    }
    .wow-col-5 {
      width: 41.66666667%;
    }
    .wow-col-4 {
      width: 33.33333333%;
    }
    .wow-col-3 {
      width: 25%;
    }
    .wow-col-2 {
      width: 16.66666667%;
    }
    .wow-col-1 {
      width: 8.33333333%;
    }
  </style>

  <script>
    jQuery(document).ready(function ($) {
      $('.open-popup').click(function (event) {
        event.preventDefault();
        $('#wow-modal-overlay-<?php echo $id;?>').fadeIn(400, function () {
          $('#wow-modal-window-<?php echo $id;?>').fadeIn(400);
          $('html, body').css('overflow', 'hidden', 'important');
          $('#wow-modal-close-<?php echo $id;?>').toggle();
        });
      });
      $('#wow-modal-close-<?php echo $id;?>').click(function () {
        closeModalWindow();
      });

      $(window).bind('keydown', function (e) {
        if (e.keyCode == 27) {
          closeModalWindow();
        }
      })

      function closeModalWindow() {
        $('#wow-modal-window-<?php echo $id;?>').toggle(function () {
          $('#wow-modal-overlay-<?php echo $id;?>').fadeOut(400);
          $('html, body').css('overflow', '');
          $('#popup-preview-close').toggle();
          $('#wow-modal-close-<?php echo $id;?>').toggle();

        });
      }
    });
  </script>
<?php
include('modal.php');