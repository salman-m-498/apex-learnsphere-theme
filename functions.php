<?php
/**
 * Apex LearnSphere theme functions.
 *
 * @package apex-learnsphere
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'APEX_VERSION', '1.0.0' );
define( 'APEX_DIR', get_template_directory() );
define( 'APEX_URI', get_template_directory_uri() );

/**
 * Theme setup.
 */
function apex_setup() {
	load_theme_textdomain( 'apex-learnsphere', APEX_DIR . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'editor-styles' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'customize-selective-refresh-widgets' );
	add_theme_support( 'custom-spacing' );

	add_theme_support(
		'html5',
		array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' )
	);

	add_theme_support(
		'custom-logo',
		array(
			'height'      => 120,
			'width'       => 120,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	register_nav_menus(
		array(
			'primary'         => __( 'Primary Menu', 'apex-learnsphere' ),
			'footer-services' => __( 'Footer — Services', 'apex-learnsphere' ),
			'footer-company'  => __( 'Footer — Company', 'apex-learnsphere' ),
		)
	);

	add_editor_style( 'assets/css/editor.css' );
}
add_action( 'after_setup_theme', 'apex_setup' );

/**
 * Set content width.
 */
function apex_content_width() {
	$GLOBALS['content_width'] = 1200;
}
add_action( 'after_setup_theme', 'apex_content_width', 0 );

/**
 * Enqueue styles and scripts.
 */
function apex_scripts() {
	$css = APEX_URI . '/assets/css/main.css';
	$js  = APEX_URI . '/assets/js/main.js';

	wp_enqueue_style( 'apex-fonts', APEX_URI . '/assets/fonts/fonts.css', array(), APEX_VERSION );
	wp_enqueue_style( 'apex-main', $css, array( 'apex-fonts' ), APEX_VERSION );

	wp_enqueue_script( 'apex-main', $js, array(), APEX_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'apex_scripts' );

/**
 * Register widget areas.
 */
function apex_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Footer', 'apex-learnsphere' ),
			'id'            => 'footer-1',
			'description'   => __( 'Footer content area.', 'apex-learnsphere' ),
			'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="footer-widget__title">',
			'after_title'   => '</h4>',
		)
	);
}
add_action( 'widgets_init', 'apex_widgets_init' );

/**
 * Excerpt length and "more" string.
 */
function apex_excerpt_length( $length ) {
	return is_admin() ? $length : 22;
}
add_filter( 'excerpt_length', 'apex_excerpt_length' );

function apex_excerpt_more( $more ) {
	return is_admin() ? $more : '&hellip;';
}
add_filter( 'excerpt_more', 'apex_excerpt_more' );

/**
 * Add utility classes to body.
 */
function apex_body_classes( $classes ) {
	$classes[] = 'apex';
	if ( ! is_front_page() ) {
		$classes[] = 'apex-inner';
	}
	return $classes;
}
add_filter( 'body_class', 'apex_body_classes' );

/**
 * Return the brand logo markup.
 */
function apex_logo( $variant = 'default' ) {
	$img = get_template_directory_uri() . '/assets/img/';
	$map = array(
		'default' => 'logo.png',
		'white'   => 'logo-white.png',
		'navy'    => 'logo-navy.png',
		'blue'    => 'logo-blue.png',
		'green'   => 'logo-green.png',
	);
	$file = isset( $map[ $variant ] ) ? $map[ $variant ] : $map['default'];
	printf(
		'<img class="site-logo site-logo--%1$s" src="%2$s%3$s" alt="%4$s" />',
		esc_attr( $variant ),
		esc_url( $img ),
		esc_attr( $file ),
		esc_attr( get_bloginfo( 'name' ) )
	);
}

/**
 * Return the URL of a bundled image asset (WebP).
 */
function apex_img_url( $name ) {
	return get_template_directory_uri() . '/assets/img/' . $name . '.webp';
}

/**
 * Return an inline SVG icon from the Lucide set.
 */
function apex_icon( $name, $class = '' ) {
	$icons = array(
		'school'      => '<path d="M22 9 12 5 2 9l10 4 10-4Z"/><path d="M6 10.6V16a6 3 0 0 0 12 0v-5.4"/><path d="M22 9v6"/>',
		'graduate'    => '<path d="M22 10v6"/><path d="M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/>',
		'users'       => '<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>',
		'family'      => '<path d="M3 21v-3a4 4 0 0 1 4-4h2"/><circle cx="8" cy="9" r="4"/><path d="M13 21v-2a4 4 0 0 1 4-4h2a4 4 0 0 1 4 4v2"/><circle cx="20" cy="7" r="3"/>',
		'briefcase'   => '<rect width="20" height="14" x="2" y="7" rx="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/>',
		'trophy'      => '<path d="M6 9H4.5a2.5 2.5 0 0 1 0-5H6"/><path d="M18 9h1.5a2.5 2.5 0 0 0 0-5H18"/><path d="M4 22h16"/><path d="M10 14.66V17c0 .55-.47.98-.97 1.21C7.85 18.75 7 20.24 7 22"/><path d="M14 14.66V17c0 .55.47.98.97 1.21C16.15 18.75 17 20.24 17 22"/><path d="M18 2H6v7a6 6 0 0 0 12 0V2Z"/>',
		'compass'     => '<circle cx="12" cy="12" r="10"/><polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"/>',
		'lightbulb'   => '<path d="M15 14c.2-1 .7-1.7 1.5-2.5 1-.9 1.5-2.2 1.5-3.5A6 6 0 0 0 6 8c0 1 .2 2.2 1.5 3.5.7.7 1.3 1.5 1.5 2.5"/><path d="M9 18h6"/><path d="M10 22h4"/>',
		'target'      => '<circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="6"/><circle cx="12" cy="12" r="2"/>',
		'trending-up' => '<polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/><polyline points="16 7 22 7 22 13"/>',
		'heart-handshake' => '<path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/><path d="M12 5 9.04 7.96a2.17 2.17 0 0 0 0 3.08c.82.82 2.13.85 3 .07l2.07-1.9a2.82 2.82 0 0 1 3.79 0l2.96 2.66"/><path d="m18 15-2-2"/><path d="m15 18-2-2"/>',
		'clipboard-check' => '<rect width="8" height="4" x="8" y="2" rx="1" ry="1"/><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><path d="m9 14 2 2 4-4"/>',
		'messages'    => '<path d="M21 11.5a8.5 8.5 0 0 1-8.5 8.5 8.4 8.4 0 0 1-3.8-.9L3 21l1.9-5.7a8.5 8.5 0 1 1 16.1-3.8Z"/>',
		'phone'       => '<path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>',
		'mail'        => '<rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>',
		'map-pin'     => '<path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/>',
		'arrow-right' => '<path d="M5 12h14"/><path d="m12 5 7 7-7 7"/>',
		'arrow-up-right' => '<path d="M7 7h10v10"/><path d="M7 17 17 7"/>',
		'check'       => '<path d="M20 6 9 17l-5-5"/>',
		'chevron-down' => '<path d="m6 9 6 6 6-6"/>',
		'menu'        => '<line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/>',
		'x'           => '<path d="M18 6 6 18"/><path d="m6 6 12 12"/>',
		'book-open'   => '<path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/>',
		'award'       => '<circle cx="12" cy="8" r="6"/><path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/>',
		'handshake'   => '<path d="m11 17 2 2a1 1 0 1 0 3-3"/><path d="m14 14 2.5 2.5a1 1 0 1 0 3-3l-3.88-3.88a3 3 0 0 0-4.24 0l-.88.88a1 1 0 1 1-3-3l2.81-2.81a5.79 5.79 0 0 1 7.06-.87l.47.28a2 2 0 0 0 1.42.25L21 4"/><path d="m21 3 1 11h-2"/><path d="M3 3 2 14l6.5 6.5a1 1 0 1 0 3-3"/><path d="M3 4h8"/>',
	);

	if ( ! isset( $icons[ $name ] ) ) {
		return '';
	}

	return sprintf(
		'<svg class="icon icon--%1$s %2$s" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">%3$s</svg>',
		esc_attr( $name ),
		esc_attr( $class ),
		$icons[ $name ]
	);
}

/**
 * Return a social brand SVG icon.
 */
function apex_social_svg( $name ) {
	$socials = array(
		'instagram' => '<path d="M12 2.16c3.2 0 3.58.01 4.85.07 1.17.05 1.8.25 2.23.42.56.22.96.48 1.38.9.42.42.68.82.9 1.38.16.42.36 1.06.41 2.23.06 1.27.07 1.65.07 4.85s-.01 3.58-.07 4.85c-.05 1.17-.25 1.8-.42 2.23-.22.56-.48.96-.9 1.38-.42.42-.82.68-1.38.9-.42.16-1.06.36-2.23.41-1.27.06-1.65.07-4.85.07s-3.58-.01-4.85-.07c-1.17-.05-1.8-.25-2.23-.42a3.7 3.7 0 0 1-1.38-.9 3.7 3.7 0 0 1-.9-1.38c-.16-.42-.36-1.06-.41-2.23-.06-1.27-.07-1.65-.07-4.85s.01-3.58.07-4.85c.05-1.17.25-1.8.42-2.23.22-.56.48-.96.9-1.38.42-.42.82-.68 1.38-.9.42-.16 1.06-.36 2.23-.41 1.27-.06 1.65-.07 4.85-.07M12 0C8.74 0 8.33.01 7.05.07 5.78.13 4.9.33 4.14.63c-.79.31-1.46.72-2.13 1.38A5.9 5.9 0 0 0 .63 4.14C.33 4.9.13 5.78.07 7.05.01 8.33 0 8.74 0 12s.01 3.67.07 4.95c.06 1.27.26 2.15.56 2.91.31.79.72 1.46 1.38 2.13a5.9 5.9 0 0 0 2.13 1.38c.76.3 1.64.5 2.91.56C8.33 23.99 8.74 24 12 24s3.67-.01 4.95-.07c1.27-.06 2.15-.26 2.91-.56a5.9 5.9 0 0 0 2.13-1.38 5.9 5.9 0 0 0 1.38-2.13c.3-.76.5-1.64.56-2.91.06-1.28.07-1.69.07-4.95s-.01-3.67-.07-4.95c-.06-1.27-.26-2.15-.56-2.91a5.9 5.9 0 0 0-1.38-2.13A5.9 5.9 0 0 0 19.86.63c-.76-.3-1.64-.5-2.91-.56C15.67.01 15.26 0 12 0Zm0 5.84a6.16 6.16 0 1 0 0 12.32 6.16 6.16 0 0 0 0-12.32ZM12 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8Zm7.85-10.4a1.44 1.44 0 1 1-2.88 0 1.44 1.44 0 0 1 2.88 0Z"/>',
		'linkedin'  => '<path d="M20.45 20.45h-3.55v-5.57c0-1.33-.03-3.04-1.85-3.04-1.86 0-2.14 1.45-2.14 2.94v5.67H9.35V9h3.41v1.56h.05c.47-.9 1.63-1.85 3.37-1.85 3.6 0 4.27 2.37 4.27 5.46v6.28ZM5.34 7.43a2.06 2.06 0 1 1 0-4.13 2.06 2.06 0 0 1 0 4.13ZM7.12 20.45H3.55V9h3.57v11.45ZM22.22 0H1.77C.79 0 0 .77 0 1.73v20.54C0 23.23.79 24 1.77 24h20.45c.98 0 1.78-.77 1.78-1.73V1.73C24 .77 23.2 0 22.22 0Z"/>',
		'facebook'  => '<path d="M24 12.07C24 5.4 18.63 0 12 0S0 5.4 0 12.07c0 6.02 4.39 11.02 10.13 11.93v-8.44H7.08v-3.49h3.05V9.41c0-3.02 1.8-4.7 4.55-4.7 1.32 0 2.7.24 2.7.24v2.97h-1.52c-1.5 0-1.97.93-1.97 1.89v2.26h3.35l-.54 3.49h-2.81v8.44C19.6 23.09 24 18.09 24 12.07Z"/>',
		'youtube'   => '<path d="M23.5 6.19a3.02 3.02 0 0 0-2.12-2.14C19.5 3.55 12 3.55 12 3.55s-7.5 0-9.38.5A3.02 3.02 0 0 0 .5 6.19C0 8.07 0 12 0 12s0 3.93.5 5.81a3.02 3.02 0 0 0 2.12 2.14c1.87.5 9.38.5 9.38.5s7.5 0 9.38-.5a3.02 3.02 0 0 0 2.12-2.14C24 15.93 24 12 24 12s0-3.93-.5-5.81ZM9.55 15.57V8.43L15.82 12l-6.27 3.57Z"/>',
		'x'         => '<path d="M18.9 1.15h3.68l-8.04 9.19L24 22.85h-7.41l-5.8-7.58-6.64 7.58H.47l8.6-9.83L0 1.15h7.59l5.24 6.93ZM17.61 20.64h2.04L6.49 3.24H4.3Z"/>',
	);

	if ( ! isset( $socials[ $name ] ) ) {
		return '';
	}

	return sprintf(
		'<svg class="icon icon--social" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" focusable="false">%s</svg>',
		$socials[ $name ]
	);
}

/**
 * Brand details (single source of truth for contact/CTA values).
 */
function apex_brand( $key = null ) {
	$brand = array(
		'name'     => 'Apex LearnSphere',
		'tagline'  => 'Think ahead. Learn smart. Lead the future.',
		'email'    => 'hello@apexlearnsphere.com',
		'phone'    => '+974 0000 0000',
		'whatsapp' => '+97400000000',
	);
	if ( null === $key ) {
		return $brand;
	}
	return isset( $brand[ $key ] ) ? $brand[ $key ] : '';
}

/**
 * Load the contact form handler.
 */
require APEX_DIR . '/inc/contact-form.php';

/**
 * Load the events (Training & Programmes) feature.
 */
require APEX_DIR . '/inc/events.php';
