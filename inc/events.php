<?php
/**
 * Events — Training & Programmes.
 *
 * Registers an "Event" custom post type with structured fields so the client
 * can create in-person and online events themselves (no plugin required).
 *
 * @package apex-learnsphere
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register the Event post type.
 */
function apex_register_event_cpt() {
	$labels = array(
		'name'               => __( 'Events', 'apex-learnsphere' ),
		'singular_name'      => __( 'Event', 'apex-learnsphere' ),
		'add_new'            => __( 'Add New Event', 'apex-learnsphere' ),
		'add_new_item'       => __( 'Add New Event', 'apex-learnsphere' ),
		'edit_item'          => __( 'Edit Event', 'apex-learnsphere' ),
		'new_item'           => __( 'New Event', 'apex-learnsphere' ),
		'view_item'          => __( 'View Event', 'apex-learnsphere' ),
		'search_items'       => __( 'Search Events', 'apex-learnsphere' ),
		'not_found'          => __( 'No events found.', 'apex-learnsphere' ),
		'not_found_in_trash' => __( 'No events found in Trash.', 'apex-learnsphere' ),
		'menu_name'          => __( 'Events', 'apex-learnsphere' ),
	);

	register_post_type(
		'event',
		array(
			'labels'       => $labels,
			'public'       => true,
			'has_archive'  => true,
			'menu_icon'    => 'dashicons-calendar-alt',
			'menu_position' => 5,
			'rewrite'      => array( 'slug' => 'events' ),
			'supports'     => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
			'show_in_rest' => true,
		)
	);

	// Flush rewrite rules once after registration so /events/ URLs resolve.
	if ( ! get_option( 'apex_events_rewrite_flushed' ) ) {
		flush_rewrite_rules();
		update_option( 'apex_events_rewrite_flushed', '1' );
	}
}
add_action( 'init', 'apex_register_event_cpt' );

/**
 * Register the meta box.
 */
function apex_event_meta_boxes() {
	add_meta_box(
		'apex-event-details',
		__( 'Event details', 'apex-learnsphere' ),
		'apex_event_meta_box_html',
		'event',
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes', 'apex_event_meta_boxes' );

/**
 * Meta box fields.
 */
function apex_event_fields() {
	return array(
		'event_type'            => array( 'label' => 'Event type', 'type' => 'select', 'options' => array( 'in-person' => 'In-person', 'online' => 'Online' ) ),
		'event_date'            => array( 'label' => 'Date', 'type' => 'date' ),
		'event_start_time'      => array( 'label' => 'Start time', 'type' => 'time' ),
		'event_end_time'        => array( 'label' => 'End time (optional)', 'type' => 'time' ),
		'event_recurrence'      => array( 'label' => 'Repeats', 'type' => 'select', 'options' => array( 'none' => 'Does not repeat', 'weekly' => 'Weekly', 'monthly' => 'Monthly' ) ),
		'event_recurrence_end'  => array( 'label' => 'Repeats until (optional)', 'type' => 'date' ),
		'event_location'        => array( 'label' => 'Location (for in-person)', 'type' => 'text' ),
		'event_video_url'       => array( 'label' => 'Video call link (for online)', 'type' => 'url' ),
	);
}

/**
 * Render the meta box.
 */
function apex_event_meta_box_html( $post ) {
	wp_nonce_field( 'apex_event_meta', 'apex_event_meta_nonce' );
	$fields = apex_event_fields();
	echo '<div class="apex-event-fields">';
	foreach ( $fields as $key => $field ) {
		$value = get_post_meta( $post->ID, $key, true );
		echo '<p class="apex-field apex-field--' . esc_attr( $key ) . '">';
		echo '<label for="' . esc_attr( $key ) . '"><strong>' . esc_html( $field['label'] ) . '</strong></label><br />';
		switch ( $field['type'] ) {
			case 'select':
				echo '<select id="' . esc_attr( $key ) . '" name="' . esc_attr( $key ) . '">';
				foreach ( $field['options'] as $opt_val => $opt_label ) {
					printf(
						'<option value="%s" %s>%s</option>',
						esc_attr( $opt_val ),
						selected( $value, $opt_val, false ),
						esc_html( $opt_label )
					);
				}
				echo '</select>';
				break;
			case 'date':
				printf( '<input type="date" id="%1$s" name="%1$s" value="%2$s" />', esc_attr( $key ), esc_attr( $value ) );
				break;
			case 'time':
				printf( '<input type="time" id="%1$s" name="%1$s" value="%2$s" />', esc_attr( $key ), esc_attr( $value ) );
				break;
			default:
				printf( '<input type="%1$s" id="%2$s" name="%2$s" value="%3$s" class="widefat" />', esc_attr( $field['type'] ), esc_attr( $key ), esc_attr( $value ) );
		}
		echo '</p>';
	}
	echo '</div>';
}

/**
 * Save meta box data.
 */
function apex_event_save_meta( $post_id ) {
	if ( ! isset( $_POST['apex_event_meta_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['apex_event_meta_nonce'] ) ), 'apex_event_meta' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	$text_fields   = array( 'event_date', 'event_start_time', 'event_end_time', 'event_recurrence_end', 'event_location' );
	$url_fields    = array( 'event_video_url' );
	$select_fields = array(
		'event_type'       => array( 'in-person', 'online' ),
		'event_recurrence' => array( 'none', 'weekly', 'monthly' ),
	);

	foreach ( $text_fields as $key ) {
		$value = isset( $_POST[ $key ] ) ? sanitize_text_field( wp_unslash( $_POST[ $key ] ) ) : '';
		update_post_meta( $post_id, $key, $value );
	}

	foreach ( $url_fields as $key ) {
		$value = isset( $_POST[ $key ] ) ? esc_url_raw( wp_unslash( $_POST[ $key ] ) ) : '';
		update_post_meta( $post_id, $key, $value );
	}

	foreach ( $select_fields as $key => $allowed ) {
		$value = isset( $_POST[ $key ] ) ? sanitize_key( wp_unslash( $_POST[ $key ] ) ) : '';
		if ( ! in_array( $value, $allowed, true ) ) {
			$value = $allowed[0];
		}
		update_post_meta( $post_id, $key, $value );
	}
}
add_action( 'save_post_event', 'apex_event_save_meta' );

/**
 * Redirect the /events/ archive to the Training & Programmes page,
 * which is the canonical events listing.
 */
function apex_redirect_event_archive() {
	if ( is_post_type_archive( 'event' ) ) {
		wp_safe_redirect( home_url( '/training/' ), 301 );
		exit;
	}
}
add_action( 'template_redirect', 'apex_redirect_event_archive' );

/**
 * Enqueue a small admin script for conditional field visibility.
 */
function apex_event_admin_scripts( $hook ) {
	global $post_type;
	if ( 'event' === $post_type && in_array( $hook, array( 'post.php', 'post-new.php' ), true ) ) {
		wp_enqueue_script( 'apex-event-admin', APEX_URI . '/assets/js/admin-events.js', array(), APEX_VERSION, true );
	}
}
add_action( 'admin_enqueue_scripts', 'apex_event_admin_scripts' );

/* -------------------------------------------------------------------------
 * Display helpers
 * ---------------------------------------------------------------------- */

function apex_event_meta( $post_id, $key, $default = '' ) {
	$value = get_post_meta( $post_id, $key, true );
	return '' === $value ? $default : $value;
}

function apex_format_event_date( $ymd ) {
	if ( ! $ymd ) {
		return '';
	}
	$ts = strtotime( $ymd );
	return $ts ? date_i18n( 'j M Y', $ts ) : $ymd;
}

function apex_format_event_day( $ymd ) {
	$ts = strtotime( $ymd );
	return $ts ? date_i18n( 'j', $ts ) : '';
}

function apex_format_event_month( $ymd ) {
	$ts = strtotime( $ymd );
	return $ts ? date_i18n( 'M', $ts ) : '';
}

function apex_format_event_time( $hm ) {
	if ( ! $hm ) {
		return '';
	}
	$ts = strtotime( $hm );
	return $ts ? date_i18n( 'g:i a', $ts ) : $hm;
}

function apex_event_time_string( $post_id ) {
	$start = apex_event_meta( $post_id, 'event_start_time' );
	$end   = apex_event_meta( $post_id, 'event_end_time' );
	if ( ! $start ) {
		return '';
	}
	$out = apex_format_event_time( $start );
	if ( $end ) {
		$out .= ' &ndash; ' . apex_format_event_time( $end );
	}
	return $out;
}

function apex_event_type( $post_id ) {
	$type = apex_event_meta( $post_id, 'event_type', 'in-person' );
	return in_array( $type, array( 'in-person', 'online' ), true ) ? $type : 'in-person';
}

function apex_event_recurrence( $post_id ) {
	$r = apex_event_meta( $post_id, 'event_recurrence', 'none' );
	return in_array( $r, array( 'weekly', 'monthly' ), true ) ? $r : 'none';
}

/**
 * Whether an event is entirely in the past.
 * Recurring events stay "upcoming" until their end date passes.
 */
function apex_event_is_past( $post_id ) {
	$today      = current_time( 'Y-m-d' );
	$date       = apex_event_meta( $post_id, 'event_date' );
	$recurrence = apex_event_recurrence( $post_id );

	if ( 'none' !== $recurrence ) {
		$end = apex_event_meta( $post_id, 'event_recurrence_end' );
		if ( ! empty( $end ) && $end < $today ) {
			return true;
		}
		return false;
	}

	return $date && $date < $today;
}

/**
 * Next occurrence date (Y-m-d) for display/sorting.
 */
function apex_event_next_occurrence( $post_id ) {
	$date       = apex_event_meta( $post_id, 'event_date' );
	$recurrence = apex_event_recurrence( $post_id );
	if ( ! $date ) {
		return '9999-12-31';
	}
	if ( 'none' === $recurrence ) {
		return $date;
	}

	$today    = current_time( 'Y-m-d' );
	$end      = apex_event_meta( $post_id, 'event_recurrence_end' );
	$interval = 'weekly' === $recurrence ? '+1 week' : '+1 month';

	if ( $date >= $today ) {
		return $date;
	}

	$ts   = strtotime( $date );
	$next = $date;
	for ( $i = 0; $i < 600; $i++ ) {
		$ts   = strtotime( $interval, $ts );
		$next = date( 'Y-m-d', $ts );
		if ( $next >= $today ) {
			return $next;
		}
		if ( ! empty( $end ) && $next > $end ) {
			break;
		}
	}
	return $next;
}

/**
 * Location line: address for in-person, or "Online event".
 */
function apex_event_location_line( $post_id ) {
	if ( 'online' === apex_event_type( $post_id ) ) {
		return __( 'Online event', 'apex-learnsphere' );
	}
	$loc = apex_event_meta( $post_id, 'event_location' );
	return $loc ? $loc : __( 'Location to be confirmed', 'apex-learnsphere' );
}

/**
 * Upcoming events, sorted by their next occurrence.
 *
 * @param int $limit Maximum number of events to return (0 for all).
 * @return WP_Post[]
 */
function apex_get_upcoming_events( $limit = 0 ) {
	$events = get_posts(
		array(
			'post_type'        => 'event',
			'posts_per_page'   => -1,
			'post_status'      => 'publish',
			'suppress_filters' => false,
		)
	);

	$upcoming = array();
	foreach ( $events as $event ) {
		if ( ! apex_event_is_past( $event->ID ) ) {
			$upcoming[] = $event;
		}
	}

	usort(
		$upcoming,
		function ( $a, $b ) {
			return strcmp( apex_event_next_occurrence( $a->ID ), apex_event_next_occurrence( $b->ID ) );
		}
	);

	return $limit > 0 ? array_slice( $upcoming, 0, $limit ) : $upcoming;
}

/**
 * Long date for event cards, e.g. "Wednesday, 25 Nov 2026".
 *
 * @param string $ymd Date in Y-m-d format.
 * @return string
 */
function apex_format_event_long_date( $ymd ) {
	$ts = $ymd ? strtotime( $ymd ) : false;
	return $ts ? date_i18n( 'l, j M Y', $ts ) : __( 'Date to be confirmed', 'apex-learnsphere' );
}

/**
 * Short summary of an event for cards.
 *
 * @param int $post_id Event ID.
 * @return string
 */
function apex_event_summary( $post_id ) {
	if ( has_excerpt( $post_id ) ) {
		return get_the_excerpt( $post_id );
	}
	$content = wp_strip_all_tags( strip_shortcodes( (string) get_post_field( 'post_content', $post_id ) ) );
	return wp_trim_words( $content, 22, '…' );
}

/**
 * Render an event card.
 *
 * @param int    $event_id Event ID.
 * @param string $tone     Accent colour: blue, green or navy.
 */
function apex_event_card( $event_id, $tone = 'blue' ) {
	$type  = apex_event_type( $event_id );
	$recur = apex_event_recurrence( $event_id );
	$raw   = apex_event_meta( $event_id, 'event_date' );
	$date  = $raw ? apex_event_next_occurrence( $event_id ) : '';
	$time  = apex_event_time_string( $event_id );
	?>
	<article class="event-card event-card--<?php echo esc_attr( $tone ); ?> reveal">
		<a class="event-card__link" href="<?php echo esc_url( get_permalink( $event_id ) ); ?>">
			<span class="event-card__when">
				<span class="event-card__date"><?php echo esc_html( apex_format_event_long_date( $date ) ); ?></span>
				<?php if ( $time ) : ?>
					<span class="event-card__time"><?php echo esc_html( $time ); ?></span>
				<?php endif; ?>
			</span>
			<span class="event-card__body">
				<span class="event-card__tags">
					<span class="event-card__badge event-card__badge--<?php echo esc_attr( $type ); ?>"><?php echo 'online' === $type ? esc_html__( 'Online', 'apex-learnsphere' ) : esc_html__( 'In-person', 'apex-learnsphere' ); ?></span>
					<?php if ( 'none' !== $recur ) : ?>
						<span class="event-card__recur"><?php echo 'weekly' === $recur ? esc_html__( 'Repeats weekly', 'apex-learnsphere' ) : esc_html__( 'Repeats monthly', 'apex-learnsphere' ); ?></span>
					<?php endif; ?>
				</span>
				<span class="event-card__title"><?php echo esc_html( get_the_title( $event_id ) ); ?></span>
				<span class="event-card__summary"><?php echo esc_html( apex_event_summary( $event_id ) ); ?></span>
				<span class="event-card__loc"><?php echo esc_html( apex_event_location_line( $event_id ) ); ?></span>
			</span>
		</a>
	</article>
	<?php
}
