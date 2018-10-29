<?php
/**
 * The template for displaying content on the search results page.
 *
 * @package ThinkUpThemes
 */
?>

					<div class="blog-grid">

					<article id="post-<?php the_ID(); ?>" <?php post_class('blog-style1'); ?>>	

						<div class="entry-content">
							<?php thinkup_input_blogtitle(); ?>

							<div class="entry-meta">
								<?php thinkup_input_blogauthor(); ?>
								<?php thinkup_input_blogcategory2(); ?>
								<?php thinkup_input_blogtag2(); ?>
							</div>

							<?php the_excerpt(); ?>
						</div>

						<footer class="entry-footer">

							<div class="entry-meta">
								<?php thinkup_input_blogdate(); ?>
								<?php thinkup_input_blogcomment(); ?>
							</div>

						</footer>

					</article><!-- #post-<?php get_the_ID(); ?> -->

					</div>