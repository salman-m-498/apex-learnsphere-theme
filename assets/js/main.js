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

	// Count-up numbers for the stats band.
	var counters = document.querySelectorAll( '.count[data-count]' );
	var reduceMotion = window.matchMedia( '(prefers-reduced-motion: reduce)' ).matches;

	if ( counters.length ) {
		var runCount = function ( el ) {
			var target = parseInt( el.getAttribute( 'data-count' ), 10 ) || 0;
			if ( reduceMotion ) {
				el.textContent = target;
				return;
			}
			var duration = 1300;
			var start = null;
			var step = function ( ts ) {
				if ( ! start ) {
					start = ts;
				}
				var progress = Math.min( ( ts - start ) / duration, 1 );
				var eased = 1 - Math.pow( 1 - progress, 3 );
				el.textContent = Math.round( eased * target );
				if ( progress < 1 ) {
					window.requestAnimationFrame( step );
				}
			};
			window.requestAnimationFrame( step );
		};

		if ( 'IntersectionObserver' in window ) {
			var countObserver = new IntersectionObserver(
				function ( entries ) {
					entries.forEach( function ( entry ) {
						if ( entry.isIntersecting ) {
							runCount( entry.target );
							countObserver.unobserve( entry.target );
						}
					} );
				},
				{ threshold: 0.5 }
			);
			counters.forEach( function ( el ) {
				countObserver.observe( el );
			} );
		} else {
			counters.forEach( runCount );
		}
	}
} )();
