<?php
/**
 * The Portfolio item page template file.
 *
 * @package ThinkUpThemes
 */

get_header(); ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'portfolio' ); ?>

				<?php thinkup_input_portfolionavigation(); ?>

			<?php endwhile; wp_reset_query(); ?>

<?php get_footer(); ?>