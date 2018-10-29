<?php
/**
*
* fieldconfig for thinkupshortcodes/General
*
* @package Thinkupshortcodes
* @author Think Up Themes Ltd contact@thinkupthemes.com
* @license GPL-2.0+
* @link www.thinkupthemes.com
* @copyright 2017 Think Up Themes Ltd
*/


$group = array(
	'label' => __('General','thinkupshortcodes'),
	'id' => '1561373',
	'master' => 'id',
	'fields' => array(
		'id'	=>	array(
			'label'		=> 	__('Post ID','thinkupshortcodes'),
			'caption'	=>	__('Input the project ID number.','thinkupshortcodes'),
			'type'		=>	'smalltextfield',
			'default'	=> 	'',
		),
		'link_icon'	=>	array(
			'label'		=> 	__('Link Icon','thinkupshortcodes'),
          'caption'   =>  '',
			'type'		=>	'onoff',
			'default'	=> 	'*on||on,off||off',
			'inline'	=> 	true,
		),
		'lightbox_icon'	=>	array(
			'label'		=> 	__('Lightbox Icon','thinkupshortcodes'),
          'caption'   =>  '',
			'type'		=>	'onoff',
			'default'	=> 	'*on||on,off||off',
			'inline'	=> 	true,
		),
		'title'	=>	array(
			'label'		=> 	__('Title (on or off)','thinkupshortcodes'),
			'caption'	=>	__('Toggle post title','thinkupshortcodes'),
			'type'		=>	'onoff',
			'default'	=> 	'on,*off',
			'inline'	=> 	true,
		),
		'tags'	=>	array(
			'label'		=> 	__('Tags (on or off)','thinkupshortcodes'),
			'caption'	=>	__('Toggle post tags','thinkupshortcodes'),
			'type'		=>	'onoff',
			'default'	=> 	'on,*off',
			'inline'	=> 	true,
		),
		'style'	=>	array(
			'label'		=> 	__('style','thinkupshortcodes'),
			'caption'	=>	__('Choose the style for the portfolio carousel','thinkupshortcodes'),
			'type'		=>	'dropdown',
			'default'	=> 	'style1,style2',
		),
		'size'	=>	array(
			'label'		=> 	__('size','thinkupshortcodes'),
			'caption'	=>	__('Add an image size (see media library for available sizes)','thinkupshortcodes'),
			'type'		=>	'smalltextfield',
			'default'	=> 	'',
		),
	),
	'styles'	=> array(
		'toggles.css',
	),
	'scripts'	=> array(
		'toggles.min.js',
	),
	'multiple'	=> false,
);

