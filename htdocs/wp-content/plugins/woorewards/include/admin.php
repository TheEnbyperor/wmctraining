<?php
namespace LWS\WOOREWARDS;

// don't call the file directly
if( !defined( 'ABSPATH' ) ) exit();

require_once LWS_WOOREWARDS_INCLUDES . '/mailer.php';

use \LWS\Adminpanel as AP;

class Admin
{
	public function __construct()
	{
		lws_register_pages($this->pages());
		add_action('admin_enqueue_scripts', array( $this , 'scripts' ) );
	}

	public function scripts($hook)
	{
		if( 'woocommerce_page_woorewards' == $hook )
		{
			wp_enqueue_style( 'woorewards-history' , LWS_WOOREWARDS_CSS . '/history.css', array('lws-adminpanel-css'), LWS_WOOREWARDS_VERSION );

			$guid = 'woorewards-admin';
			wp_enqueue_script( $guid, LWS_WOOREWARDS_JS . '/admin.js', array('jquery'), LWS_WOOREWARDS_VERSION , true );
			$info = array(
				'ajaxUrl' => admin_url('/admin-ajax.php')
			);
			wp_localize_script( $guid, 'lwsWooRewards', $info );
			wp_enqueue_script( $guid );
		}
	}

	protected function pages()
	{
		$pa = array(
			array(
				'id' => 'woocommerce',
				'prebuild' => '1'
			),
			array(
				'id' => LWS_WOOREWARDS_DOMAIN, // id of the page
				'title' => __("WooRewards", LWS_WOOREWARDS_DOMAIN),
				'rights' => 'manage_options', // acces restriction to visit the page
				'tabs' => array(
					'settings' => array(
						'title' => __("General Settings", LWS_WOOREWARDS_DOMAIN),
						'id' => 'settings',
						'groups' => $this->settings()
					),
					'history' => array(
						'rights' => 'edit_others_posts', // acces restriction to visit the page
						'title' => __("Points History and Management", LWS_WOOREWARDS_DOMAIN),
						'id' => 'statistics',
						'groups' => array($this->rewardsHistory()),
						'toc' => false,
						'nosave' => true
					),
					'mails' => array(
						'title' => __("Email Settings", LWS_WOOREWARDS_DOMAIN),
						'id' => 'mails',
						'groups' => $this->emails()
					)
				)
			)
		);
		return $pa;
	}

	protected function rewardsHistory()
	{
		require_once LWS_WOOREWARDS_INCLUDES . '/pointlist.php';
		require_once LWS_WOOREWARDS_INCLUDES . '/pointlistaction.php';
		return array(
			'title' => __("Points History and Management", LWS_WOOREWARDS_DOMAIN),
			'text' => __("Here you can see and manage your customers reward points", LWS_WOOREWARDS_DOMAIN)
				."<br/>".__("You can view the points <b>history</b> by clicking the points total in the table", LWS_WOOREWARDS_DOMAIN),
			'editlist' => lws_editlist(
				'PointList',
				'protectedID',
				new PointList(),
				apply_filters('lws_woorewards_history_mode', AP\EditList::MOD),
				apply_filters('lws_woorewards_history_actions', array(
					new AP\EditList\FilterSimpleLinks(array(
						'' => array('userpointfilter'=>''),
						'points' => array('userpointfilter'=>'points'),
						'coupon' => array('userpointfilter'=>'coupon')
					), array(), false, array(
						'' => __("All", LWS_WOOREWARDS_DOMAIN),
						'points' => __("With points", LWS_WOOREWARDS_DOMAIN),
						'coupon' => __("With coupon", LWS_WOOREWARDS_DOMAIN)
					)),
					new AP\EditList\FilterSimpleField('PointListUserSearch', __('Search...', LWS_WOOREWARDS_DOMAIN)),
					new PointListAction('PointListAction')
				))
			)
		);
	}

	protected function emails()
	{
		$prefix = 'lws_woorewards_mail_attribute_';
		$mails = array(
			'-' => array(
				'title' => __( 'Email Settings' , LWS_WOOREWARDS_DOMAIN ),
				'fields' => array(
					array( 'type' => 'media' , 'title' => __("Header picture", LWS_WOOREWARDS_DOMAIN), 'id' => $prefix.'headerpic' ),
					array( 'type' => 'ace' , 'title' => __("Footer text", LWS_WOOREWARDS_DOMAIN), 'id' => $prefix.'footertext', 'extra' => array('mode'=>'ace/mode/markdown','rows' => 3) )
				)
			)
		);
		if(LWS_WOOREWARDS_ACTIVATED==""){
			$mails['-']['fields'][]=array(
				'id' => 'lws_woorewards_mail_go_pro',
				'type' => 'help',
				'extra' => array(
					'help'=>__("Consider upgrading to <a href='admin.php?page=woorewards&tab=license'>Pro Version</a> to get access to a first class Loyalty Program", LWS_WOOREWARDS_DOMAIN)
				)
			);
		}

		/** @brief add a standart mail customisation bloc
		 * @param mail_suffix=>array(title, text) (array) */
		$specified = apply_filters('lws_woorewards_specified_mails', array());
		foreach( $specified as $suffix => $args )
		{
			$mails[$suffix] = array(
				'title' => $args['title'],
				'text' => $args['text'],
				'fields' => array(
					array(
						'id' => 'lws_woorewards_mail_subject_'.$suffix,
						'title' => __("Subject", LWS_WOOREWARDS_DOMAIN),
						'type' => 'text',
						'extra' => array( 'maxlength' => 350 )
					),
					array(
						'id' => 'lws_woorewards_mail_title_'.$suffix,
						'title' => __("Title", LWS_WOOREWARDS_DOMAIN),
						'type' => 'text',
						'extra' => array( 'maxlength' => 120 )
					),
					array(
						'id' => 'lws_woorewards_mail_header_'.$suffix,
						'title' => __("Header", LWS_WOOREWARDS_DOMAIN),
						'type' => 'ace',
						'extra' => array(
							'mode'=>'ace/mode/markdown',
							'rows' => 3,
							'help' => __("A short text describing the mail purpose.", LWS_WOOREWARDS_DOMAIN)
						)
					),
					array(
						'id' => 'lws_woorewards_email_text_1',
						'type' => 'help' ,
						'extra' => array(
							'help'=>__("
								Once you've finished the email settings, <b>save your changes</b><br/>
								You will then see the result in the style editor below<br/>
								Select the elements you wish to change and have fun!
							", LWS_WOOREWARDS_DOMAIN)
						)
					)
				)
			);

			if( isset($args['fields']) && is_array($args['fields']) && !empty($args['fields']) )
				$mails[$suffix]['fields'] = array_merge($mails[$suffix]['fields'], $args['fields']);

			$mails[$suffix]['fields'] = array_merge($mails[$suffix]['fields'], array(
				array(
					'id' => 'lws_woorewards_mail_template_'.$suffix,
					'type' => 'stygen',
					'extra' => array(
						'html' => $args['demo'],
						'css' => $args['css']
					)
				),
				array(
					'id' => 'lws_woorewards_mail_tester_'.$suffix,
					'title' => __("Receiver Email", LWS_WOOREWARDS_DOMAIN),
					'type' => 'text',
					'extra' => array('help' => __("Test your email to see how it looks", LWS_WOOREWARDS_DOMAIN), 'class'=>'lws-ignore-confirm')
				),
				array(
					'id' => 'lws_woorewards_mail_tester_btn_'.$suffix,
					'title' => __("Send test email", LWS_WOOREWARDS_DOMAIN),
					'type' => 'button',
					'extra' => array('callback' => array($this, 'testMail'))
				)
			));
		}
		return $mails;
	}

	function testMail($id, $data)
	{
		$base = 'lws_woorewards_mail_tester_btn_';
		$len = strlen($base);
		if( substr($id, 0, $len) == $base && !empty($template=substr($id,$len)) && isset($data['lws_woorewards_mail_tester_'.$template]) )
		{
			$email = sanitize_email($data['lws_woorewards_mail_tester_'.$template]);
			if( \is_email($email) )
			{
				do_action('lws_woorewards_send_mail', $email, new \WP_Error(), $template);
				return __("Test email sent.", LWS_WOOREWARDS_DOMAIN);
			}
			else
				return __("Test email is not valid.", LWS_WOOREWARDS_DOMAIN);
		}
		return false;
	}

	protected function settings()
	{
		return array(
			'points' => $this->rewardPointsSettingsGroup(),
			'orders' => $this->rewardOrdersSettingsGroup(),
			'rewards' => $this->rewardTemplateSettingsGroup()
		);
	}

	protected function rewardPointsSettingsGroup()
	{
		return array(
			'title' => __("Reward Points", LWS_WOOREWARDS_DOMAIN),
			'text' => __("Here you can specify the points awarded to customers when they spend money on your shop. Reward Points and Order Points are cumulative. You can choose to use one, the other, or both.", LWS_WOOREWARDS_DOMAIN),
			'fields' => array(
				array(
					'id' => 'lws_woorewards_value',
					'title' => __("Money Spent", LWS_WOOREWARDS_DOMAIN).' ('.\get_woocommerce_currency_symbol().')',
					'type' => 'text',
					'extra' => array('pattern'=>'\d+')
				),
				array(
					'id' => 'lws_woorewards_points',
					'title' => __("Points Awarded", LWS_WOOREWARDS_DOMAIN),
					'type' => 'text',
					'extra' => array('pattern'=>'\d+')
				),
				array(
					'id' => 'lws_woorewards_order_amount_includes_taxes',
					'title' => __("Includes taxes", LWS_WOOREWARDS_DOMAIN),
					'type' => 'box'
				)
			)
		);
	}

	protected function rewardTemplateSettingsGroup()
	{
		$settingsGroup=array(
			'title' => __("Coupons", LWS_WOOREWARDS_DOMAIN),
			'text' => __("Coupons are generated and sent by email to your customers according to the settings below", LWS_WOOREWARDS_DOMAIN),
			'fields' => array(
				array(
					'id' => 'lws_woorewards_stage',
					'title' => __("Points needed to create a coupon", LWS_WOOREWARDS_DOMAIN),
					'type' => 'text',
					'extra' => array('pattern'=>'\d+')
				),
				array(
					'id' => 'lws_woorewards_value_coupon',
					'title' => __("Coupon Value", LWS_WOOREWARDS_DOMAIN).' ('.\get_woocommerce_currency_symbol().')',
					'type' => 'text',
					'extra' => array('pattern'=>'\d+')
				),
				array(
					'id' => 'lws_woorewards_expiry_days',
					'title' => __("Validity Period (days)", LWS_WOOREWARDS_DOMAIN),
					'type' => 'text',
					'extra' => array('pattern'=>'\d+')
				)
			)
		);
		if(LWS_WOOREWARDS_ACTIVATED==""){
			$settingsGroup['fields'][]=array(
				'id' => 'lws_woorewards_go_pro',
				'type' => 'help',
				'extra' => array(
					'help'=>__("If you want to set multiple Rewards for different points tresholds, consider upgrading to <a href='admin.php?page=woorewards&tab=license'>Pro Version</a>", LWS_WOOREWARDS_DOMAIN)
				)
			);
		}
		return $settingsGroup;
	}

	protected function rewardOrdersSettingsGroup()
	{
		$settingsGroup = array(
			'title' => __("Orders Points", LWS_WOOREWARDS_DOMAIN),
			'text' => __("Here you can specify the points awarded to customers when they order on your shop.", LWS_WOOREWARDS_DOMAIN),
			'fields' => array(
				array(
					'id' => 'lws_woorewards_rewards_orders',
					'title' => __("Points on order", LWS_WOOREWARDS_DOMAIN),
					'type' => 'text',
					'extra' => array('pattern'=>'\d+')
				),
				array(
					'id' => 'lws_woorewards_rewards_orders_first',
					'title' => __("Extra Points on first order", LWS_WOOREWARDS_DOMAIN),
					'type' => 'text',
					'extra' => array(
						'pattern'=>'\d+',
						'placeholder'=>'0',
						'help'=>__("These points will be awarded on a customer's first order. It is cumulative with the value above.", LWS_WOOREWARDS_DOMAIN)
					)
				)
			)
		);
		if(LWS_WOOREWARDS_ACTIVATED==""){
			$settingsGroup['fields'][]=array(
				'id' => 'lws_woorewards_go_pro2',
				'type' => 'help',
				'extra' => array(
					'help'=>__("If you want to set a minimum order amount to attribute points, consider upgrading to <a href='admin.php?page=woorewards&tab=license'>Pro Version</a>", LWS_WOOREWARDS_DOMAIN)
				)
			);
		}
		return $settingsGroup;
	}

}

?>
