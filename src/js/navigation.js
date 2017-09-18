/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
( function($) {

	const $mobileOpen = $( '.mobile-open' );
	const $mobileClose = $( '#mobile-close' );
	const $darkOverlay = $( '#dark-overlay' );
	const $navigation = $( '#site-navigation' );

	const $langToggle = $( '#language-toggle' );
	const $langDropDown = $( '#language-dropdown' );


	$mobileOpen.click(() => {
		$navigation.addClass('active');
		$darkOverlay.addClass('active');
	});

	$mobileClose.click(() => {
		$navigation.removeClass('active');
		$darkOverlay.removeClass('active');
	});

	$darkOverlay.click(() => {
		$navigation.removeClass('active');
		$darkOverlay.removeClass('active');
	});

	$langToggle.click(() => {
		$langDropDown.toggleClass('collapsed');
	});


} )(jQuery);
