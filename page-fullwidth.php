<?php

/**
 * Template Name: fullwidth
 * Template for pages with no heading or meta data and full width with no sidebar. Only displays page content.
 * Useful for styling the page via the WordPress editor.
 */

get_header(); ?>


<?php if (have_posts()) : ?>

	<?php
		// Start the loop
		while (have_posts()) : the_post();

			// Insert the post content
			get_template_part( 'inc/content', 'Post Content' );
		?>
	<?php endwhile; ?>


<?php endif; ?>


<?php get_footer(); ?>
