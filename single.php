<?php


get_header();
if ( is_single() ) {
$header = get_custom_header();
if ( ! empty( $header->url ) ) {
echo '<img src="' . esc_url( $header->url ) . '" class="img-centered img-responsive" />';
}
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

<div id="primary" class="content-area <?php echo $class; ?>">
<main id="main" class="site-main" role="main">

<?php
while ( have_posts() ) :
the_post(); get_template_part( 'template-parts/content', get_post_format() );

endwhile; // End of the loop.
?>
<section class="comment">
<header class="post_ofer">
<h3>O que você achou?</h3>
</header>
<div id="disqus_thread"></div>
<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
/*
var disqus_config = function () {
this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
*/
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://squattertattoo.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
</section>
<section class="tarja-blog-post">
<div class="row">
<header class="post_ofer">
<h3>Você também vai gostar de:</h3>
</header>
<?php $prevPost = get_previous_post(true); if($prevPost) {
$args = array(
'posts_per_page' => 1,
'include' => $prevPost->ID
);
$prevPost = get_posts($args);foreach ($prevPost as $post) { $animate = "fadeInLeft";
setup_postdata($post);
$thumbnail_id = get_post_thumbnail_id($post->ID);
$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
?>
<article class="col-md-6">
	<div class="tarja-blog-meta">
		<a href="<?php echo the_permalink();?>" class="image" title="<?php the_title();?>">
		<img src="<?php the_post_thumbnail_url( 'large' ); ?>" alt="<?php echo"$alt";?> ">
		</a>
		<div class="title">
		<h2 class="entry-title">
		<a href="<?php echo the_permalink();?>" class="image" title="<?php the_title();?>"><?php the_title();?></h2></a>
		<div class="date">
			<?php
			echo '<span class="day">' . esc_html( get_the_date( 'd' ) ) . '</span>';
			echo '<span class="month">' . esc_html( get_the_date( 'M' ) ) . '</span>';
			?>
		</div>
		</div>
		<p><?php echo the_excerpt();?></p>

	</div>

</article>
<?php
wp_reset_postdata();} }
$nextPost = get_next_post(true);
if($nextPost) {
$args = array(
'posts_per_page' => 1,
'include' => $nextPost->ID
);
$nextPost = get_posts($args);
foreach ($nextPost as $post) {
setup_postdata($post);
$thumbnail_id = get_post_thumbnail_id($post->ID);
$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
?>

<article class="col-md-6">
	<div class="tarja-blog-meta">
		<a href="<?php echo the_permalink();?>" class="image" title="<?php the_title();?>">
		<img src="<?php the_post_thumbnail_url( 'large' ); ?>" alt="<?php echo"$alt";?> ">
		</a>
		<h2 class="entry-title">

		<a href="<?php echo the_permalink();?>" class="image" title="<?php the_title();?>"><?php the_title();?></a></h2>
		<div class="date">
			<?php
			echo '<span class="day">' . esc_html( get_the_date( 'd' ) ) . '</span>';
			echo '<span class="month">' . esc_html( get_the_date( 'M' ) ) . '</span>';
			?>
		</div>
		<p><?php echo the_excerpt();?></p>
	</div>
</article>
<?php
wp_reset_postdata();
}}
?>
</div>
</section>
</main><!-- #main -->
</div><!-- #primary -->
</div>
</div>
<?php
get_footer();
