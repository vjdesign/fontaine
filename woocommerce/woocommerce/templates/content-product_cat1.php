<?php
/**
 * The template for displaying product category thumbnails within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product_cat.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */
?>
<!--
<ul class="mainCategory">
<li>
	<a href="<?php echo get_term_link( $category->slug, 'product_cat' ); ?>">
		<h3 class="greytitle"><?php echo $category->name; ?></h3>
		<?php echo do_shortcode("[product_category1 category=$category->name order='desc']"); ?>
	</a>
</li>
</ul>
-->
<h3 class="greytitle">
<a href="<?php echo get_term_link( $category->slug, 'product_cat' ); ?>"><?php echo $category->name; ?></a>
</h3>
<ul class="prange">
<?php if ( $category->count > 0 ) : ?>

<?php
$value2 = $category->slug;
$args = array(
'post_type' => 'product',
'posts_per_page' => -1,
'product_cat' => $value2,
'orderby' => 'menu_order',
'order' => 'ASC',
);
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
<?php woocommerce_get_template_part( 'content', 'product1' ); ?>
<?php endwhile; ?>
<?php endif; ?>
</ul>