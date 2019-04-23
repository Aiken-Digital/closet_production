<?php if ( ! defined( 'ABSPATH' ) ) {
  exit;
}
/**
 * Form settings
 *
 * @package     Wow_Pluign
 * @subpackage  Settings
 * @copyright   Copyright (c) 2019, Dmytro Lobov
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */

$include_form_name = array(
  'name'  => 'param[include_form_name]',
  'id'    => 'include_form_name',
  'class' => '',
  'type'  => 'checkbox',
  'val'   => isset( $param[ 'include_form_name' ] ) ? $param[ 'include_form_name' ] : 0,
 
);

$form_name = array (
	'name' => 'param[form_name]',
	'id'   => 'form_name',
	'type' => 'text',
	'val'  => isset( $param['form_name'] ) ? $param['form_name'] : 'Your Name',
);

$form_name_help = array (
  'text' =>  __('Enable Name field in the form and enter the placeholder for it.', $this->text_domain),
);

$include_form_email = array(
  'name'  => 'param[include_form_email]',
  'id'    => 'include_form_email',
  'class' => '',
  'type'  => 'checkbox',
  'val'   => isset( $param[ 'include_form_email' ] ) ? $param[ 'include_form_email' ] : 0,
 
);

$form_email = array (
  'name' => 'param[form_email]',
  'id'   => 'form_email',
  'type' => 'text',
  'val'  => isset( $param['form_email'] ) ? $param['form_email'] : 'Your Email',
);

$form_email_help = array (
  'text' =>  __('Enable Email field in the form and enter the placeholder for it.', $this->text_domain),
);

$include_form_text = array(
  'name'  => 'param[include_form_text]',
  'id'    => 'include_form_text',
  'class' => '',
  'type'  => 'checkbox',
  'val'   => isset( $param[ 'include_form_text' ] ) ? $param[ 'include_form_text' ] : 0,
 
);

$form_text = array (
  'name' => 'param[form_text]',
  'id'   => 'form_text',
  'type' => 'text',
  'val'  => isset( $param['form_text'] ) ? $param['form_text'] : 'Write a Comment',
);

$form_text_help = array (
  'text' =>  __('Enable Textarea field in the form and enter the placeholder for it.', $this->text_domain),
);

$form_button = array (
	'name' => 'param[form_button]',
	'id'   => 'form_button',
	'type' => 'text',
	'val'  => isset( $param['form_button'] ) ? $param['form_button'] : 'Send',
);

$form_button_help = array (
  'text' =>  __('Enter the text for Submit button.', $this->text_domain),
);

$form_width = array (
	'name' => 'param[form_width]',
	'id'   => 'form_width',	
	'type' => 'text',
	'val'  => isset( $param['form_width'] ) ? $param['form_width'] : '100%',
	'option' => array( 
		'placeholder' => __('100%',$this->text_domain),
		'class' => '',	
	),
	'func' => '',
	'sep'  => '',
);

// Width helper
$form_width_help = array (
  'title' => __('Specify form width. Can be:', $this->text_domain),
  'ul' => array (
    __('<strong>any integer value in px</strong> (for example: "400px" will set form width to 400px);', $this->text_domain),
    __('<strong>any integer value in %</strong> (for example: "80%" will set form width to 80% of the window width);', $this->text_domain),
    __('<strong>auto</strong> - the browser calculates the form width.', $this->text_domain),
  ),
);

$form_padding = array (
  'name' => 'param[form_padding]',
  'id'   => 'form_padding',
  'type' => 'text',
  'val'  => isset( $param['form_padding'] ) ? $param['form_padding'] : '10px',
  'option' => array(
    'placeholder' => __('10px',$this->text_domain),
    'class' => '',
  ),
  'func' => '',
  'sep'  => '',
);

// Form Padding helper
$form_padding_help = array (
  'title' => __('Specify form inner padding. Can be:', $this->text_domain),
  'ul' => array (
    __('any integer value in px (for example: "10px" will set form inner paddings to 10px)', $this->text_domain),
    __('if you enter 0, the form will have not paddings', $this->text_domain),
    __('when four values are specified, the paddings apply to the top, right, bottom, and left in that order (clockwise)', $this->text_domain),
  ),
);

$form_margin = array (
  'name' => 'param[form_margin]',
  'id'   => 'form_margin',
  'type' => 'text',
  'val'  => isset( $param['form_margin'] ) ? $param['form_margin'] : '0 auto',
  'option' => array(
    'placeholder' => __('0 auto',$this->text_domain),
    'class' => '',
  ),
  'func' => '',
  'sep'  => '',
);

// Form Padding helper
$form_margin_help = array (
  'title' => __('Specify form margin. Can be:', $this->text_domain),
  'ul' => array (
    __('any integer value in px (for example: "10px" will set form margins to 10px)', $this->text_domain),
    __('if you enter 0, the form will have not margins', $this->text_domain),
    __('when four values are specified, the margins apply to the top, right, bottom, and left in that order (clockwise)', $this->text_domain),
    __('0 auto - centers the form horizontally', $this->text_domain),
  ),
);

$form_border = array (
	'name' => 'param[form_border]',
	'id'   => 'form_border',	
	'type' => 'text',
	'val'  => isset( $param['form_border'] ) ? $param['form_border'] : '10px',	
	'option' => array( 
		'placeholder' => __('10px',$this->text_domain),	
	),
);

$form_radius = array (
	'name' => 'param[form_radius]',
	'id'   => 'form_radius',	
	'type' => 'text',
	'val'  => isset( $param['form_radius'] ) ? $param['form_radius'] : '0px',	
	'option' => array( 
		'placeholder' => __('0px',$this->text_domain),	
	),
);

$field_border = array (
	'name' => 'param[field_border]',
	'id'   => 'field_border',
	'type' => 'text',
	'val'  => isset( $param['field_border'] ) ? $param['field_border'] : '1px',
	'option' => array(
		'placeholder' => __('1px',$this->text_domain),
	),
);

$field_radius = array (
  'name' => 'param[field_radius]',
  'id'   => 'field_radius',
  'type' => 'text',
  'val'  => isset( $param['field_radius'] ) ? $param['field_radius'] : '0px',
  'option' => array(
    'placeholder' => __('0px',$this->text_domain),
  ),
);

$form_text_size = array (
  'name' => 'param[form_text_size]',
  'id'   => 'form_text_size',
  'type' => 'text',
  'val'  => isset( $param['form_text_size'] ) ? $param['form_text_size'] : '16px',
  'option' => array(
    'placeholder' => __('16px',$this->text_domain),
  ),
);

$form_button_size = array (
  'name' => 'param[form_button_size]',
  'id'   => 'form_button_size',
  'type' => 'text',
  'val'  => isset( $param['form_button_size'] ) ? $param['form_button_size'] : '16px',
  'option' => array(
    'placeholder' => __('16px',$this->text_domain),
  ),
);

$form_input_height = array (
  'name' => 'param[form_input_height]',
  'id'   => 'form_input_height',
  'type' => 'text',
  'val'  => isset( $param['form_input_height'] ) ? $param['form_input_height'] : '36px',
  'option' => array(
    'placeholder' => __('36px',$this->text_domain),
  ),
);

$form_textarea_height = array (
  'name' => 'param[form_textarea_height]',
  'id'   => 'form_textarea_height',
  'type' => 'text',
  'val'  => isset( $param['form_textarea_height'] ) ? $param['form_textarea_height'] : '72px',
  'option' => array(
    'placeholder' => __('72px',$this->text_domain),
  ),
);

$form_background = array(
  'name' => 'param[form_background]',
  'id'   => 'form_background',
  'type' => 'color',
  'val'  => isset( $param[ 'form_background' ] ) ? $param[ 'form_background' ] : '#ffffff',
  'sep'  => '',
);

$form_border_color = array(
  'name' => 'param[form_border_color]',
  'id'   => 'form_border_color',
  'type' => 'color',
  'val'  => isset( $param[ 'form_border_color' ] ) ? $param[ 'form_border_color' ] : '#ffffff',
  'sep'  => '',
);

$field_background = array(
  'name' => 'param[field_background]',
  'id'   => 'field_background',
  'type' => 'color',
  'val'  => isset( $param[ 'field_background' ] ) ? $param[ 'field_background' ] : '#ffffff',
  'sep'  => '',
);

$field_border_color = array(
  'name' => 'param[field_border_color]',
  'id'   => 'field_border_color',
  'type' => 'color',
  'val'  => isset( $param[ 'field_border_color' ] ) ? $param[ 'field_border_color' ] : '#383838',
  'sep'  => '',
);

$form_text_color = array(
  'name' => 'param[form_text_color]',
  'id'   => 'form_text_color',
  'type' => 'color',
  'val'  => isset( $param[ 'form_text_color' ] ) ? $param[ 'form_text_color' ] : '#383838',
  'sep'  => '',
);

$form_button_text_color = array(
  'name' => 'param[form_button_text_color]',
  'id'   => 'form_button_text_color',
  'type' => 'color',
  'val'  => isset( $param[ 'form_button_text_color' ] ) ? $param[ 'form_button_text_color' ] : '#ffffff',
  'sep'  => '',
);

$button_background_color = array(
  'name' => 'param[button_background_color]',
  'id'   => 'button_background_color',
  'type' => 'color',
  'val'  => isset( $param[ 'button_background_color' ] ) ? $param[ 'button_background_color' ] : '#e95645',
  'sep'  => '',
);

$button_hover_color = array(
  'name' => 'param[button_hover_color]',
  'id'   => 'button_hover_color',
  'type' => 'color',
  'val'  => isset( $param[ 'button_hover_color' ] ) ? $param[ 'button_hover_color' ] : '#d45041',
  'sep'  => '',
);

$mail_send_text = array (
	'name' => 'param[$mail_send_text]',
	'id'   => '$mail_send_text',
	'type' => 'text',
	'val'  => isset( $param['$mail_send_text'] ) ? $param['$mail_send_text'] : 'Thank you. We will contact you shortly.',
);

$mail_send_text_size = array(
  'name'   => 'param[mail_send_text_size]',
  'id'     => 'mail_send_text_size',
  'type'   => 'number',
  'val'    => isset( $param[ 'mail_send_text_size' ] ) ? $param[ 'mail_send_text_size' ] : '16',
  'option' => array(
    'min'         => '0',
    'step'        => '0.1',
    'placeholder' => '0',
  ),
);

$mail_send_text_color = array(
  'name' => 'param[mail_send_text_color]',
  'id'   => 'mail_send_text_color',
  'type' => 'color',
  'val'  => isset( $param[ 'mail_send_text_color' ] ) ? $param[ 'mail_send_text_color' ] : '#4fad35',
);

$mail_send_error_text = array (
	'name' => 'param[mail_send_error_text]',
	'id'   => 'mail_send_error_text',
	'type' => 'text',
	'val'  => isset( $param['mail_send_error_text'] ) ? $param['mail_send_error_text'] : 'Correct the fields, please',
);

$mail_send_error_size = array(
  'name'   => 'param[mail_send_error_size]',
  'id'     => 'mail_send_error_size',
  'type'   => 'number',
  'val'    => isset( $param[ 'mail_send_error_size' ] ) ? $param[ 'mail_send_error_size' ] : '16',
  'option' => array(
    'min'         => '0',
    'step'        => '0.1',
    'placeholder' => '0',
  ),
);

$mail_send_error_color = array(
  'name' => 'param[mail_send_error_color]',
  'id'   => 'mail_send_error_color',
  'type' => 'color',
  'val'  => isset( $param[ 'mail_send_error_color' ] ) ? $param[ 'mail_send_error_color' ] : '#4fad35',
);

$mail_send_timer = array(
  'name'   => 'param[mail_send_timer]',
  'id'     => 'mail_send_timer',
  'type'   => 'number',
  'val'    => isset( $param[ 'mail_send_timer' ] ) ? $param[ 'mail_send_timer' ] : '3',
  'option' => array(
    'min'         => '0',
    'step'        => '0.1',
    'placeholder' => '0',
  ),
);

$emsi = array(
  'name'  => 'param[emsi]',
  'id'    => 'emsi',
  'type'  => 'checkbox',
  'val'   => isset( $param[ 'emsi' ] ) ? $param[ 'emsi' ] : 0,
);

$send_to_admin = array(
  'name'  => 'param[send_to_admin]',
  'id'    => 'send_to_admin',
  'class' => '',
  'type'  => 'checkbox',
  'val'   => isset( $param[ 'send_to_admin' ] ) ? $param[ 'send_to_admin' ] : 0,
  'func'  => 'sendtoadmin();',
);

$mail_send_admin_mail = array (
	'name' => 'param[mail_send_admin_mail]',
	'id'   => 'mail_send_admin_mail',	
	'type' => 'text',
	'val'  => isset( $param['mail_send_admin_mail'] ) ? $param['mail_send_admin_mail'] : get_option( 'admin_email' ),	
	'option' => array( 
		'placeholder' => get_option( 'admin_email' ),	
		'class' => '',	
	),
);

$mail_send_mail_subject = array (
	'name' => 'param[mail_send_mail_subject]',
	'id'   => 'mail_send_mail_subject',	
	'type' => 'text',
	'val'  => isset( $param['mail_send_mail_subject'] ) ? $param['mail_send_mail_subject'] : 'Letter from the site',	
	'option' => array( 
		'placeholder' => __('Letter from the site',$this->text_domain),	
		'class' => '',	
	),
);

$admincontent = array(
  'name' => 'param[admincontent]',
  'id'   => 'admincontent',
  'type' => 'editor',
  'val'  => isset( $param[ 'admincontent' ] ) ? $param[ 'admincontent' ] : '',
);

$admincontent_help = array(
  'title' => __('Enter the text that is sent to email to admin after subscribing.', $this->text_domain),
);

$send_to_user = array(
  'name'  => 'param[send_to_user]',
  'id'    => 'send_to_user',
  'class' => '',
  'type'  => 'checkbox',
  'val'   => isset( $param[ 'send_to_user' ] ) ? $param[ 'send_to_user' ] : 0,
  'func'  => 'sendtouser();',
);

$mail_send_from_mail = array (
  'name' => 'param[mail_send_from_mail]',
  'id'   => 'mail_send_from_mail',
  'type' => 'text',
  'val'  => isset( $param['mail_send_from_mail'] ) ? $param['mail_send_from_mail'] : get_option( 'mail_send_from_mail' ),
  'option' => array(
    'placeholder' => get_option( 'admin_email' ),
    'class' => '',
  ),
);

$mail_send_user_subject = array (
  'name' => 'param[mail_send_user_subject]',
  'id'   => 'mail_send_user_subject',
  'type' => 'text',
  'val'  => isset( $param['mail_send_user_subject'] ) ? $param['mail_send_user_subject'] : 'Letter from the site',
  'option' => array(
    'placeholder' => __('Letter from the site',$this->text_domain),
    'class' => '',
  ),
);

$mail_send_from_text = array (
  'name' => 'param[mail_send_from_text]',
  'id'   => 'mail_send_from_text',
  'type' => 'text',
  'val'  => isset( $param['mail_send_from_text'] ) ? $param['mail_send_from_text'] : get_option( 'blogname' ),
  'option' => array(
    'placeholder' => get_option( 'blogname' ),
    'class' => '',
  ),
);

$usercontent = array(
  'name' => 'param[usercontent]',
  'id'   => 'usercontent',
  'type' => 'editor',
  'val'  => isset( $param[ 'usercontent' ] ) ? $param[ 'usercontent' ] : '',
);