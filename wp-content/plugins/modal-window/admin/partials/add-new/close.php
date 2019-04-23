<?php
/**
 * Close button
 *
 * @package     Wow_Pluign
 * @copyright   Copyright (c) 2018, Dmytro Lobov
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */
if ( !defined( 'ABSPATH' ) ) {
  exit;
}
include_once('settings/close.php');

?>

<fieldset>
  <legend>
    <?php _e( 'Settings', $this->text_domain ); ?>
  </legend>

  <div class="container">

    <div class="element">
      <input type="checkbox" disabled>
      <?php _e( 'Remove Close Button', $this->text_domain ); ?>
      <?php echo self::tooltip( $close_button_remove_help ); ?>
      <?php echo self::pro(); ?>
    </div>
    <div class="element">
      <?php echo self::option( $close_button_overlay ); ?>
      <?php _e( 'Click Overlay to Close', $this->text_domain ); ?>
      <?php echo self::tooltip( $close_button_overlay_help ); ?>
    </div>
    <div class="element">
      <?php echo self::option( $close_button_esc ); ?>
      <?php _e( 'Press ESC to Close', $this->text_domain ); ?>
      <?php echo self::tooltip( $close_button_esc_help ); ?>
    </div>

  </div>

  <div class="container">

    <div class="element">
      <?php _e( 'Delay (sec)', $this->text_domain ); ?>
      <?php echo self::tooltip( $close_delay_help ); ?>
      <?php echo self::pro(); ?><br/>
      <?php echo self::option($close_delay); ?><br/>


    </div>
    <div class="element">
      <input type="checkbox" disabled>
      <?php _e( 'Auto close (sec)', $this->text_domain ); ?>
      <?php echo self::tooltip( $modal_auto_close_help ); ?>
      <?php echo self::pro(); ?><br/>

    </div>
    <div class="element">

    </div>

  </div>
</fieldset>