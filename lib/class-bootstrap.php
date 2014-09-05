<?php
/**
 * Network Splash Theme
 *
 * @version 0.1.0
 * @author potanin@UD
 * @namespace Network
 */
namespace UsabilityDynamics {

  /**
   * Class Splash
   *
   * @property mixed init
   * @property mixed wp_enqueue_scripts
   *
   * @author potanin@UD
   * @class Splash
   * @package Network\Theme
   */
  class WP_Theme {

    /**
     * Version of child theme
     *
     * @public
     * @var string
     */
    public static $version = '0.1.0';

    /**
     * Textdomain String
     *
     * @public
     * @var string
     */
    public static $text_domain = 'wp-theme';

    public static $_errors = null;

    /**
     * Class Initializer
     *
     * @author potanin@UD
     * @for Splash
     */
    public function __construct() {

      add_action( 'admin_init', array( $this, 'admin_init' ) );
      add_action( 'admin_menu', array( $this, 'admin_menu' ) );
      add_action( 'init', array( $this, 'init' ) );
      add_action( 'wp_loaded', array( $this, 'loaded' ), 5, 0 );

      add_action( 'wp_enqueue_scripts', array( $this, 'wp_enqueue_scripts' ), 20, 0 );
      add_action( 'wp_print_footer_scripts', array( $this, 'wp_print_footer_scripts' ), 20, 0 );

      add_action( 'template_redirect', array( $this, 'template_redirect' ), 100 );
      add_action( 'after_setup_theme', array( $this, 'after_setup_theme' ), 100 );

      // Should be loaded by now.
      if( file_exists( dirname( __DIR__ ) . '/vendor/autoload.php' ) ) {
        require_once( dirname( __DIR__ ) . '/vendor/autoload.php' );
      }

    }

    /**
     *
     */
    public function after_setup_theme() {

      // This theme uses wp_nav_menu() in one location.
      register_nav_menus( array(
        'footer-icons' => __( 'Footer Icons', 'wpp' )
      ) );

      register_nav_menus( array(
        'header-icons' => __( 'Header Icons', 'wpp' )
      ) );

      set_post_thumbnail_size( 402, 301, true );

      add_theme_support( 'html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
      ) );

      add_theme_support( 'post-thumbnails' );

      add_theme_support( 'featured-content', array(
        'featured_content_filter' => 'twentyfourteen_get_featured_posts',
        'max_posts'               => 6,
      ) );

      add_theme_support( 'custom-background', array(
        'default-color'    => 'e8e8e8',
        //'default-image' => '',,
        'default-repeat'   => 'no-repeat',
        //'default-position-x'     => 'center',
        //'default-attachment'     => 'scroll',
        'wp-head-callback' => array( $this, 'render_background' ),
        //'admin-head-callback'    => '',
        //'admin-preview-callback' => '',
      ) );

    }

    /**
     *
     */
    public function render_background() {

      // $background is the saved custom image, or the default image.
      $background = set_url_scheme( get_background_image() );

      // $color is the saved custom color.
      // A default has to be specified in style.css. It will not be printed here.
      $color = get_background_color();

      if( $color === get_theme_support( 'custom-background', 'default-color' ) ) {
        $color = false;
      }

      if( !$background && !$color )
        return;

      $style = $color ? "background-color: #$color;" : '';

      if( $background ) {
        $image = " background-image: url('$background');";

        $repeat = get_theme_mod( 'background_repeat', get_theme_support( 'custom-background', 'default-repeat' ) );
        if( !in_array( $repeat, array( 'no-repeat', 'repeat-x', 'repeat-y', 'repeat' ) ) )
          $repeat = 'repeat';
        $repeat = " background-repeat: $repeat;";

        $position = get_theme_mod( 'background_position_x', get_theme_support( 'custom-background', 'default-position-x' ) );
        if( !in_array( $position, array( 'center', 'right', 'left' ) ) )
          $position = 'left';
        $position = " background-position: top $position;";

        $attachment = get_theme_mod( 'background_attachment', get_theme_support( 'custom-background', 'default-attachment' ) );
        if( !in_array( $attachment, array( 'fixed', 'scroll' ) ) )
          $attachment = 'scroll';
        $attachment = " background-attachment: $attachment;";

        $style .= $image . $repeat . $position . $attachment;
      }

      echo '<style type="text/css" id="custom-background-css"> body { ' . trim( $style ) . ' }</style>';

    }

    /**
     *
     */
    public function admin_init() {

      try {

        if( !is_plugin_active( 'siteorigin-panels/siteorigin-panels.php' ) ) {

          if( is_wp_error( validate_plugin( 'siteorigin-panels/siteorigin-panels.php' ) ) ) {
            $_errors[ ] = new \WP_Error( 'siteorigin not found, please download and activate for theme to work well' );
          } else {

            if( is_wp_error( activate_plugin( 'siteorigin-panels/siteorigin-panels.php' ) ) ) {
              $_errors[ ] = new \WP_Error( 'cannot activate siteorigin' );
            }

          }

        }

        if( !is_plugin_active( 'wp-amd/wp-amd.php' ) ) {

          if( is_wp_error( validate_plugin( 'wp-amd/wp-amd.php' ) ) ) {
            $_errors[ ] = new \WP_Error( 'wp-amd/ not found, please download and activate for theme to work well' );
          } else {

            if( is_wp_error( activate_plugin( 'wp-amd/wp-amd.php' ) ) ) {
              $_errors[ ] = new \WP_Error( 'cannot activate wp-amd' );
            }

          }

        }

      } catch( \Exception $exception ) {
        $_errors[] = new \WP_Error( $exception->getMessage() );
      }

      // do something with any errors, such as display on backend
      if( isset( $_errors ) ) {
        wp_die( '<pre>' . print_r( $_errors, true ) . '</pre>' );
      }

    }

    /**
     * Register Assets
     *
     */
    public function init() {

      add_filter( 'the_content',  array( $this, 'the_content' ) );
      add_filter( 'content_url',  array( $this, 'content_url' ), 20, 2 );
      add_filter( 'body_class',   array( $this, 'body_class' ), 10 );

    }

    /**
     * Modify Body Class
     *
     * @todo May need to set response "vary" header to force Varnish to cache mobile and desktop seperatly.
     *
     * @param array $classes
     *
     * @return array
     */
    public function body_class( $classes = array() ) {

      if( function_exists( 'wp_is_mobile' ) && wp_is_mobile() ) {
        $classes[] = 'is_mobile';
      }

      if( function_exists( 'wp_is_mobile' ) && !wp_is_mobile() ) {
        $classes[] = 'is_desktop';
      }

      return $classes;

    }

    /**
     * Content Output
     *
     * @param $content
     * @return mixed
     */
    public function the_content( $content ) {
      return $content;
    }

    /**
     *
     * Fix so content_url( 'themes/wp-splash/static/scripts/app.js' ) can be used to get theme files.
     *
     * @param        $url
     *
     * @return mixed
     *
     */
    public function content_url( $url = null ) {

      // @temp hardcoded, use get_template_directory_uri() to figure out correct URL that should be replaced.

      $url = str_replace( 'themes/wp-splash/static/', 'vendor/themes/wp-splash/static/', $url );
      $url = str_replace( 'themes/wp-splash/vendor/', 'vendor/themes/wp-splash/vendor/', $url );

      return $url;

    }

    /**
     *
     */
    public function admin_menu() {

      if( get_theme_mod( 'admin:hide-post-menu', false ) ) {
        remove_menu_page( 'edit.php' );
        remove_menu_page( 'edit.php?post_type=artist' );
        remove_menu_page( 'edit.php?post_type=event' );
        remove_menu_page( 'edit.php?post_type=tour' );
        remove_menu_page( 'edit.php?post_type=venue' );
      }

      if( get_theme_mod( 'admin:hide-users-menu', false ) ) {
        remove_menu_page( 'users.php' );
      }

      if( get_theme_mod( 'admin:hide-tools-menu', false ) ) {
        remove_menu_page( 'tools.php' );
      }

      if( get_theme_mod( 'admin:hide-comments-menu', false ) ) {
        remove_menu_page( 'edit-comments.php' );
      }

    }

    /**
     *
     */
    public function loaded() {
      // wp_register_style( 'app', content_url( 'themes/wp-splash/static/styles/app.css' ), array(), Splash::$version, 'all' );
      // wp_register_script( 'app', content_url( 'themes/wp-splash/static/scripts/app.js' ), array( 'udx-requires' ), Splash::$version, true );
    }

    /**
     * Enqueue Style
     *
     * @author potanin@UD
     * @method wp_enqueue_scripts
     */
    public function wp_enqueue_scripts() {
      //wp_deregister_style( 'siteorigin-panels-front' );
      wp_enqueue_style( 'app' );
      wp_enqueue_script( 'app' );
    }

    /**
     *
     * SiteOrigin Panel only needs to be laoded on the backend since templates are saved into regular post content.
     *
     */
    public function wp_print_footer_scripts() {
      // echo '<script data-main="/themes/wp-splash/static/scripts/app" src="//cdn.udx.io/udx.requires.js"></script>';
    }

    /**
     *
     * @todo Add redirection to 404 page if "Splash" page has not yet been setup on a new theme activation.
     *
     */
    public function template_redirect() {

    }

  }

}