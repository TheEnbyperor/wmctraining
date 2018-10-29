<?php
namespace LWS\WOOREWARDS;
if( !defined( 'ABSPATH' ) ) exit();

class PointList extends \LWS\Adminpanel\EditList\Source
{
	public function __construct()
	{
		add_action('lws_woorewards_new_coupons_generated', array($this, 'newCoupons'), 10, 1);
		$this->newCoupons = 0;
	}

	/** $param coupons (array) coupons ids. */
	function newCoupons($coupons)
	{
		$this->newCoupons = count($coupons);
	}

	function input()
	{
		$fields = "<fieldset class='lws-editlist-fieldset col50'>";
		$fields .= "<div class='lws-editlist-title'>".__("User Information", LWS_WOOREWARDS_DOMAIN)."</div>";
		$fields .= "<label><span class='lws-editlist-opt-title lws-small-height'>".__("User Id", LWS_WOOREWARDS_DOMAIN)."</span>";
		$fields .= "<span class='lws-editlist-opt-text lws-small-height' data-name='_customerid'></span></label>";
		$fields .= "<label><span class='lws-editlist-opt-title lws-small-height'>".__("Name", LWS_WOOREWARDS_DOMAIN)."</span>";
		$fields .= "<span class='lws-editlist-opt-text lws-small-height' data-name='_customername'></span></label>";
		$fields .= "<label><span class='lws-editlist-opt-title lws-small-height'>".__("E-mail", LWS_WOOREWARDS_DOMAIN)."</span>";
		$fields .= "<span class='lws-editlist-opt-text lws-small-height' data-name='_customeremail'></span></label>";
		$fields .= "<label><span class='lws-editlist-opt-title lws-small-height'>".__("City", LWS_WOOREWARDS_DOMAIN)."</span>";
		$fields .= "<span class='lws-editlist-opt-text lws-small-height' data-name='_customercity'></span></label>";
		$fields .= "</fieldset>";

		$fields .= "<fieldset class='lws-editlist-fieldset col50'>";
		$fields .= "<div class='lws-editlist-title'>".__("Points Information", LWS_WOOREWARDS_DOMAIN)."</div>";
		$fields .= "<label><span class='lws-editlist-opt-title'>".__("Current Points", LWS_WOOREWARDS_DOMAIN)."</span>";
		$fields .= "<span class='lws-editlist-opt-text' data-name='_actualpoints'></span></label>";
		$fields .= "<label><span class='lws-editlist-opt-title'>".__("New Total", LWS_WOOREWARDS_DOMAIN)."</span>";
		$fields .= "<span class='lws-editlist-opt-input'><input class='lws-input' type='text' autocomplete='off' name='protectednewpoints'/></span>";
		$fields .= " <span class='lws-rw-points-diff'></span></label>";
		$fields .= "</fieldset>";

		$str = "<div class='lws-pointlist-user'>";
		$str .= "<input type='hidden' name='_customerid'>";
		$str .= "<input type='hidden' name='_customeremail'>";
		$str .= "<input type='hidden' name='_customername'>";
		$str .= "<input type='hidden' name='_customercity'>";
		$str .= "<input type='hidden' name='_actualpoints'>";
		$str .= "<input type='hidden' name='protectedID'>";
		$str .= apply_filters('lws_woorewards_pointlist_input', $fields);
		$str .= "</div>";
		return $str;
	}

	function labels()
	{
		return apply_filters('lws_woorewards_pointlist_labels', array(
			"_customerid" => array(__("Login", LWS_WOOREWARDS_DOMAIN), "15%"),
			"_customeremail" => array(__("Email", LWS_WOOREWARDS_DOMAIN) , "25%"),
			"_customername" => array(__("Name", LWS_WOOREWARDS_DOMAIN)),
			"_customercity" => array(__("City", LWS_WOOREWARDS_DOMAIN), "15%"),
			"_actualpoints" => array(__("Points", LWS_WOOREWARDS_DOMAIN), "8%"),
			"_couponcount" => array(__("Coupons", LWS_WOOREWARDS_DOMAIN), "8%")
		));
	}

	private function pointsLinks($points, $user_id)
	{
		$user_id = esc_attr($user_id);
		return "<a class='lws-wr-show-historic' data-user='$user_id'>$points</a>";
	}

	private function couponsLinks($count, $user_id)
	{
		if( $count > 0 )
		{
			$user_id = esc_attr($user_id);
			return "<a class='lws-wr-show-coupons' data-user='$user_id'>$count</a>";
		}
		else
			return $count;
	}

	function read($limit)
	{
		global $wpdb;
		$tmp = array();
		$sql = $this->users($limit);
		$users_found = $wpdb->get_results($sql, OBJECT);

		if( !is_null($users_found) )
		{
			foreach( $users_found as  $user )
			{
				$current_point = intval($user->points);
				$tmp[] = array(
					"_customerid" => htmlentities($user->user_login),
					"_customeremail" => htmlentities($user->user_email),
					"_customername" => htmlentities($user->display_name),
					"_customercity" => htmlentities(is_null($user->billing_city) ? '' : $user->billing_city),
					"_actualpoints" => $this->pointsLinks($current_point, $user->user_id),
					"protectedID" => $user->user_id,
					"protectednewpoints" => $current_point,
					"_couponcount" => $this->couponsLinks($user->coupons, $user->user_id)
				);
			}
		}
		else
			error_log("MySql error: cannot read users.");
		return apply_filters('lws_woorewards_pointlist_read', $tmp, $limit);
	}

	protected function couponCountQuery()
	{
		global $wpdb;
		$sub = "SELECT post_author, COUNT(ID) as c FROM {$wpdb->posts} as p";
		$sub .= " LEFT JOIN {$wpdb->postmeta} as l ON p.ID = l.post_id AND l.meta_key='usage_limit'";
		$sub .= " LEFT JOIN {$wpdb->postmeta} as c ON p.ID = c.post_id AND c.meta_key='usage_count'";
		$sub .= " LEFT JOIN {$wpdb->postmeta} as e ON p.ID = e.post_id AND e.meta_key='expiry_date'";
		$sub .= " WHERE p.post_type='shop_coupon' AND p.post_status='publish'";
		$sub .= " AND (e.meta_value IS NULL OR e.meta_value='' OR e.meta_value>=CURRENT_DATE())";
		$sub .= " AND (c.meta_value IS NULL OR l.meta_value IS NULL OR c.meta_value < l.meta_value)";
		$sub .= " GROUP BY post_author";
		return $sub;
	}

	/// @return the sql request to get the users
	protected function users($limit, $countOnly=false)
	{
		global $wpdb;
		$sql = "";
		$fields = array('user_login', 'user_email', 'display_name');
		if( $countOnly )
		{
			$sql = "SELECT COUNT(u.ID) FROM {$wpdb->users} as u";
			if( isset($_GET['userpointfilter']) && !empty(trim($_GET['userpointfilter'])) )
			{
				$sub = $this->couponCountQuery();
				$sql .= "\nLEFT JOIN ($sub) as pc ON u.ID = pc.post_author";
				$sql .= "\nLEFT JOIN {$wpdb->usermeta} as pts ON u.ID = pts.user_id AND pts.meta_key='lws_wr_points'";
			}
		}
		else
		{
			$sub = $this->couponCountQuery();
			$fields[] = 'm.meta_value';
			$sql = "SELECT u.ID as user_id, user_login, user_email, display_name, m.meta_value as billing_city, pc.c as coupons, pts.meta_value as points FROM {$wpdb->users} as u";
			$sql .= "\nLEFT JOIN {$wpdb->usermeta} as m ON u.ID = m.user_id AND m.meta_key='billing_city'";
			$sql .= "\nLEFT JOIN ($sub) as pc ON u.ID = pc.post_author";
			$sql .= "\nLEFT JOIN {$wpdb->usermeta} as pts ON u.ID = pts.user_id AND pts.meta_key='lws_wr_points'";
		}

		$where = '';
		if( isset($_GET['PointListUserSearch']) && !empty(trim($_GET['PointListUserSearch'])) )
		{
			$search = sanitize_text_field(trim($_GET['PointListUserSearch']));
			$like = "%$search%";
			$searches = array();
			foreach( $fields as $f )
				$searches[] = $wpdb->prepare( "$f LIKE %s", $like );
			$where .= " WHERE (" . implode(' OR ', $searches) . ")";
		}
		if( isset($_GET['userpointfilter']) )
		{
			if( $_GET['userpointfilter'] == 'points' )
			{
				$where .= empty($where) ? " WHERE" : " AND";
				$where .= " pts.meta_value>0";
			}
			else if( $_GET['userpointfilter'] == 'coupon' )
			{
				$where .= empty($where) ? " WHERE" : " AND";
				$where .= " pc.c>0";
			}
		}

		if( !$countOnly )
			$where .= " GROUP BY u.ID, m.meta_value";

		if( !is_null($limit) )
			$where .= $limit->toMysql();

		return $sql . $where;
	}

	function total()
	{
		global $wpdb;
		$sql = $this->users(null, true);
		$c = $wpdb->get_var($sql);
		return (is_null($c) ? -1 : $c);
	}

	function erase( $line )
	{
		return true;
	}

	function write( $line )
	{
		if( ($err = self::invalidArray($line, array('protectedID'=>'i+', 'protectednewpoints'=>'i0'), false, true)) !== false )
			return new \WP_Error('Invalid value', $err);

		$this->newCoupons = 0;
		$userId = $line['protectedID'];
		$comment = __("Adjustment", LWS_WOOREWARDS_DOMAIN);
		$line['protectednewpoints'] = apply_filters('lws_woorewards_set_points_to_user', $line['protectednewpoints'], $userId, $comment );
		$line['_actualpoints'] = $this->pointsLinks($line['protectednewpoints'], $userId);

		require_once LWS_WOOREWARDS_INCLUDES . '/coupons.php';
		$line['_couponcount'] = $this->couponsLinks(Coupons::get_user_coupons($userId, true), $userId);

		if( $this->newCoupons > 0 )
			return \LWS\Adminpanel\EditList\UpdateResult::ok($line, _n("A new coupon has been generated.", "New coupons have been generated.", $this->newCoupons, LWS_WOOREWARDS_DOMAIN));
		else
			return $line;
	}

}
?>
