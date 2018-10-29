<?php
/*
 * Header Section of Publisho
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress - Themonic Framework
 * @subpackage Publisho_Theme
 * @since Publisho 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="page" class="site">
	<div class="publisho-top-mobile-nav clear"></div>
	<nav id="site-navigation" class="themonic-nav" role="navigation">
		<div class="th-topwrap clear">
			<?php if ( has_nav_menu( 'tophead' ) ) { ?>	
				<div class="topheadmenu">
					<a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'publisho' ); ?>"><?php esc_html_e( 'Skip to content', 'publisho' ); ?></a>
					<?php wp_nav_menu( array( 'theme_location' => 'tophead', 'menu_id' => 'head-top', 'menu_class' => 'top-menu' ) ); ?>
				</div>
			<?php } ?>
			<?php if( get_theme_mod( 'iconic_one_social_activate' ) == '1') { ?>	
				<?php publisho_social_icons() ?>	
			<?php } ?>
		</div>	
	</nav><!-- #site-navigation -->
	<div class="clear"></div>
	<header id="masthead" class="site-header" role="banner">
			<?php if ( get_theme_mod( 'custom_logo' ) ) : ?>
		
		<div class="themonic-logo">
		<?php publisho_the_custom_logo(); ?>
		</div>
		<div id="publisho-head-widget" class="head-widget-area">
				<div class="pmt-head-widget">
                <?php if( is_active_sidebar( 'pmt-tophead-banner' ) ) dynamic_sidebar( 'pmt-tophead-banner' ); ?>
				</div>
		</div>
		<?php else : ?>
			<div class="th-title-description">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				<a class="site-description clear"><?php bloginfo( 'description' ); ?></a>
			</div>
		<?php endif; ?>
	<div class="publisho-mobile-nav clear"></div>
		<nav id="site-navigation" class="themonic-nav" role="navigation">
			<a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'publisho' ); ?>"><?php esc_html_e( 'Skip to content', 'publisho' ); ?></a>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'menu-top', 'menu_class' => 'nav-menu' ) ); ?>
		</nav><!-- #site-navigation -->
		<div class="clear"></div>
	</header><!-- #masthead -->

	<div id="main" class="wrapper">