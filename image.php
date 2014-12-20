<?php
/**
 * The template for displaying image attachments
 *
 * @package _sBS
 */

get_header(); ?>
<div class="row">
	<div class="col-md-8">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'image' ); ?>

				<?php _sbs_post_nav(); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				// End the loop.
				endwhile;
			?>

			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- /.col-md-8 -->

<?php get_footer(); ?>
