( function( api ) {

	// Extends our custom "publisho-1" section.
	api.sectionConstructor['publisho-1'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
