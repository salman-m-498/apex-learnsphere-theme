<?php
/**
 * Search form.
 *
 * @package apex-learnsphere
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="screen-reader-text" for="s"><?php esc_html_e( 'Search for:', 'apex-learnsphere' ); ?></label>
	<input type="search" id="s" name="s" value="<?php echo get_search_query(); ?>" placeholder="<?php esc_attr_e( 'Search…', 'apex-learnsphere' ); ?>" />
	<button type="submit" class="btn btn--primary"><?php esc_html_e( 'Search', 'apex-learnsphere' ); ?></button>
</form>
