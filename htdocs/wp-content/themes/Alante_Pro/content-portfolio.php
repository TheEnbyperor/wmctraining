<?php
/**
 * The Portfolio item content template file.
 *
 * @package ThinkUpThemes
 */
?>


		<article class="project-content two_third">
			<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . 'Pages:', 'after' => '</div>' ) ); ?>
		</article>

		<article class="project-information one_third last">
			<?php thinkup_input_projectinfo(); ?>
		</article>