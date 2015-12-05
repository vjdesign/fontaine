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
?>

<?php
	/**
	 * woocommerce_before_single_product hook
	 *
	 * @hooked woocommerce_show_messages - 10
	 */
	 do_action( 'woocommerce_before_single_product' );
?>

<div itemscope itemtype="http://schema.org/Product" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div id="product_details">

		<?php
			/**
			 * woocommerce_single_product_summary hook
			 *
			 * @hooked woocommerce_template_single_title - 5
			 * @hooked woocommerce_template_single_price - 10
			 * @hooked woocommerce_template_single_excerpt - 20
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 * @hooked woocommerce_template_single_meta - 40
			 * @hooked woocommerce_template_single_sharing - 50
			 */
			do_action( 'woocommerce_single_product_summary' );

			$mvideo = get_post_meta( get_the_ID(), 'woo_video_product_tab', true );
			// check if the custom field has a value
			if( ! empty( $mvideo ) ) {
				foreach($mvideo as $key => $value)
				{
					foreach($value as $key1 => $value1)
					{
						if($key1=='video')
						{	
							//$value1 = preg_replace('/width="\d+"/','640',$value1);
							$patterns[] = '/width="([0-9]+)"/';
							$replacements[] = 'width="610"';
							$value1 = preg_replace($patterns, $replacements, $value1);
							$patterns[] = '/height="([0-9]+)"/';
							$replacements[] = 'height="340"';
							$value1 = preg_replace($patterns, $replacements, $value1);
							echo "<div id='mvideo'>" . $value1 . "</div>";
						}
					}
				}
			} 

			global $product;
			echo "<div id='m_md_pr'>";
			echo "<div class='modelno'>Model Number: " . $product->get_sku() . "</div><br/>";
			echo "<div class='sprice'>Price ". $product->get_price_html() . " inc GST</div>";
			echo "</div>";
			
			woocommerce_product_description_panel();
			
			do_action( 'woocommerce_after_single_product_summary' );
			$extra_content = explode("<!--more-->",get_field('product_extra_content'));

			if(!empty($extra_content[1])){
			echo "<article>".$extra_content[0]." <a id='show_cont'>Read More</a><div id='hidden_content'>".$extra_content[1]."</div></article>";
			}else
			{
			echo "<article>".$extra_content[0]."</article>";
			}
		?>
		<div id="mobileenquiry">
		<div class="contact-form">
            <!--<input type="button" name="contact" value="Make an enquiry for this product" class="contact wpi-button">-->
			<a href="#" class="contact wpi-button">make an enquiry for this product</a>
		</div>
		</div>
	</div><!-- .summary -->
	<div id="product_cart">
	<?php
		/**
		 * woocommerce_show_product_images hook
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		do_action( 'woocommerce_before_single_product_summary' );
		//woocommerce_simple_add_to_cart();
		woocommerce_template_single_add_to_cart();
	?>
	</div>
	<?php
		/**
		 * woocommerce_after_single_product_summary hook
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_output_related_products - 20
		 */
		
	
	?>

</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>

<style>
.ad-gallery {
    width: 100%;
	max-width:400px;
    position: relative;
}
.product_gallery .ad-image-wrapper, .product_gallery .ad-gallery .ad-image-wrapper
{
	border:none;
	border:0;
	padding-bottom:1px;
}
</style>
<script>

$( window ).load(function() {
$("#hidden_content").hide();
$('#show_cont').click(function(){
$("#hidden_content").show();
$("#show_cont").hide();
$("#show_cont1").hide();
});
});
</script>


