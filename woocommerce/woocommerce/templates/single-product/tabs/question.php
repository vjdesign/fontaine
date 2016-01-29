<?php
/**
 * Description tab
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

global $woocommerce, $post;

if ( $post->post_content ) : ?>
	<div class="panel entry-content" id="tab-description">

		<?php $heading = apply_filters('woocommerce_product_description_heading', __('Product Description', 'woocommerce')); ?>

		<!--<h2><?php echo $heading; ?></h2>-->

		<div class="contact-form" style="padding-top:5px;">
            <!--<input type="button" name="contact" value="Make an enquiry for this product" class="contact wpi-button">-->
			<a href="#" class="contact wpi-button">make an enquiry for this product</a>
		</div>

	</div>
<?php endif; ?>