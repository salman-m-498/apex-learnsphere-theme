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
	<div class="container hero__grid">
		<div class="hero__content">
			<p class="eyebrow"><?php esc_html_e( 'Apex LearnSphere', 'apex-learnsphere' ); ?></p>
			<h1 class="hero__title"><?php esc_html_e( 'Connecting education, people', 'apex-learnsphere' ); ?> <em>&amp;</em> <span class="accent"><?php esc_html_e( 'opportunity', 'apex-learnsphere' ); ?></span></h1>
			<p class="lead hero__text"><?php esc_html_e( 'A multidisciplinary consultancy helping schools, students, families, businesses and sports organisations learn smarter, lead better and reach the next stage with confidence.', 'apex-learnsphere' ); ?></p>
			<div class="hero__actions">
				<a class="btn btn--primary" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Book a Consultation', 'apex-learnsphere' ); ?> <span class="btn__arrow" aria-hidden="true">&#8594;</span></a>
				<a class="btn btn--outline" href="<?php echo esc_url( home_url( '/services/' ) ); ?>"><?php esc_html_e( 'Explore Our Services', 'apex-learnsphere' ); ?></a>
			</div>
			<div class="hero__audiences">
				<span><?php esc_html_e( 'Who we help', 'apex-learnsphere' ); ?></span>
				<span class="chip"><?php esc_html_e( 'Schools', 'apex-learnsphere' ); ?></span>
				<span class="chip"><?php esc_html_e( 'Students', 'apex-learnsphere' ); ?></span>
				<span class="chip"><?php esc_html_e( 'Parents', 'apex-learnsphere' ); ?></span>
				<span class="chip"><?php esc_html_e( 'Businesses', 'apex-learnsphere' ); ?></span>
				<span class="chip"><?php esc_html_e( 'Sports', 'apex-learnsphere' ); ?></span>
			</div>
		</div>
		<div class="hero__visual">
			<div class="hero__frame" aria-hidden="true"></div>
			<div class="hero__media">
				<img src="<?php echo esc_url( apex_img_url( 'hero-home' ) ); ?>" alt="<?php esc_attr_e( 'A teacher guiding students in a bright, modern classroom', 'apex-learnsphere' ); ?>" width="1000" height="1250" fetchpriority="high" />
				<div class="hero__stat">
					<strong>7</strong>
					<span><?php esc_html_e( 'disciplines, one connected approach', 'apex-learnsphere' ); ?></span>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Disciplines marquee -->
<div class="marquee" aria-hidden="true">
	<div class="marquee__track">
		<?php
		$disciplines = array( 'Education', 'Career Guidance', 'Counselling', 'Management', 'Sport', 'Business', 'Leadership' );
		for ( $i = 0; $i < 2; $i++ ) :
			?>
			<div class="marquee__group">
				<?php foreach ( $disciplines as $d ) : ?>
					<span><?php echo esc_html( $d ); ?></span>
					<span class="dot">&#9670;</span>
				<?php endforeach; ?>
			</div>
		<?php endfor; ?>
	</div>
</div>

<!-- Pathways -->
<section class="section">
	<div class="container">
		<div class="section-head section-head--center reveal">
			<p class="eyebrow eyebrow--center"><?php esc_html_e( 'How can we help you?', 'apex-learnsphere' ); ?></p>
			<h2><?php esc_html_e( 'A clear path for wherever you are', 'apex-learnsphere' ); ?></h2>
			<p class="lead"><?php esc_html_e( 'Choose the path that fits you — we will guide you to the right support and a practical next step.', 'apex-learnsphere' ); ?></p>
		</div>

		<div class="card-grid card-grid--pathways">
			<a class="pathway-card reveal" href="<?php echo esc_url( home_url( '/schools/' ) ); ?>">
				<span class="pathway-card__icon"><?php echo apex_icon( 'school' ); // phpcs:ignore ?></span>
				<h3><?php esc_html_e( 'I am a School / Institution', 'apex-learnsphere' ); ?></h3>
				<p><?php esc_html_e( 'School improvement, leadership, teacher development and inclusive education.', 'apex-learnsphere' ); ?></p>
				<span class="pathway-card__link"><?php esc_html_e( 'Explore', 'apex-learnsphere' ); ?> <?php echo apex_icon( 'arrow-right' ); // phpcs:ignore ?></span>
			</a>
			<a class="pathway-card reveal" href="<?php echo esc_url( home_url( '/students-parents/' ) ); ?>">
				<span class="pathway-card__icon"><?php echo apex_icon( 'graduate' ); // phpcs:ignore ?></span>
				<h3><?php esc_html_e( 'I am a Student', 'apex-learnsphere' ); ?></h3>
				<p><?php esc_html_e( 'Career guidance, subject and stream choices, and higher-education pathways.', 'apex-learnsphere' ); ?></p>
				<span class="pathway-card__link"><?php esc_html_e( 'Explore', 'apex-learnsphere' ); ?> <?php echo apex_icon( 'arrow-right' ); // phpcs:ignore ?></span>
			</a>
			<a class="pathway-card reveal" href="<?php echo esc_url( home_url( '/students-parents/' ) ); ?>">
				<span class="pathway-card__icon"><?php echo apex_icon( 'family' ); // phpcs:ignore ?></span>
				<h3><?php esc_html_e( 'I am a Parent', 'apex-learnsphere' ); ?></h3>
				<p><?php esc_html_e( 'Educational decisions, school choice and support for your child&#39;s learning.', 'apex-learnsphere' ); ?></p>
				<span class="pathway-card__link"><?php esc_html_e( 'Explore', 'apex-learnsphere' ); ?> <?php echo apex_icon( 'arrow-right' ); // phpcs:ignore ?></span>
			</a>
			<a class="pathway-card reveal" href="<?php echo esc_url( home_url( '/businesses/' ) ); ?>">
				<span class="pathway-card__icon"><?php echo apex_icon( 'briefcase' ); // phpcs:ignore ?></span>
				<h3><?php esc_html_e( 'I am a Business / Organisation', 'apex-learnsphere' ); ?></h3>
				<p><?php esc_html_e( 'Management consultancy, leadership development and professional training.', 'apex-learnsphere' ); ?></p>
				<span class="pathway-card__link"><?php esc_html_e( 'Explore', 'apex-learnsphere' ); ?> <?php echo apex_icon( 'arrow-right' ); // phpcs:ignore ?></span>
			</a>
			<a class="pathway-card reveal" href="<?php echo esc_url( home_url( '/sports/' ) ); ?>">
				<span class="pathway-card__icon"><?php echo apex_icon( 'trophy' ); // phpcs:ignore ?></span>
				<h3><?php esc_html_e( 'I am a Sports Organisation', 'apex-learnsphere' ); ?></h3>
				<p><?php esc_html_e( 'Sports development, team culture and leadership through sport.', 'apex-learnsphere' ); ?></p>
				<span class="pathway-card__link"><?php esc_html_e( 'Explore', 'apex-learnsphere' ); ?> <?php echo apex_icon( 'arrow-right' ); // phpcs:ignore ?></span>
			</a>
		</div>
	</div>
</section>

<!-- Pillars (bento) -->
<section class="section section--soft">
	<div class="container">
		<div class="section-head reveal">
			<p class="eyebrow"><?php esc_html_e( 'What we do', 'apex-learnsphere' ); ?></p>
			<h2><?php esc_html_e( 'Five pillars, one connected approach', 'apex-learnsphere' ); ?></h2>
			<p class="lead"><?php esc_html_e( 'Our work spans education, career guidance, management, sport and leadership — brought together around people, not boxed into separate silos.', 'apex-learnsphere' ); ?></p>
		</div>

		<div class="bento">
			<div class="bento-card bento-card--feature reveal">
				<span class="bento-card__icon"><?php echo apex_icon( 'book-open' ); // phpcs:ignore ?></span>
				<div>
					<span class="bento-card__num">01</span>
					<h3><?php esc_html_e( 'Education', 'apex-learnsphere' ); ?></h3>
					<p><?php esc_html_e( 'School improvement, curriculum, teaching and inclusive learning for schools and institutions.', 'apex-learnsphere' ); ?></p>
				</div>
			</div>
			<div class="bento-card reveal">
				<div class="bento-card__top">
					<span class="bento-card__num">02</span>
					<span class="bento-card__icon"><?php echo apex_icon( 'compass' ); // phpcs:ignore ?></span>
				</div>
				<h3><?php esc_html_e( 'Career Guidance & Counselling', 'apex-learnsphere' ); ?></h3>
				<p><?php esc_html_e( 'Career exploration, subject choices and higher-education pathways.', 'apex-learnsphere' ); ?></p>
			</div>
			<div class="bento-card reveal">
				<div class="bento-card__top">
					<span class="bento-card__num">03</span>
					<span class="bento-card__icon"><?php echo apex_icon( 'target' ); // phpcs:ignore ?></span>
				</div>
				<h3><?php esc_html_e( 'Management', 'apex-learnsphere' ); ?></h3>
				<p><?php esc_html_e( 'Strategic planning, operations and service quality for organisations.', 'apex-learnsphere' ); ?></p>
			</div>
			<div class="bento-card reveal">
				<div class="bento-card__top">
					<span class="bento-card__num">04</span>
					<span class="bento-card__icon"><?php echo apex_icon( 'trophy' ); // phpcs:ignore ?></span>
				</div>
				<h3><?php esc_html_e( 'Sport', 'apex-learnsphere' ); ?></h3>
				<p><?php esc_html_e( 'Sports development, team culture and performance environments.', 'apex-learnsphere' ); ?></p>
			</div>
			<div class="bento-card reveal">
				<div class="bento-card__top">
					<span class="bento-card__num">05</span>
					<span class="bento-card__icon"><?php echo apex_icon( 'trending-up' ); // phpcs:ignore ?></span>
				</div>
				<h3><?php esc_html_e( 'Business & Leadership', 'apex-learnsphere' ); ?></h3>
				<p><?php esc_html_e( 'Leadership development, communication and team performance.', 'apex-learnsphere' ); ?></p>
			</div>
			<div class="bento-card bento-card--cta reveal">
				<div>
					<h3><?php esc_html_e( 'Not sure where to start?', 'apex-learnsphere' ); ?></h3>
					<p><?php esc_html_e( 'Tell us a little about your situation and we will point you in the right direction.', 'apex-learnsphere' ); ?></p>
				</div>
				<a class="btn btn--primary" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Talk to us', 'apex-learnsphere' ); ?></a>
			</div>
		</div>
	</div>
</section>

<!-- Stats -->
<section class="stats-band">
	<div class="container stats-band__grid">
		<div class="stat reveal">
			<div class="stat__num"><span class="count" data-count="7">0</span></div>
			<p class="stat__label"><?php esc_html_e( 'disciplines of expertise', 'apex-learnsphere' ); ?></p>
		</div>
		<div class="stat reveal">
			<div class="stat__num"><span class="count" data-count="5">0</span></div>
			<p class="stat__label"><?php esc_html_e( 'core service pillars', 'apex-learnsphere' ); ?></p>
		</div>
		<div class="stat reveal">
			<div class="stat__num"><span class="count" data-count="6">0</span></div>
			<p class="stat__label"><?php esc_html_e( 'audiences we serve', 'apex-learnsphere' ); ?></p>
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
