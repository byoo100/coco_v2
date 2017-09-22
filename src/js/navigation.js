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
	const $navLinks = $( '#primary-menu a' );

	const $langToggle = $( '#language-toggle' );
	const $langDropDown = $( '#language-dropdown' );


	$mobileOpen.click(() => {
		$navigation.addClass('active');
		$darkOverlay.addClass('active');
	});

	$mobileClose.click(() => {
		closeMenu();
	});

	$darkOverlay.click(() => {
		closeMenu();
	});

	$langToggle.click(() => {
		$langDropDown.toggleClass('collapsed');
	});


	function closeMenu() {
		$navigation.removeClass('active');
		$darkOverlay.removeClass('active');
	}




		var navOffset = ( window.innerWidth < 992 ) ? 60 : 80;

		$(window).resize(() => {
			navOffset = ( window.innerWidth < 992 ) ? 60 : 80;
		});


		// Anchor Scroll Links
		$('#primary-menu a[href*="#"]')
		  // Remove links that don't actually link to anything
		  .not('[href="#"]')
		  .not('[href="#0"]')
		  .click(function(event) {
		    // On-page links
		    if (
		      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
		      &&
		      location.hostname == this.hostname
		    ) {
		      // Figure out element to scroll to
		      var target = $(this.hash);
		      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
		      // Does a scroll target exist?
		      if (target.length) {
		        // Only prevent default if animation is actually gonna happen
		        event.preventDefault();
						closeMenu();
		        $('html, body').animate({
		          scrollTop: target.offset().top - navOffset
		        }, 1000, function() {
		          // Callback after animation
		          // Must change focus!
		          var $target = $(target);
		          $target.focus();
		          if ($target.is(":focus")) { // Checking if the target was focused
		            return false;
		          } else {
		            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
		            $target.focus(); // Set focus again
		          };
		        });
		      }
		    }
		  });


} )(jQuery);
