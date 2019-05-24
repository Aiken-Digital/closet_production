<?php
    /*
        Template Name: Landing Cust Child.
    */
    if(is_page(1183)) {
     get_header('custom-landing');
    }
    else {
     get_header();
    }
     // wp_head();
      $data = get_fields( 'options' );
     // echo "<pre>";
     // print_r(json_encode($data));
?>

<!-- First Section -->
<section class="hero-fullwidth hero-fullwidth--pushtop s-wrapper p-b-0 p-t-0">
    <div class="forcefullwidth_wrapper_tp_banner">
        <div class="herobanner-wrap">
            <div class="srcoll-nav">
                <img src="<?php template_dir();?>/files/assets/scroll-more-icon.png" alt="">
                <p>Scroll for more</p>
            </div>
            <a href="<?php echo $data['first_section']['featured_link'];?>">
                <img class="mobile-none" style="min-width: 100%;" src="<?php echo $data['first_section']['featured_image'];?>">
                <img class="desktop-none" style="min-width: 100%" src="<?php echo $data['first_section']['mobile_banner'];?>">
            </a>
        </div>
    </div>
</section>

<!-- Second Section -->
<section class="wrapper s-wrapper" style="padding-top: 0;">
    <div class="d-flex lookbook trending">
        <div class="trending-col mobile-none">
            <div class="lookbook--single">  
                <div class="lookbook--img">
                    <img src="<?php echo $data['second_section']['double_featured_image']['left_side_potrait_image'];?>">
                </div>
            </div>
        </div>

        <div class="trending-col">
            <div class="lookbook--single">  
                <div class="lookbook--img">
                    <img src="<?php echo $data['second_section']['double_featured_image']['right_side_landscape_image'];?>">
                </div>
            </div>
            <div>
                <p class="caption"><?php echo $data['second_section']['description'];?>.</p>
                <a href="<?php echo $data['second_section']['link_url'];?>" class="shop-cta"><?php echo $data['second_section']['link_text'];?></a>
            </div>
        </div>
    </div>
</section>

<!-- Third Section -->
<section class="wrapper s-wrapper">
    <h4 class="s-title"><span class=""><?php echo $data['third_section']['section_title']['bold'];?></span> <?php echo $data['third_section']['section_title']['paragraph'];?></h4>
    <p class="sub-title"></p>
    <div class="multiple-items -new-items row new-items-wrap">
      <?php 
        $args = array( 'post_type' => 'product', 'posts_per_page' => (int)$data['general']['total_product_show'], 'orderby' =>'id','order' => 'DESC' );
        $loop = new WP_Query( $args );
        while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
            <a href="<?php the_permalink(); ?>" class="single-items">
                <div class="single-items--img">
                    <img src="<?php the_post_thumbnail_url();?>" alt="">
                </div>
                <div class="single-items--des"> 
                    <?php if ($data['third_section']['product_header'] === 'brands'): ?>
                        <p class="brand"><?php woocommerce_brand_name();?></p>
                    <?php else : ?>
                        <p class="brand"><?php woocommerce_category_name();?></p>
                    <?php endif ?>
                    <p class="model"><?php the_title(); ?></p>
                    <?php if (isset($_SESSION['woocs_current_currency'])): ?>
                        <?php if ($_SESSION['woocs_current_currency'] === 'SGD'): ?>
                            <p class="price">$ <?php echo number_format($product->get_price()); ?></p>
                        <?php else :?>
                            <p class="price">JPY <?php echo number_format($product->get_price()); ?></p>
                        <?php endif ?>
                    <?php else : ?>
                        <p class="price">$ <?php echo number_format($product->get_price()); ?></p>
                    <?php endif ?>
                </div>
            </a>
        <?php endwhile; ?>
    </div>
</section>

<!-- Fourth Section -->
<section class="wrapper s-wrapper must-hv p-b-0 p-t-0">
    <h4 class="s-title"><span class=""><?php echo $data['fourth_section']['section_title']['bold'];?></span> <?php echo $data['fourth_section']['section_title']['paragraph'];?></h4>
    <p class="sub-title"><?php //echo $data['jumbotron_products']['category_description'];?></p>
    <div class="multiple-items -must-hv-items row new-items-wrap">
        <?php foreach ($data['fourth_section']['content'] as $key => $value): ?>
            <div>               
              <div class="row">
                <div class="col-lg-6 offset-lg-1">
                    <img src="<?php echo $value['image_full'];?>">
                </div>
                <div class="col-lg-5">
                      <a href="<?php echo $value['product_link'];?>" class="single-items single-items__fullheight">
                        <div class="single-items--img">
                            <img src="<?php echo $value['image_small'];?>" alt="">
                        </div>
                        <div class="single-items--des"> 
                            <p class="brand"><?php echo $value['brand_name']->name;?></p>
                            <p class="model"><?php echo $value['product_label'];?></p>
                            <?php if (isset($_SESSION['woocs_current_currency'])): ?>
                                <?php if ($_SESSION['woocs_current_currency'] === 'SGD'): ?>
                                    <p class="price">SGD <?php echo number_format($value['price']['sgd']);?></p>
                                <?php else :?>
                                    <p class="price">JPY <?php echo number_format($value['price']['jpy']);?></p>
                                <?php endif ?>
                            <?php else : ?>
                                <p class="price">SGD <?php echo number_format($value['price']['sgd']);?></p>
                            <?php endif ?>
                        </div>
                      </a>      
                </div>
              </div>
            </div>
        <?php endforeach ?>
    </div>
</section>

<!-- Fifth Section -->
<section class="wrapper s-wrapper p-t-0">
    <h4 class="s-title d-none"><?php //echo $data['twins_jumbotron']['category_title'];?></h4>
    <p class="sub-title"><?php //echo $data['twins_jumbotron']['category_description'];?></p>
    <div class="row lookbook">
        <div class="col-md-6">
            <div class="lookbook--single">  
                <div class="lookbook--img">
                    <img src="<?php echo $data['fifth_section']['left_side_image'];?>">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="lookbook--single">  
                <div class="lookbook--img">
                    <img src="<?php echo $data['fifth_section']['right_side_image'];?>">
                </div>
                
            </div>
        </div>
    </div>
    <div>
        <p class="caption text-center"><span class="thick"><?php echo $data['fifth_section']['title_section']['bold'];?></span> <?php echo $data['fifth_section']['title_section']['paragraph'];?></p>
        <a href="<?php echo $data['fifth_section']['button_link'];?>" class="shop-cta text-center d-block"><?php echo $data['fifth_section']['button_text'];?></a>
    </div>
</section>

<!-- Sixth Section -->
<section class="wrapper s-wrapper p-b-0">
    <h4 class="s-title"><span class=""><?php echo $data['sixth_section']['section_title']['bold'];?></span> <?php echo $data['sixth_section']['section_title']['paragraph'];?></h4>
    <p class="sub-title"><?php //echo $data['after_products']['category_description'];?></p>
    <div class="row  accessories-wrap">
        <?php foreach ($data['sixth_section']['item_list'] as $key => $value): ?>
            <div class="col-lg-3 col-md-6 col-12 ">
                <div class="single-collection ">
                    <div class="single-collection--img">
                        <img src="<?php echo $value['item_image']?>">
                    </div>
                    <a href="<?php echo $value['button_url'];?>" class="cta">
                        <?php echo $value['button_text'];?>
                    </a>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</section>

<!-- Seventh Section -->
<section class="hero-fullwidth hero-fullwidth--lastbanner s-wrapper p-b-0 p-t-0">
    <h4 class="s-title"><?php //echo $data['last_jumbotron']['section_title'];?></h4>
    <p class="sub-title"><?php //echo $data['last_jumbotron']['section_description'];?></p>
    <div class="row lookbook">
        <div class="col-md-12">
            <div class="lookbook--single">
                <a href="<?php echo $data['seventh_section']['link'];?>">
                    <img class="mobile-none" style="min-width: 100%" src="<?php echo $data['seventh_section']['image'];?>">
                    <img class="desktop-none" style="min-width: 100%" src="<?php echo $data['seventh_section']['mobile_banner'];?>">
                </a> 
            </div>
        </div>
        
    </div>
</section>

<!-- ### END SECTION ### -->

<a href="#wow-modal-id-1" class="float-corner">
    <img src="<?php template_dir(); ?>/files/assets/newsletter-icon.gif">
</a>


<?php get_footer();?>

