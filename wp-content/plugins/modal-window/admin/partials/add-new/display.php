<?php
/**
 * Modal window Display
 *
 * @package     Wow_Pluign
 * @copyright   Copyright (c) 2018, Dmytro Lobov
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */
if ( !defined( 'ABSPATH' ) ) {
  exit;
}
include_once('settings/display.php');

?>

<div class="container">
  <div class="element">
    <?php _e( 'Triggers', $this->text_domain ); ?>
    <?php echo self::tooltip( $modal_show_help ); ?>
    <?php echo self::pro(); ?><br/>
    <?php echo self::option( $modal_show ); ?>

  </div>
  <div class="element">
    <?php _e( 'Delay (sec)', $this->text_domain ); ?>
    <?php echo self::tooltip( $modal_timer_help ); ?><br/>
    <?php echo self::option( $modal_timer ); ?>
  </div>

  <div class="element">
    <?php _e( 'Reach (%)', $this->text_domain ); ?>
    <?php echo self::tooltip( $reach_window_help ); ?><br/>
    <?php echo self::option( $reach_window ); ?>
  </div>

</div>


<fieldset class="triggers-open-notice">
  <legend style="color:red"><?php _e( 'Notice!', $this->text_domain ); ?></legend>
  <div class="container">
    <div class="element">
      <?php _e( 'You can open popup via adding to the element:', $this->text_domain ); ?>
      <ul>
        <li>&bull; Class 'wow-modal-id-<?php echo $tool_id; ?>', like <code>&lt;span
            class="wow-modal-id-<?php echo $tool_id; ?>"&gt;Open Popup&lt;/span&gt;</code></li>
        <li>&bull; ID 'wow-modal-id-<?php echo $tool_id; ?>', like <code>&lt;span
            id="wow-modal-id-<?php echo $tool_id; ?>"&gt;Open Popup&lt;/span&gt;</code></li>
        <li>&bull; URL '#wow-modal-id-<?php echo $tool_id; ?>', like <code>&lt;a
            href="'#wow-modal-id-<?php echo $tool_id; ?>'"&lt;Open Popup&lt;/a&gt;</code></li>
      </ul>
    </div>
  </div>
</fieldset>

<div class="container">
  <div class="element">
    <?php _e( 'Show only once?', $this->text_domain ); ?>
    <?php echo self::tooltip( $use_cookies_help ); ?><br/>
    <?php echo self::option( $use_cookies ); ?>

  </div>
  <div class="element">
    <?php _e( 'Reset in (days)', $this->text_domain ); ?><br/>
    <?php echo self::option( $modal_cookies ); ?>
  </div>

  <div class="element">
  </div>
</div>

<fieldset>
  <legend><?php _e( 'Animation', $this->text_domain ); ?></legend>
  <div class="container">
    <div class="element">
      <?php _e( 'Animate In', $this->text_domain ); ?>
      <?php echo self::tooltip( $window_animate_help ); ?>
      <?php echo self::pro(); ?><br/>
      <?php echo self::option( $window_animate ); ?>
    </div>
    <div class="element">
      <?php _e( 'Animate In Speed', $this->text_domain ); ?>
      <?php echo self::tooltip( $speed_window_help ); ?>
      <?php echo self::pro(); ?><br/>
      <?php echo self::option( $speed_window ); ?>
    </div>
  </div>
  <div class="container">
    <div class="element">
      <?php _e( 'Animate Out', $this->text_domain ); ?>
      <?php echo self::tooltip( $window_animate_out_help ); ?>
      <?php echo self::pro(); ?><br/>
      <?php echo self::option( $window_animate_out ); ?>
    </div>

    <div class="element">
      <?php _e( 'Animate Out Speed', $this->text_domain ); ?>
      <?php echo self::tooltip( $speed_window_help ); ?>
      <?php echo self::pro(); ?><br/>
      <?php echo self::option( $speed_window_out ); ?>
    </div>
  </div>
</fieldset>

<fieldset>
  <legend>
    <?php _e( 'Youtube video support', $this->text_domain ); ?>
  </legend>
  <div class="container">
    <div class="element">
      <?php _e( 'Use this option if you insert video in the content as iframe code  from Youtube', $this->text_domain ); ?>
    </div>
  </div>

  <div class="container">

    <div class="element">
      <?php _e( 'Video support', $this->text_domain ); ?>
      <?php echo self::tooltip( $video_support_help ); ?>
      <?php echo self::pro(); ?><br/>
      <input type="radio" checked disabled> no <br />
      <input type="radio" disabled> yes

    </div>

    <div class="element videosupport">

    </div>

    <div class="element videosupport">

    </div>

  </div>

</fieldset>