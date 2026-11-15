<?php
/**
 * 404 template.
 *
 * @package apex-learnsphere
 */

get_header();
?>

<section class="section" style="text-align:center;">
	<div class="container container--narrow">
		<p class="eyebrow eyebrow--center"><?php esc_html_e( 'Page not found', 'apex-learnsphere' ); ?></p>
		<h1><?php esc_html_e( 'This page has moved on', 'apex-learnsphere' ); ?></h1>
		<p class="lead"><?php esc_html_e( 'The page you are looking for does not exist or may have moved. Let us help you find the right path.', 'apex-learnsphere' ); ?></p>
		<p style="display:flex; gap:var(--space-2); justify-content:center; flex-wrap:wrap;">
			<a class="btn btn--primary" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Back to home', 'apex-learnsphere' ); ?></a>
			<a class="btn btn--outline" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Contact us', 'apex-learnsphere' ); ?></a>
		</p>
	</div>
</section>

<?php
get_footer();
