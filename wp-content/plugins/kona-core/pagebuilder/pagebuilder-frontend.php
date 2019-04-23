<?php

/*-----------------------------------------------------------------------------------*/
/*	Fullwidth / Background Section Shortcode
/*-----------------------------------------------------------------------------------*/
function kona_fullwidthsection( $atts, $content = null ) {
	extract( shortcode_atts( array(
      'force' => '0',
      'background' => '0',
      'colorbg' => '',
      'imagebg' => '',
      'imagetype' => 'parallax',
      'selfhostedmp4' => '',
      'selfhostedwebm' => '',
      'selfhostedogv' => '',
      'youtubeid' => '',
      'vimeoid' => '',
      'videoratio' => '16/9',
      'videoloop' => '1',
      'videomute' => '1',
      'videoplaypause' => '0',
      'videoposter' => '',
      'videooverlaycolor' => '',
      'videooverlayopacity' => '',
      'textcolor' => 'text-dark',
      'pdtop' => '100px',
      'pdbottom' => '100px',
      'class' => '',
      'id' => '',
		
	  'paddingtop' => '0px',
      'paddingtoptablet' => '0px',
      'paddingtopphone' => '0px',
      'paddingbottom' => '0px',
      'paddingbottomtablet' => '0px',
      'paddingbottomphone' => '0px',
      ), $atts ) );
	
	static $fId = 1;
	
	if ($paddingtop == '0px' && $paddingbottom == '0px' &&
	    $paddingtoptablet == '0px' && $paddingbottomtablet == '0px' &&
	    $paddingtopphone == '0px' && $paddingbottomphone == '0px') { } else {
		
		$paddingCss = "
						.section".$fId." .fullwidth-content { 
						padding-top:".$paddingtop."; padding-bottom:".$paddingbottom."; 
						}

						@media (max-width: 1024px) {
						.section".$fId." .fullwidth-content { 
						padding-top:".$paddingtoptablet."; padding-bottom:".$paddingbottomtablet."; 
						}
						}

						@media (max-width: 680px) {
						.section".$fId." .fullwidth-content { 
						padding-top:".$paddingtopphone."; padding-bottom:".$paddingbottomphone."; 
						}
						}

						";

		wp_register_style( 'kona_section-inline-style', false );
		wp_enqueue_style( 'kona_section-inline-style' );
		wp_add_inline_style( 'kona_section-inline-style', $paddingCss );
	}
	
	
	$return = '';
	$sectionClass = '';  
	$sectionID = '';
	if ($background !== '0' && $background) {
	
		if ($background == 'color') {
			$sectionAdd = 'style="background-color:'.esc_attr($colorbg).'"';	
			$sectionClass = $textcolor;
		} else if ($background == 'image') {
			if ($imagetype == 'normal') {
				$sectionClass = $textcolor;
				$sectionAdd = 'style="background:url('.esc_url($imagebg).') center center;background-size:cover;"';	
			} else if ($imagetype == 'parallax') {
				$sectionClass = 'parallax-section '.$textcolor;
				$sectionAdd = 'data-parallax-image="'.esc_url($imagebg).'"';	
			} else if ($imagetype == 'pattern') {
				if (strpos($imagebg, '@2x') !== false) {
					$imageInfo = wp_get_attachment_image_src( kona_get_attachment_id_from_src($imagebg), 'full' );	
					$w = $imageInfo[1]/2;
					$h = $imageInfo[2]/2;
					$styleAdd = "-webkit-background-size:".$w."px ".$h."px; -moz-background-size:".$w."px ".$h."px; -o-background-size:".$w."px ".$h."px; background-size:".$w."px ".$h."px;";
				} else { $styleAdd = ""; }
				$sectionClass = $textcolor;
				$sectionAdd = 'style="background:url('.esc_url($imagebg).') center center;'.$styleAdd.'"';	
				
			}
		} else if ($background == 'selfhosted' || $background == 'youtube' || $background == 'vimeo') {
			if ($background == 'selfhosted') {
				$sectionAdd = '	data-phattype="html5" 
								data-phatmp4="'.esc_attr($selfhostedmp4).'" 
								data-phatwebm="'.esc_attr($selfhostedwebm).'" 
								data-phatogv="'.esc_attr($selfhostedogv).'"';	
			} else if ($background == 'youtube') {
				$sectionAdd = '	data-phattype="youtube" 
								data-phatvideoid="'.esc_attr($youtubeid).'"' ;
			} else if ($background == 'vimeo') {
				$sectionAdd = '	data-phattype="vimeo" 
								data-phatvideoid="'.esc_attr($vimeoid).'"' ;
			}
			
			if (!$videoloop) { $loop = "false"; } else {$loop = "true"; }
			if ($videomute) { $mute = "false"; } else {$mute = "true"; }
			if ($videoplaypause) { $playpause = "true"; } else {$playpause = "false"; }
			if ($videooverlaycolor == '') { $videooverlaycolor = "#ffffff"; $videooverlayopacity = 0; }
			
			$sectionClass = 'videobg-section '.$textcolor;
			$sectionAdd .= '	data-phatratio="'.esc_attr($videoratio).'"
							data-phatposter="'.esc_attr($videoposter).'"
							data-phatloop="'.esc_attr($loop).'"
							data-phatmute="'.esc_attr($mute).'"
							data-phatplaypause="'.esc_attr($playpause).'"
							data-phatoverlaycolor="'.esc_attr($videooverlaycolor).'"
							data-phatoverlayopacity="'.esc_attr($videooverlayopacity).'"';
		}
	}
	
	$sectionClass .= ' section'.$fId;
	if ($class) { $sectionClass .= ' '.$class; }
	if ($force) { $sectionClass .= ' forcefullwidth'; }
	if ($id) { $sectionID = 'id="'.esc_attr($id).'"'; }
	$return .= '<div '.$sectionID.' class="fullwidth-section '.esc_attr($sectionClass).'" '.$sectionAdd.'>';		
	$return .= '<div class="fullwidth-content">';
	$return .= preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content));
	$return .= '</div>';	
	$return .= '</div>';	
	
	$fId++;
	return $return;
}
add_shortcode('fullwidthsection', 'kona_fullwidthsection');


/*-----------------------------------------------------------------------------------*/
/*	Column Row Shortcode
/*-----------------------------------------------------------------------------------*/
function kona_columnsection( $atts, $content = null ) {
	extract( shortcode_atts( array(
      'wrapper' => 'wrapper',
      'layout' => '',
      'swap' => '0',
      'spacing' => 'spaced-normal',
      'animation' => 'no-anim',
      'colalign' => 'top',
      'adapt' => 'adapt-disable',
      'class' => '',
      'id' => ''
      ), $atts ) );
	
	$cols = explode(';',$layout);
	if ($colalign) { $class .= " col-align-".$colalign; }
	if ($swap && count($cols) == 2) { $class .= " swap-mobile"; }
	$return = '<div class="'.esc_attr($wrapper).'">';	
	$sectionID = '';
	if ($id) { $sectionID = 'id="'.esc_attr($id).'"'; }
   	$return .= '<div '.$sectionID.' class="column-section clearfix '.esc_attr($spacing).' '.esc_attr($class).' '.esc_attr($animation).'">'.preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content)).'</div>';
	$return .= '</div>';	
	
	return $return;
}
add_shortcode('columnsection', 'kona_columnsection');


function kona_col( $atts, $content = null ) {
	extract( shortcode_atts( array(
      'size' => 'one-full',
      'last' => '',
	  'background' => '0',
      'colorbg' => '',
      'imagebg' => '',
      'imagetype' => 'parallax',
      'roundedcorner' => '0',
      'textcolor' => 'text-dark',
      'animation' => 'no-anim',
      'class' => '',
      'id' => '',
		
      'paddingleft' => '0px',
      'paddinglefttablet' => '0px',
      'paddingleftphone' => '0px',
      'paddingright' => '0px',
      'paddingrighttablet' => '0px',
      'paddingrightphone' => '0px',
      'paddingtop' => '0px',
      'paddingtoptablet' => '0px',
      'paddingtopphone' => '0px',
      'paddingbottom' => '0px',
      'paddingbottomtablet' => '0px',
      'paddingbottomphone' => '0px',
      ), $atts ) );
	
	static $cId = 1;
	  
	$styleAdd = '';	 
    
	
	if ($paddingleft == '0px' && $paddingright == '0px' && $paddingtop == '0px' && $paddingbottom == '0px' &&
	    $paddinglefttablet == '0px' && $paddingrighttablet == '0px' && $paddingtoptablet == '0px' && $paddingbottomtablet == '0px' &&
	    $paddingleftphone == '0px' && $paddingrightphone == '0px' && $paddingtopphone == '0px' && $paddingbottomphone == '0px') { } else {
		
		$paddingCss = "
						.col".$cId." { 
						padding-left:".$paddingleft."; padding-right:".$paddingright."; 
						padding-top:".$paddingtop."; padding-bottom:".$paddingbottom."; 
						}

						@media (max-width: 1024px) {
						.col".$cId." { 
						padding-left:".$paddinglefttablet."; padding-right:".$paddingrighttablet."; 
						padding-top:".$paddingtoptablet."; padding-bottom:".$paddingbottomtablet."; 
						}
						}

						@media (max-width: 680px) {
						.col".$cId." { 
						padding-left:".$paddingleftphone."; padding-right:".$paddingrightphone."; 
						padding-top:".$paddingtopphone."; padding-bottom:".$paddingbottomphone."; 
						}
						}

						";

		wp_register_style( 'kona_col-inline-style', false );
		wp_enqueue_style( 'kona_col-inline-style' );
		wp_add_inline_style( 'kona_col-inline-style', $paddingCss );
	}
    
		
	$sectionAdd = '';  
	$sectionClass = ''; 
	$sectionID = '';  
	if ($background !== '0' && $background) {
		if ($background == 'color') {
			$sectionAdd = 'style="background-color:'.esc_attr($colorbg).';'.$styleAdd.'"';	
			$sectionClass = $textcolor;
		} else if ($background == 'image') {
			$image = wp_get_attachment_image_src( kona_get_attachment_id_from_src($imagebg), 'full' );
			if (!$image) { $image = $imagebg; }
			$imageFile = $image[0];
			if ($imagetype == 'normal') {
				$sectionClass = $textcolor;
				$sectionAdd = 'style="background:url('.esc_url($imageFile).') center center;background-size:cover; '.$styleAdd.'"';	
			} else if ($imagetype == 'parallax') {
				$sectionClass = 'parallax-section '.$textcolor;
				$sectionAdd = 'data-parallax-image="'.esc_url($imageFile).'" style="'.$styleAdd.'"';	
			} else if ($imagetype == 'pattern') {
				if (strpos($imagebg, '@2x') !== false) {
					$w = $image[1]/2;
					$h = $image[2]/2;
					$styleAdd .= "-webkit-background-size:".$w."px ".$h."px; -moz-background-size:".$w."px ".$h."px; -o-background-size:".$w."px ".$h."px; background-size:".$w."px ".$h."px;";
				} else { $styleAdd = ""; }
				$sectionClass = $textcolor;
				$sectionAdd = 'style="background:url('.esc_url($imageFile).') center center;'.$styleAdd.'"';	
			} 
		} else {
			$sectionAdd = 'style="'.$styleAdd.'"';	
		}
		if ($roundedcorner) { $sectionClass .= " ".$roundedcorner; }
		$sectionClass .= " hasbg";
	}
		
	$sectionClass .= ' col'.$cId;
	if ($class) { $sectionClass .= ' '.$class; }
	if ($id) { $sectionID = 'id="'.esc_attr($id).'"'; } 
	  
	$cId++;
   	return '<div '.$sectionID.' class="column '.esc_attr($size).' '.esc_attr($last).' '.esc_attr($sectionClass).' '.esc_attr($animation).'" '.$sectionAdd.'>'.preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content)).'</div>';
		
}
add_shortcode('col', 'kona_col');




/*-----------------------------------------------------------------------------------*/
/*	Spacer Shortcode
/*-----------------------------------------------------------------------------------*/
function kona_spacer( $atts, $content = null )
{
	extract( shortcode_atts( array(
      'size' => 'big',
      'hide' => '0'
      ), $atts ) );
	
	$spacerClass = ""; if ($hide && $hide !== "0") { $spacerClass = $hide; }
	return '<div class="spacer spacer-'.esc_attr($size).' '.esc_attr($spacerClass).'"></div>';
	
}
add_shortcode('sr-spacer', 'kona_spacer');




/*-----------------------------------------------------------------------------------*/
/*	Shortcodes for Team
/*-----------------------------------------------------------------------------------*/
function kona_teammember( $atts, $content = null ) {
	
	extract( shortcode_atts( array(
	  'name' => '',
	  'namesize' => 'h4',
	  'title' => '',
	  'titlesize' => 'h5',
	  'titlealign' => 'align-left',
      'image' => '',
      'unveil' => 'no-anim',
      'lazy' => '1',
	  'facebook' => '',
	  'behance' => '',
	  'dribbble' => '',
	  'twitter' => '',
	  'google' => '',
	  'instagram' => '',
	  'youtube' => '',
	  'vimeo' => '',
	  'tumblr' => '',
	  'linkedin' => '',
	  'vk' => '',
	  'soundcloud' => '',
	  'website' => '',
	  'mail' => ''
      ), $atts ) );
	
   	
	$social = '';
	if ($facebook || $behance || $dribbble || $twitter || $google || $linkedin || $vk || $website || $soundcloud || $mail) { 
		$social .= '<ul class="socialmedia-widget">';
		if ($facebook) { $social .= '<li class="facebook"><a href="'.esc_url($facebook).'" target="_blank"></a></li>';  }
		if ($twitter) { $social .= '<li class="twitter"><a href="'.esc_url($twitter).'" target="_blank"></a></li>';  }
		if ($google) { $social .= '<li class="googleplus"><a href="'.esc_url($google).'" target="_blank"></a></li>';  }
		if ($behance) { $social .= '<li class="behance"><a href="'.esc_url($behance).'" target="_blank"></a></li>';  }
		if ($dribbble) { $social .= '<li class="dribbble"><a href="'.esc_url($dribbble).'" target="_blank"></a></li>';  }
		if ($instagram) { $social .= '<li class="instagram"><a href="'.esc_url($instagram).'" target="_blank"></a></li>';  }
		if ($youtube) { $social .= '<li class="youtube"><a href="'.esc_url($youtube).'" target="_blank"></a></li>';  }
		if ($vimeo) { $social .= '<li class="vimeo"><a href="'.esc_url($vimeo).'" target="_blank"></a></li>';  }
		if ($tumblr) { $social .= '<li class="tumblr"><a href="'.esc_url($tumblr).'" target="_blank"></a></li>';  }
		if ($linkedin) { $social .= '<li class="linkedin"><a href="'.esc_url($linkedin).'" target="_blank"></a></li>';  }
		if ($vk) { $social .= '<li class="vk"><a href="'.esc_url($vk).'" target="_blank"></a></li>';  }
		if ($website) { $social .= '<li class="url"><a href="'.esc_url($website).'" target="_blank"></a></li>';  }
		if ($soundcloud) { $social .= '<li class="soundcloud"><a href="'.esc_url($soundcloud).'" target="_blank"></a></li>';  }
		if ($mail) { $social .= '<li class="mail"><a href="mailto:'.$mail.'" target="_blank"></a></li>';  }
		$social .= '</ul>';
	}
	
	if ($unveil !== "do-anim-modern") { $addMember = $unveil; $addPic = ""; }
	else { $addMember = ""; $addPic = $unveil; }
	
   	$output = '<div class="team-member '.esc_attr($addMember).'">';
			
		if ($image) {
			$output .= '<div class="team-pic '.esc_attr($addPic).'">';
			if ($lazy) {
				$picId = kona_get_attachment_id_from_src( $image );
				$picInfo = wp_get_attachment_image_src ($picId,'full');
				$output .='<img class="lazy" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="'.esc_url($picInfo[0]).'" width="'.esc_attr($picInfo[1]).'" height="'.esc_attr($picInfo[2]).'" alt="'.esc_attr($name).'"/>';	
			} else {
				$output .= '<img src="'.esc_url($image).'" alt="'.esc_attr($name).'"/>';	
			}
			
			$output .= '</div>'; 
		}
		$output .= '<div class="team-infos">';
			if ($name) { $output .= '<h4 class="team-name '.esc_attr($namesize).' '.esc_attr($titlealign).'">'.$name.'</h4>'; }
			if ($title) { $output .= '<h5 class="team-role '.esc_attr($titlesize).' '.esc_attr($titlealign).'">'.$title.'</h5>'; }
			if ($content) { $output .= preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content));  }
		$output .= $social.'</div>';
		
	$output .= '</div>'; 
	
	return $output;
}
add_shortcode('sr-teammember', 'kona_teammember');



/*-----------------------------------------------------------------------------------*/
/*	Shortcodes for Slider
/*-----------------------------------------------------------------------------------*/
function kona_slider( $atts, $content = null )
{
	extract( shortcode_atts( array(
      'medias' => '',
      'arrows' => 'true',
      'bullets' => 'false',
      'navcolor' => 'nav-light',
      'loop' => 'true',
      'autoplay' => 'false'
      ), $atts ) );
	static $gId = 1;
	
	if ($arrows) { $arrows = 'true'; } else { $arrows = 'false'; }
	if ($bullets) { $bullets = 'true'; } else { $bullets = 'false'; }
	if ($loop) { $loop = 'true'; } else { $loop = 'false'; }
	if ($autoplay) { $autoplay = 'true'; } else { $autoplay = 'false'; }
	
	$output = '';
	if ($medias) {
		$output .= '<div class="flickity-carousel image-gallery '.esc_attr($navcolor).'" data-flickity=\'{ 
			"prevNextButtons": '.esc_attr($arrows).',
			"pageDots": '.esc_attr($bullets).',
			"lazy": 1,
			"autoPlay": '.esc_attr($autoplay).',
			"adaptiveHeight": true,
			"wrapAround": '.esc_attr($loop).',
			"arrowShape": "M0,50.8c0,1.5,0.8,3.1,1.5,3.8l0,0l29,28.2c2.3,2.3,5.3,2.3,7.6,0c2.3-2.3,2.3-5.3,0-7.6L18.3,55.3h76.3 c3.1,0,5.3-2.3,5.3-5.3s-2.3-5.3-5.3-5.3H18.3l19.1-19.8c2.3-2.3,2.3-5.3,0-7.6s-5.3-2.3-7.6,0l-28.2,29l0,0 c-0.8,0.8-0.8,1.5-1.5,1.5l0,0C0,49.2,0,50,0,50.8z"
			}\'>';
		
		$images = explode(',',$medias);
		foreach($images as $j) {
			$j = explode('|',$j);
			
			$imageFull = wp_get_attachment_image_src ($j[0],'full');
			$image1680 = wp_get_attachment_image_src ($j[0],'kona-thumb-ultra');
			$image1280 = wp_get_attachment_image_src ($j[0],'kona-thumb-big');
			$image640 = wp_get_attachment_image_src ($j[0],'kona-thumb-medium');
			
			$imgsrc = 'src="'.esc_url($imageFull[0]).'"';
			$imgsrcset = array();
			$imgsrcset[] = esc_url($imageFull[0]).' '.esc_attr($imageFull[1]).'w';
			$imgsrcset[] = esc_url($image1680[0]).' '.esc_attr($image1680[1]).'w';
			$imgsrcset[] = esc_url($image1280[0]).' '.esc_attr($image1280[1]).'w';
			$imgsrcset[] = esc_url($image640[0]).' '.esc_attr($image640[1]).'w';
			$imgsrcsetReturn = 'srcset="'.implode(",", $imgsrcset).'"';
			$imgsizes = 'sizes="(max-width: '.esc_attr($imageFull[1]).'px) 100vw, '.esc_attr($imageFull[1]).'px"';
			$imgWidthHeight = 'width="'.esc_attr($imageFull[1]).'" height="'.esc_attr($imageFull[2]).'"';
			
			$output .='<div class="gallery-image"><img '.$imgsrc.' '.$imgsrcsetReturn.' '.$imgsizes.' '.$imgWidthHeight.' alt="'.esc_attr(get_the_title($j[0])).'" /></div>';	
			
		}
		
		$output .= '</div>';
	}
	
	return $output;
}
add_shortcode('sr-slider', 'kona_slider');



/*-----------------------------------------------------------------------------------*/
/*	Shortcodes for Gallery
/*-----------------------------------------------------------------------------------*/
function kona_gallery( $atts, $content = null )
{
	extract( shortcode_atts( array(
      'medias' => '',
      'columns' => '3',
      'type' => 'equal',
      'ratio' => '3:2',
	  'gridoffset' => '0',
      'gridoffsetsize' => 'normal',
      'spacing' => 'not-spaced',
      'lightbox' => '0',
      'caption' => '0',
      'unveil' => 'no-anim',
      'lazy' => '1',
      'galid' => '1'
      ), $atts ) );
		
	static $gId = 1;
	
	$output = '';
	if ($medias) {
		
		$gridClass = 'isotope-grid style-column-'.esc_attr($columns).' isotope-'.esc_attr($spacing);
		$gridAdd = "";
		if ($ratio && $type == "equal" && $columns !== "1") { $gridAdd .= ' data-ratio="'.esc_attr($ratio).'"'; }
		if ($gridoffset) { $gridClass .= " offset";}
		if ($gridoffset == "1") { $gridClass .= "-".$gridoffsetsize; }
		if ($gridoffset == "2") { $gridClass .= "-crazy fitrows"; }
		
		$output .= '<div id="sc-gallery-grid'.esc_attr($gId).'" class="'.esc_attr($gridClass).' gallery-container" '.$gridAdd.'>';
		
		$images = explode(',',$medias);
		foreach($images as $j) {
			$j = explode('|',$j);
			if ($gridoffset) { $j[1] == 'normal'; }
			$addClass= ""; 
			if (isset($j[1]) && $j[1] == 'double width') { $addClass= "double-width"; }
			if (isset($j[1]) && $j[1] == 'double height') { $addClass= "double-height"; }
			if (isset($j[1]) && $j[1] == 'double width + height') { $addClass= "double-ratio"; }
			$output .= '<div class="isotope-item sr-gallery-item '.$addClass.'"><div class="gallery-item-inner item-inner '.$unveil.'">';
			
			if ($lightbox) {
				$imageLightbox = wp_get_attachment_image_src( $j[0], 'full' );
				$addToImage = ''; if ($caption) { $addToImage = 'data-caption="'.esc_html(get_post($j[0])->post_excerpt).'"'; }
				$output .= '<a href="'.esc_url($imageLightbox[0]).'" data-rel="lightcase:folio-sc'.$galid.'" class="thumb-hover overlay-color text-light scale " '.$addToImage.'>';
			}
			
			// srcset option
			$imgsrcset = array();
			$imageFull = wp_get_attachment_image_src ($j[0],'full');
			$image1680 = wp_get_attachment_image_src ($j[0],'kona-thumb-ultra');
			$image1280 = wp_get_attachment_image_src ($j[0],'kona-thumb-big');
			$image640 = wp_get_attachment_image_src ($j[0],'kona-thumb-medium');
			
			if ($columns == '1') { 
				$imgsrc = 'src="'.esc_url($imageFull[0]).'"';
				$imgsrcset[] = esc_url($imageFull[0]).' '.esc_attr($imageFull[1]).'w';
				$imgsrcset[] = esc_url($image1680[0]).' '.esc_attr($image1680[1]).'w';
				$imgsrcset[] = esc_url($image1280[0]).' '.esc_attr($image1280[1]).'w';
				$imgsrcset[] = esc_url($image640[0]).' '.esc_attr($image640[1]).'w';
				$imgsizes = 'sizes="(max-width: '.esc_attr($imageFull[1]).'px) 100vw, '.esc_attr($imageFull[1]).'px"';
				$imgWidthHeight = 'width="'.esc_attr($imageFull[1]).'" height="'.esc_attr($imageFull[2]).'"';
			} else if ($columns == '2') {
				$imgsrc = 'src="'.esc_url($image1680[0]).'"';
				$imgsrcset[] = esc_url($image1680[0]).' '.esc_attr($image1680[1]).'w';
				$imgsrcset[] = esc_url($image1280[0]).' '.esc_attr($image1280[1]).'w';
				$imgsrcset[] = esc_url($image640[0]).' '.esc_attr($image640[1]).'w';
				$imgsizes = 'sizes="(max-width: '.esc_attr($image1680[1]).'px) 100vw, '.esc_attr($image1680[1]).'px"';
				$imgWidthHeight = 'width="'.esc_attr($image1680[1]).'" height="'.esc_attr($image1680[2]).'"';
				
				if (isset($j[1]) && $j[1] == 'double') { 
					$imgsrc = 'src="'.esc_url($imageFull[0]).'"';
					$imgsrcset[] = esc_url($imageFull[0]).' '.esc_attr($imageFull[1]).'w';
					$imgsizes = 'sizes="(max-width: '.esc_attr($imageFull[1]).'px) 100vw, '.esc_attr($imageFull[1]).'px"';
					$imgWidthHeight = 'width="'.esc_attr($imageFull[1]).'" height="'.esc_attr($imageFull[2]).'"';
				}
			} else if ($columns == '3' || $columns == '4') {
				$imgsrc = 'src="'.esc_url($image1280[0]).'"';
				$imgsrcset[] = esc_url($image1280[0]).' '.esc_attr($image1280[1]).'w';
				$imgsrcset[] = esc_url($image640[0]).' '.esc_attr($image640[1]).'w';
				$imgsizes = 'sizes="(max-width: '.esc_attr($image1280[1]).'px) 100vw, '.esc_attr($image1280[1]).'px"';
				$imgWidthHeight = 'width="'.esc_attr($image1280[1]).'" height="'.esc_attr($image1280[2]).'"';
				
				if (isset($j[1]) && $j[1] == 'double' && $columns == '3') { 
					$imgsrc = 'src="'.esc_url($image1680[0]).'"';
					$imgsrcset[] = esc_url($image1680[0]).' '.esc_attr($image1680[1]).'w';
					$imgsizes = 'sizes="(max-width: '.esc_attr($image1680[1]).'px) 100vw, '.esc_attr($image1680[1]).'px"';
					$imgWidthHeight = 'width="'.esc_attr($image1680[1]).'" height="'.esc_attr($image1680[2]).'"';
				}
			} else if ($columns == '5') {
				$imgsrc = 'src="'.esc_url($image640[0]).'"';
				$imgsrcset[] = esc_url($image640[0]).' '.esc_attr($image640[1]).'w';
				$imgsizes = 'sizes="(max-width: '.esc_attr($image640[1]).'px) 100vw, '.esc_attr($image640[1]).'px"';
				$imgWidthHeight = 'width="'.esc_attr($image640[1]).'" height="'.esc_attr($image640[2]).'"';
				
				if (isset($j[1]) && $j[1] == 'double') { 
					$imgsrc = 'src="'.esc_url($image1280[0]).'"';
					$imgsrcset[] = esc_url($image1280[0]).' '.esc_attr($image1280[1]).'w';
					$imgsizes = 'sizes="(max-width: '.esc_attr($image1280[1]).'px) 100vw, '.esc_attr($image1280[1]).'px"';
					$imgWidthHeight = 'width="'.esc_attr($image1280[1]).'" height="'.esc_attr($image1280[2]).'"';
				}
			}
			$imgsrcsetReturn = 'srcset="'.implode(",", $imgsrcset).'"';
				
			if ($lazy) {
			$output .='<img class="lazy" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-'.$imgsrc.' data-'.$imgsrcsetReturn.' data-'.$imgsizes.' '.$imgWidthHeight.' alt="'.esc_attr(get_the_title($j[0])).'" />';	
			} else {
			$output .= '<img '.$imgsrc.' '.$imgsrcsetReturn.' '.$imgsizes.' '.$imgWidthHeight.' alt="'.esc_attr(get_the_title($j[0])).'" />';	
			}
			
			if ($lightbox) { $output .= '</a>'; }
			$output .= '</div></div>';
			
		}
		
		$output .= '</div>';
	}
	
	$gId++;
	return $output;
	
}
add_shortcode('sr-gallery', 'kona_gallery');




/*-----------------------------------------------------------------------------------*/
/*	Shortcodes for LookBook
/*-----------------------------------------------------------------------------------*/
function kona_lookbook( $atts, $content = null )
{
	extract( shortcode_atts( array(
      'medias' => '',
      'columns' => '3',
      'type' => 'equal',
      'ratio' => '3:2',
	  'gridoffset' => '0',
      'gridoffsetsize' => 'normal',
      'spacing' => 'not-spaced',
      'lightbox' => '0',
      'caption' => '0',
      'unveil' => 'no-anim',
      'lazy' => '1',
      'galid' => '1'
      ), $atts ) );
		
	static $gId = 1;
	
	$output = '';
	if ($medias) {
				
		$gridClass = 'isotope-grid style-column-'.esc_attr($columns).' isotope-'.esc_attr($spacing);
		$gridAdd = "";
		if ($ratio && $type == "equal" && $columns !== "1") { $gridAdd .= ' data-ratio="'.esc_attr($ratio).'"'; }
		if ($gridoffset) { $gridClass .= " offset";}
		if ($gridoffset == "1") { $gridClass .= "-".$gridoffsetsize; }
		if ($gridoffset == "2") { $gridClass .= "-crazy fitrows"; }
		
		$images = explode(',',$medias);
		if ( count($images) > 1) { $output .= '<div id="sc-lookbook-grid'.esc_attr($gId).'" class="'.esc_attr($gridClass).' gallery-container" '.$gridAdd.'>'; }
		foreach($images as $j) {
			$j = explode('|',$j);
			
			if ( count($images) > 1) { $output .= '<div class="isotope-item sr-lookbook-item"><div class="lookbook-item-inner item-inner '.$unveil.'">'; }
			else { $output .= '<div class="sr-lookbook-item"><div class="lookbook-item-inner item-inner '.$unveil.'">'; }
						
			// LookBook Link to products
			if (isset($j[1]) && $j[1] !== '') { 
				$output .= '<a href="#" data-product="'.esc_attr($j[1]).'" class="shoplook-open">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 8.8 8.9">
					<path d="M8.3,3.8H5.2V0.7C5.2,0.3,4.8,0,4.5,0h0C4.1,0,3.8,0.3,3.8,0.7v3.1H0.7C0.3,3.8,0,4.1,0,4.5v0
						c0,0.4,0.3,0.7,0.7,0.7h3.1v3.1c0,0.4,0.3,0.7,0.7,0.7h0c0.4,0,0.7-0.3,0.7-0.7V5.2h3.1c0.4,0,0.7-0.3,0.7-0.7v0
						C8.9,4.1,8.6,3.8,8.3,3.8z"/>
					</svg>
				</a>';
				
				$shoplook = explode(';',$j[1]);
				$output .= '<div class="shopthelook">
							<div class="lookbook-header">
								<h5 class="lookbook-title"><strong>'.__( 'Shop the Look', 'kona' ).'</strong></h5>
							</div>
							<a href="#" class="lookbook-close close-icon">
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 8.8 8.9">
								<path d="M8.3,3.8H5.2V0.7C5.2,0.3,4.8,0,4.5,0h0C4.1,0,3.8,0.3,3.8,0.7v3.1H0.7C0.3,3.8,0,4.1,0,4.5v0
									c0,0.4,0.3,0.7,0.7,0.7h3.1v3.1c0,0.4,0.3,0.7,0.7,0.7h0c0.4,0,0.7-0.3,0.7-0.7V5.2h3.1c0.4,0,0.7-0.3,0.7-0.7v0
									C8.9,4.1,8.6,3.8,8.3,3.8z"/>
								</svg>
							</a>
							
							<ul class="lookbook-list">';
				
				foreach ($shoplook as $s) {
					if (get_the_title($s)) {
					$output .= '<li class="list-item-'.esc_attr($s).'">
									<a href="'.get_the_permalink($s).'">
									<div class="product-name">
										<div class="product-image">
											'.get_the_post_thumbnail($s,'thumbnail').'
										</div>
										<div class="product-info">
											<h6 class="product-title h6">'.get_the_title($s).'</h6>
											'.do_shortcode('[sr-product-price id="'.$s.'"]').'
										</div>
									</div>
									</a>
								</li>';
					}
				}
				$output .= '</ul></div>';
			}
			
			// srcset option
			$imgsrcset = array();
			$imageFull = wp_get_attachment_image_src ($j[0],'full');
			$image1680 = wp_get_attachment_image_src ($j[0],'kona-thumb-ultra');
			$image1280 = wp_get_attachment_image_src ($j[0],'kona-thumb-big');
			$image640 = wp_get_attachment_image_src ($j[0],'kona-thumb-medium');
			
			if ($columns == '1') { 
				$imgsrc = 'src="'.esc_url($imageFull[0]).'"';
				$imgsrcset[] = esc_url($imageFull[0]).' '.esc_attr($imageFull[1]).'w';
				$imgsrcset[] = esc_url($image1680[0]).' '.esc_attr($image1680[1]).'w';
				$imgsrcset[] = esc_url($image1280[0]).' '.esc_attr($image1280[1]).'w';
				$imgsrcset[] = esc_url($image640[0]).' '.esc_attr($image640[1]).'w';
				$imgsizes = 'sizes="(max-width: '.esc_attr($imageFull[1]).'px) 100vw, '.esc_attr($imageFull[1]).'px"';
				$imgWidthHeight = 'width="'.esc_attr($imageFull[1]).'" height="'.esc_attr($imageFull[2]).'"';
			} else if ($columns == '2') {
				$imgsrc = 'src="'.esc_url($image1680[0]).'"';
				$imgsrcset[] = esc_url($image1680[0]).' '.esc_attr($image1680[1]).'w';
				$imgsrcset[] = esc_url($image1280[0]).' '.esc_attr($image1280[1]).'w';
				$imgsrcset[] = esc_url($image640[0]).' '.esc_attr($image640[1]).'w';
				$imgsizes = 'sizes="(max-width: '.esc_attr($image1680[1]).'px) 100vw, '.esc_attr($image1680[1]).'px"';
				$imgWidthHeight = 'width="'.esc_attr($image1680[1]).'" height="'.esc_attr($image1680[2]).'"';
			} else if ($columns == '3' || $columns == '4') {
				$imgsrc = 'src="'.esc_url($image1280[0]).'"';
				$imgsrcset[] = esc_url($image1280[0]).' '.esc_attr($image1280[1]).'w';
				$imgsrcset[] = esc_url($image640[0]).' '.esc_attr($image640[1]).'w';
				$imgsizes = 'sizes="(max-width: '.esc_attr($image1280[1]).'px) 100vw, '.esc_attr($image1280[1]).'px"';
				$imgWidthHeight = 'width="'.esc_attr($image1280[1]).'" height="'.esc_attr($image1280[2]).'"';
			} else if ($columns == '5') {
				$imgsrc = 'src="'.esc_url($image640[0]).'"';
				$imgsrcset[] = esc_url($image640[0]).' '.esc_attr($image640[1]).'w';
				$imgsizes = 'sizes="(max-width: '.esc_attr($image640[1]).'px) 100vw, '.esc_attr($image640[1]).'px"';
				$imgWidthHeight = 'width="'.esc_attr($image640[1]).'" height="'.esc_attr($image640[2]).'"';
			}
			$imgsrcsetReturn = 'srcset="'.implode(",", $imgsrcset).'"';
				
			if ($lazy) {
			$output .='<img class="lazy" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-'.$imgsrc.' data-'.$imgsrcsetReturn.' data-'.$imgsizes.' '.$imgWidthHeight.' alt="'.esc_attr(get_the_title($j[0])).'" />';	
			} else {
			$output .= '<img '.$imgsrc.' '.$imgsrcsetReturn.' '.$imgsizes.' '.$imgWidthHeight.' alt="'.esc_attr(get_the_title($j[0])).'" />';	
			}
			
			$output .= '</div></div>';
			
		}
		
		if ( count($images) > 1) { $output .= '</div>'; }
	}
		
	$gId++;
	return $output;
	
}
add_shortcode('sr-shoplookbook', 'kona_lookbook');



/*-----------------------------------------------------------------------------------*/
/*	Blog Posts Shortcode
/*-----------------------------------------------------------------------------------*/
function kona_blogposts( $atts, $content = null )
{
	
	extract( shortcode_atts( array(
      'show' => 'all',
      'category' => '',
      'postid' => '',
      'gridwidth' => 'wrapper',
      'style' => 'masonry',
      'columns' => '3',
      'gridoffset' => '0',
      'gridoffsetsize' => 'normal',
      'spacing' => 'spaced-big',
      'count' => '6',
      'titlesize' => 'h4',
      'unveil' => '1',
      'lazy' => '0',
      'readmore' => '1',
      'date' => '1',
      'categoryshow' => '1',
      'introshow' => '1',
      'offset' => '0',
      'pagination' => '0',
		
      'paged' => '',		// for ajax load more
      'ajax' => '0'			// for ajax load more (to disable lazy)
      ), $atts ) );
	
	static $bId = 1;
	
	if ($ajax) { $lazy = 0; }
	
	$gridTemplate = 'default';
	$gridClass = 'isotope-grid style-column-'.$columns.' isotope-'.$spacing;
	if ($gridoffset) { $gridClass .= " offset";}
	if ($gridoffset == "1") { $gridClass .= "-".$gridoffsetsize; }
	if ($gridoffset == "2") { $gridClass .= "-crazy fitrows"; }
	
	ob_start();
	
	if ( get_option( 'page_on_front' ) == get_the_ID() ) { $pagenumber = ( get_query_var('page') ? get_query_var('page') : 1 ); } 
	else { $pagenumber = ( get_query_var('paged') ? get_query_var('paged') : 1 ); }
	if ($paged) { $pagenumber = $paged; }
	
	if ($show == 'all') { $terms = wp_list_pluck( get_terms('category'), 'term_id' ); }
	else if ($show == 'cat' && $category) { $terms = explode(',',$category); } else { $terms = false; }
	$taxquery = array(	array( 'taxonomy' => 'category', 'field' => 'term_id', 'terms' => $terms ));

	if ($show == 'id') { $posts = explode(',',$postid); $count = "-1"; } else { $posts = false; }
	
	$args = array(
		'post_type' => array('post'),
		'posts_per_page'=> $count,
		'paged' => $pagenumber
	);
	
	if ( $terms ) { $args['tax_query'] = $taxquery; }
	if ( $posts ) { $args['post__in'] = $posts; }
	if ( $show !== 'id' && $offset) { $args['offset'] = $offset + (($pagenumber - 1) * $count); } // calculation because offsett + paged not combinable
		
	$query = new WP_Query($args);
		
	if ( $query->have_posts() ) {
		
		$maxPages = $query->max_num_pages;
		
		if ($gridwidth) { echo '<div class="'.$gridwidth.'">'; }
		
		echo '<div><div id="blog-grid'.esc_attr($bId).'" class="'.esc_attr($gridClass).'">';
        	while ($query->have_posts()) { $query->the_post();
				include( locate_template( 'includes/loop-blog-'.$gridTemplate.'.php' ) );
			}
        echo '</div></div>';
		// double div is important for load more, otherwhise it can't be handled by js
				
		if ($maxPages > 1 && !$paged && $bId == 1) {
			if ($pagination == 'pagination') { 
				echo '
				<div class="spacer-medium"></div>
				<div id="page-pagination">'
					.kona_pagination('post',esc_html__( 'Previous Page', 'kona' ), esc_html__( 'Next Page', 'kona' ),$query)
				.'</div>'; 
			} else if (($pagination == 'loadonclick' || $pagination == 'infiniteload')) {
				$options = str_replace("&", "|", http_build_query($atts));
				$options = $options.'|paged=2|';
				echo '
				<div class="load-isotope align-center">
					<a 	href="#" class="sr-button style-3 button-small" 
						data-related-grid="blog-grid'.esc_attr($bId).'" 
						data-method="'.$pagination.'"
						data-options="'.$options.'"
						>'.esc_html__( 'Load More', 'kona' ).'</a>
					<span class="load-message">'.esc_html__( 'No more items to show', 'kona' ).'</span>
				</div>';	
			}
		}
		
		if ($gridwidth) { echo '</div> <!-- END wrapper -->'; }
		
		wp_reset_postdata();
	} // END if have posts
	
	$bId++;
	return ob_get_clean();
	
}
add_shortcode('sr-blogposts', 'kona_blogposts');




/*-----------------------------------------------------------------------------------*/
/*	Portfolio Items Shortcode
/*-----------------------------------------------------------------------------------*/
function kona_portfolioitems( $atts, $content = null )
{
	
	extract( shortcode_atts( array(
      'gridwidth' => 'wrapper',
      'gridmasonrycol' => '3',
      'gridtype' => 'equal',
      'gridratio' => '3:2',
      'gridoffset' => '0',
      'gridoffsetsize' => 'normal',
      'gridsizeforce' => '0',
      'gridspaced' => 'spaced',
      'gridunveil' => 'do-anim',
      'gridlazy' => '0',
      'filtershow' => 'all',
      'filtercategory' => '',
      'filteritems' => '',
      'filtercount' => '9',
      'filterenable' => '1',
	  'offset'=> '0',
      'pagination' => '0',
      'captionforce' => '0',
      'hoverforce' => '0',
      'hovercaption' => 'onhover',
      'captionsize' => 'h4',
      'captionposition' => 'bottom',
      'captionalignment' => 'align-left',
      'captioncategory' => '1',
      'captioncolor' => 'caption-light',
      'hovercolor' => 'overlay-color',
      'customhovercolor' => '',
      'customhovercaption' => 'text-light',
      'customhoveropacity' => '0.8',
      'hoverzoom' => '1',
		
      'paged' => '',		// for ajax load more
      'ajax' => '0'			// for ajax load more (to disable lazy)
      ), $atts ) );
	
	static $pId = 1;
	
	if ($ajax) { $gridlazy = 0; }
	
	$gridClass = 'isotope-grid isotope-'.$gridspaced.' style-column-'.$gridmasonrycol;
	
	$gridAdd = "";
	if ($gridtype == "equal" && $gridratio) { $gridAdd .= ' data-ratio="'.esc_attr($gridratio).'"';}
	if ($gridoffset) { $gridsizeforce = 1; $gridClass .= " offset";}
	if ($gridoffset == "1") { $gridClass .= "-".$gridoffsetsize; }
	if ($gridoffset == "2") { $gridClass .= "-crazy fitrows"; }
		
	
	ob_start();
		
	if ( get_option( 'page_on_front' ) == get_the_ID() ) { $pagenumber = ( get_query_var('page') ? get_query_var('page') : 1 ); } 
	else { $pagenumber = ( get_query_var('paged') ? get_query_var('paged') : 1 ); }
	if ($paged) { $pagenumber = $paged; }
	
	if ($filtershow == 'all') { $terms = wp_list_pluck( get_terms('portfolio_category'), 'term_id' ); }
	else if ($filtershow == "cat" && $filtercategory) { $terms = explode(',',$filtercategory); } else { $terms = false; }
	$taxquery = array(	array( 'taxonomy' => 'portfolio_category', 'field' => 'term_id', 'terms' => $terms ));
	
	if ($filtershow == 'id') { $posts = explode(',',$filteritems); $filtercount = "-1";  } else { $posts = false; }
	
	if ($filtercount == "0") { $posts = array("0");  } // if filtercount is set to 0 (for demo purpose)
	
	$args = array(
		'posts_per_page'=> $filtercount,
		'paged' => $pagenumber,
		'm' => get_query_var('m'),		   
		'w' => get_query_var('w'),
		'post_type' => array('portfolio'),
	);
	
	if ( $terms ) { $args['tax_query'] = $taxquery; }
	if ( $posts ) { $args['post__in'] = $posts; }
	if ( $filtershow !== 'id' && $offset) { $args['offset'] = $offset + (($pagenumber - 1) * $filtercount); } // calculation because offsett + paged not combinable
					
	$query = new WP_Query($args);
	
	if ( $query->have_posts() ) { 
		
		$maxPages = $query->max_num_pages;
		
		if ($gridwidth) { echo '<div class="'.$gridwidth.'">'; }
		
		if ($filterenable && $terms) { 
        	echo '	<div class="portfolio-filter">
						<h6 class="widget-title title-alt">'.esc_html('Filter','kona').'</h6>
						'.kona_filter('grid-filter'.$pId,'grid-filter','portfolio-grid'.$pId,$terms).'
					</div>';
        }		
		
		echo '<div id="portfolio-grid'.esc_attr($pId).'" class="'.esc_attr($gridClass).' portfolio-container" '.$gridAdd.'>';
        	while ($query->have_posts()) { $query->the_post();
				include( locate_template( 'includes/loop-portfolio.php' ) );
			}
		
		if ($gridwidth) { echo '</div>'; }
		
		// custom css for this grid
		if ($hovercolor == "overlay-color-custom" && $customhovercolor) { 
			echo '<style>	#portfolio-grid'.esc_attr($pId).' .thumb-hover::before { background: '.$customhovercolor.';  }
							#portfolio-grid'.esc_attr($pId).' .thumb-hover:hover::before { opacity: '.$customhoveropacity.'; }</style>';
        }
		
		if ($maxPages > 1 && !$paged) {
			if ($pagination == 'pagination') { 
				echo '<div id="page-pagination">'
					.kona_pagination('portfolio',esc_html__( 'Previous Page', 'kona' ), esc_html__( 'Next Page', 'kona' ),$query)
				.'</div>'; 
			} else if (($pagination == 'loadonclick' || $pagination == 'infiniteload')) {
				$options = str_replace("&", "|", http_build_query($atts));
				$options = $options.'|paged=2|';
				echo '
				<div class="load-isotope align-center">
					<a 	href="#" class="sr-button style-3 button-small" 
						data-related-grid="portfolio-grid'.esc_attr($pId).'" 
						data-method="'.$pagination.'"
						data-options="'.$options.'"
						>'.esc_html__( 'Load More', 'kona' ).'</a>
					<span class="load-isotope-icon"></span>
					<span class="load-message">'.esc_html__( 'No more items to show', 'kona' ).'</span>
				</div>';	
			}
		}
		
		echo '</div> <!-- END .wrapper -->';
			
		wp_reset_postdata();
	} // END if have posts
	
	$pId++;
	return ob_get_clean();
	
}
add_shortcode('sr-portfolioitems', 'kona_portfolioitems');




/*-----------------------------------------------------------------------------------*/
/*	Shop Items Shortcode
/*-----------------------------------------------------------------------------------*/
function kona_shopitems( $atts, $content = null )
{
	
	extract( shortcode_atts( array(		
	  'gridwidth' => 'wrapper',
      'type' => 'grid',
      'style' => 'equal',
      'columns' => '3',
      'spacing' => 'spaced-big',
      'unveil' => 'no-anim',
      'lazy' => '0',
      'count' => '4',
      'pagination' => '0',
      'layoutcustom' => 'inherit',
      'titlesize' => 'h5',
      'showprice' => '1',
      'showaddtocart' => '1',
      'showsale' => '1',
	  'filtershow' => 'all',
      'filtercategory' => '',
      'filteritems' => '',
      'filterorder' => 'date',
      'filtersort' => 'DESC',
      'search' => '',
      'gridid' => '',
      'paged' => '',		// for ajax load more
      'ajax' => '0'			// for ajax load more (to disable lazy)
      ), $atts ) );	
	
	static $sId = 1;
	
	if ($ajax) { $lazy = 0; }
	
	$columnsMobile = 2;
	if (get_option('_sr_shopgridcolmobile')) { $columnsMobile = intval(get_option('_sr_shopgridcolmobile')); }
	
	$gridAdd = '';
	$gridClass = 'isotope-grid fitrows mobile-col-'.$columnsMobile.' style-column-'.$columns.' isotope-'.$spacing;
	if ($type == 'carousel') { 
		$gridClass = 'flickity-carousel shop-carousel style-column-'.$columns.' flickity-'.$spacing; 
		$gridAdd = 'data-flickity=\'{ 
			"prevNextButtons": true,
			"pageDots": false,
			"lazy": 1,
			"contain": true,
			"groupCells": '.$columns.',
			"arrowShape": "M0,50.8c0,1.5,0.8,3.1,1.5,3.8l0,0l29,28.2c2.3,2.3,5.3,2.3,7.6,0c2.3-2.3,2.3-5.3,0-7.6L18.3,55.3h76.3 c3.1,0,5.3-2.3,5.3-5.3s-2.3-5.3-5.3-5.3H18.3l19.1-19.8c2.3-2.3,2.3-5.3,0-7.6s-5.3-2.3-7.6,0l-28.2,29l0,0 c-0.8,0.8-0.8,1.5-1.5,1.5l0,0C0,49.2,0,50,0,50.8z"
			}\'';
	}
	
	ob_start();
		
	if ( get_option( 'page_on_front' ) == get_the_ID() ) { $pagenumber = ( get_query_var('page') ? get_query_var('page') : 1 ); } 
	else { $pagenumber = ( get_query_var('paged') ? get_query_var('paged') : 1 ); }
	if ($paged) { $pagenumber = $paged; }
	
	if ($filtershow == 'all') { $terms = wp_list_pluck( get_terms('product_cat'), 'term_id' ); }
	else if ($filtershow == "cat" && $filtercategory) { $terms = explode(',',$filtercategory); } else { $terms = false; }
	$taxquery = array(	
					array( 'taxonomy' => 'product_cat', 'field' => 'term_id', 'terms' => $terms ),
					array(
						'taxonomy' => 'product_visibility',
						'field'    => 'name',
						'terms'    => 'exclude-from-catalog',
						'operator' => 'NOT IN',
					)
				);
	
	if ($filtershow == 'id') { $posts = explode(',',$filteritems); } else { $posts = false; }
	
	if ($count == "0") { $posts = array("0");  } // if filtercount is set to 0 (for demo purpose)
	
	$args = array(
		'posts_per_page'=> $count,
		'paged' => $pagenumber,
		'm' => get_query_var('m'),		   
		'w' => get_query_var('w'),
		'post_type' => array('product'),
		'orderby'   => $filterorder,
		'order'   => $filtersort/*,
		's'	=> $search/*,
		'meta_query' => array(
			array(
			   'key' => '_sku',
			   'value' => $search,
			   'compare' => 'LIKE'
			)
		 )*/
	);
	if ( $terms ) { $args['tax_query'] = $taxquery; }
	if ( $posts ) { $args['post__in'] = $posts; }
	
	if ( $search ) {
		// make 2 search query (to combine sku and normal search) and merge them
		
		$searchArgs1 = $args;
		$searchArgs1['s'] = $search;
		$searchArgs1['fields'] = "ids";
		
		$searchArgs2 = $args;
		$searchArgs2['meta_query'] = array(
			array(
			   'key' => '_sku',
			   'value' => $search,
			   'compare' => 'LIKE'
			)
		 );
		$searchArgs2['fields'] = "ids";
		
		$prodsSearch1 = get_posts( $searchArgs1 );
		$prodsSearch2 = get_posts( $searchArgs2 );
		$searchIds = array_merge( $prodsSearch1, $prodsSearch2 );
		if (count($searchIds) == 0) { $searchIds[0]=0; }  // to have 0 results if no results
		
		$args['post__in'] = $searchIds;
	}
	
	$query = new WP_Query($args);			
	if ( $query->have_posts() ) { 
		
		$maxPages = $query->max_num_pages;
		
		if ($gridwidth) { echo '<div class="'.$gridwidth.'">'; }
		
		$theGridId = "shop-grid".$sId;
		if ($gridid) { $theGridId = $gridid; }
		echo '<div id="'.esc_attr($theGridId).'" class="'.esc_attr($gridClass).' shop-container" '.$gridAdd.'>';
        	while ($query->have_posts()) { $query->the_post();
				include( locate_template( 'woocommerce/content-product.php' ) );
			}
        echo '</div>';
		
		if ($maxPages > 1 && !$paged && $type !== 'carousel') {
			if ($pagination == 'pagination') { 
				echo '<div id="page-pagination">'
					.kona_pagination('shop',esc_html__( 'Previous Page', 'kona' ), esc_html__( 'Next Page', 'kona' ),$query)
				.'</div>'; 
			} else if ($pagination == 'loadonclick' || $pagination == 'infiniteload') {
				$options = str_replace("&", "|", http_build_query($atts));
				$options = $options.'|paged=2|';
				echo '
				<div class="load-isotope align-center">
					<a 	href="#" class="sr-button withicon style-3" 
						data-related-grid="'.esc_attr($theGridId).'" 
						data-method="'.$pagination.'"
						data-options="'.$options.'" 
						>
						<span class="text">
							<span>'.esc_html__( 'Load More', 'kona' ).'</span>
							<span>'.esc_html__( 'Load More', 'kona' ).'</span>
						</span>
						<span class="icon">
							<span class="arrow">
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 13.2 9">
								<path d="M13.1,4.4c0-0.2-0.1-0.4-0.2-0.5c0,0,0,0,0,0L9.1,0.2c-0.3-0.3-0.7-0.3-1,0c-0.3,0.3-0.3,0.7,0,1l2.6,2.6H0.7
									c-0.4,0-0.7,0.3-0.7,0.7c0,0.4,0.3,0.7,0.7,0.7h10L8.2,7.8c-0.3,0.3-0.3,0.7,0,1c0.3,0.3,0.7,0.3,1,0L12.9,5c0,0,0,0,0,0
									C13,4.9,13,4.8,13.1,4.8c0,0,0,0,0,0C13.1,4.6,13.1,4.5,13.1,4.4z"/>
								</svg>
							</span>
						</span>    
					</a>
					<span class="load-isotope-icon sr-loader-icon"></span>
					<span class="load-message">'.esc_html__( 'No more items to show', 'kona' ).'</span>
				</div>
				';	
			}
		}
		
		if ($gridwidth) { echo '</div> <!-- END .wrapper -->'; }
			
		wp_reset_postdata();
	} // END if have posts
	
	$sId++;
	return ob_get_clean();
	
}
add_shortcode('sr-shopitems', 'kona_shopitems');



/*-----------------------------------------------------------------------------------*/
/*	Shortcodes for Single Product
/*-----------------------------------------------------------------------------------*/
function kona_shopproduct( $atts, $content = null )
{
	
	extract( shortcode_atts( array(		
	  'product' => '',
      'layoutcustom' => 'inherit',
      'titlesize' => 'h5',
      'showimage' => '1',
      'showaddtocart' => '1',
      'showprice' => '1',
      'showsale' => '1',
      'showdesc' => '0',
      'showviewmore' => '0',
      ), $atts ) );
	
	ob_start();
	
	$args = array(
		'posts_per_page'=> 1,
		'post_type' => array('product'),
		'post__in' => $posts = explode(',',$product)
	);
	
	$query = new WP_Query($args);
			
	if ( $query->have_posts() ) { 
		
		echo '<div class="shop-container single-product-container">';
		while ($query->have_posts()) { $query->the_post();
			include( locate_template( 'woocommerce/content-product.php' ) );
		}
		echo '</div>';
		
		wp_reset_postdata();
	} // END if have posts
	
	return ob_get_clean();
	
}
add_shortcode('sr-shopproduct', 'kona_shopproduct');



/*-----------------------------------------------------------------------------------*/
/*	Product Categories
/*-----------------------------------------------------------------------------------*/
function kona_shopcategories( $atts, $content = null )
{
	
	extract( shortcode_atts( array(		
	  'categories' => '',
	  'wrapper' => 'wrapper',
      'columns' => '3',
      'spacing' => 'spaced',
      'unveil' => 'no-anim',
      'lazy' => '1',
      'titlesize' => 'h5',
      'titlepos' => 'below',
      'alignment' => 'top-left',
      'display' => 'text',
      'textcolor' => 'light'
      ), $atts ) );	
		
	static $sId = 1;
	$return = "";
	if ($wrapper) { $return .= '<div class="'.$wrapper.'">'; }
	$return .= '<div id="catgrid-'.esc_attr($sId).'" class="isotope-grid style-column-'.esc_attr($columns).' isotope-'.esc_attr($spacing).'">';
	
	$categories = explode(',',$categories);
	foreach ($categories as $c) {
		$cat = get_term_by( 'id', $c, 'product_cat' );
		
		if ($cat) {
		$catImage = get_woocommerce_term_meta( $c, 'thumbnail_id', true ); $catImage = wp_get_attachment_url( $catImage );
			$imageId = kona_get_attachment_id_from_src($catImage);
			$image = wp_get_attachment_image_src ($imageId,'kona-thumb-medium-crop');
			if ($columns == '2') { $image = wp_get_attachment_image_src ($imageId,'kona-thumb-big-crop'); }
		$catLink = get_term_link( $cat->slug, 'product_cat' );
		
		
		$text = '<h5 class="imagebutton-title '.esc_attr($titlesize).' '.esc_attr($alignment).'"><strong>'.esc_html($cat->name).'</strong></h5>';
		if ($titlepos !== 'below' && $display == 'button') {
			$text = '<span class="imagebutton-title sr-button withicon style-2">
						<span class="text">
							<span>'.esc_html($cat->name).'</span>
							<span>'.esc_html($cat->name).'</span>
						</span>
						<span class="icon">
							<span class="arrow">
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 13.2 9">
								<path d="M13.1,4.4c0-0.2-0.1-0.4-0.2-0.5c0,0,0,0,0,0L9.1,0.2c-0.3-0.3-0.7-0.3-1,0c-0.3,0.3-0.3,0.7,0,1l2.6,2.6H0.7
									c-0.4,0-0.7,0.3-0.7,0.7c0,0.4,0.3,0.7,0.7,0.7h10L8.2,7.8c-0.3,0.3-0.3,0.7,0,1c0.3,0.3,0.7,0.3,1,0L12.9,5c0,0,0,0,0,0
									C13,4.9,13,4.8,13.1,4.8c0,0,0,0,0,0C13.1,4.6,13.1,4.5,13.1,4.4z"/>
								</svg>
							</span>
						</span>
					</span>';
		}
		
		if ($catImage) {
			$return .= '<div class="isotope-item cat-item imagebutton">
							<div class="cat-item-inner item-inner '.esc_attr($unveil).'">
								<div class="imagebutton-media text-'.esc_attr($textcolor).' '.esc_attr($alignment).'">
									<a href="'.esc_url($catLink).'" class="thumb-hover scale">
										<img class="lazy" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="'.esc_url($image[0]).'" width="'.esc_attr($image[1]).'" height="'.esc_attr($image[2]).'" alt="'.esc_attr(get_the_title($imageId)).'"/>'; 
										if ($titlepos !== 'below') { $return .= $text; }
			$return .= '			</a>
								</div>';
								if ($titlepos == 'below') { $return .= '<div class="imagebutton-meta"><a href="'.esc_url($catLink).'">'.$text.'</a></div>'; }
			$return .= '	</div>
						</div>';
		}
			
		} // end if $cat
	}
	
	
	$return .= '</div>';
	if ($wrapper) { $return .= '</div>'; }
	$sId++;
	return $return;
	
}
add_shortcode('sr-shopcategories', 'kona_shopcategories');


/*-----------------------------------------------------------------------------------*/
/*	Shortcodes for Google Map
/*-----------------------------------------------------------------------------------*/
function kona_googlemap_shortcode( $atts, $content = null )
{
	extract( shortcode_atts( array(
      'latlong' => '-33.86938,151.204834',
      'apikey' => '',
      'pinicon' => get_template_directory_uri().'/files/images/map-pin.png',
      'height' => '400',
      'zoom' => '14',
      'style' => 'default'
      ), $atts ) );
	
	$text = preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content));
	
	if ($height) { $mapStyle= 'height:'.esc_attr($height).';'; } else { $mapStyle = 'height:400px;'; }
	return kona_googleMap($latlong, $text, $pinicon, $mapStyle, '', '', $style, $apikey, $zoom);
		
}
add_shortcode('sr-googlemap', 'kona_googlemap_shortcode');



/*-----------------------------------------------------------------------------------*/
/*	Shortcodes for Image Button
/*-----------------------------------------------------------------------------------*/
function kona_imagebutton( $atts, $content = null )
{
	extract( shortcode_atts( array(
      'image' => '',
      'hoverimage' => '',
      'title' => '',
      'titlesize' => 'h5',
	  'subtitle' => '',
      'subtitlesize' => 'h6',
      'lazy' => '1',
      'titlepos' => 'below',
      'alignment' => 'top-left',
      'display' => 'text',
      'textcolor' => 'light',
      'buttonlink' => 'url',
      'buttonurl' => '',
      'buttonurltarget' => '',
      'buttonpage' => '',
      ), $atts ) );
	
	$href = '';
	$buttonAdd =	 '';	
	if ($buttonlink == 'url') { 
		$href = $buttonurl;
		$buttonAdd = 'target="'.esc_attr($buttonurltarget).'"';
	} else if ($buttonlink == 'page') {
		$href = get_permalink($buttonpage); 
	}
	
	$text = '<h5 class="'.esc_attr($titlesize).'"><strong>'.esc_html($title).'</strong></h5>';
	if ($titlepos !== 'below' && $display == 'button') {
		$text = '<span class="sr-button withicon style-2">
					<span class="text">
						<span>'.esc_html($title).'</span>
						<span>'.esc_html($title).'</span>
					</span>
					<span class="icon">
						<span class="arrow">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 13.2 9">
							<path d="M13.1,4.4c0-0.2-0.1-0.4-0.2-0.5c0,0,0,0,0,0L9.1,0.2c-0.3-0.3-0.7-0.3-1,0c-0.3,0.3-0.3,0.7,0,1l2.6,2.6H0.7
								c-0.4,0-0.7,0.3-0.7,0.7c0,0.4,0.3,0.7,0.7,0.7h10L8.2,7.8c-0.3,0.3-0.3,0.7,0,1c0.3,0.3,0.7,0.3,1,0L12.9,5c0,0,0,0,0,0
								C13,4.9,13,4.8,13.1,4.8c0,0,0,0,0,0C13.1,4.6,13.1,4.5,13.1,4.4z"/>
							</svg>
						</span>
					</span>
				</span>';
	}
	
	$subtext = '';
	if ($subtitle) { $subtext = '<h6 class="imagebutton-subtitle title-alt '.esc_attr($subtitlesize).' ">'.esc_html($subtitle).'</h6>'; }
	
	$return = "";
	if ($image) {
		
		$hoverAdd = "";
		if ($hoverimage) {
			$hoverId = kona_get_attachment_id_from_src($hoverimage);
			$hoverData = wp_get_attachment_image_src ($hoverId,'kona-thumb-big');
			$hoverAdd = '<span class="hover-image">
							<img class="lazy hover" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="'.esc_url($hoverData[0]).'" width="'.esc_attr($hoverData[1]).'" height="'.esc_attr($hoverData[2]).'" alt="'.esc_attr(get_the_title($hoverId)).'"/>
						</span>'; 
		}
		
		$imageId = kona_get_attachment_id_from_src($image);
		$imageData = wp_get_attachment_image_src ($imageId,'kona-thumb-big');
		
		$return .= '<div class="imagebutton">
						<div class="imagebutton-media text-'.esc_attr($textcolor).' '.esc_attr($alignment).'">
							<a href="'.esc_url($href).'" '.$buttonAdd.' class="thumb-hover scale">
								'.$hoverAdd.'
								<img class="lazy" 
								src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" alt="'.esc_attr(get_the_title($imageId)).'" data-src="'.esc_url($imageData[0]).'" width="'.esc_attr($imageData[1]).'" height="'.esc_attr($imageData[2]).'"/>'; 
								if ($titlepos !== 'below') { 
									$return .= '<div class="imagebutton-title">'.$text.$subtext.'</div>'; 
								}
		$return .= '		</a>
						</div>';
						if ($titlepos == 'below') { $return .= '<div class="imagebutton-meta"><a href="'.esc_url($href).'">'.$text.'</a>'.$subtext.'</div>'; }
		$return .= '</div>';
	}
	
	return $return;
		
}
add_shortcode('sr-imagebutton', 'kona_imagebutton');


/*-----------------------------------------------------------------------------------*/
/*	Spacer Shortcode
/*-----------------------------------------------------------------------------------*/
function kona_singleimage( $atts, $content = null )
{
	extract( shortcode_atts( array(
      'image' => '',
      'lazy' => '1'
      ), $atts ) );
	
	if (is_admin())	{ $lazy = 0; }
		
	$return = "";
	$imageInfo = wp_get_attachment_image_src( kona_get_attachment_id_from_src($image), 'full' );
	
	
	if ($imageInfo) {
		$return .= '<img class="lazy" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" alt="'.esc_attr(get_the_title(kona_get_attachment_id_from_src($image))).'" data-src="'.esc_url($imageInfo[0]).'" width="'.esc_attr($imageInfo[1]).'" height="'.esc_attr($imageInfo[2]).'" >';

		if ($lazy) {
			$return = '<img class="lazy" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" alt="'.esc_attr(get_the_title(kona_get_attachment_id_from_src($image))).'" data-src="'.esc_url($imageInfo[0]).'" width="'.esc_attr($imageInfo[1]).'" height="'.esc_attr($imageInfo[2]).'">';
		} else {
			$return = '<img src="'.esc_url($imageInfo[0]).'"/>';	
		}
	} else if ($image) {
		$return = '<img src="'.esc_url($image).'"/>';
	}
	
	return $return;
	
}
add_shortcode('sr-singleimage', 'kona_singleimage');




/*-----------------------------------------------------------------------------------*/
/*	Spacer Shortcode
/*-----------------------------------------------------------------------------------*/
function kona_instagram( $atts, $content = null )
{
	extract( shortcode_atts( array(
      'title' => '',
      'username' => '',
      'number' => '',
      'size' => '',
      'columns' => '',
      'spacing' => '',
      'link' => ''
      ), $atts ) );
		
	$instance = array(
		    'title' => $title,
		    'username' => $username,
		    'number' => $number,
		    'size' => $size,
		    'columns' => $columns,
		    'spacing' => $spacing,
		    'link' => $link
		);
	
	ob_start(); 
	
	the_widget( 'kona_instagram_widget', $instance );
	
	return ob_get_clean();
	
}
add_shortcode('sr-instagram', 'kona_instagram');




/*-----------------------------------------------------------------------------------*/
/*	Wordpress Bugfix for shortcodes (paragraph issue)
/*-----------------------------------------------------------------------------------*/
add_filter("the_content", "kona_pb_content_filter");
function kona_pb_content_filter($content) {
 
	// array of custom shortcodes requiring the fix
	$block = join("|",array(	
							"col",
							"columnsection",
							"fullwidthsection",
							"sr-spacer",
							"sr-googlemap",
							"sr-teammember",
							"sr-gallery",
							"sr-shoplookbook",
							"sr-slider",
							"sr-blogposts",
							"sr-imagebutton",
							"sr-shopcategories",
							"sr-instagram"
							));
	 
	// opening tag
	$rep = preg_replace("/(<p>)?\[($block)(\s[^\]]+)?\](<\/p>|<br \/>)?/","[$2$3]",$content);
	// closing tag
	$rep = preg_replace("/(<p>)?\[\/($block)](<\/p>|<br \/>)?/","[/$2]",$rep);
	return $rep;
 
}


?>