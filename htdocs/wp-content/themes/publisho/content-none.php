<?php
/*
 * "No posts found" template.
 *
 * @package WordPress - Themonic Framework
 * @subpackage Publisho_Theme
 * @since Publisho 1.0
 */
?>

	<article id="post-0" class="post no-results not-found">
		<header class="entry-header">
			<h1 class="entry-title"><?php esc_html_e( 'Nothing Found', 'publisho' ); ?></h1>
		</header>

		<div class="entry-content">
			<p><?php esc_html_e( 'Kindly search your topic below or browse the recent posts.', 'publisho' ); ?></p>
			<?php get_search_form(); ?>
		</div><!-- .entry-content -->
	</article><!-- #post-0 -->
