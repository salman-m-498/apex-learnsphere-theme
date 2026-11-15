<?php
/**
 * Header template.
 *
 * A floating, rounded navigation bar that sits over the page hero.
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
	<div class="nav-bar">
		<div class="site-branding">
			<?php if ( has_custom_logo() ) : ?>
				<?php the_custom_logo(); ?>
			<?php else : ?>
				<a class="site-branding__link" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<span class="brand__mark" aria-hidden="true">
						<?php apex_logo( 'white' ); ?>
						<?php apex_logo( 'default' ); ?>
					</span>
					<span class="screen-reader-text"><?php bloginfo( 'name' ); ?></span>
				</a>
			<?php endif; ?>
		</div>

		<button class="nav-toggle" type="button" aria-controls="site-navigation" aria-expanded="false">
			<span class="nav-toggle__label"><?php esc_html_e( 'Menu', 'apex-learnsphere' ); ?></span>
			<span class="nav-toggle__icon" aria-hidden="true">
				<span class="nav-toggle__bar"></span>
				<span class="nav-toggle__bar"></span>
			</span>
		</button>

		<nav class="site-nav" id="site-navigation" aria-label="<?php esc_attr_e( 'Primary navigation', 'apex-learnsphere' ); ?>">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'menu_id'        => 'primary-menu',
					'menu_class'     => 'site-nav__menu',
					'container'      => false,
					'fallback_cb'    => 'apex_fallback_menu',
					'depth'          => 2,
				)
			);
			?>
			<div class="site-nav__actions">
				<a class="site-nav__pill" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Book a Consultation', 'apex-learnsphere' ); ?></a>
			</div>
		</nav>
	</div>
</header>

<main id="main" class="site-main">
