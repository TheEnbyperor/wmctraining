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
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-31166006-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
</html>
