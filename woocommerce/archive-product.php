<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

	<?php
		/**
		 * woocommerce_before_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		// do_action( 'woocommerce_before_main_content' );
	?>

	<div class="row">
		<div class="grid-three-fourths grid-flip">

			<?php woocommerce_breadcrumb(); ?>

		<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>

			<h1 class="page-title"><?php woocommerce_page_title(); ?></h1>

		<?php endif; ?>

		<?php
			/**
			 * woocommerce_archive_description hook
			 *
			 * @hooked woocommerce_taxonomy_archive_description - 10
			 * @hooked woocommerce_product_archive_description - 10
			 */
			do_action( 'woocommerce_archive_description' );
		?>

		<?php if ( have_posts() ) : ?>

			<?php
				/**
				 * woocommerce_before_shop_loop hook
				 *
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */
				do_action( 'woocommerce_before_shop_loop' );
			?>

			<?php woocommerce_product_loop_start(); ?>

				<?php woocommerce_product_subcategories(); ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php wc_get_template_part( 'content', 'product' ); ?>

				<?php endwhile; // end of the loop. ?>

			<?php woocommerce_product_loop_end(); ?>

			<?php
				/**
				 * woocommerce_after_shop_loop hook
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );
			?>

		<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

			<?php wc_get_template( 'loop/no-products-found.php' ); ?>

		<?php endif; ?>

		</div><!-- grid-three-fourths -->
		<div class="grid-fourth widgets">
			<div id="productRange" class="widget">

					<?php
						global $wp_query;
						// get the query object
						$cat = $wp_query->get_queried_object();
						$curnt_cat_id =$cat->term_id;
						$cat_extra_content = get_option("product_cat_".$curnt_cat_id."_category_extra_content");
						// echo "<h3 class='prange_title'><a href='" . get_term_link( $cat->slug, 'product_cat' ) . "' >" . $cat->name . "</a></h3>";

						//echo do_shortcode('[product_categories_list_vj number="12" parent="'. $curnt_cat_id .'"]');

						echo do_shortcode('[product_category category="' . $curnt_cat_id . '"]');
						echo "blah";
					?>

					<div id="productRange" class="widget">
								<?php

										$terms1 = get_the_terms( get_the_ID(), 'product_cat' );
										query_posts( 'posts_per_page=100' );
										foreach ( $terms1 as $term )
										{
											$catname = $term->name;
											$catslug = $term->slug;
											$url = get_term_link( $term->slug, 'product_cat' );
										}
										echo '<h3 class="widget-title"><a href="' . $url . '">' . $catname . '</a></h3>';

										echo do_shortcode('[product_category_extended category="'.$catslug.'"]');
										?>
					</div><!-- #productRange -->



				<?php if ( is_active_sidebar( 'sidebar-wc' )  ) : ?>
					<div id="secondary" class="sidebar widget-area" role="complementary">
						<?php dynamic_sidebar( 'sidebar-wc' ); ?>
					</div><!-- .sidebar .widget-area -->
				<?php endif; ?>

			</div><!-- #productRange -->
			<div class="widget">
				<h3>Price range:</h3>
				<?php if ( is_active_sidebar( 'wc-price-filter-vj' )  ) : ?>
					<div id="secondary" class="sidebar widget-area" role="complementary">
						<?php dynamic_sidebar( 'wc-price-filter-vj' ); ?>
					</div><!-- .sidebar .widget-area -->
				<?php endif; ?>

			</div>
			<div class="widget">
					<a href="<?php bloginfo('url'); ?>/join-us/"><img src="<?php bloginfo('template_directory'); ?>/dist/img/join_offer_list.jpg" alt="" title="" /></a><br/>
					<a href="<?php bloginfo('url'); ?>/sale/"><img src="<?php bloginfo('template_directory'); ?>/dist/img/shop_on_sale.jpg" alt="" title="" /></a><br/>
			</div>
		</div>
	</div><!--row-->


	<?php
		/**
		 * woocommerce_after_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		// do_action( 'woocommerce_after_main_content' );
	?>

	<?php
		/**
		 * woocommerce_sidebar hook
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		// do_action( 'woocommerce_sidebar' );
	?>

<?php get_footer( 'shop' ); ?>
