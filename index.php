<?php

/**
 * index.php
 * Template for the page that displays all of your posts.
 */

get_header(); ?>
<?php if (have_posts()) : ?>

	<?php woocommerce_breadcrumb(); ?>

	<?php
		// Start the loop
		while (have_posts()) : the_post();
	?>

		<?php
			// Insert the post content
			get_template_part( 'inc/content', 'Post Content' );
		?>
	<?php endwhile; ?>


	<?php
		// Previous/next page navigation
		get_template_part( 'inc/nav-page', 'Page Navigation' );
	?>


<?php else : ?>
	<?php
		// If no content, include the "No post found" template
		get_template_part( 'inc/no-posts', 'No Posts Template' );
	?>
<?php endif; ?>


<?php get_footer(); ?>
