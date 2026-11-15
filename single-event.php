<?php
/**
 * Single event template.
 *
 * @package apex-learnsphere
 */

get_header();

while ( have_posts() ) :
	the_post();
	$event_id = get_the_ID();
	$type     = apex_event_type( $event_id );
	$is_past  = apex_event_is_past( $event_id );
	$date     = apex_event_next_occurrence( $event_id );
	$recur    = apex_event_recurrence( $event_id );
	$video    = apex_event_meta( $event_id, 'event_video_url' );
	?>
	<article <?php post_class( 'event-single' ); ?>>
		<header class="page-hero">
			<div class="container container--narrow">
				<p class="page-hero__breadcrumb">
					<a href="<?php echo esc_url( home_url( '/training/' ) ); ?>"><?php esc_html_e( 'Training & Programmes', 'apex-learnsphere' ); ?></a>
				</p>
				<span class="event-card__badge event-card__badge--<?php echo esc_attr( $type ); ?>"><?php echo 'online' === $type ? esc_html__( 'Online', 'apex-learnsphere' ) : esc_html__( 'In-person', 'apex-learnsphere' ); ?></span>
				<h1><?php the_title(); ?></h1>
				<p class="event-single__meta">
					<span><?php echo esc_html( apex_format_event_date( $date ) ); ?></span>
					<?php if ( apex_event_time_string( $event_id ) ) : ?>
						<span aria-hidden="true">·</span>
						<span><?php echo esc_html( apex_event_time_string( $event_id ) ); ?></span>
					<?php endif; ?>
					<?php if ( 'none' !== $recur ) : ?>
						<span aria-hidden="true">·</span>
						<span><?php echo 'weekly' === $recur ? esc_html__( 'Repeats weekly', 'apex-learnsphere' ) : esc_html__( 'Repeats monthly', 'apex-learnsphere' ); ?></span>
					<?php endif; ?>
				</p>
				<p class="event-single__loc">
					<?php
					if ( 'online' === $type ) {
						echo esc_html__( 'Online event', 'apex-learnsphere' );
					} else {
						echo esc_html( apex_event_location_line( $event_id ) );
					}
					?>
				</p>
			</div>
		</header>

		<section class="section">
			<div class="container container--narrow">
				<?php if ( has_post_thumbnail() ) : ?>
					<div style="margin-bottom: var(--space-4);"><?php the_post_thumbnail( 'large', array( 'style' => 'border-radius: var(--radius-lg); width: 100%;' ) ); ?></div>
				<?php endif; ?>

				<div class="entry-content">
					<?php the_content(); ?>
				</div>

				<div class="event-single__actions">
					<?php if ( 'online' === $type && $video && ! $is_past ) : ?>
						<a class="btn btn--primary" href="<?php echo esc_url( $video ); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Join the video call', 'apex-learnsphere' ); ?> <span class="btn__arrow" aria-hidden="true">&#8594;</span></a>
					<?php endif; ?>
					<a class="btn btn--outline" href="<?php echo esc_url( home_url( '/contact/' ) . '?event=' . rawurlencode( get_the_title() ) ); ?>"><?php esc_html_e( 'Enquire about this event', 'apex-learnsphere' ); ?></a>
					<a class="btn btn--ghost" href="<?php echo esc_url( home_url( '/training/' ) ); ?>"><?php esc_html_e( 'Back to all events', 'apex-learnsphere' ); ?></a>
				</div>
			</div>
		</section>
	</article>
	<?php
endwhile;

get_footer();
