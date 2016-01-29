<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

get_header('shop'); ?>

	<?php
		/**
		 * woocommerce_before_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action('woocommerce_before_main_content');
	?>
		<div id="leftSection">
			
			<?php 
			if ( is_product_category() ) 
			{
			?>				
			<div id="productRange">
				<h3 class="prange_title">
					<?php
									 global $wp_query;
						// get the query object
						$cat = $wp_query->get_queried_object();
$curnt_cat_id =$cat->term_id;
$cat_extra_content = get_option("product_cat_".$curnt_cat_id."_category_extra_content");

//get_option('category_2_test_cat')
//echo get_option('product_cat_83_category_extra_data');
//$value = get_field('category_extra_data', 'category_'. $curnt_cat_id .'');
//echo the_field('category_extra_data', $curnt_cat_id)."hii";
//$test = get_category( $curnt_cat_id );
						echo "<a href='" . get_term_link( $cat->slug, 'product_cat' ) . "' >" . $cat->name . "</a>";
					?>
				</h3>
			<?php woocommerce_product_subcategories_new(); ?>
					<ul class="prange">

					<!--<?php while ( have_posts() ) : the_post(); ?>

						<?php woocommerce_get_template_part( 'content', 'product1' ); ?>

					<?php endwhile; // end of the loop. ?>
					-->
					<?php 
					global $sts;
					if ( $sts == "0")
					{
						$cname = $cat->slug;
						echo do_shortcode("[product_category1 category=$cname]"); 
					}
					
					?>
					</ul>
				<h3 class="prange_title">Price range:</h3>
				<input type="text" id="amount" style="border: 0; color: #f6931f; font-weight: bold;" value=""/><br/>
				<div id="slider-range"></div>
				<?php dynamic_sidebar( 'price-filter' ); ?> <br/><br/>
			</div>
			<?php } ?>
			<div class="container">
				<a href="<?php bloginfo('url'); ?>/join-us/"><img src="<?php bloginfo('template_directory'); ?>/images/join_offer_list_left.jpg" alt="" title="" /></a><br/>
				<a href="<?php bloginfo('url'); ?>/sale/"><img src="<?php bloginfo('template_directory'); ?>/images/shop_on_sale_left.jpg" alt="" title="" /></a><br/>
			</div>

		</div>
		<div id="rightSection">
			<?php woocommerce_breadcrumb(); ?>
			<h1 class="page-title">

				<?php if ( is_search() ) : ?>
					<?php
						printf( __( 'Search Results: &ldquo;%s&rdquo;', 'woocommerce' ), get_search_query() );
						if ( get_query_var( 'paged' ) )
							printf( __( '&nbsp;&ndash; Page %s', 'woocommerce' ), get_query_var( 'paged' ) );
					?>
				<?php elseif ( is_tax() ) : ?>
					<?php echo single_term_title( "", false ); ?>
				<?php else : ?>
					<?php
						$shop_page = get_post( woocommerce_get_page_id( 'shop' ) );
						echo apply_filters( 'the_title', ( $shop_page_title = get_option( 'woocommerce_shop_page_title' ) ) ? $shop_page_title : $shop_page->post_title );
					?>
				<?php endif; ?>
			</h1>
			
			<?php
				/**
				 * woocommerce_pagination hook
				 *
				 * @hooked woocommerce_pagination - 10
				 * @hooked woocommerce_catalog_ordering - 20
				 */
					do_action( 'woocommerce_pagination' );

			?>	

			<?php do_action( 'woocommerce_archive_description' ); ?>

			<?php if ( is_tax() ) : ?>
				<?php do_action( 'woocommerce_taxonomy_archive_description' ); ?>
			<?php elseif ( ! empty( $shop_page ) && is_object( $shop_page ) ) : ?>
				<?php do_action( 'woocommerce_product_archive_description', $shop_page ); ?>
			<?php endif; ?>

			<?php if ( have_posts() ) : ?>

				<?php do_action('woocommerce_before_shop_loop'); ?>

				<ul class="products">

					<?php woocommerce_product_subcategories(); ?>

					<?php while ( have_posts() ) : the_post(); ?>

						<?php woocommerce_get_template_part( 'content', 'product' ); ?>

					<?php endwhile; // end of the loop. ?>

				</ul>

				<?php do_action('woocommerce_after_shop_loop'); ?>

			<?php else : ?>

				<?php if ( ! woocommerce_product_subcategories( array( 'before' => '<ul class="products">', 'after' => '</ul>' ) ) ) : ?>

					<p><?php _e( 'No products found which match your selection.', 'woocommerce' ); ?></p>

				<?php endif; ?>

			<?php endif; 
			?>
			<?php
			$extra_content = explode("<!--more-->",$cat_extra_content);

			if(!empty($extra_content[1])){
			echo "<article>".$extra_content[0]." <a id='show_cont'>Read More</a><div id='hidden_content'>".$extra_content[1]."</div></article>";
			}else
			{
			echo "<article>".$extra_content[0]."</article>";
			}		
				?>
			<div class="clear"></div>
			<?php
				/**
				 * woocommerce_pagination hook
				 *
				 * @hooked woocommerce_pagination - 10
				 * @hooked woocommerce_catalog_ordering - 20
				 */
				woocommerce_pagination();
			?>

		<?php
			/**
			 * woocommerce_after_main_content hook
			 *
			 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
			 */
			do_action('woocommerce_after_main_content');
		?>

		</div>

<script>

$( window ).load(function() {
$("#hidden_content").hide();
$('#show_cont').click(function(){
$("#hidden_content").show();
$("#show_cont").hide();
$("#show_cont1").hide();
});
});
</script>
<?php get_footer('shop'); ?>
