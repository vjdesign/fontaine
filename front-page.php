<?php

/**
 * Template Name: Front Page Template
 * Template for homepage with no heading or meta data. Only displays page content.
 * Useful for styling the page via the WordPress editor.
 */

get_header(); ?>


<?php if (have_posts()) : ?>

		<?php
			// Start the loop
			while (have_posts()) : the_post();
		?>

		<div class="desktop clear">
			<?php if ( function_exists( 'show_simpleresponsiveslider' ) ) show_simpleresponsiveslider(); ?>
			<?php //echo do_shortcode( '[responsive_slider]' ); ?>
		</div>

		<div class="rslides_container mobile">
			<ul class="rslides rslides2>
				<li><a href="http://fontaineind.com.au/product/above-counter-basins/beckham-ceramic-basin-black/" title=""><img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/img/mobile-banner-beckham-black-basin-buy.jpg" alt="banner-beckham-basin-sale-bathroom-1000×270-final"></a></li>
				<li><a href="http://fontaineind.com.au/?s=hardwood&amp;x=0&amp;y=0&amp;post_type=product" title=""><img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/img/mobile-banner-timber-top-vanity-units.jpg" alt="banner-timber-vanity-sale-bathroom-1000×270-final1"></a></li>
				<li><a href="http://fontaineind.com.au/?s=emerson&amp;x=0&amp;y=0&amp;post_type=product" title=""><img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/img/mobile-banner-emerson-black-chrome.jpg" alt="banner-emerson-tap-ware-sale-black-chrome-bathroom-1000×270-final1"></a></li>
			</ul>
			<a href="#" class="rslides_nav rslides2_nav prev">Back</a><a href="#" class="rslides_nav rslides2_nav next">Next</a>
		</div>

		<div class="row mobile-only">
			<div class="grid-half">
				<?php echo do_shortcode('[woo_products_by_tags tags=”new”]'); ?>
			</div>
			<div class="grid-half">
				<?php echo do_shortcode('[woo_products_by_tags tags=”new”]'); ?>
			</div>
		</div>

		<?php
			// Insert the post content
			the_content();
		?>
	<?php endwhile; ?>

<?php endif; ?>

<?php get_footer(); ?>
