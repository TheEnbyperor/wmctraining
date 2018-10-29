<?php
/**
 * Add Divider Page Widget.
 *
 * @package ThinkUpThemes
 */


/* ----------------------------------------------------------------------------------
	Divider
---------------------------------------------------------------------------------- */

if( ! class_exists( 'thinkup_builder_divider' ) ) {

	class thinkup_builder_divider extends WP_Widget {

		/* Register widget description. */
		public function __construct() {
			$widget_ops = array('classname' => 'thinkup_builder_divider', 'description' => 'Add a dividing line to your content.' );
			parent::__construct('thinkup_builder_divider', 'Divider', $widget_ops);
		}

		/* Add widget structure to Admin area. */
		function form($instance) {
			$default_entries = array( 
				'title'   => '', 
				'divider' => '' 
			);
			$instance = wp_parse_args( (array) $instance, $default_entries );

			$title   = $instance['title'];
			$divider = $instance['divider'];

			echo '<p><label for="' . $this->get_field_id('title') . '" style="display: inline-block;  width: 100px;">Module Title:</label><input class="widefat" id="' . $this->get_field_id('title') . '" name="' . $this->get_field_name('title') . '" type="text" value="' . esc_attr($title) . '" style="display: inline-block;  width: 200px; margin: 0px;" /></p>';

			echo '<p><label for="' . $this->get_field_id('divider') . '" style="display: inline-block;  width: 97px;">Display type:</label>
				<select name="' . $this->get_field_name('divider') . '" id="' . $this->get_field_id('divider') . '" style="display: inline-block;  width: 200px; margin: 0px;" >
				<option '; ?><?php if($divider == "1") { echo "selected"; } ?><?php echo ' value="1">Line</option>
				<option '; ?><?php if($divider == "2") { echo "selected"; } ?><?php echo ' value="2">Fade</option>
				<option '; ?><?php if($divider == "3") { echo "selected"; } ?><?php echo ' value="3">Line (Scroll to Top)</option>
				</select>
			</p>';

		}

		/* Assign variable values. */
		function update($new_instance, $old_instance) {
			$instance            = $old_instance;
			$instance['title']   = $new_instance['title'];		
			$instance['divider'] = $new_instance['divider'];
			return $instance;
		}

		/* Output widget to front-end. */
		function widget($args, $instance) {
			
			extract($args, EXTR_SKIP);
		 
			if (empty($instance['divider']) or $instance['divider'] == '1' ) {
				echo '<div class="divider"></div>';
			} else if ( $instance['divider'] == '2' ) {
				echo '<div class="divider-fade"></div>';
			} else if ( $instance['divider'] == '3' ) {
				echo '<div class="divider-top"><a href="javascript:void(0)" class="backtotop">Top</a></div>';
			}
		}
	}
	add_action( 'widgets_init', create_function('', 'return register_widget("thinkup_builder_divider");') );
}


?>