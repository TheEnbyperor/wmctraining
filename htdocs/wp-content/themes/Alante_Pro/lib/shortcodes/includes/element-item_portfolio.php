<?php
$id            = NULL;
$title         = NULL;
$tags          = NULL;
$style         = NULL;
$size          = NULL;
$link_icon     = NULL;
$lightbox_icon = NULL;

$link_input     = NULL;
$lightbox_input = NULL;
$overlay_class  = NULL;
$overlay_input  = NULL;

$id            = $atts['id'];
$title         = $atts['title'];
$tags          = $atts['tags'];
$style         = $atts['style'];
$size          = $atts['size'];
$link_icon     = $atts['link_icon'];
$lightbox_icon = $atts['lightbox_icon'];

if ( empty( $size ) ) $size = 'full';

$post_id = get_post_thumbnail_id( $id );
$post_img = wp_get_attachment_image_src($post_id, $size, true);
$post_img_full = wp_get_attachment_image_src($post_id, 'full', true);

	// Set link icon variable if user wants it to show
	if ( $link_icon !== 'off' ) {
		$link_input = '<a class="hover-link" href="'. get_permalink( $id ) . '"></a>';
	}

	// Set lightbox icon variable if user wants it to show
	if ( $lightbox_icon !== 'off' ) {
		$lightbox_input = '<a class="hover-zoom prettyPhoto" href="'. $post_img_full[0] . '"></a>';
	}

	// Determine which if single link animation should be shown
	if ( $link_icon == 'off' or $lightbox_icon == 'off' ) {
		$overlay_class = ' style2';
	}

	if ( $link_icon !== 'off' or $lightbox_icon !== 'off' ) {
		$overlay_input .= '<div class="image-overlay' . $overlay_class . '">';
		$overlay_input .= '<div class="image-overlay-inner">';
		$overlay_input .= '<div class="hover-icons">';
		$overlay_input .= $lightbox_input;
		$overlay_input .= $link_input;
		$overlay_input .= '</div>';
		$overlay_input .= '</div>';
		$overlay_input .= '</div>';
	}

		echo '<div class="sc-carousel carousel-portfolio sc-postitem">';

		if( $style == 'style2' ) echo '<div class="port-style2">';

		echo '<div class="entry-header">',
			 '<a href="' . get_permalink( $id ) . '" ><img src="' . $post_img[0] . '" alt="' . get_the_title( $id ) . '" /></a>',
			 $overlay_input,
			 '</div>';

		if ( $title == 'on' or $tags == 'on' ) {
		echo '<div class="port-details">';
		
		if ( $title == 'on' ) {
			echo '<div class="entry-content">',			 
			'<h4><a href="' . get_permalink( $id ) . '" >' . get_the_title( $id ) . '</a></h4>',
			'</div>';
		}

		if ( $tags == 'on' ) {
			echo '<div class="entry-footer">';

				$terms = get_the_terms( $id, 'tagportfolio' );
				if ( $terms && ! is_wp_error( $terms ) ) : 
					$links = array();
					foreach ( $terms as $term ) { $links[] = $term->name; }
					$tax = join( " ", $links );		
				else :	
					$tax = '';	
				endif;

				if ( empty( $tax ) ) {
					echo '<p class="port-tags">.</p>';
				} else {
					echo '<p class="port-tags">' . $tax . '</p>';
				}

				$comment_count = (int) get_comments_number( $id );
				 
				echo '<span class="comment"><i class="fa fa-comments"></i>',
					 '<a href="' . get_comments_link( $id ) . '">' . $comment_count .'</a>',
					 '</span>';

			echo '</div>';
		}

		echo '</div>';
		}

		if( $style == 'style2' ) echo '</div>';

		echo '</div>';

?>