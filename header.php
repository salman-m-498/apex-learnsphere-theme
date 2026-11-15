<?php
/**
 * Header template.
 *
 * @package apex-learnsphere
 */
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
				<?php
				if ( has_custom_logo() ) {
					the_custom_logo();
				} else {
					apex_logo( 'default' );
				}
				?>
				<span class="screen-reader-text"><?php bloginfo( 'name' ); ?></span>
			</a>
		</div>

		<nav class="site-nav" id="site-navigation" aria-label="<?php esc_attr_e( 'Primary navigation', 'apex-learnsphere' ); ?>">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'menu_id'        => 'primary-menu',
					'container'      => false,
					'fallback_cb'    => false,
					'depth'          => 2,
				)
			);
			?>
			<div class="site-nav__cta">
				<a class="btn btn--primary" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Book a Consultation', 'apex-learnsphere' ); ?></a>
			</div>
		</nav>

		<button class="nav-toggle" aria-controls="site-navigation" aria-expanded="false">
			<span class="nav-toggle__bar"></span>
			<span class="nav-toggle__bar"></span>
			<span class="nav-toggle__bar"></span>
			<span class="screen-reader-text"><?php esc_html_e( 'Menu', 'apex-learnsphere' ); ?></span>
		</button>
	</div>
</header>

<main id="main" class="site-main">
