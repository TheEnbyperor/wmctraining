<?php
/**
*
* fieldconfig for thinkupshortcodes/General Settings
*
* @package Thinkupshortcodes
* @author Think Up Themes Ltd contact@thinkupthemes.com
* @license GPL-2.0+
* @link www.thinkupthemes.com
* @copyright 2017 Think Up Themes Ltd
*/


$group = array(
	'label' => __('General Settings','thinkupshortcodes'),
	'id' => '01133412',
	'master' => 'width',
	'fields' => array(
		'width'	=>	array(
			'label'		=> 	__('Table Width (px)','thinkupshortcodes'),
			'caption'	=>	__('Width of the whole pricing table in px.','thinkupshortcodes'),
			'type'		=>	'textfield',
			'default'	=> 	'',
		),
		'linktext'	=>	array(
			'label'		=> 	__('Buy Now Text (optional)','thinkupshortcodes'),
			'caption'	=>	__('Change the text of the ','thinkupshortcodes'),
			'type'		=>	'textfield',
			'default'	=> 	'',
		),
	),
	'multiple'	=> false,
);

