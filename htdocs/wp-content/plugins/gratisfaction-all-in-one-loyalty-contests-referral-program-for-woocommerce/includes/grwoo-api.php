<?php

if( ! defined('ABSPATH'))
    exit;

class Grwoo_API extends WP_REST_Controller
{
    public function register_apis()
    {
        register_rest_route('grwoo/v1', '/setSettings', array(
            array(
                'methods'               =>  WP_REST_Server::EDITABLE,
                'callback'              =>  array($this, 'set_settings'),
                'permission_callback'   =>  array($this, 'set_settings_permissions_check'),
                'args'                  =>  array()
            )
        ));
    }
    
    public function set_settings_permissions_check($request)
    {
        return true;
    }
    
    public function set_settings($request)
    {
        $data   =   array('error' => 0);
        
        try
        {
            if(empty($_POST['data']))
                throw new Exception('No config to set');

            if(empty($_POST['data']) || !is_array($_POST['data']))
                throw new Exception('Invalid config to set');

            $config         =	$_POST['data'];
            $app_config     =   gr_get_app_config();
            
            if(!empty($app_config) && is_array($app_config))
                $config     =   array_merge($app_config, $config);
            
            $config['date_updated'] =   time();

            if(gr_set_app_config($config) == FALSE)
                throw new Exception(__('Config file is not created'));
            
            //$data['config'] =   $config;
            $data['msg']    =   __('Settings updated successfully');
        }
        catch(Exception $e)
        {
            $data['error']  =   1;
            $data['msg']    =   $e->getMessage();
        }
        
        return new WP_REST_Response($data, 200);
    }
}