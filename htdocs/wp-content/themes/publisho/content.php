<?php
/*
 * Content display template, used for both single and index/category/search pages.
 * @since Publisho 1.0
 */
?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php if ( is_sticky() && is_home() && ! is_paged() ) : // for top sticky post with blue border ?>
		<div class="featured-post">
			<?php esc_html_e( 'Featured Article', 'publisho' ); ?>
		</div>
		<?php endif; ?>
	<header class="entry-header">
			<?php if ( !is_single() ) : ?>
			<h2 class="entry-title">
				<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( esc_html__( 'Permalink to %s', 'publisho' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h2>
			<?php endif; // is_single() ?>
		<?php if ( is_single() || ( get_theme_mod('publisho_pro_date_home') == '1' ) ) : //for date on single page ?>
	   		<div class="clear"></div>
			<?php publisho_btm() ?>
	    <?php endif; // display meta-date on single page() ?>
	</header><!-- .entry-header -->

	<?php publisho_content_post_settings() ?>

	<footer class="entry-meta">
		<?php if ( is_home() && ( get_theme_mod( 'publisho_catg_home', '1' ) == '1' ) ) : ?>
			<span><?php esc_html_e('Category:','publisho'); ?> <?php the_category(' '); ?></span>
		<?php elseif( !is_home() ): ?>
			<span><?php esc_html_e('Category:','publisho'); ?> <?php the_category(' '); ?></span>
		<?php endif; ?>
		<?php if ( is_home() &&( get_theme_mod( 'publisho_tag_home', '1' ) == '1' ) ) : ?>
				<span><?php the_tags(); ?></span>
		<?php elseif( !is_home() ): ?>
				<span><?php the_tags(); ?></span>
		<?php endif; ?>
           	<?php edit_post_link( esc_html__( 'Edit', 'publisho' ), '<span class="edit-link">', '</span>' ); ?>
			<?php if ( is_singular() && get_the_author_meta( 'description' ) && is_multi_author() ) : // If a user has filled out their description and this is a multi-author blog, show a bio on their entries. ?>
				<div class="author-info">
					<div class="author-avatar">
						<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'publisho_author_bio_avatar_size', 68 ) ); ?>
					</div><!-- .author-avatar -->
					<div class="author-description">
						<h2><?php printf( esc_html__( 'About %s', 'publisho' ), get_the_author() ); ?></h2>
						<p><?php the_author_meta( 'description' ); ?></p>
						<div class="author-link">
							<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
								<?php printf( esc_html__( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'publisho' ), get_the_author() ); ?>
							</a>
						</div><!-- .author-link	-->
					</div><!-- .author-description -->
				</div><!-- .author-info -->
			<?php endif; ?>
	</footer><!-- .entry-meta -->
	</article><!-- #post -->
