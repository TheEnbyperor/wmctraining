<?php
/*
 * The template for displaying Search Results pages.
 *
 * @package WordPress - Themonic Framework
 * @subpackage Publisho_Theme
 * @since Publisho 1.0
 */

get_header(); ?>

	<section id="primary" class="site-content">
		<div id="content" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'publisho' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header>

			<?php publisho_content_nav( 'nav-above' ); ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>

			<?php publisho_content_nav( 'nav-below' ); ?>

		<?php else : ?>

			<article id="post-0" class="post no-results not-found">
				<header class="entry-header">
					<h1 class="entry-title"><?php esc_html_e( 'Nothing Found', 'publisho' ); ?></h1>
				</header>

				<div class="entry-content">
					<p><?php esc_html_e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'publisho' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .entry-content -->
			</article><!-- #post-0 -->

		<?php endif; ?>

		</div><!-- #content -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>