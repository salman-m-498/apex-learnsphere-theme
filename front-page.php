<?php
/**
 * Front page template.
 *
 * @package apex-learnsphere
 */

get_header();
?>

<!-- Hero -->
<section class="hero">
	<div class="hero__peak" aria-hidden="true"></div>
	<div class="hero__orb hero__orb--green" aria-hidden="true"></div>
	<div class="hero__orb hero__orb--blue" aria-hidden="true"></div>
	<div class="hero__orb hero__orb--ring" aria-hidden="true"></div>
	<div class="container hero__grid">
		<div class="hero__content">
			<p class="eyebrow"><?php esc_html_e( 'Apex LearnSphere', 'apex-learnsphere' ); ?></p>
			<h1 class="hero__title" data-kinetic>
				<span class="line"><span class="line__inner"><?php esc_html_e( 'Connecting education, people', 'apex-learnsphere' ); ?></span></span>
				<span class="line"><span class="line__inner">&amp; <span class="accent"><?php esc_html_e( 'opportunity', 'apex-learnsphere' ); ?></span></span></span>
			</h1>
			<p class="lead hero__text"><?php esc_html_e( 'A multidisciplinary consultancy helping schools, students, families, businesses and sports organisations learn smarter, lead better and reach the next stage with confidence.', 'apex-learnsphere' ); ?></p>
			<div class="hero__actions">
				<a class="btn btn--primary" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Book a Consultation', 'apex-learnsphere' ); ?> <span class="btn__arrow" aria-hidden="true">&#8594;</span></a>
				<a class="btn btn--outline" href="<?php echo esc_url( home_url( '/services/' ) ); ?>"><?php esc_html_e( 'Explore Our Services', 'apex-learnsphere' ); ?></a>
			</div>
			<p class="hero__for">
				<span class="hero__for-label"><?php esc_html_e( 'For', 'apex-learnsphere' ); ?></span>
				<a href="<?php echo esc_url( home_url( '/schools/' ) ); ?>"><?php esc_html_e( 'Schools', 'apex-learnsphere' ); ?></a><span class="hero__for-sep" aria-hidden="true">&middot;</span>
				<a href="<?php echo esc_url( home_url( '/students-parents/' ) ); ?>"><?php esc_html_e( 'Students', 'apex-learnsphere' ); ?></a><span class="hero__for-sep" aria-hidden="true">&middot;</span>
				<a href="<?php echo esc_url( home_url( '/students-parents/' ) ); ?>"><?php esc_html_e( 'Parents', 'apex-learnsphere' ); ?></a><span class="hero__for-sep" aria-hidden="true">&middot;</span>
				<a href="<?php echo esc_url( home_url( '/businesses/' ) ); ?>"><?php esc_html_e( 'Businesses', 'apex-learnsphere' ); ?></a><span class="hero__for-sep" aria-hidden="true">&middot;</span>
				<a href="<?php echo esc_url( home_url( '/sports/' ) ); ?>"><?php esc_html_e( 'Sport', 'apex-learnsphere' ); ?></a>
			</p>
		</div>
		<div class="hero__visual">
			<div class="hero__frame" aria-hidden="true"></div>
			<div class="hero__media">
				<img src="<?php echo esc_url( apex_img_url( 'hero-home' ) ); ?>" alt="<?php esc_attr_e( 'A teacher guiding students in a bright, modern classroom', 'apex-learnsphere' ); ?>" width="1000" height="1250" fetchpriority="high" />
				<span class="hero__caption"><?php esc_html_e( 'Education &middot; People &middot; Opportunity', 'apex-learnsphere' ); ?></span>
			</div>
		</div>
	</div>
</section>

<!-- Ascent line -->
<div class="ascent" aria-hidden="true">
	<svg viewBox="0 0 1200 140" preserveAspectRatio="none" fill="none">
		<polyline class="ascent__line" pathLength="1" points="0,130 240,130 240,100 480,100 480,68 720,68 720,40 960,40 960,16 1200,16" />
	</svg>
</div>

<!-- Pathways -->
<section class="section">
	<div class="container">
		<div class="section-head reveal">
			<p class="eyebrow"><?php esc_html_e( 'Who we help', 'apex-learnsphere' ); ?></p>
			<h2><?php esc_html_e( 'How can we help you?', 'apex-learnsphere' ); ?></h2>
			<p class="lead"><?php esc_html_e( 'Choose the path that fits you — we will guide you to the right support and a practical next step.', 'apex-learnsphere' ); ?></p>
		</div>

		<div class="index-grid">
			<a class="index-item reveal" href="<?php echo esc_url( home_url( '/schools/' ) ); ?>">
				<span class="index-item__num">01</span>
				<h3><?php esc_html_e( 'Schools & Institutions', 'apex-learnsphere' ); ?></h3>
				<p><?php esc_html_e( 'School improvement, leadership, teacher development and inclusive education.', 'apex-learnsphere' ); ?></p>
				<span class="index-item__arrow" aria-hidden="true">&#8599;</span>
			</a>
			<a class="index-item reveal" href="<?php echo esc_url( home_url( '/students-parents/' ) ); ?>">
				<span class="index-item__num">02</span>
				<h3><?php esc_html_e( 'Students', 'apex-learnsphere' ); ?></h3>
				<p><?php esc_html_e( 'Career guidance, subject and stream choices, and higher-education pathways.', 'apex-learnsphere' ); ?></p>
				<span class="index-item__arrow" aria-hidden="true">&#8599;</span>
			</a>
			<a class="index-item reveal" href="<?php echo esc_url( home_url( '/students-parents/' ) ); ?>">
				<span class="index-item__num">03</span>
				<h3><?php esc_html_e( 'Parents & Families', 'apex-learnsphere' ); ?></h3>
				<p><?php esc_html_e( 'Educational decisions, school choice and support for your child&#39;s learning.', 'apex-learnsphere' ); ?></p>
				<span class="index-item__arrow" aria-hidden="true">&#8599;</span>
			</a>
			<a class="index-item reveal" href="<?php echo esc_url( home_url( '/businesses/' ) ); ?>">
				<span class="index-item__num">04</span>
				<h3><?php esc_html_e( 'Businesses & Organisations', 'apex-learnsphere' ); ?></h3>
				<p><?php esc_html_e( 'Management consultancy, leadership development and professional training.', 'apex-learnsphere' ); ?></p>
				<span class="index-item__arrow" aria-hidden="true">&#8599;</span>
			</a>
			<a class="index-item reveal" href="<?php echo esc_url( home_url( '/sports/' ) ); ?>">
				<span class="index-item__num">05</span>
				<h3><?php esc_html_e( 'Sports Organisations', 'apex-learnsphere' ); ?></h3>
				<p><?php esc_html_e( 'Sports development, team culture and leadership through sport.', 'apex-learnsphere' ); ?></p>
				<span class="index-item__arrow" aria-hidden="true">&#8599;</span>
			</a>
		</div>
	</div>
</section>

<!-- Pillars -->
<section class="section section--soft">
	<div class="container">
		<div class="section-head reveal">
			<p class="eyebrow"><?php esc_html_e( 'What we do', 'apex-learnsphere' ); ?></p>
			<h2><?php esc_html_e( 'Five pillars, one connected approach', 'apex-learnsphere' ); ?></h2>
		</div>

		<div class="index-list">
			<a class="index-row reveal" href="<?php echo esc_url( home_url( '/schools/' ) ); ?>">
				<span class="index-row__num">01</span>
				<span class="index-row__title"><?php esc_html_e( 'Education', 'apex-learnsphere' ); ?></span>
				<span class="index-row__desc"><?php esc_html_e( 'School improvement, curriculum, teaching and inclusive learning.', 'apex-learnsphere' ); ?></span>
				<span class="index-row__arrow" aria-hidden="true">&#8599;</span>
			</a>
			<a class="index-row reveal" href="<?php echo esc_url( home_url( '/students-parents/' ) ); ?>">
				<span class="index-row__num">02</span>
				<span class="index-row__title"><?php esc_html_e( 'Career Guidance & Counselling', 'apex-learnsphere' ); ?></span>
				<span class="index-row__desc"><?php esc_html_e( 'Career exploration, subject choices and higher-education pathways.', 'apex-learnsphere' ); ?></span>
				<span class="index-row__arrow" aria-hidden="true">&#8599;</span>
			</a>
			<a class="index-row reveal" href="<?php echo esc_url( home_url( '/businesses/' ) ); ?>">
				<span class="index-row__num">03</span>
				<span class="index-row__title"><?php esc_html_e( 'Management', 'apex-learnsphere' ); ?></span>
				<span class="index-row__desc"><?php esc_html_e( 'Strategic planning, operations and service quality for organisations.', 'apex-learnsphere' ); ?></span>
				<span class="index-row__arrow" aria-hidden="true">&#8599;</span>
			</a>
			<a class="index-row reveal" href="<?php echo esc_url( home_url( '/sports/' ) ); ?>">
				<span class="index-row__num">04</span>
				<span class="index-row__title"><?php esc_html_e( 'Sport', 'apex-learnsphere' ); ?></span>
				<span class="index-row__desc"><?php esc_html_e( 'Sports development, team culture and performance environments.', 'apex-learnsphere' ); ?></span>
				<span class="index-row__arrow" aria-hidden="true">&#8599;</span>
			</a>
			<a class="index-row reveal" href="<?php echo esc_url( home_url( '/businesses/' ) ); ?>">
				<span class="index-row__num">05</span>
				<span class="index-row__title"><?php esc_html_e( 'Business & Leadership', 'apex-learnsphere' ); ?></span>
				<span class="index-row__desc"><?php esc_html_e( 'Leadership development, communication and team performance.', 'apex-learnsphere' ); ?></span>
				<span class="index-row__arrow" aria-hidden="true">&#8599;</span>
			</a>
		</div>

		<p class="index-list__cta reveal">
			<a class="btn btn--outline" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Not sure where to start? Talk to us', 'apex-learnsphere' ); ?> <span class="btn__arrow" aria-hidden="true">&#8594;</span></a>
		</p>
	</div>
</section>

<!-- Statement -->
<section class="statement-band">
	<div class="container">
		<p class="statement-band__label"><?php esc_html_e( 'At a glance', 'apex-learnsphere' ); ?></p>
		<div class="statement-band__grid">
			<div class="statement reveal">
				<span class="statement__num">7</span>
				<span class="statement__lbl"><?php esc_html_e( 'disciplines of expertise', 'apex-learnsphere' ); ?></span>
			</div>
			<div class="statement reveal">
				<span class="statement__num">5</span>
				<span class="statement__lbl"><?php esc_html_e( 'core service pillars', 'apex-learnsphere' ); ?></span>
			</div>
			<div class="statement reveal">
				<span class="statement__num">6</span>
				<span class="statement__lbl"><?php esc_html_e( 'audiences we serve', 'apex-learnsphere' ); ?></span>
			</div>
		</div>
	</div>
</section>

<!-- Why Apex -->
<section class="section">
	<div class="container split">
		<div class="split__media reveal">
			<img src="<?php echo esc_url( apex_img_url( 'why-apex' ) ); ?>" alt="<?php esc_attr_e( 'A team collaborating around documents in a bright, modern office', 'apex-learnsphere' ); ?>" width="1000" height="1250" loading="lazy" />
		</div>
		<div class="reveal">
			<p class="eyebrow"><?php esc_html_e( 'Why Apex LearnSphere', 'apex-learnsphere' ); ?></p>
			<h2><?php esc_html_e( 'Practical guidance, real relationships, measurable progress', 'apex-learnsphere' ); ?></h2>
			<ul class="check-list">
				<li>
					<?php echo apex_icon( 'check' ); // phpcs:ignore ?>
					<div>
						<strong><?php esc_html_e( 'People-centred', 'apex-learnsphere' ); ?></strong>
						<p><?php esc_html_e( 'We start with the person or organisation in front of us — not a template.', 'apex-learnsphere' ); ?></p>
					</div>
				</li>
				<li>
					<?php echo apex_icon( 'check' ); // phpcs:ignore ?>
					<div>
						<strong><?php esc_html_e( 'Multidisciplinary', 'apex-learnsphere' ); ?></strong>
						<p><?php esc_html_e( 'Education, career, management, sport and leadership — connected, not separate.', 'apex-learnsphere' ); ?></p>
					</div>
				</li>
				<li>
					<?php echo apex_icon( 'check' ); // phpcs:ignore ?>
					<div>
						<strong><?php esc_html_e( 'Practical and action-focused', 'apex-learnsphere' ); ?></strong>
						<p><?php esc_html_e( 'Clear recommendations and realistic next steps you can act on immediately.', 'apex-learnsphere' ); ?></p>
					</div>
				</li>
				<li>
					<?php echo apex_icon( 'check' ); // phpcs:ignore ?>
					<div>
						<strong><?php esc_html_e( 'Evidence-informed', 'apex-learnsphere' ); ?></strong>
						<p><?php esc_html_e( 'Grounded in good practice and adapted to your local context.', 'apex-learnsphere' ); ?></p>
					</div>
				</li>
			</ul>
			<p style="margin-top: var(--space-3);">
				<a class="btn btn--primary" href="<?php echo esc_url( home_url( '/about/' ) ); ?>"><?php esc_html_e( 'About Apex LearnSphere', 'apex-learnsphere' ); ?> <span class="btn__arrow" aria-hidden="true">&#8594;</span></a>
			</p>
		</div>
	</div>
</section>

<!-- Quote band -->
<section class="section section--dark quote-band">
	<div class="container">
		<blockquote class="reveal">
			<p>&ldquo;<?php esc_html_e( 'Education opens the door. The right guidance shows you which one to walk through.', 'apex-learnsphere' ); ?>&rdquo;</p>
			<footer class="attribution">&mdash; <strong><?php esc_html_e( 'Apex LearnSphere', 'apex-learnsphere' ); ?></strong>, <?php esc_html_e( 'our guiding belief', 'apex-learnsphere' ); ?></footer>
		</blockquote>
	</div>
</section>

<?php
get_footer();
