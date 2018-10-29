<?php
/**
 * Add Button Page Builder Widget.
 *
 * @package ThinkUpThemes
 */


/* ----------------------------------------------------------------------------------
	Categories
---------------------------------------------------------------------------------- */

if( ! class_exists( 'thinkup_builder_button' ) ) {

	class thinkup_builder_button extends WP_Widget {

		/* Register widget description. */
		public function __construct() {
			$widget_ops = array('classname' => 'thinkup_builder_button', 'description' => 'Add a button to your content.' );
			parent::__construct('thinkup_builder_button', 'Button', $widget_ops);
		}

		/* Add widget structure to Admin area. */
		function form($instance) {
			$default_entries = array( 'title' => '', 'text' => '', 'link' => '', 'color' => '', 'size' => '', 'style' => '' );
			$instance = wp_parse_args( (array) $instance, $default_entries );

			$title = $instance['title'];
			$text  = $instance['text'];
			$link  = $instance['link'];
			$color = $instance['color'];
			$size  = $instance['size'];
			$style = $instance['style'];
			$tab   = $instance['tab'];

			echo '<p><label for="' . $this->get_field_id('title') . '" style="display: inline-block;  width: 100px;">Module Title:</label><input class="widefat" id="' . $this->get_field_id('title') . '" name="' . $this->get_field_name('title') . '" type="text" value="' . esc_attr($title) . '" style="display: inline-block;width: 200px;margin: 0;" /></p>';

			echo '<p><label for="' . $this->get_field_id('text') . '" style="display: inline-block;  width: 100px;">Text:</label><input class="widefat" id="' . $this->get_field_id('text') . '" name="' . $this->get_field_name('text') . '" type="text" value="' . esc_attr($text) . '" style="display: inline-block;width: 200px;margin: 0;" /></p>';

			echo '<p><label for="' . $this->get_field_id('link') . '" style="display: inline-block;  width: 100px;">Link:</label><input class="widefat" id="' . $this->get_field_id('link') . '" name="' . $this->get_field_name('link') . '" type="text" value="' . esc_url($link) . '" style="display: inline-block;width: 200px;margin: 0;" /></p>';

			echo '<p><label for="' . $this->get_field_id('size') . '" style="display: inline-block;  width: 100px;">Size:</label>
				<select name="' . $this->get_field_name('size') . '" id="' . $this->get_field_id('size') . '" style="display: inline-block;width: 200px;margin: 0;" >
				<option '; ?><?php if($size == "small") { echo "selected"; } ?><?php echo ' value="small">Small</option>
				<option '; ?><?php if($size == "medium") { echo "selected"; } ?><?php echo ' value="medium">Medium</option>
				<option '; ?><?php if($size == "large") { echo "selected"; } ?><?php echo ' value="large">Large</option>
				</select>
			</p>';

			echo '<p><label for="' . $this->get_field_id('color') . '" style="display: inline-block;  width: 100px;">Color:</label>
				<select name="' . $this->get_field_name('color') . '" id="' . $this->get_field_id('color') . '" style="display: inline-block;width: 200px;margin: 0;" >
				<option '; ?><?php if($color == "themebutton") { echo "selected"; } ?><?php echo ' value="themebutton">Theme Color</option>
				<option '; ?><?php if($color == "aqua") { echo "selected"; } ?><?php echo ' value="aqua">Aqua</option>
				<option '; ?><?php if($color == "black") { echo "selected"; } ?><?php echo ' value="black">Black</option>
				<option '; ?><?php if($color == "blue_dark") { echo "selected"; } ?><?php echo ' value="blue_dark">Blue (dark)</option>
				<option '; ?><?php if($color == "blue_light") { echo "selected"; } ?><?php echo ' value="blue_light">Blue (light)</option>
				<option '; ?><?php if($color == "brown") { echo "selected"; } ?><?php echo ' value="brown">Brown</option>
				<option '; ?><?php if($color == "green_dark") { echo "selected"; } ?><?php echo ' value="green_dark">Green (dark)</option>
				<option '; ?><?php if($color == "green_light") { echo "selected"; } ?><?php echo ' value="green_light">Green (light)</option>
				<option '; ?><?php if($color == "grey") { echo "selected"; } ?><?php echo ' value="grey">Grey</option>
				<option '; ?><?php if($color == "red_dark") { echo "selected"; } ?><?php echo ' value="red_dark">Red (dark)</option>
				<option '; ?><?php if($color == "red_light") { echo "selected"; } ?><?php echo ' value="red_light">Red (light)</option>
				<option '; ?><?php if($color == "pink") { echo "selected"; } ?><?php echo ' value="pink">Pink</option>
				<option '; ?><?php if($color == "purple") { echo "selected"; } ?><?php echo ' value="purple">Purple</option>
				</select>
			</p>';

			echo '<p><label for="' . $this->get_field_id('style') . '" style="display: inline-block;  width: 100px;">Style:</label>
				<select name="' . $this->get_field_name('style') . '" id="' . $this->get_field_id('style') . '" style="display: inline-block;width: 200px;margin: 0;" >
				<option '; ?><?php if($style == "style1") { echo "selected"; } ?><?php echo ' value="style1">Style 1</option>
				<option '; ?><?php if($style == "style2") { echo "selected"; } ?><?php echo ' value="style2">Style 2</option>
				<option '; ?><?php if($style == "style3") { echo "selected"; } ?><?php echo ' value="style3">Style 3</option>
				<option '; ?><?php if($style == "style4") { echo "selected"; } ?><?php echo ' value="style4">Style 4</option>
				</select>
			</p>';

			echo '<p><label for="' . $this->get_field_id('tab') . '" style="display: inline-block;  width: 100px;">New tab:</label>
				<select name="' . $this->get_field_name('tab') . '" id="' . $this->get_field_id('tab') . '" style="display: inline-block;width: 200px;margin: 0;" >
				<option '; ?><?php if($tab == "off") { echo "selected"; } ?><?php echo ' value="off">Off</option>
				<option '; ?><?php if($tab == "on") { echo "selected"; } ?><?php echo ' value="on">On</option>
				</select>
			</p>';
		}

		/* Assign variable values. */
		function update($new_instance, $old_instance) {
			$instance          = $old_instance;
			$instance['title'] = $new_instance['title'];
			$instance['text']  = $new_instance['text'];
			$instance['link']  = $new_instance['link'];
			$instance['color'] = $new_instance['color'];
			$instance['size']  = $new_instance['size'];
			$instance['style'] = $new_instance['style'];
			$instance['tab']   = $new_instance['tab'];
			return $instance;
		}

		/* Output widget to front-end. */
		function widget($args, $instance) {

			$title = $instance['title'];
			$text  = $instance['text'];
			$link  = $instance['link'];
			$color = $instance['color'];
			$size  = $instance['size'];
			$style = $instance['style'];
			$tab   = $instance['tab'];

			extract($args, EXTR_SKIP);

			if ( empty( $style ) ) {
				$style = 'style1';		
			}
			if ( $tab == 'on' ) {
				$tab = ' target="_blank"';		
			}
		
			echo '<a href="' . $link . '" class="button ' . $style . ' ' . $color . ' ' . $size . '"' . $tab . '>' . $text . '</a>';
		}
	}
	add_action( 'widgets_init', create_function('', 'return register_widget("thinkup_builder_button");') );
}


?>