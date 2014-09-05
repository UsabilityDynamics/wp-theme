<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @author Usability Dynamics
 * @module wp-escalade  
 * @since wp-escalade 0.1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <title><?php wp_title( '|', true, 'right' ); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <!--<link href="<?php echo get_template_directory_uri(); ?>/styles/app.css" rel="stylesheet">
  <link href="<?php echo get_template_directory_uri(); ?>/styles/green.css" rel="stylesheet">-->
  <!-- HTML5 Support for IE -->
  <!--[if lt IE 9]>
  <script src="<?php echo get_template_directory_uri(); ?>/scripts/html5shim.js"></script>
  <![endif]-->
  <!-- Favicon -->
  <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon/favicon.png">
  <?php wp_head(); ?>
</head>

<body>

  <!-- Header Starts -->
  <header>
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-sm-4">
          <?php get_template_part( 'templates/aside/header-logo', get_post_type() ); ?>
        </div>
        <div class="col-md-5 col-md-offset-3 col-sm-6 col-sm-offset-2">
          <?php get_template_part( 'templates/aside/header-search', get_post_type() ); ?>
        </div>
      </div>
    </div>
  </header>

  <?php get_template_part( 'templates/nav/top', get_post_type() ); ?>

  <?php if( is_front_page() ) : ?>
    <?php get_template_part( 'templates/aside/home-slider', get_post_type() ); ?>
  <?php endif; ?>

  <div class="content">
    <div class="container">