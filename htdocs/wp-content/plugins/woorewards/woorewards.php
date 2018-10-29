<?php
/**
 * Plugin Name: WooRewards
 * Description: Rewarding and Fidelity system for WooCommerce.
 * Plugin URI: https://plugins.longwatchstudio.com
 * Author: Long Watch Studio
 * Author URI: https://longwatchstudio.com
 * Version: 2.5.0
 * License: Copyright LongWatchStudio 2018
 * Text Domain: woorewards
 * Domain Path: /languages
 * WC requires at least: 3.0.0
 * WC tested up to: 3.4.5
 *
 * Copyright (c) 2018 Long Watch Studio (email: contact@longwatchstudio.com). All rights reserved.
 *
 *
 */


// don't call the file directly
if( !defined( 'ABSPATH' ) ) exit();

require_once dirname(__FILE__) . '/assets/tgm-with-merge.php';

/**
 * @class LWS_ERP_Frontend The class that holds the entire plugin
 */

final class LWS_WooRewards
{

	public static function init()
	{
		static $instance = false;
		if( !$instance )
		{
			$instance = new self();
			$instance->defineConstants();
			$instance->load_plugin_textdomain();

			add_action( 'tgmpa_register', array($instance, 'registerRequiredPlugins'), PHP_INT_MAX );
			add_action( 'lws_adminpanel_register', array($instance, 'admin') );
			add_action( 'lws_adminpanel_plugins', array($instance, 'update') );
			add_filter( 'plugin_action_links_'.plugin_basename( __FILE__ ), array($instance, 'extensionListActions'), 10, 2 );
			add_filter( 'plugin_row_meta', array($instance, 'addLicenceLink'), 10, 4 );
			add_filter( 'lws_adminpanel_purchase_url_woorewards', array($instance, 'addPurchaseUrl'), 10, 1 );
			add_filter( 'lws_adminpanel_plugin_version_woorewards', array($instance, 'addPluginVersion'), 10, 1 );
			add_filter( 'lws_adminpanel_documentation_url_woorewards', array($instance, 'addDocUrl'), 10, 1 );

			$instance->install();

			register_activation_hook( __FILE__, 'LWS_WooRewards::activation' );
		}
		return $instance;
	}

	public function v()
	{
		static $version = '';
		if( empty($version) ){
			if( !function_exists('get_plugin_data') ) require_once(ABSPATH . 'wp-admin/includes/plugin.php');
			$data = \get_plugin_data(__FILE__, false);
			$version = (isset($data['Version']) ? $data['Version'] : '0');
		}
		return $version;
	}

	/** Load translation file
	 * If called via a hook like this
	 * @code
	 * add_action( 'plugins_loaded', array($instance,'load_plugin_textdomain'), 1 );
	 * @endcode
	 * Take care no text is translated before. */
	function load_plugin_textdomain() {
		load_plugin_textdomain( LWS_WOOREWARDS_DOMAIN, FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
	}

	/**
	 * Define the plugin constants
	 *
	 * @return void
	 */
	private function defineConstants()
	{
		define( 'LWS_WOOREWARDS_VERSION', $this->v() );
		define( 'LWS_WOOREWARDS_FILE', __FILE__ );
		define( 'LWS_WOOREWARDS_DOMAIN', 'woorewards' );

		define( 'LWS_WOOREWARDS_PATH', dirname( LWS_WOOREWARDS_FILE ) );
		define( 'LWS_WOOREWARDS_INCLUDES', LWS_WOOREWARDS_PATH . '/include' );
		define( 'LWS_WOOREWARDS_SNIPPETS', LWS_WOOREWARDS_PATH . '/snippets' );
		define( 'LWS_WOOREWARDS_ASSETS', LWS_WOOREWARDS_PATH . '/assets' );

		define( 'LWS_WOOREWARDS_URL', plugins_url( '', LWS_WOOREWARDS_FILE ) );
		define( 'LWS_WOOREWARDS_JS', plugins_url( '/js', LWS_WOOREWARDS_FILE ) );
		define( 'LWS_WOOREWARDS_CSS', plugins_url( '/css', LWS_WOOREWARDS_FILE ) );
	}

	public function extensionListActions($links, $file)
	{
		$label = __('Settings'); // use standart wp sentence, no text domain
		$url = add_query_arg(array('page'=>LWS_WOOREWARDS_DOMAIN), admin_url('admin.php'));
		array_unshift($links, "<a href='$url'>$label</a>");
		$label = __('Help'); // use standart wp sentence, no text domain
		$url = esc_attr($this->addDocUrl(''));
		$links[] = "<a href='$url'>$label</a>";
		return $links;
	}

	public function addLicenceLink($links, $file, $data, $status)
	{
		if( (!defined('LWS_WOOREWARDS_ACTIVATED') || !LWS_WOOREWARDS_ACTIVATED) && plugin_basename(__FILE__)==$file)
		{
			$label = __('Add Licence Key', LWS_WOOREWARDS_DOMAIN);
			$url = add_query_arg(array('page'=>LWS_WOOREWARDS_DOMAIN, 'tab'=>'license'), admin_url('admin.php'));
			$links[] = "<a href='$url'>$label</a>";
		}
		return $links;
	}

	public function addPurchaseUrl($url)
	{
		return __("https://plugins.longwatchstudio.com/en/product/woorewards-en/", LWS_WOOREWARDS_DOMAIN);
	}

	public function addPluginVersion($url)
	{
		return $this->v();
	}


	public function addDocUrl($url)
	{
		return __("https://plugins.longwatchstudio.com/en/documentation-en/woorewards/", LWS_WOOREWARDS_DOMAIN);
	}

	function admin()
	{
		if( function_exists('get_woocommerce_currency_symbol') ) // WooCommerce must be activated first
		{
			require_once LWS_WOOREWARDS_INCLUDES . '/admin.php';
			new \LWS\WOOREWARDS\Admin();
		}
	}

	public function update()
	{
		lws_register_update(__FILE__, null, md5(\get_class() . __FUNCTION__));
		$activated = lws_require_activation(__FILE__, null, null, md5(\get_class() . __FUNCTION__));
		lws_extension_showcase(__FILE__);
		define( 'LWS_WOOREWARDS_ACTIVATED', $activated );
	}

	private function install()
	{
		require_once LWS_WOOREWARDS_INCLUDES . '/coupons.php';
		require_once LWS_WOOREWARDS_INCLUDES . '/userpoints.php';
		require_once LWS_WOOREWARDS_INCLUDES . '/mailer.php';
		require_once LWS_WOOREWARDS_INCLUDES . '/mailernewcoupon.php';
		require_once LWS_WOOREWARDS_INCLUDES . '/history.php';
		new \LWS\WOOREWARDS\Coupons();
		new \LWS\WOOREWARDS\UserPoints();
		new \LWS\WOOREWARDS\Mailer();
		new \LWS\WOOREWARDS\MailerNewCoupon();
		new \LWS\WOOREWARDS\History();

		$this->updateVersion();
		add_action('wp_enqueue_scripts', array( $this , 'css' ) );
	}

	private function updateVersion()
	{
		$oldVersion = get_option('lws_woorewards_version', '0');
		if( version_compare($oldVersion, $this->v(), '<') )
		{
			if( version_compare($oldVersion, '1.3.0', '<') )
			{
				require_once LWS_WOOREWARDS_INCLUDES . '/history.php';
				\LWS\WOOREWARDS\History::create();
			}

			update_option('lws_woorewards_version', $this->v());
		}
	}

	public function css()
	{
		wp_enqueue_style( 'woorewards-css' , LWS_WOOREWARDS_CSS . '/woorewards.css', array('lws-adminpanel-css'), LWS_WOOREWARDS_VERSION );
	}

	/** Add elements we need on this plugin to work */
	public static function activation()
	{
		add_option( 'lws_woorewards_mail_subject_newcoupon', __('You got a new coupon', LWS_WOOREWARDS_DOMAIN) );
		add_option( 'lws_woorewards_mail_title_newcoupon', __('New Coupon', LWS_WOOREWARDS_DOMAIN) );
		add_option( 'lws_woorewards_mail_header_newcoupon', __('Here is the new coupon code you just got', LWS_WOOREWARDS_DOMAIN) );

		add_option( 'lws_woorewards_mail_attribute_footertext' , __('WooRewards by Long Watch Studio' , LWS_WOOREWARDS_DOMAIN) );
	}

	/** @see http://tgmpluginactivation.com/configuration/ */
	function registerRequiredPlugins()
	{
		$plugins = array(
			array(
				'name'		=> 'WooCommerce',
				'slug'		=> 'woocommerce',
				'required'=> true,
				'version'	=> '3.0.0',
				'force_activation'	=> true,
			)
		);

		$config = array(
			'id'           => LWS_WOOREWARDS_DOMAIN,
			'default_path' => '',
			'parent_slug'  => 'plugins.php',
			'capability'   => 'activate_plugins',
			'has_notices'  => true,
			'dismissable'  => false,
			'dismiss_msg'  => tgm_hack_the7_script(),
			'is_automatic' => true,                   // Automatically activate plugins after installation or not.
			'strings'      => array(
				'page_title'                      => __( 'Install Required Plugins Dependencies', LWS_WOOREWARDS_DOMAIN ),
				'menu_title'                      => __( 'Install Dependencies', LWS_WOOREWARDS_DOMAIN ),
				'notice_can_install_required'     => _n_noop(
					'This plugin requires the following plugin: %1$s.',
					'This plugin requires the following plugins: %1$s.',
					LWS_WOOREWARDS_DOMAIN
				),
				'notice_can_install_recommended'  => _n_noop(
					'This plugin recommends the following plugin: %1$s.',
					'This plugin recommends the following plugins: %1$s.',
					LWS_WOOREWARDS_DOMAIN
				)
			)
		);
		if( function_exists('tgmpa') )
			tgmpa( $plugins, $config );
	}
}
LWS_WooRewards::init();

@include_once dirname(__FILE__) . '/assets/lws-adminpanel/lws-adminpanel.php';
@include_once dirname(__FILE__) . '/modules/woorewards-pro/woorewards-pro.php';

?>
