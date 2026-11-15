/**
 * Apex LearnSphere — front-end behaviour.
 * Mobile nav toggle, scroll reveal, kinetic hero headline, ascent-line draw.
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

	// Kinetic hero headline — mask-reveal on load.
	var heroTitle = document.querySelector( '.hero__title[data-kinetic]' );
	if ( heroTitle ) {
		var showTitle = function () {
			heroTitle.classList.add( 'is-visible' );
		};
		if ( window.matchMedia( '(prefers-reduced-motion: reduce)' ).matches ) {
			showTitle();
		} else {
			window.setTimeout( showTitle, 120 );
		}
	}

	// Ascent line — draws itself when scrolled into view.
	var ascentLine = document.querySelector( '.ascent__line' );
	if ( ascentLine ) {
		var draw = function () {
			ascentLine.classList.add( 'is-drawn' );
		};
		if ( 'IntersectionObserver' in window ) {
			var ascentObserver = new IntersectionObserver(
				function ( entries ) {
					entries.forEach( function ( entry ) {
						if ( entry.isIntersecting ) {
							draw();
							ascentObserver.unobserve( entry.target );
						}
					} );
				},
				{ threshold: 0.3 }
			);
			ascentObserver.observe( ascentLine );
		} else {
			draw();
		}
	}
} )();
