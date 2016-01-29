<?php
/**
 * Empty cart page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */
?>

<p><?php _e('Your cart is currently empty.', 'woocommerce') ?></p>

<?php do_action('woocommerce_cart_is_empty'); ?>

<p><a class="button" href="<?php echo get_permalink(woocommerce_get_page_id('shop')); ?>"><?php _e('&larr; Return To Shop', 'woocommerce') ?></a></p>

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

if(isset($_SESSION['BigPost_address']))
  unset($_SESSION['BigPost_address']);

if(isset($_SESSION['ship_bigdp']))
  unset($_SESSION['ship_bigdp']);

if(isset($_SESSION['pid1']))
  unset($_SESSION['pid1']);

 if(isset($_SESSION['hdsatl']))
  unset($_SESSION['hdsatl']);
?>