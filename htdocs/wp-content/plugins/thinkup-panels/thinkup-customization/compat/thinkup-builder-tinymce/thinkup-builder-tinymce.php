<?php
/**
 *  This file adds compatibility with Black Studio TinyMCE widget.
 */

/**
 * Add all the required actions for the TinyMCE widget.
 */
 
function siteorigin_panels_thinkup_builder_tinymce_admin_init() {
	global $pagenow;

	if (
		in_array($pagenow, array('post-new.php', 'post.php')) ||
		($pagenow == 'themes.php' && isset($_GET['page']) && $_GET['page'] == 'so_panels_home_page' )
	)  {
		add_action( 'admin_head', 'thinkup_builder_tinymce_load_tiny_mce' );
		add_filter( 'tiny_mce_before_init', 'thinkup_builder_tinymce_init_editor', 20 );
		add_action( 'admin_print_scripts', 'thinkup_builder_tinymce_scripts' );
		add_action( 'admin_print_styles', 'thinkup_builder_tinymce_styles' );
		add_action( 'admin_print_footer_scripts', 'thinkup_builder_tinymce_footer_scripts' );
	}

}
add_action('admin_init', 'siteorigin_panels_thinkup_builder_tinymce_admin_init');

/**
 * Enqueue all the admin scripts for Black Studio TinyMCE compatibility with Page Builder.
 *
 * @param $page
 */
function siteorigin_panels_thinkup_builder_tinymce_admin_enqueue($page) {
	$screen = get_current_screen();
	if ( ( $screen->base == 'post' && in_array( $screen->id, siteorigin_panels_setting('post-types') ) ) || $screen->base == 'appearance_page_so_panels_home_page') {
		wp_enqueue_script('thinkup-builder-tinymce-widget-siteorigin-panels', plugin_dir_url(SITEORIGIN_PANELS_BASE_FILE) . 'thinkup-customization/compat/thinkup-builder-tinymce/thinkup-builder-tinymce-widget-siteorigin-panels.js', array('jquery'), SITEORIGIN_PANELS_VERSION);
		wp_enqueue_style('thinkup-builder-tinymce-widget-siteorigin-panels', plugin_dir_url(SITEORIGIN_PANELS_BASE_FILE).'thinkup-customization/compat/thinkup-builder-tinymce/thinkup-builder-tinymce-widget-siteorigin-panels.css', array(), SITEORIGIN_PANELS_VERSION);

		global $thinkup_builder_tinymce_widget_version;
		if(version_compare($thinkup_builder_tinymce_widget_version, '1.2.0', '<=')) {
			// We also need a modified javascript for older versions of Black Studio TinyMCE
			wp_enqueue_script('thinkup-builder-tinymce-widget', plugin_dir_url(SITEORIGIN_PANELS_BASE_FILE) . 'thinkup-customization/compat/thinkup-builder-tinymce/thinkup-builder-tinymce-widget.js', array('jquery'), SITEORIGIN_PANELS_VERSION);
		}
	}
}
add_action('admin_enqueue_scripts', 'siteorigin_panels_thinkup_builder_tinymce_admin_enqueue', 15);