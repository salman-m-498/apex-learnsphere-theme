<?php
/**
 * Template Name: For Students & Parents
 *
 * @package apex-learnsphere
 */

get_header();
?>

<header class="page-hero">
	<div class="container">
		<p class="eyebrow"><?php esc_html_e( 'Students & parents', 'apex-learnsphere' ); ?></p>
		<h1><?php esc_html_e( 'Guidance for the choices that shape the future', 'apex-learnsphere' ); ?></h1>
		<p class="lead"><?php esc_html_e( 'Clear, honest guidance for students and families navigating subjects, streams, careers and higher-education pathways.', 'apex-learnsphere' ); ?></p>
	</div>
</header>

<section class="section">
	<div class="container split">
		<div class="split__media reveal">
			<img src="<?php echo esc_url( apex_img_url( 'students-parents' ) ); ?>" alt="<?php esc_attr_e( 'A parent supporting a child with their learning at home', 'apex-learnsphere' ); ?>" width="1400" height="1050" loading="lazy" />
		</div>
		<div class="reveal">
			<p class="eyebrow"><?php esc_html_e( 'For students & parents', 'apex-learnsphere' ); ?></p>
			<h2><?php esc_html_e( 'Make informed decisions, with confidence', 'apex-learnsphere' ); ?></h2>
			<p><?php esc_html_e( 'Choosing subjects, streams and pathways is one of the most important decisions a young person makes. We help students understand their options — and parents support them with clarity rather than guesswork.', 'apex-learnsphere' ); ?></p>
			<p><?php esc_html_e( 'Whether it is career exploration, higher-education planning or deciding between schools, our guidance is personal, practical and grounded in what is realistic for each student.', 'apex-learnsphere' ); ?></p>
			<p><a class="btn btn--primary" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Career Guidance Enquiry', 'apex-learnsphere' ); ?> <span class="btn__arrow" aria-hidden="true">&#8594;</span></a></p>
		</div>
	</div>
</section>

<section class="section section--soft">
	<div class="container">
		<div class="section-head reveal">
			<p class="eyebrow"><?php esc_html_e( 'What we offer', 'apex-learnsphere' ); ?></p>
			<h2><?php esc_html_e( 'Services for students & parents', 'apex-learnsphere' ); ?></h2>
		</div>
		<div class="card-grid card-grid--pillars">
			<div class="pillar-card reveal"><span class="pillar-card__icon"><?php echo apex_icon( 'compass' ); // phpcs:ignore ?></span><div><h3><?php esc_html_e( 'Career guidance', 'apex-learnsphere' ); ?></h3><p><?php esc_html_e( 'Explore interests, strengths and realistic career directions that fit each student.', 'apex-learnsphere' ); ?></p></div></div>
			<div class="pillar-card reveal"><span class="pillar-card__icon"><?php echo apex_icon( 'book-open' ); // phpcs:ignore ?></span><div><h3><?php esc_html_e( 'Educational planning', 'apex-learnsphere' ); ?></h3><p><?php esc_html_e( 'A clear roadmap for the subjects, stages and milestones ahead.', 'apex-learnsphere' ); ?></p></div></div>
			<div class="pillar-card reveal"><span class="pillar-card__icon"><?php echo apex_icon( 'target' ); // phpcs:ignore ?></span><div><h3><?php esc_html_e( 'Subject & stream selection', 'apex-learnsphere' ); ?></h3><p><?php esc_html_e( 'Confident, informed choices about which subjects and streams to pursue.', 'apex-learnsphere' ); ?></p></div></div>
			<div class="pillar-card reveal"><span class="pillar-card__icon"><?php echo apex_icon( 'graduate' ); // phpcs:ignore ?></span><div><h3><?php esc_html_e( 'Higher-education pathways', 'apex-learnsphere' ); ?></h3><p><?php esc_html_e( 'Understand universities, programmes and routes that match your goals.', 'apex-learnsphere' ); ?></p></div></div>
			<div class="pillar-card reveal"><span class="pillar-card__icon"><?php echo apex_icon( 'lightbulb' ); // phpcs:ignore ?></span><div><h3><?php esc_html_e( 'Goal-setting & guidance', 'apex-learnsphere' ); ?></h3><p><?php esc_html_e( 'Turn ambition into a realistic plan with clear, achievable milestones.', 'apex-learnsphere' ); ?></p></div></div>
			<div class="pillar-card reveal"><span class="pillar-card__icon"><?php echo apex_icon( 'family' ); // phpcs:ignore ?></span><div><h3><?php esc_html_e( 'Parent consultation', 'apex-learnsphere' ); ?></h3><p><?php esc_html_e( 'Guidance for parents on school choice, learning support and next steps.', 'apex-learnsphere' ); ?></p></div></div>
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
