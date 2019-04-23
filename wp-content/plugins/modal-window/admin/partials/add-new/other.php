<?php
/**
 * Other
 *
 * @package     Wow_Pluign
 * @copyright   Copyright (c) 2018, Dmytro Lobov
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */
if ( !defined( 'ABSPATH' ) ) {
  exit;
}
?>

<fieldset>
  <legend>
    <?php _e( 'Shortcodes', $this->text_domain ); ?>
  </legend>
  <div class="container">

    <div class="element">
      You can use any shortcodes in the modal window content. <br />
      To create rows and columns you can use the following shortcode construct:<br />
      -> <b>[w-row]</b> - create row<br />
      -> <b>[w-column]</b> - create a column and has the attributes:
      <ul>
        <li>&bull; width - this value can be from 1 to 12. Value 12 = 100% width for column </li>
        <li>&bull; align - this value can be: left, center, right</li>
      </ul>

      Example:<br />
      [w-row]<p/>

      [w-column width=6 align="center"] Content with 50% width and align center [/w-column]<br />
      [w-column width=6 align="right"] Content with 50% width and align right [/w-column]<p/>

      [/w-row]


    </div>
  </div>



</fieldset>
