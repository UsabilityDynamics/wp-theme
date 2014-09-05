<?php
/**
 * Top Navigation Menu.
 *
 * @author Usability Dynamics
 * @module wp-escalade  
 * @since wp-escalade 0.1.0
 */

global $wp_escalade;
?>
<!-- Navigation bar starts -->
<div class="navbar bs-docs-nav" role="banner">
  <div class="container">
    <div class="navbar-header">
      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
        <span class="sr-only"><?php _e( 'Toggle navigation', $wp_escalade->text_domain );  ?></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
      <?php
      wp_nav_menu( array(
        'theme_location'  => 'primary',
        'container'       => false,
        'menu_class'      => 'nav navbar-nav',
        'fallback_cb'     => false,
        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
        'depth'           => 2,
        'walker'          => \UsabilityDynamics\Theme\WP_Escalade::nav_menu()
      ));
      ?>
    </nav>
  </div>
</div>
<!-- Navigation bar ends -->