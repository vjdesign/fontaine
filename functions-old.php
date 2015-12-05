<?php

add_theme_support( 'menus' );

//add_action( 'show_admin_bar', '__return_false' ); 

function custom_excerpt_length( $length ) {
	return 15;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


// check for empty-cart get param to clear the cart
add_action( 'init', 'woocommerce_clear_cart_url' );
function woocommerce_clear_cart_url() {
global $woocommerce;
if ( isset( $_GET['empty-cart'] ) ) {
$woocommerce->cart->empty_cart();
}
}

	///////////////////////// SIDEBARS  ////////////////////////////////////////////




	register_sidebar( array(
		'name' => __( 'Sale Products'),
		'id' => 'sale-products',
	) );

	register_sidebar( array(
		'name' => __( 'Header SCart'),
		'id' => 's-cart',
	) );

	register_sidebar( array(
		'name' => __( 'Search Products'),
		'id' => 'search-products',
	) );

	register_sidebar( array(
		'name' => __( 'Mobile Search Products'),
		'id' => 'mobile-search-products',
	) );

	register_sidebar( array(
		'name' => __( 'Price Filter'),
		'id' => 'price-filter',
	) );

	register_sidebar( array(
		'name' => __( 'Shop Join Sale'),
		'id' => 'shop-join-sale',
	) );

	register_sidebar( array(
		'name' => __( 'Product Layered Navigation'),
		'id' => 'product-navigation',
	) );

	register_sidebar( array(
		'name' => __( 'Fontaine Contact Details'),
		'id' => 'contact-leftsidebar',
	) );

	register_sidebar( array(
		'name' => __( 'Blog Sidebar'),
		'id' => 'blog-sidebar',
	) );

	function theme_options_admin() {
	$option_fields = array();
	if ( $_GET['updated'] ) echo '<div id="message" class="updated fade"><p>Fontaine Options Saved.</p></div>';
	echo '<link rel="stylesheet" href="'.get_bloginfo('template_url').'/options/functions.css" />';
?>

<div class="wrap">

    <h2>Fontaine Options</h2>
    
    <div id="message"></div>

    <div class="metabox-holder">
    	
    	<form method="post" action="options.php">
			<?php wp_nonce_field('update-options'); ?>
	    
	        <div id="theme-options">
		        
		       
		            <?php 	            	            		            	
		            	include("options/featured-project.php");	           		            	
		            ?>
	        	        
	        </div><!--theme-options-->
	        
	        <input type="hidden" name="action" value="update" />
	        <input type="hidden" name="page_options" value="<?php echo implode(",", $option_fields); ?>" />
        
        </form>
    </div><!--end metabox-holder-->
</div><!--end wrap-->

<?php
}
add_action('admin_menu', "theme_options_admin_init");
function theme_options_admin_init()
{
	//add_theme_page( "Fontaine Theme Options", "Theme Options", 8, __FILE__, 'theme_options_admin');

	add_menu_page( "Featured Section Page", "Featured Section", 8,"options/featured-project.php", "theme_options_admin");
}


function theme_ship_admin() 
{
?>
		 <div id="theme-options">
		        
		       
		            <?php 	            	            		            	
		            	include("phpgrid/ship.php");	           		            	
		            ?>
	        	        
	        </div><!--theme-options-->
<?php
}

	add_action('admin_menu', "theme_options_ship");
	function theme_options_ship()
	{
		//add_theme_page( "Fontaine Theme Options", "Theme Options", 8, __FILE__, 'theme_options_admin');

		add_menu_page( "Shipping Admin Page", "Shipping Admin", 10,"phpgrid/ship.php", "theme_ship_admin");
	}


function add_themescript()
   {
      if(!is_admin())
         {    wp_enqueue_script('jquery');
              wp_enqueue_script('thickbox',null,array('jquery'));
              wp_enqueue_style('thickbox.css', '/'.WPINC.'/js/thickbox/thickbox.css', null, '1.0');
         }
   }
add_action('init','add_themescript');

function theme_shipcalc_admin() 
{
	echo '<link rel="stylesheet" href="'.get_bloginfo('template_url').'/options/functions.css" />';

?>
		 <div id="theme-options">
		        
		       
		            <?php 	            	            		            	
		            	include("options/shipcalc.php");	           		            	
		            ?>
	        	        
	        </div><!--theme-options-->
<?php
}


add_action('admin_menu', "theme_options_shipcalc");
	function theme_options_shipcalc()
	{
		//add_theme_page( "Fontaine Theme Options", "Theme Options", 8, __FILE__, 'theme_options_admin');

		add_menu_page( "Calculate Shipping", "Calc. Shipping", 10,"options/shipcalc.php", "theme_shipcalc_admin");
	}


function theme_metatag_admin() 
{
	echo '<link rel="stylesheet" href="'.get_bloginfo('template_url').'/options/functions.css" />';

?>
		<div class="wrap">

    <h2>Fontaine Options</h2>
    
    <div id="message"></div>

    <div class="metabox-holder">
    	
    	<form method="post" action="options.php">
			<?php wp_nonce_field('update-options'); ?>
	    
	        <div id="theme-options">
		        
		       
		            <?php 	            	            		            	
		            	include("options/meta.php");	           		            	
		            ?>
	        	        
	        </div><!--theme-options-->
	        
	        <input type="hidden" name="action" value="update" />
	        <input type="hidden" name="page_options" value="<?php echo implode(",", $option_fields); ?>" />
        
        </form>
    </div><!--end metabox-holder-->
</div><!--end wrap-->

<?php
}

add_action('admin_menu', "theme_options_metatag");
	function theme_options_metatag()
	{
		//add_theme_page( "Fontaine Theme Options", "Theme Options", 8, __FILE__, 'theme_options_admin');

		add_menu_page( "Meta Tags", "Meta Tags", 10,"options/meta.php", "theme_metatag_admin");
	}


function theme_mobilepslider_admin() 
{
	echo '<link rel="stylesheet" href="'.get_bloginfo('template_url').'/options/functions.css" />';

?>
		<div class="wrap">

    <h2>Fontaine Options</h2>
    
    <div id="message"></div>

    <div class="metabox-holder">
    	
    	<form method="post" action="options.php">
			<?php wp_nonce_field('update-options'); ?>
	    
	        <div id="theme-options">
		        
		       
		            <?php 	            	            		            	
		            	include("options/mobile_pslider.php");	           		            	
		            ?>
	        	        
	        </div><!--theme-options-->
	        
	        <input type="hidden" name="action" value="update" />
	        <input type="hidden" name="page_options" value="<?php echo implode(",", $option_fields); ?>" />
        
        </form>
    </div><!--end metabox-holder-->
</div><!--end wrap-->

<?php
}

add_action('admin_menu', "theme_options_mobilepslider");
	function theme_options_mobilepslider()
	{
		//add_theme_page( "Fontaine Theme Options", "Theme Options", 8, __FILE__, 'theme_options_admin');

		add_menu_page( "Mobile Featured Product", "Mobile Featured Product", 10,"options/mobile_pslider.php", "theme_mobilepslider_admin");
	}

		/**
	* Creates sharethis shortcode
	*/
	if (function_exists('st_makeEntries')) :
	add_shortcode('sharethis', 'st_makeEntries');
	endif;


add_filter('woocommerce_email_order_meta_keys', 'atl_service');

function atl_service( $keys ) {
	$keys[] = 'ATL Service';
	return $keys;
}