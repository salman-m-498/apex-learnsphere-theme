<?php
/**
 * Event archive fallback (normally redirected to /training/).
 *
 * @package apex-learnsphere
 */

get_header();
?>
<header class="page-hero">
	<div class="container">
		<p class="eyebrow"><?php esc_html_e( 'Training & Programmes', 'apex-learnsphere' ); ?></p>
		<h1><?php esc_html_e( 'Events', 'apex-learnsphere' ); ?></h1>
	</div>
</header>
<section class="section">
	<div class="container">
		<p class="lead"><?php esc_html_e( 'Browse our full programme of workshops and events.', 'apex-learnsphere' ); ?></p>
		<p><a class="btn btn--primary" href="<?php echo esc_url( home_url( '/training/' ) ); ?>"><?php esc_html_e( 'View Training & Programmes', 'apex-learnsphere' ); ?></a></p>
	</div>
</section>
<?php
get_footer();
