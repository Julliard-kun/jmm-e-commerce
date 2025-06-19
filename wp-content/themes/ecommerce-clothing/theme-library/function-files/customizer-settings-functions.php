<?php

/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package ecommerce_clothing
 */


// Output inline CSS based on Customizer setting
function ecommerce_clothing_customizer_css() {
    $enable_breadcrumb = get_theme_mod('ecommerce_clothing_enable_breadcrumb', true);
    ?>
    <style type="text/css">
        <?php if (!$enable_breadcrumb) : ?>
            nav.woocommerce-breadcrumb {
                display: none;
            }
        <?php endif; ?>
    </style>
    <?php
}
add_action('wp_head', 'ecommerce_clothing_customizer_css');

function ecommerce_clothing_customize_css() {
    ?>
    <style type="text/css">
        :root {
            --primary-color: <?php echo esc_html( get_theme_mod( 'primary_color', '#E30045' ) ); ?>;
        }
    </style>
    <?php
}
add_action( 'wp_head', 'ecommerce_clothing_customize_css' );

function ecommerce_clothing_enqueue_selected_fonts() {
    $ecommerce_clothing_fonts_url = ecommerce_clothing_get_fonts_url();
    if (!empty($ecommerce_clothing_fonts_url)) {
        wp_enqueue_style('ecommerce-clothing-google-fonts', $ecommerce_clothing_fonts_url, array(), null);
    }
}
add_action('wp_enqueue_scripts', 'ecommerce_clothing_enqueue_selected_fonts');

function ecommerce_clothing_layout_customizer_css() {
    $ecommerce_clothing_margin = get_theme_mod('ecommerce_clothing_layout_width_margin', 50);
    ?>
    <style type="text/css">
        body.site-boxed--layout #page  {
            margin: 0 <?php echo esc_attr($ecommerce_clothing_margin); ?>px;
        }
    </style>
    <?php
}
add_action('wp_head', 'ecommerce_clothing_layout_customizer_css');

function ecommerce_clothing_blog_layout_customizer_css() {
    // Retrieve the blog layout option
    $ecommerce_clothing_blog_layout_option = get_theme_mod('ecommerce_clothing_blog_layout_option_setting', 'Left');

    // Initialize custom CSS variable
    $ecommerce_clothing_custom_css = '';

    // Generate custom CSS based on the layout option
    if ($ecommerce_clothing_blog_layout_option === 'Default') {
        $ecommerce_clothing_custom_css .= '.mag-post-detail { text-align: center; }';
    } elseif ($ecommerce_clothing_blog_layout_option === 'Left') {
        $ecommerce_clothing_custom_css .= '.mag-post-detail { text-align: left; }';
    } elseif ($ecommerce_clothing_blog_layout_option === 'Right') {
        $ecommerce_clothing_custom_css .= '.mag-post-detail { text-align: right; }';
    }

    // Output the combined CSS
    ?>
    <style type="text/css">
        <?php echo wp_kses($ecommerce_clothing_custom_css, array( 'style' => array(), 'text-align' => array() )); ?>
    </style>
    <?php
}
add_action('wp_head', 'ecommerce_clothing_blog_layout_customizer_css');

// Featured Image Dimension
function ecommerce_clothing_custom_featured_image_css() {
    $ecommerce_clothing_dimension = get_theme_mod('ecommerce_clothing_blog_post_featured_image_dimension', 'default');
    $ecommerce_clothing_width = get_theme_mod('ecommerce_clothing_blog_post_featured_image_custom_width', '');
    $ecommerce_clothing_height = get_theme_mod('ecommerce_clothing_blog_post_featured_image_custom_height', '');
    
    if ($ecommerce_clothing_dimension === 'custom' && $ecommerce_clothing_width && $ecommerce_clothing_height) {
        $ecommerce_clothing_custom_css = "body:not(.single-post) .mag-post-single .mag-post-img img { width: {$ecommerce_clothing_width}px !important; height: {$ecommerce_clothing_height}px !important; }";
        wp_add_inline_style('ecommerce-clothing-style', $ecommerce_clothing_custom_css);
    }
}
add_action('wp_enqueue_scripts', 'ecommerce_clothing_custom_featured_image_css');

function ecommerce_clothing_sidebar_width_customizer_css() {
    $ecommerce_clothing_sidebar_width = get_theme_mod('ecommerce_clothing_sidebar_width', '30');
    ?>
    <style type="text/css">
        .right-sidebar .asterthemes-wrapper .asterthemes-page {
            grid-template-columns: auto <?php echo esc_attr($ecommerce_clothing_sidebar_width); ?>%;
        }
        .left-sidebar .asterthemes-wrapper .asterthemes-page {
            grid-template-columns: <?php echo esc_attr($ecommerce_clothing_sidebar_width); ?>% auto;
        }
    </style>
    <?php
}
add_action('wp_head', 'ecommerce_clothing_sidebar_width_customizer_css');

if ( ! function_exists( 'ecommerce_clothing_get_page_title' ) ) {
    function ecommerce_clothing_get_page_title() {
        $ecommerce_clothing_title = '';

        if (is_404()) {
            $ecommerce_clothing_title = esc_html__('Page Not Found', 'ecommerce-clothing');
        } elseif (is_search()) {
            $ecommerce_clothing_title = esc_html__('Search Results for: ', 'ecommerce-clothing') . esc_html(get_search_query());
        } elseif (is_home() && !is_front_page()) {
            $ecommerce_clothing_title = esc_html__('Blogs', 'ecommerce-clothing');
        } elseif (function_exists('is_shop') && is_shop()) {
            $ecommerce_clothing_title = esc_html__('Shop', 'ecommerce-clothing');
        } elseif (is_page()) {
            $ecommerce_clothing_title = get_the_title();
        } elseif (is_single()) {
            $ecommerce_clothing_title = get_the_title();
        } elseif (is_archive()) {
            $ecommerce_clothing_title = get_the_archive_title();
        } else {
            $ecommerce_clothing_title = get_the_archive_title();
        }

        return apply_filters('ecommerce_clothing_page_title', $ecommerce_clothing_title);
    }
}

if ( ! function_exists( 'ecommerce_clothing_has_page_header' ) ) {
    function ecommerce_clothing_has_page_header() {
        // Default to true (display header)
        $ecommerce_clothing_return = true;

        // Custom conditions for disabling the header
        if ('hide-all-devices' === get_theme_mod('ecommerce_clothing_page_header_visibility', 'all-devices')) {
            $ecommerce_clothing_return = false;
        }

        // Apply filters and return
        return apply_filters('ecommerce_clothing_display_page_header', $ecommerce_clothing_return);
    }
}

if ( ! function_exists( 'ecommerce_clothing_page_header_style' ) ) {
    function ecommerce_clothing_page_header_style() {
        $ecommerce_clothing_style = get_theme_mod('ecommerce_clothing_page_header_style', 'default');
        return apply_filters('ecommerce_clothing_page_header_style', $ecommerce_clothing_style);
    }
}

function ecommerce_clothing_page_title_customizer_css() {
    $ecommerce_clothing_layout_option = get_theme_mod('ecommerce_clothing_page_header_layout', 'left');
    ?>
    <style type="text/css">
        .asterthemes-wrapper.page-header-inner {
            <?php if ($ecommerce_clothing_layout_option === 'flex') : ?>
                display: flex;
                justify-content: space-between;
                align-items: center;
            <?php else : ?>
                text-align: <?php echo esc_attr($ecommerce_clothing_layout_option); ?>;
            <?php endif; ?>
        }
    </style>
    <?php
}
add_action('wp_head', 'ecommerce_clothing_page_title_customizer_css');

function ecommerce_clothing_pagetitle_height_css() {
    $ecommerce_clothing_height = get_theme_mod('ecommerce_clothing_pagetitle_height', 50);
    ?>
    <style type="text/css">
        header.page-header {
            padding: <?php echo esc_attr($ecommerce_clothing_height); ?>px 0;
        }
    </style>
    <?php
}
add_action('wp_head', 'ecommerce_clothing_pagetitle_height_css');

function ecommerce_clothing_site_logo_width() {
    $ecommerce_clothing_site_logo_width = get_theme_mod('ecommerce_clothing_site_logo_width', 200);
    ?>
    <style type="text/css">
        .site-logo img {
            max-width: <?php echo esc_attr($ecommerce_clothing_site_logo_width); ?>px;
        }
    </style>
    <?php
}
add_action('wp_head', 'ecommerce_clothing_site_logo_width');

function ecommerce_clothing_menu_font_size_css() {
    $ecommerce_clothing_menu_font_size = get_theme_mod('ecommerce_clothing_menu_font_size', 15);
    ?>
    <style type="text/css">
        .main-navigation a {
            font-size: <?php echo esc_attr($ecommerce_clothing_menu_font_size); ?>px;
        }
    </style>
    <?php
}
add_action('wp_head', 'ecommerce_clothing_menu_font_size_css');

function ecommerce_clothing_menu_text_transform_css() {
    $menu_text_transform = get_theme_mod('ecommerce_clothing_menu_text_transform', 'uppercase');
    ?>
    <style type="text/css">
        .main-navigation a {
            text-transform: <?php echo esc_attr($menu_text_transform); ?>;
        }
    </style>
    <?php
}
add_action('wp_head', 'ecommerce_clothing_menu_text_transform_css');

function ecommerce_clothing_sidebar_widget_font_size_css() {
    $ecommerce_clothing_sidebar_widget_font_size = get_theme_mod('ecommerce_clothing_sidebar_widget_font_size', 24);
    ?>
    <style type="text/css">
        h2.wp-block-heading,aside#secondary .widgettitle,aside#secondary .widget-title {
            font-size: <?php echo esc_attr($ecommerce_clothing_sidebar_widget_font_size); ?>px;
        }
    </style>
    <?php
}
add_action('wp_head', 'ecommerce_clothing_sidebar_widget_font_size_css');

// Woocommerce Related Products Settings
function ecommerce_clothing_related_product_css() {
    $ecommerce_clothing_related_product_show_hide = get_theme_mod('ecommerce_clothing_related_product_show_hide', true);

    if ( $ecommerce_clothing_related_product_show_hide != true) {
        ?>
        <style type="text/css">
            .related.products {
                display: none;
            }
        </style>
        <?php
    }
}
add_action('wp_head', 'ecommerce_clothing_related_product_css');

// Woocommerce Product Sale Position 
function ecommerce_clothing_product_sale_position_customizer_css() {
    $ecommerce_clothing_layout_option = get_theme_mod('ecommerce_clothing_product_sale_position', 'left');
    ?>
    <style type="text/css">
        .woocommerce ul.products li.product .onsale{
            <?php if ($ecommerce_clothing_layout_option === 'left') : ?>
                right: auto;
                left: 0px;
            <?php else : ?>
                left: auto;
                right: 0px;
            <?php endif; ?>
        }
    </style>
    <?php
}
add_action('wp_head', 'ecommerce_clothing_product_sale_position_customizer_css');  

//Copyright Alignment
function ecommerce_clothing_footer_copyright_alignment_css() {
    $ecommerce_clothing_footer_bottom_align = get_theme_mod( 'ecommerce_clothing_footer_bottom_align', 'center' );   
    ?>
    <style type="text/css">
        .site-footer .site-footer-bottom .site-footer-bottom-wrapper {
            justify-content: <?php echo esc_attr( $ecommerce_clothing_footer_bottom_align ); ?> 
        }

        /* Mobile Specific */
        @media screen and (max-width: 575px) {
            .site-footer .site-footer-bottom .site-footer-bottom-wrapper {
                justify-content: center;
                text-align:center;
            }
        }
    </style>
    <?php
}
add_action( 'wp_head', 'ecommerce_clothing_footer_copyright_alignment_css' );

// Preloader Background Color Setting
function ecommerce_clothing_preloader_background_colors_css() {
    $ecommerce_clothing_preloader_background_color_setting = get_theme_mod('ecommerce_clothing_preloader_background_color_setting', '');
        // Only output CSS if a color is set
        if (empty($ecommerce_clothing_preloader_background_color_setting)) {
            return;
        }
    ?>
    <style type="text/css">
        #loader {
            background-color: <?php echo esc_attr($ecommerce_clothing_preloader_background_color_setting); ?>;
        }
    </style>
    <?php
}
add_action('wp_head', 'ecommerce_clothing_preloader_background_colors_css');

// Preloader Background Image Setting
function ecommerce_clothing_preloader_background_image_css() {
    $ecommerce_clothing_preloader_background_image_setting = get_theme_mod('ecommerce_clothing_preloader_background_image_setting', '');
        // Only output CSS if the background image is set
        if (empty($ecommerce_clothing_preloader_background_image_setting)) {
            return;
        }
    ?>
    <style type="text/css">
        #loader {
            background-image: url('<?php echo esc_url($ecommerce_clothing_preloader_background_image_setting); ?>');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
    </style>
    <?php
}
add_action('wp_head', 'ecommerce_clothing_preloader_background_image_css');

//Footer Heading Alignment
function ecommerce_clothing_footer_heading_alignment_css() {
    $ecommerce_clothing_footer_header_align = get_theme_mod( 'ecommerce_clothing_footer_header_align', 'left' );   
    ?>
    <style type="text/css">
        .site-footer h4, footer#colophon h2.wp-block-heading, footer#colophon .widgettitle, footer#colophon .widget-title {
            text-align: <?php echo esc_attr( $ecommerce_clothing_footer_header_align ); ?> 
        }
    </style>
    <?php
}
add_action( 'wp_head', 'ecommerce_clothing_footer_heading_alignment_css' );