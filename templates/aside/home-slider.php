<?php
/**
 * Flex Slider on Home Page
 * Shows Featured Listings ( WP-Property )
 *
 * @author Usability Dynamics
 * @module wp-escalade  
 * @since wp-escalade 0.1.0
 */

global $wp_escalade;

$the_query = new WP_Query( array(
  'post_type' => 'property',
  'post_status' => 'publish',
  'meta_key' => 'featured', 
  'meta_value' => 'true', 
  'orderby' => 'rand', 
  'order' => 'ASC',
  'posts_per_page' => '5' 
) );

?>
<?php if( $the_query->have_posts() ) : ?>
<!-- Slider starts -->
<div class="full-slider">
    
  <!-- Slider (Flex Slider) -->
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="flexslider">
          <ul class="slides">
            <?php $wp_escalade->set_excerpt_filter( '30', 'length' ); ?>
            <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
              <li>
                <div class="flex-image flex-back">
                  <img class="img-responsive" src="<?php echo $wp_escalade->get_image_link_by_post_id( get_the_ID(), array( 'width' => '9999', 'height' => '310' ) ); ?>" alt="" />
                  <div class="flex-caption">
                    <h4><?php the_title(); ?></h4>
                    <p><?php the_excerpt(); ?></p>
                    <div class="button">
                      <a href="<?php the_permalink(); ?>"><i class="icon-circle-arrow-down"></i> <?php _e( 'More Details', $wp_escalade->text_domain ); ?></a>
                    </div>
                  </div>
                </div>
              </li>
            <?php endwhile; ?>
            <?php $wp_escalade->set_excerpt_filter( false, 'length' ); ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Slider Ends -->
<?php endif; ?>