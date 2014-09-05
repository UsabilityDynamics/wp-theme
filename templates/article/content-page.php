<?php
/**
 * The default template for displaying content of post. Used for single.
 *
 * @author Usability Dynamics
 * @module wp-escalade  
 * @since wp-escalade 0.1.0
 */
?>
<div class="entry">
  <?php if (!is_front_page()) : ?>
    <h2><?php the_title(); ?></h2>
  <?php endif; ?>
  <?php the_content(); ?>
  <div class="clearfix"></div>
  <?php edit_post_link( __( 'Edit', $wp_escalade->text_domain ) ); ?>
</div>