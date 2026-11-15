<?php
/**
 * Template Name: Training & Programmes
 *
 * Lists upcoming and past events.
 *
 * @package apex-learnsphere
 */

get_header();

$today = current_time( 'Y-m-d' );

$query = new WP_Query(
	array(
		'post_type'      => 'event',
		'posts_per_page' => -1,
		'post_status'    => 'publish',
		'orderby'        => 'meta_value',
		'meta_key'       => 'event_date',
		'order'          => 'ASC',
	)
);

$upcoming = array();
$past     = array();

if ( $query->have_posts() ) {
	foreach ( $query->posts as $event ) {
		if ( apex_event_is_past( $event->ID ) ) {
			$past[] = $event;
		} else {
			$upcoming[] = $event;
		}
	}
}

// Sort upcoming by next occurrence.
usort(
	$upcoming,
	function ( $a, $b ) {
		return strcmp( apex_event_next_occurrence( $a->ID ), apex_event_next_occurrence( $b->ID ) );
	}
);

// Sort past most-recent-first.
usort(
	$past,
	function ( $a, $b ) {
		return strcmp( get_post_meta( $b->ID, 'event_date', true ), get_post_meta( $a->ID, 'event_date', true ) );
	}
);
?>

<header class="page-hero">
	<div class="container">
		<p class="eyebrow"><?php esc_html_e( 'Training & Programmes', 'apex-learnsphere' ); ?></p>
		<h1><?php esc_html_e( 'Workshops, programmes & events', 'apex-learnsphere' ); ?></h1>
		<p class="lead"><?php esc_html_e( 'Join us in person or online. Browse upcoming events below, or get in touch to arrange a programme for your school, team or organisation.', 'apex-learnsphere' ); ?></p>
	</div>
</header>

<section class="section">
	<div class="container">
		<div class="section-head reveal">
			<p class="eyebrow"><?php esc_html_e( 'What&#39;s coming up', 'apex-learnsphere' ); ?></p>
			<h2><?php esc_html_e( 'Upcoming events', 'apex-learnsphere' ); ?></h2>
		</div>

		<?php if ( $upcoming ) : ?>
			<div class="event-grid">
				<?php
				foreach ( $upcoming as $event ) :
					$event_id = $event->ID;
					$type     = apex_event_type( $event_id );
					$date     = apex_event_next_occurrence( $event_id );
					$recur    = apex_event_recurrence( $event_id );
					?>
					<article class="event-card reveal">
						<a class="event-card__link" href="<?php echo esc_url( get_permalink( $event_id ) ); ?>">
							<div class="event-card__date">
								<span class="event-card__day"><?php echo esc_html( apex_format_event_day( $date ) ); ?></span>
								<span class="event-card__month"><?php echo esc_html( apex_format_event_month( $date ) ); ?></span>
							</div>
							<div class="event-card__body">
								<span class="event-card__badge event-card__badge--<?php echo esc_attr( $type ); ?>"><?php echo 'online' === $type ? esc_html__( 'Online', 'apex-learnsphere' ) : esc_html__( 'In-person', 'apex-learnsphere' ); ?></span>
								<h3 class="event-card__title"><?php echo esc_html( get_the_title( $event_id ) ); ?></h3>
								<p class="event-card__meta">
									<?php if ( apex_event_time_string( $event_id ) ) : ?>
										<span><?php echo esc_html( apex_event_time_string( $event_id ) ); ?></span>
									<?php endif; ?>
									<?php if ( 'none' !== $recur ) : ?>
										<span class="event-card__recur"><?php echo 'weekly' === $recur ? esc_html__( 'Repeats weekly', 'apex-learnsphere' ) : esc_html__( 'Repeats monthly', 'apex-learnsphere' ); ?></span>
									<?php endif; ?>
								</p>
								<p class="event-card__loc"><?php echo esc_html( apex_event_location_line( $event_id ) ); ?></p>
							</div>
						</a>
					</article>
				<?php endforeach; ?>
			</div>
		<?php else : ?>
			<p class="lead" style="color: var(--c-text-muted);"><?php esc_html_e( 'New events are being scheduled. Check back soon, or contact us to arrange a programme.', 'apex-learnsphere' ); ?></p>
		<?php endif; ?>
	</div>
</section>

<?php if ( $past ) : ?>
	<section class="section section--soft">
		<div class="container">
			<div class="section-head reveal">
				<p class="eyebrow"><?php esc_html_e( 'Archive', 'apex-learnsphere' ); ?></p>
				<h2><?php esc_html_e( 'Past events', 'apex-learnsphere' ); ?></h2>
			</div>
			<ul class="past-events">
				<?php foreach ( $past as $event ) : ?>
					<li class="past-events__item reveal">
						<a href="<?php echo esc_url( get_permalink( $event->ID ) ); ?>">
							<span class="past-events__date"><?php echo esc_html( apex_format_event_date( apex_event_meta( $event->ID, 'event_date' ) ) ); ?></span>
							<span class="past-events__title"><?php echo esc_html( get_the_title( $event->ID ) ); ?></span>
							<span class="past-events__arrow" aria-hidden="true">&#8594;</span>
						</a>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</section>
<?php endif; ?>

<?php
get_footer();
