<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

global $product;

// Ensure visibilty
if ( ! $product->is_visible() )
	return;
?>
<li>
	<a href="<?php the_permalink(); ?>">

		<?php the_title(); ?>
	</a>
</li>
