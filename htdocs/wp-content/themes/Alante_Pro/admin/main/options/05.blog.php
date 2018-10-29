<?php
/**
 * Blog functions.
 *
 * @package ThinkUpThemes
 */

/* ----------------------------------------------------------------------------------
	BLOG STYLE
---------------------------------------------------------------------------------- */

function thinkup_input_blogclass($classes){
global $thinkup_blog_style;
global $thinkup_blog_style1layout;

global $post;

// Set variables to avoid php non-object notice error
$_thinkup_meta_blogstyle        = NULL;
$_thinkup_meta_blogstyle1layout = NULL;
$_thinkup_meta_blogstyle2layout = NULL;

// Assign meta data variable
if ( ! empty( $post->ID ) ) {
	$_thinkup_meta_blogstyle        = get_post_meta( $post->ID, '_thinkup_meta_blogstyle', true );
	$_thinkup_meta_blogstyle1layout = get_post_meta( $post->ID, '_thinkup_meta_blogstyle1layout', true );
	$_thinkup_meta_blogstyle2layout = get_post_meta( $post->ID, '_thinkup_meta_blogstyle2layout', true );
}

	if ( thinkup_check_isblog() ) {
		if ( empty( $thinkup_blog_style ) or $thinkup_blog_style == 'option1' ) {
			if ( $thinkup_blog_style1layout == 'option1' ) {
				$classes[] = 'blog-style1 blog-style1-layout1';
			} else {
				$classes[] = 'blog-style1 blog-style1-layout2';
			}
		} else {
			$classes[] = 'blog-style2';
		}
	} else if ( is_page_template( 'template-blog.php' ) ) {
		if ( empty( $_thinkup_meta_blogstyle ) or $_thinkup_meta_blogstyle == 'option1' ) {
			if ( empty( $thinkup_blog_style ) or $thinkup_blog_style == 'option1' ) {
				if ( $thinkup_blog_style1layout == 'option1' ) {
					$classes[] = 'blog-style1 blog-style1-layout1';
				} else {
					$classes[] = 'blog-style1 blog-style1-layout2';
				}
			} else {
				$classes[] = 'blog-style2';
			}
		} else if ( $_thinkup_meta_blogstyle == 'option2' ) {
			if ( empty( $_thinkup_meta_blogstyle1layout ) or $_thinkup_meta_blogstyle1layout == 'option1' ) {
				$classes[] = 'blog-style1 blog-style1-layout1';
			} else {
				$classes[] = 'blog-style1 blog-style1-layout2';
			}
		} else if ( $_thinkup_meta_blogstyle == 'option3' ) {
			$classes[] = 'blog-style2';
		}
	}
	return $classes;
}
add_action( 'body_class', 'thinkup_input_blogclass');

// Add blog class to search results page
function thinkup_input_searchclass($classes){

	if ( is_search() ) {
		$classes[] = 'blog-style1';
	}
	return $classes;
}
add_action( 'body_class', 'thinkup_input_searchclass');	


/* ----------------------------------------------------------------------------------
	BLOG STYLE
---------------------------------------------------------------------------------- */

function thinkup_input_stylelayout() {
global $thinkup_blog_style;
global $thinkup_blog_style2layout;

global $thinkup_blog_pageid;
$_thinkup_meta_blogstyle        = get_post_meta( $thinkup_blog_pageid, '_thinkup_meta_blogstyle', true );
$_thinkup_meta_blogstyle2layout = get_post_meta( $thinkup_blog_pageid, '_thinkup_meta_blogstyle2layout', true );
  
	if ( get_page_template_slug( $thinkup_blog_pageid ) !== 'template-blog.php' ) {
		if ( $thinkup_blog_style !== 'option2' ) {
			echo ' column-1';
		} else if ( $thinkup_blog_style == 'option2' ) {			
			if ( empty($thinkup_blog_style2layout) or $thinkup_blog_style2layout == 'option1' ) {
				echo ' column-1';
			} else if ( $thinkup_blog_style2layout == 'option2' ) {
				echo ' column-2';
			} else if ( $thinkup_blog_style2layout == 'option3' ) {
				echo ' column-3';
			} else if ( $thinkup_blog_style2layout == 'option4' ) {
				echo ' column-4';
			}
		}
	} else if ( get_page_template_slug( $thinkup_blog_pageid ) == 'template-blog.php' ) {
		if ( empty( $_thinkup_meta_blogstyle ) or $_thinkup_meta_blogstyle == 'option1' ) {
			if ( $thinkup_blog_style !== 'option2' ) {
				echo ' column-1';
			} else if ( $thinkup_blog_style == 'option2' ) {		
				if ( empty($thinkup_blog_style2layout) or $thinkup_blog_style2layout == 'option1' ) {
					echo ' column-1';
				} else if ( $thinkup_blog_style2layout == 'option2' ) {
					echo ' column-2';
				} else if ( $thinkup_blog_style2layout == 'option3' ) {
					echo ' column-3';
				} else if ( $thinkup_blog_style2layout == 'option4' ) {
					echo ' column-4';
				}
			}
		} else if ( $_thinkup_meta_blogstyle == 'option2' ) {
			echo ' column-1';	
		} else if ( $_thinkup_meta_blogstyle == 'option3' ) {
			if ( empty($_thinkup_meta_blogstyle2layout) or $_thinkup_meta_blogstyle2layout == 'option1' ) {
				echo ' column-1';
			} else if ( $_thinkup_meta_blogstyle2layout == 'option2' ) {
				echo ' column-2';
			} else if ( $_thinkup_meta_blogstyle2layout == 'option3' ) {
				echo ' column-3';
			} else if ( $_thinkup_meta_blogstyle2layout == 'option4' ) {
				echo ' column-4';
			}
		}
	}
}


/* ----------------------------------------------------------------------------------
	BLOG STYLE - CLASSES FOR STYLE 1
---------------------------------------------------------------------------------- */

function thinkup_input_stylelayout_class1() {
global $post;
global $thinkup_blog_postswitch;
global $thinkup_blog_style;
global $thinkup_blog_style1layout;

global $thinkup_blog_pageid;
$_thinkup_meta_blogstyle        = get_post_meta( $thinkup_blog_pageid, '_thinkup_meta_blogstyle', true );
$_thinkup_meta_blogstyle1layout = get_post_meta( $thinkup_blog_pageid, '_thinkup_meta_blogstyle1layout', true );

	if ( has_post_thumbnail( $post->ID ) and $thinkup_blog_postswitch !== 'option2' ) {
		if ( get_page_template_slug( $thinkup_blog_pageid ) !== 'template-blog.php' ) {
			if ( $thinkup_blog_style !== 'option2' and $thinkup_blog_style1layout == 'option1' ) {
				echo ' two_fifth';
			}
		} else if ( get_page_template_slug( $thinkup_blog_pageid ) == 'template-blog.php' ) {
			if ( empty( $_thinkup_meta_blogstyle ) or $_thinkup_meta_blogstyle == 'option1' ) {
				if ( $thinkup_blog_style !== 'option2' and $thinkup_blog_style1layout == 'option1' ) {
					echo ' two_fifth';
				}
			} else if ( $_thinkup_meta_blogstyle == 'option2' and ( empty( $_thinkup_meta_blogstyle1layout ) or $_thinkup_meta_blogstyle1layout == 'option1' ) ) {
				echo ' two_fifth';
			}
		}
	}
}

function thinkup_input_stylelayout_class2() {
global $post;
global $thinkup_blog_postswitch;
global $thinkup_blog_style;
global $thinkup_blog_style1layout;

global $thinkup_blog_pageid;
$_thinkup_meta_blogstyle        = get_post_meta( $thinkup_blog_pageid, '_thinkup_meta_blogstyle', true );
$_thinkup_meta_blogstyle1layout = get_post_meta( $thinkup_blog_pageid, '_thinkup_meta_blogstyle1layout', true );

	if ( has_post_thumbnail( $post->ID ) and $thinkup_blog_postswitch !== 'option2' ) {
		if ( get_page_template_slug( $thinkup_blog_pageid ) !== 'template-blog.php' ) {
			if ( $thinkup_blog_style !== 'option2' and $thinkup_blog_style1layout == 'option1' ) {
				echo ' three_fifth last';
			}
		} else if ( get_page_template_slug( $thinkup_blog_pageid ) == 'template-blog.php' ) {
			if ( empty( $_thinkup_meta_blogstyle ) or $_thinkup_meta_blogstyle == 'option1' ) {
				if ( $thinkup_blog_style !== 'option2' and $thinkup_blog_style1layout == 'option1' ) {
					echo ' three_fifth last';
				}
			} else if ( $_thinkup_meta_blogstyle == 'option2' and ( empty( $_thinkup_meta_blogstyle1layout ) or $_thinkup_meta_blogstyle1layout == 'option1' ) ) {
				echo ' three_fifth last';
			}
		}
	}
}


/* ----------------------------------------------------------------------------------
	HIDE POST TITLE
---------------------------------------------------------------------------------- */

function thinkup_input_blogtitle() {
global $thinkup_blog_title;

	if ( $thinkup_blog_title !== '1' ) {
		echo	'<h2 class="blog-title">',
				'<a href="' . esc_url( get_permalink() ) . '" title="' . esc_attr( sprintf( __( 'Permalink to %s', 'alante' ), the_title_attribute( 'echo=0' ) ) ) . '">' . get_the_title() . '</a>',
				'</h2>';
	}
}


/* ----------------------------------------------------------------------------------
	BLOG CONTENT
---------------------------------------------------------------------------------- */

// Input post thumbnail / featured media
function thinkup_input_blogimage() {
global $post;
global $wp_embed;
global $thinkup_blog_style;
global $thinkup_blog_style1layout;
global $thinkup_blog_style2layout;
global $thinkup_blog_lightbox;
global $thinkup_blog_link;

global $thinkup_blog_pageid;
$_thinkup_meta_blogstyle        = get_post_meta( $thinkup_blog_pageid, '_thinkup_meta_blogstyle', true );
$_thinkup_meta_blogstyle1layout = get_post_meta( $thinkup_blog_pageid, '_thinkup_meta_blogstyle1layout', true );
$_thinkup_meta_blogstyle2layout = get_post_meta( $thinkup_blog_pageid, '_thinkup_meta_blogstyle2layout', true );

if ( ! empty( $post->ID ) ) {
	$_thinkup_meta_featuredmedia   = get_post_meta( $post->ID, '_thinkup_meta_featuredmedia', true );
	$_thinkup_meta_featuredgallery = get_post_meta( $post->ID, '_thinkup_meta_featuredgallery', true ); 
}

	$size    = NULL;
	$link    = NULL;
	$media   = NULL;
	$output  = NULL;

	$blog_lightbox = NULL;
	$blog_link     = NULL;
	$blog_class    = NULL;
	$blog_overlay  = NULL;

	// Set image size for blog thumbnail
	if ( get_page_template_slug( $thinkup_blog_pageid ) !== 'template-blog.php' ) {
		if ( $thinkup_blog_style !== 'option2' ) {
			if ( empty($thinkup_blog_style1layout) or $thinkup_blog_style1layout == 'option1' ) {
				$size = 'column2-2/3';
			} else {
				$size = 'column1-1/4';
			}
		} else if ( $thinkup_blog_style == 'option2' ) {			
			if ( empty($thinkup_blog_style2layout) or $thinkup_blog_style2layout == 'option1' ) {
				$size = 'column1-1/3';
			} else if ( $thinkup_blog_style2layout == 'option2' ) {
				$size = 'column2-1/2';
			} else if ( $thinkup_blog_style2layout == 'option3' ) {
				$size = 'column3-2/3';
			} else if ( $thinkup_blog_style2layout == 'option4' ) {
				$size = 'column4-2/3';
			}
		}
	} else if ( get_page_template_slug( $thinkup_blog_pageid ) == 'template-blog.php' ) {	
		if ( empty( $_thinkup_meta_blogstyle ) or $_thinkup_meta_blogstyle == 'option1' ) {
			if ( $thinkup_blog_style !== 'option2' ) {
				if ( empty($thinkup_blog_style1layout) or $thinkup_blog_style1layout == 'option1' ) {
					$size = 'column2-2/3';
				} else {
					$size = 'column1-1/4';
				}
			} else if ( $thinkup_blog_style == 'option2' ) {		
				if ( empty($thinkup_blog_style2layout) or $thinkup_blog_style2layout == 'option1' ) {
					$size = 'column1-1/3';
				} else if ( $thinkup_blog_style2layout == 'option2' ) {
					$size = 'column2-1/2';
				} else if ( $thinkup_blog_style2layout == 'option3' ) {
					$size = 'column3-2/3';
				} else if ( $thinkup_blog_style2layout == 'option4' ) {
					$size = 'column4-2/3';
				}
			}
		} else if ( $_thinkup_meta_blogstyle == 'option2' ) {
			if ( empty( $_thinkup_meta_blogstyle1layout) or $_thinkup_meta_blogstyle1layout == 'option1' ) {
				$size = 'column2-2/3';
			} else {
				$size = 'column1-1/4';
			}
		} else if ( $_thinkup_meta_blogstyle == 'option3' ) {
			if ( empty($_thinkup_meta_blogstyle2layout) or $_thinkup_meta_blogstyle2layout == 'option1' ) {
				$size = 'column1-1/3';
			} else if ( $_thinkup_meta_blogstyle2layout == 'option2' ) {
				$size = 'column2-1/2';
			} else if ( $_thinkup_meta_blogstyle2layout == 'option3' ) {
				$size = 'column3-2/3';
			} else if ( $_thinkup_meta_blogstyle2layout == 'option4' ) {
				$size = 'column4-2/3';
			}
		}
	}

	$featured_id  = get_post_thumbnail_id( $post->ID );
	$featured_img = wp_get_attachment_image_src($featured_id,'full', true);

	// Determine featured media to input
	if ( get_post_format() == 'video' and ! empty( $_thinkup_meta_featuredmedia ) ) {

		// Remove http:// and https:// from video link
		if ( strpos( $_thinkup_meta_featuredmedia, 'https://' ) !== false ) {
			$_thinkup_meta_featuredmedia = 'https://' . str_replace( 'https://', '', $_thinkup_meta_featuredmedia );
		} else {
			$_thinkup_meta_featuredmedia = 'http://' . str_replace( 'http://', '', $_thinkup_meta_featuredmedia );
		}

		$link  = $_thinkup_meta_featuredmedia;
		$media = $wp_embed->run_shortcode('[embed]' . $_thinkup_meta_featuredmedia . '[/embed]');
	} else if ( get_post_format() == 'gallery' and ! empty( $_thinkup_meta_featuredgallery ) ) {

		if ( is_array( $_thinkup_meta_featuredgallery ) ) $slide_height = $_thinkup_meta_featuredgallery['height'];

		if ( empty( $slide_height ) ) $slide_height = '200';

		$media .= '<div class="rslides-sc" data-height="' . esc_attr( $slide_height ) . '">';
		$media .= '<div class="rslides-container">';
		$media .= '<div class="rslides-inner">';
		$media .= '<ul class="slides">';

		$count = 0;

		// Begin loop to import gallery images
		foreach ( $_thinkup_meta_featuredgallery['image'] as $slide => $list) {

			$slide_id = $_thinkup_meta_featuredgallery['image'][ $count ];

			$slide_img   = wp_get_attachment_url( $slide_id, true );
			$slide_image = 'background: url(' . esc_url( $slide_img ) . ') no-repeat center; background-size: cover;';

			$media .= '<li>';
			$media .= '<img src="' . esc_url( get_template_directory_uri() ) . '/images/transparent.png" style="' . $slide_image . '" alt="Image" />';
			$media .= '</li>';

		$count++;
		}

		$media .= '</ul>';
		$media .= '</div>';
		$media .= '</div>';
		$media .= '</div>';

	} else {
		$link  = $featured_img[0];
		$media = get_the_post_thumbnail( $post->ID, $size );
	}

	// Determine which links to show on hover
	if ( $thinkup_blog_lightbox =='1' ) {
		$blog_lightbox = '<a class="hover-zoom prettyPhoto" href="' . esc_url( $link ) . '"></a>';
	}
	if ( $thinkup_blog_link =='1' ) {
		$blog_link = '<a class="hover-link" href="' . esc_url( get_permalink() ) . '"></a>';
	}

	// Determine which if single link animation should be shown
	if ( ( $thinkup_blog_lightbox =='1' and $thinkup_blog_link !== '1' ) 
		or ( $thinkup_blog_lightbox !=='1' and $thinkup_blog_link == '1' ) ) {
		$blog_class = ' style2';
	}

	if ( $thinkup_blog_lightbox =='1' or $thinkup_blog_link =='1' ) {
		$blog_overlay .= '<div class="image-overlay' . $blog_class . '">';
		$blog_overlay .= '<div class="image-overlay-inner"><div class="hover-icons">';
		$blog_overlay .= $blog_lightbox;
		$blog_overlay .= $blog_link;
		$blog_overlay .= '</div></div>';
		$blog_overlay .= '</div>';
	}

	// Output media on blog page
	if ( get_post_format() == 'gallery' and ! empty( $_thinkup_meta_featuredgallery ) ) {
		$output .= '<div class="blog-thumb gallery">';
		$output .= '<a href="'. esc_url( get_permalink($post->ID) ) . '">' . $media . '</a>';
		$output .= '</div>';
	} else if ( get_post_format() == 'video' and ! empty( $_thinkup_meta_featuredmedia ) ) {
		$output .= '<div class="blog-thumb">';
		$output .= '<a href="'. esc_url( get_permalink($post->ID) ) . '">' . $media . '</a>';
		$output .= $blog_overlay;
		$output .= '</div>';
	} else if ( ! empty( $featured_id ) ) {
		$output .= '<div class="blog-thumb">';
		$output .= '<a href="'. esc_url( get_permalink($post->ID) ) . '">' . $media . '</a>';
		$output .= $blog_overlay;
		$output .= '</div>';
	}

	return $output;
}

/* Input post excerpt / content to blog page */
function thinkup_input_blogtext() {
global $post;
global $thinkup_blog_postswitch;

	// Output full content - EDD plugin compatibility
	if( function_exists( 'EDD' ) and is_post_type_archive( 'download' ) ) {
		the_content();
		return;
	}

	// Output post content
	if ( is_search() ) {
		the_excerpt();
	} else if ( ! is_search() ) {
		if ( ( empty( $thinkup_blog_postswitch ) or $thinkup_blog_postswitch == 'option1' ) ) {
			if( ! is_numeric( strpos( $post->post_content, '<!--more-->' ) ) ) {
				the_excerpt();
			} else {
				the_content();
				wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'alante' ), 'after'  => '</div>', ) );
			}
		} else if ( $thinkup_blog_postswitch == 'option2' ) {
			the_content();
			wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'alante' ), 'after'  => '</div>', ) );
		}
	}
}

/* ----------------------------------------------------------------------------------
	BLOG POST EXCERPT
---------------------------------------------------------------------------------- */

function thinkup_input_blogpostexcerpt() {
global $thinkup_blog_postswitch;
global $thinkup_blog_postexcerpt;

global $thinkup_blog_pageid;
$_thinkup_meta_blogpostexcerpts = get_post_meta( $thinkup_blog_pageid, '_thinkup_meta_blogpostexcerpts', true );

	if ( $thinkup_blog_postswitch == 'option1' or empty( $thinkup_blog_postswitch ) ) {

		if ( thinkup_check_isblog() or get_page_template_slug( $thinkup_blog_pageid ) == 'template-blog.php' ) {

			if ( ! is_numeric( $_thinkup_meta_blogpostexcerpts ) ) {
				if ( is_numeric( $thinkup_blog_postexcerpt ) ) {
					return $thinkup_blog_postexcerpt;
				}
			} else if ( is_numeric( $_thinkup_meta_blogpostexcerpts ) ) {
				return $_thinkup_meta_blogpostexcerpts;
			}
		}
	}

	// return default value if not triggered above
	return 55;
}
add_filter( 'excerpt_length', 'thinkup_input_blogpostexcerpt', 999 );

function thinkup_input_blogpostcount() {
global $thinkup_blog_pageid;
$_thinkup_meta_blogpostcount = get_post_meta( $thinkup_blog_pageid, '_thinkup_meta_blogpostcount', true );

	if ( empty( $_thinkup_meta_blogpostcount ) or $_thinkup_meta_blogpostcount == 'default' ) {
		return get_option('posts_per_page');
	} else {
		return $_thinkup_meta_blogpostcount;
	}
}


/* ----------------------------------------------------------------------------------
	BLOG META CONTENT & POST META CONTENT
---------------------------------------------------------------------------------- */

// Input sticky post
function thinkup_input_sticky() {
	printf( '<span class="sticky"><i class="fa fa-thumb-tack"></i><a href="%1$s" title="%2$s">' . __( 'Sticky', 'alante' ) . '</a></span>',
		esc_url( get_permalink() ),
		esc_attr( get_the_title() )
	);
}

/* Input blog date */
function thinkup_input_blogdate() {
	printf( '<span class="date"><i class="fa fa-calendar-o"></i><a href="%1$s" title="%2$s"><time datetime="%3$s">%4$s</time></a></span>',
		esc_url( get_permalink() ),
		esc_attr( get_the_title() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);
}

/* Input blog comments */
function thinkup_input_blogcomment() {

	if ( '0' != get_comments_number() ) {
		echo	'<span class="comment">';
			if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) {;
				comments_popup_link( __( '0 comments', 'alante' ), __( '1 comment', 'alante' ), __( '% comments', 'alante' ) );
			};
		echo	'</span>';
	}
}

/* Input blog categories - Style 1 */
function thinkup_input_blogcategory1() {
$categories_list = get_the_category_list( __( ', ', 'alante' ) );

	if ( $categories_list && thinkup_input_categorizedblog() ) {
		echo	'<span class="category">';
		printf( __( 'Category: %1$s', 'alante' ), $categories_list );
		echo	'</span>';
	};
}

/* Input blog categories - Style 2 */
function thinkup_input_blogcategory2() {
$categories_list = get_the_category_list( __( ', ', 'alante' ) );

	if ( $categories_list && thinkup_input_categorizedblog() ) {
		echo	'<span class="category">';
		printf( '%1$s', $categories_list );
		echo	'</span>';
	};
}


/* Input blog tags - Style 1 */
function thinkup_input_blogtag1() {
$tags_list = get_the_tag_list( '', __( ', ', 'alante' ) );

	if ( $tags_list ) {
		echo	'<span class="tags">';
		printf( __( 'Tags: %1$s', 'alante' ), $tags_list );
		echo	'</span>';
	};
}

/* Input blog tags - Style 2 */
function thinkup_input_blogtag2() {
$tags_list = get_the_tag_list( '', __( ', ', 'alante' ) );

	if ( $tags_list ) {
		echo	'<span class="tags">';
		printf( '%1$s', $tags_list );
		echo	'</span>';
	};
}

/* Input blog author */
function thinkup_input_blogauthor() {
	printf( '<span class="author"> ' . __( 'By', 'alante' ) . ' <a href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'alante' ), get_the_author() ) ),
		get_the_author()
	);
}


//----------------------------------------------------------------------------------
//	CUSTOM READ MORE BUTTON.
//----------------------------------------------------------------------------------

/* Input 'Read more' link */
function thinkup_input_readmore( $link ) {
global $post;
global $thinkup_blog_style;
global $thinkup_blog_pageid;
global $thinkup_translate_blogreadmore;

// Set variables to avoid php non-object notice error
$_thinkup_meta_blogstyle = NULL;
$class_button = NULL;

// Assign meta data variable
if ( ! empty( $thinkup_blog_pageid ) ) {
	$_thinkup_meta_blogstyle = get_post_meta( $thinkup_blog_pageid, '_thinkup_meta_blogstyle', true );
}

	// Make no changes if in admin area
	if ( is_admin() ) {
		return $link;
	}

	// Specify button class for blog style
	if ( get_page_template_slug( $thinkup_blog_pageid ) !== 'template-blog.php' ) {
		if ( empty( $thinkup_blog_style ) or $thinkup_blog_style == 'option1') {
			$class_button = '';
		} else {
			$class_button = '';
		}
	} else if ( get_page_template_slug( $thinkup_blog_pageid ) == 'template-blog.php' ) {
		if ( empty( $_thinkup_meta_blogstyle ) or $_thinkup_meta_blogstyle == 'option1' ) {
			if ( empty( $thinkup_blog_style ) or $thinkup_blog_style == 'option1' ) {
				$class_button = '';
			} else {
				$class_button = '';		
			}
		} else if ( $_thinkup_meta_blogstyle == 'option2' ) {
			$class_button = '';
		} else {
			$class_button = '';
		}
	}

	if( empty( $thinkup_translate_blogreadmore ) ) {
		$thinkup_translate_blogreadmore = __( 'Read More', 'alante');
	}

	$link = '&#8230;<p class="more-link"><a href="' . esc_url( get_permalink($post->ID) ) . '" class="' . $class_button . '"><span>' . esc_html( $thinkup_translate_blogreadmore ) . '</span><i>&#43;</i></a></p>';

	return $link;
}
add_filter( 'excerpt_more', 'thinkup_input_readmore' );
add_filter( 'the_content_more_link', 'thinkup_input_readmore' );


/* ----------------------------------------------------------------------------------
	INPUT BLOG META CONTENT
---------------------------------------------------------------------------------- */

// Add format-media class to post article for featured image, gallery and video
function thinkup_input_blogmediaclass($classes) {
global $post;
global $thinkup_blog_pageid;
global $thinkup_blog_postswitch;

	$featured_id = get_post_thumbnail_id( $post->ID );

	// Determine featured media to input
	if ( thinkup_check_isblog() or get_page_template_slug( $thinkup_blog_pageid ) == 'template-blog.php' ) {
		if ( empty( $featured_id ) or $thinkup_blog_postswitch == 'option2' ) {
			$classes[] = 'format-nomedia';	
		} else if( has_post_thumbnail() ) {
			$classes[] = 'format-media';
		}
	}
	return $classes;
}
add_action( 'post_class', 'thinkup_input_blogmediaclass');

/* Meta content (author, category, tag) */
function thinkup_input_blogmeta_1() {
global $thinkup_blog_author;
global $thinkup_blog_category;
global $thinkup_blog_tag;

global $post;
global $thinkup_blog_pageid;
$_thinkup_meta_blogauthor   = get_post_meta( $thinkup_blog_pageid, '_thinkup_meta_blogauthor', true );
$_thinkup_meta_blogcategory = get_post_meta( $thinkup_blog_pageid, '_thinkup_meta_blogcategory', true );
$_thinkup_meta_blogtags     = get_post_meta( $thinkup_blog_pageid, '_thinkup_meta_blogtags', true );

// Set variables to avoid php non-object notice error
$_thinkup_meta_blogstyle = NULL;

// Assign meta data variable
if ( ! empty( $thinkup_blog_pageid ) ) {
	$_thinkup_meta_blogstyle = get_post_meta( $thinkup_blog_pageid, '_thinkup_meta_blogstyle', true );
}

	if ( get_page_template_slug( $thinkup_blog_pageid ) !== 'template-blog.php' ) {
		if ( $thinkup_blog_author !== '1' or 
			$thinkup_blog_category !== '1' or 
			$thinkup_blog_tag !== '1') {

			echo '<div class="entry-meta">';
				if ( is_sticky() && is_home() && ! is_paged() ) { thinkup_input_sticky(); }

				if ($thinkup_blog_author !== '1')   { thinkup_input_blogauthor();    }
				if ($thinkup_blog_category !== '1') { thinkup_input_blogcategory2(); }
				if ($thinkup_blog_tag !== '1')      { thinkup_input_blogtag2();      }
			echo '</div>';
		}
	} else if ( get_page_template_slug( $thinkup_blog_pageid ) == 'template-blog.php' ) {
		if ( $_thinkup_meta_blogauthor == 'on' or 
			$_thinkup_meta_blogcategory == 'on' or 
			$_thinkup_meta_blogtags == 'on') {

			echo '<div class="entry-meta">';
				if ($_thinkup_meta_blogauthor == 'on')   { thinkup_input_blogauthor();    }
				if ($_thinkup_meta_blogcategory == 'on') { thinkup_input_blogcategory2(); }
				if ($_thinkup_meta_blogtags == 'on')     { thinkup_input_blogtag2();      }
			echo '</div>';
		}
	}
}

/* Meta content (date, comment) */
function thinkup_input_blogmeta_2() {
global $thinkup_blog_date;
global $thinkup_blog_comment;

global $post;
global $thinkup_blog_pageid;
$_thinkup_meta_blogdate     = get_post_meta( $thinkup_blog_pageid, '_thinkup_meta_blogdate', true );
$_thinkup_meta_blogcomment  = get_post_meta( $thinkup_blog_pageid, '_thinkup_meta_blogcomment', true );

// Set variables to avoid php non-object notice error
$_thinkup_meta_blogstyle = NULL;

// Assign meta data variable
if ( ! empty( $thinkup_blog_pageid ) ) {
	$_thinkup_meta_blogstyle = get_post_meta( $thinkup_blog_pageid, '_thinkup_meta_blogstyle', true );
}

	if ( get_page_template_slug( $thinkup_blog_pageid ) !== 'template-blog.php' ) {
		if ( $thinkup_blog_date !== '1' or 
			$thinkup_blog_comment !== '1') {

			echo '<div class="entry-meta">';
				if ( is_sticky() && is_home() && ! is_paged() ) { thinkup_input_sticky(); }

				if ($thinkup_blog_date !== '1')     { thinkup_input_blogdate();     }
				if ($thinkup_blog_comment !== '1')  { thinkup_input_blogcomment();  }	
			echo '</div>';
		}
	} else if ( get_page_template_slug( $thinkup_blog_pageid ) == 'template-blog.php' ) {
		if ( $_thinkup_meta_blogdate == 'on' or 
			$_thinkup_meta_blogcomment == 'on') {

			echo '<div class="entry-meta">';
				if ($_thinkup_meta_blogdate == 'on')     { thinkup_input_blogdate();     }
				if ($_thinkup_meta_blogcomment == 'on')  { thinkup_input_blogcomment();  }	
			echo '</div>';
		}
	}
}


/* ----------------------------------------------------------------------------------
	INPUT POST META CONTENT
---------------------------------------------------------------------------------- */

// Add format-media class to post article for featured image, gallery and video
function thinkup_input_postmediaclass($classes) {
global $post;
global $wp_embed;

if ( ! empty( $post->ID ) ) {
	$_thinkup_meta_featuredmedia   = get_post_meta( $post->ID, '_thinkup_meta_featuredmedia', true );
	$_thinkup_meta_featuredgallery = get_post_meta( $post->ID, '_thinkup_meta_featuredgallery', true ); 
}

	if ( is_singular( 'post' ) ) {
		if ( get_post_format() == 'image' or get_post_format() == 'gallery' or get_post_format() == 'video' ) {
			if( has_post_thumbnail() ) {
				$classes[] = 'format-media';
			}
		} else {
			$classes[] = 'format-nomedia';			
		}
	}
	return $classes;
}
add_action( 'post_class', 'thinkup_input_postmediaclass');

// Input meta data for single post
function thinkup_input_postmeta() {
global $thinkup_post_date;
global $thinkup_post_author;
global $thinkup_post_comment;
global $thinkup_post_category;
global $thinkup_post_tag;

	if ( $thinkup_post_date !== '1' or 
		$thinkup_post_author !== '1' or 
		$thinkup_post_comment !== '1' or 
		$thinkup_post_category !== '1' or 
		$thinkup_post_tag !== '1') {

		echo '<header class="entry-header entry-meta">';
			if ($thinkup_post_author !== '1')   { thinkup_input_blogauthor();    }
			if ($thinkup_post_date !== '1')     { thinkup_input_blogdate();      }
			if ($thinkup_post_comment !== '1')  { thinkup_input_blogcomment();   }	
			if ($thinkup_post_category !== '1') { thinkup_input_blogcategory1(); }
			if ($thinkup_post_tag !== '1')      { thinkup_input_blogtag1();      }
		echo '</header><!-- .entry-header -->';
	}
}


/* ----------------------------------------------------------------------------------
	SHOW AUTHOR BIO
---------------------------------------------------------------------------------- */

/* HTML for Author Bio */
function thinkup_input_postauthorbiocode() {

	echo	'<div id="author-bio">',
			'<div id="author-image" class="one_sixth">',
			'<a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '"/>' . get_avatar( get_the_author_meta( 'email' ), '90' ) . '</a>',
			'</div>',
			'<div id="author-text" class="five_sixth last">',
			'<h3>' . __( 'About the Author', 'alante' ) . '</h3>',
			wpautop( get_the_author_meta( 'description' ) ),
			'</div>',
			'</div>';
}

/* Output Author Bio */
function thinkup_input_postauthorbio() {
global $thinkup_post_authorbio;

global $post;
$_thinkup_meta_authorbio = get_post_meta( $post->ID, '_thinkup_meta_authorbio', true );

	if ( empty( $_thinkup_meta_authorbio ) or $_thinkup_meta_authorbio == 'option1' )  {
		if ( $thinkup_post_authorbio == '1' ) {
			thinkup_input_postauthorbiocode();
		}
	} else if ( $_thinkup_meta_authorbio == 'option2' ) {
		thinkup_input_postauthorbiocode();
	}
}


/* ----------------------------------------------------------------------------------
	SHOW SOCIAL SHARING
---------------------------------------------------------------------------------- */

/* HTML for Social Sharing */
function thinkup_input_sharecode() {
global $thinkup_post_sharemessage;
global $thinkup_post_sharefacebook;
global $thinkup_post_sharetwitter;
global $thinkup_post_sharegoogle;
global $thinkup_post_sharelinkedin;
global $thinkup_post_sharetumblr;
global $thinkup_post_sharepinterest;
global $thinkup_post_shareemail;

	/* Remove white spaces from title */
	$page_title = str_replace(' ', '%20', get_the_title());

	echo	'<div id="sharepost">';
		echo	'<div id="sharemessage">';
		if ( ! empty( $thinkup_post_sharemessage ) ) { 
			echo '<h3>' . esc_html( $thinkup_post_sharemessage ) . '</h3>';
		} else {
			echo '<h3>' . __( 'Spread the word. Share this post!', 'alante' ) . '</h3>'; 
		}
		echo	'</div>';
		echo	'<div id="shareicons" class="">';
		if ( $thinkup_post_sharefacebook == '1' ) {
			echo '<a class="shareicon facebook" onclick="MyWindow=window.open(&#39;//www.facebook.com/sharer.php?u=' . esc_url( get_permalink() ) . '&#38;t=' . esc_attr( $page_title ) . '&#39;,&#39;MyWindow&#39;,width=650,height=450); return false;" href="//www.facebook.com/sharer.php?u=' . esc_url( get_permalink() ) . '&#38;t=' . esc_attr( $page_title ) . '" data-tip="top" data-original-title="' . esc_attr__( 'Facebook', 'alante' ) . '"><i class="fa fa-facebook"></i></a>';
		}
		if ( $thinkup_post_sharetwitter == '1' ) {
			echo '<a class="shareicon twitter" onclick="MyWindow=window.open(&#39;//twitter.com/home?status=Check%20this%20out!%20' . esc_attr( $page_title ) . '%20at%20' . esc_url( get_permalink() ) . '&#39;,&#39;MyWindow&#39;,width=650,height=450); return false;" href="//twitter.com/home?status=Check%20this%20out!%20' . esc_attr( $page_title ) . '%20at%20' . esc_url( get_permalink() ) . '" data-tip="top" data-original-title="' . esc_attr__( 'Twitter', 'alante' ) . '"><i class="fa fa-twitter"></i></a>';
		}
		if ( $thinkup_post_sharegoogle == '1' ) {
			echo '<a class="shareicon google-plus" onclick="MyWindow=window.open(&#39;//plus.google.com/share?url=' . esc_url( get_permalink() ) . '&#39;,&#39;MyWindow&#39;,width=650,height=450); return false;" href="//plus.google.com/share?url=' . esc_url( get_permalink() ) . '" data-tip="top" data-original-title="' . esc_attr__( 'Google+', 'alante' ) . '"><i class="fa fa-google-plus"></i></a>';
		}
		if ( $thinkup_post_sharelinkedin =='1' ) {
			echo '<a class="shareicon linkedin" onclick="MyWindow=window.open(&#39;//linkedin.com/shareArticle?mini=true&url=' . esc_url( get_permalink() ) . '&summary=' . esc_attr( $page_title ) . '&source=LinkedIn&#39;,&#39;MyWindow&#39;,width=650,height=450); return false;" href="//linkedin.com/shareArticle?mini=true&url=' . esc_url( get_permalink() ) . '&summary=' . esc_attr( $page_title ) . '&source=LinkedIn" data-tip="top" data-original-title="' . esc_attr__( 'LinkedIn', 'alante' ) . '"><i class="fa fa-linkedin"></i></a>';
		}
		if ( $thinkup_post_sharetumblr == '1' ) {
			echo '<a class="shareicon tumblr" data-tip="top" data-original-title="' . esc_attr__( 'Tumblr', 'alante' ) . '" onclick="MyWindow=window.open(&#39;//www.tumblr.com/share/link?url=' . esc_url( get_permalink() ) . '&amp;name=' . esc_attr( $post->post_title ) . '&amp;description=' . esc_attr( get_the_excerpt() ) . '&#39;,&#39;MyWindow&#39;,width=650,height=450); return false;" href="//www.tumblr.com/share/link?url=' . esc_url( get_permalink() ) . '&amp;name=' . esc_attr( $post->post_title ) . '&amp;description=' . esc_attr( get_the_excerpt() ) . '"><i class="fa fa-tumblr"></i></a>';
		}
		if ( $thinkup_post_sharepinterest == '1' ) {
			echo '<a class="shareicon pinterest" data-tip="top" data-original-title="' . esc_attr__( 'Pinterest', 'alante' ) . '" onclick="MyWindow=window.open(&#39;//pinterest.com/pin/create/button/?url=' . esc_url( get_permalink() ) . '&amp;description=' . esc_attr( get_the_title() ) . '&amp;media=' . esc_url( wp_get_attachment_url( get_post_thumbnail_id($post->ID) ) ) . '&#39;,&#39;MyWindow&#39;,width=650,height=450); return false;" href="//pinterest.com/pin/create/button/?url=' . esc_url( get_permalink() ) . '&amp;description=' . esc_attr( get_the_title() ) . '&amp;media=' . esc_url( wp_get_attachment_url( get_post_thumbnail_id($post->ID) ) ) . '"><i class="fa fa-pinterest"></i></a>';
		}
		if ( $thinkup_post_shareemail == '1' ) {
			echo	'<a class="shareicon email" data-tip="top" data-original-title="' . esc_attr__( 'Email', 'alante' ) . '" onclick="MyWindow=window.open(&#39;mailto:?subject=' . esc_attr( get_the_title() ) . '&amp;body=' . esc_url( get_permalink() ) . '&#39;,&#39;MyWindow&#39;,width=650,height=450); return false;" href="mailto:?subject=' . esc_attr( get_the_title() ) . '&amp;body=' . esc_url( get_permalink() ) . '"><i class="fa fa-envelope"></i></a>';
		}
		echo	'</div>';			
	echo	'</div>';
}

/* Output Social Sharing */
function thinkup_input_share() {
global $thinkup_post_share;

global $post;
$_thinkup_meta_share = get_post_meta($post->ID, '_thinkup_meta_share', true);

	if ( empty( $_thinkup_meta_share ) or $_thinkup_meta_share == 'option1' )  {
		if ( $thinkup_post_share == '1' ) {
			thinkup_input_sharecode();
		}
	} else if ( $_thinkup_meta_share == 'option2' ) {
		thinkup_input_sharecode();
	}
}


/* ----------------------------------------------------------------------------------
	TEMPLATE FOR COMMENTS AND PINGBACKS (PREVIOUSLY IN TEMPLATE-TAGS).
---------------------------------------------------------------------------------- */

/* Display comments at bottom of post, page and project pages. */
function thinkup_input_allowcomments() {
	if ( comments_open() || '0' != get_comments_number() )
		comments_template( '/comments.php', true );
}


/* ----------------------------------------------------------------------------------
	TEMPLATE FOR COMMENTS AND PINGBACKS (PREVIOUSLY IN TEMPLATE-TAGS).
---------------------------------------------------------------------------------- */

function thinkup_input_commenttemplate( $comment, $args, $depth ) {

	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'alante'); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'alante' ), ' ' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">

			<header>
				<?php echo get_avatar( $comment, 60 ); ?>
			</header>

			<footer>
				<span class="comment-author">
					<?php printf( '%s - ', sprintf( '%s', get_comment_author_link() ) ); ?>
				</span>

				<span class="reply">
					<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
				</span>

				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em><?php _e( 'Your comment is awaiting moderation.', 'alante'); ?></em>
					<br />
				<?php endif; ?>

				<span class="comment-meta">
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><time datetime="<?php esc_attr( comment_time( 'c' ) ); ?>">
					<?php
						/* translators: 1: date, 2: time */
						printf( '%1$s', get_comment_date() ); ?>
					</time></a>
					<?php edit_comment_link( __( 'Edit', 'alante' ), ' ' );
					?>
				</span>

			<div class="comment-content"><?php comment_text(); ?></div>
			</footer>
		</article><!-- #comment-## -->

	<?php
			break;
	endswitch;
}

/* List comments in single page */
function thinkup_input_comments() {
	$args = array( 
		'callback' => 'thinkup_input_commenttemplate',
	);
	wp_list_comments( $args );
}