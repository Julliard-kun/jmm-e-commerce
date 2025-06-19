<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! ecommerce_clothing_has_page_header() ) {
    return;
}

$ecommerce_clothing_classes = array( 'page-header' );
$ecommerce_clothing_style = ecommerce_clothing_page_header_style();

if ( $ecommerce_clothing_style ) {
    $ecommerce_clothing_classes[] = $ecommerce_clothing_style . '-page-header';
}

$ecommerce_clothing_visibility = get_theme_mod( 'ecommerce_clothing_page_header_visibility', 'all-devices' );

if ( 'hide-all-devices' === $ecommerce_clothing_visibility ) {
    // Don't show the header at all
    return;
}

if ( 'hide-tablet' === $ecommerce_clothing_visibility ) {
    $ecommerce_clothing_classes[] = 'hide-on-tablet';
} elseif ( 'hide-mobile' === $ecommerce_clothing_visibility ) {
    $ecommerce_clothing_classes[] = 'hide-on-mobile';
} elseif ( 'hide-tablet-mobile' === $ecommerce_clothing_visibility ) {
    $ecommerce_clothing_classes[] = 'hide-on-tablet-mobile';
}

$ecommerce_clothing_PAGE_TITLE_background_color = get_theme_mod('ecommerce_clothing_page_title_background_color_setting', '#eaeaea');

// Get the toggle switch value
$ecommerce_clothing_background_image_enabled = get_theme_mod('ecommerce_clothing_page_header_style', true);

// Add background image to the header if enabled
$ecommerce_clothing_background_image = get_theme_mod( 'ecommerce_clothing_page_header_background_image', '' );
$ecommerce_clothing_background_height = get_theme_mod( 'ecommerce_clothing_page_header_image_height', '200' );
$ecommerce_clothing_inline_style = '';

if ( $ecommerce_clothing_background_image_enabled && ! empty( $ecommerce_clothing_background_image ) ) {
    $ecommerce_clothing_inline_style .= 'background-image: url(' . esc_url( $ecommerce_clothing_background_image ) . '); ';
    $ecommerce_clothing_inline_style .= 'height: ' . esc_attr( $ecommerce_clothing_background_height ) . 'px; ';
    $ecommerce_clothing_inline_style .= 'background-size: cover; ';
    $ecommerce_clothing_inline_style .= 'background-position: center center; ';

    // Add the unique class if the background image is set
    $ecommerce_clothing_classes[] = 'has-background-image';
}

$ecommerce_clothing_classes = implode( ' ', $ecommerce_clothing_classes );
$ecommerce_clothing_heading = get_theme_mod( 'ecommerce_clothing_page_header_heading_tag', 'h1' );
$ecommerce_clothing_heading = apply_filters( 'ecommerce_clothing_page_header_heading', $ecommerce_clothing_heading );

?>

<?php do_action( 'ecommerce_clothing_before_page_header' ); ?>

<header class="<?php echo esc_attr( $ecommerce_clothing_classes ); ?>" style="<?php echo esc_attr( $ecommerce_clothing_inline_style ); ?> background-color: <?php echo esc_attr($ecommerce_clothing_PAGE_TITLE_background_color); ?>;">

    <?php do_action( 'ecommerce_clothing_before_page_header_inner' ); ?>

    <div class="asterthemes-wrapper page-header-inner">

        <?php if ( ecommerce_clothing_has_page_header() ) : ?>

            <<?php echo esc_attr( $ecommerce_clothing_heading ); ?> class="page-header-title">
                <?php echo wp_kses_post( ecommerce_clothing_get_page_title() ); ?>
            </<?php echo esc_attr( $ecommerce_clothing_heading ); ?>>

        <?php endif; ?>

        <?php if ( function_exists( 'ecommerce_clothing_breadcrumb' ) ) : ?>
            <?php ecommerce_clothing_breadcrumb(); ?>
        <?php endif; ?>

    </div><!-- .page-header-inner -->

    <?php do_action( 'ecommerce_clothing_after_page_header_inner' ); ?>

</header><!-- .page-header -->

<?php do_action( 'ecommerce_clothing_after_page_header' ); ?>