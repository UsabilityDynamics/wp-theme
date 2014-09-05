<?php
/**
 * Copyright Navigation Menu.
 *
 * @author Usability Dynamics
 * @module wp-escalade  
 * @since wp-escalade 0.1.0
 */

$menu = wp_nav_menu( array(
  'theme_location'  => 'copyright',
  'container'       => false,
  'fallback_cb'     => false,
  'items_wrap'      => '%3$s',
  'echo'            => false,
  'depth'           => 1
));

echo preg_replace( array( '#<li[^>]*>#', '#</li>#' ), array( '<span class="item">', ' <span class="delimiter">|</span> </span>' ), $menu );
?>