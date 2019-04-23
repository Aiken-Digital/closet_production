<?php if ( ! defined( 'ABSPATH' ) ) {
  exit;
}
/**
 * Close button settings
 *
 * @package     Wow_Pluign
 * @subpackage  Settings
 * @copyright   Copyright (c) 2018, Dmytro Lobov
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */

$close_button_remove = array(
  'name'  => 'param[close_button_remove]',
  'id'    => 'close_button_remove',
  'class' => '',
  'type'  => 'checkbox',
  'val'   => isset( $param[ 'close_button_remove' ] ) ? $param[ 'close_button_remove' ] : 0,
);

// Remove Close Button helper
$close_button_remove_help = array (
  'text' => __('Remove and don&rsquo;t show the popup close button.', $this->text_domain),
);

$close_button_overlay = array(
  'name'  => 'param[close_button_overlay]',
  'id'    => 'close_button_overlay',
  'class' => '',
  'type'  => 'checkbox',
  'val'   => isset( $param[ 'close_button_overlay' ] ) ? $param[ 'close_button_overlay' ] : 0,
  'func'  => '',
  'sep'   => '',
);

//  Close popup when click overlay helper
$close_button_overlay_help = array (
  'text' => __('Specify if overlay can close the modal or not.', $this->text_domain),
);

$close_button_esc = array(
  'name'  => 'param[close_button_esc]',
  'id'    => 'close_button_esc',
  'class' => '',
  'type'  => 'checkbox',
  'val'   => isset( $param[ 'close_button_esc' ] ) ? $param[ 'close_button_esc' ] : 0,
  'func'  => '',
  'sep'   => '',
);

// Close popup on ESC key press helper
$close_button_esc_help = array (
  'text' => __('Enabled the ESC key to close the popup.', $this->text_domain),
);

$close_delay = array(
  'name'   => 'param[close_delay]',
  'id'     => 'close_delay',
  'type'   => 'number',
  'val'    => isset( $param[ 'close_delay' ] ) ? $param[ 'close_delay' ] : '0',
  'option' => array(
    'min'         => '0',
    'step'        => '0.1',
    'placeholder' => '0',
    'readonly' => 'readonly',
  ),
);

// Close Button Delay helper
$close_delay_help = array (
  'text' => __('Delay time in seconds for showing popup close button.', $this->text_domain),
);

$modal_auto_close = array(
  'name'  => 'param[modal_auto_close]',
  'id'    => 'modal_auto_close',
  'type'  => 'checkbox',
  'val'   => isset( $param[ 'modal_auto_close' ] ) ? $param[ 'modal_auto_close' ] : 0,
  'func'  => 'autoClose()',
  'sep'   => '',
);

// Enable Auto helper
$modal_auto_close_help = array (
  'text' =>  __('Set the time in seconds during which you want the modal window to be open.', $this->text_domain),
);

$auto_close_delay = array(
  'name'   => 'param[auto_close_delay]',
  'type'   => 'number',
  'class'  => 'modal_auto_close',
  'val'    => isset( $param[ 'auto_close_delay' ] ) ? $param[ 'auto_close_delay' ] : '',
  'option' => array(
    'min'         => '0',
    'step'        => '0.1',
    'placeholder' => '0',
  ),
);

