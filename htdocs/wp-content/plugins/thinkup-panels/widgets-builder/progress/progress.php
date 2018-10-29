<?php
/**
 * Add Progress Bar Page Builder Widget.
 *
 * @package ThinkUpThemes
 */


/* ----------------------------------------------------------------------------------
	Categories
---------------------------------------------------------------------------------- */

if( ! class_exists( 'thinkup_builder_progress' ) ) {

	class thinkup_builder_progress extends WP_Widget {

		/* Register widget description. */
		public function __construct() {
			$widget_ops = array('classname' => 'thinkup_builder_progress', 'description' => 'Add a progress bar to your content.' );
			parent::__construct('thinkup_builder_progress', 'Progress Bar', $widget_ops);
		}

		/* Add widget structure to Admin area. */
		function form($instance) {
			$default_entries = array( 
				'title'    => '', 
				'heading'  => '', 
				'type'     => '', 
				'style'    => '', 
				'progress' => '', 
				'show'     => '', 
				'animate'  => '', 
				'delay'    => '', 
			);
			$instance = wp_parse_args( (array) $instance, $default_entries );

			$title    = $instance['title'];
			$heading  = $instance['heading'];
			$type     = $instance['type'];
			$style    = $instance['style'];
			$progress = $instance['progress'];
			$show     = $instance['show'];
			$animate  = $instance['animate'];
			$delay    = $instance['delay'];

			echo '<p><label for="' . $this->get_field_id('title') . '" style="display: inline-block;width: 150px;" >Module Title:</label><input class="widefat" id="' . $this->get_field_id('title') . '" name="' . $this->get_field_name('title') . '" type="text" value="' . esc_attr($title) . '" style="display: inline-block;width: 200px;margin: 0;" /></p>';

			echo '<p><label for="' . $this->get_field_id('heading') . '" style="display: inline-block;width: 150px;" >Progress Heading:</label><input class="widefat" id="' . $this->get_field_id('heading') . '" name="' . $this->get_field_name('heading') . '" type="text" value="' . esc_attr($heading) . '" style="display: inline-block;width: 200px;margin: 0;" /></p>';

			echo '<p><label for="' . $this->get_field_id('type') . '" style="display: inline-block;width: 150px;" >Type:</label>
				<select name="' . $this->get_field_name('type') . '" id="' . $this->get_field_id('type') . '" style="display: inline-block;width: 200px;margin: 0;" >
				<option '; ?><?php if($type == "1") { echo "selected"; } ?><?php echo ' value="1">Basic</option>
				<option '; ?><?php if($type == "2") { echo "selected"; } ?><?php echo ' value="2">Striped</option>
				<option '; ?><?php if($type == "3") { echo "selected"; } ?><?php echo ' value="3">Animated</option>
				</select>
			</p>';

			echo '<p><label for="' . $this->get_field_id('style') . '" style="display: inline-block;width: 150px;" >Style:</label>
				<select name="' . $this->get_field_name('style') . '" id="' . $this->get_field_id('style') . '" style="display: inline-block;width: 200px;margin: 0;" >
				<option '; ?><?php if($style == "1") { echo "selected"; } ?><?php echo ' value="1">Normal</option>
				<option '; ?><?php if($style == "2") { echo "selected"; } ?><?php echo ' value="2">Info</option>
				<option '; ?><?php if($style == "3") { echo "selected"; } ?><?php echo ' value="3">Success</option>
				<option '; ?><?php if($style == "4") { echo "selected"; } ?><?php echo ' value="4">Warning</option>
				<option '; ?><?php if($style == "5") { echo "selected"; } ?><?php echo ' value="5">danger</option>
				</select>
			</p>';

			echo '<p><label for="' . $this->get_field_id('progress') . '" style="display: inline-block;width: 150px;" >Progress (%):</label>
				<select name="' . $this->get_field_name('progress') . '" id="' . $this->get_field_id('progress') . '" style="display: inline-block;width: 200px;margin: 0;" >';
				foreach ( range(1,100) as $k ) {
					echo '<option '; ?><?php if( $progress == $k ) { echo "selected"; } ?><?php echo ' value="' . $k . '">' . $k . '</option>';
				}
			echo '</select>',
				 '</p>';

			echo '<p><label for="' . $this->get_field_id('show') . '" style="display: inline-block;width: 150px;">Show %:</label>&nbsp;<input id="' . $this->get_field_id('show') . '" name="' . $this->get_field_name('show') . '" type="checkbox" '; ?><?php if($show == "on") { echo 'checked=checked'; } ?><?php echo ' /></p>';

			echo '<p><label for="' . $this->get_field_id('animate') . '" style="display: inline-block;width: 150px;">Animate Progress?</label>&nbsp;<input id="' . $this->get_field_id('animate') . '" name="' . $this->get_field_name('animate') . '" type="checkbox" '; ?><?php if($animate == "on") { echo 'checked=checked'; } ?><?php echo ' /></p>';

			echo '<p><label for="' . $this->get_field_id('delay') . '" style="display: inline-block;width: 150px;" >Animation Delay (ms):</label><input class="widefat" id="' . $this->get_field_id('delay') . '" name="' . $this->get_field_name('delay') . '" type="text" value="' . esc_attr($delay) . '" style="display: inline-block;width: 200px;margin: 0;" /></p>';
		}

		/* Assign variable values. */
		function update($new_instance, $old_instance) {
			$instance             = $old_instance;
			$instance['title']    = $new_instance['title'];		
			$instance['heading']  = $new_instance['heading'];
			$instance['type']     = $new_instance['type'];
			$instance['style']    = $new_instance['style'];
			$instance['progress'] = $new_instance['progress'];
			$instance['show']     = $new_instance['show'];
			$instance['animate']  = $new_instance['animate'];
			$instance['delay']    = $new_instance['delay'];
			return $instance;
		}

		/* Output widget to front-end. */
		function widget($args, $instance) {

			$output      = NULL;
			$block       = NULL;
			$input_width = NULL;
			$input_delay = NULL;
			$input_style = NULL;

			$heading  = $instance['heading'];
			$type     = $instance['type'];
			$style    = $instance['style'];
			$progress = $instance['progress'];
			$show     = $instance['show'];
			$animate  = $instance['animate'];
			$delay    = $instance['delay'];

			// Determine which style to use
			if ( $style == '2' ) {
				$style = 'info';
			} else if ($style == '3' ) {
				$style = 'success';
			} else if ($style == '4' ) {
				$style = 'warning';
			} else if ($style == '5' ) {
				$style = 'danger';
			} else {
				$style = '';
			}

			if ( empty( $type ) or $type == '1' ) {
				echo do_shortcode( '[progress1 style="' . $style . '" title="' . $heading . '" progress="' . $progress . '" show="' . $show . '" animate="' . $animate . '" delay="' . $delay . '"]' );
			} else if ( $type == '2' ) {
				echo do_shortcode( '[progress2 style="' . $style . '" title="' . $heading . '" progress="' . $progress . '" show="' . $show . '" animate="' . $animate . '" delay="' . $delay . '"]' );
			} else if ($type == '3' ) {
				echo do_shortcode( '[progress3 style="' . $style . '" title="' . $heading . '" progress="' . $progress . '" show="' . $show . '" animate="' . $animate . '" delay="' . $delay . '"]' );
			}

			if ( $animate == 'on' ) {
				
				if ( ! wp_script_is( 'animate-js', 'enqueued' ) ) {
				// Enque styles only if widget is being used
				wp_enqueue_style( 'animate-css', plugin_dir_url(SITEORIGIN_PANELS_BASE_FILE) . 'inc/plugins/animate.css/animate.css', array(), '1.0' );
				wp_enqueue_style( 'animate-thinkup-css', plugin_dir_url(SITEORIGIN_PANELS_BASE_FILE) . 'widgets-builder/animation/css/animate-thinkup-panels.css', array(), '1.0' );

				if ( ! wp_script_is( 'waypoints', 'enqueued' ) ) {
				// Enque waypoints only if widget is being used
				wp_enqueue_script( 'waypoints', plugin_dir_url(SITEORIGIN_PANELS_BASE_FILE) . 'inc/plugins/waypoints/waypoints.min.js', array( 'jquery' ), '2.0.3', 'true'  );
				wp_enqueue_script( 'waypoints-sticky', plugin_dir_url(SITEORIGIN_PANELS_BASE_FILE) . 'inc/plugins/waypoints/waypoints-sticky.min.js', array( 'jquery' ), '2.0.3', 'true'  );
				}

				// Enque scripts only if widget is being used
				wp_enqueue_script( 'animate-js', plugin_dir_url(SITEORIGIN_PANELS_BASE_FILE) . 'widgets-builder/animation/js/animate-thinkup-panels.js', array( 'jquery' ), '1.1', true );
				}
			}
		}
	}
	add_action( 'widgets_init', create_function('', 'return register_widget("thinkup_builder_progress");') );
}


?>