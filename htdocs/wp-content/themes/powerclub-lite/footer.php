<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Powerclub Lite
 */
?>
<div id="footer-wrapper">
	  <div class="footer">
    	    <div class="container">
              <?php if ( ! dynamic_sidebar( 'footer-1' ) ) : ?>             
               <?php endif; // end footer widget area ?>    
                        
               <?php if ( ! dynamic_sidebar( 'footer-2' ) ) : ?>                                  	
               <?php endif; // end footer widget area ?>   
            
               <?php if ( ! dynamic_sidebar( 'footer-3' ) ) : ?>                
               <?php endif; // end footer widget area ?>
               
               <?php if ( ! dynamic_sidebar( 'footer-4' ) ) : ?>                
               <?php endif; // end footer widget area ?>
                
            <div class="clear"></div>
          </div><!--end .container--> 
        </div><!--end .footer--> 
       
        <div class="copyright-wrapper">
        	<div class="container">
            	<div class="copyright-txt">
				 <?php bloginfo('name'); ?> <?php _e('All Rights Reserved', 'powerclub-lite');?>                 
       			 </div>
                <div class="design-by">
                   <a href="<?php echo esc_url( __( 'https://gracethemes.com/themes/fitness-wordpress-theme/', 'powerclub-lite' ) ); ?>">
				    <?php printf( __( 'Theme by %s', 'powerclub-lite' ), 'Powerclub WordPress Theme' ); ?>
                   </a>   			
                </div>
                <div class="clear"></div>
            </div>            
        </div><!--end .copyright-wrapper--> 
               
    </div><!--end .footer-wrapper--> 
</div><!--end .header page wrap-->  
<?php wp_footer(); ?>
</body>
</html>