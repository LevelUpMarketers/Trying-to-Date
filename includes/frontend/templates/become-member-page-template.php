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
    'monthly_cost' => array(
      'label'      => __( 'Monthly Cost', 'tta' ),
      'non_member' => '$0',
      'basic'      => '$10',
      'premium'    => '$17',
    ),
    'discount_25'  => array(
      'label'      => __( '25% Discount on Events', 'tta' ),
      'non_member' => '',
      'basic'      => array(
        'type' => 'check',
      ),
      'premium'    => '',
    ),
    'discount_50'  => array(
      'label'      => __( '50% Discount on Events', 'tta' ),
      'non_member' => '',
      'basic'      => '',
      'premium'    => array(
        'type' => 'check',
      ),
    ),
    'waitlist_notice' => array(
      'label'      => __( 'Advanced Notice on Waitlist Opening', 'tta' ),
      'non_member' => '',
      'basic'      => array(
        'type' => 'check',
      ),
      'premium'    => array(
        'type' => 'check',
      ),
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
          <?php foreach ( $tiers as $tier_key => $tier_label ) :
            $value = isset( $feature[ $tier_key ] ) ? $feature[ $tier_key ] : '';
            $is_check = is_array( $value ) && isset( $value['type'] ) && 'check' === $value['type'];
            ?>
            <td class="<?php echo esc_attr( $is_check ? 'tta-membership-check-cell' : '' ); ?>">
              <?php if ( $is_check ) : ?>
                <span class="tta-membership-check" aria-hidden="true">&check;</span>
                <span class="screen-reader-text"><?php esc_html_e( 'Included', 'tta' ); ?></span>
              <?php else : ?>
                <?php echo esc_html( $value ); ?>
              <?php endif; ?>
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
            <li>
              <span class="tta-feature-label"><?php echo esc_html( $feature['label'] ); ?></span>
              <?php
              $value     = isset( $feature[ $tier_key ] ) ? $feature[ $tier_key ] : '';
              $is_check  = is_array( $value ) && isset( $value['type'] ) && 'check' === $value['type'];
              ?>
              <span class="tta-feature-value">
                <?php if ( $is_check ) : ?>
                  <span class="tta-membership-check" aria-hidden="true">&check;</span>
                  <span class="screen-reader-text"><?php esc_html_e( 'Included', 'tta' ); ?></span>
                <?php else : ?>
                  <?php echo esc_html( $value ); ?>
                <?php endif; ?>
              </span>
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
