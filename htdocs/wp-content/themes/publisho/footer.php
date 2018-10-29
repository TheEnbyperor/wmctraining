<?php
/**
 * Footer section template.
 * @package WordPress
 * @subpackage Publisho_Theme
 * @since Publisho 1.0
 */
?>
	</div><!-- #main .wrapper -->
	
	<div id="publisho-footer" class="widget-area">
				<div class="footer-widget">
                <?php if( is_active_sidebar( 'footer-one' ) ) dynamic_sidebar( 'footer-one' ); ?>
				</div>
				<div class="footer-widget">
				<?php if( is_active_sidebar( 'footer-two' ) ) dynamic_sidebar( 'footer-two' ); ?>
				</div>
				<div class="footer-widget">
				<?php if( is_active_sidebar( 'footer-three' ) ) dynamic_sidebar( 'footer-three' ); ?>
				</div>
	</div>
			
	<div class="site-wordpress">
		<a href="<?php echo esc_url( __( 'http://themonic.com/publisho-magazine-wordpress-theme/', 'publisho' ) ); ?>"><?php printf( esc_html__( 'Publisho Theme', 'publisho' ) ); ?></a><?php echo esc_html__( '  |  Powered by Wordpress' , 'publisho' );?>
	</div><!-- .site-info --><div class="clear"></div>
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>