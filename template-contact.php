<?php
/**
 * Template Name: Contact
 *
 * @package apex-learnsphere
 */

get_header();
$brand = apex_brand();
?>

<header class="page-hero">
	<div class="container">
		<p class="eyebrow"><?php esc_html_e( 'Contact us', 'apex-learnsphere' ); ?></p>
		<h1><?php esc_html_e( 'Let&#39;s talk about your next step', 'apex-learnsphere' ); ?></h1>
		<p class="lead"><?php esc_html_e( 'Tell us where you are and what you need help with. We will get back to you with a practical way forward.', 'apex-learnsphere' ); ?></p>
	</div>
</header>

<section class="section">
	<div class="container contact-grid">
		<div>
			<h2 style="font-size: var(--fs-h3);"><?php esc_html_e( 'Get in touch', 'apex-learnsphere' ); ?></h2>
			<div class="contact-cards">
				<div class="contact-card reveal">
					<span class="contact-card__icon"><?php echo apex_icon( 'mail' ); // phpcs:ignore ?></span>
					<div>
						<h3><?php esc_html_e( 'Email', 'apex-learnsphere' ); ?></h3>
						<p><a href="mailto:<?php echo esc_attr( $brand['email'] ); ?>"><?php echo esc_html( $brand['email'] ); ?></a></p>
					</div>
				</div>
				<div class="contact-card reveal">
					<span class="contact-card__icon"><?php echo apex_icon( 'phone' ); // phpcs:ignore ?></span>
					<div>
						<h3><?php esc_html_e( 'Phone', 'apex-learnsphere' ); ?></h3>
						<p><a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $brand['phone'] ) ); ?>"><?php echo esc_html( $brand['phone'] ); ?></a></p>
					</div>
				</div>
				<div class="contact-card reveal">
					<span class="contact-card__icon"><?php echo apex_icon( 'messages' ); // phpcs:ignore ?></span>
					<div>
						<h3><?php esc_html_e( 'WhatsApp', 'apex-learnsphere' ); ?></h3>
						<p><a href="https://wa.me/<?php echo esc_attr( $brand['whatsapp'] ); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Chat with us on WhatsApp', 'apex-learnsphere' ); ?></a></p>
					</div>
				</div>
				<div class="contact-card reveal">
					<span class="contact-card__icon"><?php echo apex_icon( 'map-pin' ); // phpcs:ignore ?></span>
					<div>
						<h3><?php esc_html_e( 'Location', 'apex-learnsphere' ); ?></h3>
						<p><?php esc_html_e( 'Location to be confirmed — currently serving clients online and by appointment.', 'apex-learnsphere' ); ?></p>
					</div>
				</div>
			</div>
			<p style="font-size: var(--fs-sm); color: var(--c-text-muted); margin-top: var(--space-3);">
				<?php esc_html_e( 'Prefer to reach us another way? You can also request a consultation through the form.', 'apex-learnsphere' ); ?>
			</p>
		</div>

		<div class="reveal">
			<?php apex_enquiry_form(); ?>
		</div>
	</div>
</section>

<?php
get_footer();
