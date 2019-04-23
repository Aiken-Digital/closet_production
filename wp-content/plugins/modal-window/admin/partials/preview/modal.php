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



$content = do_shortcode( $param[ 'content' ] );



$modal = '';

$modal .= '<div id="wow-modal-overlay-' . $id . '" class="wow-modal-overlay">';
$modal .= '<div id="wow-modal-overclose-' . $id . '" class="wow-modal-overclose"></div>';
$modal .= '<div id="wow-modal-window-' . $id . '" class="wow-modal-window">';
$modal .= '<div id="wow-modal-close-' . $id . '" class="mw-close-btn topRight image"></div>';

if ( !empty( $param[ 'popup_title' ] ) ) {
  $modal .= '<div class="mw-title">' . $title . '</div>';
}

$modal .= $content;
$modal .= '</div></div>';
echo $modal;