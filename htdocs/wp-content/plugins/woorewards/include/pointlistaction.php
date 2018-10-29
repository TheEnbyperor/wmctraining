<?php
namespace LWS\WOOREWARDS;
if( !defined( 'ABSPATH' ) ) exit();

class PointListAction extends \LWS\Adminpanel\EditList\Action
{
	private $keyDiffPts = 'diffpoint';

	function __construct()
	{
		parent::__construct('PointListAction');
		add_action('lws_woorewards_new_coupons_generated', array($this, 'newCoupons'), 10, 1);
	}

	function input()
	{
		$str = "<label><span>".__("Add/Substract points", LWS_WOOREWARDS_DOMAIN);
		$str .= " <input type='text' pattern='[0-9]+' name='{$this->keyDiffPts}' size='4' class='lws-ignore-confirm'></span></label>";
		return $str;
	}

	function newCoupons($coupons)
	{
		if( !empty($coupons) )
		{
			$content = _n("A new coupon has been generated.", "New coupons have been generated.", count($coupons), LWS_WOOREWARDS_DOMAIN);
			add_action('admin_notices', function() use ($content) {
				echo "<div class='lws_notice-new-coupon notice notice-info is-dismissible'><p>$content</p></div>";
			});
		}
	}

	function apply( $itemsIds )
	{
		// get diff value
		if( !isset($_POST[$this->keyDiffPts]) || !is_numeric($_POST[$this->keyDiffPts]) )
			return false;
		$diffpts = intval($_POST[$this->keyDiffPts]);
		$comment = __("Commercial operation");
		if( $diffpts != 0 )
		{
			foreach($itemsIds as $id)
			{
				if( is_numeric($id) )
					do_action('lws_woorewards_add_points_to_user', $diffpts, $id, $comment);
			}
		}
		return true;
	}

}
?>
