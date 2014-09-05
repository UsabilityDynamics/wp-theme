<?php
/**
 * The default template for displaying content of post. Used for single.
 *
 * @author Usability Dynamics
 * @module wp-escalade  
 * @since wp-escalade 0.1.0
 */

global $wp_escalade, $wp_properties;

// Get property data
$property = get_property( get_the_ID(), array(
  'get_children' => 'false',
  'load_gallery' => 'false',
  'load_thumbnail' => 'false',
  'load_parent' => 'false',
) );

// Clean up meta data
$meta = $wp_properties['property_meta'];
foreach( $meta as $k => $v ) {
  if( empty( $property[ $k ] ) || $k == 'tagline' ) {
    unset( $meta[ $k ] );
  }
}

// Get property attributes data
$stats = draw_stats( "display=array&make_link=true" );
$stats = is_array( $stats ) ? $stats : array();
$groups = (array)$wp_properties[ 'property_groups' ];
$main_group = $wp_properties[ 'configuration' ][ 'main_stats_group' ];

// Get terms
$terms = array();
if( !empty( $wp_properties['taxonomies'] ) ) {
  foreach( (array)$wp_properties['taxonomies'] as $k => $v ) {
    if( get_features( "type={$k}&format=count" ) ) {
      $terms[ $k ] = $v;
    }
  }
}

$thumb = array(
  'width' => ( is_active_sidebar( 'sidebar-property' ) || is_active_sidebar( 'wpp_sidebar_' . $property[ 'property_type' ] ) ? '610' : '960' ),
  'height' => '200'
);

?>
<div class="entry post-property">
  
  <h2><?php the_title(); ?></h2>
  <?php if( !empty( $property[ 'tagline' ] ) ) : ?>
    <p class="big grey"><?php echo $property[ 'tagline' ]; ?></p>
  <?php endif; ?>
  
  <div class="bthumb2">
    <a href="<?php echo $wp_escalade->get_image_link_by_post_id( get_the_ID(), array( 'post_type' => 'property' ) ); ?>"><img class="img-responsive" src="<?php echo $wp_escalade->get_image_link_by_post_id(get_the_ID(), array( 'width' => $thumb[ 'width' ], 'height' => $thumb[ 'height' ], 'post_type' => 'property' ) ); ?>" alt="" /></a>
  </div>
  <?php the_content(); ?>
  
  <?php if( !empty( $stats ) ) : ?>
  <hr/>
  <div class="block property_stats">
    <?php if ( empty( $wp_properties['property_groups']) || $wp_properties['configuration']['property_overview']['sort_stats_by_groups'] != 'true' ) : ?>
      <?php foreach( $stats as $label => $value ) : ?>
        <div class="row">
          <div class="col-md-3">
            <h6><?php echo $label; ?></h6>
          </div>
          <div class="col-md-9">
            <div class="rinfo">
              <p><?php echo $value; ?></p>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <?php reset( $stats ); $fk = key( $stats ); ?>
      <?php foreach( $stats as $gslug => $sts ) : ?>
        <?php if( $fk !== $gslug ) : ?>
          <br/>
        <?php endif; ?>
        <div class="rblock">
          <?php if( $main_group != $gslug || !key_exists( $gslug, $groups ) ) : ?>
            <h5><?php echo key_exists( $gslug, $groups ) ? $groups[ $gslug ][ 'name' ] : __( 'Other', $wp_escalade->text_domain ); ?></h5>
          <?php endif; ?>
          <?php foreach( $sts as $label => $value ) : ?>
            <div class="row">
              <div class="col-md-3">
                <h6><?php echo $label; ?></h6>
              </div>
              <div class="col-md-9">
                <div class="rinfo">
                  <p><?php echo $value; ?></p>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
  <?php endif; ?>
  
  <?php if( !empty( $terms ) ) : ?>
    <hr/>  
    <div class="block">
      <?php foreach( $terms as $tax_slug => $tax_data) : ?>
        <div class="row <?php echo $tax_slug; ?>_list">
          <div class="col-md-3">
            <h6><?php echo $tax_data['label']; ?></h6>
          </div>
          <div class="col-md-9">
            <div class="rskills">
              <?php $features = get_features("type={$tax_slug}&format=array&links=true"); ?>
              <?php foreach( $features as $feature ) : ?>
                <span><?php echo $feature; ?></span>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
  
  <?php if( !empty( $meta ) ) : ?>
    <hr/>
    <div class="block">
      <?php foreach( $meta as $meta_slug => $meta_title ) : ?>
        <div class="row">
          <div class="col-md-3">
              <h6><?php echo $meta_title; ?></h6>
          </div>
          <div class="col-md-9">
            <div class="rinfo">
              <p><?php echo do_shortcode( html_entity_decode( $property[ $meta_slug ] ) ); ?></p>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
    
  <?php if( WPP_F::get_coordinates() ): ?>
    <hr/>
    <div id="property_map" class="google_map"></div>
  <?php endif; ?>

  <?php if( $property[ 'post_parent' ] ): ?>
    <a href="<?php echo $property[ 'parent_link' ]; ?>" class="btn btn-large"><?php _e( 'Return to building page.', $wp_escalade->text_domain ); ?></a>
  <?php endif; ?>

</div>