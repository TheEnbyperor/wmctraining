        		<div class="cleared"></div>
        </div>
    </div>
    <div class="art-footer">
        <div class="art-footer-t"></div>
        <div class="art-footer-body">
        <?php get_sidebar('footer'); ?>
            <div class="art-footer-center">
                <div class="art-footer-wrapper">
                    <div class="art-footer-text">
                        <?php  echo do_shortcode(theme_get_option('theme_footer_content')); ?>
                        <div class="cleared"></div>
                        <p class="art-page-footer">Telephone - 0845 050 9684 :: Contact Us <a href="mailto:contactus@wmctraining.co.uk">Here</a></p>
                    </div>
                </div>
            </div>
            <div class="cleared"></div>
        </div>
    </div>
    <div class="cleared"></div>
</div>
    <div id="wp-footer">
	        <?php wp_footer(); ?>
	        <!-- <?php printf(__('%d queries. %s seconds.', THEME_NS), get_num_queries(), timer_stop(0, 3)); ?> -->
    </div>
</body>
</html>
