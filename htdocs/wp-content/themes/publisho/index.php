<?php
/**
 * The main template file.
 */

get_header(); ?>

<?php $catname = esc_attr( get_theme_mod( 'publisho_top_posts' )); ?>
<?php if ( is_home() ) : ?>
	<div class="iofeaturepost-two">
		<ul>
		<?php
			$query = new WP_Query("category_name=$catname&showposts=4");
			while ($query->have_posts()) : $query->the_post();
			$do_not_duplicate[] = get_the_ID();
		?>
         <li>
			<div class="iofeaturedblock">
				<div class="catpostimage"><?php the_post_thumbnail('publisho-large', 'class=alignleft'); ?></div>
					<h2 class="entry-title">
						<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( esc_html__( 'Permalink to %s', 'publisho' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
					</h2>
			</div>
	    </li>
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
		</ul>
	</div><div class="clear"></div>
<?php endif; ?>
<div class="iofeaturepost-two-title"><?php echo esc_html__( 'LATEST ARTICLES' , 'publisho' );?></div>

<div id="primary" class="site-content">
    <div id="content" role="main">
		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>
			<?php publisho_content_nav( 'nav-below' ); ?>
		<?php endif; ?>
    </div><!-- #content -->
</div><!-- #primary -->
<?php
function publisho_query_filter( $query ) {
    if ( $query->is_home() && $query->is_main_query() ) {
        $query->set('post__not_in', array($do_not_duplicate));
    }}
add_action( 'pre_get_posts', 'publisho_query_filter' );
?>
<?php get_sidebar();?>
<?php get_footer(); ?>