<?php
    /*
        Template Name: Order Tracking
    */
    if(is_page(1183)) {
     get_header('custom-landing');
    }
    else {
     get_header();
    }
?>

<div id="hero-and-body">
   <!-- HERO  -->
   <section id="hero" class="hero-boxedauto no-bg">
      <div id="page-title" class="wrapper-mini  title-top align-left">
         <h1 class="h3" style="text-align: center;"><strong>Order tracking</strong></h1>
      </div>
      <?php echo do_shortcode('[woocommerce_order_tracking]');?>
      <!-- END #page-title -->
   </section>
   <!-- HERO -->
   <!-- PAGEBODY -->
   <div id="page-body">
      <div class="spacer spacer-big "></div>
      <div class="wrapper-medium">
         <div class="column-section clearfix spaced-normal  col-align-top no-anim">
            <div class="column one-third   col1 no-anim">
               <div class="col-content">
                  <p style="text-align: center;"><i class="ion ion-ios-cart-outline ion-3x"></i></p>
                  <h6 style="text-align: center;"><strong>Free International Shipping</strong></h6>
                  <p style="text-align: center; margin-top: 5px;">On all orders over $100.00</p>
               </div>
            </div>
            <div class="column one-third   col2 no-anim">
               <div class="col-content">
                  <p style="text-align: center;"><i class="ion ion-ios-loop ion-3x"></i></p>
                  <h6 style="text-align: center;"><strong>45 Days Return<br>
                     </strong>
                  </h6>
                  <p style="text-align: center; margin-top: 5px;">Money back guarantee</p>
               </div>
            </div>
            <div class="column one-third last-col  col3 no-anim">
               <div class="col-content">
                  <p style="text-align: center;"><i class="ion ion-ios-unlocked-outline ion-3x"></i></p>
                  <h6 style="text-align: center;"><strong>Secure Checkout<br>
                     </strong>
                  </h6>
                  <p style="text-align: center; margin-top: 5px;">100% secured checkout process</p>
               </div>
            </div>
         </div>
      </div>
      <div class="spacer spacer-medium "></div>
   </div>
</div>

<?php get_footer();?>