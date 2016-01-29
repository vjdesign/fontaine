<?php
/**
 * The sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<?php if ( is_active_sidebar( 'sidebar-wc' )  ) : ?>
	<div id="secondary-wc" class="sidebar widget-area" role="complementary">
		<?php dynamic_sidebar( 'sidebar-wc' ); ?>
	</div><!-- .sidebar .widget-area -->
<?php endif; ?>
