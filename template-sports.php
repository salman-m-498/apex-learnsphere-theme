<?php
/**
 * Template Name: For Sports
 *
 * @package apex-learnsphere
 */

get_header();
?>

<header class="page-hero">
	<div class="container">
		<p class="eyebrow"><?php esc_html_e( 'Sports organisations', 'apex-learnsphere' ); ?></p>
		<h1><?php esc_html_e( 'Build the culture that drives performance', 'apex-learnsphere' ); ?></h1>
		<p class="lead"><?php esc_html_e( 'Sports development, team culture and leadership through sport for clubs, academies and sporting organisations.', 'apex-learnsphere' ); ?></p>
	</div>
</header>

<section class="section">
	<div class="container split">
		<div class="split__media reveal">
			<img src="<?php echo esc_url( apex_img_url( 'sports' ) ); ?>" alt="<?php esc_attr_e( 'Athletes training together as a team', 'apex-learnsphere' ); ?>" width="1400" height="1050" loading="lazy" />
		</div>
		<div class="reveal">
			<p class="eyebrow"><?php esc_html_e( 'For sports organisations', 'apex-learnsphere' ); ?></p>
			<h2><?php esc_html_e( 'Stronger teams start with a stronger culture', 'apex-learnsphere' ); ?></h2>
			<p><?php esc_html_e( 'Talent wins moments; culture wins seasons. We help sports organisations build the environment, values and leadership that allow teams and individuals to perform at their best.', 'apex-learnsphere' ); ?></p>
			<p><?php esc_html_e( 'From development pathways to leadership through sport, our approach uses sport as a vehicle for growth — on and off the field.', 'apex-learnsphere' ); ?></p>
			<p><a class="btn btn--primary" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Talk to Our Team', 'apex-learnsphere' ); ?> <span class="btn__arrow" aria-hidden="true">&#8594;</span></a></p>
		</div>
	</div>
</section>

<section class="section section--soft">
	<div class="container">
		<div class="section-head reveal">
			<p class="eyebrow"><?php esc_html_e( 'What we offer', 'apex-learnsphere' ); ?></p>
			<h2><?php esc_html_e( 'Services for sports organisations', 'apex-learnsphere' ); ?></h2>
		</div>
		<div class="card-grid card-grid--pillars">
			<div class="pillar-card reveal"><span class="pillar-card__icon"><?php echo apex_icon( 'trophy' ); // phpcs:ignore ?></span><div><h3><?php esc_html_e( 'Sports development', 'apex-learnsphere' ); ?></h3><p><?php esc_html_e( 'Structured development pathways for athletes at every stage.', 'apex-learnsphere' ); ?></p></div></div>
			<div class="pillar-card reveal"><span class="pillar-card__icon"><?php echo apex_icon( 'handshake' ); // phpcs:ignore ?></span><div><h3><?php esc_html_e( 'Team culture', 'apex-learnsphere' ); ?></h3><p><?php esc_html_e( 'Build the values, trust and standards that hold a team together.', 'apex-learnsphere' ); ?></p></div></div>
			<div class="pillar-card reveal"><span class="pillar-card__icon"><?php echo apex_icon( 'book-open' ); // phpcs:ignore ?></span><div><h3><?php esc_html_e( 'Sports education', 'apex-learnsphere' ); ?></h3><p><?php esc_html_e( 'Learning that connects sport with growth, discipline and life skills.', 'apex-learnsphere' ); ?></p></div></div>
			<div class="pillar-card reveal"><span class="pillar-card__icon"><?php echo apex_icon( 'award' ); // phpcs:ignore ?></span><div><h3><?php esc_html_e( 'Leadership through sport', 'apex-learnsphere' ); ?></h3><p><?php esc_html_e( 'Develop the leaders, captains and role models within your organisation.', 'apex-learnsphere' ); ?></p></div></div>
			<div class="pillar-card reveal"><span class="pillar-card__icon"><?php echo apex_icon( 'graduate' ); // phpcs:ignore ?></span><div><h3><?php esc_html_e( 'Coach & staff development', 'apex-learnsphere' ); ?></h3><p><?php esc_html_e( 'Equip coaches and staff with the skills to bring out the best in others.', 'apex-learnsphere' ); ?></p></div></div>
			<div class="pillar-card reveal"><span class="pillar-card__icon"><?php echo apex_icon( 'target' ); // phpcs:ignore ?></span><div><h3><?php esc_html_e( 'Performance environments', 'apex-learnsphere' ); ?></h3><p><?php esc_html_e( 'Create the conditions where performance is consistent and sustainable.', 'apex-learnsphere' ); ?></p></div></div>
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
