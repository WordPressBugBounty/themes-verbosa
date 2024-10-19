<?php
/**
 * The default template for the not found section
 *
 * @package Verbosa
 */
?>
<header class="content-search pad-container no-results" <?php cryout_schema_microdata( 'element' ); ?>>
	<h1 class="entry-title" <?php cryout_schema_microdata( 'entry-title' ); ?>><?php _e( 'Nothing Found', 'verbosa' ); ?></h1>
	<div class="no-results-div">
		<p <?php cryout_schema_microdata( 'text' ); ?>><?php printf( __( 'No search results for: %s', 'verbosa' ), '<strong>' . get_search_query() . '</strong>' ); ?></p>
	<?php get_search_form(); ?>
	</div>
</header><!-- not-found -->
