<?php

/**
 * footer.php
 * Template for footer content.
 */

?>


			</main><!-- /#main -->

 <?php if ( is_page_template('page-fullwidth.php') ) : ?>
 	</div><!-- .grid-full -->
 <?php elseif ( is_page_template('front-page.php') ) : ?>
 	</div><!-- .grid-full -->
 <?php else : ?>
 	 </div><!-- end of .grid-three-fourths -->
	 <div class="grid-fourth">
		 <aside>
				 <?php get_sidebar(); ?>
		 </aside>
	 </div>
 <?php endif; ?>


	</div> <!-- end of .row around main and aside-->

 <?php if ( is_page_template('front-page.php') ) : ?>
	<div class="row">
		<a class="grid-third" href="<?php bloginfo('url'); ?>/shop/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/img/start_shopping.jpg" /></a>
		<a class="grid-third" href="<?php bloginfo('url'); ?>/join-us/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/img/join_offer_list.jpg" /></a>
		<a class="grid-third" href="<?php bloginfo('url'); ?>/sale/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/img/shop_on_sale.jpg" /></a>
	</div>
<?php endif; ?>
		<footer class="footer">
			<div class="row footer-menus">
				<div class="grid-fifth">
					<h3>find out about</h3>
					<ul class="list-unstyled">
						<li><a href="<?php echo get_home_url(); ?>/about-us/">About Us</a></li>
						<li><a href="<?php echo get_home_url(); ?>/delivery/">Delivery</a></li>
						<li><a href="<?php echo get_home_url(); ?>/pick-up/">Pick Up</a></li>
						<li><a href="<?php echo get_home_url(); ?>/payment/">Payment</a></li>
						<li><a href="<?php echo get_home_url(); ?>/faqs/">FAQs</a></li>
					</ul>
				</div>
				<div class="grid-fifth">
					<h3>resources</h3>
					<ul class="list-unstyled">
						<li><a href="<?php echo get_home_url(); ?>/news/">News &amp; Events</a></li>
						<li><a href="<?php echo get_home_url(); ?>/news/">Blog [Trends &amp; Advice]</a></li>
						<li><a href="<?php echo get_home_url(); ?>/testimonials/">Testimonials</a></li>
						<li><a href="<?php echo get_home_url(); ?>/give-us-feedback/">Give Us Feedback</a></li>
						<li><a target="_blank" href="<?php echo get_home_url(); ?>/pdf/Terms%20of%20Trade_Fontaine_Final.pdf">Terms &amp; Conditions</a></li>
					</ul>
				</div>
				<div class="grid-fifth">
					<h3>what's in store</h3>
					<ul class="list-unstyled">
						<li><a href="<?php echo get_home_url(); ?>/product-category/vanity-units/">Vanity Units</a></li>
						<li><a href="<?php echo get_home_url(); ?>/product-category/basins/">Basins</a></li>
						<li><a href="<?php echo get_home_url(); ?>/product-category/toilets/">Toilets</a></li>
						<li><a href="<?php echo get_home_url(); ?>/product-category/storage/mirror-cabinet/">Mirror Cabinets</a></li>
						<li><a href="<?php echo get_home_url(); ?>/product-category/tapware/">Tapware</a></li>
					</ul>
				</div>
				<div class="grid-fifth">
					<br>
					<ul class="list-unstyled">
						<li><a href="<?php echo get_home_url(); ?>/product-category/shower/tapware-shower/">basin mixer taps</a></li>
						<li><a href="<?php echo get_home_url(); ?>/product-category/toilets/">back to wall toilets</a></li>
						<li><a href="<?php echo get_home_url(); ?>/product-category/kitchen/tapware-kitchen-tapware/">kitchen taps</a></li>
						<li><a href="<?php echo get_home_url(); ?>/product-category/shower/baths/">Baths</a></li>
						<li><a href="<?php echo get_home_url(); ?>/product-category/shower/bases/">Bases</a></li>
						<li><a href="<?php echo get_home_url(); ?>/product-category/laundry/tapware-laundry/">Laundry Taps</a></li>
					</ul>
				</div>
				<div class="grid-fifth">
					<br>
					<ul class="list-unstyled">
						<li><a href="<?php echo get_home_url(); ?>/product-category/accessories/">accessories</a></li>
						<li><a href="<?php echo get_home_url(); ?>/product-category/shower/tapware-shower/">shower grates</a></li>
						<li><a href="<?php echo get_home_url(); ?>/product-category/basins/above-counter-basins/">above counter basins</a></li>
						<li><a href="<?php echo get_home_url(); ?>/product-category/toilets/wall-toilets/">in wall toilets</a></li>
						<li><a href="<?php echo get_home_url(); ?>/product-category/shower/tapware-shower/">shower heads</a></li>
						<li><a href="<?php echo get_home_url(); ?>/product-category/laundry/troughs/">laundry troughs</a></li>
					</ul>
				</div>
			</div>

			<div id="social" class="row">
				<?php
					// Get social menu
					 get_template_part( 'inc/nav-social', 'Social Menu' );
				?>
			</div>

			<div class="row">
				<div class="grid-full">
					<div class="showroom desktop">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/img/bottom-showroom-ad.jpg" alt="" />
						<p>
							Melbourne Showroom  |  8-10 Conquest Way Hallam Victoria Australia 3803  |  03 9703 1345
						</p>
						<p>
							Open: Monday to Saturday 9am to 5pm
						</p>
					</div>
					<div class="copyright">
						<div class="grid-third">
							<a href="<?php echo get_home_url(); ?>/">Home</a> | <a href="<?php echo get_home_url(); ?>/contact-us/">Contact us</a>
						</div>
						<div class="grid-two-thirds">
							<?php
								// Insert copyright info
								printf( __( 'Copyright &copy; %1$s %2$s. All rights reserved. Developed by <a href="http://vjdesign.com.au" target="_blank">vjdesign</a>.', 'keel' ), date( 'Y' ), get_bloginfo( 'name' ) );
							?>
						</div>
					</div>
				</div>
			</div>
		</footer>


		<div><!-- end of .row -->
		</div><!-- end of .inner-wrapper -->


	</div><!-- end of .container -->
	<?php wp_footer(); ?>
	</body>
</html>
