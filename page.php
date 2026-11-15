<?php
/**
 * Default page template.
 *
 * @package apex-learnsphere
 */

get_header();

while ( have_posts() ) :
	the_post();
	?>
	<header class="page-hero">
		<div class="container">
			<?php if ( has_excerpt() ) : ?>
				<p class="eyebrow"><?php echo esc_html( get_the_excerpt() ); ?></p>
			<?php endif; ?>
			<h1><?php the_title(); ?></h1>
		</div>
	</header>

	<section class="section">
		<div class="container">
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
		</div>
	</section>
	<?php
endwhile;

get_footer();
