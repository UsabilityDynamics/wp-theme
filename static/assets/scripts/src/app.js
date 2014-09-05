/**
 * Application Loader
 *
 */
define( 'app', [ 'jquery' ], function( jQuery, async ) {
  console.log( 'app loaded' );

  require( ['sample'] );

});
