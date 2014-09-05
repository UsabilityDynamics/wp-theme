<?php
/**
 * Slideshow
 * Shows Featured Listings ( WP-Property )
 *
 * @author Usability Dynamics
 * @module wp-escalade  
 * @since wp-escalade 0.1.0
 */

//$ids = WPP_F::get_properties( "featured=true&property_type=all&pagi=0--5&sort_by=random" );
global $wp_escalade;

$the_query = new WP_Query( array(
  'post_type' => 'property',
  'post_status' => 'publish',
  'meta_key' => 'featured', 
  'meta_value' => 'true', 
  'orderby' => 'rand', 
  'order' => 'ASC',
  'posts_per_page' => '3' 
) );

?>
<?php if( $the_query->have_posts() ) : ?>
<div class="slideshow-featured">
  <div id="s1">
    <?php $wp_escalade->set_excerpt_filter( '40', 'length' ); ?>
    <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
      <div class="item clearfix">
        <div class="home-prod-img">
          <a href="<?php the_permalink(); ?>">
            <img class="img-responsive" data-id="<?php echo get_the_ID(); ?>" data-thumbnail-id="<?php echo get_post_meta( get_the_ID(), '_thumbnail_id', true ); ?>" src="<?php echo reset( wp_get_attachment_image_src( get_post_meta( get_the_ID(), '_thumbnail_id', true ) ) ); ?>" alt="" />
          </a>
        </div>
        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <p><?php the_excerpt(); ?></p>
      </div>
    <?php endwhile; ?>
    <?php $wp_escalade->set_excerpt_filter( false, 'length' ); ?>
  </div>
</div>
<?php endif; ?>