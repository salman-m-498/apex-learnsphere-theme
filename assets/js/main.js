/**
 * Apex LearnSphere — front-end behaviour.
 * Header scroll state, mobile panel, dropdowns and scroll reveal.
 */
( function () {
	'use strict';

	var header = document.getElementById( 'masthead' );
	var toggle = document.querySelector( '.nav-toggle' );
	var nav = document.getElementById( 'site-navigation' );

	// Header: transparent at the very top, floating glass once the page scrolls.
	if ( header ) {
		var SCROLL_THRESHOLD = 4;
		var ticking = false;

		var updateHeader = function () {
			ticking = false;
			header.classList.toggle( 'is-scrolled', window.pageYOffset > SCROLL_THRESHOLD );
		};

		window.addEventListener(
			'scroll',
			function () {
				if ( ! ticking ) {
					ticking = true;
					window.requestAnimationFrame( updateHeader );
				}
			},
			{ passive: true }
		);

		updateHeader();
	}

	function setNav( open ) {
		if ( ! toggle || ! nav ) {
			return;
		}
		nav.classList.toggle( 'is-open', open );
		toggle.setAttribute( 'aria-expanded', open ? 'true' : 'false' );
		if ( header ) {
			header.classList.toggle( 'is-menu-open', open );
		}
	}

	function closeDropdowns( except ) {
		if ( ! nav ) {
			return;
		}
		nav.querySelectorAll( '.menu-item-has-children.is-open' ).forEach( function ( item ) {
			if ( item !== except ) {
				item.classList.remove( 'is-open' );
				var link = item.querySelector( 'a' );
				if ( link ) {
					link.setAttribute( 'aria-expanded', 'false' );
				}
			}
		} );
	}

	if ( toggle && nav ) {
		toggle.addEventListener( 'click', function () {
			setNav( ! nav.classList.contains( 'is-open' ) );
		} );

		// Dropdown parents: placeholder links ("#") open their submenu on click.
		nav.querySelectorAll( '.menu-item-has-children > a' ).forEach( function ( link ) {
			var href = link.getAttribute( 'href' );
			var isPlaceholder = ! href || '#' === href;

			link.setAttribute( 'aria-haspopup', 'true' );
			link.setAttribute( 'aria-expanded', 'false' );

			if ( isPlaceholder ) {
				link.setAttribute( 'role', 'button' );
				link.addEventListener( 'click', function ( e ) {
					var item = link.parentNode;
					var open = ! item.classList.contains( 'is-open' );
					e.preventDefault();
					closeDropdowns( item );
					item.classList.toggle( 'is-open', open );
					link.setAttribute( 'aria-expanded', open ? 'true' : 'false' );
				} );
			}
		} );

		// Close the mobile panel when a real link is followed.
		nav.addEventListener( 'click', function ( e ) {
			var link = e.target.closest( 'a' );
			if ( link && 'button' !== link.getAttribute( 'role' ) ) {
				setNav( false );
			}
		} );

		document.addEventListener( 'click', function ( e ) {
			if ( ! e.target.closest( '.menu-item-has-children' ) ) {
				closeDropdowns();
			}
		} );

		document.addEventListener( 'keydown', function ( e ) {
			if ( 'Escape' === e.key ) {
				closeDropdowns();
				if ( nav.classList.contains( 'is-open' ) ) {
					setNav( false );
					toggle.focus();
				}
			}
		} );
	}

	// Hero visitor journey: choose an audience, then show the relevant pathway.
	var journeyTrigger = document.getElementById( 'hero-journey-trigger' );
	var journeyDialog = document.getElementById( 'hero-journey' );

	if ( journeyTrigger && journeyDialog && 'function' === typeof journeyDialog.showModal ) {
		var audienceStep = journeyDialog.querySelector( '[data-journey-step="audiences"]' );
		var audienceChoices = journeyDialog.querySelectorAll( '[data-journey-choice]' );
		var journeyDetails = journeyDialog.querySelectorAll( '[data-journey-detail]' );
		var selectedAudience = '';

		var resetJourney = function () {
			selectedAudience = '';
			audienceStep.hidden = false;
			journeyDetails.forEach( function ( detail ) {
				detail.hidden = true;
			} );
		};

		journeyTrigger.addEventListener( 'click', function ( event ) {
			event.preventDefault();
			resetJourney();
			journeyDialog.showModal();
			if ( audienceChoices.length ) {
				audienceChoices[ 0 ].focus();
			}
		} );

		journeyDialog.addEventListener( 'click', function ( event ) {
			var closeButton = event.target.closest( '[data-journey-close]' );
			if ( closeButton ) {
				journeyDialog.close();
				return;
			}

			var choice = event.target.closest( '[data-journey-choice]' );
			if ( choice ) {
				selectedAudience = choice.getAttribute( 'data-journey-choice' );
				audienceStep.hidden = true;
				journeyDetails.forEach( function ( detail ) {
					var isSelected = detail.getAttribute( 'data-journey-detail' ) === selectedAudience;
					detail.hidden = ! isSelected;
					if ( isSelected ) {
						detail.querySelector( 'h3' ).focus();
					}
				} );
				return;
			}

			if ( event.target.closest( '[data-journey-back]' ) ) {
				journeyDetails.forEach( function ( detail ) {
					detail.hidden = true;
				} );
				audienceStep.hidden = false;
				var previousChoice = journeyDialog.querySelector( '[data-journey-choice="' + selectedAudience + '"]' );
				if ( previousChoice ) {
					previousChoice.focus();
				}
				return;
			}

			// Close only when the actual backdrop (not empty dialog padding) is clicked.
			if ( event.target === journeyDialog ) {
				var bounds = journeyDialog.getBoundingClientRect();
				if ( event.clientX < bounds.left || event.clientX > bounds.right || event.clientY < bounds.top || event.clientY > bounds.bottom ) {
					journeyDialog.close();
				}
			}
		} );

		journeyDialog.addEventListener( 'close', resetJourney );
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
			{ threshold: 0.08, rootMargin: '0px 0px -40px 0px' }
		);

		revealEls.forEach( function ( el ) {
			observer.observe( el );
		} );
	} else {
		revealEls.forEach( function ( el ) {
			el.classList.add( 'is-visible' );
		} );
	}
} )();
