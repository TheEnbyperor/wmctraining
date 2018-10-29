<?php
/*
 * Publisho Theme's Functions file, this is the heart of theme, modification directly is not recommended.
 * @since Publisho 1.0
 */
/*
 * Primary content width according to the design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 700;

/*
 * Publisho supported features and Registering defaults
 */
if( !function_exists( 'publisho_setup' ) ) :

function publisho_setup() {
	/*
	 * Making Publisho ready for translation.
	 * Translations can be added to the /languages/ directory. Sample publisho.pot file is included.
	 */
	load_theme_textdomain( 'publisho', get_template_directory() . '/languages' );
	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );
	// Adds support for Navigation menu, Publisho uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', esc_html__( 'Primary Menu', 'publisho' ) );
	register_nav_menu( 'tophead', esc_html__( 'Top Header Menu', 'publisho' ) );
	// Publisho supports custom background color and image using default wordpress funtions.
	add_theme_support( 'custom-background', array(
		'default-color' => 'e8e8e8',
	) );
	// Let WordPress manage the page title
	add_theme_support( 'title-tag' );
	//Enable support for custom logo.
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-width' => true,
		'flex-height' => true,
	) );
	// Woocommerce support
	add_theme_support( 'woocommerce' );
	// Uncomment the following two lines to add support for post thumbnails - for classic blog layout
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 782, 9999 ); // Unlimited height, soft crop
	//Defining home page thumbnail size
	add_image_size('publisho-large-two', 370, 200, true);
	add_image_size('publisho-large', 267, 140, true);
	add_image_size('publisho-small', 100, 70, true);
}
endif; //Publisho setup
add_action( 'after_setup_theme', 'publisho_setup' );


 /*
 * Loads the Publisho Customizer for live customization, to learn more visit Themonic.com
 */
require_once( get_template_directory() . '/inc/themonic-customizer.php' );
require_once( get_template_directory() . '/inc/extra-functions.php' );
require_once( get_template_directory() . '/inc/common-functions.php' );
require_once( get_template_directory() . '/inc/widgets/widgets.php' );
require( get_template_directory() . '/inc/themonic-sanitizer.php' );
require_once( get_template_directory() . '/inc/pro/class-customize.php' );

/*
 * Enqueueing scripts and styles for front-end of the Themonic Framework.
 * @since Publisho 1.0
 */ 
function publisho_scripts_styles() {
	global $wp_styles;

	/*
	 * Adds JavaScript to pages with the comment form to support
	 * sites with threaded comments (when in use).
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

 /*
	 * Adds Slicknav.js JavaScript for handling the navigation menu and creating a select based navigation for responsive layout.
 */
	wp_enqueue_script('publisho-mobile-navigation', get_template_directory_uri() . '/js/slicknav.js', array('jquery'));
   /*
     * Loads the awesome readable Roboto font CSS file for Publisho.
*/
    if ( 'off' !== _x( 'on', 'Roboto font: on or off', 'publisho' ) ) {
        $subsets = 'latin,latin-ext';
        $protocol = is_ssl() ? 'https' : 'http';
        $query_args = array(
            'family' => 'Roboto:400,500,700',
            'subset' => $subsets,
        );
        wp_enqueue_style( 'publisho-fonts', add_query_arg( $query_args, "$protocol://fonts.googleapis.com/css" ), array(), null );
    }
	/*
	 * Loads Publisho's main stylesheet and the custom stylesheet.
	 */
	wp_enqueue_style( 'publisho-style', get_stylesheet_uri() );

	// Loads the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'publisho-ie', get_template_directory_uri() . '/css/ie.css', array( 'publisho-style' ), '20160606' );
	wp_style_add_data( 'publisho-ie', 'conditional', 'lt IE 9' );
	
	// Loads the html5 shiv.
	wp_enqueue_script( 'publisho-html5', get_template_directory_uri() . '/js/html5.js', array(), '3.7.3' );
	wp_script_add_data( 'publisho-html5', 'conditional', 'lt IE 9' );
}
add_action( 'wp_enqueue_scripts', 'publisho_scripts_styles' );

/*
 * Default Nav Menu fallback to Pages menu, 
 * Makes our wp_nav_menu() fallback -- wp_page_menu() -- show a home link.
 * @since Publisho 1.0
 */
function publisho_page_menu_args( $args ) {
	if ( ! isset( $args['show_home'] ) )
		$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'publisho_page_menu_args' );

/**
 * Registers the main widgetized sidebar area.
 *
 * @since publisho 1.0
 */
function publisho_widgets_init() {
	   // Define Main Sidebar Widget Area
	register_sidebar( array(
		'name' => esc_html__( 'Main Sidebar', 'publisho' ),
		'id' => 'themonic-sidebar',
		'description' => esc_html__( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'publisho' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<p class="widget-title">',
		'after_title' => '</p>',
	) );
	
	   // Define Footer Widget Area
    register_sidebar(array(
        'name' => esc_html__('Footer Widget One', 'publisho'),
        'description' => esc_html__('Footer widget one, Enable this area from Control Panel >> Main Settings', 'publisho'),
        'id' => 'footer-one',
        'before_widget' => '<div id="%1$s" class=" widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<p class="widget-title">',
        'after_title' => '</p>'
    ));
	   register_sidebar(array(
        'name' => esc_html__('Footer Widget Two', 'publisho'),
        'description' => esc_html__('Footer widget two', 'publisho'),
        'id' => 'footer-two',
        'before_widget' => '<div id="%1$s" class=" widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<p class="widget-title">',
        'after_title' => '</p>'
    ));
	   register_sidebar(array(
        'name' => esc_html__('Footer Widget Three', 'publisho'),
        'description' => esc_html__('Footer widget three', 'publisho'),
        'id' => 'footer-three',
        'before_widget' => '<div id="%1$s" class=" widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<p class="widget-title">',
        'after_title' => '</p>'
    ));
	register_sidebar(array(
        'name' => esc_html__('Header Widget Area', 'publisho'),
        'description' => esc_html__('Head Widget Area for Ads', 'publisho'),
        'id' => 'pmt-tophead-banner',
        'before_widget' => '<div id="%1$s" class=" widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<p class="widget-title">',
        'after_title' => '</p>'
    ));
}
add_action( 'widgets_init', 'publisho_widgets_init' );

if ( ! function_exists( 'publisho_content_nav' ) ) :
/**
 * Displays navigation to next/previous pages when applicable.
 *
 * @since Publisho 1.0
 */
function publisho_content_nav( $html_id ) {
	global $wp_query;

	$html_id = esc_attr( $html_id );

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav id="<?php echo esc_attr($html_id); ?>" class="navigation" role="navigation">
			<div class="assistive-text"><?php esc_html_e( 'Post navigation', 'publisho' ); ?></div>
			<div class="nav-previous alignleft"><?php next_posts_link( esc_html__( '&larr; Older posts', 'publisho' ) ); ?></div>
			<div class="nav-next alignright"><?php previous_posts_link( esc_html__( 'Newer posts &rarr;', 'publisho' ) ); ?></div>
		</nav><!-- #<?php echo esc_attr($html_id); ?> .navigation -->
	<?php endif;
}
endif;

if ( ! function_exists( 'publisho_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own publisho_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Publisho 1.0
 */
function publisho_comment( $comment, $args, $depth ) {
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php esc_html_e( 'Pingback:', 'publisho' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( esc_html__( '(Edit)', 'publisho' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<header class="comment-meta comment-author vcard">
				<?php
					echo get_avatar( $comment, 30 );
					printf( '<cite class="fn">%1$s %2$s</cite>',
						get_comment_author_link(),
						// Adds Post Author to comments posted by the article writer
						( $comment->user_id === $post->post_author ) ? '<span> ' . esc_html__( 'Post author', 'publisho' ) . '</span>' : ''
					);
					printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
						esc_url( get_comment_link( $comment->comment_ID ) ),
						get_comment_time( 'c' ),
						/* translators: 1: date */
						sprintf( get_comment_date() )
					);
				?>
			</header><!-- .comment-meta -->

			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'publisho' ); ?></p>
			<?php endif; ?>

			<section class="comment-content comment">
				<?php comment_text(); ?>
				<?php edit_comment_link( esc_html__( 'Edit', 'publisho' ), '<p class="edit-link">', '</p>' ); ?>
			</section><!-- .comment-content -->

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => esc_html__( 'Reply', 'publisho' ), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->
	<?php
		break;
	endswitch; // end comment_type check
}
endif;