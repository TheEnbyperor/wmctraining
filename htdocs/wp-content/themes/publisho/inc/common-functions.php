<?php
/**
 * Common Functions
 */
 function publisho_excerpt_length( $length ) {
	if ( is_admin() ) {
		return $length;
	}
	return 42;
}
add_filter( 'excerpt_length', 'publisho_excerpt_length', 999 );
 
 /* Adding Read More button after excerpts */
	if( !function_exists( 'publisho_excerpt_more' ) ) :
		function publisho_excerpt_more($more) {
		global $post;
		if ( is_admin() ) {
			return $more;
		}
		return '&hellip;<span class="read-more"><a href="'. get_permalink($post->ID) . '">' . esc_html__( 'Read More', 'publisho' ) . ' &raquo;</a></span>';
		}
		add_filter('excerpt_more', 'publisho_excerpt_more');
	endif; //publisho_excerpt_more
	
	/*
 * WordPress body class Extender :
 * 1. Using a full-width layout without widgets.
 * 2. White or empty background color.
 * 3. Custom fonts enabled.
 * 4. Single or multiple authors.
 *
 * @since Publisho 1.0
 */
function publisho_body_class( $classes ) {
	$background_color = get_background_color();

	if ( is_page_template( 'page-templates/full-width.php' ) )
		$classes[] = 'full-width';

	if ( empty( $background_color ) )
		$classes[] = 'custom-background-empty';
	elseif ( in_array( $background_color, array( 'fff', 'ffffff' ) ) )
		$classes[] = 'custom-background-white';

	// Enable custom font class only if the font CSS is queued to load.
	if ( wp_style_is( 'publisho-fonts', 'queue' ) )
		$classes[] = 'custom-font-enabled';

	if ( ! is_multi_author() )
		$classes[] = 'single-author';
	
	if ( is_front_page() ) {
		$classes[] = 'frontp';
	}
	if ( !is_front_page() && !is_single() ) {
		$classes[] = 'nofrontp';
	}
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
	return $classes;
}
add_filter( 'body_class', 'publisho_body_class' );

/*
 * Adjusts content_width value for full-width and single image attachment
 * templates, and when there are no active widgets in the sidebar.
 *
 * @since Publisho 1.0
 */
function publisho_content_width() {
	if ( is_page_template( 'page-templates/full-width.php' ) || is_attachment() || ! is_active_sidebar( 'themonic-sidebar' ) ) {
		global $content_width;
		$content_width = 1240;
	}
}

function publisho_wp_media_files() {
    $current_screen = get_current_screen();
    if( $current_screen ->id === "widgets" || $current_screen === "customize" ) {
		wp_enqueue_media();
    }  
}
add_action( 'admin_enqueue_scripts', 'publisho_wp_media_files' );

if ( ! function_exists( 'publisho_the_custom_logo' ) ) :

/**
 * Displays the optional custom logo.
 */
function publisho_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;

?>
