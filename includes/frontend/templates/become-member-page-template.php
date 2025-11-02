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

$header_shortcode = '[vc_row full_width="stretch_row_content_no_spaces" css=".vc_custom_1670382516702{background-image: url(https://trying-to-adult-rva-2025.local/wp-content/uploads/2022/12/IMG-4418.png?id=70) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][vc_column][vc_empty_space height="300px" el_id="jre-header-title-empty"][vc_column_text css_animation="slideInLeft" el_id="jre-homepage-id-1" css=".vc_custom_1671885403487{margin-left: 50px !important;padding-left: 50px !important;}"]<p id="jre-homepage-id-3">BECOME A MEMBER</p>[/vc_column_text][/vc_column][/vc_row]';
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
    'monthly_cost'          => array(
      'label' => __( 'Monthly Cost', 'tta' ),
      'tiers' => array(
        'non_member' => array(
          'content'        => '$0',
          'mobile_content' => '$0',
        ),
        'basic'      => array(
          'content'        => '$10',
          'mobile_content' => '$10',
        ),
        'premium'    => array(
          'content'        => '$17',
          'mobile_content' => '$17',
        ),
      ),
    ),
    'monthly_singles_social' => array(
      'label' => __( 'Monthly Singles Social', 'tta' ),
      'tiers' => array(
        'non_member' => array(
          'content'        => '$10',
          'mobile_content' => '$10',
        ),
        'basic'      => array(
          'content'        => '$5',
          'mobile_content' => '$5',
        ),
        'premium'    => array(
          'content'        => __( 'Free', 'tta' ),
          'mobile_content' => __( 'Free', 'tta' ),
        ),
      ),
    ),
    'special_dating_events'  => array(
      'label' => __( 'Special Dating Events', 'tta' ),
      'tiers' => array(
        'non_member' => array(
          'content'        => '',
          'mobile_content' => '',
        ),
        'basic'      => array(
          'content'        => __( '20% Discount', 'tta' ),
          'mobile_content' => __( '20% Discount', 'tta' ),
        ),
        'premium'    => array(
          'content'        => __( '50% Discount', 'tta' ),
          'mobile_content' => __( '50% Discount', 'tta' ),
        ),
      ),
    ),
    'waitlist_notice'        => array(
      'label' => __( 'Advanced Notice on Waitlist Opening', 'tta' ),
      'tiers' => array(
        'non_member' => array(
          'content'        => '',
          'mobile_content' => '',
        ),
        'basic'      => array(
          'content'        => '<span class="tta-membership-check" aria-hidden="true">&#10003;</span><span class="screen-reader-text">' . esc_html__( 'Included', 'tta' ) . '</span>',
          'mobile_content' => __( 'Included', 'tta' ),
          'class'          => 'tta-membership-check-cell',
        ),
        'premium'    => array(
          'content'        => '<span class="tta-membership-check" aria-hidden="true">&#10003;</span><span class="screen-reader-text">' . esc_html__( 'Included', 'tta' ) . '</span>',
          'mobile_content' => __( 'Included', 'tta' ),
          'class'          => 'tta-membership-check-cell',
        ),
      ),
    ),
  );

  $cell_allowed_html = array(
    'span' => array(
      'class'       => array(),
      'aria-hidden' => array(),
    ),
  );
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
            $tier_data   = isset( $feature['tiers'][ $tier_key ] ) ? $feature['tiers'][ $tier_key ] : array();
            $cell_class  = ! empty( $tier_data['class'] ) ? ' class="' . esc_attr( $tier_data['class'] ) . '"' : '';
            $cell_content = isset( $tier_data['content'] ) ? $tier_data['content'] : '';
            ?>
            <td<?php echo $cell_class; ?>>
              <?php echo '' !== $cell_content ? wp_kses( $cell_content, $cell_allowed_html ) : ''; ?>
            </td>
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
            $tier_data      = isset( $feature['tiers'][ $tier_key ] ) ? $feature['tiers'][ $tier_key ] : array();
            $mobile_content = '';

            if ( isset( $tier_data['mobile_content'] ) && '' !== $tier_data['mobile_content'] ) {
              $mobile_content = $tier_data['mobile_content'];
            } elseif ( isset( $tier_data['content'] ) ) {
              $mobile_content = wp_strip_all_tags( $tier_data['content'] );
            }
            ?>
            <li>
              <span class="tta-feature-label"><?php echo esc_html( $feature['label'] ); ?></span>
              <span class="tta-feature-value"><?php echo esc_html( $mobile_content ); ?></span>
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
