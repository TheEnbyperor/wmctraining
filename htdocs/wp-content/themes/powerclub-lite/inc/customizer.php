<?php
/**
 * Powerclub Lite Theme Customizer
 *
 * @package Powerclub Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function powerclub_lite_customize_register( $wp_customize ) {
	
	//Add a class for titles
    class powerclub_lite_Info extends WP_Customize_Control {
        public $type = 'info';
        public $label = '';
        public function render_content() {
        ?>
			<h3><?php echo esc_html( $this->label ); ?></h3>
        <?php
        }
    }
	
	function powerclub_lite_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}
	

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';	
	
	$wp_customize->add_setting('color_scheme',array(
			'default'	=> '#0796D0',
			'sanitize_callback'	=> 'sanitize_hex_color'
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'color_scheme',array(
			'label' => __('Color Scheme','powerclub-lite'),			
			 'description'	=> __('More color options in PRO Version','powerclub-lite'),	
			'section' => 'colors',
			'settings' => 'color_scheme'
		))
	);
	
	// Slider Section		
	$wp_customize->add_section( 'slider_section', array(
            'title' => __('Slider Settings', 'powerclub-lite'),
            'priority' => null,
            'description'	=> __('Reccomnded Featured Image Size ( 1375x560 )','powerclub-lite'),		
        )
    );
	
	
	$wp_customize->add_setting('page-setting7',array(
			'default'	=> '0',			
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('page-setting7',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide one:','powerclub-lite'),
			'section'	=> 'slider_section'
	));	
	
	$wp_customize->add_setting('page-setting8',array(
			'default'	=> '0',			
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('page-setting8',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide two:','powerclub-lite'),
			'section'	=> 'slider_section'
	));	
	
	$wp_customize->add_setting('page-setting9',array(
			'default'	=> '0',			
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('page-setting9',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide three:','powerclub-lite'),
			'section'	=> 'slider_section'
	));	// Slider Section
	
	$wp_customize->add_setting('hide_slides',array(
				'default' => true,
				'sanitize_callback' => 'powerclub_lite_sanitize_checkbox',
				'capability' => 'edit_theme_options',
		));	 
	
	$wp_customize->add_control( 'hide_slides', array(
			   'settings' => 'hide_slides',
			   'section'   => 'slider_section',
			   'label'     => __('Uncheck This Option To Display This Section','powerclub-lite'),
			   'type'      => 'checkbox'
	 ));//Hide Three Column Section	
	
	
	
	// Home Three Boxes Section 	
	$wp_customize->add_section('section_second', array(
		'title'	=> __('Homepage Four Boxes Section','powerclub-lite'),
		'description'	=> __('Select Pages from the dropdown for homepage four boxes section','powerclub-lite'),
		'priority'	=> null
	));	
	
	
	$wp_customize->add_setting('page-column1',	array(
			'default'	=> '0',			
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
		));
 
	$wp_customize->add_control(	'page-column1',array('type' => 'dropdown-pages',			
			'section' => 'section_second',
	));	
	
	
	$wp_customize->add_setting('page-column2',	array(
			'default'	=> '0',			
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
		));
 
	$wp_customize->add_control(	'page-column2',array('type' => 'dropdown-pages',			
			'section' => 'section_second',
	));
	
	$wp_customize->add_setting('page-column3',	array(
			'default'	=> '0',			
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
		));
 
	$wp_customize->add_control(	'page-column3',array('type' => 'dropdown-pages',			
			'section' => 'section_second',
	));
	
	$wp_customize->add_setting('page-column4',	array(
			'default'	=> '0',			
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
		));
 
	$wp_customize->add_control(	'page-column4',array('type' => 'dropdown-pages',			
			'section' => 'section_second',
	));	//end three column part	
		
}
add_action( 'customize_register', 'powerclub_lite_customize_register' );

function powerclub_lite_custom_css(){
		?>
        	<style type="text/css"> 
					
					a, .blog_lists h2 a:hover,
					#sidebar ul li a:hover,								
					.cols-4 ul li a:hover, .cols-4 ul li.current_page_item a,									
					.sitenav ul li a:hover, .sitenav ul li.current_page_item a,					
					.fourbox:hover h3,					
					.fourbox:hover h3 a,
					.cols-4 h5 span,					
					.copyright-wrapper a,
					.logo a
				
					{ color:<?php echo esc_html(get_theme_mod('color_scheme','#0796D0')); ?>;}
					 
					
					.pagination .nav-links span.current, .pagination .nav-links a:hover,
					#commentform input#submit:hover,
					h2.headingtitle:after,	
					.fourbox:hover .pagemore,
					.slidemore,				
					.nivo-controlNav a.active,				
					h3.widget-title,				
					.wpcf7 input[type='submit']	,
					.headertop					
					{ background-color:<?php echo esc_html(get_theme_mod('color_scheme','#0796D0')); ?>;}
					
						
					.fourbox:hover .pagemore,
					.nivo-caption					
					{ border-color:<?php echo esc_html(get_theme_mod('color_scheme','#0796D0')); ?>;}
					
			</style> 
<?php                   
}
         
add_action('wp_head','powerclub_lite_custom_css');	

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function powerclub_lite_customize_preview_js() {
	wp_enqueue_script( 'powerclub_lite_customizer', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'powerclub_lite_customize_preview_js' );