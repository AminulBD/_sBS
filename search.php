<?php
/**
 * The template for displaying search results pages.
 *
 * @package _sBS
 */

get_header(); ?>
<div class="row">
	<div class="col-md-8">
		<section id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title"><?php printf( __( 'Search Results for: %s', _SBS_TEXT_DOMAIN ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				</header><!-- .page-header -->

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
					/**
					 * Run the loop for the search to output the results.
					 * If you want to overload this in a child theme then include a file
					 * called content-search.php and that will be used instead.
					 */
					get_template_part( 'content', 'search' );
					?>

				<?php endwhile; ?>

				<?php _sbs_paging_nav(); ?>

			<?php else : ?>

				<?php get_template_part( 'content', 'none' ); ?>

			<?php endif; ?>

			</main><!-- #main -->
		</section><!-- #primary -->
	</div><!-- /.col-md-8 -->
	<div class="col-md-4">
		<?php get_sidebar(); ?>
	</div><!-- /.col-md-4 -->
</div><!-- /.row -->
<?php get_footer(); ?>
