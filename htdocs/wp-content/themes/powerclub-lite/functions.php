<?php      
/**
 * Powerclub Lite functions and definitions
 *
 * @package Powerclub Lite
 */

function powerclub_lite_custom_excerpt_length( $length ) {
	return 30;
}
add_filter( 'excerpt_length', 'powerclub_lite_custom_excerpt_length', 999 );
 

/**
 * Set the content width based on the theme's design and stylesheet.
 */

if ( ! function_exists( 'powerclub_lite_setup' ) ) : 
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function powerclub_lite_setup() {
	global $content_width;
	if ( ! isset( $content_width ) )
		$content_width = 650; /* pixels */

	load_theme_textdomain( 'powerclub-lite', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support('woocommerce');
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-header', array( 
		'default-text-color' => false,
		'header-text' => false,
	) );
	add_theme_support( 'title-tag' );
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'powerclub-lite' ),
		'footer' => __( 'Footer Menu', 'powerclub-lite' ),
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );
	
	add_theme_support( 'custom-logo', array(
		'height'      => 150,
		'width'       => 150,
		'flex-height' => true,
	) );
	add_editor_style( 'editor-style.css' );
} 
endif; // powerclub_lite_setup
add_action( 'after_setup_theme', 'powerclub_lite_setup' );


function powerclub_lite_widgets_init() { 	
	
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'powerclub-lite' ),
		'description'   => __( 'Appears on blog page sidebar', 'powerclub-lite' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',		
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
		
	) );
	
	register_sidebar( array(
		'name'          => __( 'Header Widget', 'powerclub-lite' ),
		'description'   => __( 'Appears on top of the header', 'powerclub-lite' ),
		'id'            => 'header-widget',
		'before_widget' => '<aside id="%1$s" class="headerinfo %2$s">',
		'after_widget'  => '</aside>',		
		'before_title'  => '<h3 class="widget-title" style="display:none;">',
		'after_title'   => '</h3>',
		
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Widget 1', 'powerclub-lite' ),
		'description'   => __( 'Appears on footer', 'powerclub-lite' ),
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="cols-4 widget-column-1 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Widget 2', 'powerclub-lite' ),
		'description'   => __( 'Appears on footer', 'powerclub-lite' ),
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="cols-4 widget-column-2 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Widget 3', 'powerclub-lite' ),
		'description'   => __( 'Appears on footer', 'powerclub-lite' ),
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="cols-4 widget-column-3 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Widget 4', 'powerclub-lite' ),
		'description'   => __( 'Appears on footer', 'powerclub-lite' ),
		'id'            => 'footer-4',
		'before_widget' => '<aside id="%1$s" class="cols-4 widget-column-4 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );	
	
}
add_action( 'widgets_init', 'powerclub_lite_widgets_init' );


function powerclub_lite_font_url(){
		$font_url = '';		
		
		/* Translators: If there are any character that are not
		* supported by Roboto, trsnalate this to off, do not
		* translate into your own language.
		*/
		$roboto = _x('on','roboto:on or off','powerclub-lite');			
		
		if('off' !== $roboto ){
			$font_family = array();
			
			if('off' !== $roboto){
				$font_family[] = 'Roboto:300,400,600,700,800,900';
			}					
						
			$query_args = array(
				'family'	=> urlencode(implode('|',$font_family)),
			);
			
			$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
		}
		
	return $font_url;
	}


function powerclub_lite_scripts() {
	wp_enqueue_style('powerclub-lite-font', powerclub_lite_font_url(), array());
	wp_enqueue_style( 'powerclub-lite-basic-style', get_stylesheet_uri() );	
	wp_enqueue_style( 'nivo-slider', get_template_directory_uri()."/css/nivo-slider.css" );
	wp_enqueue_style( 'powerclub-lite-responsive', get_template_directory_uri()."/css/responsive.css" );		
	wp_enqueue_style( 'powerclub-lite-default', get_template_directory_uri()."/css/default.css" );
	wp_enqueue_script( 'jquery-nivo-slider', get_template_directory_uri() . '/js/jquery.nivo.slider.js', array('jquery') );
	wp_enqueue_script( 'powerclub-lite-custom', get_template_directory_uri() . '/js/custom.js' );	
	wp_enqueue_style( 'font-awesome', get_template_directory_uri()."/css/font-awesome.css" );
		

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'powerclub_lite_scripts' );

function powerclub_lite_ie_stylesheet(){
	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style('powerclub-lite-ie', get_template_directory_uri().'/css/ie.css', array( 'powerclub-lite-style' ), '20160928' );
	wp_style_add_data('powerclub-lite-ie','conditional','lt IE 10');
	
	// Load the Internet Explorer 8 specific stylesheet.
	wp_enqueue_style( 'powerclub-lite-ie8', get_template_directory_uri() . '/css/ie8.css', array( 'powerclub-lite-style' ), '20160928' );
	wp_style_add_data( 'powerclub-lite-ie8', 'conditional', 'lt IE 9' );

	// Load the Internet Explorer 7 specific stylesheet.
	wp_enqueue_style( 'powerclub-lite-ie7', get_template_directory_uri() . '/css/ie7.css', array( 'powerclub-lite-style' ), '20160928' );
	wp_style_add_data( 'powerclub-lite-ie7', 'conditional', 'lt IE 8' );	
	}
add_action('wp_enqueue_scripts','powerclub_lite_ie_stylesheet');



define('POWERCLUB_LITE_PROURL','http://gracethemes.com/themes/fitness-wordpress-theme/','powerclub-lite');
define('POWERCLUB_LITE_THEMEDOC','http://gracethemes.com/documentation/powerclub-doc/','powerclub-lite');
define('POWERCLUB_LITE_LIVEDEMO','http://gracethemes.com/demo/powerclub/','powerclub-lite');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template for about theme.
 */
require get_template_directory() . '/inc/about-themes.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

//Custom Logo
if ( ! function_exists( 'powerclub_lite_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 */
function powerclub_lite_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;