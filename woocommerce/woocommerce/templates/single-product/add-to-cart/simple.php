<?php
/**
 * Simple product add to cart
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

global $woocommerce, $product;

if ( ! $product->is_purchasable() ) return;
?>

<?php
	// Availability
	$availability = $product->get_availability();

	if ($availability['availability']) :
		$avail1 =  apply_filters( 'woocommerce_stock_html', $availability['availability'], $availability['availability'] );
    endif;

	$avail = "no";
?>

<?php if ( $product->is_in_stock() ) : ?>

	<?php do_action('woocommerce_before_add_to_cart_form'); 
		
		if($avail1=="")
		{
			$avail1 = "In Stock";
		}

		$avail = "yes";
	?>

<?php
if(get_post_meta(get_the_ID(), 'pickuponly', true ))
{
?>
	<form name="addtocart" action="<?php echo esc_url( $product->add_to_cart_url() ); ?>" class="cart" method="post" enctype='multipart/form-data' onsubmit="return validatepickup()">
<?php }
else
{
?>
	<form name="addtocart" action="<?php echo esc_url( $product->add_to_cart_url() ); ?>" class="cart" method="post" enctype='multipart/form-data' onsubmit="return validate()">
<?php
}
?>

	 	<?php do_action('woocommerce_before_add_to_cart_button'); ?>
		<input type='hidden' id="hdsatl" name="hdsatl" value='no' />
		<input type='hidden' id="pdsku" name="pdsku" value="<?php echo $product->get_sku(); ?>" />
	<div class="clear"></div>
			
	<div id="cart_content1">
		
		<div class="available_header"><b>availability:</b> <?php echo $avail1; ?></div>
		<div id="innercart_contents">
			<?php 
						
						if(get_post_meta(get_the_ID(), 'pickuponly', true ))
						{
							$pickuponly="disabled";
							//echo "This product is only for pickup<br/>"; 
							echo "<input type='hidden' name=pickuponly value='yes' />";
						}
						else
						{
							echo "<input type='hidden' name=pickuponly value='no' />";
							$pickuponly="";
						}

						if(get_post_meta(get_the_ID(), 'fontaineshipping', true ))
						{
							//echo "This product is only for fontaine shiping calc<br/>"; 
							echo "<input type='hidden' name='fontaineshipping' value='yes' />";
						}
						else
						{
								echo "<input type='hidden' name='fontaineshipping' value='no' />";
						}

						$ictr = 0;
						if(get_post_meta( get_the_ID(), 'warehouse', true ))
						{
							$warehouse1 = get_post_meta( get_the_ID(), 'warehouse', true ); 
							global $wareh;
							$wareh = "yes";
							//echo $warehouse;
							$whouse_val = explode("~",  $warehouse1);
							//$whouse_desc = explode("~", $spl[1]);
							//echo count($whouse_val) . "<br/>";

							$ictr = count($whouse_val);
							echo "<input type=hidden name='warehouse' value='yes'>";
							$dropdown = "<select name='warehouse1' id='warehouse1' style='height:25px;padding:3px;' onchange='pickupship()' onclick='pickupship()'>";
							$dropdown2 = "<select name='warehouse2' id='warehouse2' style='display:none'>";
							global $wpdb;
							if($ictr>1)
							{
								$dropdown = $dropdown . "<option value='0' >Melbourne</option>" ;
								$dropdown2 = $dropdown2 . "<option value='MELBMETRO' >8-10 Conquest Way, Hallam, Victoria 3803</option>" ;
								for($i=0;$i<$ictr;$i++)
								{
									$sql = "select * from tbl_warehouse_pickup where pickup_zone='" . $whouse_val[$i] . "'";
									$results = $wpdb->get_results($sql);

									foreach($results as $result)
									{
										$pickup_name	= $result->pickup_name;	
										$pickup_address = $result->pickup_address;
										$pickup_contact =  $result->pickup_contact;
										$pickup_landmark =  $result->pickup_landmark;
										$pickup_shipping_cost =  $result->pickup_fee;	
									}
									$wpdb->flush(); 
									//echo $whouse_val[$i] . " - " . $whouse_desc[$i] . "<br/>";
									$dropdown = $dropdown . "<option value='" . $pickup_shipping_cost . "' >" . $pickup_name . " </option>" ;
									$dropdown2 = $dropdown2 . "<option value='" . $whouse_val[$i] . "' >" . $pickup_address . " </option>" ;
								}

							}
							else
							{

								//echo $whouse_val[0] . " - " . $whouse_desc[0];
								$dropdown = $dropdown . "<option value='0' >Melbourne</option>" ;
								$dropdown2 = $dropdown2 . "<option value='MELBMETRO' >8-10 Conquest Way, Hallam, Victoria 3803</option>" ;
								$sql = "select * from tbl_warehouse_pickup where pickup_zone='" . $whouse_val[0] . "'";
								
								$results = $wpdb->get_results($sql);
								foreach($results as $result)
								{
									$pickup_name	= $result->pickup_name;	
									$pickup_address = $result->pickup_address;
									$pickup_contact =  $result->pickup_contact;
									$pickup_landmark =  $result->pickup_landmark;
									$pickup_shipping_cost =  $result->pickup_fee;	
								}
								$dropdown = $dropdown . "<option value='" . $pickup_shipping_cost . "' >" . $pickup_name . " </option>" ;
								$dropdown2 = $dropdown2 . "<option value='" . $whouse_val[$i] . "' >" . $pickup_address . " </option>" ;
							}
							$dropdown = $dropdown . "</select>";
							$dropdown2 = $dropdown2 . "</select>";
						}
						else
						{
							echo "<input type=hidden name='warehouse' value='no'>";
						}
			
			?>
			<div class="cart_qty hline1">
				<div class="qty_text">quantity</div>
				<div class="qty_number">
				<?php
					if ( ! $product->is_sold_individually() )
						woocommerce_quantity_input( array( 'min_value' => 1, 'max_value' => $product->backorders_allowed() ? '' : $product->get_stock_quantity() ) );
				?>
				</div>
				
				<div class="delivery_options">
					<span class="ProductDescriptionSpecs">pick up</span>
					<?php
						if(isset($_SESSION['pcode']))
						{
								if($_SESSION['pickUp']=="on")
								{
							?>
								<input type="checkbox" name="pickUp" checked onclick="chk1()" title="Pickup from 8-10 Conquest Way, Hallam, Victoria 3803 (free of charge)" />
								&nbsp;
								delivery <input type="checkbox" onclick="chk2()" disabled name="Delivery" title="Delivery direct to your door" />
									<?php
									if(get_post_meta( get_the_ID(), 'bigpost', true ))
									{	?>	
									&nbsp;
									depot delivery <input type="checkbox" name="bigpostdp" disabled onclick="chk3()" title="Delivery sent to your closest depot, eliminates the cost of home delivery" />
									<?php 
									} 

								}
								if($_SESSION['Delivery']=="on")
								{
							?>
								<input type="checkbox" name="pickUp" disabled onclick="chk1()" title="Pickup from 8-10 Conquest Way, Hallam, Victoria 3803 (free of charge)" />
								&nbsp;

								<?php 
									if($pickuponly=="")
									{
								?>
									delivery <input type="checkbox" name="Delivery" <?php echo $pickuponly; ?> onclick="chk2()" checked title="Delivery direct to your door" />
										<?php
										if(get_post_meta( get_the_ID(), 'bigpost', true ))
										{	?>	
										&nbsp;
										depot delivery <input type="checkbox" name="bigpostdp" disabled onclick="chk3()" title="Delivery sent to your closest depot, eliminates the cost of home delivery" />
										<?php 
										} 

									} 

								}
								if($_SESSION['BigPostDB']=="on")
								{
							?>
								<input type="checkbox" name="pickUp" disabled onclick="chk1()" title="Pickup from 8-10 Conquest Way, Hallam, Victoria 3803 (free of charge)" />
								&nbsp;
								<?php 
									if($pickuponly=="")
									{
								?>
									delivery <input type="checkbox" name="Delivery" onclick="chk2()" disabled  title="Delivery direct to your door" />
									&nbsp;
									depot delivery <input type="checkbox" name="bigpostdp" <?php echo $pickuponly; ?> onclick="chk3()" checked title="Delivery sent to your closest depot, eliminates the cost of home delivery" />

					<?php			}
						
								}
						}
						else
						{
						?>
								<input type="checkbox" name="pickUp" onclick="chk1()" title="Pickup from 8-10 Conquest Way, Hallam, Victoria 3803 (free of charge)" />
								&nbsp;
								<?php 
									if($pickuponly=="")
									{
								?>
										delivery <input type="checkbox" <?php echo $pickuponly; ?> name="Delivery" onclick="chk2()" title="Delivery direct to your door" />
										<?php
										if(get_post_meta( get_the_ID(), 'bigpost', true ))
										{	?>	
											&nbsp;
											depot delivery <input type="checkbox" name="bigpostdp" <?php echo $pickuponly; ?> onclick="chk3()" title="Delivery sent to your closest depot, eliminates the cost of home delivery" />
								<?php 
										}
									} 
						}	?>
						
				</div>


			</div>
			<?php
			if($ictr>0)
			{
//				
			?>
			<div class="warehouse_1 hline1" id="whouse1" style="display:none;">
				<div class="pickup_text">pick up options</div>
				<div class="pickup_options">
			<?php
				echo $dropdown;
				echo $dropdown2;
			?>
				</div>
			</div>
			<?php
			}
			?>
			
		
			<?php do_action('woocommerce_after_add_to_cart_button'); ?>

			<?php 
				if($pickuponly=="")
				{
					woocommerce_shipping_calculator(); 
				}
			?>

		 	<div id="add2cart">
				<?php
				if(get_post_meta(get_the_ID(), 'pickuponly', true ))
					{
				?>
					<button type="submit" class="single_add_to_cart_button button alt1"><?php echo apply_filters('single_add_to_cart_text', __('', 'woocommerce'), $product->product_type); ?></button>
			<?php }
				  else
				  {
			?>
					<button type="submit" class="single_add_to_cart_button button alt"><?php echo apply_filters('single_add_to_cart_text', __('', 'woocommerce'), $product->product_type); ?></button>

			<?php } ?>
			</div>

		</div>

	</div>

	</form>

	<?php do_action('woocommerce_after_add_to_cart_form'); ?>

	
<?php endif; ?>

<?php if ($avail=="no") : ?>
<!--
<div class="clear"></div>
	<div id="cart_content2">
		
		<div class="available_header"><b>availability: Out of Stock</b></div>
			<br/><br/>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Request your quantity today, we will confirm ASAP</b>

		</div>

		
	</div>
-->
	<div class="clear"></div>
	<div id="cart_content1"  style="min-height:150px;">
		<div class="available_header"><b>availability: Out of Stock</b></div>
		<div id="innercart_contents" class="noproduct">
			<div class="cart_qty hline1" style="text-align:center;height:auto;padding-top:10px;padding-bottom:15px;">
				Sorry, this item is currently out of stock.
			</div>
			<div class="cart_qty" style="text-align:center;padding-top:10px;padding-bottom:5px;text-decoration:none;">
				 <div class='contact-form'><a href='javascript:void(0);contact.show();' class='contact wpi-button' style="text-decoration:none;padding:0;background:none;border:none;-webkit-box-shadow:none;-moz-box-shadow:none;box-shadow:none;border-radius:0;">Please email us your required quantity and we will revert back with soonest availability</a></div>
			</div>
		</div>
	</div>
<?php endif; ?>
