<?php
/**
 * Copyright
 *
 * @author Usability Dynamics
 * @module wp-escalade  
 * @since wp-escalade 0.1.0
 */
 
global $wp_escalade;
?>
<div class="copy">
  <h6><?php $wp_escalade->the_bloginfo_name(); ?></h6>
  <p>Copyright &copy; <?php bloginfo( 'name' ); ?> - <?php get_template_part( 'templates/nav/copyright', get_post_type() ); ?></p>
</div>
