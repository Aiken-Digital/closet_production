<?php
	/**
		* Targeting
		*
		* @package     Wow_Pluign
		* @copyright   Copyright (c) 2018, Dmytro Lobov
		* @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
		* @since       1.0
	*/
	if ( !defined( 'ABSPATH' ) ) {
		exit;
	}
	include_once('settings/style.php');
	
?>

<div class="container">
  <div class="element">
    <?php _e( 'Width', $this->text_domain ); ?><br/>
    <?php echo self::option( $modal_width ); ?><br/>
    <?php echo self::option( $modal_width_par ); ?>
		
	</div>
  <div class="element">
    <?php _e( 'Height', $this->text_domain ); ?><br/>
    <?php echo self::option( $modal_height ); ?><br/>
    <?php echo self::option( $modal_height_par ); ?>
	</div>
	
  <div class="element">
    <?php _e( 'Z-index', $this->text_domain ); ?><?php echo self::tooltip( $modal_zindex_help ); ?><br/>
    <?php echo self::option( $modal_zindex ); ?>
	</div>
	
</div>

<div class="container">
	
  <div class="element">
    <?php _e( 'Padding', $this->text_domain ); ?><?php echo self::tooltip( $modal_padding_help ); ?>
    <?php echo self::pro(); ?><br/>
    <?php echo self::option( $modal_padding ); ?>
	</div>
	
  <div class="element">
    <?php _e( 'Background Image URL', $this->text_domain ); ?><?php echo self::tooltip( $modal_background_img_help ); ?>
    <?php echo self::pro(); ?><br/>
    <?php echo self::option( $modal_background_img ); ?>
	</div>
	
  <div class="element">
    <?php _e( 'Position', $this->text_domain ); ?><?php echo self::tooltip( $modal_position_help ); ?><br/>
    <?php echo self::option( $modal_position ); ?>
	</div>
	
</div>

<div class="container">
	
  <div class="element">
    <?php _e( 'Background Color', $this->text_domain ); ?><?php echo self::tooltip( $bg_color_help ); ?>.
    <?php echo self::pro(); ?><br/>
    <img src="<?php echo $this->plugin_url; ?>assets/img/white.jpg">
	</div>
	
  <div class="element">
    <?php echo self::option( $include_overlay ); ?>
    <?php _e( 'Overlay', $this->text_domain ); ?>
    <?php echo self::tooltip( $include_overlay_help ); ?>
    <?php echo self::pro(); ?><br/>
    <span id="overlay_background">
			<img src="<?php echo $this->plugin_url; ?>assets/img/overlay.jpg">
		</span>
		
	</div>
	
  <div class="element">
	</div>
	
</div>

<fieldset class="itembox">
  <legend>
    <?php _e( 'Border', $this->text_domain ); ?>
	</legend>
	
  <div class="container">
		
    <div class="element">
      <?php _e( 'Radius', $this->text_domain ); ?><?php echo self::tooltip( $border_radius_help ); ?><br/>
      <?php echo self::option( $border_radius ); ?>
		</div>
    <div class="element">
      <?php _e( 'Style', $this->text_domain ); ?><?php echo self::tooltip( $border_style_help ); ?><br/>
      <?php echo self::option( $border_style ); ?>
		</div>
    <div class="element">
		</div>
	</div>
	
  <div class="container">
		
    <div class="element border">
      <?php _e( 'Color', $this->text_domain ); ?><br/>
      <?php echo self::option( $border_color ); ?>
		</div>
    <div class="element border">
      <?php _e( 'Thickness', $this->text_domain ); ?><br/>
      <?php echo self::option( $border_width ); ?>
		</div>
    <div class="element">
		</div>
		
	</div>
</fieldset>

<fieldset class="itembox">
  <legend>
    <?php _e( 'Location', $this->text_domain ); ?>
	</legend>
	
  <div class="container">
		
    <div class="element">
      <input type="checkbox" checked disabled>			
      <?php _e( 'Top', $this->text_domain ); ?><?php echo self::tooltip( $modal_top_help ); ?>
      <br/>
      <?php echo self::option( $modal_top ); ?>
		</div>
    <div class="element">
      <input type="checkbox" disabled>
      <?php _e( 'Bottom', $this->text_domain ); ?>
      <?php echo self::tooltip( $modal_bottom_help ); ?>
      <?php echo self::pro(); ?><br/>
			
		</div>
    <div class="element"></div>
		
	</div>
	
  <div class="container">
		
    <div class="element">
      <input type="checkbox" checked disabled>			
      <?php _e( 'Left', $this->text_domain ); ?>
      <?php echo self::tooltip( $modal_left_help ); ?>
      <?php echo self::pro(); ?><br/>
      <?php echo self::option( $modal_left ); ?>
			
		</div>
    <div class="element">
      <input type="checkbox" checked disabled>			
      <?php _e( 'Right', $this->text_domain ); ?>
      <?php echo self::tooltip( $modal_right_help ); ?>
      <?php echo self::pro(); ?><br/>
      <?php echo self::option( $modal_right ); ?>
		</div>
    <div class="element"></div>
		
	</div>
	
  <div class="container">
    <div class="element">
      <h4 style="color:red"><?php _e('Notice!', $this->text_domain); ?></h4>
      <?php _e('If you want to align the modal window horizontally, set values:', $this->text_domain); ?>
      <ul>
        <li>&bull; Left = 0</li>
        <li>&bull; Right = 0</li>
			</ul>
		</div>
		
	</div>
</fieldset>


<fieldset>
  <legend><?php _e('Drop Shadow', $this->text_domain); ?></legend>
  <div class="container">
    <div class="element">
      <label><?php _e('Shadow', $this->text_domain); ?></label>
      <?php echo self::tooltip( $shadow_help ); ?>
      <?php echo self::pro(); ?><br/>
      <?php echo self::option( $shadow ); ?>
		</div>
    <div class="element shadow">
			
		</div>
    <div class="element shadow">
			
		</div>
	</div>
	
</fieldset>

<fieldset class='popup-title'>
  <legend><?php _e('Title', $this->text_domain); ?></legend>
	
  <div class="container">
    <div class="element">
      <label><?php _e('Font Size', $this->text_domain); ?></label>
      <?php echo self::tooltip( $title_size_help ); ?><br/>
      <?php echo self::option( $title_size ); ?>
		</div>
    <div class="element">
      <label><?php _e('Line Height', $this->text_domain); ?></label>
      <?php echo self::tooltip( $title_line_height_help ); ?><br/>
      <?php echo self::option( $title_line_height ); ?>
		</div>
    <div class="element">
      <label><?php _e('Font Family', $this->text_domain); ?></label>
      <?php echo self::pro(); ?><br/>
      <?php echo self::option( $title_font ); ?>
		</div>
	</div>
	
  <div class="container">
    <div class="element">
      <label><?php _e('Font Weight', $this->text_domain); ?></label>
      <?php echo self::pro(); ?><br/>
      <?php echo self::option( $title_font_weight ); ?>
		</div>
    <div class="element">
      <label><?php _e('Font Style', $this->text_domain); ?></label>
      <?php echo self::pro(); ?><br/>
      <?php echo self::option( $title_font_style ); ?>
		</div>
    <div class="element">
      <label><?php _e('Align', $this->text_domain); ?></label><br/>
      <?php echo self::option( $title_align ); ?>
		</div>
	</div>
	
  <div class="container">
    <div class="element">
      <label><?php _e('Color', $this->text_domain); ?></label><br/>
      <?php echo self::option( $title_color ); ?>
		</div>
    <div class="element">
		</div>
    <div class="element">
		</div>
	</div>
	
</fieldset>

<fieldset>
  <legend><?php _e('Content', $this->text_domain); ?></legend>
	
  <div class="container">
    <div class="element">
      <label><?php _e('Font Size', $this->text_domain); ?></label>
      <?php echo self::tooltip( $content_size_help ); ?><br/>
      <?php echo self::option( $content_size ); ?>
		</div>
    <div class="element">
      <label><?php _e('Font Family', $this->text_domain); ?></label>
      <?php echo self::pro(); ?><br/>
      <?php echo self::option( $content_font ); ?>
		</div>
    <div class="element">
		</div>
	</div>
	
</fieldset>


<fieldset class="itembox">
  <legend>
    <?php _e( 'Mobile Style', $this->text_domain ); ?>
	</legend>
	
  <div class="container">
    <div class="element">
      <?php _e( 'Trigger for screens less than', $this->text_domain ); ?>
      <?php echo self::tooltip( $screen_size_help ); ?><br/>
      <?php echo self::option( $screen_size ); ?>
		</div>
		
    <div class="element">
      <?php _e( 'Width', $this->text_domain ); ?>
      <?php echo self::tooltip( $mobile_width_help ); ?><br/>
      <?php echo self::option( $mobile_width ); ?><br/>
      <?php echo self::option( $mobile_width_par ); ?>
		</div>
		
	</div>
	
</fieldset>

<input type="hidden" name="param[include_modal_top]" value="1">
<input type="hidden" name="param[include_modal_left]" value="1">
<input type="hidden" name="param[include_modal_right]" value="1">
