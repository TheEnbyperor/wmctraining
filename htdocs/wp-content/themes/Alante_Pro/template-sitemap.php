<?php
/**
 * Template Name: Sitemap
 *
 * @package ThinkUpThemes
 */

get_header(); ?>

			<div class="one_half">
				<h3 class="page-title"><?php _e( 'Pages', 'alante'); ?>:</h3>
				<ul class="sitemap-pages">
					<?php wp_list_pages('title_li='); ?>
				</ul> 

				<h3 class="page-title"><?php _e( 'Author(s)', 'alante'); ?>:</h3>
				<ul class="sitemap-authors">
					<?php wp_list_authors( 'optioncount=1' ); ?>
				</ul>
			</div> 
		 
			<div class="one_half last">
				<h3 class="page-title"><?php _e( 'Posts', 'alante'); ?>:</h3>
				<ul class="sitemap-posts">
					<?php $args=array(
					           'orderby' => 'name',
					           'pad_counts' => '1'
						  );

					$cats = get_categories( $args );
					foreach ( $cats as $cat ) {
					  echo '<li class="category"><a href="' . esc_url( get_category_link($cat->term_id) ) . '">' . __( 'Category:', 'alante' ) . ' ' . esc_html( $cat->cat_name ) . ' (' . esc_html( $cat->category_count ) . ')' . "\n";
					  echo '<ul class="children">'."\n";
					  query_posts('posts_per_page=-1&cat='.$cat->cat_ID);
					  while(have_posts()): the_post();
						 $category = get_the_category();
					?>
							<li><a href="<?php the_permalink() ?>">
							<?php the_title(); ?></a></li>
					   <?php endwhile; wp_reset_query(); ?>
					  </ul>
					  </li>
					<?php } ?>
				</ul>
				<?php
				wp_reset_query();
				?>

				<h3 class="page-title"><?php _e( 'Archives', 'alante'); ?>:</h3>
				<ul class="sitemap-archives">
					<?php wp_get_archives('type=monthly&show_post_count=true'); ?>
				</ul>
			</div><div class="clearboth"></div>

<?php get_footer(); ?>