<?php
/**
 * Cart Page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

global $woocommerce;
?>

<?php $woocommerce->show_messages(); ?>

<form action="<?php echo esc_url( $woocommerce->cart->get_cart_url() ); ?>" method="post">
<?php do_action( 'woocommerce_before_cart_table' ); ?>
<table class="shop_table cart" cellspacing="0">
	<thead>
		<tr>
			<th class="product-remove">Action</th>
			<th class="product-thumbnail">Image</th>
			<th class="product-name"><?php _e('Product', 'woocommerce'); ?></th>
			<th class="product-price"><?php _e('Price', 'woocommerce'); ?></th>
			<th class="product-quantity"><?php _e('Quantity', 'woocommerce'); ?></th>
			<th class="product-quantity">Shipping</th>
			<th class="product-subtotal"><?php _e('Total', 'woocommerce'); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php do_action( 'woocommerce_before_cart_contents' ); ?>

		<?php
		//echo $_SESSION['ship_bigdp'] . "--" . $_SESSION['BigPostDB_shipname'] . "--" . $_SESSION['pid1'];
		//echo $_SESSION['Delivery'] . " &nbsp;&nbsp;" . $_SESSION['BigPostDB'];
		 $_SESSION['sval'] = 0;
		 $i = 0;
		if ( sizeof( $woocommerce->cart->get_cart() ) > 0 ) {
			foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $values ) {
				$_product = $values['data'];
				//$_product->sku;
				//$_product->_sku();
				//print_r($_product);
				if ( $_product->exists() && $values['quantity'] > 0 ) {
					?>
					<tr class = "<?php echo esc_attr( apply_filters('woocommerce_cart_table_item_class', 'cart_table_item', $values, $cart_item_key ) ); ?>">
						<!-- Remove from cart link -->
						<td class="product-remove">
							<?php
								if($_SESSION['pickUp']=="on")
								{
									$exp1 = explode("~", $_SESSION['pickup_ship']);
									$j = 0; 
									$k =0;
									foreach($exp1 as $key) 
									{
										if($j!=$i)
										{
											if($k==0)
											{	
												$new_pickup_ship = $key;
											}
											else
											{
												$new_pickup_ship = $new_pickup_ship . "~" . $key;
											}
											$k++;
										}
										if($j==$i)
										{
											$rval = $key * $values['quantity'];
										}
										$j++;
									}

									$exp2 = explode("~", $_SESSION['pickup_shipname']);
									$j = 0; 
									$k =0;
									foreach($exp2 as $key1) 
									{
										if($j!=$i)
										{
											if($k==0)
											{	
												$new_pickup_shipname = $key1;
											}
											else
											{
												$new_pickup_shipname = $new_pickup_shipname . "~" . $key1;
											}
											$k++;
										}
										$j++;
									}

									echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf('<a href="%s' . '&pickup_ship=' . $new_pickup_ship . '&rval=' . $rval . '&new_pickup_shipname=' . $new_pickup_shipname . '" class="remove" title="%s">&times;</a>', esc_url( $woocommerce->cart->get_remove_url( $cart_item_key ) ), __('Remove this item', 'woocommerce') ), $cart_item_key );
								}
								/*if($_SESSION['Delivery']=="on")
								{
									$exp2 = explode("~", $_SESSION['delivery_warehouse']);
									$j = 0; 
									$k =0;
									foreach($exp2 as $key1) 
									{
										if($j!=$i)
										{
											if($k==0)
											{	
												$delivery_shipname = $key1;
											}
											else
											{
												$delivery_shipname = $delivery_shipname . "~" . $key1;
											}
											$k++;
										}
										$j++;
									}

									echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf('<a href="%s' . '&delivery_shipname=' . $delivery_shipname . '" class="remove" title="%s">&times;</a>', esc_url( $woocommerce->cart->get_remove_url( $cart_item_key ) ), __('Remove this item', 'woocommerce') ), $cart_item_key );
								}*/


								if($_SESSION['Delivery']=="on")
								{
									$exp1 = explode("~", $_SESSION['ship_delivery']);
									$j = 0; 
									$k =0;
									foreach($exp1 as $key) 
									{
										if($j!=$i)
										{
											if($k==0)
											{	
												$new_pickup_ship = $key;
											}
											else
											{
												$new_pickup_ship = $new_pickup_ship . "~" . $key;
											}
											$k++;
										}
										if($j==$i)
										{
											$rval = $key * $values['quantity'];
										}
										$j++;
									}

									$exp2 = explode("~", $_SESSION['delivery_warehouse']);
									$j = 0; 
									$k =0;
									foreach($exp2 as $key1) 
									{
										if($j!=$i)
										{
											if($k==0)
											{	
												$new_pickup_shipname = $key1;
											}
											else
											{
												$new_pickup_shipname = $new_pickup_shipname . "~" . $key1;
											}
											$k++;
										}
										$j++;
									}

									echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf('<a href="%s' . '&pickup_ship=' . $new_pickup_ship . '&rval=' . $rval . '&new_pickup_shipname=' . $new_pickup_shipname . '" class="remove" title="%s">&times;</a>', esc_url( $woocommerce->cart->get_remove_url( $cart_item_key ) ), __('Remove this item', 'woocommerce') ), $cart_item_key );
								}

								if($_SESSION['BigPostDB']=="on")
								{
									$exp1 = explode("~", $_SESSION['ship_bigdp']);
									$j = 0; 
									$k =0;
									foreach($exp1 as $key) 
									{
										if($j!=$i)
										{
											if($k==0)
											{	
												$new_pickup_ship = $key;
											}
											else
											{
												$new_pickup_ship = $new_pickup_ship . "~" . $key;
											}
											$k++;
										}
										if($j==$i)
										{
											$rval = $key * $values['quantity'];
										}
										$j++;
									}

									$exp2 = explode("~", $_SESSION['BigPostDB_shipname']);
									$j = 0; 
									$k =0;
									foreach($exp2 as $key1) 
									{
										if($j!=$i)
										{
											if($k==0)
											{	
												$new_pickup_shipname = $key1;
											}
											else
											{
												$new_pickup_shipname = $new_pickup_shipname . "~" . $key1;
											}
											$k++;
										}
										$j++;
									}

									echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf('<a href="%s' . '&pickup_ship=' . $new_pickup_ship . '&rval=' . $rval . '&new_pickup_shipname=' . $new_pickup_shipname . '" class="remove" title="%s">&times;</a>', esc_url( $woocommerce->cart->get_remove_url( $cart_item_key ) ), __('Remove this item', 'woocommerce') ), $cart_item_key );
								}
							?>
						</td>

						<!-- The thumbnail -->
						<td class="product-thumbnail">
							<?php
								$thumbnail = apply_filters( 'woocommerce_in_cart_product_thumbnail', $_product->get_image(), $values, $cart_item_key );
								printf('<a href="%s">%s</a>', esc_url( get_permalink( apply_filters('woocommerce_in_cart_product_id', $values['product_id'] ) ) ), $thumbnail );
							?>
						</td>
						
						<!-- Product Name -->
						<td class="product-name">
							<?php
								if ( ! $_product->is_visible() || ( $_product instanceof WC_Product_Variation && ! $_product->parent_is_visible() ) )
									echo apply_filters( 'woocommerce_in_cart_product_title', $_product->get_title(), $values, $cart_item_key );
								else
									printf('<a href="%s">%s</a>', esc_url( get_permalink( apply_filters('woocommerce_in_cart_product_id', $values['product_id'] ) ) ), apply_filters('woocommerce_in_cart_product_title', $_product->get_title(), $values, $cart_item_key ) );

								// Meta data
								echo $woocommerce->cart->get_item_data( $values );

                   				// Backorder notification
                   				if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $values['quantity'] ) )
                   					echo '<p class="backorder_notification">' . __('Available on backorder', 'woocommerce') . '</p>';

							//	echo $_SESSION['pickup_shipname'];
							?>
						</td>

						<!-- Product price -->
						<td class="product-price">
							<?php
								$product_price = get_option('woocommerce_display_cart_prices_excluding_tax') == 'yes' || $woocommerce->customer->is_vat_exempt() ? $_product->get_price_excluding_tax() : $_product->get_price();

								echo apply_filters('woocommerce_cart_item_price_html', woocommerce_price( $product_price ), $values, $cart_item_key );
							?>
						</td>

						<!-- Quantity inputs -->
						<td class="product-quantity">
							<?php
								if ( $_product->is_sold_individually() ) {
									$product_quantity = '1';
								} else {
									$data_min = apply_filters( 'woocommerce_cart_item_data_min', '', $_product );
									$data_max = ( $_product->backorders_allowed() ) ? '' : $_product->get_stock_quantity();
									$data_max = apply_filters( 'woocommerce_cart_item_data_max', $data_max, $_product );

									$product_quantity = sprintf( '<div class="quantity"><input name="cart[%s][qty]" data-min="%s" data-max="%s" value="%s" size="4" title="Qty" class="input-text qty text" maxlength="12" /></div>', $cart_item_key, $data_min, $data_max, esc_attr( $values['quantity'] ) );
								}
								//$qty1 = apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key );
								echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key );
							?>
						</td>

						<!-- Product Shipping -->
						<td class="product-subtotal">
							<?php
								/*
								if($_SESSION['Delivery']=="on")
								{
									if(get_post_meta($_product->id,'warehouse',true)==true)
									{
										$val1 = cal_freight($_product->get_sku(),$values['quantity'],"yes");
									}
									if(get_post_meta($_product->id,'warehouse',true)==false)
									{
										$val1 = cal_freight($_product->get_sku(),$values['quantity'],"no");
									}
						
									echo "$" . $val1;

									$_SESSION['sval'] = $_SESSION['sval'] + $val1;
								}*/

								if($_SESSION['Delivery']=="on")
								{
									if (strpos($_SESSION['ship_delivery'],'~') == true) 
									{
										$pickup_ship = explode("~", $_SESSION['ship_delivery']);
										$pickup_ship[$i] = $values['quantity'] * $pickup_ship[$i];
										echo "$" . $pickup_ship[$i];
										$_SESSION['sval'] = $_SESSION['sval'] + $pickup_ship[$i];
										$i++;
									}
									else
									{
										echo "$" . ($_SESSION['ship_delivery'] * $values['quantity']);
										$_SESSION['sval'] = $_SESSION['sval'] + ($_SESSION['ship_delivery'] * $values['quantity']);
									}

									
								}
						
								if($_SESSION['pickUp']=="on")
								{
									if (strpos($_SESSION['pickup_ship'],'~') == true) 
									{
										$pickup_ship = explode("~", $_SESSION['pickup_ship']);
										$pickup_ship[$i] = $values['quantity'] * $pickup_ship[$i];
										echo "$" . $pickup_ship[$i];
										$_SESSION['sval'] = $_SESSION['sval'] + $pickup_ship[$i];
										$i++;
									}
									else
									{
										echo "$" . ($_SESSION['pickup_ship'] * $values['quantity']);
										$_SESSION['sval'] = $_SESSION['sval'] + ($_SESSION['pickup_ship'] * $values['quantity']);
									}
									
								}

								if($_SESSION['BigPostDB']=="on")
								{
									if (strpos($_SESSION['ship_bigdp'],'~') == true) 
									{
										$pickup_ship = explode("~", $_SESSION['ship_bigdp']);
										$pickup_ship[$i] = $values['quantity'] * $pickup_ship[$i];
										echo "$" . $pickup_ship[$i];
										$_SESSION['sval'] = $_SESSION['sval'] + $pickup_ship[$i];
										$i++;
									}
									else
									{
										echo "$" . ($_SESSION['ship_bigdp'] * $values['quantity']);
										$_SESSION['sval'] = $_SESSION['sval'] + ($_SESSION['ship_bigdp'] * $values['quantity']);
									}
									
								}
							
							?>
						</td>

						<!-- Product subtotal -->
						<td class="product-subtotal">
							<?php
								echo apply_filters( 'woocommerce_cart_item_subtotal', $woocommerce->cart->get_product_subtotal( $_product, $values['quantity'] ), $values, $cart_item_key );
							?>
						</td>
					</tr>
					<?php
				}
			}
		}

		do_action( 'woocommerce_cart_contents' );
		?>
		<tr>
			<td colspan="7" class="actions">

				<?php if ( get_option( 'woocommerce_enable_coupons' ) == 'yes' && get_option( 'woocommerce_enable_coupon_form_on_cart' ) == 'yes') { ?>
					<div class="coupon">

						<label for="coupon_code"><?php _e('Coupon', 'woocommerce'); ?>:</label> <input name="coupon_code" class="input-text" id="coupon_code" value="" /> <input type="submit" class="button" name="apply_coupon" value="<?php _e('Apply Promotional Code', 'woocommerce'); ?>" />

						<?php do_action('woocommerce_cart_coupon'); ?>

					</div>
				<?php } 

				if($_SESSION['BigPostDB']=="on")
				{
				?>
				<a class="button" href="<?php echo $woocommerce->cart->get_cart_url(); ?>?empty-cart"  style="padding-top:7px;padding-bottom:8px;" ><?php _e( 'Empty Cart', 'woocommerce' ); ?></a>&nbsp;
				<?php } ?>
				<input type="submit" class="button" name="update_cart" value="<?php _e('Update Cart', 'woocommerce'); ?>" /> <input type="submit" class="checkout-button button alt" name="proceed" value="<?php _e('Proceed to Checkout &rarr;', 'woocommerce'); ?>" />

				<?php do_action('woocommerce_proceed_to_checkout'); ?>

				<?php $woocommerce->nonce_field('cart') ?>
			</td>
		</tr>

		<?php do_action( 'woocommerce_after_cart_contents' ); ?>
	</tbody>
</table>
<?php do_action( 'woocommerce_after_cart_table' ); ?>
</form>
<div class="cart-collaterals">



	<?php woocommerce_cart_totals(); ?>


</div>

<?php do_action('woocommerce_cart_collaterals'); ?>
<?php


function cal_freight($pd_id, $qty, $whouse)
{

	$pcode = $_SESSION['pcode'];

	$t_ship = 0;
	$zone = "";
	$cubic_kg = "";
	$FScolumn = "";
	$rate1 = "";
	$rate2 = "";
	$rate3 = "";
	$fuel = "";
	$gst = "";
	$buffer = "";


	//echo "<script>alert('" . $qty . "');</script>";


	global $wpdb;
	$sql="select * from tbl_postcode1 where postcode='" .  $pcode . "'";

	$results = $wpdb->get_results($sql);

	foreach($results as $result)
	{
		$zone = $result->zone;
	}

	$wpdb->flush(); 


	
	if((count($results))<1)
	{
		exit();
	}

	
	$sql = "";
	$sql = "select * from tbl_product1 where product_id='" . $pd_id . "'";
	$results = $wpdb->get_results($sql);

	foreach($results as $result)
	{
		$cubic_kg = $result->cubic_kg;
		$fixship =  $result->fixshipping;
		$fixship_price =  $result->fixshipping_price;
	}
	$wpdb->flush(); 

	if(strtolower($fixship)=="yes")
	{
		$t_ship = $fixship_price * $qty;
		return $t_ship;
		exit();
	}

	$sql = "";
	$sql = "select * from tbl_algorithm";
	$results = $wpdb->get_results($sql);

	foreach($results as $result)
	{
		$basic = $result->basic;
		$fuel = $result->fuel;
		$gst = $result->gst;
		$buffer = $result->buffer;
	}


	$wpdb->flush(); 

	if($whouse=="yes")
	{
		$sql="select * from tbl_cubic_kg_rates_warehouse where zone='" . $zone . "'";
		$results = $wpdb->get_results($sql);

		if((count($results))<1)
		{
			$sql="select * from tbl_cubic_kg_rates where zone='" . $zone . "'";
			$results = $wpdb->get_results($sql);
		}

	}
	
	if($whouse=="no")
	{
		$sql="select * from tbl_cubic_kg_rates where zone='" . $zone . "'";
		$results = $wpdb->get_results($sql);
	}

	

	foreach($results as $result)
	{
		$rate1 = $result->rate1;
		$rate2 = $result->rate2;
		$rate3 = $result->rate3;
	}

	
	$wpdb->flush(); 
	

	if($cubic_kg<=500)
	{
		$t_ship = ($cubic_kg * $rate1);
		$t_ship = round($t_ship, 2);

		//$t_ship = $t_ship * $qty;

		//echo $t_ship . "<br/><br/>";
	}

	if($cubic_kg>500 && $cubic_kg<=1000)
	{
		$t_ship = ($cubic_kg * $rate2);
		$t_ship = round($t_ship, 2);

		//$t_ship = $t_ship * $qty;

		//echo $t_ship . "<br/><br/>";
	}

	if($cubic_kg>1000)
	{
		$t_ship = ($cubic_kg * $rate3);
		$t_ship = round($t_ship, 2);

		//$t_ship = $t_ship * $qty;
		//echo $t_ship . "<br/><br/>";
	}

	$t_ship = $t_ship + $basic;

	//echo $t_ship . "   buffer   ";

	$fuel = $t_ship * ($fuel / 100);

	//echo $fuel . "<br/><br/>";
	$gst = ($t_ship + $fuel) * ($gst / 100);
	//echo $gst . " - gssst   ";

	$buffer = ($t_ship + $fuel + $gst) * ($buffer / 100);
	//echo $buffer . "<br/><br/>";

	$fuel = round($fuel, 2);
	$gst = round($gst, 2);
	$buffer = round($buffer, 2);


	$t_ship = $t_ship + $fuel + $gst + $buffer;

	$t_ship = $t_ship * $qty;

	return $t_ship;
}
?>