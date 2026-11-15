<?php
/**
 * Header template.
 *
 * @package apex-learnsphere
 */
$brand = apex_brand();
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'apex-learnsphere' ); ?></a>

<header class="site-header" id="masthead">
	<div class="site-header__inner container">
		<div class="site-branding">
			<a class="site-branding__link" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<?php apex_logo( 'white' ); ?>
				<span class="screen-reader-text"><?php bloginfo( 'name' ); ?></span>
			</a>
		</div>

		<div class="site-header__right">
			<nav class="site-header__links" aria-label="<?php esc_attr_e( 'Primary links', 'apex-learnsphere' ); ?>">
				<a href="<?php echo esc_url( home_url( '/about/' ) ); ?>"><?php esc_html_e( 'About', 'apex-learnsphere' ); ?></a>
				<a href="<?php echo esc_url( home_url( '/services/' ) ); ?>"><?php esc_html_e( 'Services', 'apex-learnsphere' ); ?></a>
				<a href="<?php echo esc_url( home_url( '/training/' ) ); ?>"><?php esc_html_e( 'Training', 'apex-learnsphere' ); ?></a>
				<a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Contact', 'apex-learnsphere' ); ?></a>
			</nav>

			<button class="menu-btn" data-menu-open aria-controls="site-menu" aria-expanded="false">
				<span class="menu-btn__label"><?php esc_html_e( 'Menu', 'apex-learnsphere' ); ?></span>
				<span class="menu-btn__icon" aria-hidden="true"></span>
			</button>
		</div>
	</div>
</header>

<div class="menu-overlay" id="site-menu" aria-hidden="true">
	<div class="menu-overlay__top container">
		<a class="menu-overlay__logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			<?php apex_logo( 'white' ); ?>
		</a>
		<button class="menu-close" data-menu-close aria-controls="site-menu" aria-expanded="true" aria-label="<?php esc_attr_e( 'Close menu', 'apex-learnsphere' ); ?>">
			<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true" focusable="false"><path d="M18 6 6 18" /><path d="m6 6 12 12" /></svg>
		</button>
	</div>

	<div class="menu-overlay__body container">
		<nav class="menu-overlay__nav" aria-label="<?php esc_attr_e( 'Primary navigation', 'apex-learnsphere' ); ?>">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'menu_id'        => 'overlay-menu',
					'container'      => false,
					'depth'          => 2,
					'fallback_cb'    => false,
				)
			);
			?>
		</nav>

		<div class="menu-overlay__footer">
			<p class="menu-overlay__tagline"><?php echo esc_html( $brand['tagline'] ); ?></p>
			<div class="menu-overlay__contact">
				<a href="mailto:<?php echo esc_attr( $brand['email'] ); ?>"><?php echo esc_html( $brand['email'] ); ?></a>
				<a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $brand['phone'] ) ); ?>"><?php echo esc_html( $brand['phone'] ); ?></a>
				<a href="https://wa.me/<?php echo esc_attr( $brand['whatsapp'] ); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'WhatsApp', 'apex-learnsphere' ); ?></a>
			</div>
			<div class="menu-overlay__actions">
				<a class="btn btn--light" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Book a Consultation', 'apex-learnsphere' ); ?></a>
				<div class="menu-overlay__social">
					<?php
					$socials = array(
						'Instagram' => 'https://instagram.com/apexlearnsphere',
						'LinkedIn'  => 'https://linkedin.com/company/apexlearnsphere',
						'Facebook'  => 'https://facebook.com/apexlearnsphere',
						'YouTube'   => 'https://youtube.com/@apexlearnsphere',
					);
					foreach ( $socials as $label => $url ) :
						?>
						<a class="social-link social-link--on-dark" href="<?php echo esc_url( $url ); ?>" target="_blank" rel="noopener noreferrer">
							<span class="screen-reader-text"><?php echo esc_html( $label ); ?></span>
							<?php echo apex_social_svg( strtolower( $label ) ); // phpcs:ignore ?>
						</a>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</div>

<main id="main" class="site-main">
