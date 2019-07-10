<?php
/**
 * Getting started template
 */
$customizer_url = admin_url() . 'customize.php';
$count          = $this->count_actions();
?>

<div class="feature-section three-col">
	<div class="col">
		<h3><?php esc_html_e( 'Step 1 - Implement recommended actions', 'tarja' ); ?></h3>
		<p><?php esc_html_e( 'We\'ve compiled a list of steps for you, to take make sure the experience you\'ll have using one of our products is very easy to follow.', 'tarja' ); ?></p>
		<?php if ( 0 == $count ) { ?>
			<p><span class="dashicons dashicons-yes"></span>
				<a href="<?php echo esc_url( admin_url( 'themes.php?page=tarja-welcome&tab=recommended_actions' ) ); ?>"><?php esc_html_e( 'No recommended actions left to perform', 'tarja' ); ?></a>
			</p>
		<?php } else { ?>
			<p><span class="dashicons dashicons-no-alt"></span>
				<a href="<?php echo esc_url( admin_url( 'themes.php?page=tarja-welcome&tab=recommended_actions' ) ); ?>"><?php esc_html_e( 'Check recommended actions', 'tarja' ); ?></a>
			</p>
		<?php }; ?>
	</div><!--/.col-->


	<div class="col">
		<h3><?php esc_html_e( 'Step 2 - Customize everything', 'tarja' ); ?></h3>
		<p><?php esc_html_e( 'Using the WordPress Customizer you can easily customize every aspect of the theme.', 'tarja' ); ?></p>
		<p>
			<a target="_blank" href="<?php echo esc_url( $customizer_url ); ?>" class="button button-primary"><?php esc_html_e( 'Go to Customizer', 'tarja' ); ?></a>
		</p>
	</div><!--/.col-->
</div><!--/.feature-section-->
