<?php
namespace LWS\WOOREWARDS;

// don't call the file directly
if( !defined( 'ABSPATH' ) ) exit();

class UserPoints
{
	public function __construct()
	{
		/** @param @param point_diff (int), user_id (int), @param reason (string)
		 * @return the new point total. */
		add_action('lws_woorewards_add_points_to_user', array($this, 'add'), 10, 3);
		/** @param @param points_total (int), user_id (int), @param reason (string)
		 * @return the new point total. */
		add_filter('lws_woorewards_set_points_to_user', array($this, 'set'), 10, 3);
		/** @param @param points_total (not read), user_id (int)
		 * @return the user point total. */
		add_filter('lws_woorewards_get_user_points', array($this, 'get'), 10, 2);
	}

	/** update points and trigge 'lws_woorewards_points_updated' action. */
	public function add( $points_diff, $user_id, $reason )
	{
		$old = $this->get(0, $user_id);
		$points = max(0, $old + intval($points_diff));
		\update_user_meta( $user_id, 'lws_wr_points', $points );
		$points = apply_filters( 'lws_woorewards_points_updated', $points, $user_id, $reason, $old );
		return $points;
	}

	/** replace points and trigge 'lws_woorewards_points_updated' action. */
	public function set( $points, $user_id, $reason )
	{
		$old = $this->get(0, $user_id);
		$points = max(0, intval($points));
		\update_user_meta( $user_id, 'lws_wr_points', $points );
		$points = apply_filters( 'lws_woorewards_points_updated', $points, $user_id, $reason, $old );
		return $points;
	}

	public function get( $points, $user_id )
	{
		$points = \get_user_meta( $user_id, 'lws_wr_points', true );
		if( empty($points) )
			$points = 0;
		return $points;
	}
}
?>
