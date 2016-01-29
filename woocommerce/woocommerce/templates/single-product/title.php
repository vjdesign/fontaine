<?php
/**
 * Single Product title
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */
 global $post, $product;
?>
<h1 itemprop="name" class="ptitle entry-title"><?php the_title(); ?></h1>
<span class="pmodel">Model Number: 
<?php if ( $product->is_type( array( 'simple', 'variable' ) ) && get_option('woocommerce_enable_sku') == 'yes' && $product->get_sku() ) : ?>
<?php echo $product->get_sku(); ?>
<?php endif; ?>
</span>