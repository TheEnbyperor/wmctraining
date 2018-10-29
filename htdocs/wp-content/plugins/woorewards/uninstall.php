<?php
if( !defined( 'WP_UNINSTALL_PLUGIN' ) ) exit();
@include_once dirname(__FILE__) . '/modules/woorewards-pro/uninstall.php';

$suffix = 'newcoupon';
delete_option('lws_woorewards_mail_subject_'.$suffix);
delete_option('lws_woorewards_mail_title_'.$suffix);
delete_option('lws_woorewards_mail_header_'.$suffix);
delete_option('lws_woorewards_mail_attribute_footertext');
delete_option('lws_woorewards_mail_attribute_basecolor');
delete_option('lws_woorewards_mail_attribute_backgroundcolor');
delete_option('lws_woorewards_mail_attribute_bodybackgroundcolor');
delete_option('lws_woorewards_mail_attribute_frontcolor');
delete_option('lws_woorewards_mail_attribute_footercolor');

delete_option('lws_woorewards_version');

global $wpdb;
$wpdb->query("DROP TABLE {$wpdb->prefix}lws_wr_historic");

?>
