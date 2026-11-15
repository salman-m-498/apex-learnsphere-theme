<?php
/**
 * Archive template.
 *
 * @package apex-learnsphere
 */

get_header();
?>

<header class="page-hero">
	<div class="container">
		<p class="eyebrow"><?php esc_html_e( 'Archive', 'apex-learnsphere' ); ?></p>
		<h1><?php the_archive_title(); ?></h1>
		<?php the_archive_description( '<div class="lead">', '</div>' ); ?>
	</div>
</header>

<section class="section">
	<div class="container">
		<?php if ( have_posts() ) : ?>
			<div class="post-grid">
				<?php
				while ( have_posts() ) :
					the_post();
					?>
					<article <?php post_class( 'post-card' ); ?>>
						<?php if ( has_post_thumbnail() ) : ?>
							<a class="post-card__thumb" href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'large' ); ?></a>
						<?php endif; ?>
						<div class="post-card__body">
							<p class="post-card__meta"><time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time></p>
							<h2 class="post-card__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<div class="post-card__excerpt"><?php the_excerpt(); ?></div>
						</div>
					</article>
				<?php endwhile; ?>
			</div>
			<?php the_posts_pagination(); ?>
		<?php else : ?>
			<p><?php esc_html_e( 'No posts found.', 'apex-learnsphere' ); ?></p>
		<?php endif; ?>
	</div>
</section>

<?php
get_footer();
