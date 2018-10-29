<?php
/**
 * Theme Sanitize functions
 */

function publisho_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}
function publisho_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return '';
    }
}
function publisho_sanitize_dropdown( $input, $setting ) {
	// Ensure input is a slug.
	$input = sanitize_key( $input );
	// Get list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;
	// If the input is a valid key, return it; otherwise, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}
?>