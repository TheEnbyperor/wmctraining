<?php
/**
 * Special pages functions.
 *
 * @package ThinkUpThemes
 */

/*
 */

/* ----------------------------------------------------------------------------------
	GOOGLE MAP SHORTCODE
---------------------------------------------------------------------------------- */

/* Used in header.php */
function thinkup_contact_map() {
global 	$thinkup_contact_map;

$output = NULL;

	if( ! empty( $thinkup_contact_map ) ) {
	
		if ( strpos( $thinkup_contact_map, '[' ) !== false and strpos( $thinkup_contact_map, ']' ) !== false ) {

			$output = do_shortcode( $thinkup_contact_map );

		} else {

			$thinkup_contact_map = str_replace( ' ', '+', $thinkup_contact_map );

			$output .= '<iframe width="1800" ';
			$output .= 'height="350" ';
			$output .= 'frameborder="0" ';
			$output .= 'scrolling="no" ';
			$output .= 'marginheight="0" ';
			$output .= 'marginwidth="0" ';
			$output .= 'src="https://maps.google.com/maps?f=q&';
			$output .= 'source=s_q&';
			$output .= 'hl=en&';                                  // Language control
			$output .= 'geocode=&';
			$output .= 'q=' . $thinkup_contact_map . '&';         // Location address
			$output .= 'ie=UTF8&';                                // Set character encoding
			$output .= 't=m&';                                    // The type of map being used
			$output .= 'z=15&';                                   // The level of zoom
			$output .= 'output=embed">';
			$output .= '</iframe>';
		}

		if ( is_page_template('template-contact.php') ) {
			echo '<div id="contact-map">' . $output . '</div>';
		}
	}
}


/* ----------------------------------------------------------------------------------
	CONTACT FORM SHORTCODE
---------------------------------------------------------------------------------- */

/* Used in function thinkup_input_contact() */
function thinkup_contact_form() {
global $thinkup_contact_form;

	echo do_shortcode( $thinkup_contact_form );
}


/* ----------------------------------------------------------------------------------
	COMPANY INFORMATION / ADDRESS DETAILS / CONTACT DETAIL
---------------------------------------------------------------------------------- */

/* Company Information - Used in function thinkup_input_contact() */
function thinkup_contact_info() {
global $thinkup_contact_info;

	echo do_shortcode( wpautop( $thinkup_contact_info ) );
}

/* Address Details - Used in function thinkup_input_contact() */
function thinkup_contact_address() {
global $thinkup_contact_line1;
global $thinkup_contact_line2;
global $thinkup_contact_city;
global $thinkup_contact_country;
global $thinkup_contact_zip;

	$output = NULL;

	if ( ! empty( $thinkup_contact_line1 ) )   { $output .= '<span class="line1">' . $thinkup_contact_line1 . '</span>'; }
	if ( ! empty( $thinkup_contact_line2 ) )   { $output .= '<span class="line2">' . $thinkup_contact_line2 . '</span>'; }
	if ( ! empty( $thinkup_contact_city ) )    { $output .= '<span class="city">' . $thinkup_contact_city . '</span>'; }
	if ( ! empty( $thinkup_contact_country ) ) { $output .= '<span class="country">' . $thinkup_contact_country . '</span>'; }
	if ( ! empty( $thinkup_contact_zip ) )     { $output .= '<span class="zip">' . $thinkup_contact_zip . '</span>'; }

	echo do_shortcode( $output ) . '<br />';
}

/* Contact Details - Used in function thinkup_input_contact() */
function thinkup_contact_details() {
global $thinkup_contact_telephone;
global $thinkup_contact_fax;
global $thinkup_contact_email;
global $thinkup_contact_website;

	$output = NULL;

	if ( ! empty( $thinkup_contact_telephone ) ) { $output .= '<span class="telephone">' . $thinkup_contact_telephone . '</span><br />'; }
	if ( ! empty( $thinkup_contact_fax ) )       { $output .= '<span class="fax">' . $thinkup_contact_fax . '</span><br />'; }
	if ( ! empty( $thinkup_contact_email ) )     { $output .= '<span class="email"><a href="mailto:' . $thinkup_contact_email . '">' . $thinkup_contact_email . '</a></span><br />'; }	
	if ( ! empty( $thinkup_contact_website ) )   { $output .= '<span class="website"><a href="' . esc_url( $thinkup_contact_website ) . '" target="_blank">' . str_replace( 'http://', '', $thinkup_contact_website ) . '</a></span>'; }

	echo do_shortcode( $output );
}


/* ----------------------------------------------------------------------------------
	OUTPUT CONTACT PAGE
---------------------------------------------------------------------------------- */

function thinkup_input_contact() {

	echo do_shortcode( '<div class="one_half"><h4>' . __( 'Contact Form', 'alante' ) . '</h4>' ),
	     thinkup_contact_form(),
	     do_shortcode( '</div>' );

	echo do_shortcode( '<div class="one_half last"><h4>' . __( 'Company Information', 'alante' ) . '</h4>' ),
	     thinkup_contact_info(),
	     do_shortcode( '[margin size="20"]<h4>' . __( 'Contact Address', 'alante' ) . '</h4>' ),
	     thinkup_contact_address(),
	     thinkup_contact_details(),
	     do_shortcode( '</div>' );

	echo '<div style="clear: both;"></div>';
}