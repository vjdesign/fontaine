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

global $product, $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) )
	$woocommerce_loop['loop'] = 0;

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) )
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 3 );

// Ensure visibilty
if ( ! $product->is_visible() )
	return;

?>
<?php 
if ( $product->is_in_stock() )
{
	// Increase loop count
$woocommerce_loop['loop']++;
?>
<li class="product <?php
	if ( $woocommerce_loop['loop'] % $woocommerce_loop['columns'] == 0 )
		echo 'last';
	elseif ( ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] == 0 )
		echo 'first';

	if ($woocommerce_loop['loop']%2==0) 
	{
		echo " pdeven";
	}
	else
	{
		echo " pdodd";
	}

	?>">

	<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
	
	<div class="list_details">
		<a href="<?php the_permalink(); ?>">
		<?php
			/**
			 * woocommerce_before_shop_loop_item_title hook
			 *
			 * @hooked woocommerce_show_product_loop_sale_flash - 10
			 * @hooked woocommerce_template_loop_product_thumbnail - 10
			 */
			do_action( 'woocommerce_before_shop_loop_item_title' );
		?>
		<h3 class="middle"><?php the_title(); ?></h3>
		</a>
 	</div>		
		<div class="lprice">
		<?php
			/**
			 * woocommerce_after_shop_loop_item_title hook
			 *
			 * @hooked woocommerce_template_loop_price - 10
			 */
			do_action( 'woocommerce_after_shop_loop_item_title' );
		?>
		</div>
		<?php 
				if($product->product_type=="variable")
				{
					echo "<div style='height:37px;padding-top:10px;'>";
					$link 	= apply_filters( 'variable_add_to_cart_url', get_permalink( $product->id ) );
					$label 	= apply_filters( 'variable_add_to_cart_text', __('Select options', 'woocommerce') );
					printf('<a href="%s" rel="nofollow" data-product_id="%s" class="add_to_cart_button button product_type_%s">%s</a>', $link, $product->id, $product->product_type, $label);
					echo "</div>";
				}
				else
				{
					if($_SESSION['BigPostDB']=="on")
					{
						echo "<div></div>";
					}
					else
					{
						echo "<div>";
					//	echo "<a href='" . esc_url( $product->add_to_cart_url() ) . "&add2cart1=yes'> <img src='" . get_template_directory_uri() . "/images/new-cart-button-cart.jpg' width='155' height='40' alt='Add to cart' title='Add to cart' style='box-shadow:0 0 0 0'/> </a>";
						echo "</div>";
					}
				}
			?>
	<div class="greybar">
	<a href="<?php the_permalink(); ?>">
		find out more &#187;
	</a>
	</div>
</li>
<?php } ?>
