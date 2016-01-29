<?php

/**
 * content.php
 * Template for post and page content.
 */

?>

<article class="clearfix">

	<header>
		<?php
			/**
			 * Headers
			 * Unlinked h1 for pages and invidual blog posts.
			 * Linked h1 for collections of posts.
			 */
		?>


		<?php if ( has_post_thumbnail() ) { ?>
			<figure><?php the_post_thumbnail(); ?></figure>
		<?php } ?>
		<?php woocommerce_breadcrumb(); ?>

		<?php if ( is_single() ) : ?>
			<h1><?php the_title(); ?></h1>
		<?php elseif ( is_page() ) : ?>
			<?php if ( is_page_template('page-plain.php') ) : ?>
				<h1><?php the_title(); ?></h1>
			<?php endif; ?>
		<?php else : ?>
				<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
		<?php endif; ?>

		<?php
			/**
			 * Add meta data for blog posts.
			 * 1. Published date
			 * 2. Author
			 * 3. Number of comments
			 * 4. Quick edit link
			 */
			if ( !is_page() ) :
		?>
			<!-- <aside>
				<p>
					<time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_time( 'F j, Y' ) ?></time> by <a href="<?php echo get_author_posts_url( get_the_author_meta('ID') ); ?>"><?php the_author(); ?> </a>/
					<a href="<?php comments_link(); ?>">
						<?php comments_number( __( 'Comment', 'keel' ), __( '1 Comment', 'keel' ), __( '% Comments', 'keel' ) ); ?>
					</a>
					<?php edit_post_link( __( 'Edit', 'keel' ), ' / ', '' ); ?>
				</p>
			</aside> -->
		<?php endif; ?>
	</header>

	<?php
		// The page or post content

		if ( is_single() ) :

			the_content();
		elseif ( is_page() ) :
			the_content();
		else : ?>
			<div class="excerpt">
				<?php the_excerpt('<p>' . __( 'Read More...', 'keel' ) . '</p>'); ?>
			</div>
		<?php endif;
	?>

	<?php if ( is_page() ) : ?>
		<?php
			// Add link to edit pages
			edit_post_link( __( 'Edit', 'keel' ), '<p>', '</p>' );
		?>
	<?php endif; ?>

	<?php if ( is_single() ) :
		//  comments_template();
 	endif; ?>

	<?php
		// If this is not the last post on the page, insert a divider
		if ( !keel_is_last_post($wp_query) ) :
	?>
	<?php endif; ?>
</article>
