<?php
/**
 * Single Product tabs
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

// Get tabs
ob_start();
global $woocommerce, $post, $product;
do_action('woocommerce_product_tabs');

$tabs = trim( ob_get_clean() );

if ( ! empty( $tabs ) ) : ?>
	<div class="woocommerce_tabs">
		<ul class="tabs">
			<?php echo $tabs; ?>
		</ul>
		<?php do_action('woocommerce_product_tab_panels'); ?>
	</div>
	<div id="woocommerce_tab_attributes">
	<?php $heading = apply_filters('woocommerce_product_additional_information_heading', __('Additional Information', 'woocommerce')); ?>

		<h2><?php echo $heading; ?></h2>

	<?php $product->list_attributes(); ?>
	</div>
<?php endif; ?>