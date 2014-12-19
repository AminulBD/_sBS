<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package _sBS
 */

if ( ! is_active_sidebar( 'sidebar-2' ) ) {
	return;
}
?>

<div id="footer-widget-area" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebar-2' ); ?>
</div><!-- #footer-widget-area -->
