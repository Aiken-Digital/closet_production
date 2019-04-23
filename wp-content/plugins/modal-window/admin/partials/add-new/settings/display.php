<?php if ( ! defined( 'ABSPATH' ) ) {
  exit;
}
/**
 * Modal Window settings
 *
 * @package     Wow_Pluign
 * @subpackage  Settings
 * @copyright   Copyright (c) 2018, Dmytro Lobov
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */


$modalAction = isset($param['modal_show']) ? $param['modal_show'] : 'load';
if ($modalAction == 'hoverid' || $modalAction == 'hoveranchor'){
  $modalAction = 'hover';
}

// Popup open trigger
$modal_show  = array(
  'id'   => 'triggers',
  'name' => 'param[modal_show]',
  'type' => 'select',
  'val' => $modalAction,
  'option' => array(
    'click'        => __('Click', $this->text_domain),
    'load'         => __('Auto', $this->text_domain),
    'hover'        => __('Hover', $this->text_domain),
    'close'        => __('Exit', $this->text_domain),
    'scroll'       => __('Scrolled', $this->text_domain),
  ),
  'func' => 'triggers',
);


// Trigger helper
$modal_show_help = array (
  'title' => __('Triggers cause a popup to open:', $this->text_domain),
  'ul' => array (
    __('<strong>Click</strong> - if you wish to activate the popup manually on element click;', $this->text_domain),
    __('<strong>Auto</strong> - popup will activate when the page loads;', $this->text_domain),
    __('<strong>Hover</strong> - if you wish to activate the popup manually on element hover;', $this->text_domain),
    __('<strong>Exit</strong> - popup will activate on exiting the page at the top of the opened window;', $this->text_domain),
    __('<strong>Scrolled</strong> - popup will activate on scroll;', $this->text_domain),
    __('<strong>Right Click</strong> - if you wish to activate the popup when user click on right button of the mouse;', $this->text_domain),
    __('<strong>Selected Text</strong> - if you wish to activate the popup when user select the text on the page.', $this->text_domain),
  ),
);

// Delay for open popup
	$modal_timer = array(
    'name' => 'param[modal_timer]',
    'type' => 'number',
    'val' => isset( $param['modal_timer'] ) ? $param['modal_timer'] : 0,
    'option' => array (
      'min' => '0',
      'step' => '0.1',
      'placeholder' => '0',
    ),
  );

	// Delay helper
	$modal_timer_help = array (
    'text' => __('Delay time in seconds for opening popup.', $this->text_domain),
  );

// Distance for scrolling ( trigger Scrolled)
$reach_window  = array(
  'id'   => 'reach_window',
  'name' => 'param[reach_window]',
  'type' => 'number',
  'val' => isset( $param['reach_window'] ) ? $param['reach_window'] : 50,
  'option' => array (
    'min' => '0',
    'step' => '0.1',
    'placeholder' => '0',
  ),
);
// Distance helper
$reach_window_help = array (
  'title' => __('Distance in px from the top of window for scrolled popup type:', $this->text_domain),
  'ul' => array (
    __('<strong>any integer value</strong> (for example: 50 = 50% from the top of page).', $this->text_domain),
  ),
);


	$use_cookies = array(
		'name'   => 'param[use_cookies]',
		'id'     => 'use_cookies',
		'class'  => '',
		'type'   => 'select',
		'val'    => isset( $param['use_cookies'] ) ? $param['use_cookies'] : 'no',
		'option' => array(
			'no'  => __( 'no', $this->text_domain ),
			'yes' => __( 'yes', $this->text_domain ),
		),
		'func'   => '',
	);

// Cookie helper
$use_cookies_help = array (
  'text' => __('Defines if the popup will set a cookie and hide it self for a period of time from the user.  Set the cookie in days.', $this->text_domain),
);

$modal_cookies = array(
  'name'   => 'param[modal_cookies]',
  'id'     => 'modal_cookies',
  'type'   => 'number',
  'val'    => isset( $param[ 'modal_cookies' ] ) ? $param[ 'modal_cookies' ] : '0',
  'option' => array(
    'min'         => '0',
    'step'        => '0.1',
    'placeholder' => '0',
  ),
  'func'   => '',
  'sep'    => '',
);


$speed_window = array(
  'name'   => 'param[speed_window]',
  'id'     => 'speed_window',
  'type'   => 'number',
  'val'    => isset( $param[ 'speed_window' ] ) ? $param[ 'speed_window' ] : '400',
  'option' => array(
    'min'         => '0',
    'step'        => '0.1',
    'placeholder' => '400',
    'readonly' => 'readonly',
  ),
);

$speed_window_out = array(
  'name'   => 'param[speed_window_out]',
  'id'     => 'speed_window_out',
  'type'   => 'number',
  'val'    => isset( $param[ 'speed_window_out' ] ) ? $param[ 'speed_window_out' ] : '400',
  'option' => array(
    'min'         => '0',
    'step'        => '0.1',
    'placeholder' => '400',
    'readonly' => 'readonly',
  ),
);

// Popup Animation Speed helper
$speed_window_help = array (
  'text' =>  __('Specify popup animation effect speed in milliseconds.', $this->text_domain),
);

$animations = array(
  'no'                         => __( 'no', $this->text_domain ),

);

$window_animate = array(
	'name'   => 'param[window_animate]',
	'type'   => 'select',
	'val'    => isset( $param['window_animate'] ) ? $param['window_animate'] : 'no',
	'option' => $animations,
  'readonly' => 'readonly',
);

// Popup Animate In helper
$window_animate_help = array (
  'text' => __('Specify modal window transition open effect.', $this->text_domain),
);

$window_animate_out = array(
  'name'   => 'param[window_animate_out]',
  'type'   => 'select',
  'val'    => isset( $param['window_animate_out'] ) ? $param['window_animate_out'] : 'no',
  'option' => $animations,
  'readonly' => 'readonly',
);

// Popup Animate Out helper
$window_animate_out_help = array (
  'text' =>  __('Specify modal window transition close effect.', $this->text_domain),
);

$video_support = array(
	'name'   => 'param[video_support]',
	'type'   => 'radio',
	'val'    => isset( $param['video_support'] ) ? $param['video_support'] : '1',
	'option' => array(
		'1' => __( 'no', $this->text_domain ),
		'2' => __( 'yes', $this->text_domain ),
	),
  'func' => 'videosupport();',
  'sep'  => '<br />',
  'readonly' => 'readonly',
);

// Youtube Video support helper
$video_support_help = array (
  'text' =>  __('If enable checkbox, the modal will support Youtube video auto play and video stop on closing the modal.', $this->text_domain),
);

$video_autoplay = array(
  'name'   => 'param[video_autoplay]',
  'type'   => 'radio',
  'val'    => isset( $param['video_autoplay'] ) ? $param['video_autoplay'] : 'no',
  'option' => array(
    '1' => __( 'no', $this->text_domain ),
    '2' => __( 'yes', $this->text_domain ),
  ),
  'sep'  => '<br />',
);

// Youtube Video Autoplay helper
$video_autoplay_help = array (
  'text' =>  __('If enable, the video will autoplay on modal opening.', $this->text_domain),
);

$video_close = array(
  'name'   => 'param[video_close]',
  'type'   => 'radio',
  'val'    => isset( $param['video_close'] ) ? $param['video_close'] : 'no',
  'option' => array(
    '1' => __( 'no', $this->text_domain ),
    '2' => __( 'yes', $this->text_domain ),
  ),
  'sep'  => '<br />',
);

// Youtube Video Close helper
$video_close_help = array (
  'text' =>  __('If enable, the video will stop playing on modal closing.', $this->text_domain),
);