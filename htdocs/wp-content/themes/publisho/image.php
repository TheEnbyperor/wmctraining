<?php
/**
 * The template for displaying image attachments.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress - Themonic Framework
 * @subpackage Publisho_Theme
 * @since Publisho 1.0
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class( 'image-attachment' ); ?>>
					<header class="entry-header">
						<h1 class="entry-title"><?php the_title(); ?></h1>

						<footer class="entry-meta">
							<?php
							$metadata = wp_get_attachment_metadata();
							$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
							echo esc_html__( 'Published on' , 'publisho' );
							if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
								$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
							}
							$time_string = sprintf( $time_string,
								esc_attr( get_the_date( 'c' ) ),
								esc_html( get_the_date() )
							);
							printf( '<span class="posted-on"><span class="screen-reader-text">%1$s </span><a href="%2$s" rel="bookmark">%3$s</a></span>',
								esc_html_x( 'Posted on', 'Used before publish date.', 'publisho' ),
								esc_url( get_permalink() ),
								$time_string
							);

							?>
							<?php edit_post_link( esc_html__( 'Edit', 'publisho' ), '<span class="edit-link">', '</span>' ); ?>
						</footer><!-- .entry-meta -->

						<nav id="image-navigation" class="navigation" role="navigation">
							<span class="previous-image"><?php previous_image_link( false, esc_html__( '&larr; Previous', 'publisho' ) ); ?></span>
							<span class="next-image"><?php next_image_link( false, esc_html__( 'Next &rarr;', 'publisho' ) ); ?></span>
						</nav><!-- #image-navigation -->
					</header><!-- .entry-header -->

					<div class="entry-content">

						<div class="entry-attachment">
							<div class="attachment">
									<?php
									/**
									 * Grab the IDs of all the image attachments in a gallery so we can get the URL of the next adjacent image in a gallery,
									 * or the first image (if we're looking at the last image in a gallery), or, in a gallery of one, just the link to that image file
									 */
									$attachments = array_values( get_children( array( 'post_parent' => $post->post_parent, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID' ) ) );
									foreach ( $attachments as $k => $attachment ) :
										if ( $attachment->ID == $post->ID )
											break;
									endforeach;

									$k++;
									// If there is more than 1 attachment in a gallery
									if ( count( $attachments ) > 1 ) :
										if ( isset( $attachments[ $k ] ) ) :
											// get the URL of the next image attachment
											$next_attachment_url = get_attachment_link( $attachments[ $k ]->ID );
										else :
											// or get the URL of the first image attachment
											$next_attachment_url = get_attachment_link( $attachments[ 0 ]->ID );
										endif;
									else :
										// or, if there's only 1 image, get the URL of the image
										$next_attachment_url = wp_get_attachment_url();
									endif;
									?>
								<a href="<?php echo esc_url( $next_attachment_url ); ?>" title="<?php the_title_attribute(); ?>" rel="attachment"><?php
								$attachment_size = apply_filters( 'publisho_attachment_size', array( 960, 960 ) );
								echo wp_get_attachment_image( $post->ID, $attachment_size );
								?></a>

								<?php if ( ! empty( $post->post_excerpt ) ) : ?>
								<div class="entry-caption">
									<?php the_excerpt(); ?>
								</div>
								<?php endif; ?>
							</div><!-- .attachment -->

						</div><!-- .entry-attachment -->

						<div class="entry-description">
							<?php the_content(); ?>
							<?php wp_link_pages( array( 'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'publisho' ), 'after' => '</div>' ) ); ?>
						</div><!-- .entry-description -->

					</div><!-- .entry-content -->

				</article><!-- #post -->

				<?php comments_template(); ?>

			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>