<?php
/**
 *
 * tarja Contact Widget
 *
 * @package tarja
 */
?>

<?php if ( isset( $params['contact_title'] ) ) : ?>
	<h5 class="widget-title"><span><?php echo esc_html( $params['contact_title'] ) ?></span></h5>
<?php endif; ?>

<?php if ( isset( $params['address'] ) ) : ?>
	<p class="tarja-contact-p"><i class="fa fa-map-marker"></i>
		<strong><?php echo esc_html__( 'Address:', 'tarja' ) ?></strong>
		<br/><?php echo esc_html( $params['address'] ) ?></p>
<?php endif; ?>

<?php if ( isset( $params['phone'] ) ) : ?>
	<p class="tarja-contact-p"><i class="fa fa-mobile"></i>
		<strong><?php echo esc_html__( 'Phone:', 'tarja' ) ?></strong>
		<br/><?php echo esc_html( $params['phone'] ) ?></p>
<?php endif; ?>

<?php if ( isset( $params['email'] ) ) : ?>
	<p class="tarja-contact-p"><i class="fa fa-envelope"></i>
		<strong><?php echo esc_html__( 'Email:', 'tarja' ) ?></strong>
		<br/><?php echo esc_html( $params['email'] ) ?></p>
<?php endif; ?>
