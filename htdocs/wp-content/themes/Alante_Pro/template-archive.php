<?php
/**
 * Template Name: Archive
 *
 * @package ThinkUpThemes
 */

get_header(); ?>

			<div class="one_half">	
				<h3 class="page-title"><?php _e( 'Pages', 'alante' ); ?>:</h3>
				<ul class="archive-pages">
					<?php wp_list_pages('title_li='); ?>
				</ul>
			</div>

			<div class="one_half last">
				<h3 class="page-title"><?php _e( 'Recent Posts', 'alante' ); ?>:</h3>
				<ul class="archive-recent">
					<?php 	$recent_posts = wp_get_recent_posts();
							foreach( $recent_posts as $recent ){
							echo '<li><a href="' . esc_url( get_permalink($recent["ID"]) ) . '">' . esc_html( $recent["post_title"] ) . '</a></li>';
							} 
					?>
				</ul>

				<h3 class="page-title"><?php _e( 'Monthly', 'alante' ); ?>:</h3>
				<ul class="archive-monthly">
					<?php wp_get_archives( 'show_post_count=1' ); ?>
				</ul>

				<h3 class="page-title"><?php _e( 'Categories', 'alante' ); ?>:</h3>
				<ul class="archive-categories">
					<?php wp_list_categories( 'show_count=1&title_li=' ); ?>
				</ul>

				<h3 class="page-title"><?php _e( 'Author(s)', 'alante' ); ?>:</h3>
				<ul class="archive-authors">
					<?php wp_list_authors( 'optioncount=1' ); ?>
				</ul>
			</div><div class="clearboth"></div>

<?php get_footer(); ?>  