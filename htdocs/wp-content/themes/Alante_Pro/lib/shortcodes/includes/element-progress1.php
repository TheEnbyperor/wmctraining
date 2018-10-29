<?php
$style    = NULL;
$title    = NULL;
$progress = NULL;
$show     = NULL;
$animate  = NULL;
$delay    = NULL;

$style    = $atts['style'];
$title    = $atts['title'];
$progress = $atts['progress'];
$show     = $atts['show'];
$animate  = $atts['animate'];
$delay    = $atts['delay'];


if ( $style == 'info' ) {
	$style = ' bar-info';
} else if ($style == 'success' ) {
	$style = ' bar-success';
} else if ($style == 'warning' ) {
	$style = ' bar-warning';
} else if ($style == 'danger' ) {
	$style = ' bar-danger';
} else {
	$style = '';
}

if ( ! empty ( $title ) ) {	
	$title = '<h5 class="bar-title">' . $title . '</h5>';
}

if ( empty( $progress ) ) { 
	$progress = '50'; 
}

if ( $animate == "on" ) {
	if ( empty( $delay ) ) { 
		$delay = '0'; 
	}
	$progress_start = '0';
} else {
	$delay          = '0'; 
	$progress_start = $progress;
}

if ( $show == "on" ) {
	$show = '<span class="bar-per">' . $progress . '%</span>';
} else {
	$show = '';
}

echo '<div class="sc-progress">',
	 $title,
	 '<div class="progress progress-basic">',
	 '<div class="bar' . $style . '" data-width="' . $progress . '" data-delay="' . $delay . '" style="width: ' . $progress_start . '%">' . $show . '</div>',
	 '</div>',
	 '</div>';

?>