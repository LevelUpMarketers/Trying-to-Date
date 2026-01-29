<?php
/**
 * Template Name: Become a Member
 *
 * Displays membership options and benefits.
 *
 * @package TTA
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

get_header();

$header_image_url = esc_url( add_query_arg( 'id', '70', home_url( '/wp-content/uploads/2022/12/IMG-4418.png' ) ) );
$header_shortcode = sprintf(
    '[vc_row full_width="stretch_row_content_no_spaces" css=".vc_custom_1670382516702{background-image: url(%s) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][vc_column][vc_empty_space height="300px" el_id="jre-header-title-empty"][vc_column_text css_animation="slideInLeft" el_id="jre-homepage-id-1" css=".vc_custom_1671885403487{margin-left: 50px !important;padding-left: 50px !important;}"]<p id="jre-homepage-id-3">BECOME A MEMBER</p>[/vc_column_text][/vc_column][/vc_row]',
    $header_image_url
);
echo do_shortcode( $header_shortcode );
?>
<div class="tta-become-member-wrap">
<section id="tta-member-intro" class="tta-section tta-member-intro">
  <div id="tta-member-intro-inner" class="tta-member-intro-inner">
    <div id="tta-member-intro-gallery" class="tta-member-intro-gallery">
      <?php
      $slider_images = tta_get_slider_images();
      foreach ( $slider_images as $i => $src ) :
        $class = 0 === $i ? ' class="active"' : '';
        echo '<img src="' . esc_url( $src ) . '" alt=""' . $class . '>';
      endforeach;
      ?>
    </div>
  </div>
</section>
<div id="tta-become-member-wrap" class="tta-become-member-wrap">

<?php
  $tiers = array(
    'non_member' => __( 'Non-member', 'tta' ),
    'basic'      => __( 'Standard Member', 'tta' ),
    'premium'    => __( 'Premium Member', 'tta' ),
  );

  $features = array(
    'monthly_cost' => array(
      'label'  => __( 'Monthly Cost', 'tta' ),
      'values' => array(
        'non_member' => '$0',
        'basic'      => '$10',
        'premium'    => '$17',
      ),
    ),
    'monthly_singles_social' => array(
      'label'  => __( 'Monthly Singles Social', 'tta' ),
      'values' => array(
        'non_member' => '$10',
        'basic'      => '$5',
        'premium'    => __( 'Free', 'tta' ),
      ),
    ),
    'special_dating_events' => array(
      'label'  => __( 'Special Dating Events', 'tta' ),
      'values' => array(
        'non_member' => '',
        'basic'      => __( '20% Discount', 'tta' ),
        'premium'    => __( '50% Discount', 'tta' ),
      ),
    ),
    'waitlist_notice' => array(
      'label'  => __( 'Advanced Notice on Waitlist Opening', 'tta' ),
      'values' => array(
        'non_member' => '',
        'basic'      => array(
          'check'       => true,
          'mobile_text' => __( 'Included', 'tta' ),
        ),
        'premium'    => array(
          'check'       => true,
          'mobile_text' => __( 'Included', 'tta' ),
        ),
      ),
    ),
  );

  $render_membership_value = static function ( $value, $context ) {
    if ( is_array( $value ) && ! empty( $value['check'] ) ) {
      if ( 'mobile' === $context ) {
        return array(
          'class' => '',
          'html'  => esc_html( $value['mobile_text'] ?? '' ),
        );
      }

      return array(
        'class' => 'tta-membership-check-cell',
        'html'  => '<span class="tta-membership-check" aria-hidden="true">✓</span><span class="screen-reader-text">' . esc_html__( 'Included', 'tta' ) . '</span>',
      );
    }

    if ( '' === $value || null === $value ) {
      return array(
        'class' => '',
        'html'  => '',
      );
    }

    return array(
      'class' => '',
      'html'  => esc_html( $value ),
    );
  };
?>

  <table class="tta-membership-table">
    <thead>
      <tr>
        <th><?php esc_html_e( 'Benefits', 'tta' ); ?></th>
        <?php foreach ( $tiers as $tier_label ) : ?>
          <th><?php echo esc_html( $tier_label ); ?></th>
        <?php endforeach; ?>
      </tr>
    </thead>
    <tbody>
      <?php foreach ( $features as $feature ) : ?>
        <tr>
          <td><?php echo esc_html( $feature['label'] ); ?></td>
          <?php foreach ( $tiers as $tier_key => $tier_label ) : ?>
            <?php
            $rendered_value = $render_membership_value( $feature['values'][ $tier_key ] ?? '', 'table' );
            $cell_class     = $rendered_value['class'] ? ' class="' . esc_attr( $rendered_value['class'] ) . '"' : '';
            ?>
            <td<?php echo $cell_class; ?>><?php echo $rendered_value['html']; ?></td>
          <?php endforeach; ?>
        </tr>
      <?php endforeach; ?>
      <tr class="tta-membership-actions">
        <td></td>
        <td></td>
        <td>
          <button type="button" class="tta-button tta-button-primary tta-basic-signup">
            <?php esc_html_e( 'Sign Up', 'tta' ); ?>
          </button>
        </td>
        <td>
          <button type="button" class="tta-button tta-button-primary tta-premium-signup">
            <?php esc_html_e( 'Sign Up', 'tta' ); ?>
          </button>
        </td>
      </tr>
    </tbody>
  </table>

  <div class="tta-membership-mobile">
    <?php foreach ( $tiers as $tier_key => $tier_label ) : ?>
      <div class="tta-tier-card">
        <h2><?php echo esc_html( $tier_label ); ?></h2>
        <ul>
          <?php foreach ( $features as $feature ) : ?>
            <?php
            $rendered_value = $render_membership_value( $feature['values'][ $tier_key ] ?? '', 'mobile' );
            $value_class    = $rendered_value['class'] ? ' ' . esc_attr( $rendered_value['class'] ) : '';
            ?>
            <li>
              <span class="tta-feature-label"><?php echo esc_html( $feature['label'] ); ?></span>
              <span class="tta-feature-value<?php echo $value_class; ?>"><?php echo $rendered_value['html']; ?></span>
            </li>
          <?php endforeach; ?>
        </ul>
        <?php if ( 'basic' === $tier_key ) : ?>
          <button type="button" class="tta-button tta-button-primary tta-basic-signup">
            <?php esc_html_e( 'Sign Up', 'tta' ); ?>
          </button>
        <?php elseif ( 'premium' === $tier_key ) : ?>
          <button type="button" class="tta-button tta-button-primary tta-premium-signup">
            <?php esc_html_e( 'Sign Up', 'tta' ); ?>
          </button>
        <?php endif; ?>
      </div>
    <?php endforeach; ?>
  </div>
</div>
<?php
get_footer();
