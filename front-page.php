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
		<div class="desktop margin-top clearfix">
			<?php if ( function_exists( 'show_simpleresponsiveslider' ) ) { show_simpleresponsiveslider(); } ?>
		</div>

		<div class="rslides_container mobile">
			<ul class="rslides rslides2">
				<li><a href="http://fontaineind.com.au/product/above-counter-basins/beckham-ceramic-basin-black/" title=""><img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/img/mobile-banner-beckham-black-basin-buy.jpg" alt="banner-beckham-basin-sale-bathroom-1000×270-final"></a></li>
				<li><a href="http://fontaineind.com.au/?s=hardwood&amp;x=0&amp;y=0&amp;post_type=product" title=""><img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/img/mobile-banner-timber-top-vanity-units.jpg" alt="banner-timber-vanity-sale-bathroom-1000×270-final1"></a></li>
				<li><a href="http://fontaineind.com.au/?s=emerson&amp;x=0&amp;y=0&amp;post_type=product" title=""><img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/img/mobile-banner-emerson-black-chrome.jpg" alt="banner-emerson-tap-ware-sale-black-chrome-bathroom-1000×270-final1"></a></li>
			</ul>
			<a href="#" class="rslides_nav rslides2_nav prev">Back</a><a href="#" class="rslides_nav rslides2_nav next">Next</a>
		</div>

		<div class="row mobile-only">
			<div id="sliderheading">scroll though our favourite products below ...</div>
			<div class="grid-half">
				<?php echo do_shortcode('[woo_products_by_tags tags=”new”]'); ?>
			</div>
			<div class="grid-half">
				<?php echo do_shortcode('[woo_products_by_tags tags=”new”]'); ?>
			</div>
		</div>

		<div id="featured_section" class="row desktop-only" data-right-height>

				<div class="grid-third" data-right-height-content><div class="clearfix">
					<h3><?php echo get_option("featured_project_title1"); ?></h3>
					<div class="fimage">
						<?php
						if(get_option("featured_project_embedvideo1")==true)
						{
							echo get_option("featured_project_embedvideo1");
						}
						else
						{
						?>
						<img src="<?php echo get_option("featured_project_image_url_1"); ?>" />
						<?php
						}
						?>
					</div>
					<div class="text">
						<p><?php echo get_option("featured_project_text1"); ?></p>

						<a class="find-out-more" href="<?php echo get_option("featured_project_url1"); ?>">find out more &#187;</a>
					</div></div>
				</div>

				<div class="grid-third" data-right-height-content><div class="clearfix">
					<h3><?php echo get_option("featured_project_title2"); ?></h3>
					<div class="fimage">
						<?php
						if(get_option("featured_project_embedvideo2")==true)
						{
							echo get_option("featured_project_embedvideo2");
						}
						else
						{
						?>
						<img src="<?php echo get_option("featured_project_image_url_2"); ?>" />
						<?php
						}
						?>
					</div>
					<div class="text">
						<p>
							<?php echo get_option("featured_project_text2"); ?>
						</p>

							<a class="find-out-more" href="<?php echo get_option("featured_project_url2"); ?>">find out more &#187;</a>
					</div></div>
				</div>

				<div class="grid-third" data-right-height-content><div class="clearfix">
					<h3><?php echo get_option("featured_project_title3"); ?></h3>
					<div class="fimage">
						<?php
						if(get_option("featured_project_embedvideo3")==true)
						{
							echo get_option("featured_project_embedvideo3");
						}
						else
						{
						?>
						<img src="<?php echo get_option("featured_project_image_url_3"); ?>" />
						<?php
						}
						?>
					</div>
					<div class="text">
						<p>
							<?php echo get_option("featured_project_text3"); ?>
						</p>

							<a class="find-out-more" href="<?php echo get_option("featured_project_url3"); ?>">find out more &#187;</a>
						</div></div>
				</div>

			</div>

		<?php
			// Insert the post content
			the_content();
		?>
	<?php endwhile; ?>

<?php endif; ?>

<?php get_footer(); ?>
