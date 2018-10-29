<?php
/**
 * Register Portfolio menu in admin area.
 *
 * @package ThinkUpThemes
 */


/* ----------------------------------------------------------------------------------
	Add Portfolios Menu to Admin
---------------------------------------------------------------------------------- */
function thinkup_register_portfoliopost() {
	$labels = array(
		'name'               => _x( 'Portfolio', 'post type general name', 'alante' ),
		'singular_name'      => _x( 'Portfolio', 'post type singular name', 'alante' ),
		'add_new'            => _x( 'Add New', 'portfolio', 'alante' ),
		'add_new_item'       => __( 'Add New Portfolio', 'alante' ),
		'edit_item'          => __( 'Edit Portfolio', 'alante' ),
		'new_item'           => __( 'New Portfolio', 'alante' ),
		'view_item'          => __( 'View Portfolio', 'alante' ),
		'search_items'       => __( 'Search Portfolios', 'alante' ),
		'not_found'          => __( 'No portfolios found', 'alante' ),
		'not_found_in_trash' => __( 'No portfolios found in Trash', 'alante' ),
		'parent_item_colon'  => '',
		'menu_name'          => __( 'Portfolio', 'alante' ),
	);
	  
	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'portfolio' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => true,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
		'taxonomies'         => array('category'),
		'menu_icon'          => 'dashicons-format-gallery'
	);

	/* Register Portfolio menu */
	register_post_type( 'portfolio', $args );


	/* Fixes redirect to 404 error template */
	flush_rewrite_rules();
	  
	/* Initialise New Taxonomy Labels */
	$labels = array(
		'name'              => _x( 'Tags', 'taxonomy general name', 'alante' ),
		'singular_name'     => _x( 'Tag', 'taxonomy singular name', 'alante' ),
		'search_items'      => __( 'Search Types', 'alante' ),
		'all_items'         => __( 'All Tags', 'alante' ),
		'parent_item'       => __( 'Parent Tag', 'alante' ),
		'parent_item_colon' => __( 'Parent Tag:', 'alante' ),
		'edit_item'         => __( 'Edit Tags', 'alante' ),
		'update_item'       => __( 'Update Tag', 'alante' ),
		'add_new_item'      => __( 'Add New Tag', 'alante' ),
		'new_item_name'     => __( 'New Tag Name', 'alante' ),
	);

	/*  Register custom taxonomy for Portfolio tags */
	register_taxonomy( 'tagportfolio', array( 'portfolio' ), array(
		'hierarchical' => true,
		'labels'       => $labels,
		'show_ui'      => true,
		'query_var'    => true,
		'rewrite'      => array( 'slug' => 'tag-portfolio' ),
	));
	  
}
add_action('init', 'thinkup_register_portfoliopost');
	

/* ----------------------------------------------------------------------------------
	Custom Portfolio Messages
---------------------------------------------------------------------------------- */
function thinkup_register_portfoliomessages( $messages ) {
global $post, $post_ID;

	$messages[ 'portfolio' ] = array(
		0 => '',
		1 => sprintf( 'Portfolio updated. <a href="%s">View portfolio</a>', esc_url( get_permalink( $post_ID ) ) ),
		2 => 'Custom field updated.',
		3 => 'Custom field deleted.',
		4 => 'Portfolio updated.',
		5 => isset($_GET[ 'revision' ]) ? sprintf( 'Portfolio restored to revision from %s', wp_post_revision_title( (int) 

$_GET[ 'revision' ], false ) ) : false,
		6 => sprintf( 'Portfolio published. <a href="%s">View portfolio</a>', esc_url( get_permalink( $post_ID ) ) ),
		7 => 'Portfolio saved.',
		8 => sprintf( 'Portfolio submitted. <a target="_blank" href="%s">Preview portfolio</a>', esc_url( add_query_arg( 'preview', 

'true', get_permalink( $post_ID ) ) ) ),
		9 => sprintf( 'Portfolio scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview portfolio</a>',
		  date_i18n( 'M j, Y @ G:i', strtotime( $post->post_date ) ), esc_url( get_permalink( $post_ID ) ) ),
		10 => sprintf( 'Portfolio draft updated. <a target="_blank" href="%s">Preview portfolio</a>', esc_url( add_query_arg( 'preview', 

'true', get_permalink( $post_ID ) ) ) ),
	);
	return $messages;
}
add_filter( 'post_updated_messages', 'thinkup_register_portfoliomessages' );