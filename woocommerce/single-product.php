<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

<?php //do_action( 'woocommerce_before_main_content' ); ?>

<div class="row">
	<div class="grid-three-fourths grid-flip">

		<?php woocommerce_breadcrumb(); ?>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php wc_get_template_part( 'content', 'single-product' ); ?>

		<?php endwhile; // end of the loop. ?>

	<?php // do_action( 'woocommerce_after_main_content' ); ?>
	<?php // do_action( 'woocommerce_sidebar' ); ?>

	</div><!-- grid-three-fourths -->
	<div class="grid-fourth widgets">
		<div id="productRange" class="widget">
					<?php
						// if(function_exists('woocommerce_current_category_vj')) {
						// 	woocommerce_current_category_vj();
						// }
							$terms1 = get_the_terms( get_the_ID(), 'product_cat' );
							query_posts( 'posts_per_page=20' );
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
		<div class="widget">
			<h3 class="widget-title">Recommended</h3>
				<?php
					if ( function_exists( 'woocommerce_upsell_display' ) ) {
						woocommerce_upsell_display();
					}
				?>
			<style media="screen">
				.widget .upsells h2 {
					display: none;
				}
			</style>
		</div>
		<div class="widget">
				<a href="<?php bloginfo('url'); ?>/join-us/"><img src="<?php bloginfo('template_directory'); ?>/dist/img/join_offer_list.jpg" alt="" title="" /></a><br/>
				<a href="<?php bloginfo('url'); ?>/sale/"><img src="<?php bloginfo('template_directory'); ?>/dist/img/shop_on_sale.jpg" alt="" title="" /></a><br/>
		</div>
	</div>
</div><!--row-->


<?php get_footer( 'shop' ); ?>
