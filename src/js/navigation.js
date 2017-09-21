/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */

const ScrollMagic = require('scrollmagic');
const ScrollScene = require('scrollmagic');

( function($) {

	const $mobileOpen = $( '.mobile-open' );
	const $mobileClose = $( '#mobile-close' );
	const $darkOverlay = $( '#dark-overlay' );

	const $navigation = $( '#site-navigation' );
	const $navLinks = $( '#primary-menu a' );

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


	// init controller

	var controller = new ScrollMagic.Controller();

	var pin = new ScrollMagic.Scene({
		triggerElement: "#home-location",
	}).setPin('#masthead')
		.addTo(controller)




} )(jQuery);
