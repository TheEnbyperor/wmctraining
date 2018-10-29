<?php
/*
 * Publisho Customizer - visit Themonic.com
 * @since Publisho 1.0
 */
//Themonic customizer begins
function publisho_theme_customizer( $wp_customize ) {
     
	//Control Panel begins
	$wp_customize->add_panel('publisho_pro_control_panel', array(
	'capabitity' => 'edit_theme_options',
	'description' => esc_html__('Theme Options', 'publisho'),
	'priority' => 1,
	'title' => esc_html__('Control Panel', 'publisho')
	));
	$wp_customize->add_section('publisho_pro_control_panel_sec_one', array(
	'priority' => 1,
	'title' => esc_html__('Layout Settings', 'publisho'),
	'panel' => 'publisho_pro_control_panel'
	));
	//Theme Settings
	$wp_customize->add_section('publisho_pro_control_panel_sec_three', array(
      'priority' => 2,
      'title' => esc_html__('Main Theme Settings', 'publisho'),
      'panel' => 'publisho_pro_control_panel'
	));
	$wp_customize->add_setting( 'publisho_pro_full_post', array(
	'default' => '1',
	'sanitize_callback' => 'publisho_sanitize_checkbox',
	));
	$wp_customize->add_control('publisho_pro_full_post',array(
	'type' => 'checkbox',
	'label' => esc_html__( 'Show Excerpts on Home Page, remove the check to show full posts on home page. Info: Excerpts prevents duplicate content and helps with SEO', 'publisho' ),
	'section' => 'publisho_pro_control_panel_sec_three',
	));
	$wp_customize->add_setting( 'publisho_pro_date_home', array(
	'default' => '',
	'sanitize_callback' => 'publisho_sanitize_checkbox',
	));
	$wp_customize->add_control('publisho_pro_date_home',array(
	'type' => 'checkbox',
	'label' => esc_html__( 'Show Date/Author Bar on Home Page', 'publisho' ),
	'section' => 'publisho_pro_control_panel_sec_three',
	));
	$wp_customize->add_setting( 'publisho_pro_updated_date', array(
	'default' => '',
	'sanitize_callback' => 'publisho_sanitize_checkbox',
	));
	$wp_customize->add_control('publisho_pro_updated_date',array(
	'type' => 'checkbox',
	'label' => esc_html__( 'Replace published date with last updated date', 'publisho' ),
	'section' => 'publisho_pro_control_panel_sec_three',
	));
	$wp_customize->add_setting( 'publisho_catg_home', array(
	'default' => '1',
	'sanitize_callback' => 'publisho_sanitize_checkbox',
	));
	$wp_customize->add_control('publisho_catg_home',array(
	'type' => 'checkbox',
	'label' => esc_html__( 'Show Categories on Home Page', 'publisho' ),
	'section' => 'publisho_pro_control_panel_sec_three',
	));
	$wp_customize->add_setting( 'publisho_tag_home', array(
	'default' => '1',
	'sanitize_callback' => 'publisho_sanitize_checkbox',
	));
	$wp_customize->add_control('publisho_tag_home',array(
	'type' => 'checkbox',
	'label' => esc_html__( 'Show Tags on Home Page', 'publisho' ),
	'section' => 'publisho_pro_control_panel_sec_three',
	));
	$wp_customize->add_setting( 'publisho_pro_featured_image_single', array(
	'default' => '1',
	'sanitize_callback' => 'publisho_sanitize_checkbox',
	));
	$wp_customize->add_control('publisho_pro_featured_image_single',array(
	'type' => 'checkbox',
	'label' => esc_html__( 'Show featured image on single post/page', 'publisho' ),
	'section' => 'publisho_pro_control_panel_sec_three',
	));
	// Add hortizontal post category 
	$wp_customize->add_setting('publisho_top_posts', array(
	'default'        => 'uncategorized',
	'capability'     => 'edit_theme_options',
	'sanitize_callback' => 'publisho_sanitize_dropdown'
	));
	$wp_customize->add_control( 'publisho_top_posts', array(
	'settings' => 'publisho_top_posts',
	'label'    => esc_html__( 'Top Featured Posts', 'publisho' ),
	'section' => 'publisho_pro_control_panel_sec_three',
	'type'     => 'select',
	'choices'  => publisho_catg_select()
	));
	
	$wp_customize->add_setting( 'iconic_one_social_activate', array('default' => '', 'sanitize_callback' => 'publisho_sanitize_checkbox'));
	$wp_customize->add_control( 'iconic_one_social_activate', array('type' => 'checkbox', 'label' => esc_html__('Show social buttons','publisho'), 'description' => esc_html__('Leave fields empty to hide buttons selectively','publisho'), 'section' => 'sl_content'));
	// Add Social Section
	$wp_customize->add_section('sl_content' , array(
	'title' => esc_html__('Social','publisho'),
	'priority'    => 40,
	'panel' => 'publisho_pro_control_panel'
	));
	$wp_customize->add_setting('twitter_url', array('default' => 'http://twitter.com/', 'sanitize_callback' => 'publisho_sanitize_text'));
	$wp_customize->add_control( 'twitter_url', array(
	'label' => esc_html__('Twitter url','publisho'),
	'section' => 'sl_content',
	'settings' => 'twitter_url',
	'type' => 'text',
	));
	$wp_customize->add_setting('facebook_url', array('default' => 'http://facebook.com/', 'sanitize_callback' => 'publisho_sanitize_text'));
	$wp_customize->add_control('facebook_url', array(
	'label' => esc_html__('Facebook url','publisho'),
	'section' => 'sl_content',
	'settings' => 'facebook_url',
	'type' => 'text',
	));
	$wp_customize->add_setting('plus_url', array('default' => 'http://plus.google.com/', 'sanitize_callback' => 'publisho_sanitize_text'));
	$wp_customize->add_control( 'plus_url', array(
	'label' => esc_html__('Google Plus url','publisho'),
	'section' => 'sl_content',
	'settings' => 'plus_url',
	'type' => 'text',
	));
	$wp_customize->add_setting('rss_url', array('default' => 'http://wordpress.org/', 'sanitize_callback' => 'publisho_sanitize_text'));
	$wp_customize->add_control( 'rss_url', array(
	'label' => esc_html__('RSS url','publisho'),
	'section' => 'sl_content',
	'settings' => 'rss_url',
	'type' => 'text',
	));
}
add_action('customize_register', 'publisho_theme_customizer');
