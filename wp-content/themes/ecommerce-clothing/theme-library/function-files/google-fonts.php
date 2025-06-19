<?php
function ecommerce_clothing_get_all_google_fonts() {
    $ecommerce_clothing_webfonts_json = get_template_directory() . '/theme-library/google-webfonts.json';
    if ( ! file_exists( $ecommerce_clothing_webfonts_json ) ) {
        return array();
    }

    $ecommerce_clothing_fonts_json_data = file_get_contents( $ecommerce_clothing_webfonts_json );
    if ( false === $ecommerce_clothing_fonts_json_data ) {
        return array();
    }

    $ecommerce_clothing_all_fonts = json_decode( $ecommerce_clothing_fonts_json_data, true );
    if ( json_last_error() !== JSON_ERROR_NONE ) {
        return array();
    }

    $ecommerce_clothing_google_fonts = array();
    foreach ( $ecommerce_clothing_all_fonts as $ecommerce_clothing_font ) {
        $ecommerce_clothing_google_fonts[ $ecommerce_clothing_font['family'] ] = array(
            'family'   => $ecommerce_clothing_font['family'],
            'variants' => $ecommerce_clothing_font['variants'],
        );
    }
    return $ecommerce_clothing_google_fonts;
}


function ecommerce_clothing_get_all_google_font_families() {
    $ecommerce_clothing_google_fonts  = ecommerce_clothing_get_all_google_fonts();
    $ecommerce_clothing_font_families = array();
    foreach ( $ecommerce_clothing_google_fonts as $ecommerce_clothing_font ) {
        $ecommerce_clothing_font_families[ $ecommerce_clothing_font['family'] ] = $ecommerce_clothing_font['family'];
    }
    return $ecommerce_clothing_font_families;
}

function ecommerce_clothing_get_fonts_url() {
    $ecommerce_clothing_fonts_url = '';
    $ecommerce_clothing_fonts     = array();

    $ecommerce_clothing_all_fonts = ecommerce_clothing_get_all_google_fonts();

    if ( ! empty( get_theme_mod( 'ecommerce_clothing_site_title_font', 'Lora' ) ) ) {
        $ecommerce_clothing_fonts[] = get_theme_mod( 'ecommerce_clothing_site_title_font', 'Lora' );
    }

    if ( ! empty( get_theme_mod( 'ecommerce_clothing_site_description_font', 'Raleway' ) ) ) {
        $ecommerce_clothing_fonts[] = get_theme_mod( 'ecommerce_clothing_site_description_font', 'Raleway' );
    }

    if ( ! empty( get_theme_mod( 'ecommerce_clothing_header_font', 'Raleway' ) ) ) {
        $ecommerce_clothing_fonts[] = get_theme_mod( 'ecommerce_clothing_header_font', 'Raleway' );
    }

    if ( ! empty( get_theme_mod( 'ecommerce_clothing_content_font', 'Raleway' ) ) ) {
        $ecommerce_clothing_fonts[] = get_theme_mod( 'ecommerce_clothing_content_font', 'Raleway' );
    }

    $ecommerce_clothing_fonts = array_unique( $ecommerce_clothing_fonts );

    foreach ( $ecommerce_clothing_fonts as $ecommerce_clothing_font ) {
        $ecommerce_clothing_variants      = $ecommerce_clothing_all_fonts[ $ecommerce_clothing_font ]['variants'];
        $ecommerce_clothing_font_family[] = $ecommerce_clothing_font . ':' . implode( ',', $ecommerce_clothing_variants );
    }

    $ecommerce_clothing_query_args = array(
        'family' => urlencode( implode( '|', $ecommerce_clothing_font_family ) ),
    );

    if ( ! empty( $ecommerce_clothing_font_family ) ) {
        $ecommerce_clothing_fonts_url = add_query_arg( $ecommerce_clothing_query_args, 'https://fonts.googleapis.com/css' );
    }

    return $ecommerce_clothing_fonts_url;
}