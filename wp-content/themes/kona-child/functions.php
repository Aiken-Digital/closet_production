<?php 


/*-----------------------------------------------------------------------------------

	Theme CHILD functions.php

-----------------------------------------------------------------------------------*/
add_action( 'wp_enqueue_scripts', 'kona_child_enqueue_styles', 1 );
function kona_child_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}


/*-----------------------------------------------------------------------------------
	
	* Your Custom Functions
	* Place your custom functions below

-----------------------------------------------------------------------------------*/

if( function_exists( 'acf_add_options_page' ) ) {
    acf_add_options_page( 
        array(
            'page_title' => 'Apps Setting',
            'menu_title' => 'Apps Setting',
            'menu_slug' => 'app-setting',
            'icon_url' => 'dashicons-admin-site',
            'position' => 81
        ) 
    );

}


function woocommerce_brand_summary() {
	global $post;
	$brands = wp_get_post_terms( $post->ID, 'product_brand', array("fields" => "all") );
	foreach( $brands as $brand ) {
        $url = home_url().'/designer/'.$brand->slug;
		echo '<h3><a href="'.$url.'" target="_blank" title="'.$brand->name.'">'.$brand->name.'</a></h3>';
		_e('<p>'.$brand->description.'</p>');
	}
}

function woocommerce_brand_name()
{
    global $post;
    $brands = wp_get_post_terms( $post->ID, 'product_brand', array('fields' => 'all'));
    foreach ($brands as $brand) {
        echo $brand->name;
        if ($i >= 1) {break;}
    }
}

function woocommerce_category_name()
{
    global $post;
    $brands = wp_get_post_terms( $post->ID, 'product_cat', array('fields' => 'all'));
    foreach ($brands as $brand) {
        echo $brand->name;
        if ($i >= 1) {break;}
    }
}

add_shortcode('brand_summary', 'woocommerce_brand_summary');

function get_all_brand()
{
    $terms = get_terms( array( 'taxonomy' => 'product_brand') );
    $arr = array();
    foreach ($terms as $key => $value) {
        $arr[$key] = $value->slug;
    }

    sort($arr, SORT_NATURAL | SORT_FLAG_CASE);
    $output_array = array();
    foreach ($arr as $key) {
        $first = strtoupper($key[0]);
        if (!isset($output_array[$first])) {
            $ouput_array[$first] = array();
        }
        $output_array[$first][] = $key;
    }
    return $output_array;
}


function get_this_page()
{
    global $wp;
    $current_url = home_url( add_query_arg( array(), $wp->request ) );
    return $current_url;
}

function language_param()
{
    global $wp;
    $data = add_query_arg( array(), $wp->request );
    $rep = str_replace('/closet', '', $data);
    return $data;   
}

function my_account_menu_order() {
 	$menuOrder = array(
 		'dashboard'          => __( '[:jp]マイアカウント[:en]Dashboard', 'woocommerce' ),
 		'orders'             => __( '[:jp]注文・注文履歴[:en]Orders', 'woocommerce' ),
 		'edit-address'       => __( '[:jp]登録住所[:en]Addresses', 'woocommerce' ),
 		'edit-account'    	 => __( '[:jp]基本情報[:en]Account Details', 'woocommerce' ),
// 		'woo-wallet'		 =>	__( '[:jp]私の財布[:en]My Wallet', 'woocommerce' ),
		'tinv_wishlist'      => __( '[:jp]ほしい物リスト[:en]Wishlist', 'woocommerce' ),
		'customer-logout'    => __( '[:jp]ログアウト[:en]Logout', 'woocommerce' ),
 	);
 	return $menuOrder;
}

function remove_my_account_links( $menu_links ){
    unset( $menu_links['refund-requests'] ); 
    return $menu_links;
}

function convert_to_jpy($val)
{   
  global $WOOCS;
  $currencies = $WOOCS->get_currencies();
  $val = $val * number_format($currencies['JPY']['rate'], 2);
  return '¥'.number_format($val);
}


add_filter ( 'woocommerce_account_menu_items', 'remove_my_account_links', 999 );
add_filter ( 'woocommerce_account_menu_items', 'my_account_menu_order' );
?>