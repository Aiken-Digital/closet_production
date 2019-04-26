<?php
    /*
        Template Name: Contact Page.
    */
    if(is_page(1183)) {
     get_header('custom-landing');
    }
    else {
     get_header();
    }
     wp_head();
      $data = get_fields( 'options' );
?>

<section id="hero" class="hero-boxedauto no-bg">
    <div id="page-title" class="wrapper-mini  title-top">
        <h3 style="text-align: center;"><strong><?php _e('[:jp]連絡する[:en]Get in Touch');?></strong></h3>
        <div class="spacer spacer-mini "></div>
        <h5 style="text-align: center;"><strong><span style="color: #d4af37;"><?php _e('[:jp]その他のご質問、ビジネスパートナーシップについては、お問い合わせください。[:en]Contact us for any further questions, possible business partnerships.');?></span></strong></h5>
    </div>        
</section>

<div id="page-body">
   <div class="wrapper-medium">
      <div class="column-section clearfix spaced-normal  col-align-top no-anim">
         <div class="column one-third   col1 no-anim">
            <div class="col-content">
               <p style="text-align: center;"><i class="ion ion-ios-chatbubble-outline ion-4x"></i></p>
               <h4 style="text-align: center;"><strong><?php _e('[:jp]話そう[:en]Let’s talk');?><br>
                  </strong>
               </h4>
               <p style="text-align: center;"><?php _e('[:jp]電話番号：+65 6444 8325[:en]Tel: +65 6444 8325');?><br>
                  <?php _e('[:jp]携帯電話番号：+65 8522 3766[:en]Mobile: +65 8522 3766');?>
               </p>
            </div>
         </div>
         <div class="column one-third   col2 no-anim">
            <div class="col-content">
               <p style="text-align: center;"><i class="ion ion-ios-cart-outline ion-4x"></i></p>
               <h4 style="text-align: center;"><strong><?php _e('[:jp]私達の店を訪問[:en]Visit our Store');?><br>
                  </strong>
               </h4>
               <p style="text-align: center;"><?php _e('[:jp]6スコッツロード[:en]6 Scotts Road ');?><br>
                  <?php _e('[:jp]＃03-10スコッツスクエア[:en]#03-10 Scotts Square ');?><br>
                  <?php _e('[:jp]シンガポール228209[:en]Singapore 228209');?>
               </p>
               <p style="text-align: center;"><strong><a href="https://goo.gl/maps/eHi7uku97RjyYY1C8"><?php _e('[:jp]地図を見る[:en]See the map');?></a></strong></p>
            </div>
         </div>
         <div class="column one-third last-col  col3 no-anim">
            <div class="col-content">
               <p style="text-align: center;"><i class="ion ion-ios-people-outline ion-4x"></i></p>
               <h4 style="text-align: center;"><strong><?php _e('[:jp]私たちの営業時間[:en]Our Opening Hours');?><br>
                  </strong>
               </h4>
               <p style="text-align: center;"><?php _e('[:jp]月曜日から日曜日[:en]Monday to Sunday');?><br>
                  <?php _e('[:jp]AM 10:30  -  PM 20:30[:en]AM 10:30 - PM 20:30');?>.
               </p>
            </div>
         </div>
      </div>
   </div>
   <div class="spacer spacer-big "></div>
   <div class="wrapper-medium">
      <div class="column-section clearfix spaced-huge  col-align-top no-anim">
         <div class="column one-third   col4 no-anim">
            <div class="col-content">
               <h3><strong><?php _e('[:jp]お問い合わせフォームに記入して私達と連絡を取ってください。[:en]Get in contact with us by filling out our contact form.');?></strong></h3>
            </div>
         </div>
         <div class="column two-third last-col  col5 no-anim">
            <div class="col-content">
               <div role="form" class="wpcf7" id="wpcf7-f766-p263-o1" lang="en-US" dir="ltr">
                  <div class="screen-reader-response"></div>
                  <form action="/closet/contact/#wpcf7-f766-p263-o1" method="post" class="wpcf7-form" novalidate="novalidate">
                     <div style="display: none;">
                        <input type="hidden" name="_wpcf7" value="766">
                        <input type="hidden" name="_wpcf7_version" value="5.1.1">
                        <input type="hidden" name="_wpcf7_locale" value="en_US">
                        <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f766-p263-o1">
                        <input type="hidden" name="_wpcf7_container_post" value="263">
                        <input type="hidden" name="g-recaptcha-response" value="">
                     </div>
                     <div class="form-row deplace"><input type="text" name="your-name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAAAXNSR0IArs4c6QAAAfBJREFUWAntVk1OwkAUZkoDKza4Utm61iP0AqyIDXahN2BjwiHYGU+gizap4QDuegWN7lyCbMSlCQjU7yO0TOlAi6GwgJc0fT/fzPfmzet0crmD7HsFBAvQbrcrw+Gw5fu+AfOYvgylJ4TwCoVCs1ardYTruqfj8fgV5OUMSVVT93VdP9dAzpVvm5wJHZFbg2LQ2pEYOlZ/oiDvwNcsFoseY4PBwMCrhaeCJyKWZU37KOJcYdi27QdhcuuBIb073BvTNL8ln4NeeR6NRi/wxZKQcGurQs5oNhqLshzVTMBewW/LMU3TTNlO0ieTiStjYhUIyi6DAp0xbEdgTt+LE0aCKQw24U4llsCs4ZRJrYopB6RwqnpA1YQ5NGFZ1YQ41Z5S8IQQdP5laEBRJcD4Vj5DEsW2gE6s6g3d/YP/g+BDnT7GNi2qCjTwGd6riBzHaaCEd3Js01vwCPIbmWBRx1nwAN/1ov+/drgFWIlfKpVukyYihtgkXNp4mABK+1GtVr+SBhJDbBIubVw+Cd/TDgKO2DPiN3YUo6y/nDCNEIsqTKH1en2tcwA9FKEItyDi3aIh8Gl1sRrVnSDzNFDJT1bAy5xpOYGn5fP5JuL95ZjMIn1ya7j5dPGfv0A5eAnpZUY3n5jXcoec5J67D9q+VuAPM47D3XaSeL4AAAAASUVORK5CYII=&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;"><label><?php _e('[:jp]名[:en]Name');?> *</label><span class="wpcf7-form-control-wrap your-name"></span></div>
                     <div class="form-row deplace"><input type="email" name="your-email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false"><label><?php _e('[:jp]郵便物[:en]Email');?> *</label><span class="wpcf7-form-control-wrap your-email"></span> </div>
                     <div class="form-row deplace"><input type="text" name="your-subject" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false"><label><?php _e('[:jp]件名[:en]Subject');?></label><span class="wpcf7-form-control-wrap your-subject"></span> </div>
                     <div class="form-row deplace"><textarea name="your-message" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea" aria-invalid="false"></textarea><label><?php _e('[:jp]メッセージ[:en]Message');?> *</label><span class="wpcf7-form-control-wrap your-message"></span> </div>
                     <div class="form-row"><input type="submit" value="<?php _e('[:jp]送る[:en]Send');?>" class="wpcf7-form-control wpcf7-submit"><span class="ajax-loader"></span></div>
                     <div class="wpcf7-response-output wpcf7-display-none"></div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="spacer spacer-big "></div>
</div>

<?php get_footer(); ?>