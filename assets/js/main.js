/**
 * Apex LearnSphere — front-end behaviour.
 * Full-screen index menu, scroll reveal, kinetic hero headline, ascent-line draw.
 */
( function () {
	'use strict';

	// Full-screen overlay menu.
	var overlay = document.getElementById( 'site-menu' );
	var openBtn = document.querySelector( '[data-menu-open]' );
	var closeBtn = document.querySelector( '[data-menu-close]' );

	function setMenu( open ) {
		if ( ! overlay ) {
			return;
		}
		document.body.classList.toggle( 'menu-open', open );
		overlay.classList.toggle( 'is-open', open );
		overlay.setAttribute( 'aria-hidden', open ? 'false' : 'true' );
		if ( openBtn ) {
			openBtn.setAttribute( 'aria-expanded', open ? 'true' : 'false' );
		}
		if ( closeBtn ) {
			closeBtn.setAttribute( 'aria-expanded', open ? 'true' : 'false' );
		}
	}

	if ( overlay ) {
		if ( openBtn ) {
			openBtn.addEventListener( 'click', function () {
				setMenu( true );
			} );
		}
		if ( closeBtn ) {
			closeBtn.addEventListener( 'click', function () {
				setMenu( false );
			} );
		}
		overlay.addEventListener( 'click', function ( e ) {
			if ( e.target.closest( 'a' ) ) {
				setMenu( false );
			}
		} );
		document.addEventListener( 'keydown', function ( e ) {
			if ( e.key === 'Escape' && overlay.classList.contains( 'is-open' ) ) {
				setMenu( false );
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
