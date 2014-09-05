<?php

// require 'core/autoload.php';
// Autoload Vendor
if( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
  require_once( __DIR__ . '/vendor/autoload.php' );

  add_action( 'after_setup_theme', 'Setup' );

} else {

  if( !is_admin() && $_SERVER[ 'WP_ENV' ] === 'development' ) {
    wp_die( __( '<h1>Error!</h1><p>Vendor directory does not exist. Be sure to run <code>comoser install</code> from theme root.</p>' ) );
  }

  if( !is_admin() ) {
    wp_die( __( '<h1>Whoops!</h1><p>We aplogize, but the site is currently down for maintenance. Please check back shortly.</p>' ) );
  }

}

function Setup() {

  add_action( 'wp_enqueue_scripts', function() {

    $is_mobile = false;

    // @todo use get_stylesheet_directory_uri();

    $_urls = array(
      "app-js" => content_url( 'themes/wp-theme/static/assets/scripts/app.js' ),
      "app-css" => content_url( 'themes/wp-theme/static/assets/styles/app.css' ),
      "bootstrap-css" => content_url( 'themes/wp-theme/static/assets/styles/bootstrap.css' ),
      "require-js" => $is_mobile ? content_url( 'themes/wp-theme/static/assets/vendor/require-built.js' ) : content_url( 'themes/wp-theme/static/assets/vendor/require.js' ),
      "require-css" => content_url( 'themes/wp-theme/static/assets/vendor/require.css' ),
    );

    wp_enqueue_script( 'require-js',    $_urls[ 'require-js'], false );
    wp_enqueue_script( 'app-js',        $_urls[ 'app-js'], false );

    wp_enqueue_style( 'bootstrap-css',  $_urls[ 'bootstrap-css' ] );
    wp_enqueue_style( 'require-css',    $_urls[ 'require-css'] );
    wp_enqueue_style( 'app-css',        $_urls[ 'app-css'] );


  });

  load_theme_textdomain( 'wp-theme', get_template_directory() . '/languages' );

  add_theme_support( 'automatic-feed-links' );

  add_theme_support( 'post-thumbnails' );
  set_post_thumbnail_size( 672, 372, true );
  add_image_size( 'wp-theme-full-width', 1038, 576, true );

  register_nav_menus( array(
    'primary'   => __( 'Top primary menu', 'wp-theme' ),
    'secondary' => __( 'Secondary menu in left sidebar', 'wp-theme' ),
  ) );

  add_theme_support( 'html5', array(
    'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
  ) );

  add_theme_support( 'post-formats', array(
    'aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery',
  ) );

  add_theme_support( 'custom-background', apply_filters( 'wp-theme_custom_background_args', array(
    'default-color' => 'f5f5f5',
  ) ) );

  add_theme_support( 'featured-content', array(
    //'featured_content_filter' => 'wp-theme_get_featured_posts',
    'max_posts' => 6,
  ) );

}

//register plugin custom pages display
