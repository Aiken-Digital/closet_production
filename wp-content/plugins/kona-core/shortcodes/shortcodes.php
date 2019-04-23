<?php

/*-----------------------------------------------------------------------------------*/
/*	Shortcodes for Buttons
/*-----------------------------------------------------------------------------------*/
function kona_button( $atts, $content = null )
{
	extract( shortcode_atts( array(
      'type' => 'text',
      'style' => 'style-1',
      'size' => 'medium-button',
      'trans' => 'no',
      'pos' => 'right',
      'icon' => 'fa',
      'open' => 'url',
	  'url' => '',
      'target' => '_self',
	  'page' => '',
	  'portfolio' => '',
	  'image' => '',
	  'videoid' => '',
	  'selfhosted' => ''
      ), $atts ) );
	
	
	$href = '';
	$buttonAdd =	 '';	
	if ($open == 'url') { 
		$href = $url;
		$buttonAdd = 'target="'.esc_attr($target).'"';
	} else if ($open == 'page') {
		$href = get_permalink($page); 
	} else if ($open == 'portfolio') {
		$href = get_permalink($portfolio); 
	} else if ($open == 'image') {
		$href = $image; 
		$buttonAdd = 'data-rel="lightcase"';
	} else if ($open == 'youtube') {
		$href = '//www.youtube.com/embed/'.$videoid.'?autoplay=1'; 
		$buttonAdd = 'data-rel="lightcase"';
	} else if ($open == 'vimeo') {
		$href = '//player.vimeo.com/video/'.$videoid.'?autoplay=1'; 
		$buttonAdd = 'data-rel="lightcase"';
	} else if ($open == 'selfhosted') {
		$href = $selfhosted; 
		$buttonAdd = 'data-rel="lightcase"';
	}
	
	$addClass = 'sr-button';
	if ($type == 'icon') { $addClass .= ' withicon'; }
	if ($type == 'arrow') { $addClass .= ' withicon'; }
	if ($trans == 'yes') { $addClass .= ' text-trans'; }
	
	$iconReturn = '';
	if ($icon[0] == 'i') { 
		$iconReturn = '<i class="ion '.esc_attr($icon).'"></i>';	
	}  else {
		$iconReturn = '<i class="fa '.esc_attr($icon).'"></i>';	
	}
	
	
	$textContent = '';
	if ($content) {
		$textContent = '<span class="text">
			<span>'.preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content)).'</span>
			<span>'.preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content)).'</span>
		</span>';
	}
	
	$iconContent = '';
	if ($type == 'arrow') {
		$iconContent = '<span class="icon">
			<span class="arrow">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 13.2 9">
				<path d="M13.1,4.4c0-0.2-0.1-0.4-0.2-0.5c0,0,0,0,0,0L9.1,0.2c-0.3-0.3-0.7-0.3-1,0c-0.3,0.3-0.3,0.7,0,1l2.6,2.6H0.7
					c-0.4,0-0.7,0.3-0.7,0.7c0,0.4,0.3,0.7,0.7,0.7h10L8.2,7.8c-0.3,0.3-0.3,0.7,0,1c0.3,0.3,0.7,0.3,1,0L12.9,5c0,0,0,0,0,0
					C13,4.9,13,4.8,13.1,4.8c0,0,0,0,0,0C13.1,4.6,13.1,4.5,13.1,4.4z"/>
				</svg>
			</span>
		</span>';
	} else if ($type == 'icon') {
		$iconContent = '<span class="icon">'.$iconReturn.'</span>';
	}
	
	$theContent = $textContent.$iconContent;
	if ($pos == 'left') { $theContent = $iconContent.$textContent; }
	
	return '<a href="'.esc_url($href).'" class="'.esc_attr($addClass).' '.esc_attr($style).' button-'.esc_attr($size).'" '.$buttonAdd.'>'.$theContent.'</a>';	
		
	
}
add_shortcode('sr-button', 'kona_button');





/*-----------------------------------------------------------------------------------*/
/*	Shortcodes for Icons
/*-----------------------------------------------------------------------------------*/
function kona_iconfont( $atts, $content = null )
{
	extract( shortcode_atts( array(
      'type' => '',
      'size' => 'normal',
      'color' => ''
      ), $atts ) );
	
	$iconcolor = '';
	if ($color && $color !== '') { 
		$iconcolor = 'style="color:'.esc_attr($color).';"';
	}
	
	if ($type[0] == 'i') { 
		return '<i class="ion '.esc_attr($type).' ion-'.esc_attr($size).'" '.$iconcolor.'></i>';	
	}  else {
		return '<i class="fa '.esc_attr($type).' fa-'.esc_attr($size).'" '.$iconcolor.'></i>';	
	}
		
}
add_shortcode('iconfont', 'kona_iconfont');





/*-----------------------------------------------------------------------------------*/
/*	Shortcodes for Skills
/*-----------------------------------------------------------------------------------*/
function kona_skill( $atts, $content = null )
{
	extract( shortcode_atts( array(
      'amount' => '55',
	  'name' => 'Skillname',
	  'color' => '#0d0d0d'
      ), $atts ) );
	
	$skill_slug = preg_replace('/[^a-z]/', "", strtolower($name));
	
	if ($color) { $skillcolor = 'background:'.esc_attr($color); } else { $skillcolor = '';  }
		
	return '<div class="skill">
				<h6 class="skill-name title-alt">'.esc_html($name).'</h6>
				<div class="skill-bar"><div class="skill-active '.esc_attr($skill_slug).'" style="'.$skillcolor.'" data-perc="'.esc_attr($amount).'">
				<span class="tooltip">'.esc_html($amount).'%</span></div></div>
			</div>';	
}
add_shortcode('skill', 'kona_skill');




/*-----------------------------------------------------------------------------------*/
/*	Shortcodes for Tabs
/*-----------------------------------------------------------------------------------*/
function kona_tabs( $atts, $content = null )
{
	extract( shortcode_atts( array(
      'style' => 'standard',
      'title' => ''
      ), $atts ) );
	
	$return = '<div class="sr-tabs tabs-'.esc_attr($style).'"><ul class="tab-nav clearfix">';
	
	$title = substr($title, 0, -1);
	$title = explode(',', $title);
	$i = 1;
	foreach ($title as $t) {
		if ($i == 1) { $addclass = 'class="active"'; } else { $addclass = ''; }
		$return .= '<li '.$addclass.'><h6 class="tab-name title-alt"><a href="tabid'.esc_attr($i).'">'.esc_html($t).'</a></h6></li>';	
		$i++;
	}
	
	$return .= '</ul><div class="tab-container clearfix">'.do_shortcode($content).'</div></div>';
	
	return $return;	
}
add_shortcode('tabs', 'kona_tabs');


function kona_tab( $atts, $content = null )
{	
	extract( shortcode_atts( array(
      'id' => ''
      ), $atts ) );
	
	if ($id == 1) { $addclass = 'active'; } else { $addclass = ''; }
	return '<div class="tab-content tabid'.esc_attr($id).' '.esc_attr($addclass).'">' . preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content)) . '</div>';	
}
add_shortcode('tab', 'kona_tab');






/*-----------------------------------------------------------------------------------*/
/*	Shortcodes for Toggles
/*-----------------------------------------------------------------------------------*/
function kona_toggle( $atts, $content = null )
{
	extract( shortcode_atts( array(
      'title' => 'Toggle',
      'open' => 'no'
      ), $atts ) );
			
	if ($open == 'yes') { $toggleopen = 'toggle-active'; } else { $toggleopen = ''; }
	
	return '<div class="toggle-item">
				<div class="toggle-title '.esc_attr($toggleopen).'">
					<h6 class="toggle-name">' . esc_html($title) . '</h6>
					<span class="plus">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 8.8 8.9">
						<path d="M8.3,3.8H5.2V0.7C5.2,0.3,4.8,0,4.5,0h0C4.1,0,3.8,0.3,3.8,0.7v3.1H0.7C0.3,3.8,0,4.1,0,4.5v0
							c0,0.4,0.3,0.7,0.7,0.7h3.1v3.1c0,0.4,0.3,0.7,0.7,0.7h0c0.4,0,0.7-0.3,0.7-0.7V5.2h3.1c0.4,0,0.7-0.3,0.7-0.7v0
							C8.9,4.1,8.6,3.8,8.3,3.8z"/>
						</svg>
					</span>
					<span class="minus">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 8.9 9">
						<path d="M8.3,5.2H0.7C0.3,5.2,0,4.8,0,4.5l0,0c0-0.4,0.3-0.7,0.7-0.7h7.6c0.4,0,0.7,0.3,0.7,0.7v0 C8.9,4.8,8.6,5.2,8.3,5.2z"/>
						</svg>
					</span>
				</div>
				<div class="toggle-inner">'.do_shortcode($content).'</div>
			</div>';
}
add_shortcode('toggle', 'kona_toggle');






/*-----------------------------------------------------------------------------------*/
/*	Shortcodes for Accordion
/*-----------------------------------------------------------------------------------*/
function kona_accordion( $atts, $content = null )
{
	extract( shortcode_atts( array(
      'title' => 'Toggle',
      'open' => 'no'
      ), $atts ) );
			
	if ($open == 'yes') { $toggleopen = 'toggle-active'; } else { $toggleopen = ''; }
	
	return '	<div class="toggle-item">
				<div class="toggle-title '.esc_attr($toggleopen).'">
					<h6 class="toggle-name">' . esc_html($title) . '</h6>
					<span class="plus">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 8.8 8.9">
						<path d="M8.3,3.8H5.2V0.7C5.2,0.3,4.8,0,4.5,0h0C4.1,0,3.8,0.3,3.8,0.7v3.1H0.7C0.3,3.8,0,4.1,0,4.5v0
							c0,0.4,0.3,0.7,0.7,0.7h3.1v3.1c0,0.4,0.3,0.7,0.7,0.7h0c0.4,0,0.7-0.3,0.7-0.7V5.2h3.1c0.4,0,0.7-0.3,0.7-0.7v0
							C8.9,4.1,8.6,3.8,8.3,3.8z"/>
						</svg>
					</span>
					<span class="minus">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 8.9 9">
						<path d="M8.3,5.2H0.7C0.3,5.2,0,4.8,0,4.5l0,0c0-0.4,0.3-0.7,0.7-0.7h7.6c0.4,0,0.7,0.3,0.7,0.7v0 C8.9,4.8,8.6,5.2,8.3,5.2z"/>
						</svg>
					</span>
				</div>
				<div class="toggle-inner">' . preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content)) . '</div>
			</div>';		
}
add_shortcode('accordion', 'kona_accordion');


function kona_accordiongroup( $atts, $content = null )
{	
	return '<div class="accordion">' . preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content)) . '</div>';	
}
add_shortcode('accordiongroup', 'kona_accordiongroup');




/*-----------------------------------------------------------------------------------*/
/*	Shortcodes for Content Slider
/*-----------------------------------------------------------------------------------*/
function kona_slide( $atts, $content = null )
{
	return '	<div>'.preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content)).'</div>';		
}
add_shortcode('sr-slide', 'kona_slide');


function kona_contentslider( $atts, $content = null )
{	
	return '<div class="owl-slider content-slider">' . preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content)) . '</div>';	
}
add_shortcode('sr-contentslider', 'kona_contentslider');





/*-----------------------------------------------------------------------------------*/
/*	Shortcodes for Social Networks (from Theme options)
/*-----------------------------------------------------------------------------------*/
function kona_social( $atts, $content = null )
{
	extract( shortcode_atts( array(
      'style' => 'normal',
      'list' => 'normal',
      'align' => 'left'
	  ), $atts ) );
	
	
	$socials = array('facebook','twitter','googleplus','vimeo','instagram','dribbble','youtube','deviantart','behance','flickr','linkedin','rss','pinterest','xing','dropbox','stumbleupon','delicious','soundcloud','spotify','codepen','github','lastfm','jsfiddle','mixcloud','skype','wechat','vk','mail');
	
	$return = '<ul class="socialmedia-widget '.esc_attr($style).'-style '.esc_attr($list).' align-'.esc_attr($align).'">';
	foreach($socials as $s) {
		$linkName = '';
		if ($style == 'text') {
			$linkName = 	ucfirst($s);
			if ($s == 'googleplus') { $linkName = 'Google'; }
		}
		if (get_option('_sr_social_'.$s)) { $return .= '<li class="'.$s.'"><a href="'.esc_url(get_option('_sr_social_'.$s)).'" target="_blank">'.$linkName.'</a></li>'; }
	}
	$return .= '</ul>';
	
	return $return;
	
}
add_shortcode('sr-social', 'kona_social');



/*-----------------------------------------------------------------------------------*/
/*	Shortcodes for Share
/*-----------------------------------------------------------------------------------*/
function share_sc( $atts, $content = null )
{
	
	extract( shortcode_atts( array(
      'title' => 'Share',
      'align' => 'left',
      'style' => ''
      ), $atts ) );
	
	return kona_Share(get_post_type(),$title,$align,$style);
}
add_shortcode('kona-share', 'share_sc');



/*-----------------------------------------------------------------------------------*/
/*	Shortcodes for Subtitle
/*-----------------------------------------------------------------------------------*/
function kona_subtitle( $atts, $content = null )
{	
	extract( shortcode_atts( array(
      'size' => 'h4',
      'alignment' => 'center',
      'uppercase' => '0'
      ), $atts ) );	
	  
	
	if ($uppercase) { $addClass = ' uppercase'; } else { $addClass = ''; }  
	$return =   '<'.$size.' class="title-alt align-'.esc_attr($alignment).' '.esc_attr($addClass).'">'.preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content)).'</'.$size.'>';
	return $return;	
}
add_shortcode('sr-subtitle', 'kona_subtitle');



/*-----------------------------------------------------------------------------------*/
/*	Shortcodes for Inline Video
/*-----------------------------------------------------------------------------------*/
function kona_video( $atts, $content = null )
{
	extract( shortcode_atts( array(
      'type' => '',
      'image' => '',
      'video' => '',
      'id' => '',
      'button' => 'Play'
      ), $atts ) );
	
	$imageId = kona_get_attachment_id_from_src($image);
	$imageFull = wp_get_attachment_image_src ($imageId,'full');
	$image1680 = wp_get_attachment_image_src ($imageId,'kona-thumb-ultra');
	$image1280 = wp_get_attachment_image_src ($imageId,'kona-thumb-big');
	$image640 = wp_get_attachment_image_src ($imageId,'kona-thumb-medium');
	
	
	$imgsrc = 'src="'.esc_url($image640[0]).'"';
	$imgsrcset = array();
	$imgsrcset[] = esc_url($imageFull[0]).' '.esc_attr($imageFull[1]).'w';
	$imgsrcset[] = esc_url($image1680[0]).' '.esc_attr($image1680[1]).'w';
	$imgsrcset[] = esc_url($image1280[0]).' '.esc_attr($image1280[1]).'w';
	$imgsrcset[] = esc_url($image640[0]).' '.esc_attr($image640[1]).'w';
	$imgsizes = 'sizes="(max-width: '.esc_attr($imageFull[1]).'px) 100vw, '.esc_attr($imageFull[1]).'px"';
	$imgWidthHeight = 'width="'.esc_attr($imageFull[1]).'" height="'.esc_attr($imageFull[2]).'"';
	
	$imgsrcsetReturn = '';
	if ($imgsrcset) $imgsrcsetReturn = 'srcset="'.implode(",", $imgsrcset).'"';
	
	if ($type == 'inline') {
		return '<div class="inline-video" data-type="'.esc_attr($video).'" data-videoid="'.esc_attr($id).'" data-button="'.esc_html($button).'">
					<img '.$imgsrc.' '.$imgsrcsetReturn.' '.$imgsizes.' '.$imgWidthHeight.' alt="'.esc_html(get_the_title(get_post_thumbnail_id($imageId))).'">
				</div>';	
	}
	
	else if ($type == 'lightbox') {
		$href = "";
		if ($video == 'youtube') {
			$href = '//www.youtube.com/embed/'.$id; 
		} else if ($video == 'vimeo') {
			$href = '//player.vimeo.com/video/'.$id; 
		}
		return '<a class="inline-lightcase" data-rel="lightcase" href="'.esc_html($href).'" data-button="'.esc_html($button).'">
					<img '.$imgsrc.' '.$imgsrcsetReturn.' '.$imgsizes.' '.$imgWidthHeight.' alt="'.esc_html(get_the_title(get_post_thumbnail_id($imageId))).'">
				</a>';	
	}
	
}
add_shortcode('sr-video', 'kona_video');


/*-----------------------------------------------------------------------------------*/
/*	Shortcodes for Alert
/*-----------------------------------------------------------------------------------*/
function kona_alert( $atts, $content = null )
{	
	extract( shortcode_atts( array(
      'type' => 'info',
      'title' => ''
      ), $atts ) );	
	  
	
	return '<div class="alert-'.esc_attr($type).'">
            	<h5 class="title-alt alert-title"><strong>'.esc_html($title).'</strong></h5>
                '.preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content)).'
            </div>';	
}
add_shortcode('sr-alert', 'kona_alert');




/*-----------------------------------------------------------------------------------

	Custom WooCommerce SHortcodes

-----------------------------------------------------------------------------------*/
function sr_productprice( $atts, $content = null )
{	
	extract( shortcode_atts( array(
      'id' => ''
      ), $atts ) );	
	
	if (is_product()) {
		global $product;
		$price = apply_filters( 'woocommerce_variable_price_html', $product->get_price_suffix(), $product );
	} else {
		$product = wc_get_product( $id );
		$price = apply_filters( 'woocommerce_variable_price_html', $product->get_price_suffix(), $product );
	}
	
	if (!$price && $price == '') { $price = $product->get_price_html(); }
	
	return '<div class="price sr-price">'.$price.'</div>';	
}
add_shortcode('sr-product-price', 'sr_productprice');



/*-----------------------------------------------------------------------------------*/
/*	Wordpress Bugfix for shortcodes (paragraph issue)
/*-----------------------------------------------------------------------------------*/
add_filter("the_content", "kona_the_content_filter");
function kona_the_content_filter($content) {
 
	// array of custom shortcodes requiring the fix
	$block = join("|",array(	"accordiongroup",
								"accordion",
								"counter",
								"field",
								"tabs",
								"tab",
								"sr-subtitle",
								"toggle",
								"skill",
								"sr-social",
								"sr-contactform",
								"sr-video",
								"kona-share",
								"sr-contentslider",
								"sr-slide",
								"sr-product-price",
							
								"contact-form-7"
								));
	 
	// opening tag
	$rep = preg_replace("/(<p>)?\[($block)(\s[^\]]+)?\](<\/p>|<br \/>)?/","[$2$3]",$content);
	// closing tag
	$rep = preg_replace("/(<p>)?\[\/($block)](<\/p>|<br \/>)?/","[/$2]",$rep);
	return $rep;
 
}


/*-----------------------------------------------------------------------------------*/
/*	Register Buttons
/*-----------------------------------------------------------------------------------*/
function kona_init_buttons() {
	// If user has permission
	if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
		return;
	 
	// Add only in Rich Editor mode
	if ( get_user_option('rich_editing') == 'true') {
		add_filter("mce_external_plugins", "kona_add_buttons_plugin");
		add_filter('mce_buttons', 'kona_register_buttons');
	}
}
add_action('init', 'kona_init_buttons');

function kona_add_buttons_plugin($plugin_array) {
   	$plugin_array['popupbutton'] = plugins_url( '/tinymcepopup.js', __FILE__ );
	return $plugin_array;
}

function kona_register_buttons($buttons) {
	array_push( $buttons, "popup" );
	return $buttons;
}


?>