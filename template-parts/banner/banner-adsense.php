<?php
/**
 * Adsense Banner template
 *
 * @package tarja
 */
wp_enqueue_script( 'adsenseloader' );
$code = get_theme_mod( 'tarja_banner_adsense_code', '' );

/**
 * In case we don't have a code, we terminate here
 */
if ( empty( $code ) ) {
	return false;
}
?>
<div class="tarja-adsense">
	<?php
	echo htmlspecialchars_decode( $code );
	?>
	<p class="adsense__loading"><span><?php echo __( 'Loading', 'tarja' ); ?></span></p>
</div>

