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
     wp_head();
      $data = get_fields( 'options' );
     // echo "<pre>";
     // print_r(json_encode($data));
?>

    <section class="hero-fullwidth">
        <div class="forcefullwidth_wrapper_tp_banner">
            <div class="herobanner-wrap">
                <div class="herobanner-wrap--desc">
                    <p class="type-label">Featured Designer</p>
                    <div class="banner-title"><?php echo $data['featured_post']['title'];?></div>
                    <p class="desc"><?php echo $data['featured_post']['description'];?></p>
                    <a href="<?php echo $data['featured_post']['link_url'];?>" class="cta">
                        <?php echo $data['featured_post']['button_text'];?>
                    </a>
                </div>
                <div class="srcoll-nav">
                    <img src="<?php template_dir();?>/files/assets/scroll-more-icon.png" alt="">
                    <p>Scroll for more</p>
                </div>
                <div class="herobanner-wrap--img" style="background-image: url(<?php echo $data['featured_post']['image'];?>);">            
                </div>
            </div>
        </div>
    </section>

    <section class="wrapper s-wrapper">
        <h4 class="s-title"><?php echo $data['first_jumbotron']['category_title'];?></h4>
        <p class="sub-title"><?php echo $data['first_jumbotron']['category_description'];?></p>

        <div class="d-flex lookbook trending">

            <div class="trending-col">
                <div class="lookbook--single">  
                    <div class="lookbook--img">
                        <img src="<?php echo $data['first_jumbotron']['potrait_image'];?>">
                    </div>
                </div>
            </div>

            <div class="trending-col">
                <div class="lookbook--single">  
                    <div class="lookbook--img">
                        <img src="<?php echo $data['first_jumbotron']['landscape_image'];?>">
                    </div>
                    <div class="banner-desc banner-desc__right banner-desc__small">
                        <div class="banner-title"><?php echo $data['first_jumbotron']['title'];?></div>
                        <p class="desc"><?php echo $data['first_jumbotron']['description'];?>.</p>
                        <a href="<?php echo $data['first_jumbotron']['button_url'];?>" class="cta">
                            <?php echo $data['first_jumbotron']['button_text'];?>
                        </a>
                    </div>
                </div>
            </div>
            
            
        </div>

    </section>

    <section class="wrapper s-wrapper">
        <h4 class="s-title">NEW</h4>
        <p class="sub-title">New pieces to its latest creations</p>
        <div class="multiple-items -new-items row new-items-wrap">
          <?php 
            // 'stock' => 1,
            $args = array( 'post_type' => 'product', 'posts_per_page' => (int)$data['total_product_show'], 'orderby' =>'id','order' => 'DESC' );
            $loop = new WP_Query( $args );
            while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
                <a href="<?php the_permalink(); ?>" class="single-items">
                    <div class="single-items--img">
                        <img src="<?php the_post_thumbnail_url();?>" alt="">
                    </div>
                    <div class="single-items--des"> 
                        <p class="brand">
                            <?php
                                $brand = wp_get_post_terms( get_the_ID(), 'product_brand', array( 'fields' => 'names' ) ); 
                                echo $brand[0];
                            ?>
                        </p>
                        <p class="model"><?php the_title(); ?></p>
                        <p class="price">SGD <?php echo $product->get_price(); ?></p>
                    </div>
                </a>
            <?php endwhile; ?>
        </div>

    </section>

    <section class="wrapper s-wrapper">
        <h4 class="s-title"><?php echo $data['after_products']['category_title'];?></h4>
        <p class="sub-title"><?php echo $data['after_products']['category_description'];?></p>
        <div class="row  accessories-wrap">
            <?php foreach ($data['after_products']['after_product'] as $key => $value): ?>
                <div class="col-lg-3 col-md-6 col-12 ">
                    <div class="single-collection ">
                        <div class="single-collection--img">
                            <img src="<?php echo $value['image']?>">
                        </div>
                        <a href="<?php echo $value['button_url'];?>" class="cta">
                            <?php echo $value['button_text'];?>
                        </a>
                    </div>
                </div>
            <?php endforeach ?>
            
        </div>
    </section>

        <section class="wrapper s-wrapper">
            <h4 class="s-title"><?php echo $data['jumbotron_products']['category_title'];?></h4>
            <p class="sub-title"><?php echo $data['jumbotron_products']['category_description'];?></p>
            <div class="multiple-items -must-hv-items row new-items-wrap">
                <?php foreach ($data['jumbotron_products']['jumbotron_product'] as $key => $value): ?>
                    <div>               
                      <div class="row">
                        <div class="col-lg-6 offset-lg-1">
                            <img src="<?php echo $value['image_fit'];?>">
                        </div>
                        <div class="col-lg-5">
                              <a href="<?php echo $value['product_link'];?>" class="single-items single-items__fullheight">
                                <div class="single-items--img">
                                    <img src="<?php echo $value['image_catalog'];?>" alt=""">
                                </div>
                                <div class="single-items--des"> 
                                    <p class="brand"><?php echo $value['merk_type'];?></p>
                                    <p class="model"><?php echo $value['product_title'];?></p>
                                    <p class="price">SGD <?php echo $value['product_price'];?></p>
                                </div>
                              </a>      
                        </div>
                      </div>
                    </div>
                <?php endforeach ?>
            </div>

        </section>

    <section class="wrapper s-wrapper">
        <h4 class="s-title"><?php echo $data['twins_jumbotron']['category_title'];?></h4>
        <p class="sub-title"><?php echo $data['twins_jumbotron']['category_description'];?></p>

        <div class="row lookbook">
            <?php foreach ($data['twins_jumbotron']['twin_jumbotron'] as $key => $value): ?>
                <div class="col-md-6">
                    <div class="lookbook--single">  
                        <div class="lookbook--img">
                            <img src="<?php echo $value['image'];?>">
                        </div>
                        <div class="banner-desc banner-desc__small">
                            <p class="type-label"><?php echo $value['category'];?></p>
                            <div class="banner-title"><?php echo $value['title'];?></div>
                            <p class="desc"><?php echo $value['description'];?></p>
                            <?php if (!empty($value['button_text'])): ?>
                                <a href="<?php echo $value['button_url'];?>" class="cta">
                                    <?php echo $value['button_text'];?>
                                </a>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>

    </section>

    <section class="">
        <h4 class="s-title"><?php echo $data['last_jumbotron']['section_title'];?></h4>
        <p class="sub-title"><?php echo $data['last_jumbotron']['section_description'];?></p>

        <div class="row lookbook">
            <div class="col-md-12">
                <div class="lookbook--single">  
                    <div class="lookbook--img">
                        <img src="<?php echo $data['last_jumbotron']['image'];?>">
                    </div>
                    <div class="banner-desc banner-desc__large banner-desc__exsmall">
                        <p class="type-label"><?php echo $data['last_jumbotron']['category_title'];?></p>
                        <div class="banner-title"><?php echo $data['last_jumbotron']['title'];?></div>
                        <p class="desc"><?php echo $data['last_jumbotron']['description'];?>.</p>
                        <a href="<?php echo $data['last_jumbotron']['button_url'];?>" class="cta">
                            <?php echo $data['last_jumbotron']['button_title'];?>
                        </a>
                    </div>
                </div>
            </div>
            
        </div>

    </section>

    <a href="#wow-modal-id-1" class="float-corner">
        <img src="<?php template_dir(); ?>/files/assets/newsletter-icon.gif">
    </a>
<?php //echo do_shortcode( '[mc4wp_form id="1300"]' );?>
<?php get_footer(); ?>
