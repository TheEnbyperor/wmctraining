<?php
$number               = NULL;
$suffix               = NULL;
$title                = NULL;
$delay                = NULL;
$color_custom         = NULL;
$color_number         = NULL;
$color_text           = NULL;
$color_bg             = NULL;
$color_bg_transparent = NULL;
$color_border         = NULL;

$number               = $atts['number'];
$suffix               = $atts['suffix'];
$title                = $atts['title'];
$delay                = $atts['delay'];
$color_custom         = $atts['color_custom'];
$color_number         = $atts['color_number'];
$color_text           = $atts['color_text'];
$color_bg             = $atts['color_bg'];
$color_bg_transparent = $atts['color_bg_transparent'];
$color_border         = $atts['color_border'];

if ( empty( $number ) ) { 
	$number = '50'; 
}

if ( ! empty ( $title ) ) {	
	$title = '<h5 class="sc-knob-title">' . $title . '</h5>';
}

if ( empty( $delay ) ) { 
	$delay = '0'; 
}

echo '<div id="' . $instanceID . '" class="sc-knob sc-counter" >',
	 '<input class="sc-knob-dial" data-delay="' . $delay . '" type="text" value="0" data-value="' . $number . '" data-max="' . $number . '" data-suffix="' . $suffix . '">',
	 $title,
	 '</div>';

//====================================================================
// Output custom styling if set
//====================================================================

if ( $color_custom == 'on' ) {
	echo '<style>';

	if( ! empty( $color_number ) ) {
		echo '#' . $instanceID . '.sc-knob .sc-knob-dial { color: ' . $color_number . ' !important; }';
		echo '#' . $instanceID . '.sc-knob.sc-counter > h5:before { background: ' . $color_number . ' !important; }';
	}
	if( ! empty( $color_text ) ) {
		echo '#' . $instanceID . '.sc-knob .sc-knob-title { color: ' . $color_text . ' !important; }';
	}
	if( ! empty( $color_bg ) ) {
		echo '#' . $instanceID . '.sc-knob { background: ' . $color_bg . ' !important; }';
	}
	if( $color_bg_transparent == 'on' ) {
		echo '#' . $instanceID . '.sc-knob { background: none !important; }';
	}
	if( ! empty( $color_border ) ) {
		echo '#' . $instanceID . '.sc-knob { border-color: ' . $color_border . ' !important; }';
	}

	echo '</style>';
}

?>