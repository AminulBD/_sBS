<?php
/**
 * @package _sBS
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">

		<?php _sbs_post_thumbnail(); ?>

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">
			<?php _sbs_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', PROJECT_TEXT_DOMAIN ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php
		if ( is_single() && get_the_author_meta( 'description' ) ) :
			get_template_part( 'author-bio' );
		endif;
	?>

	<footer class="entry-footer">
		<?php _sbs_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
