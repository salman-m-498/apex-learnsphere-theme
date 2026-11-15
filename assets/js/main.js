/**
 * Apex LearnSphere — front-end behaviour.
 * Lightweight: mobile nav toggle + subtle scroll reveal.
 */
( function () {
	'use strict';

	// Mobile navigation toggle.
	var toggle = document.querySelector( '.nav-toggle' );
	var nav = document.getElementById( 'site-navigation' );

	if ( toggle && nav ) {
		toggle.addEventListener( 'click', function () {
			var isOpen = nav.classList.toggle( 'is-open' );
			toggle.setAttribute( 'aria-expanded', isOpen ? 'true' : 'false' );
		} );

		// Close menu when a link is clicked (mobile).
		nav.addEventListener( 'click', function ( e ) {
			if ( e.target.closest( 'a' ) && nav.classList.contains( 'is-open' ) ) {
				nav.classList.remove( 'is-open' );
				toggle.setAttribute( 'aria-expanded', 'false' );
			}
		} );
	}

	// Subtle scroll reveal for elements marked .reveal.
	var revealEls = document.querySelectorAll( '.reveal' );
	if ( 'IntersectionObserver' in window && revealEls.length ) {
		var observer = new IntersectionObserver(
			function ( entries ) {
				entries.forEach( function ( entry ) {
					if ( entry.isIntersecting ) {
						entry.target.classList.add( 'is-visible' );
						observer.unobserve( entry.target );
					}
				} );
			},
			{ threshold: 0.12, rootMargin: '0px 0px -40px 0px' }
		);

		revealEls.forEach( function ( el ) {
			observer.observe( el );
		} );
	} else if ( revealEls.length ) {
		revealEls.forEach( function ( el ) {
			el.classList.add( 'is-visible' );
		} );
	}
} )();
