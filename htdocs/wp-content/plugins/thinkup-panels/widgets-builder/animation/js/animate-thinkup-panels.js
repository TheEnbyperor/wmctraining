/**
 * @copyright Think Up Themes Ltd http://www.thinkupthemes.com
 * @license GPL 2.0
 */

(function($) {

	jQuery(document).ready(function() {

		jQuery( 'div[class*="animated start-"]' ).waypoint(
			function(event, direction) {
			
				if ( jQuery(window).width() > 768 ) {
					var time = jQuery(this).attr('title');
				} else {
					var time = 0;				
				}

				jQuery(this).delay( time ).queue(function(next){
				
					value = $(this).attr( 'class' ).replace( 'start-', '' );
					jQuery(this).removeClass (function (index, css) {
						return (css.match (/\bstart-\S+/g) || []).join(' ');
					}).addClass( value );
					jQuery(this).removeAttr( 'title' );
				});	
			}, {
			offset: 'bottom-in-view'
		});
	});

})(jQuery); // end self-invoked wrapper function