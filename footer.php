<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package marconte
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info col-sm-4">
			<div class="row align-items-center">
				<div class="col-2 footer-logo">
					<img src="<?= get_template_directory_uri(); ?>/img/marconte_logo5.svg" alt="marconte">
				</div>
				<div class="col-10 footer-text">
					<span>Thème Wordpress crée par <a href="#">Mathilde Arconte</a></span>
					<span class="sep"> | </span>
					<a href="#">Mentions Légales</a>
				</div>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>

</body>
</html>
