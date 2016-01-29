<?php

/**
 * content-sitemap.php
 * Template for sitemap content.
 */

?>

<?php if (have_posts()) : ?>

	<?php
		// Start the loop
		while (have_posts()) : the_post();
	?>
	<h3>Products</h3>

	<?php echo do_shortcode('[product_categories number="0" parent="0"]'); ?>

	<h3>Pages</h3>
	<ul><?php wp_list_pages("parent=0&title_li=" ); ?></ul>
<!-- <h3>Categories</h3>
	<ul><?php wp_list_cats('sort_column=name&optioncount=1&hierarchical=0&feed=RSS'); ?></ul> -->

<h3>All News Articles:</h3>
	<ul><?php $archive_query = new WP_Query('showposts=1000&cat=-8');
					while ($archive_query->have_posts()) : $archive_query->the_post(); ?>
							<li>
									<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a>
							 <!-- (<?php comments_number('0', '1', '%'); ?>) -->
							</li>
					<?php endwhile; ?>
	</ul>


	<?php endwhile; ?>

<?php endif; ?>
