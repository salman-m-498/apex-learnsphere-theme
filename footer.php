<?php
/**
 * Footer template.
 *
 * @package apex-learnsphere
 */
$brand = apex_brand();
?>
</main>

<footer class="site-footer">
	<div class="site-footer__cta container">
		<div class="cta-band">
			<div class="cta-band__content">
				<p class="eyebrow eyebrow--light"><?php esc_html_e( 'Take the next step', 'apex-learnsphere' ); ?></p>
				<h2 class="cta-band__title"><?php esc_html_e( 'Ready to move forward?', 'apex-learnsphere' ); ?></h2>
				<p class="cta-band__text"><?php esc_html_e( 'Tell us where you are today, and we will help you plan a clear, practical path ahead.', 'apex-learnsphere' ); ?></p>
			</div>
			<div class="cta-band__actions">
				<a class="btn btn--light" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Book a Consultation', 'apex-learnsphere' ); ?></a>
				<a class="btn btn--ghost-light" href="<?php echo esc_url( home_url( '/services/' ) ); ?>"><?php esc_html_e( 'Explore Our Services', 'apex-learnsphere' ); ?></a>
			</div>
		</div>
	</div>

	<div class="site-footer__main">
		<div class="container site-footer__grid">
			<div class="site-footer__brand">
				<a class="site-footer__logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<?php apex_logo( 'white' ); ?>
				</a>
				<p class="site-footer__tagline"><?php echo esc_html( $brand['tagline'] ); ?></p>
				<p class="site-footer__desc"><?php esc_html_e( 'A multidisciplinary consultancy connecting education, people and opportunity.', 'apex-learnsphere' ); ?></p>
				<div class="site-footer__social">
					<?php
					$socials = array(
						'Instagram' => 'https://instagram.com/apexlearnsphere',
						'LinkedIn'  => 'https://linkedin.com/company/apexlearnsphere',
						'Facebook'  => 'https://facebook.com/apexlearnsphere',
						'YouTube'   => 'https://youtube.com/@apexlearnsphere',
					);
					foreach ( $socials as $label => $url ) :
						?>
						<a class="social-link" href="<?php echo esc_url( $url ); ?>" target="_blank" rel="noopener noreferrer">
							<span class="screen-reader-text"><?php echo esc_html( $label ); ?></span>
							<?php echo apex_social_svg( strtolower( $label ) ); // phpcs:ignore ?>
						</a>
					<?php endforeach; ?>
				</div>
			</div>

			<div class="site-footer__col">
				<h3 class="site-footer__heading"><?php esc_html_e( 'Services', 'apex-learnsphere' ); ?></h3>
				<ul class="site-footer__links">
					<li><a href="<?php echo esc_url( home_url( '/services/' ) ); ?>"><?php esc_html_e( 'Our Services', 'apex-learnsphere' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/schools/' ) ); ?>"><?php esc_html_e( 'For Schools & Institutions', 'apex-learnsphere' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/students-parents/' ) ); ?>"><?php esc_html_e( 'For Students & Parents', 'apex-learnsphere' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/businesses/' ) ); ?>"><?php esc_html_e( 'For Businesses & Organisations', 'apex-learnsphere' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/sports/' ) ); ?>"><?php esc_html_e( 'For Sports Organisations', 'apex-learnsphere' ); ?></a></li>
				</ul>
			</div>

			<div class="site-footer__col">
				<h3 class="site-footer__heading"><?php esc_html_e( 'Company', 'apex-learnsphere' ); ?></h3>
				<ul class="site-footer__links">
					<li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>"><?php esc_html_e( 'About Us', 'apex-learnsphere' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/training/' ) ); ?>"><?php esc_html_e( 'Training & Programmes', 'apex-learnsphere' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/resources/' ) ); ?>"><?php esc_html_e( 'Resources', 'apex-learnsphere' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Contact Us', 'apex-learnsphere' ); ?></a></li>
				</ul>
			</div>

			<div class="site-footer__col site-footer__col--contact">
				<h3 class="site-footer__heading"><?php esc_html_e( 'Get in touch', 'apex-learnsphere' ); ?></h3>
				<ul class="site-footer__contact">
					<li><?php echo apex_icon( 'mail' ); ?> <a href="mailto:<?php echo esc_attr( $brand['email'] ); ?>"><?php echo esc_html( $brand['email'] ); ?></a></li>
					<li><?php echo apex_icon( 'phone' ); ?> <a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $brand['phone'] ) ); ?>"><?php echo esc_html( $brand['phone'] ); ?></a></li>
					<li><?php echo apex_icon( 'messages' ); ?> <a href="https://wa.me/<?php echo esc_attr( $brand['whatsapp'] ); ?>" target="_blank" rel="noopener noreferrer">WhatsApp</a></li>
				</ul>
			</div>
		</div>
	</div>

	<div class="site-footer__bottom">
		<div class="container site-footer__bottom-inner">
			<p>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. <?php esc_html_e( 'All rights reserved.', 'apex-learnsphere' ); ?></p>
			<ul class="site-footer__legal">
				<li><a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>"><?php esc_html_e( 'Privacy Policy', 'apex-learnsphere' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/terms/' ) ); ?>"><?php esc_html_e( 'Terms', 'apex-learnsphere' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/cookies/' ) ); ?>"><?php esc_html_e( 'Cookies', 'apex-learnsphere' ); ?></a></li>
			</ul>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
