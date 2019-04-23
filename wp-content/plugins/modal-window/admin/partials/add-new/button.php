<?php
/**
 * Float button
 *
 * @package     Wow_Pluign
 * @copyright   Copyright (c) 2018, Dmytro Lobov
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */
if ( !defined( 'ABSPATH' ) ) {
  exit;
}
include_once('settings/button.php');
?>

<div class="container">

  <div class="element">
    <?php _e( 'Show button', $this->text_domain ); ?><br/>
    <?php echo self::option( $umodal_button ); ?>
  </div>

  <div class="element">
    <span class="showbutton">
      <?php _e( 'Appearance', $this->text_domain ); ?>
      <?php echo self::tooltip( $button_type_help ); ?>
      <?php echo self::pro(); ?>
      <br/>
      <?php echo self::option( $button_type ); ?>
    </span>
  </div>

  <div class="element buttontype_text">
     <span class="showbutton">
    <?php _e( 'Text', $this->text_domain ); ?>
       <?php echo self::tooltip( $umodal_button_text_help ); ?><br/>
    <?php echo self::option( $umodal_button_text ); ?>
     </span>
  </div>
</div>


<fieldset class="showbutton">
  <legend><?php _e( 'Location', $this->text_domain ); ?></legend>

  <div class="container">

    <div class="element">
      <?php _e( 'Location', $this->text_domain ); ?>
      <?php echo self::tooltip( $umodal_button_position_help ); ?>
      <?php echo self::pro(); ?><br/>
      <?php echo self::option( $umodal_button_position ); ?>
    </div>

    <div class="element">
      <span class="button_top"> <?php _e( 'Top position', $this->text_domain ); ?>(%):</span>
      <span class="button_left"> <?php _e( 'Left position', $this->text_domain ); ?>(%):</span>
      <br/>
      <?php echo self::option( $button_position ); ?>
    </div>

    <div class="element">
      <span class="button_margin_top"> <?php _e( 'Margin-top', $this->text_domain ); ?>(px):</span>
      <span class="button_margin_right"> <?php _e( 'Margin-right', $this->text_domain ); ?>(px):</span>
      <span class="button_margin_bottom"> <?php _e( 'Margin-bottom', $this->text_domain ); ?>(px):</span>
      <span class="button_margin_left"> <?php _e( 'Margin-left', $this->text_domain ); ?>(px):</span>
      <br/>
      <?php echo self::option( $button_margin ); ?>
    </div>

  </div>
</fieldset>

<fieldset class="showbutton">
  <legend><?php _e( 'Animation', $this->text_domain ); ?></legend>

  <div class="container">

    <div class="element">
      <?php _e( 'Type', $this->text_domain ); ?>
      <?php echo self::pro(); ?><br/>
      <?php echo self::option( $button_animate ); ?>
    </div>

    <div class="element">
      <?php _e( 'Duration (sec)', $this->text_domain ); ?>
      <?php echo self::pro(); ?><br/>
      <?php echo self::option( $button_animate_duration ); ?>
    </div>

    <div class="element">
      <?php _e( 'Time (sec)', $this->text_domain ); ?>
      <?php echo self::pro(); ?><br/>
      <?php echo self::option( $button_animate_time ); ?>
    </div>
  </div>

  <div class="container">

    <div class="element">
      <?php _e( 'Pause (sec)', $this->text_domain ); ?>
      <?php echo self::pro(); ?><br/>
      <?php echo self::option( $button_animate_pause ); ?>
    </div>

    <div class="element">

    </div>

    <div class="element"></div>
  </div>
</fieldset>

<fieldset class="showbutton">
  <legend><?php _e( 'Style', $this->text_domain ); ?></legend>

  <div class="container">

    <div class="element">
      <?php _e( "Text size", $this->text_domain ); ?>
      <?php echo self::tooltip( $button_text_size_help ); ?><br/>
      <?php echo self::option( $button_text_size ); ?>
    </div>

    <div class="element buttontype_icon_only">
      <?php _e( 'Padding', $this->text_domain ); ?>
      <?php echo self::tooltip( $button_padding_help ); ?><br/>
      <?php echo self::option( $button_padding ); ?>
    </div>

    <div class="element buttontype_icon_only">
      <?php _e( 'Radius', $this->text_domain ); ?>
      <?php echo self::tooltip( $button_radius_help ); ?><br/>
      <?php echo self::option( $button_radius ); ?>
    </div>

  </div>

  <div class="container">

    <div class="element">
      <?php _e( "Text color", $this->text_domain ); ?>
      <?php echo self::pro(); ?><br/>
      <img src="<?php echo $this->plugin_url; ?>assets/img/white.jpg">
    </div>

    <div class="element">
      <?php _e( 'Text hover color', $this->text_domain ); ?>
      <?php echo self::pro(); ?><br/>
      <img src="<?php echo $this->plugin_url; ?>assets/img/white.jpg">
    </div>

    <div class="element">
      <?php _e( 'Background', $this->text_domain ); ?>
      <?php echo self::pro(); ?><br/>
      <img src="<?php echo $this->plugin_url; ?>assets/img/black.jpg">
    </div>

  </div>

  <div class="container">

    <div class="element">
      <?php _e( "Hover Background", $this->text_domain ); ?>
      <?php echo self::pro(); ?><br/>
      <img src="<?php echo $this->plugin_url; ?>assets/img/black.jpg">
    </div>

    <div class="element">
    </div>

    <div class="element">
    </div>

  </div>

</fieldset>