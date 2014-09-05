<?php
/**
 * The default template for displaying content of post. Used for single.
 *
 * @author Usability Dynamics
 * @module wp-escalade  
 * @since wp-escalade 0.1.0
 */

global $wp_escalade;

?>
<div class="entry">
  <?php if (!is_front_page()) : ?>
    <h2><?php the_title(); ?></h2>
  <?php endif; ?>
  <div class="meta">
    <i class="icon-calendar"></i> <?php the_time('d-m-Y'); ?> <i class="icon-user"></i> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( "ID" ) ) ); ?>"><?php echo get_the_author(); ?></a> <i class="icon-folder-open"></i> <?php the_category(' '); ?> <span class="pull-right"><i class="icon-comment"></i> <a href="#comments"><?php comments_number('No Comments', 'One Comment', '% Comments'); ?></a></span>
  </div>
  <div class="bthumb2">
    <a href="<?php echo $wp_escalade->get_image_link_by_post_id(get_the_ID()); ?>"><img class="img-responsive" src="<?php echo $wp_escalade->get_image_link_by_post_id(get_the_ID(), array('width' => '200', 'height' => '150')); ?>" alt="" /></a>
  </div>
  <?php the_content(); ?>
  <div class="clearfix"></div>
</div>