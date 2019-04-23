<?php
/**
 * Icon Generation
 *
 * @package     Wow_Pluign
 * @copyright   Copyright (c) 2018, Dmytro Lobov
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */
if ( !defined( 'ABSPATH' ) ) {
  exit;
}
include_once('settings/icon.php');
?>

You can generate the icon and insert in the modal window content

<fieldset>


  <div class="container">

    <div class="element">
      <?php _e( 'Select Icon', $this->text_domain ); ?><br/>
      <?php echo self::option( $icongenerate ); ?>
    </div>

    <div class="element">
      <?php _e( 'Color', $this->text_domain ); ?><p/>
      <?php echo self::option( $color_icon ); ?>
    </div>

    <div class="element">
      <?php _e( 'Size (px)', $this->text_domain ); ?><p/>
      <?php echo self::option( $size_icon ); ?>
    </div>

  </div>

  <div class="container">

    <div class="element">
      <?php _e( 'Link', $this->text_domain ); ?><br/>
      <?php echo self::option( $link_icon ); ?>
    </div>

    <div class="element">
      <?php _e( 'Link target', $this->text_domain ); ?><br/>
      <?php echo self::option( $target_icon ); ?>
    </div>

    <div class="element">
    </div>

  </div>

  <div class="container">
    <div class="element" style="text-align: center">
      <input type="button" onclick="iconcode();" value="<?php _e( 'GENERATE', $this->text_domain ); ?>"
             class="button button-primary button-large">
    </div>

  </div>

  <div class="container">

    <div class="element" style="text-align: center">
      <b><?php _e( 'Shortcode', $this->text_domain ); ?>:</b><br/>
      <span id="code_icon"></span>

    </div>

  </div>

  <div class="container">

    <div class="element" style="text-align: center">
      <b><?php _e( 'Preview', $this->text_domain ); ?>:</b><br/>
      <span id="preview_icon"></span>

    </div>

  </div>

</fieldset>