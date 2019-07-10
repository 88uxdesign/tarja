
</div><!-- #content -->



<div class="registers">
<div class="row">

<div class="col-md-6">

<form class="news_letter" action="#" id="news_letter_form">

	<head>
	<h3>News Letter</h3>
	<p>Registre-se e recebeba nossas promoções e lançamentos quinzenais!</p>
	</head>
<div class="row">

	<div class="col-md-6">
		<input type="text" name="name_news" placeholder="Nome" id="name_news">
	</div>
	<div class="col-md-6">
	<input type="email" name="mail_news" placeholder="E-mail" id="email_news" required>
</div>

	<button type="submit" name="button" class="fit"><span class="fa fa-send"></span></button>
</div>
<div id="msg_news">

</div>
</form>
</div>

<div class="social col-md-6" id="">
	<head>
	<h3>Siga-nos!</h3>
</head>
	<ul>
		<li><a href="https://www.instagram.com/squattertattoo.studio/" target="_blank" title="Siga a Squatter Tattoo no Instagram"><i class="fa-instagram"></i></a></li>
		<li><a href="https://www.facebook.com/squattertattoo/" target="_blank" title="Siga a Squatter Tattoo no facebook"><i class="fa-facebook-f"></i></a></li>
		<li><a href="https://www.youtube.com/channel/UCYPZaDmWH3X5mfH5CgpUXHg" target="_blank" title="Acesse nosso Canal do Youtube"><i class="fa-youtube"></i></a></li>
	</ul>

</div>

</div>

</div>

<?php get_sidebar( 'footer' ); ?>
<?php $enable_copyright = get_theme_mod( 'tarja_enable_copyright', true );?>
<?php if ( $enable_copyright ) : ?>
	<!-- Copyright -->
	<footer class="site-copyright">
		<div class="site-info ">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<?php
						if ( has_nav_menu( 'social' ) ) {

							wp_nav_menu(
								array(
									'theme_location'  => 'social',
									'container'       => 'div',
									'container_id'    => 'menu-social',
									'container_class' => 'menu pull-left',
									'menu_id'         => 'menu-social-items',
									'menu_class'      => 'menu-items',
									'depth'           => 1,
									'link_before'     => '<span class="screen-reader-text">',
									'link_after'      => '</span>',
									'fallback_cb'     => '',
								)
							);
						}
						?>

						<div class="copyright-text pull-right">
							<?php echo wp_kses_post( get_theme_mod( 'tarja_copyright_contents', sprintf( 'Copyright &copy; ' . date( 'Y' ) . ' <span class="sep">|</span> <a href="%s">Squatter Tattoo</a> <span class="sep">|</span> Developed by 88UX.', 'http://88.webux.pro' ) ) ); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- / Copyright -->
<?php endif; ?>
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
<script type="text/javascript">
(function( $ ) {
			$('#news_letter_form').validate({

					nome_n: $("#name_news").val(),
					email_n: $("#mail_news").val(),

					rules: {
							nome_n: {
									required: true,
									minlength: 2
							},
							email_n: {
									required: true,
									email: true
							}
					},
					messages: {
							nome: {
									required: 'Preencha o campo nome',
									minlength: 'No mínimo 2 letras'
							},
							email: {
									required: 'Informe o seu email',
									email: 'Ops, informe um email válido'
							}

					},
					submitHandler: function (form) {

							$('#news_letter_form').fadeTo("slow", 0.33);

							var dados = $(form).serialize();

							$.ajax({
									type: "POST",
									url: 'http://' + window.location.hostname + '/wp-content/themes/tarja/assets/php/register.php',
									data: dados,
									success: function (data) {
											$("#news_letter_form").html(data);
									}
							});

							return false;
					}
			});

	})( jQuery );
</script>
</html>
