<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset') ?>" />
<title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url') ?>" media="screen" />
<!--[if lte IE 7]><link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.ie7.css" media="screen" /><![endif]-->
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Electrolize|Cuprum">
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php
remove_action('wp_head', 'wp_generator');
wp_enqueue_script('jquery');
wp_enqueue_script('template_script', get_bloginfo('template_url') . '/script.js', 'jquery');
if (is_singular() && get_option('thread_comments')) {
	wp_enqueue_script('comment-reply');
}
wp_head();
?>
</head>
<body <?php body_class(); ?>>

<div id="art-main">

<?php if(theme_has_layout_part("header")) : ?>
<header class="clearfix art-header<?php echo (theme_get_option('theme_header_clickable') ? ' clickable' : ''); ?>"><?php get_sidebar('header'); ?>



    <div class="art-shapes">
<?php if(theme_get_option('theme_header_show_slogan')): ?>
	<?php $slogan = theme_get_option('theme_'.(is_home()?'posts':'single').'_slogan_tag'); ?>
	<<?php echo $slogan; ?> class="art-slogan" data-left="1.09%"><?php bloginfo('description'); ?></<?php echo $slogan; ?>>
<?php endif; ?>

<div class="art-object752032930" data-left="0.98%"></div>

            </div>
                <div class="art-header-inner">
<nav class="art-nav clearfix">
    <?php
	echo theme_get_menu(array(
			'source' => theme_get_option('theme_menu_source'),
			'depth' => theme_get_option('theme_menu_depth'),
			'menu' => 'primary-menu',
			'class' => 'art-hmenu'
		)
	);
?> 
    </nav>

                    </div>
</header>
<?php endif; ?>

<div class="art-sheet clearfix">
            <div class="art-layout-wrapper clearfix">
                <div class="art-content-layout">
                    <div class="art-content-layout-row">
                        <div class="art-layout-cell art-content clearfix">
