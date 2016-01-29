<?php

/**
 * header.php
 * Template for header content.
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>

	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title><?php the_title(); echo " | "; echo get_bloginfo('name'); ?></title>
		<?php if ( is_home () ) : ?><meta name="description" content="<?php bloginfo('description'); ?>"><?php endif; ?>
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		  ga('create', 'UA-46264438-11', 'auto');
		  ga('send', 'pageview');
		</script>
		<!-- Mobile Screen Resizing -->
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<meta http-equiv="cache-control" content="no-cache" />
		<meta http-equiv="pragma" content="no-cache" />
		<meta http-equiv="Content-Language" content="en-us" />
		<meta name="subject" content="Fontaine Industries PTY LTD.">
		<META NAME="copyright" content=" Copyright � 2013 Fontaine Industries PTY LTD.">
		<meta name="generator" content="Wordpress" />
		<meta http-equiv="Expires" content="0" />

		<link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.png">

		<!-- Feeds & Pings -->
		<link rel="alternate" type="application/rss+xml" title="<?php printf( __( '%s RSS Feed', 'keel' ), get_bloginfo( 'name' ) ); ?>" href="<?php bloginfo( 'rss2_url' ); ?>">
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<!-- Detection scripts before loading css and js -->
		<script type="text/javascript">
			!function(e,t,n){"use strict";var s=function(){var e,n=t,s=n.head||n.getElementsByTagName("head")[0]||n.documentElement,r=n.createElement("style"),a="@font-face { font-family: 'webfont'; src: 'https://'; }",c=!1,i=function(){var e=win.navigator.userAgent.toLowerCase(),t=e.match(/applewebkit\/([0-9]+)/gi)&&parseFloat(RegExp.$1),n=e.match(/w(eb)?osbrowser/gi),s=e.indexOf("windows phone")>-1&&win.navigator.userAgent.match(/IEMobile\/([0-9])+/)&&parseFloat(RegExp.$1)>=9,r=533>t&&e.indexOf("Android 2.1")>-1;return n||r||s}();if(r.type="text/css",s.insertBefore(r,s.firstChild),e=r.sheet||r.styleSheet,e&&!i)try{e.insertRule(a,0),c=e.cssRules[0].cssText&&/webfont/i.test(e.cssRules[0].cssText),e.deleteRule(e.cssRules.length-1)}catch(o){}return c},r=function(e){var n,s,r=t,a=r.documentElement,c=a.getElementsByTagName("head")[0],i=r.implementation||{hasFeature:function(){return!1}},o=r.createElement("style");return o.type="text/css",(c||a).insertBefore(o,(c||a).firstChild),s=o.sheet||o.styleSheet,s&&e?(n=i.hasFeature("CSS2","")?function(e){try{s.insertRule(e+"{ }",0),s.deleteRule(s.cssRules.length-1)}catch(t){return!1}return!0}:function(e){return s.cssText=e+" { }",0!==s.cssText.length&&!/unknown/i.test(s.cssText)&&0===s.cssText.indexOf(e)})(e):!1};s&&r(":before")&&(t.documentElement.className+=(t.documentElement.className?" ":"")+"font-face")}(window,document),function(e,t,n){"use strict";var s=!!t.createElementNS&&!!t.createElementNS("http://www.w3.org/2000/svg","svg").createSVGRect,r=-1===navigator.userAgent.indexOf("Opera Mini");s&&r&&(t.documentElement.className+=(t.documentElement.className?" ":"")+"svg")}(window,document);
		</script>
		<?php wp_head(); ?>

	</head>

	<body <?php body_class(); ?>>

		<div class="container">
			<header class="main-header">

			<a class="screen-reader screen-reader-focusable" href="#main">Skip to main content</a>
			<!-- Old Browser Warning -->
			<!--[if lt IE 9]>
				<section>
					<p>Did you know that your web browser is a bit old? Some of the content on this site might not work right as a result. <a href="http://whatbrowser.org">Upgrade your browser</a> for a faster, safer, and better web experience.</p>
				</section>
			<![endif]-->

			<div class="row">
				<div class="grid-half">

					<a href="<?php echo get_home_url(); ?>" title="Go to <?php bloginfo('name'); ?>"><h1 class="logo"><span></span><?php bloginfo('name'); ?></h1></a>

				</div>
				<div class="grid-half">


				<!-- https://docs.woothemes.com/document/show-cart-contents-total/ -->
				<div class="cart-container">
					<a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><?php echo sprintf (_n( '%d item', '%d items', WC()->cart->cart_contents_count ), WC()->cart->cart_contents_count ); ?> - <?php echo WC()->cart->get_cart_total(); ?></a>
				</div>

					<!-- <?php echo do_shortcode('[wpdreams_ajaxsearchlite]'); ?> -->

					<div class="mobilemenu clear">
						<button id="toggleMenu" class="btn menu-toggle"><?php _e( 'Menu', 'keel' ) ?>
							<svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 32 32"><path d="M2 6h28v6h-28zM2 14h28v6h-28zM2 22h28v6h-28z"></path>
								<span class="icon-fallback-text">Menu</span>
							</svg>
						</button>
						<?php get_template_part( 'inc/searchform', 'Search' ); ?>
						<a id="loginButton" class="btn mobile" href="<?php echo get_home_url(); ?>/my-account/">
							<span class=""><?php _e( 'Login', 'keel' ) ?> </span>
							<svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 32 32"><path d="M18 22.082v-1.649c2.203-1.241 4-4.337 4-7.432 0-4.971 0-9-6-9s-6 4.029-6 9c0 3.096 1.797 6.191 4 7.432v1.649c-6.784 0.555-12 3.888-12 7.918h28c0-4.030-5.216-7.364-12-7.918z"/></svg>
						</a>
					</div>
			</div>
		</div>
			<div class="row">
				<div class="grid-full">
					<?php
						// Get site navigation
						 get_template_part( 'inc/nav-main', 'Site Navigation' );
					?>
				</div>
			</div>
		</header>

	<div class="row">
				<?php if ( is_page_template('woocommerce.php') ) : ?>
					<div class="grid-three-fourths grid-flip">
				<?php elseif ( !is_page_template('page-plain.php') ) : ?>
					<div class="grid-full">
				<?php else : ?>
					<div class="grid-three-fourths grid-flip">
				<?php endif; ?>
					<main id="main">
