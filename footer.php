<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package _sBS
 */
?>			<div class="row">
				<?php get_sidebar('footer') ?>
			</div><!-- /.row -->
		</div><!-- /.container -->
	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">
			<div class="site-info text-center">
				<a href="<?php echo esc_url( __( 'http://wordpress.org/', PROJECT_TEXT_DOMAIN ) ); ?>"><?php printf( __( 'Proudly powered by %s', PROJECT_TEXT_DOMAIN ), 'WordPress' ); ?></a>
				<span class="sep"> | </span>
				<?php printf( __( 'Theme: %1$s by %2$s.', PROJECT_TEXT_DOMAIN ), PROJECT_NAME, '<a href=" ' . esc_url('http://aminul.net/projects/underscoresbs') . '" rel="designer">Aminul Islam</a>' ); ?>
			</div><!-- .site-info -->
		</div><!-- /.container -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
