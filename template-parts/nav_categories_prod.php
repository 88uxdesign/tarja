<nav class="nav_categories">
<header>
	<h4>Produtos</h4>
</header>
	<ul>
	<?php
	$get_featured_cats = array(
		'taxonomy'     => 'product_cat',
		'orderby'      => 'name',
		'hide_empty'   => '0',
		'include'      => $cat_array
	);
	$all_categories = get_categories( $get_featured_cats );
	$j = 1;
	foreach ($all_categories as $cat) {
		$cat_id   = $cat->term_id;
		$cat_link = get_category_link( $cat_id );

		$thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true ); // Get Category Thumbnail
		$image = wp_get_attachment_url( $thumbnail_id );

?>
<li><a href="<?php echo $cat_link;?>">
<?php

		if ( $image ) {
			echo '<img src="' . $image . '" alt="' .$cat->name. '" />';
		}

echo '<span>'.$cat->name.'</span>';


		$j++;

?>
</li>
</a>
		<?php
	}
	// Reset Post Data
	wp_reset_query();
	?>
<ul>


</nav>
