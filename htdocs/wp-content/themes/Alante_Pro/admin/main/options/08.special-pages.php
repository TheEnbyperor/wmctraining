<?php
/**
 * Special pages functions.
 *
 * @package ThinkUpThemes
 */

/* ----------------------------------------------------------------------------------
	404 - CUSTOM CONTENT
---------------------------------------------------------------------------------- */

function thinkup_input_404content() {
global $thinkup_404_content;
global $thinkup_404_contentparagraph;

	if ( ! empty( $thinkup_404_content ) ) {
		if ( $thinkup_404_contentparagraph !== '1' ) {

			$thinkup_404_content = str_replace("\r\n","\n",$thinkup_404_content);

			$paragraphs = preg_split("/[\n]{2,}/",$thinkup_404_content);
			foreach ( $paragraphs as $key => $p ) {
				$paragraphs[ $key ] = "<p>".str_replace( "\n","<br />",$paragraphs[ $key ] )."</p>";
			}
			$thinkup_404_content = implode( "", $paragraphs );
			echo 	'<div class="entry-content">',
					do_shortcode( shortcode_unautop( $thinkup_404_content ) ),
					'</div>';
		}
			else if ( $thinkup_404_contentparagraph == '1' ) {
			echo 	'<div class="entry-content">',
					do_shortcode( shortcode_unautop( $thinkup_404_content ) ),
					'</div>';
		}
	} else {
		echo	'<div class="entry-content title-404">',
			'<h2>' . __( 'Error 404!', 'alante' ) . '</h2>',
			'<p>' . __( 'Sorry, we could not find the page you are looking for.', 'alante' ) . '<br/>' . __( 'Please try using the search function.', 'alante' ) . '</p>',
			get_search_form(),
			'</div>';
	}
}