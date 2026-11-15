/**
 * Apex LearnSphere — event editor field toggling.
 * Shows/hides the location vs. video link, and the "repeats until" field,
 * based on the selected event type and recurrence.
 */
( function () {
	'use strict';

	var typeSelect = document.getElementById( 'event_type' );
	var recurrenceSelect = document.getElementById( 'event_recurrence' );

	if ( ! typeSelect || ! recurrenceSelect ) {
		return;
	}

	var locationRow = document.querySelector( '.apex-field--event_location' );
	var videoRow = document.querySelector( '.apex-field--event_video_url' );
	var untilRow = document.querySelector( '.apex-field--event_recurrence_end' );

	function toggle() {
		if ( locationRow && videoRow ) {
			var online = typeSelect.value === 'online';
			videoRow.style.display = online ? '' : 'none';
			locationRow.style.display = online ? 'none' : '';
		}
		if ( untilRow ) {
			untilRow.style.display = recurrenceSelect.value === 'none' ? 'none' : '';
		}
	}

	typeSelect.addEventListener( 'change', toggle );
	recurrenceSelect.addEventListener( 'change', toggle );
	toggle();
} )();
