<?php
/**
 * Under Content Navigation Menu.
 * Includes:
 * - Left (Under Content)
 * - Right (Under Content)
 *
 * @author Usability Dynamics
 * @module wp-escalade  
 * @since wp-escalade 0.1.0
 */

global $wp_escalade;
?>
<div class="home-links">
  <div class="col-l">
    <h5><?php echo $wp_escalade->get_menus_name( 'content_left' ); ?></h5>
    <?php
      wp_nav_menu( array(
        'theme_location'  => 'content_left',
        'container'       => false,
        'fallback_cb'     => false,
        'depth'           => 1,
      ));
    ?>
  </div>
  <div class="col-r">
    <h5><?php echo $wp_escalade->get_menus_name( 'content_right' ); ?></h5>
    <?php
      wp_nav_menu( array(
        'theme_location'  => 'content_right',
        'container'       => false,
        'fallback_cb'     => false,
        'depth'           => 1,
      ));
    ?>
  </div>
  <div class="clearfix"></div>
</div>