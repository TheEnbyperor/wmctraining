/**
 * @copyright Think Up Themes Ltd http://www.thinkupthemes.com
 * @license GPL 2.0 or later
 */

(function($) {

	$( '.gmap3' ).each(function( index, element ){

		$( element ).attr( 'id', 'thinkupbuilder-gmap-' + index );

			// Collect map parameter values
			var scrollwheel  = $( element ).data( 'scrollwheel' );
			var wide         = $( element ).data( 'wide' );
			
			// Switch on / off zoom with mouse scroll
/*			if ( scrollwheel == 'on' ) {
				scrollwheel = true;
			} else {
				scrollwheel = false;
			}*/

			// Format row section for full-screen map
			if ( wide == 'on' ) {		
				$( element ).closest( '.panel-grid' ).css( 'padding', 0 );
				$( element ).closest( '.panel-grid-core' ).css( 'margin', 0 ).css( 'maxWidth', '100%' );
				$( element ).closest( '.panel-grid-cell' ).css( 'padding', 0 );
			}
	});
})(jQuery); // end self-invoked wrapper function