<?php
/**
 * Categories Menu
 *
 * @author Usability Dynamics
 * @module wp-escalade  
 * @since wp-escalade 0.1.0
 */

global $wp_escalade;
?>
<div class="fwidget">
  <h6><?php _e( 'Categories', $wp_escalade->text_domain ); ?></h6>
  <ul><?php wp_list_categories( array( 'title_li' => false ) ); ?></ul>
</div>