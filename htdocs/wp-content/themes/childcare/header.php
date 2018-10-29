<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>" charset="<?php bloginfo('charset'); ?>" />
	<?php  wp_head(); ?>		  
</head>
<body  <?php body_class(); ?> >
<div id="wrapper">
	<div class="header-section">
			<div class="container">
				<div class="col-md-12">
					<div class="logo">
					<h2><?php if ( function_exists( 'the_custom_logo' ) ) {
								the_custom_logo();
						} ?>
					</h2>
					</div>
 
					<?php $description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) : ?>
					<center>	
          <h1 class="site-description"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1></center>
						<div  class="site-description"><p><?php echo esc_html($description); ?></p></div>
					<?php endif; ?>
					
				</div>
			</div>
	    <nav class="navbar navbar-default" role="naviation">
    	  <div class="container">
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-menu">
		        <span class="sr-only"><?php _e('Toggle navigation','childcare');?></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		    </div>
		    <div id="main-menu" class="collapse navbar-collapse">
				<?php	wp_nav_menu( array(  
									'theme_location' => 'primary',
									'container'  => 'collapse navbar-collapse',
									'menu_class' => 'nav navbar-nav',
									'fallback_cb' => 'childcare_fallback_page_menu',
									'walker' => new childcare_nav_walker()
									)
								);	?>
		    </div>
		  </div>
		</nav>
	</div>