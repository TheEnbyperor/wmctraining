<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Powerclub Lite
 */

get_header(); 
?>

<?php if ( is_front_page() && ! is_home() ) { ?>
<div id="ourservices" <?php if( get_theme_mod( 'hide_slides' ) == '1') { echo 'style="margin-top:40px"'; } ?>>
    <div class="container">
      <?php 
	  for($i=1; $i<=4; $i++) {
		  if( get_theme_mod('page-column'.$i,false)) {
			$services_Arr[] = absint(get_theme_mod('page-column'.$i,true));
		  }
	  }
	  ?>
	  
      <?php
	  if(!empty($services_Arr)){
	  $j=1;
	  $querywar = new WP_query( array( 'post_type' => 'page', 'post__in' => $services_Arr, 'orderby' => 'post__in' ) );
      while( $querywar->have_posts() ) : $querywar->the_post(); ?>
      <div class="fourbox <?php if($j==4) { echo "last_column"; } ?>">
           <?php if (has_post_thumbnail() ){ ?>
             <div class="thumbbx"> <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail();?> </a></div> 
            <?php } ?>
           <div class="pagecontent">          
                <h3><a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></h3> 
                <p><?php echo esc_html( wp_trim_words( get_the_content(), 20, '...' ) );  ?></p>   
                <a class="pagemore" href="<?php the_permalink(); ?>">
                 <?php _e('Read More','powerclub-lite'); ?>
                </a>
           </div>
        </div>
       <?php 
	   $j++;
	   endwhile;
       wp_reset_postdata();
	   } ?>                                    
      <div class="clear"></div>
  </div> <!-- container -->
</div><!-- #ourservices -->
<?php } ?>


	<div class="container">
      <div class="page_content">
    		 <section class="site-main">               
            		<?php while( have_posts() ) : the_post(); ?>                               
						<?php get_template_part( 'content', 'page' ); ?>
                        <?php
                            //If comments are open or we have at least one comment, load up the comment template
                            if ( comments_open() || '0' != get_comments_number() )
                                comments_template();
                            ?>                               
                    <?php endwhile; ?>                    
            </section><!-- section-->   
     <?php get_sidebar();?>      
    <div class="clear"></div>
    </div><!-- .page_content --> 
 </div><!-- .container --> 
<?php get_footer(); ?>