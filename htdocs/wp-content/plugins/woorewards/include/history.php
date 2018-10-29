<?php
namespace LWS\WOOREWARDS;

// don't call the file directly
if( !defined( 'ABSPATH' ) ) exit();

class History
{
	const TimeFormatLocal = "Y-m-d H:i:s";

	public function __construct()
	{
		add_filter( 'lws_woorewards_points_updated' , array( $this , 'add') , 8 , 4 );
		add_action( 'wp_ajax_lws_woorewards_historic', array( $this, 'echoAndDie') );
		add_shortcode( 'woorewards_historic' , array( $this , 'show' ) );
	}

	/** Create a table to keep user point history. */
	static function create()
	{
		global $wpdb;
		$table_name = $wpdb->prefix.'lws_wr_historic';
		$charset_collate = $wpdb->get_charset_collate();

		$added = ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name);

		$sql = "CREATE TABLE $table_name (
			id bigint(20) NOT NULL AUTO_INCREMENT,
			user_id bigint(20) NOT NULL,
			mvt_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
			points_moved smallint(5) NOT NULL,
			commentar text NOT NULL,
			PRIMARY KEY id  (id),
			KEY `user_id` (`user_id`)
			) $charset_collate;";
		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta( $sql );

		if( $added )
			self::closure();
	}

	/** reset all point history, and write a first line to recap total of previous period.
	 * @param $userId if set, reset only for the given user. */
	static private function closure($user_id=null)
	{
		global $wpdb;
		$table = $wpdb->prefix.'lws_wr_historic';

		$sql = "SELECT user_id, meta_value FROM {$wpdb->usermeta} WHERE meta_key='lws_wr_points'";
		if( !is_null($user_id) && is_numeric($user_id) && $user_id>0 )
			$sql .= sprintf(" AND user_id=%d", intval($user_id));
		$points = $wpdb->get_results($sql, OBJECT);

		$wpdb->query("TRUNCATE $table");
		$data = array(
			'user_id' => 0,
			'points_moved' => 0,
			'commentar' => __("Closure", 'woorewards-pro')
		);
		$format = array('%d', '%d', '%s');
		foreach( $points as $p )
		{
			$data['user_id'] = $p->user_id;
			$data['points_moved'] = $p->meta_value;
			$wpdb->insert( $table, $data, $format );
		}
	}

	// this function to add a row in the table, automatic chained when you add points to a user
	public function add( $new_points, $user_id, $comment, $old_count )
	{
		global $wpdb;
		$wpdb->insert( $wpdb->prefix.'lws_wr_historic',
			array(
				'user_id' => $user_id,
				'points_moved' => ($new_points - $old_count),
				'commentar' => $comment
			),
			array(
				'%d',
				'%s',
				'%s'
			)
		);
		return $new_points;
	}

	/** shortcode: return the user point history as html table. */
	public function show()
	{
		// in this case, we suppose it's the user that is logged on
		$user_id = \get_current_user_id();
		// once we got it, we ll return the historic of this user
		return $this->showByUser( $user_id );
	}

	/** ajax: echo the user point history as html table and die. */
	public function echoAndDie()
	{
		if( isset($_POST['user_id']) && is_numeric($_POST['user_id']) )
		{
			$user_id = intval($_POST['user_id']);
			echo $this->showByUser( $user_id );
			wp_die( '', '', array('response' => null) );
		}
	}

	/** format a user point history as html table. */
	public function showByUser( $user_id )
	{
		$total = \get_user_meta( $user_id, 'lws_wr_points', true );
		if( empty($total) )
			$total = 0;
		$label = __("Total", LWS_WOOREWARDS_DOMAIN);
		$histo = "<div class='lws-woorewards-historic-show-current'>";
		$histo .= "<span class='lws-woorewards-historic-show-current-label'>$label</span>";
		$histo .= "<span class='lws-woorewards-historic-show-current-points'>$total</span>";
		$histo .= "</div>";

		$results = $this->getByUser( $user_id );
		if( !empty($results) )
		{
			$format_date = get_option( 'date_format' );
			$format_time = get_option( 'time_format' );
			$list = "";
			foreach( $results as $one_result )
			{
				$date = date_i18n( $format_date , strtotime($one_result->mvt_date) );
				$time = date_i18n( $format_time , strtotime($one_result->mvt_date) );
				$commentar = $one_result->commentar;

				$value = sprintf("%+d",$one_result->points_moved);

				$list .= "<div class='lws-woorewards-historic-points-row'>";
				$list .= "<div class='lws-woorewards-historic-points-cell-date'>$date</div>";
				$list .= "<div class='lws-woorewards-historic-points-cell-time'>$time</div>";
				$list .= "<div class='lws-woorewards-historic-points-cell-commentar'>$commentar</div>";
				$list .= "<div class='lws-woorewards-historic-points-cell-points'>$value</div>";
				$list .= "</div>";
			}
			$histo .= "<div class = 'lws-woorewards-historic-points'>$list</div>";
		}
		return $histo;
	}

	/** @return a user point history as an array */
	public function getByUser( $lws_user )
	{
		global $wpdb;
		$query = '';
		if( !empty($lws_user) )
		{
			$query = "SELECT mvt_date, points_moved , commentar FROM " . $wpdb->prefix.'lws_wr_historic' . " WHERE user_id = '" . $lws_user ."' ORDER BY mvt_date DESC";
		}
		$results = $wpdb->get_results( $query , OBJECT );

		$results = apply_filters('lws_woorewards_historic_result_list' , $results);

		return $results;
	}

}
?>
