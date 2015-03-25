<?php

/*********************
LAUNCH 
*********************/

function bones_head_cleanup() {
	remove_action( 'wp_head', 'rsd_link' );
	remove_action( 'wp_head', 'wlwmanifest_link' );
	remove_action( 'wp_head', 'index_rel_link' );
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
	remove_action( 'wp_head', 'wp_generator' );
	add_filter( 'style_loader_src', 'bones_remove_wp_ver_css_js', 9999 );
	add_filter( 'script_loader_src', 'bones_remove_wp_ver_css_js', 9999 );
	remove_action( 'wp_head', 'admin-bar-css' );
	remove_action('wp_head', '_admin_bar_bump_cb');
	add_filter('show_admin_bar', '__return_false');
}
// A better title
// http://www.deluxeblogtips.com/2012/03/better-title-meta-tag.html
function rw_title( $title, $sep, $seplocation ) {
  global $page, $paged;
  if ( is_feed() ) return $title;
  
  if ( 'right' == $seplocation ) {
    $title .= get_bloginfo( 'name' );
  } else {
    $title = get_bloginfo( 'name' ) . $title;
  }
  $site_description = get_bloginfo( 'description', 'display' );
  if ( $site_description && ( is_home() || is_front_page() ) ) {
    $title .= " {$sep} {$site_description}";
  }
  if ( $paged >= 2 || $page >= 2 ) {
    $title .= " {$sep} " . sprintf( __( 'Page %s', 'dbt' ), max( $paged, $page ) );
  }
  return $title;
}

function bones_rss_version() { return ''; }

function bones_remove_wp_ver_css_js( $src ) {
	if ( strpos( $src, 'ver=' ) )
		$src = remove_query_arg( 'ver', $src );
	return $src;
}
/*********************
SCRIPTS & ENQUEUEING
*********************/
function bones_scripts_and_styles() {

  global $wp_styles;

  if (!is_admin()) {
		// modernizr
		wp_register_script( 'modernizr', get_stylesheet_directory_uri() . '/js/vendor/modernizr.js', array(), '', false );	
		// register main stylesheet
		wp_register_style( 'normalize-stylesheet', get_stylesheet_directory_uri() . '/css/normalize.css', array(), '', 'all' );
		wp_register_style( 'foundation-stylesheet', get_stylesheet_directory_uri() . '/css/foundation.css', array(), '', 'all' );
		wp_register_style( 'fontawesome-stylesheet', get_stylesheet_directory_uri() . '/css/font-awesome.min.css', array(), '', 'all' );
		wp_register_style( 'slicknav-stylesheet', get_stylesheet_directory_uri() . '/css/slicknav.css', array(), '', 'all' );
		wp_register_style( 'main-stylesheet', get_stylesheet_directory_uri() . '/style.css', array(), '', 'all' );
		//adding scripts file in the footer
		wp_register_script( 'jquery-js', 'http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js', array(), '', true );
		wp_register_script( 'foundation-js', get_stylesheet_directory_uri() . '/js/foundation/foundation.js', array(), '', true );
		wp_register_script( 'equalizer-js', get_stylesheet_directory_uri() . '/js/foundation/foundation.equalizer.js', array(), '', true );
		wp_register_script( 'magellan-js', get_stylesheet_directory_uri() . '/js/foundation/foundation.magellan.js', array(), '', true );
		wp_register_script( 'slicknav-js', get_stylesheet_directory_uri() . '/js/jquery.slicknav.min.js', array(), '', true );
		wp_register_script( 'oropo-js', get_stylesheet_directory_uri() . '/js/scripts.js', array(), '', true );
		// enqueue styles and scripts
		wp_enqueue_script( 'modernizr' );
		wp_enqueue_style( 'normalize-stylesheet' );
		wp_enqueue_style( 'foundation-stylesheet' );
		wp_enqueue_style( 'fontawesome-stylesheet' );
		wp_enqueue_style( 'slicknav-stylesheet' );
		wp_enqueue_style( 'main-stylesheet' );	
		wp_enqueue_script( 'jquery-js' );
		wp_enqueue_script( 'foundation-js' );
		wp_enqueue_script( 'equalizer-js' );
		wp_enqueue_script( 'magellan-js' );
		wp_enqueue_script( 'slicknav-js' );
		wp_enqueue_script( 'oropo-js' );
	}
}
/*********************
THEME SUPPORT
*********************/
function bones_theme_support() {
	add_theme_support( 'post-thumbnails' );
	add_theme_support('automatic-feed-links');
	add_theme_support( 'menus' );

	register_nav_menus(
		array(
			'main-nav' => __( 'The Main Menu', 'bonestheme' ),
		)
	);
}
/*********************
LAUNCH THEME
*********************/
function bones_ahoy() {
  add_action( 'init', 'bones_head_cleanup' );
  add_filter( 'wp_title', 'rw_title', 10, 3 );
  add_filter( 'the_generator', 'bones_rss_version' );
  add_action( 'wp_enqueue_scripts', 'bones_scripts_and_styles', 999 );
  bones_theme_support();
  add_action( 'widgets_init', 'bones_register_sidebars' );
}
add_action( 'after_setup_theme', 'bones_ahoy' );
/*********************
SIDEBARS
*********************/
function bones_register_sidebars() {
	register_sidebar(array(
		'id' => 'news',
		'name' => __( 'Blog', 'bonestheme' ),
		'description' => __( 'Blog sidebar', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget xsell blog-menu">',
		'after_widget' => ' </div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
}
/*********************
OPTIONS PAGES
*********************/
if( function_exists('acf_add_options_sub_page') )
{
    acf_add_options_sub_page( 'General' );
	acf_add_options_sub_page( 'Homepage' );
	acf_add_options_sub_page( 'Footer' );
}
/*********************
FIRST/LAST CLASS
*********************/
function add_first_and_last($output) {
  $output = preg_replace('/class="menu-item/', 'class="first-menu-item menu-item', $output, 1);
  $output = substr_replace($output, 'class="last-menu-item menu-item', strripos($output, 'class="menu-item'), strlen('class="menu-item'));
  return $output;
}
add_filter('wp_nav_menu', 'add_first_and_last');
/*********************
EXCERPTS
*********************/
function wpe_excerptlength_teaser($length) {
    return 45;
}
function wpe_excerptlength_index($length) {
    return 30;
}
function wpe_excerptmore($more) {
    return '...';
}
function wpe_excerpt($length_callback='', $more_callback='') {
    global $post;
    if(function_exists($length_callback)){
        add_filter('excerpt_length', $length_callback);
    }
    if(function_exists($more_callback)){
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>'.$output.'</p>';
    echo $output;
}

?>