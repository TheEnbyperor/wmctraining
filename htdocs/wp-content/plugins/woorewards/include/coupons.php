<?php
namespace LWS\WOOREWARDS;

// don't call the file directly
if (!defined('ABSPATH')) exit();

class Coupons
{
	public function __construct()
	{
		$this->updateLocker = false;
		/** filter 'lws_woorewards_points_updated' expect 4 arguments
		 * @param new_point_total, @param user_id, @param reason, @param previous point total */
		add_filter('lws_woorewards_points_updated', array($this, 'user_points_updated'), 100, 3);
		/** @return a unique coupon code. @param code (empty), @param user_email */
		add_filter('lws_woorewards_new_coupon_label', array($this, 'uniqueRandString'), 10, 2);

		add_filter('lws_woorewards_order_addpoints', array($this, 'addPointsOnSpendMoney'), 10, 2);
		add_filter('lws_woorewards_order_addpoints', array($this, 'addPointsOnOrder'), 10, 2);
		/** sometime we need to get only points on spend money, without points on order */
		add_filter('lws_woorewards_order_addpoints_spend_money', array($this, 'addPointsOnSpendMoney'), 10, 2);

		add_action('plugins_loaded', array($this, 'linkOrderEvent'));
		add_action('wp_ajax_lws_woorewards_coupons', array($this, 'echoAndDie'));
		add_action('lws_woorewards_new_coupons_generated', array($this, 'mailAbout'), 2, 2);
	}

	public function linkOrderEvent()
	{
		$status = apply_filters('lws_woorewards_order_events', array('processing', 'completed'));
		foreach (array_unique($status) as $s)
			add_action('woocommerce_order_status_' . $s, array($this, 'validate_order'), 999999, 2);
	}

	/** take an order into account to add points. */
	public function validate_order($order_id, $order)
	{
		if (!$this->readSettings())
			return false;

		$userId = $order->get_customer_id();
		$this->user = empty($userId) ? false : \get_user_by('ID', $userId);
		if ($this->user == false) {
			//error_log("No user associated to the order $order_id");
		} else if (empty(\get_post_meta($order_id, 'lws_woorewards_validate_order', true))) {
			update_post_meta($order_id, 'lws_woorewards_validate_order', \date(DATE_W3C));

			// add points for the order
			$points_to_add = \apply_filters('lws_woorewards_order_addpoints', 0, $order);
			$comment = sprintf(__("Order (%d)", LWS_WOOREWARDS_DOMAIN), $order_id);
			do_action('lws_woorewards_add_points_to_user', $points_to_add, $this->user->ID, $comment);
		}
	}

	/** Add points when customer spend money */
	public function addPointsOnSpendMoney($points, $order)
	{
		if (!$this->readSettings())
			return false;
		if( $this->min_amount > 0 )
		{
			$total = $order->get_subtotal();
			if( !empty(\get_option('lws_woorewards_order_amount_includes_taxes', '')) )
				$total += $order->get_cart_tax();
			$this->amount = apply_filters('lws_woorewards_order_total', $total, $order);

			$points = floor($this->amount / $this->min_amount) * $this->min_points_attributed;
		}
		return $points;
	}

	/** Add points on order and extra points on first order if set */
	public function addPointsOnOrder($points, $order)
	{
	    if( \apply_filters('lws_woorewards_order_points_eligible', 0, $order) ) {
			if (($orderPoints = intval(\get_option('lws_woorewards_rewards_orders', ''))) > 0)
				$points += $orderPoints;
			if (($firstOrderPoints = intval(\get_option('lws_woorewards_rewards_orders_first', ''))) > 0) {
				global $wpdb;
				$nbOrders = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM {$wpdb->posts}
				INNER JOIN {$wpdb->postmeta} ON ID = post_id AND meta_key = '_customer_user' AND meta_value = %d
				WHERE post_type = 'shop_order'", $order->get_customer_id()));
				if ($nbOrders <= 1)
					$points += $firstOrderPoints;
			}
		}
		return $points;
	}

	/** When user points change, we try to generate coupon. */
	public function user_points_updated($points, $user_id, $reason)
	{
		if (!apply_filters('lws_woorewards_new_coupons_locked', $this->updateLocker)) {
			if (!$this->readSettings())
				return $points;

			if (!empty($this->min_points) && !empty($this->min_coupon_value)) {
				$this->user = get_user_by('id', $user_id);
				if ($this->user === false) {
					error_log("Coupons - User unknown ($user_id)");
					return $points;
				}

				$this->updateLocker = true;

				$reason = __("Coupon (%s)", LWS_WOOREWARDS_DOMAIN);
				$coupon_ids = array();
				while ($points >= $this->min_points) {
					$coupon = $this->generate($this->user);
					if ($coupon !== false && is_object($coupon) && isset($coupon->id)) {
						$coupon_ids[] = $coupon->id;
						$points = apply_filters('lws_woorewards_add_points_to_user', -$this->min_points, $this->user->ID, sprintf($reason, $coupon->code));
					}
				}
				if (!empty($coupon_ids))
					do_action('lws_woorewards_new_coupons_generated', $coupon_ids, $this->user->user_email);

				$this->updateLocker = false;
			}
		}
		return $points;
	}

	private function settingsError($error)
	{
		error_log('Coupons - ' . $error);
		$this->settingsRead = false;
		return false;
	}

	private function readSettings()
	{
		if (!isset($this->settingsRead)) {
			// if min amount to get points there
			$this->min_amount = @intval(\get_option('lws_woorewards_value', 0));
			if ($this->min_amount < 0)
				return $this->settingsError('Order Amount settings is not valid');

			// if points rewarded is there
			$this->min_points_attributed = @intval(\get_option('lws_woorewards_points', 0));
			if ($this->min_points_attributed < 0)
				return $this->settingsError('Coupon Points Value settings is not valid');

			// if a stage of points is there
			$this->min_points = @intval(\get_option('lws_woorewards_stage', 0));
			if ($this->min_points < 0)
				return $this->settingsError('Coupon Points Floor settings is not valid');

			// if coupon value is there
			$this->min_coupon_value = @intval(\get_option('lws_woorewards_value_coupon', 0));
			if ($this->min_coupon_value < 0)
				return $this->settingsError('Coupon Value settings is not valid');

			$this->lifetime = absint(\get_option('lws_woorewards_expiry_days', ''));

			$this->settingsRead = true;
		}
		return $this->settingsRead;
	}

	/* generates the coupon
	 * @return a coupon object with {id, code} */
	private function generate($user)
	{
		if (!$this->readSettings())
			return false;

		if (!is_email($user->user_email)) {
			error_log("Coupons::generate - invalid email for user {$user->ID}");
			return false;
		}

		$coupon = new \stdClass();
		$coupon->code = apply_filters('lws_woorewards_new_coupon_label', "", $user->user_email);

		$coupon->id = $this->createPost($coupon->code, $user);
		if ($coupon->id == 0) {
			error_log('Coupons::generate - unable to insert post');
			return false;
		}

		$post_data = array(
			'discount_type' => 'fixed_cart',
			'coupon_amount' => $this->min_coupon_value,
			'individual_use' => 'no',
			'product_ids' => '',
			'exclude_product_ids' => '',
			'usage_limit' => '1',
			'usage_limit_per_user' => '1',
			'limit_usage_to_x_items' => '',
			'free_shipping' => 'no',
			'exclude_sale_items' => 'no',
			'product_categories' => array(),
			'exclude_product_categories' => array(),
			'minimum_amount' => '',
			'maximum_amount' => '',
			'customer_email' => array($user->user_email)
		);
		if (!empty($this->lifetime))
			$post_data['expiry_date'] = (new \DateTime())->add(new \DateInterval("P{$this->lifetime}D"))->format("Y-m-d");

		$post_data = apply_filters('lws_woorewards_coupon_data', $post_data, $coupon->id);
		foreach ($post_data as $k => $v)
			\update_post_meta($coupon->id, $k, $v);
		return $coupon;
	}

	/** @param $coupons array of post id. */
	function mailAbout($coupons, $email)
	{
		do_action('lws_woorewards_send_mail', $email, $coupons, 'newcoupon');
	}

	private function createPost($code, $user)
	{
		$post = array(
			'post_title' => $code,
			'post_content' => sprintf(
				__('Set coupon code <b>%1$s</b> in your cart to enjoy <b>%2$s</b> discount.', LWS_WOOREWARDS_DOMAIN),
				$code,
				\wc_price($this->min_coupon_value, array('currency' => \get_option('woocommerce_currency')))
			),
			'post_status' => 'publish',
			'post_author' => $user->ID,
			'post_type' => 'shop_coupon',
			'post_name' => $code
		);
		return \wp_insert_post($post, false);
	}

	public function uniqueRandString($code, $email, $length = 10)
	{
		global $wpdb;
		$code = $this->randString($length);
		$sql = "select count(*) from {$wpdb->posts} as p";
		$sql .= " LEFT JOIN {$wpdb->postmeta} as m ON m.post_id=p.ID AND m.meta_key='customer_email' AND m.meta_value=%s";
		$sql .= " where post_title=%s";
		while (0 < $wpdb->get_var($wpdb->prepare($sql, serialize(array($email)), $code)))
			$code = $this->randString($length);
		return $code;
	}

	/** generate a random coupon label */
	private function randString($length = 10)
	{
		$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';  //abcdefghijklmnopqrstuvwxyz
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}

	static public function get_user_coupons($user_id, $countOnly = false)
	{
		global $wpdb;
		$sql = "SELECT ";
		$sql .= $countOnly ? "COUNT(p.ID)" : "p.post_title as code, e.meta_value as expiry, v.meta_value as amount";
		$sql .= " FROM {$wpdb->posts} as p";
		$sql .= " LEFT JOIN {$wpdb->postmeta} as e ON p.ID = e.post_id AND e.meta_key='expiry_date' AND (e.meta_value='' OR e.meta_value>=CURRENT_DATE())";
		$sql .= " LEFT JOIN {$wpdb->postmeta} as l ON p.ID = l.post_id AND l.meta_key='usage_limit'";
		$sql .= " LEFT JOIN {$wpdb->postmeta} as u ON p.ID = u.post_id AND u.meta_key='usage_count'";
		if (!$countOnly)
			$sql .= " LEFT JOIN {$wpdb->postmeta} as v ON p.ID = v.post_id AND v.meta_key='coupon_amount'";
		$sql .= " WHERE p.post_author=%d AND p.post_type='shop_coupon' AND p.post_status='publish'";
		$sql .= " AND (u.meta_value < l.meta_value OR u.meta_value IS NULL OR l.meta_value IS NULL)";

		if (!$countOnly)
			return $wpdb->get_results($wpdb->prepare($sql, $user_id));
		else {
			$sql .= " ORDER BY e.meta_value ASC";
			return $wpdb->get_var($wpdb->prepare($sql, $user_id));
		}
	}

	/** ajax: echo the user coupons as html table and die. */
	public function echoAndDie()
	{
		if (isset($_POST['user_id']) && is_numeric($_POST['user_id'])) {
			$user_id = intval($_POST['user_id']);
			$coupons = self::get_user_coupons($user_id);

			$total = count($coupons);
			$label = __("Total", LWS_WOOREWARDS_DOMAIN);
			$head = "<div class='lws-woorewards-historic-show-current'>";
			$head .= "<span class='lws-woorewards-historic-show-current-label'>$label</span>";
			$head .= "<span class='lws-woorewards-historic-show-current-points'>$total</span>";
			$head .= "</div>";
			$list = "";
			$unlimited = __("<i>Unlimited</i>", LWS_WOOREWARDS_DOMAIN);
			foreach ($coupons as $coupon) {
				if (empty($coupon->expiry)) $coupon->expiry = $unlimited;
				$row = "<div class='lws-woorewards-historic-points-cell-code'>{$coupon->code}</div>";
				$row .= "<div class='lws-woorewards-historic-points-cell-expiry'>{$coupon->expiry}</div>";
				$row .= "<div class='lws-woorewards-historic-points-cell-amount'>{$coupon->amount}</div>";
				$list .= "<div class='lws-woorewards-historic-points-row'>$row</div>";
			}
			echo "$head<div class = 'lws-woorewards-historic-points'>$list</div>";
			wp_die('', '', array('response' => null));
		}
	}
}

?>
