<?php
/**
 * Header Search Form
 *
 * @author Usability Dynamics
 * @module wp-escalade  
 * @since wp-escalade 0.1.0
 */
?>
<form method="get" class="form-inline" role="form" action="<?php echo esc_url( home_url( '/' ) ); ?>" >
  <div class="form-group">
    <input type="text" class="form-control" id="search" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo _x( 'Search for:', 'label' ); ?>" >
  </div>
  <button type="submit" class="btn btn-default"><?php echo esc_attr_x( 'Search', 'submit button' ); ?></button>
</form>
