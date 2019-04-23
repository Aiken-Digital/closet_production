<?php

/*-----------------------------------------------------------------------------------

	Custom Post/Portfolio Meta boxes

-----------------------------------------------------------------------------------*/


/*-----------------------------------------------------------------------------------*/
/*	Add Pagebuilder Metabox
/*-----------------------------------------------------------------------------------*/
function kona_add_meta_pagebuilder() {  
    add_meta_box(  
        'meta_pagebuilder', // $id  
        esc_html__('Pagebuilder', 'kona'), // $title  
        'kona_show_meta_pagebuilder', // $callback  
        'page', // $page  
        'normal', // $context  p
        'high'); // $priority
		
	add_meta_box(  
        'meta_pagebuilder', // $id  j
        esc_html__('Pagebuilder', 'kona'), // $title  
        'kona_show_meta_pagebuilder', // $callback  o
        'portfolio', // $page  
        'normal', // $context  
        'high'); // $priority
	
	add_meta_box(  
        'meta_pagebuilder', // $id  
        esc_html__('Pagebuilder', 'kona'), // $title  
        'kona_show_meta_pagebuilder', // $callback  o
        'product', // $page  
        'normal', // $context  
        'high'); // $priority
}  
add_action('add_meta_boxes', 'kona_add_meta_pagebuilder');

	

/*-----------------------------------------------------------------------------------*/
/*	Pagebuilder (Options)
/*-----------------------------------------------------------------------------------*/
$kona_meta_pagebuilder = array(  
	array(  
		'title' => esc_html__('Background Section', 'kona'),
	   	'id'    => 'fullwidthsection',
	   	'desc' => '',
	   	'type' => 'row',
	   	'icon' => 'dashicons-admin-customizer',
		'fields' => array(
			
			array( "name" => esc_html__("Settings", 'kona'),
			   "id" => "sr-pb-tab-bgsettings",
			   "type" => "tabstart"
			  ),
				
				array(
					'label' => esc_html__('Background', 'kona'),
					'desc' => '',
					'id' => 'background',
					'type' => 'selectbox-hiding',
					'sendval' => true,
					'option' => array( 
						array(	'name' =>esc_html__('Color Background', 'kona'), 
								'value' => 'color'),			 	
						array(	'name' => esc_html__('Image / Parallax Background', 'kona'), 
								'value'=> 'image'),
						array(	"name" => esc_html__("Selfhosted Video Background", 'kona'), 
								"value"=> "selfhosted"),
						array(	"name" => esc_html__("Youtube Video Background", 'kona'), 
								"value"=> "youtube"),
						array(	"name" => esc_html__("Vimeo Video Background", 'kona'), 
								"value"=> "vimeo")
						),
					'default' => 'color'
				),
				
					// Color Background
					array( 
							"id" => "fullwidthsection-background",
							"hiding" => "color",	
							"type" => "hidinggroupstart"
						),
						array( 	"label" => esc_html__("Background Color", 'kona'),
								"desc" => 'Choose a background color for this row',
								"id" => 'colorbg',
								"type" => "color",
								'sendval' => true
						),
					array( 
							"id" => "fullwidthsection-background",
							"type" => "hidinggroupend"
						),
						
						
					// Image Background
					array( 
							"id" => "fullwidthsection-background",
							"hiding" => "image",	
							"type" => "hidinggroupstart"
						),
						array(  'label' => esc_html__("Background Image", 'kona'),  
								'desc'  => "",  
								'id'    => 'imagebg',  
								'type'  => 'image', 
								'sendval' => true
						),
						array(  'label' => esc_html__("Image type (effect)", 'kona'),  
								'desc'  => "",  
								'id'    => 'imagetype', 
								'type'  => 'checkbox-hiding', 
								'sendval' => true,
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
								
							array( 	"id" => "fullwidthsection-imagetype",
									"hiding" => "pattern",	
									"type" => "hidinggroupstart"
									),
									
									array(  'label' => " ",
											'desc'  => esc_html__("To enable retina for the pattern, you need to upload an image with '@2x' in its name.", 'kona').'<br>'.esc_html__("Example: pattern@2x.jpg.  In this case, the image will be descrease by half of it size.", 'kona'),  
											'type'  => 'info'
											),
									
							array( 	"id" => "fullwidthsection-imagetype",
									"hiding" => "pattern",	
									"type" => "hidinggroupend"
									),
						
					array( 
							"id" => "fullwidthsection-background",
							"type" => "hidinggroupend"
						),	
						
					
					// Selfhosted Video
					array( 
							"id" => "fullwidthsection-background",
							"hiding" => "selfhosted",	
							"type" => "hidinggroupstart"
						),
						array(  'label' => esc_html__("MP4 file url", 'kona'),  
								'desc'  => esc_html__("The url to the MP4 file", 'kona'),  
								'id'    => 'selfhostedmp4',  
								'type'  => 'video', 
								'sendval' => true
							),
						array(  'label' => esc_html__("WEBM file url", 'kona'),  
								'desc'  => esc_html__("The url to the WEBM file", 'kona'),  
								'id'    => 'selfhostedwebm',  
								'type'  => 'video', 
								'sendval' => true
							),
						array(  'label' => esc_html__("OGV file url", 'kona'),  
								'desc'  => esc_html__("The url to the OGV file", 'kona'),  
								'id'    => 'selfhostedogv',  
								'type'  => 'video', 
								'sendval' => true
							),
					array( 
							"id" => "fullwidthsection-background",
							"type" => "hidinggroupend"
						),
						
						
					// Youtube Video
					array( 
							"id" => "fullwidthsection-background",
							"hiding" => "youtube",	
							"type" => "hidinggroupstart"
						),
						array(  'label' => esc_html__("Youtube Video ID", 'kona'),  
								'desc'  => esc_html__("Enter the right of id of the youtube video", 'kona'),  
								'id'    => 'youtubeid',  
								'type'  => 'text', 
								'sendval' => true,
							),
					array( 
							"id" => "fullwidthsection-background",
							"type" => "hidinggroupend"
						),
						
					
					// Vimeo Video
					array( 
							"id" => "fullwidthsection-background",
							"hiding" => "vimeo",	
							"type" => "hidinggroupstart"
						),
						array(  'label' => esc_html__("Vimeo Video ID", 'kona'),  
								'desc'  => esc_html__("Enter the right of id of the vimeo video", 'kona'),  
								'id'    => 'vimeoid',  
								'type'  => 'text', 
								'sendval' => true,
							),
					array( 
							"id" => "fullwidthsection-background",
							"type" => "hidinggroupend"
						),
						
						
					// Misc Video
					array( 
							"id" => "fullwidthsection-background",
							"hiding" => "selfhosted youtube vimeo",	
							"type" => "hidinggroupstart"
						),
						array(  'label' => esc_html__("Video Ratio", 'kona'),  
								'desc'  => "",  
								'id'    => 'videoratio', 
								'type'  => 'selectbox', 
								'sendval' => true,
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
								'id'    => 'videoloop', 
								'type'  => 'checkbox',
								'sendval' => true,
								'default' => '1'
								),
								
						array(  'label' => esc_html__("Sound", 'kona'),  
								'desc'  => esc_html__("If on, a button will be displayed, to enable the visitor to turn it on/off", 'kona'),  
								'id'    => 'videomute', 
								'type'  => 'checkbox',
								'sendval' => true,
								'option' => array( 
									array(	"name" => "On", 
											"value" => "1"),
									array(	"name" => "Off", 
											"value" => "0")
									),
								'default'  => '0' 
								),
	
						array(  'label' => esc_html__("Play / Pause Control", 'kona'),  
								'desc'  => "",  
								'id'    => 'videoplaypause', 
								'type'  => 'checkbox',
								'sendval' => true,
								'option' => array( 
									array(	"name" => "Yes", 
											"value" => "1"),
									array(	"name" => "No", 
											"value" => "0")
									),
								'default'  => '0' 
								),
								
						array(  'label' => esc_html__("Video Poster Image", 'kona'),  
								'desc'  => esc_html__("This image will be displayed on mobile devices", 'kona'),  
								'id'    => 'videoposter',  
								'type'  => 'image', 
								'sendval' => true
								),
								
						array(	'label' => esc_html__("Video Overlay Color", 'kona'),  
								'desc'  => "",  
								'id'    => 'videooverlaycolor',  
								'type'  => 'color', 
								'sendval' => true
								),
								
						array(  'label' => esc_html__("Video Overlay opacity", 'kona'),  
								'desc'  => esc_html__("Choose the opacity for the overlay color", 'kona'),  
								'id'    => 'videooverlayopacity', 
								'type'  => 'selectbox', 
								'sendval' => true,
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
									),
								'default' => '0.1'
							),
					array( 
							"id" => "fullwidthsection-background",
							"type" => "hidinggroupend"
						),	
						
						
					array(
							'label' => esc_html__('Text color', 'kona'),
							'desc' => esc_html__("Choose Text color depending on your background", 'kona'),
							'id' => 'textcolor',
							'type' => 'selectbox',
							'sendval' => true,
							'option' => array( 
								array(	'name' =>esc_html__('Light', 'kona'), 
										'value' => 'text-light'),			 	
								array(	'name' => esc_html__('Dark', 'kona'), 
										'value'=> 'text-dark')
								),
							'default' => 'text-light'
						),
					array( 	"label" => esc_html__("Padding Top", 'kona'),
							"desc" => '',
							"id" => "paddingtop",
							"type" => "text-responsive",
							'sendval' => true,
							"default" => "80px"
						),
					array( 	"label" => esc_html__("Padding Bottom", 'kona'),
							"desc" => '',
							"id" => "paddingbottom",
							"type" => "text-responsive",
							'sendval' => true,
							"default" => "80px"
						),
						
			array( "name" => esc_html__("Settings", 'kona'),
			   "id" => "sr-pb-tab-bgsettings",
			   "type" => "tabend"
			  ),
			  
			  
			array( "name" => esc_html__("Customize", 'kona'),
			   "id" => "sr-pb-tab-bgcustomize",
			   "type" => "tabstart"
			  ),
			  
			  	array( 	"label" => esc_html__("Class", 'kona'),
						"desc" => '',
						"id" => "class",
						"type" => "text",
						'sendval' => true,
						"default" => ""
					),
					
				array( 	"label" => esc_html__("ID", 'kona'),
						"desc" => '',
						"id" => "id",
						"type" => "text",
						'sendval' => true,
						"default" => ""
					),
			  
			array( "name" => esc_html__("Customize", 'kona'),
			   "id" => "sr-pb-tab-bgcustomize",
			   "type" => "tabend"
			  ),
			
		)
	),
	array(  
		'title' => esc_html__('Column Row', 'kona'),
	   	'id'    => 'columnsection',
	   	'desc' => '',
	   	'type' => 'row',
	   	'icon' => 'dashicons-editor-table',
		'fields' => array(
			
			array( "name" => esc_html__("Row Settings", 'kona'),
			   	"id" => "sr-pb-tab-columnsettings",
			   	"type" => "tabstart"
			  	),
			
				array(
					'label' => esc_html__('Content Size', 'kona'),
					'desc' => 'Choose the wrapper/content size.',
					'id' => 'wrapper',
					'type' => 'selectbox',
					'sendval' => true,
					'option' => array( 
						array(	'name' => esc_html__('Mini (420px)', 'kona'), 
								'value'=> 'wrapper-mini'), 
						array(	'name' => esc_html__('Small (780px)', 'kona'), 
								'value'=> 'wrapper-small'),
						array(	'name' => esc_html__('Medium (1140px)', 'kona'), 
								'value'=> 'wrapper-medium'),
						array(	'name' =>esc_html__('Default (1440px)', 'kona'), 
								'value' => 'wrapper'),
						array(	'name' =>esc_html__('Full width (100%)', 'kona'), 
								'value' => 'no-wrapper')
						),
					'default' => 'wrapper'
				),
							
				array(
					'label' => esc_html__('Column Layout', 'kona'),
					'desc' => '',
					'id' => 'layout',
					'type' => 'custom-select-hiding',
					'sendval' => true,
					'option' => array( 
						array(	'name' =>esc_html__('Full', 'kona'), 
								'value' => 'one-full',
								'hiding'=> 'none',
								'img' => 'col-1.png'),	
						array(	'name' => esc_html__('Half/Half', 'kona'), 
								'value'=> 'one-half;one-half',
								'hiding'=> 'half_half',
								'img' => 'col-2.png'),
						array(	'name' => esc_html__('Third/Third/Third', 'kona'), 
								'value'=> 'one-third;one-third;one-third',
								'hiding'=> 'none',
								'img' => 'col-3.png'),
						array(	'name' => esc_html__('Fourth/Fourth/Fourth/Fourth', 'kona'), 
								'value'=> 'one-fourth;one-fourth;one-fourth;one-fourth',
								'hiding'=> 'none',
								'img' => 'col-4.png'),
						array(	'name' => esc_html__('Fifth/Fifth/Fifth/Fifth/Fifth', 'kona'), 
								'value'=> 'one-fifth;one-fifth;one-fifth;one-fifth;one-fifth',
								'hiding'=> 'none',
								'img' => 'col-5.png'),
						array(	'name' => esc_html__('One Thrid/Two Third', 'kona'), 
								'value'=> 'one-third;two-third',
								'hiding'=> 'half_half',
								'img' => 'col-6.png'),
						array(	'name' => esc_html__('Two Thrid/One Third', 'kona'), 
								'value'=> 'two-third;one-third',
								'hiding'=> 'half_half',
								'img' => 'col-7.png'),
						array(	'name' => esc_html__('One Fourth/Three Fourth', 'kona'), 
								'value'=> 'one-fourth;three-fourth',
								'hiding'=> 'half_half',
								'img' => 'col-8.png'),
						array(	'name' => esc_html__('Three Fourth/One Fourth', 'kona'), 
								'value'=> 'three-fourth;one-fourth',
								'hiding'=> 'half_half',
								'img' => 'col-9.png'),
						array(	'name' => esc_html__('One Fourth/One Fourth/Two Fourth', 'kona'), 
								'value'=> 'one-fourth;one-fourth;two-fourth',
								'hiding'=> 'none',
								'img' => 'col-10.png'),
						array(	'name' => esc_html__('Two Fourth/One Fourth/One Fourth', 'kona'), 
								'value'=> 'two-fourth;one-fourth;one-fourth',
								'hiding'=> 'none',
								'img' => 'col-11.png'),
						array(	'name' => esc_html__('One Fourth/Two Fourth/One Fourth', 'kona'), 
								'value'=> 'one-fourth;two-fourth;one-fourth',
								'hiding'=> 'none',
								'img' => 'col-12.png'),
						array(	'name' => esc_html__('One Fifth/Two Fifth/One Fifth', 'kona'), 
								'value'=> 'one-fifth;two-fifth;two-fifth',
								'hiding'=> 'none',
								'img' => 'col-13.png'),
						array(	'name' => esc_html__('Two Fifth/One Fifth/One Fifth', 'kona'), 
								'value'=> 'two-fifth;two-fifth;one-fifth',
								'hiding'=> 'none',
								'img' => 'col-14.png'),
						array(	'name' => esc_html__('One Fifth/Four Fifth', 'kona'), 
								'value'=> 'one-fifth;four-fifth',
								'hiding'=> 'half_half',
								'img' => 'col-15.png'),
						array(	'name' => esc_html__('Four Fifth/One Fifth', 'kona'), 
								'value'=> 'four-fifth;one-fifth',
								'hiding'=> 'half_half',
								'img' => 'col-16.png'),
						array(	'name' => esc_html__('Two Fifth/Three Fifth', 'kona'), 
								'value'=> 'two-fifth;three-fifth',
								'hiding'=> 'half_half',
								'img' => 'col-17.png'),
						array(	'name' => esc_html__('Three Fifth/Two Fifth', 'kona'), 
								'value'=> 'three-fifth;two-fifth',
								'hiding'=> 'half_half',
								'img' => 'col-18.png')
						),
					'default' => 'one-full'
				),
	
				array( 
						"id" => "columnsection-layout",
						"hiding" => "half_half",	
						"type" => "hidinggroupstart"
					),
					array( 	"label" => __("Swap column order on mobile devices", 'kona'),
							"desc" => '',
							"id" => 'swap',
							'type' => 'checkbox',
							'sendval' => true,
							'option' => array( 
								array(	'name' => __('No', 'kona'), 
										'value'=> '0'),
								array(	'name' =>__('Yes', 'kona'), 
										'value' => '1')			 	
								),
							'default' => '0'
					),
				array( 
						"id" => "columnsection-layout",
						"type" => "hidinggroupend"
					),
				
				array(
					'label' => esc_html__('Column Spacing', 'kona'),
					'desc' => 'Choose a spacing size for this column grid.',
					'id' => 'spacing',
					'type' => 'selectbox',
					'sendval' => true,
					'option' => array( 
						array(	'name' => esc_html__('Normal / Default', 'kona'), 
								'value'=> 'spaced-normal'),
						array(	'name' =>esc_html__('Big spacings', 'kona'), 
								'value' => 'spaced-big'),
						array(	'name' =>esc_html__('Huge spacings', 'kona'), 
								'value' => 'spaced-huge'),
						array(	'name' =>esc_html__('No', 'kona'), 
								'value' => 'spaced-none')
						),
					'default' => 'spaced-normal'
				),
	
				array(
					'label' => __('Animation', 'kona'),
					'desc' => __("Do you want to animate the whole column row when it get's visible on viewport?", 'kona'),
					'id' => 'animation',
					'type' => 'checkbox',
					'sendval' => true,
					'option' => array( 
						array(	'name' => __('No', 'kona'), 
								'value'=> 'no-anim'),
						array(	'name' =>__('Yes', 'kona'), 
								'value' => 'do-anim')			 	
						),
					'default' => 'no-anim'
				),
	
				array(
					'label' => __('Column Align', 'kona'),
					'desc' => __("How to you want your columns to be aligned?", 'kona'),
					'id' => 'colalign',
					'type' => 'custom-select',
					'sendval' => true,
					'option' => array( 
						array(	'name' =>esc_html__('Top', 'kona'), 
								'value' => 'top',
								'img' => 'col-align-top.png'),	
						array(	'name' => esc_html__('Center', 'kona'), 
								'value'=> 'center',
								'img' => 'col-align-center.png'),	
						array(	'name' => esc_html__('Third/Third/Third', 'kona'), 
								'value'=> 'bottom',
								'img' => 'col-align-bottom.png'),	
						),
					'default' => 'top'
				),
			  
			array( "name" => esc_html__("Row Settings", 'kona'),
			   "id" => "sr-pb-tab-columnsettings",
			   "type" => "tabend"
			  ),
			
			
			array( "name" => esc_html__("Customize", 'kona'),
			   "id" => "sr-pb-tab-columncustomize",
			   "type" => "tabstart"
			  ),
			  
			  	array( 	"label" => esc_html__("Class", 'kona'),
						"desc" => '',
						"id" => "class",
						"type" => "text",
						'sendval' => true,
						"default" => ""
					),
					
				array( 	"label" => esc_html__("ID", 'kona'),
						"desc" => '',
						"id" => "id",
						"type" => "text",
						'sendval' => true,
						"default" => ""
					),
			  
			array( "name" => esc_html__("Customize", 'kona'),
			   "id" => "sr-pb-tab-columncustomize",
			   "type" => "tabend"
			  ),
					
		)
	),
	array(  
		'title' => __('Column Settings', 'kona'),
	   	'id'    => 'col',
	   	'desc' => '',
	   	'type' => 'hidden',
	   	'icon' => 'dashicons-admin-settings',
		'fields' => array(
			
			array( "name" => __("Background", 'kona'),
			   "id" => "sr-pb-tab-colbackground",
			   "type" => "tabstart"
			  ),	
			  
			  	array(
					'label' => __('Background', 'kona'),
					'desc' => '',
					'id' => 'background',
					'type' => 'selectbox-hiding',
					'sendval' => true,
					'option' => array( 
						array(	'name' =>__('None', 'kona'), 
								'value' => 'none'),	
						array(	'name' =>__('Color Background', 'kona'), 
								'value' => 'color'),			 	
						array(	'name' => __('Image / Parallax Background', 'kona'), 
								'value'=> 'image')
						),
					'default' => 'none'
				),
				
					// Color Background
					array( 
							"id" => "col-background",
							"hiding" => "color",	
							"type" => "hidinggroupstart"
						),
						array( 	"label" => __("Background Color", 'kona'),
								"desc" => 'Choose a background color for this row',
								"id" => 'colorbg',
								"type" => "color",
								'sendval' => true
						),
					array( 
							"id" => "col-background",
							"type" => "hidinggroupend"
						),
						
						
					// Image Background
					array( 
							"id" => "col-background",
							"hiding" => "image",	
							"type" => "hidinggroupstart"
						),
						array(  'label' => esc_html__("Background Image", 'kona'),  
								'desc'  => "",  
								'id'    => 'imagebg',  
								'type'  => 'image', 
								'sendval' => true
						),
						array(  'label' => esc_html__("Image type (effect)", 'kona'),  
								'desc'  => "",  
								'id'    => 'imagetype', 
								'type'  => 'checkbox-hiding', 
								'sendval' => true,
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
								
							array( 	"id" => "fullwidthsection-imagetype",
									"hiding" => "pattern",	
									"type" => "hidinggroupstart"
									),
									
									array(  'label' => " ",
											'desc'  => esc_html__("To enable retina for the pattern, you need to upload an image with '@2x' in its name.", 'kona').'<br>'.esc_html__("Example: pattern@2x.jpg.  In this case, the image will be descrease by half of it size.", 'kona'),  
											'type'  => 'info'
											),
									
							array( 	"id" => "fullwidthsection-imagetype",
									"hiding" => "pattern",	
									"type" => "hidinggroupend"
									),
					array( 
							"id" => "col-background",
							"type" => "hidinggroupend"
						),
						
					array(
							'label' => __('Text color', 'kona'),
							'desc' => __("Choose Text color depending on your background", 'kona'),
							'id' => 'textcolor',
							'type' => 'selectbox',
							'sendval' => true,
							'option' => array( 
								array(	'name' => __('Dark', 'kona'), 
										'value'=> 'text-dark'),
								array(	'name' =>__('Light', 'kona'), 
										'value' => 'text-light')			 	
								),
							'default' => 'text-dark'
						),
	
					array(
							'label' => __('Animation', 'kona'),
							'desc' => __("Do you want to animate the column when it get's visible on viewport?", 'kona'),
							'id' => 'animation',
							'type' => 'checkbox',
							'sendval' => true,
							'option' => array( 
								array(	'name' => __('No', 'kona'), 
										'value'=> 'no-anim'),
								array(	'name' =>__('Yes', 'kona'), 
										'value' => 'do-anim')			 	
								),
							'default' => 'no-anim'
						),
				  
			array( "name" => __("Background", 'kona'),
			   "id" => "sr-pb-tab-colbackground",
			   "type" => "tabend"
			  ),
			  			
			array( "name" => __("Customize", 'kona'),
			   "id" => "sr-pb-tab-colsettings",
			   "type" => "tabstart"
			  ),	
			
				array(
					'label' => __('Column Size', 'kona'),
					'desc' => '',
					'id' => 'size',
					'type' => 'hidden',
					'sendval' => true
				),
				
				array(
					'label' => __('Last Column', 'kona'),
					'desc' => 'Is this the last column of the row?',
					'id' => 'last',
					'type' => 'hidden',
					'sendval' => true
				),
	
				
				array( 	"label" => __("Class", 'kona'),
						"desc" => '',
						"id" => "class",
						"type" => "text",
						'sendval' => true,
						"default" => ""
					),
					
				array( 	"label" => __("ID", 'kona'),
						"desc" => '',
						"id" => "id",
						"type" => "text",
						'sendval' => true,
						"default" => ""
					),
	
				array(
						'label' => __('Left Padding', 'kona'),
						'desc' => __('Use px,% or em as value', 'kona'),
						'id' => 'paddingleft',
						'type' => 'text-responsive',
						'sendval' => true,
						'default' => '0px'
					),
	
				array(
						'label' => __('Right Padding', 'kona'),
						'desc' => __('Use px,% or em as value', 'kona'),
						'id' => 'paddingright',
						'type' => 'text-responsive',
						'sendval' => true,
						'default' => '0px'
					),
	
				array(
						'label' => __('Top Padding', 'kona'),
						'desc' => __('Use px,% or em as value', 'kona'),
						'id' => 'paddingtop',
						'type' => 'text-responsive',
						'sendval' => true,
						'default' => '0px'
					),

				array(
						'label' => __('Bottom Padding', 'kona'),
						'desc' => __('Use px,% or em as value', 'kona'),
						'id' => 'paddingbottom',
						'type' => 'text-responsive',
						'sendval' => true,
						'default' => '0px'
					),
				
			array( "name" => __("Settings", 'kona'),
			   "id" => "sr-pb-tab-colsettings",
			   "type" => "tabend"
			  )
		)
	),
	array(  
		'title' => esc_html__('Spacer', 'kona'),
	   	'id'    => 'sr-spacer',
	   	'desc' => '',
	   	'type' => 'row,element',
	   	'icon' => 'dashicons-sort',
		'fields' => array(
		
			array(
				'label' => esc_html__('Spacer Size', 'kona'),
				'desc' => 'What spacer size do you want.',
				'id' => 'size',
				'type' => 'selectbox',
				'sendval' => true,
				'option' => array( 
					array(	'name' =>esc_html__('Big (100px)', 'kona'), 
							'value' => 'big'),	
					array(	'name' => esc_html__('Medium (80px)', 'kona'), 
							'value'=> 'medium'),
					array(	'name' => esc_html__('Small (40px)', 'kona'), 
							'value'=> 'small'),
					array(	'name' => esc_html__('Mini (20px)', 'kona'), 
							'value'=> 'mini')	
					),
				'default' => 'big'
			),
	
			array(
				'label' => esc_html__('Hide Spacer for mobile', 'kona'),
				'desc' => 'Do you wnat to hide the spacer for smaller screen sizes?',
				'id' => 'hide',
				'type' => 'selectbox',
				'sendval' => true,
				'option' => array( 
					array(	'name' =>esc_html__("Don't hide", 'kona'), 
							'value' => '0'),	
					array(	'name' => esc_html__('Hide for tablets (1024px)', 'kona'), 
							'value'=> 'hidden-1024'),
					array(	'name' => esc_html__('Hide for smartphones (768px)', 'kona'), 
							'value'=> 'hidden-768')	
					),
				'default' => '0'
			)
		
		)
		
	),
	array(  
		'title' => esc_html__('Text / Editor', 'kona'),
	   	'id'    => 'text',
	   	'desc' => '',
	   	'type' => 'row,element',
	   	'icon' => 'dashicons-editor-alignleft',
		'fields' =>  array(
		
			array(
				'label' => '',
				'desc' => '',
				'id' => 'content',
				'type' => 'editor',
				'sendval' => true
			)
		
		)
	),
	
	array(  
		'title' => esc_html__('Google Map', 'kona'),
	   	'id'    => 'sr-googlemap',
	   	'desc' => '',
	   	'type' => 'row,element',
	   	'icon' => 'dashicons-location',
		'fields' => array(
		
			array(
				'label' => esc_html__("Your API Key", 'kona'),  
				'desc'  => "Since June 2016 you need to create an API Key",  
				'id' => 'apikey',
				'type' => 'text',
				'sendval' => true
			),
			
			array(
				'label' => esc_html__("Latitude & Longitude", 'kona'),  
				'desc'  => esc_html__("Enter the google map latitude & longitude seperated by a comma using this tool: http://itouchmap.com/latlong.html", 'kona'),  
				'id' => 'latlong',
				'type' => 'text',
				'sendval' => true
			),
						
			array(
				'label' => 'Popup Text',
				'desc' => '',
				'id' => 'content',
				'type' => 'editor',
				'sendval' => true
			),
			
			array(
				'label' => esc_html__("Pin Icon", 'kona'),  
				'desc'  => "",  
				'id' => 'pinicon',
				'type' => 'image',
				'sendval' => true
			),
			
			array(
				'label' => esc_html__("Height (optional)", 'kona'),  
				'desc'  => "Default is 400px.",  
				'id' => 'height',
				'type' => 'text',
				'sendval' => true,
				'default' => '400px'
			),
			
			array(
				'label' => esc_html__("Zoom", 'kona'),  
				'desc'  => "",  
				'id' => 'zoom',
				'type' => 'text',
				'sendval' => true,
				'default' => '14'
			),
			
			array(
				'label' => esc_html__('Map Style', 'kona'),
				'desc' => '',
				'id' => 'style',
				'type' => 'selectbox',
				'sendval' => true,
				'option' => array( 
					array(	'name' =>esc_html__('Default', 'kona'), 
							'value' => 'default'),			 	
					array(	'name' => esc_html__('Greyscale', 'kona'), 
							'value'=> 'greyscale'),
					array(	'name' => esc_html__('Dark', 'kona'), 
							'value'=> 'dark'),
					array(	'name' => esc_html__('Satelite', 'kona'), 
							'value'=> 'satelite')
					),
				'default' => 'default'
			)
			
		)
	),
	array(  
		'title' => esc_html__('Team Member', 'kona'),
	   	'id'    => 'sr-teammember',
	   	'desc' => '',
	   	'type' => 'element',
	   	'icon' => 'dashicons-admin-users',
		'fields' =>  array(
		
			array(
				'label' => esc_html__("Name", 'kona'),  
				'desc'  => "",  
				'id' => 'name',
				'type' => 'textwithsize',
				'sendval' => true
			),
			array(
				'label' => esc_html__("Title / Role", 'kona'),  
				'desc'  => "",  
				'id' => 'title',
				'type' => 'textwithsize',
				'sendval' => true
			),
			array(
				'label' => esc_html__("Name / Title Align", 'kona'),  
				'desc'  => "",  
				'id' => 'titlealign',
				"type" => "selectbox",
			    'sendval' => true,
			    "option" => array( 
					array(	"name" => esc_html__("Left", 'kona'), 
							"value" => "align-left"),
					array(	"name" => esc_html__("Center", 'kona'), 
							"value"=> "align-center"),
					array(	"name" => esc_html__("Right", 'kona'), 
							"value"=> "align-right")
					),
			    "default" => "0"
			),
			array(
				'label' => esc_html__("Image", 'kona'),  
				'desc'  => "",  
				'id' => 'image',
				'type' => 'image',
				'sendval' => true
			),
			array( "label" => esc_html__("Slide In (Unveil) Effect", 'kona'),
				   "desc" => esc_html__("Enable the slide in effect.", 'kona'),
				   "id" => "unveil",
				   "type" => "checkbox",
				   'sendval' => true,
				   "option" => array( 
						array(	"name" => esc_html__("Yes", 'kona'), 
								"value"=> "do-anim"),
						array(	"name" => esc_html__("No", 'kona'), 
								"value" => "no-anim")
						),
				   "default" => "no-anim"
				  ),
			
			array(
				'label' => '',
				'desc' => '',
				'id' => 'content',
				'type' => 'editor',
				'sendval' => true
			),
			
			array(
				'label' => esc_html__("Facebook Profile", 'kona'),  
				'desc'  => "",  
				'id' => 'facebook',
				'type' => 'text',
				'sendval' => true
			),
			
			array(
				'label' => esc_html__("Behance Profile", 'kona'),  
				'desc'  => "",  
				'id' => 'behance',
				'type' => 'text',
				'sendval' => true
			),
			
			array(
				'label' => esc_html__("Dribbble Profile", 'kona'),  
				'desc'  => "",  
				'id' => 'dribbble',
				'type' => 'text',
				'sendval' => true
			),
			
			array(
				'label' => esc_html__("Twitter Profile", 'kona'),  
				'desc'  => "",  
				'id' => 'twitter',
				'type' => 'text',
				'sendval' => true
			),
			
			array(
				'label' => esc_html__("Google Profile", 'kona'),  
				'desc'  => "",  
				'id' => 'google',
				'type' => 'text',
				'sendval' => true
			),
			
			array(
				'label' => esc_html__("Instagram Profile", 'kona'),  
				'desc'  => "",  
				'id' => 'instagram',
				'type' => 'text',
				'sendval' => true
			),
			
			array(
				'label' => esc_html__("Youtube Profile", 'kona'),  
				'desc'  => "",  
				'id' => 'youtube',
				'type' => 'text',
				'sendval' => true
			),
			
			array(
				'label' => esc_html__("Vimeo Profile", 'kona'),  
				'desc'  => "",  
				'id' => 'vimeo',
				'type' => 'text',
				'sendval' => true
			),
			
			array(
				'label' => esc_html__("Tumblr Profile", 'kona'),  
				'desc'  => "",  
				'id' => 'tumblr',
				'type' => 'text',
				'sendval' => true
			),
			
			array(
				'label' => esc_html__("LinkedIn Profile", 'kona'),  
				'desc'  => "",  
				'id' => 'linkedin',
				'type' => 'text',
				'sendval' => true
			),
			
			array(
				'label' => esc_html__("VK Profile", 'kona'),  
				'desc'  => "",  
				'id' => 'vk',
				'type' => 'text',
				'sendval' => true
			),
			
			array(
				'label' => esc_html__("Soundcloud Profile", 'kona'),  
				'desc'  => "",  
				'id' => 'soundcloud',
				'type' => 'text',
				'sendval' => true
			),
			
			array(
				'label' => esc_html__("Website link", 'kona'),  
				'desc'  => "make sure to start with http://",  
				'id' => 'website',
				'type' => 'text',
				'sendval' => true
			),
			
			array(
				'label' => esc_html__("Mail Adress", 'kona'),  
				'desc'  => "just enter the email adress",  
				'id' => 'mail',
				'type' => 'text',
				'sendval' => true
			)
		)
	),
	array(  
		'title' => esc_html__('Gallery', 'kona'),
	   	'id'    => 'sr-gallery',
	   	'desc' => '',
	   	'type' => 'row,element',
	   	'icon' => 'dashicons-grid-view',
		'fields' =>  array(
		
			array(
				'label' => esc_html__("Images", 'kona'),  
				'desc'  => esc_html__("Double height is only possible if you choose an 'Equal' grid layout", 'kona'),  
				'id' => 'medias',		// must called medias
				'type' => 'medias-option',
				'sendval' => true,
				'option' => "size:select:normal,double width,double height,double width + height", // for more width:select:normal,double|title:text
				),
			
			array(
				'label' => esc_html__('Columns', 'kona'),
				'desc' => '',
				'id' => 'columns',
				'type' => 'selectbox-hiding',
				'sendval' => true,
				'option' => array( 
					array(	"name" => esc_html__("1", 'kona'), 
							"value"=> "1"),		 
					array(	"name" => esc_html__("2", 'kona'), 
							"value" => "2"),
					array(	"name" => esc_html__("3", 'kona'), 
							"value" => "3"),
					array(	"name" => esc_html__("4", 'kona'), 
							"value" => "4"),
					array(	"name" => esc_html__("5", 'kona'), 
							"value" => "5")
					),
				"default" => "3"
				),
			
				array( 
						"id" => "sr-gallery-columns",
						"hiding" => "2 3 4 5",	
						"type" => "hidinggroupstart"
					),
					array( "label" => esc_html__("Grid Layout", 'kona'),
						   "desc" => esc_html__("'Equal' will crop the image to the same height/ratio and 'Masonry' will take the original image ratios.", 'kona'),
						   "id" => 'type',
						   "type" => "selectbox-hiding",
						   'sendval' => true,
						   "option" => array( 
								array(	"name" => esc_html__("Equal", 'kona'), 
										"value"=> "equal"),		 
								array(	"name" => esc_html__("Masonry", 'kona'), 
										"value" => "masonry")
								),
							"default" => "equal"
						  ),
	
					array( 
							"id" => "sr-gallery-type",
							"hiding" => "equal",	
							"type" => "hidinggroupstart"
						),
						array( "label" => esc_html__("Custom Image Ratio", 'kona'),
							   "desc" => "",
							   "id" => 'ratio',
							   "type" => "selectbox",
							   'sendval' => true,
							   "option" => array( 
									array(	"name" => esc_html__("1:1", 'kona'), 
											"value"=> "1:1"),		 
									array(	"name" => esc_html__("2:1", 'kona'), 
											"value"=> "2:1"),
									array(	"name" => esc_html__("3:1", 'kona'), 
											"value"=> "3:1"),
									array(	"name" => esc_html__("3:2", 'kona'), 
											"value"=> "3:2"),
									array(	"name" => esc_html__("4:3", 'kona'), 
											"value"=> "4:3"),
									array(	"name" => esc_html__("1:2", 'kona'), 
											"value"=> "1:2"),
									array(	"name" => esc_html__("1:3", 'kona'), 
											"value"=> "1:3"),
									array(	"name" => esc_html__("2:3", 'kona'), 
											"value"=> "2:3"),
									array(	"name" => esc_html__("3:4", 'kona'), 
											"value"=> "3:4")
									),
								"default" => "3:2"
							  ),
					array( 
							"id" => "sr-gallery-type",
							"hiding" => "equal",	
							"type" => "hidinggroupend"
						),
	
					array( "label" => esc_html__("Grid Offset", 'kona'),
						   "desc" => esc_html__("Do you want to add an offset for your grid", 'kona'),
						   "id" => "gridoffset",
						   "type" => "checkbox-hiding",
						   "sendval" => true,
						   "option" => array( 
								array(	"name" => esc_html__("No", 'kona'), 
										"value"=> "0"),
								array(	"name" => esc_html__("Normal", 'kona'), 
										"value" => "1"),
								array(	"name" => esc_html__("Random", 'kona'), 
										"value" => "2")
								),
							"default" => "0"
						  ),

						array( 
								"id" => "sr-gallery-gridoffset",
								"hiding" => "1 2",	
								"type" => "hidinggroupstart"
							),
							array( "desc" => '<strong>Note</strong> '.esc_html__("The tile size will be forced. (double width/height) does not have any impact.", 'kona'),
									"type"  => "info"
								  ),
						array( 
								"id" => "sr-gallery-gridoffset",
								"hiding" => "1",	
								"type" => "hidinggroupend"
							),

						array( 
								"id" => "sr-gallery-gridoffset",
								"hiding" => "1",	
								"type" => "hidinggroupstart"
							),
							array( "label" => esc_html__("Offset Size", 'kona'),
								   "desc" => "",
								   "id" => "gridoffsetsize",
								   "type" => "selectbox",
								   "sendval" => true,
								   "option" => array(	 
										array(	"name" => esc_html__("Normal", 'kona'), 
												"value" => "normal"),
										array(	"name" => esc_html__("Big", 'kona'), 
												"value"=> "big"),
										array(	"name" => esc_html__("Huge", 'kona'), 
												"value"=> "huge"),
										array(	"name" => esc_html__("Ultra", 'kona'), 
												"value"=> "ultra")
										),
									"default" => "normal"
								  ),
						array( 
								"id" => "sr-gallery-gridoffset",
								"hiding" => "1",	
								"type" => "hidinggroupend"
							),
	
				array( 
						"id" => "sr-gallery-columns",
						"hiding" => "2 3 4 5",	
						"type" => "hidinggroupend"
					),
			
			
			array( "label" => esc_html__("Spacing", 'kona'),
				   "desc" => esc_html__("Do you want the image to be spaced?", 'kona'),
				   "id" => "spacing",
				   "type" => "selectbox",
				   'sendval' => true,
				   "option" => array( 
						array(	"name" => esc_html__("No", 'kona'), 
								"value" => "not-spaced"),
						array(	"name" => esc_html__("Normal Spacing", 'kona'), 
								"value"=> "spaced"),
						array(	"name" => esc_html__("Big Spacing", 'kona'), 
								"value"=> "spaced-big"),
						array(	"name" => esc_html__("Huge Spacing", 'kona'), 
								"value"=> "spaced-huge")
						),
					"default" => "not-spaced"
				  ),
				  
			array( "label" => esc_html__("Lightbox", 'kona'),
				   "desc" => esc_html__("Do you want to enable the lightbox?", 'kona'),
				   "id" => "lightbox",
				   "type" => "checkbox-hiding",
				   'sendval' => true,
				   "option" => array( 
						array(	"name" => esc_html__("Yes", 'kona'), 
								"value"=> "1"),		 
						array(	"name" => esc_html__("No", 'kona'), 
								"value" => "0")
						),
				   "default" => "0"
				  ),
				  
				array( 
						"id" => "sr-gallery-lightbox",
						"hiding" => "1",	
						"type" => "hidinggroupstart"
					),
					array( "label" => esc_html__("Show Caption", 'kona'),
						   "desc" => esc_html__("Lightbox will show the caption.  Go to your media library and edit/add the caption.", 'kona'),
						   "id" => 'caption',
						   "type" => "checkbox",
						   'sendval' => true,
						   "option" => array( 
								array(	"name" => esc_html__("Yes", 'kona'), 
										"value"=> "1"),		 
								array(	"name" => esc_html__("No", 'kona'), 
										"value" => "0")
								),
							"default" => "0"
						  ),
					array(	'label' => esc_html__("Lightbox", 'kona').' ID',
							'desc' => esc_html__('Thanks to the id you can combine or separate different galleries lightboxes', 'kona'),
							'id' => 'galid',
							'type' => 'selectbox',
							'sendval' => true,
							'option' => array( 
								array(	"name" => "1", 
										"value"=> "1"),		 
								array(	"name" => "2", 
										"value" => "2"),
								array(	"name" => "3", 
										"value" => "3"),
								array(	"name" => "4", 
										"value" => "4"),
								array(	"name" => "5", 
										"value" => "5"),
								array(	"name" => "6", 
										"value" => "6"),
								array(	"name" => "7", 
										"value" => "7"),
								array(	"name" => "8", 
										"value" => "8")
								),
							"default" => "1"
						),
				array( 
						"id" => "sr-gallery-lightbox",
						"hiding" => "1",	
						"type" => "hidinggroupend"
					),
					
				  
			array( "label" => esc_html__("Slide In (Unveil) Effect", 'kona'),
				   "desc" => esc_html__("Enable the slide in effect.", 'kona'),
				   "id" => "unveil",
				   "type" => "checkbox",
				   'sendval' => true,
				   "option" => array( 
						array(	"name" => esc_html__("Yes", 'kona'), 
								"value"=> "do-anim"),
						array(	"name" => esc_html__("No", 'kona'), 
								"value" => "no-anim")
						),
				   "default" => "do-anim"
				  ),
				  
			array( "label" => esc_html__("Lazy Load", 'kona'),
				   "desc" => esc_html__("Activate the lazy load for these images.", 'kona'),
				   "id" => "lazy",
				   "type" => "checkbox",
				   'sendval' => true,
				   "option" => array( 
						array(	"name" => esc_html__("Yes", 'kona'), 
								"value"=> "1"),		 
						array(	"name" => esc_html__("No", 'kona'), 
								"value" => "0")
						),
				   "default" => "1"
				  )
		)
	),
	
	array(  
		'title' => esc_html__('Image Slider', 'kona'),
	   	'id'    => 'sr-slider',
	   	'desc' => '',
	   	'type' => 'row,element',
	   	'icon' => 'dashicons-format-gallery',
		'fields' =>  array(
	
			array(
				'label' => esc_html__("Images", 'kona'),  
				'desc'  => "",  
				'id' => 'medias',		// must called medias
				'type' => 'medias',
				'sendval' => true
				),
	
			array( "label" => esc_html__("Arrows", 'kona'),
				   "desc" => "",
				   "id" => "arrows",
				   "type" => "checkbox",
				   'sendval' => true,
				   "option" => array( 
						array(	"name" => esc_html__("Yes", 'kona'), 
								"value"=> "1"),		 
						array(	"name" => esc_html__("No", 'kona'), 
								"value" => "0")
						),
				   "default" => "1"
				  ),
	
			array( "label" => esc_html__("Bullets", 'kona'),
				   "desc" => "",
				   "id" => "bullets",
				   "type" => "checkbox",
				   'sendval' => true,
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
				   "id" => "navcolor",
				   "type" => "selectbox",
				   'sendval' => true,
				   "option" => array( 
						array(	"name" => esc_html__("Light", 'kona'), 
								"value"=> "nav-light"),		 
						array(	"name" => esc_html__("Dark", 'kona'), 
								"value" => "nav-dark")
						),
				   "default" => "nav-light"
				  ),
	
			array( "label" => esc_html__("Loop Slider", 'kona'),
				   "desc" => "",
				   "id" => "loop",
				   "type" => "checkbox",
				   'sendval' => true,
				   "option" => array( 
						array(	"name" => esc_html__("Yes", 'kona'), 
								"value"=> "1"),		 
						array(	"name" => esc_html__("No", 'kona'), 
								"value" => "0")
						),
				   "default" => "1"
				  ),
	
			array( "label" => esc_html__("Autoplay", 'kona'),
				   "desc" => "",
				   "id" => "autoplay",
				   "type" => "checkbox",
				   'sendval' => true,
				   "option" => array( 
						array(	"name" => esc_html__("Yes", 'kona'), 
								"value"=> "1"),		 
						array(	"name" => esc_html__("No", 'kona'), 
								"value" => "0")
						),
				   "default" => "1"
				  )
		)
	),
	
	array(  
		'title' => esc_html__('Blog Posts', 'kona'),
	   	'id'    => 'sr-blogposts',
	   	'desc' => '',
	   	'type' => 'row',
	   	'icon' => 'dashicons-admin-post',
		'fields' =>  array(
			
		array( "name" => esc_html__("Grid Options", 'kona'),
			   "id" => "sr-pb-tab-gridoptions",
			   "type" => "tabstart"
			  ),
	
				array( "label" => esc_html__("Grid Width", 'kona'),
					   "desc" => "",
					   "id" => "gridwidth",
					   "type" => "selectbox",
					   "sendval" => true,
					   "option" => array( 
							array(	"name" => esc_html__("Default (1440px)", 'kona'), 
									"value"=> "wrapper"),
							array(	"name" => esc_html__("Medium (1140px)", 'kona'), 
									"value"=> "wrapper-medium"),
							array(	"name" => esc_html__("Small (780px)", 'kona'), 
									"value"=> "wrapper-small")
							),
						"default" => "wrapper"
					  ),
	
				array( 	"label" => esc_html__("Columns", 'kona'),
						"desc" => esc_html__("Select a column size for the blog grid.", 'kona'),
						"id" => 'columns',
						"type" => "selectbox",
						"sendval" => true,
						"option" => array( 
							array(	"name" => "2", 
									"value"=> "2"),
							array(	"name" => "3", 
									"value"=> "3"),
							array(	"name" => "4", 
									"value"=> "4")
							),
						"default" => "3"
						),
				
				array(
					'label' => esc_html__("Image Style", 'kona'),  
					'desc'  => esc_html__("Equal will crop the images to the same dimensions", 'kona'),
					'id' => 'style',
					"type" => "selectbox-hiding",
					"sendval" => true,
					"option" => array( 
						array(	"name" => esc_html__("Equal", 'kona'), 
								"value"=> "equal"),
						array(	"name" => esc_html__("Masonry", 'kona'), 
								"value"=> "masonry")
						),
					"default" => "masonry"
					),
	
				array( "label" => esc_html__("Spacing", 'kona'),
					   "desc" => "",
					   "id" => "spacing",
					   "type" => "selectbox",
						"sendval" => true,
					   "option" => array( 
							array(	"name" => esc_html__("Normal Spacing", 'kona'), 
									"value"=> "spaced"),
							array(	"name" => esc_html__("Big Spacing", 'kona'), 
									"value"=> "spaced-big"),
							array(	"name" => esc_html__("Huge Spacing", 'kona'), 
									"value"=> "spaced-huge")
							),
					   "default" => "spaced-big"
					  ),
				

				array( "label" => esc_html__("Title Size", 'kona'),
					   "desc" => "",
					   "id" => "titlesize",
					   "type" => "selectbox",
						"sendval" => true,
					   "option" => array( 
							array(	"name" => "h1", 
									"value"=> "h1"),
							array(	"name" => "h2", 
									"value"=> "h2"),
							array(	"name" => "h3", 
									"value"=> "h3"),
							array(	"name" => "h4", 
									"value"=> "h4"),
							array(	"name" => "h5", 
									"value"=> "h5"),
							array(	"name" => "h6", 
									"value"=> "h6")
							),
					   "default" => "h4"
					  ),

				array( "label" => esc_html__("Slide In (Unveil) Effect", 'kona'),
					   "desc" => esc_html__("Enable the slide in effect.", 'kona'),
					   "id" => "unveil",
					   "type" => "checkbox",
						"sendval" => true,
					   "option" => array( 
							array(	"name" => esc_html__("Yes", 'kona'), 
									"value"=> "do-anim"),
							array(	"name" => esc_html__("No", 'kona'), 
									"value" => "no-anim")
							),
					   "default" => "do-anim"
					  ),

				array( "label" => esc_html__("Lazy Load", 'kona'),
					   "desc" => esc_html__("Activate the lazy load for these images.", 'kona'),
					   "id" => "lazy",
					   "type" => "checkbox",
					   'sendval' => true,
					   "option" => array( 
							array(	"name" => esc_html__("Yes", 'kona'), 
									"value"=> "1"),		 
							array(	"name" => esc_html__("No", 'kona'), 
									"value" => "0")
							),
					   "default" => "1"
					  ),

				array( "label" => esc_html__("Read More Button", 'kona'),
					   "desc" => "",
					   "id" => "readmore",
					   "type" => "checkbox",
						"sendval" => true,
					   "option" => array( 
							array(	"name" => esc_html__("Show", 'kona'), 
									"value"=> "1"),
							array(	"name" => esc_html__("Hide", 'kona'), 
									"value"=> "0")
							),
					   "default" => "1"
					  ),

				array( "label" => esc_html__("Show Date", 'kona'),
					   "desc" => "",
					   "id" => "date",
					   "type" => "checkbox",
						"sendval" => true,
					   "option" => array( 
							array(	"name" => esc_html__("Show", 'kona'), 
									"value"=> "1"),
							array(	"name" => esc_html__("Hide", 'kona'), 
									"value"=> "0")
							),
					   "default" => "1"
					  ),	

				array( "label" => esc_html__("Show Category", 'kona'),
					   "desc" => "",
					   "id" => "categoryshow",
					   "type" => "checkbox",
						"sendval" => true,
					   "option" => array( 
							array(	"name" => esc_html__("Show", 'kona'), 
									"value"=> "1"),
							array(	"name" => esc_html__("Hide", 'kona'), 
									"value"=> "0")
							),
					   "default" => "1"
					  ),
	
				array( "label" => esc_html__("Show Intro", 'kona'),
					   "desc" => "",
					   "id" => "introshow",
					   "type" => "checkbox",
						"sendval" => true,
					   "option" => array( 
							array(	"name" => esc_html__("Show", 'kona'), 
									"value"=> "1"),
							array(	"name" => esc_html__("Hide", 'kona'), 
									"value"=> "0")
							),
					   "default" => "1"
					  ),
	
		array( "name" => esc_html__("Grid Options", 'kona'),
			   "id" => "sr-pb-tab-gridoptions",
			   "type" => "tabend"
			  ),
	
		array( "name" => esc_html__("Show Posts", 'kona'),
			   "id" => "sr-pb-tab-filter",
			   "type" => "tabstart"
			  ),
			
			array(
				'label' => esc_html__("Show Posts", 'kona'),  
				'desc'  => esc_html__("Which posts would you like to show?", 'kona'),  
				'id' => 'show',
				"type" => "selectbox-hiding",
				"sendval" => true,
				"option" => array( 
					array(	"name" => esc_html__("Show All Posts", 'kona'), 
							"value"=> "all"),
					array(	"name" => esc_html__("Select by category", 'kona'), 
							"value"=> "cat"),
					array(	"name" => esc_html__("Select by post", 'kona'), 
							"value"=> "id")
					),
				"default" => "all"
				),

				array( 
						"id" => "sr-blogposts-show",
						"hiding" => "cat",	
						"type" => "hidinggroupstart"
						),
					array( 	"label" => esc_html__("Categories", 'kona'),
							"desc" => esc_html__("Select the categories you want to display. Select multiple by holding/pressing 'cmd' or 'ctrl'", 'kona'),
							"id" => "category",
							"type" => "category",
							"sendval" => true,
							"option" => "post"
							),	
				array( 
						"id" => "sr-blogposts-show",
						"hiding" => "cat",	
						"type" => "hidinggroupend"
						),
	
				array( 	"id" => "sr-blogposts-show",
						"hiding" => "id",	
						"type" => "hidinggroupstart"
						),
	
						array( "label" => esc_html__("Select Post(s)", 'kona'),
							   "desc" => esc_html__("Select multiple by holding/pressing 'cmd' for Mac or 'ctrl' for Windows", 'kona'),
							   "id" => "postid",
							   "type" => "pages",
							   "sendval" => true,
							   "option" => "post"
							  ),
	
				array( 	"id" => "sr-blogposts-show",
						"hiding" => "id",	
						"type" => "hidinggroupend"
						),
	
				array( 	"id" => "sr-blogposts-show",
						"hiding" => "all cat",	
						"type" => "hidinggroupstart"
						),
	
						array( "label" => esc_html__("Count", 'kona'),
							   "desc" => esc_html__('How many posts to show? Enter "-1" to show all.', 'kona'),
							   "id" => "count",
							   "type" => "text",
								"sendval" => true,
							   "default" => "6"
							  ),
	
						array(	'label' => esc_html__("Offset", 'kona'),  
								'desc'  => esc_html__("How many items do you want to skip", 'kona'),  
								'id' => 'offset',
								"type" => "selectbox",
								"sendval" => true,
								"option" => array( 
									array(	"name" => "0", 
											"value"=> "0"),
									array(	"name" => "1", 
											"value"=> "1"),
									array(	"name" => "2", 
											"value"=> "2"),
									array(	"name" => "3", 
											"value"=> "3"),
									array(	"name" => "4", 
											"value"=> "4"),
									array(	"name" => "5", 
											"value"=> "5"),
									array(	"name" => "6", 
											"value"=> "6")
									),
								"default" => "0"
								),
	
				array( 	"id" => "sr-blogposts-show",
						"hiding" => "id",	
						"type" => "hidinggroupend"
						),
	
				array( 	"label" => esc_html__("Pagination / Load More", 'kona'),
						"desc" => esc_html__('Do you want to enable any sort of pagination or load more?', 'kona'),
						"id" => "pagination",
						"type" => "selectbox-hiding",
						"sendval" => true,
						"option" => array( 
							array(	"name" => esc_html__("No", 'kona'), 
									"value"=> "0"),		 
							array(	"name" => esc_html__("Pagination", 'kona'), 
									"value" => "pagination"),
							array(	"name" => esc_html__("Load More", 'kona'), 
									"value" => "loadonclick"),
							array(	"name" => esc_html__("Infinity Load", 'kona'), 
									"value" => "infiniteload")
							),
							"default" => "0"
					  ),
	
				
		
		array( "name" => esc_html__("Show Items", 'kona'),
			   "id" => "sr-pb-tab-filter",
			   "type" => "tabend"
			  ),
	
		)
	),
	
	array(  
		'title' => esc_html__('Portfolio Grid', 'kona'),
	   	'id'    => 'sr-portfolioitems',
	   	'desc' => '',
	   	'type' => 'row',
	   	'icon' => 'dashicons-portfolio',
		'fields' =>  array(
		
		array( "name" => esc_html__("Grid Options", 'kona'),
			   "id" => "sr-pb-tab-gridoptions",
			   "type" => "tabstart"
			  ),
	
			array( "label" => esc_html__("Grid Width", 'kona'),
				   "desc" => "",
				   "id" => "gridwidth",
				   "type" => "selectbox",
				   "sendval" => true,
				   "option" => array( 
						array(	"name" => esc_html__("Default (1440px)", 'kona'), 
								"value"=> "wrapper"),
						array(	"name" => esc_html__("Medium (1140px)", 'kona'), 
								"value"=> "wrapper-medium"),
						array(	"name" => esc_html__("Small (780px)", 'kona'), 
								"value"=> "wrapper-small")
						),
					"default" => "wrapper"
				  ),
		
			array( "label" => esc_html__("Columns", 'kona'),
				   "desc" => "",
				   "id" => "gridmasonrycol",
				   "type" => "selectbox-hiding",
				   "sendval" => true,
				   "option" => array( 
						array(	"name" => "1", 
								"value"=> "1"),
						array(	"name" => "2", 
								"value"=> "2"),
						array(	"name" => "3", 
								"value" => "3"),
						array(	"name" => "4", 
								"value" => "4")
						),
				   "default" => "2"
				  ),
	
					array( 	"id" => "sr-portfolioitems-gridmasonrycol",
							"hiding" => "2 3 4 5",	
							"type" => "hidinggroupstart"
							),

						array( "label" => esc_html__("Grid Layout", 'kona'),
							   "desc" => esc_html__("'Equal' will crop the image to the same height/ratio and 'Masonry' will take the original ratios.", 'kona'),
							   "id" => "gridtype",
							   "type" => "selectbox-hiding",
							   "sendval" => true,
							   "option" => array( 
									array(	"name" => esc_html__("Equal", 'kona'), 
											"value"=> "equal"),
									array(	"name" => esc_html__("Masonry", 'kona'), 
											"value" => "masonry")
									),
								"default" => "equal"
							  ),
	
						array( 
								"id" => "sr-portfolioitems-gridtype",
								"hiding" => "equal",	
								"type" => "hidinggroupstart"
							),
							array( "label" => esc_html__("Custom Image Ratio", 'kona'),
								   "desc" => "",
								   "id" => 'gridratio',
								   "type" => "selectbox",
								   'sendval' => true,
								   "option" => array( 
										array(	"name" => esc_html__("1:1", 'kona'), 
												"value"=> "1:1"),		 
										array(	"name" => esc_html__("2:1", 'kona'), 
												"value"=> "2:1"),
										array(	"name" => esc_html__("3:1", 'kona'), 
												"value"=> "3:1"),
										array(	"name" => esc_html__("3:2", 'kona'), 
												"value"=> "3:2"),
										array(	"name" => esc_html__("4:3", 'kona'), 
												"value"=> "4:3"),
										array(	"name" => esc_html__("16:9", 'kona'), 
												"value"=> "16:9"),
										array(	"name" => esc_html__("21:9", 'kona'), 
												"value"=> "21:9"),
										array(	"name" => esc_html__("1:2", 'kona'), 
												"value"=> "1:2"),
										array(	"name" => esc_html__("1:3", 'kona'), 
												"value"=> "1:3"),
										array(	"name" => esc_html__("2:3", 'kona'), 
												"value"=> "2:3"),
										array(	"name" => esc_html__("3:4", 'kona'), 
												"value"=> "3:4")
										),
									"default" => "3:2"
								  ),
								
						array( 
								"id" => "sr-portfolioitems-type",
								"hiding" => "equal",	
								"type" => "hidinggroupend"
							),
	
			
						array( "label" => esc_html__("Grid Offset", 'kona'),
							   "desc" => esc_html__("Do you want to add an offset for your grid", 'kona'),
							   "id" => "gridoffset",
							   "type" => "checkbox-hiding",
							   "sendval" => true,
							   "option" => array( 
									array(	"name" => esc_html__("No", 'kona'), 
											"value"=> "0"),
									array(	"name" => esc_html__("Normal", 'kona'), 
											"value" => "1"),
									array(	"name" => esc_html__("Crazy", 'kona'), 
											"value" => "2")
									),
								"default" => "0"
							  ),
	
							array( 
									"id" => "sr-portfolioitems-gridoffset",
									"hiding" => "0",	
									"type" => "hidinggroupstart"
								),
								array( "label" => esc_html__("Force Tile Size", 'kona'),
									   "desc" => esc_html__("The indivdual Tile Sizes (double width/height) does not have any impact.", 'kona'),
									   "id" => "gridsizeforce",
									   "type" => "checkbox",
									   "sendval" => true,
									   "option" => array(	 
											array(	"name" => esc_html__("No", 'kona'), 
													"value" => "0"),
											array(	"name" => esc_html__("Yes", 'kona'), 
													"value"=> "1")
											),
										"default" => "0"
									  ),
							array( 
									"id" => "sr-portfolioitems-gridoffset",
									"hiding" => "0",	
									"type" => "hidinggroupend"
								),
	
							array( 
									"id" => "sr-portfolioitems-gridoffset",
									"hiding" => "1 2",	
									"type" => "hidinggroupstart"
								),
								array( "desc" => '<strong>Note</strong> '.esc_html__("The tile size will be forced. (double width/height) does not have any impact.", 'kona'),
										"type"  => "info"
									  ),
							array( 
									"id" => "sr-portfolioitems-gridoffset",
									"hiding" => "1",	
									"type" => "hidinggroupend"
								),
	
							array( 
									"id" => "sr-portfolioitems-gridoffset",
									"hiding" => "1",	
									"type" => "hidinggroupstart"
								),
								array( "label" => esc_html__("Offset Size", 'kona'),
									   "desc" => "",
									   "id" => "gridoffsetsize",
									   "type" => "selectbox",
									   "sendval" => true,
									   "option" => array(	 
											array(	"name" => esc_html__("Normal", 'kona'), 
													"value" => "normal"),
											array(	"name" => esc_html__("Big", 'kona'), 
													"value"=> "big"),
											array(	"name" => esc_html__("Huge", 'kona'), 
													"value"=> "huge"),
											array(	"name" => esc_html__("Ultra", 'kona'), 
													"value"=> "ultra")
											),
										"default" => "normal"
									  ),
							array( 
									"id" => "sr-portfolioitems-gridoffset",
									"hiding" => "1",	
									"type" => "hidinggroupend"
								),

					array( 	"id" => "sr-portfolioitems-gridmasonrycol",
							"hiding" => "2 3 4 5",	
							"type" => "hidinggroupend"
							),
																	
				array( "label" => esc_html__("Spacing", 'kona'),
					   "desc" => esc_html__("Do you want the tiles to be spaced?", 'kona'),
					   "id" => "gridspaced",
					   "type" => "selectbox",
					   "sendval" => true,
					   "option" => array(	 
							array(	"name" => esc_html__("No", 'kona'), 
									"value" => "not-spaced"),
							array(	"name" => esc_html__("Normal Spacing", 'kona'), 
									"value"=> "spaced"),
							array(	"name" => esc_html__("Big Spacing", 'kona'), 
									"value"=> "spaced-big"),
							array(	"name" => esc_html__("Huge Spacing", 'kona'), 
									"value"=> "spaced-huge")
							),
						"default" => "not-spaced"
					  ),
					  
				array( "label" => esc_html__("Slide In (Unveil) Effect", 'kona'),
					   "desc" => esc_html__("Enable the slide in effect.", 'kona'),
					   "id" => "gridunveil",
					   "type" => "checkbox",
					   "sendval" => true,
					   "option" => array( 
							array(	"name" => esc_html__("Yes", 'kona'), 
									"value"=> "do-anim"),
							array(	"name" => esc_html__("No", 'kona'), 
									"value" => "no-anim")
							),
						"default" => "no-anim"
					  ),
	
				array( "label" => esc_html__("Lazy Load", 'kona'),
					   "desc" => esc_html__("Activate the lazy load for these images.", 'kona'),
					   "id" => "gridlazy",
					   "type" => "checkbox",
					   'sendval' => true,
					   "option" => array( 
							array(	"name" => esc_html__("Yes", 'kona'), 
									"value"=> "1"),		 
							array(	"name" => esc_html__("No", 'kona'), 
									"value" => "0")
							),
					   "default" => "0"
					  ),
	
					  					  
		array( "id" => "sr-pb-tab-gridoptions",
			   "type" => "tabend"
			  ),
			  
			  
			  
		array( "name" => esc_html__("Show Items", 'kona'),
			   "id" => "sr-pb-tab-filtergrid",
			   "type" => "tabstart"
			  ),
			
				array( "label" => esc_html__("Show Items", 'kona'),
					   "desc" => "",
					   "id" => "filtershow",
					   "type" => "selectbox-hiding",
					   "sendval" => true,
					   "option" => array( 
							array(	"name" => esc_html__("Show All items", 'kona'), 
									"value"=> "all"),
							array(	"name" => esc_html__("Select by category", 'kona'), 
									"value"=> "cat"),
							array(	"name" => esc_html__("Select by item", 'kona'), 
									"value"=> "id")
							),
						"default" => "all"
					  ),
					  
				array( 	"id" => "sr-portfolioitems-filtershow",
						"hiding" => "cat",	
						"type" => "hidinggroupstart"
						),
						
						array( "label" => esc_html__("Categories", 'kona'),
							   "desc" => esc_html__("Select the categories you want to display.  Select multiple by holding/pressing 'cmd' or 'ctrl'", 'kona'),
							   "id" => "filtercategory",
							   "type" => "category",
							   "sendval" => true,
							   "option" => "portfolio"
							  ),
						
				array( 	"id" => "sr-portfolioitems-filtershow",
						"hiding" => "cat",	
						"type" => "hidinggroupend"
						),
	
				array( 	"id" => "sr-portfolioitems-filtershow",
						"hiding" => "id",	
						"type" => "hidinggroupstart"
						),
	
						array( "label" => esc_html__("Select Item(s)", 'kona'),
							   "desc" => esc_html__("Select multiple by holding/pressing 'cmd' for Mac or 'ctrl' for Windows", 'kona'),
							   "id" => "filteritems",
							   "type" => "pages",
							   "sendval" => true,
							   "option" => "portfolio"
							  ),
	
				array( 	"id" => "sr-portfolioitems-filtershow",
						"hiding" => "id",	
						"type" => "hidinggroupend"
						),
	
				array( 	"id" => "sr-portfolioitems-filtershow",
						"hiding" => "all cat",	
						"type" => "hidinggroupstart"
						),
	
					array( 	"label" => esc_html__("Count", 'kona'),
							"desc" => esc_html__('How many items to show (per page)? Enter "-1" to show all.', 'kona'),
							"id" => "filtercount",
							"type" => "text",
							"sendval" => true,
							"default" => "9"
						  ),
			  
	
					array(	'label' => esc_html__("Offset", 'kona'),  
							'desc'  => esc_html__("How many items do you want to skip", 'kona'),  
							'id' => 'offset',
							"type" => "selectbox",
							"sendval" => true,
							"option" => array( 
								array(	"name" => "0", 
										"value"=> "0"),
								array(	"name" => "1", 
										"value"=> "1"),
								array(	"name" => "2", 
										"value"=> "2"),
								array(	"name" => "3", 
										"value"=> "3"),
								array(	"name" => "4", 
										"value"=> "4"),
								array(	"name" => "5", 
										"value"=> "5"),
								array(	"name" => "6", 
										"value"=> "6")
								),
							"default" => "0"
							),
	
					array( "label" => esc_html__("Enable Live Filter", 'kona'),
						   "desc" => '',
						   "id" => "filterenable",
						   "type" => "checkbox-hiding",
						   "sendval" => true,
						   "option" => array( 
								array(	"name" => esc_html__("Yes", 'kona'), 
										"value"=> "1"),		 
								array(	"name" => esc_html__("No", 'kona'), 
										"value" => "0")
								),
							"default" => "1"
						  ),
	
				array( 	"id" => "sr-portfolioitems-filtershow",
						"hiding" => "all cat",	
						"type" => "hidinggroustart"
						),
	
				array( 	"label" => esc_html__("Pagination / Load More", 'kona'),
						"desc" => esc_html__('Do you want to enable any sort of pagination or load more?', 'kona'),
						"id" => "pagination",
						"type" => "selectbox",
						"sendval" => true,
						"option" => array( 
							array(	"name" => esc_html__("No", 'kona'), 
									"value"=> "0"),		 
							array(	"name" => esc_html__("Pagination", 'kona'), 
									"value" => "pagination"),
							array(	"name" => esc_html__("Load More", 'kona'), 
									"value" => "loadonclick"),
							array(	"name" => esc_html__("Infinity Load", 'kona'), 
									"value" => "infiniteload")
							),
							"default" => "0"
					  ),
			
				array( 	"id" => "sr-portfolioitems-pagination",
						"hiding" => "loadonclick infiniteload",	
						"type" => "hidinggroupend"
						),
			  
		array( "id" => "sr-pb-tab-filtergrid",
			   "type" => "tabend"
			  ),
			  
			  
			  
		array( "name" => esc_html__("Caption & Hover", 'kona'),
			   "id" => "sr-pb-tab-hovereffect",
			   "type" => "tabstart"
			  ),
			  
			 array(  "desc" => '<strong>Note</strong> '.esc_html__("If these settings don't have any effect on your grid items (or some of them), you probably have activated some custom captions settings for these items.  You can force these settings for this grid below.", 'kona'),
					"type"  => "info"  
				),	
			
			  array(  "label" => esc_html__("Force Captions settings", 'kona'),
					"desc" => esc_html__("If yes, your individual custom caption settings won't be respected.", 'kona'),
					"id" => "captionforce",
					"type" => "checkbox-hiding",
					"sendval" => true,
					"option" => array( 
						array(	"name" => esc_html__("No", 'kona'), 
								"value" => "0"),
						array(	"name" => esc_html__("Yes", 'kona'), 
								"value" => "1")
						),
					"default" => "0"
				),
			  
			  array( "label" => esc_html__("Caption Option", 'kona'),
				   "desc" => "",
				   "id" => "hovercaption",
				   "type" => "selectbox-hiding",
				   "sendval" => true,
				   "option" => array( 
						array(	"name" => esc_html__("Show caption on hover", 'kona'), 
								"value"=> "onhover"),
						array(	"name" => esc_html__("Always show caption", 'kona'), 
								"value" => "onstart"),
						array(	"name" => esc_html__("Display caption below the thumb", 'kona'), 
								"value" => "belowthumb"),
						array(	"name" => esc_html__("Hide caption", 'kona'), 
								"value" => "hide")
						),
					"default" => "onhover"
				  ),
				  
				array( 	"id" => "sr-portfolioitems-hovercaption",
						"hiding" => "onhover onstart belowthumb",	
						"type" => "hidinggroupstart"
						),
						
						array(  "label" => esc_html__("Title Font Size", 'kona'),
								"desc" => "",
								"id" => "captionsize",
								"type" => "selectbox",
				   				"sendval" => true,
								"option" => array( 
									array(	"name" => esc_html__("h1", 'kona'), 
											"value" => "h1"),
									array(	"name" => esc_html__("h2", 'kona'), 
											"value" => "h2"),
									array(	"name" => esc_html__("h3", 'kona'), 
											"value" => "h3"),
									array(	"name" => esc_html__("h4", 'kona'), 
											"value" => "h4"),
									array(	"name" => esc_html__("h5", 'kona'), 
											"value" => "h5"),
									array(	"name" => esc_html__("h6", 'kona'), 
											"value" => "h6")
									),
								"default" => "h4"
							),
							
				array( 	"id" => "sr-portfolioitems-hovercaption",
						"hiding" => "onhover onstart belowthumb",	
						"type" => "hidinggroupend"
						),
				  
				array( 	"id" => "sr-portfolioitems-hovercaption",
						"hiding" => "onhover onstart",	
						"type" => "hidinggroupstart"
						),
						
						array(  "label" => esc_html__("Caption Position", 'kona'),
								"desc" => esc_html__("Choose a vertical caption position.", 'kona'),
								"id" => "captionposition",
								"type" => "selectbox",
								"sendval" => true,
								"option" => array( 
									array(	"name" => esc_html__("Top", 'kona'), 
											"value" => "top"),
									array(	"name" => esc_html__("Middle", 'kona'), 
											"value" => "center"),
									array(	"name" => esc_html__("Bottom", 'kona'), 
											"value" => "bottom")
									),
								"default" => "bottom"
							),
							  
						array(  "label" => esc_html__("Caption Alignment", 'kona'),
								"desc" => "",
								"id" => "captionalignment",
								"type" => "selectbox",
								"sendval" => true,
								"option" => array( 
									array(	"name" => esc_html__("Left align", 'kona'), 
											"value" => "align-left"),
									array(	"name" => esc_html__("Center align", 'kona'), 
											"value" => "align-center"),
									array(	"name" => esc_html__("Right align", 'kona'), 
											"value" => "align-right")
									),
								"default" => "align-left"
							),
							
				array( 	"id" => "sr-portfolioitems-hovercaption",
						"hiding" => "onhover onstart",	
						"type" => "hidinggroupend"
						),
				  
				array( 	"id" => "sr-portfolioitems-hovercaption",
						"hiding" => "onhover onstart belowthumb",	
						"type" => "hidinggroupstart"
						),
							
						array(  "label" => esc_html__("Show Category OR Subtitle", 'kona'),
								"desc" => "",
								"id" => "captioncategory",
								"type" => "checkbox-hiding",
								"sendval" => true,
								"option" => array( 
									array(	"name" => esc_html__("Category", 'kona'), 
											"value" => "1"),
									array(	"name" => esc_html__("Subtitle", 'kona'), 
											"value" => "2"),
									array(	"name" => esc_html__("None", 'kona'), 
											"value" => "0")
									),
								"default" => "1"
							),
						
				array( 	"id" => "sr-portfolioitems-hovercaption",
						"hiding" => "onhover onstart belowthumb",	
						"type" => "hidinggroupend"
						),
											
				array( 	"id" => "sr-portfolioitems-hovercaption",
						"hiding" => "onstart",	
						"type" => "hidinggroupstart"
						),
												  
						array(  "label" => esc_html__("Caption text color", 'kona'),
								"desc" => "",
								"id" => "captioncolor",
								"type" => "selectbox",
								"sendval" => true,
								"option" => array( 
									array(	"name" => esc_html__("Light", 'kona'), 
											"value"=> "caption-light"),
									array(	"name" => esc_html__("Dark", 'kona'), 
											"value" => "caption-dark"),
									),
								"default" => "caption-light"
							),
												
				array( 	"id" => "sr-portfolioitems-hovercaption",
						"hiding" => "onstart",
						"type" => "hidinggroupend"
						),
	
				array(  "label" => esc_html__("Force Hover settings", 'kona'),
					"desc" => esc_html__("If yes, your individual hover settings won't be respected.", 'kona'),
					"id" => "hoverforce",
					"type" => "checkbox-hiding",
					"sendval" => true,
					"option" => array( 
						array(	"name" => esc_html__("No", 'kona'), 
								"value" => "0"),
						array(	"name" => esc_html__("Yes", 'kona'), 
								"value" => "1")
						),
					"default" => "0"
				),
						
				array( "label" => esc_html__("Hover Color", 'kona'),
					   "desc" => "",
					   "id" => "hovercolor",
					   "type" => "selectbox-hiding",
					   "sendval" => true,
					   "option" => array( 
							array(	"name" => esc_html__("Light", 'kona'), 
									"value"=> "overlay-color"),
							array(	"name" => esc_html__("Dark", 'kona'), 
									"value" => "overlay-color text-light"),
							array(	"name" => esc_html__("Custom", 'kona'), 
									"value" => "overlay-color-custom"),
							array(	"name" => esc_html__("No hover color", 'kona'), 
									"value" => "no-overlay")
							),
							"default" => "overlay-color"
					  ),
	
				array( 	"id" => "sr-portfolioitems-hovercolor",
						"hiding" => "overlay-color-custom",	
						"type" => "hidinggroupstart"
						),
												  
						array( 	"label" => esc_html__("Custom Hover Color", 'kona'),
								"desc" => '',
								"id" => 'customhovercolor',
								"type" => "color",
								'sendval' => true
							),
	
						array(  "label" => esc_html__("Custom caption text color (on hover)", 'kona'),
								"desc" => "",
								"id" => "customhovercaption",
								"type" => "selectbox",
								"sendval" => true,
								"option" => array( 
									array(	"name" => esc_html__("Light", 'kona'), 
											"value"=> "text-light"),
									array(	"name" => esc_html__("Dark", 'kona'), 
											"value" => "text-dark"),
									),
								"default" => "text-light"
							),
	
						array(  "label" => esc_html__("Opacity", 'kona'),
								"desc" => "",
								"id" => "customhoveropacity",
								"type" => "selectbox",
								"sendval" => true,
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
								"default" => "0.8"
							),
												
				array( 	"id" => "sr-portfolioitems-hovercolor",
						"hiding" => "onstart",
						"type" => "hidinggroupend"
						),
	
				array( "label" => esc_html__("Hover Zoom", 'kona'),
					   "desc" => "",
					   "id" => "hoverzoom",
					   "type" => "checkbox",
					   "sendval" => true,
					   "option" => array( 
							array(	"name" => esc_html__("Yes", 'kona'), 
									"value"=> "scale"),
							array(	"name" => esc_html__("No", 'kona'), 
									"value" => "no-scale")
							),
							"default" => "scale"
					  ),
								  
		array( "id" => "sr-pb-tab-hovereffect",
			   "type" => "tabend"
			  ),
	
		)
	),
	
	array(  
		'title' => esc_html__('Single Image', 'kona'),
	   	'id'    => 'sr-singleimage',
	   	'desc' => '',
	   	'type' => 'element',
	   	'icon' => 'dashicons-format-image',
		'fields' => array(
		
			array(
				'label' => esc_html__("Image", 'kona'),  
				'desc'  => "",  
				'id' => 'image',
				'type' => 'image',
				'sendval' => true
			),
	
			array( "label" => esc_html__("Lazy Load", 'kona'),
			   	"desc" => "",
			   	"id" => "lazy",
			   	"type" => "checkbox",
			   	'sendval' => true,
			   	"option" => array( 
					array(	"name" => esc_html__("Yes", 'kona'), 
							"value"=> "1"),		 
					array(	"name" => esc_html__("No", 'kona'), 
							"value" => "0")
					),
			   	"default" => "1"
			)
		
		)
		
	),
	
	array(  
		'title' => esc_html__('Instagram feed', 'kona'),
	   	'id'    => 'sr-instagram',
	   	'desc' => '',
	   	'type' => 'row,element',
	   	'icon' => 'dashicons-camera',
		'fields' => array(
		
			array(
				'label' => esc_html__("@username or #tag", 'kona'),  
				'desc'  => "",  
				'id' => 'username',
				'type' => 'text',
				'sendval' => true
			),
	
			array(
				'label' => esc_html__('Number of photos', 'kona'),
				'desc' => '',
				'id' => 'number',
				'type'  => 'text',
				'sendval' => true,
				'default' => '8'
			),
	
			array(
				'label' => esc_html__('Photo size', 'kona'),
				'desc' => '',
				'id' => 'size',
				"type" => "selectbox",
			   "sendval" => true,
			   "option" => array( 
					array(	"name" => esc_html__("Thumbnail", 'kona'), 
							"value"=> "thumbnail"),
					array(	"name" => esc_html__("Small", 'kona'), 
							"value" => "small"),
					array(	"name" => esc_html__("Large", 'kona'), 
							"value" => "large")
					),
					"default" => "thumbnail"
			  ),
	
			array(
				'label' => esc_html__('Columns', 'kona'),
				'desc' => '',
				'id' => 'columns',
				"type" => "selectbox",
			   "sendval" => true,
			   "option" => array( 
					array(	"name" => "2", 
							"value"=> "2"),
					array(	"name" => "3", 
							"value"=> "3"),
					array(	"name" => "4", 
							"value"=> "4"),
					array(	"name" => "5", 
							"value"=> "5"),
					array(	"name" => "6", 
							"value"=> "6"),
					array(	"name" => "7", 
							"value"=> "7"),
					array(	"name" => "8", 
							"value"=> "8"),
					array(	"name" => "9", 
							"value"=> "9"),
					array(	"name" => "10", 
							"value"=> "10")
					),
				"default" => "8"
			  ),
	
			array(
				'label' => esc_html__('Spacing', 'kona'),
				'desc' => '',
				'id' => 'spacing',
				"type" => "selectbox",
			   "sendval" => true,
			   "option" => array( 
					array(	"name" => esc_html__("None", 'kona'), 
							"value"=> "none"),
					array(	"name" => esc_html__("Mini", 'kona'), 
							"value"=> "mini"),
					array(	"name" => esc_html__("Small", 'kona'), 
							"value" => "small"),
					array(	"name" => esc_html__("Medium", 'kona'), 
							"value" => "medium")
					),
					"default" => "small"
			  )
			
		)
		
	),
	
	array(  
		'title' => esc_html__('Button Image', 'kona'),
	   	'id'    => 'sr-imagebutton',
	   	'desc' => '',
	   	'type' => 'element',
	   	'icon' => 'dashicons-admin-links',
		'fields' =>  array(
			
			array(
				'label' => esc_html__("Image", 'kona'),  
				'desc'  => "",  
				'id' => 'image',
				'type' => 'image',
				'sendval' => true
			),
			array(
				'label' => esc_html__("Hover Image", 'kona')." <small>(".esc_html__("Optional", 'kona').")</small>",  
				'desc'  => "",  
				'id' => 'hoverimage',
				'type' => 'image',
				'sendval' => true
			),
			array(
				'label' => esc_html__("Title", 'kona'),  
				'desc'  => "",  
				'id' => 'title',
				'type' => 'textwithsize',
				'sendval' => true
			),
			array(
				'label' => esc_html__("Subtitle", 'kona'),  
				'desc'  => "",  
				'id' => 'subtitle',
				'type' => 'textwithsize',
				'sendval' => true
			),
	
			array( "label" => esc_html__("Title Color", 'kona'),
				   "desc" => "",
				   "id" => 'textcolor',
				   "type" => "selectbox",
				   'sendval' => true,
				   "option" => array( 
						array(	"name" => esc_html__("Light", 'kona'), 
								"value"=> "light"),		 
						array(	"name" => esc_html__("Dark", 'kona'), 
								"value"=> "dark")
						),
					"default" => "light"
				  ),
		
				array( "label" => esc_html__("Title position", 'kona'),
					   "desc" => "",
					   "id" => "titlepos",
						"sendval" => true,
					   "type" => "selectbox-hiding",
					   "option" => array(		 
							array(	"name" => "Below the thumbnail",
									"value" => "below"),
							array(	"name" => "On the thumbnail",
									"value" => "on")
							),
					   "default" => "below"
					  ),
		
					array( 
						"id" => "sr-imagebutton-titlepos",
						"hiding" => "on",	
						"type" => "hidinggroupstart"
						),
						array( "label" => esc_html__("Text Alignment", 'kona'),
							   "desc" => "",
							   "id" => 'alignment',
							   "type" => "selectbox",
							   'sendval' => true,
							   "option" => array( 
									array(	"name" => esc_html__("Top Left", 'kona'), 
											"value"=> "top-left"),		 
									array(	"name" => esc_html__("Top Right", 'kona'), 
											"value"=> "top-right"),
									array(	"name" => esc_html__("Bottom Left", 'kona'), 
											"value"=> "bottom-left"),
									array(	"name" => esc_html__("Bottom Right", 'kona'), 
											"value"=> "bottom-right"),
									array(	"name" => esc_html__("Center Center", 'kona'), 
											"value"=> "center-center")
									),
								"default" => "top-left"
							  ),
						array( "label" => esc_html__("Display as", 'kona'),
							   "desc" => "",
							   "id" => 'display',
							   "type" => "selectbox-hiding",
							   'sendval' => true,
							   "option" => array( 
									array(	"name" => esc_html__("Text", 'kona'), 
											"value"=> "normal"),		 
									array(	"name" => esc_html__("Button", 'kona'), 
											"value"=> "button")
									),
								"default" => "normal"
							  ),
					array( 
						"id" => "sr-imagebutton-titlepos",
						"hiding" => "on",	
						"type" => "hidinggroupend"
						),
	
			array( "label" => esc_html__("Button Link", 'kona'),
				   "desc" => esc_html__("What should the button open?", 'kona'),
				   "id" => "buttonlink",
				   "type" => "selectbox-hiding",
					"sendval" => true,
				   "option" => array( 
						array(	"name" => esc_html__("URL", 'kona'), 
								"value" => "url"),
						array(	"name" => esc_html__("Page", 'kona'), 
								"value"=> "page")
						),
				  "default" => "url"
				  ),

				array( "id" => "sr-imagebutton-buttonlink",
					   "hiding" => "url",
					   "type" => "hidinggroupstart"
					  ),

					array( 	"label" => esc_html__("Button URL", 'kona'),
							"desc" => esc_html__("Make sure to add http://", 'kona'),
							"id" => "buttonurl",
						   	"type" => "text",
							"sendval" => true,
						  ),	  

					array( "label" => esc_html__("Button Target", 'kona'),
						   "desc" => "",
							"id" => "buttonurltarget",
						   "type" => "selectbox",
							"sendval" => true,
						   "option" => array( 
								array(	"name" => esc_html__("Same page", 'kona'), 
										"value" => "_self"),
								array(	"name" => esc_html__("New Page", 'kona'), 
										"value"=> "_blank")		
								),
						  	"default" => "_blank"
						  ),		  

				array( "id" => "sr-imagebutton-buttonlink",
					   "type" => "hidinggroupend"
					  ),

				array( "id" => "sr-imagebutton-buttonlink",
					   "hiding" => "page",
					   "type" => "hidinggroupstart"
					  ),

					array( "label" => esc_html__("Select Page", 'kona'),
						   "desc" => "",
							"id" => "buttonpage",
						   "type" => "pages",
							"sendval" => true,
						  	"option" => "page"
						  ),		  

				array( "id" => "sr-imagebutton-buttonlink",
					   "type" => "hidinggroupend"
					  ),
	
		)
	)
);


if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	
	$shop_pagebuilder = array(
	array(  
		'title' => esc_html__('Shop Products', 'kona'),
	   	'id'    => 'sr-shopitems',
	   	'desc' => '',
	   	'type' => 'row',
	   	'icon' => 'dashicons-cart',
		'fields' => array(
		
			array( "name" => esc_html__("Layout Options", 'kona'),
				   "id" => "sr-pb-tab-shopgridlayout",
				   "type" => "tabstart"
				  ),
			
				array( "label" => esc_html__("Section Width", 'kona'),
					   "desc" => "",
					   "id" => "gridwidth",
					   "type" => "selectbox",
					   "sendval" => true,
					   "option" => array( 
							array(	"name" => esc_html__("Fullwidth (100%)", 'kona'), 
									"value"=> "no-wrapper"),
							array(	"name" => esc_html__("Default (1440px)", 'kona'), 
									"value"=> "wrapper"),
							array(	"name" => esc_html__("Medium (1140px)", 'kona'), 
									"value"=> "wrapper-medium"),
							array(	"name" => esc_html__("Small (780px)", 'kona'), 
									"value"=> "wrapper-small")
							),
						"default" => "wrapper"
					  ),
		
				array( 	"label" => esc_html__("Type", 'kona'),
						"desc" => "",
						"id" => 'type',
						"type" => "selectbox-hiding",
						"sendval" => true,
						"option" => array( 
							array(	"name" => esc_html__("Grid", 'kona'), 
									"value"=> "grid"),
							array(	"name" => esc_html__("Carousel", 'kona'), 
									"value"=> "carousel")
							),
						"default" => "grid"
						),
		
				array( 	"label" => esc_html__("Columns", 'kona'),
						"desc" => esc_html__("Select a column size for the shop grid.", 'kona'),
						"id" => 'columns',
						"type" => "selectbox",
						"sendval" => true,
						"option" => array( 
							array(	"name" => "2", 
									"value"=> "2"),
							array(	"name" => "3", 
									"value"=> "3"),
							array(	"name" => "4", 
									"value"=> "4"),
							array(	"name" => "5", 
									"value"=> "5")
							),
						"default" => "4"
						),

				array( "label" => esc_html__("Spacing", 'kona'),
					   "desc" => "",
					   "id" => "spacing",
					   "type" => "selectbox",
						"sendval" => true,
					   "option" => array( 
							array(	"name" => esc_html__("Normal Spacing", 'kona'), 
									"value"=> "spaced"),
							array(	"name" => esc_html__("Big Spacing", 'kona'), 
									"value"=> "spaced-big"),
							array(	"name" => esc_html__("Huge Spacing", 'kona'), 
									"value"=> "spaced-huge")
							),
					   "default" => "spaced-big"
					  ),
				
				array( "label" => esc_html__("Slide In (Unveil) Effect", 'kona'),
					   "desc" => esc_html__("Enable the slide in effect.", 'kona'),
					   "id" => "unveil",
					   "type" => "checkbox",
						"sendval" => true,
					   "option" => array( 
							array(	"name" => esc_html__("Yes", 'kona'), 
									"value"=> "do-anim"),
							array(	"name" => esc_html__("No", 'kona'), 
									"value" => "no-anim")
							),
					   "default" => "do-anim"
					  ),
																							  
			array( "id" => "sr-pb-tab-shopgridoptions",
				   "type" => "tabend"
				  ),
				  
			array( "name" => esc_html__("Item Options", 'kona'),
				   "id" => "sr-pb-tab-shopitemlayout",
				   "type" => "tabstart"
				  ),
				  
				  	array( "label" => esc_html__("Layout Option", 'kona'),
						   "desc" => "",
						   "id" => "layoutcustom",
						   "type" => "selectbox-hiding",
						   "sendval" => true,
						   "option" => array( 
								array(	"name" => esc_html__("Inherit from Theme Options", 'kona'),
										"value"=> "inherit"),
								array(	"name" => "Customize for this grid", 
										"value" => "custom")
								),
						   "default" => "inherit"
						  ),	
						  
					array( 	"id" => "sr-shopitems-layoutcustom",
							"hiding" => "custom",	
							"type" => "hidinggroupstart"
							),
							
							array( "label" => esc_html__("Title Font Size", 'kona'),
								   "desc" => "",
								   "id" => "titlesize",
						   		    "sendval" => true,
								   "type" => "selectbox",
								   "option" => array(		 
										array(	"name" => "h1",
												"value" => "h1"),
										array(	"name" => "h2",
												"value" => "h2"),
										array(	"name" => "h3",
												"value" => "h3"),
										array(	"name" => "h4",
												"value" => "h4"),
										array(	"name" => "h5",
												"value" => "h5"),
										array(	"name" => "h6",
												"value" => "h6")
										),
								   "default" => "h6"
								  ),
								  
							array( 	"label" => esc_html__("Show Item Price", 'kona'),
								    "desc" => esc_html__('Want to display the price?', 'kona'),
									"id" => "showprice",
						   		    "sendval" => true,
									"type" => "checkbox"
									),
									
							array( 	"label" => esc_html__("Add to cart", 'kona'),
								    "desc" => esc_html__('Show the "Add to cart" button in the grid items.', 'kona'),
									"id" => "showaddtocart",
									"sendval" => true,
									"type" => "checkbox"
									),
									
							array( 	"label" => esc_html__("Show Sale Badge", 'kona'),
								    "desc" => esc_html__('Enable the sale badge', 'kona'),
									"id" => "showsale",
									"sendval" => true,
									"type" => "checkbox"
									),			
							
					array( 	"id" => "sr-shopitems-layoutcustom",
							"hiding" => "smartscroll",	
							"type" => "hidinggroupend"
							),
				  
			array( "id" => "sr-pb-tab-shopitemlayout",
				   "type" => "tabend"
				  ),
				  
			array( "name" => esc_html__("Show Items", 'kona'),
				   "id" => "sr-pb-tab-shopfiltergrid",
				   "type" => "tabstart"
				  ),
				  
					array( "label" => esc_html__("Show Items", 'kona'),
						   "desc" => "",
						   "id" => "filtershow",
						   "type" => "selectbox-hiding",
						   "sendval" => true,
						   "option" => array( 
								array(	"name" => esc_html__("Show All items", 'kona'), 
										"value"=> "all"),
								array(	"name" => esc_html__("Select by category", 'kona'), 
										"value"=> "cat"),
								array(	"name" => esc_html__("Select by products", 'kona'), 
										"value"=> "id")
								),
							"default" => "all"
						  ),

					array( 	"id" => "sr-shopitems-filtershow",
							"hiding" => "cat",	
							"type" => "hidinggroupstart"
							),

							array( "label" => esc_html__("Categories", 'kona'),
								   "desc" => esc_html__("Select the categories you want to display.  Select multiple by holding/pressing 'cmd' or 'ctrl'", 'kona'),
								   "id" => "filtercategory",
								   "type" => "category",
								   "sendval" => true,
								   "option" => "product"
								  ),

					array( 	"id" => "sr-shopitems-filtershow",
							"hiding" => "cat",	
							"type" => "hidinggroupend"
							),

					array( 	"id" => "sr-shopitems-filtershow",
							"hiding" => "id",	
							"type" => "hidinggroupstart"
							),

							array( "label" => esc_html__("Select Product(s)", 'kona'),
								   "desc" => esc_html__("Select multiple by holding/pressing 'cmd' for Mac or 'ctrl' for Windows", 'kona'),
								   "id" => "filteritems",
								   "type" => "pages",
								   "sendval" => true,
								   "option" => "product"
								  ),

					array( 	"id" => "sr-shopitems-filtershow",
							"hiding" => "id",	
							"type" => "hidinggroupend"
							),
		
					array( 	"id" => "sr-shopitems-filtershow",
							"hiding" => "all cat",	
							"type" => "hidinggroupstart"
							),

						array( 	"label" => esc_html__("Count", 'kona'),
								"desc" => esc_html__('How many products to show (per page)? Enter "-1" to show all.', 'kona'),
								"id" => "count",
								"type" => "text",
								"sendval" => true,
								"default" => "15"
							  ),
		
					array( 	"id" => "sr-shopitems-filtershow",
							"hiding" => "all cat",	
							"type" => "hidinggroupend"
							),
							
					array( "label" => esc_html__("Order By", 'kona'),
						   "desc" => "",
						   "id" => "filterorder",
						   "type" => "selectbox",
						   "sendval" => true,
						   "option" => array( 
								array(	"name" => esc_html__("Date", 'kona'), 
										"value"=> "date"),
								array(	"name" => esc_html__("Title", 'kona'), 
										"value"=> "title"),
								array(	"name" => esc_html__("Random", 'kona'), 
										"value"=> "rand")
								),
							"default" => "date"
						  ),
					
					array( "label" => esc_html__("Sort order", 'kona'),
						   "desc" => "",
						   "id" => "filtersort",
						   "type" => "selectbox",
						   "sendval" => true,
						   "option" => array( 
								array(	"name" => esc_html__("Descending", 'kona'), 
										"value"=> "DESC"),
								array(	"name" => esc_html__("Ascending", 'kona'), 
										"value"=> "ASC")
								),
							"default" => "DESC"
						  ),
		
					array( 	"label" => esc_html__("Pagination / Load More", 'kona'),
							"desc" => esc_html__('Do you want to enable any sort of pagination or load more? Does not have any impact if you choose the carousel type.', 'kona'),
							"id" => "pagination",
							"type" => "selectbox",
							"sendval" => true,
							"option" => array( 
								array(	"name" => esc_html__("No", 'kona'), 
										"value"=> "0"),		 
								array(	"name" => esc_html__("Pagination", 'kona'), 
										"value" => "pagination"),
								array(	"name" => esc_html__("Load More", 'kona'), 
										"value" => "loadonclick"),
								array(	"name" => esc_html__("Infinity Load", 'kona'), 
										"value" => "infiniteload")
								),
								"default" => "0"
						  ),
				  
			array( "id" => "sr-pb-tab-shopfiltergrid",
				   "type" => "tabend"
				  )
		
		)
		
	),
		
	array(  
		'title' => esc_html__('Product', 'kona'),
	   	'id'    => 'sr-shopproduct',
	   	'desc' => '',
	   	'type' => 'element',
	   	'icon' => 'dashicons-cart',
		'fields' => array(
		
			array( "label" => esc_html__("Select Product", 'kona'),
				   "desc" => esc_html__("Only select 1 item", 'kona'),
				   "id" => "product",
				   "type" => "pages",
				   "sendval" => true,
				   "option" => "product"
				  ),
		
			array( "label" => esc_html__("Layout Option", 'kona'),
				   "desc" => "",
				   "id" => "layoutcustom",
				   "type" => "selectbox-hiding",
				   "sendval" => true,
				   "option" => array( 
						array(	"name" => esc_html__("Inherit from Theme Options", 'kona'),
								"value"=> "inherit"),
						array(	"name" => "Customize for item", 
								"value" => "custom")
						),
				   "default" => "inherit"
				  ),	

			array( 	"id" => "sr-shopproduct-layoutcustom",
					"hiding" => "custom",	
					"type" => "hidinggroupstart"
					),


					array( "label" => esc_html__("Title Font Size", 'kona'),
						   "desc" => "",
						   "id" => "titlesize",
							"sendval" => true,
						   "type" => "selectbox",
						   "option" => array(		 
								array(	"name" => "h1",
										"value" => "h1"),
								array(	"name" => "h2",
										"value" => "h2"),
								array(	"name" => "h3",
										"value" => "h3"),
								array(	"name" => "h4",
										"value" => "h4"),
								array(	"name" => "h5",
										"value" => "h5"),
								array(	"name" => "h6",
										"value" => "h6")
								),
						   "default" => "h6"
						  ),

					array( 	"label" => esc_html__("Show Image", 'kona'),
							"desc" => esc_html__('Want to display the product featured image?', 'kona'),
							"id" => "showimage",
							"sendval" => true,
							"type" => "checkbox-hiding",
						  	"option" => array( 
									array(	"name" => esc_html__("Yes", 'kona'), 
											"value"=> "1"),		 
									array(	"name" => esc_html__("No", 'kona'), 
											"value" => "0")
									),
							"default" => "0"
							),
		
						array( 	"id" => "sr-shopproduct-showimage",
								"hiding" => "1",	
								"type" => "hidinggroupstart"
								),
		
							array( 	"label" => esc_html__("Add to cart", 'kona'),
									"desc" => esc_html__('Show the "Add to cart" button', 'kona'),
									"id" => "showaddtocart",
									"sendval" => true,
									"type" => "checkbox"
									),

		
						array( 	"id" => "sr-shopproduct-showimage",
								"hiding" => "1",	
								"type" => "hidinggroupend"
								),
		
					array( 	"label" => esc_html__("Show Item Price", 'kona'),
							"desc" => esc_html__('Want to display the price?', 'kona'),
							"id" => "showprice",
							"sendval" => true,
							"type" => "checkbox"
							),
					
					array( 	"label" => esc_html__("Show Sale Badge", 'kona'),
							"desc" => esc_html__('Enable the sale badge', 'kona'),
							"id" => "showsale",
							"sendval" => true,
							"type" => "checkbox"
							),
		
					array( 	"label" => esc_html__("Show Description", 'kona'),
							"desc" => esc_html__('Do you want to display the description text of the item', 'kona'),
							"id" => "showdesc",
							"sendval" => true,
							"type" => "checkbox",
						  	"default" => "0"
							),
		
					array( 	"id" => "sr-shopproduct-showimage",
								"hiding" => "0",	
								"type" => "hidinggroupstart"
								),
		
							array( 	"label" => esc_html__("'View Product' Button", 'kona'),
									"desc" => esc_html__('Show the "View Product" button', 'kona'),
									"id" => "showviewmore",
									"sendval" => true,
									"type" => "checkbox"
									),

		
						array( 	"id" => "sr-shopproduct-showimage",
								"hiding" => "0",	
								"type" => "hidinggroupend"
								),

			array( 	"id" => "sr-shopproduct-layoutcustom",
					"hiding" => "smartscroll",	
					"type" => "hidinggroupend"
					),
	
		)
	),
		
	array(  
		'title' => esc_html__('Product Categories', 'kona'),
	   	'id'    => 'sr-shopcategories',
	   	'desc' => '',
	   	'type' => 'row',
	   	'icon' => 'dashicons-cart',
		'fields' => array(
		
		
				array( "label" => esc_html__("Choose Categories", 'kona'),
					   "desc" => esc_html__("Select multiple by holding/pressing 'cmd' or 'ctrl'", 'kona'),
					   "id" => "categories",
					   "type" => "category",
					   "sendval" => true,
					   "option" => "product"
					  ),

				array( "label" => esc_html__("Section Width", 'kona'),
					   "desc" => "",
					   "id" => "wrapper",
					   "type" => "selectbox",
					   "sendval" => true,
					   "option" => array( 
							array(	"name" => esc_html__("Fullwidth (100%)", 'kona'), 
									"value"=> "no-wrapper"),
							array(	"name" => esc_html__("Default (1440px)", 'kona'), 
									"value"=> "wrapper"),
							array(	"name" => esc_html__("Medium (1140px)", 'kona'), 
									"value"=> "wrapper-medium"),
							array(	"name" => esc_html__("Small (780px)", 'kona'), 
									"value"=> "wrapper-small")
							),
						"default" => "wrapper"
					  ),
		
				array( 	"label" => esc_html__("Columns", 'kona'),
						"desc" => "",
						"id" => 'columns',
						"type" => "selectbox",
						"sendval" => true,
						"option" => array( 
							array(	"name" => "2", 
									"value"=> "2"),
							array(	"name" => "3", 
									"value"=> "3"),
							array(	"name" => "4", 
									"value"=> "4"),
							array(	"name" => "5", 
									"value"=> "5")
							),
						"default" => "4"
						),

				array( "label" => esc_html__("Spacing", 'kona'),
					   "desc" => "",
					   "id" => "spacing",
					   "type" => "selectbox",
						"sendval" => true,
					   "option" => array( 
							array(	"name" => esc_html__("Normal Spacing", 'kona'), 
									"value"=> "spaced"),
							array(	"name" => esc_html__("Big Spacing", 'kona'), 
									"value"=> "spaced-big"),
							array(	"name" => esc_html__("Huge Spacing", 'kona'), 
									"value"=> "spaced-huge")
							),
					   "default" => "spaced-big"
					  ),
				
				array( "label" => esc_html__("Slide In (Unveil) Effect", 'kona'),
					   "desc" => esc_html__("Enable the slide in effect.", 'kona'),
					   "id" => "unveil",
					   "type" => "checkbox",
						"sendval" => true,
					   "option" => array( 
							array(	"name" => esc_html__("Yes", 'kona'), 
									"value"=> "do-anim"),
							array(	"name" => esc_html__("No", 'kona'), 
									"value" => "no-anim")
							),
					   "default" => "do-anim"
					  ),
		
				array( "label" => esc_html__("Text Font Size", 'kona'),
					   "desc" => "",
					   "id" => "titlesize",
						"sendval" => true,
					   "type" => "selectbox",
					   "option" => array(		 
							array(	"name" => "h1",
									"value" => "h1"),
							array(	"name" => "h2",
									"value" => "h2"),
							array(	"name" => "h3",
									"value" => "h3"),
							array(	"name" => "h4",
									"value" => "h4"),
							array(	"name" => "h5",
									"value" => "h5"),
							array(	"name" => "h6",
									"value" => "h6")
							),
					   "default" => "h6"
					  ),
		
				array( "label" => esc_html__("Text position", 'kona'),
					   "desc" => "",
					   "id" => "titlepos",
						"sendval" => true,
					   "type" => "selectbox-hiding",
					   "option" => array(		 
							array(	"name" => "Below the thumbnail",
									"value" => "below"),
							array(	"name" => "On the thumbnail",
									"value" => "on")
							),
					   "default" => "below"
					  ),
		
					array( 
						"id" => "sr-shopcategories-titlepos",
						"hiding" => "on",	
						"type" => "hidinggroupstart"
						),
						array( "label" => esc_html__("Text Alignment", 'kona'),
							   "desc" => "",
							   "id" => 'alignment',
							   "type" => "selectbox",
							   'sendval' => true,
							   "option" => array( 
									array(	"name" => esc_html__("Top Left", 'kona'), 
											"value"=> "top-left"),		 
									array(	"name" => esc_html__("Top Right", 'kona'), 
											"value"=> "top-right"),
									array(	"name" => esc_html__("Bottom Left", 'kona'), 
											"value"=> "bottom-left"),
									array(	"name" => esc_html__("Bottom Right", 'kona'), 
											"value"=> "bottom-right"),
									array(	"name" => esc_html__("Center Center", 'kona'), 
											"value"=> "center-center")
									),
								"default" => "top-left"
							  ),
						array( "label" => esc_html__("Display as", 'kona'),
							   "desc" => "",
							   "id" => 'display',
							   "type" => "selectbox-hiding",
							   'sendval' => true,
							   "option" => array( 
									array(	"name" => esc_html__("Text", 'kona'), 
											"value"=> "normal"),		 
									array(	"name" => esc_html__("Button", 'kona'), 
											"value"=> "button")
									),
								"default" => "normal"
							  ),
								array( 
									"id" => "sr-shopcategories-display",
									"hiding" => "normal",	
									"type" => "hidinggroupstart"
									),
									array( "label" => esc_html__("Text Color", 'kona'),
										   "desc" => "",
										   "id" => 'textcolor',
										   "type" => "selectbox",
										   'sendval' => true,
										   "option" => array( 
												array(	"name" => esc_html__("Light", 'kona'), 
														"value"=> "light"),		 
												array(	"name" => esc_html__("Dark", 'kona'), 
														"value"=> "dark")
												),
											"default" => "light"
										  ),
								array( 
									"id" => "sr-shopcategories-display",
									"hiding" => "normal",	
									"type" => "hidinggroupend"
									),
					array( 
						"id" => "sr-shopcategories-titlepos",
						"hiding" => "on",	
						"type" => "hidinggroupend"
						),
		
		)
	),
		
	array(  
		'title' => esc_html__('LookBook Gallery', 'kona'),
	   	'id'    => 'sr-shoplookbook',
	   	'desc' => '',
	   	'type' => 'element',
	   	'icon' => 'dashicons-layout',
		'fields' => array(
		
			array(
				'label' => esc_html__("Images", 'kona'),  
				'desc'  => esc_html__("Link the images to your product(s) by adding the product id's separeted by a simicolon (example: 52;66;77)", 'kona'),  
				'id' => 'medias',		// must called medias
				'type' => 'medias-option',
				'sendval' => true,
				'option' => "product:text", // for more width:select:normal,double|title:text
				),
		
			array( "label" => esc_html__("Products ID's", 'kona'),
				   "desc" => "",
				   "id" => "product",
				   "type" => "pages",
				   "sendval" => true,
				   "option" => "product"
				  ),
			
			array(
				'label' => esc_html__('Columns', 'kona'),
				'desc' => '',
				'id' => 'columns',
				'type' => 'selectbox-hiding',
				'sendval' => true,
				'option' => array( 
					array(	"name" => esc_html__("1", 'kona'), 
							"value"=> "1"),		 
					array(	"name" => esc_html__("2", 'kona'), 
							"value" => "2"),
					array(	"name" => esc_html__("3", 'kona'), 
							"value" => "3"),
					array(	"name" => esc_html__("4", 'kona'), 
							"value" => "4"),
					array(	"name" => esc_html__("5", 'kona'), 
							"value" => "5")
					),
				"default" => "3"
				),
			
				array( 
						"id" => "sr-shoplookbook-columns",
						"hiding" => "2 3 4 5",	
						"type" => "hidinggroupstart"
					),
					array( "label" => esc_html__("Grid Layout", 'kona'),
						   "desc" => esc_html__("'Equal' will crop the image to the same height/ratio and 'Masonry' will take the original image ratios.", 'kona'),
						   "id" => 'type',
						   "type" => "selectbox-hiding",
						   'sendval' => true,
						   "option" => array( 
								array(	"name" => esc_html__("Equal", 'kona'), 
										"value"=> "equal"),		 
								array(	"name" => esc_html__("Masonry", 'kona'), 
										"value" => "masonry")
								),
							"default" => "equal"
						  ),
	
					array( 
							"id" => "sr-shoplookbook-type",
							"hiding" => "equal",	
							"type" => "hidinggroupstart"
						),
						array( "label" => esc_html__("Custom Image Ratio", 'kona'),
							   "desc" => "",
							   "id" => 'ratio',
							   "type" => "selectbox",
							   'sendval' => true,
							   "option" => array( 
									array(	"name" => esc_html__("1:1", 'kona'), 
											"value"=> "1:1"),		 
									array(	"name" => esc_html__("2:1", 'kona'), 
											"value"=> "2:1"),
									array(	"name" => esc_html__("3:1", 'kona'), 
											"value"=> "3:1"),
									array(	"name" => esc_html__("3:2", 'kona'), 
											"value"=> "3:2"),
									array(	"name" => esc_html__("4:3", 'kona'), 
											"value"=> "4:3"),
									array(	"name" => esc_html__("1:2", 'kona'), 
											"value"=> "1:2"),
									array(	"name" => esc_html__("1:3", 'kona'), 
											"value"=> "1:3"),
									array(	"name" => esc_html__("2:3", 'kona'), 
											"value"=> "2:3"),
									array(	"name" => esc_html__("3:4", 'kona'), 
											"value"=> "3:4")
									),
								"default" => "3:2"
							  ),
					array( 
							"id" => "sr-shoplookbook-type",
							"hiding" => "equal",	
							"type" => "hidinggroupend"
						),
	
					array( "label" => esc_html__("Grid Offset", 'kona'),
						   "desc" => esc_html__("Do you want to add an offset for your grid", 'kona'),
						   "id" => "gridoffset",
						   "type" => "checkbox-hiding",
						   "sendval" => true,
						   "option" => array( 
								array(	"name" => esc_html__("No", 'kona'), 
										"value"=> "0"),
								array(	"name" => esc_html__("Normal", 'kona'), 
										"value" => "1"),
								array(	"name" => esc_html__("Random", 'kona'), 
										"value" => "2")
								),
							"default" => "0"
						  ),

						array( 
								"id" => "sr-shoplookbook-gridoffset",
								"hiding" => "1",	
								"type" => "hidinggroupstart"
							),
							array( "label" => esc_html__("Offset Size", 'kona'),
								   "desc" => "",
								   "id" => "gridoffsetsize",
								   "type" => "selectbox",
								   "sendval" => true,
								   "option" => array(	 
										array(	"name" => esc_html__("Normal", 'kona'), 
												"value" => "normal"),
										array(	"name" => esc_html__("Big", 'kona'), 
												"value"=> "big"),
										array(	"name" => esc_html__("Huge", 'kona'), 
												"value"=> "huge"),
										array(	"name" => esc_html__("Ultra", 'kona'), 
												"value"=> "ultra")
										),
									"default" => "normal"
								  ),
						array( 
								"id" => "sr-shoplookbook-gridoffset",
								"hiding" => "1",	
								"type" => "hidinggroupend"
							),
	
				array( 
						"id" => "sr-shoplookbook-columns",
						"hiding" => "2 3 4 5",	
						"type" => "hidinggroupend"
					),
			
			
			array( "label" => esc_html__("Spacing", 'kona'),
				   "desc" => esc_html__("Do you want the image to be spaced?", 'kona'),
				   "id" => "spacing",
				   "type" => "selectbox",
				   'sendval' => true,
				   "option" => array( 
						array(	"name" => esc_html__("No", 'kona'), 
								"value" => "not-spaced"),
						array(	"name" => esc_html__("Normal Spacing", 'kona'), 
								"value"=> "spaced"),
						array(	"name" => esc_html__("Big Spacing", 'kona'), 
								"value"=> "spaced-big"),
						array(	"name" => esc_html__("Huge Spacing", 'kona'), 
								"value"=> "spaced-huge")
						),
					"default" => "not-spaced"
				  )
		)
	)
		
	);
	array_splice($kona_meta_pagebuilder, count($kona_meta_pagebuilder), 0, $shop_pagebuilder);
}


function kona_show_meta_pagebuilder() {  
	global $kona_meta_pagebuilder, $post; 
	
 	// Use nonce for verification  
 	echo '<input type="hidden" name="meta_pagebuilder_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />'; 
	kona_write_pagebuilder($kona_meta_pagebuilder);
}




/*-----------------------------------------------------------------------------------*/
/*	WRITE PAGEBUILDER
/*-----------------------------------------------------------------------------------*/
function kona_write_pagebuilder($pagebuildermeta) {
	global $post; 
	
	/* Bugfix for export/import */
	$json = str_replace("\\\\", "\\", get_post_meta($post->ID, '_sr_pagebuilder_json', true));
	
	// NEW since Kona to put the good json content to the textarea
	if (get_post_meta($post->ID, '_sr_pagebuilder_json', true) !== '') {
		$jsonCheck = json_decode($json);
		// NEW 2018 for export/import bug (also for client export/import)
		if (!$jsonCheck) {
			$json = str_replace("\\\\", "\\", get_post_meta($post->ID, '_sr_pagebuilder_json_export', true));
			$json = str_replace("|~|", '\\"', $json);
		}	
		// NEW 2018 for export/import bug
	}
		
	echo '<div id="sr-pagebuilder" class="sr-style">';
		
	// Main Textareas
	echo '<div class="fieldareas">';
	echo '<textarea name="_sr_pagebuilder" id="_sr_pagebuilder">'.get_post_meta($post->ID, '_sr_pagebuilder', true).'</textarea>';
	echo '<textarea name="_sr_pagebuilder_json" id="_sr_pagebuilder_json">'.$json.'</textarea>';
	
	echo '<textarea name="_sr_pagebuilder_backup_one" id="_sr_pagebuilder_backup_one">'.get_post_meta($post->ID, '_sr_pagebuilder', true).'</textarea>';
	echo '<textarea name="_sr_pagebuilder_json_backup_one" id="_sr_pagebuilder_json_backup_one">'.$json.'</textarea>';
	
	// NEW 2018 for export/import bug
	echo '<textarea name="_sr_pagebuilder_json_export" id="_sr_pagebuilder_json_export">'.get_post_meta($post->ID, '_sr_pagebuilder_json_export', true).'</textarea>';
	// NEW 2018 for export/import bug
	
	echo '</div>';
	
	
	// Activate Pagebuilder
	echo '<input type="hidden" name="_sr_pagebuilder_active" class="_sr_pagebuilder_active" id="_sr_pagebuilder_active" value="'.get_post_meta($post->ID, '_sr_pagebuilder_active', true).'">';
	
	// Gutenberg 
	echo '	<a href="#" id="sr-disable-pagebuilder" class="sr-switch-pagebuilder">'.esc_html__('Deactivate Pagebuilder', 'kona').'</a>
			<a href="#" id="sr-activate-pagebuilder" class="sr-switch-pagebuilder">'.esc_html__('Pagebuilder', 'kona').'</a>';
	
	
	
	
	// 		********
	//		Pagebuilder VISUAL
	// 		********	
	echo '<div id="sr-pagebuilder-visual" class="sortable-container">';
	
	if (get_post_meta($post->ID, '_sr_pagebuilder_json', true) !== '') {
	$json = json_decode($json);
	
	// NEW 2018 for export/import bug (also for client export/import)
	if (!$json) {
		$json = str_replace("\\\\", "\\", get_post_meta($post->ID, '_sr_pagebuilder_json_export', true));
		$json = str_replace("|~|", '\\"', $json);
		$json = json_decode($json);
	}	
	// NEW 2018 for export/import bug
		
	if($json) {
	
	// icon array
	$pbIcons = array();
	foreach ($pagebuildermeta as $ic) {
		if (isset($ic['icon'])) { 
			$pbIcons[$ic['id']] = $ic['icon'];
		}
	}
		
	foreach($json->section as $section) {	
	
		$visualName = ''; $i = 0;	
		if (isset($section->options)) { foreach ($section->options as $o) { 
			if ($i == 0 || $o->oName == 'name') { $visualName = '<i>'.$o->oVal.'</i>'; } 
			$i++;
		} }
		
		$visualIcon = '';
		if (isset($pbIcons[$section->shortcode])) { $visualIcon = '<span class="icon dashicons-before '.$pbIcons[$section->shortcode].'"></span>';  }
		
		switch($section->shortcode) {
			
	
			// text
			case 'text':
				$jsonContent = json_encode($section)	;
				$thisContent = false;
				foreach ($section->options as $o) {
					if ($o->oName == 'content') { $thisContent =  $o->oVal;}
				}
				echo '<div class="visualsection '.esc_attr($section->shortcode).'">
						<div class="action-bar">'.$visualIcon.'<span class="section-name">Text / Editor</span>
						<a href="#" class="delete-section" title="delete"></a>
						<a href="#sr-pagebuilder-popup-'.esc_attr($section->shortcode).'" class="edit-section"  title="edit"></a>
						<a href="#" class="clone-section"  title="clone"></a>
						</div>
					<textarea class="shortcode shortcode-start">'.$thisContent.'</textarea>
					<textarea class="json json-start">'.$jsonContent.'</textarea>';
				
				
				//  replace some snippets for better preview
				$thisContent = preg_replace('#<script(.*?)>(.*?)</script>#is', '<i class="script">* Script *</i>', $thisContent);
					
				echo '<div class="visualcontent"><div class="textcontent">'.$thisContent.'</div>
							<div class="pseudo-action">
								<a href="#" class="delete-pseudo" title="delete"></a>
								<a href="#" class="edit-pseudo"  title="edit"></a>
								<a href="#" class="clone-pseudo"  title="clone"></a>
							</div>
						</div>';
							
				echo '</div>';
			break;
			
			// spacer
			case 'sr-spacer':
				echo '<div class="visualsection light '.esc_attr($section->shortcode).'">
						<div class="action-bar">'.$visualIcon.'<span class="section-name">Spacer '.$visualName.'</span>
						<a href="#" class="delete-section" title="delete"></a>
						<a href="#sr-pagebuilder-popup-'.esc_attr($section->shortcode).'" class="edit-section"  title="edit"></a>
						<a href="#" class="clone-section"  title="clone"></a>
						</div>';
				echo '<textarea class="shortcode shortcode-start">['.$section->shortcode.' ';
				foreach ($section->options as $o) {
					echo ' '.$o->oName.'="'.$o->oVal.'"'; 
				}
				echo ']</textarea>';
				$jsonContent = json_encode($section)	;
				echo '<textarea class="json json-start">'.$jsonContent.'</textarea>';
				echo '</div>';
			break;
			
			
			// teammemeber
			case 'sr-teammember':
				$jsonContent = json_encode($section)	;
				$thisContent = false;
				foreach ($section->options as $o) {
					if ($o->oName == 'content') { $thisContent =  $o->oVal;}
				}
				echo '<div class="visualsection '.esc_attr($section->shortcode).'">
						<div class="action-bar">'.$visualIcon.'<span class="section-name">Team Member '.$visualName.'</span>
						<a href="#" class="delete-section" title="delete"></a>
						<a href="#sr-pagebuilder-popup-'.esc_attr($section->shortcode).'" class="edit-section"  title="edit"></a>
						<a href="#" class="clone-section"  title="clone"></a>
						</div>';
				$thisContent = false;	
				echo '<textarea class="shortcode shortcode-start">['.$section->shortcode.' ';
				foreach ($section->options as $o) {
					if ($o->oName == 'content') { $thisContent =  $o->oVal; } else {
					echo ' '.$o->oName.'="'.$o->oVal.'"'; }
				}
				echo ']'.$thisContent.'</textarea>';	
				echo '	<textarea class="json json-start">'.$jsonContent.'</textarea>';
			break;
			
			// /teammember (end team member)
			case '/sr-teammember':
				echo '<textarea class="shortcode">['.$section->shortcode.']</textarea><textarea class="json">{"shortcode":"'.esc_attr($section->shortcode).'"}</textarea></div>';
			break;
			
			
			// googlemap
			case 'sr-googlemap':
				$jsonContent = json_encode($section)	;
				$thisContent = false;
				foreach ($section->options as $o) {
					if ($o->oName == 'content') { $thisContent =  $o->oVal;}
				}
				
				echo '<div class="visualsection '.esc_attr($section->shortcode).'">
						<div class="action-bar">'.$visualIcon.'<span class="section-name">Google Map</span>
						<a href="#" class="delete-section" title="delete"></a>
						<a href="#sr-pagebuilder-popup-'.esc_attr($section->shortcode).'" class="edit-section"  title="edit"></a>
						<a href="#" class="clone-section"  title="clone"></a>
						</div>';	
				$thisContent = false;	
				echo '<textarea class="shortcode shortcode-start">['.$section->shortcode.' ';
				foreach ($section->options as $o) {
					if ($o->oName == 'content') { $thisContent =  $o->oVal; } else {
					echo ' '.$o->oName.'="'.$o->oVal.'"'; }
				}
				echo ']'.$thisContent.'</textarea>';	
				echo '	<textarea class="json json-start">'.$jsonContent.'</textarea>';
			break;
			
			// /googlemap (end googlemap)
			case '/sr-googlemap':
				echo '<textarea class="shortcode">['.$section->shortcode.']</textarea><textarea class="json">{"shortcode":"'.esc_attr($section->shortcode).'"}</textarea>
				</div>';
			break;
			
			// columns
			case 'col':
				$size = '';
				$shortcode = $section->shortcode;
				foreach ($section->options as $o) {
					if ($o->oName == 'size') { $size = $o->oVal;}
					$shortcode .= ' '.$o->oName.'="'.$o->oVal.'"'; 
				}
				$jsonContent = json_encode($section);
								
				echo '<div class="col '.$size.' visualsection">
								<a class="sr-switch-col" href="#" alt="Switch"></a>
								<textarea class="shortcode shortcode-start">['.$shortcode.']</textarea>
								<textarea class="json json-start">'.$jsonContent.'</textarea>';
				echo '<div class="action-bar"><a href="#sr-pagebuilder-popup-'.esc_attr($section->shortcode).'" class="edit-section"></a></div>';				
				echo '<div class="element-container col-inner">';
			break;
			
			// /columns (end columns)
			case '/col':
				echo '<a class="sr-add-element sr-open-popup disable-sortable" href="#sr-pagebuilder-popup-element">Insert Element</a></div>
				<textarea class="shortcode">['.$section->shortcode.']</textarea><textarea class="json">{"shortcode":"'.esc_attr($section->shortcode).'"}</textarea>
				</div>';
			break;
			
			// columnsection
			case 'columnsection':
				$wrapperVal = '';
				$swap = '';
				$cols = '';
				foreach ($section->options as $o) { 
					if ($o->oName == 'wrapper') { $wrapperVal = $o->oVal; } 
					if ($o->oName == 'layout') { $cols = explode(';',$o->oVal); } 
					if ($o->oName == 'swap' && $o->oVal == '1' && count($cols) == 2) { $swap = "swap-mobile"; } }
				echo '<div class="visualsection '.$wrapperVal.' '.$section->shortcode.' sr-clearfix">';
				
				echo '<textarea class="shortcode shortcode-start">[columnsection ';
				foreach ($section->options as $o) {
					echo ' '.$o->oName.'="'.$o->oVal.'"';
				}
				echo ']</textarea>';
				
				$jsonContent = json_encode($section);
				echo '<textarea class="json json-start">'.$jsonContent.'</textarea>';
				echo '	<div class="action-bar">'.$visualIcon.'<span class="section-name">Column Row</span>
						<a href="#" class="delete-section" title="delete"></a>
						<a href="#sr-pagebuilder-popup-'.esc_attr($section->shortcode).'" class="edit-section"  title="edit"></a>
						<a href="#" class="clone-section"  title="clone"></a>
						</div>
						<div class="columns sr-clearfix column-inner '.esc_attr($swap).'">';
			break;
			
			
			// /columnsection
			case '/columnsection':
				echo '</div>	<textarea class="shortcode">['.$section->shortcode.']</textarea><textarea class="json">{"shortcode":"'.esc_attr($section->shortcode).'"}</textarea>
					</div>';
			break;
						
			
			// fullwidthsection
			case 'fullwidthsection':
				echo '<div class="visualsection '.$section->shortcode.' sr-clearfix ui-sortable-helper">';
				
				$wrapperVal = '';
				echo '<textarea class="shortcode shortcode-start">[fullwidthsection ';
				foreach ($section->options as $o) {
					echo ' '.$o->oName.'="'.$o->oVal.'"'; 
					if ($o->oName == 'wrapper') { $wrapperVal = $o->oVal; }
				}
				echo ']</textarea>';
				
				$jsonContent = json_encode($section)	;
				echo '<textarea class="json json-start">'.$jsonContent.'</textarea>';
				echo '	<div class="action-bar">'.$visualIcon.'<span class="section-name">Background Section '.$visualName.'</span>
						<a href="#" class="delete-section" title="delete"></a>
						<a href="#sr-pagebuilder-popup-'.esc_attr($section->shortcode).'" class="edit-section"  title="edit"></a>
						<a href="#" class="clone-section"  title="clone"></a>
						</div>';
				echo '<div class="fullwidth-inner sr-clearfix visual-inner">';
			break;
			
			// /fullwidthsection
			case '/fullwidthsection':
				echo '<div class="pb-message disable-sortable">
					<a class="sr-add-first-row sr-button sr-open-popup" data-disable="fullwidthsection" href="#sr-pagebuilder-popup-row">Add Row</a></div></div>';
				echo '<textarea class="shortcode">['.$section->shortcode.']</textarea>
				<textarea class="json">{"shortcode":"'.esc_attr($section->shortcode).'"}</textarea>
					</div>';
			break;
			
			
			// sr-gallery
			case 'sr-gallery':
				$jsonContent = json_encode($section)	;
				$jsonContent = str_replace("\/","/",$jsonContent);		// Workaround for "\/" in json
				
				echo '<div class="visualsection '.esc_attr($section->shortcode).'">
						<div class="action-bar">'.$visualIcon.'<span class="section-name">Gallery</span>
						<a href="#" class="delete-section" title="delete"></a>
						<a href="#sr-pagebuilder-popup-'.esc_attr($section->shortcode).'" class="edit-section"  title="edit"></a>
						<a href="#" class="clone-section"  title="clone"></a>
						</div>';		
				echo '<textarea class="shortcode shortcode-start">[sr-gallery ';
				$thisContent = '';
				$contentClass = '';
				foreach ($section->options as $o) {
					if ($o->oName === 'medias') { 
						$images = json_decode($o->oVal);
						$items = '';
						foreach($images->sortable as $j) {
							$items .= $j->id;
							if (isset($j->size) && $j->size !== '') { $items .= '|'.$j->size; }
							$items .= ',';
							$thisContent .= '<span><img src="'.esc_url($j->thumb).'" /></span>';
						}
						echo $o->oName.'="'.trim($items, ",").'"'; 
					} else {
					echo ' '.$o->oName.'="'.$o->oVal.'"'; 
						if ($o->oName === 'columns') { $contentClass = 'col-'.$o->oVal; }
					}
				}
				echo ']</textarea>';
				echo '<textarea class="json json-start">'.$jsonContent.'</textarea>';
				
				echo '	<div class="visualcontent gallerycontent">
							<div class="democontent '.esc_attr($contentClass).'">'.$thisContent.'</div>
							<div class="pseudo-action">
								<a href="#" class="delete-pseudo" title="delete"></a>
								<a href="#" class="edit-pseudo"  title="edit"></a>
								<a href="#" class="clone-pseudo"  title="clone"></a>
							</div>
						</div>';
				
				echo '</div>';
			break;
				
			
			// sr-shoplookbook
			case 'sr-shoplookbook':
				$jsonContent = json_encode($section)	;
				$jsonContent = str_replace("\/","/",$jsonContent);		// Workaround for "\/" in json
				
				echo '<div class="visualsection '.esc_attr($section->shortcode).'">
						<div class="action-bar">'.$visualIcon.'<span class="section-name">LookBook Gallery</span>
						<a href="#" class="delete-section" title="delete"></a>
						<a href="#sr-pagebuilder-popup-'.esc_attr($section->shortcode).'" class="edit-section"  title="edit"></a>
						<a href="#" class="clone-section"  title="clone"></a>
						</div>';		
				echo '<textarea class="shortcode shortcode-start">[sr-shoplookbook ';
				$thisContent = '';
				$contentClass = '';
				foreach ($section->options as $o) {
					if ($o->oName === 'medias') { 
						$images = json_decode($o->oVal);
						$items = '';
						foreach($images->sortable as $j) {
							$items .= $j->id;
							if (isset($j->product) && $j->product !== '') { $items .= '|'.$j->product; }
							$items .= ',';
							$thisContent .= '<span><img src="'.esc_url($j->thumb).'" /></span>';
						}
						echo $o->oName.'="'.trim($items, ",").'"'; 
					} else {
					echo ' '.$o->oName.'="'.$o->oVal.'"';
						if ($o->oName === 'columns') { $contentClass = 'col-'.$o->oVal; }
					}
				}
				echo ']</textarea>';
				echo '<textarea class="json json-start">'.$jsonContent.'</textarea>';
				
				echo '	<div class="visualcontent gallerycontent">
							<div class="democontent '.esc_attr($contentClass).'">'.$thisContent.'</div>
							<div class="pseudo-action">
								<a href="#" class="delete-pseudo" title="delete"></a>
								<a href="#" class="edit-pseudo"  title="edit"></a>
								<a href="#" class="clone-pseudo"  title="clone"></a>
							</div>
						</div>';
				
				echo '</div>';
			break;
				
				
			// sr-slider
			case 'sr-slider':
				$jsonContent = json_encode($section)	;
				$jsonContent = str_replace("\/","/",$jsonContent);		// Workaround for "\/" in json
				
				echo '<div class="visualsection '.esc_attr($section->shortcode).'">
						<div class="action-bar">'.$visualIcon.'<span class="section-name">Image Slider</span>
						<a href="#" class="delete-section" title="delete"></a>
						<a href="#sr-pagebuilder-popup-'.esc_attr($section->shortcode).'" class="edit-section"  title="edit"></a>
						<a href="#" class="clone-section"  title="clone"></a>
						</div>';		
				echo '<textarea class="shortcode shortcode-start">[sr-slider ';
				foreach ($section->options as $o) {
					if ($o->oName === 'medias') { 
						$images = json_decode($o->oVal);
						$items = '';
						foreach($images->sortable as $j) {
							$items .= $j->id;
							if (isset($j->size) && $j->size !== '') { $items .= '|'.$j->size; }
							$items .= ',';
						}
						echo $o->oName.'="'.trim($items, ",").'"'; 
					} else {
					echo ' '.$o->oName.'="'.$o->oVal.'"'; 
					}
				}
				echo ']</textarea>';
				echo '<textarea class="json json-start">'.$jsonContent.'</textarea>';
				echo '</div>';
			break;
			
			
			// sr-blogposts
			case 'sr-blogposts':
				echo '<div class="visualsection '.esc_attr($section->shortcode).'">
						<div class="action-bar">'.$visualIcon.'<span class="section-name">Blog Posts</span>
						<a href="#" class="delete-section" title="delete"></a>
						<a href="#sr-pagebuilder-popup-'.esc_attr($section->shortcode).'" class="edit-section"  title="edit"></a>
						<a href="#" class="clone-section"  title="clone"></a>
						</div>';
				echo '<textarea class="shortcode shortcode-start">['.$section->shortcode.' ';
				foreach ($section->options as $o) {
					echo ' '.$o->oName.'="'.$o->oVal.'"'; 
				}
				echo ']</textarea>';
				$jsonContent = json_encode($section)	;
				echo '<textarea class="json json-start">'.$jsonContent.'</textarea>';
				echo '</div>';
			break;
			
			
			// sr-portfolioitems
			case 'sr-portfolioitems':
				echo '<div class="visualsection '.esc_attr($section->shortcode).'">
						<div class="action-bar">'.$visualIcon.'<span class="section-name">Portfolio Grid</span>
						<a href="#" class="delete-section" title="delete"></a>
						<a href="#sr-pagebuilder-popup-'.esc_attr($section->shortcode).'" class="edit-section"  title="edit"></a>
						<a href="#" class="clone-section"  title="clone"></a>
						</div>';
				echo '<textarea class="shortcode shortcode-start">['.$section->shortcode.' ';
				foreach ($section->options as $o) {
					echo ' '.$o->oName.'="'.$o->oVal.'"'; 
				}
				echo ']</textarea>';
				$jsonContent = json_encode($section)	;
				echo '<textarea class="json json-start">'.$jsonContent.'</textarea>';
				echo '</div>';
			break;
			
			// sr-shopitems
			case 'sr-shopitems':
				echo '<div class="visualsection '.esc_attr($section->shortcode).'">
						<div class="action-bar">'.$visualIcon.'<span class="section-name">Shop Grid</span>
						<a href="#" class="delete-section" title="delete"></a>
						<a href="#sr-pagebuilder-popup-'.esc_attr($section->shortcode).'" class="edit-section"  title="edit"></a>
						<a href="#" class="clone-section"  title="clone"></a>
						</div>';
				echo '<textarea class="shortcode shortcode-start">['.$section->shortcode.' ';
				foreach ($section->options as $o) {
					echo ' '.$o->oName.'="'.$o->oVal.'"'; 
				}
				echo ']</textarea>';
				$jsonContent = json_encode($section)	;
				echo '<textarea class="json json-start">'.$jsonContent.'</textarea>';
				echo '</div>';
			break;
				
			// sr-shopproduct
			case 'sr-shopproduct':
				echo '<div class="visualsection '.esc_attr($section->shortcode).'">
						<div class="action-bar">'.$visualIcon.'<span class="section-name">Product</span>
						<a href="#" class="delete-section" title="delete"></a>
						<a href="#sr-pagebuilder-popup-'.esc_attr($section->shortcode).'" class="edit-section"  title="edit"></a>
						<a href="#" class="clone-section"  title="clone"></a>
						</div>';
				echo '<textarea class="shortcode shortcode-start">['.$section->shortcode.' ';
				foreach ($section->options as $o) {
					echo ' '.$o->oName.'="'.$o->oVal.'"'; 
				}
				echo ']</textarea>';
				$jsonContent = json_encode($section)	;
				echo '<textarea class="json json-start">'.$jsonContent.'</textarea>';
				echo '</div>';
			break;
				
			// sr-shopcategories
			case 'sr-shopcategories':
				echo '<div class="visualsection '.esc_attr($section->shortcode).'">
						<div class="action-bar">'.$visualIcon.'<span class="section-name">Product Categories</span>
						<a href="#" class="delete-section" title="delete"></a>
						<a href="#sr-pagebuilder-popup-'.esc_attr($section->shortcode).'" class="edit-section"  title="edit"></a>
						<a href="#" class="clone-section"  title="clone"></a>
						</div>';
				echo '<textarea class="shortcode shortcode-start">['.$section->shortcode.' ';
				foreach ($section->options as $o) {
					echo ' '.$o->oName.'="'.$o->oVal.'"'; 
				}
				echo ']</textarea>';
				$jsonContent = json_encode($section)	;
				echo '<textarea class="json json-start">'.$jsonContent.'</textarea>';
				echo '</div>';
			break;	
				
			// sr-imagebutton
			case 'sr-imagebutton':
				echo '<div class="visualsection '.esc_attr($section->shortcode).'">
						<div class="action-bar">'.$visualIcon.'<span class="section-name">Button Image</span>
						<a href="#" class="delete-section" title="delete"></a>
						<a href="#sr-pagebuilder-popup-'.esc_attr($section->shortcode).'" class="edit-section"  title="edit"></a>
						<a href="#" class="clone-section"  title="clone"></a>
						</div>';
				echo '<textarea class="shortcode shortcode-start">['.$section->shortcode.' ';
				$visualContent = '';
				foreach ($section->options as $o) {
					echo ' '.$o->oName.'="'.$o->oVal.'"';
					if ($o->oName == 'image') { $visualContent .= '<img src="'.esc_url($o->oVal).'"/>'; }
				}
				echo ']</textarea>';
				$jsonContent = json_encode($section)	;
				echo '<textarea class="json json-start">'.$jsonContent.'</textarea>';
								
				echo '<div class="visualcontent"><div class="textcontent">'.$visualContent.'</div>
							<div class="pseudo-action">
								<a href="#" class="delete-pseudo" title="delete"></a>
								<a href="#" class="edit-pseudo"  title="edit"></a>
								<a href="#" class="clone-pseudo"  title="clone"></a>
							</div>
						</div>';
				
				echo '</div>';
			break;
				
				
			// sr-instagram
			case 'sr-instagram':
				echo '<div class="visualsection '.esc_attr($section->shortcode).'">
						<div class="action-bar">'.$visualIcon.'<span class="section-name">Instagram feed</span>
						<a href="#" class="delete-section" title="delete"></a>
						<a href="#sr-pagebuilder-popup-'.esc_attr($section->shortcode).'" class="edit-section"  title="edit"></a>
						<a href="#" class="clone-section"  title="clone"></a>
						</div>';
				echo '<textarea class="shortcode shortcode-start">['.$section->shortcode.' ';
				foreach ($section->options as $o) {
					echo ' '.$o->oName.'="'.$o->oVal.'"'; 
				}
				echo ']</textarea>';
				$jsonContent = json_encode($section)	;
				echo '<textarea class="json json-start">'.$jsonContent.'</textarea>';
				echo '</div>';
			break;
				
				
			// sr-singleimage
			case 'sr-singleimage':
				echo '<div class="visualsection '.esc_attr($section->shortcode).'">
						<div class="action-bar">'.$visualIcon.'<span class="section-name">Single Image</span>
						<a href="#" class="delete-section" title="delete"></a>
						<a href="#sr-pagebuilder-popup-'.esc_attr($section->shortcode).'" class="edit-section"  title="edit"></a>
						<a href="#" class="clone-section"  title="clone"></a>
						</div>';
				
				$shortcodeContent = '['.$section->shortcode;
				foreach ($section->options as $o) {
					$shortcodeContent .= ' '.$o->oName.'="'.$o->oVal.'"'; 
				}
				$shortcodeContent .=  ']';
				echo '<textarea class="shortcode shortcode-start">'.$shortcodeContent.'</textarea>';
				
				$jsonContent = json_encode($section)	;
				echo '<textarea class="json json-start">'.$jsonContent.'</textarea>';
			
				echo '<div class="visualcontent"><div class="textcontent">'.do_shortcode( $shortcodeContent ).'</div>
							<div class="pseudo-action">
								<a href="#" class="delete-pseudo" title="delete"></a>
								<a href="#" class="edit-pseudo"  title="edit"></a>
								<a href="#" class="clone-pseudo"  title="clone"></a>
							</div>
						</div>';
				
				echo '</div>';
			break;
			
			
		} // END switch
	} // END foreach section
		
		echo '<div class="pb-message sr-pb-last disable-sortable"><div class="pb-empty message">Your Pagebuilder is empty<br>Start adding Rows and Elements to your content</div><a class="sr-add-first-row sr-button sr-open-popup" href="#sr-pagebuilder-popup-row">Add Row</a></div>';
	} else {
		// If json has error
		$jsonBackup = str_replace("\\\\", "\\", get_post_meta($post->ID, '_sr_pagebuilder_json_backup_one', true));	
		$jsonBackup = json_decode($jsonBackup);
		if (get_post_meta($post->ID, '_sr_pagebuilder_json_backup_one', true) && get_post_meta($post->ID, '_sr_pagebuilder_json_backup_one', true) !== '' && $jsonBackup) {
		
			echo '<div class="pb-message disable-sortable"><div class="pb-error message">Unfortunately something went wrong.<br>It\'s recommended to restore the pagebuilder, so you do not to loose your previous savings.</div>
			<input type="hidden" name="sr-pagebuilder-restore" id="sr-pagebuilder-restore" value="false">
			<a href="#" class="sr-button" id="restore-pagebuilder">Restore Now</a>
			</div>';	
		} else {
			echo '<div class="pb-message sr-pb-last disable-sortable"><div class="pb-error message">Unfortunately something went wrong.<br>It\'s not possible to restore your previous savings and you need to recreate the different elements.<br><small>Some of your elements have errors and can\'t be shown here, although it might display fine on your frontend.</small></div><a class="sr-add-first-row sr-button sr-open-popup" href="#sr-pagebuilder-popup-row">Add Row</a></div>';	
		}
	}
	
	} else { 
		// Pagebuilder is empty
		echo '<div class="pb-message sr-pb-last disable-sortable"><div class="pb-empty message">Your Pagebuilder is empty<br>Start adding Rows and Elements to your content</div><a class="sr-add-first-row sr-button sr-open-popup" href="#sr-pagebuilder-popup-row">Add Row</a></div>';
	}
		
	echo '</div>'; // END #sr-pagebuilder-visual
	// 		********
	
	//		Pagebuilder VISUAL
	
	// 		********	

			
			
	
	
	// 		********
	
	//		Pagebuilder POPUP ($kona_meta_pagebuilder)
	
	// 		********
	echo '<div id="sr-pagebuilder-popup-bg"></div>';
	
	
	/* Popup Add Row */
	echo '<div id="sr-pagebuilder-popup-row" class="sr-pagebuilder-popup">';
	echo '<div class="popup-title">Add Row <a class="close-popup" href="#">close</a></div>';
	echo '<div class="popup-inner">';
	foreach ($pagebuildermeta as $row) {
		if (strpos($row['type'],'row') !== false) { 
			echo '<a href="#sr-pagebuilder-popup-'.$row['id'].'" class="popup-add-row sr-open-popup '.$row['id'].'">';
			if (isset($row['icon'])) { echo '<span class="icon dashicons-before '.$row['icon'].'"></span>'; }
			echo $row['title'].'</a>';
		}
	}
	echo '</div>';
	echo '</div>';
	/* Popup Add Row */
	
	
	
	/* Popup Add Element */
	echo '<div id="sr-pagebuilder-popup-element" class="sr-pagebuilder-popup">';
	echo '<div class="popup-title">Insert Element <a class="close-popup" href="#">close</a></div>';
	echo '<div class="popup-inner">';
	foreach ($pagebuildermeta as $row) {
		if (strpos($row['type'],'element') !== false) {
			echo '<a href="#sr-pagebuilder-popup-'.$row['id'].'" class="popup-add-element sr-open-popup">';
			if (isset($row['icon'])) { echo '<span class="icon dashicons-before '.$row['icon'].'"></span>'; }
			echo $row['title'].'</a>';
		}
	}
	echo '</div>';
	echo '</div>';
	/* Popup Add Element */
	
	
	
	/* Popup Rows & Elements */
	foreach ($pagebuildermeta as $meta) {
		
		echo '<div id="sr-pagebuilder-popup-'.esc_attr($meta['id']).'" class="sr-pagebuilder-popup sr-pagebuilder-popup-option" data-name="'.esc_attr($meta['id']).'">';
		echo '<div class="popup-title">';
		if (isset($meta['icon'])) { echo '<span class="icon dashicons-before '.$meta['icon'].'"></span>'; }
		echo $meta['title'].' <a class="close-popup" href="#">close</a></div>';
		
		// Loop tabs
		$tabCounter = 0;
		foreach ($meta['fields'] as $tab) {
			if ($tab['type'] == 'tabstart') {
				if ($tabCounter == 0) { echo '<ul class="sr-tab-list clearfix">'; $active = "active"; } else { $active = ""; }
				echo '<li class="'.esc_attr($active).'"><a href="'.$tab['id'].'">'.esc_html($tab['name']).'</a></li>';
				$tabCounter++;	
			}
		}
		if ($tabCounter !== 0) { echo '</ul>'; }	
		
		
		echo '<div class="popup-inner sr-post-meta">
				<div>';
		// empty div needed for clearfix issue
		
				
		// create fields
		$tabCounter = 0;
		foreach ($meta['fields'] as $option) {
			
			$value = '';  
			if (isset($option['default']) && $option['default'] !== '') { $value = $option['default']; }
			
			$sendVal = ''; $formDisable = ''; 
			if (isset($option['sendval']) && $option['sendval']) { $sendVal = ' send-val'; } else { $formDisable = 'disable-on-edit'; }
			
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
											<label>'.$option['label'].'</label>
										</div>';
								echo '	<div class="option_value">';
							}
							echo '	<div class="sr-message-info"><i>'.$option['desc'].'</i></div>';	
							if (isset($option['label']) && $option['label'] !== '') {
								echo '	</div>';	
							}
						echo '</div>';
					echo '</div>';
				break;
				
				// hidden
				case 'hidden':
					echo '<input type="hidden" name="builder-'.esc_attr($meta['id']).''.esc_attr($option['id']).'" id="'.esc_attr($meta['id']).'-'.esc_attr($option['id']).'" value="'.$value.'"  class="builder'.esc_attr($option['id']).' theval '.esc_attr($sendVal).'" data-default="'.$value.'"/>';
				break;
				
				// text
				case 'text':
					echo '<div class="option '.esc_attr($formDisable).' clear">';
						echo '<div class="option-inner">';
							echo '	<div class="option_name">
										<label for="'.esc_attr($option['id']).'">'.$option['label'].'</label>
										<div class="option_desc"><i>'.$option['desc'].'</i></div>
									</div>';
									
							echo '	<div class="option_value">
										<input type="text" name="builder-'.esc_attr($meta['id']).''.esc_attr($option['id']).'" id="'.esc_attr($meta['id']).'-'.esc_attr($option['id']).'" value="'.$value.'" size="30" class="builder'.esc_attr($option['id']).' theval '.esc_attr($sendVal).'" data-default="'.$value.'"/>
									</div>';	
						echo '</div>';
					echo '</div>';
				break;
					
				// textwithsize
				case 'textwithsize':
					echo '<div class="option '.esc_attr($formDisable).' clear">';
						echo '<div class="option-inner">';
							echo '	<div class="option_name">
										<label for="'.esc_attr($option['id']).'">'.$option['label'].'</label>
										<div class="option_desc"><i>'.$option['desc'].'</i></div>
									</div>';
									
							echo '	<div class="option_value with_size">
										<input type="text" name="builder-'.esc_attr($meta['id']).''.esc_attr($option['id']).'" id="'.esc_attr($meta['id']).'-'.esc_attr($option['id']).'" value="'.$value.'" size="30" class="builder'.esc_attr($option['id']).' theval '.esc_attr($sendVal).'" data-default="'.$value.'"/>
										
										<select name="builder-'.esc_attr($meta['id']).''.esc_attr($option['id']).'size" id="'.esc_attr($meta['id']).'-'.esc_attr($option['id']).'size" class="builder'.esc_attr($option['id']).'-size theval '.esc_attr($sendVal).'">
											<option value="h1">H1</option>
											<option value="h2">H2</option>
											<option value="h3">H3</option>
											<option value="h4">H4</option>
											<option value="h5">H5</option>
											<option value="h6">H6</option>
										</select>
									</div>';	
						echo '</div>';
					echo '</div>';
				break;
					
				// text-responsive
				case 'text-responsive':
					echo '<div class="option '.esc_attr($formDisable).' clear">';
						echo '<div class="option-inner">';
							echo '	<div class="option_name">
										<label for="'.esc_attr($option['id']).'">'.$option['label'].'</label>
										<div class="option_desc"><i>'.$option['desc'].'</i></div>
									</div>';
									
							echo '	<div class="option_value">
										<span class="valcol-3rd">
											<input type="text" name="builder-'.esc_attr($meta['id']).''.esc_attr($option['id']).'" id="'.esc_attr($meta['id']).'-'.esc_attr($option['id']).'" value="'.$value.'" size="10" class="builder'.esc_attr($option['id']).' theval '.esc_attr($sendVal).'" data-default="'.$value.'"/><br>
											<span class="desc">Desktop</span>
										</span>
										<span class="valcol-3rd">
											<input type="text" name="builder-'.esc_attr($meta['id']).''.esc_attr($option['id']).'tablet" id="'.esc_attr($meta['id']).'-'.esc_attr($option['id']).'tablet" value="'.$value.'" size="10" class="builder'.esc_attr($option['id']).'tablet theval '.esc_attr($sendVal).'" data-default="'.$value.'"/><br>
											<span class="desc">Tablet</span>
										</span>
										<span class="valcol-3rd">
											<input type="text" name="builder-'.esc_attr($meta['id']).''.esc_attr($option['id']).'phone" id="'.esc_attr($meta['id']).'-'.esc_attr($option['id']).'phone" value="'.$value.'" size="10" class="builder'.esc_attr($option['id']).'phone theval '.esc_attr($sendVal).'" data-default="'.$value.'"/><br>
											<span class="desc">Smartphone</span>
										</span>
									</div>';	
						echo '</div>';
					echo '</div>';
				break;	
				
				// editor
				case 'editor':
					echo '<div class="option '.esc_attr($formDisable).' clear">';
						if ($option['label'] !== '') { 
							echo '	<div class="option_name">
										<label for="'.esc_attr($option['id']).'">'.$option['label'].'</label>
										<div class="option_desc"><i>'.$option['desc'].'</i></div>
									</div>';
							}
						echo '<div class="option-inner">';
							wp_editor( '', $meta['id'].'-'.$option['id'],array('textarea_rows' => 13,'editor_class' => $sendVal));
						echo '</div>';
						echo '<div class="option_desc"><i>'.$option['desc'].'</i></div>'	;		
					echo '</div>';
				break;
				
				//color
				case "color":
					echo '<div class="option '.esc_attr($formDisable).' clear">';
						echo '<div class="option-inner">';
							echo '	<div class="option_name">
										<label for="'.esc_attr($option['id']).'">'.$option['label'].'</label>
										<div class="option_desc"><i>'.$option['desc'].'</i></div>
									</div>';
							echo '	<div class="option_value">
										<input type="text" name="builder-'.esc_attr($meta['id']).''.esc_attr($option['id']).'" id="'.esc_attr($meta['id']).'-'.esc_attr($option['id']).'" value="'.$value.'" class="sr-color-field builder'.esc_attr($option['id']).' theval '.esc_attr($sendVal).'" data-default="'.$value.'"/>
									</div>';	
						echo '</div>';
					echo '</div>';
				break;
				
				//checkbox
				case 'checkbox':  
					echo '<div class="option '.esc_attr($formDisable).' clear">';
						echo '<div class="option-inner">';
							echo '	<div class="option_name">
										<label for="'.esc_attr($option['id']).'">'.$option['label'].'</label>
										<div class="option_desc"><i>'.$option['desc'].'</i></div>
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
								$pseudo .= '<a href="#" data-value="'.$var['value'].'" class="'.esc_attr($active).'"> '.$var['name'].'</a>';
								$select .= '<option value="'.esc_attr($var['value']).'" '.$selected.'> '.$var['name'].'</option>';
							$i++;	
							}
									
							echo '	<div class="option_value">
										<div class="checkbox-pseudo clearfix">'.$pseudo.'</div>
										<select name="builder-'.esc_attr($meta['id']).''.esc_attr($option['id']).'" id="'.esc_attr($meta['id']).'-'.esc_attr($option['id']).'" style="display: none;" class="builder'.esc_attr($option['id']).' theval '.esc_attr($sendVal).'" data-default="'.$value.'">'.$select.'</select>
									</div>';		
						echo '</div>';
					echo '</div>';
				break;
				
				
				//checkbox-hiding
				case 'checkbox-hiding':  
					echo '<div class="option '.esc_attr($formDisable).' clear hiding'.esc_attr($option['id']).' hiding">';
						echo '<div class="option-inner">';
							echo '	<div class="option_name">
										<label for="'.esc_attr($option['id']).'">'.$option['label'].'</label>
										<div class="option_desc"><i>'.$option['desc'].'</i></div>
									</div>';
							
							// default options
							$options = array(array(	"name" => esc_html__("On", 'kona'), "value" => "1"),
											 array(	"name" => esc_html__("Off", 'kona'), "value"=> "0"));
							if (isset($option['option']) && $option['option']) { $options = $option['option']; }		
							$i = 0;
							$pseudo = '';
							$select = '';
							foreach ($options as $var) {
								if ($value == $var['value'] || ($value == '' && $i == 0)) { $selected = 'selected="selected"'; $active ='active'; } else { $selected = ''; $active ='';  } 
								$pseudo .= '<a href="#" data-value="'.$var['value'].'" class="'.esc_attr($active).'"> '.$var['name'].'</a>';
								$select .= '<option value="'.esc_attr($var['value']).'" '.$selected.'> '.$var['name'].'</option>';
							$i++;	
							}
									
							echo '	<div class="option_value">
										<div class="checkbox-pseudo clearfix">'.$pseudo.'</div>
										<select name="builder-'.esc_attr($meta['id']).''.esc_attr($option['id']).'" id="'.esc_attr($meta['id']).'-'.esc_attr($option['id']).'" style="display: none;" class="builder'.esc_attr($option['id']).' theval '.esc_attr($sendVal).'" data-default="'.$value.'">'.$select.'</select>
									</div>';		
						echo '</div>';
					echo '</div>';
				break;
				
				// selectbox  
				case 'selectbox':  
					echo '<div class="option '.esc_attr($formDisable).' clear">';
						echo '<div class="option-inner">';
							echo '	<div class="option_name">
										<label for="'.esc_attr($option['id']).'">'.$option['label'].'</label>
										<div class="option_desc"><i>'.$option['desc'].'</i></div>
									</div>';
							echo '	<div class="option_value">';
															
							echo '<select name="builder-'.esc_attr($meta['id']).''.esc_attr($option['id']).'" id="'.esc_attr($meta['id']).'-'.esc_attr($option['id']).'" class="builder'.esc_attr($option['id']).' theval '.esc_attr($sendVal).'" data-default="'.$value.'">';
							$i = 0;
							foreach ($option['option'] as $var) {
								if ($value == $var['value']) { $selected = 'selected="selected"'; } else { if ($value == '' && $i == 0) { $selected = 'selected="selected"'; } else { $selected = '';  } }
								echo '<option value="'.esc_attr($var['value']).'" '.$selected.'> '.$var['name'].'</option>';
							$i++;	
							}			  
							echo '</select>';
							
						echo '	</div>';	
						
						echo '</div>';
					echo '</div>';
				break;
				
				
				// selectbox-hiding  
				case 'selectbox-hiding':  
					echo '<div class="option '.esc_attr($formDisable).' clear hiding'.esc_attr($option['id']).' hiding">';
						echo '<div class="option-inner">';
							echo '	<div class="option_name">
										<label for="'.esc_attr($option['id']).'">'.$option['label'].'</label>
										<div class="option_desc"><i>'.$option['desc'].'</i></div>
									</div>';
							echo '	<div class="option_value">';
							
							echo '<select name="builder-'.esc_attr($meta['id']).''.esc_attr($option['id']).'" id="'.esc_attr($meta['id']).'-'.esc_attr($option['id']).'" class="builder'.esc_attr($option['id']).' theval '.esc_attr($sendVal).'" data-default="'.$value.'">';
							$i = 0;
							foreach ($option['option'] as $var) {
								if ($value == $var['value']) { $selected = 'selected="selected"'; } else { if ($value == '' && $i == 0) { $selected = 'selected="selected"'; } else { $selected = '';  } }
								echo '<option value="'.esc_attr($var['value']).'" '.$selected.'> '.$var['name'].'</option>';
							$i++;	
							}			  
							echo '</select>'; 
						echo '	</div>';		
					
						echo '</div>';
					echo '</div>';
				break;
				
				// image  
				case 'image':  
					echo '<div class="option '.esc_attr($formDisable).' clear">';
						echo '<div class="option-inner">';
							echo '	<div class="option_name">
										<label for="'.esc_attr($option['id']).'">'.$option['label'].'</label>
										<div class="option_desc"><i>'.$option['desc'].'</i></div>
									</div>';
							echo '	<div class="option_value">
										<input class="upload_image builder'.esc_attr($option['id']).' theval '.esc_attr($sendVal).'" type="hidden" name="builder-'.esc_attr($meta['id']).''.esc_attr($option['id']).'" id="'.esc_attr($meta['id']).'-'.esc_attr($option['id']).'" value="'.$value.'" size="30" data-default="'.$value.'"/>
										<input class="sr_upload_image_button sr-button" type="button" value="Upload Image" />
										<input class="sr_remove_image_button sr-button button-remove hide" type="button" value="Remove Image" /><br />
										<span class="preview_image"></span>
									</div>';		
						echo '</div>';
					echo '</div>';		
				break;
				
				// video  
				case 'video': 
					echo '<div class="option '.esc_attr($formDisable).' clear">';
						echo '<div class="option-inner">';
							echo '	<div class="option_name">
										<label for="'.esc_attr($option['id']).'">'.$option['label'].'</label>
										<div class="option_desc"><i>'.$option['desc'].'</i></div>
									</div>';
							echo '	<div class="option_value">
										<input class="upload_video builder'.esc_attr($option['id']).' theval '.esc_attr($sendVal).'" type="text" name="builder-'.esc_attr($meta['id']).''.esc_attr($option['id']).'" id="'.esc_attr($meta['id']).'-'.esc_attr($option['id']).'" value="'.$value.'" size="30" data-default="'.$value.'"/>
										<input class="upload_video_button sr-button" type="button" value="Add Video" />
									</div>';		
						echo '</div>';
					echo '</div>'; 
				break;
				
				// custom-select
				case 'custom-select':
					echo '<div class="option '.esc_attr($formDisable).' clear">';
						echo '<div class="option-inner">';
							echo '	<div class="option_name">
										<label for="'.esc_attr($option['id']).'">'.$option['label'].'</label>
										<div class="option_desc"><i>'.$option['desc'].'</i></div>
									</div>';
							echo '	<div class="option_value custom-select">
							
										<select name="builder-'.esc_attr($meta['id']).''.esc_attr($option['id']).'" id="'.esc_attr($meta['id']).'-'.esc_attr($option['id']).'" style="display: none;" class="builder'.esc_attr($option['id']).' theval '.esc_attr($sendVal).'" data-default="'.$value.'">';
										foreach ($option['option'] as $var) {
											echo '<option value="'.esc_attr($var['value']).'"> '.$var['name'].'</option>';
										}			  
										echo '</select>';
										
										echo '<ul class="sr-clearfix">';
										foreach ($option['option'] as $var) {
											echo '<li data-rel="'.$var['value'].'"><img src="'.esc_url(plugins_url( '/img/'.$var['img'], __FILE__ )).'" /></li>';
										}
										echo '</ul>';
										
							echo '</div>';		
						echo '</div>';
					echo '</div>'; 
				break;
					
				// custom-select-hiding
				case 'custom-select-hiding':
					echo '<div class="option '.esc_attr($formDisable).' clear hiding'.esc_attr($option['id']).' hiding">';
						echo '<div class="option-inner">';
							echo '	<div class="option_name">
										<label for="'.esc_attr($option['id']).'">'.$option['label'].'</label>
										<div class="option_desc"><i>'.$option['desc'].'</i></div>
									</div>';
							echo '	<div class="option_value custom-select">
							
										<select name="builder-'.esc_attr($meta['id']).''.esc_attr($option['id']).'" id="'.esc_attr($meta['id']).'-'.esc_attr($option['id']).'" style="display: none;" class="builder'.esc_attr($option['id']).' theval '.esc_attr($sendVal).'" data-default="'.$value.'">';
										foreach ($option['option'] as $var) {
											$hiding = 'data-hiding=""';
											if (isset($var['hiding'])) { $hiding = 'data-hiding="'.$var['hiding'].'"'; }
											echo '<option value="'.esc_attr($var['value']).'" '.$hiding.'> '.$var['name'].'</option>';
										}			  
										echo '</select>';
										
										echo '<ul class="sr-clearfix">';
										foreach ($option['option'] as $var) {
											echo '<li data-rel="'.$var['value'].'"><img src="'.esc_url(plugins_url( '/img/'.$var['img'], __FILE__ )).'" /></li>';
										}
										echo '</ul>';
										
							echo '</div>';		
						echo '</div>';
					echo '</div>'; 
				break;
				
				
				// medias  
				case 'medias':
					echo '<div class="option '.esc_attr($formDisable).' clear">';
						echo '<div class="option-inner">';
							echo '	<div class="option_name">
										<label for="'.esc_attr($option['id']).'">'.$option['label'].'</label>
										<div class="option_desc"><i>'.$option['desc'].'</i></div>
									</div>';
							echo '	<div class="option_value">';
								
								echo '<div id="sortable'.esc_attr($option['id']).'" class="sortable-list">';
								echo '<textarea name="builder-'.esc_attr($meta['id']).''.esc_attr($option['id']).'" id="'.esc_attr($meta['id']).'-'.esc_attr($option['id']).'" class="builder'.esc_attr($option['id']).' theval '.esc_attr($sendVal).' sortable-value pb-medias" style="display:none;">'.$value.'</textarea>';
								echo '<ul id="sortable-'.esc_attr($option['id']).'" class="sortable-container sortable-media clear">';
								echo '</ul>';
								echo '<a class="add-to-sortable-media add-sortable-button sr-button" data-type="image">'.esc_html__('Add Image','kona').'</a>';		
								echo '</div>';
								
							echo '</div>';
						echo '</div>';
					echo '</div>';
				break;
					
					
				// medias-option  
				case 'medias-option':
					echo '<div class="option '.esc_attr($formDisable).' clear">';
						echo '<div class="option-inner">';
							echo '	<div class="option_name">
										<label for="'.esc_attr($option['id']).'">'.$option['label'].'</label>
										<div class="option_desc"><i>'.$option['desc'].'</i></div>
									</div>';
							echo '	<div class="option_value">';
								
								echo '<div id="sortable'.esc_attr($option['id']).'" class="sortable-list">';
								echo '<textarea name="builder-'.esc_attr($meta['id']).''.esc_attr($option['id']).'" id="'.esc_attr($meta['id']).'-'.esc_attr($option['id']).'" class="builder'.esc_attr($option['id']).' theval '.esc_attr($sendVal).' sortable-value pb-medias" style="display:none;">'.$value.'</textarea>';
								echo '<ul id="sortable-'.esc_attr($option['id']).'" class="sortable-container sortable-media sortable-media-options clear">';
								echo '</ul>';
								echo '<a class="add-to-sortable-media-options add-sortable-button sr-button" data-type="image" data-options="'.$option['option'].'">'.esc_html__('Add Image','kona').'</a>';		
								echo '</div>';
								
							echo '</div>';
						echo '</div>';
					echo '</div>';
				break;
				
				
				// category
				case 'category':
					echo '<div class="option '.esc_attr($formDisable).' clear">';
						echo '<div class="option-inner">';
							echo '	<div class="option_name">
										<label for="'.esc_attr($option['id']).'">'.$option['label'].'</label>
										<div class="option_desc"><i>'.$option['desc'].'</i></div>
									</div>';
									
							echo '	<div class="option_value">';
								echo '<select name="builder-'.esc_attr($meta['id']).''.esc_attr($option['id']).'" id="'.esc_attr($meta['id']).'-'.esc_attr($option['id']).'" class="builder'.esc_attr($option['id']).' theval '.esc_attr($sendVal).' pb-multiple" data-default="'.$value.'" size="5" multiple>';
								
								if ($option['option'] == 'portfolio') { $term = 'portfolio_category'; } 
								else if ($option['option'] == 'product') { $term = 'product_cat'; }
								else { $term = 'category'; }
								//$categories = get_terms($term);
								$categories = get_terms(array('taxonomy' => $term, 'parent' => 0 ));
								foreach ($categories as $cat) {
									echo '<option value="'.esc_attr($cat->term_id).'">'.esc_html($cat->name).'</option>';
									
									$catChildren = get_term_children( $cat->term_id, $term );
									foreach ( $catChildren as $child ) {
										$c = get_term_by( 'id', $child, $term );
										echo '<option value="'.esc_attr($c->term_id).'"> - '.esc_html($c->name).'</option>';
										
										$catChildren2nd = get_term_children( $c->term_id, $term );
										foreach ( $catChildren2nd as $child2nd ) {
											$c2nd = get_term_by( 'id', $child2nd, $term );
											echo '<option value="'.esc_attr($c2nd->term_id).'">&nbsp;&nbsp;&nbsp;- '.esc_html($c2nd->name).'</option>';
											
											$catChildren3rd = get_term_children( $c2nd->term_id, $term );
											foreach ( $catChildren3rd as $child3rd ) {
												$c3rd = get_term_by( 'id', $child3rd, $term );
												echo '<option value="'.esc_attr($c3rd->term_id).'">&nbsp;&nbsp;&nbsp;- '.esc_html($c3rd->name).'</option>';
											}
										}
									}
								}
								echo '</select>';   
							echo '	</div>';	
						echo '</div>';
					echo '</div>';
				break;
					
				// pages
				case 'pages':
					echo '<div class="option '.esc_attr($formDisable).' clear">';
						echo '<div class="option-inner">';
							echo '	<div class="option_name">
										<label for="'.esc_attr($option['id']).'">'.$option['label'].'</label>
										<div class="option_desc"><i>'.$option['desc'].'</i></div>
									</div>';
									
							echo '	<div class="option_value">';
								echo '<select name="builder-'.esc_attr($meta['id']).''.esc_attr($option['id']).'" id="'.esc_attr($meta['id']).'-'.esc_attr($option['id']).'" class="builder'.esc_attr($option['id']).' theval '.esc_attr($sendVal).' pb-multiple" data-default="'.$value.'" size="5" multiple>';
								
								if ($option['option'] == 'portfolio') { $pages = get_posts(array('post_type' => 'portfolio', 'posts_per_page'=> -1)); } 
								if ($option['option'] == 'product') { $pages = get_posts(array('post_type' => 'product', 'posts_per_page'=> -1, 'orderby'=> "title", 'order'=> "ASC")); } 
								if ($option['option'] == 'post') { $pages = get_posts(array('post_type' => 'post', 'posts_per_page'=> -1)); } 
								if ($option['option'] == 'page') { $pages = get_posts(array('post_type' => 'page', 'posts_per_page'=> -1)); } 
								foreach ($pages as $p) {
									$add = '';
									if ($option['option'] == 'product') { $add= '('.$p->ID.')'; }
									echo '<option value="'.$p->ID.'">'.$p->post_title.' '.$add.'</option>';
								}
								echo '</select>';   
							echo '	</div>';	
						echo '</div>';
					echo '</div>';
				break;
									
			} // END switch
		} // END foreach create fields
			
		echo '
			<div class="pagebuilder-insert">
				<a href="'.esc_attr($meta['id']).'" id="insertbuilder_'.esc_attr($meta['id']).'" class="sr-builder-insert sr-button">'.esc_html__("Add Element", 'kona').'</a>
				<a href="'.esc_attr($meta['id']).'" id="editbuilder_'.esc_attr($meta['id']).'" class="sr-builder-edit sr-button">'.esc_html__("Edit Element", 'kona').'</a>
			</div>'; // END op-content
			
		echo '</div></div>';		
		echo '</div>';
	
	} // END foreach ($pagebuildermeta as $meta) {
	
	// 		********
	
	//		Pagebuilder POPUP ($kona_meta_pagebuilder)
	
	// 		********	
	
		
			
	echo '<div class="note-bottom"><i><strong>Note</strong>: Revisions does not work for the pagebuilder</i></div>';
	echo '</div>'; // END #sr-pagebuilder
	
	
	
	
	
	
	
	
}




/*-----------------------------------------------------------------------------------*/
/*	Save Datas
/*-----------------------------------------------------------------------------------*/
add_action( 'save_post', 'kona_pagebuilder_save_postdata' );
function kona_pagebuilder_save_postdata( $post_id ) {
	
	// verify nonce  
    if (!isset($_POST['meta_pagebuilder_nonce']) || !wp_verify_nonce($_POST['meta_pagebuilder_nonce'], basename(__FILE__))) 
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
	
	
	// check if restore
	if (isset($_POST['sr-pagebuilder-restore']) && $_POST['sr-pagebuilder-restore'] == 'true') {
		
		// restore the main fields
		update_post_meta($post_id, '_sr_pagebuilder', get_post_meta($post_id, '_sr_pagebuilder_backup_one', true));
		update_post_meta($post_id, '_sr_pagebuilder_json',$_POST['_sr_pagebuilder_json_backup_one']);
		update_post_meta($post_id, '_sr_pagebuilder_active', 'yes');
		
	} else {
	
		$saveFields = array('_sr_pagebuilder','_sr_pagebuilder_json','_sr_pagebuilder_backup_one','_sr_pagebuilder_json_backup_one','_sr_pagebuilder_json_export','_sr_pagebuilder_active');
		// loop through fields and save the data  
		foreach ($saveFields as $field) {  
			$old = get_post_meta($post_id, $field, true);  
			$new = $_POST[$field];
			
			// NEW 2018 for export/import bug (don't forget to add the _export field in the array above )
			if ($field == '_sr_pagebuilder_json_export') {
				$new = str_replace('\\\"', "|~|", $_POST['_sr_pagebuilder_json']);	
			} 
			// NEW 2018 for export/import bug
			
			if ('' == $new && $old) {  
				delete_post_meta($post_id, $field);  
			} else if ($new !== $old) {  
				update_post_meta($post_id, $field, $new);  
			}  
		} // end foreach
	
	}

}


/*-----------------------------------------------------------------------------------*/
/*	Register and load function javascript
/*-----------------------------------------------------------------------------------*/
if( !function_exists( 'kona_pagebuilder_scripts' ) ) {
    function kona_pagebuilder_scripts($hook) {
		global $kona_core_version; 
		
		if (get_post_type() !== 'post') {
				
		wp_register_script('pagebuilder-script', plugins_url( '/js/pagebuilder.js', __FILE__ ), '', $kona_core_version,true);
		wp_enqueue_script('pagebuilder-script');
		
		wp_register_style('pagebuilder-style', plugins_url( '/css/pagebuilder.css', __FILE__ ), '', $kona_core_version);
		wp_enqueue_style('pagebuilder-style');
		
		}
    }
    add_action('admin_enqueue_scripts','kona_pagebuilder_scripts',10,1);
}


/*-----------------------------------------------------------------------------------*/
/*	Ajax Gutenberg 
/*-----------------------------------------------------------------------------------*/
add_action('wp_ajax_gutenberg_sr_pagebuilder', 'gutenberg_sr_pagebuilder_function');
function gutenberg_sr_pagebuilder_function(){
	$my_post = array(
		'ID'           => $_POST['postid'],
		'post_content' => $_POST['postcontent']
	);
	wp_update_post( $my_post );
    exit();
}

?>