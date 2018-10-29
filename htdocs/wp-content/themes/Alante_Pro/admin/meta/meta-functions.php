<?php
/**
 * Include and setup custom metaboxes and fields.
 *
 * @category YourThemeOrPlugin
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
 */

add_filter( 'cmb_meta_boxes', 'thinkup_input_meta' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function thinkup_input_meta( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_thinkup_';

	$meta_boxes[] = array(
		'id'         => 'thinkup_bloginfo',
		'title'      => 'ThinkUpThemes.com - Blog Options',
		'pages'      => array( 'page' ), // Post type
		'context'    => 'normal',
		'priority'   => 'default',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name'    => 'Blog Style',
				'desc' => 'Select a style for the blog page. This will only be applied to this blog page.',
				'id'      => $prefix . 'meta_blogstyle',
				'type'    => 'radio',
				'options' => array(
					array( 'name' => 'Default', 'value' => 'option1', true ),
					array( 'name' => 'Style 1', 'value' => 'option2', true ),
					array( 'name' => 'Style 2', 'value' => 'option3', true ),
				),
			),
			array(
				'name'    => 'Blog Traditional Layout',
				'desc' => 'Choose which layout style to use.',
				'id'      => $prefix . 'meta_blogstyle1layout',
				'type'    => 'radio',
				'options' => array(
					array( 'name' => 'Style 1 (Quarter Width)', 'value' => 'option1', true ),
					array( 'name' => 'Style 2 (Full Width)', 'value' => 'option2', true ),
				),
			),
			array(
				'name'    => 'Blog Grid Layout',
				'desc' => 'Choose which layout style to use.',
				'id'      => $prefix . 'meta_blogstyle2layout',
				'type'    => 'radio',
				'options' => array(
					array( 'name' => '1 Column', 'value' => 'option1', true ),
					array( 'name' => '2 Column', 'value' => 'option2', true ),
					array( 'name' => '3 Column', 'value' => 'option3', true ),
					array( 'name' => '4 Column', 'value' => 'option4', true ),
				),
			),
			array(
				'name' => 'Post Date',
				'desc' => 'Check to display post date.',
				'id'   => $prefix . 'meta_blogdate',
				'type' => 'checkbox',
			),
			array(
				'name' => 'Post Author',
				'desc' => 'Check to display post author.',
				'id'   => $prefix . 'meta_blogauthor',
				'type' => 'checkbox',
			),
			array(
				'name' => 'Total Comments',
				'desc' => 'Check to display total comments.',
				'id'   => $prefix . 'meta_blogcomment',
				'type' => 'checkbox',
			),
			array(
				'name' => 'Post Categories',
				'desc' => 'Check to display post categories.',
				'id'   => $prefix . 'meta_blogcategory',
				'type' => 'checkbox',
			),
			array(
				'name' => 'Post Tags',
				'desc' => 'Check to display post tags.',
				'id'   => $prefix . 'meta_blogtags',
				'type' => 'checkbox',
			),
			array(
					'name' => 'Excerpt Length',
					'desc' => 'Specify the number of words in post excerpt. Only works if excerpt option selected from theme options panel.',
					'id'   => $prefix . 'meta_blogpostexcerpts',
					'type' => 'excerpt_select',
			),
			array(
					'name' => 'Posts Per Page',
					'desc' => 'Specify the number of posts on this blog page.',
					'id'   => $prefix . 'meta_blogpostcount',
					'type' => 'excerpt_select',
			),
		),
	);

	$meta_boxes[] = array(
		'id'         => 'thinkup_projectinfo',
		'title'      => 'ThinkUpThemes.com - Project Information',
		'pages'      => array( 'portfolio' ), // Post type
		'context'    => 'normal',
		'priority'   => 'default',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name' => 'Project Description',
				'desc' => 'Add a description of your project. Use this to give more information about your work.',
				'id'   => $prefix . 'meta_projectdescription',
				'type' => 'textarea_small',
			),
			array(
				'name' => 'Client',
				'desc' => 'Enter the same of the client the work was completed for. Leave blank to hide.',
				'id'   => $prefix . 'meta_projectclient',
				'type' => 'text',
			),
			array(
				'name' => 'Date',
				'desc' => 'Specify the date when the project was completed.',
				'id'   => $prefix . 'meta_projectdate',
				'type' => 'text_date',
			),
			array(
				'name' => 'Skills',
				'desc' => 'Enter the same of the client the work was completed for. Leave blank to hide. (Comma separated).',
				'id'   => $prefix . 'meta_projectskills',
				'type' => 'text',
			),
			array(
				'name' => 'Project Link',
				'desc' => 'Specify the URL to the project.',
				'id'   => $prefix . 'meta_projecturl',
				'type' => 'text',
			),
			array(
				'name' => 'Client Title',
				'desc' => 'Change the name of the "Client" field to another of your choice.',
				'id'   => $prefix . 'meta_projectclienttitle',
				'type' => 'text',
			),
			array(
				'name' => 'Date Title',
				'desc' => 'Change the name of the "Date" field to another of your choice.',
				'id'   => $prefix . 'meta_projectdatetitle',
				'type' => 'text',
			),
			array(
				'name' => 'Skills Title',
				'desc' => 'Change the name of the "Skills" field to another of your choice.',
				'id'   => $prefix . 'meta_projectskillstitle',
				'type' => 'text',
			),
			array(
				'name' => 'Project Link Title',
				'desc' => 'Change the name of the "Link" field to another of your choice.',
				'id'   => $prefix . 'meta_projecturltitle',
				'type' => 'text',
			),
		),
	);

	$meta_boxes[] = array(
		'id'         => 'thinkup_portfolioinfo',
		'title'      => 'ThinkUpThemes.com - Portfolio Options',
		'pages'      => array( 'page' ), // Post type
		'context'    => 'normal',
		'priority'   => 'default',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name'    => 'Portfolio Layout',
				'desc' => 'Select Portfolio page layout. This will only be applied to this portfolio page.',
				'id'      => $prefix . 'meta_portfoliolayout',
				'type'    => 'radio',
				'options' => array(
					array( 'name' => 'Default', 'value' => 'option1', true ),
					array( 'name' => '1 Column', 'value' => 'option2', true ),
					array( 'name' => '2 Column', 'value' => 'option3', true ),
					array( 'name' => '3 Column', 'value' => 'option4', true ),
					array( 'name' => '4 Column', 'value' => 'option5', true ),
				),
			),
			array(
				'name' => 'Portfolio Content',
				'desc' => 'Check to enable page specific portfolio content.',
				'id'   => $prefix . 'meta_portfolioswitch',
				'type' => 'checkbox',
			),
			array(
				'name' => 'Title',
				'desc' => 'Check to show project title.',
				'id'   => $prefix . 'meta_portfoliotitle',
				'type' => 'checkbox',
			),
			array(
				'name' => 'Excerpt',
				'desc' => 'Check to show project excerpt.',
				'id'   => $prefix . 'meta_portfolioexcerpt',
				'type' => 'checkbox',
			),
			array(
				'name' => 'Link',
				'desc' => 'Check to show project link.',
				'id'   => $prefix . 'meta_portfoliolink',
				'type' => 'checkbox',
			),
			array(
				'name' => 'Lightbox',
				'desc' => 'Check to show image lightbox.',
				'id'   => $prefix . 'meta_portfoliolightbox',
				'type' => 'checkbox',
			),
		),
	);

	$meta_boxes[] = array(
		'id'         => 'thinkup_metaboxgeneraloptions_page',
		'title'      => 'ThinkUpThemes.com - General Page Options Panel',
		'pages'      => array( 'page', 'portfolio' ), // Post type
		'context'    => 'normal',
		'priority'   => 'default',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name' => 'Enable Slider',
				'desc' => 'Check to enable page slider.',
				'id'   => $prefix . 'meta_slider',
				'type' => 'checkbox',
			),
			array(
				'name' => 'Slider Name',
				'desc' => 'Input the shortcode of a slider you would like to use.',
				'id'   => $prefix . 'meta_slidername',
				'type' => 'text',
			),
			array(
				'name'    => 'Page Layout',
				'desc'    => 'Select a layout for this page.<br />Choose the default option to use the layout chosen in the main options panel.',
				'id'      => $prefix . 'meta_layout',
				'type'    => 'radio',
				'options' => array(
					array( 'name' => 'Default', 'value' => 'option1', ),
					array( 'name' => 'Full Width', 'value' => 'option2', ),
					array( 'name' => 'Left Sidebar', 'value' => 'option3', ),
					array( 'name' => 'Right Sidebar', 'value' => 'option4', ),
				),
			),
			array(
					'name' => 'Select a Sidebar',
					'desc' => 'Choose a sidebar to use with the page layout.',
					'id' => $prefix . 'meta_sidebars',
					'type' => 'sidebar_select',
			),
			array(
				'name'    => 'Enable Breadcrumbs',
				'desc'    => 'Select Default to use the options set in the Theme Options panel.',
				'id'      => $prefix . 'meta_breadcrumbs',
				'type'    => 'radio_inline',
				'options' => array(
					array( 'name' => 'Default', 'value' => 'option1', ),
					array( 'name' => 'Enable', 'value' => 'option2', ),
					array( 'name' => 'Disable', 'value' => 'option3', ),
				),
			),
			array(
				'name' => 'Custom CSS',
				'desc' => 'Developers can use this to apply custom css that will only load on this post/page. Use this to control, by styling of any element on the webpage by targeting id&#39;s and classes.<br /><br />Code written here will load after any custom css written in the main options panel.',
				'id'   => $prefix . 'meta_customcss',
				'type' => 'textarea_small',
			),
			array(
				'name' => 'Custom jQuery',
				'desc' => 'Developers can use this to apply custom css that will only load on this post/page. Use this to control, by styling of any element on the webpage by targeting id&#39;s and classes.<br /><br />Code written here will load after any custom jQuery written in the main options panel.',
				'id'   => $prefix . 'meta_customjava',
				'type' => 'textarea_small',
			),
		),
	);
	
	$meta_boxes[] = array(
		'id'         => 'thinkup_metaboxgeneraloptions_post',
		'title'      => 'ThinkUpThemes.com - General Post Options Panel',
		'pages'      => array( 'post' ), // Post type
		'context'    => 'normal',
		'priority'   => 'default',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name' => 'Enable Slider',
				'desc' => 'Check to enable page slider.',
				'id'   => $prefix . 'meta_slider',
				'type' => 'checkbox',
			),
			array(
				'name' => 'Slider Name',
				'desc' => 'Input the shortcode of a slider you would like to use.',
				'id'   => $prefix . 'meta_slidername',
				'type' => 'text',
			),
			array(
				'name'    => 'Post Layout',
				'desc'    => 'Select a layout for this page.<br />Choose the default option to use the layout chosen in the main options panel.',
				'id'      => $prefix . 'meta_layout',
				'type'    => 'radio',
				'options' => array(
					array( 'name' => 'Default', 'value' => 'option1', ),
					array( 'name' => 'Full Width', 'value' => 'option2', ),
					array( 'name' => 'Left Sidebar', 'value' => 'option3', ),
					array( 'name' => 'Right Sidebar', 'value' => 'option4', ),
				),
			),
			array(
					'name' => 'Select a Sidebar',
					'desc' => 'Choose a sidebar to use with the post layout.',
					'id' => $prefix . 'meta_sidebars',
					'type' => 'sidebar_select',
			),
			array(
				'name'    => 'Enable Breadcrumbs',
				'desc'    => 'Select Default to use the options set in the Theme Options panel.',
				'id'      => $prefix . 'meta_breadcrumbs',
				'type'    => 'radio_inline',
				'options' => array(
					array( 'name' => 'Default', 'value' => 'option1', ),
					array( 'name' => 'Enable', 'value' => 'option2', ),
					array( 'name' => 'Disable', 'value' => 'option3', ),
				),
			),
			array(
				'name'    => 'Enable Comments',
				'desc'    => 'Select Default to use the options set in the Theme Options panel.',
				'id'      => $prefix . 'meta_comment',
				'type'    => 'radio_inline',
				'options' => array(
					array( 'name' => 'Default', 'value' => 'option1', ),
					array( 'name' => 'Enable', 'value' => 'option2', ),
					array( 'name' => 'Disable', 'value' => 'option3', ),
				),
			),
			array(
				'name' => 'Enable Author Bio',
				'desc' => 'Check to enable the author biography on this page.',
				'id'   => $prefix . 'meta_authorbio',
				'type'    => 'radio_inline',
				'options' => array(
					array( 'name' => 'Default', 'value' => 'option1', ),
					array( 'name' => 'Enable', 'value' => 'option2', ),
					array( 'name' => 'Disable', 'value' => 'option3', ),
				),
			),
			array(
				'name' => 'Enable Social Sharing',
				'desc' => 'Check to enable social media sharing on this post.',
				'id'   => $prefix . 'meta_share',
				'type'    => 'radio_inline',
				'options' => array(
					array( 'name' => 'Default', 'value' => 'option1', ),
					array( 'name' => 'Enable', 'value' => 'option2', ),
					array( 'name' => 'Disable', 'value' => 'option3', ),
				),
			),
			array(
				'name' => 'Custom CSS',
				'desc' => 'Developers can use this to apply custom css that will only load on this post/page. Use this to control, by styling of any element on the webpage by targeting id&#39;s and classes.<br /><br />Code written here will load after any custom css written in the main options panel.',
				'id'   => $prefix . 'meta_customcss',
				'type' => 'textarea_small',
			),
			array(
				'name' => 'Custom jQuery',
				'desc' => 'Developers can use this to apply custom css that will only load on this post/page. Use this to control, by styling of any element on the webpage by targeting id&#39;s and classes.<br /><br />Code written here will load after any custom jQuery written in the main options panel.',
				'id'   => $prefix . 'meta_customjava',
				'type' => 'textarea_small',
			),
		),
	);

	$meta_boxes[] = array(
		'id'         => 'thinkup_metaboxseo',
		'title'      => 'ThinkUpThemes.com - SEO',
		'pages'      => array( 'page', 'post', 'portfolio' ), // Post type
		'context'    => 'normal',
		'priority'   => 'default',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name' => 'Enable SEO?',
				'desc' => 'Check to enable SEO features on this page.',
				'id'   => $prefix . 'meta_seoswitch',
				'type' => 'checkbox',
			),
			array(
				'name' => 'Page Title',
				'desc' => 'This title will only be shown on the this individual published page / post.',
				'id'   => $prefix . 'meta_seotitle',
				'type' => 'text',
			),
			array(
				'name' => 'Page Description',
				'desc' => 'Write a short and snappy description about what your webpage is about.',
				'id'   => $prefix . 'meta_seodescription',
				'type' => 'textarea_small',
			),
			array(
				'name' => 'Page Keywords (Comma Separated)',
				'desc' => 'Add keywords that are relevant for your webpage. (e.g. Keyword 1, Keyword 2, Keyword 3, etc...)',
				'id'   => $prefix . 'meta_seokeywords',
				'type' => 'textarea_small',
			),
		),
	);

	// Add other metaboxes as needed

	return $meta_boxes;
}


add_action( 'init', 'thinkup_initialize_cmb_meta_boxes', 9999 );
/**
 * Initialize the metabox class.
 */
function thinkup_initialize_cmb_meta_boxes() {

	if ( ! class_exists( 'cmb_Meta_Box' ) )
		require_once 'init.php';

}