<?php
/**
 * Template part for displaying top header part
 *
 * @link    https://codex.wordpress.org/Template_Hierarchy
 *
 * @package tarja
 */
?>

<!-- Top Header Bar -->
<header class="top-header-bar-container">

		<div class="top_col">

			<ul class="top-header-bar">

				<?php
				$enable_search_bar = get_theme_mod( 'tarja_enable_top_bar_search', 'enabled' );
				?>
				<?php if ( 'enabled' === $enable_search_bar ) : ?>
					<!-- Top Search -->
					<li class="top-search">
						<!-- Search Form -->
						<form role="search" method="get" class="pull-right" id="searchform_topbar" action="<?php echo esc_url( home_url( '/' ) ); ?>">
							<label>
								<span class="screen-reader-text"><?php esc_html__( 'Search for:', 'tarja' ); ?></span>
								<input class="search-field-top-bar" id="search-field-top-bar" placeholder="<?php echo esc_attr__( 'Procurar ...', 'tarja' ); ?>" value="" name="s" type="search">
							</label>
							<button id="search-top-bar-submit" type="submit" class="search-top-bar-submit">
								<span class="fa fa-search"></span>
							</button>
						</form>
					</li><!-- / Top Search -->
				<?php endif; ?>



				<?php if ( function_exists( 'pll_the_languages' ) ) : ?>

					<li class="top-multilang">
						<?php
						$current_lang = pll_current_language( 'name' );
						$current_flag = pll_current_language( 'flag' );
						?>
						<a href="#" class="multilang-toggle" id="multilang-toggle"> <?php echo $current_flag . esc_html( $current_lang ); ?> </a>
						<ul class="tarja-multilang-menu" data-menu data-menu-toggle="#multilang-toggle">
							<?php
							$args = array(
								'show_flags' => 1,
								'show_names' => 1,
							);

							pll_the_languages( $args );
							?>
						</ul>
					</li><!-- / Multi language picker -->
				<?php endif; ?>


				<?php if ( class_exists( 'WooCommerce' ) ) : ?>
					<!-- Cart -->
					<li class="top-cart">
						<a href="<?php echo esc_url( tarja_Helper::get_woocommerge_page( 'cart' ) ); ?>"><i class="fa fa-shopping-cart"></i> <?php echo esc_html( get_woocommerce_currency_symbol( get_woocommerce_currency() ) . ' ' . tarja_WooCommerce_Hooks::get_cart_total() ); ?>
						</a>
					</li> <!-- / Cart -->
				<?php endif; ?>

				<?php if ( class_exists( 'WooCommerce' ) ) : ?>
					<!-- Account -->
					<li class="top-account">
						<a href="<?php echo esc_url( tarja_Helper::get_woocommerge_page( 'account' ) ); ?>"><i class="fa fa-user"></i>
						</a>
					</li><!-- / Account -->
				<?php endif; ?>


			</ul>


	</div>
	<div class="top_col">
		<!-- /// Mobile Menu Trigger //////// -->
		<a href="#" id="mobile-menu-trigger"> <i class="fa fa-bars"></i> </a>
		<!-- end #mobile-menu-trigger -->
		<nav id="site-navigation" class="main-navigation" role="navigation">



						<div class="menu_first">
						<?php
						wp_nav_menu(
							array(
								'menu'           => 'primary',
								'theme_location' => 'primary',
								'depth'          => 3,
								'container'      => '',
								'menu_id'        => 'desktop-menu',
								'menu_class'     => 'sf-menu',
								'fallback_cb'    => 'tarja_Navwalker::fallback',
								'walker'         => new tarja_Navwalker(),
							)
						);
						?>

					</div>

		</nav><!-- #site-navigation -->
		</div>
</header><!-- /Top Header Bar -->
