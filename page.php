<?php

get_header();
?>

<?php
$shop_page    = tarja_Helper::has_sidebar();
$account_page = false;
if ( class_exists( 'WooCommerce' ) ) {
	$account_page = is_account_page();
}
?>
	<div class="container">
		<div class="row main_page">
			<?php
			$breadcrumbs_enabled = get_theme_mod( 'tarja_enable_post_breadcrumbs', true );
			if ( $breadcrumbs_enabled ) { ?>
				<div class="row">
					<div class="col-xs-12">
						<?php tarja_Helper::add_breadcrumbs(); ?>
					</div>
				</div>
	<?php } ?>
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">

					<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
					?>

				</main><!-- #main -->
			</div><!-- #primary -->

			<?php
			if ( $shop_page ) {
				if ( ! $account_page ) {
					get_sidebar( 'shop' );
				}
			}
			?>
		</div>
		<section class="col-md-12">
			<?php $dquery = new WP_Query();
			$all_childs = $dquery->query(array('post_type' => 'page'));
			$child = get_page_children($post->ID, $all_childs);
			if($child){ $parent = $post->ID;} else{ $parent = wp_get_post_parent_id( $post->ID );}
			if($parent){?>

				<header><?php
				$car = get_post($parent);
				?>
				<h2><?php echo $car->post_title;?></h2>
				<p>
				<?php echo get_post_meta($parent, "micro-text", "true");?>
				</p>
				</header>

<div class="row">
	<?php

	$args = array(
			'post_type'      => 'page',
			'posts_per_page' => -1,
			'post_parent'    => $parent,
			'order'          => 'ASC',
			'orderby'        => 'menu_order'
	 );


	$childrens = new WP_Query( $args );

	if ( $childrens->have_posts() ) : ?>

	<?php
	$icar = '0';

	while ( $childrens->have_posts() ) : $childrens->the_post();
	$car_image_cover = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large' );
	?>
<a  class="col-md-6 pages_child" href="<?php the_permalink(); ?>" target="_self" title="<?php the_title(); ?>">
	<div>
	<img src="<?php echo $car_image_cover[0];?>" alt="<?php the_title(); ?>">
	<div>
	<h5><?php the_title(); ?></h5>
	<p><?php echo the_excerpt();?></p>
	</div>
	</div>
	</a>
<?php endwhile;endif;wp_reset_query();}?>

</div>


		</section>
	</div>
<?php
get_footer();
