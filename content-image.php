<?php
/**
 * @package _sBS
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<nav id="image-navigation" class="navigation image-navigation">
		<ul class="pager">
			<li class="previous"><?php previous_image_link( false, __( '<span aria-hidden="true">&larr;</span> Previous Image', PROJECT_TEXT_DOMAIN ) ); ?></li>
			<li class="next"><?php next_image_link( false, __( 'Next Image <span aria-hidden="true">&rarr;</span>', PROJECT_TEXT_DOMAIN ) ); ?></li>
		</ul>
	</nav><!-- .image-navigation -->

	<header class="entry-header">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

	</header><!-- .entry-header -->

	<div class="entry-content">
		<div class="entry-attachment">
			<?php
				/**
				 * Filter the default TuorialFor.Me image attachment size.
				 *
				 * @since 1.0.0
				 *
				 * @param string $image_size Image size. Default 'large'.
				 */
				$image_size = apply_filters( '_sbs_attachment_size', 'large' );

				echo wp_get_attachment_image( get_the_ID(), $image_size );
			?>

			<?php if ( has_excerpt() ) : ?>
				<div class="entry-caption">
					<?php the_excerpt(); ?>
				</div><!-- .entry-caption -->
			<?php endif; ?>

		</div><!-- .entry-attachment -->

		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', PROJECT_TEXT_DOMAIN ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php _sbs_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
