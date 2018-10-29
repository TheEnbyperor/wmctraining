<?php
/**
* WordPress Calls To Action Template Config File
* Template Name:  Forum Skins - Saran's 6 pack
* @package  WordPress Calls To Action
* @author 	InboundNow
*/

//gets template directory name to use as identifier - do not edit - include in all template files
$key = basename(dirname(__FILE__));
$this_path = WP_CTA_UPLOADS_PATH.$key.'/';
$url_path = WP_CTA_UPLOADS_URLPATH.$key.'/';

$wp_cta_data[$key]['info'] =
array(
	'data_type' => "template", // datatype
	'version' => "1.0", // Version Number
	'label' => "Forum Skins - Saran's 6 pack", // Nice Name
	'category' => 'Forms', // Template Category
	'demo' => 'http://demo.inboundnow.com/go/form-styling-saran/', // Demo Link
	'description'  => 'This template implements CSS styling to forms contained in call to action.', // template description
	'path' => $this_path, //path to template folder
	'urlpath' => $url_path //urlpath to template folder
);



$wp_cta_data[$key]['settings'] =
array(	
    array(
        'label' => 'Select Style Template',
        'description' => "Select which CSS Template to use on form.",
        'id'  => 'form-class',
        'type'  => 'dropdown',
        'default'  => 'basic-grey',
        'context'  => 'normal',
		'options' => array(
						'basic-grey' => 'Basic Grey',
						'elegant-aero' => 'Elegant Aero',
						'smart-green' => 'Smart Green',
						'white-pink' => 'White Pink',
						'bootstrap-frm' => 'Boostrap',
						'dark-matter' => 'Dark Matter'
					)
		),
    array(
        'label' => 'Call to Action Content',
        'description' => "Insert call to action content here. ",
        'id'  => 'content-text',
        'type'  => 'wysiwyg',
        'default'  => ' ',
        'context'  => 'normal'
        ),
    array(
        'label' => 'Form Headline',
        'description' => "Insert form headline here.",
        'id'  => 'headline-text',
        'type'  => 'text',
        'default'  => 'Contact Form',
        'context'  => 'normal'
        ),
    array(
        'label' => 'Form Sub-Headline',
        'description' => "Insert form sub-headline here.",
        'id'  => 'sub-headline-text',
        'type'  => 'text',
        'default'  => 'Please fill all the texts in the fields.',
        'context'  => 'normal'
        )
    );
	


/* define dynamic template markup */
$wp_cta_data[$key]['markup'] = file_get_contents($this_path . 'index.php');