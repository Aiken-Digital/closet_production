<?php
/**
 * Form
 *
 * @package     Wow_Pluign
 * @copyright   Copyright (c) 2019, Dmytro Lobov
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */
if ( !defined( 'ABSPATH' ) ) {
  exit;
}
include_once('settings/form.php');
?>

<div class="container">

  <div class="element">
    <h4 style="color:red"><?php _e('Notice!', $this->text_domain); ?></h4>
    <?php _e( 'For insert form into modal window content use tag <b>{form}</b>. 
Simple insert <b>{form}</b> into popup content', $this->text_domain ); ?>
  </div>
</div>

<fieldset>
  <legend><?php _e( 'Fields', $this->text_domain ); ?></legend>

  <div class="container">

    <div class="element ">
      <input type="checkbox" disabled>
      <?php _e( 'Name', $this->text_domain ); ?>
      <?php echo self::tooltip( $form_name_help ); ?>
      <?php echo self::pro(); ?><br/>
      <input type="text" value="Your Name" disabled>
    </div>

    <div class="element ">
      <input type="checkbox" disabled>
      <?php _e( 'Email', $this->text_domain ); ?>
      <?php echo self::tooltip( $form_email_help ); ?>
      <?php echo self::pro(); ?><br/>
      <input type="text" value="Your Email" disabled>
    </div>

    <div class="element ">
      <input type="checkbox" disabled>
      <?php _e( 'Textarea', $this->text_domain ); ?>
      <?php echo self::tooltip( $form_text_help ); ?>
      <?php echo self::pro(); ?><br/>
      <input type="text" value="Write a Comment" disabled>
    </div>

  </div>

  <div class="container">
    <div class="element ">
      <?php _e( "Button's text", $this->text_domain ); ?>
      <?php echo self::pro(); ?><br/>
      <input type="text" value="Send" disabled>
    </div>
    <div class="element"></div>
    <div class="element"></div>
  </div>

</fieldset>

<fieldset>
  <legend><?php _e( 'Style', $this->text_domain ); ?></legend>

  <div class="container">
    <div class="element ">
      <?php _e( "Width", $this->text_domain ); ?>
      <?php echo self::tooltip( $form_width_help ); ?>
      <?php echo self::pro(); ?><br/>
      <input type="text" value="100%" disabled>
    </div>
    <div class="element ">
      <?php _e( "Padding", $this->text_domain ); ?>
      <?php echo self::tooltip( $form_padding_help ); ?>
      <?php echo self::pro(); ?><br/>
      <input type="text" value="10px" disabled>
    </div>

    <div class="element ">
      <?php _e( "Margin", $this->text_domain ); ?>
      <?php echo self::tooltip( $form_margin_help ); ?>
      <?php echo self::pro(); ?><br/>
      <input type="text" value="0 auto" disabled>
    </div>

  </div>

  <div class="container">

    <div class="element ">
      <?php _e( "Form border", $this->text_domain ); ?>
      <br/>
      <input type="text" value="10px" disabled>
    </div>

    <div class="element ">
      <?php _e( "Form border radius", $this->text_domain ); ?>
      <?php echo self::pro(); ?><br/>
      <input type="text" value="0px" disabled>
    </div>
    <div class="element ">
      <?php _e( "Field border", $this->text_domain ); ?>
      <?php echo self::pro(); ?><br/>
      <input type="text" value="1px" disabled>
    </div>

  </div>

  <div class="container">

    <div class="element ">
      <?php _e( "Field border radius", $this->text_domain ); ?>
      <?php echo self::pro(); ?><br/>
      <input type="text" value="0px" disabled>
    </div>

    <div class="element ">
      <?php _e( "Text size", $this->text_domain ); ?>
      <?php echo self::pro(); ?><br/>
      <input type="text" value="16px" disabled>
    </div>
    <div class="element ">
      <?php _e( "Button text size", $this->text_domain ); ?>
      <?php echo self::pro(); ?><br/>
      <input type="text" value="16px" disabled>
    </div>

  </div>

  <div class="container">
    <div class="element ">
      <?php _e( "Input height", $this->text_domain ); ?>
      <?php echo self::pro(); ?><br/>
      <input type="text" value="36px" disabled>
    </div>

    <div class="element ">
      <?php _e( "Textarea height", $this->text_domain ); ?>
      <?php echo self::pro(); ?><br/>
      <input type="text" value="72px" disabled>
    </div>
    <div class="element ">

    </div>

  </div>

   <div class="container">
    <div class="element ">
      <?php _e( "Form background", $this->text_domain ); ?>
      <?php echo self::pro(); ?><br/>
      <?php echo self::option( $form_background ); ?>
    </div>
    <div class="element ">
      <?php _e( "Form border color", $this->text_domain ); ?>
      <?php echo self::pro(); ?><br/>
      <?php echo self::option( $form_border_color ); ?>
    </div>
    <div class="element ">
      <?php _e( "Field background", $this->text_domain ); ?>
      <?php echo self::pro(); ?><br/>
      <?php echo self::option( $field_background ); ?>
    </div>
  </div>

  <div class="container">
    <div class="element ">
      <?php _e( "Field border color", $this->text_domain ); ?>
      <?php echo self::pro(); ?><br/>
      <?php echo self::option( $field_border_color ); ?>
    </div>
    <div class="element ">
      <?php _e( "Text color", $this->text_domain ); ?>
      <?php echo self::pro(); ?><br/>
      <?php echo self::option( $form_text_color ); ?>
    </div>
    <div class="element ">
      <?php _e( "Button text color", $this->text_domain ); ?>
      <?php echo self::pro(); ?><br/>
      <?php echo self::option( $form_button_text_color ); ?>
    </div>
  </div>

  <div class="container">
    <div class="element ">
      <?php _e( "Button background", $this->text_domain ); ?>
      <?php echo self::pro(); ?><br/>
      <?php echo self::option( $button_background_color ); ?>
    </div>
    <div class="element ">
      <?php _e( "Button hover color", $this->text_domain ); ?>
      <?php echo self::pro(); ?><br/>
      <?php echo self::option( $button_hover_color ); ?>
    </div>
    <div class="element ">
    </div>
  </div>

</fieldset>

<fieldset>
  <legend><?php _e( 'Email settings', $this->text_domain ); ?></legend>

  <div class="container">
    <div class="element ">
      <?php _e( "Confirmation text", $this->text_domain ); ?>
      <?php echo self::pro(); ?><br/>
      <input type="text" value="Thank you. We will contact you shortly." disabled>
    </div>
    <div class="element ">
      <?php _e( "Confirmation text size (px)", $this->text_domain ); ?>
      <?php echo self::pro(); ?><br/>
      <input type="text" value="16" disabled>
    </div>
    <div class="element ">
      <?php _e( "Confirmation text color", $this->text_domain ); ?>
      <?php echo self::pro(); ?><br/>
      <?php echo self::option( $mail_send_text_color ); ?>
    </div>
  </div>

  <div class="container">
    <div class="element ">
      <?php _e( "Error text", $this->text_domain ); ?>
      <?php echo self::pro(); ?><br/>
      <input type="text" value="Correct the fields, please" disabled>
    </div>
    <div class="element ">
      <?php _e( "Error text size (px)", $this->text_domain ); ?>
      <?php echo self::pro(); ?><br/>
      <input type="text" value="16" disabled>
    </div>
    <div class="element ">
      <?php _e( "Error text color", $this->text_domain ); ?>
      <?php echo self::pro(); ?><br/>
      <?php echo self::option( $mail_send_error_color ); ?>
    </div>
  </div>

  <div class="container">
    <div class="element ">
      <?php _e( "Close window after sending (sec)", $this->text_domain ); ?>
      <?php echo self::pro(); ?><br/>
      <input type="text" value="3" disabled>
    </div>
    <div class="element ">

    </div>
    <div class="element ">

    </div>
  </div>
</fieldset>


<fieldset>
  <legend><?php _e( 'Email to Admin', $this->text_domain ); ?></legend>

  <div class="container">
    <div class="element ">
      <input type="checkbox" disabled>
      <?php _e( "Send mail to admin", $this->text_domain ); ?>
    </div>
    <div class="element ">
    </div>
    <div class="element ">
    </div>
  </div>

</fieldset>


<fieldset>
  <legend><?php _e( 'Email to User', $this->text_domain ); ?></legend>

  <div class="container">
    <div class="element ">
      <input type="checkbox" disabled>
      <?php _e( "Send mail to user", $this->text_domain ); ?>
    </div>
    <div class="element ">
    </div>
    <div class="element ">
    </div>
  </div>

</fieldset>