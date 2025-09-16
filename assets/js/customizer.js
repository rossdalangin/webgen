/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Footer Copyright Text
	wp.customize( 'fitpro_footer_copyright_text', function( value ) {
		value.bind( function( to ) {
			// 'to' is the value from the text field in the Customizer.
			// The PHP callback adds the © and year, so the JS should match for a consistent preview.
			$( '.site-info .copyright-text' ).html( '&copy; ' + new Date().getFullYear() + ' ' + to );
		} );
	} );

} )( jQuery );
