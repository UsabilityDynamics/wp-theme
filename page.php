<?php get_template_part('templates/page/header', get_post_type()); ?>

<div class="blog">
  <div class="row">
    <div class="col-md-12">

      <div class="row">
        <div class="posts">
          <?php while ( have_posts() ) : the_post(); ?>
            <?php get_template_part('templates/article/page', 'header'); ?>
            <?php get_template_part('templates/article/content', get_post_type()); ?>
            <?php get_template_part('templates/article/comment', get_post_type()); ?>
          <?php endwhile; ?>
        </div>
      </div>

      <?php if( is_active_sidebar( 'sidebar-post' ) ) : ?>
        <div class="col-md-4 col-sm-4">
          <div class="sidebar">
            <?php dynamic_sidebar('sidebar-post'); ?>
          </div>
        </div>
      <?php endif; ?>

    </div>
  </div>
</div>

<?php get_template_part('templates/page/footer', get_post_type()); ?>
