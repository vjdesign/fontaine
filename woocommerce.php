<?php

/**
 * woocommerce.php
 * Template for woocommerce pages.
 */

get_header(); ?>
<div class="woocommerce">
	<?php
		woocommerce_breadcrumb();

		// Insert woocommerce products and pages
		woocommerce_content();
	?>
</div>
<?php get_footer(); ?>
