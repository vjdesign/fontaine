<?php
/**
 * Checkout shipping information form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

global $woocommerce;
?>

<?php if ( ( $woocommerce->cart->needs_shipping() || get_option('woocommerce_require_shipping_address') == 'yes' ) && ! $woocommerce->cart->ship_to_billing_address_only() ) : ?>

	<?php
		if ( empty( $_POST ) ) :

			$shiptobilling = (get_option('woocommerce_ship_to_same_address')=='yes') ? 1 : 0;
			$shiptobilling = apply_filters('woocommerce_shiptobilling_default', $shiptobilling);

		else :

			$shiptobilling = $checkout->get_value('shiptobilling');

		endif;
	?>
	<div class="dashed-line" style="height:18px;margin-bottom:5px;">
	<?php 
		if($_SESSION['Delivery']=="on")
		{
	?>
			<p class="form-row" id="shiptobilling">
				<input id="shiptobilling-checkbox" class="input-checkbox" <?php checked($shiptobilling, 1); ?> type="checkbox" name="shiptobilling" value="1" />
				<label for="shiptobilling-checkbox" class="checkbox"><?php _e('Ship to billing address?', 'woocommerce'); ?></label>
			</p>
			

			<h3><?php _e('Delivery Address', 'woocommerce'); ?></h3>
<?php } ?>
	<?php 
		if($_SESSION['pickUp']=="on")
		{
	?>
			<h3><?php _e('Pick Up Details', 'woocommerce'); ?></h3>
<?php } ?>
	<?php 
		if($_SESSION['BigPostDB']=="on")
		{
	?>
			<h3><?php _e('Depot Details', 'woocommerce'); ?></h3>
<?php } ?>
	</div>
	<?php 
		if($_SESSION['Delivery']=="on")
		{
	?>
	<div class="shipping_address">

		<?php do_action('woocommerce_before_checkout_shipping_form', $checkout); ?>

		<?php foreach ($checkout->checkout_fields['shipping'] as $key => $field) : ?>

			<?php woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>

		<?php endforeach; ?>

		<?php do_action('woocommerce_after_checkout_shipping_form', $checkout); ?>

	</div>
	<?php } ?>

<?php endif; ?>
<br/>
<?php 
		if($_SESSION['Delivery']=="on")
		{
	?>
<h4 class="dashed-line">Delivery Notes:</h4><br/>
<p>
Below information is required to book in your delivery, please provide the information in the text box below. 
You must provide this information or your order will not be dispatched. Not applicable for ATL Service 'Authority To Leave'.
</p>

<ol>
	<li>Is the delivery address a commercial or residential property?</li>
	<li>Will there be someone there to accept the delivery (all times)?</li>
	<li>If there is no one home at the time of delivery, where can the order be left? (Eg. Please leave at front door/veranda/ back door/side gate/under carport/behind fence)</li>
	<li>Do you have a contact number in case there are any issues with delivery?</li>
</ol><br/>

<a href="#" class="additional">Click here to view additional delivery information before filling in below notes.</a><br/><br/>

<div id="addinfo" style="display:none;padding:10px;margin-bottom:5px;background:#eee;-webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;">
	<ul style="padding:10px;">
		<li>If you do not advise authority to leave if there is no one home, and there is no one home to accept the delivery the item will need to be redelivered, you will need to pay an extra redelivery fee in this case.</li>
		<li>Delivery is door service to the first floor only, if your delivery is above the first floor, there will need to be someone available to accept the delivery at the first floor OR instructions to leave at first floor.</li>
		<li>Drivers are unable to call prior to the delivery, a number can be added for the driver to call if there is any issues, however they will not call to advise delivery day/time.</li>
	</ul>
</div>
<?php } ?>

<?php 
		if($_SESSION['pickUp']=="on")
		{
	?>
<h4 class="dashed-line">Pick Up Notes:</h4><br/>
		<input id="shiptobilling-checkbox" class="input-checkbox" <?php checked($shiptobilling, 1); ?> type="checkbox" name="shiptobilling" value="1" style="display:none;" />
		<ul style="padding:5px;">
			<li>Please advise your preferred pick up date and time.</li>
			<li>Please keep in mind we require 24 hours notice for all pickups after payment has cleared, so please allow for this time when advising your pick up preferences.</li>
			<li>Please wait for the pick-up confirmation prior to collecting your order to ensure your order is ready for collection.</li>
		</ul><br/>
<?php } ?>


<?php 
		if($_SESSION['BigPostDB']=="on")
		{
	?>
<h4 class="dashed-line">Pick Up Notes:</h4><br/>
		<input id="shiptobilling-checkbox" class="input-checkbox" <?php checked($shiptobilling, 1); ?> type="checkbox" name="shiptobilling" value="1" style="display:none;" />
		<ul style="padding:5px;">
			<li>Please advise your preferred pick up date and time.</li>
			<li>Please keep in mind we require 24 hours notice for all pickups after payment has cleared, so please allow for this time when advising your pick up preferences.</li>
			<li>Please wait for the pick-up confirmation prior to collecting your order to ensure your order is ready for collection.</li>
		</ul><br/>
<?php } ?>


<?php do_action('woocommerce_before_order_notes', $checkout); ?>

<?php if (get_option('woocommerce_enable_order_comments')!='no') : ?>

	<?php if ($woocommerce->cart->ship_to_billing_address_only()) : ?>

		<h3><?php _e('Additional Information', 'woocommerce'); ?></h3>

	<?php endif; ?>

	<?php foreach ($checkout->checkout_fields['order'] as $key => $field) : ?>

		<?php woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>

	<?php endforeach; ?>

<?php endif; ?>

<?php do_action('woocommerce_after_order_notes', $checkout); ?>

</p>
<script>
	jQuery(document).ready(function($) {
	$('a.additional').click(function(){
		$('#addinfo').slideToggle();
		return false;
	});
	});
</script>
