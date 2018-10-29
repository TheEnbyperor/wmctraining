<?php
/**
 * Add Twitter Post Page Widget.
 *
 * @package ThinkUpThemes
 */


/* ----------------------------------------------------------------------------------
	Categories
---------------------------------------------------------------------------------- */

if( ! class_exists( 'thinkup_builder_twitter' ) ) {

	class thinkup_builder_twitter extends WP_Widget {

		/* Register widget description. */
		public function __construct() {
			$widget_ops = array('classname' => 'thinkup_builder_twitter', 'description' => 'Add a Twitter post to your content.' );
			parent::__construct('thinkup_builder_twitter', 'Twitter Post', $widget_ops);
		}

		/* Add widget structure to Admin area. */
		function form($instance) {
			$default_entries = array( 
				'title'   => '', 
				'twitter' => '', 
			);
			$instance = wp_parse_args( (array) $instance, $default_entries );

			$title   = $instance['title'];
			$twitter = $instance['twitter'];

			echo '<p><label for="' . $this->get_field_id('title') . '" style="display: inline-block;width: 150px;" >Module Title:</label><input class="widefat" id="' . $this->get_field_id('title') . '" name="' . $this->get_field_name('title') . '" type="text" value="' . esc_attr($title) . '" style="display: inline-block;width: 200px;margin: 0;" /></p>';

			echo '<p><label for="' . $this->get_field_id('twitter') . '" style="display: inline-block;width: 150px;" >Twitter Post Link:</label><input class="widefat" id="' . $this->get_field_id('twitter') . '" name="' . $this->get_field_name('twitter') . '" type="text" value="' . esc_url($twitter) . '" style="display: inline-block;width: 200px;margin: 0;" /></p>';
		}

		/* Assign variable values. */
		function update($new_instance, $old_instance) {
			$instance            = $old_instance;
			$instance['title']   = $new_instance['title'];		
			$instance['twitter'] = $new_instance['twitter'];
			return $instance;
		}

		/* Output widget to front-end. */
		function widget($args, $instance) {
			global $wp_embed;
			
			extract($args, EXTR_SKIP);

			$twitter = $instance['twitter'];

			if ( ! empty( $twitter ) ) {

				if ( strpos( $twitter, 'https://' ) !== false ) {
					$twitter = 'https://' . str_replace( 'https://', '', $twitter );
				} else {
					$twitter = 'http://' . str_replace( 'http://', '', $twitter );
				}
				echo $wp_embed->run_shortcode('[embed]' .$twitter . '[/embed]');
			}
		}
	}
	add_action( 'widgets_init', create_function('', 'return register_widget("thinkup_builder_twitter");') );
}


?>