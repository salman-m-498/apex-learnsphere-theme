<?php
/**
 * Template Name: For Businesses
 *
 * @package apex-learnsphere
 */

get_header();
?>

<header class="page-hero">
	<div class="container">
		<p class="eyebrow"><?php esc_html_e( 'Businesses & organisations', 'apex-learnsphere' ); ?></p>
		<h1><?php esc_html_e( 'Develop your people. Strengthen your organisation.', 'apex-learnsphere' ); ?></h1>
		<p class="lead"><?php esc_html_e( 'Management consultancy, leadership development and professional training that turn individual potential into organisational performance.', 'apex-learnsphere' ); ?></p>
	</div>
</header>

<section class="section">
	<div class="container split">
		<div class="split__media reveal">
			<img src="<?php echo esc_url( apex_img_url( 'businesses' ) ); ?>" alt="<?php esc_attr_e( 'Colleagues discussing strategy in a modern office', 'apex-learnsphere' ); ?>" width="1400" height="1050" loading="lazy" />
		</div>
		<div class="reveal">
			<p class="eyebrow"><?php esc_html_e( 'For businesses & organisations', 'apex-learnsphere' ); ?></p>
			<h2><?php esc_html_e( 'Practical development for real workplaces', 'apex-learnsphere' ); ?></h2>
			<p><?php esc_html_e( 'Great organisations are built on people who are clear, capable and motivated. We help leaders and teams communicate better, work better together and deliver more consistently.', 'apex-learnsphere' ); ?></p>
			<p><?php esc_html_e( 'Our programmes are grounded in your reality — practical, relevant and immediately applicable, rather than generic theory.', 'apex-learnsphere' ); ?></p>
			<p><a class="btn btn--primary" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Talk to Our Team', 'apex-learnsphere' ); ?> <span class="btn__arrow" aria-hidden="true">&#8594;</span></a></p>
		</div>
	</div>
</section>

<section class="section section--soft">
	<div class="container">
		<div class="section-head reveal">
			<p class="eyebrow"><?php esc_html_e( 'What we offer', 'apex-learnsphere' ); ?></p>
			<h2><?php esc_html_e( 'Services for businesses', 'apex-learnsphere' ); ?></h2>
		</div>
		<div class="card-grid card-grid--pillars">
			<div class="pillar-card reveal"><span class="pillar-card__icon"><?php echo apex_icon( 'briefcase' ); // phpcs:ignore ?></span><div><h3><?php esc_html_e( 'Management consultancy', 'apex-learnsphere' ); ?></h3><p><?php esc_html_e( 'Strategic planning, operational improvement and service quality.', 'apex-learnsphere' ); ?></p></div></div>
			<div class="pillar-card reveal"><span class="pillar-card__icon"><?php echo apex_icon( 'trending-up' ); // phpcs:ignore ?></span><div><h3><?php esc_html_e( 'Leadership development', 'apex-learnsphere' ); ?></h3><p><?php esc_html_e( 'Build confident, capable leaders at every level of your organisation.', 'apex-learnsphere' ); ?></p></div></div>
			<div class="pillar-card reveal"><span class="pillar-card__icon"><?php echo apex_icon( 'users' ); // phpcs:ignore ?></span><div><h3><?php esc_html_e( 'Team development', 'apex-learnsphere' ); ?></h3><p><?php esc_html_e( 'Strengthen collaboration, trust and shared accountability across teams.', 'apex-learnsphere' ); ?></p></div></div>
			<div class="pillar-card reveal"><span class="pillar-card__icon"><?php echo apex_icon( 'messages' ); // phpcs:ignore ?></span><div><h3><?php esc_html_e( 'Communication', 'apex-learnsphere' ); ?></h3><p><?php esc_html_e( 'Clearer communication that improves relationships and reduces friction.', 'apex-learnsphere' ); ?></p></div></div>
			<div class="pillar-card reveal"><span class="pillar-card__icon"><?php echo apex_icon( 'clipboard-check' ); // phpcs:ignore ?></span><div><h3><?php esc_html_e( 'Professional training', 'apex-learnsphere' ); ?></h3><p><?php esc_html_e( 'Targeted workshops and programmes that build lasting workplace skills.', 'apex-learnsphere' ); ?></p></div></div>
			<div class="pillar-card reveal"><span class="pillar-card__icon"><?php echo apex_icon( 'target' ); // phpcs:ignore ?></span><div><h3><?php esc_html_e( 'Change & improvement', 'apex-learnsphere' ); ?></h3><p><?php esc_html_e( 'Practical support for navigating change and continuous improvement.', 'apex-learnsphere' ); ?></p></div></div>
		</div>
	</div>
</section>

<section class="section">
	<div class="container">
		<?php get_template_part( 'template-parts/steps' ); ?>
	</div>
</section>

<?php
get_footer();
