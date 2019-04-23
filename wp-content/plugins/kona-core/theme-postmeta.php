<?php

/*-----------------------------------------------------------------------------------

	Custom Post/Portfolio Meta boxes

-----------------------------------------------------------------------------------*/


/*-----------------------------------------------------------------------------------*/
/*	Add metaboxes
/*-----------------------------------------------------------------------------------*/
function kona_custom_meta_boxes() { 
 	
	
	# Single Portfolio Options
	add_meta_box(  
        'meta_portfoliosingle', // $id  
        esc_html__('Portfolio Single Settings', 'kona'), // $title  
        'kona_show_meta_portfoliosingle', // $callback  
        'portfolio', // $page  
        'normal', // $context  
        'high'); // $priority 
	
	# Image post type
    add_meta_box(  
        'meta_imageposttype', // $id  
        esc_html__('Image Post Type', 'kona'), // $title  
        'kona_show_meta_imageposttype', // $callback  
        'post', // $page  
        'normal', // $context  
        'high'); // $priority
		
	# Gallery post type
    add_meta_box(  
        'meta_galleryposttype', // $id  
        esc_html__('Gallery Post Type', 'kona'), // $title  
        'kona_show_meta_galleryposttype', // $callback  
        'post', // $page  
        'normal', // $context  
        'high'); // $priority
	
	# Video post type
    add_meta_box(  
        'meta_videoposttype', // $id  
        esc_html__('Video Post Type', 'kona'), // $title  
        'kona_show_meta_videoposttype', // $callback  
        'post', // $page  
        'normal', // $context  
        'high'); // $priority	
		
	# Audio post type
    add_meta_box(  
        'meta_audioposttype', // $id  
        esc_html__('Video Post Type', 'kona'), // $title  
        'kona_show_meta_audioposttype', // $callback  
        'post', // $page  
        'normal', // $context  
        'high'); // $priority	
		
	# Quote post type
    add_meta_box(  
        'meta_quoteposttype', // $id  
        esc_html__('Quote Post Type', 'kona'), // $title  
        'kona_show_meta_quoteposttype', // $callback  
        'post', // $page  
        'normal', // $context  
        'high'); // $priority	
		
		

	# Page Title / Hero / Header
    add_meta_box(  
        'meta_pagetitle', // $id  
        esc_html__('Page Settings', 'kona'), // $title  
        'kona_show_meta_pagetitle', // $callback  
        'page', // $page  
        'normal', // $context  
        'high'); // $priority
	 add_meta_box(  
        'meta_pagetitle', // $id  
        esc_html__('Page Settings', 'kona'), // $title  
        'kona_show_meta_pagetitle', // $callback  
        'post', // $page  
        'normal', // $context  
        'high'); // $priority
	 add_meta_box(  
        'meta_pagetitle', // $id  
        esc_html__('Page Settings', 'kona'), // $title  
        'kona_show_meta_pagetitle', // $callback  
        'portfolio', // $page  
        'normal', // $context  
        'high'); // $priority	
	
	
	# Product 
    add_meta_box(  
        'meta_productsettings', // $id  
        esc_html__('Product Appearance', 'kona'), // $title  
        'kona_show_meta_productsettings', // $callback  
        'product', // $page  
        'normal', // $context  
        'high'); // $priority
	
}  
add_action('add_meta_boxes', 'kona_custom_meta_boxes');





/*-----------------------------------------------------------------------------------*/
/*	Define fields
/*-----------------------------------------------------------------------------------*/

/*  REVSLIDER */
$revolutionslider = array();
$revolutionslider[0] = array( "name" => esc_html__("No Slider", 'kona'), "value" => "false");

if(in_array('revslider/revslider.php', apply_filters('active_plugins', get_option('active_plugins')))){ 

	require_once( WP_CONTENT_DIR . '/plugins/revslider/revslider.php' );		// needed because can't find classes on plugin teritory

	if(class_exists('RevSlider')){
		$slider = new RevSlider();
		$arrSliders = $slider->getArrSliders();
		foreach($arrSliders as $revSlider) { 
			$revolutionslider[] = array( "name" => $revSlider->getTitle(), "value" => $revSlider->getAlias());
		}
	}
	
}
/*  REVSLIDER */
	


$kona_meta_pagetitle = array(
	
	array( "name" => esc_html__("Page Title", 'kona'),
		   "id" => "sr-meta-tab-pagetitle",
		   "type" => "tabstart"
		  ),
		
		array( "label" => esc_html__("Show Pagetitle", 'kona'),
			   "desc" => "",
			   "id" => "_sr_showpagetitle",
			   "type" => "checkbox-hiding",
			   "option" => array( 
					array(	"name" => esc_html__("Yes", 'kona'), 
							"value" => "1"),
					array(	"name" => esc_html__("Hide", 'kona'), 
							"value" => "0")
					),
			   "default" => "1"
			  ),
			  
			array( 	"label" => "Yes",
					"id" => "_sr_showpagetitle",
					"hiding" => "1",	
					"type" => "hidinggroupstart"
				),
				
				array( "label" => esc_html__("Page Title Content", 'kona'),
					   "desc" => "",
					   "id" => "_sr_pagetitletype",
					   "type" => "selectbox-hiding",
					   "option" => array( 
							array(	"name" => esc_html__("Default Pagetitle", 'kona'), 
									"value" => "default"),
							array(	"name" => esc_html__("Custom Title Content (Editor)", 'kona'), 
									"value" => "custom")
							),
					   "default" => "default"
					  ),
					 
					array(  "label" => esc_html__("Title Content width",'kona'),
							"desc" => "",
							"id" => "_sr_titlewidth",
							"type" => "selectbox",
							"option" => array( 
								array(	"name" => esc_html__("Mini wrapper", 'kona'), 
										"value" => "wrapper-mini"),
								array(	"name" => esc_html__("Small wrapper", 'kona'), 
										"value" => "wrapper-small"),
								array(	"name" => esc_html__("Medium wrapper", 'kona'), 
										"value" => "wrapper-medium"),
								array(	"name" => esc_html__("Fullwidth", 'kona'), 
										"value" => "no-wrapper")
								),
					   		"default" => "no-wrapper"
						),  
						
					array( 	"label" => "Default",
							"id" => "_sr_pagetitletype",
							"hiding" => "default",	
							"type" => "hidinggroupstart"
						),
						
						array( 	"label" => esc_html__("Heading Title",'kona'),
								"desc" => esc_html__("Takes the default post title if empty.", 'kona'),
								"id" => "_sr_alttitle",
								"type" => "title",
								"defaultsize" => "h1" 
							),
							
						array( 	"label" => esc_html__("Subtitle",'kona'),
								"desc" => "",
								"id" => "_sr_subtitle",
								"type" => "title",
								"defaultsize" => "h5" 
							),
							
						array(  "label" => esc_html__("Title Arrangement",'kona'),
								"desc" => "",
								"id" => "_sr_titlearrangement",
								"type" => "selectbox",
								"option" => array( 
									array(	"name" => esc_html__("Main Title first/top", 'kona'), 
											"value" => "main"),
									array(	"name" => esc_html__("Subtitle first/top", 'kona'), 
											"value" => "sub")
									)
							),
	
						array(  "label" => esc_html__("Title Spacing",'kona'),
								"desc" => "",
								"id" => "_sr_titlespacing",
								"type" => "selectbox",
								"option" => array( 
									array(	"name" => esc_html__("Default", 'kona')."  (40px)", 
											"value" => "spacer-small"),
									array(	"name" => esc_html__("Small", 'kona')."  (20px)", 
											"value" => "spacer-mini"),
									array(	"name" => esc_html__("No", 'kona')."", 
											"value" => "0")
									)
							),
							
						array(  "label" => esc_html__("Title Aligment",'kona'),
								"desc" => "",
								"id" => "_sr_titlealignment",
								"type" => "selectbox",
								"option" => array( 
									array(	"name" => esc_html__("Left align", 'kona'), 
											"value" => "align-left"),
									array(	"name" => esc_html__("Center align", 'kona'), 
											"value" => "align-center"),
									array(	"name" => esc_html__("Right align", 'kona'), 
											"value" => "align-right")
									)
							),
							
					array( 	"label" => "Default",
							"id" => "_sr_pagetitletype",
							"hiding" => "default",	
							"type" => "hidinggroupend"
						),
						
					array( 	"label" => "custom",
							"id" => "_sr_pagetitletype",
							"hiding" => "custom",	
							"type" => "hidinggroupstart"
						),
							
						array( 	"label" => "",
								"desc" => "",
								"id" => "_sr_customtitle",
								"type" => "editor"
							),
							
					array( 	"label" => "custom",
							"id" => "_sr_pagetitletype",
							"hiding" => "custom",	
							"type" => "hidinggroupend"
						),
						
					array(  "label" => esc_html__("Title Position",'kona'),
							"desc" => esc_html__("Choose a vertical position relative to your hero section", 'kona'),
							"id" => "_sr_titleposition",
							"type" => "selectbox",
							"option" => array( 
								array(	"name" => esc_html__("Top", 'kona'), 
										"value" => "title-top"),
								array(	"name" => esc_html__("Center", 'kona'), 
										"value" => "title-center"),
								array(	"name" => esc_html__("Bottom", 'kona'), 
										"value" => "title-bottom")
								)
						),
			
			array( 	"label" => "Yes",
					"id" => "_sr_showpagetitle",
					"hiding" => "1",	
					"type" => "hidinggroupend"
				),
		  
	array( "id" => "sr-meta-tab-pagetitle",
		   "type" => "tabend"
		  ),
		  
	array( "name" => esc_html__("Hero Settings", 'kona'),
		   "id" => "sr-meta-tab-hero",
		   "type" => "tabstart"
		  ),
		  
			array(  "label" => esc_html__("Hero Type", 'kona'),
					"desc" => "",
					'id'    => '_sr_herobackground',  
					'type'  => 'selectbox-hiding' ,
					'option' => array( 
						array(	"name" => esc_html__("No Background", 'kona'), 
								"value"=> "default"),
						array(	"name" => esc_html__("Color Background", 'kona'), 
								"value"=> "color"),
						array(	"name" => esc_html__("Image Background", 'kona'), 
								"value"=> "image"),
						array(	"name" => esc_html__("Selfhosted Video Background", 'kona'), 
								"value"=> "selfhosted"),
						array(	"name" => esc_html__("Youtube Video Background", 'kona'), 
								"value"=> "youtube"),
						array(	"name" => esc_html__("Vimeo Video Background", 'kona'), 
								"value"=> "vimeo"),
						/*array(	"name" => esc_html__("Portfolio Slider", 'kona'), 
								"value"=> "portfolioslider"),
						array(	"name" => esc_html__("Blog Slider", 'kona'), 
								"value"=> "blogslider"),*/
						array(	"name" => esc_html__("Revolution Slider", 'kona'), 
								"value"=> "slider"),
						array(	"name" => esc_html__("Google Map", 'kona'), 
								"value"=> "map")
						)
					),
									
				// COLOR BG	
				array( 	"id" => "_sr_herobackground",
						"hiding" => "color",	
						"type" => "hidinggroupstart"
						),
									
					array(	'label' => esc_html__("Background Color", 'kona'),  
							'desc'  => esc_html__("Choose a background for your page title", 'kona'),  
							'id'    => '_sr_color_bgcolor',  
							'type'  => 'color', 
							),
				
				array(	"id" => "_sr_herobackground",
						"type" => "hidinggroupend"
						),
						
				
				// IMAGE BG	
				array( 	"id" => "_sr_herobackground",
						"hiding" => "image",	
						"type" => "hidinggroupstart"
						),
									
					array(  'label' => esc_html__("Background Image", 'kona'),  
							'desc'  => "",  
							'id'    => '_sr_image_bgimage',  
							'type'  => 'image', 
							),
						
					array(  'label' => esc_html__("Image type (effect)", 'kona'),  
							'desc'  => "",  
							'id'    => '_sr_image_type', 
							'type'  => 'checkbox-hiding', 
							'option' => array( 
								array(	"name" => esc_html__("Parallax", 'kona'), 
										"value" => "parallax"),
								array(	"name" => esc_html__("Normal", 'kona'), 
										"value" => "normal"),
								array(	"name" => esc_html__("Pattern", 'kona'), 
										"value" => "pattern")
								),
							'default'  => 'parallax', 
							),
							
						array( 	"id" => "_sr_image_type",
								"hiding" => "pattern",	
								"type" => "hidinggroupstart"
								),
								
								array(  'label' => " ",  
										'desc'  => esc_html__("To enable retina for the pattern, you need to upload an image with '@2x' in its name.  Example: pattern@2x.jpg.  In this case, the image will be descrease by half of it size.", 'kona'),  
										'id'    => '_sr_pattern_retina', 
										'type'  => 'info'
										),
								
						array( 	"id" => "_sr_image_type",
								"hiding" => "pattern",	
								"type" => "hidinggroupend"
								),
				
				array(	"id" => "_sr_herobackground",
						"type" => "hidinggroupend"
						),
						
						
				// VIDEO Selfhosted	
				array( 	"id" => "_sr_herobackground",
						"hiding" => "selfhosted",	
						"type" => "hidinggroupstart"
						),
									
					array(  'label' => esc_html__("MP4 file url", 'kona'),  
							'desc'  => esc_html__("The url to the MP4 file", 'kona'),  
							'id'    => '_sr_video_mp4',  
							'type'  => 'video', 
						),
					array(  'label' => esc_html__("WEBM file url", 'kona'),  
							'desc'  => esc_html__("The url to the WEBM file", 'kona'),  
							'id'    => '_sr_video_wbm',  
							'type'  => 'video', 
						),
					array(  'label' => esc_html__("OGV file url", 'kona'),  
							'desc'  => esc_html__("The url to the OGV file", 'kona'),  
							'id'    => '_sr_video_ogv',  
							'type'  => 'video', 
						),
				
				array(	"id" => "_sr_herobackground",
						"type" => "hidinggroupend"
						),
						
				
				// VIDEO Youtube	
				array( 	"id" => "_sr_herobackground",
						"hiding" => "youtube",	
						"type" => "hidinggroupstart"
						),
									
					array(  'label' => esc_html__("Youtube Video ID", 'kona'),  
							'desc'  => esc_html__("Enter the right of id of the youtube video", 'kona'),  
							'id'    => '_sr_video_youtube',  
							'type'  => 'text', 
						),
				
				array(	"id" => "_sr_herobackground",
						"type" => "hidinggroupend"
						),
						
						
				// VIDEO Vimeo	
				array( 	"id" => "_sr_herobackground",
						"hiding" => "vimeo",	
						"type" => "hidinggroupstart"
						),
									
					array(  'label' => esc_html__("Vimeo Video ID", 'kona'),  
							'desc'  => esc_html__("Enter the right of id of the vimeo video", 'kona'),  
							'id'    => '_sr_video_vimeo',  
							'type'  => 'text', 
						),
				
				array(	"id" => "_sr_herobackground",
						"type" => "hidinggroupend"
						),
						
						
				array( 	"id" => "_sr_herobackground",
						"hiding" => "selfhosted youtube vimeo",	
						"type" => "hidinggroupstart"
						),
						
					array(  'label' => esc_html__("Video Ratio", 'kona'),  
							'desc'  => '<span style="color:red;">'.esc_html__("If you want the video to keep always their original ratios, no matter the screensize, you need to select 'Boxed Auto' for the Hero Appearance.", 'kona').'</span>', 
							'id'    => '_sr_video_ratio', 
							'type'  => 'selectbox', 
							'option' => array( 
								array(	"name" => "4/3", 
										"value" => "4/3"),
								array(	"name" => "16/9", 
										"value" => "16/9"),
								array(	"name" => "21/9", 
										"value" => "21/9")
								),
							'default'  => '16/9', 
							),
							
					array(  'label' => esc_html__("Loop Video", 'kona'),  
							'desc'  => "",  
							'id'    => '_sr_video_loop', 
							'type'  => 'checkbox'
							),
							
					array(  'label' => esc_html__("Sound", 'kona'),  
							'desc'  => esc_html__("If on, a button will be displayed, to enable the visitor to turn it on/off", 'kona'),  
							'id'    => '_sr_video_mute', 
							'type'  => 'checkbox',
							'option' => array( 
								array(	"name" => "On", 
										"value" => "1"),
								array(	"name" => "Off", 
										"value" => "0")
								),
							'default'  => '0', 
							),
	
					array(  'label' => esc_html__("Play / Pause Control", 'kona'),  
							'desc'  => "",  
							'id'    => '_sr_video_playpause', 
							'type'  => 'checkbox-hiding',
							'option' => array( 
								array(	"name" => "Yes", 
										"value" => "1"),
								array(	"name" => "No", 
										"value" => "0")
								),
							'default'  => '0', 
							),
                        array( 	"id" => "_sr_video_playpause",
                                "hiding" => "1",	
                                "type" => "hidinggroupstart"
                                ),
                            array(  'label' => esc_html__("Play option on mobile devices", 'kona'),  
                                    'desc'  => esc_html__("Mobile devices do not support video backgrounds yet.  Do you want to enable a play option for mobile devices?", 'kona'),    
                                    'id'    => '_sr_video_play_mobile', 
                                    'type'  => 'checkbox',
                                    'option' => array( 
                                        array(	"name" => "Yes", 
                                                "value" => "1"),
                                        array(	"name" => "No", 
                                                "value" => "0")
                                        ),
                                    'default'  => '0', 
                                    ),
                        array( 	"id" => "_sr_video_playpause",
                                "hiding" => "1",	
                                "type" => "hidinggroupend"
                                ),
							
					array(  'label' => esc_html__("Video Poster Image", 'kona'),  
							'desc'  => esc_html__("This image will be displayed on mobile devices", 'kona'),  
							'id'    => '_sr_video_poster',  
							'type'  => 'image', 
							),
							
					array(	'label' => esc_html__("Video Overlay Color", 'kona'),  
							'desc'  => "",  
							'id'    => '_sr_video_overlaycolor',  
							'type'  => 'color', 
							),
							
					array(  'label' => esc_html__("Video Overlay opacity", 'kona'),  
							'desc'  => esc_html__("Choose the opacity for the overlay color", 'kona'),  
							'id'    => '_sr_video_overlayopacity', 
							'type'  => 'selectbox', 
							'option' => array( 
								array(	"name" => "0.1", 
										"value" => "0.1"),
								array(	"name" => "0.2", 
										"value" => "0.2"),
								array(	"name" => "0.3", 
										"value" => "0.3"),
								array(	"name" => "0.4", 
										"value" => "0.4"),
								array(	"name" => "0.5", 
										"value" => "0.5"),
								array(	"name" => "0.6", 
										"value" => "0.6"),
								array(	"name" => "0.7", 
										"value" => "0.7"),
								array(	"name" => "0.8", 
										"value" => "0.8"),
								array(	"name" => "0.9", 
										"value" => "0.9")	
								)
						),
						
				array(	"id" => "_sr_herobackground",
						"type" => "hidinggroupend"
						),
						
						
				// Portfolio / Blog Slider	
				array( 	"id" => "_sr_herobackground",
						"hiding" => "portfolioslider blogslider",	
						"type" => "hidinggroupstart"
						),
	
					array(	'label' => esc_html__("Slides", 'kona'),  
							'desc'  => esc_html__("How many slides?  Your 'x' latest items will be shown.", 'kona'),  
							'id'    => '_sr_themeslider_slides', 
							'type'  => 'selectbox', 
							'option' => array( 
								array(	"name" => "1", 
										"value" => "1"),
								array(	"name" => "2", 
										"value" => "2"),
								array(	"name" => "3", 
										"value" => "3"),
								array(	"name" => "4", 
										"value" => "4"),
								array(	"name" => "5", 
										"value" => "5")
								)
							),
	
					array(	'label' => esc_html__("Slider Arrows", 'kona'),  
							'desc'  => esc_html__("Show the slider arrows", 'kona'),  
							'id'    => '_sr_themeslider_arrows', 
							'type'  => 'checkbox', 
							'option' => array( 
								array(	"name" => "Yes", 
										"value" => "1"),
								array(	"name" => "No", 
										"value" => "0")
								)
							),
	
					array(	'label' => esc_html__("Slider Bullets", 'kona'),  
							'desc'  => esc_html__("Show the slider bullets", 'kona'),  
							'id'    => '_sr_themeslider_bullets', 
							'type'  => 'checkbox', 
							'option' => array( 
								array(	"name" => "Yes", 
										"value" => "1"),
								array(	"name" => "No", 
										"value" => "0")
								)
							),
	
					array(  "label" => esc_html__("Title Size", 'kona'),
							"desc" => "",
							"id" => "_sr_themeslider_titlesize",
							"type" => "selectbox",
							"option" => array( 
								array(	"name" => esc_html__("h1", 'kona'), 
										"value" => "h1"),
								array(	"name" => esc_html__("h2", 'kona'), 
										"value" => "h2"),
								array(	"name" => esc_html__("h3", 'kona'), 
										"value" => "h3"),
								array(	"name" => esc_html__("h4", 'kona'), 
										"value" => "h4")
								)
						),
	
				array(	"id" => "_sr_herobackground",
						"type" => "hidinggroupend"
						),
	
				array( 	"id" => "_sr_herobackground",
						"hiding" => "blogslider",	
						"type" => "hidinggroupstart"
						),
	
					array(  "label" => esc_html__("Show Category", 'kona'),
							'desc'  => "",  
							'id'    => '_sr_themeslider_category',  
							'type'  => 'checkbox' ,
							'option' => array( 
								array(	"name" => esc_html__("Yes", 'kona'), 
										"value" => "1"),
								array(	"name" => esc_html__("No", 'kona'), 
										"value" => "0")
								)
							),
	
				array(	"id" => "_sr_herobackground",
						"type" => "hidinggroupend"
						),
						
						
				// Revolution Slider	
				array( 	"id" => "_sr_herobackground",
						"hiding" => "slider",	
						"type" => "hidinggroupstart"
						),
						
					array(  'label' => esc_html__("Select Slider", 'kona'),  
							'desc'  => "",  
							'id'    => '_sr_slider', 
							'type'  => 'selectbox', 
							'option' => $revolutionslider 
							),
	
					array(	'label' => esc_html__("Hero Appearence", 'kona'),  
							'desc'  => "",  
							'id'    => '_sr_herosliderappearance', 
							'type'  => 'selectbox-custom-hiding', 
							'option' => array( 
								array(	"name" => esc_html__("Boxed", 'kona'), 
										"value" => "hero-boxedauto",
									 	"image" => "hero-boxedauto.png"),
								array(	"name" => esc_html__("Full", 'kona'), 
										"value" => "hero-fullwidth",
									 	"image" => "hero-fullscreen.png")
								),
						  	'default' => 'hero-boxedauto'
							),
	
						array( 	"id" => "_sr_herosliderappearance",
								"hiding" => "hero-boxedauto",	
								"type" => "hidinggroupstart"
								),
	
							array(  'label' => "",  
									'desc'  => esc_html__("Please make sure to choose 'Auto' for your slide layout option in your slider settings", 'kona'),  
									'type'  => 'info',
									'id'  => '' 
									),
	
						array( 	"id" => "_sr_herosliderappearance",
								"type" => "hidinggroupend"
								),
	
						array( 	"id" => "_sr_herosliderappearance",
								"hiding" => "hero-fullwidth",	
								"type" => "hidinggroupstart"
								),
	
							array(	'label' => esc_html__("Header / Menu Appearence", 'kona'),  
									'desc'  => esc_html__("Do you want the header/menu to be dark or light on first load?", 'kona'),   
									'id'    => '_sr_herosliderheader', 
									'type'  => 'selectbox', 
									'option' => array( 
										array(	"name" => esc_html__("Dark", 'kona'), 
												"value" => "dark"),
										array(	"name" => esc_html__("Light", 'kona'), 
												"value" => "light")
										),
									'default' => 'dark'
									),
	
						array( 	"id" => "_sr_herosliderappearance",
								"type" => "hidinggroupend"
								),
				
				array(	"id" => "_sr_herobackground",
						"type" => "hidinggroupend"
						),
						
						
				// Google Map
				array( 	"id" => "_sr_herobackground",
						"hiding" => "map",	
						"type" => "hidinggroupstart"
						),
						
					array(
							'label' => esc_html__("Your API Key", 'kona'),  
							'desc'  => esc_html__("Since June 2016 you need to create an API Key", 'kona'), 
							"id" => "_sr_mapapikey",
							'type' => 'text',
							'sendval' => true
						),
						
						array(
							'label' => esc_html__("Latitude & Longitude", 'kona'),  
							'desc'  => esc_html__("Enter the google map latitude & longitude 'seperated by a comma' using this tool: http://itouchmap.com/latlong.html", 'kona'), 
							"id" => "_sr_maplatlong",
							'type' => 'text',
						),
									
						array( 	"label" => "Popup Text",
								"desc" => "",
								"id" => "_sr_mappopup",
								"type" => "editor"
							),
						
						array(
							'label' => esc_html__("Pin Icon", 'kona'),  
							'desc'  => "",  
							"id" => "_sr_mappin",
							'type' => 'image',
						),
						
						array(
							'label' => esc_html__("Zoom", 'kona'),  
							'desc'  => "",  
							"id" => "_sr_mapzoom",
							'type' => 'text',
							'default' => '14'
						),
						
						array(
							'label' => esc_html__('Map Style', 'kona'),
							'desc' => '',
							"id" => "_sr_mapstyle",
							'type' => 'selectbox',
							'option' => array( 
								array(	'name' =>esc_html__('Default', 'kona'), 
										'value' => 'default'),			 	
								array(	'name' => esc_html__('Greyscale', 'kona'), 
										'value'=> 'greyscale'),
								array(	'name' => esc_html__('Satelite', 'kona'), 
										'value'=> 'satelite')
								),
							'default' => 'default'
						),
				
				array(	"id" => "_sr_herobackground",
						"type" => "hidinggroupend"
						),
						
						
				array( 	"id" => "_sr_herobackground",
						"hiding" => "color image selfhosted youtube vimeo",	
						"type" => "hidinggroupstart"
						),
							
					array(	'label' => esc_html__("Text Color", 'kona'),  
							'desc'  => esc_html__("Choose Text color depending on your background", 'kona'),  
							'id'    => '_sr_herotextcolor', 
							'type'  => 'selectbox', 
							'option' => array( 
								array(	"name" => esc_html__("Light", 'kona'), 
										"value" => "text-light"),
								array(	"name" => esc_html__("Dark", 'kona'), 
										"value" => "text-dark")
								)
							),
				
				array(	"id" => "_sr_herobackground",
						"type" => "hidinggroupend"
						),
			
				
				array( 	"id" => "_sr_herobackground",
						"hiding" => "default color image selfhosted youtube vimeo portfolioslider blogslider map",	
						"type" => "hidinggroupstart"
						),
									
					array(	'label' => esc_html__("Hero Appearence", 'kona'),  
							'desc'  => "",  
							'id'    => '_sr_heroappearance', 
							'type'  => 'selectbox-custom-hiding', 
							'option' => array( 
								array(	"name" => esc_html__("Boxed Auto", 'kona'), 
										"value" => "hero-boxedauto",
									 	"image" => "hero-boxedauto.png"),
								array(	"name" => esc_html__("Boxed Full Height", 'kona'), 
										"value" => "hero-boxedfull",
									 	"image" => "hero-boxedfull.png"),
								array(	"name" => esc_html__("Full Width", 'kona'), 
										"value" => "hero-fullwidth",
									 	"image" => "hero-fullwidth.png"),
								array(	"name" => esc_html__("Full Screen", 'kona'), 
										"value" => "hero-fullscreen",
									 	"image" => "hero-fullscreen.png")
								)
							),
												
				array(	"id" => "_sr_herobackground",
						"type" => "hidinggroupend"
						),			
		  
	array( "id" => "sr-meta-tab-hero",
		   "type" => "tabend"
		  )
	
); // END $kona_meta_pagetitle  



$kona_meta_portfoliosingle = array(
	
	array( "name" => esc_html__("Grid Options", 'kona'),
		   "id" => "sr-meta-tab-gridoptions",
		   "type" => "tabstart"
		  ),
	
		array(  "label" => esc_html__("Tile Width", 'kona'),
				"desc" => '<span style="font-size: 10px; line-height: 12px;">'.esc_html__("Double Height + Ratio is only possible if you choose an 'Equal' grid layout in your portfolio grid settings", 'kona').'<br><br><span style="color: red;">'.esc_html__("If this doesn't have any impact you probably forced the Tile Size in the portfolio grid settings.", 'kona').'</span></span>',
				"id" => "_sr_singlegridsize",
				"type" => "selectbox-custom",
				"option" => array( 
					array(	"name" => esc_html__("Normal Ratio", 'kona'), 
							"value" => "normal",
						 	"image" => "tile-normal.png"),
					array(	"name" => esc_html__("Double Width", 'kona'), 
							"value" => "double-width",
						 	"image" => "tile-doublewidth.png"),
					array(	"name" => esc_html__("Double Height", 'kona'), 
							"value" => "double-height",
						 	"image" => "tile-doubleheight.png"),
					array(	"name" => esc_html__("Double Ratio", 'kona'), 
							"value" => "double-width double-height",
						 	"image" => "tile-double.png")
					)
				),
		  
		array(  "label" => esc_html__("Link to?", 'kona'),
				"desc" => esc_html__("Where should the thumbnail in the grid link to?", 'kona'),
				"id" => "_sr_linktype",
				"type" => "selectbox-hiding",
				"option" => array( 
					array(	"name" => esc_html__("Single Project (default)", 'kona'), 
							"value" => "default"),
					array(	"name" => esc_html__("Custom URL", 'kona'), 
							"value" => "url"),
					array(	"name" => esc_html__("Open Lightbox", 'kona'), 
							"value" => "lightbox")
					)
				),
				
				array( 	"id" => "_sr_linktype",
						"hiding" => "url",	
						"type" => "hidinggroupstart"
						),
						
					array(  "label" => esc_html__("Url", 'kona'),
							"desc" => esc_html__("Start with http://", 'kona'),
							"id" => "_sr_linkurl",  
							"type"  => "text" 
						),
						
					array(  "label" => esc_html__("Target", 'kona'),
							"desc" => "",
							"id" => "_sr_linktarget",  
							"type" => "checkbox",
							"option" => array( 
								array(	"name" => esc_html__("Same Window", 'kona'), 
										"value" => "_self"),
								array(	"name" => esc_html__("New Window", 'kona'), 
										"value" => "_blank")
								)
						),
						
				array( 	"id" => "_sr_linktype",
						"hiding" => "url",	
						"type" => "hidinggroupend"
						),
						
				array( 	"id" => "_sr_linktype",
						"hiding" => "lightbox",	
						"type" => "hidinggroupstart"
						),
						
					array(  "label" => esc_html__("Lightbox type", 'kona'),
							"desc" => "",
							"id" => "_sr_lightboxtype",
							"type" => "selectbox-hiding",
							"option" => array( 
								array(	"name" => esc_html__("Image", 'kona'), 
										"value" => "image"),
								array(	"name" => esc_html__("Selfhosted Video", 'kona'), 
										"value" => "selfhosted"),
								array(	"name" => esc_html__("Youtube Video", 'kona'), 
										"value" => "youtube"),
								array(	"name" => esc_html__("Vimeo Video", 'kona'), 
										"value" => "vimeo")
								)
							),
						
						array( 	"id" => "_sr_lightboxtype",
								"hiding" => "image",	
								"type" => "hidinggroupstart"
								),
								
							array(  "label" => esc_html__("Image", 'kona'),
									"desc" => "",
									"id" => "_sr_lightboximage",  
									"type"  => "image"  
								),
								
							array(  "label" => esc_html__("Show Caption", 'kona'),
									"desc" => esc_html__("Lightbox will show the caption.  Go to your media library and edit/add the caption.", 'kona'),
									"id" => "_sr_lightboxcaption",  
									"type"  => "checkbox" ,
									"option" => 	array(
										array(	"name" => esc_html__("Yes", 'kona'), 
												"value" => "1"),
										array(	"name" => esc_html__("No", 'kona'), 
												"value" => "0")
										),
									"default" => "0"
								),
						
						array( 	"id" => "_sr_lightboxtype",
								"hiding" => "image",	
								"type" => "hidinggroupend"
								),
								
						array( 	"id" => "_sr_lightboxtype",
								"hiding" => "selfhosted",	
								"type" => "hidinggroupstart"
								),
								
							array(  "label" => esc_html__("Video", 'kona'),
									"desc" => esc_html__("Select your mp4 video file", 'kona'),
									"id" => "_sr_lightboxmp4",  
									"type"  => "video"  
								),
						
						array( 	"id" => "_sr_lightboxtype",
								"hiding" => "selfhosted",	
								"type" => "hidinggroupend"
								),
								
						array( 	"id" => "_sr_lightboxtype",
								"hiding" => "youtube vimeo",	
								"type" => "hidinggroupstart"
								),
								
							array(  "label" => esc_html__("Video ID", 'kona'),
									"desc" => esc_html__("Enter your youtube or vimeo ID", 'kona'),
									"id" => "_sr_lightboxvideo",  
									"type"  => "text"  
								),
						
						array( 	"id" => "_sr_lightboxtype",
								"hiding" => "youtube vimeo",	
								"type" => "hidinggroupend"
								),
						
				array( 	"id" => "_sr_linktype",
						"hiding" => "lightbox",	
						"type" => "hidinggroupend"
						),
		  
	array( "name" => esc_html__("Grid Options", 'kona'),
		   "id" => "sr-meta-tab-gridoptions",
		   "type" => "tabend"
		  ),
		  
	array( "name" => esc_html__("Caption & Hover", 'kona'),
		   "id" => "sr-meta-tab-singlecaption",
		   "type" => "tabstart"
		  ),
				  		  
		array(  "label" => esc_html__("Caption Settings", 'kona'),
				"desc" => "",
				"id" => "_sr_singlecaptionappearance",
				"type" => "selectbox-hiding",
				"option" => array( 
					array(	"name" => esc_html__("Use default from grid settings", 'kona'), 
							"value" => "inherit"),
					array(	"name" => esc_html__("Custom caption settings", 'kona'), 
							"value" => "custom")
					)
				),
										
				array( 	"id" => "_sr_singlecaptionappearance",
						"hiding" => "custom",	
						"type" => "hidinggroupstart"
						),
						
					array(  "label" => "",
							"desc" => '<div class="important"><strong>Note</strong>: '.esc_html__("If these settings don't have any effect on your item, you probably forced the caption grid settings.  Please check your grid settings.", 'kona').'</div>',
							"id" => "",  
							"type"  => "info"  
						),	
												
					array( "label" => esc_html__("Caption Option", 'kona'),
						   "desc" => "",
						   "id" => "_sr_customhovercaption",
						   "type" => "selectbox-hiding",
						   "option" => array( 
								array(	"name" => esc_html__("Show caption on hover", 'kona'), 
										"value"=> "onhover"),
								array(	"name" => esc_html__("Always show caption", 'kona'), 
										"value" => "onstart"),
								array(	"name" => esc_html__("Display caption below the thumb", 'kona'), 
										"value" => "belowthumb"),
								array(	"name" => esc_html__("Hide caption", 'kona'), 
										"value" => "hide")
								)
						  ),
						  						  
						array( 	"id" => "_sr_customhovercaption",
								"hiding" => "onhover onstart",	
								"type" => "hidinggroupstart"
								),
								
								array(  "label" => esc_html__("Caption Position", 'kona'),
										"desc" => esc_html__("Choose a vertical caption position.", 'kona'),
										"id" => "_sr_customcaptionposition",
										"type" => "selectbox",
										"option" => array( 
											array(	"name" => esc_html__("Top", 'kona'), 
													"value" => "top"),
											array(	"name" => esc_html__("Center", 'kona'), 
													"value" => "center"),
											array(	"name" => esc_html__("Bottom", 'kona'), 
													"value" => "bottom")
											),
										"default" => "bottom"
									),
									  
								array(  "label" => esc_html__("Caption Alignment", 'kona'),
										"desc" => "",
										"id" => "_sr_customcaptionalignment",
										"type" => "selectbox",
										"option" => array( 
											array(	"name" => esc_html__("Left align", 'kona'), 
													"value" => "align-left"),
											array(	"name" => esc_html__("Center align", 'kona'), 
													"value" => "align-center"),
											array(	"name" => esc_html__("Right align", 'kona'), 
													"value" => "align-right")
											)
									),
									
								array(  "label" => esc_html__("Show Category OR Subtitle", 'kona'),
										"desc" => "",
										"id" => "_sr_customcaptioncategory",
										"type" => "checkbox",
										"option" => array( 
											array(	"name" => esc_html__("Category", 'kona'), 
													"value" => "1"),
											array(	"name" => esc_html__("Subtitle", 'kona'), 
													"value" => "2"),
											array(	"name" => esc_html__("None", 'kona'), 
													"value" => "0")
											)
									),
								
						array( 	"id" => "_sr_customhovercaption",
								"hiding" => "onhover onstart",
								"type" => "hidinggroupend"
								),
													
						array( 	"id" => "_sr_customhovercaption",
								"hiding" => "onstart",	
								"type" => "hidinggroupstart"
								),
														  
								array(  "label" => esc_html__("Caption text color", 'kona'),
										"desc" => "",
										"id" => "_sr_customcaptioncolor",
										"type" => "selectbox",
										"option" => array( 
											array(	"name" => esc_html__("Light", 'kona'), 
													"value"=> "caption-light"),
											array(	"name" => esc_html__("Dark", 'kona'), 
													"value" => "caption-dark"),
											)
									),
														
						array( 	"id" => "_sr_customhovercaption",
								"hiding" => "onstart",
								"type" => "hidinggroupend"
								),
	
				array( 	"id" => "_sr_singlecaptionappearance",
						"hiding" => "custom",	
						"type" => "hidinggroupend"
						),
	
		array(  "label" => esc_html__("Hover Settings", 'kona'),
				"desc" => "",
				"id" => "_sr_singlehoverappearance",
				"type" => "selectbox-hiding",
				"option" => array( 
					array(	"name" => esc_html__("Use default from grid settings", 'kona'), 
							"value" => "inherit"),
					array(	"name" => esc_html__("Custom hover settings", 'kona'), 
							"value" => "custom")
					)
				),
	
				array( 	"id" => "_sr_singlehoverappearance",
						"hiding" => "custom",	
						"type" => "hidinggroupstart"
						),
								
						array( "label" => esc_html__("Hover Type / Color", 'kona'),
							   "desc" => "",
							   "id" => "_sr_customhovercolor",
							   "type" => "selectbox-hiding",
							   "option" => array( 
									array(	"name" => esc_html__("Light", 'kona'), 
											"value"=> "overlay-color"),
									array(	"name" => esc_html__("Dark", 'kona'), 
											"value" => "overlay-color text-light"),
									array(	"name" => esc_html__("Custom Color", 'kona'), 
											"value" => "overlay-color-custom"),
									array(	"name" => esc_html__("Video Hover", 'kona'), 
											"value" => "video"),
									array(	"name" => esc_html__("Image hover (gif)", 'kona'), 
											"value" => "image"),
									array(	"name" => esc_html__("No hover color", 'kona'), 
											"value" => "no-overlay")
									)
							  ),
							  									
							array( 	"id" => "_sr_customhovercolor",
									"hiding" => "overlay-color-custom",	
									"type" => "hidinggroupstart"
									),
	
									array(  "label" => esc_html__("Custom Hover Color", 'kona'),
											"desc" => "",
											"id" => "_sr_customhovercoloroverlay",
											"type" => "color"
										),
	
									array(  "label" => esc_html__("Custom caption text color (on hover)", 'kona'),
											"desc" => "",
											"id" => "_sr_customhovercolorcaption",
											"type" => "selectbox",
											"option" => array( 
												array(	"name" => esc_html__("Light", 'kona'), 
														"value" => "text-light"),
												array(	"name" => esc_html__("Dark", 'kona'), 
														"value" => "text-dark")
												)
										),
	
									array(  "label" => esc_html__("Opacity", 'kona'),
											"desc" => "",
											"id" => "_sr_customhovercoloropacity",
											"type" => "selectbox",
											"option" => array( 
												array(	"name" => "0.5", 
														"value" => "0.5"),
												array(	"name" => "0.6", 
														"value" => "0.6"),
												array(	"name" => "0.7", 
														"value" => "0.7"),
												array(	"name" => "0.8", 
														"value" => "0.8"),
												array(	"name" => "0.9", 
														"value" => "0.9"),
												array(	"name" => "1", 
														"value" => "1")
												),
											'default'  => '0.8'
										),
	
							array( 	"id" => "_sr_customhovercolor",
									"hiding" => "overlay-color-custom",	
									"type" => "hidinggroupend"
									),
	
	
							array( 	"id" => "_sr_customhovercolor",
									"hiding" => "video",	
									"type" => "hidinggroupstart"
									),
									
									array(  "label" => esc_html__("Video type", 'kona'),
											"desc" => "",
											"id" => "_sr_videohover",
											"type" => "selectbox-hiding",
											"option" => array( 
												array(	"name" => esc_html__("Selfhosted", 'kona'), 
														"value" => "html5"),
												array(	"name" => esc_html__("Youtube", 'kona'), 
														"value" => "youtube"),
												array(	"name" => esc_html__("Vimeo", 'kona'), 
														"value" => "vimeo")
												)
										),
									
										// VIDEO Selfhosted	
										array( 	"id" => "_sr_videohover",
												"hiding" => "html5",	
												"type" => "hidinggroupstart"
												),
															
											array(  'label' => esc_html__("MP4 file url", 'kona'),  
													'desc'  => esc_html__("The url to the MP4 file", 'kona'),  
													'id'    => '_sr_videohovermp4',  
													'type'  => 'video', 
												),
											array(  'label' => esc_html__("WEBM file url", 'kona'),  
													'desc'  => esc_html__("The url to the WEBM file", 'kona'),  
													'id'    => '_sr_videohoverwebm',  
													'type'  => 'video', 
												),
											array(  'label' => esc_html__("OGV file url", 'kona'),  
													'desc'  => esc_html__("The url to the OGV file", 'kona'),  
													'id'    => '_sr_videohoverogv',  
													'type'  => 'video', 
												),
										
										array(	"id" => "_sr_videohover",
												"type" => "hidinggroupend"
												),
												
										
										// VIDEO Youtube	
										array( 	"id" => "_sr_videohover",
												"hiding" => "youtube",	
												"type" => "hidinggroupstart"
												),
															
											array(  'label' => esc_html__("Youtube Video ID", 'kona'),  
													'desc'  => esc_html__("Enter the right of id of the youtube video", 'kona'),  
													'id'    => '_sr_videohoveryoutube',  
													'type'  => 'text', 
												),
										
										array(	"id" => "_sr_videohover",
												"type" => "hidinggroupend"
												),
												
												
										// VIDEO Vimeo	
										array( 	"id" => "_sr_videohover",
												"hiding" => "vimeo",	
												"type" => "hidinggroupstart"
												),
															
											array(  'label' => esc_html__("Vimeo Video ID", 'kona'),  
													'desc'  => esc_html__("Enter the right of id of the vimeo video", 'kona'),  
													'id'    => '_sr_videohovervimeo',  
													'type'  => 'text', 
												),
										
										array(	"id" => "_sr_videohover",
												"type" => "hidinggroupend"
												),
												
										array(  'label' => esc_html__("Video Ratio", 'kona'),  
												'desc'  => "",  
												'id'    => '_sr_videohoverratio', 
												'type'  => 'selectbox', 
												'option' => array( 
													array(	"name" => "4/3", 
															"value" => "4/3"),
													array(	"name" => "16/9", 
															"value" => "16/9"),
													array(	"name" => "21/9", 
															"value" => "21/9")
													),
												'default'  => '16/9'
												),
															
							array( 	"id" => "_sr_customhovercolor",
									"hiding" => "video",
									"type" => "hidinggroupend"
									),
									
							array( 	"id" => "_sr_customhovercolor",
									"hiding" => "image",	
									"type" => "hidinggroupstart"
									),
									
									array(  "label" => esc_html__("Select Image (gif)", 'kona'),
											"desc" => esc_html__("It is recommended that this image has the exact same px dimensions as your featured image.", 'kona'),
											"id" => "_sr_imagehover",
											"type" => "image"
										),
									
							array( 	"id" => "_sr_customhovercolor",
									"hiding" => "image",	
									"type" => "hidinggroupend"
									),
						
				array( 	"id" => "_sr_singlehoverappearance",
						"hiding" => "custom",	
						"type" => "hidinggroupend"
						),
		  
	array( "name" => esc_html__("Grid Options", 'kona'),
		   "id" => "sr-meta-tab-singlecaption",
		   "type" => "tabend"
		  ),
	
); // END $kona_meta_portfoliosingle



$kona_meta_imageposttype = array(

	array( "label" => esc_html__("Show Image", 'kona'),
		   "desc" => esc_html__("This image will be displayed above the content.", 'kona'),
		   "id" => "_sr_imageshow",
		   "type" => "selectbox-hiding",
		   "option" => array( 
				array(	"name" => esc_html__("Featured Image", 'kona'), 
						"value"=> "featured"),		 
				array(	"name" => esc_html__("Custom Image", 'kona'), 
						"value" => "custom")
				)
		  ),
		  
		array( 	"id" => "_sr_imageshow",
				"hiding" => "custom",	
				"type" => "hidinggroupstart"
				),
				
			array(  "label" => esc_html__("Custom Image", 'kona'),
					"desc" => "",
					"id" => "_sr_imageimage",  
					"type"  => "image"  
				),
		
		array( 	"id" => "_sr_imageshow",
				"hiding" => "custom",	
				"type" => "hidinggroupend"
				)
				
); // END $kona_meta_imageposttype



$kona_meta_galleryposttype = array(
	
	array(  "label" => esc_html__("Your Gallery Images", 'kona'),
			"desc" => esc_html__("Add your Images.", 'kona'),
			"id" => "_sr_gallerymedias",  
			"type"  => "medias"  
		),
		
		
	array( "label" => esc_html__("Gallery Type", 'kona'),
		   "desc" => "",
		   "id" => "_sr_gallerytype",
		   "type" => "selectbox-hiding",
		   "option" => array( 
				array(	"name" => esc_html__("List (1 image per row)", 'kona'), 
						"value"=> "list"),		 
				array(	"name" => esc_html__("Slider", 'kona'), 
						"value" => "slider")
				)
		  ),
		  
		  
		array( 	"id" => "_sr_gallerytype",
				"hiding" => "list",	
				"type" => "hidinggroupstart"
				),
				
				array( "label" => esc_html__("Spacing", 'kona'),
					   "desc" => esc_html__("Do you want the image to be spaced?", 'kona'),
					   "id" => "_sr_galleryspaced",
					   "type" => "checkbox",
					   "option" => array( 
							array(	"name" => esc_html__("Yes", 'kona'), 
									"value"=> "gallery-spaced"),		 
							array(	"name" => esc_html__("No", 'kona'), 
									"value" => "gallery-not-spaced")
							)
					  ),
				
				array( "label" => esc_html__("Unveil Effect", 'kona'),
					   "desc" => esc_html__("Enable the slide/fade in effect.", 'kona'),
					   "id" => "_sr_galleryunveil",
					   "type" => "checkbox",
					   "option" => array( 
							array(	"name" => esc_html__("Yes", 'kona'), 
									"value"=> "do-anim"),		 
							array(	"name" => esc_html__("No", 'kona'), 
									"value" => "no-anim")
							)
					  ),
					  
				array( "label" => esc_html__("Lazy Load", 'kona'),
					   "desc" => esc_html__("Activate the lazy load for these images.", 'kona'),
					   "id" => "_sr_gallerylazy",
					   "type" => "checkbox",
					   "option" => array( 
							array(	"name" => esc_html__("Yes", 'kona'), 
									"value"=> "1"),		 
							array(	"name" => esc_html__("No", 'kona'), 
									"value" => "0")
							)
					  ),
				
		array( 	"id" => "_sr_gallerytype",
				"hiding" => "2 3 4",	
				"type" => "hidinggroupend"
				),
				
				
		array( 	"id" => "_sr_gallerytype",
				"hiding" => "slider",	
				"type" => "hidinggroupstart"
				),
									  
				array( "label" => esc_html__("Arrows", 'kona'),
					   "desc" => "",
					   "id" => "_sr_gallerysliderarrows",
					   "type" => "checkbox",
					   "option" => array( 
							array(	"name" => esc_html__("Yes", 'kona'), 
									"value"=> "1"),		 
							array(	"name" => esc_html__("No", 'kona'), 
									"value" => "0")
							),
					   "default" => "1"
					  ),
					  
				array( "label" => esc_html__("Bullets / Dots", 'kona'),
					   "desc" => "",
					   "id" => "_sr_gallerysliderdots",
					   "type" => "checkbox",
					   "option" => array( 
							array(	"name" => esc_html__("Yes", 'kona'), 
									"value"=> "1"),		 
							array(	"name" => esc_html__("No", 'kona'), 
									"value" => "0")
							),
					   "default" => "0"
					  ),
	
				array( "label" => esc_html__("Bullet Appearance", 'kona'),
				   "desc" => "",
				   "id" => "_sr_galleryslidernav",
				   "type" => "selectbox",
				   "option" => array( 
						array(	"name" => esc_html__("Dark", 'kona'), 
								"value"=> "dark"),		 
						array(	"name" => esc_html__("Light", 'kona'), 
								"value" => "light")
						)
				  ),
					  
				array( "label" => esc_html__("Loop Slider", 'kona'),
					   "desc" => "",
					   "id" => "_sr_gallerysliderloop",
					   "type" => "checkbox",
					   "option" => array( 
							array(	"name" => esc_html__("Yes", 'kona'), 
									"value"=> "1"),		 
							array(	"name" => esc_html__("No", 'kona'), 
									"value" => "0")
							),
					   "default" => "1"
					  ),
				
		array( 	"id" => "_sr_gallerytype",
				"hiding" => "slider",	
				"type" => "hidinggroupend"
				),
		
); // END $kona_meta_galleryposttype


$kona_meta_videoposttype = array(
	
	array( "label" => esc_html__("Video Type", 'kona'),
		   "desc" => "",
		   "id" => "_sr_videotype",
		   "type" => "selectbox-hiding",
		   "option" => array( 
				array(	"name" => esc_html__("Classic Embed", 'kona'), 
						"value"=> "classic"),		 
				array(	"name" => esc_html__("Inline Video", 'kona'), 
						"value" => "inline"),
				array(	"name" => esc_html__("Selfhosted Video", 'kona'), 
						"value" => "selfhosted")
				)
		  ),
		  
		array( 	"id" => "_sr_videotype",
				"hiding" => "classic",	
				"type" => "hidinggroupstart"
				),
				
				array( "label" => esc_html__("Embed Code", 'kona'),
					   "desc" => esc_html__("Put the embed code (iframe) here.", 'kona'),
					   "id" => "_sr_videoembed",
					   "type" => "textarea"
					  ),
				
		array( 	"id" => "_sr_videotype",
				"hiding" => "classic",	
				"type" => "hidinggroupend"
				),
				
				
		array( 	"id" => "_sr_videotype",
				"hiding" => "inline",	
				"type" => "hidinggroupstart"
				),
				
				array( "label" => esc_html__("Youtube or Vimeo", 'kona'),
					   "desc" => "",
					   "id" => "_sr_videooption",
					   "type" => "selectbox",
					   "option" => array( 
							array(	"name" => esc_html__("Youtube", 'kona'), 
									"value"=> "youtube"),		 
							array(	"name" => esc_html__("Vimeo", 'kona'), 
									"value" => "vimeo")
							)
					  ),
					  
				array( "label" => esc_html__("Video ID", 'kona'),
					   "desc" => esc_html__("Enter the ID of the youtube or vimeo video depending on your selection above.", 'kona'),
					   "id" => "_sr_videoid",
					   "type" => "text"
					  ),
				
		array( 	"id" => "_sr_videotype",
				"hiding" => "inline",	
				"type" => "hidinggroupend"
				),
				
				
		array( 	"id" => "_sr_videotype",
				"hiding" => "selfhosted",	
				"type" => "hidinggroupstart"
				),
									  
				array( "label" => esc_html__("MP4 url", 'kona'),
					   "desc" => "",
					   "id" => "_sr_videomp4",
					   "type" => "video"
					  ),
					  
				array( "label" => esc_html__("WEBM url", 'kona'),
					   "desc" => "",
					   "id" => "_sr_videowebm",
					   "type" => "video"
					  ),
					  
				array( "label" => esc_html__("OGV url", 'kona'),
					   "desc" => "",
					   "id" => "_sr_videoogv",
					   "type" => "video"
					  ),
				
		array( 	"id" => "_sr_videotype",
				"hiding" => "selfhosted",	
				"type" => "hidinggroupend"
				),
				
		array( 	"id" => "_sr_videotype",
				"hiding" => "inline selfhosted",	
				"type" => "hidinggroupstart"
				),
					  
				array( "label" => esc_html__("Poster Image", 'kona'),
					   "desc" => esc_html__("Add a poster image", 'kona'),
					   "id" => "_sr_videoimage",
					   "type" => "image"
					  ),
				
		array( 	"id" => "_sr_videotype",
				"hiding" => "inline selfhosted",	
				"type" => "hidinggroupend"
				),

); // END $kona_meta_videoposttype


$kona_meta_audioposttype = array(
	
	array( "label" => esc_html__("Audio Type", 'kona'),
		   "desc" => "",
		   "id" => "_sr_audiotype",
		   "type" => "selectbox-hiding",
		   "option" => array( 
				array(	"name" => esc_html__("Classic Embed", 'kona'), 
						"value"=> "classic"),
				array(	"name" => esc_html__("Selfhosted Audio", 'kona'), 
						"value" => "selfhosted")
				)
		  ),
		  
		array( 	"id" => "_sr_audiotype",
				"hiding" => "classic",	
				"type" => "hidinggroupstart"
				),
				
				array( "label" => esc_html__("Embed Code", 'kona'),
					   "desc" => esc_html__("Put the embed code (iframe) here.", 'kona'),
					   "id" => "_sr_audioembed",
					   "type" => "textarea"
					  ),
				
		array( 	"id" => "_sr_audiotype",
				"hiding" => "classic",	
				"type" => "hidinggroupend"
				),
		
				
		array( 	"id" => "_sr_audiotype",
				"hiding" => "selfhosted",	
				"type" => "hidinggroupstart"
				),
									  
				array( "label" => esc_html__("MP3 url", 'kona'),
					   "desc" => "",
					   "id" => "_sr_audiomp3",
					   "type" => "audio"
					  ),
	
				array( "label" => esc_html__("Poster Image", 'kona'),
					   "desc" => esc_html__("Add a poster image", 'kona'),
					   "id" => "_sr_audioimage",
					   "type" => "image"
					  ),
				
		array( 	"id" => "_sr_audiotype",
				"hiding" => "inline selfhosted",	
				"type" => "hidinggroupend"
				),

); // END $kona_meta_audioposttype


$kona_meta_quoteposttype = array(
	
	array( "label" => esc_html__("Quote", 'kona'),
		   "desc" => "",
		   "id" => "_sr_quote",
		   "type" => "textarea"
		  ),
	
); // END $kona_meta_quoteposttype


// defaults
$productlayout = "classic"; if (get_option('_sr_shopsingleoptionlayout')) { $productlayout = get_option('_sr_shopsingleoptionlayout'); }
$productbg = ""; if (get_option('_sr_shopsingleoptionbg')) { $productbg = get_option('_sr_shopsingleoptionbg'); }
$productanim = 1; if (get_option('_sr_shopsingleoptionanim') == 0) { $productanim = get_option('_sr_shopsingleoptionanim'); }
$productgallery = "gallery-thumb"; if (get_option('_sr_shopsingleoptiongallery')) { $productgallery = get_option('_sr_shopsingleoptiongallery'); }
$kona_meta_productsettings = array(

	
	array(	'label' => esc_html__("Layout", 'kona'),  
			'desc'  => "",  
			'id'    => '_sr_productlayout', 
			'type'  => 'selectbox-custom-hiding', 
			'option' => array( 
				array(	"name" => esc_html__("Modern", 'kona'), 
						"value" => "modern",
						"image" => "single-shop-modern.png"),
				array(	"name" => esc_html__("Classic", 'kona'), 
						"value" => "classic",
						"image" => "single-shop-classic.png")
				),
			'default' => $productlayout
			),
	
	array(	'label' => esc_html__("Background Color", 'kona'),  
			'desc'  => esc_html__("Leave empty if you don't want any background color.", 'kona'),  
			'id'    => '_sr_productcolor',  
			'type'  => 'color', 
			'default'  => $productbg, 
			),
	
	array(	'label' => esc_html__("Start Animation", 'kona'),  
			'desc'  => esc_html__("Do you want to activate a smooth animation on pageload?", 'kona'),  
			'id'    => '_sr_productanimation',  
		  	"type"  => "checkbox" ,
			"option" => 	array(
				array(	"name" => esc_html__("Yes", 'kona'), 
						"value" => "1"),
				array(	"name" => esc_html__("No", 'kona'), 
						"value" => "0")
				),
			"default" => $productanim
			),
	
	array( "label" => esc_html__("Gallery type", 'kona'),
		   "desc" => "",
		   "id" => "_sr_productgallerytype",
		   "type" => "selectbox",
		   'option' => array( 
					array(	"name" => esc_html__("Thumbnails", 'kona'), 
							"value" => "gallery-thumb"),
					array(	"name" => esc_html__("Arrows", 'kona'), 
							"value" => "gallery-arrows")
					),
			"default" => $productgallery
			),
	
	array(  "label" => esc_html__("Product Video", 'kona'),
			"desc" => "",
			'id'    => '_sr_productvideo',  
			'type'  => 'selectbox-hiding' ,
			'option' => array( 
				array(	"name" => esc_html__("No Product Video", 'kona'), 
						"value"=> "0"),
				array(	"name" => esc_html__("Selfhosted Video", 'kona'), 
						"value"=> "selfhosted"),
				array(	"name" => esc_html__("Youtube Video", 'kona'), 
						"value"=> "youtube"),
				array(	"name" => esc_html__("Vimeo Video", 'kona'), 
						"value"=> "vimeo")
				)
			),
	
		// VIDEO Selfhosted	
		array( 	"id" => "_sr_productvideo",
				"hiding" => "selfhosted",	
				"type" => "hidinggroupstart"
				),
			array(  'label' => esc_html__("MP4 file url", 'kona'),  
					'desc'  => esc_html__("The url to the MP4 file", 'kona'),  
					'id'    => '_sr_productvideo_mp4',  
					'type'  => 'video', 
				),
		array(	"id" => "_sr_productvideo",
				"type" => "hidinggroupend"
				),


		// VIDEO Youtube	
		array( 	"id" => "_sr_productvideo",
				"hiding" => "youtube",	
				"type" => "hidinggroupstart"
				),
			array(  'label' => esc_html__("Youtube Video ID", 'kona'),  
					'desc'  => esc_html__("Enter the right of id of the youtube video", 'kona'),  
					'id'    => '_sr_productvideo_youtube',  
					'type'  => 'text', 
				),
		array(	"id" => "_sr_productvideo",
				"type" => "hidinggroupend"
				),


		// VIDEO Vimeo	
		array( 	"id" => "_sr_productvideo",
				"hiding" => "vimeo",	
				"type" => "hidinggroupstart"
				),
			array(  'label' => esc_html__("Vimeo Video ID", 'kona'),  
					'desc'  => esc_html__("Enter the right of id of the vimeo video", 'kona'),  
					'id'    => '_sr_productvideo_vimeo',  
					'type'  => 'text', 
				),
		array(	"id" => "_sr_productvideo",
				"type" => "hidinggroupend"
				),
				
); // END kona_meta_productsettings




 
/*-----------------------------------------------------------------------------------*/
/*	Callback Show fields
/*-----------------------------------------------------------------------------------*/

function kona_show_meta_pagetitle() {  
 	global $kona_meta_pagetitle, $post;  
 	// Use nonce for verification  
 	echo '<input type="hidden" name="meta_pagetitle_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';  
   	kona_show_fields($kona_meta_pagetitle);  
}


function kona_show_meta_portfoliosingle() {  
 	global $kona_meta_portfoliosingle, $post;  
 	// Use nonce for verification  
 	echo '<input type="hidden" name="meta_portfoliosingle_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';  
   	kona_show_fields($kona_meta_portfoliosingle);  
}


function kona_show_meta_imageposttype() {  
 	global $kona_meta_imageposttype, $post;  
 	// Use nonce for verification  
 	echo '<input type="hidden" name="meta_imageposttype_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';  
   	kona_show_fields($kona_meta_imageposttype);  
}


function kona_show_meta_galleryposttype() {  
 	global $kona_meta_galleryposttype, $post;  
 	// Use nonce for verification  
 	echo '<input type="hidden" name="meta_galleryposttype_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';  
   	kona_show_fields($kona_meta_galleryposttype);  
}


function kona_show_meta_videoposttype() {  
 	global $kona_meta_videoposttype, $post;  
 	// Use nonce for verification  
 	echo '<input type="hidden" name="meta_videoposttype_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';  
   	kona_show_fields($kona_meta_videoposttype);  
}


function kona_show_meta_audioposttype() {  
 	global $kona_meta_audioposttype, $post;  
 	// Use nonce for verification  
 	echo '<input type="hidden" name="meta_audioposttype_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';  
   	kona_show_fields($kona_meta_audioposttype);  
}


function kona_show_meta_quoteposttype() {  
 	global $kona_meta_quoteposttype, $post;  
 	// Use nonce for verification  
 	echo '<input type="hidden" name="meta_quoteposttype_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';  
   	kona_show_fields($kona_meta_quoteposttype);  
}

function kona_show_meta_secondimage() {  
 	global $kona_meta_secondimage, $post;  
 	// Use nonce for verification  
 	echo '<input type="hidden" name="meta_secondimage_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';  
   	kona_show_fields($kona_meta_secondimage);  
}

function kona_show_meta_productsettings() {  
 	global $kona_meta_productsettings, $post;  
 	// Use nonce for verification  
 	echo '<input type="hidden" name="meta_productsettings_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';  
   	kona_show_fields($kona_meta_productsettings);  
}



/*-----------------------------------------------------------------------------------*/
/*	Show fields
/*-----------------------------------------------------------------------------------*/
function kona_show_fields($a,$side=null) {
 	global $post; 
	
	echo '<div class="sr-post-meta sr-style">';
	
	// Loop tabs
	$tabCounter = 0;
    foreach ($a as $tab) {
		if ($tab['type'] == 'tabstart') {
			if ($tabCounter == 0) { echo '<ul class="sr-tab-list clearfix">'; $active = "active"; } else { $active = ""; }
			echo '<li class="'.esc_attr($active).'"><a href="'.esc_attr($tab['id']).'">'.esc_html($tab['name']).'</a></li>';
			$tabCounter++;	
		}
	}
	if ($tabCounter !== 0) { echo '</ul>'; }
		
		
	// Loop options
	$tabCounter = 0;
    foreach ($a as $option) {	
		
		// get the value
		$value = get_post_meta($post->ID, $option['id'], true);  
		if ($value == '' && (isset($option['default']) && $option['default'] !== '')) { $value = $option['default']; }
			
		switch($option['type']) {  
									
			// tabstart
			case 'tabstart':
				if ($tabCounter == 0) { $active = "active"; } else { $active = ""; }
				echo '<div class="sr-tab-content '.esc_attr($active).'" data-tab="'.esc_attr($option['id']).'">';
				$tabCounter++;	
			break;
			
			// tabend
			case 'tabend':
				echo '</div>';
			break;
			
			
			// hidinggroupstart
			case "hidinggroupstart":
				$relatedArray = explode(' ',$option['hiding']);
				$hideClass = '';
				foreach ($relatedArray as $r) { $hideClass .= $option['id'].'_'.$r.' '; }
				echo '<div class="hidinggroup hide'.esc_attr($option['id']).' '.esc_attr($hideClass).'">';
			break;
			
			// hidinggroupend
			case "hidinggroupend":
				echo '	</div>';
			break;
			
			
			
			// info
			case 'info':
				echo '<div class="option clear">';
					echo '<div class="option-inner">';
						if (isset($option['label']) && $option['label'] !== '') {
							echo '	<div class="option_name">
										<label for="'.esc_attr($option['id']).'">'.esc_html__($option['label'],'kona').'</label>
									</div>';
							echo '	<div class="option_value">';
						}
						echo '	<div class="sr-message-info"><i>'.esc_html__($option['desc'],'kona').'</i></div>';	
						if (isset($option['label']) && $option['label'] !== '') {
							echo '	</div>';	
						}
					echo '</div>';
				echo '</div>';
			break;
			
			
			// text
			case 'text':
				echo '<div class="option clear">';
					echo '<div class="option-inner">';
						echo '	<div class="option_name">
									<label for="'.esc_attr($option['id']).'">'.esc_html__($option['label'],'kona').'</label>
									<div class="option_desc"><i>'.esc_html__($option['desc'],'kona').'</i></div>
								</div>';
						echo '	<div class="option_value">
									<input type="text" name="'.esc_attr($option['id']).'" id="'.esc_attr($option['id']).'" value="'.htmlspecialchars($value, ENT_QUOTES).'" size="30" />
								</div>';	
					echo '</div>';
				echo '</div>';
			break;
			
			
			// textarea
			case 'textarea':
				echo '<div class="option clear">';
					echo '<div class="option-inner">';
						echo '	<div class="option_name">
									<label for="'.esc_attr($option['id']).'">'.esc_html__($option['label'],'kona').'</label>
									<div class="option_desc"><i>'.esc_html__($option['desc'],'kona').'</i></div>
								</div>';
						echo '	<div class="option_value">
									<textarea name="'.esc_attr($option['id']).'" id="'.esc_attr($option['id']).'">'.htmlspecialchars($value, ENT_QUOTES).'</textarea>
								</div>';	
					echo '</div>';
				echo '</div>';
			break;
			
			// title
			case 'title':
				echo '<div class="option clear">';
					echo '<div class="option-inner">';
						echo '	<div class="option_name">
									<label for="'.esc_attr($option['id']).'">'.esc_html__($option['label'],'kona').'</label>
									<div class="option_desc"><i>'.esc_html__($option['desc'],'kona').'</i></div>
								</div>';
						
						if ($option['id'] == '_sr_alttitle' || $option['id'] == '_sr_singletitlemain' && !$value) {
							$ph = 'placeholder="'.get_the_title().'"'; } else { $ph = ''; }
								
						echo '	<div class="option_value">
									<input '.$ph.' type="text" name="'.esc_attr($option['id']).'" id="'.esc_attr($option['id']).'" value="'.htmlspecialchars($value, ENT_QUOTES).'" size="30" />';
						$defaultSize = get_post_meta($post->ID, $option['id'].'-size', true);
						if ($defaultSize == '' && isset($option['defaultsize'])) { $defaultSize = $option['defaultsize']; }
						echo '<select name="'.esc_attr($option['id']).'-size" id="'.esc_attr($option['id']).'-size" style="margin-left:10px;top:-2px;position:relative;">';
						for ($i=1;$i<7;$i++) {
							if ($defaultSize == 'h'.$i) { $selected = 'selected="selected"'; } else { $selected = ''; }
							echo '<option value="h'.$i.'" '.$selected.'>H'.$i.'</option>';
						}
						echo '</select>';
						echo '</div>';	
					echo '</div>';
				echo '</div>';
			break;
			
			// editor
			case 'editor':
				echo '<div class="option clear">';
					echo '<div class="option-inner">';
						if ($option['label']) {
						echo '	<div class="option_name">
									<label for="'.esc_attr($option['id']).'">'.esc_html__($option['label'],'kona').'</label>
									<div class="option_desc"><i>'.esc_html__($option['desc'],'kona').'</i></div>
								</div>';
						echo '	<div class="option_value">';
						}
						wp_editor( $value, $option['id'],array('textarea_rows' => 13));
						if ($option['label']) {
						echo '</div>';
						}
					echo '</div>';
					echo '<div class="option_desc"><i>'.esc_html__($option['desc'],'kona').'</i></div>'	;		
				echo '</div>';
			break;
			
			//color
			case "color":
				echo '<div class="option clear">';
					echo '<div class="option-inner">';
						echo '	<div class="option_name">
									<label for="'.esc_attr($option['id']).'">'.esc_html__($option['label'],'kona').'</label>
									<div class="option_desc"><i>'.esc_html__($option['desc'],'kona').'</i></div>
								</div>';
						echo '	<div class="option_value">
									<input type="text" name="'.esc_attr($option['id']).'" id="'.esc_attr($option['id']).'" value="'.$value.'" class="sr-color-field" />
								</div>';	
					echo '</div>';
				echo '</div>';
			break;
			
			//checkbox
			case 'checkbox':  
				echo '<div class="option clear">';
					echo '<div class="option-inner">';
						echo '	<div class="option_name">
									<label for="'.esc_attr($option['id']).'">'.esc_html__($option['label'],'kona').'</label>
									<div class="option_desc"><i>'.esc_html__($option['desc'],'kona').'</i></div>
								</div>';
						
						// default options
						$options = array(array(	"name" => esc_html__("On", 'kona'), 
												"value" => "1"),
										 array(	"name" => esc_html__("Off", 'kona'), 
												"value"=> "0"));
						if (isset($option['option']) && $option['option']) { $options = $option['option']; }		
						$i = 0;
						$pseudo = '';
						$select = '';
						foreach ($options as $var) {
							if ($value == $var['value'] || ($value == '' && $i == 0)) { $selected = 'selected="selected"'; $active ='active'; } else { $selected = ''; $active ='';  } 
							$pseudo .= '<a href="#" data-value="'.$var['value'].'" class="'.esc_attr($active).'"> '.esc_html__($var['name'],'kona').'</a>';
							$select .= '<option value="'.esc_attr($var['value']).'" '.$selected.'> '.esc_html__($var['name'],'kona').'</option>';
						$i++;	
						}
								
						echo '	<div class="option_value">
									<div class="checkbox-pseudo clearfix">'.$pseudo.'</div>
									<select name="'.esc_attr($option['id']).'" id="'.esc_attr($option['id']).'" style="display: none;">'.$select.'</select>
								</div>';		
					echo '</div>';
				echo '</div>';
			break;
			
			
			//checkbox-hiding
			case 'checkbox-hiding':  
				echo '<div class="option clear hiding'.esc_attr($option['id']).' hiding">';
					echo '<div class="option-inner">';
						echo '	<div class="option_name">
									<label for="'.esc_attr($option['id']).'">'.esc_html__($option['label'],'kona').'</label>
									<div class="option_desc"><i>'.esc_html__($option['desc'],'kona').'</i></div>
								</div>';
						
						// default options
						$options = array(array(	"name" => esc_html__("On", 'kona'), "value" => "1"),
										 array(	"name" => esc_html__("Off", 'kona'), "value"=> "0"));
						if (isset($option['option']) && $option['option']) { $options = $option['option']; }		
						$i = 0;
						$pseudo = '';
						$select = '';
						foreach ($options as $var) {
							$selected = ''; $active ='';
							if ($value == $var['value'] || ($value == '' && $i == 0)) { $selected = 'selected="selected"'; $active ='active'; }
							$pseudo .= '<a href="#" data-value="'.$var['value'].'" class="'.esc_attr($active).'"> '.esc_html__($var['name'],'kona').'</a>';
							$select .= '<option value="'.esc_attr($var['value']).'" '.$selected.'> '.esc_html__($var['name'],'kona').'</option>';
						$i++;	
						}
								
						echo '	<div class="option_value">
									<div class="checkbox-pseudo clearfix">'.$pseudo.'</div>
									<select name="'.esc_attr($option['id']).'" id="'.esc_attr($option['id']).'" style="display: none;">'.$select.'</select>
								</div>';		
					echo '</div>';
				echo '</div>';
			break;
			
			// selectbox  
			case 'selectbox':  
				echo '<div class="option clear">';
					echo '<div class="option-inner">';
						echo '	<div class="option_name">
									<label for="'.esc_attr($option['id']).'">'.esc_html__($option['label'],'kona').'</label>
									<div class="option_desc"><i>'.esc_html__($option['desc'],'kona').'</i></div>
								</div>';
						echo '	<div class="option_value">';
						
						// MESSAGE IF SLIDER
						if ($option['id'] == '_sr_slider' && count($option['option']) < 2) {
							echo '<div class="sr-message-note"><strong>No Slider exists</strong>.<br><em>Make sure the Revolution Slider plugin is installed and you have created a slider.</em></div>';
							$hidden= 'style="display:none;"';	
						} else { $hidden = ''; }
						
						// DIFFERENT default for blog post alignment
						if (get_post_type() == 'post' && !get_post_meta($post->ID, $option['id'], true)) {
							if ($option['id'] == '_sr_titlealignment') { $value = 'align-left'; }
							if ($option['id'] == '_sr_titlewidth') { $value = 'wrapper-small'; }
						}
						
						echo '<select name="'.esc_attr($option['id']).'" id="'.esc_attr($option['id']).'" '.$hidden.'>';
						$i = 0;
						foreach ($option['option'] as $var) {
							if ($value == $var['value']) { $selected = 'selected="selected"'; } else { if ($value == '' && $i == 0) { $selected = 'selected="selected"'; } else { $selected = '';  } }
							echo '<option value="'.esc_attr($var['value']).'" '.$selected.'> '.esc_html__($var['name'],'kona').'</option>';
						$i++;	
						}			  
						echo '</select>';
						
					echo '	</div>';	
					
					echo '</div>';
				echo '</div>';
			break;
				
				
			
			
			
			// selectbox-hiding  
			case 'selectbox-hiding':  
				echo '<div class="option clear hiding'.esc_attr($option['id']).' hiding">';
					echo '<div class="option-inner">';
						echo '	<div class="option_name">
									<label for="'.esc_attr($option['id']).'">'.esc_html__($option['label'],'kona').'</label>
									<div class="option_desc"><i>'.esc_html__($option['desc'],'kona').'</i></div>
								</div>';
						echo '	<div class="option_value">';
						
						echo '<select name="'.esc_attr($option['id']).'" id="'.esc_attr($option['id']).'">';
						$i = 0;
						foreach ($option['option'] as $var) {
							if ($value == $var['value']) { $selected = 'selected="selected"'; } else { if ($value == '' && $i == 0) { $selected = 'selected="selected"'; } else { $selected = '';  } }
							echo '<option value="'.esc_attr($var['value']).'" '.$selected.'> '.esc_html__($var['name'],'kona').'</option>';
						$i++;	
						}			  
						echo '</select>'; 
					echo '	</div>';		
				
					echo '</div>';
				echo '</div>';
			break;
				
			// selectbox-custom  
			case 'selectbox-custom':  
				echo '<div class="option clear">';
					echo '<div class="option-inner">';
						echo '	<div class="option_name">
									<label for="'.esc_attr($option['id']).'">'.esc_html__($option['label'],'kona').'</label>
									<div class="option_desc"><i>'.esc_html__($option['desc'],'kona').'</i></div>
								</div>';
						echo '	<div class="option_value option_custom_select">';
						
						$selectOptions = "";
						$imageOptions = "";
						$i = 0;
						foreach ($option['option'] as $var) {
							if ($var['name'] !== "linebreak") {
								if ($value == $var['value']) { $selected = 'selected="selected"'; $class = "selected"; } else { if ($value == '' && $i == 0) { $selected = 'selected="selected"'; $class = "selected"; } else { $selected = ''; $class = "";  } }
								$selectOptions .= '<option value="'.esc_attr($var['value']).'" '.$selected.'> '.esc_html__($var['name'],'kona').'</option>';

								if (isset($var['image'])) {
									$imageOptions .= '<a href="'.$var['value'].'" class="select-custom '.$class.'"><img src="'.esc_url(get_template_directory_uri().'/theme-admin/assets/img/'.$var['image']).'">
									<span>'.esc_html__($var['name'],'kona').'</span></a>';
								}
							} else {
								$imageOptions .= '<br>';
							}
							$i++;
						}
				
						echo '<select name="'.esc_attr($option['id']).'" id="'.esc_attr($option['id']).'" style="display:none;">'.$selectOptions.'</select>';
						echo $imageOptions ;
				
						
						
					echo '	</div>';	
					
					echo '</div>';
				echo '</div>';
			break;
				
			// selectbox-custom-hiding  
			case 'selectbox-custom-hiding':  
				echo '<div class="option clear hiding'.esc_attr($option['id']).' hiding">';
					echo '<div class="option-inner">';
						echo '	<div class="option_name">
									<label for="'.esc_attr($option['id']).'">'.esc_html__($option['label'],'kona').'</label>
									<div class="option_desc"><i>'.esc_html__($option['desc'],'kona').'</i></div>
								</div>';
						echo '	<div class="option_value option_custom_select">';
						
						$selectOptions = "";
						$imageOptions = "";
						$i = 0;
						foreach ($option['option'] as $var) {
							if ($var['name'] !== "linebreak") {
								if ($value == $var['value']) { $selected = 'selected="selected"'; $class = "selected"; } else { if ($value == '' && $i == 0) { $selected = 'selected="selected"'; $class = "selected"; } else { $selected = ''; $class = "";  } }
								$selectOptions .= '<option value="'.esc_attr($var['value']).'" '.$selected.'> '.esc_html__($var['name'],'kona').'</option>';

								if (isset($var['image'])) {
									$imageOptions .= '<a href="'.$var['value'].'" class="select-custom '.$class.'"><img src="'.esc_url(get_template_directory_uri().'/theme-admin/assets/img/').$var['image'].'">
									<span>'.esc_html__($var['name'],'kona').'</span></a>';
								}
							} else {
								$imageOptions .= '<br>';
							}
							$i++;
						}
				
						echo '<select name="'.esc_attr($option['id']).'" id="'.esc_attr($option['id']).'" style="display:none;">'.$selectOptions.'</select>';
						echo $imageOptions ;
				
						
						
					echo '	</div>';	
					
					echo '</div>';
				echo '</div>';
			break;	
			
			// image  
			case 'image':  
				echo '<div class="option clear">';
					echo '<div class="option-inner">';
						echo '	<div class="option_name">
									<label for="'.esc_attr($option['id']).'">'.esc_html__($option['label'],'kona').'</label>
									<div class="option_desc"><i>'.esc_html__($option['desc'],'kona').'</i></div>
								</div>';
						$removeClass = 'hide'; if ($value) { $removeClass = ''; }
						echo '	<div class="option_value">
									<input class="upload_image" type="hidden" name="'.esc_attr($option['id']).'" id="'.esc_attr($option['id']).'" value="'.$value.'" size="30" />
									<input class="sr_upload_image_button sr-button" type="button" value="'.esc_attr__('Upload Image','kona').'" />
									<input class="sr_remove_image_button sr-button button-remove '.esc_attr($removeClass).'" type="button" value="'.esc_attr__('Remove Image','kona').'" /><br />
									<span class="preview_image">';	
									if ($value) { echo '<img class="'.esc_attr($option['id']).'"  src="'.esc_url($value).'" alt="'.esc_attr__('Preview Image','kona').'" />'; }
						echo '		</span>
								</div>';		
					echo '</div>';
				echo '</div>';		
			break;
			
			// video  
			case 'video': 
				echo '<div class="option clear">';
					echo '<div class="option-inner">';
						echo '	<div class="option_name">
									<label for="'.esc_attr($option['id']).'">'.esc_html__($option['label'],'kona').'</label>
									<div class="option_desc"><i>'.esc_html__($option['desc'],'kona').'</i></div>
								</div>';
						$removeClass = 'hide'; if ($value) { $removeClass = ''; }
						echo '	<div class="option_value">
									<input class="upload_video" type="text" name="'.esc_attr($option['id']).'" id="'.esc_attr($option['id']).'" value="'.$value.'" size="30" />
									<input class="upload_video_button sr-button" type="button" value="'.esc_attr__('Add Video','kona').'" />
								</div>';		
					echo '</div>';
				echo '</div>'; 
			break;
			
			// audio  
			case 'audio': 
				echo '<div class="option clear">';
					echo '<div class="option-inner">';
						echo '	<div class="option_name">
									<label for="'.esc_attr($option['id']).'">'.esc_html__($option['label'],'kona').'</label>
									<div class="option_desc"><i>'.esc_html__($option['desc'],'kona').'</i></div>
								</div>';
						$removeClass = 'hide'; if ($value) { $removeClass = ''; }
						echo '	<div class="option_value">
									<input class="upload_audio" type="text" name="'.esc_attr($option['id']).'" id="'.esc_attr($option['id']).'" value="'.$value.'" size="30" />
									<input class="upload_audio_button sr-button" type="button" value="'.esc_attr__('Add Audio','kona').'" />
								</div>';		
					echo '</div>';
				echo '</div>'; 
			break;
			
			// medias  
			case 'medias':
				echo '<div class="option clear">';
					echo '<div class="option-inner">';
						echo '	<div class="option_name">
									<label for="'.esc_attr($option['id']).'">'.esc_html__($option['label'],'kona').'</label>
									<div class="option_desc"><i>'.esc_html__($option['desc'],'kona').'</i></div>
								</div>';
						echo '	<div class="option_value">';
							
							echo '<div id="sortable'.esc_attr($option['id']).'" class="sortable-list">';
							echo '<textarea name="'.esc_attr($option['id']).'" class="sortable-value" style="display:none;">'.$value.'</textarea>';
							echo '<ul id="sortable-'.esc_attr($option['id']).'" class="sortable-container sortable-media clear">';
							
							$json = json_decode($value);
							if($json) {
							foreach($json->sortable as $j) {
								echo '<li>';
								echo '<input type="hidden" name="type" value="'.$j->type.'" class="to-json">';
								 
								switch($j->type) {
			
									// text
									case 'image':
										echo '<input type="hidden" name="id" value="'.$j->id.'" class="to-json">';
										echo '<div class="image-preview">'.wp_get_attachment_image( $j->id, 'thumbnail' ).'</div>';
									break;
								
								} // END switch
								
								echo '<a href="#" class="delete-sortable">delete</a></li>';
							} // END foreach
							} // END if()
							
							echo '</ul>';
							echo '<a class="add-to-sortable-media add-sortable-button sr-button" data-type="image">Add Image</a>';		
							echo '</div>';
							
						echo '</div>';
					echo '</div>';
				echo '</div>';
			break;
				
			// medias-option  
			case 'medias-option':
				
				
				// NEW for Kona - take the original produdct gallery images if empty
				if ($option['id'] == '_sr_prodgallery' && !$value) {
					global $post;
					$product = new WC_product($post->ID);
					$defaultGallery = $product->get_gallery_image_ids();
					if ($defaultGallery) {
						$value = '{"sortable":[';
						$i = 0;
						foreach ( $defaultGallery as $a ) {
							$imgSrc = wp_get_attachment_image_src( $a, 'thumbnail' );
							if ($i !== 0) { $value .= ','; }
							$value .= '{"type":"image","id":"'.$a.'","thumb":"'.$imgSrc[0].'"}';
							$i++;
						}
						$value .= ']}';
					}
				}
				// NEW for Kona - take the original produdct gallery images if empty
				
				echo '<div class="option clear">';
					echo '<div class="option-inner">';
						echo '	<div class="option_name">
									<label for="'.esc_attr($option['id']).'">'.esc_html__($option['label'],'kona').'</label>
									<div class="option_desc"><i>'.esc_html__($option['desc'],'kona').'</i></div>
								</div>';
						echo '	<div class="option_value">';
							
							echo '<div id="sortable'.esc_attr($option['id']).'" class="sortable-list">';
							echo '<textarea name="'.esc_attr($option['id']).'" class="sortable-value" style="display:none;">'.$value.'</textarea>';
							echo '<ul id="sortable-'.esc_attr($option['id']).'" class="sortable-container sortable-media-options clear">';
							
							$json = json_decode($value);
							if($json) {
							foreach($json->sortable as $j) {
								echo '<li>';
								echo '<input type="hidden" name="type" value="'.$j->type.'" class="to-json">';
								 
								switch($j->type) {
			
									// image
									case 'image':
										echo '<input type="hidden" name="id" value="'.$j->id.'" class="to-json">';
										echo '<div class="image-preview">'.wp_get_attachment_image( $j->id, 'thumbnail' ).'</div>';
										
										// options
										$outputOptions = '';
										$mediaOptions = explode("|",$option['option']);
										
										if($option['option']) {
											$outputOptions .= '<div class="options">';
											foreach($mediaOptions as $m) {
												$field = explode(":",$m);
												
												// option field value
												$fieldVal = json_encode($j);
												$fieldVal = json_decode($fieldVal,true);
												if (isset($fieldVal[$field[0]])) { $fieldVal = $fieldVal[$field[0]]; }
												
												if($field[1] == 'textarea') {
													$outputOptions .= '<textarea name="'.esc_attr($field[0]).'" class="to-json" placeholder="'.$field[0].'"></textarea>';	
												} else if($field[1] === 'text') {
													$outputOptions .= '<input type="text" name="'.esc_attr($field[0]).'" placeholder="'.$field[0].'" class="to-json">';	
												} else if($field[1] === 'select') {
													$outputOptions .= '<select name="'.esc_attr($field[0]).'" class="to-json">';
													$fieldOptions = explode(",",$field[2]);
													foreach($fieldOptions as $f) {
														$selected = ""; if ($f == $fieldVal) { $selected = 'selected="selected"'; }
														$outputOptions .= '<option value="'.$f.'" '.$selected.'>'.$field[0].': '.$f.'</option>';
													}
													$outputOptions .= '</select>';
												}
											}
											$outputOptions .= '</div>';
										}
										echo $outputOptions;
										
									break;
								
								} // END switch
								
								echo '<a href="#" class="delete-sortable">delete</a></li>';
							} // END foreach
							} // END if()
							
							echo '</ul>';
							echo '<a class="add-to-sortable-media-options add-sortable-button sr-button" data-type="image" data-options="'.$option['option'].'">Add Image</a>';
							echo '</div>';
							
						echo '</div>';
					echo '</div>';
				echo '</div>';
								
			break;
			
			// category
			case 'category':
				echo '<div class="option clear">';
					echo '<div class="option-inner">';
						echo '	<div class="option_name">
									<label for="'.esc_attr($option['id']).'">'.esc_html__($option['label'],'kona').'</label>
									<div class="option_desc"><i>'.esc_html__($option['desc'],'kona').'</i></div>
								</div>';
						echo '	<div class="option_value">
									<select name="'.esc_attr($option['id']).'[]" id="'.esc_attr($option['id']).'" size="5" multiple>';
									if ($option['option'] == 'portfolio') { $term = 'portfolio_category'; } else { $term = 'category'; }
									$categories = get_terms($term);
									foreach ($categories as $cat) {
										if (in_array($cat->term_id, $value)) { $selected = 'selected="selected"'; } else { $selected = ''; }
										echo '<option value="'.$cat->term_id.'" '.$selected.'>'.$cat->name.'</option>';
									}
						echo '		</select>
								</div>';		
					echo '</div>';
				echo '</div>'; 
			break;
				
				
			// pagelist  
			case 'pagelist':  
				echo '<div class="option clear">';
					echo '<div class="option-inner">';
						echo '	<div class="option_name">
									<label for="'.esc_attr($option['id']).'">'.esc_html__($option['label'],'kona').'</label>
								</div>';
						echo '	<div class="option_value">
									<select name="'.esc_attr($option['id']).'" id="'.esc_attr($option['id']).'">';
									if ($option['default'] && $option['default'] !== "") {
										echo '<option value="0">'.$option['default'].'</option>';
									}
									  $pages = get_pages(); 
									  foreach ( $pages as $page ) {
										if ($page->ID == $value) { $active = 'selected="selected"'; }  else { $active = ''; } 
										$opt = '<option value="' . $page->ID . '" '.esc_attr($active).'>';
										$opt .= $page->post_title;
										$opt .= '</option>';
										echo $opt;
									  }
						echo '		</select>
								</div>';	
					echo '</div>';
					echo '<div class="option_desc"><i>'.esc_html__($option['desc'],'kona').'</i></div>'	;			
				echo '</div>'; 
			break;
				
				
			// portfolio  
			case 'portfolio':  
				echo '<div class="option clear">';
					echo '<div class="option-inner">';
						echo '	<div class="option_name">
									<label for="'.esc_attr($option['id']).'">'.esc_html__($option['label'],'kona').'</label>
								</div>';
						echo '	<div class="option_value">
									<select name="'.esc_attr($option['id']).'" id="'.esc_attr($option['id']).'">';
									if ($option['default'] && $option['default'] !== "") {
										echo '<option value="0">'.$option['default'].'</option>';
									}
									  $pages = get_posts(array('post_type' => 'portfolio', 'posts_per_page'=> -1));
									  foreach ( $pages as $page ) {
										if ($page->ID == $value) { $active = 'selected="selected"'; }  else { $active = ''; } 
										$opt = '<option value="' . $page->ID . '" '.esc_attr($active).'>';
										$opt .= $page->post_title;
										$opt .= '</option>';
										echo $opt;
									  }
						echo '		</select>
								</div>';	
					echo '</div>';
					echo '<div class="option_desc"><i>'.esc_html__($option['desc'],'kona').'</i></div>'	;			
				echo '</div>'; 
			break;
							
		}
		
	} // end foreach  
	
	
	echo '</div>';
}



/*-----------------------------------------------------------------------------------*/
/*	Save Datas
/*-----------------------------------------------------------------------------------*/

function kona_save_meta_pagetitle($post_id) {  
    global $kona_meta_pagetitle;  
  
    // verify nonce  
    if (!isset($_POST['meta_pagetitle_nonce']) || !wp_verify_nonce($_POST['meta_pagetitle_nonce'], basename(__FILE__))) 
        return $post_id; 
		
    // check autosave  
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)  
        return $post_id;
		
    // check permissions  
    if ('page' == $_POST['post_type']) {  
        if (!current_user_can('edit_page', $post_id))  
            return $post_id;  
        } elseif (!current_user_can('edit_post', $post_id)) {  
            return $post_id;  
    }  
  
    // loop through fields and save the data  
     foreach ($kona_meta_pagetitle as $field) {  
        if (	$field['type'] !== 'info' && $field['type'] !== 'tabstart' && $field['type'] !== 'tabend' && 
			$field['type'] !== 'hidinggroupstart' && $field['type'] !== 'hidinggroupend') {
			$old = get_post_meta($post_id, $field['id'], true);  
			if (isset($_POST[$field['id']])) {
				$new = $_POST[$field['id']];  
				if ($new !== '' && $new != $old) {  
					update_post_meta($post_id, $field['id'], $new);  
				} elseif ('' == $new && $old) {  
					delete_post_meta($post_id, $field['id'], $old);  
				}
			} 
			
			// Size type
			if ($field['type'] == 'title') { 
				$old = get_post_meta($post_id, $field['id'].'-size', true);  
				$new = $_POST[$field['id'].'-size'];  
				if ($new !== '' && $new != $old) {  
					update_post_meta($post_id, $field['id'].'-size', $new);  
				} elseif ('' == $new && $old) {  
					delete_post_meta($post_id, $field['id'].'-size', $old);  
				} 
			}
		}  
    } // end foreach  
}  
add_action('save_post', 'kona_save_meta_pagetitle');


function kona_save_meta_portfoliosingle($post_id) {  
    global $kona_meta_portfoliosingle;  
  
    // verify nonce  
    if (!isset($_POST['meta_portfoliosingle_nonce']) || !wp_verify_nonce($_POST['meta_portfoliosingle_nonce'], basename(__FILE__))) 
        return $post_id; 
		
    // check autosave  
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)  
        return $post_id;
		
    // check permissions  
    if ('page' == $_POST['post_type']) {  
        if (!current_user_can('edit_page', $post_id))  
            return $post_id;  
        } elseif (!current_user_can('edit_post', $post_id)) {  
            return $post_id;  
    }  
  
    // loop through fields and save the data  
     foreach ($kona_meta_portfoliosingle as $field) {  
        if (	$field['type'] !== 'info' && $field['type'] !== 'tabstart' && $field['type'] !== 'tabend' && 
			$field['type'] !== 'hidinggroupstart' && $field['type'] !== 'hidinggroupend') {
			$old = get_post_meta($post_id, $field['id'], true);  
			if (isset($_POST[$field['id']])) {
				$new = $_POST[$field['id']];  
				if ($new !== '' && $new != $old) {  
					update_post_meta($post_id, $field['id'], $new);  
				} elseif ('' == $new && $old) {  
					delete_post_meta($post_id, $field['id'], $old);  
				}
			} 
			
			// Size type
			if ($field['type'] == 'title') { 
				$old = get_post_meta($post_id, $field['id'].'-size', true);  
				$new = $_POST[$field['id'].'-size'];  
				if ($new !== '' && $new != $old) {  
					update_post_meta($post_id, $field['id'].'-size', $new);  
				} elseif ('' == $new && $old) {  
					delete_post_meta($post_id, $field['id'].'-size', $old);  
				} 
			}
		}  
    } // end foreach  
}  
add_action('save_post', 'kona_save_meta_portfoliosingle');



function kona_save_meta_imageposttype($post_id) {  
    global $kona_meta_imageposttype;  
  
    // verify nonce  
    if (!isset($_POST['meta_imageposttype_nonce']) || !wp_verify_nonce($_POST['meta_imageposttype_nonce'], basename(__FILE__))) 
        return $post_id; 
		
    // check autosave  
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)  
        return $post_id;
		
    // check permissions  
    if ('page' == $_POST['post_type']) {  
        if (!current_user_can('edit_page', $post_id))  
            return $post_id;  
        } elseif (!current_user_can('edit_post', $post_id)) {  
            return $post_id;  
    }  
  
    // loop through fields and save the data  
     foreach ($kona_meta_imageposttype as $field) {  
        if (	$field['type'] !== 'info' && $field['type'] !== 'tabstart' && $field['type'] !== 'tabend' && 
			$field['type'] !== 'hidinggroupstart' && $field['type'] !== 'hidinggroupend') {
			$old = get_post_meta($post_id, $field['id'], true);  
			if (isset($_POST[$field['id']])) {
				$new = $_POST[$field['id']];  
				if ($new !== '' && $new != $old) {  
					update_post_meta($post_id, $field['id'], $new);  
				} elseif ('' == $new && $old) {  
					delete_post_meta($post_id, $field['id'], $old);  
				}
			} 
			
			// Size type
			if ($field['type'] == 'title') { 
				$old = get_post_meta($post_id, $field['id'].'-size', true);  
				$new = $_POST[$field['id'].'-size'];  
				if ($new !== '' && $new != $old) {  
					update_post_meta($post_id, $field['id'].'-size', $new);  
				} elseif ('' == $new && $old) {  
					delete_post_meta($post_id, $field['id'].'-size', $old);  
				} 
			}
		}  
    } // end foreach  
}  
add_action('save_post', 'kona_save_meta_imageposttype');



function kona_save_meta_galleryposttype($post_id) {  
    global $kona_meta_galleryposttype;  
  
    // verify nonce  
    if (!isset($_POST['meta_galleryposttype_nonce']) || !wp_verify_nonce($_POST['meta_galleryposttype_nonce'], basename(__FILE__))) 
        return $post_id; 
		
    // check autosave  
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)  
        return $post_id;
		
    // check permissions  
    if ('page' == $_POST['post_type']) {  
        if (!current_user_can('edit_page', $post_id))  
            return $post_id;  
        } elseif (!current_user_can('edit_post', $post_id)) {  
            return $post_id;  
    }  
  
    // loop through fields and save the data  
     foreach ($kona_meta_galleryposttype as $field) {  
        if (	$field['type'] !== 'info' && $field['type'] !== 'tabstart' && $field['type'] !== 'tabend' && 
			$field['type'] !== 'hidinggroupstart' && $field['type'] !== 'hidinggroupend') {
			$old = get_post_meta($post_id, $field['id'], true);  
			if (isset($_POST[$field['id']])) {
				$new = $_POST[$field['id']];  
				if ($new !== '' && $new != $old) {  
					update_post_meta($post_id, $field['id'], $new);  
				} elseif ('' == $new && $old) {  
					delete_post_meta($post_id, $field['id'], $old);  
				}
			} 
			
			// Size type
			if ($field['type'] == 'title') { 
				$old = get_post_meta($post_id, $field['id'].'-size', true);  
				$new = $_POST[$field['id'].'-size'];  
				if ($new !== '' && $new != $old) {  
					update_post_meta($post_id, $field['id'].'-size', $new);  
				} elseif ('' == $new && $old) {  
					delete_post_meta($post_id, $field['id'].'-size', $old);  
				} 
			}
		}  
    } // end foreach  
}  
add_action('save_post', 'kona_save_meta_galleryposttype');



function kona_save_meta_videoposttype($post_id) {  
    global $kona_meta_videoposttype;  
  
    // verify nonce  
    if (!isset($_POST['meta_videoposttype_nonce']) || !wp_verify_nonce($_POST['meta_videoposttype_nonce'], basename(__FILE__))) 
        return $post_id; 
		
    // check autosave  
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)  
        return $post_id;
		
    // check permissions  
    if ('page' == $_POST['post_type']) {  
        if (!current_user_can('edit_page', $post_id))  
            return $post_id;  
        } elseif (!current_user_can('edit_post', $post_id)) {  
            return $post_id;  
    }  
  
    // loop through fields and save the data  
     foreach ($kona_meta_videoposttype as $field) {  
        if (	$field['type'] !== 'info' && $field['type'] !== 'tabstart' && $field['type'] !== 'tabend' && 
			$field['type'] !== 'hidinggroupstart' && $field['type'] !== 'hidinggroupend') {
			$old = get_post_meta($post_id, $field['id'], true);  
			if (isset($_POST[$field['id']])) {
				$new = $_POST[$field['id']];  
				if ($new !== '' && $new != $old) {  
					update_post_meta($post_id, $field['id'], $new);  
				} elseif ('' == $new && $old) {  
					delete_post_meta($post_id, $field['id'], $old);  
				}
			} 
			
			// Size type
			if ($field['type'] == 'title') { 
				$old = get_post_meta($post_id, $field['id'].'-size', true);  
				$new = $_POST[$field['id'].'-size'];  
				if ($new !== '' && $new != $old) {  
					update_post_meta($post_id, $field['id'].'-size', $new);  
				} elseif ('' == $new && $old) {  
					delete_post_meta($post_id, $field['id'].'-size', $old);  
				} 
			}
		}  
    } // end foreach  
}  
add_action('save_post', 'kona_save_meta_videoposttype');



function kona_save_meta_audioposttype($post_id) {  
    global $kona_meta_audioposttype;  
  
    // verify nonce  
    if (!isset($_POST['meta_audioposttype_nonce']) || !wp_verify_nonce($_POST['meta_audioposttype_nonce'], basename(__FILE__))) 
        return $post_id; 
		
    // check autosave  
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)  
        return $post_id;
		
    // check permissions  
    if ('page' == $_POST['post_type']) {  
        if (!current_user_can('edit_page', $post_id))  
            return $post_id;  
        } elseif (!current_user_can('edit_post', $post_id)) {  
            return $post_id;  
    }  
  
    // loop through fields and save the data  
     foreach ($kona_meta_audioposttype as $field) {  
        if (	$field['type'] !== 'info' && $field['type'] !== 'tabstart' && $field['type'] !== 'tabend' && 
			$field['type'] !== 'hidinggroupstart' && $field['type'] !== 'hidinggroupend') {
			$old = get_post_meta($post_id, $field['id'], true);  
			if (isset($_POST[$field['id']])) {
				$new = $_POST[$field['id']];  
				if ($new !== '' && $new != $old) {  
					update_post_meta($post_id, $field['id'], $new);  
				} elseif ('' == $new && $old) {  
					delete_post_meta($post_id, $field['id'], $old);  
				}
			} 
			
			// Size type
			if ($field['type'] == 'title') { 
				$old = get_post_meta($post_id, $field['id'].'-size', true);  
				$new = $_POST[$field['id'].'-size'];  
				if ($new !== '' && $new != $old) {  
					update_post_meta($post_id, $field['id'].'-size', $new);  
				} elseif ('' == $new && $old) {  
					delete_post_meta($post_id, $field['id'].'-size', $old);  
				} 
			}
		}  
    } // end foreach  
}  
add_action('save_post', 'kona_save_meta_audioposttype');



function kona_save_meta_quoteposttype($post_id) {  
    global $kona_meta_quoteposttype;  
  
    // verify nonce  
    if (!isset($_POST['meta_quoteposttype_nonce']) || !wp_verify_nonce($_POST['meta_quoteposttype_nonce'], basename(__FILE__))) 
        return $post_id; 
		
    // check autosave  
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)  
        return $post_id;
		
    // check permissions  
    if ('page' == $_POST['post_type']) {  
        if (!current_user_can('edit_page', $post_id))  
            return $post_id;  
        } elseif (!current_user_can('edit_post', $post_id)) {  
            return $post_id;  
    }  
  
    // loop through fields and save the data  
     foreach ($kona_meta_quoteposttype as $field) {  
        if (	$field['type'] !== 'info' && $field['type'] !== 'tabstart' && $field['type'] !== 'tabend' && 
			$field['type'] !== 'hidinggroupstart' && $field['type'] !== 'hidinggroupend') {
			$old = get_post_meta($post_id, $field['id'], true);  
			if (isset($_POST[$field['id']])) {
				$new = $_POST[$field['id']];  
				if ($new !== '' && $new != $old) {  
					update_post_meta($post_id, $field['id'], $new);  
				} elseif ('' == $new && $old) {  
					delete_post_meta($post_id, $field['id'], $old);  
				}
			} 
			
			// Size type
			if ($field['type'] == 'title') { 
				$old = get_post_meta($post_id, $field['id'].'-size', true);  
				$new = $_POST[$field['id'].'-size'];  
				if ($new !== '' && $new != $old) {  
					update_post_meta($post_id, $field['id'].'-size', $new);  
				} elseif ('' == $new && $old) {  
					delete_post_meta($post_id, $field['id'].'-size', $old);  
				} 
			}
		}  
    } // end foreach  
}  
add_action('save_post', 'kona_save_meta_quoteposttype');


function kona_save_meta_secondimage($post_id) {  
    global $kona_meta_secondimage;  
  
    // verify nonce  
    if (!isset($_POST['meta_secondimage_nonce']) || !wp_verify_nonce($_POST['meta_secondimage_nonce'], basename(__FILE__))) 
        return $post_id; 
		
    // check autosave  
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)  
        return $post_id;
		
    // check permissions  
    if ('page' == $_POST['post_type']) {  
        if (!current_user_can('edit_page', $post_id))  
            return $post_id;  
        } elseif (!current_user_can('edit_post', $post_id)) {  
            return $post_id;  
    }  
  
    // loop through fields and save the data  
     foreach ($kona_meta_secondimage as $field) {  
        if (	$field['type'] !== 'info' && $field['type'] !== 'tabstart' && $field['type'] !== 'tabend' && 
			$field['type'] !== 'hidinggroupstart' && $field['type'] !== 'hidinggroupend') {
			$old = get_post_meta($post_id, $field['id'], true);  
			if (isset($_POST[$field['id']])) {
				$new = $_POST[$field['id']];  
				if ($new !== '' && $new != $old) {  
					update_post_meta($post_id, $field['id'], $new);  
				} elseif ('' == $new && $old) {  
					delete_post_meta($post_id, $field['id'], $old);  
				}
			} 
			
			// Size type
			if ($field['type'] == 'title') { 
				$old = get_post_meta($post_id, $field['id'].'-size', true);  
				$new = $_POST[$field['id'].'-size'];  
				if ($new !== '' && $new != $old) {  
					update_post_meta($post_id, $field['id'].'-size', $new);  
				} elseif ('' == $new && $old) {  
					delete_post_meta($post_id, $field['id'].'-size', $old);  
				} 
			}
		}  
    } // end foreach  
}  
add_action('save_post', 'kona_save_meta_secondimage');


function kona_save_meta_productsettings($post_id) {  
    global $kona_meta_productsettings;  
  
    // verify nonce  
    if (!isset($_POST['meta_productsettings_nonce']) || !wp_verify_nonce($_POST['meta_productsettings_nonce'], basename(__FILE__))) 
        return $post_id; 
		
    // check autosave  
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)  
        return $post_id;
		
    // check permissions  
    if ('page' == $_POST['post_type']) {  
        if (!current_user_can('edit_page', $post_id))  
            return $post_id;  
        } elseif (!current_user_can('edit_post', $post_id)) {  
            return $post_id;  
    }  
  
    // loop through fields and save the data  
     foreach ($kona_meta_productsettings as $field) {  
        if (	$field['type'] !== 'info' && $field['type'] !== 'tabstart' && $field['type'] !== 'tabend' && 
			$field['type'] !== 'hidinggroupstart' && $field['type'] !== 'hidinggroupend') {
			$old = get_post_meta($post_id, $field['id'], true);  
			if (isset($_POST[$field['id']])) {
				$new = $_POST[$field['id']];  
				if ($new !== '' && $new != $old) {  
					update_post_meta($post_id, $field['id'], $new);  
				} elseif ('' == $new && $old) {  
					delete_post_meta($post_id, $field['id'], $old);  
				}
			} 
			
			// Size type
			if ($field['type'] == 'title') { 
				$old = get_post_meta($post_id, $field['id'].'-size', true);  
				$new = $_POST[$field['id'].'-size'];  
				if ($new !== '' && $new != $old) {  
					update_post_meta($post_id, $field['id'].'-size', $new);  
				} elseif ('' == $new && $old) {  
					delete_post_meta($post_id, $field['id'].'-size', $old);  
				} 
			}
		}  
    } // end foreach  
}  
add_action('save_post', 'kona_save_meta_productsettings');





/*-----------------------------------------------------------------------------------

	WOO custom theme meta boxes

-----------------------------------------------------------------------------------*/
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	
function kona_shop_add_gallery_meta() { 
	add_meta_box(  
        'meta_prodgallery', // $id  
        esc_html__('Product gallery', 'kona'), // $title  
        'kona_show_meta_prodgallery', // $callback  
        'product', // $page  
        'side', // $context  
        'low'); // $priority 
}  
add_action('add_meta_boxes', 'kona_shop_add_gallery_meta');

$kona_meta_prodgallery = array(

	array(	'label' => "",  
			'desc'  => esc_html__("Position only affects if you choose a modern layout", 'kona'),  
			'id' => '_sr_prodgallery',		// must called medias
			'type' => 'medias-option',
			'option' => "size:select:normal,fullheight", // for more width:select:normal,double|title:text
		),
				
);

function kona_show_meta_prodgallery() {  
 	global $kona_meta_prodgallery, $post;  
 	// Use nonce for verification  
 	echo '<input type="hidden" name="meta_prodgallery_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';  
   	kona_show_fields($kona_meta_prodgallery);  
}

function kona_save_meta_prodgallery($post_id) {  
    global $kona_meta_prodgallery;  
  
    // verify nonce  
    if (!isset($_POST['meta_prodgallery_nonce']) || !wp_verify_nonce($_POST['meta_prodgallery_nonce'], basename(__FILE__))) 
        return $post_id; 
		
    // check autosave  
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)  
        return $post_id;
		
    // check permissions  
    if ('page' == $_POST['post_type']) {  
        if (!current_user_can('edit_page', $post_id))  
            return $post_id;  
        } elseif (!current_user_can('edit_post', $post_id)) {  
            return $post_id;  
    }  
  
    // loop through fields and save the data  
     foreach ($kona_meta_prodgallery as $field) {  
        if (	$field['type'] !== 'info' && $field['type'] !== 'tabstart' && $field['type'] !== 'tabend' && 
			$field['type'] !== 'hidinggroupstart' && $field['type'] !== 'hidinggroupend') {
			$old = get_post_meta($post_id, $field['id'], true);  
			if (isset($_POST[$field['id']])) {
				$new = $_POST[$field['id']];  
				if ($new !== '' && $new != $old) {  
					update_post_meta($post_id, $field['id'], $new);  
				} elseif ('' == $new && $old) {  
					delete_post_meta($post_id, $field['id'], $old);  
				}
			} 
			
			// Size type
			if ($field['type'] == 'title') { 
				$old = get_post_meta($post_id, $field['id'].'-size', true);  
				$new = $_POST[$field['id'].'-size'];  
				if ($new !== '' && $new != $old) {  
					update_post_meta($post_id, $field['id'].'-size', $new);  
				} elseif ('' == $new && $old) {  
					delete_post_meta($post_id, $field['id'].'-size', $old);  
				} 
			}
		}  
    } // end foreach  
}  
add_action('save_post', 'kona_save_meta_prodgallery');

	
	
}


?>