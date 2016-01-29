<?php
/**
 * Thankyou page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */


global $woocommerce;
?>
<?php if ($order) : ?>
	<?php if (in_array($order->status, array('failed'))) : ?>

		<p><?php _e('Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction.', 'woocommerce'); ?></p>

		<p><?php
			if (is_user_logged_in()) :
				_e('Please attempt your purchase again or go to your account page.', 'woocommerce');
			else :
				_e('Please attempt your purchase again.', 'woocommerce');
			endif;
		?></p>

		<p>
			<a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php _e('Pay', 'woocommerce') ?></a>
			<?php if (is_user_logged_in()) : ?>
			<a href="<?php echo esc_url( get_permalink(woocommerce_get_page_id('myaccount')) ); ?>" class="button pay"><?php _e('My Account', 'woocommerce'); ?></a>
			<?php endif; ?>
		</p>

	<?php else : ?><p><b><?php _e('Thank you, Your order has been received. You will receive an order confirmation via email', 'woocommerce'); ?></b></p>
	<!--
		<ul class="order_details">
			<li class="order">
				<b><?php _e('Order Number:', 'woocommerce'); ?><br/>
				<?php echo $order->get_order_number(); ?>
				</b>
			</li>
			<li class="date">
				<b><?php _e('Order Date:', 'woocommerce'); ?><br/>
				<?php echo date_i18n(get_option('date_format'), strtotime($order->order_date)); ?>
				</b>
			</li>
			<li class="total">
				<b><?php _e('Order Total:', 'woocommerce'); ?><br/>
				<?php echo $order->get_formatted_order_total(); ?>
				</b>
			</li>
			<?php if ($order->payment_method_title) : ?>
			<li class="method">
				<b><?php _e('Payment method:', 'woocommerce'); ?><br/>
				<?php echo $order->payment_method_title; ?>
				</b>
			</li>
			<?php endif; ?>
		</ul>
		-->
		<table class="shop_table order_details">
	    <thead>
		<tr>
			<th class="o-number">Order Number:</th>
			<th class="o-date">Order Date:</th>
			<th class="o-total">Order Total:</th>
			<th class="p-method">Payment Method:</th>
		</tr>
  	    </thead>
		<tbody>
		<tr class="order_table_item">
			<td class="o-number-value"><?php echo $order->get_order_number(); ?></td>
			<td class="o-date-value"><?php echo date_i18n(get_option('date_format'), strtotime($order->order_date)); ?></td>
			<td class="o-total-value"><?php echo $order->get_formatted_order_total(); ?></td>
			<td class="p-method-value"><?php echo $order->payment_method_title; ?></td>
		</tr>	
		</tbody>
		</table>

		<div class="clear"></div>

	<?php endif; ?>

	<?php do_action( 'woocommerce_thankyou_' . $order->payment_method, $order->id ); ?>

	<?php do_action( 'woocommerce_thankyou', $order->id ); ?>

<?php else : ?>

	<p><?php _e('Thank you. Your order has been received.', 'woocommerce'); ?></p>

<?php endif; ?>

<?php

if(isset($_SESSION['pcode']))
  unset($_SESSION['pcode']);

if(isset($_SESSION['Delivery']))
  unset($_SESSION['Delivery']);

if(isset($_SESSION['pickUp']))
  unset($_SESSION['pickUp']);
  
if(isset($_SESSION['sval']))
  unset($_SESSION['sval']);

if(isset($_SESSION['pickup_ship']))
  unset($_SESSION['pickup_ship']);

if(isset($_SESSION['pickup_shipname']))
  unset($_SESSION['pickup_shipname']);

if(isset($_SESSION['ship_delivery']))
  unset($_SESSION['ship_delivery']);

if(isset($_SESSION['delivery_warehouse']))
  unset($_SESSION['delivery_warehouse']);

if(isset($_SESSION['BigPostDB']))
  unset($_SESSION['BigPostDB']);

if(isset($_SESSION['bigpost_suburb']))
  unset($_SESSION['bigpost_suburb']);

if(isset($_SESSION['BigPostDB_shipname']))
  unset($_SESSION['BigPostDB_shipname']);

//if(isset($_SESSION['BigPost_address']))
//  unset($_SESSION['BigPost_address']);

if(isset($_SESSION['ship_bigdp']))
  unset($_SESSION['ship_bigdp']);

if(isset($_SESSION['pid1']))
  unset($_SESSION['pid1']);

if(isset($_SESSION['hdsatl']))
  unset($_SESSION['hdsatl']);

?> 
<script>
function printpage() {
	var divcontent = document.getElementById('content').innerHTML; 
		
   	var matches = divcontent.match(/<div\s+id="cartbreadcrum">[\S\s]*?<\/p>/gi);
	divcontent = divcontent.replace(matches,"");




    var text = "<html>\n<head>\n<title>Print This Page</title>\n";
    text += "<link rel='stylesheet' type='text/css' href='http://fontaineind.com.au/wp-content/themes/fontaine/style.css' />\n";
	text += "<link rel='stylesheet' type='text/css' href='http://fontaineind.com.au/wp-content/plugins/woocommerce/assets/css/woocommerce.css?ver=3.5' />\n";
	text += "</head>\n<body>\n";
    text += "<p style='width:1000px;'><input type='button' value='print this page' onclick='window.print();' style='float: left' /></p>";
    text += "<div id='content'>\n";
	text += divcontent;
    text += "</div>\n</body>\n</html>";
    var newWindow = window.open('', 'Order Confirmation', 'width=1000,height=920');
    newWindow.document.write(text);
}
</script>

