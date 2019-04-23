<?php 

/*-----------------------------------------------------------------------------------

	Extended  WP Importer by SpabRice for custom navigations fields
	(import process is devided into 3 different parts for max_execution_time error reasons)

-----------------------------------------------------------------------------------*/


/*-----------------------------------------------------------------------------------*/
/*	Import Function
/*-----------------------------------------------------------------------------------*/
if ( !function_exists( 'kona_theme_importoptions' ) ) {
	function kona_theme_importoptions($file,$options=null,$file2nd=null,$file3rd=null) {
			
	// new since kona because of product attributes and term creation and max_execution_time error
	if (!isset($_REQUEST['done'])) { // create product attributes on first load
				
		$argsColor      = array(
			'name'         => "Color",
			'slug'         => "color",
			'type'         => "color",
			'order_by'     => "menu_order",
			'has_archives' => "",
		);
		wc_create_attribute($argsColor);

		$argsSize      = array(
			'name'         => "Size",
			'slug'         => "size",
			'type'         => "button",
			'order_by'     => "menu_order",
			'has_archives' => "",
		);
		wc_create_attribute($argsSize);
		
	} else if (isset($_REQUEST['done']) && $_REQUEST['done'] == '1') {	
		
		// woo variation swatches (terms)  -- must be executed on 2nd load because throws error of invalid attribute (pa_color, ...)
		$c_colors = array(
				array( 'Marine', '#2e4563' ),
				array( 'Honey', '#ecba5c' ),
				array( 'Beige', '#e2cfbc' ),
				array( 'Rose', '#d99999' ),
				array( 'Grey', '#cccccc' ),
				array( 'Brown', '#b28965' ),
				array( 'Black', '#141414' ),
				array( 'Red', '#bc203f' )
		);
		foreach ($c_colors as $c) {
			$add = wp_insert_term( $c[0], 'pa_color', array( 'slug' => strtolower($c[0]) ) );
			if ( !is_wp_error($add) ) { 
				add_term_meta ($add["term_id"], "product_attribute_color", $c[1], true);
			}
		}

		$c_size = array('Xs','S','M','L','XL');
		foreach ($c_size as $s) {
			$add = wp_insert_term( $s, 'pa_size', array( 'slug' => strtolower($s) ) );
		}
		
		
		// ---------------------------------
		// Content Import
		// ---------------------------------
		// Include Custom Importer Class 
		require_once( plugin_dir_path( __FILE__ ) . "wp-importer/wordpress-importer.php");
		
		// Import file
		$newimport = new SR_WP_Import();
		$data = sanitize_file_name($file);
		$content_file = plugin_dir_path( __FILE__ ) . 'datas/'.$data.'.xml';
		if ( file_exists( $content_file ) ) {
			$newimport->fetch_attachments = true; ob_start();
			$newimport->import($content_file); ob_end_clean();				
		} else {
			wp_redirect( admin_url( 'themes.php?page=option-panel.php&import=false' ) );
		}
		
		
		// ---------------------------------
		// Widget Importer (from plugin)
		// ---------------------------------	
		if (class_exists('Widget_Importer_Exporter') ) {
			$widget_file = plugin_dir_path( __FILE__ ) . 'datas/widgets.wie';
			if ( file_exists( $widget_file ) ) {
				$data = implode( '', file( $widget_file ) );
				$data = json_decode( $data );
				wie_import_data( $data );
			}
		}
		
				
	} else if (isset($_REQUEST['done']) && $_REQUEST['done'] == 'last') {
		
		// ---------------------------------
		// Content Import (other files)
		// ---------------------------------
		// Include Custom Importer Class 
		require_once( plugin_dir_path( __FILE__ ) . "wp-importer/wordpress-importer.php");
		
		// Import file 2nd 
		if ($file2nd && $file2nd !== 'default') {
			$newimport2nd = new SR_WP_Import();
			$data2nd = sanitize_file_name($file2nd);
			$content_file2nd = plugin_dir_path( __FILE__ ) . 'datas/'.$data2nd.'.xml';
			if ( file_exists( $content_file2nd ) ) {
				$newimport2nd->fetch_attachments = true; ob_start();
				$newimport2nd->import($content_file2nd); ob_end_clean();				
			} else {
				wp_redirect( admin_url( 'themes.php?page=option-panel.php&import=false' ) );
			}
		}
		
		// Import file 3rd
		if ($file3rd && $file3rd !== 'default') {
			$newimport3rd = new SR_WP_Import();
			$data3rd = sanitize_file_name($file3rd);
			$content_file3rd = plugin_dir_path( __FILE__ ) . 'datas/'.$data3rd.'.xml';
			if ( file_exists( $content_file3rd ) ) {
				$newimport3rd->fetch_attachments = true; ob_start();
				$newimport3rd->import($content_file3rd); ob_end_clean();				
			} else {
				wp_redirect( admin_url( 'themes.php?page=option-panel.php&import=false' ) );
			}
		}
		
		
		
		// ---------------------------------
		// Update Menu Location
		// ---------------------------------
		$nav_location = get_theme_mod( 'nav_menu_locations' ); 
		$menus = wp_get_nav_menus(); 
		
		// Assign Main Menu to location
		if( is_array($menus) ) {
			foreach($menus as $menu) { 
				if( $menu->name == 'Main Menu' ) { $nav_location['primary-menu'] = $menu->term_id; }
			}
		}
		set_theme_mod( 'nav_menu_locations', $nav_location );
		
		
		
		// ---------------------------------
		// Update Menu Custom fields (megamenu + Image)
		// ---------------------------------
		$getMenu = get_term_by('name', 'Main Menu', 'nav_menu');
		$menuId = $getMenu->term_id;
		$theMenu = wp_get_nav_menu_items($menuId);

		$shopItem = "";
		$womenItem = "";
		$accItem = "";
		foreach ($theMenu as $m) {
			if ($m->title == 'Shop' && $m->menu_item_parent == '0') $shopItem = $m->db_id;
			if ($m->title == 'Women' && $m->object == 'product_cat') $womenItem = $m->db_id;
			if ($m->title == 'Accessories' && $m->object == 'product_cat') $accItem = $m->db_id;
		}

		update_post_meta( $shopItem, '_menu_item_megacol', 'megamenu4' );
		update_post_meta( $womenItem, '_menu_item_megaimage', 'http://spab-rice.com/wordpress/kona/demo/wp-content/uploads/2018/10/menu-cat-woman.jpg' );
		update_post_meta( $accItem, '_menu_item_megaimage', 'http://spab-rice.com/wordpress/kona/demo/wp-content/uploads/2018/10/menu-cat-acc.jpg' );
		
		
		
		// ---------------------------------
		// Update Reading Settings
		// ---------------------------------
		$homePage = get_page_by_title( 'Home - Classic' );
		if (!$homePage) { $homePage = get_page_by_title( 'Work' ); }
		$blogPage = get_page_by_title( 'Journal' );
		if( isset($homePage->ID) || isset($blogPage->ID) ) {
			update_option('show_on_front', 'page');
			if( isset($homePage->ID) ) {	update_option('page_on_front',  $homePage->ID); }
			if( isset($blogPage->ID) ) {	update_option('page_for_posts', $blogPage->ID);  }
		}
		
		
		
		// ---------------------------------
		// Update Theme Options
		// ---------------------------------
		if ($options) {
			$option_file = plugin_dir_path( __FILE__ ) . 'datas/'.$options.'.txt';
			$options_content = file_get_contents( $option_file );
			$options = explode("|:|", $options_content);

			foreach ($options as $o) {
				$split_o = explode(";:;", $o);
				$name_o = $split_o[0];
				$val_o = $split_o[1];
				if ($val_o && $val_o !== '') { 
					$val = str_replace('kona_SITE_URL',home_url(),$val_o);
					update_option( $name_o, $val ); }
			}
			update_option( '_sr_optiontree', $options_content );


			// Add option that the import has been done
			update_option( '_sr_import_state', 'true' );
		}
		
		
		
		
		// ---------------------------------
		// Plugin settings
		// ---------------------------------
		
		// woocommerce 
		if (class_exists('Woocommerce') ) {
			$shopPage = get_page_by_title( 'Shop' );
			$cartPage = get_page_by_title( 'Cart' );
			$checkoutPage = get_page_by_title( 'Checkout' );
			$accountPage = get_page_by_title( 'My Account' );
			if( isset($shopPage->ID) ) { update_option('woocommerce_shop_page_id',  $shopPage->ID); }
			if( isset($cartPage->ID) ) { update_option('woocommerce_cart_page_id',  $cartPage->ID); }
			if( isset($checkoutPage->ID) ) { update_option('woocommerce_checkout_page_id',  $checkoutPage->ID); }
			if( isset($accountPage->ID) ) { update_option('woocommerce_myaccount_page_id',  $accountPage->ID); }
			
			update_option('woocommerce_thumbnail_cropping',  "custom");
			update_option('woocommerce_thumbnail_cropping_custom_width',  "3");
			update_option('woocommerce_thumbnail_cropping_custom_height',  "4");
		}
		
		// woo variation swatches
		if (class_exists('Woo_Variation_Swatches') ) {
			$swatches = get_option("woo_variation_swatches");
			$swatches["tooltip"] = 0;
			$swatches["stylesheet"] = 0;
			update_option('woo_variation_swatches',  $swatches);
		}
		
		// woo ajax filter
		if (class_exists('WCAPF') ) {
			$wcapf = get_option("wcapf_settings");
			$wcapf["custom_scripts"] = '
				if (jQuery("#main-shop-grid [class*=\'do-anim\']").length > 0) {
					jQuery("[class*=\'do-anim\']").not(".animated")
					.filter(function(i, d) {
						return  jQuery(d).visible(true, false, false, 100);  // 100 is offset
					}).each(function(i) {
						var thisItem = jQuery(this);
						var delayMulti = 60;
						var delay = i*delayMulti + 100;  // + 150 is to add a small delay
						thisItem.delay(delay).queue(function(){thisItem.addClass("animated");});
					});
				}
				
				jQuery(".wcapf-before-products .isotope-grid").each(function(){
					var $container = jQuery(this);
					$container.find("table").remove();
					var layout = "masonry";
					if ($container.hasClass("fitrows")) { layout = "fitRows"; }
					$container.imagesLoaded( function(){
						$container.isotope({
							layoutMode: layout,
							itemSelector : ".isotope-item",
							masonry: { columnWidth: ".isotope-item:not(.double-width)" }
						});
					});
				});
				
				if(jQuery().unveil && jQuery(".wcapf-before-products img.lazy").length > 0) { 
					jQuery(".wcapf-before-products img.lazy").unveil(50);
				}';
			$wcapf["scroll_to_top"] = null;
			$wcapf["enable_font_awesome"] = null;
			update_option('wcapf_settings',  $wcapf);
		}
		
		// cookie notice
		if (class_exists('Cookie_Notice') ) {
			$cookie = get_option("cookie_notice_options");
			$cookie["hide_effect"] = "slide";
			$cookie["css_style"] = "none";
			update_option('cookie_notice_options',  $cookie);
		}
		
		
		// woo wishlist
		if (class_exists('TInvWL_Admin_Base') ) {
		
			/* general */
			$TIgeneral = get_option("tinvwl-general");
			$TIgeneral["default_title"] = "";
			$TIgeneral["page_wishlist"] = 894; // ID FROM WISHLIST
			$TIgeneral["show_notice"] = "";
			update_option('tinvwl-general',  $TIgeneral);
			
			$TIpage = Array();
			$TIpage["wishlist"] = 894; // ID FROM WISHLIST
			update_option('tinvwl-page',  $TIpage);

			/* single product */
			$TIsingle = get_option("tinvwl-add_to_wishlist");
			$TIsingle["show_preloader"] = "on";
			$TIsingle["show_text"] = "";
			update_option('tinvwl-add_to_wishlist',  $TIsingle);

			/* catalog */
			$TIcatalog = get_option("tinvwl-add_to_wishlist_catalog");
			$TIcatalog["position"] = "above_thumb";
			$TIcatalog["show_preloader"] = "on";
			$TIcatalog["show_text"] = "";
			update_option('tinvwl-add_to_wishlist_catalog',  $TIcatalog);

			/* table */
			$TItable = get_option("tinvwl-table");
			$TItable["colm_checkbox"] = "";
			$TItable["add_all_to_cart"] = "";
			update_option('tinvwl-table',  $TItable);
			$TIptable = get_option("tinvwl-product_table");
			$TIptable["colm_date"] = "";
			update_option('tinvwl-product_table',  $TIptable);

			/* counter */
			$TIcounter = get_option("tinvwl-topline");
			$TIcounter["show_text"] = "";
			$TIcounter["hide_zero_counter"] = "";
			update_option('tinvwl-topline',  $TIcounter);

		}
		
		
		// size guide
		if (class_exists('ctSizeGuideCPT') ) {
			update_option('wc_size_guide_button_priority',  "25");
			update_option('wc_size_guide_button_position',  "ct-position-add-to-cart");
			update_option('wc_size_guide_button_class',  "sr-button-text");
			update_option('wc_size_guide_display_mobile_table',  "ct-size-guide--NonResponsive");
			update_option('wc_size_guide_button_clear',  "1");
		}
		
		
		
		// ---------------------------------
		// Import Slider(s)
		// ---------------------------------
		if(class_exists('RevSlider')){
			$absolute_path = __FILE__;
			$path_to_file = explode( 'wp-content', $absolute_path );
			$path_to_wp = $path_to_file[0];

			require_once( $path_to_wp.'/wp-load.php' );
			require_once( $path_to_wp.'/wp-includes/functions.php');

			$slider_array = array(
				plugin_dir_path( __FILE__ ) . "datas/slider/home-slider-modern.zip",
				plugin_dir_path( __FILE__ ) . "datas/slider/home-slider-elegant.zip",
				plugin_dir_path( __FILE__ ) . "datas/slider/home-slider-creative.zip",
				plugin_dir_path( __FILE__ ) . "datas/slider/home-slider-categories.zip",
				plugin_dir_path( __FILE__ ) . "datas/slider/home-hero-product.zip",
				plugin_dir_path( __FILE__ ) . "datas/slider/home-stylish.zip"
			);
			$slider = new RevSlider();

			foreach($slider_array as $filepath){
				$slider->importSliderFromPost(true,true,$filepath);  
			}
		}
		
				
	}
		
		
	}
}

?>