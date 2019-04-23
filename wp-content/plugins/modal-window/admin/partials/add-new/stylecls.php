<?php
/**
 * Close button Style
 *
 * @package     Wow_Pluign
 * @copyright   Copyright (c) 2018, Dmytro Lobov
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */
if ( !defined( 'ABSPATH' ) ) {
  exit;
}
include_once('settings/stylecls.php');

?>

<div class="container">

  <div class="element">
    <?php _e( 'Close Button type', $this->text_domain ); ?>
    <?php echo self::pro(); ?><br/>
    <?php echo self::option( $close_type ); ?>
  </div>
  <div class="element"></div>
  <div class="element"></div>
</div>

<fieldset>
  <legend>
    <?php _e( 'Location', $this->text_domain ); ?>
  </legend>

  <div class="container">

    <div class="element">
      <label><?php _e( 'Location', $this->text_domain ); ?></label>
      <?php echo self::tooltip( $close_location_help ); ?>
      <?php echo self::pro(); ?>
      <br/>
      <?php echo self::option( $close_location ); ?>
    </div>
    <div class="element close-top-bottom">
      <div id="close-top">
        <label><?php _e( 'Top', $this->text_domain ); ?></label>
        <?php echo self::tooltip( $close_top_position_help ); ?>
        <?php echo self::pro(); ?><br/>
        <?php echo self::option( $close_top_position ); ?>
      </div>
      <div id="close-bottom">
        <label><?php _e( 'Bottom', $this->text_domain ); ?></label>
        <?php echo self::tooltip( $close_bottom_position_help ); ?>
        <?php echo self::pro(); ?><br/>
        <?php echo self::option( $close_bottom_position ); ?>
      </div>
    </div>
    <div class="element close-left-right">
      <div id="close-left">
        <label><?php _e( 'Left', $this->text_domain ); ?></label>
        <?php echo self::tooltip( $close_left_position_help ); ?>
        <?php echo self::pro(); ?><br/>
        <?php echo self::option( $close_left_position ); ?>
      </div>
      <div id="close-right">
        <label><?php _e( 'Right', $this->text_domain ); ?></label>
        <?php echo self::tooltip( $close_right_position_help ); ?>
        <?php echo self::pro(); ?><br/>
        <?php echo self::option( $close_right_position ); ?>
      </div>
    </div>

  </div>
</fieldset>

<div class="container">

  <div class="element btn-text">

  </div>
  <div class="element btn-text">

  </div>
  <div class="element btn-icon">
    <?php _e( 'Box Size', $this->text_domain ); ?>
    <?php echo self::tooltip( $close_box_size_help ); ?>
    <?php echo self::pro(); ?><br/>
    <?php echo self::option( $close_box_size ); ?>
  </div>

</div>

<div class="container">

  <div class="element">
    <?php _e( 'Font Size', $this->text_domain ); ?>
    <?php echo self::tooltip( $close_size_help ); ?>
    <?php echo self::pro(); ?><br/>
    <?php echo self::option( $close_size ); ?>
  </div>

  <div class="element">
    <?php _e( 'Font Family', $this->text_domain ); ?>
    <?php echo self::pro(); ?><br/>
    <?php echo self::option( $close_font ); ?>
  </div>

  <div class="element">
    <?php _e( 'Font Weight', $this->text_domain ); ?>
    <?php echo self::pro(); ?><br/>
    <?php echo self::option( $close_weight ); ?>
  </div>

</div>

<div class="container">

  <div class="element">
    <?php _e( 'Font Style', $this->text_domain ); ?>
    <?php echo self::pro(); ?><br/>
    <?php echo self::option( $close_font_style ); ?>
  </div>

  <div class="element">
    <?php _e( 'Radius', $this->text_domain ); ?>
    <?php echo self::pro(); ?><br/>
    <?php echo self::option( $close_border_radius ); ?>
  </div>

  <div class="element">
  </div>

</div>

<div class="container">

  <div class="element">
    <?php _e( 'Color', $this->text_domain ); ?>
    <?php echo self::tooltip( $close_content_color_help ); ?>
    <?php echo self::pro(); ?><br/>
    <img src="<?php echo $this->plugin_url; ?>assets/img/white.jpg">
  </div>

  <div class="element">
    <label><?php _e( 'Hover Color', $this->text_domain ); ?></label>
    <?php echo self::tooltip( $close_content_color_hover_help ); ?>
    <?php echo self::pro(); ?><br/>
    <img src="<?php echo $this->plugin_url; ?>assets/img/black.jpg">
  </div>

  <div class="element"></div>

</div>

<div class="container">

  <div class="element">
    <label><?php _e( 'Background', $this->text_domain ); ?></label>
    <?php echo self::tooltip( $close_background_color_help ); ?>
    <?php echo self::pro(); ?><br/>
    <img src="<?php echo $this->plugin_url; ?>assets/img/white.jpg">
  </div>

  <div class="element">
    <label><?php _e( 'Hover Background', $this->text_domain ); ?></label>
    <?php echo self::tooltip( $close_background_hover_help ); ?>
    <?php echo self::pro(); ?><br/>
    <img src="<?php echo $this->plugin_url; ?>assets/img/black.jpg">
  </div>

  <div class="element"> </div>

</div>