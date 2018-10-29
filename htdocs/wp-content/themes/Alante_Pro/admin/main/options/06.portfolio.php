<?php
/**
 * Portfolio functions.
 *
 * @package ThinkUpThemes
 */

/* ----------------------------------------------------------------------------------
	PORTFOLIO LAYOUT
---------------------------------------------------------------------------------- */

function thinkup_input_portfoliolayout() {
global $thinkup_portfolio_layout;

global $post;
global $thinkup_portfolio_pageid;
$_thinkup_meta_portfoliolayout = get_post_meta( $thinkup_portfolio_pageid, '_thinkup_meta_portfoliolayout', true );

	if ( empty( $_thinkup_meta_portfoliolayout ) or $_thinkup_meta_portfoliolayout == 'option1' ) {
		if ( empty( $thinkup_portfolio_layout ) ) {
			echo 'column-2';
		} else if ( $thinkup_portfolio_layout == 'option1' or $thinkup_portfolio_layout == 'option5' or $thinkup_portfolio_layout == 'option6' ) {
			echo 'column-1';
		} else if ( $thinkup_portfolio_layout == 'option2' or $thinkup_portfolio_layout == 'option7' or $thinkup_portfolio_layout == 'option8' ) {
			echo 'column-2';
		} else if ( $thinkup_portfolio_layout == 'option3' ) {
			echo 'column-3';
		} else if ( $thinkup_portfolio_layout == 'option4' ) {
			echo 'column-4';
		}
	} else if ( $_thinkup_meta_portfoliolayout == 'option2' ) {
		echo 'column-1';
	} else if ( $_thinkup_meta_portfoliolayout == 'option3' ) {
		echo 'column-2';
	} else if ( $_thinkup_meta_portfoliolayout == 'option4' ) {
		echo 'column-3';
	} else if ( $_thinkup_meta_portfoliolayout == 'option5' ) {
		echo 'column-4';
	}
}

function thinkup_input_portfoliosize() {
global $thinkup_portfolio_layout;

global $post;
global $thinkup_portfolio_pageid;
$_thinkup_meta_portfoliolayout = get_post_meta( $thinkup_portfolio_pageid, '_thinkup_meta_portfoliolayout', true );

	if ( empty( $_thinkup_meta_portfoliolayout ) or $_thinkup_meta_portfoliolayout == 'option1' ) {
		if ( empty( $thinkup_portfolio_layout ) ) {
			the_post_thumbnail( 'column2-3/5' );
		} else if ( $thinkup_portfolio_layout == 'option1' or $thinkup_portfolio_layout == 'option5' or $thinkup_portfolio_layout == 'option6' ) {
			the_post_thumbnail( 'column1-2/5' );
		} else if ( $thinkup_portfolio_layout == 'option2' or $thinkup_portfolio_layout == 'option7' or $thinkup_portfolio_layout == 'option8' ) {
			the_post_thumbnail( 'column2-3/5' );
		} else if ( $thinkup_portfolio_layout == 'option3' ) {
			the_post_thumbnail( 'column3-2/3' );
		} else if ( $thinkup_portfolio_layout == 'option4' ) {
			the_post_thumbnail( 'column4-2/3' );
		}
	} else if ( $_thinkup_meta_portfoliolayout == 'option2' ) {
		the_post_thumbnail( 'column1-2/5' );
	} else if ( $_thinkup_meta_portfoliolayout == 'option3' ) {
		the_post_thumbnail( 'column2-3/5' );
	} else if ( $_thinkup_meta_portfoliolayout == 'option4' ) {
		the_post_thumbnail( 'column3-2/3' );
	} else if ( $_thinkup_meta_portfoliolayout == 'option5' ) {
		the_post_thumbnail( 'column4-2/3' );
	}
}


/* ----------------------------------------------------------------------------------
	PORTFOLIO HOVER CONTENT 
---------------------------------------------------------------------------------- */

function thinkup_input_portfoliohover() {
global $thinkup_portfolio_style;
global $thinkup_portfolio_hovertitle;
global $thinkup_portfolio_hoverexcerpt;
global $thinkup_portfolio_hoverproject;
global $thinkup_portfolio_hoverimage;

global $post;
global $thinkup_portfolio_pageid;
$_thinkup_meta_portfolioswitch   = get_post_meta( $thinkup_portfolio_pageid, '_thinkup_meta_portfolioswitch', true );
$_thinkup_meta_portfoliotitle    = get_post_meta( $thinkup_portfolio_pageid, '_thinkup_meta_portfoliotitle', true );
$_thinkup_meta_portfolioexcerpt  = get_post_meta( $thinkup_portfolio_pageid, '_thinkup_meta_portfolioexcerpt', true );
$_thinkup_meta_portfoliolink     = get_post_meta( $thinkup_portfolio_pageid, '_thinkup_meta_portfoliolink', true );
$_thinkup_meta_portfoliolightbox = get_post_meta( $thinkup_portfolio_pageid, '_thinkup_meta_portfoliolightbox', true );

	if ( $_thinkup_meta_portfolioswitch !== 'on' ) {
		echo	'<article class="da-animate"><div class="image-overlay"></div><div class="entry-content">';
			if ( $thinkup_portfolio_hovertitle == '1' ) { 
				echo	'<h3 class="hover-title"><a href="' . esc_url( get_permalink() ) . '">' . get_the_title() . '</a></h3>'; 
			}
			if ( $thinkup_portfolio_hoverexcerpt == '1' ) { 
				echo '<div class="hover-excerpt">' . get_the_excerpt() . '</div>'; 
			}

			if ( $thinkup_portfolio_hoverproject == '1' or $thinkup_portfolio_hoverimage == '1') { 
			
			echo '<div class="hover-links">'; 
				if ( $thinkup_portfolio_hoverproject == '1' ) { 
					echo	'<a href="' . esc_url( get_permalink() ) . '"><img class="hover-link" src="' . esc_url( get_template_directory_uri() ) . '/images/transparent.png" /></a>'; 
				}
				if ( $thinkup_portfolio_hoverimage == '1' ) {
					if ( has_post_thumbnail( $post->ID ) ) {
						$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
						echo	'<a href="' . esc_url( $image[0] ) . '"><img class="hover-zoom" src="' . esc_url( get_template_directory_uri() ) . '/images/transparent.png" alt="' . get_the_title() . '" /></a>'; 
					}
				}
			echo '</div>'; 
			}
		echo	'</div></article>';
	} else if ( $_thinkup_meta_portfolioswitch == 'on' ) {
		echo	'<article class="da-animate"><div class="image-overlay"></div><div class="entry-content">';
			if ( $_thinkup_meta_portfoliotitle == 'on' ) {
				echo	'<h3 class="hover-title"><a href="' . esc_url( get_permalink() ) . '">' . get_the_title() . '</a></h3>'; 
			}
			if ( $_thinkup_meta_portfolioexcerpt == 'on' ) { 
				echo '<div class="hover-excerpt">' . get_the_excerpt() . '</div>'; 
			}

			if ( $_thinkup_meta_portfoliolink == 'on' or $_thinkup_meta_portfoliolightbox == 'on') { 
			
			echo '<div class="hover-links">'; 
				if ( $_thinkup_meta_portfoliolink == 'on' ) { 
					echo	'<a href="' . esc_url( get_permalink() ) . '"><img class="hover-link" src="' . esc_url( get_template_directory_uri() ) . '/images/transparent.png" /></a>'; 
				}
				if ( $_thinkup_meta_portfoliolightbox == 'on' ) {
					if ( has_post_thumbnail( $post->ID ) ) {
						$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
						echo	'<a href="' . esc_url( $image[0] ) . '"><img class="hover-zoom" src="' . esc_url( get_template_directory_uri() ) . '/images/transparent.png" alt="' . get_the_title() . '" /></a>'; 
					}
				}
			echo '</div>'; 
			}
		echo	'</div></article>';
	}
}


/* ----------------------------------------------------------------------------------
	PROJECT INFORMATION
---------------------------------------------------------------------------------- */

/* Input meta data */
function thinkup_input_projectinfo() {
global $thinkup_project_client;
global $thinkup_project_date;
global $thinkup_project_skill;
global $thinkup_project_url;

global $post;
$_thinkup_meta_projectdescription  = get_post_meta( $post->ID, '_thinkup_meta_projectdescription', true );
$_thinkup_meta_projectclient       = get_post_meta( $post->ID, '_thinkup_meta_projectclient', true );
$_thinkup_meta_projectdate         = get_post_meta( $post->ID, '_thinkup_meta_projectdate', true );
$_thinkup_meta_projectskills       = get_post_meta( $post->ID, '_thinkup_meta_projectskills', true );
$_thinkup_meta_projecturl          = get_post_meta( $post->ID, '_thinkup_meta_projecturl', true );
$_thinkup_meta_projectclienttitle  = get_post_meta( $post->ID, '_thinkup_meta_projectclienttitle', true );
$_thinkup_meta_projectdatetitle    = get_post_meta( $post->ID, '_thinkup_meta_projectdatetitle', true );
$_thinkup_meta_projectskillstitle  = get_post_meta( $post->ID, '_thinkup_meta_projectskillstitle', true );
$_thinkup_meta_projecturltitle     = get_post_meta( $post->ID, '_thinkup_meta_projecturltitle', true );

// Set text for portfolio sections
if( empty( $_thinkup_meta_projectclienttitle ) ) { $_thinkup_meta_projectclienttitle = __( 'Client', 'alante' ); }
if( empty( $_thinkup_meta_projectdatetitle ) )   { $_thinkup_meta_projectdatetitle   = __( 'Date', 'alante' ); }
if( empty( $_thinkup_meta_projectskillstitle ) ) { $_thinkup_meta_projectskillstitle = __( 'Skill', 'alante' ); }
if( empty( $_thinkup_meta_projecturltitle ) )    { $_thinkup_meta_projecturltitle    = __( 'Link', 'alante' ); }

	if ( !empty( $_thinkup_meta_projectdescription ) ) {
		echo '<h5 class="project-title">' . __( 'Project Description', 'alante' ) . '</h5>';
		echo wpautop( do_shortcode( wp_kses_post( $_thinkup_meta_projectdescription ) ) );
	}

	if ( ( !empty( $_thinkup_meta_projectclient ) and $thinkup_project_client !== '1' ) or
		 ( !empty( $_thinkup_meta_projectdate ) and $thinkup_project_date !== '1' ) or
		 ( !empty( $_thinkup_meta_projectskills ) and $thinkup_project_skill !== '1' ) or
		 ( !empty( $_thinkup_meta_projecturl ) and $thinkup_project_url !== '1' ) ) {

		echo '<h5 class="project-title">' . __( 'Project Details', 'alante' ) . '</h5>';
		echo '<ul class="project-list">';
			if ( !empty( $_thinkup_meta_projectclient ) and $thinkup_project_client !== '1' ) {
				echo '<li><span>' . $_thinkup_meta_projectclienttitle . ':</span> ' . esc_html( $_thinkup_meta_projectclient ) . '</li>';
			}
			if ( !empty( $_thinkup_meta_projectdate ) and $thinkup_project_date !== '1' ) {
				echo '<li><span>' . $_thinkup_meta_projectdatetitle . ':</span> ' . esc_html( $_thinkup_meta_projectdate ) . '</li>';
			}
			if ( !empty( $_thinkup_meta_projectskills ) and $thinkup_project_skill !== '1' ) {
				echo '<li><span>' . $_thinkup_meta_projectskillstitle . ':</span> ' . esc_html( $_thinkup_meta_projectskills ) . '</li>';
			}

			if ( !empty( $_thinkup_meta_projecturl ) and $thinkup_project_url !== '1' ) {

				if ( strpos( $_thinkup_meta_projecturl, 'http://' ) == 'true' ) {
					$_thinkup_meta_projecturl = str_replace( 'http://', '', esc_url( $_thinkup_meta_projecturl ) );
				}
				echo '<li><span>' . $_thinkup_meta_projecturltitle . ':</span> <a href="http://' . $_thinkup_meta_projecturl . '">' . $_thinkup_meta_projecturl . '</a></li>';
			}
		echo '</ul>';
	}

	if ( !empty( $_thinkup_meta_projecturl ) and $thinkup_project_url !== '1' ) {
		if ( strpos( $_thinkup_meta_projecturl, 'http://' ) == 'true' ) {
			$_thinkup_meta_projecturl = str_replace( 'http://', '', esc_url( $_thinkup_meta_projecturl ) );
		}
		echo '<a class="project-button themebutton" href="http://' . $_thinkup_meta_projecturl . '">' . __( 'Visit Website', 'alante' ) . '</a>';
	}
}


/* ----------------------------------------------------------------------------------
	PROJECT NAVIGATION
---------------------------------------------------------------------------------- */

function thinkup_input_portfolionavigation() {
global $thinkup_project_navigationswitch;

	if ( $thinkup_project_navigationswitch == '1' ) {
		thinkup_input_nav( 'nav-below' );
	}
}