<?php

// Include all Think Up Themes custom widgets
function thinkup_pagebuilder_loadwidgets() {

	$currentscreen = NULL;

	if( isset( $_GET['page'] ) ) {
		$currentscreen = $_GET['page'];
	}

	// Don't load widgets on Mailpoet pages
	if ( strpos( $currentscreen, 'wysija' ) !== false ) {
		// Output nothing
	} else {
		include plugin_dir_path(__FILE__).'widgets-builder/animation/animation.php';
		include plugin_dir_path(__FILE__).'widgets-builder/button/button.php';
		include plugin_dir_path(__FILE__).'widgets-builder/carousel_blog/carousel_blog.php';
		include plugin_dir_path(__FILE__).'widgets-builder/carousel_portfolio/carousel_portfolio.php';
		include plugin_dir_path(__FILE__).'widgets-builder/divider/divider.php';
		include plugin_dir_path(__FILE__).'widgets-builder/featured/featured.php';
		include plugin_dir_path(__FILE__).'widgets-builder/gmaps/gmaps.php';
		include plugin_dir_path(__FILE__).'widgets-builder/heading/heading.php';
		include plugin_dir_path(__FILE__).'widgets-builder/icons_fontawesome/icons_fontawesome.php';
		include plugin_dir_path(__FILE__).'widgets-builder/item_portfolio/item_portfolio.php';
		include plugin_dir_path(__FILE__).'widgets-builder/image/image.php';
		include plugin_dir_path(__FILE__).'widgets-builder/notification/notification.php';
		include plugin_dir_path(__FILE__).'widgets-builder/progress/progress.php';
		include plugin_dir_path(__FILE__).'widgets-builder/seperator/seperator.php';
		include plugin_dir_path(__FILE__).'widgets-builder/texteditor/texteditor.php';
		include plugin_dir_path(__FILE__).'widgets-builder/tinymce/tinymce.php';
		include plugin_dir_path(__FILE__).'widgets-builder/twitter/twitter.php';
		include plugin_dir_path(__FILE__).'widgets-builder/video/video.php';
	}
}
add_action( 'plugins_loaded', 'thinkup_pagebuilder_loadwidgets' );

// Organise groups
function thinkup_panels_groups($groups) {

	// Remove default groups
	unset($groups['attributes']);
	unset($groups['design']);
	unset($groups['layout']);

	// Add cusom groups
	$groups['thinkup_row_attributes'] = array(
		'name' => __('Attributes', 'siteorigin-panels'),
		'priority' => 5
	);
	$groups['thinkup_row_styling'] = array(
		'name' => __('Custom Styling', 'siteorigin-panels'),
		'priority' => 10
	);
	$groups['thinkup_row_layout'] = array(
		'name' => __('Layout', 'siteorigin-panels'),
		'priority' => 15
	);

	return $groups;
}
add_filter('siteorigin_panels_row_style_groups','thinkup_panels_groups');
add_filter('siteorigin_panels_widget_style_groups','thinkup_panels_groups');

// Organise settings within groups
function thinkup_panels_widget_settings_fields_input($fields) {
	
	// Array with "Default" and values between 1-100.
	$count_0_10 = array();
	foreach ( range( 0, 10 ) as $k ) {
		$count_0_10[$k] = $k;
	};
	$count_0_10 = array( '' => 'Default' ) + $count_0_10;

	// Array with "Default" and values between 1-100.
	$count_0_100 = array();
	foreach ( range( 0, 100 ) as $k ) {
		$count_0_100[$k] = $k;
	};
	$count_0_100 = array( '' => 'Default' ) + $count_0_100;

	// ------------------------------------------------
	// GROUP - ATTRIBUTES
	// ------------------------------------------------
	
	$fields['thinkup_widget_GridClass'] = array(
		'name' => __('Widget Class', 'siteorigin-panels'),
		'type' => 'text',
		'group' => 'thinkup_row_attributes',
		'description' => __('A CSS class', 'siteorigin-panels'),
		'priority' => 101,
	);

	$fields['thinkup_widget_Css'] = array(
		'name' => __('CSS Styles', 'siteorigin-panels'),
		'type' => 'code',
		'group' => 'thinkup_row_attributes',
		'description' => __('CSS Styles, given as one per row.', 'siteorigin-panels'),
		'priority' => 102,
	);

	// ------------------------------------------------
	// GROUP - CUSTOM STYLING
	// ------------------------------------------------

	// Background Color - Heading
	$fields['thinkup_heading_rowBackgroundColor'] = array(
		'name'        => __('Custom Background Color', 'siteorigin-panels'),
		'type'        => 'text',
		'group'       => 'thinkup_row_styling',
		'description' => __('', 'siteorigin-panels'),
		'priority'    => 201,
	);

	// Background Color
	$fields['thinkup_widget_styleColor'] = array(
		'name'        => __('Choose Color', 'siteorigin-panels'),
		'type'        => 'color',
		'group'       => 'thinkup_row_styling',
		'description' => __('', 'siteorigin-panels'),
		'priority'    => 202,
	);

	// Background Color - Clear
	$fields['thinkup_widget_styleColorClear'] = array(
		'name'        => __('Clear Color', 'siteorigin-panels'),
		'label'       => __('Default', 'siteorigin-panels'),
		'type'        => 'checkbox',
		'group'       => 'thinkup_row_styling',
		'description' => __('', 'siteorigin-panels'),
		'priority'    => 203,
	);

	// Background Image - Heading
	$fields['thinkup_heading_rowBackgroundImage'] = array(
		'name'        => __('Custom Background Image', 'siteorigin-panels'),
		'type'        => 'text',
		'group'       => 'thinkup_row_styling',
		'description' => __('', 'siteorigin-panels'),
		'priority'    => 204,
	);

	// Background Image
	$fields['thinkup_widget_styleImage'] = array(
		'name'        => __('Choose Image', 'siteorigin-panels'),
		'type'        => 'image',
		'group'       => 'thinkup_row_styling',
		'description' => __('', 'siteorigin-panels'),
		'priority'    => 205,
	);

	// Background Position
	$fields['thinkup_widget_stylePosition'] = array(
		'name'        => __('Position', 'siteorigin-panels'),
		'type'        => 'select',
		'options' => array(
			'left top'      => __('left top', 'siteorigin-panels'),
			'left center'   => __('left center', 'siteorigin-panels'),
			'left bottom'   => __('left bottom', 'siteorigin-panels'),
			'right top'     => __('right top', 'siteorigin-panels'),
			'right center'  => __('right center', 'siteorigin-panels'),
			'right bottom'  => __('right bottom', 'siteorigin-panels'),
			'center top'    => __('center top', 'siteorigin-panels'),
			'center center' => __('center center', 'siteorigin-panels'),
			'center bottom' => __('center bottom', 'siteorigin-panels'),
		),
		'group'       => 'thinkup_row_styling',
		'description' => __('', 'siteorigin-panels'),
		'priority'    => 206,
	);

	// Background Repeat
	$fields['thinkup_widget_styleRepeat'] = array(
		'name'        => __('Repeat', 'siteorigin-panels'),
		'type'        => 'select',
		'options' => array(
			'repeat'    => __('repeat', 'siteorigin-panels'),
			'repeat-x'  => __('repeat-x', 'siteorigin-panels'),
			'repeat-y'  => __('repeat-y', 'siteorigin-panels'),
			'no-repeat' => __('no-repeat', 'siteorigin-panels'),
		),
		'group'       => 'thinkup_row_styling',
		'description' => __('', 'siteorigin-panels'),
		'priority'    => 207,
	);

	// Background Size
	$fields['thinkup_widget_styleSize'] = array(
		'name'        => __('Size', 'siteorigin-panels'),
		'type'        => 'select',
		'options' => array(
			'auto'    => __('auto', 'siteorigin-panels'),
			'cover'   => __('cover', 'siteorigin-panels'),
			'contain' => __('contain', 'siteorigin-panels'),
		),
		'group'       => 'thinkup_row_styling',
		'description' => __('', 'siteorigin-panels'),
		'priority'    => 208,
	);

	// Background Attachment
	$fields['thinkup_widget_styleAttachment'] = array(
		'name'        => __('Attachment', 'siteorigin-panels'),
		'type'        => 'select',
		'options' => array(
			'scroll' => __('scroll', 'siteorigin-panels'),
			'fixed'  => __('fixed', 'siteorigin-panels'),
		),
		'group'       => 'thinkup_row_styling',
		'description' => __('', 'siteorigin-panels'),
		'priority'    => 209,
	);

	// Border - Heading
	$fields['thinkup_heading_rowBorder'] = array(
		'name'        => __('Custom Border', 'siteorigin-panels'),
		'type'        => 'text',
		'group'       => 'thinkup_row_styling',
		'description' => __('', 'siteorigin-panels'),
		'priority'    => 210,
	);

	// Border Top (px)
	$fields['thinkup_widget_styleBorderSize'] = array(
		'name'        => __('Border Top (px)', 'siteorigin-panels'),
		'type'        => 'select',
		'options'     => $count_0_10,
		'group'       => 'thinkup_row_styling',
		'description' => __('', 'siteorigin-panels'),
		'priority'    => 211,
	);

	// Border Top (style)
	$fields['thinkup_widget_styleBorderStyle'] = array(
		'name'        => __('Border Top (style)', 'siteorigin-panels'),
		'type'        => 'select',
		'options' => array(
			'solid'  => __('solid', 'siteorigin-panels'),
			'dashed' => __('dashed', 'siteorigin-panels'),
			'dotted' => __('dotted', 'siteorigin-panels'),
			'double' => __('double', 'siteorigin-panels'),
		),
		'group'       => 'thinkup_row_styling',
		'description' => __('', 'siteorigin-panels'),
		'priority'    => 212,
	);

	// Border Top (color)
	$fields['thinkup_widget_styleBorderColor'] = array(
		'name'        => __('Border Top (color)', 'siteorigin-panels'),
		'type'        => 'color',
		'group'       => 'thinkup_row_styling',
		'description' => __('', 'siteorigin-panels'),
		'priority'    => 213,
	);

	// Border Top (color) - Clear
	$fields['thinkup_widget_styleBorderColorClear'] = array(
		'name'        => __('Clear Color', 'siteorigin-panels'),
		'label'       => __('Default', 'siteorigin-panels'),
		'type'        => 'checkbox',
		'group'       => 'thinkup_row_styling',
		'description' => __('', 'siteorigin-panels'),
		'priority'    => 214,
	);

	// Border Radius
	$fields['thinkup_widget_styleBorderRadius'] = array(
		'name'        => __('Border Radius (px)', 'siteorigin-panels'),
		'type'        => 'select',
		'options'     => $count_0_10,
		'group'       => 'thinkup_row_styling',
		'description' => __('', 'siteorigin-panels'),
		'priority'    => 215,
	);

	// ------------------------------------------------
	// GROUP - LAYOUT
	// ------------------------------------------------

	// Text Alignment - Heading
	$fields['thinkup_heading_rowTextAlignment'] = array(
		'name'        => __('Text Alignment', 'siteorigin-panels'),
		'type'        => 'text',
		'group'       => 'thinkup_row_layout',
		'description' => __('', 'siteorigin-panels'),
		'priority'    => 301,
	);

	// Text Alignment
  	$fields['thinkup_widget_styleFontAlign'] = array(
		'name'        => __('Align Text Content', 'siteorigin-panels'),
		'type'        => 'select',
		'options' => array(
			'inherit' => __('Default', 'siteorigin-panels'),
			'center'  => __('Center', 'siteorigin-panels'),
			'left'    => __('Left', 'siteorigin-panels'),
			'right'   => __('Right', 'siteorigin-panels'),
		),
		'group'       => 'thinkup_row_layout',
		'description' => __('', 'siteorigin-panels'),
		'priority'    => 302,
	);

	// Custom Padding - Heading
	$fields['thinkup_heading_rowStylingPadding'] = array(
		'name'        => __('Custom Padding', 'siteorigin-panels'),
		'type'        => 'text',
		'group'       => 'thinkup_row_layout',
		'description' => __('', 'siteorigin-panels'),
		'priority'    => 303,
	);

	// Padding Top (px)
  	$fields['thinkup_widget_stylePaddingTop'] = array(
		'name'        => __('Padding Top (px)', 'siteorigin-panels'),
		'type'        => 'select',
		'options'     => $count_0_100,
		'group'       => 'thinkup_row_layout',
		'description' => __('', 'siteorigin-panels'),
		'priority'    => 304,
	);

	// Padding Bottom (px)
  	$fields['thinkup_widget_stylePaddingBottom'] = array(
		'name'        => __('Padding Bottom (px)', 'siteorigin-panels'),
		'type'        => 'select',
		'options'     => $count_0_100,
		'group'       => 'thinkup_row_layout',
		'description' => __('', 'siteorigin-panels'),
		'priority'    => 305,
	);

	// Padding Left (px)
  	$fields['thinkup_widget_stylePaddingLeft'] = array(
		'name'        => __('Padding Left (px)', 'siteorigin-panels'),
		'type'        => 'select',
		'options'     => $count_0_100,
		'group'       => 'thinkup_row_layout',
		'description' => __('', 'siteorigin-panels'),
		'priority'    => 306,
	);

	// Padding Right (px)
  	$fields['thinkup_widget_stylePaddingRight'] = array(
		'name'        => __('Padding Right (px)', 'siteorigin-panels'),
		'type'        => 'select',
		'options'     => $count_0_100,
		'group'       => 'thinkup_row_layout',
		'description' => __('', 'siteorigin-panels'),
		'priority'    => 307,
	);

	// Custom Padding - Heading
	$fields['thinkup_heading_rowStylingMargin'] = array(
		'name'        => __('Custom Margin', 'siteorigin-panels'),
		'type'        => 'text',
		'group'       => 'thinkup_row_layout',
		'description' => __('', 'siteorigin-panels'),
		'priority'    => 308,
	);

	// Row Margin Top (px)
  	$fields['thinkup_widget_styleMarginTop'] = array(
		'name'        => __('Margin Top (px)', 'siteorigin-panels'),
		'type'        => 'select',
		'options'     => $count_0_100,
		'group'       => 'thinkup_row_layout',
		'description' => __('', 'siteorigin-panels'),
		'priority'    => 309,
	);

	// Row Margin Bottom (px)
  	$fields['thinkup_widget_styleMarginBottom'] = array(
		'name'        => __('Margin Bottom (px)', 'siteorigin-panels'),
		'type'        => 'select',
		'options'     => $count_0_100,
		'group'       => 'thinkup_row_layout',
		'description' => __('', 'siteorigin-panels'),
		'priority'    => 310,
	);

	// Row Margin Left (px)
  	$fields['thinkup_widget_styleMarginLeft'] = array(
		'name'        => __('Margin Left (px)', 'siteorigin-panels'),
		'type'        => 'select',
		'options'     => $count_0_100,
		'group'       => 'thinkup_row_layout',
		'description' => __('', 'siteorigin-panels'),
		'priority'    => 311,
	);

	// Row Margin Right (px)
  	$fields['thinkup_widget_styleMarginRight'] = array(
		'name'        => __('Margin Right (px)', 'siteorigin-panels'),
		'type'        => 'select',
		'options'     => $count_0_100,
		'group'       => 'thinkup_row_layout',
		'description' => __('', 'siteorigin-panels'),
		'priority'    => 312,
	);

  return $fields;
}
add_filter( 'siteorigin_panels_widget_style_fields', 'thinkup_panels_widget_settings_fields_input', 999 );



function thinkup_panels_widget_settings_fields_output_class( $attributes, $args ) {
	
	// ------------------------------------------------
	// 	1.	TIDY ATTRIBUTE ARRAYS
	// ------------------------------------------------
	
	// Reset attributes to be an array if empty - removed SiteOrigin attribute inputs
	if( !is_array($attributes['class']) ) $attributes['class'] = array();
	if( !is_array($attributes['style']) ) $attributes['style'] = array();

	//Remove all default [object object] classes from $attributes['class']
	foreach ($attributes['class'] as $key => $value) {
		if ( strpos( $value, '[' ) !== false or strpos( $value, ']' ) !== false ) {
			unset($attributes['class'][$key]);
		}
	}
	
	// Set default class for widget
	array_push($attributes['class'], 'panel-widget-style');

	// ------------------------------------------------
	// 	1.	RESET SETTING VALUES
	// ------------------------------------------------

	// Reset attribute values
	if( ! isset( $args['thinkup_widget_GridClass'] ) ) { $args['thinkup_widget_GridClass'] = NULL; }
	if( ! isset( $args['thinkup_widget_Css'] ) )       { $args['thinkup_widget_Css']       = NULL; }

	// Get custom styling values
	if( ! isset( $args['thinkup_widget_styleColor'] ) )            { $args['thinkup_widget_styleColor']            = NULL; }
	if( ! isset( $args['thinkup_widget_styleColorClear'] ) )       { $args['thinkup_widget_styleColorClear']       = NULL; }
	if( ! isset( $args['thinkup_widget_styleImage'] ) )            { $args['thinkup_widget_styleImage']            = NULL; }
	if( ! isset( $args['thinkup_widget_stylePosition'] ) )         { $args['thinkup_widget_stylePosition']         = NULL; }
	if( ! isset( $args['thinkup_widget_styleRepeat'] ) )           { $args['thinkup_widget_styleRepeat']           = NULL; }
	if( ! isset( $args['thinkup_widget_styleSize'] ) )             { $args['thinkup_widget_styleSize']             = NULL; }
	if( ! isset( $args['thinkup_widget_styleAttachment'] ) )       { $args['thinkup_widget_styleAttachment']       = NULL; }
	if( ! isset( $args['thinkup_widget_styleBorderSize'] ) )       { $args['thinkup_widget_styleBorderSize']       = NULL; }
	if( ! isset( $args['thinkup_widget_styleBorderStyle'] ) )      { $args['thinkup_widget_styleBorderStyle']      = NULL; }
	if( ! isset( $args['thinkup_widget_styleBorderColor'] ) )      { $args['thinkup_widget_styleBorderColor']      = NULL; }
	if( ! isset( $args['thinkup_widget_styleBorderColorClear'] ) ) { $args['thinkup_widget_styleBorderColorClear'] = NULL; }
	if( ! isset( $args['thinkup_widget_styleBorderRadius'] ) )     { $args['thinkup_widget_styleBorderRadius']     = NULL; }

	// Get layout values
	if( ! isset( $args['thinkup_widget_styleFontAlign'] ) )     { $args['thinkup_widget_styleFontAlign']     = NULL; }
	if( ! isset( $args['thinkup_widget_stylePaddingTop'] ) )    { $args['thinkup_widget_stylePaddingTop']    = NULL; }
	if( ! isset( $args['thinkup_widget_stylePaddingBottom'] ) ) { $args['thinkup_widget_stylePaddingBottom'] = NULL; }
	if( ! isset( $args['thinkup_widget_stylePaddingLeft'] ) )   { $args['thinkup_widget_stylePaddingLeft']   = NULL; }
	if( ! isset( $args['thinkup_widget_stylePaddingRight'] ) )  { $args['thinkup_widget_stylePaddingRight']  = NULL; }
	if( ! isset( $args['thinkup_widget_styleMarginTop'] ) )     { $args['thinkup_widget_styleMarginTop']     = NULL; }
	if( ! isset( $args['thinkup_widget_styleMarginBottom'] ) )  { $args['thinkup_widget_styleMarginBottom']  = NULL; }
	if( ! isset( $args['thinkup_widget_styleMarginLeft'] ) )    { $args['thinkup_widget_styleMarginLeft']    = NULL; }
	if( ! isset( $args['thinkup_widget_styleMarginRight'] ) )   { $args['thinkup_widget_styleMarginRight']   = NULL; }

	// ------------------------------------------------
	// 	2.	GET WIDGET FIELD SETTINGS
	// ------------------------------------------------

	// Get attribute values
	$thinkup_widget_GridClass             = $args['thinkup_widget_GridClass'];
	$thinkup_widget_Css                   = $args['thinkup_widget_Css'];

	// Get custom styling values
	$thinkup_widget_styleColor            = $args['thinkup_widget_styleColor'];
	$thinkup_widget_styleColorClear       = $args['thinkup_widget_styleColorClear'];
	$thinkup_widget_styleImage            = $args['thinkup_widget_styleImage'];
	$thinkup_widget_stylePosition         = $args['thinkup_widget_stylePosition'];
	$thinkup_widget_styleRepeat           = $args['thinkup_widget_styleRepeat'];
	$thinkup_widget_styleSize             = $args['thinkup_widget_styleSize'];
	$thinkup_widget_styleAttachment       = $args['thinkup_widget_styleAttachment'];
	$thinkup_widget_styleBorderSize       = $args['thinkup_widget_styleBorderSize'];
	$thinkup_widget_styleBorderStyle      = $args['thinkup_widget_styleBorderStyle'];
	$thinkup_widget_styleBorderColor      = $args['thinkup_widget_styleBorderColor'];
	$thinkup_widget_styleBorderColorClear = $args['thinkup_widget_styleBorderColorClear'];
	$thinkup_widget_styleBorderRadius     = $args['thinkup_widget_styleBorderRadius'];

	// Get layout values
	$thinkup_widget_styleFontAlign        = $args['thinkup_widget_styleFontAlign'];
	$thinkup_widget_stylePaddingTop       = $args['thinkup_widget_stylePaddingTop'];
	$thinkup_widget_stylePaddingBottom    = $args['thinkup_widget_stylePaddingBottom'];
	$thinkup_widget_stylePaddingLeft      = $args['thinkup_widget_stylePaddingLeft'];
	$thinkup_widget_stylePaddingRight     = $args['thinkup_widget_stylePaddingRight'];
	$thinkup_widget_styleMarginTop        = $args['thinkup_widget_styleMarginTop'];
	$thinkup_widget_styleMarginBottom     = $args['thinkup_widget_styleMarginBottom'];
	$thinkup_widget_styleMarginLeft       = $args['thinkup_widget_styleMarginLeft'];
	$thinkup_widget_styleMarginRight      = $args['thinkup_widget_styleMarginRight'];

	// ------------------------------------------------
	// 	2.	OUTPUT USER WIDGET CLASS SETTINGS
	// ------------------------------------------------

	// Output attribute values
    if( !empty( $thinkup_widget_GridClass ) ) {

		$thinkup_widget_GridClass = explode( ' ', $args['thinkup_widget_GridClass'] );

		foreach ( $thinkup_widget_GridClass as $key => $value ) {
			array_push($attributes['class'], $value);
		}
    }
	if ( ! empty( $thinkup_widget_Css ) ) {
		array_push($attributes['style'], $thinkup_widget_Css);
	}

	// Custom Background Color
	if ( ! empty( $thinkup_widget_styleColor ) and $thinkup_widget_styleColorClear != '1' and empty( $thinkup_widget_styleImage) ) {
		array_push($attributes['style'], 'background:' . $thinkup_widget_styleColor . ';');
	}

	// Custom Background Image
	if ( ! empty( $thinkup_widget_styleImage ) ) {
		array_push($attributes['style'], 'background: url("' . $thinkup_widget_styleImage . '") !important;');
		array_push($attributes['style'], 'background-position: ' . $thinkup_widget_stylePosition . ' !important;');
		array_push($attributes['style'], 'background-repeat: ' . $thinkup_widget_styleRepeat . ' !important;');
		array_push($attributes['style'], 'background-size: ' . $thinkup_widget_styleSize . ' !important;');
		array_push($attributes['style'], 'background-attachment: ' . $thinkup_widget_styleAttachment . ' !important;');
	}

	// Custom Border
	if ( ! empty( $thinkup_widget_styleBorderSize ) and $thinkup_widget_styleBorderColorClear != '1' ) {
		array_push($attributes['style'], 'border-width: ' . $thinkup_widget_styleBorderSize . 'px !important;');
		array_push($attributes['style'], 'border-style: ' . $thinkup_widget_styleBorderStyle . ' !important;');
		array_push($attributes['style'], 'border-color: ' . $thinkup_widget_styleBorderColor . ' !important;');
	}

	// Custom Border Radius
	if ( ! empty( $thinkup_widget_styleBorderRadius ) ) {
		array_push($attributes['style'], '-webkit-border-radius: ' . $thinkup_widget_styleBorderRadius . 'px;');
		array_push($attributes['style'], '-moz-border-radius: ' . $thinkup_widget_styleBorderRadius . 'px;');
		array_push($attributes['style'], '-ms-border-radius: ' . $thinkup_widget_styleBorderRadius . 'px;');
		array_push($attributes['style'], '-o-border-radius: ' . $thinkup_widget_styleBorderRadius . 'px;');
		array_push($attributes['style'], 'border-radius: ' . $thinkup_widget_styleBorderRadius . 'px;');
	}

	// Custom Font Alignment
	if ( ! empty( $thinkup_widget_styleFontAlign ) and $thinkup_widget_styleFontAlign !== 'inherit' ) {
		array_push($attributes['style'], 'text-align: ' . $thinkup_widget_styleFontAlign . ' !important;');
	}

	// Custom Padding - Top
	if ( is_numeric( $thinkup_widget_stylePaddingTop ) ) {
		array_push($attributes['style'], 'padding-top: ' . $thinkup_widget_stylePaddingTop . 'px !important;');
	}

	// Custom Padding - Bottom
	if ( is_numeric( $thinkup_widget_stylePaddingBottom ) ) {
		array_push($attributes['style'], 'padding-bottom: ' . $thinkup_widget_stylePaddingBottom . 'px !important;');
	}

	// Custom Padding - Left
	if ( is_numeric( $thinkup_widget_stylePaddingLeft ) ) {
		array_push($attributes['style'], 'padding-left: ' . $thinkup_widget_stylePaddingLeft . 'px !important;');
	}

	// Custom Padding - Right
	if ( is_numeric( $thinkup_widget_stylePaddingRight ) ) {
		array_push($attributes['style'], 'padding-right: ' . $thinkup_widget_stylePaddingRight . 'px !important;');
	}

	// Custom Margin - Top
	if ( is_numeric( $thinkup_widget_styleMarginTop ) ) {
		array_push($attributes['style'], 'margin-top: ' . $thinkup_widget_styleMarginTop . 'px !important;');
	}

	// Custom Margin - Bottom
	if ( is_numeric( $thinkup_widget_styleMarginBottom ) ) {
		array_push($attributes['style'], 'margin-bottom: ' . $thinkup_widget_styleMarginBottom . 'px !important;');
	}

	// Custom Margin - Left
	if ( is_numeric( $thinkup_widget_styleMarginLeft ) ) {
		array_push($attributes['style'], 'margin-left: ' . $thinkup_widget_styleMarginLeft . 'px !important;');
	}

	// Custom Margin - Right
	if ( is_numeric( $thinkup_widget_styleMarginRight ) ) {
		array_push($attributes['style'], 'margin-right: ' . $thinkup_widget_styleMarginRight . 'px !important;');
	}

    return $attributes;
}
function thinkup_panels_widget_settings_fields_output_inline() {
	add_filter('siteorigin_panels_widget_style_attributes', 'thinkup_panels_widget_settings_fields_output_class', 1, 2);
}
add_action('plugins_loaded', 'thinkup_panels_widget_settings_fields_output_inline');


// Organise settings within groups
function thinkup_panels_row_settings_fields_input($fields) {
	
	// Array with "Default" and values between 1-100.
	$count_0_10 = array();
	foreach ( range( 0, 10 ) as $k ) {
		$count_0_10[$k] = $k;
	};
	$count_0_10 = array( '' => 'Default' ) + $count_0_10;

	// Array with "Default" and values between 1-100.
	$count_0_100 = array();
	foreach ( range( 0, 100 ) as $k ) {
		$count_0_100[$k] = $k;
	};
	$count_0_100 = array( '' => 'Default' ) + $count_0_100;


	// ------------------------------------------------
	// GROUP - ATTRIBUTES
	// ------------------------------------------------
	
	$fields['thinkup_rowGridClass'] = array(
		'name' => __('Row Class', 'siteorigin-panels'),
		'type' => 'text',
		'group' => 'thinkup_row_attributes',
		'description' => __('A CSS class', 'siteorigin-panels'),
		'priority' => 101,
	);

	$fields['thinkup_rowCellClass'] = array(
		'name' => __('Cell Class', 'siteorigin-panels'),
		'type' => 'text',
		'group' => 'thinkup_row_attributes',
		'description' => __('Class added to all cells in this row.', 'siteorigin-panels'),
		'priority' => 102,
	);

	$fields['thinkup_rowCss'] = array(
		'name' => __('CSS Styles', 'siteorigin-panels'),
		'type' => 'code',
		'group' => 'thinkup_row_attributes',
		'description' => __('CSS Styles, given as one per row.', 'siteorigin-panels'),
		'priority' => 103,
	);

	// ------------------------------------------------
	// GROUP - CUSTOM STYLING
	// ------------------------------------------------


	// Background Color - Heading
	$fields['thinkup_heading_rowBackgroundColor'] = array(
		'name'        => __('Custom Background Color', 'siteorigin-panels'),
		'type'        => 'text',
		'group'       => 'thinkup_row_styling',
		'description' => __('', 'siteorigin-panels'),
		'priority'    => 201,
	);

	// Background Color
	$fields['thinkup_styleColor'] = array(
		'name'        => __('Choose Color', 'siteorigin-panels'),
		'type'        => 'color',
		'group'       => 'thinkup_row_styling',
		'description' => __('', 'siteorigin-panels'),
		'priority'    => 202,
	);

	// Background Color - Clear
	$fields['thinkup_styleColorClear'] = array(
		'name'        => __('Clear Color', 'siteorigin-panels'),
		'label'       => __('Default', 'siteorigin-panels'),
		'type'        => 'checkbox',
		'group'       => 'thinkup_row_styling',
		'description' => __('', 'siteorigin-panels'),
		'priority'    => 203,
	);

	// Background Image - Heading
	$fields['thinkup_heading_rowBackgroundImage'] = array(
		'name'        => __('Custom Background Image', 'siteorigin-panels'),
		'type'        => 'text',
		'group'       => 'thinkup_row_styling',
		'description' => __('', 'siteorigin-panels'),
		'priority'    => 204,
	);

	// Background Image
	$fields['thinkup_styleImage'] = array(
		'name'        => __('Choose Image', 'siteorigin-panels'),
		'type'        => 'image',
		'group'       => 'thinkup_row_styling',
		'description' => __('', 'siteorigin-panels'),
		'priority'    => 205,
	);

	// Background Position
	$fields['thinkup_stylePosition'] = array(
		'name'        => __('Position', 'siteorigin-panels'),
		'type'        => 'select',
		'options' => array(
			'left top'      => __('left top', 'siteorigin-panels'),
			'left center'   => __('left center', 'siteorigin-panels'),
			'left bottom'   => __('left bottom', 'siteorigin-panels'),
			'right top'     => __('right top', 'siteorigin-panels'),
			'right center'  => __('right center', 'siteorigin-panels'),
			'right bottom'  => __('right bottom', 'siteorigin-panels'),
			'center top'    => __('center top', 'siteorigin-panels'),
			'center center' => __('center center', 'siteorigin-panels'),
			'center bottom' => __('center bottom', 'siteorigin-panels'),
		),
		'group'       => 'thinkup_row_styling',
		'description' => __('', 'siteorigin-panels'),
		'priority'    => 206,
	);

	// Background Repeat
	$fields['thinkup_styleRepeat'] = array(
		'name'        => __('Repeat', 'siteorigin-panels'),
		'type'        => 'select',
		'options' => array(
			'repeat'    => __('repeat', 'siteorigin-panels'),
			'repeat-x'  => __('repeat-x', 'siteorigin-panels'),
			'repeat-y'  => __('repeat-y', 'siteorigin-panels'),
			'no-repeat' => __('no-repeat', 'siteorigin-panels'),
		),
		'group'       => 'thinkup_row_styling',
		'description' => __('', 'siteorigin-panels'),
		'priority'    => 207,
	);

	// Background Size
	$fields['thinkup_styleSize'] = array(
		'name'        => __('Size', 'siteorigin-panels'),
		'type'        => 'select',
		'options' => array(
			'auto'    => __('auto', 'siteorigin-panels'),
			'cover'   => __('cover', 'siteorigin-panels'),
			'contain' => __('contain', 'siteorigin-panels'),
		),
		'group'       => 'thinkup_row_styling',
		'description' => __('', 'siteorigin-panels'),
		'priority'    => 208,
	);

	// Background Attachment
	$fields['thinkup_styleAttachment'] = array(
		'name'        => __('Attachment', 'siteorigin-panels'),
		'type'        => 'select',
		'options' => array(
			'scroll' => __('scroll', 'siteorigin-panels'),
			'fixed'  => __('fixed', 'siteorigin-panels'),
		),
		'group'       => 'thinkup_row_styling',
		'description' => __('', 'siteorigin-panels'),
		'priority'    => 209,
	);

	// Custom Font - Heading
	$fields['thinkup_heading_rowFont'] = array(
		'name'        => __('Custom Font Color', 'siteorigin-panels'),
		'type'        => 'text',
		'group'       => 'thinkup_row_styling',
		'description' => __('', 'siteorigin-panels'),
		'priority'    => 210,
	);

	// Headings (h1, h2, ...)
	$fields['thinkup_styleFontH'] = array(
		'name'        => __('Headings (h1, h2, ...)', 'siteorigin-panels'),
		'type'        => 'color',
		'group'       => 'thinkup_row_styling',
		'description' => __('', 'siteorigin-panels'),
		'priority'    => 211,
	);

	// Headings (h1, h2, ...) -  Clear
	$fields['thinkup_styleFontHClear'] = array(
		'name'        => __('Clear Color', 'siteorigin-panels'),
		'label'       => __('Default', 'siteorigin-panels'),
		'type'        => 'checkbox',
		'group'       => 'thinkup_row_styling',
		'description' => __('', 'siteorigin-panels'),
		'priority'    => 212,
	);

	// Paragraph Text
	$fields['thinkup_styleFontP'] = array(
		'name'        => __('Paragraph Text', 'siteorigin-panels'),
		'type'        => 'color',
		'group'       => 'thinkup_row_styling',
		'description' => __('', 'siteorigin-panels'),
		'priority'    => 213,
	);

	// Paragraph Text - Clear
	$fields['thinkup_styleFontPClear'] = array(
		'name'        => __('Clear Color', 'siteorigin-panels'),
		'label'       => __('Default', 'siteorigin-panels'),
		'type'        => 'checkbox',
		'group'       => 'thinkup_row_styling',
		'description' => __('', 'siteorigin-panels'),
		'priority'    => 214,
	);

	// Link Text
	$fields['thinkup_styleFontA'] = array(
		'name'        => __('Link Text', 'siteorigin-panels'),
		'type'        => 'color',
		'group'       => 'thinkup_row_styling',
		'description' => __('', 'siteorigin-panels'),
		'priority'    => 215,
	);

	// Link Text - Clear
	$fields['thinkup_styleFontAClear'] = array(
		'name'        => __('Clear Color', 'siteorigin-panels'),
		'label'       => __('Default', 'siteorigin-panels'),
		'type'        => 'checkbox',
		'group'       => 'thinkup_row_styling',
		'description' => __('', 'siteorigin-panels'),
		'priority'    => 216,
	);

	// Link Text (hover)
	$fields['thinkup_styleFontAH'] = array(
		'name'        => __('Link Text (hover)', 'siteorigin-panels'),
		'type'        => 'color',
		'group'       => 'thinkup_row_styling',
		'description' => __('', 'siteorigin-panels'),
		'priority'    => 217,
	);

	// Background Color - Clear
	$fields['thinkup_styleFontAHClear'] = array(
		'name'        => __('Clear Color', 'siteorigin-panels'),
		'label'       => __('Default', 'siteorigin-panels'),
		'type'        => 'checkbox',
		'group'       => 'thinkup_row_styling',
		'description' => __('', 'siteorigin-panels'),
		'priority'    => 218,
	);

	// Border - Heading
	$fields['thinkup_heading_rowBorder'] = array(
		'name'        => __('Custom Border', 'siteorigin-panels'),
		'type'        => 'text',
		'group'       => 'thinkup_row_styling',
		'description' => __('', 'siteorigin-panels'),
		'priority'    => 219,
	);

	// Border Top (px)
	$fields['thinkup_styleBorderTSize'] = array(
		'name'        => __('Border Top (px)', 'siteorigin-panels'),
		'type'        => 'select',
		'options'     => $count_0_10,
		'group'       => 'thinkup_row_styling',
		'description' => __('', 'siteorigin-panels'),
		'priority'    => 220,
	);

	// Border Top (style)
	$fields['thinkup_styleBorderTStyle'] = array(
		'name'        => __('Border Top (style)', 'siteorigin-panels'),
		'type'        => 'select',
		'options' => array(
			'solid'  => __('solid', 'siteorigin-panels'),
			'dashed' => __('dashed', 'siteorigin-panels'),
			'dotted' => __('dotted', 'siteorigin-panels'),
			'double' => __('double', 'siteorigin-panels'),
		),
		'group'       => 'thinkup_row_styling',
		'description' => __('', 'siteorigin-panels'),
		'priority'    => 221,
	);

	// Border Top (color)
	$fields['thinkup_styleBorderTColor'] = array(
		'name'        => __('Border Top (color)', 'siteorigin-panels'),
		'type'        => 'color',
		'group'       => 'thinkup_row_styling',
		'description' => __('', 'siteorigin-panels'),
		'priority'    => 222,
	);

	// Border Top (color) - Clear
	$fields['thinkup_styleBorderTColorClear'] = array(
		'name'        => __('Clear Color', 'siteorigin-panels'),
		'label'       => __('Default', 'siteorigin-panels'),
		'type'        => 'checkbox',
		'group'       => 'thinkup_row_styling',
		'description' => __('', 'siteorigin-panels'),
		'priority'    => 223,
	);

	// Border Bottom (px)
	$fields['thinkup_styleBorderBSize'] = array(
		'name'        => __('Border Bottom (px)', 'siteorigin-panels'),
		'type'        => 'select',
		'options'     => $count_0_10,
		'group'       => 'thinkup_row_styling',
		'description' => __('', 'siteorigin-panels'),
		'priority'    => 224,
	);

	// Border Bottom (style)
	$fields['thinkup_styleBorderBStyle'] = array(
		'name'        => __('Border Bottom (style)', 'siteorigin-panels'),
		'type'        => 'select',
		'options' => array(
			'solid'  => __('solid', 'siteorigin-panels'),
			'dashed' => __('dashed', 'siteorigin-panels'),
			'dotted' => __('dotted', 'siteorigin-panels'),
			'double' => __('double', 'siteorigin-panels'),
		),
		'group'       => 'thinkup_row_styling',
		'description' => __('', 'siteorigin-panels'),
		'priority'    => 225,
	);

	// Border Bottom (color)
	$fields['thinkup_styleBorderBColor'] = array(
		'name'        => __('Border Bottom (color)', 'siteorigin-panels'),
		'type'        => 'color',
		'group'       => 'thinkup_row_styling',
		'description' => __('', 'siteorigin-panels'),
		'priority'    => 226,
	);

	// Border Bottom (color) - Clear
	$fields['thinkup_styleBorderBColorClear'] = array(
		'name'        => __('Clear Color', 'siteorigin-panels'),
		'label'       => __('Default', 'siteorigin-panels'),
		'type'        => 'checkbox',
		'group'       => 'thinkup_row_styling',
		'description' => __('', 'siteorigin-panels'),
		'priority'    => 227,
	);

	// ------------------------------------------------
	// GROUP - LAYOUT
	// ------------------------------------------------

	// Text Alignment - Heading
	$fields['thinkup_heading_rowTextAlignment'] = array(
		'name'        => __('Text Alignment', 'siteorigin-panels'),
		'type'        => 'text',
		'group'       => 'thinkup_row_layout',
		'description' => __('', 'siteorigin-panels'),
		'priority'    => 301,
	);

	// Text Alignment
  	$fields['thinkup_styleFontAlign'] = array(
		'name'        => __('Align Text Content', 'siteorigin-panels'),
		'type'        => 'select',
		'options' => array(
			'inherit' => __('Default', 'siteorigin-panels'),
			'center'  => __('Center', 'siteorigin-panels'),
			'left'    => __('Left', 'siteorigin-panels'),
			'right'   => __('Right', 'siteorigin-panels'),
		),
		'group'       => 'thinkup_row_layout',
		'description' => __('', 'siteorigin-panels'),
		'priority'    => 302,
	);

	// Row Custom Padding & Margin - Heading
	$fields['thinkup_heading_rowStyling'] = array(
		'name'        => __('Custom Padding & Margin', 'siteorigin-panels'),
		'type'        => 'text',
		'group'       => 'thinkup_row_layout',
		'description' => __('', 'siteorigin-panels'),
		'priority'    => 303,
	);

	// Row Padding Top (px)
  	$fields['thinkup_stylePaddingTop'] = array(
		'name'        => __('Row Padding Top (px)', 'siteorigin-panels'),
		'type'        => 'select',
		'options'     => $count_0_100,
		'group'       => 'thinkup_row_layout',
		'description' => __('', 'siteorigin-panels'),
		'priority'    => 304,
	);

	// Row Padding Bottom (px)
  	$fields['thinkup_stylePaddingBottom'] = array(
		'name'        => __('Row Padding Bottom (px)', 'siteorigin-panels'),
		'type'        => 'select',
		'options'     => $count_0_100,
		'group'       => 'thinkup_row_layout',
		'description' => __('', 'siteorigin-panels'),
		'priority'    => 305,
	);

	// Row Padding Left (px)
  	$fields['thinkup_stylePaddingLeft'] = array(
		'name'        => __('Row Padding Left (px)', 'siteorigin-panels'),
		'type'        => 'select',
		'options'     => $count_0_100,
		'group'       => 'thinkup_row_layout',
		'description' => __('', 'siteorigin-panels'),
		'priority'    => 306,
	);

	// Row Padding Right (px)
  	$fields['thinkup_stylePaddingRight'] = array(
		'name'        => __('Row Padding Right (px)', 'siteorigin-panels'),
		'type'        => 'select',
		'options'     => $count_0_100,
		'group'       => 'thinkup_row_layout',
		'description' => __('', 'siteorigin-panels'),
		'priority'    => 307,
	);

	// Row Margin Top (px)
  	$fields['thinkup_styleMarginTop'] = array(
		'name'        => __('Row Margin Top (px)', 'siteorigin-panels'),
		'type'        => 'select',
		'options'     => $count_0_100,
		'group'       => 'thinkup_row_layout',
		'description' => __('', 'siteorigin-panels'),
		'priority'    => 308,
	);

	// Row Margin Bottom (px)
  	$fields['thinkup_styleMarginBottom'] = array(
		'name'        => __('Row Margin Bottom (px)', 'siteorigin-panels'),
		'type'        => 'select',
		'options'     => $count_0_100,
		'group'       => 'thinkup_row_layout',
		'description' => __('', 'siteorigin-panels'),
		'priority'    => 309,
	);

	// Row Custom Padding & Margin - Heading
	$fields['thinkup_heading_rowCellStyling'] = array(
		'name'        => __('Custom Cells Padding', 'siteorigin-panels'),
		'type'        => 'text',
		'group'       => 'thinkup_row_layout',
		'description' => __('', 'siteorigin-panels'),
		'priority'    => 310,
	);

	// Cell Margin Bottom (px)
  	$fields['thinkup_styleCellsPaddingRight'] = array(
		'name'        => __('Cell Padding Right (% of page)', 'siteorigin-panels'),
		'type'        => 'select',
		'options'     => $count_0_10,
		'group'       => 'thinkup_row_layout',
		'description' => __('', 'siteorigin-panels'),
		'priority'    => 311,
	);

	// Cell Margin Bottom (px)
  	$fields['thinkup_styleCellsPaddingBottom'] = array(
		'name'        => __('Cell Padding Bottom (px)', 'siteorigin-panels'),
		'type'        => 'select',
		'options'     => $count_0_100,
		'group'       => 'thinkup_row_layout',
		'description' => __('', 'siteorigin-panels'),
		'priority'    => 312,
	);

  return $fields;
}
add_filter( 'siteorigin_panels_row_style_fields', 'thinkup_panels_row_settings_fields_input', 999 );




function thinkup_panels_row_settings_fields_output_class( $attributes, $args ) {

	// ------------------------------------------------
	// 	1.	TIDY ATTRIBUTE ARRAYS
	// ------------------------------------------------
	
	// Reset attributes to be an array if empty - removed SiteOrigin attribute inputs
	if( !is_array($attributes['class']) ) $attributes['class'] = array();

	//Remove all default [object object] classes from $attributes['class']
	foreach ($attributes['class'] as $key => $value) {
		if ( strpos( $value, '[' ) !== false or strpos( $value, ']' ) !== false ) {
			unset($attributes['class'][$key]);
		}
	}

	// ------------------------------------------------
	// 	1.	RESET USER ROW CLASS SETTINGS
	// ------------------------------------------------

	// Reset attribute values
	if( ! isset( $args['thinkup_rowGridClass'] ) ) { $args['thinkup_rowGridClass'] = NULL; }

	// ------------------------------------------------
	// 	2.	OUTPUT USER ROW CLASS SETTINGS
	// ------------------------------------------------

	// Get attribute values
	$thinkup_rowGridClass           = $args['thinkup_rowGridClass'];

	// Add user specified class to row
    if( !empty( $thinkup_rowGridClass ) ) {

		$thinkup_rowGridClass = explode( ' ', $args['thinkup_rowGridClass'] );

		foreach ( $thinkup_rowGridClass as $key => $value ) {
			array_push($attributes['class'], $value);
		}
    }

    return $attributes;
}

function thinkup_panels_row_cell_classes( $attributes, $args ) {

	// ------------------------------------------------
	// 	1.	RESET USER CELL CLASS SETTINGS
	// ------------------------------------------------

	// Reset attribute values
	if( ! isset( $args['thinkup_rowCellClass'] ) ) { $args['thinkup_rowCellClass'] = NULL; }

	// ------------------------------------------------
	// 	2.	OUTPUT USER CELL CLASS SETTINGS
	// ------------------------------------------------

	// Get user specified cell class if set
	$thinkup_rowCellClass = $args['thinkup_rowCellClass'];

    if( !empty( $thinkup_rowCellClass ) ) {
		array_push($attributes['class'], $thinkup_rowCellClass);
    }

    return $attributes;
}

function thinkup_panels_row_settings_fields_output_inline() {
	add_filter('siteorigin_panels_row_style_attributes', 'thinkup_panels_row_settings_fields_output_class', 10, 2);
	add_filter('siteorigin_panels_cell_style_attributes', 'thinkup_panels_row_cell_classes', 10, 2);	
}
add_action('plugins_loaded', 'thinkup_panels_row_settings_fields_output_inline');



add_action('wp_head','thinkup_panels_row_settings_fields_output_head');
function thinkup_panels_row_settings_fields_output_head() {
global $post;

$post_id = get_the_ID();

//$panels_data = apply_filters( 'siteorigin_panels_data', $panels_data, $post_id );
$panels_data = get_post_meta( $post_id, 'panels_data', true );

	$grids = array();
	if( !empty( $panels_data['grids'] ) && !empty( $panels_data['grids'] ) ) {

		// Variable to determine cell number on entire page - Used when calcualting weight
		$cell_all = 0;

		foreach ( $panels_data['grids'] as $gi => $grid ) {

			$thinkup_row_ID      = 'pg-' . $post_id . '-' . $gi;
			$thinkup_cell_ID     = 'pgc-' . $post_id . '-' . $gi;
			$thinkup_row_cells   = $grid['cells'];

			// ------------------------------------------------
			// 	1.	RESET SETTING VALUES
			// ------------------------------------------------

			// Reset attribute values
			if( ! isset( $grid['style']['thinkup_rowGridClass'] ) ) { $grid['style']['thinkup_rowGridClass'] = NULL; }
			if( ! isset( $grid['style']['thinkup_rowCellClass'] ) ) { $grid['style']['thinkup_rowCellClass'] = NULL; }
			if( ! isset( $grid['style']['thinkup_rowCss'] ) )       { $grid['style']['thinkup_rowCss']       = NULL; }

			// Reset custom styling values
			if( ! isset( $grid['style']['thinkup_styleColor'] ) )       { $grid['style']['thinkup_styleColor']       = NULL; }
			if( ! isset( $grid['style']['thinkup_styleColorClear'] ) )  { $grid['style']['thinkup_styleColorClear']  = NULL; }
			if( ! isset( $grid['style']['thinkup_styleImage'] ) )       { $grid['style']['thinkup_styleImage']       = NULL; }
			if( ! isset( $grid['style']['thinkup_stylePosition'] ) )    { $grid['style']['thinkup_stylePosition']    = NULL; }
			if( ! isset( $grid['style']['thinkup_styleRepeat'] ) )      { $grid['style']['thinkup_styleRepeat']      = NULL; }
			if( ! isset( $grid['style']['thinkup_styleSize'] ) )        { $grid['style']['thinkup_styleSize']        = NULL; }
			if( ! isset( $grid['style']['thinkup_styleAttachment'] ) )  { $grid['style']['thinkup_styleAttachment']  = NULL; }
			if( ! isset( $grid['style']['thinkup_styleFontH'] ) )       { $grid['style']['thinkup_styleFontH']       = NULL; }
			if( ! isset( $grid['style']['thinkup_styleFontP'] ) )       { $grid['style']['thinkup_styleFontP']       = NULL; }
			if( ! isset( $grid['style']['thinkup_styleFontA'] ) )       { $grid['style']['thinkup_styleFontA']       = NULL; }
			if( ! isset( $grid['style']['thinkup_styleFontAH'] ) )      { $grid['style']['thinkup_styleFontAH']      = NULL; }
			if( ! isset( $grid['style']['thinkup_styleFontHClear'] ) )  { $grid['style']['thinkup_styleFontHClear']  = NULL; }
			if( ! isset( $grid['style']['thinkup_styleFontPClear'] ) )  { $grid['style']['thinkup_styleFontPClear']  = NULL; }
			if( ! isset( $grid['style']['thinkup_styleFontAClear'] ) )  { $grid['style']['thinkup_styleFontAClear']  = NULL; }
			if( ! isset( $grid['style']['thinkup_styleFontAHClear'] ) ) { $grid['style']['thinkup_styleFontAHClear'] = NULL; }

			// Reset layout values
			if( ! isset( $grid['style']['thinkup_styleFontAlign'] ) )          { $grid['style']['thinkup_styleFontAlign']          = NULL; }
			if( ! isset( $grid['style']['thinkup_styleBorderTSize'] ) )        { $grid['style']['thinkup_styleBorderTSize']        = NULL; }
			if( ! isset( $grid['style']['thinkup_styleBorderTStyle'] ) )       { $grid['style']['thinkup_styleBorderTStyle']       = NULL; }
			if( ! isset( $grid['style']['thinkup_styleBorderTColor'] ) )       { $grid['style']['thinkup_styleBorderTColor']       = NULL; }
			if( ! isset( $grid['style']['thinkup_styleBorderTColorClear'] ) )  { $grid['style']['thinkup_styleBorderTColorClear']  = NULL; }
			if( ! isset( $grid['style']['thinkup_styleBorderBSize'] ) )        { $grid['style']['thinkup_styleBorderBSize']        = NULL; }
			if( ! isset( $grid['style']['thinkup_styleBorderBStyle'] ) )       { $grid['style']['thinkup_styleBorderBStyle']       = NULL; }
			if( ! isset( $grid['style']['thinkup_styleBorderBColor'] ) )       { $grid['style']['thinkup_styleBorderBColor']       = NULL; }
			if( ! isset( $grid['style']['thinkup_styleBorderBColorClear'] ) )  { $grid['style']['thinkup_styleBorderBColorClear']  = NULL; }
			if( ! isset( $grid['style']['thinkup_stylePaddingTop'] ) )         { $grid['style']['thinkup_stylePaddingTop']         = NULL; }
			if( ! isset( $grid['style']['thinkup_stylePaddingBottom'] ) )      { $grid['style']['thinkup_stylePaddingBottom']      = NULL; }
			if( ! isset( $grid['style']['thinkup_stylePaddingLeft'] ) )        { $grid['style']['thinkup_stylePaddingLeft']        = NULL; }
			if( ! isset( $grid['style']['thinkup_stylePaddingRight'] ) )       { $grid['style']['thinkup_stylePaddingRight']       = NULL; }
			if( ! isset( $grid['style']['thinkup_styleMarginTop'] ) )          { $grid['style']['thinkup_styleMarginTop']          = NULL; }
			if( ! isset( $grid['style']['thinkup_styleMarginBottom'] ) )       { $grid['style']['thinkup_styleMarginBottom']       = NULL; }
			if( ! isset( $grid['style']['thinkup_styleCellsPaddingRight'] ) )  { $grid['style']['thinkup_styleCellsPaddingRight']  = NULL; }
			if( ! isset( $grid['style']['thinkup_styleCellsPaddingBottom'] ) ) { $grid['style']['thinkup_styleCellsPaddingBottom'] = NULL; }

			// ------------------------------------------------
			// 	2.	GET SETTING VALUES
			// ------------------------------------------------

			// Get attribute values
			$thinkup_rowGridClass            = $grid['style']['thinkup_rowGridClass'];
			$thinkup_rowCellClass            = $grid['style']['thinkup_rowCellClass'];
			$thinkup_rowCss                  = $grid['style']['thinkup_rowCss'];

			// Get custom styling values
			$thinkup_styleColor              = $grid['style']['thinkup_styleColor'];
			$thinkup_styleColorClear         = $grid['style']['thinkup_styleColorClear'];
			$thinkup_styleImage              = $grid['style']['thinkup_styleImage'];
			$thinkup_stylePosition           = $grid['style']['thinkup_stylePosition'];
			$thinkup_styleRepeat             = $grid['style']['thinkup_styleRepeat'];
			$thinkup_styleSize               = $grid['style']['thinkup_styleSize'];
			$thinkup_styleAttachment         = $grid['style']['thinkup_styleAttachment'];
			$thinkup_styleFontH              = $grid['style']['thinkup_styleFontH'];
			$thinkup_styleFontP              = $grid['style']['thinkup_styleFontP'];
			$thinkup_styleFontA              = $grid['style']['thinkup_styleFontA'];
			$thinkup_styleFontAH             = $grid['style']['thinkup_styleFontAH'];
			$thinkup_styleFontHClear         = $grid['style']['thinkup_styleFontHClear'];
			$thinkup_styleFontPClear         = $grid['style']['thinkup_styleFontPClear'];
			$thinkup_styleFontAClear         = $grid['style']['thinkup_styleFontAClear'];
			$thinkup_styleFontAHClear        = $grid['style']['thinkup_styleFontAHClear'];

			// Get layout values
			$thinkup_styleFontAlign          = $grid['style']['thinkup_styleFontAlign'];
			$thinkup_styleBorderTSize        = $grid['style']['thinkup_styleBorderTSize'];
			$thinkup_styleBorderTStyle       = $grid['style']['thinkup_styleBorderTStyle'];
			$thinkup_styleBorderTColor       = $grid['style']['thinkup_styleBorderTColor'];
			$thinkup_styleBorderTColorClear  = $grid['style']['thinkup_styleBorderTColorClear'];
			$thinkup_styleBorderBSize        = $grid['style']['thinkup_styleBorderBSize'];
			$thinkup_styleBorderBStyle       = $grid['style']['thinkup_styleBorderBStyle'];
			$thinkup_styleBorderBColor       = $grid['style']['thinkup_styleBorderBColor'];
			$thinkup_styleBorderBColorClear  = $grid['style']['thinkup_styleBorderBColorClear'];
			$thinkup_stylePaddingTop         = $grid['style']['thinkup_stylePaddingTop'];
			$thinkup_stylePaddingBottom      = $grid['style']['thinkup_stylePaddingBottom'];
			$thinkup_stylePaddingLeft        = $grid['style']['thinkup_stylePaddingLeft'];
			$thinkup_stylePaddingRight       = $grid['style']['thinkup_stylePaddingRight'];
			$thinkup_styleMarginTop          = $grid['style']['thinkup_styleMarginTop'];
			$thinkup_styleMarginBottom       = $grid['style']['thinkup_styleMarginBottom'];
			$thinkup_styleCellsPaddingRight  = $grid['style']['thinkup_styleCellsPaddingRight'];
			$thinkup_styleCellsPaddingBottom = $grid['style']['thinkup_styleCellsPaddingBottom'];

			// ------------------------------------------------
			// 	3.	OUTPUT SETTING VALUES
			// ------------------------------------------------

			$output = NULL;

			// Output code targeted at .panel-grid	
			$output .= '#' . $thinkup_row_ID . '.panel-grid {';

				// User specified custom css
				if ( ! empty( $thinkup_rowCss ) ) {
					$output .= $thinkup_rowCss;
				}

				// Custom Background Color
				if ( ! empty( $thinkup_styleColor ) and $thinkup_styleColorClear != '1' and  empty( $thinkup_styleImage ) ) {
					$output .= 'background: ' . $thinkup_styleColor . ';';
				}

				// Custom Background Image
				if ( ! empty( $thinkup_styleImage ) ) {
					$output .= 'background: url("' . $thinkup_styleImage . '") !important;';
					$output .= 'background-position: ' . $thinkup_stylePosition . ' !important;';
					$output .= 'background-repeat: ' . $thinkup_styleRepeat . ' !important;';
					$output .= 'background-size: ' . $thinkup_styleSize . ' !important;';
					$output .= 'background-attachment: ' . $thinkup_styleAttachment . ' !important;';
				}

				// Custom Font Alignment
				if ( ! empty( $thinkup_styleFontAlign ) and $thinkup_styleFontAlign !== 'inherit' ) {
					$output .= 'text-align: ' . $thinkup_styleFontAlign . ' !important;';								
				}

				// Custom Border - Top
				if ( is_numeric( $thinkup_styleBorderTSize ) and $thinkup_styleBorderTColorClear != '1' ) {
					$output .= 'border-top-width: ' . $thinkup_styleBorderTSize . 'px !important;';
					$output .= 'border-top-style: ' . $thinkup_styleBorderTStyle . ' !important;';
					$output .= 'border-top-color: ' . $thinkup_styleBorderTColor . ' !important;';
				}

				// Custom Border - Bottom
				if ( is_numeric( $thinkup_styleBorderBSize ) and $thinkup_styleBorderBColorClear != '1' ) {
					$output .= 'border-bottom-width: ' . $thinkup_styleBorderBSize . 'px !important;';
					$output .= 'border-bottom-style: ' . $thinkup_styleBorderBStyle . ' !important;';
					$output .= 'border-bottom-color: ' . $thinkup_styleBorderBColor . ' !important;';
				}

				// Custom Padding - Top
				if ( is_numeric( $thinkup_stylePaddingTop ) ) {
					$output .= 'padding-top: ' . $thinkup_stylePaddingTop . 'px !important;';
				}

				// Custom Padding - Bottom
				if ( is_numeric( $thinkup_stylePaddingBottom ) ) {
					$output .= 'padding-bottom: ' . $thinkup_stylePaddingBottom . 'px !important;';
				}

				// Custom Padding - Left
				if ( is_numeric( $thinkup_stylePaddingLeft ) ) {
					$output .= 'padding-left: ' . $thinkup_stylePaddingLeft . 'px !important;';
				}

				// Custom Padding - Right
				if ( is_numeric( $thinkup_stylePaddingRight ) ) {
					$output .= 'padding-right: ' . $thinkup_stylePaddingRight . 'px !important;';
				}

				// Custom Margin - Top
				if ( is_numeric( $thinkup_styleMarginTop ) ) {
					$output .= 'margin-top: ' . $thinkup_styleMarginTop . 'px !important;';
				}

				// Custom Margin - Bottom
				if ( is_numeric( $thinkup_styleMarginBottom ) ) {
					$output .= 'margin-bottom: ' . $thinkup_styleMarginBottom . 'px !important;';
				}

			$output .= '}';

			// Cell Padding Right and recalculate cell width if padding-right is set (above)
			$cell_row  = 0;
			while ( $cell_row < $thinkup_row_cells ) {

				if ( is_numeric( $thinkup_styleCellsPaddingRight ) ) {

					// Determine weight of current cell
					$thinkup_row_weight = $panels_data['grid_cells'][$cell_all]['weight'];

					// Determine width of current cell
					$width = round( $thinkup_row_weight * ( 100 - ( ($thinkup_row_cells - 1 ) * $thinkup_styleCellsPaddingRight ) ), 3 );

					$output .= 'body #' . $thinkup_cell_ID .'-' . $cell_row . '.panel-grid-cell {';
					$output .= 'width: ' . $width . '%;';
					$output .= 'padding-right: ' . $thinkup_styleCellsPaddingRight . '%;';
					$output .= '}';

				}

			$cell_row++;
			$cell_all++;
			}

			// Output code targeted at .panel-grid-cell
			$output .= '#' . $thinkup_row_ID . ' .panel-grid-cell {';

				// Cell Padding Bottom
				if ( is_numeric( $thinkup_styleCellsPaddingBottom ) ) {
					$output .= 'padding-bottom: ' . $thinkup_styleCellsPaddingBottom . 'px;';
				}

			$output .= '}';

			// Custom font Colors - headings
			if ( ! empty( $thinkup_styleFontH ) and $thinkup_styleFontHClear != '1' ) {
				$output .= '#' . $thinkup_row_ID . '.panel-grid h1,';
				$output .= '#' . $thinkup_row_ID . '.panel-grid h2,';
				$output .= '#' . $thinkup_row_ID . '.panel-grid h3,';
				$output .= '#' . $thinkup_row_ID . '.panel-grid h4,';
				$output .= '#' . $thinkup_row_ID . '.panel-grid h5,';
				$output .= '#' . $thinkup_row_ID . '.panel-grid h6,';
				$output .= '#' . $thinkup_row_ID . '.panel-grid h1:before,';
				$output .= '#' . $thinkup_row_ID . '.panel-grid h2:before,';
				$output .= '#' . $thinkup_row_ID . '.panel-grid h3:before,';
				$output .= '#' . $thinkup_row_ID . '.panel-grid h4:before,';
				$output .= '#' . $thinkup_row_ID . '.panel-grid h5:before,';
				$output .= '#' . $thinkup_row_ID . '.panel-grid h6:before,';
				$output .= '#' . $thinkup_row_ID . '.panel-grid h1 span:before,';
				$output .= '#' . $thinkup_row_ID . '.panel-grid h2 span:before,';
				$output .= '#' . $thinkup_row_ID . '.panel-grid h3 span:before,';
				$output .= '#' . $thinkup_row_ID . '.panel-grid h4 span:before,';
				$output .= '#' . $thinkup_row_ID . '.panel-grid h5 span:before,';
				$output .= '#' . $thinkup_row_ID . '.panel-grid h6 span:before,';
				$output .= '#' . $thinkup_row_ID . '.panel-grid h1:after,';
				$output .= '#' . $thinkup_row_ID . '.panel-grid h2:after,';
				$output .= '#' . $thinkup_row_ID . '.panel-grid h3:after,';
				$output .= '#' . $thinkup_row_ID . '.panel-grid h4:after,';
				$output .= '#' . $thinkup_row_ID . '.panel-grid h5:after,';
				$output .= '#' . $thinkup_row_ID . '.panel-grid h6:after,';
				$output .= '#' . $thinkup_row_ID . '.panel-grid h1 span:after,';
				$output .= '#' . $thinkup_row_ID . '.panel-grid h2 span:after,';
				$output .= '#' . $thinkup_row_ID . '.panel-grid h3 span:after,';
				$output .= '#' . $thinkup_row_ID . '.panel-grid h4 span:after,';
				$output .= '#' . $thinkup_row_ID . '.panel-grid h5 span:after,';
				$output .= '#' . $thinkup_row_ID . '.panel-grid h6 span:after {';
				$output .= 'color: ' . $thinkup_styleFontH . ' !important;';
				$output .= 'border-color: ' . $thinkup_styleFontH . ' !important;';
				$output .= '}';
			}

			// Custom font Colors - paragraphs
			if ( ! empty( $thinkup_styleFontP ) and $thinkup_styleFontPClear != '1' ) {
				$output .= '#' . $thinkup_row_ID . '.panel-grid,';
				$output .= '#' . $thinkup_row_ID . '.panel-grid i,';
				$output .= '#' . $thinkup_row_ID . '.panel-grid p {';
				$output .= 'color: ' . $thinkup_styleFontP . ' !important;';
				$output .= '}';
			}

			// Custom font Colors - links
			if ( ! empty( $thinkup_styleFontA ) and $thinkup_styleFontAClear != '1' ) {
				$output .= '#' . $thinkup_row_ID . '.panel-grid a {';
				$output .= 'color: ' . $thinkup_styleFontA . ' !important;';
				$output .= '}';
			}

			// Custom font Colors - links on hover
			if ( ! empty( $thinkup_styleFontAH ) and $thinkup_styleFontAHClear != '1' ) {
				$output .= '#' . $thinkup_row_ID . '.panel-grid a:hover {';
				$output .= 'color: ' . $thinkup_styleFontAH . ' !important;';
				$output .= '}';
			}

			if( ! empty( $output ) ) {
				echo '<style>' . $output . '</style>';
			}
		}
	}
}



function thinkup_panels_widget_tabs($tabs) {

	// Determine if all widgets should display or not
	$thinkup_buildersite_default_options = get_option('siteorigin_panels_settings');
	$enable_all_widgets                  = $thinkup_buildersite_default_options['enable_all_widgets'];

	// Remove all 3rd party widgets if not otherwise specified by user
	if( $enable_all_widgets != '1' ) {

		// Remove Page Builder and recommended groups
		unset($tabs['wordpress']);
		unset($tabs['widgets_bundle']);
		unset($tabs['widgets_bundle']['message']);
		unset($tabs['page_builder']);
		unset($tabs['recommended']);

	}

    $tabs[] = array(
		'title' => __('ThinkUp Widgets', 'mytheme'),
		'filter' => array(
			'groups' => array('thinkup_builder_widgets')
		)
	);

	return $tabs;
}
add_filter('siteorigin_panels_widget_dialog_tabs', 'thinkup_panels_widget_tabs', 99 );

function thinkup_panels_add_recommended_widgets($widgets) {

	// Determine if all widgets should display or not
	$thinkup_buildersite_default_options = get_option('siteorigin_panels_settings');
	$enable_all_widgets                  = $thinkup_buildersite_default_options['enable_all_widgets'];

	// Loop through all widgets and keep / remove relevant widgets
	foreach($widgets as $widget) {

		$widget_id = $widget['class'];

		// Remove all 3rd party widgets if not otherwise specified by user
		if( $enable_all_widgets != '1' ) {

			if (strpos($widget_id, 'thinkup_builder') !== false) {
				// Keep all default ThinkUpThemes Builder widgets
				$remove_widget = false;
			} else {
				// Remove all 3rd parrty widgets
				$remove_widget = true;
			}

			// Keep Black Studio widgets if enabled (explicit keep)
			if (strpos( $widget_id, 'Black_Studio' ) !== false) {
				$remove_widget = false;
			}

			// Keep SiteOrigin Layout Builder widget (explicit keep)
			if (strpos( $widget_id, 'SiteOrigin_Panels_Widgets_Layout' ) !== false) {
				$remove_widget = false;
			}

			//		if (strpos($widget_id, 'WP_') === 0) {
			//			// Keep all default WordPress widgets
			//			$remove_widget = false;
			//		} else if (strpos($widget_id, 'WC_') === 0 || strpos($widget_id, 'WooCommerce') !== false) {
			//			// Keep all default WooCommerce widgets
			//			$remove_widget = false;
			//		} else if (strpos($widget_id, 'BBP_') === 0 || strpos($widget_id, 'BBPress') !== false) {
			//			// Keep all default BuddyPress widgets
			//			$remove_widget = false;
			//		} else if (strpos($widget_id, 'Jetpack') !== false || strpos($widget['title'], 'Jetpack') !== false) {
			//			// Keep all default Jetpack widgets
			//			$remove_widget = false;
			//		} else if (strpos($widget_id, 'thinkup_builder') !== false) {
			//			// Keep all default ThinkUpThemes Builder widgets
			//			$remove_widget = false;
			//		} else {
			//			// Remove all other widgets
			//			$remove_widget = true;
			//		}

					// Remove Black Studio widgets (explicit removal)
			//		if (strpos( $widget_id, 'Black_Studio' ) !== false) {
			//			$remove_widget = true;
			//		}

					// Remove SiteOrigin widgets (explicit removal)
			//		if (strpos( $widget_id, 'SiteOrigin' ) !== false) {
			//			$remove_widget = true;
			//		}
		}

		// Remove ThinkUpThemes non page-builder widgets (explicit removal)
		if (strpos( $widget_id, 'thinkup_widget' ) !== false) {
			$remove_widget = true;
		}

		// Unset widget
		if( $remove_widget == true ) {
			unset($widgets[$widget['class']]);
		}

		// Reset removal widget variable
		$remove_widget = false;
	}

	// Add ThinkUpThemes widgets to ThinkUp Widgets section
	foreach($widgets as $widget) {

		$widget_id = $widget['class'];

		if (strpos($widget_id, 'thinkup_builder') !== false) {
			$widgets[$widget_id]['groups'] = array('thinkup_builder_widgets');
			$widgets[$widget_id]['icon'] = 'dashicons dashicons-star-filled';
		}
	}

	return $widgets;
}
//add_action('admin_head','thinkup_panels_add_recommended_widgets', 99 );
add_filter('siteorigin_panels_widgets','thinkup_panels_add_recommended_widgets', 99 );












// Remove div surrounding widgets added to main content area
function thinkup_panels_remove_widget_container($args) {
	
//	echo print_r( $args );
	$args = array(
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
		'widget_id'     => '',
	);
	
	return $args;
}
add_filter('siteorigin_panels_widget_args', 'thinkup_panels_remove_widget_container');















// Return an ID of an attachment by searching the database with the file URL.
//
// First checks to see if the $url is pointing to a file that exists in
// the wp-content directory. If so, then we search the database for a
// partial match consisting of the remaining path AFTER the wp-content
// directory. Finally, if a match is found the attachment ID will be
// returned.
//
// @param string $url The URL of the image (ex: http://mysite.com/wp-content/uploads/2013/05/test-image.jpg)
//
// @return int|null $attachment Returns an attachment ID, or null if no attachment is found
//
function thinkup_get_attachment_id_by_url( $url ) {
	// Split the $url into two parts with the wp-content directory as the separator
	$parsed_url  = explode( parse_url( WP_CONTENT_URL, PHP_URL_PATH ), $url );
	// Get the host of the current site and the host of the $url, ignoring www
	$this_host = str_ireplace( 'www.', '', parse_url( home_url(), PHP_URL_HOST ) );
	$file_host = str_ireplace( 'www.', '', parse_url( $url, PHP_URL_HOST ) );
	// Return nothing if there aren't any $url parts or if the current host and $url host do not match
	if ( ! isset( $parsed_url[1] ) || empty( $parsed_url[1] ) || ( $this_host != $file_host ) ) {
		return;
	}
	// Now we're going to quickly search the DB for any attachment GUID with a partial path match
	// Example: /uploads/2013/05/test-image.jpg
	global $wpdb;
	$attachment = $wpdb->get_col( $wpdb->prepare( "SELECT ID FROM {$wpdb->prefix}posts WHERE guid RLIKE %s;", $parsed_url[1] ) );
	// Returns null if no attachment is found
	return $attachment[0];
}


// Add new styles to load after core plugin styles
function thinkup_panels_admin_enqueue_styles() {
	wp_enqueue_style( 'thinkup-panels-admin', plugin_dir_url(__FILE__) . 'thinkup-customization/css/thinkup-admin.css', '', SITEORIGIN_PANELS_VERSION );	
}
//add_action( 'siteorigin_panel_enqueue_admin_styles', 'thinkup_panels_admin_enqueue_styles' );
add_action( 'admin_print_styles', 'thinkup_panels_admin_enqueue_styles' );



function thinkup_panels_enqueue_styles(){
	// Register the style to support possible lazy loading
	wp_register_style('thinkup-panels-front', plugin_dir_url(__FILE__) . 'thinkup-customization/css/thinkup-front.css', array(), SITEORIGIN_PANELS_VERSION );

	if( is_singular() && get_post_meta( get_the_ID(), true ) != '' ) {
		wp_enqueue_style('thinkup-panels-front');
	}
}
add_action('wp_enqueue_scripts', 'thinkup_panels_enqueue_styles', 2);





function thinkup_settings_defaults($defaults) {

	$thinkup_buildersite_default_options = get_option('siteorigin_panels_settings');

	// Widgets fields
	$thinkup_buildersite_default_options['title-html']          = '';
	$thinkup_buildersite_default_options['bundled-widgets']     = false;
	$thinkup_buildersite_default_options['recommended-widgets'] = false;

	// Post types		
	$args_posts = array( 
					'page',
					'post',
					'client',
					'movie',
					'office',
					'portfolio',
					'practice area',
					'recent case',
					'team',
					'testimonial'
				);
	$thinkup_buildersite_default_options['post-types'] = $args_posts;

	// The layout fields
	$thinkup_buildersite_default_options['responsive']           = false;
	$thinkup_buildersite_default_options['mobile-width']         = '';
	$thinkup_buildersite_default_options['margin-bottom']        = '';
	$thinkup_buildersite_default_options['margin-sides']         = '';
	$thinkup_buildersite_default_options['full-width-container'] = '';

	// Content fields
	$thinkup_buildersite_default_options['copy-content'] = false;

	//Update entire array
	update_option('siteorigin_panels_settings', $thinkup_buildersite_default_options);

}
add_action( 'init', 'thinkup_settings_defaults' );
add_action( 'load-settings_page_siteorigin_panels', 'thinkup_settings_defaults', 999 );



// Remove links to SiteOrigin on plugins page
function thinkup_panels_plugin_action_links($links) {
	unset( $links[0] ); // Remove linke to "Support Forum" on plugins page
	unset( $links[1] ); // Remove linke to "Newsletter" on plugins page
	return $links;	
}
add_action('plugin_action_links_thinkup-panels/siteorigin-panels.php', 'thinkup_panels_plugin_action_links', 999);
































































// Enqueue widget compatibility files.
function siteorigin_panels_comatibility_init(){
//	if(is_plugin_active('thinkup-builder-tinymce-widget/thinkup-builder-tinymce-widget.php')){
		include plugin_dir_path(__FILE__).'/thinkup-customization/compat/thinkup-builder-tinymce/thinkup-builder-tinymce.php';
//	}
}
add_action('admin_init', 'siteorigin_panels_comatibility_init', 5);







function thinkup_settings_fields( $fields ) {

		// ------------------------------------------------
		// 	1.	REMOVE DEFAULT SETTINGS
		// ------------------------------------------------

		// The widgets fields
		unset($fields['widgets']);
		unset($fields['widgets']['fields']['title-html']);
		unset($fields['widgets']['fields']['bundled-widgets']);
		unset($fields['widgets']['fields']['recommended-widgets']);

		// The layout fields
		unset($fields['layout']);

		// The layout fields
		unset($fields['layout']['fields']['responsive']);
		unset($fields['layout']['fields']['mobile-width']);
		unset($fields['layout']['fields']['margin-bottom']);
		unset($fields['layout']['fields']['margin-sides']);
		unset($fields['layout']['fields']['full-width-container']);

		// The content fields
		unset($fields['content']);
		unset($fields['content']['fields']['copy-content']);

		// ------------------------------------------------
		// 	2.	ADD CUSTOM SETTINGS
		// ------------------------------------------------

		$fields['general']['fields']['enable_all_widgets'] = array(
			'type' => 'checkbox',
			'label' => __('Enable 3rd Party Widgets (Not recommended)', 'siteorigin-panels'),
			'description' => __('Note: Support is only provided for ThinkUpThemes custom widgets.', 'siteorigin-panels'),
		);

	return $fields;
}
add_filter( 'siteorigin_panels_settings_fields', 'thinkup_settings_fields' );




// Echo the style wrapper and return if there was a wrapper
//
// @param $name
// @param $style_attributes
// @param array $style_args
//
// @return bool Is there a style wrapper
//
function thinkup_panels_start_style_without_wrapper($name, $style_attributes, $style_args = array() ){

	$style_wrapper = '';

	if( empty($style_attributes['class']) ) $style_attributes['class'] = array();
	if( empty($style_attributes['style']) ) $style_attributes['style'] = '';

	$style_attributes = apply_filters('siteorigin_panels_' . $name . '_style_attributes', $style_attributes, $style_args );

	if( empty($style_attributes['class']) ) unset($style_attributes['class']);
	if( empty($style_attributes['style']) ) unset($style_attributes['style']);

	if( !empty($style_attributes) ) {
		if(empty($style_attributes['class'])) $style_attributes['class'] = array();
		$style_attributes['class'] = array_unique( $style_attributes['class'] );

		// Filter and sanitize the classes
		$style_attributes['class'] = apply_filters('siteorigin_panels_' . $name . '_style_classes', $style_attributes['class'], $style_attributes, $style_args);
		$style_attributes['class'] = array_map('sanitize_html_class', $style_attributes['class']);

		foreach ( $style_attributes as $name => $value ) {
			if( is_array($value) ) {
				$style_wrapper .= $name.'="'.esc_attr( implode( " ", array_unique( $value ) ) ).'" ';
			}
			else {
				$style_wrapper .= $name.'="'.esc_attr($value).'" ';
			}
		}

		return $style_wrapper;
	}

	return $style_wrapper;
}





// ------------------------------------------------
// 	ADD COMPATIBILITY FOR BLACK STUDIO TINYMCE
// ------------------------------------------------

function thinkup_panels_admin_init_blackstudio_compat() {
	if ( is_admin() && is_plugin_active( 'black-studio-tinymce-widget/black-studio-tinymce-widget.php' ) ) {
		add_filter( 'siteorigin_panels_widget_object', array( 'Black_Studio_TinyMCE_Compatibility_Plugins', 'siteorigin_panels_widget_object' ), 10 );
		add_filter( 'black_studio_tinymce_container_selectors', array( 'Black_Studio_TinyMCE_Compatibility_Plugins', 'siteorigin_panels_container_selectors' ) );
		add_filter( 'black_studio_tinymce_activate_events', array( 'Black_Studio_TinyMCE_Compatibility_Plugins', 'siteorigin_panels_activate_events' ) );
		add_filter( 'black_studio_tinymce_deactivate_events', array( 'Black_Studio_TinyMCE_Compatibility_Plugins', 'siteorigin_panels_deactivate_events' ) );
		add_filter( 'black_studio_tinymce_enable_pages', array( 'Black_Studio_TinyMCE_Compatibility_Plugins', 'siteorigin_panels_enable_pages' ) );
		remove_filter( 'widget_text', array( bstw()->text_filters(), 'wpautop' ), 8 );
	}
}

add_action( 'admin_init', 'thinkup_panels_admin_init_blackstudio_compat' );
