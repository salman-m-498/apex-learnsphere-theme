<?php
/**
 * Footer template.
 *
 * Closing call-to-action panel, footer links, contact details and a
 * decorative row of geometric shapes.
 *
 * @package apex-learnsphere
 */

$brand   = apex_brand();
$socials = array(
	'Instagram' => 'https://instagram.com/apexlearnsphere',
	'LinkedIn'  => 'https://linkedin.com/company/apexlearnsphere',
	'Facebook'  => 'https://facebook.com/apexlearnsphere',
	'YouTube'   => 'https://youtube.com/@apexlearnsphere',
);
?>
</main>

<section class="sock" aria-labelledby="sock-title">
	<div class="container sock__inner">
		<div class="sock__panel">
			<span class="sock__shapes" aria-hidden="true">
				<svg viewBox="0 0 120 120" focusable="false"><circle cx="46" cy="76" r="40" fill="#ffc933" /><path d="M30 8 110 54 30 100Z" fill="#ff7a45" /></svg>
			</span>
			<h2 class="sock__title" id="sock-title"><?php esc_html_e( 'Ready to move forward?', 'apex-learnsphere' ); ?></h2>
			<p class="sock__text"><?php esc_html_e( 'Tell us where you are today, and we will help you plan a clear, practical path ahead.', 'apex-learnsphere' ); ?></p>
			<div class="sock__actions">
				<a class="btn btn--light" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Book a Consultation', 'apex-learnsphere' ); ?> <span class="btn__arrow" aria-hidden="true">&#8594;</span></a>
				<a class="btn btn--ghost-light" href="<?php echo esc_url( home_url( '/services/' ) ); ?>"><?php esc_html_e( 'Explore Our Services', 'apex-learnsphere' ); ?></a>
			</div>
		</div>
		<div class="sock__media">
			<img src="<?php echo esc_url( apex_img_url( 'mentoring' ) ); ?>" alt="" width="1400" height="1050" loading="lazy" />
		</div>
	</div>
</section>

<footer class="site-footer">
	<div class="container site-footer__top">
		<div class="site-footer__brand">
			<a class="site-footer__logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<?php apex_logo( 'default' ); ?>
			</a>
			<p class="site-footer__tagline"><?php echo esc_html( $brand['tagline'] ); ?></p>
		</div>

		<nav class="site-footer__nav" aria-label="<?php esc_attr_e( 'Footer navigation', 'apex-learnsphere' ); ?>">
			<ul class="site-footer__links">
				<li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>"><?php esc_html_e( 'About Us', 'apex-learnsphere' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/services/' ) ); ?>"><?php esc_html_e( 'Our Services', 'apex-learnsphere' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/training/' ) ); ?>"><?php esc_html_e( 'Training & Programmes', 'apex-learnsphere' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/resources/' ) ); ?>"><?php esc_html_e( 'Resources', 'apex-learnsphere' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Contact Us', 'apex-learnsphere' ); ?></a></li>
			</ul>
			<ul class="site-footer__links">
				<li><a href="<?php echo esc_url( home_url( '/schools/' ) ); ?>"><?php esc_html_e( 'For Schools & Institutions', 'apex-learnsphere' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/students-parents/' ) ); ?>"><?php esc_html_e( 'For Students & Parents', 'apex-learnsphere' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/businesses/' ) ); ?>"><?php esc_html_e( 'For Businesses & Organisations', 'apex-learnsphere' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/sports/' ) ); ?>"><?php esc_html_e( 'For Sports Organisations', 'apex-learnsphere' ); ?></a></li>
			</ul>
		</nav>

		<div class="site-footer__social">
			<?php foreach ( $socials as $label => $url ) : ?>
				<a class="social-link" href="<?php echo esc_url( $url ); ?>" target="_blank" rel="noopener noreferrer">
					<span class="screen-reader-text"><?php echo esc_html( $label ); ?></span>
					<?php echo apex_social_svg( strtolower( $label ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				</a>
			<?php endforeach; ?>
		</div>
	</div>

	<div class="container site-footer__mid">
		<div class="site-footer__col">
			<h2 class="site-footer__heading"><?php esc_html_e( 'Contact', 'apex-learnsphere' ); ?></h2>
			<ul class="site-footer__contact">
				<li><?php echo apex_icon( 'mail' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> <a href="<?php echo esc_url( 'mailto:' . $brand['email'] ); ?>"><?php echo esc_html( $brand['email'] ); ?></a></li>
				<li><?php echo apex_icon( 'phone' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> <a href="<?php echo esc_url( 'tel:' . preg_replace( '/[^0-9+]/', '', $brand['phone'] ) ); ?>"><?php echo esc_html( $brand['phone'] ); ?></a></li>
				<li><?php echo apex_icon( 'messages' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> <a href="<?php echo esc_url( 'https://wa.me/' . preg_replace( '/[^0-9]/', '', $brand['whatsapp'] ) ); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'WhatsApp', 'apex-learnsphere' ); ?></a></li>
			</ul>
		</div>
		<div class="site-footer__col site-footer__col--about">
			<h2 class="site-footer__heading"><?php esc_html_e( 'About Apex LearnSphere', 'apex-learnsphere' ); ?></h2>
			<p class="site-footer__desc"><?php esc_html_e( 'A multidisciplinary consultancy connecting education, people and opportunity. We help schools, students, families, businesses and sports organisations learn smarter, lead better and reach the next stage with confidence.', 'apex-learnsphere' ); ?></p>
		</div>
		<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
			<div class="site-footer__col site-footer__col--widgets">
				<?php dynamic_sidebar( 'footer-1' ); ?>
			</div>
		<?php endif; ?>
	</div>

	<div class="container site-footer__bottom">
		<p>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. <?php esc_html_e( 'All rights reserved.', 'apex-learnsphere' ); ?></p>
		<ul class="site-footer__legal">
			<li><a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>"><?php esc_html_e( 'Privacy Policy', 'apex-learnsphere' ); ?></a></li>
			<li><a href="<?php echo esc_url( home_url( '/terms/' ) ); ?>"><?php esc_html_e( 'Terms', 'apex-learnsphere' ); ?></a></li>
			<li><a href="<?php echo esc_url( home_url( '/cookies/' ) ); ?>"><?php esc_html_e( 'Cookies', 'apex-learnsphere' ); ?></a></li>
		</ul>
	</div>

	<div class="site-footer__shapes" aria-hidden="true">
		<svg viewBox="0 0 1440 150" preserveAspectRatio="xMidYMax slice" focusable="false">
			<rect x="10" y="74" width="76" height="76" fill="#ff7a45" />
			<path d="M96 96 150 20l54 76Z" fill="#ffc933" />
			<path d="M92 150a52 52 0 0 1 104 0Z" fill="#3fae7c" />
			<circle cx="258" cy="96" r="48" fill="#ffd2c2" />
			<circle cx="236" cy="128" r="44" fill="#f1ecd9" />
			<rect x="296" y="76" width="74" height="74" fill="#ffc933" />
			<circle cx="392" cy="50" r="46" fill="#ff7a45" />
			<path d="M372 150 428 66l56 84Z" fill="#3fae7c" />
			<rect x="470" y="46" width="72" height="72" transform="rotate(-28 506 82)" fill="#ffd2c2" />
			<path d="M476 150a58 58 0 0 1 116 0Z" fill="#ff7a45" />
			<path d="M560 18 650 62 560 106Z" fill="#ff7a45" />
			<circle cx="656" cy="112" r="50" fill="#cfeee0" />
			<path d="M640 80a52 44 0 0 1 104 0Z" fill="#ffc933" />
			<rect x="716" y="82" width="68" height="68" fill="#ffd2c2" />
			<circle cx="812" cy="44" r="46" fill="#ffe08a" />
			<path d="M800 150 858 62l58 88Z" fill="#3fae7c" />
			<rect x="884" y="36" width="72" height="72" transform="rotate(32 920 72)" fill="#1a2d44" />
			<path d="M916 150a56 56 0 0 1 112 0Z" fill="#ff7a45" />
			<path d="M1000 56 1094 34 1064 126Z" fill="#ffd2c2" />
			<circle cx="1132" cy="98" r="52" fill="#1a2d44" />
			<rect x="1186" y="70" width="80" height="80" fill="#2168c4" />
			<path d="M1250 100 1310 14l60 86Z" fill="#ffc933" />
			<path d="M1290 150a60 60 0 0 1 120 0Z" fill="#3fae7c" />
			<circle cx="1420" cy="70" r="40" fill="#ffd2c2" />
		</svg>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
