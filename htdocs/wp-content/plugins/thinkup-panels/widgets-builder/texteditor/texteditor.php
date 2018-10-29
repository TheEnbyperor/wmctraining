<?php
/**
 * Add Text Editor to Page Builder Widget.
 *
 * @package ThinkUpThemes
 */


/* ----------------------------------------------------------------------------------
	Categories
---------------------------------------------------------------------------------- */

if( ! class_exists( 'thinkup_builder_texteditor' ) ) {

	class thinkup_builder_texteditor extends WP_Widget {

		/* Register widget description. */
		public function __construct() {
			$widget_ops = array('classname' => 'thinkup_builder_texteditor', 'description' => 'Add a HTML text area to your content.' );
			parent::__construct('thinkup_builder_texteditor', 'Text Editor', $widget_ops);
		}

		/* Add widget structure to Admin area. */
		function form($instance) {
			$default_entries = array( 
				'title'   => '', 
				'text'    => '', 
				'autop'   => '',
				'wide'    => '' 
			);
			$instance = wp_parse_args( (array) $instance, $default_entries );
		
			$title = $instance['title'];
			$text  = $instance['text'];
			$autop = $instance['autop'];
			$wide  = $instance['wide'];

			// Check if wide layout is enabled
//			if($wide == "on") { echo 'checked=checked'; }

			echo '<p><label for="' . $this->get_field_id('title') . '" style="display: inline-block;width: 150px;">Module Title:</label><input class="widefat" id="' . $this->get_field_id('title') . '" name="' . $this->get_field_name('title') . '" type="text" value="' . esc_attr($title) . '" style="display: inline-block;width: 200px;margin: 0;" /></p>';

			echo '<p><label for="' . $this->get_field_id('text') . '" >Content:</label><textarea for="' . $this->get_field_id('text') . '" id="' . $this->get_field_id('text') . '" name="' . $this->get_field_name('text') . '" style="display: block; width: 100%; height: 100px;" >' . esc_attr($text) . '</textarea></p>';

			echo '<p><label for="' . $this->get_field_id('autop') . '" style="display: inline-block;width: 200px;">Automatically add paragraphs?</label>&nbsp;<input id="' . $this->get_field_id('autop') . '" name="' . $this->get_field_name('autop') . '" type="checkbox" '; ?><?php if($autop == "on") { echo 'checked=checked'; } ?><?php echo ' /></p>';

			echo '<p><label for="' . $this->get_field_id('wide') . '" style="display: inline-block;width: 200px;">Screen Wide?</label>&nbsp;<input id="' . $this->get_field_id('wide') . '" name="' . $this->get_field_name('wide') . '" type="checkbox" '; ?><?php if($wide == "on") { echo 'checked=checked'; } ?><?php echo ' /><label style="padding-lefT: 10px;font-size: 90%;">Note: Only works with Parallax Page Template</label></p>';
		}

		/* Assign variable values. */
		function update($new_instance, $old_instance) {
			$instance          = $old_instance;
			$instance['title'] = $new_instance['title'];
			$instance['text']  = $new_instance['text'];
			$instance['autop'] = $new_instance['autop'];
			$instance['wide']  = $new_instance['wide'];
			return $instance;
		}

		/* Output widget to front-end. */
		function widget($args, $instance) {

			$text   = $instance['text'];
			$autop  = $instance['autop'];
			$wide   = $instance['wide'];

			extract($args, EXTR_SKIP);

			// Determine whether full screen layout should be shown or not
			if($wide == "on") {

				// Add div tags where screen wide option is selected
				$div_before = '<div class="thinkupbuilder-texteditor" data-wide="' . $wide . '">';
				$div_after = '</div>';

				// Enqueue script to activate screenwide layout
				wp_enqueue_script( 'thinkup-texteditor-js', plugin_dir_url(__FILE__) . 'js/thinkup-builder-texteditor-widget-screenwide.js', array( 'jquery' ), '1.1', true );

			} else {

				$div_before = NULL;
				$div_after = NULL;

			}

			echo $div_before;
				if($autop == "on") {
					echo wpautop( do_shortcode( $text ) );
				} else {
					echo do_shortcode( $text );					
				}
			echo $div_after;
		}
	}
	add_action( 'widgets_init', create_function('', 'return register_widget("thinkup_builder_texteditor");') );
}


?>