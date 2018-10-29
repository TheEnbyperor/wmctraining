<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package Powerclub Lite
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="pagewrap">
<div class="headertop">
 <div class="container">
      <?php if ( ! dynamic_sidebar( 'header-widget' ) ) : ?>      
      <?php endif; // end sidebar widget area ?>    
	<div class="clear"></div>
 </div><!-- .container -->  
</div><!-- .headertop -->  
<div class="header">
  <div class="container">
    <div class="logo">
      <?php powerclub_lite_the_custom_logo(); ?>
      <h1><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
        <?php $description = get_bloginfo( 'description', 'display' );
        if ( $description || is_customize_preview() ) : ?>
            <p><?php echo esc_attr($description); ?></p>
        <?php endif; ?>   
    </div><!-- logo -->
    <div class="toggle"> <a class="toggleMenu" href="#">
      <?php _e('Menu','powerclub-lite'); ?>
      </a> </div> <!-- toggle -->
    <div class="sitenav">
      <?php wp_nav_menu(array('theme_location' => 'primary')); ?>
    </div>
    <!-- site-nav -->
    <div class="clear"></div>
  </div>
  <!-- container -->
</div><!--.header -->
<?php 
if ( is_front_page() && !is_home() ) {
$hideslide = get_theme_mod('hide_slides', '1');
if($hideslide == '') {
	for($i=7; $i<=9; $i++) {
	  if( get_theme_mod('page-setting'.$i,false)) {
		$slider_Arr[] = absint( get_theme_mod('page-setting'.$i,true));
	  }
	}
?>                
                
<?php if(!empty($slider_Arr)){ ?>
    <div id="slider" class="nivoSlider">
        <?php 
        $i=1;
        $slidequery = new WP_query( array( 'post_type' => 'page', 'post__in' => $slider_Arr, 'orderby' => 'post__in' ) );
        while( $slidequery->have_posts() ) : $slidequery->the_post();
        $image = wp_get_attachment_url( get_post_thumbnail_id($post->ID)); ?>
        <?php if(!empty($image)){ ?>
        <img src="<?php echo esc_url( $image ); ?>" title="#slidecaption<?php echo $i; ?>" />
        <?php }else{ ?>
        <img src="<?php echo esc_url( get_template_directory_uri() ) ; ?>/images/slides/defaultslider.jpg" title="#slidecaption<?php echo $i; ?>" />
        <?php } ?>
        <?php $i++; endwhile; ?>
    </div>   

<?php 
$j=1;
$slidequery->rewind_posts();
while( $slidequery->have_posts() ) : $slidequery->the_post(); ?>                 
    <div id="slidecaption<?php echo $j; ?>" class="nivo-html-caption">
        <div class="slide_info">
            <h2><?php the_title(); ?></h2>
            <p><?php echo esc_html( wp_trim_words( get_the_content(), 20, '' ) );  ?></p>                 
        </div>
    </div>      
<?php $j++; 
endwhile;
wp_reset_postdata(); ?>   
    
     </div><!--end .slider area-->    
<div class="clear"></div>        
<?php } ?>
<?php } } ?>