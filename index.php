<?php get_template_part('templates/header', 'home'); ?>

<nav class="navbar navbar-default navbar-static-top" role="navigation">
  <section class="wrapper-xs bg-primary">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-10">
          <i class="fa fa-question-circle"></i> Have any question? Email us at <i class="fa fa-envelope"></i> <a href="#link"><span class="text-light">info@interstatelovesong.com</span></a>
        </div><!-- /.col -->
        <div class="col-sm-12 col-md-2">
          <ul class="list-inline no-margin-bottom">
            <li><a href="#"><i class="text-light fa fa-lg fa-fw fa-twitter"></i></a></li>
            <li><a href="#"><i class="text-light fa fa-lg fa-fw fa-facebook"></i></a></li>
            <li><a href="#"><i class="text-light fa fa-lg fa-fw fa-google-plus"></i></a></li>
            <li><a href="#"><i class="text-light fa fa-lg fa-fw fa-pinterest"></i></a></li>
          </ul>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container -->
  </section><!-- /.wrapper -->
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.html">
        <img src="assets/img/logo-dark.png" alt="Website Logo">
      </a>
    </div>
    <!-- Navbar -->
    <div class="collapse navbar-collapse navbar-main-collapse">
      <ul class="nav navbar-nav">
        <li class="active">
          <a href="index.html">Home</a>
        </li>
        <li class="dropdown">
          <a href="#link" class="dropdown-toggle" data-toggle="dropdown">Real Estate <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="search_results.html">Search Results</a></li>
            <li><a href="item_page.html">Item Page</a></li>
            <li><a href="services.html">Services</a></li>
            <li><a href="gallery.html">Gallery</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#link" class="dropdown-toggle" data-toggle="dropdown">Agents <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="team.html">All Agents</a></li>
            <li><a href="team_member.html">Agent Profile</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#link" class="dropdown-toggle" data-toggle="dropdown">Corporate <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="about.html">About</a></li>
            <li><a href="contact.html">Contact 1</a></li>
            <li><a href="contact_2.html">Contact 2</a></li>
            <li><a href="login.html">Login/Signup</a></li>
          </ul>
        </li>
      </ul><!-- /.navbar-nav -->
    </div><!-- /.collapse -->
  </div><!-- /.container -->
</nav>

<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'roots'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/content', get_post_format()); ?>
<?php endwhile; ?>

<?php if ($wp_query->max_num_pages > 1) : ?>
  <nav class="post-nav">
    <ul class="pager">
      <li class="previous"><?php next_posts_link(__('&larr; Older posts', 'roots')); ?></li>
      <li class="next"><?php previous_posts_link(__('Newer posts &rarr;', 'roots')); ?></li>
    </ul>
  </nav>
<?php endif; ?>

<section class="wrapper-lg bg-custom-home">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="widget padding-lg bg-dark">
          <h1 class="heading-lg text-center text-light">Buy, Sell, or Rent Properties</h1>
          <br class="spacer-lg">
          <form action="" class="form-inline">
            <div class="row">
              <div class="col-md-3">
                <label for="">Search:</label>
                <select class="form-control selectpicker show-tick" title='Choose One' data-style="btn-primary">
                  <optgroup label="Personal:">
                    <option>Apartment</option>
                    <option>Condo</option>
                    <option>Villa</option>
                  </optgroup>
                  <optgroup label="Business:">
                    <option>Office</option>
                    <option>Warehouse</option>
                    <option>Studio</option>
                  </optgroup>
                </select>
              </div><!-- /.col -->
              <div class="col-md-2">
                <label for="">Status:</label>
                <select class="form-control selectpicker show-tick" title='Choose One' data-style="btn-primary">
                  <optgroup label="Status:">
                    <option>Buy</option>
                    <option>Sale</option>
                    <option>Rent</option>
                  </optgroup>
                </select>
              </div><!-- /.col -->
              <div class="col-md-3">
                <label for="">Location:</label>
                <select class="form-control selectpicker show-tick" title='Choose One' data-live-search="true" data-style="btn-primary">
                  <optgroup label="Location:">
                    <option>Dubai</option>
                    <option>Stockholm</option>
                    <option>Changai</option>
                    <option>Paris</option>
                  </optgroup>
                </select>
              </div><!-- /.col -->
              <div class="col-md-2">
                <label for="">Price:</label>
                <select class="form-control selectpicker show-tick" title='Choose One' data-style="btn-primary">
                  <optgroup label="Price:">
                    <option>Up to $5.000</option>
                    <option>Up to $10.000</option>
                    <option>Up to $20.000</option>
                  </optgroup>
                </select>
              </div><!-- /.col -->
              <div class="col-md-2">
                <label for="">Ready?</label>
                <button class="btn btn-primary btn-block">Search</button>
              </div>
            </div>
          </form>
        </div><!-- /.widget -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container -->
</section>

<section class="wrapper-md">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 text-center">
        <h2><i class="fa fa-trophy text-primary"></i> We are offering <span class="text-muted">the best real estate</span> deals</h2>
        <p class="lead">We pride ourselves on taking care of our customers. Between our detailed theme documentation, screencasts tand knowledgebase you’re sure to get up and running in no time.</p>
        <p><a href="#link" class="btn btn-lg btn-primary">Learn More »</a></p>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container -->
</section>

<section class="wrapper-md bg-highlight">
  <div class="container">
    <div class="row">
      <div class="col-sm-6 col-md-3">
        <div class="thumbnail">
          <div class="overlay-container">
            <img src="assets/img/item-small.jpg">
            <div class="overlay-content">
              <h3 class="h4 headline">Great Deal</h3>
              <p>So you know you're getting a top quality property from an experienced team.</p>
            </div><!-- /.overlay-content -->
          </div><!-- /.overlay-container -->
          <div class="thumbnail-meta">
            <p><i class="fa fa-fw fa-home"></i> 1199 Pacific Hwy #110</p>
            <p><i class="fa fa-fw fa-map-marker"></i> San Diego, CA 92101</p>
          </div>
          <div class="thumbnail-meta">
            <i class="fa fa-fw fa-info-circle"></i> 1460 Ft | 2 Bed | 1,5 Bath | 2 Garage
          </div>
          <div class="thumbnail-meta">
            <i class="fa fa-fw fa-dollar"></i> <span class="h3">350.000</span> <a href="#link" class="btn btn-link pull-right">View <i class="fa fa-arrow-right"></i></a>
          </div>
        </div><!-- /.thumbnail -->
      </div><!-- /.col -->
      <div class="col-sm-6 col-md-3">
        <div class="thumbnail">
          <div class="overlay-container">
            <img src="assets/img/item-small.jpg">
            <div class="overlay-content">
              <h3 class="h4 headline">Great Deal</h3>
              <p>So you know you're getting a top quality property from an experienced team.</p>
            </div><!-- /.overlay-content -->
          </div><!-- /.overlay-container -->
          <div class="thumbnail-meta">
            <p><i class="fa fa-fw fa-home"></i> 1199 Pacific Hwy #110</p>
            <p><i class="fa fa-fw fa-map-marker"></i> San Diego, CA 92101</p>
          </div>
          <div class="thumbnail-meta">
            <i class="fa fa-fw fa-info-circle"></i> 1460 Ft | 2 Bed | 1,5 Bath | 2 Garage
          </div>
          <div class="thumbnail-meta">
            <i class="fa fa-fw fa-dollar"></i> <span class="h3">350.000</span> <a href="#link" class="btn btn-link pull-right">View <i class="fa fa-arrow-right"></i></a>
          </div>
        </div><!-- /.thumbnail -->
      </div><!-- /.col -->
      <div class="col-sm-6 col-md-3">
        <div class="thumbnail">
          <div class="overlay-container">
            <img src="assets/img/item-small.jpg">
            <div class="overlay-content">
              <h3 class="h4 headline">Great Deal</h3>
              <p>So you know you're getting a top quality property from an experienced team.</p>
            </div><!-- /.overlay-content -->
          </div><!-- /.overlay-container -->
          <div class="thumbnail-meta">
            <p><i class="fa fa-fw fa-home"></i> 1199 Pacific Hwy #110</p>
            <p><i class="fa fa-fw fa-map-marker"></i> San Diego, CA 92101</p>
          </div>
          <div class="thumbnail-meta">
            <i class="fa fa-fw fa-info-circle"></i> 1460 Ft | 2 Bed | 1,5 Bath | 2 Garage
          </div>
          <div class="thumbnail-meta">
            <i class="fa fa-fw fa-dollar"></i> <span class="h3">350.000</span> <a href="#link" class="btn btn-link pull-right">View <i class="fa fa-arrow-right"></i></a>
          </div>
        </div><!-- /.thumbnail -->
      </div><!-- /.col -->
      <div class="col-sm-6 col-md-3">
        <div class="thumbnail">
          <div class="overlay-container">
            <img src="assets/img/item-small.jpg">
            <div class="overlay-content">
              <h3 class="h4 headline">Great Deal</h3>
              <p>So you know you're getting a top quality property from an experienced team.</p>
            </div><!-- /.overlay-content -->
          </div><!-- /.overlay-container -->
          <div class="thumbnail-meta">
            <p><i class="fa fa-fw fa-home"></i> 1199 Pacific Hwy #110</p>
            <p><i class="fa fa-fw fa-map-marker"></i> San Diego, CA 92101</p>
          </div>
          <div class="thumbnail-meta">
            <i class="fa fa-fw fa-info-circle"></i> 1460 Ft | 2 Bed | 1,5 Bath | 2 Garage
          </div>
          <div class="thumbnail-meta">
            <i class="fa fa-fw fa-dollar"></i> <span class="h3">350.000</span> <a href="#link" class="btn btn-link pull-right">View <i class="fa fa-arrow-right"></i></a>
          </div>
        </div><!-- /.thumbnail -->
      </div><!-- /.col -->
    </div><!-- /.row -->
    <div class="row">
      <div class="col-sm-6 col-md-3">
        <div class="thumbnail">
          <div class="overlay-container">
            <img src="assets/img/item-small.jpg">
            <div class="overlay-content">
              <h3 class="h4 headline">Great Deal</h3>
              <p>So you know you're getting a top quality property from an experienced team.</p>
            </div><!-- /.overlay-content -->
          </div><!-- /.overlay-container -->
          <div class="thumbnail-meta">
            <p><i class="fa fa-fw fa-home"></i> 1199 Pacific Hwy #110</p>
            <p><i class="fa fa-fw fa-map-marker"></i> San Diego, CA 92101</p>
          </div>
          <div class="thumbnail-meta">
            <i class="fa fa-fw fa-info-circle"></i> 1460 Ft | 2 Bed | 1,5 Bath | 2 Garage
          </div>
          <div class="thumbnail-meta">
            <i class="fa fa-fw fa-dollar"></i> <span class="h3">350.000</span> <a href="#link" class="btn btn-link pull-right">View <i class="fa fa-arrow-right"></i></a>
          </div>
        </div><!-- /.thumbnail -->
      </div><!-- /.col -->
      <div class="col-sm-6 col-md-3">
        <div class="thumbnail">
          <div class="overlay-container">
            <img src="assets/img/item-small.jpg">
            <div class="overlay-content">
              <h3 class="h4 headline">Great Deal</h3>
              <p>So you know you're getting a top quality property from an experienced team.</p>
            </div><!-- /.overlay-content -->
          </div><!-- /.overlay-container -->
          <div class="thumbnail-meta">
            <p><i class="fa fa-fw fa-home"></i> 1199 Pacific Hwy #110</p>
            <p><i class="fa fa-fw fa-map-marker"></i> San Diego, CA 92101</p>
          </div>
          <div class="thumbnail-meta">
            <i class="fa fa-fw fa-info-circle"></i> 1460 Ft | 2 Bed | 1,5 Bath | 2 Garage
          </div>
          <div class="thumbnail-meta">
            <i class="fa fa-fw fa-dollar"></i> <span class="h3">350.000</span> <a href="#link" class="btn btn-link pull-right">View <i class="fa fa-arrow-right"></i></a>
          </div>
        </div><!-- /.thumbnail -->
      </div><!-- /.col -->
      <div class="col-md-6">

        <!-- Carousel -->
        <div id="my-carousel" class="carousel slide no-margin-bottom">
          <!-- indicators -->
          <ol class="carousel-indicators">
            <li data-target="#my-carousel" data-slide-to="0" class="active"></li>
            <li data-target="#my-carousel" data-slide-to="1"></li>
          </ol>
          <!-- carousel -->
          <div class="carousel-inner">
            <div class="item active">
              <img class="img-responsive" src="assets/img/wallpaper.jpg" alt="1200x500" >
              <div class="carousel-caption visible-lg">
                <h1>Bootstrap Framework Overhauled<br> Meet the new sexy</h1>
                <p class="lead">Beautifull Bootstrap skin with overhauled components.</p><br>
              </div>
            </div><!-- /.item -->
            <div class="item">
              <img class="img-responsive" src="assets/img/wallpaper.jpg" alt="1200x500" >
              <div class="carousel-caption visible-lg">
                <h1>We help you being awesome at what you really do</h1>
                <p class="lead">Providing the best service so you can concentrate on your thing</p>
              </div>
            </div><!-- /.item -->
          </div><!-- /.carousel-inner -->
          <!-- Controls -->
          <a class="left carousel-control" href="#my-carousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
          </a>
          <a class="right carousel-control" href="#my-carousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
          </a>
        </div><!-- /.carousel -->

      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container -->
</section>

<section class="wrapper-md bg-primary">
  <div class="container">
    <h2 class="text-center headline">Featured This Week</h2>
    <br class="spacer-lg">
    <div class="row">
      <div class="col-sm-6 col-md-3">
        <div class="thumbnail text-default">
          <div class="overlay-container">
            <img src="assets/img/item-large.jpg">
            <div class="overlay-content">
              <h3 class="h4 headline">Great Deal</h3>
              <p>So you know you're getting a top quality property from an experienced team.</p>
            </div><!-- /.overlay-content -->
          </div><!-- /.overlay-container -->
          <div class="thumbnail-meta">
            <p><i class="fa fa-fw fa-home"></i> 1199 Pacific Hwy #110</p>
            <p><i class="fa fa-fw fa-map-marker"></i> San Diego, CA 92101</p>
          </div>
          <div class="thumbnail-meta">
            <i class="fa fa-fw fa-info-circle"></i> 1460 Ft | 2 Bed | 1,5 Bath | 2 Garage
          </div>
          <div class="thumbnail-meta">
            <i class="fa fa-fw fa-dollar"></i> <span class="h3 heading-default">350.000</span> <a href="#link" class="btn btn-link pull-right">View <i class="fa fa-arrow-right"></i></a>
          </div>
        </div><!-- /.thumbnail -->
      </div><!-- /.col -->
      <div class="col-sm-6 col-md-3">
        <div class="thumbnail text-default">
          <div class="overlay-container">
            <img src="assets/img/item-large.jpg">
            <div class="overlay-content">
              <h3 class="h4 headline">Great Deal</h3>
              <p>So you know you're getting a top quality property from an experienced team.</p>
            </div><!-- /.overlay-content -->
          </div><!-- /.overlay-container -->
          <div class="thumbnail-meta">
            <p><i class="fa fa-fw fa-home"></i> 1199 Pacific Hwy #110</p>
            <p><i class="fa fa-fw fa-map-marker"></i> San Diego, CA 92101</p>
          </div>
          <div class="thumbnail-meta">
            <i class="fa fa-fw fa-info-circle"></i> 1460 Ft | 2 Bed | 1,5 Bath | 2 Garage
          </div>
          <div class="thumbnail-meta">
            <i class="fa fa-fw fa-dollar"></i> <span class="h3 heading-default">350.000</span> <a href="#link" class="btn btn-link pull-right">View <i class="fa fa-arrow-right"></i></a>
          </div>
        </div><!-- /.thumbnail -->
      </div><!-- /.col -->
      <div class="col-sm-6 col-md-3">
        <div class="thumbnail text-default">
          <div class="overlay-container">
            <img src="assets/img/item-large.jpg">
            <div class="overlay-content">
              <h3 class="h4 headline">Great Deal</h3>
              <p>So you know you're getting a top quality property from an experienced team.</p>
            </div><!-- /.overlay-content -->
          </div><!-- /.overlay-container -->
          <div class="thumbnail-meta">
            <p><i class="fa fa-fw fa-home"></i> 1199 Pacific Hwy #110</p>
            <p><i class="fa fa-fw fa-map-marker"></i> San Diego, CA 92101</p>
          </div>
          <div class="thumbnail-meta">
            <i class="fa fa-fw fa-info-circle"></i> 1460 Ft | 2 Bed | 1,5 Bath | 2 Garage
          </div>
          <div class="thumbnail-meta">
            <i class="fa fa-fw fa-dollar"></i> <span class="h3 heading-default">350.000</span> <a href="#link" class="btn btn-link pull-right">View <i class="fa fa-arrow-right"></i></a>
          </div>
        </div><!-- /.thumbnail -->
      </div><!-- /.col -->
      <div class="col-sm-6 col-md-3">
        <div class="thumbnail text-default">
          <div class="overlay-container">
            <img src="assets/img/item-large.jpg">
            <div class="overlay-content">
              <h3 class="h4 headline">Great Deal</h3>
              <p>So you know you're getting a top quality property from an experienced team.</p>
            </div><!-- /.overlay-content -->
          </div><!-- /.overlay-container -->
          <div class="thumbnail-meta">
            <p><i class="fa fa-fw fa-home"></i> 1199 Pacific Hwy #110</p>
            <p><i class="fa fa-fw fa-map-marker"></i> San Diego, CA 92101</p>
          </div>
          <div  class="thumbnail-meta">
            <i class="fa fa-fw fa-info-circle"></i> 1460 Ft | 2 Bed | 1,5 Bath | 2 Garage
          </div>
          <div class="thumbnail-meta">
            <i class="fa fa-fw fa-dollar"></i> <span class="h3 heading-default">350.000</span> <a href="#link" class="btn btn-link pull-right">View <i class="fa fa-arrow-right"></i></a>
          </div>
        </div><!-- /.thumbnail -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container -->
</section>

<section class="wrapper-md">
  <div class="container">
    <h2 class="text-center">The Southern Graphikaria Real Estate Market Is About To Skyrocket</h2>
    <p class="text-center lead">Very affordable 2 bedroom 2 bathroom beachfront homes.</p>
    <br class="spacer-lg">
    <div class="row">
      <div class="col-sm-12 col-md-4 text-center">
        <div class="widget padding-md bg-primary">
          <h2><i class="fa fa-list"></i> Listing</h2>
          <p class="lead">We have already sold more than 5,000 Homes and we are still going at very good pace. </p>
        </div>
      </div><!-- /.col -->
      <div class="col-sm-12 col-md-4 text-center">
        <div class="widget padding-md bg-info">
          <h2><i class="fa fa-flag"></i> Advertise</h2>
          <p class="lead">We have already sold more than 5,000 Homes and we are still going at very good pace. </p>
        </div>
      </div><!-- /.col -->
      <div class="col-sm-12 col-md-4 text-center">
        <div class="widget padding-md bg-primary">
          <h2><i class="fa fa-question-circle"></i> Consulting</h2>
          <p class="lead">We have already sold more than 5,000 Homes and we are still going at very good pace. </p>
        </div>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container -->
</section>

<?php get_template_part('templates/footer', 'home' ); ?>