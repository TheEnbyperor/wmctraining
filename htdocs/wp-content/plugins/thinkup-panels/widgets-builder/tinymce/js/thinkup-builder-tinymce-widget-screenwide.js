jQuery(document).ready(function() {
	/* Make slider full width of specified */
	jQuery( '.thinkupbuilder-tinymce' ).each(function( index, element ){

		jQuery( element ).attr( 'id', 'thinkupbuilder-tinymce-' + index );

			// Collect slider parameter values
			var wide = jQuery( element ).data( 'wide' );
			
			// Format row section for full-screen slider
			if ( wide == 'on' ) {		
				jQuery( element ).closest( '.panel-grid' ).css( 'padding', 0 );
				jQuery( element ).closest( '.panel-grid-core' ).css( 'margin', 0 ).css( 'maxWidth', '100%' );
				jQuery( element ).closest( '.panel-grid-cell' ).css( 'padding', 0 );
			}
	});
});	