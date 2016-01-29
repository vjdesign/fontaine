<?php
/**
 * Email Addresses
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates/Emails
 * @version     1.6.4
 */
$shipinfo = $order->get_shipping_method();
?><table cellspacing="0" cellpadding="0" style="width: 100%; vertical-align: top;" border="0">

	<tr>

		<td valign="top" width="50%">

			<h3><?php _e('Billing address', 'woocommerce'); ?></h3>

			<p><?php echo $order->get_formatted_billing_address(); ?></p>

		</td>

		<?php if ( get_option( 'woocommerce_ship_to_billing_address_only' ) == 'no' ) : ?>

		<td valign="top" width="50%">
			<?php
			//if($_SESSION['pickUp']!="on")
			if($shipinfo=="Local Delivery")
			{
			?>
				<h3><?php _e('Shipping address', 'woocommerce'); ?></h3>

				<p><?php echo $order->get_formatted_shipping_address(); ?></p>

			<?php } ?>

			<?php
			//if($_SESSION['pickUp']=="on")
			if($shipinfo=="Local Pickup")
			{
			?>
				<h3><?php _e('Pick Up address', 'woocommerce'); ?></h3>

				<p>
				8-10 Conquest Way,<br/>
				Hallam VIC 3803,<br/>
				Australia<br/><br/>
				Please await your pick up confirmation prior to collecting order.
	
				</p>

			<?php } 
			/// $_SESSION['BigPostDB']
			if($shipinfo=="Depot Pickup")
			{
			?>
				<h3><?php _e('Depot Address', 'woocommerce'); ?></h3>

				<p>
				<?php 
					
					//echo $_SESSION['BigPost_address']; 

				//	echo $order->get_formatted_shipping_address();
				     $add1 =  $order->customer_note;
					 $arr1 = explode("Pickup From",$add1);
					 echo "Pickup From" . $arr1[1];
				?>
	
				</p>

			<?php } ?>

		</td>

		<?php endif; ?>

	</tr>

</table>

<?php

if(isset($_SESSION['BigPost_address']))
  unset($_SESSION['BigPost_address']);

?>