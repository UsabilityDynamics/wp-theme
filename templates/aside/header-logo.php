<?php
/**
 * Header Logo
 *
 * @author Usability Dynamics
 * @module wp-escalade  
 * @since wp-escalade 0.1.0
 */

global $wp_escalade;

if( !$wp_escalade) {
  $wp_escalade = UsabilityDynamics\Theme\WP_Escalade::get_instance();
}

?>
<div class="logo">
  <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php $wp_escalade->the_bloginfo_name(); ?></a></h1>
  <div class="hmeta"><?php bloginfo( 'description' ); ?></div>
</div>
