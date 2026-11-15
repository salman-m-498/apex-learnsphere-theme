<?php
/**
 * Front page template.
 *
 * @package apex-learnsphere
 */

get_header();

$apex_panels = array(
	array(
		'title' => __( 'Schools & Institutions', 'apex-learnsphere' ),
		'text'  => __( 'School improvement, leadership and teacher development.', 'apex-learnsphere' ),
		'url'   => home_url( '/schools/' ),
		'img'   => 'schools',
		'alt'   => __( 'Students learning together in a classroom', 'apex-learnsphere' ),
		'tone'  => 'blue',
	),
	array(
		'title' => __( 'Students & Parents', 'apex-learnsphere' ),
		'text'  => __( 'Career guidance, subject choices and support for your child’s learning.', 'apex-learnsphere' ),
		'url'   => home_url( '/students-parents/' ),
		'img'   => 'students-parents',
		'alt'   => __( 'A parent supporting a child with their learning at home', 'apex-learnsphere' ),
		'tone'  => 'peach',
	),
	array(
		'title' => __( 'Businesses & Organisations', 'apex-learnsphere' ),
		'text'  => __( 'Management consultancy and leadership development.', 'apex-learnsphere' ),
		'url'   => home_url( '/businesses/' ),
		'img'   => 'businesses',
		'alt'   => __( 'Colleagues working together in a meeting', 'apex-learnsphere' ),
		'tone'  => 'mint',
	),
	array(
		'title' => __( 'Sports Organisations', 'apex-learnsphere' ),
		'text'  => __( 'Team culture and leadership through sport.', 'apex-learnsphere' ),
		'url'   => home_url( '/sports/' ),
		'img'   => 'sports',
		'alt'   => __( 'A sports team training together', 'apex-learnsphere' ),
		'tone'  => 'yellow',
	),
);

$apex_pillars = array(
	array(
		'icon'  => 'book-open',
		'title' => __( 'Education', 'apex-learnsphere' ),
		'sub'   => __( 'For schools and institutions', 'apex-learnsphere' ),
		'text'  => __( 'School improvement, curriculum, teaching and inclusive learning.', 'apex-learnsphere' ),
		'url'   => home_url( '/schools/' ),
		'tone'  => 'blue',
	),
	array(
		'icon'  => 'compass',
		'title' => __( 'Career Guidance & Counselling', 'apex-learnsphere' ),
		'sub'   => __( 'For students and families', 'apex-learnsphere' ),
		'text'  => __( 'Career exploration, subject choices and higher-education pathways.', 'apex-learnsphere' ),
		'url'   => home_url( '/students-parents/' ),
		'tone'  => 'coral',
	),
	array(
		'icon'  => 'target',
		'title' => __( 'Management', 'apex-learnsphere' ),
		'sub'   => __( 'For organisations', 'apex-learnsphere' ),
		'text'  => __( 'Strategic planning, operations and service quality for organisations.', 'apex-learnsphere' ),
		'url'   => home_url( '/businesses/' ),
		'tone'  => 'green',
	),
	array(
		'icon'  => 'trophy',
		'title' => __( 'Sport', 'apex-learnsphere' ),
		'sub'   => __( 'For clubs and academies', 'apex-learnsphere' ),
		'text'  => __( 'Sports development, team culture and performance environments.', 'apex-learnsphere' ),
		'url'   => home_url( '/sports/' ),
		'tone'  => 'yellow',
	),
	array(
		'icon'  => 'trending-up',
		'title' => __( 'Business & Leadership', 'apex-learnsphere' ),
		'sub'   => __( 'For teams and leaders', 'apex-learnsphere' ),
		'text'  => __( 'Leadership development, communication and team performance.', 'apex-learnsphere' ),
		'url'   => home_url( '/businesses/' ),
		'tone'  => 'navy',
	),
);

$apex_stats = array(
	array(
		'num'  => '7',
		'lbl'  => __( 'Disciplines of expertise', 'apex-learnsphere' ),
		'tone' => 'green',
	),
	array(
		'num'  => '5',
		'lbl'  => __( 'Core service pillars', 'apex-learnsphere' ),
		'tone' => 'coral',
	),
	array(
		'num'  => '6',
		'lbl'  => __( 'Audiences we serve', 'apex-learnsphere' ),
		'tone' => 'mint',
	),
);

$apex_reasons = array(
	array(
		'title' => __( 'People-centred', 'apex-learnsphere' ),
		'text'  => __( 'We start with the person or organisation in front of us — not a template.', 'apex-learnsphere' ),
		'tone'  => 'coral',
	),
	array(
		'title' => __( 'Multidisciplinary', 'apex-learnsphere' ),
		'text'  => __( 'Education, career, management, sport and leadership — connected, not separate.', 'apex-learnsphere' ),
		'tone'  => 'yellow',
	),
	array(
		'title' => __( 'Practical and action-focused', 'apex-learnsphere' ),
		'text'  => __( 'Clear recommendations and realistic next steps you can act on immediately.', 'apex-learnsphere' ),
		'tone'  => 'green',
	),
	array(
		'title' => __( 'Evidence-informed', 'apex-learnsphere' ),
		'text'  => __( 'Grounded in good practice and adapted to your local context.', 'apex-learnsphere' ),
		'tone'  => 'blue',
	),
);

$apex_events = apex_get_upcoming_events( 3 );
$apex_tones  = array( 'coral', 'yellow', 'green' );
?>

<!-- Hero -->
<section class="hero" id="top">
	<figure class="hero__bg">
		<img src="<?php echo esc_url( APEX_URI . '/assets/img/hero-home.jpg' ); ?>" alt="<?php esc_attr_e( 'Two students studying together over an open book in warm window light', 'apex-learnsphere' ); ?>" width="2000" height="1333" fetchpriority="high" />
	</figure>

	<div class="hero__screen">
		<div class="hero__copy">
			<p class="hero__eyebrow"><?php bloginfo( 'name' ); ?></p>
			<h1 class="hero__title"><?php esc_html_e( 'Connecting education, people & opportunity', 'apex-learnsphere' ); ?></h1>
			<p class="hero__text"><?php esc_html_e( 'From school improvement and career guidance to leadership and sport, we bring practical, people-centred support to every stage of learning.', 'apex-learnsphere' ); ?></p>
		</div>
		<a class="hero__scroll" href="#hero-statement">
			<span class="screen-reader-text"><?php esc_html_e( 'Scroll to introduction', 'apex-learnsphere' ); ?></span>
			<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M12 5v14" /><path d="m6 13 6 6 6-6" /></svg>
		</a>
	</div>

	<div class="hero__statement" id="hero-statement">
		<div class="container">
			<p class="hero__statement-text reveal"><?php esc_html_e( 'A multidisciplinary consultancy helping schools, students, families, businesses and sports organisations learn smarter, lead better and reach the next stage with confidence.', 'apex-learnsphere' ); ?></p>
		</div>
	</div>
</section>

<!-- Who we are + link panels -->
<section class="section intro">
	<span class="shape shape--intro" aria-hidden="true">
		<svg viewBox="0 0 160 200" focusable="false"><path d="M0 92 160 0v184Z" fill="#ff7a45" /><rect x="76" y="92" width="84" height="108" fill="#ffc933" /><path d="M76 92h84v92Z" fill="#fffcf6" /></svg>
	</span>
	<div class="container">
		<div class="intro__panels">
			<h2 class="label label--center reveal"><?php esc_html_e( 'How can we help you?', 'apex-learnsphere' ); ?></h2>
			<div class="panel-grid">
				<?php foreach ( $apex_panels as $apex_panel ) : ?>
					<a class="panel-card panel-card--<?php echo esc_attr( $apex_panel['tone'] ); ?> reveal" href="<?php echo esc_url( $apex_panel['url'] ); ?>">
						<span class="panel-card__media">
							<img src="<?php echo esc_url( apex_img_url( $apex_panel['img'] ) ); ?>" alt="<?php echo esc_attr( $apex_panel['alt'] ); ?>" width="1400" height="1050" loading="lazy" />
						</span>
						<span class="panel-card__text">
							<span class="panel-card__title"><?php echo esc_html( $apex_panel['title'] ); ?></span>
							<span class="panel-card__arrow" aria-hidden="true">&#8594;</span>
							<span class="panel-card__desc"><?php echo esc_html( $apex_panel['text'] ); ?></span>
						</span>
					</a>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>

<!-- Pillars -->
<section class="section scroll-list">
	<div class="container scroll-list__grid">
		<div class="scroll-list__head">
			<p class="label"><?php esc_html_e( 'What we do', 'apex-learnsphere' ); ?></p>
			<h2 class="scroll-list__title"><?php esc_html_e( 'Five pillars, one connected approach', 'apex-learnsphere' ); ?></h2>
		</div>
		<ul class="scroll-list__items">
			<?php foreach ( $apex_pillars as $apex_pillar ) : ?>
				<li class="scroll-list__item reveal">
					<a class="scroll-list__link" href="<?php echo esc_url( $apex_pillar['url'] ); ?>">
						<span class="scroll-list__icon scroll-list__icon--<?php echo esc_attr( $apex_pillar['tone'] ); ?>"><?php echo apex_icon( $apex_pillar['icon'] ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
						<span class="scroll-list__name">
							<span class="scroll-list__heading"><?php echo esc_html( $apex_pillar['title'] ); ?></span>
							<span class="scroll-list__sub"><?php echo esc_html( $apex_pillar['sub'] ); ?></span>
						</span>
						<span class="scroll-list__desc"><?php echo esc_html( $apex_pillar['text'] ); ?></span>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
	<div class="container scroll-list__cta reveal">
		<a class="btn btn--outline" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Not sure where to start? Talk to us', 'apex-learnsphere' ); ?> <span class="btn__arrow" aria-hidden="true">&#8594;</span></a>
	</div>
</section>

<!-- At a glance -->
<section class="section section--dark stats">
	<span class="shape shape--stats" aria-hidden="true">
		<svg viewBox="0 0 120 60" focusable="false"><path d="M0 0h120a60 60 0 0 1-120 0Z" fill="#ffd2c2" /></svg>
	</span>
	<div class="container">
		<div class="stats__intro reveal">
			<p class="label label--light"><?php esc_html_e( 'At a glance', 'apex-learnsphere' ); ?></p>
			<p class="stats__statement"><?php esc_html_e( 'Apex LearnSphere brings education, career guidance, management, sport and leadership together under one thoughtful, people-centred approach.', 'apex-learnsphere' ); ?></p>
		</div>
		<div class="stats__grid">
			<?php foreach ( $apex_stats as $apex_stat ) : ?>
				<div class="stat stat--<?php echo esc_attr( $apex_stat['tone'] ); ?> reveal">
					<p class="stat__num"><?php echo esc_html( $apex_stat['num'] ); ?></p>
					<p class="stat__lbl"><?php echo esc_html( $apex_stat['lbl'] ); ?></p>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- Guiding belief -->
<section class="section section--dark testimonial">
	<div class="container">
		<figure class="testimonial__card reveal">
			<div class="testimonial__media">
				<img src="<?php echo esc_url( apex_img_url( 'why-apex' ) ); ?>" alt="<?php esc_attr_e( 'A team collaborating around documents in a bright, modern office', 'apex-learnsphere' ); ?>" width="1000" height="1250" loading="lazy" />
			</div>
			<div class="testimonial__body">
				<span class="testimonial__mark" aria-hidden="true">&ldquo;</span>
				<blockquote class="testimonial__quote">
					<p><?php esc_html_e( 'Education opens the door. The right guidance shows you which one to walk through.', 'apex-learnsphere' ); ?></p>
				</blockquote>
				<figcaption class="testimonial__cite"><?php esc_html_e( 'Apex LearnSphere, our guiding belief', 'apex-learnsphere' ); ?></figcaption>
				<span class="testimonial__shapes" aria-hidden="true">
					<svg viewBox="0 0 150 120" focusable="false"><rect x="62" y="0" width="88" height="88" fill="#ffc933" /><path d="M0 120a64 64 0 0 1 128 0Z" fill="#ff7a45" /></svg>
				</span>
			</div>
		</figure>
	</div>
</section>

<!-- Why Apex -->
<section class="section reasons">
	<div class="container">
		<div class="section-head section-head--split reveal">
			<div>
				<p class="label"><?php esc_html_e( 'Why Apex LearnSphere', 'apex-learnsphere' ); ?></p>
				<h2><?php esc_html_e( 'Practical guidance, real relationships, measurable progress', 'apex-learnsphere' ); ?></h2>
			</div>
			<a class="btn btn--primary" href="<?php echo esc_url( home_url( '/about/' ) ); ?>"><?php esc_html_e( 'About Apex LearnSphere', 'apex-learnsphere' ); ?> <span class="btn__arrow" aria-hidden="true">&#8594;</span></a>
		</div>
		<div class="tile-grid tile-grid--four">
			<?php foreach ( $apex_reasons as $apex_reason ) : ?>
				<div class="tile tile--<?php echo esc_attr( $apex_reason['tone'] ); ?> reveal">
					<h3 class="tile__title"><?php echo esc_html( $apex_reason['title'] ); ?></h3>
					<p class="tile__text"><?php echo esc_html( $apex_reason['text'] ); ?></p>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<?php if ( $apex_events ) : ?>
	<!-- Upcoming events -->
	<section class="section section--flush-top home-events">
		<div class="container">
			<div class="section-head section-head--split reveal">
				<div>
					<p class="label"><?php esc_html_e( 'Upcoming events', 'apex-learnsphere' ); ?></p>
					<h2><?php esc_html_e( 'Join us in person or online.', 'apex-learnsphere' ); ?></h2>
				</div>
				<a class="btn btn--primary" href="<?php echo esc_url( home_url( '/training/' ) ); ?>"><?php esc_html_e( 'View All Events', 'apex-learnsphere' ); ?> <span class="btn__arrow" aria-hidden="true">&#8594;</span></a>
			</div>
			<div class="event-grid">
				<?php
				foreach ( $apex_events as $apex_index => $apex_event ) {
					apex_event_card( $apex_event->ID, $apex_tones[ $apex_index % count( $apex_tones ) ] );
				}
				?>
			</div>
		</div>
	</section>
<?php endif; ?>

<?php
get_footer();
