<?php
/**
 * Template part for displaying posts.
 *
 * @link    https://codex.wordpress.org/Template_Hierarchy
 *
 * @package tarja
 */

?>
<article id="post-<?php the_ID(); ?>" <?php echo ! is_single() ? 'class="col-md-6 tarja-blog-post"' :'class="tarja-blog-post"';?>>
	<header class="entry-header">
		<div class="tarja-blog-image">
			<?php
			if ( has_post_thumbnail() ) {
				echo ! is_single() ? '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' : '';
				the_post_thumbnail( 'tarja-blog-post-image' );
				echo ! is_single() ? '</a>' : '';
			}
			?>
		</div>

		<div class="tarja-blog-meta">
			<?php tarja_Helper::post_meta(); ?>
		</div>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
	echo ! is_single() ? the_excerpt(): the_content();
		?>
	</div><!-- .entry-content -->

	<?php if ( is_single() ) : ?>
		<footer class="entry-footer">
			<?php tarja_Helper::entry_footer(); ?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>


</article><!-- #post-## -->
