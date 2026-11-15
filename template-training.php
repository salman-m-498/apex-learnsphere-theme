<?php
/**
 * Template Name: Training & Programmes
 *
 * Lists upcoming and past events.
 *
 * @package apex-learnsphere
 */

get_header();

$upcoming = apex_get_upcoming_events();
$tones    = array( 'coral', 'yellow', 'green', 'blue' );

$past = array();
foreach ( get_posts(
	array(
		'post_type'        => 'event',
		'posts_per_page'   => -1,
		'post_status'      => 'publish',
		'suppress_filters' => false,
	)
) as $event ) {
	if ( apex_event_is_past( $event->ID ) ) {
		$past[] = $event;
	}
}

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
				foreach ( $upcoming as $index => $event ) {
					apex_event_card( $event->ID, $tones[ $index % count( $tones ) ] );
				}
				?>
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
