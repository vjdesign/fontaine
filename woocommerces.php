<?php

/**
 * woocommerce.php
 * Template for woocommerce pages.
 */

get_header(); ?>

<?php

  global $wp_query;
  $cat = $wp_query->get_queried_object(); // get the query object
  $curnt_cat_id =$cat->term_id;
?>

<div class="grid-three-fourths grid-flip">
  <main id="main">
<div class="woocommerce">
<?php // woocommerce_breadcrumb(); ?>

<?php
/**
 * Output WooCommerce content - disbled.
 *
 *
 */
function woocommerce_content_modified() {

    if ( is_singular( 'product' ) ) {

        while ( have_posts() ) : the_post();

            wc_get_template_part( 'content', 'single-product' );

        endwhile;

    } else { ?>

        <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>

            <h1 class="page-title"><?php woocommerce_page_title(); ?></h1>

        <?php endif; ?>

        <?php do_action( 'woocommerce_archive_description' ); ?>

        <?php if ( have_posts() ) : ?>

            <?php do_action('woocommerce_before_shop_loop'); ?>

            <?php woocommerce_product_loop_start(); ?>

                <?php woocommerce_product_subcategories(); ?>

                <?php while ( have_posts() ) : the_post(); ?>

                    <?php wc_get_template_part( 'content', 'product' ); ?>

                <?php endwhile; // end of the loop. ?>

            <?php woocommerce_product_loop_end(); ?>

            <?php
							do_action('woocommerce_after_shop_loop');
							if ( function_exists( 'woocommerce_pagination' ) ) { woocommerce_pagination(); }
						?>

						<?php

							$cat_extra_content = get_option("product_cat_".$curnt_cat_id."_category_extra_content");
							$extra_content = explode("<!--more-->",$cat_extra_content);

							if(!empty($extra_content[1])) {
								echo "<article>".$extra_content[0]." <a class='more-link'>Read More</a><div class='more-content'>".$extra_content[1]."</div></article>";
							} else {
								echo "<article>".$extra_content[0]."</article>";
							}
						?>

        <?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

            <?php wc_get_template( 'loop/no-products-found.php' ); ?>

        <?php endif;

    }
}
if ( function_exists( 'woocommerce_content_modified' ) ) {
	 woocommerce_content_modified();
}

?>
</div>
</main>

</div><!-- end of .grid-three-fourths -->
<div class="grid-fourth">
  <aside>
      <?php get_sidebar('wc'); ?>
  </aside>
</div>

<?php get_footer(); ?>
