<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link    https://codex.wordpress.org/Template_Hierarchy
 *
 * @package tarja
 */
get_header();

if ( is_main_site() ) {
	$header = get_custom_header();
	if ( ! empty( $header->url ) ) {
		echo '<img src="' . esc_url( $header->url ) . '" class="img-centered img-responsive" />';
	}
}
?>
<?php
/**
 * Template part for displaying main slider
 *
 * @link    https://codex.wordpress.org/Template_Hierarchy
 *
 * @package tarja
 */

$images = get_theme_mod( 'tarja_slider_bg', array() );

if ( ! class_exists( 'Kirki' ) ) {
	return;
}

include 'template-parts/nav_categories_prod.php';


?>


<!-- Main Slider -->

<section class="main-slider">
	<?php if ( empty( $images ) ) : ?>
		<div class="owl-carousel owl-theme" id="main-slider">
			<div class="item">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/hero.jpg"/>
				<div class="hero-caption left">
					<span class="year"><?php echo esc_html( date( 'Y' ) ); ?></span>
					<span class="caption"><?php echo esc_html__( 'Autumn Collection', 'tarja' ); ?></span>
					<div class="btn-group">
						<a href="#"><?php echo esc_html__( 'Shop Now', 'tarja' ); ?></a>
						<a href="#"><?php echo esc_html__( 'Learn More', 'tarja' ); ?></a>
					</div>
				</div>
			</div>
		</div>
	<?php else : ?>
		<div class="owl-carousel owl-theme" id="main-slider">
			<?php foreach ( $images as $image ) : ?>
				<div class="item">
					<?php echo wp_get_attachment_image( $image['image_bg'], 'tarja-slider-image' ); ?>
					<div class="hero-caption <?php echo esc_attr( get_theme_mod( 'tarja_slider_layout', 'left' ) ); ?>">
						<?php if ( ! empty( $image['cta_text'] ) ) : ?>
							<span class="year"><?php echo esc_html( $image['cta_text'] ); ?></span>
						<?php endif; ?>
						<?php if ( ! empty( $image['cta_subtext'] ) ) : ?>
							<span class="caption"><?php echo esc_html( $image['cta_subtext'] ); ?></span>
						<?php endif; ?>
						<div class="btn-group">
							<?php if ( ! empty( $image['button_one_text'] ) && ! empty( $image['button_one_url'] ) ) : ?>
								<a href="<?php echo esc_html( $image['button_one_url'] ); ?>"><?php echo esc_html( $image['button_one_text'] ); ?></a>
							<?php endif; ?>
							<?php if ( ! empty( $image['button_two_text'] ) && ! empty( $image['button_two_url'] ) ) : ?>
								<a href="<?php echo esc_html( $image['button_two_url'] ); ?>"><?php echo esc_html( $image['button_two_text'] ); ?></a>
							<?php endif; ?>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>
	<div class="main-slider-bar">
		<div class="container">
			<ul class="main-slider-info">
				<li class="col-sm-4 col-xs-12">
					<div class="main-slider-info-cell">
						<div class="cell-icon">
							<?php
							$icon = get_theme_mod( 'info_section_one_icon', 'fa fa-automobile' );
							if ( 'fa fa-automobile' !== $icon ) {
								$icon = 'dashicons dashicons-' . get_theme_mod( 'info_section_one_icon' );
							}
							?>
							<i class="<?php echo esc_attr( $icon ); ?>"></i>
						</div>
						<div class="cell-content">
							<span class="cell-caption">
								<?php echo wp_kses_post( get_theme_mod( 'info_section_one_text', 'FREE SHIPPING' ) ); ?>
							</span> <span class="cell-subcaption">
								<?php echo wp_kses_post( get_theme_mod( 'info_section_one_subtext', 'On all orders over 90$' ) ); ?>
							</span>
						</div>
					</div>
				</li>
				<li class="col-sm-4 col-xs-12">
					<div class="main-slider-info-cell">
						<div class="cell-icon">
							<?php
							$icon = get_theme_mod( 'info_section_two_icon', 'fa fa-mobile-phone' );
							if ( 'fa fa-mobile-phone' !== $icon ) {
								$icon = 'dashicons dashicons-' . get_theme_mod( 'info_section_two_icon' );
							}
							?>
							<i class="<?php echo esc_attr( $icon ); ?>"></i>
						</div>
						<div class="cell-content">
							<span class="cell-caption">
								<?php echo wp_kses_post( get_theme_mod( 'info_section_two_text', 'CALL US ANYTIME' ) ); ?>
							</span> <span class="cell-subcaption">
								<?php echo wp_kses_post( get_theme_mod( 'info_section_two_subtext', '+04786445953' ) ); ?>
							</span>
						</div>

					</div>
				</li>
				<li class="col-sm-4 col-xs-12">
					<div class="main-slider-info-cell">
						<div class="cell-icon">
							<?php
							$icon = get_theme_mod( 'info_section_three_icon', 'fa fa-map-marker' );
							if ( 'fa fa-map-marker' !== $icon ) {
								$icon = 'dashicons dashicons-' . get_theme_mod( 'info_section_three_icon' );
							}
							?>
							<i class="<?php echo esc_attr( $icon ); ?>"></i>
						</div>
						<div class="cell-content">
						<span class="cell-caption">
							<?php echo wp_kses_post( get_theme_mod( 'info_section_three_text', 'OUR LOCATION' ) ); ?>
						</span> <span class="cell-subcaption">
							<?php echo wp_kses_post( get_theme_mod( 'info_section_three_subtext', '557-6308 Lacinia Road. NYC' ) ); ?>
						</span>
						</div>
					</div>
				</li>
			</ul>
		</div>
	</div>




</section><!-- / Main Slider -->



<section class="container home_news">
<header>
<h3>Novos Produtos</h3>
</header>
<?php
wp_enqueue_script( 'owlCarousel' );

$posts = tarja_Helper::get_products( $params ); ?>

<div class="row tarja-product-slider-container">
	<div class="tarja-product-slider-navigation">
		<a class="prev" href="#"><i class="fa fa-angle-left"></i></a>
		<a class="next" href="#"><i class="fa fa-angle-right"></i></a>
	</div>
	<div class="col-xs-12">
		<div class="owl-carousel tarja-product-slider" data-attr-elements="3">
			<?php while ( $posts->have_posts() ) : $posts->the_post();
				global $product;
				global $post; ?>
				<div class="item">
					<div
							class="tarja-product <?php echo esc_attr( ! empty( $params['color'] ) ? $params['color'] : '' ) ?>">
						<div class="tarja-product-image">
							<?php if ( $product->is_on_sale() ) : ?>

								<?php echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale">' . esc_html__( 'Sale!', 'tarja' ) . '</span>', $post, $product ); ?>

							<?php endif; ?>

							<?php
							$image = '<img src="' . get_template_directory_uri() . '/assets/images/product-placeholder.jpg" />';
							if ( has_post_thumbnail() ) {
								$image = woocommerce_get_product_thumbnail( 'shop_catalog' );
							};
							$max_size = get_the_post_thumbnail_url( get_the_ID(), 'shop_single' );
							$image = str_replace( ' class=', ' data-src="' . $max_size . '" class=', $image );

							$allowed_tags = array(
								'img'      => array(
									'data-srcset' => true,
									'data-src'    => true,
									'srcset'      => true,
									'sizes'       => true,
									'src'         => true,
									'class'       => true,
									'alt'         => true,
									'width'       => true,
									'height'      => true,
								),
								'noscript' => array(),
							);
							echo wp_kses( $image, $allowed_tags );
							?>
						</div>
						<div class="tarja-product-body">
							<h3><?php woocommerce_template_loop_product_link_open() ?><?php echo get_the_title(); ?><?php woocommerce_template_loop_product_link_close() ?></h3>
							<?php $rating_html = wc_get_rating_html( $product->get_average_rating() ) ?>
							<?php if ( 'yes' === $params['show_rating'] && $rating_html ) : ?>
								<?php echo $rating_html; ?>
							<?php endif; ?>

							<?php $price_html = $product->get_price_html() ?>
							<?php if ( $price_html ) : ?>
								<span class="price"><?php echo $price_html; ?></span>
							<?php endif; ?>

							<?php echo apply_filters(
								'woocommerce_loop_add_to_cart_link',
								sprintf( '<a rel="nofollow" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" class="%s"><span class="fa fa-shopping-cart"></span> %s</a>',
									esc_url( $product->add_to_cart_url() ),
									esc_attr( isset( $quantity ) ? $quantity : 1 ),
									esc_attr( $product->get_id() ),
									esc_attr( $product->get_sku() ),
									esc_attr( ! empty( $params['color'] ) ? 'ajax_add_to_cart add_to_cart_button button ' . $params['color'] : 'ajax_add_to_cart add_to_cart_button button' ),
									esc_html( $product->add_to_cart_text() )
								),
							$product ); ?>
						</div>

					</div>
				</div>
			<?php endwhile; ?>
		</div>
	</div>
</div>


</section>
<?php
get_footer();
