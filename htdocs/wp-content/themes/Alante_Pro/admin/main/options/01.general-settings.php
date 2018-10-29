<?php
/**
 * General settings functions.
 *
 * @package ThinkUpThemes
 */

/* ----------------------------------------------------------------------------------
	Logo Settings
---------------------------------------------------------------------------------- */

function thinkup_custom_logo() {
global $thinkup_general_logosetting;
global $thinkup_general_logoswitch;
global $thinkup_general_logolink;
global $thinkup_general_sitetitle;
global $thinkup_general_sitedescription;

	$output = NULL;

	// Choose which settings to use for controlling site logo - Theme Options or Native WP settings.
	if( $thinkup_general_logosetting == '1' ) {

		if ( $thinkup_general_logoswitch == "option1" ) {
			if ( ! empty( $thinkup_general_logolink ) ) {
				$output .= '<a rel="home" href="' . esc_url( home_url( '/' ) ) . '">';
				$output .= '<img src="' . esc_url( $thinkup_general_logolink ) . '" alt="' . esc_attr__( 'Logo', 'alante' ) . '">';
				$output .= '</a>';
			} 
		} else if ( $thinkup_general_logoswitch == "option2" or empty( $thinkup_general_logoswitch ) ) {

			$output .= '<a rel="home" href="' . esc_url( home_url( '/' ) ) . '">';

				if ( ! empty( $thinkup_general_sitetitle ) ) {
					$output .= '<h1 rel="home" class="site-title" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '">' . esc_html( $thinkup_general_sitetitle ) . '</h1>';
				}
				if ( ! empty( $thinkup_general_sitedescription ) ) {
					$output .= '<h2 class="site-description">' . esc_html( $thinkup_general_sitedescription ) . '</h2>';
				}

			$output .= '</a>';
		}

	} else {

	    // Get logo image url if image has been assigned.
		$check_logoset = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );

		if ( ! empty( $check_logoset[0] ) ) {
		   if ( function_exists( 'the_custom_logo' ) ) {
				$output = get_custom_logo();
			}
		} else {
			$output .= '<a rel="home" href="' . esc_url( home_url( '/' ) ) . '">';
			$output .= '<h1 rel="home" class="site-title" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '">' . get_bloginfo( 'name' ) . '</h1>';
			$output .= '<h2 class="site-description" title="' . esc_attr( get_bloginfo( 'description', 'display' ) ) . '">' . get_bloginfo( 'description' ) . '</h2>';
			$output .= '</a>';
		}
	}

	// Output logo is set
	if ( ! empty( $output ) ) {
		return $output;
	}
}

// Output retina js script if retina logo is set
function thinkup_input_logoretina() {
global $thinkup_general_logoswitch;
global $thinkup_general_logolinkretina;

	if ( $thinkup_general_logoswitch == "option1" ) {
		if ( ! empty( $thinkup_general_logolinkretina ) ) {
			wp_enqueue_script( 'retina' );
		} 
	}
}	
add_action( 'wp_enqueue_scripts', 'thinkup_input_logoretina', 11 );


/* ----------------------------------------------------------------------------------
	Custom Favicon
---------------------------------------------------------------------------------- */

function thinkup_custom_favicon() {
global $thinkup_general_faviconlink;

	if ( ! empty( $thinkup_general_faviconlink ) ) {
		echo '<link rel="Shortcut Icon" type="image/x-icon" href="' . esc_url( $thinkup_general_faviconlink ) . '" />';
	}	
}
add_action('wp_head', 'thinkup_custom_favicon');


/* ----------------------------------------------------------------------------------
	Page Layout
---------------------------------------------------------------------------------- */

/* Add Custom Sidebar css */
function thinkup_sidebar_css() {
global $thinkup_homepage_layout;
global $thinkup_general_layout;
global $thinkup_blog_layout;
global $thinkup_post_layout;
global $thinkup_portfolio_layout;
global $thinkup_project_layout;

global $post;
$_thinkup_meta_layout = get_post_meta( $post->ID, '_thinkup_meta_layout', true );

	if ( is_front_page() ) {
		if ( $thinkup_homepage_layout == "option1" or empty( $thinkup_homepage_layout ) ) {		
			echo '';
		} else if ( $thinkup_homepage_layout == "option2" ) {
			wp_enqueue_style ( 'thinkup-sidebarleft' );
		} else if ( $thinkup_homepage_layout == "option3" ) {
			wp_enqueue_style ( 'thinkup-sidebarright' );
		}
	} else if ( is_page() and ! is_page_template( 'template-blog.php' ) ) {	
		if ( empty( $_thinkup_meta_layout ) or $_thinkup_meta_layout == 'option1' ) {
			if ( $thinkup_general_layout == "option1" or empty( $thinkup_general_layout ) ) {		
				echo '';
			} else if ( $thinkup_general_layout == "option2" ) {
				wp_enqueue_style ( 'thinkup-sidebarleft' );
			} else if ( $thinkup_general_layout == "option3" ) {
				wp_enqueue_style ( 'thinkup-sidebarright' );
			}
		} else if ( $_thinkup_meta_layout == 'option2' ) {
			echo '';
		} else if ( $_thinkup_meta_layout == 'option3' ) {
			wp_enqueue_style ( 'thinkup-sidebarleft' );
		} else if ( $_thinkup_meta_layout == 'option4' ) {
			wp_enqueue_style ( 'thinkup-sidebarright' );
		}
	} else if ( thinkup_check_isblog() and ! is_single() and ! is_post_type_archive( 'portfolio' ) ) {
		if ( $thinkup_blog_layout == "option1" or empty( $thinkup_blog_layout ) ) {		
			echo '';
		} else if ( $thinkup_blog_layout == "option2" ) {
			wp_enqueue_style ( 'thinkup-sidebarleft' );
		} else if ( $thinkup_blog_layout == "option3" ) {
			wp_enqueue_style ( 'thinkup-sidebarright' );
		}
	} else if ( is_page_template( 'template-blog.php' ) ) {
		if ( empty( $_thinkup_meta_layout ) or $_thinkup_meta_layout == 'option1' ) {
			if ( $thinkup_blog_layout == "option1" or empty( $thinkup_blog_layout ) ) {		
				echo '';
			} else if ( $thinkup_blog_layout == "option2" ) {
				wp_enqueue_style ( 'thinkup-sidebarleft' );
			} else if ( $thinkup_blog_layout == "option3" ) {
				wp_enqueue_style ( 'thinkup-sidebarright' );
			}
		} else if ( $_thinkup_meta_layout == 'option2' ) {
			echo '';
		} else if ( $_thinkup_meta_layout == 'option3' ) {
			wp_enqueue_style ( 'thinkup-sidebarleft' );
		} else if ( $_thinkup_meta_layout == 'option4' ) {
			wp_enqueue_style ( 'thinkup-sidebarright' );
		}
	} else if ( is_post_type_archive( 'portfolio' ) ) {	
		if ( $thinkup_portfolio_layout == "option1" or empty( $thinkup_portfolio_layout ) ) {		
			echo '';
		} else if ( $thinkup_portfolio_layout == "option5" or $thinkup_portfolio_layout == "option7" ) {
			wp_enqueue_style ( 'thinkup-sidebarleft' );
		} else if ( $thinkup_portfolio_layout == "option6" or $thinkup_portfolio_layout == "option8" ) {
			wp_enqueue_style ( 'thinkup-sidebarright' );
		} else {
			echo '';
		}
	} else if ( is_singular( 'post' ) ) {
		if ( empty( $_thinkup_meta_layout ) or $_thinkup_meta_layout == 'option1' ) {
			if ( $thinkup_post_layout == "option1" or empty( $thinkup_post_layout ) ) {		
				echo '';
			} else if ( $thinkup_post_layout == "option2" ) {
				wp_enqueue_style ( 'thinkup-sidebarleft' );
			} else if ( $thinkup_post_layout == "option3" ) {
				wp_enqueue_style ( 'thinkup-sidebarright' );
			} else {
				echo '';
			}
		} else if ( $_thinkup_meta_layout == 'option2' ) {
			echo '';
		} else if ( $_thinkup_meta_layout == 'option3' ) {
			wp_enqueue_style ( 'thinkup-sidebarleft' );
		} else if ( $_thinkup_meta_layout == 'option4' ) {
			wp_enqueue_style ( 'thinkup-sidebarright' );
		}
	} else if ( is_singular( 'portfolio' ) ) {	
		if ( empty( $_thinkup_meta_layout ) or $_thinkup_meta_layout == 'option1' ) {
			if ( $thinkup_project_layout == "option1" or empty( $thinkup_project_layout ) ) {		
				echo '';
			} else if ( $thinkup_project_layout == "option2" ) {
				wp_enqueue_style ( 'thinkup-sidebarleft' );
			} else if ( $thinkup_project_layout == "option3" ) {
				wp_enqueue_style ( 'thinkup-sidebarright' );
			} else {
				echo '';
			}
		} else if ( $_thinkup_meta_layout == 'option2' ) {
			echo '';
		} else if ( $_thinkup_meta_layout == 'option3' ) {
			wp_enqueue_style ( 'thinkup-sidebarleft' );
		} else if ( $_thinkup_meta_layout == 'option4' ) {
			wp_enqueue_style ( 'thinkup-sidebarright' );
		}
	} else if ( is_search() ) {
		if ( $thinkup_general_layout == "option1" or empty( $thinkup_general_layout ) ) {		
			echo '';
		} else if ( $thinkup_general_layout == "option2" ) {
			wp_enqueue_style ( 'thinkup-sidebarleft' );
		} else if ($thinkup_general_layout == "option3") {
			wp_enqueue_style ( 'thinkup-sidebarright' );
		}
	} else {
		if ( $_thinkup_meta_layout == 'option2' ) {
			echo '';
		} else if ( $_thinkup_meta_layout == 'option3' ) {
			wp_enqueue_style ( 'thinkup-sidebarleft' );
		} else if ( $_thinkup_meta_layout == 'option4' ) {
			wp_enqueue_style ( 'thinkup-sidebarright' );
		}
	}
}
add_action( 'wp_enqueue_scripts', 'thinkup_sidebar_css', '11' );

/* Add Custom Sidebar html */
function thinkup_sidebar_html() {
global $thinkup_homepage_layout;
global $thinkup_general_layout;
global $thinkup_blog_layout;
global $thinkup_post_layout;
global $thinkup_portfolio_layout;
global $thinkup_project_layout;

global $post;
$_thinkup_meta_layout = get_post_meta( $post->ID, '_thinkup_meta_layout', true );

do_action('thinkup_sidebar_html');

	if ( is_front_page() ) {	
		if ( $thinkup_homepage_layout == "option1" or empty( $thinkup_homepage_layout ) ) {		
				echo '';
		} else if ( $thinkup_homepage_layout == "option2" ) {
				echo get_sidebar(); 
		} else if ( $thinkup_homepage_layout == "option3" ) {
				echo get_sidebar();
		}
	} else if ( is_page() and !is_page_template( 'template-blog.php' ) ) {	
		if ( empty( $_thinkup_meta_layout ) or $_thinkup_meta_layout == 'option1' ) {
			if ( $thinkup_general_layout == "option1" or empty( $thinkup_general_layout ) ) {		
				echo '';
			} else if ( $thinkup_general_layout == "option2" ) {
				echo get_sidebar();
			} else if ( $thinkup_general_layout == "option3" ) {
				echo get_sidebar();
			}
		} else if ( $_thinkup_meta_layout == 'option2' ) {
			echo '';
		} else if ( $_thinkup_meta_layout == 'option3' ) {
			echo get_sidebar(); 
		} else if ( $_thinkup_meta_layout == 'option4' ) {
			echo get_sidebar(); 
		}
	} else if ( is_page_template( 'template-blog.php' ) ) {
		if ( empty( $_thinkup_meta_layout ) or $_thinkup_meta_layout == 'option1' ) {
			if ( $thinkup_blog_layout == "option1" or empty( $thinkup_blog_layout ) ) {		
				echo '';
			} else if ( $thinkup_blog_layout == "option2" ) {
				echo get_sidebar();
			} else if ( $thinkup_blog_layout == "option3" ) {
				echo get_sidebar();
			}
		} else if ( $_thinkup_meta_layout == 'option2' ) {
			echo '';
		} else if ( $_thinkup_meta_layout == 'option3' ) {
			echo get_sidebar(); 
		} else if ( $_thinkup_meta_layout == 'option4' ) {
			echo get_sidebar(); 
		}
	} else if ( thinkup_check_isblog() and ! is_single() and ! is_post_type_archive( 'portfolio' ) ) {
		if ( $thinkup_blog_layout == "option1" or empty( $thinkup_blog_layout ) ) {		
			echo '';
		} else if ( $thinkup_blog_layout == "option2" ) {
			echo get_sidebar();
		} else if ( $thinkup_blog_layout == "option3" ) {
			echo get_sidebar();
		}
	} else if ( is_post_type_archive( 'portfolio' ) ) {	
		if ( $thinkup_portfolio_layout == "option1" or empty( $thinkup_portfolio_layout ) ) {		
			echo '';
		} else if ( $thinkup_portfolio_layout == "option5" or $thinkup_portfolio_layout == "option7" ) {
			echo get_sidebar();
		} else if ( $thinkup_portfolio_layout == "option6" or $thinkup_portfolio_layout == "option8" ) {
			echo get_sidebar();
		} else {
			echo '';
		}
	} else if ( is_singular( 'post' ) ) {
		if ( empty( $_thinkup_meta_layout ) or $_thinkup_meta_layout == 'option1' ) {
			if ( $thinkup_post_layout == "option1" or empty( $thinkup_post_layout ) ) {
				echo '';
			} else if ( $thinkup_post_layout == "option2" ) {
				echo get_sidebar();
			} else if ( $thinkup_post_layout == "option3" ) {
				echo get_sidebar();
			} else {
				echo '';
			}
		} else if ( $_thinkup_meta_layout == 'option2' ) {
			echo '';
		} else if ( $_thinkup_meta_layout == 'option3' ) {
			echo get_sidebar();
		} else if ( $_thinkup_meta_layout == 'option4' ) {
			echo get_sidebar();
		}
	} else if ( is_singular( 'portfolio' ) ) {	
		if ( empty( $_thinkup_meta_layout ) or $_thinkup_meta_layout == 'option1' ) {
			if ( $thinkup_project_layout == "option1" or empty( $thinkup_project_layout ) ) {		
				echo '';
			} else if ( $thinkup_project_layout == "option2" ) {
				echo get_sidebar();
			} else if ( $thinkup_project_layout == "option3" ) {
				echo get_sidebar();
			} else {
				echo '';
			}
		} else if ( $_thinkup_meta_layout == 'option2' ) {
			echo '';
		} else if ( $_thinkup_meta_layout == 'option3' ) {
			echo get_sidebar();
		} else if ( $_thinkup_meta_layout == 'option4' ) {
			echo get_sidebar();
		}
	} else if ( is_search() ) {
		if ( $thinkup_general_layout == 'option1' or empty( $thinkup_general_layout ) ) {		
			echo '';
		} else if ( $thinkup_general_layout == "option2" ) {
			get_sidebar();
		} else if ( $thinkup_general_layout == "option3" ) {
			get_sidebar();
		}
	} else {
		if ( $_thinkup_meta_layout == 'option2' ) {
			echo '';
		} else if ( $_thinkup_meta_layout == 'option3' ) {
			get_sidebar();
		} else if ( $_thinkup_meta_layout == 'option4' ) {
			get_sidebar();
		}
	}
}


/* ----------------------------------------------------------------------------------
	Select a Sidebar
---------------------------------------------------------------------------------- */

/* Add Selected Sidebar To Specific Pages */
function thinkup_input_sidebars() {
global $thinkup_general_sidebars;
global $thinkup_homepage_sidebars;
global $thinkup_blog_sidebars;
global $thinkup_post_sidebars;
global $thinkup_portfolio_sidebars;
global $thinkup_project_sidebars;

global $post;
$_thinkup_meta_layout = get_post_meta( $post->ID, '_thinkup_meta_layout', true );
$_thinkup_meta_sidebars = get_post_meta( $post->ID, '_thinkup_meta_sidebars', true );

	if ( is_front_page() ) {	
			$output = $thinkup_homepage_sidebars;
	} else if ( is_page() and ! is_page_template( 'template-blog.php' ) ) {
		if ( empty( $_thinkup_meta_layout ) or $_thinkup_meta_layout == 'option1' or $_thinkup_meta_sidebars == 'Select a sidebar:' ) {
				$output = $thinkup_general_sidebars;
		} else {
			$output = $_thinkup_meta_sidebars;
		}
	} else if ( is_page_template( 'template-blog.php' ) ) {
		if ( empty( $_thinkup_meta_layout ) or $_thinkup_meta_layout == 'option1' or $_thinkup_meta_sidebars == 'Select a sidebar:' ) {
				$output = $thinkup_blog_sidebars;
		} else {
			$output = $_thinkup_meta_sidebars;
		}	
	} else if ( thinkup_check_isblog() and ! is_single() and ! is_post_type_archive( 'portfolio' ) ) {
		$output = $thinkup_blog_sidebars;
	} else if ( is_post_type_archive( 'portfolio' ) ) {	
		$output = $thinkup_portfolio_sidebars;
	} else if ( is_singular( 'post' ) ) {
		if ( empty( $_thinkup_meta_layout ) or $_thinkup_meta_layout == 'option1' or $_thinkup_meta_sidebars == 'Select a sidebar:' ) {
			$output = $thinkup_post_sidebars;
		} else {
			$output = $_thinkup_meta_sidebars;
		}
	} else if ( is_singular( 'portfolio' ) ) {	
		if ( empty( $_thinkup_meta_layout ) or $_thinkup_meta_layout == 'option1' or $_thinkup_meta_sidebars == 'Select a sidebar:' ) {
			$output = $thinkup_project_sidebars;
		} else {
			$output = $_thinkup_meta_sidebars;
		}
	} else if ( is_search() ) {	
		$output = $thinkup_general_sidebars;
	} else {
		$output = $_thinkup_meta_sidebars;
	}

	if ( empty( $output ) or $output == 'Select a sidebar:' ) {
		$output = 'Sidebar';
	}

return $output;
}


/* ----------------------------------------------------------------------------------
	Intro Default options
---------------------------------------------------------------------------------- */

/* Add custom intro section [Extend for more options in future update] */
function thinkup_custom_intro() {
global $thinkup_general_introswitch;

global $post;

// Set variables to avoid php non-object notice error
$_thinkup_meta_intro       = NULL;

// Assign meta data variable (check that it's not an archive / search page)
if ( ! empty( $post->ID ) and thinkup_check_currentpage() == get_permalink() ) {
	$_thinkup_meta_intro = get_post_meta( $post->ID, '_thinkup_meta_intro', true );
}

	if ( ! is_front_page() ) {
	
		// Output intro with breadcrumbs if set
		if( empty( $_thinkup_meta_intro ) or $_thinkup_meta_intro == 'option1' ) {
			if ( empty( $thinkup_general_introswitch ) or $thinkup_general_introswitch == '1' ) {
			echo	'<div id="intro" class="option1"><div id="intro-core">',
					'<h1 class="page-title"><span>',
					thinkup_title_select(),
					'</span></h1>',
					'</div><div class="action-shadow"></div></div>';
			}
		} else if( $_thinkup_meta_intro == 'option2' ) {
			echo	'<div id="intro" class="option1"><div id="intro-core">',
					'<h1 class="page-title"><span>',
					thinkup_title_select(),
					'</span></h1>',
					'</div><div class="action-shadow"></div></div>';
		}
	}

	// Hook to after content after intro (e.g. WooCommerce intro)
	do_action('thinkup_hook_custom_intro');
}


/* ----------------------------------------------------------------------------------
	Enable Breadcrumbs
---------------------------------------------------------------------------------- */

/* Toggle Breadcrumbs */
function thinkup_input_breadcrumbswitch() {
global $thinkup_general_breadcrumbswitch;

global $post;
$_thinkup_meta_breadcrumbs = get_post_meta( $post->ID, '_thinkup_meta_breadcrumbs', true );

	if( ! is_front_page() ) {
		if ( empty( $_thinkup_meta_breadcrumbs ) or $_thinkup_meta_breadcrumbs == 'option1' ) {
			if ( $thinkup_general_breadcrumbswitch == '0' or empty( $thinkup_general_breadcrumbswitch ) ) {
				echo '';
			} else if ( $thinkup_general_breadcrumbswitch == '1' ) {
				echo thinkup_input_breadcrumb();
			}
		} else if ( $_thinkup_meta_breadcrumbs == 'option2' ) {
			echo thinkup_input_breadcrumb();
		}
	}
}


/* ----------------------------------------------------------------------------------
	Enable Responsive Layout
---------------------------------------------------------------------------------- */

/* http://wordpress.stackexchange.com/questions/27497/how-to-use-wp-nav-menu-to-create-a-select-menu-dropdown */
class thinkup_nav_menu_responsive extends Walker_Nav_Menu {

	function start_el(&$output, $item, $depth=0, $args=array(), $id = 0) {
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = $value = '';
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
 
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';
 
		$output .= $indent . '<li id="res-menu-item-'. $item->ID . '"' . $value . $class_names .'>';

		$attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) .'"' : '';
		$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) .'"' : '';
		$attributes .= ! empty( $item->url ) ? ' href="' . esc_url( $item->url ) .'"' : '';

        // Insert title for top level
		$title = ( $depth == 0 )
			? '<span>' . apply_filters( 'the_title', $item->title, $item->ID ) . '</span>' : apply_filters( 'the_title', $item->title, $item->ID );

        // Insert sub-menu titles
		if ( $depth > 0 ) {
			$title = str_repeat('&#45; ', $depth ) . $item->title;
		}

        // Structure of output
		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before . $title . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}

// Fallback responsive menu when custom header menu has not been set.
function thinkup_input_responsivefall() {

	$output = wp_list_pages('echo=0&title_li=');

	echo '<div id="header-responsive-inner" class="responsive-links nav-collapse collapse"><ul>',
		 $output,
		 '</ul></div>';
}

function thinkup_input_responsivehtml1() {
global $thinkup_general_fixedlayoutswitch;

	if ( $thinkup_general_fixedlayoutswitch !== '1' ) {

		echo '<div id="header-nav">',
		     '<a class="btn-navbar" data-toggle="collapse" data-target=".nav-collapse">',
		     '<span class="icon-bar"></span>',
		     '<span class="icon-bar"></span>',
		     '<span class="icon-bar"></span>',
		     '</a>',
		     '</div>';
	}
}

function thinkup_input_responsivehtml2() {
global $thinkup_general_fixedlayoutswitch;

	if ( $thinkup_general_fixedlayoutswitch !== '1' ) {

		$args =  array(
			'container_class' => 'responsive-links nav-collapse collapse', 
			'container_id'    => 'header-responsive-inner', 
			'menu_class'      => '', 
			'theme_location'  => 'header_menu', 
			'walker'          => new thinkup_nav_menu_responsive(), 
			'fallback_cb'     => 'thinkup_input_responsivefall',
		);

		echo '<div id="header-responsive">',
		     wp_nav_menu( $args ),
		     '</div>';
	}
}

function thinkup_input_responsivecss() {
global $thinkup_general_fixedlayoutswitch;
	
	if ( $thinkup_general_fixedlayoutswitch !== '1' ) {
		wp_enqueue_style ( 'thinkup-responsive' );
	}
}
add_action( 'wp_enqueue_scripts', 'thinkup_input_responsivecss', '12' );

function thinkup_input_responsiveclass($classes){
global $thinkup_general_fixedlayoutswitch;

	if ( $thinkup_general_fixedlayoutswitch == '1' ) {
		$classes[] = 'layout-fixed';
	} else {
		$classes[] = 'layout-responsive';	
	}
	return $classes;
}
add_action( 'body_class', 'thinkup_input_responsiveclass');


/* ----------------------------------------------------------------------------------
	Enable Boxed Layout
---------------------------------------------------------------------------------- */
function thinkup_input_boxedclass($classes){
global $post;
global $thinkup_general_boxlayout;

// Set variables to avoid php non-object notice error
$_thinkup_meta_boxed = NULL;

// Assign meta data variable
if ( ! empty( $post->ID ) ) {
	$_thinkup_meta_boxed = get_post_meta( $post->ID, '_thinkup_meta_boxed', true );
}

	if ( empty( $_thinkup_meta_boxed ) or $_thinkup_meta_boxed == 'option1' ) {
		if ( $thinkup_general_boxlayout == '1' ) {
			$classes[] = 'layout-boxed';
		} else {
			$classes[] = 'layout-wide';		
		}
	} else if ( $_thinkup_meta_boxed == 'option2' ) {
		$classes[] = 'layout-boxed';
	} else {
		$classes[] = 'layout-wide';		
	}
	return $classes;
}
add_action( 'body_class', 'thinkup_input_boxedclass');

function thinkup_input_boxedstyle(){
global $thinkup_general_boxlayout;
global $thinkup_general_boxbackgroundimage;
global $thinkup_general_boxbackgroundcolor;
global $thinkup_general_boxedposition;
global $thinkup_general_boxedrepeat;
global $thinkup_general_boxedsize;
global $thinkup_general_boxedattachment;

global $post;

// Set variables to avoid php non-object notice error
$_thinkup_meta_boxed = NULL;

// Assign meta data variable
if ( ! empty( $post->ID ) ) {
	$_thinkup_meta_boxed = get_post_meta( $post->ID, '_thinkup_meta_boxed', true );
}

	if ( ! empty( $thinkup_general_boxbackgroundimage ) ) {
		$image = 'background: url(' . esc_url( $thinkup_general_boxbackgroundimage ) . ');';
	}
	if ( ! empty( $thinkup_general_boxedposition ) ) {
		$position = 'background-position: ' . esc_html( $thinkup_general_boxedposition ) . ';';
	}
	if ( ! empty( $thinkup_general_boxedrepeat ) ) {
		$repeat = 'background-repeat: ' . esc_html( $thinkup_general_boxedrepeat ) . ';';
	}
	if ( ! empty( $thinkup_general_boxedsize ) ) {
		$size = 'background-size: ' . esc_html( $thinkup_general_boxedsize ) . ';';
	}
	if ( ! empty( $thinkup_general_boxedattachment ) ) {
		$attachment = 'background-attachment: ' . esc_html( $thinkup_general_boxedattachment ) . ';';
	}

	if ( $thinkup_general_boxlayout == '1' or $_thinkup_meta_boxed == 'option2' ) {
		if ( ! empty( $thinkup_general_boxbackgroundimage ) ) {
			echo	' style="' . $image . $position . $repeat . $size . $attachment . '"';
		} else if ( ! empty( $thinkup_general_boxbackgroundcolor ) ) {
			echo	' style="background: ' . esc_html( $thinkup_general_boxbackgroundcolor ) . ';"';
		}
	}
}
add_action( 'thinkup_bodystyle', 'thinkup_input_boxedstyle');


/* ----------------------------------------------------------------------------------
	Google Analytics Code
---------------------------------------------------------------------------------- */

/* Add Google Analytics Code */
function thinkup_input_analytics() {
global $thinkup_general_analyticscode;

	if ( ! empty( $thinkup_general_analyticscode ) ) {

		if ( strpos( $thinkup_general_analyticscode, '</script>' ) !== false) {
			echo "\n" . $thinkup_general_analyticscode . "\n" . "\n";
		} else {
			echo "\n" . '<script>';
			echo "\n" . $thinkup_general_analyticscode . "\n";
			echo '</script>' . "\n";
		}

	}
}
add_action( 'wp_footer', 'thinkup_input_analytics' );


/* ----------------------------------------------------------------------------------
	Custom CSS
---------------------------------------------------------------------------------- */

/* Add Custom CSS */
function thinkup_custom_css() {
global $thinkup_general_customcss;

global $post;

// Set variables to avoid php non-object notice error
$_thinkup_meta_customcss = NULL;

// Assign meta data variable
if ( ! empty( $post->ID ) ) {
	$_thinkup_meta_customcss = get_post_meta( $post->ID, '_thinkup_meta_customcss', true );
}

	if ( ! empty( $thinkup_general_customcss ) ) {
		echo 	"\n" .'<style type="text/css">' . "\n",
				wp_kses_post( $thinkup_general_customcss ) . "\n",
				'</style>' . "\n";
	}
	if ( ! empty( $_thinkup_meta_customcss ) ) {
		echo 	"\n" .'<style type="text/css">' . "\n",
				wp_kses_post( $_thinkup_meta_customcss ) . "\n",
				'</style>' . "\n";
	}
}
add_action( 'wp_head','thinkup_custom_css', '12' );


/* ----------------------------------------------------------------------------------
	Custom JavaScript - Front End
---------------------------------------------------------------------------------- */

/* Add Custom Front-End Javascript */
function thinkup_custom_javafront() {
global $thinkup_general_customjavafront;

global $post;
$_thinkup_meta_customjava = get_post_meta( $post->ID, '_thinkup_meta_customjava', true );

	if ( ! empty( $thinkup_general_customjavafront ) ) {
	echo 	'<script type="text/javascript">',
			"\n" . wp_kses_post( $thinkup_general_customjavafront ) . "\n",
			'</script>' . "\n";
	}
	if ( ! empty( $_thinkup_meta_customjava ) ) {
	echo 	'<script type="text/javascript">',
			"\n" . wp_kses_post( $_thinkup_meta_customjava ) . "\n",
			'</script>' . "\n";
	}
}
add_action( 'wp_footer', 'thinkup_custom_javafront' );