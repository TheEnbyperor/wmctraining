<?php
/**
 * Add TinyMCE Widget. This has been forked from http://wordpress.org/extend/plugins/image-widget/.
 * All copyright notices for Modern Tribe have remained intact. 
 * IDs, classes and layout have been changed to best meet the needs of Think Up Themes Ltd. 
 * Change have been made within the restrictions of the GPL license under which the Modern Tribe Image Widget has been released.
 *
 * @package ThinkUpThemes
 */


//----------------------------------------------------------------------------------
//	Image Widget
//----------------------------------------------------------------------------------

if( ! class_exists( 'thinkup_builder_featured' ) ) {

	class thinkup_builder_featured extends WP_Widget {

		const VERSION = '4.0.6';
		const CUSTOM_IMAGE_SIZE_SLUG = 'thinkup_builder_featured_custom';

		// Register widget description.
		public function __construct() {
			$widget_ops = array( 'classname' => 'thinkup_builder_featured', 'description' => __( 'Add a featured content section.', 'image_widget' ) );
			$control_ops = array( 'id_base' => 'thinkup_builder_featured' );
			parent::__construct('thinkup_builder_featured', __('Featured', 'image_widget'), $widget_ops, $control_ops);

			// Add scripts to admin area
			add_action('admin_head', array( $this, 'admin_head' ) );
			add_action( 'admin_enqueue_scripts', array( $this, 'admin_setup' ) );
		}

		//Enqueue all the javascript.
		function admin_setup() {
			wp_enqueue_media();
			wp_enqueue_script( 'thinkup-builder-featured', plugin_dir_url(__FILE__) . 'js/featured.js', array( 'jquery', 'media-upload', 'media-views' ), self::VERSION );

			wp_localize_script( 'thinkup-builder-featured', 'ThinkupBuilderFeatured', array(
				'frame_title' => __( 'Select an Image', 'image_widget' ),
				'button_title' => __( 'Insert Into Widget', 'image_widget' ),
			) );
		}

		//Enqueue all the css.
		function admin_head() {

			echo '<style type="text/css">',
				 '.uploader input.button { width: 100%; height: 34px; line-height: 33px; margin: 8px 0; }',
				 '.thinkup_builder_featured .aligncenter { display: block; margin-left: auto !important; margin-right: auto !important; }',
				 '.thinkup_builder_featured { overflow: hidden; max-height: 300px; }',
				 '.thinkup_builder_featured img { width: 100%; height: auto; margin: 10px 0; }',
				 '</style>';
		}

		// Add widget structure to Admin area.
		function form( $instance ) {

			$default_entries = array( 
				'title'           => '', 
				'uploader_button' => '', 
				'attachment_id'   => '', 
				'imageurl'        => '', 
				'size'            => '',
				'description'     => '',
				'link'            => '', 
				'lightbox'        => '', 
				'animate'         => '', 
				'delay'           => '', 
			);
			$instance = wp_parse_args( (array) $instance, $default_entries );

		$id_prefix = $this->get_field_id('');

		echo '<div class="uploader" style="margin-bottom: 20px;" >',
			 '<input type="submit" class="button" name="' . $this->get_field_name('uploader_button') . '" id="' . $this->get_field_id('uploader_button') . '" value="' . __('Select an Image', 'image_widget') . '" onclick="imageWidget.uploader( &#39;' . $id_prefix . '&#39;, &#39;' . $id_prefix . '&#39; ); return false;" />',
			 '<div class="thinkup_builder_featured" id="' . $this->get_field_id('preview') . '">',
			 wp_get_attachment_image( $instance['attachment_id'], $instance['size'] ),
			 '<img class="featured-builder-urlout" src="" />',
			 '</div>',
			 '<input type="hidden" id="' . $this->get_field_id('attachment_id') .'" name="' . $this->get_field_name('attachment_id') .'" value="' . abs($instance['attachment_id']) .'" />',
			 '<input type="hidden" id="' . $this->get_field_id('imageurl') . '" class="featured-builder-urlin" name="' . $this->get_field_name('imageurl') . '" value="' . $instance['imageurl'] . '" />',
			 '</div>',
			 '<span clear="all" /></span>';

		echo '<div id="' . $this->get_field_id('fields') . '" class="featured-builder-fields">';
		echo '<div id="' . $this->get_field_id('custom_size_selector') . '" class="featured-builder-size" >',
			 '<p style="margin-bottom: 20px;"><label for="' . $this->get_field_id('size') . '" style="display: inline-block;  width: 100px;">' . __('Size', 'image_widget') . ':</label>',
			 '<select name="' . $this->get_field_name('size') . '" id="' . $this->get_field_id('size') . '" onChange="imageWidget.toggleSizes( &#39;' . $id_prefix . '&#39;, &#39;' . $id_prefix . '&#39; );" style="display: inline-block;width: 200px;margin: 0;">';

					// Note: this is dumb. We shouldn't need to have to do this. There should really be a centralized function in core code for this.
					$possible_sizes = apply_filters( 'image_size_names_choose', array(
						'full'      => __('Full Size', 'image_widget'),
						'thumbnail' => __('Thumbnail', 'image_widget'),
						'medium'    => __('Medium', 'image_widget'),
						'large'     => __('Large', 'image_widget'),
					) );
	//				$possible_sizes[self::CUSTOM_IMAGE_SIZE_SLUG] = __('Custom', 'image_widget');

					foreach( $possible_sizes as $size_key => $size_label ) {
						echo '<option value="' . $size_key . '" .' . selected( $instance['size'], $size_key ) . '>' . $size_label . '</option>';
					}
		echo '</select>',
			 '</p>',
			 '</div>',
			 '</div>';

		echo '<div id="' . $this->get_field_id('custom_size_fields') . '">';

		echo '<p><label for="' . $this->get_field_id('title') . '" >' . __('Title', 'image_widget') . ':</label>',
			 '<input class="widefat" id="' . $this->get_field_id('title') . '" name="' . $this->get_field_name('title') . '" type="text" value="' . esc_attr(strip_tags($instance['title'])) . '" /></p>';

		echo '<p><label for="' . $this->get_field_id('description') . '" >' . __('Description', 'image_widget') . ':</label>',
			 '<textarea rows="8" class="widefat" id="' . $this->get_field_id('description') . '" name="' . $this->get_field_name('description') . '" >' . format_to_edit($instance['description']) . '</textarea></p>',
			 '<p><label for="' . $this->get_field_id('link') . '">' . __('Link', 'image_widget') . ':</label>',
			 '<input class="widefat" id="' . $this->get_field_id('link') . '" name="' . $this->get_field_name('link') . '" type="text" value="' . esc_attr(strip_tags($instance['link'])) . '" /><br />';

		echo '</div>';

		}

		// Assign variable values.
		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$new_instance = wp_parse_args( (array) $new_instance, self::get_defaults() );
			$instance['title']       = strip_tags($new_instance['title']);
			$instance['description'] = $new_instance['description'];
			$instance['link']        = $new_instance['link'];
			$instance['size']        = $new_instance['size'];

			// Reverse compatibility with $image, now called $attachement_id
			$instance['attachment_id'] = abs( $new_instance['attachment_id'] );
			$instance['imageurl'] = $new_instance['imageurl']; // deprecated

			$instance['aspect_ratio'] = $this->get_image_aspect_ratio( $instance );

			return $instance;
		}

		// Output widget to front-end.
		function widget( $args, $instance ) {
			extract( $args );
			$instance = wp_parse_args( (array) $instance, self::get_defaults() );
			if ( !empty( $instance['imageurl'] ) || !empty( $instance['attachment_id'] ) ) {

				$instance['title']       = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'] );
				$instance['description'] = apply_filters( 'widget_text', $instance['description'], $args, $instance );
				$instance['link']        = apply_filters( 'image_widget_image_link', esc_url( $instance['link'] ), $args, $instance );

				if ( !defined( 'IMAGE_WIDGET_COMPATIBILITY_TEST' ) ) {
					$instance['attachment_id'] = ( $instance['attachment_id'] > 0 ) ? $instance['attachment_id'] : $instance['image'];
					$instance['attachment_id'] = apply_filters( 'image_widget_image_attachment_id', abs( $instance['attachment_id'] ), $args, $instance );
					$instance['size']          = apply_filters( 'image_widget_image_size', esc_attr( $instance['size'] ), $args, $instance );
				}
				$instance['imageurl'] = apply_filters( 'image_widget_image_url', esc_url( $instance['imageurl'] ), $args, $instance );

				// No longer using extracted vars. This is here for backwards compatibility.
				extract( $instance );

				if ( empty( $link ) ) {
					echo '<p>' . wp_get_attachment_image( $attachment_id, $size ) . '</p>';
				} else {
					echo '<p><a href="' . $link . '">' . wp_get_attachment_image( $attachment_id, $size ) . '</a></p>';
				}
				if ( !empty( $title ) ) {
					echo '<h3>' . $title . '</h3>';
				}
				if ( !empty( $description ) ) {
					echo wpautop( $description );
				}
			}
		}

		// Render an array of default values.
		private static function get_defaults() {

			$defaults = array(
				'title'       => '',
				'description' => '',
				'link'        => '',
				'image'       => 0, // reverse compatible - now attachement_id
				'imageurl'    => '', // reverse compatible.
			);

			return $defaults;
		}

		// Establish the aspect ratio of the image.
		private function get_image_aspect_ratio( $instance ) {
			if ( !empty( $instance['aspect_ratio'] ) ) {
				return abs( $instance['aspect_ratio'] );
			} else {
				$attachment_id = ( !empty($instance['attachment_id']) ) ? $instance['attachment_id'] : $instance['image'];
				if ( !empty($attachment_id) ) {
					$image_details = wp_get_attachment_image_src( $attachment_id, 'full' );
					if ($image_details) {
						return ( $image_details[1]/$image_details[2] );
					}
				}
			}
		}
	}
	add_action( 'widgets_init', create_function('', 'return register_widget("thinkup_builder_featured");') );
}


?>