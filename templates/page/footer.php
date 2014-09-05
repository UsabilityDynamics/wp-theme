<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @author Usability Dynamics
 * @module wp-escalade  
 * @since wp-escalade 0.1.0
 */
?>
<div class="border"></div>

<!-- Product & links starts -->

  <div class="prod">
    <div class="row">
      <div class="col-md-4">
        <?php get_template_part( 'templates/nav/content', get_post_type() ); ?>
      </div>
      <div class="col-md-8"> 
        <?php get_template_part( 'templates/aside/slideshow-featured', get_post_type() ); ?>
      </div>
    </div>
  </div>

<!-- Product & links ends --> 

<!-- Color blocks starts -->

  <div class="color-blocks">
    <div class="row">

      <div class="col-md-4">

        <div class="c-block">

          <!-- Left column with color background -->
          <div class="col-l b-red">
            <!-- Link -->
            <a href="contactus.html">
              <!-- Icon -->
              <i class="icon-envelope-alt"></i>
              <!-- Text -->
              Contact
            </a>
          </div>

          <div class="col-r b-purple">
            <a href="aboutus.html">
              <i class="icon-user"></i>
              About
            </a>
          </div>

        </div>

        <div class="clearfix"></div>

      </div>
      
      <div class="col-md-4">

        <div class="c-block">

          <!-- Left column with color background -->
          <div class="col-l b-green">
            <!-- Link -->
            <a href="blog.html">
              <!-- Icon -->
              <i class="icon-comments"></i>
              <!-- Text -->
              Blog
            </a>
          </div>

          <div class="col-r b-blue">
            <a href="#">
              <i class="icon-facebook"></i>
              Facebook
            </a>
          </div>

        </div>

        <div class="clearfix"></div>

      </div>
      
      <div class="col-md-4">

        <div class="c-block">

          <!-- Left column with color background -->
          <div class="col-l b-lblue">
            <!-- Link -->
            <a href="#">
              <!-- Icon -->
              <i class="icon-twitter"></i>
              <!-- Text -->
              Twitter
            </a>
          </div>

          <div class="col-r b-orange">
            <a href="#">
              <i class="icon-google-plus"></i>
              Google Plus
            </a>
          </div>

        </div>

        <div class="clearfix"></div>

      </div>

    </div>
  </div>

<!-- Color blocks ends -->

  </div>
</div>

<!-- Social -->

<div class="social-links">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <p class="big">
          <span>Follow Us On</span>
          <a href="#"><i class="icon-facebook"></i>Facebook</a>
          <a href="#"><i class="icon-twitter"></i>Twitter</a>
          <a href="#"><i class="icon-google-plus"></i>Google Plus</a>
          <a href="#"><i class="icon-linkedin"></i>LinkedIn</a>
          <a href="#"><i class="icon-soundcloud"></i>SoundCloud</a>
        </p>
      </div>
    </div>    
  </div>
</div>

<!-- Footer -->
<footer>
  <div class="container">
    <div class="row">

      <div class="widgets">
        <div class="col-md-4">
          <?php get_template_part( 'templates/nav/footer', get_post_type() ); ?>
        </div>

        <div class="col-md-4">
          <?php get_template_part( 'templates/aside/footer-explore', get_post_type() ); ?>
        </div>

        <div class="col-md-4">
          <?php get_template_part( 'templates/aside/footer-posts', get_post_type() ); ?>
          
        </div>
      </div>
    </div>
    <div class="row"> 
      <div class="col-md-12">
        <?php get_template_part( 'templates/aside/copyright', get_post_type() ); ?>
      </div>
    </div>
  </div>
</footer> 

  <?php wp_footer(); ?>
</body>
</html>