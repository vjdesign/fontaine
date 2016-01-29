<?php
/* Theme option pages */

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

add_menu_page( "Featured Section Page", "Featured Sections", 'manage_options',"options/featured-project.php", "theme_options_admin");
}


/* old options using phpgrid */
function theme_ship_admin() {
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
	add_menu_page( "Shipping Admin Page", "Shipping Admin", 'manage_options',"phpgrid/ship.php", "theme_ship_admin");
}

function add_themescript()
   {
      if(!current_user_can( 'manage_options' ))
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

		add_menu_page( "Calculate Shipping", "Calc. Shipping", 'shipping_calc',"options/shipcalc.php", "theme_shipcalc_admin");
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

		add_menu_page( "Meta Tags", "Meta Tags", 'manage_options',"options/meta.php", "theme_metatag_admin");
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

		add_menu_page( "Mobile Featured Product", "Mobile Featured Product", 'manage_options',"options/mobile_pslider.php", "theme_mobilepslider_admin");
	}
