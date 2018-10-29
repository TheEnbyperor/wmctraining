<?php
/*
Plugin Name: Black Studio TinyMCE Widget
Plugin URI: http://wordpress.org/extend/plugins/thinkup-builder-tinymce-widget/
Description: Adds a WYSIWYG widget based on the standard TinyMCE WordPress visual editor.
Version: 1.3.3
Author: Black Studio
Author URI: http://www.blackstudio.it
License: GPL2
*/

global $thinkup_builder_animation_widget_version;
global $thinkup_builder_animation_widget_dev_mode;
$thinkup_builder_animation_widget_version = "1.3.3"; // This is used internally - should be the same reported on the plugin header
$thinkup_builder_animation_widget_dev_mode = false;

/* Widget class */
if( ! class_exists( 'thinkup_builder_animation' ) ) {

	class thinkup_builder_animation extends WP_Widget {

		function __construct() {
			$widget_ops = array( 'classname' => 'widget_thinkup_builder_animation', 'description' => __( 'Arbitrary text or HTML with visual editor', 'thinkup-builder-tinymce-widget' ) );
			$control_ops = array( 'width' => 800, 'height' => 800 );
			parent::__construct( 'thinkup-builder-tinymce', __( 'Animation', 'thinkup-builder-tinymce-widget' ), $widget_ops, $control_ops );
		}

		/* Add widget structure to Admin area. */
		function form( $instance ) {

			$default_entries = array( 
				'title' => '', 
				'text'  => '', 
				'type'  => 'html',
				'style' => '', 
				'delay' => '', 
			);
			$instance = wp_parse_args( (array) $instance, $default_entries );

			if (function_exists('esc_textarea')) {
				$text = esc_textarea($instance['text']);
			}
			else {
				$text = $instance['text'];
			}
			$type = esc_attr($instance['type']);
			if (get_bloginfo('version') < "3.5") {
				$toggle_buttons_extra_class = "editor_toggle_buttons_legacy";
				$media_buttons_extra_class = "editor_media_buttons_legacy";
			}
			else {
				$toggle_buttons_extra_class = "wp-toggle-buttons";
				$media_buttons_extra_class = "wp-media-buttons";
			}

			$title   = $instance['title'];
			$style   = $instance['style'];
			$delay   = $instance['delay'];

			echo '<p><label for="' . $this->get_field_id('title') . '"style="display: inline-block;width: 100px;">Module Title: </label><input class="widefat" id="' . $this->get_field_id('title') . '" name="' . $this->get_field_name('title') . '" type="text" value="' . esc_attr($title) . '" style="display: inline-block;width: 200px;" /></p>';	

			echo '<p><label for="' . $this->get_field_id('style') . '" style="display: inline-block;width: 97px;">Effect:</label>
				<select name="' . $this->get_field_name('style') . '" id="' . $this->get_field_id('style') . '" style="display: inline-block;width: 200px;margin: 0;">
				<option '; ?><?php if($style == "bounceIn") { echo "selected"; } ?><?php echo ' value="bounceIn">bounceIn</option>
				<option '; ?><?php if($style == "bounceInDown") { echo "selected"; } ?><?php echo ' value="bounceInDown">bounceInDown</option>
				<option '; ?><?php if($style == "bounceInUp") { echo "selected"; } ?><?php echo ' value="bounceInUp">bounceInUp</option>
				<option '; ?><?php if($style == "bounceInLeft") { echo "selected"; } ?><?php echo ' value="bounceInLeft">bounceInLeft</option>
				<option '; ?><?php if($style == "bounceInRight") { echo "selected"; } ?><?php echo ' value="bounceInRight">bounceInRight</option>
				<option '; ?><?php if($style == "bounceOut") { echo "selected"; } ?><?php echo ' value="bounceOut">bounceOut</option>
				<option '; ?><?php if($style == "bounceOutDown") { echo "selected"; } ?><?php echo ' value="bounceOutDown">bounceOutDown</option>
				<option '; ?><?php if($style == "bounceOutUp") { echo "selected"; } ?><?php echo ' value="bounceOutUp">bounceOutUp</option>
				<option '; ?><?php if($style == "bounceOutLeft") { echo "selected"; } ?><?php echo ' value="bounceOutLeft">bounceOutLeft</option>
				<option '; ?><?php if($style == "bounceOutRight") { echo "selected"; } ?><?php echo ' value="bounceOutRight">bounceOutRight</option>
				<option '; ?><?php if($style == "flipInX") { echo "selected"; } ?><?php echo ' value="flipInX">flipInX</option>
				<option '; ?><?php if($style == "flipOutX") { echo "selected"; } ?><?php echo ' value="flipOutX">flipOutX</option>
				<option '; ?><?php if($style == "flipInY") { echo "selected"; } ?><?php echo ' value="flipInY">flipInY</option>
				<option '; ?><?php if($style == "flipOutY") { echo "selected"; } ?><?php echo ' value="flipOutY">flipOutY</option>
				<option '; ?><?php if($style == "fadeIn") { echo "selected"; } ?><?php echo ' value="fadeIn">fadeIn</option>
				<option '; ?><?php if($style == "fadeInUp") { echo "selected"; } ?><?php echo ' value="fadeInUp">fadeInUp</option>
				<option '; ?><?php if($style == "fadeInDown") { echo "selected"; } ?><?php echo ' value="fadeInDown">fadeInDown</option>
				<option '; ?><?php if($style == "fadeInLeft") { echo "selected"; } ?><?php echo ' value="fadeInLeft">fadeInLeft</option>
				<option '; ?><?php if($style == "fadeInRight") { echo "selected"; } ?><?php echo ' value="fadeInRight">fadeInRight</option>
				<option '; ?><?php if($style == "fadeInUpBig") { echo "selected"; } ?><?php echo ' value="fadeInUpBig">fadeInUpBig</option>
				<option '; ?><?php if($style == "fadeInDownBig") { echo "selected"; } ?><?php echo ' value="fadeInDownBig">fadeInDownBig</option>
				<option '; ?><?php if($style == "fadeInLeftBig") { echo "selected"; } ?><?php echo ' value="fadeInLeftBig">fadeInLeftBig</option>
				<option '; ?><?php if($style == "fadeInRightBig") { echo "selected"; } ?><?php echo ' value="fadeInRightBig">fadeInRightBig</option>
				<option '; ?><?php if($style == "fadeOut") { echo "selected"; } ?><?php echo ' value="fadeOut">fadeOut</option>
				<option '; ?><?php if($style == "fadeOutUp") { echo "selected"; } ?><?php echo ' value="fadeOutUp">fadeOutUp</option>
				<option '; ?><?php if($style == "fadeOutDown") { echo "selected"; } ?><?php echo ' value="fadeOutDown">fadeOutDown</option>
				<option '; ?><?php if($style == "fadeOutLeft") { echo "selected"; } ?><?php echo ' value="fadeOutLeft">fadeOutLeft</option>
				<option '; ?><?php if($style == "fadeOutRight") { echo "selected"; } ?><?php echo ' value="fadeOutRight">fadeOutRight</option>
				<option '; ?><?php if($style == "fadeOutUpBig") { echo "selected"; } ?><?php echo ' value="fadeOutUpBig">fadeOutUpBig</option>
				<option '; ?><?php if($style == "fadeOutDownBig") { echo "selected"; } ?><?php echo ' value="fadeOutDownBig">fadeOutDownBig</option>
				<option '; ?><?php if($style == "fadeOutLeftBig") { echo "selected"; } ?><?php echo ' value="fadeOutLeftBig">fadeOutLeftBig</option>
				<option '; ?><?php if($style == "fadeOutRightBig") { echo "selected"; } ?><?php echo ' value="fadeOutRightBig">fadeOutRightBig</option>
				<option '; ?><?php if($style == "hinge") { echo "selected"; } ?><?php echo ' value="hinge">hinge</option>
				<option '; ?><?php if($style == "lightSpeedIn") { echo "selected"; } ?><?php echo ' value="lightSpeedIn">lightSpeedIn</option>
				<option '; ?><?php if($style == "lightSpeedOut") { echo "selected"; } ?><?php echo ' value="lightSpeedOut">lightSpeedOut</option>
				<option '; ?><?php if($style == "rollIn") { echo "selected"; } ?><?php echo ' value="rollIn">rollIn</option>
				<option '; ?><?php if($style == "rollOut") { echo "selected"; } ?><?php echo ' value="rollOut">rollOut</option>
				<option '; ?><?php if($style == "rotateIn") { echo "selected"; } ?><?php echo ' value="rotateIn">rotateIn</option>
				<option '; ?><?php if($style == "rotateInDownLeft") { echo "selected"; } ?><?php echo ' value="rotateInDownLeft">rotateInDownLeft</option>
				<option '; ?><?php if($style == "rotateInDownRight") { echo "selected"; } ?><?php echo ' value="rotateInDownRight">rotateInDownRight</option>
				<option '; ?><?php if($style == "rotateInUpLeft") { echo "selected"; } ?><?php echo ' value="rotateInUpLeft">rotateInUpLeft</option>
				<option '; ?><?php if($style == "rotateInUpRight") { echo "selected"; } ?><?php echo ' value="rotateInUpRight">rotateInUpRight</option>
				<option '; ?><?php if($style == "rotateOut") { echo "selected"; } ?><?php echo ' value="rotateOut">rotateOut</option>
				<option '; ?><?php if($style == "rotateOutDownLeft") { echo "selected"; } ?><?php echo ' value="rotateOutDownLeft">rotateOutDownLeft</option>
				<option '; ?><?php if($style == "rotateOutDownRight") { echo "selected"; } ?><?php echo ' value="rotateOutDownRight">rotateOutDownRight</option>
				<option '; ?><?php if($style == "rotateOutUpLeft") { echo "selected"; } ?><?php echo ' value="rotateOutUpLeft">rotateOutUpLeft</option>
				<option '; ?><?php if($style == "rotateOutUpRight") { echo "selected"; } ?><?php echo ' value="rotateOutUpRight">rotateOutUpRight</option>
				<option '; ?><?php if($style == "slideInDown") { echo "selected"; } ?><?php echo ' value="slideInDown">slideInDown</option>
				<option '; ?><?php if($style == "slideInLeft") { echo "selected"; } ?><?php echo ' value="slideInLeft">slideInLeft</option>
				<option '; ?><?php if($style == "slideInRight") { echo "selected"; } ?><?php echo ' value="slideInRight">slideInRight</option>
				<option '; ?><?php if($style == "slideOutUp") { echo "selected"; } ?><?php echo ' value="slideOutUp">slideOutUp</option>
				<option '; ?><?php if($style == "slideOutLeft") { echo "selected"; } ?><?php echo ' value="slideOutLeft">slideOutLeft</option>
				<option '; ?><?php if($style == "slideOutRight") { echo "selected"; } ?><?php echo ' value="slideOutRight">slideOutRight</option>
				</select>
			</p>';

			echo '<p><label for="' . $this->get_field_id('delay') . '" style="display: inline-block;width: 100px;">Delay (ms):</label><input class="widefat" id="' . $this->get_field_id('delay') . '" name="' . $this->get_field_name('delay') . '" type="text" value="' . esc_attr($delay) . '" style="display: inline-block;  width: 200px;margin: 0;" /></p>';	

	?>
			<input id="<?php echo $this->get_field_id('type'); ?>" name="<?php echo $this->get_field_name('type'); ?>" type="hidden" value="<?php echo esc_attr($type); ?>" />
			<div class="editor_toggle_buttons hide-if-no-js <?php echo $toggle_buttons_extra_class; ?>">
				<a id="widget-<?php echo $this->id_base; ?>-<?php echo $this->number; ?>-html"<?php if ($type == 'html') {?> class="active"<?php }?>><?php _e('HTML'); ?></a>
				<a id="widget-<?php echo $this->id_base; ?>-<?php echo $this->number; ?>-visual"<?php if($type == 'visual') {?> class="active"<?php }?>><?php _e('Visual'); ?></a>
			</div>
			<div class="editor_media_buttons hide-if-no-js <?php echo $media_buttons_extra_class; ?>">
				<?php do_action( 'media_buttons' ); ?>
			</div>
			<div class="editor_container">
				<textarea class="widefat" rows="20" cols="40" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo $text; ?></textarea>
			</div>
			<?php
		}

		/* Assign variable values. */
		function update( $new_instance, $old_instance ) {
			$instance             = $old_instance;
			$instance['title']    = $new_instance['title'];
			$instance['style']    = $new_instance['style'];
			$instance['delay']    = $new_instance['delay'];		
			if ( current_user_can('unfiltered_html') )
				$instance['text'] =  $new_instance['text'];
			else
				$instance['text'] = $new_instance['text'];
				$instance['type'] = strip_tags($new_instance['type']);
			return $instance;
		}

		/* Output widget to front-end. */
		function widget( $args, $instance ) {
			if ( get_option('embed_autourls') ) {
				$wp_embed = $GLOBALS['wp_embed'];
				add_filter( 'widget_text', array( $wp_embed, 'run_shortcode' ), 8 );
				add_filter( 'widget_text', array( $wp_embed, 'autoembed' ), 8 );
			}
			extract($args);
			$text  = apply_filters( 'widget_text', $instance['text'], $instance );
			$style = $instance['style'];
			$delay = $instance['delay'];

			if ( empty( $delay ) ) {
				$delay = '0';
			}

			echo '<div class="animated start-' . $style . '" title="' . $delay . '">',
				 do_shortcode( $text ),
				 '</div><div class="clearboth"></div>';

			// Enque styles only if widget is being used
			wp_enqueue_style( 'animate-css', plugin_dir_url(SITEORIGIN_PANELS_BASE_FILE) . 'inc/plugins/animate.css/animate.css', array(), '1.0' );
			wp_enqueue_style( 'animate-thinkup-css', plugin_dir_url(__FILE__) . 'css/animate-thinkup-panels.css', array(), '1.0' );

			if ( ! wp_script_is( 'waypoints', 'enqueued' ) ) {
			// Enque waypoints only if widget is being used		
			wp_enqueue_script( 'waypoints', plugin_dir_url(SITEORIGIN_PANELS_BASE_FILE) . 'inc/plugins/waypoints/waypoints.min.js', array( 'jquery' ), '2.0.3', 'true'  );
			wp_enqueue_script( 'waypoints-sticky', plugin_dir_url(SITEORIGIN_PANELS_BASE_FILE) . 'inc/plugins/waypoints/waypoints-sticky.min.js', array( 'jquery' ), '2.0.3', 'true'  );
			}

			// Enque scripts only if widget is being used	
			wp_enqueue_script( 'animate-js', plugin_dir_url(__FILE__) . 'js/animate-thinkup-panels.js', array( 'jquery' ), '1.1', true );
		}
	}

	/* Load localization */
	//load_plugin_textdomain( 'thinkup-builder-tinymce-widget', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' ); 

	/* Widget initialization */
	add_action( 'widgets_init', 'thinkup_builder_animation_widgets_init' );
	function thinkup_builder_animation_widgets_init() {
		if ( ! is_blog_installed() )
			return;
		register_widget( 'thinkup_builder_animation' );
	}

	/* Add actions and filters (only in widgets admin page) */
	add_action( 'admin_init', 'thinkup_builder_animation_admin_init' );
	function thinkup_builder_animation_admin_init() {
		global $pagenow;
		$load_editor = false;
	//	if ( $pagenow == "widgets.php" || $pagenow == "customize.php" ) {
			$load_editor = true;
	//	}
		// Compatibility for WP Page Widget plugin
		if ( is_plugin_active('wp-page-widget/wp-page-widgets.php' ) && (
				( in_array( $pagenow, array( 'post-new.php', 'post.php') ) ) ||
				( in_array( $pagenow, array( 'edit-tags.php' ) ) && isset( $_GET['action'] ) && $_GET['action'] == 'edit' ) || 
				( in_array( $pagenow, array( 'admin.php' ) ) && isset( $_GET['page'] ) && in_array( $_GET['page'], array( 'pw-front-page', 'pw-search-page' ) ) )
		) ) {
			$load_editor = true;
		}
		if ( $load_editor ) {
			add_action( 'admin_head', 'thinkup_builder_animation_load_tiny_mce' );
			add_filter( 'tiny_mce_before_init', 'thinkup_builder_animation_init_editor', 20 );
			add_action( 'admin_print_scripts', 'thinkup_builder_animation_scripts' );
			add_action( 'admin_print_styles', 'thinkup_builder_animation_styles' );
			add_action( 'admin_print_footer_scripts', 'thinkup_builder_animation_footer_scripts' );
			add_filter( 'atd_load_scripts', '__return_true'); // Compatibility with Jetpack After the deadline
		}
	}

	/* Instantiate tinyMCE editor */
	function thinkup_builder_animation_load_tiny_mce() {
		// Remove filters added from "After the deadline" plugin, to avoid conflicts
		// Add support for thickbox media dialog
		add_thickbox();
		// New media modal dialog (WP 3.5+)
		if ( function_exists( 'wp_enqueue_media' ) ) {
			wp_enqueue_media(); 
		}
	}

	/* TinyMCE setup customization */
	function thinkup_builder_animation_init_editor( $initArray ) {
		global $pagenow;
		// Remove WP fullscreen mode and set the native tinyMCE fullscreen mode
		if ( get_bloginfo( 'version' ) < "3.3" ) {
			$plugins = explode(',', $initArray['plugins']);
			if ( isset( $plugins['wpfullscreen'] ) ) {
				unset( $plugins['wpfullscreen'] );
			}
			if ( ! isset( $plugins['fullscreen'] ) ) {
				$plugins[] = 'fullscreen';
			}
			$initArray['plugins'] = implode( ',', $plugins );
		}
		// Remove the "More" toolbar button (only in widget screen)
		if ( $pagenow == "widgets.php" ) {
			$initArray['theme_advanced_buttons1'] = str_replace( ',wp_more', '', $initArray['theme_advanced_buttons1'] );
		}
		// Do not remove linebreaks
		$initArray['remove_linebreaks'] = false;
		// Convert newline characters to BR tags
		$initArray['convert_newlines_to_brs'] = false; 
		// Force P newlines
		$initArray['force_p_newlines'] = true; 
		// Force P newlines
		$initArray['force_br_newlines'] = false; 
		// Do not remove redundant BR tags
		$initArray['remove_redundant_brs'] = false;
		// Force p block
		$initArray['forced_root_block'] = 'p';
		// Apply source formatting
		$initArray['apply_source_formatting '] = true;
		// Return modified settings
		return $initArray;
	}

	/* Widget js loading */
	function thinkup_builder_animation_scripts() {
		global $thinkup_builder_animation_widget_version, $thinkup_builder_animation_widget_dev_mode;
		wp_enqueue_script('media-upload');
		if ( get_bloginfo( 'version' ) >= "3.3" ) {
			wp_enqueue_script( 'wplink' );
			wp_enqueue_script( 'wpdialogs-popup' );
			wp_enqueue_script('thinkup-builder-tinymce-widget', plugin_dir_url(__FILE__) . 'js/thinkup-builder-tinymce-widget.dev.js', array('jquery'), SITEORIGIN_PANELS_VERSION, true);
		}
		else {
			wp_enqueue_script('thinkup-builder-tinymce-widget-legacy', plugin_dir_url(__FILE__) . 'js/thinkup-builder-tinymce-widget-legacy.js', array('jquery'), SITEORIGIN_PANELS_VERSION, true);
		}
	}

	/* Widget css loading */
	function thinkup_builder_animation_styles() {
		global $thinkup_builder_animation_widget_version;
		if ( get_bloginfo( 'version' ) < "3.3" ) {
			wp_enqueue_style( 'thickbox' );
		}
		else {
			wp_enqueue_style( 'wp-jquery-ui-dialog' );
		}
		wp_print_styles( 'editor-buttons' );
		wp_enqueue_style('thinkup-builder-tinymce-widget', plugin_dir_url(__FILE__) . 'css/thinkup-builder-tinymce-widget.css', array(), SITEORIGIN_PANELS_VERSION);
	}


	/* Footer script */
	function thinkup_builder_animation_footer_scripts() {
		// Setup for WP 3.1 and previous versions
		if ( get_bloginfo( 'version' ) < "3.2" ) {
			if ( function_exists( 'wp_tiny_mce' ) ) {
				wp_tiny_mce( false, array() );
			}
			if ( function_exists( 'wp_tiny_mce_preload_dialogs' ) ) {
				wp_tiny_mce_preload_dialogs();
			}
		}
		// Setup for WP 3.2.x
		else if ( get_bloginfo( 'version' ) < "3.3" ) {
			if ( function_exists( 'wp_tiny_mce' ) ) {
				wp_tiny_mce( false, array() );
			}
			if ( function_exists( 'wp_preload_dialogs') ) {
				wp_preload_dialogs( array( 'plugins' => 'wpdialogs,wplink,wpfullscreen' ) );
			}
		}
		// Setup for WP 3.3 - New Editor API
		else {
			wp_editor( '', 'thinkup-builder-tinymce-widget' );
		}
	}

	/* Support for Smilies */
	add_filter( 'widget_text', 'thinkup_builder_animation_apply_smilies_to_widget_text' );
	function thinkup_builder_animation_apply_smilies_to_widget_text( $text ) {
		if ( get_option( 'use_smilies' ) ) {
			$text = convert_smilies( $text );
		}
		return $text;
	}

	/* Hack needed to enable full media options when adding content form media library */
	/* (this is done excluding post_id parameter in Thickbox iframe url) */
	add_filter( '_upload_iframe_src', 'thinkup_builder_animation_upload_iframe_src' );
	function thinkup_builder_animation_upload_iframe_src ( $upload_iframe_src ) {
		global $pagenow;
		if ( $pagenow == "widgets.php" || ( $pagenow == "admin-ajax.php" && isset ( $_POST['id_base'] ) && $_POST['id_base'] == "thinkup-builder-tinymce" ) ) {
			$upload_iframe_src = str_replace( 'post_id=0', '', $upload_iframe_src );
		}
		return $upload_iframe_src;
	}

	/* Hack for widgets accessibility mode */
	add_filter( 'wp_default_editor', 'thinkup_builder_animation_editor_accessibility_mode' );
	function thinkup_builder_animation_editor_accessibility_mode($editor) {
		global $pagenow;
		if ( $pagenow == "widgets.php" && isset( $_GET['editwidget'] ) && strpos( $_GET['editwidget'], 'thinkup-builder-tinymce' ) === 0 ) {
			$editor = 'html';
		}
		return $editor;
	}
}
