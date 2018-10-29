<?php
/**
 * The main Portfolio page template file.
 *
 * @package ThinkUpThemes
 */

get_header(); ?>

			<a class="portfolio-nav port-navbar" data-toggle="collapse" data-target=".port-collapse"><i class="fa fa-align-justify"></i>Filter Portfolio</a>

			<section id="options" class="port-collapse collapse">
			        <ul id="filter" class="portfolio-filter"></ul>
			</section>

			<?php
				$loop = new WP_Query(array('post_type' => 'portfolio', 'posts_per_page' => -1, 'paged' => $paged));
				$count =0;
			?>

			<div id="container" class="portfolio-wrapper">
			<div id="container-inner">

				<?php if ( $loop ) : 
					while ( $loop->have_posts() ) : $loop->the_post();
					$terms = get_the_terms( $post->ID, 'tagportfolio' );
						if ( $terms && ! is_wp_error( $terms ) ) : 
							$links = array();
							foreach ( $terms as $term ) { $links[] = $term->name; }
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