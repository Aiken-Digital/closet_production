<?php
/**
 * Plugin Name: Kona Core
 * Plugin URI: http://spab-rice.com
 * Description: Kona Core plugin to activate portfolio,shortcodes,widgets,etc...
 * Version: 2.1
 * Author: Spab Rice
 * Author URI: http://spab-rice.com
 * License: GPL2
 */
 
 
$kona_core_version = '2.1';
 
define( 'ORIO_CORE_PATH', plugin_dir_path(__FILE__) );
 
require_once( ORIO_CORE_PATH . 'shortcodes/shortcodes.php' );
 
require_once( ORIO_CORE_PATH . 'pagebuilder/pagebuilder.php' );
require_once( ORIO_CORE_PATH . 'pagebuilder/pagebuilder-frontend.php' );

require_once( ORIO_CORE_PATH . 'theme-postmeta.php' );				/* for theme check plugin (add_post_meta outside of theme) */

require_once( ORIO_CORE_PATH . 'widgets/kona-instagram.php' );


/*-----------------------------------------------------------------------------------*/
/*	Register new Post-type
/*-----------------------------------------------------------------------------------*/ 
add_action('init', 'kona_portfolio_post_type');

function kona_portfolio_post_type(){
	
	$rewriteSlug = "portfolio";
	if (get_option('_sr_portfoliourl') && get_option('_sr_portfoliourl') !== "") { 
		$rewriteSlug = get_option('_sr_portfoliourl');
	} 
	
	register_post_type('portfolio', array(
		'labels' => array(
				'name' => esc_html__("Portfolio", 'kona'),
				'singular_name' => esc_html__("Portfolio", 'kona')
			),
		'public' => true,
		'show_ui' => true,
		'supports' => array('title', 'editor', 'thumbnail', 'comments', 'revisions','excerpt'),
		'menu_icon' => 'dashicons-portfolio',
		'menu_position'   => 5,
		'rewrite' => array(
			'slug' => $rewriteSlug,
			'with_front' => false
			),
		'has_archive' => false,
		'query_var' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'exclude_from_search' => false,
		'publicly_queryable' => true
	) );
	
}



/*-----------------------------------------------------------------------------------*/
/*	Add taxonomies
/*-----------------------------------------------------------------------------------*/
add_action('init', 'kona_portfolio_taxonomies', 0);
function kona_portfolio_taxonomies(){
	// Categories Portfolio
	register_taxonomy(
		'portfolio_category',
		'portfolio',
		array(
			'hierarchical' => true,
			'label' => esc_html__("Portfolio categories", 'kona'),
			'query_var' => true,
			'rewrite' => true,
			'show_admin_column' => true
		)
	);
}



/*-----------------------------------------------------------------------------------*/
/*	Enable shortcodes on the core text widget (plugin territory)
/*-----------------------------------------------------------------------------------*/
add_filter('widget_text', 'do_shortcode'); 
 ?>