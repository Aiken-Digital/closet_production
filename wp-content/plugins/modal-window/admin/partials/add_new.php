<?php if ( !defined( 'ABSPATH' ) ) exit;
/**
 * Add new Element
 *
 * @package     Wow_Plugin
 * @copyright   Copyright (c) 2018, Dmytro Lobov
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */
include_once('include-data.php');
include_once('add-new/settings/add-new.php');
?>

  <form action="admin.php?page=<?php echo $this->plugin_slug; ?>" method="post" name="post" class="wow-plugin">
    <div id="poststuff">
      <div id="post-body" class="metabox-holder columns-2">
        <div id="post-body-content" style="position: relative;">
          <div id="titlediv">
            <div id="titlewrap">
              <label class="screen-reader-text" id="title-prompt-text" for="title">Enter title here</label>
              <input type="text" name="title" size="30" value="<?php echo $title; ?>" id="title"
                     placeholder="<?php _e( 'Register an item name', $this->text_domain ); ?>">
              <p class="lg-desc">
                <?php echo self::option( $popup_title ); ?>
                <label for="popuptitle">Used title as Popup Title.</label>
              </p>
            </div>
          </div>

          <div id="postdivrich" class="postarea wp-editor-expand">
            <?php echo self::option( $content ); ?>
          </div>


        </div>
        <div id="postbox-container-1" class="postbox-container">
          <?php include_once('add-new/targeting.php'); ?>
          <div id="submitdiv" class="postbox ">
            <h2 class="hndle ui-sortable-handle"><span><?php _e( 'Publish', $this->text_domain ); ?></span> <?php echo self::pro(); ?></h2>

            <div class="inside">
              <div class="container">
                <div class="element">
                  <?php echo self::option( $show ); ?>
                  <span
                    id="shortcode"><code>[<?php echo $this->shortcode; ?> id="<?php echo $tool_id; ?>"]</code></span>
                  <p/>

                  <?php if ( $act == "update" ) : ; ?>
                    <span class="preview button open-popup"><?php _e( 'Preview', $this->text_domain ); ?></span>
                    <em><?php _e( 'You can preview the changed settings after the click "Update".', $this->text_domain ); ?></em>
                    <em style="color: red;"><?php _e( 'Click Esc for close the modal window.', $this->text_domain ); ?></em><p/>
                    <span style="color:darkblue;">The style of the modal window in the front-end may differ</span>
                  <?php endif; ?>


                </div>
              </div>
              <div class="submitbox" id="submitpost">
                <div id="major-publishing-actions">
                  <div id="delete-action">
                    <?php if ( !empty( $id ) ) {
                      echo '<a class="submitdelete deletion" href="admin.php?page=' . $this->plugin_slug . '&info=delete&did=' . $id . '">' . __( 'Delete', $this->text_domain ) . '</a>';
                    }; ?>
                  </div>

                  <div id="publishing-action">
                    <input name="submit" id="submit" class="button button-primary button-large"
                           value="<?php echo $btn; ?>" type="submit">
                  </div>
                  <div class="clear"></div>
                </div>
              </div>
            </div>
          </div>

        </div>

        <div id="postbox-container-2" class="postbox-container">
          <div id="postoptions" class="postbox ">
            <div class="inside">
              <div class="tab-box">
                <ul class="tab-nav">
                  <?php
                  $tab_menu = array(
                    'display'  => __( 'Popup Settings', $this->text_domain ),
                    'style'    => __( 'Popup Style', $this->text_domain ),
                    'close'    => __( 'Close Settings', $this->text_domain ),
                    'stylecls' => __( 'Close Style', $this->text_domain ),
                    'button'   => __( 'Button', $this->text_domain ),
                    'form'     => __( 'Form', $this->text_domain ),
                    'icon'     => __( 'Generate Icon', $this->text_domain ),
                    'other'    => __( 'Other', $this->text_domain ),
                  );
                  $i = 1;
                  foreach ( $tab_menu as $menu => $val ) {
                    echo '<li><a href="#t' . $i . '">' . $val . '</a></li>';
                    $i++;
                  }
                  ?>
                </ul>
                <div class="tab-panels">
                  <?php
                  $t = 1;
                  foreach ( $tab_menu as $menu => $val ) {
                    echo '<div id="t' . $t . '">';
                    include_once('add-new/' . $menu . '.php');
                    echo '</div>';
                    $t++;
                  }
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <input type="hidden" name="tool_id" value="<?php echo $tool_id; ?>" id="tool_id"/>
    <input type="hidden" name="param[time]" value="<?php echo time(); ?>"/>
    <input type="hidden" name="add" value="<?php echo $hidval; ?>"/>
    <input type="hidden" name="id" value="<?php echo $id; ?>"/>
    <input type="hidden" name="data" value="<?php echo $data; ?>"/>
    <input type="hidden" name="page" value="<?php echo $this->plugin_slug; ?>"/>
    <input type="hidden" name="plugdir" value="<?php echo $this->plugin_slug; ?>"/>
    <?php wp_nonce_field( $this->plugin_slug . '_action', $this->plugin_slug . '_nonce' ); ?>
  </form>

<?php
if ( $act == "update" ) {
  include_once('preview/preview.php');
}
?>