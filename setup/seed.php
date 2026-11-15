<?php
/**
 * Seed content for Apex LearnSphere (runs via a Playground Blueprint).
 * Idempotent — safe to re-run.
 *
 * The Playground CLI's `runPHP` step runs bare PHP, so we bootstrap
 * WordPress first — the same way the CLI's own activateTheme step does.
 */

// Bootstrap WordPress only if it isn't already loaded (e.g. bare PHP in
// WordPress Playground's `runPHP` step). Under WP-CLI it is already loaded.
if ( ! function_exists( 'switch_theme' ) ) {
	$docroot = getenv( 'DOCROOT' ) ? getenv( 'DOCROOT' ) : '/wordpress';
	require_once $docroot . '/wp-load.php';
}

// Switch theme (in case the activateTheme step did not).
switch_theme( 'apex-learnsphere' );

// Permalinks.
update_option( 'permalink_structure', '/%postname%/' );
update_option( 'blogname', 'Apex LearnSphere' );
update_option( 'blogdescription', 'Think ahead. Learn smart. Lead the future.' );

$pages = array(
	'home'             => array( 'Home', '' ),
	'about'            => array( 'About Us', 'template-about.php' ),
	'services'         => array( 'Our Services', 'template-services.php' ),
	'schools'          => array( 'For Schools & Institutions', 'template-schools.php' ),
	'students-parents' => array( 'For Students & Parents', 'template-students-parents.php' ),
	'businesses'       => array( 'For Businesses & Organisations', 'template-business.php' ),
	'sports'           => array( 'For Sports Organisations', 'template-sports.php' ),
	'contact'          => array( 'Contact Us', 'template-contact.php' ),
	'training'         => array( 'Training & Programmes', 'template-training.php' ),
	'resources'        => array( 'Resources', '' ),
	'privacy-policy'   => array( 'Privacy Policy', '' ),
	'terms'            => array( 'Terms of Use', '' ),
	'cookies'          => array( 'Cookie Policy', '' ),
);

$ids = array();
foreach ( $pages as $slug => $data ) {
	$existing = get_page_by_path( $slug );
	if ( $existing ) {
		$ids[ $slug ] = $existing->ID;
		$template  = $data[1];
		// WordPress creates a draft "Privacy Policy" page on install — publish it.
		if ( 'publish' !== $existing->post_status ) {
			wp_update_post(
				array(
					'ID'          => $existing->ID,
					'post_status' => 'publish',
				)
			);
		}
		if ( $template ) {
			update_post_meta( $existing->ID, '_wp_page_template', $template );
		}
		continue;
	}
	$id = wp_insert_post(
		array(
			'post_title'  => $data[0],
			'post_name'   => $slug,
			'post_type'   => 'page',
			'post_status' => 'publish',
		)
	);
	if ( ! is_wp_error( $id ) ) {
		$ids[ $slug ] = $id;
		if ( $data[1] ) {
			update_post_meta( $id, '_wp_page_template', $data[1] );
		}
	}
}

// Front page + posts page.
update_option( 'show_on_front', 'page' );
if ( isset( $ids['home'] ) ) {
	update_option( 'page_on_front', $ids['home'] );
}
if ( isset( $ids['resources'] ) ) {
	update_option( 'page_for_posts', $ids['resources'] );
}

// Primary menu.
$menu = wp_get_nav_menu_object( 'Primary' );
$menu_id = $menu ? $menu->term_id : wp_create_nav_menu( 'Primary' );

if ( ! is_wp_error( $menu_id ) ) {
	// Clear existing items so re-runs don't duplicate.
	$existing_items = wp_get_nav_menu_items( $menu_id );
	if ( $existing_items ) {
		foreach ( $existing_items as $item ) {
			wp_delete_post( $item->ID, true );
		}
	}

	$add = function ( $title, $url, $parent = 0 ) use ( $menu_id ) {
		return wp_update_nav_menu_item(
			$menu_id,
			0,
			array(
				'menu-item-title'  => $title,
				'menu-item-url'    => $url,
				'menu-item-type'   => 'custom',
				'menu-item-status' => 'publish',
				'menu-item-parent-id' => $parent,
			)
		);
	};

	$add( 'About Us', home_url( '/about/' ) );
	$add( 'Our Services', home_url( '/services/' ) );
	$who = $add( 'Who We Help', '#' );
	$add( 'For Schools & Institutions', home_url( '/schools/' ), $who );
	$add( 'For Students & Parents', home_url( '/students-parents/' ), $who );
	$add( 'For Businesses & Organisations', home_url( '/businesses/' ), $who );
	$add( 'For Sports Organisations', home_url( '/sports/' ), $who );
	$add( 'Training & Programmes', home_url( '/training/' ) );
	$add( 'Resources', home_url( '/resources/' ) );
	$add( 'Contact Us', home_url( '/contact/' ) );

	$locations            = get_theme_mod( 'nav_menu_locations', array() );
	$locations['primary'] = $menu_id;
	set_theme_mod( 'nav_menu_locations', $locations );
}

// A sample resource post so the Resources page is not empty.
$existing_post = get_page_by_path( 'welcome-to-apex-learnsphere', OBJECT, 'post' );
if ( ! $existing_post ) {
	wp_insert_post(
		array(
			'post_title'   => 'Welcome to Apex LearnSphere',
			'post_name'    => 'welcome-to-apex-learnsphere',
			'post_type'    => 'post',
			'post_status'  => 'publish',
			'post_content' => "We are delighted to introduce Apex LearnSphere — a multidisciplinary consultancy connecting education, people and opportunity.\n\nThis space will share practical insights across education, career guidance, management, sport, business and leadership. Check back soon for articles, guides and updates.",
		)
	);
}

// Sample events for Training & Programmes (upcoming, recurring and past).
$events = array(
	array(
		'slug'    => 'careers-pathways-workshop',
		'title'   => 'Careers & Pathways Workshop',
		'content' => "A practical, hands-on workshop for students and parents making decisions about subjects, streams and future careers.\n\nWe will explore how to match interests and strengths with realistic pathways, and walk through a simple framework you can reuse after the session.",
		'meta'    => array(
			'event_type'       => 'in-person',
			'event_date'       => date( 'Y-m-d', strtotime( '+10 days' ) ),
			'event_start_time' => '10:00',
			'event_end_time'   => '12:00',
			'event_recurrence' => 'none',
			'event_location'   => 'Doha, Qatar',
		),
	),
	array(
		'slug'    => 'leadership-through-sport-webinar',
		'title'   => 'Leadership Through Sport — Free Webinar',
		'content' => "An online session for coaches, captains and sports leaders on building the culture and behaviours that drive consistent performance.\n\nJoin us for a practical look at leadership through sport, with examples you can apply to your own team or club.",
		'meta'    => array(
			'event_type'       => 'online',
			'event_date'       => date( 'Y-m-d', strtotime( '+18 days' ) ),
			'event_start_time' => '18:00',
			'event_end_time'   => '19:00',
			'event_recurrence' => 'none',
			'event_video_url'  => 'https://meet.google.com/abc-defg-hij',
		),
	),
	array(
		'slug'    => 'weekly-study-skills-clinic',
		'title'   => 'Weekly Study Skills Clinic',
		'content' => "A weekly online drop-in clinic for students who want to build stronger study habits, manage their time better and prepare more effectively for assessments.\n\nEach session covers a focused, practical skill — join any week.",
		'meta'    => array(
			'event_type'           => 'online',
			'event_date'           => date( 'Y-m-d', strtotime( '+3 days' ) ),
			'event_start_time'     => '16:00',
			'event_end_time'       => '17:00',
			'event_recurrence'     => 'weekly',
			'event_recurrence_end' => '',
			'event_video_url'      => 'https://meet.google.com/xyz-uvw-123',
		),
	),
	array(
		'slug'    => 'teacher-development-day',
		'title'   => 'Teacher Development Day',
		'content' => "A full-day professional development session for teaching staff, covering practical classroom strategies and inclusive practice.",
		'meta'    => array(
			'event_type'       => 'in-person',
			'event_date'       => date( 'Y-m-d', strtotime( '-20 days' ) ),
			'event_start_time' => '09:00',
			'event_end_time'   => '15:00',
			'event_recurrence' => 'none',
			'event_location'   => 'Doha, Qatar',
		),
	),
);

foreach ( $events as $ev ) {
	$existing = get_page_by_path( $ev['slug'], OBJECT, 'event' );
	if ( $existing ) {
		$event_id = $existing->ID;
	} else {
		$event_id = wp_insert_post(
			array(
				'post_title'   => $ev['title'],
				'post_name'    => $ev['slug'],
				'post_type'    => 'event',
				'post_status'  => 'publish',
				'post_content' => $ev['content'],
			)
		);
	}
	if ( ! is_wp_error( $event_id ) ) {
		foreach ( $ev['meta'] as $key => $value ) {
			update_post_meta( $event_id, $key, $value );
		}
	}
}
