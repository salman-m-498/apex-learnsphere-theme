<?php
/**
 * Front page template.
 *
 * @package apex-learnsphere
 */

get_header();

$apex_audiences = array(
	array(
		'role' => __( 'School / Institution', 'apex-learnsphere' ),
		'text' => __( 'School improvement, leadership and teacher development.', 'apex-learnsphere' ),
		'url'  => home_url( '/schools/' ),
		'img'  => 'schools',
		'alt'  => __( 'A teacher presenting a lesson to students in a classroom', 'apex-learnsphere' ),
	),
	array(
		'role' => __( 'Parent', 'apex-learnsphere' ),
		'text' => __( 'Educational planning and support for your child’s learning.', 'apex-learnsphere' ),
		'url'  => home_url( '/students-parents/' ),
		'img'  => 'students-parents',
		'alt'  => __( 'A parent helping children with a learning activity at home', 'apex-learnsphere' ),
	),
	array(
		'role' => __( 'Student', 'apex-learnsphere' ),
		'text' => __( 'Career choices, subject options and higher-education pathways.', 'apex-learnsphere' ),
		'url'  => home_url( '/students-parents/' ),
		'img'  => 'mentoring',
		'alt'  => __( 'A mentor and young adult reviewing work together', 'apex-learnsphere' ),
	),
	array(
		'role' => __( 'Business / Organisation', 'apex-learnsphere' ),
		'text' => __( 'Management consultancy, leadership development and team training.', 'apex-learnsphere' ),
		'url'  => home_url( '/businesses/' ),
		'img'  => 'businesses',
		'alt'  => __( 'Colleagues discussing a strategy around a table', 'apex-learnsphere' ),
	),
	array(
		'role' => __( 'Sports Organisation', 'apex-learnsphere' ),
		'text' => __( 'Team culture and leadership through sport.', 'apex-learnsphere' ),
		'url'  => home_url( '/sports/' ),
		'img'  => 'sports',
		'alt'  => __( 'A team taking part in an outdoor team-building activity', 'apex-learnsphere' ),
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
		'tone'  => 'green',
	),
	array(
		'icon'  => 'target',
		'title' => __( 'Management', 'apex-learnsphere' ),
		'sub'   => __( 'For organisations', 'apex-learnsphere' ),
		'text'  => __( 'Strategic planning, operations and service quality for organisations.', 'apex-learnsphere' ),
		'url'   => home_url( '/businesses/' ),
		'tone'  => 'blue',
	),
	array(
		'icon'  => 'trophy',
		'title' => __( 'Sport', 'apex-learnsphere' ),
		'sub'   => __( 'For clubs and academies', 'apex-learnsphere' ),
		'text'  => __( 'Sports development, team culture and performance environments.', 'apex-learnsphere' ),
		'url'   => home_url( '/sports/' ),
		'tone'  => 'green',
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
		'tone' => 'blue',
	),
	array(
		'num'  => '6',
		'lbl'  => __( 'Audiences we serve', 'apex-learnsphere' ),
		'tone' => 'cream',
	),
);

$apex_reasons = array(
	array(
		'title' => __( 'People-centred', 'apex-learnsphere' ),
		'text'  => __( 'We start with the person or organisation in front of us — not a template.', 'apex-learnsphere' ),
		'tone'  => 'blue',
	),
	array(
		'title' => __( 'Multidisciplinary', 'apex-learnsphere' ),
		'text'  => __( 'Education, career, management, sport and leadership — connected, not separate.', 'apex-learnsphere' ),
		'tone'  => 'green',
	),
	array(
		'title' => __( 'Practical and action-focused', 'apex-learnsphere' ),
		'text'  => __( 'Clear recommendations and realistic next steps you can act on immediately.', 'apex-learnsphere' ),
		'tone'  => 'blue',
	),
	array(
		'title' => __( 'Evidence-informed', 'apex-learnsphere' ),
		'text'  => __( 'Grounded in good practice and adapted to your local context.', 'apex-learnsphere' ),
		'tone'  => 'green',
	),
);

$apex_events = apex_get_upcoming_events( 3 );
$apex_tones  = array( 'blue', 'green', 'blue' );
?>

<!-- Hero -->
<section class="hero" id="top">
	<figure class="hero__bg">
		<img src="<?php echo esc_url( APEX_URI . '/assets/img/hero-home.jpg' ); ?>" alt="<?php esc_attr_e( 'Two students studying together over an open book in warm window light', 'apex-learnsphere' ); ?>" width="2000" height="1333" fetchpriority="high" />
	</figure>

	<div class="hero__screen">
		<h1 class="hero__title"><?php esc_html_e( 'Connecting education, people & opportunity', 'apex-learnsphere' ); ?></h1>
		<div class="hero__card">
			<p class="hero__text"><?php esc_html_e( 'Practical guidance for education, careers, leadership and sport.', 'apex-learnsphere' ); ?></p>
			<a class="hero__button" id="hero-journey-trigger" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" aria-haspopup="dialog" aria-controls="hero-journey"><?php esc_html_e( 'How can we help you?', 'apex-learnsphere' ); ?> <span class="btn__arrow" aria-hidden="true">&#8594;</span></a>
		</div>
	</div>

	<dialog class="hero-journey" id="hero-journey" aria-labelledby="hero-journey-title">
		<div class="hero-journey__header">
			<div>
				<p class="hero-journey__eyebrow"><?php esc_html_e( 'Apex LearnSphere', 'apex-learnsphere' ); ?></p>
				<h2 id="hero-journey-title"><?php esc_html_e( 'How can we help you?', 'apex-learnsphere' ); ?></h2>
			</div>
			<button class="hero-journey__close" type="button" data-journey-close aria-label="<?php esc_attr_e( 'Close visitor guide', 'apex-learnsphere' ); ?>">&times;</button>
		</div>

		<div class="hero-journey__step" data-journey-step="audiences">
			<p class="hero-journey__prompt"><?php esc_html_e( 'Choose the option that best describes you.', 'apex-learnsphere' ); ?></p>
			<div class="hero-journey__choices">
				<button class="hero-journey__choice" type="button" data-journey-choice="school"><?php esc_html_e( 'I am a School / Institution', 'apex-learnsphere' ); ?><span aria-hidden="true">&#8594;</span></button>
				<button class="hero-journey__choice" type="button" data-journey-choice="parent"><?php esc_html_e( 'I am a Parent', 'apex-learnsphere' ); ?><span aria-hidden="true">&#8594;</span></button>
				<button class="hero-journey__choice" type="button" data-journey-choice="student"><?php esc_html_e( 'I am a Student', 'apex-learnsphere' ); ?><span aria-hidden="true">&#8594;</span></button>
				<button class="hero-journey__choice" type="button" data-journey-choice="business"><?php esc_html_e( 'I am a Business / Organisation', 'apex-learnsphere' ); ?><span aria-hidden="true">&#8594;</span></button>
				<button class="hero-journey__choice" type="button" data-journey-choice="sports"><?php esc_html_e( 'I am a Sports Organisation', 'apex-learnsphere' ); ?><span aria-hidden="true">&#8594;</span></button>
			</div>
		</div>

		<div class="hero-journey__detail" data-journey-detail="school" hidden>
			<button class="hero-journey__back" type="button" data-journey-back>&larr; <?php esc_html_e( 'All audiences', 'apex-learnsphere' ); ?></button>
			<h3 tabindex="-1"><?php esc_html_e( 'Support for schools and institutions', 'apex-learnsphere' ); ?></h3>
			<p><?php esc_html_e( 'Explore school improvement, leadership, teacher development and inclusive education.', 'apex-learnsphere' ); ?></p>
			<div class="hero-journey__actions">
				<a class="hero-journey__action" href="<?php echo esc_url( home_url( '/schools/' ) ); ?>"><?php esc_html_e( 'Explore school services', 'apex-learnsphere' ); ?></a>
				<a class="hero-journey__action hero-journey__action--primary" href="<?php echo esc_url( add_query_arg( array( 'visitor_type' => 'School / Institution', 'interest' => 'Education', 'message' => 'I would like to request a school consultation.' ), home_url( '/contact/' ) ) ); ?>"><?php esc_html_e( 'Request a School Consultation', 'apex-learnsphere' ); ?></a>
			</div>
		</div>

		<div class="hero-journey__detail" data-journey-detail="parent" hidden>
			<button class="hero-journey__back" type="button" data-journey-back>&larr; <?php esc_html_e( 'All audiences', 'apex-learnsphere' ); ?></button>
			<h3 tabindex="-1"><?php esc_html_e( 'Guidance for parents and families', 'apex-learnsphere' ); ?></h3>
			<p><?php esc_html_e( 'Get support with educational planning, career pathways and decisions about your child’s learning.', 'apex-learnsphere' ); ?></p>
			<div class="hero-journey__actions">
				<a class="hero-journey__action" href="<?php echo esc_url( home_url( '/students-parents/' ) ); ?>"><?php esc_html_e( 'Explore parent support', 'apex-learnsphere' ); ?></a>
				<a class="hero-journey__action hero-journey__action--primary" href="<?php echo esc_url( add_query_arg( array( 'visitor_type' => 'Parent / Family', 'interest' => 'Career Guidance & Counselling', 'message' => 'I am a parent looking for educational and career guidance.' ), home_url( '/contact/' ) ) ); ?>"><?php esc_html_e( 'Talk to Our Team', 'apex-learnsphere' ); ?></a>
			</div>
		</div>

		<div class="hero-journey__detail" data-journey-detail="student" hidden>
			<button class="hero-journey__back" type="button" data-journey-back>&larr; <?php esc_html_e( 'All audiences', 'apex-learnsphere' ); ?></button>
			<h3 tabindex="-1"><?php esc_html_e( 'Career guidance for students', 'apex-learnsphere' ); ?></h3>
			<p><?php esc_html_e( 'Explore career options, subject choices and higher-education pathways with practical guidance.', 'apex-learnsphere' ); ?></p>
			<div class="hero-journey__actions">
				<a class="hero-journey__action" href="<?php echo esc_url( home_url( '/students-parents/' ) ); ?>"><?php esc_html_e( 'Explore career guidance', 'apex-learnsphere' ); ?></a>
				<a class="hero-journey__action hero-journey__action--primary" href="<?php echo esc_url( add_query_arg( array( 'visitor_type' => 'Student', 'interest' => 'Career Guidance & Counselling', 'message' => 'I am a student looking for career guidance.' ), home_url( '/contact/' ) ) ); ?>"><?php esc_html_e( 'Career Guidance Enquiry', 'apex-learnsphere' ); ?></a>
			</div>
		</div>

		<div class="hero-journey__detail" data-journey-detail="business" hidden>
			<button class="hero-journey__back" type="button" data-journey-back>&larr; <?php esc_html_e( 'All audiences', 'apex-learnsphere' ); ?></button>
			<h3 tabindex="-1"><?php esc_html_e( 'Support for businesses and organisations', 'apex-learnsphere' ); ?></h3>
			<p><?php esc_html_e( 'Build stronger teams through management consultancy, leadership development and professional training.', 'apex-learnsphere' ); ?></p>
			<div class="hero-journey__actions">
				<a class="hero-journey__action" href="<?php echo esc_url( home_url( '/businesses/' ) ); ?>"><?php esc_html_e( 'Explore organisation services', 'apex-learnsphere' ); ?></a>
				<a class="hero-journey__action hero-journey__action--primary" href="<?php echo esc_url( add_query_arg( array( 'visitor_type' => 'Business / Organisation', 'interest' => 'Management', 'message' => 'I would like to discuss support for my organisation.' ), home_url( '/contact/' ) ) ); ?>"><?php esc_html_e( 'Talk to Our Team', 'apex-learnsphere' ); ?></a>
			</div>
		</div>

		<div class="hero-journey__detail" data-journey-detail="sports" hidden>
			<button class="hero-journey__back" type="button" data-journey-back>&larr; <?php esc_html_e( 'All audiences', 'apex-learnsphere' ); ?></button>
			<h3 tabindex="-1"><?php esc_html_e( 'Development for sports organisations', 'apex-learnsphere' ); ?></h3>
			<p><?php esc_html_e( 'Strengthen team culture, sports education and leadership through sport.', 'apex-learnsphere' ); ?></p>
			<div class="hero-journey__actions">
				<a class="hero-journey__action" href="<?php echo esc_url( home_url( '/sports/' ) ); ?>"><?php esc_html_e( 'Explore sports support', 'apex-learnsphere' ); ?></a>
				<a class="hero-journey__action hero-journey__action--primary" href="<?php echo esc_url( add_query_arg( array( 'visitor_type' => 'Sports Organisation', 'interest' => 'Sport', 'message' => 'I would like to discuss support for a sports organisation.' ), home_url( '/contact/' ) ) ); ?>"><?php esc_html_e( 'Talk to Our Team', 'apex-learnsphere' ); ?></a>
			</div>
		</div>
	</dialog>

	<div class="hero__statement" id="hero-statement">
		<div class="container">
			<p class="hero__statement-text reveal"><?php esc_html_e( 'Practical, people-centred support for every stage of learning.', 'apex-learnsphere' ); ?></p>
		</div>
	</div>
</section>

<!-- Audience pathways -->
<section class="section pathways" id="audience-pathways">
	<div class="container">
		<div class="pathways__header">
			<div>
				<h2><?php esc_html_e( 'How can we help you?', 'apex-learnsphere' ); ?></h2>
			</div>
			<p class="pathways__lead"><?php esc_html_e( 'Choose the path that best fits what you need. Each one leads to relevant support and a clear next step.', 'apex-learnsphere' ); ?></p>
		</div>
		<div class="pathways__grid">
			<?php foreach ( $apex_audiences as $index => $apex_audience ) : ?>
				<a class="pathway-card" href="<?php echo esc_url( $apex_audience['url'] ); ?>">
					<span class="pathway-card__media">
						<img src="<?php echo esc_url( apex_img_url( $apex_audience['img'] ) ); ?>" alt="<?php echo esc_attr( $apex_audience['alt'] ); ?>" width="1400" height="1050" loading="lazy" />
					</span>
					<span class="pathway-card__content">
						<span class="pathway-card__eyebrow"><span class="pathway-card__number" aria-hidden="true"><?php echo esc_html( sprintf( '%02d', $index + 1 ) ); ?></span><span><?php esc_html_e( 'I am a', 'apex-learnsphere' ); ?></span></span>
						<span class="pathway-card__title"><?php echo esc_html( $apex_audience['role'] ); ?></span>
						<span class="pathway-card__description"><?php echo esc_html( $apex_audience['text'] ); ?></span>
					</span>
					<span class="pathway-card__arrow" aria-hidden="true">&#8594;</span>
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
		<svg viewBox="0 0 120 60" focusable="false"><path d="M0 0h120a60 60 0 0 1-120 0Z" fill="var(--green-tint)" /></svg>
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
					<svg viewBox="0 0 150 120" focusable="false"><rect x="62" y="0" width="88" height="88" fill="var(--blue-light)" /><path d="M0 120a64 64 0 0 1 128 0Z" fill="var(--green)" /></svg>
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
