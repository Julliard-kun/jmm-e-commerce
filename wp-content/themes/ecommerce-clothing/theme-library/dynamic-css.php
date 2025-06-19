<?php

/**
 * Dynamic CSS
 */
function ecommerce_clothing_dynamic_css() {
	$ecommerce_clothing_primary_color = get_theme_mod( 'primary_color', '#E30045' );

	$ecommerce_clothing_site_title_font       = get_theme_mod( 'ecommerce_clothing_site_title_font', 'Lora' );
	$ecommerce_clothing_site_description_font = get_theme_mod( 'ecommerce_clothing_site_description_font', 'Raleway' );
	$ecommerce_clothing_header_font           = get_theme_mod( 'ecommerce_clothing_header_font', 'Raleway' );
	$ecommerce_clothing_content_font             = get_theme_mod( 'ecommerce_clothing_content_font', 'Raleway' );

	// Enqueue Google Fonts
	$ecommerce_clothing_fonts_url = ecommerce_clothing_get_fonts_url();
	if ( ! empty( $ecommerce_clothing_fonts_url ) ) {
		wp_enqueue_style( 'ecommerce-clothing-google-fonts', esc_url( $ecommerce_clothing_fonts_url ), array(), null );
	}

	$ecommerce_clothing_custom_css  = '';
	$ecommerce_clothing_custom_css .= '
    /* Color */
    :root {
        --primary-color: ' . esc_attr( $ecommerce_clothing_primary_color ) . ';
        --header-text-color: ' . esc_attr( '#' . get_header_textcolor() ) . ';
    }
    ';

	$ecommerce_clothing_custom_css .= '
    /* Typography */
    :root {
        --font-heading: "' . esc_attr( $ecommerce_clothing_header_font ) . '", serif;
        --font-main: -apple-system, BlinkMacSystemFont, "' . esc_attr( $ecommerce_clothing_content_font ) . '", "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
    }

    body,
	button, input, select, optgroup, textarea, p {
        font-family: "' . esc_attr( $ecommerce_clothing_content_font ) . '", serif;
	}

	.site-identity p.site-title, h1.site-title a, h1.site-title, p.site-title a, .site-branding h1.site-title a {
        font-family: "' . esc_attr( $ecommerce_clothing_site_title_font ) . '", serif;
	}
    
	p.site-description {
        font-family: "' . esc_attr( $ecommerce_clothing_site_description_font ) . '", serif !important;
	}
    ';

	wp_add_inline_style( 'ecommerce-clothing-style', $ecommerce_clothing_custom_css );
}
add_action( 'wp_enqueue_scripts', 'ecommerce_clothing_dynamic_css', 99 );