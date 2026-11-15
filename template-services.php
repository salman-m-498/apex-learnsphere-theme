<?php
/**
 * Template Name: Services
 *
 * @package apex-learnsphere
 */

get_header();
?>

<header class="page-hero">
	<div class="container">
		<p class="eyebrow"><?php esc_html_e( 'Our services', 'apex-learnsphere' ); ?></p>
		<h1><?php esc_html_e( 'Guidance across every stage of learning and leadership', 'apex-learnsphere' ); ?></h1>
		<p class="lead"><?php esc_html_e( 'Five pillars, one connected approach. Explore how we support schools, students, families, businesses and sports organisations.', 'apex-learnsphere' ); ?></p>
	</div>
</header>

<section class="section">
	<div class="container">
		<ul class="service-list">
			<li class="service-row reveal">
				<span class="service-row__icon"><?php echo apex_icon( 'book-open' ); // phpcs:ignore ?></span>
				<div>
					<h3><?php esc_html_e( 'Education', 'apex-learnsphere' ); ?></h3>
					<p><?php esc_html_e( 'School improvement, management consultancy, teacher development, inclusive education and curriculum support for schools and institutions.', 'apex-learnsphere' ); ?></p>
				</div>
				<a class="btn btn--outline" href="<?php echo esc_url( home_url( '/schools/' ) ); ?>"><?php esc_html_e( 'Learn more', 'apex-learnsphere' ); ?></a>
			</li>
			<li class="service-row reveal">
				<span class="service-row__icon"><?php echo apex_icon( 'compass' ); // phpcs:ignore ?></span>
				<div>
					<h3><?php esc_html_e( 'Career Guidance & Counselling', 'apex-learnsphere' ); ?></h3>
					<p><?php esc_html_e( 'Career exploration, subject and stream choices, higher-education pathways and goal-setting for students and families.', 'apex-learnsphere' ); ?></p>
				</div>
				<a class="btn btn--outline" href="<?php echo esc_url( home_url( '/students-parents/' ) ); ?>"><?php esc_html_e( 'Learn more', 'apex-learnsphere' ); ?></a>
			</li>
			<li class="service-row reveal">
				<span class="service-row__icon"><?php echo apex_icon( 'target' ); // phpcs:ignore ?></span>
				<div>
					<h3><?php esc_html_e( 'Management', 'apex-learnsphere' ); ?></h3>
					<p><?php esc_html_e( 'Strategic planning, operational improvement, team development and service quality for schools and organisations.', 'apex-learnsphere' ); ?></p>
				</div>
				<a class="btn btn--outline" href="<?php echo esc_url( home_url( '/businesses/' ) ); ?>"><?php esc_html_e( 'Learn more', 'apex-learnsphere' ); ?></a>
			</li>
			<li class="service-row reveal">
				<span class="service-row__icon"><?php echo apex_icon( 'trophy' ); // phpcs:ignore ?></span>
				<div>
					<h3><?php esc_html_e( 'Sport', 'apex-learnsphere' ); ?></h3>
					<p><?php esc_html_e( 'Sports development, team culture, sports education and leadership through sport for clubs and academies.', 'apex-learnsphere' ); ?></p>
				</div>
				<a class="btn btn--outline" href="<?php echo esc_url( home_url( '/sports/' ) ); ?>"><?php esc_html_e( 'Learn more', 'apex-learnsphere' ); ?></a>
			</li>
			<li class="service-row reveal">
				<span class="service-row__icon"><?php echo apex_icon( 'trending-up' ); // phpcs:ignore ?></span>
				<div>
					<h3><?php esc_html_e( 'Business & Leadership', 'apex-learnsphere' ); ?></h3>
					<p><?php esc_html_e( 'Leadership development, communication, team building and professional training for businesses and organisations.', 'apex-learnsphere' ); ?></p>
				</div>
				<a class="btn btn--outline" href="<?php echo esc_url( home_url( '/businesses/' ) ); ?>"><?php esc_html_e( 'Learn more', 'apex-learnsphere' ); ?></a>
			</li>
		</ul>
	</div>
</section>

<?php
get_footer();
