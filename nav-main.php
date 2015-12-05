<?php

/**
 * nav-main.php
 * Template for site navigation.
 * You may wish to use `wp_nav_menu()` here, or alternatively, hand-code your navigation.
 * http://codex.wordpress.org/Function_Reference/wp_nav_menu
 */

?>

<div class="grid-full">
  <div class="nav-wrap">
    <nav id="site-navigation" class="main-navigation" role="navigation">
      <a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentytwelve' ); ?>"><?php _e( 'Skip to content', 'twentytwelve' ); ?></a>
      <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
    </nav><!-- #site-navigation -->
  </div>
</div>

<script type="text/javascript">
/**
* navigation.js
*
* Handles toggling the navigation menu for small screens.
*/
( function() {
var nav = document.getElementById( 'site-navigation' ), menu;
var button = document.getElementById( 'toggleMenu' );

if ( ! nav )
  return;
menu   = nav.getElementsByTagName( 'ul' )[0];
if ( ! button )
  return;

// Hide button if menu is missing or empty.
if ( ! menu || ! menu.childNodes.length ) {
  button.style.display = 'none';
  return;
}

button.onclick = function() {
  if ( -1 == menu.className.indexOf( 'nav-menu' ) )
    menu.className = 'nav-menu';

  if ( -1 != button.className.indexOf( 'toggled-on' ) ) {
    button.className = button.className.replace( ' toggled-on', '' );
    menu.className = menu.className.replace( ' toggled-on', '' );
  } else {
    button.className += ' toggled-on';
    menu.className += ' toggled-on';
  }
};
} )();
</script>
