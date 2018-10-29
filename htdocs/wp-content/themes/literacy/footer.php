<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Literacy
 */
?>
        <div class="copyright-wrapper">
        	<div class="inner">
                <div class="copyright">
                	<p><?php bloginfo( 'name' ); ?> <?php echo date_i18n('Y'); ?></p>
                </div><!-- copyright --><div class="clear"></div>         
            </div><!-- inner -->
        </div>
    </div>
<?php wp_footer(); ?>

</body>
</html>