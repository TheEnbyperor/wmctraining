<?php
/**
 * Publisho Extra Functions
 */
	function publisho_social_icons() { ?>
		<div class="socialmedia">
			<?php if( get_theme_mod( 'twitter_url' ) !== '' ) { ?>
				<a href="<?php echo esc_url( get_theme_mod( 'twitter_url', 'default_value' ) ); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/twitter.png" alt="Follow us on Twitter"/></a> 
			<?php } ?>
			<?php if( get_theme_mod( 'facebook_url' ) !== '' ) { ?>
					<a href="<?php echo esc_url( get_theme_mod( 'facebook_url', 'default_value' ) ); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/facebook.png" alt="Follow us on Facebook"/></a>
			<?php } ?>
			<?php if( get_theme_mod( 'plus_url' ) !== '' ) { ?>
					<a href="<?php echo esc_url(get_theme_mod( 'plus_url', 'default_value' ) ); ?>" rel="author" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/gplus.png" alt="Follow us on Google Plus"/></a>
			<?php } ?>
			<?php if( get_theme_mod( 'rss_url' ) !== '' ) { ?>
			<a class="rss" href="<?php echo esc_url( get_theme_mod( 'rss_url', 'default_value' ) ); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/rss.png" alt="Follow us on rss"/></a>			
			<?php } ?>
		</div>
	<?php }
		
	function publisho_catg_select() {
			$themonic_cat_pull = get_categories();
			$catoutput;
 
			$count = count($themonic_cat_pull);
			for ($i=0; $i < $count; $i++) {
				if (isset($themonic_cat_pull[$i]))
					$catoutput[$themonic_cat_pull[$i]->slug] = esc_attr( $themonic_cat_pull[$i]->name);
				else
			$count++;
		}
			return $catoutput;
	}

	function publisho_excerpts() { ?>
		<div class="entry-summary">
				<!-- Publisho home page thumbnail with custom excerpt -->
			<div class="excerpt-thumb">
			<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())) : ?>
				<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'publisho' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
            <?php the_post_thumbnail('publisho-large', 'class=alignleft'); ?>
				</a>
			<?php endif;?>
			</div>
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
	<?php }

	function publisho_btm() { ?>
		<div class="btm-wrap">
			<div class="below-title-meta">
				<div class="adt">
					<?php esc_html_e('By', 'publisho'); ?>
		        	<span class="vcard author">
						<span class="fn"><?php echo the_author_posts_link(); ?></span>
					</span> <span class="meta-sep">|</span>
					<?php if ( get_theme_mod( 'publisho_pro_updated_date') != '1' )  { ?>
						<span class="date updated"><?php echo get_the_date(); ?></span>
					<?php } else { ?>
						<span class="date updated"><?php echo  get_the_modified_date('F j, Y'); ?></span>
					<?php } ?>
        		</div>
				<div class="adt-comment">
					<span><a class="link-comments" href="<?php  comments_link(); ?>"><?php comments_number(esc_html__('0 Comment', 'publisho'),esc_html__('1 Comment', 'publisho'),esc_html__('% Comments', 'publisho')); ?></a></span>
		        </div>    <div class="clear"></div>
    		</div><!-- below title meta end -->
		</div>
	<?php }

	function publisho_content_post_settings() { ?>
		<?php if ( is_home() && ( get_theme_mod( 'publisho_pro_full_post', '1' ) == '1' ) ) : // Check Live Customizer for Full/Excerpts Post Settings ?>
			<?php publisho_excerpts() ?>
		<?php elseif( is_search() || is_category() || is_tag()  || is_author()  || is_archive() ): ?>
					<?php publisho_excerpts() ?>
		<?php else : ?>
					<div class="entry-content">
						<?php if( get_theme_mod('publisho_pro_featured_image_single', '1' ) == '1' ) { ?>
							<?php the_post_thumbnail('post-thumbnail'); ?>
						<?php } ?>
						<?php the_content( esc_html__( 'Continue reading <span class="meta-nav">&rarr;</span>', 'publisho' ) ); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'publisho' ), 'after' => '</div>' ) ); ?>
					</div><!-- .entry-content -->
		<?php endif; ?>
	<?php }
?>
