<?php
/**
*
* fieldconfig for thinkupshortcodes/Package
*
* @package Thinkupshortcodes
* @author Think Up Themes Ltd contact@thinkupthemes.com
* @license GPL-2.0+
* @link www.thinkupthemes.com
* @copyright 2017 Think Up Themes Ltd
*/


$group = array(
	'label' => __('Package','thinkupshortcodes'),
	'id' => '15512936',
	'master' => 'title',
	'fields' => array(
		'title'	=>	array(
			'label'		=> 	__('Title','thinkupshortcodes'),
			'caption'	=>	__('Package name.','thinkupshortcodes'),
			'type'		=>	'textfield',
			'default'	=> 	'',
		),
		'price'	=>	array(
			'label'		=> 	__('Package Price','thinkupshortcodes'),
			'caption'	=>	__('Package price.','thinkupshortcodes'),
			'type'		=>	'textfield',
			'default'	=> 	'',
		),
		'size'	=>	array(
			'label'		=> 	__('Column size?','thinkupshortcodes'),
			'caption'	=>	__('Ensure sizes are comma separated.','thinkupshortcodes'),
			'type'		=>	'textfield',
			'default'	=> 	'',
		),
		'rows'	=>	array(
			'label'		=> 	__('Row Entries','thinkupshortcodes'),
			'caption'	=>	__('Ensure package features are comma separated.','thinkupshortcodes'),
			'type'		=>	'textfield',
			'default'	=> 	'',
		),
		'icons'	=>	array(
			'label'		=> 	__('Icons','thinkupshortcodes'),
			'caption'	=>	__('Add a tick or cross to your package features.','thinkupshortcodes'),
			'type'		=>	'textfield',
			'default'	=> 	'',
		),
		'link'	=>	array(
			'label'		=> 	__('Buy Now Link','thinkupshortcodes'),
			'caption'	=>	__('This is where the buy button points. For external links add http://.','thinkupshortcodes'),
			'type'		=>	'textfield',
			'default'	=> 	'',
		),
	),
	'multiple'	=> true,
);

