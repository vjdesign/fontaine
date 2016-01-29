<?php
/**
 * Shipping Calculator
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

global $woocommerce;

//if ( get_option('woocommerce_enable_shipping_calc')=='no' || ! $woocommerce->cart->needs_shipping() ) return;
?>
<?php do_action( 'woocommerce_before_shipping_calculator' ); 

?>

<!--<form name="scal" class="shipping_calculator" action="<?php echo esc_url( $woocommerce->cart->get_cart_url() ); ?>" method="post"> -->
	<section class="shipping-calculator-form">
		<p class="form-row form-row-last">
			<?php
				$current_cc = $woocommerce->customer->get_shipping_country();
				$current_r = $woocommerce->customer->get_shipping_state();

				$states = $woocommerce->countries->get_states( $current_cc );

				if ( is_array( $states ) && empty( $states ) ) {

					// Hidden
					?>
					<input type="hidden" name="calc_shipping_state" id="calc_shipping_state" />
					<?php

				} elseif ( is_array( $states ) ) {

					// Dropdown
					?>
					<?php

				} else {

					// Input
					?>
					<input type="hidden" class="input-text" value="<?php echo esc_attr( $current_r ); ?>" placeholder="<?php _e('State', 'woocommerce'); ?>" name="calc_shipping_state" id="calc_shipping_state" />
					<?php

				}
			?>
		</p>
		<div class="clear"></div>
		<div class="form-row form-row-wide hline1">
			<div id="warehouse_address" style="display:none;float:left;text-align:left;width:95%;"></div>
			<?php
			  if(get_post_meta( get_the_ID(), 'bigpost', true ) || $_SESSION['BigPostDB']=="on")
			  {
			?>
				<div class="pcode_input">
					<?php 
					if(isset($_SESSION['pcode']))
					{ 
					?>
						<input type="text" class="input-text" name="pcode" id="pcode" onkeyup="cal_freight();" maxlength="4" size="12"  readonly value="<?php echo $_SESSION['pcode'] ?>">
					<?php
					}
					else
					{
					?>
						<input type="text" class="input-text" value="<?php echo esc_attr( $woocommerce->customer->get_shipping_postcode() ); ?>" placeholder="<?php _e('Postcode/Zip', 'woocommerce'); ?>" title="<?php _e('Postcode', 'woocommerce'); ?>" name="pcode" id="pcode" onkeyup="cal_freight();" maxlength="4" size="12" >
				<?php } ?>
				</div>
				<div id="bigpost" style="display:none;">
					<div class="pickup_options">
					<?php
					if(get_post_meta( get_the_ID(), 'bigpost', true ))
					{	
						echo "<input type='hidden' name='bigpost_calc' value='yes'>";
					}
					else
					{
						if($_SESSION['BigPostDB']=="on")
						{
							echo "<input type='hidden' name='bigpost_calc' value='noshipping'>";
						}
						else
						{
							echo "<input type='hidden' name='bigpost_calc' value='no'>";
						}
					}
			
					if($_SESSION['BigPostDB']=="on")
					{
					?>
						<?php echo "<b>Suburb: </b>" . $_SESSION['bigpost_suburb']; ?>
						<input type="hidden" name='bigpost_suburb_h'  id='bigpost_suburb_h' class="input-text" value='<?php echo $_SESSION['bigpost_suburb']; ?>'>
						<input type="hidden" name='bigpost_add'  class="input-text" value='<?php echo $_SESSION['BigPost_address']; ?>'>
						<input type="hidden" name='pcode_h' id='pcode_h' class="input-text" value='' >
					<?php	
					}
					else
					{
					?>
						<select name="bigpost_suburb" id="bigpost_suburb" onchange="suburb1()"></select>
						<input type="hidden" name='bigpost_suburb_h' id='bigpost_suburb_h' class="input-text" value='notext' >
						<input type="hidden" name='bigpost_add'  class="input-text" value=''>
						<input type="hidden" name='pcode_h' id='pcode_h' class="input-text" value='' >
						
			<?php	}  ?>
							<!--<div id="slist">Suburb List <div id="suburb_list"></div> </div>-->

					</div>
				</div>
		<?php }
			  else
			  {
		?>
				<div class="pcode_input">
				<?php if(isset($_SESSION['pcode']))
				{ 
				?>
					<input type="text" class="input-text" name="pcode" id="pcode" onkeyup="cal_freight();" maxlength="4" size="12"  readonly value="<?php echo $_SESSION['pcode'] ?>">
					<input type='hidden' name='bigpost_calc' value='no'>
				<?php
				}
				else
				{
				?>
					<input type="text" class="input-text" value="<?php echo esc_attr( $woocommerce->customer->get_shipping_postcode() ); ?>" placeholder="<?php _e('Postcode/Zip', 'woocommerce'); ?>" title="<?php _e('Postcode', 'woocommerce'); ?>" name="pcode" id="pcode" onkeyup="cal_freight();" maxlength="4" size="12" >
					<input type='hidden' name='bigpost_calc' value='no'>
				<?php } ?>
				</div>
				<div class="ship_but">
				<input type="button" name="calc_shipping" id="calc_shipping" value="Calculate Shipping" class="button" onclick="cal_freight();"></button>  <span id="loader"><img src="<?php bloginfo('template_directory'); ?>/images/loader.gif" alt="" title="" /></span>&nbsp;&nbsp;<span id="freightp" style=""></span>
				 <div id='atlservice' onclick='atlservice()' style="display:none;">*ATL Service, please see conditions</div>
				 <div id="na" style="display:none;margin-top:5px;height:30px;"><div class='contact-form'><a href='javascript:void(0);contact.show();' class='contact wpi-button'>Please contact us for a quote</a></div><br/>
				</div></div>
		<?php }
		?>
		</div>
		<div class="clear"></div>
		<?php
		if(get_post_meta( get_the_ID(), 'bigpost', true ) || $_SESSION['BigPostDB']=="on")
		{ ?>
		<div class="form-row form-row-wide hline1">
			<input type="button" name="calc_shipping" id="calc_shipping" value="Calculate Shipping" class="button" onclick="cal_freight();" style=""></button>  <span id="loader"><img src="<?php bloginfo('template_directory'); ?>/images/loader.gif" alt="" title="" /></span>&nbsp;&nbsp;<span id="freightp" style=""></span><span id='atlservice' onclick='atlservice()' style="display:none;padding-left:5px;">*ATL Service, please see conditions</span>
			 <div id="na" style="display:none;margin-top:5px;height:30px;"><div class='contact-form'><a href='javascript:void(0);contact.show();' class='contact wpi-button'>Please contact us for a quote</a></div><br/>
			</div>
		</div>
	<?php } ?>
		<div id="bigpost_address" class="hline1"></div>
		<input type="hidden" name="freightprice" id="freightprice" value=0>
		<?php $woocommerce->nonce_field('cart') ?>
	</section>
<!--</form> -->

<?php do_action( 'woocommerce_after_shipping_calculator' ); ?>


