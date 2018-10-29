<?php

/**
 * Uninstalls Gratisfaction
 *
 * Uninstalling removes all user roles, product data, and options.
 *
 * @author  Gratisfaction
 * @package GRWOO
 * @since   3.0
 */

// Check that we should be doing this
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
    exit; // Exit if accessed directly
}
//TODO:store api url into DB
$api_url = 'https://appsmav.com/gr/newapi/v2/';

//Remove switch case for live version
define('APP_ENV', 'DEVELOPMENT');
switch(APP_ENV)
{
    case 'PRODUCTION' :
        $api_url = 'https://appsmav.com/gr/newapi/v2/';
        break;

    case 'STAGING' :
        $api_url = 'https://pp.appsmav.com/gr/newapi/v2/';
        break;

    case 'DEVELOPMENT': default:
        $api_url = 'https://kobra.appsmav.com/dev/ec/newapi/v2/';
        break;
}

try
{
    // Delete stored informations
    $id_shop = get_option('grconnect_shop_id', 0);
    $id_site = get_option('grconnect_appid', 0);
    $payload = get_option('grconnect_payload', 0 );
    delete_option('grconnect_shop_id');
    delete_option('grconnect_appid');
    delete_option('grconnect_payload');
    delete_option('grconnect_admin_email');
    
    $param = array('app'=>'gr', 'plugin_type'=>'WP', 'status'=>'delete', 'id_shop'=>$id_shop, 'id_site'=>$id_site, 'payload'=>$payload);
    $url = $api_url . 'pluginStatus';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_HEADER,0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $param); 
    $response = curl_exec($ch);
    curl_close($ch);

}
catch(Exception $e){}
