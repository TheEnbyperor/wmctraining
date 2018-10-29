<?php

/**
 * Common functions.
 *
 * @author  Gratisfaction
 * @package GRWOO
 * @since   3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

/**
 * Is WooCommerce active?
 *
 * @since 3.0
 *
 * @return bool
 */
function grwoo_woocommerce_active() {
    if ( function_exists( 'woocommerce_active_check' ) ) {
        return woocommerce_active_check();
    }
    
    $active_plugins = (array) get_option( 'active_plugins', array() );

    if ( is_multisite() )
        $active_plugins = array_merge( $active_plugins, get_site_option( 'active_sitewide_plugins', array() ) );

    return in_array( 'woocommerce/woocommerce.php', $active_plugins ) || array_key_exists( 'woocommerce/woocommmerce.php', $active_plugins );
}

/**
 * Woo plugin inactive notice
 */
if ( ! function_exists( 'grwoo_plugin_inactive_notice' ) ) {
    function grwoo_plugin_inactive_notice() {
        if ( ! current_user_can( 'activate_plugins' ) ) {
            return;
        }
        
        $notice = '<strong>' . __( 'Gratisfaction is inactive.', 'gratisfaction' ) . '</strong> ' . __( 'WooCommerce is required for Gratisfaction to work.', 'gratisfaction' );

        printf( "<div class='error'><p>%s</p></div>", $notice );
    }
}

/**
 * Woocommerce coupon disabled notice
 */
if ( ! function_exists( 'grwoo_coupon_disabled_notice' ) ) {
    function grwoo_coupon_disabled_notice() {
        $notice = '<strong>' . __( 'Woocommerce Coupon is disabled.', 'gratisfaction' ) . '</strong> ' . __( 'Enable it to work Gratisfaction coupon.', 'gratisfaction' );

        printf( "<div class='error'><p>%s</p></div>", $notice );
    }
}

if(!function_exists('gr_get_app_config')) {
    function gr_get_app_config() {
        $config         =   array();
        
        try {
            $config_file    =   PLUGIN_BASE_PATH.'/configs/app.json';
            
            if(file_exists($config_file)) {
                $config_json    =   file_get_contents($config_file);
                
                if(!empty($config_json))
                    $config     =   json_decode($config_json, true);
            }
        } catch (Exception $e) {

        }
        
        return $config;
    }
}

if(!function_exists('gr_set_app_config')) {
    function gr_set_app_config($config) {
        try {
            $config_json    =   json_encode($config);
            $config_file    =   PLUGIN_BASE_PATH.'/configs/app.json';
            
            if(file_put_contents($config_file, $config_json) == FALSE) {
                $data   =   json_encode(array(
                   'config'      => $config,
                   'config_file' => $config_file,
                   'shop_id'     => get_option('grconnect_shop_id')
                ));
                
                throw new Exception('Config file is not created');
            }
            
            $ret = TRUE;
        } catch (Exception $e) {
            $ret = FALSE;
        }
        
        return $ret;
    }
}