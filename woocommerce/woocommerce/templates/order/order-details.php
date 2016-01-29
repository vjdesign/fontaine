<?php
/**
 * Order details
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

global $woocommerce;

$order = new WC_Order( $order_id );
?>
<h3 class="dashed-line"><?php _e('Your Order Details', 'woocommerce'); ?></h3>
<table class="shop_table order_details">
	<thead>
		<tr>
			<th class="product-name"><?php _e('Product', 'woocommerce'); ?></th>
			<th class="product-quantity"><?php _e('Qty', 'woocommerce'); ?></th>
			<th class="product-total"><?php _e('Totals', 'woocommerce'); ?></th>
		</tr>
	</thead>
	<tfoot>
	<?php
		if ( $totals = $order->get_order_item_totals() ) foreach ( $totals as $total ) :
			?>
			<tr>
				<th scope="row" colspan="2"><?php echo $total['label']; ?></th>
				<td><?php echo $total['value']; ?></td>
			</tr>
			<?php
		endforeach;
	?>
	</tfoot>
	<tbody>
		<?php
		if (sizeof($order->get_items())>0) :

			foreach($order->get_items() as $item) :

				if (isset($item['variation_id']) && $item['variation_id'] > 0) :
					$_product = new WC_Product_Variation( $item['variation_id'] );
				else :
					$_product = new WC_Product( $item['id'] );
				endif;

				echo '
					<tr class = "' . esc_attr( apply_filters('woocommerce_order_table_item_class', 'order_table_item', $item, $order ) ) . '">
						<td class="product-name">';

				echo '<a href="'.get_permalink( $item['id'] ).'">' . $item['name'] . '</a>';

				$item_meta = new WC_Order_Item_Meta( $item['item_meta'] );
				$item_meta->display();

				if ( $_product->exists() && $_product->is_downloadable() && $_product->has_file() && ( $order->status=='completed' || ( get_option( 'woocommerce_downloads_grant_access_after_payment' ) == 'yes' && $order->status == 'processing' ) ) ) :

					echo '<br/><small><a href="' . $order->get_downloadable_file_url( $item['id'], $item['variation_id'] ) . '">' . __('Download file &rarr;', 'woocommerce') . '</a></small>';

				endif;

				echo '</td><td class="product-quantity">'.$item['qty'].'</td><td class="product-total">' . $order->get_formatted_line_subtotal($item) . '</td></tr>';

				// Show any purchase notes
				if ($order->status=='completed' || $order->status=='processing') :
					if ($purchase_note = get_post_meta( $_product->id, '_purchase_note', true)) :
						echo '<tr class="product-purchase-note"><td colspan="3">' . apply_filters('the_content', $purchase_note) . '</td></tr>';
					endif;
				endif;

			endforeach;
		endif;

		do_action( 'woocommerce_order_items_table', $order );
		?>
	</tbody>
</table>

<?php if ( get_option('woocommerce_allow_customers_to_reorder') == 'yes' && $order->status=='completed' ) : ?>
	<p class="order-again">
		<a href="<?php echo esc_url( $woocommerce->nonce_url( 'order_again', add_query_arg( 'order_again', $order->id, add_query_arg( 'order', $order->id, get_permalink( woocommerce_get_page_id( 'view_order' ) ) ) ) ) ); ?>" class="button"><?php _e('Order Again', 'woocommerce'); ?></a>
	</p>
<?php endif; ?>

<?php do_action( 'woocommerce_order_details_after_order_table', $order ); ?>


<?php if (get_option('woocommerce_ship_to_billing_address_only')=='no') : ?>

<div class="col2-set addresses">

	<div class="col-1">

<?php endif; ?>
			<h3 class="dashed-line"><?php _e('Billing Address', 'woocommerce'); ?></h3>
		<address><p style="font-style:normal; font-weight:bold;">
			<?php
				if (!$order->get_formatted_billing_address()) _e('N/A', 'woocommerce'); else echo $order->get_formatted_billing_address();
			?>
		</p></address>

<?php if (get_option('woocommerce_ship_to_billing_address_only')=='no') : ?>

	</div><!-- /.col-1 -->

	<?php

		$shipinfo = $order->get_shipping_method();
		//echo $shipinfo
	?>

	<div class="col-2">
			<?php
			//if($_SESSION['pickUp']!="on")
			if($shipinfo=="Local Delivery")
			{
			?>
			<h3 class="dashed-line"><?php _e('Delivery Address', 'woocommerce'); ?></h3>
		<address><p style="font-style:normal; font-weight:bold;">
			<?php
				if (!$order->get_formatted_shipping_address()) _e('N/A', 'woocommerce'); else echo $order->get_formatted_shipping_address();
			?>
		</p></address>
			<?php } ?>
			<?php
			//if($_SESSION['pickUp']=="on")
			if($shipinfo=="Local Pickup")
			{
			?>
			<h3 class="dashed-line">Pick Up Address</h3>
		<address><p style="font-style:normal; font-weight:bold;">
				8-10 Conquest Way,<br/> 
				Hallam VIC 3803,<br/>
				Australia<br/><br/>
				Please await your pick up confirmation prior to collecting order.
		</p></address>
			<?php } ?>

			<?php
			//if($_SESSION['BigPostDB']=="on")
			if($shipinfo=="Depot Pickup")
			{
			?>
			<h3 class="dashed-line">Depot Pickup Address</h3>
		<address><p style="font-style:normal; font-weight:bold;">
				<?php //echo $_SESSION['BigPost_address']; 
						$add1 =  $order->customer_note;
					 $arr1 = explode("Pickup From",$add1);
					 echo "Pickup From" . $arr1[1];
			    ?>
		</p></address>
			<?php } ?>

	</div><!-- /.col-2 -->

</div><!-- /.col2-set -->

<?php endif; ?>

<div class="clear"></div>
<br/>
<div class="col2-set addresses">

	<div class="col-1">
			<h3 class="dashed-line">Contact Details</h3>
			<p style="font-style:normal; font-weight:bold;">
			<?php
				if ($order->billing_email) echo ''.__('Email: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', 'woocommerce').$order->billing_email.'<br/>';	
				if ($order->billing_phone) echo ''.__('Phone: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', 'woocommerce').$order->billing_phone.'';
			?>
			</p>
	</div><!-- /.col-1 -->

	<div class="col-2">
			<?php
			//if($_SESSION['pickUp']!="on")
			if($shipinfo=="Local Delivery")
			{
			?>
			<h3 class="dashed-line">Delivery Notes</h3>
			<p style="font-style:normal; font-weight:bold;">
				<?php echo $order->customer_note; ?>
			</p>
			<?php } ?>

			<?php
			//if($_SESSION['pickUp']=="on")
			if($shipinfo=="Local Pickup")
			{
			?>
			<h3 class="dashed-line">Pick Up Notes</h3>
			<p style="font-style:normal; font-weight:bold;">
				<?php echo $order->customer_note; ?>
			</p>
			<?php } ?>

			<?php
			//if($_SESSION['BigPostDB']=="on")
			if($shipinfo=="Depot Pickup")
			{
			?>
			<h3 class="dashed-line">Pick Up Notes</h3>
			<p style="font-style:normal; font-weight:bold;">
				<?php 
					$add1 =  $order->customer_note;
					$arr1 = explode("Pickup From",$add1);
					echo $arr1[0];
				?>
			</p>
			<?php } ?>
	</div><!-- /.col-2 -->

</div><!-- /.col2-set -->