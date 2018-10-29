<!doctype html>
<?php $template = 'newcoupon'; ?>
<html xmlns='http://www.w3.org/1999/xhtml' class='ie8 wp-toolbar' lang='fr-FR'>
<head><meta charset="utf-8"></head>
<body>
<center><?php echo \wp_get_attachment_image(get_option('lws_woorewards_mail_attribute_headerpic'), 'small') ?></center>
<table class='lwss_selectable lws-main-conteneur' data-type='Main Border'>
<thead>
<tr>
<td class='lwss_selectable lws-top-cell' data-type='Title'>
<?php echo get_option('lws_woorewards_mail_title_'.$template, __("Purchase achievement", LWS_WOOREWARDS_DOMAIN)); ?>
</td>
</tr>
</thead>
<tbody>
<tr>
<td class='lwss_selectable lws-middle-cell' data-type='Explanation'>
<?php echo get_option('lws_woorewards_mail_header_'.$template, __("Achievement details", LWS_WOOREWARDS_DOMAIN)); ?>
</td>
</tr>
<tr>
<td class='lws-middle-cell'>
<table class='lwss_selectable lws-rewards-table' data-type='Rewards Table'>
<tr>
<td>
<div class='lwss_selectable lws-reward-desc' data-type='Reward Description'>Coupon Details</div>
</td>
<td>
<div class='lwss_selectable lws-reward-desc' data-type='Reward Description'>Coupon Code</div>
<div class='lwss_selectable lws-reward-desc' data-type='Reward Description'>Coupon Value</div>
<div class='lwss_selectable lws-reward-desc' data-type='Reward Description'>Expiration Date</div>
</td>
<td>
<div class='lwss_selectable lws-reward-code' data-type='Reward Code'>X75-V5422-DSQ</div>
<div class='lwss_selectable lws-reward-value' data-type='Reward Value'>450<?php echo get_woocommerce_currency_symbol() ?> Discount</div>
<div class='lwss_selectable lws-reward-expiry' data-type='Expiration Date'>31 December 2111</div>
</td>
</tr>
<tr>
<td class='lwss_selectable lws-rewards-sep' data-type='Rewards Separator' colspan='3'></td>
</tr>
</table>
</td>
</tr>
</tbody>
<tfoot>
<tr>
<td class='lwss_selectable lws-bottom-cell' data-type='Footer'><?php echo get_option('lws_woorewards_mail_attribute_footertext', "This e-mail is sent to you by plugins.longwatchstudio.com"); ?></td>
</tr>
</tfoot>
</table>
</body>
</html>
