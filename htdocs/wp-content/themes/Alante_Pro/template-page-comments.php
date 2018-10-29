<?php
/**
 * Template Name: Page (With Comments)
 *
 * @package ThinkUpThemes
 */

get_header(); ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

				<?php thinkup_input_allowcomments(); ?>

			<?php endwhile; wp_reset_query(); ?>

<?php get_footer(); ?>