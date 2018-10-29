<?php

// ----------------------------------------------------------------------------------
//	Register Front-End Styles And Scripts
// ----------------------------------------------------------------------------------

function alante_thinkup_child_frontscripts() {

	wp_enqueue_style( 'alante-thinkup-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'alante-thinkup-style-grid', get_stylesheet_directory_uri() . '/style.css', array( 'alante-thinkup-style' ), wp_get_theme()->get('Version') );
}
add_action( 'wp_enqueue_scripts', 'alante_thinkup_child_frontscripts' );





