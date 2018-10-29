<?php
/**
 * Template Name: Portfolio
 *
 * @package ThinkUpThemes
 */

get_header(); ?>

			<?php  
				$thinkup_portfolio_pageid = $post->ID; // Store page id to collect meta data in project loop
				$posttags = strip_tags( get_the_tag_list( '', ',', '' ) );
				$tag_count = count( get_the_tags() );

				$loop = new WP_Query(array(
						'post_type' => 'portfolio',
						'posts_per_page' => -1,
						'paged' => $paged,
						'tagportfolio' => $posttags 
					));
				$count =0;
			?>

			<?php if ( $tag_count > 1 ) : ?>
				<section id="options">
					<ul id="filter" class="portfolio-filter"></ul>
				</section>
			<?php endif; ?>

			<div id="container" class="portfolio-wrapper">
			<div id="container-inner">

				<?php if ( $loop ) : 
					while ( $loop->have_posts() ) : $loop->the_post();
					$terms = get_the_terms( $post->ID, 'tagportfolio' );

						if ( $terms && ! is_wp_error( $terms ) ) : 
							$links = array();
							foreach ( $terms as $term ) {
								if (strpos( $posttags, $term->name ) !== false) :
									$links[] = $term->name;
								endif;
							}
							$tax = join( ",", $links );		
						else :	
							$tax = '';	
						endif; ?>

						<div class="element <?php thinkup_input_portfoliolayout(); ?> image_grid" data-tags="<?php echo $tax; ?>">
							<ul class="da-thumbs">
								<li>
									<a href="<?php the_permalink() ?>"><?php thinkup_input_portfoliosize(); ?></a><?php
									/* Hover Content */ thinkup_input_portfoliohover(); ?>
								</li>
							</ul>
						</div>
					<?php endwhile; else: ?>

				<div class="portfolio-error"><?php _e( 'No portfolio items have been found.', 'alante' ); ?></div>

				<?php endif; wp_reset_query(); ?>

			<div class="clearboth"></div>
			</div>
			</div>

<?php get_footer(); ?>