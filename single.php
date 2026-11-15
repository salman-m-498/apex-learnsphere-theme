<?php
/**
 * Single post template.
 *
 * @package apex-learnsphere
 */

get_header();

while ( have_posts() ) :
	the_post();
	?>
	<article <?php post_class(); ?>>
		<header class="page-hero">
			<div class="container container--narrow">
				<p class="page-hero__breadcrumb">
					<a href="<?php echo esc_url( home_url( '/resources/' ) ); ?>"><?php esc_html_e( 'Resources', 'apex-learnsphere' ); ?></a>
				</p>
				<h1><?php the_title(); ?></h1>
				<p class="lead" style="font-size:1.05rem; color:var(--c-text-muted);">
					<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
				</p>
			</div>
		</header>

		<section class="section">
			<div class="container container--narrow">
				<?php if ( has_post_thumbnail() ) : ?>
					<div class="entry-content" style="margin-bottom:var(--space-4);">
						<?php the_post_thumbnail( 'large', array( 'style' => 'border-radius: var(--radius-lg); width: 100%;' ) ); ?>
					</div>
				<?php endif; ?>
				<div class="entry-content">
					<?php the_content(); ?>
				</div>
			</div>
		</section>
	</article>
	<?php
endwhile;

get_footer();
