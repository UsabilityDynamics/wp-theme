<?php
/**
 * Under Content Navigation Menu.
 * Includes:
 * - Left (Footer)
 * - Right (Footer)
 *
 * @author Usability Dynamics
 * @module wp-escalade  
 * @since wp-escalade 0.1.0
 */

global $wp_escalade;
?>
<div class="fwidget">
  <div class="col-l">
    <h6><?php echo $wp_escalade->get_menus_name( 'footer_left' ); ?></h6>
    <?php
      wp_nav_menu( array(
        'theme_location'  => 'footer_left',
        'container'       => false,
        'fallback_cb'     => false,
        'depth'           => 1,
      ));
    ?>
  </div>

  <div class="col-r">
    <h6><?php echo $wp_escalade->get_menus_name( 'footer_right' ); ?></h6>
    <?php
      wp_nav_menu( array(
        'theme_location'  => 'footer_right',
        'container'       => false,
        'fallback_cb'     => false,
        'depth'           => 1,
      ));
    ?>
  </div>

</div>