<?php
/**
 * Template Name: About
 *
 * @package apex-learnsphere
 */

get_header();
?>

<header class="page-hero">
	<div class="container">
		<p class="eyebrow"><?php esc_html_e( 'About us', 'apex-learnsphere' ); ?></p>
		<h1><?php esc_html_e( 'A consultancy built around people and progress', 'apex-learnsphere' ); ?></h1>
		<p class="lead"><?php esc_html_e( 'Apex LearnSphere connects education, people and opportunity — bringing together seven disciplines under one thoughtful, people-centred approach.', 'apex-learnsphere' ); ?></p>
	</div>
</header>

<section class="section">
	<div class="container split">
		<div class="split__media reveal">
			<img src="<?php echo esc_url( apex_img_url( 'about' ) ); ?>" alt="<?php esc_attr_e( 'A group of professionals collaborating in a modern office', 'apex-learnsphere' ); ?>" width="1000" height="1250" loading="lazy" />
		</div>
		<div class="reveal">
			<p class="eyebrow"><?php esc_html_e( 'Who we are', 'apex-learnsphere' ); ?></p>
			<h2><?php esc_html_e( 'One team, many disciplines', 'apex-learnsphere' ); ?></h2>
			<p><?php esc_html_e( 'Apex LearnSphere was founded on a simple belief: education is more than schooling, and opportunity is more than a job title. Real progress happens when guidance brings the two together.', 'apex-learnsphere' ); ?></p>
			<p><?php esc_html_e( 'We work with schools, students, families, businesses and sports organisations — applying experience across education, career guidance, counselling, management, sport, business and leadership.', 'apex-learnsphere' ); ?></p>
			<p><?php esc_html_e( 'Our approach is personal, practical and grounded in good practice. We listen before we recommend, and we measure our success by the progress of the people we serve.', 'apex-learnsphere' ); ?></p>
		</div>
	</div>
</section>

<section class="section section--soft">
	<div class="container">
		<div class="section-head reveal">
			<p class="eyebrow"><?php esc_html_e( 'Our purpose', 'apex-learnsphere' ); ?></p>
			<h2><?php esc_html_e( 'Vision & mission', 'apex-learnsphere' ); ?></h2>
		</div>
		<div class="mission-grid">
			<div class="mission-card reveal">
				<span class="mission-card__icon"><?php echo apex_icon( 'target' ); // phpcs:ignore ?></span>
				<h3><?php esc_html_e( 'Our vision', 'apex-learnsphere' ); ?></h3>
				<p><?php esc_html_e( 'A region where every learner, family and organisation has the guidance and support to reach their full potential — and the confidence to lead what comes next.', 'apex-learnsphere' ); ?></p>
			</div>
			<div class="mission-card reveal">
				<span class="mission-card__icon"><?php echo apex_icon( 'compass' ); // phpcs:ignore ?></span>
				<h3><?php esc_html_e( 'Our mission', 'apex-learnsphere' ); ?></h3>
				<p><?php esc_html_e( 'To connect education, people and opportunity through clear guidance, practical support and lasting partnerships across every stage of learning and leadership.', 'apex-learnsphere' ); ?></p>
			</div>
		</div>
	</div>
</section>

<section class="section">
	<div class="container">
		<div class="section-head reveal">
			<p class="eyebrow"><?php esc_html_e( 'Our approach', 'apex-learnsphere' ); ?></p>
			<h2><?php esc_html_e( 'How we think about the work', 'apex-learnsphere' ); ?></h2>
		</div>
		<ul class="check-list reveal">
			<li>
				<?php echo apex_icon( 'check' ); // phpcs:ignore ?>
				<div><strong><?php esc_html_e( 'People first', 'apex-learnsphere' ); ?></strong><p><?php esc_html_e( 'Every recommendation starts with the person or organisation — not a formula.', 'apex-learnsphere' ); ?></p></div>
			</li>
			<li>
				<?php echo apex_icon( 'check' ); // phpcs:ignore ?>
				<div><strong><?php esc_html_e( 'Connected thinking', 'apex-learnsphere' ); ?></strong><p><?php esc_html_e( 'Education, career and leadership are treated as one journey, not separate services.', 'apex-learnsphere' ); ?></p></div>
			</li>
			<li>
				<?php echo apex_icon( 'check' ); // phpcs:ignore ?>
				<div><strong><?php esc_html_e( 'Practical and honest', 'apex-learnsphere' ); ?></strong><p><?php esc_html_e( 'We give clear, achievable guidance and tell you what matters most.', 'apex-learnsphere' ); ?></p></div>
			</li>
			<li>
				<?php echo apex_icon( 'check' ); // phpcs:ignore ?>
				<div><strong><?php esc_html_e( 'Built on trust', 'apex-learnsphere' ); ?></strong><p><?php esc_html_e( 'Long-term relationships and genuine partnership over one-off transactions.', 'apex-learnsphere' ); ?></p></div>
			</li>
		</ul>
	</div>
</section>

<?php
get_footer();
