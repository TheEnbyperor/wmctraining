<?php
add_action( 'customize_register', 'childcare_header_customizer' );
function childcare_header_customizer( $wp_customize ) {
wp_enqueue_style('childcare-customizr', CHILDCARE_TEMPLATE_DIR_URI .'/css/customizr.css');
  function childcare_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}
$wp_customize->remove_control('header_textcolor');
  
	$wp_customize->add_panel( 'header_options', array(
		'priority'       => 1,
		'capability'     => 'edit_theme_options',
		'title'      => __('Theme Options Settings', 'childcare'),
	) );
	
	function childcare_prefix_sanitize_layout( $news ) {
    if ( ! in_array( $news, array( 1,'category_news' ) ) )    
    return $news;
}
	$wp_customize->add_section( 'footer_copyright_setting' , array(
		'title'      => __('Footer Customization', 'childcare'),
		'panel'  => 'header_options',
		'priority' => 40,
   	) );
	$wp_customize->add_setting(
    'childcare_option[footer_bottom_enabled]',
    array(
        'default' => false,
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'childcare_sanitize_checkbox',
		'type' => 'option'
    )	
	);
	$wp_customize->add_control(
    'childcare_option[footer_bottom_enabled]',
    array(
        'label' => __('Hide Footer Bottom Section','childcare'),
        'section' => 'footer_copyright_setting',
        'type' => 'checkbox',
    )
	);
	$wp_customize->add_setting(
	'childcare_option[footer_logo_contact_add_one]'
		, array(
        'default'        => __('PO Box 97845 Baker street 567','childcare'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=> 'option',
    ));
    $wp_customize->add_control( 'childcare_option[footer_logo_contact_add_one]', array(
        'label'   => __('Footer Logo Contact Address One', 'childcare'),
        'section' => 'footer_copyright_setting',
        'type' => 'text',
    ));	
	$wp_customize->add_setting(
	'childcare_option[footer_logo_contact_add_two]'
		, array(
        'default'        => __('Los Angeles, California, US','childcare'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=> 'option',
    ));
	$wp_customize->add_control( 'childcare_option[footer_logo_contact_add_two]', array(
        'label'   => __('Footer Logo Contact Address two', 'childcare'),
        'section' => 'footer_copyright_setting',
        'type' => 'text',
    ));	
	
	$wp_customize->add_setting(
	'childcare_option[footer_logo_email_title]'
		, array(
        'default'        => __('E-mail','childcare'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=> 'option',
    ));
    $wp_customize->add_control( 'childcare_option[footer_logo_email_title]', array(
        'label'   => __('Footer Logo E-mail Title', 'childcare'),
        'section' => 'footer_copyright_setting',
        'type' => 'text',
    ));	
	$wp_customize->add_setting(
	'childcare_option[footer_logo_email]'
		, array(
        'default'        => __('info@example.com','childcare'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=> 'option',
    ));
    $wp_customize->add_control( 'childcare_option[footer_logo_email]', array(
        'label'   => __('Footer Logo E-mail', 'childcare'),
        'section' => 'footer_copyright_setting',
        'type' => 'text',
    ));	
	
	$wp_customize->add_setting(
	'childcare_option[footer_logo_phone_title]'
		, array(
        'default'        => __('Phone','childcare'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=> 'option',
    ));
    $wp_customize->add_control( 'childcare_option[footer_logo_phone_title]', array(
        'label'   => __('Footer Logo Phone Title', 'childcare'),
        'section' => 'footer_copyright_setting',
        'type' => 'text',
    ));
	
	$wp_customize->add_setting(
	'childcare_option[footer_logo_phone]'
		, array(
        'default'        => __('0045(2)660 476 6677','childcare'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=> 'option',
    ));
    $wp_customize->add_control( 'childcare_option[footer_logo_phone]', array(
        'label'   => __('Footer Logo Phone', 'childcare'),
        'section' => 'footer_copyright_setting',
        'type' => 'text',
    ));
	
	$wp_customize->add_setting(
	'childcare_option[footer_customization_text]'
		, array(
        'default'        => __('@ 2017 childcare-Care WordPress Theme','childcare'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=> 'option',
    ));
    $wp_customize->add_control( 'childcare_option[footer_customization_text]', array(
        'label'   => __('Footer Customization Text', 'childcare'),
        'section' => 'footer_copyright_setting',
        'type' => 'text',
    ));	
	
	$wp_customize->add_setting(
	'childcare_option[footer_customization_develop]'
		, array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=> 'option',
    ));
    $wp_customize->add_control( 'childcare_option[footer_customization_develop]', array(
        'label'   => __('Footer Customization Developed By', 'childcare'),
        'section' => 'footer_copyright_setting',
        'type' => 'text',
    ));
	
	$wp_customize->add_setting(
	'childcare_option[develop_by_name]'
		, array(
        'default'        =>'',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=> 'option',
    ));
    $wp_customize->add_control( 'childcare_option[develop_by_name]', array(
        'label'   => __('Theme Developed By Name', 'childcare'),
        'section' => 'footer_copyright_setting',
        'type' => 'text',
    ));
	
	$wp_customize->add_setting(
	'childcare_option[develop_by_link]'
		, array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
		'type'=> 'option',
    ));
    $wp_customize->add_control( 'childcare_option[develop_by_link]', array(
        'label'   => __('Theme Developed By Link', 'childcare'),
        'section' => 'footer_copyright_setting',
        'type' => 'text',
    ));
	
	$wp_customize->add_section( 'childcare_pro' , array(
				'title'      	=> __( 'Upgrade to childcare Premium', 'childcare' ),
				'priority'   	=> 999,
				'panel'=>'header_options',
			) );

			$wp_customize->add_setting( 'childcare_pro', array(
				'default'    		=> null,
				'sanitize_callback' => 'sanitize_text_field',
			) );

			$wp_customize->add_control( new More_childcare_Control( $wp_customize, 'childcare_pro', array(
				'label'    => __( 'childcare Premium', 'childcare' ),
				'section'  => 'childcare_pro',
				'priority' => 1,
				'type' => 'text',
			) ) );
			
	//Header social Icon

	$wp_customize->add_section(
        'header_social_icon',
        array(
            'title' => __('Social Link ','childcare'),
			'panel' => 'header_options',
			'priority' => 23,
        )
    );
	
	//Show and hide Header Social Icons
	$wp_customize->add_setting(
	'childcare_option[header_social_media_enabled]'
    ,
    array(
        'default' => 0,
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'childcare_sanitize_checkbox',
		'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'childcare_option[header_social_media_enabled]',
    array(
        'label' => __('Show Social icons','childcare'),
        'section' => 'header_social_icon',
        'type' => 'checkbox',
    )
	);

	
	

	// Facebook link
	$wp_customize->add_setting(
    'childcare_option[social_media_facebook_link]',
    array(
        'default' => '#',
		'sanitize_callback' => 'esc_url_raw',
		'type' => 'option',
    )
	
	);
	$wp_customize->add_control(
    'childcare_option[social_media_facebook_link]',
    array(
        'label' => __('Facebook URL','childcare'),
        'section' => 'header_social_icon',
        'type' => 'text',
    )
	);

	$wp_customize->add_setting(
	'childcare_option[facebook_media_enabled]',array(
	'default' => 0,
	'sanitize_callback' => 'childcare_sanitize_checkbox',
	'type' => 'option',
	));

	$wp_customize->add_control(
    'childcare_option[facebook_media_enabled]',
    array(
        'type' => 'checkbox',
        'label' => __('Open Link New tab/window','childcare'),
        'section' => 'header_social_icon',
    )
);

	//twitter link
	
	$wp_customize->add_setting(
    'childcare_option[social_media_twitter_link]',
    array(
        'default' => '#',
		'type' => 'theme_mod',
		'sanitize_callback' => 'esc_url_raw',
		'type' => 'option',
    )
	
	);
	$wp_customize->add_control(
    'childcare_option[social_media_twitter_link]',
    array(
        'label' => __('Twitter URL','childcare'),
        'section' => 'header_social_icon',
        'type' => 'text',
    )
	);

	$wp_customize->add_setting(
	'childcare_option[twitter_media_enabled]'
    ,array(
	'default' => 0,
	'sanitize_callback' => 'childcare_sanitize_checkbox',
	'type' => 'option',
	));

	$wp_customize->add_control(
    'childcare_option[twitter_media_enabled]',
    array(
        'type' => 'checkbox',
        'label' => __('Open Link New tab/window','childcare'),
        'section' => 'header_social_icon',
    )
);
	//Linkdin link
	
	$wp_customize->add_setting(
	'childcare_option[social_media_linkedin_link]' ,
    array(
        'default' => '#',
		'sanitize_callback' => 'esc_url_raw',
		'type' => 'option',
    )
	
	);
	$wp_customize->add_control(
    'childcare_option[social_media_linkedin_link]',
    array(
        'label' => __('Linkdin URL','childcare'),
        'section' => 'header_social_icon',
        'type' => 'text',
    )
	);

	$wp_customize->add_setting(
	'childcare_option[linkedin_media_enabled]'
	,array(
	'default' => 0,
	'sanitize_callback' => 'childcare_sanitize_checkbox',
	'type' => 'option',
	));

	$wp_customize->add_control(
    	'childcare_option[linkedin_media_enabled]',
    array(
        'type' => 'checkbox',
        'label' => __('Open Link New tab/window','childcare'),
        'section' => 'header_social_icon',
    )
);


	//googlelink
	
	$wp_customize->add_setting(
	'childcare_option[social_media_google_link]' ,
    array(
        'default' => '#',
		'sanitize_callback' => 'esc_url_raw',
		'type' => 'option',
    )	);
	$wp_customize->add_control(
    'childcare_option[social_media_google_link]',
    array(
        'label' => __('Google URL','childcare'),
        'section' => 'header_social_icon',
        'type' => 'text',
    )
	);

	$wp_customize->add_setting(
	'childcare_option[google_media_enabled]'
	,array(
	'default' => 0,
	'sanitize_callback' => 'childcare_sanitize_checkbox',
	'type' => 'option',
	));

	$wp_customize->add_control(
    	'childcare_option[google_media_enabled]',
    array(
        'type' => 'checkbox',
        'label' => __('Open Link New tab/window','childcare'),
        'section' => 'header_social_icon',
    )
);
} 
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'childcare_Customize_Misc_Control' ) ) :
class childcare_Customize_Misc_Control extends WP_Customize_Control {
    public $settings = 'blogname';
    public $description = '';
    public function render_content() {
        switch ( $this->type ) {
            default:
           
            case 'heading':
                echo '<span class="customize-control-title">' . esc_html( $this->label ) . '</span>';
                break;
 
            case 'line' :
                echo '<hr />';
                break;
			
        }
    }
}
endif;
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'More_childcare_Control' ) ) :
class More_childcare_Control extends WP_Customize_Control {
	public function render_content() {
		?>
		<label style="overflow: hidden; zoom: 1;">
			<div class="col-md-2 col-sm-6 content-btn">					
					<a style="margin-bottom:20px;margin-left:20px;" href="http://asiathemes.com/childcare/" target="blank" class="btn pro-btn-success btn"><?php _e('Upgrade to childcare Premium','childcare'); ?> </a>
			</div>			
			<div class="col-md-3 col-sm-6">
				<h3 style="margin-top:10px;margin-left: 20px;text-decoration:underline;color:#333;"><?php echo _e( 'childcare Premium - Features','childcare'); ?></h3>
					<ul style="padding-top:20px">
						<li class="childcare-content" style="color:#f8504b"> <div class="dashicons dashicons-yes"></div> <?php _e('One Year Free Support ','childcare'); ?> </li>
						<li class="childcare-content"> <div class="dashicons dashicons-yes"></div> <?php _e('Responsive Design','childcare'); ?> </li>						
						<li class="childcare-content"> <div class="dashicons dashicons-yes"></div> <?php _e('More than 10 Templates','childcare'); ?> </li>
						<li class="childcare-content"> <div class="dashicons dashicons-yes"></div> <?php _e('3 Types of Portfolio Templates','childcare'); ?></li>
						<li class="childcare-content"> <div class="dashicons dashicons-yes"></div> <?php _e('Awesome Team Member Template','childcare'); ?></li>
						<li class="childcare-content"> <div class="dashicons dashicons-yes"></div> <?php _e('9 types Themes Colours Scheme','childcare'); ?></li>
						<li class="childcare-content"> <div class="dashicons dashicons-yes"></div> <?php _e('Patterns Background','childcare'); ?>   </li>
						<li class="childcare-content"> <div class="dashicons dashicons-yes"></div> <?php _e('WPML Compatible','childcare'); ?>   </li>
						<li class="childcare-content"> <div class="dashicons dashicons-yes"></div> <?php _e('Ultimate Portfolio layout with Taxonomy Tab effect','childcare'); ?> </li>
						<li class="childcare-content"> <div class="dashicons dashicons-yes"></div> <?php _e('Translation Ready','childcare'); ?> </li>
						<li class="childcare-content"> <div class="dashicons dashicons-yes"></div> <?php _e('Easy Customization With wp Customizer','childcare'); ?></li>
						<li class="childcare-content"> <div class="dashicons dashicons-yes"></div> <?php _e('Google Fonts','childcare'); ?>  </li>
					
					</ul>
			</div>
			<div class="col-md-2 col-sm-6 content-btn">					
					<a style="margin-bottom:20px;margin-left:20px;" href="http://asiathemes.com/childcare/" target="blank" class="pro-btn-success btn"><?php _e('Upgrade to childcare Premium','childcare'); ?> </a>
			</div>
			<span class="customize-control-title"><?php _e( 'Enjoying With childcare', 'childcare' ); ?></span>
			<p>
				<?php
					printf( __( 'If you Like our Products , Please do Rate us on %1$1sWordPress.org%2$2s?  We\'d really appreciate it!', 'childcare' ), '<a target="" href="https://wordpress.org/support/view/theme-reviews/childcare?filter=5">', '</a>' );
				?>
			</p>
		</label>
		<?php
	}
}
endif;