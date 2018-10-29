<?php
/* Publisho widgets */

class publisho_widgetrpt extends WP_Widget {
    function __construct() {
        parent::__construct(false, $name = esc_html__( 'Publisho Recent Posts Thumbnails', 'publisho' ));
    }
	function form($instance) {
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );		
        $io_posts = isset( $instance['io_posts'] ) ? esc_attr( $instance['io_posts'] ) : '';
        ?>
            <p><label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'publisho'); ?> <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
            <p><label for="<?php echo esc_attr($this->get_field_id('io_posts')); ?>"><?php esc_html_e('Number of Posts Displayed:', 'publisho'); ?> <input class="widefat" id="<?php echo esc_attr($this->get_field_id('io_posts')); ?>" name="<?php echo $this->get_field_name('io_posts'); ?>" type="text" value="<?php echo $io_posts; ?>" /></label></p>
        <?php
    }
	function widget($args, $instance) {
    extract( $args );
	extract( $instance );
	
    $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
    $io_posts = isset( $instance['io_posts'] ) ? esc_attr( $instance['io_posts'] ) : '';
    ?>
      <?php echo $before_widget; ?>
         <?php if ( $title )
            echo $before_title . $title . $after_title; ?>
 
         <div class="themonicpt">        
		 <ul>
    <?php
        global $post;
        $args = array( 'numberposts' => $io_posts);
        $myposts = get_posts( $args );
        foreach( $myposts as $post ) : setup_postdata($post); ?>
		<li>
		    <?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())) : ?>
				<a href="<?php the_permalink();?>"><?php the_post_thumbnail('excerpt-thumbnail'); ?></a>
			<?php else :?>
			<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'publisho' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
				<img class="alignleft" src="<?php echo get_template_directory_uri(); ?>/img/sidethumb/default.png" />
			</a>
				<?php endif;?>
					<a href="<?php the_permalink(); ?>"><?php the_title();?></a>
	    </li><div class="clear"></div>
			<?php endforeach; ?>
		</ul>
		</div>
 
         <?php echo $after_widget; ?>
<?php
    }
	
	public function update( $new_instance, $old_instance ) {
    
        $instance               = $old_instance;
        $instance['title']      = sanitize_text_field( $new_instance['title'] );
        $instance['io_posts']   = absint( $new_instance['io_posts'] );

        return $instance;

    }
}

// Register widgets
function publisho_register_widgets() {
    register_widget( 'publisho_ads_728x90' );
	register_widget( "publisho_widgetrpt" );
}

add_action( 'widgets_init', 'publisho_register_widgets' );
/**
 * Enqueue Admin Scripts
 */
function publisho_q_script( $hook ) {
    if ( 'widgets.php' != $hook ) {
        return;
    }
    // enqueue scripts and css
    wp_enqueue_style( 'publisho-widgets', get_template_directory_uri() . '/css/widgets.css' );
	wp_enqueue_script('publisho-imgupload', get_template_directory_uri() . '/js/imgupload.js', array( 'jquery' ), '', true);
}
add_action( 'admin_enqueue_scripts', 'publisho_q_script' );

/**
 * Header Banner 728x90 widget.
 */
class publisho_ads_728x90 extends WP_Widget {

    public function __construct() {

        parent::__construct(
            'publisho_ads_728x90',
            esc_html__( 'Publisho Head Widget Ad', 'publisho' ),
            array(
                'description'   => esc_html__( 'Header Banner/Image upto 728x90', 'publisho' )
            )
        );

    }

    public function widget( $args, $instance ) {

        $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
        $ads_image_path = isset( $instance['ads_image'] ) ? $instance['ads_image'] : '';
        $ads_link       = isset( $instance['ads_link'] ) ? $instance['ads_link'] : '';
        $ads_link_type  = isset( $instance[ 'ads_link_type' ] ) ? $instance[ 'ads_link_type' ] : '';

        if( empty( $title ) ) {
            $title = esc_html__( 'Header Ads', 'publisho' );
        };

        if( empty( $ads_image_path ) ) {
            $ads_image_path = '';
        };

        if( empty( $ads_link ) ) {
            $ads_link = esc_url( home_url( '/' ) );
        };

        if( $ads_link_type == 'nofollow' ) {
            $ads_link_type = 'nofollow';

        } else {
            $ads_link_type = 'dofollow';
        }

        ?>

        <a href="<?php echo esc_url( $ads_link ); ?>" title="<?php echo esc_attr( $title ); ?>" rel="<?php echo esc_attr( $ads_link_type ); ?>" target="_blank"><img src="<?php echo esc_url( $ads_image_path ); ?>" alt="<?php echo esc_attr( $title ); ?>"> </a>

        <?php

    }

    public function form( $instance ) {

        $instance = wp_parse_args(
            (array) $instance, array(
                'title'      => '',
                'ads_link'   => '',
                'ads_image'  => '',
                'ads_link_type'      => ''
            )
        );

        ?>

        <div class="th-header-ad-728x90">
            <div class="admin-widget-panel">
                <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e( 'Title', 'publisho' ); ?></label>
                <input type="text" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" placeholder="<?php esc_html_e( 'Header Banner Ads', 'publisho' ); ?>">
            </div><!-- .admin-widget-panel -->

            <div class="admin-widget-panel">
                <label for="<?php echo esc_attr($this->get_field_id( 'ads_link' )); ?>"><?php esc_html_e( 'Ads Link', 'publisho' ); ?></label>
                <input type="text" id="<?php echo esc_attr($this->get_field_id( 'ads_link' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'ads_link' )); ?>" value="<?php echo esc_attr( $instance['ads_link'] ); ?>" placeholder="<?php esc_html_e( 'URL', 'publisho' ); ?>" >
            </div><!-- .admin-widget-panel -->

            <div class="admin-widget-panel">
                <label for="<?php echo esc_attr($this->get_field_id( 'ads_link_type' )); ?>"><?php esc_html_e( 'Link Type', 'publisho' ); ?></label>

                <select id="<?php echo esc_attr($this->get_field_id('ads_link_type')); ?>" name="<?php echo esc_attr($this->get_field_name('ads_link_type')); ?>">
                    <option value="dofollow" <?php selected( $instance['ads_link_type'], 'dofollow' ); ?>><?php esc_html_e('Do Follow', 'publisho'); ?></option>
                    <option value="nofollow" <?php selected( $instance['ads_link_type'], 'nofollow' );?>><?php esc_html_e('No Follow', 'publisho'); ?></option>
                </select>
            </div>

            <div class="admin-widget-panel">
                <label for="<?php echo esc_attr($this->get_field_id( 'ads_image' )); ?>"><?php esc_html_e( 'Ads Image', 'publisho' ); ?></label>

                <?php $io_uploaded_image = $instance['ads_image'];
                if ( ! empty( $io_uploaded_image ) ) { ?>
                    <img src="<?php echo esc_url( $io_uploaded_image ); ?>" />
                <?php } else { ?>
                    <img src="" />
                <?php } ?>

                <input type="hidden" class="custom-media-image" id="<?php echo esc_attr($this->get_field_id( 'ads_image' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'ads_image' )); ?>" value="<?php echo esc_attr( $instance['ads_image'] ); ?>" />
                <input type="button" class="th-upload-button" id="custom_media_button" name="<?php echo esc_attr($this->get_field_name( 'ads_image' )); ?>"  value="<?php esc_html_e( 'Upload Image', 'publisho' ); ?>" />
            </div>
        </div>
        <?php
    }

    public function update( $new_instance, $old_instance ) {

        $instance               = $old_instance;
        $instance['title']      = sanitize_text_field( $new_instance['title'] );
        $instance['ads_link']   = esc_url_raw( $new_instance['ads_link'] );
        $instance['ads_link_type']  = sanitize_text_field( $new_instance['ads_link_type'] );
        $instance['ads_image']  = esc_url_raw( $new_instance['ads_image'] );
        return $instance;

    }

}
