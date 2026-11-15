<?php
/**
 * Search results template.
 *
 * @package apex-learnsphere
 */

get_header();
?>

<header class="page-hero">
	<div class="container">
		<p class="eyebrow"><?php esc_html_e( 'Search', 'apex-learnsphere' ); ?></p>
		<h1><?php printf( esc_html__( 'Results for “%s”', 'apex-learnsphere' ), esc_html( get_search_query() ) ); ?></h1>
	</div>
</header>

<section class="section">
	<div class="container">
		<?php get_search_form(); ?>
		<div style="height: var(--space-4);"></div>
		<?php if ( have_posts() ) : ?>
			<div class="post-grid">
				<?php
				while ( have_posts() ) :
					the_post();
					?>
					<article <?php post_class( 'post-card' ); ?>>
						<div class="post-card__body">
							<p class="post-card__meta"><?php echo esc_html( get_post_type() ); ?></p>
							<h2 class="post-card__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<div class="post-card__excerpt"><?php the_excerpt(); ?></div>
						</div>
					</article>
				<?php endwhile; ?>
			</div>
			<?php the_posts_pagination(); ?>
		<?php else : ?>
			<p><?php esc_html_e( 'No results found. Try a different search term.', 'apex-learnsphere' ); ?></p>
		<?php endif; ?>
	</div>
</section>

<?php
get_footer();
