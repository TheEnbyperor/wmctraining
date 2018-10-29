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
	'id' => '13511152',
	'master' => 'type',
	'fields' => array(
		'type'	=>	array(
			'label'		=> 	__('Type','thinkupshortcodes'),
			'caption'	=>	__('Choose a notification box.','thinkupshortcodes'),
			'type'		=>	'dropdown',
			'default'	=> 	'download,error,info,message,normal,question,stop,success,warning',
		),
	),
	'multiple'	=> false,
);

