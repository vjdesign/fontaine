<?php

/**
 * functions.php
 * For modifying and expanding core WordPress functionality.
 */


 // remove dashicons
 function wpdocs_dequeue_dashicon() {
 	if (current_user_can( 'manage_options' )) {
 	    return;
 	}
 	wp_deregister_style('dashicons');
 }
 //add_action( 'wp_enqueue_scripts', 'wpdocs_dequeue_dashicon' );

	/**
	 * Load theme files.
	 */
	function keel_load_theme_files() {

		/* remove styles and scripts for plugins*/
		wp_dequeue_style('contact-form-7');
		wp_dequeue_script('contact-form-7');
		wp_dequeue_style('responsive-slider');
    //wp_dequeue_script('responsive-slider_flex-slider');

		/* Remove unnecessary stuff intriduced by WordPress */
		wp_deregister_style( 'open-sans' );
		wp_register_style( 'open-sans', false );


		// Feature detection injected inline into <head> for better performance
		wp_enqueue_style( 'keel-theme-styles', get_template_directory_uri() . '/dist/css/main.css', null, null, 'all' );
		wp_deregister_script('jquery');
		wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js', FALSE, '1.11.0', TRUE);
		wp_enqueue_script('jquery');
		wp_enqueue_script( 'keel-theme-scripts1', get_template_directory_uri() . '/dist/js/main.js', null, null, true );

	}
	//add_action('wp_enqueue_scripts', 'keel_load_theme_files');



	/**
	 * Include feature detection scripts inline in the header
	 */
	function keel_initialize_theme_detects() {
		?>
			<script>
				<?php echo file_get_contents( get_template_directory_uri() . '/js/detects.js' ); ?>
			</script>
		<?php
	}
	add_action('wp_head', 'keel_initialize_theme_detects', 30);



	/**
	 * Include script inits inline in the footer
	 */
	function keel_initialize_theme_scripts() {
		?>
			<script>
				// Scripts initializations here
				houdini.init();
				modals.init();

			</script>
		<?php
	}
	add_action('wp_footer', 'keel_initialize_theme_scripts', 30);



	/**
	 * Add a shortcode for the search form
	 * @return string Markup for search form
	 */
	function keel_wpsearch() {
		return get_search_form();
	}
	add_shortcode( 'searchform', 'keel_wpsearch' );



	/**
	 * Replace the default password-protected post messaging with custom language
	 * @return string Custom language
	 */
	function keel_post_password_form() {
		global $post;
		$label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
		$form =
			'<form class="text-center" action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post"><p>' . __( 'This is a password protected post.', 'keel' ) . '</p><label class="screen-reader" for="' . $label . '">' . __( 'Password', 'keel' ) . '</label><input id="' . $label . '" name="post_password" type="password"><input type="submit" name="Submit" value="' . __( 'Submit', 'keel' ) . '"></form>';
		return $form;
	}
	add_filter( 'the_password_form', 'keel_post_password_form' );



	/**
	 * Customize the `wp_title` method
	 * @param  string $title The page title
	 * @param  string $sep   The separator between title and description
	 * @return string        The new page title
	 */
	function keel_pretty_wp_title( $title, $sep ) {

		global $paged, $page;

		if ( is_feed() )
			return $title;

		// Add the site name
		$title .= get_bloginfo( 'name' );

		// Add a page number if necessary.
		if ( $paged >= 2 || $page >= 2 )
			$title = "$title $sep " . sprintf( __( 'Page %s', 'keel' ), max( $paged, $page ) );

		return $title;
	}
	add_filter( 'wp_title', 'keel_pretty_wp_title', 'manage_options', 2 );



	/**
	 * Override default the_excerpt length
	 * @param  number $length Default length
	 * @return number         New length
	 */
	function keel_excerpt_length( $length ) {
		return 15;
	}
	add_filter( 'excerpt_length', 'keel_excerpt_length', 999 );



	/**
	 * Override default the_excerpt read more string
	 * @param  string $more Default read more string
	 * @return string       New read more string
	 */
	function keel_excerpt_more( $more ) {
		return '... <a href="'. get_permalink( get_the_ID() ) . '">' . __('Read More', 'keel') . '</a>';
	}
	add_filter( 'excerpt_more', 'keel_excerpt_more' );



	function custom_excerpt_length( $length ) {
		return 55;
	}
	add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

	/**
	 * Sets max allowed content width
	 * Deliberately large to prevent pixelation from content stretching
	 * @link http://codex.wordpress.org/Content_Width
	 */
	if ( !isset( $content_width ) ) {
		$content_width = 1240;
	}



	/**
	 * Registers navigation menus for use with wp_nav_menu function
	 * @link http://codex.wordpress.org/Function_Reference/register_nav_menus
	 */
	function keel_register_menus() {
		register_nav_menus(
			array(
				'primary' => __( 'Primary Menu' ),
				'footer' => __( 'Footer Menu' )
			)
		);
	}
	add_action( 'init', 'keel_register_menus' );



	/**
	 * Adds support for featured post images
	 * @link http://codex.wordpress.org/Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );



	/**
	 * Disable WordPress auto-formatting
	 * Disabled by default. Uncomment add_action to enable
	 */
	function keel_remove_wpautop() {
		remove_filter('the_content', 'wpautop');
	}
	// add_action( 'pre_get_posts', 'keel_remove_wpautop' );



	/**
	 * Display all posts instead of a limited number
	 * @param  array $query The WordPress post query
	 */
	function keel_get_all_posts( $query ) {
		$query->set( 'posts_per_page', '-1' );
	}
	// add_action( 'pre_get_posts', 'keel_get_all_posts' );



	/**
	 * Custom comment callback for wp_list_comments used in comments.php
	 * @param  object $comment The comment
	 * @param  object $args Comment settings
	 * @param  integer $depth How deep to nest comments
	 * @return string Comment markup
	 * @link http://codex.wordpress.org/Function_Reference/wp_list_comments
	 */
	function keel_comment_layout($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment;
		extract($args, EXTR_SKIP);

		if ( 'div' === $args['style'] ) {
			$tag = 'div';
		} else {
			$tag = 'li';
		}
	?>

		<<?php echo $tag ?> <?php if ( $depth > 1 ) { echo 'class="comment-nested"'; } ?> id="comment-<?php comment_ID() ?>">

			<article>

				<?php if ($comment->comment_approved == '0') : // If the comment is held for moderation ?>
					<p><em><?php _e( 'Your comment is being held for moderation.', 'keel' ) ?></em></p>
				<?php endif; ?>

				<header>
					<figure>
						<?php if ( $args['avatar_size'] !== 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
					</figure>
					<h3>
						<?php comment_author_link() ?>
					</h3>
					<aside>
						<time datetime="<?php comment_date( 'Y-m-d' ); ?>" pubdate><?php comment_date('F jS, Y') ?></time>
						<?php edit_comment_link('Edit', ' / ', ''); ?>
					</aside>
				</header>

				<?php comment_text(); ?>
				<?php
					/**
					 * Add inline reply link.
					 * Only displays if nested comments are enabled.
					 */
					comment_reply_link( array_merge(
						$args,
						array(
							'add_below' => 'comment',
							'depth' => $depth,
							'max_depth' => $args['max_depth'],
							'before' => '<p>',
							'after' => '</p>'
						)
					) );
				?>

			</article>

	<?php
	}



	/**
	 * Custom implementation of comment_form
	 * @return string Markup for comment form
	 */
	function keel_comment_form() {

		$commenter = wp_get_current_commenter();
		global $user_identity;

		$must_log_in =
			'<p>' .
				sprintf(
					__( 'You must be <a href="%s">logged in</a> to post a comment.' ),
					wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
				) .
			'</p>';

		$logged_in_as =
			'<p>' .
				sprintf(
					__( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s">Log out.</a>' ),
					admin_url( 'profile.php' ),
					$user_identity,
					wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
				) .
			'</p>';

		$notes_before = '';
		$notes_after = '';

		$field_author =
			'<div>' .
				'<label for="author">' . __( 'Name' ) . '</label>' .
				'<input type="text" name="author" id="author" value="' . esc_attr( $commenter['comment_author'] ) . '" required>' .
			'</div>';

		$field_email =
			'<div>' .
				'<label for="email">' . __( 'Email' ) . '</label>' .
				'<input type="email" name="email" id="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" required>' .
			'</div>';

		$field_url =
			'<div>' .
				'<label for="url">' . __( 'Website (optional)' ) . '</label>' .
				'<input type="url" name="url" id="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '">' .
			'</div>';

		$field_comment =
			'<div>' .
				'<textarea name="comment" id="comment" required></textarea>' .
			'</div>';

		$args = array(
			'title_reply' => __( 'Leave a Comment' ),
			'title_reply_to' => __( 'Reply to %s' ),
			'cancel_reply_link' => __( '[Cancel]' ),
			'label_submit' => __( 'Submit Comment' ),
			'comment_field' => $field_comment,
			'must_log_in' => $must_log_in,
			'logged_in_as' => $logged_in_as,
			'comment_notes_before' => $notes_before,
			'comment_notes_after' => $notes_after,
			'fields' => apply_filters(
				'comment_form_default_fields',
				array(
					'author' => $field_author,
					'email' => $field_email,
					'url' => $field_url
				)
			),
		);

		return comment_form( $args );

	}



	/**
	 * Add script for threaded comments if enabled
	 */
	if ( is_single() && comments_open() && get_option('thread_comments') ) {
		wp_enqueue_script( 'comment-reply' );
	}



	/**
	 * Deregister JetPack's devicepx.js script
	 */
	function keel_dequeue_devicepx() {
	    wp_dequeue_script( 'devicepx' );
	}
	add_action( 'wp_enqueue_scripts', 'keel_dequeue_devicepx', 20 );



	/**
	 * Remove Jetpack front-end styles
	 * @todo Remove once Jetpack glitch fixed
	 */
	add_filter( 'jetpack_implode_frontend_css', '__return_false' );



	/**
	 * Remove empty paragraphs created by wpautop()
	 * @author Ryan Hamilton
	 * @link https://gist.github.com/Fantikerz/5557617
	 */
	function keel_remove_empty_p( $content ) {
		$content = force_balance_tags( $content );
		$content = preg_replace( '#<p>\s*+(<br\s*/*>)?\s*</p>#i', '', $content );
		$content = preg_replace( '~\s?<p>(\s|&nbsp;)+</p>\s?~', '', $content );
		return $content;
	}
	add_filter('the_content', 'keel_remove_empty_p', 20, 1);



	/**
	 * Get number of comments (without trackbacks or pings)
	 * @return integer Number of comments
	 */
	function keel_just_comments_count() {
		global $post;
		return count( get_comments( array( 'type' => 'comment', 'post_id' => $post->ID ) ) );
	}



	/**
	 * Get number of trackbacks
	 * @return integer Number of trackbacks
	 */
	function keel_trackbacks_count() {
		global $post;
		return count( get_comments( array( 'type' => 'trackback', 'post_id' => $post->ID ) ) );
	}



	/**
	 * Get number of pings
	 * @return integer Number of pings
	 */
	function keel_pings_count() {
		global $post;
		return count( get_comments( array( 'type' => 'pingback', 'post_id' => $post->ID ) ) );
	}



	/**
	 * Check if more than one page of content exists
	 * @return boolean True if content is paginated
	 */
	function keel_is_paginated() {
		global $wp_query;

		if ( $wp_query->max_num_pages > 1 ) {
			return true;
		} else {
			return false;
		}
	}



	/**
	 * Check if post is the last in a set
	 * @param  object  $wp_query WPQuery object
	 * @return boolean           True if is last post
	 */
	function keel_is_last_post($wp_query) {
		$post_current = $wp_query->current_post + 1;
		$post_count = $wp_query->post_count;
		if ( $post_current == $post_count ) {
			return true;
		} else {
			return false;
		}
	}



	/**
	 * Print a pre formatted array to the browser - useful for debugging
	 * @param array $array Array to print
	 * @author 	Keir Whitaker
	 * @link https://github.com/viewportindustries/starkers/
	 */
	function keel_print_a( $a ) {
		print( '<pre>' );
		print_r( $a );
		print( '</pre>' );
	}



	/**
	 * Pass in a path and get back the page ID
	 * @param  string $path The URL of the page
	 * @return integer Page or post ID
	 * @author Keir Whitaker
	 * @link https://github.com/viewportindustries/starkers/
	 */
	function keel_get_page_id_from_path( $path ) {
		$page = get_page_by_path( $path );
		if( $page ) {
			return $page->ID;
		} else {
			return null;
		};
	}


	function keel_widgets_init() {
		register_sidebar( array(
			'name'          => esc_html__( 'Sidebar', 'keel' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here to appear in your sidebar.', 'keel' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Navigation', 'keel' ),
			'id'            => 'nav-footer',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'keel' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );


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
	}
	add_action( 'widgets_init', 'keel_widgets_init' );

	/**
	 * Adds support for woocommerce
	 */
	add_theme_support( 'woocommerce' );


	// https://docs.woothemes.com/document/show-cart-contents-total/
	// Ensure cart contents update when products are added to the cart via AJAX (place the following in functions.php)
	add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );
	function woocommerce_header_add_to_cart_fragment( $fragments ) {
		ob_start();
		?>
		<a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><?php echo sprintf (_n( '%d item', '%d items', WC()->cart->cart_contents_count ), WC()->cart->cart_contents_count ); ?> - <?php echo WC()->cart->get_cart_total(); ?></a>
		<?php

		$fragments['a.cart-contents'] = ob_get_clean();

		return $fragments;
	}

  // http://wpsites.net/web-design/add-woocommerce-style-sheet-in-child-theme-for-easy-modification/
	add_filter( 'woocommerce_enqueue_styles', '__return_false' );

	// https://docs.woothemes.com/document/customise-the-woocommerce-breadcrumb/
	add_filter( 'woocommerce_breadcrumb_defaults', 'jk_woocommerce_breadcrumbs' );
	function jk_woocommerce_breadcrumbs() {
	    return array(
	            'delimiter'   => '',
	            'wrap_before' => '<ul class="breadcrumb">',
	            'wrap_after'  => '</ul>',
	            'before'      => '<li>',
	            'after'       => '</li>',
	            'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
	        );
	}


/* Limit the search to products only */
function SearchFilter($query) {
if ($query->is_search) {
$query->set('post_type', array('product','page'));
}
return $query;
}

add_filter('pre_get_posts','SearchFilter');


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

add_filter('woocommerce_email_order_meta_keys', 'atl_service');

function atl_service( $keys ) {
	$keys[] = 'ATL Service';
	return $keys;
}


/* Rearrange the product page contents via woocommerce hooks */
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 20 );


add_action( 'woocommerce_archive_description', 'woocommerce_category_image', 2 );
function woocommerce_category_image() {
    if ( is_product_category() ){
	    global $wp_query;
	    $cat = $wp_query->get_queried_object();
	    $thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
	    $image = wp_get_attachment_url( $thumbnail_id );
	    if ( $image ) {
		    echo '<img src="' . $image . '" alt="" />';
		}
	}
}

/*
 * List WooCommerce Products by tags - http://www.remicorson.com/list-woocommerce-products-by-tags/
 *
 * ex: [woo_products_by_tags tags="shoes,socks"]
 */
function woo_products_by_tags_shortcode( $atts, $content = null ) {

	// Get attribuets
	extract(shortcode_atts(array(
		"tags" => ''
	), $atts));

	ob_start();
	// Define Query Arguments
	$args = array(
				'post_type' 	 => 'product',
				'posts_per_page' => 6,
        'orderby' => 'rand',
				'product_tag' 	 => $tags
				);

	// Create the new query
	$loop = new WP_Query( $args );

	// Get products number
	$product_count = $loop->post_count;

	// If results
	if( $product_count > 0 ) :

		echo '<ul class="rslides">';

			// Start the loop
			while ( $loop->have_posts() ) : $loop->the_post();

        global $product;
				global $post;

        $price_html = $product->get_price_html();

        if (has_post_thumbnail( $loop->post->ID ))
				    echo "<li><a href='" .get_permalink(). "'>".get_the_post_thumbnail($loop->post->ID, 'shop_catalog')."<span class='price'>".$price_html."</a></a></li>";
				else
          echo "<li><a href='" .get_permalink(). "'>".$thePostID = $post->post_title."</a></li>";

			endwhile;

		echo '</ul><!--/.products-->';

	else :

		_e('No product matching your criteria.');

	endif; // endif $product_count > 0

wp_reset_postdata();

	return ob_get_clean();


}
add_shortcode("woo_products_by_tags", "woo_products_by_tags_shortcode");

// check for empty-cart get param to clear the cart
// http://www.remicorson.com/create-a-empty-cart-button-for-woocommerce/
add_action( 'init', 'woocommerce_clear_cart_url' );
function woocommerce_clear_cart_url() {
  global $woocommerce;

	if ( isset( $_GET['empty-cart'] ) ) {
		$woocommerce->cart->empty_cart();
	}
}

// Add a custom user role


/* Remove Contact Form 7 Links from dashboard menu items if not admin */
if (!current_user_can( 'manage_options' )) {

  show_admin_bar( false );

	function remove_wpcf7() {
	    remove_menu_page( 'wpcf7' );
	}

	add_action('admin_menu', 'remove_wpcf7');

  function my_remove_menus() {

  	remove_menu_page( 'edit.php' );
    remove_menu_page( 'edit-comments.php' );
    remove_menu_page( 'profile.php' );
    remove_menu_page( 'tools.php' );
    remove_menu_page( 'post-new.php' );
    remove_menu_page( 'upload.php' );
    //remove_submenu_page( 'themes.php', 'theme-editor.php' );

  }

  add_action( 'admin_menu', 'my_remove_menus', 999 );




} // only disable if not admin

function wpse51004_add_menu_page() {
    add_menu_page('Some Page', 'Some Page', 'edit_comments', 'some-slug', 'wpse51004_some_page_callback');
};
add_action('admin_menu', 'wpse51004_add_menu_page');

function wpse51004_some_page_callback() {
  echo 'Hello, world!';
}

function remove_the_dashboard () {
if (current_user_can('manage_options')) {
return;}else {
global $menu, $submenu, $user_ID;
$the_user = new WP_User($user_ID);
reset($menu); $page = key($menu);
while ((__('Dashboard') != $menu[$page][0]) && next($menu))
$page = key($menu);
if (__('Dashboard') == $menu[$page][0]) unset($menu[$page]);
reset($menu); $page = key($menu);
while (!$the_user->has_cap($menu[$page][1]) && next($menu))
$page = key($menu);
if (preg_match('#wp-admin/?(index.php)?$#',$_SERVER['REQUEST_URI']) && ('index.php' != $menu[$page][2]))
wp_redirect(get_option('siteurl') . '/wp-admin/admin.php?page=options%2Fshipcalc.php');}
}
add_action('admin_menu', 'remove_the_dashboard');




/* Remove Contact Form 7 Links from dashboard menu items if not admin
if (!current_user_can( 'manage_options' )) {

$user_ID = get_current_user_id();
if($user_ID === 776) {

  show_admin_bar( false );

	function remove_wpcf7() {
	    remove_menu_page( 'wpcf7' );
	}

	add_action('admin_menu', 'remove_wpcf7');

  function my_remove_menus() {

  	remove_menu_page( 'edit.php' );
    remove_menu_page( 'edit-comments.php' );
    remove_menu_page( 'profile.php' );
    remove_menu_page( 'tools.php' );
    remove_menu_page( 'post-new.php' );
    remove_menu_page( 'edit.php?post_type=slides' );
    //remove_submenu_page( 'themes.php', 'theme-editor.php' );

  }

  add_action( 'admin_menu', 'my_remove_menus', 999 );


    } // only when current user is shipping admin id = 776
} // only disable if not admin

function remove_the_dashboard () {
if (current_user_can('manage_options')) {
return;}else {

$user_ID = get_current_user_id();
if($user_ID === 776) {

global $menu, $submenu, $user_ID;
$the_user = new WP_User($user_ID);
reset($menu); $page = key($menu);
while ((__('Dashboard') != $menu[$page][0]) && next($menu))
$page = key($menu);
if (__('Dashboard') == $menu[$page][0]) unset($menu[$page]);
reset($menu); $page = key($menu);
while (!$the_user->has_cap($menu[$page][1]) && next($menu))
$page = key($menu);
if (preg_match('#wp-admin/?(index.php)?$#',$_SERVER['REQUEST_URI']) && ('index.php' != $menu[$page][2]))
wp_redirect(get_option('siteurl') . '/wp-admin/admin.php?page=options%2Fshipcalc.php');}




} // only when current user is shipping admin id = 776
}
add_action('admin_menu', 'remove_the_dashboard');

function wps_admin_pages_redirect() {
      global $pagenow;
      $admin_pages = array(
                                'post-new.php',
                                'admin.php?page=easingsliderlite_edit_slideshow'
                        );

      if(in_array($pagenow, $admin_pages)){
        wp_redirect( admin_url('/') ); exit;
      }
}
$user_ID = get_current_user_id();
if($user_ID === 776) {
    add_action('admin_init', 'wps_admin_pages_redirect');
}


function hide_update_notice_to_all_but_admin_users()
{
    if (!current_user_can('update_core')) {
        remove_action( 'admin_notices', 'update_nag', 3 );
    }
}
add_action( 'admin_head', 'hide_update_notice_to_all_but_admin_users', 1 );



function custom_colors() {
   echo '<style type="text/css">
           .updated { display: none; }
         </style>';
}

add_action('admin_head', 'custom_colors');

*/


if ( defined('WC_VERSION') ) {
// ---------------------- WooCommerce active -------------------

   	/**
	 * Set Pagination for shortcodes custom loop on single-pages.
  	 * @uses $woocommerce_loop;
  	 */
  	add_action( 'pre_get_posts', 'kli_wc_pre_get_posts_query' );
  	function kli_wc_pre_get_posts_query( $query ) {
  		global $woocommerce_loop;

	  	// Get paged from main query only
	  	// ! frontpage missing the post_type
	  	if ( is_main_query() && ( $query->query['post_type'] == 'product' ) || ! isset( $query->query['post_type'] ) ){

		  if ( isset($query->query['paged']) ){
  			$woocommerce_loop['paged'] = $query->query['paged'];
		  }
	  	}

  		if ( ! $query->is_post_type_archive || $query->query['post_type'] !== 'product' ){
		  	return;
	  	}

  		$query->is_paged = true;
  		$query->query['paged'] = $woocommerce_loop['paged'];
  		$query->query_vars['paged'] = $woocommerce_loop['paged'];
  	}

	/** Prepare Pagination data for shortcodes on pages
  	 * @uses $woocommerce_loop;
	 */
	add_action( 'loop_end', 'kli_query_loop_end' );
	function kli_query_loop_end( $query ) {

		if ( ! $query->is_post_type_archive || $query->query['post_type'] !== 'product' ){
			return;
		}

		// Cache data for pagination
		global $woocommerce_loop;
		$woocommerce_loop['pagination']['paged'] = $woocommerce_loop['paged'];
		$woocommerce_loop['pagination']['found_posts'] = $query->found_posts;
		$woocommerce_loop['pagination']['max_num_pages'] = $query->max_num_pages;
		$woocommerce_loop['pagination']['post_count'] = $query->post_count;
		$woocommerce_loop['pagination']['current_post'] = $query->current_post;
	}
	/**
	 * Pagination for shortcodes on single-pages
	 * @uses $woocommerce_loop;
	 */
	add_action( 'woocommerce_after_template_part', 'kli_wc_shortcode_pagination' );
	function kli_wc_shortcode_pagination( $template_name ) {
		if ( ! ( $template_name === 'loop/loop-end.php' && is_page() ) ){
			return;
		}
		global $wp_query, $woocommerce_loop;
		if ( ! isset( $woocommerce_loop['pagination'] ) ){
			return;
		}
		$wp_query->query_vars['paged'] = $woocommerce_loop['pagination']['paged'];
		$wp_query->query['paged'] = $woocommerce_loop['pagination']['paged'];
		$wp_query->max_num_pages = $woocommerce_loop['pagination']['max_num_pages'];
		$wp_query->found_posts = $woocommerce_loop['pagination']['found_posts'];
		$wp_query->post_count = $woocommerce_loop['pagination']['post_count'];
		$wp_query->current_post = $woocommerce_loop['pagination']['current_post'];

		// Custom pagination function or default woocommerce_pagination()
		kli_woocommerce_pagination();
	}
	/**
	 * Custom pagination for WooCommerce instead the default woocommerce_pagination()
	 * @uses plugin Prime Strategy Page Navi, but added is_singular() on #line16
	 */
	remove_action('woocommerce_after_shop_loop', 'woocommerce_pagination', 10);
	add_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination_modified', 10);
	function woocommerce_pagination_modified() {
		woocommerce_pagination();
	}
}// END WOOCOMMERCE
