<?php
/**
 * Template Name: For Schools
 *
 * @package apex-learnsphere
 */

get_header();
?>

<header class="page-hero">
	<div class="container">
		<p class="eyebrow"><?php esc_html_e( 'Schools & institutions', 'apex-learnsphere' ); ?></p>
		<h1><?php esc_html_e( 'Support for stronger schools and better outcomes', 'apex-learnsphere' ); ?></h1>
		<p class="lead"><?php esc_html_e( 'Practical, people-centred consultancy for school owners, principals and leaders who want to improve, grow and sustain quality.', 'apex-learnsphere' ); ?></p>
	</div>
</header>

<section class="section">
	<div class="container split">
		<div class="split__media reveal">
			<img src="<?php echo esc_url( apex_img_url( 'schools' ) ); ?>" alt="<?php esc_attr_e( 'A teacher presenting at a whiteboard in a bright classroom', 'apex-learnsphere' ); ?>" width="1400" height="1050" loading="lazy" />
		</div>
		<div class="reveal">
			<p class="eyebrow"><?php esc_html_e( 'For schools & institutions', 'apex-learnsphere' ); ?></p>
			<h2><?php esc_html_e( 'Improvement that starts with your school, not a template', 'apex-learnsphere' ); ?></h2>
			<p><?php esc_html_e( 'Every school is different. We work alongside leadership teams to understand your context, identify what is working, and build a clear plan for sustainable improvement.', 'apex-learnsphere' ); ?></p>
			<p><?php esc_html_e( 'From whole-school improvement to focused teacher development, our support is practical, evidence-informed and designed to make a measurable difference to staff and students alike.', 'apex-learnsphere' ); ?></p>
			<p><a class="btn btn--primary" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Request a School Consultation', 'apex-learnsphere' ); ?> <span class="btn__arrow" aria-hidden="true">&#8594;</span></a></p>
		</div>
	</div>
</section>

<section class="section section--soft">
	<div class="container">
		<div class="section-head reveal">
			<p class="eyebrow"><?php esc_html_e( 'What we offer', 'apex-learnsphere' ); ?></p>
			<h2><?php esc_html_e( 'Services for schools', 'apex-learnsphere' ); ?></h2>
		</div>
		<div class="card-grid card-grid--pillars">
			<div class="pillar-card reveal"><span class="pillar-card__icon"><?php echo apex_icon( 'trending-up' ); // phpcs:ignore ?></span><div><h3><?php esc_html_e( 'School improvement', 'apex-learnsphere' ); ?></h3><p><?php esc_html_e( 'Whole-school reviews, improvement planning and ongoing support for measurable progress.', 'apex-learnsphere' ); ?></p></div></div>
			<div class="pillar-card reveal"><span class="pillar-card__icon"><?php echo apex_icon( 'briefcase' ); // phpcs:ignore ?></span><div><h3><?php esc_html_e( 'Management consultancy', 'apex-learnsphere' ); ?></h3><p><?php esc_html_e( 'Strategic planning, operations and service quality for school leaders and owners.', 'apex-learnsphere' ); ?></p></div></div>
			<div class="pillar-card reveal"><span class="pillar-card__icon"><?php echo apex_icon( 'graduate' ); // phpcs:ignore ?></span><div><h3><?php esc_html_e( 'Teacher development', 'apex-learnsphere' ); ?></h3><p><?php esc_html_e( 'Professional development that builds teaching quality and confidence in the classroom.', 'apex-learnsphere' ); ?></p></div></div>
			<div class="pillar-card reveal"><span class="pillar-card__icon"><?php echo apex_icon( 'heart-handshake' ); // phpcs:ignore ?></span><div><h3><?php esc_html_e( 'Inclusive education', 'apex-learnsphere' ); ?></h3><p><?php esc_html_e( 'Practical strategies for welcoming, supporting and including every learner.', 'apex-learnsphere' ); ?></p></div></div>
			<div class="pillar-card reveal"><span class="pillar-card__icon"><?php echo apex_icon( 'clipboard-check' ); // phpcs:ignore ?></span><div><h3><?php esc_html_e( 'Staff training', 'apex-learnsphere' ); ?></h3><p><?php esc_html_e( 'Targeted workshops and programmes for teaching and non-teaching staff.', 'apex-learnsphere' ); ?></p></div></div>
			<div class="pillar-card reveal"><span class="pillar-card__icon"><?php echo apex_icon( 'family' ); // phpcs:ignore ?></span><div><h3><?php esc_html_e( 'Parent engagement', 'apex-learnsphere' ); ?></h3><p><?php esc_html_e( 'Strengthening the partnership between school and home for better outcomes.', 'apex-learnsphere' ); ?></p></div></div>
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
