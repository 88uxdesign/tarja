<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link    https://codex.wordpress.org/Template_Hierarchy
 *
 * @package tarja
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'tarja-blog-post' ); ?>>
	<header class="entry-header">
		<div class="tarja-blog-meta">
			<?php tarja_Helper::post_meta(); ?>
		</div>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_excerpt(); ?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
