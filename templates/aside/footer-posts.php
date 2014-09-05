<?php
/**
 * Recent Properties
 *
 * @author Usability Dynamics
 * @module wp-escalade  
 * @since wp-escalade 0.1.0
 */

global $wp_escalade;

$the_query = new WP_Query( array(
  'post_type' => class_exists( 'WPP_F' ) ? 'property' : 'post',
  'post_status' => 'publish',
  'orderby' => 'modified', 
  'order' => 'DESC',
  'posts_per_page' => '5' 
) );
?>
<?php if( $the_query->have_posts() ) : ?>
  <div class="fwidget">
    <h6><?php printf( __( 'Recent %s', $wp_escalade->text_domain ), class_exists( 'WPP_F' ) ? WPP_F::property_label( 'plural' ) : 'Posts' ); ?></h6>
    <ul>
      <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
      <?php endwhile; ?>
    </ul>
  </div>
<?php endif; ?>
