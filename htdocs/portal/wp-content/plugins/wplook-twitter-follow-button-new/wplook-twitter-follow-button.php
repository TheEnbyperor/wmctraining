<?php
/*
* Plugin Name: WPLOOK Twitter Follow Button (new)
* Plugin URI: http://www.wplook.com	
* Description: Add the Follow Button to your blog to increase engagement and create a lasting connection with your audience. After enabling this plugin visit <a href="widgets.php">the widgets page</a>
* Author: The WPLOOK Team
* Version: 1.0
* Author URI: http://www.wplook.com
*/

add_action('widgets_init', create_function('', 'return register_widget("WPLOOKTwitterFollowButton");'));
class WPLOOKTwitterFollowButton extends WP_Widget {
	function WPLOOKTwitterFollowButton() {
		$widget_ops = array('classname' => 'WPLOOKTwitterFollowButton', 'description' => __('Add the Follow Button to your blog to increase engagement and create a lasting connection with your audience.', 'wpl') );
		$control_ops = array('width' => 200, 'height' => 400);
		$this->WP_Widget('wpl', __('WPLOOK Twitter Follow Button', 'wpl'), $widget_ops, $control_ops);
	}

	function form($instance) {
		// outputs the options form on admin
		$wpltitle = esc_attr($instance['wpltitle']); 
		$wplusername = esc_attr($instance['wplusername']);
		$wplfollowersisplay = esc_attr($instance['wplfollowersisplay']);
		$wplbuttoncolor = esc_attr($instance['wplbuttoncolor']);
		$wpltextcolor = esc_attr($instance['wpltextcolor']);
		$wpllinkcolor = esc_attr($instance['wpllinkcolor']);
		$wpllanguage = esc_attr($instance['wpllanguage']);
		$wplwidth = esc_attr($instance['wplwidth']);	
		$wplalignment = esc_attr($instance['wplalignment']);
		?>
		<p>
			<label for="<?php echo $this->get_field_id('wpltitle'); ?>">
				<?php _e('Title:', 'wpl'); ?>
			</label>
			<input class="widefat" id="<?php echo $this->get_field_id('wpltitle'); ?>" name="<?php echo $this->get_field_name('wpltitle'); ?>" type="text" value="<?php echo $wpltitle; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('wplusername'); ?>">
				<?php _e('Twitter Username:', 'wpl'); ?>
			</label>
			<input class="widefat" id="<?php echo $this->get_field_id('wplusername'); ?>" name="<?php echo $this->get_field_name('wplusername'); ?>" type="text" value="<?php echo $wplusername; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('wplfollowersisplay'); ?>">
				<?php _e('Folowers Display:', 'wpl'); ?>
				<br />
			</label>
			<select id="<?php echo $this->get_field_id('wplfollowersisplay'); ?>" name="<?php echo $this->get_field_name('wplfollowersisplay'); ?>">
				<option value="true" <?php selected( 'true', $wplfollowersisplay ); ?>><?php _e('Yes', 'wpl'); ?></option>
				<option value="false" <?php selected( 'false', $wplfollowersisplay ); ?>><?php _e('No', 'wpl'); ?></option>
			</select>

		</p>
		<p>
			<label for="<?php echo $this->get_field_id('wplbuttoncolor'); ?>">
				<?php _e('Button Color:', 'wpl'); ?>
				<br />
			</label>
			<select id="<?php echo $this->get_field_id('wplbuttoncolor'); ?>" name="<?php echo $this->get_field_name('wplbuttoncolor'); ?>">
				<option value="blue" <?php selected( 'blue', $wplbuttoncolor ); ?>><?php _e('Blue', 'wpl'); ?></option>
				<option value="grey" <?php selected( 'grey', $wplbuttoncolor ); ?>><?php _e('Grey', 'wpl'); ?></option>
			</select>
		</p>
		
		
		<p>
			<label for="<?php echo $this->get_field_id('wpltextcolor'); ?>">
				<?php _e('Text Color:', 'wpl'); ?>
			</label>
			<input class="widefat" id="<?php echo $this->get_field_id('wpltextcolor'); ?>" name="<?php echo $this->get_field_name('wpltextcolor'); ?>" type="text" value="<?php echo $wpltextcolor; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('wpllinkcolor'); ?>">
				<?php _e('Link Color:', 'wpl'); ?>
			</label>
			<input class="widefat" id="<?php echo $this->get_field_id('wpllinkcolor'); ?>" name="<?php echo $this->get_field_name('wpllinkcolor'); ?>" type="text" value="<?php echo $wpllinkcolor; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('wpllanguage'); ?>">
				<?php _e('Language:', 'wpl'); ?>
				<br />
			</label>
			<select id="<?php echo $this->get_field_id('wpllanguage'); ?>" name="<?php echo $this->get_field_name('wpllanguage'); ?>">
				<option value="en" <?php selected( 'en', $wpllanguage ); ?>><?php _e('English', 'wpl'); ?></option>
				<option value="fr" <?php selected( 'fr', $wpllanguage ); ?>><?php _e('French', 'wpl'); ?></option>
				<option value="de" <?php selected( 'de', $wpllanguage ); ?>><?php _e('German', 'wpl'); ?></option>
				<option value="it" <?php selected( 'it', $wpllanguage ); ?>><?php _e('Italian', 'wpl'); ?></option>
				<option value="ja" <?php selected( 'ja', $wpllanguage ); ?>><?php _e('Japanese', 'wpl'); ?></option>
				<option value="ko" <?php selected( 'ko', $wpllanguage ); ?>><?php _e('Korean', 'wpl'); ?></option>
				<option value="ru" <?php selected( 'ru', $wpllanguage ); ?>><?php _e('Russian', 'wpl'); ?></option>
				<option value="es" <?php selected( 'es', $wpllanguage ); ?>><?php _e('Spanish', 'wpl'); ?></option>
				<option value="tr" <?php selected( 'tr', $wpllanguage ); ?>><?php _e('Turkish', 'wpl'); ?></option>
			</select>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('wplwidth'); ?>">
				<?php _e('Width:', 'wpl'); ?>
			</label>
			<input class="widefat" id="<?php echo $this->get_field_id('wplwidth'); ?>" name="<?php echo $this->get_field_name('wplwidth'); ?>" type="text" value="<?php echo $wplwidth; ?>" />
		</p>				
		
		
		<p>
			<label for="<?php echo $this->get_field_id('wplalignment'); ?>">
				<?php _e('Alignment:', 'wpl'); ?>
				<br />
			</label>
			<select id="<?php echo $this->get_field_id('wplalignment'); ?>" name="<?php echo $this->get_field_name('wplalignment'); ?>">
				<option value="left" <?php selected( 'left', $wplalignment ); ?>><?php _e('Left', 'wpl'); ?></option>
				<option value="right" <?php selected( 'right', $wplalignment ); ?>><?php _e('Right', 'wpl'); ?></option>
			</select>
		</p>
		
		
		
		<?php 
	} 

	function update($new_instance, $old_instance) {
		// processes widget options to be saved
		$instance = $old_instance;
		
		$instance['wpltitle'] = sanitize_text_field($new_instance['wpltitle']);
		$instance['wplusername'] = sanitize_text_field($new_instance['wplusername']);
		$instance['wplfollowersisplay'] = sanitize_text_field($new_instance['wplfollowersisplay']);
		$instance['wplbuttoncolor'] = sanitize_text_field($new_instance['wplbuttoncolor']);
		$instance['wpltextcolor'] = sanitize_text_field($new_instance['wpltextcolor']);
		$instance['wpllinkcolor'] = sanitize_text_field($new_instance['wpllinkcolor']);
		$instance['wpllanguage'] = sanitize_text_field($new_instance['wpllanguage']);
		$instance['wplwidth'] = sanitize_text_field($new_instance['wplwidth']);
		$instance['wplalignment'] = sanitize_text_field($new_instance['wplalignment']);

		return $instance;
	}
	
	function widget($args, $instance) {
		// outputs the content of the widget
		 extract( $args );
			$wpltitle = apply_filters('widget_wpltitle', $instance['wpltitle']);
			$wplusername = apply_filters('widget_wplusername', $instance['wplusername']);
			$wplfollowersisplay = apply_filters('widget_wplfollowersisplay', $instance['wplfollowersisplay']);
			$wplbuttoncolor = apply_filters('widget_wplbuttoncolor', $instance['wplbuttoncolor']);
			$wpltextcolor = apply_filters('widget_wpltextcolor', $instance['wpltextcolor']);
			$wpllinkcolor = apply_filters('widget_wpllinkcolor', $instance['wpllinkcolor']);  
			$wpllanguage = apply_filters('widget_wpllanguage', $instance['wpllanguage']);
			$wplwidth = apply_filters('widget_wplwidth', $instance['wplwidth']);  
			$wplalignment = apply_filters('widget_wplalignment', $instance['wplalignment']);

		?>

<?php echo $before_widget; ?>
	<?php if ( $wpltitle )
	 	echo $before_title . $wpltitle . $after_title; ?>
		<a href="http://twitter.com/<?php echo $wplusername; ?>" class="twitter-follow-button" data-show-count="<?php echo $wplfollowersisplay; ?>" data-button="<?php echo $wplbuttoncolor; ?>" data-text-color="<?php echo $wpltextcolor; ?>" data-link-color="<?php echo $wpllinkcolor; ?>" data-lang="<?php echo $wpllanguage; ?>" data-width="<?php echo $wplwidth; ?>" data-align="<?php echo $wplalignment; ?>">Follow @<?php echo $wplusername; ?></a>		
		<?php echo $after_widget; ?>
<?php
	}
}

add_action('wp_head', 'wpl_twitter_follow_js');
function wpl_twitter_follow_js() {
	?>
	<script language="JavaScript">
		(function(){
			var twitterWidgets = document.createElement('script');
			twitterWidgets.type = 'text/javascript';
			twitterWidgets.async = true;
			twitterWidgets.src = 'http://platform.twitter.com/widgets.js';
			document.getElementsByTagName('head')[0].appendChild(twitterWidgets);
			})();
	</script>

<?php }

?>