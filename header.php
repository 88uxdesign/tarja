<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
	<script src="<?php bloginfo("template_url"); ?>/assets/js/jquery.validate.min.js"></script>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<?php
	/**
	 * Enable / Disable the top bar
	 */
	if ( get_theme_mod( 'tarja_enable_top_bar', true ) ) :
		get_template_part( 'template-parts/top-header' );
	endif;
	?>
	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding container">
			<div class="row header-logo">

					<a href="<?php echo get_site_url(); ?>" class="custom-logo-link col-sm-12">
						<img src="<?php bloginfo("template_url"); ?>/assets/images/logo.jpg" alt="<?php echo get_bloginfo( 'description' ); ?>">
					</a>

					<header class="col-sm-12">
						<h1><?php echo get_bloginfo( 'name' ); ?></h1>
						<span class="site-title-description">
<?php echo get_bloginfo( 'description' ); ?>
						</span>
					</header>

			</div>
		</div><!-- .site-branding -->



	</header><!-- #masthead -->

	<?php
	/**
	 * Enable / Disable the main slider
	 */
	$show_on_front = get_option( 'show_on_front' );
	if ( get_theme_mod( 'tarja_enable_main_slider', true ) && is_front_page() && 'posts' !== $show_on_front ) :
		get_template_part( 'template-parts/main-slider' );
	endif;
	?>

	<div class="site-content">
