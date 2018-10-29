<?php
/**
 * @package Powerclub Lite
 * Setup the WordPress core custom header feature.
 *
 * @uses powerclub_lite_header_style()
 */
function powerclub_lite_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'powerclub_lite_custom_header_args', array(		
		'default-text-color'     => 'ffffff',
		'width'                  => 1400,
		'height'                 => 280,
		'wp-head-callback'       => 'powerclub_lite_header_style',		
	) ) );
}
add_action( 'after_setup_theme', 'powerclub_lite_custom_header_setup' );

if ( ! function_exists( 'powerclub_lite_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see powerclub_lite_custom_header_setup().
 */
function powerclub_lite_header_style() {
	$header_text_color = get_header_textcolor();
	?>
	<style type="text/css">
	<?php
		//Check if user has defined any header image.
		if ( get_header_image() || get_header_textcolor() ) :
	?>
		.header {
			background: url(<?php echo esc_url( get_header_image() ); ?>) no-repeat;
			background-position: center top;
		}
	<?php endif; ?>	
	</style>
	<?php 
}
endif; // powerclub_lite_header_style