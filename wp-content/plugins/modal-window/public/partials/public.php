<?php if ( !defined( 'ABSPATH' ) ) {
  exit;
}
/**
 * Public final
 *
 * @package     Wow_Pluign
 * @subpackage  Public
 * @copyright   Copyright (c) 2019, Dmytro Lobov
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */


$button_text = (!empty( $param[ 'umodal_button_text' ] )) ? $param[ 'umodal_button_text' ] : 'Feedback';

$content = do_shortcode( $param[ 'content' ] );



if ( !empty( $param[ 'include_overlay' ] ) || !isset( $param[ 'include_overlay' ] )) {
  $classoverlow = 'class="wow-modal-overlay"';
  $overclose = 'class="wow-modal-overclose"';
} else {
  $classoverlow = '';
  $overclose = '';
}

$modal = '';
if ( $param[ 'umodal_button' ] == 'yes' ) {

  $modal .= '<div class="wow-modal-botton-' . $val->id . ' ' . $param[ 'umodal_button_position' ] . '" id="wow-modal-id-' . $val->id . '">' . $button_text . '</div>';
}
$modal .= '<div id="wow-modal-overlay-' . $val->id . '" ' . $classoverlow . '>';
$modal .= '<div id="wow-modal-overclose-' . $val->id . '" ' . $overclose . '></div>';
$modal .= '<div id="wow-modal-window-' . $val->id . '" class="wow-modal-window">';
$modal .= '<div id="wow-modal-close-' . $val->id . '" class="mw-close-btn topRight image"></div>';

if ( !empty( $param[ 'popup_title' ] ) ) {
  $modal .= '<div class="mw-title">' . $val->title . '</div>';
}

$modal .= $content;
$modal .= '</div></div>';
echo $modal;
