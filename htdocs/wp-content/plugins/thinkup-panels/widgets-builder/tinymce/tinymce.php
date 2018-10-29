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

global $thinkup_builder_tinymce_widget_version;
global $thinkup_builder_tinymce_widget_dev_mode;
$thinkup_builder_tinymce_widget_version = "1.3.3"; // This is used internally - should be the same reported on the plugin header
$thinkup_builder_tinymce_widget_dev_mode = false;

/* Widget class */
if( ! class_exists( 'thinkup_builder_tinymce' ) ) {

	class thinkup_builder_tinymce extends WP_Widget {

		function __construct() {
			$widget_ops = array( 'classname' => 'widget_thinkup_builder_tinymce', 'description' => __( 'Arbitrary text or HTML with visual editor', 'thinkup-builder-tinymce-widget' ) );
			$control_ops = array( 'width' => 800, 'height' => 800 );
			parent::__construct( 'thinkup-builder-tinymce', __( 'TinyMCE', 'thinkup-builder-tinymce-widget' ), $widget_ops, $control_ops );
		}

		function widget( $args, $instance ) {
			if ( get_option( 'embed_autourls' ) ) {
				$wp_embed = $GLOBALS['wp_embed'];
				add_filter( 'widget_text', array( $wp_embed, 'run_shortcode' ), 8 );
				add_filter( 'widget_text', array( $wp_embed, 'autoembed' ), 8 );
			}
			extract( $args );
			$title = apply_filters( 'widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base );
			$wide  = $instance['wide'];
			$text  = apply_filters( 'widget_text', $instance['text'], $instance );
			if ( function_exists( 'icl_t' ) ) {
				$title = icl_t( "Widgets", 'widget title - ' . md5 ( $title ), $title );
				$text = icl_t( "Widgets", 'widget body - ' . $this->id_base . '-' . $this->number, $text );
			}
			$text = apply_filters( 'widget_text', $instance['text'], $instance );

			// Determine whether full screen layout should be shown or not
			if($wide == "on") {

				// Add div tags where screen wide option is selected
				$div_before = '<div class="thinkupbuilder-tinymce" data-wide="' . $wide . '">';
				$div_after = '</div>';

				// Enqueue script to activate screenwide layout
				wp_enqueue_script( 'thinkup-tinymce-js', plugin_dir_url(__FILE__) . 'js/thinkup-builder-tinymce-widget-screenwide.js', array( 'jquery' ), '1.1', true );

			} else {

				$div_before = NULL;
				$div_after = NULL;

			}

			echo $div_before;
				echo do_shortcode( $text );
			echo $div_after;
		}

		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$instance['title']    = strip_tags( $new_instance['title'] );
			$instance['wide']     = $new_instance['wide'];
			if ( current_user_can('unfiltered_html') ) {
				$instance['text'] =  $new_instance['text'];
			}
			else {
				$instance['text'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['text']) ) ); // wp_filter_post_kses() expects slashed
			}
			$instance['type'] = strip_tags( $new_instance['type'] );
			if ( function_exists( 'icl_register_string' )) {
				//icl_register_string( "Widgets", 'widget title - ' . $this->id_base . '-' . $this->number /* md5 ( apply_filters( 'widget_title', $instance['title'] ))*/, apply_filters( 'widget_title', $instance['title'] ) ); // This is handled automatically by WPML
				icl_register_string( "Widgets", 'widget body - ' . $this->id_base . '-' . $this->number, apply_filters( 'widget_text', $instance['text'] ) );
			}
			return $instance;
		}

		function form( $instance ) {
			$default_entries = array( 
				'title'   => '', 
				'text'    => '', 
				'type'    => 'visual', 
				'wide'    => '' 
			);
			$instance = wp_parse_args( (array) $instance, $default_entries );

			$title   = strip_tags( $instance['title'] );
			$wide    = $instance['wide'];
			if ( function_exists( 'esc_textarea' ) ) {
				$text = esc_textarea( $instance['text'] );
			}
			else {
				$text = stripslashes( wp_filter_post_kses( addslashes( $instance['text'] ) ) );
			}
			$type = esc_attr( $instance['type'] );
			if ( get_bloginfo( 'version' ) < "3.5" ) {
				$toggle_buttons_extra_class = "editor_toggle_buttons_legacy";
				$media_buttons_extra_class = "editor_media_buttons_legacy";
			}
			else {
				$toggle_buttons_extra_class = "wp-toggle-buttons";
				$media_buttons_extra_class = "wp-media-buttons";
			}
			?>
			<input id="<?php echo $this->get_field_id( 'type' ); ?>" name="<?php echo $this->get_field_name( 'type' ); ?>" type="hidden" value="<?php echo esc_attr( $type ); ?>" />
			<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

			<div class="editor_toggle_buttons hide-if-no-js <?php echo $toggle_buttons_extra_class; ?>">
				<a id="widget-<?php echo $this->id_base; ?>-<?php echo $this->number; ?>-html"<?php if ( $type == 'html' ) {?> class="active"<?php }?>><?php _e( 'HTML' ); ?></a>
				<a id="widget-<?php echo $this->id_base; ?>-<?php echo $this->number; ?>-visual"<?php if ( $type == 'visual' ) {?> class="active"<?php }?>><?php _e(' Visual' ); ?></a>
			</div>
			<div class="editor_media_buttons hide-if-no-js <?php echo $media_buttons_extra_class; ?>">
				<?php do_action( 'media_buttons' ); ?>
			</div>
			<div class="editor_container">
				<textarea class="widefat" rows="20" cols="40" id="<?php echo $this->get_field_id( 'text' ); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo $text; ?></textarea>
			</div>

			<p><label for="<?php echo  $this->get_field_id('wide'); ?>" style="display: inline-block;width: 100px;">Screen Wide?:</label>&nbsp;<input id="<?php echo $this->get_field_id('wide'); ?>" name="<?php echo $this->get_field_name('wide'); ?>" type="checkbox" <?php if($wide == "on") { echo 'checked=checked'; } ?> /><label style="padding-lefT: 10px;font-size: 90%;">Note: Only works with Parallax Page Template</label></p>

	<?php
		}
	}

	/* Load localization */
	//load_plugin_textdomain( 'thinkup-builder-tinymce-widget', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' ); 

	/* Widget initialization */
	add_action( 'widgets_init', 'thinkup_builder_tinymce_widgets_init' );
	function thinkup_builder_tinymce_widgets_init() {
		if ( ! is_blog_installed() )
			return;
		register_widget( 'thinkup_builder_tinymce' );
	}

	/* Add actions and filters (only in widgets admin page) */
	add_action( 'admin_init', 'thinkup_builder_tinymce_admin_init' );
	function thinkup_builder_tinymce_admin_init() {
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
			add_action( 'admin_head', 'thinkup_builder_tinymce_load_tiny_mce' );
			add_filter( 'tiny_mce_before_init', 'thinkup_builder_tinymce_init_editor', 20 );
			add_action( 'admin_print_scripts', 'thinkup_builder_tinymce_scripts' );
			add_action( 'admin_print_styles', 'thinkup_builder_tinymce_styles' );
			add_action( 'admin_print_footer_scripts', 'thinkup_builder_tinymce_footer_scripts' );
			add_filter( 'atd_load_scripts', '__return_true'); // Compatibility with Jetpack After the deadline
		}
	}

	/* Instantiate tinyMCE editor */
	function thinkup_builder_tinymce_load_tiny_mce() {
		// Remove filters added from "After the deadline" plugin, to avoid conflicts
		// Add support for thickbox media dialog
		add_thickbox();
		// New media modal dialog (WP 3.5+)
		if ( function_exists( 'wp_enqueue_media' ) ) {
			wp_enqueue_media(); 
		}
	}

	/* TinyMCE setup customization */
	function thinkup_builder_tinymce_init_editor( $initArray ) {
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
	function thinkup_builder_tinymce_scripts() {
		global $thinkup_builder_tinymce_widget_version, $thinkup_builder_tinymce_widget_dev_mode;
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
	function thinkup_builder_tinymce_styles() {
		global $thinkup_builder_tinymce_widget_version;
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
	function thinkup_builder_tinymce_footer_scripts() {
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
	add_filter( 'widget_text', 'thinkup_builder_tinymce_apply_smilies_to_widget_text' );
	function thinkup_builder_tinymce_apply_smilies_to_widget_text( $text ) {
		if ( get_option( 'use_smilies' ) ) {
			$text = convert_smilies( $text );
		}
		return $text;
	}

	/* Hack needed to enable full media options when adding content form media library */
	/* (this is done excluding post_id parameter in Thickbox iframe url) */
	add_filter( '_upload_iframe_src', 'thinkup_builder_tinymce_upload_iframe_src' );
	function thinkup_builder_tinymce_upload_iframe_src ( $upload_iframe_src ) {
		global $pagenow;
		if ( $pagenow == "widgets.php" || ( $pagenow == "admin-ajax.php" && isset ( $_POST['id_base'] ) && $_POST['id_base'] == "thinkup-builder-tinymce" ) ) {
			$upload_iframe_src = str_replace( 'post_id=0', '', $upload_iframe_src );
		}
		return $upload_iframe_src;
	}

	/* Hack for widgets accessibility mode */
	add_filter( 'wp_default_editor', 'thinkup_builder_tinymce_editor_accessibility_mode' );
	function thinkup_builder_tinymce_editor_accessibility_mode($editor) {
		global $pagenow;
		if ( $pagenow == "widgets.php" && isset( $_GET['editwidget'] ) && strpos( $_GET['editwidget'], 'thinkup-builder-tinymce' ) === 0 ) {
			$editor = 'html';
		}
		return $editor;
	}
}


?>