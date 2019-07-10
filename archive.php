<?php
/**
 * The template for displaying archive pages.
 *
 * @link    https://codex.wordpress.org/Template_Hierarchy
 *
 * @package tarja
 */

get_header();

$breadcrumbs_enabled = get_theme_mod( 'tarja_enable_post_breadcrumbs', true );
if ( $breadcrumbs_enabled ) { ?>
	<div class="row">
		<div class="col-xs-12">
			<?php tarja_Helper::add_breadcrumbs(); ?>
		</div>
	</div>
<?php } ?>
	<div class="container">

			<div id="primary" class="row">


				<main id="main" class="site-main" role="main">
					<?php
					if ( have_posts() ) :
						?>

						<header class="page-header">
							<?php
							the_archive_title( '<h1 class="page-title">', '</h1>' );
							the_archive_description( '<div class="archive-description">', '</div>' );
							?>
						</header><!-- .page-header -->

						<?php
						/* Start the Loop. */
						while ( have_posts() ) :
							the_post();

							/*
							 * Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'template-parts/content', get_post_format() );

						endwhile;

						the_posts_pagination(
							array(
								'prev_text' => '<span class="pagination-arrow-container"><span class="fa fa-long-arrow-left"></span> ' . esc_html__( 'Anterior', 'tarja' ) . '</span>',
								'next_text' => '<span class="pagination-arrow-container">' . esc_html__( 'Próxima', 'tarja' ) . ' <span class="fa fa-long-arrow-right"></span></span>',
							)
						);

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif;
					?>
				</main><!-- #main -->

			</div><!-- #primary -->
	</div>

<?php
get_footer();
