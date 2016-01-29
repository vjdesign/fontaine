<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php
	/**
	 * woocommerce_before_single_product hook
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>

<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
		/**
		 * woocommerce_before_single_product_summary hook
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		do_action( 'woocommerce_before_single_product_summary' );
	?>

	<h1><?php the_title(); ?></h1>
	<?php
		global $product;
		echo "<div id='m_md_pr'>";
		echo "<div class='modelno'>Model Number: " . $product->get_sku() . "</div><br/>";
		echo "<div class='sprice'>Price ". $product->get_price_html() . " inc GST</div>";
		echo "</div>";
	?>
	<?php wc_get_template( 'single-product/tabs/description.php' ); ?>



	<div class="summary entry-summary">

		<?php
			/**
			 * woocommerce_single_product_summary hook
			 *
			 * @hooked woocommerce_template_single_title - 5
			 * @hooked woocommerce_template_single_rating - 10
			 * @hooked woocommerce_template_single_price - 10
			 * @hooked woocommerce_template_single_excerpt - 20
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 * @hooked woocommerce_template_single_meta - 40
			 * @hooked woocommerce_template_single_sharing - 50
			 */
			//do_action( 'woocommerce_single_product_summary' );
		?>

	</div><!-- .summary -->

	<?php
		/**
		 * woocommerce_after_single_product_summary hook
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */
		 // Remove the WooCommerce Upsell and related products hooks
		 remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
		 remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

		do_action( 'woocommerce_after_single_product_summary' );
		if (function_exists('wc_display_stock_status')){
			echo wc_display_stock_status();
		}
		woocommerce_template_single_add_to_cart();

	?>

	<?php  ?>

	<meta itemprop="url" content="<?php the_permalink(); ?>" />

</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>
<script type="text/javascript">
	$(document).ready(function(){
		$('.a3-dgallery .a3dg-image-wrapper').css('max-width',"300px");
		$('.a3dg-thumbs').css('max-width',"300px");
	});
</script>
