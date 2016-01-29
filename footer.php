<?php

/**
 * footer.php
 * Template for footer content.
 */

?>

			</main><!-- /#main -->
	<?php if ( is_page_template('woocommerce.php') ) : ?>
		</div><!-- end of .grid-three-fourths -->
		<div class="grid-fourth">
			<aside>
					<?php get_sidebar(); ?>
			</aside>
		</div>
 <?php elseif ( !is_page_template('page-plain.php') ) : ?>
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
					<?php wp_nav_menu( array( 'theme_location' => 'footer_find_out_about', 'menu_class' => 'list-unstyled' ) ); ?>
				</div>
				<div class="grid-fifth">
					<h3>resources</h3>
					<?php wp_nav_menu( array( 'theme_location' => 'footer_resources', 'menu_class' => 'list-unstyled' ) ); ?>
				</div>
				<div class="grid-fifth">
					<h3>what's in store</h3>
					<?php wp_nav_menu( array( 'theme_location' => 'footer_whatsinstore_1', 'menu_class' => 'list-unstyled' ) ); ?>
				</div>
				<div class="grid-fifth">
					<br>
					<?php wp_nav_menu( array( 'theme_location' => 'footer_whatsinstore_2', 'menu_class' => 'list-unstyled' ) ); ?>
				</div>
				<div class="grid-fifth">
					<br>
					<?php wp_nav_menu( array( 'theme_location' => 'footer_whatsinstore_3', 'menu_class' => 'list-unstyled' ) ); ?>
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
							<?php wp_nav_menu( array( 'theme_location' => 'footer_page_bottom', 'menu_class' => 'list-inline desktop' ) ); ?>
							<?php wp_nav_menu( array( 'theme_location' => 'footer_page_bottom_mobile', 'menu_class' => 'list-inline mobile' ) ); ?>
						</div>
						<div class="grid-two-thirds">
							<?php
								// Insert copyright info
								printf( __( 'Copyright &copy; %1$s %2$s. All rights reserved. It\'s a <a href="http://vjdesign.com.au" target="_blank">vjdesign</a>.', 'keel' ), date( 'Y' ), get_bloginfo( 'name' ) );
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
