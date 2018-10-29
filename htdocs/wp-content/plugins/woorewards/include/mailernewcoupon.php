<?php
namespace LWS\WOOREWARDS;

// don't call the file directly
if( !defined( 'ABSPATH' ) ) exit();

require_once LWS_WOOREWARDS_INCLUDES . '/mailer.php';

/*
Class that will be used for new coupon used by woorewards
*/
class MailerNewCoupon
{
	protected $template = 'newcoupon';

	public function __construct()
	{
		add_filter( 'lws_woorewards_specified_mails', array( $this , 'settings' ) );
		add_filter( 'lws_woorewards_mail_body_' . $this->template, array( $this , 'coupon_list' ), 10, 3 );
		add_filter( 'lws_woorewards_mail_style_' . $this->template, array( $this , 'style' ), 10, 2 );
	}

	public function settings( $mails )
	{
		$mails[$this->template] = array(
			'title' => __( "New Coupon", LWS_WOOREWARDS_DOMAIN ),
			'text' => __("Send to a user when a new coupon is generated for him.", LWS_WOOREWARDS_DOMAIN),
			'css' => LWS_WOOREWARDS_CSS . '/mail.css',
			'demo' => LWS_WOOREWARDS_SNIPPETS.'/mail.php'
		);
		return $mails;
	}

	public function style( $style, $args )
	{
		$cssFilePath = LWS_WOOREWARDS_CSS . '/mail.css';
		$fieldId = 'lws_woorewards_mail_template_' . $this->template;
		return apply_filters('stygen_inline_style', $style, $cssFilePath, $fieldId);
	}

	private function currency()
	{
		if( !function_exists('get_woocommerce_currency_symbol') )
			require_once WP_PLUGIN_DIR . '/woocommerce/includes/wc-core-functions.php';
		return get_woocommerce_currency_symbol();
	}

	public function coupon_list( $html, $coupon_id, $args )
	{
		$info = $this->couponInfos($coupon_id);
		$txt = array(
			__("Coupon Details", LWS_WOOREWARDS_DOMAIN),
			__("Coupon Code", LWS_WOOREWARDS_DOMAIN),
			__("Coupon Value", LWS_WOOREWARDS_DOMAIN),
			__("Expiration Date", LWS_WOOREWARDS_DOMAIN)
		);

		$ul = array();
		foreach($info as $c )
		{
			$li = "<td><div class='lwss_selectable lws-reward-desc' data-type='Reward Description'>{$txt[0]}</div></td>";

			$li .= "<td>";
			$li .= "<div class='lwss_selectable lws-reward-desc' data-type='Reward Description'>{$txt[1]}</div>";
			$li .= "<div class='lwss_selectable lws-reward-desc' data-type='Reward Description'>{$txt[2]}</div>";
			if( !empty($c->expiration_date) )
				$li .= "<div class='lwss_selectable lws-reward-desc' data-type='Reward Description'>{$txt[3]}</div>";
			$li .= "</td>";

			$li .= "<td>";
			$li .= "<div class='lwss_selectable lws-reward-code' data-type='Reward Code'>{$c->code}</div>";
			$li .= "<div class='lwss_selectable lws-reward-value' data-type='Reward Value'>{$c->value}</div>";
			if( !empty($c->expiration_date) )
				$li .= "<div class='lwss_selectable lws-reward-expiry' data-type='Expiration Date'>{$c->expiration_date}</div>";
			$li .= "</td>";

			$ul[] = "<tr>$li</tr>";
		}

		$html .= "<tr><td class='lws-middle-cell'><table class='lwss_selectable lws-rewards-table' data-type='Rewards Table'>";
		$html .= implode("<tr><td class='lwss_selectable lws-rewards-sep' data-type='Rewards Separator' colspan='3'></td></tr>", $ul);
		$html .= "</table></td></tr>";
		return $html;
	}

	/** @return an array of coupon object with id, code, amount, expiration_date */
	protected function couponInfos($coupon_id)
	{
		$format = \get_option('date_format');
		$coupons = array();

		if( \is_wp_error($coupon_id) )
		{
			// assume a test
			for( $i=0 ; $i<3 ; $i++ )
			{
				$c = new \stdClass();
				$c->id = 0;
				$c->code = sprintf(__("TEST__%d", LWS_WOOREWARDS_DOMAIN), $i);
				$c->amount = random_int(1, 999);
				$c->expiration_date = random_int(0, 10*$i);
				if( !empty($c->expiration_date) )
					$c->expiration_date = date_i18n($format, strtotime($c->expiration_date));
				$c->value = \wc_price($c->amount);
				$coupons[] = $c;
			}
		}
		else
		{
			$ids = is_array($coupon_id) ? $coupon_id : array($coupon_id);
			foreach( $ids as $id )
			{
				$wcCoupon = new \WC_Coupon($id);
				$c = new \stdClass();
				$c->id = $id;
				$c->code = strtoupper($wcCoupon->get_code());
				$c->expiration_date = $wcCoupon->get_date_expires();//\get_post_meta($id, 'expiry_date', true);
				if( !empty($c->expiration_date) )
					$c->expiration_date = $c->expiration_date->date_i18n($format);
				$c->value = \wc_price($wcCoupon->get_amount());
				$coupons[] = $c;
			}
		}
		return $coupons;
	}
}
?>
