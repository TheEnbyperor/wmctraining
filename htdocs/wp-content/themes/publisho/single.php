<?php
/*
 * The Template for displaying all single posts.
 *
 * @package WordPress - Themonic Framework
 * @subpackage Publisho_Theme
 * @since Publisho 1.0
 */

get_header(); ?>
	<header class="entry-header">
			<?php if ( is_single() ) : ?>
				<div class="singleentry">
					<h1 class="entry-title"><?php the_title(); ?></h1>
				</div>
			<?php else : ?>
				<h2 class="entry-title">
					<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( esc_html__( 'Permalink to %s', 'publisho' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
				</h2>
			<?php endif; // is_single() ?>
				
			
	</header><!-- .entry-header -->

	<div id="primary" class="site-content">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', get_post_format() ); ?>
				<nav class="nav-single">
					<div class="assistive-text"><?php esc_html_e( 'Post navigation', 'publisho' ); ?></div>
					<span class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'publisho' ) . '</span> %title' ); ?></span>
					<span class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'publisho' ) . '</span>' ); ?></span>
				</nav><!-- .nav-single -->

				<?php comments_template( '', true ); ?>

			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>