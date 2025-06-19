<?php
/**
 * Estore Woocommerce Theme Customizer
 *
 * @link: https://developer.wordpress.org/themes/customize-api/customizer-objects/
 *
 * @package Estore Woocommerce
 */

if ( ! defined( 'ESTORE_WOOCOMMERCE_URL' ) ) {
    define( 'ESTORE_WOOCOMMERCE_URL', esc_url( 'https://www.themagnifico.net/products/estore-wordpress-theme', 'estore-woocommerce') );
}
if ( ! defined( 'ESTORE_WOOCOMMERCE_TEXT' ) ) {
    define( 'ESTORE_WOOCOMMERCE_TEXT', __( 'Estore Woocommerce Pro','estore-woocommerce' ));
}
if ( ! defined( 'ESTORE_WOOCOMMERCE_BUY_TEXT' ) ) {
    define( 'ESTORE_WOOCOMMERCE_BUY_TEXT', __( 'Buy Estore Woocommerce Pro','estore-woocommerce' ));
}

use WPTRT\Customize\Section\Estore_Woocommerce_Button;

add_action( 'customize_register', function( $manager ) {

    $manager->register_section_type( Estore_Woocommerce_Button::class );

    $manager->add_section(
        new Estore_Woocommerce_Button( $manager, 'estore_woocommerce_pro', [
            'title'       => esc_html( ESTORE_WOOCOMMERCE_TEXT,'estore-woocommerce' ),
            'priority'    => 0,
            'button_text' => __( 'GET PREMIUM', 'estore-woocommerce' ),
            'button_url'  => esc_url( ESTORE_WOOCOMMERCE_URL )
        ] )
    );

} );

// Load the JS and CSS.
add_action( 'customize_controls_enqueue_scripts', function() {

    $version = wp_get_theme()->get( 'Version' );

    wp_enqueue_script(
        'estore-woocommerce-customize-section-button',
        get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/js/customize-controls.js' ),
        [ 'customize-controls' ],
        $version,
        true
    );

    wp_enqueue_style(
        'estore-woocommerce-customize-section-button',
        get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/css/customize-controls.css' ),
        [ 'customize-controls' ],
        $version
    );

} );

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function estore_woocommerce_customize_register($wp_customize){

    // Pro Version
    class Estore_Woocommerce_Customize_Pro_Version extends WP_Customize_Control {
        public $type = 'pro_options';

        public function render_content() {
            echo '<span>For More <strong>'. esc_html( $this->label ) .'</strong>?</span>';
            echo '<a href="'. esc_url($this->description) .'" target="_blank">';
                echo '<span class="dashicons dashicons-info"></span>';
                echo '<strong> '. esc_html( ESTORE_WOOCOMMERCE_BUY_TEXT,'estore-woocommerce' ) .'<strong></a>';
            echo '</a>';
        }
    }

    // Custom Controls
    function Estore_Woocommerce_sanitize_custom_control( $input ) {
        return $input;
    }

    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';

    //Logo
    $wp_customize->add_setting('estore_woocommerce_logo_max_height',array(
        'default'   => '24',
        'sanitize_callback' => 'estore_woocommerce_sanitize_number_absint'
    ));
    $wp_customize->add_control('estore_woocommerce_logo_max_height',array(
        'label' => esc_html__('Logo Width','estore-woocommerce'),
        'section'   => 'title_tagline',
        'type'      => 'number'
    ));

    $wp_customize->add_setting('estore_woocommerce_logo_title_text', array(
        'default' => true,
        'sanitize_callback' => 'estore_woocommerce_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'estore_woocommerce_logo_title_text',array(
        'label'          => __( 'Enable Disable Title', 'estore-woocommerce' ),
        'section'        => 'title_tagline',
        'settings'       => 'estore_woocommerce_logo_title_text',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('estore_woocommerce_theme_description', array(
        'default' => false,
        'sanitize_callback' => 'estore_woocommerce_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'estore_woocommerce_theme_description',array(
        'label'          => __( 'Enable Disable Tagline', 'estore-woocommerce' ),
        'section'        => 'title_tagline',
        'settings'       => 'estore_woocommerce_theme_description',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('estore_woocommerce_logo_title_color', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'estore_woocommerce_logo_title_color', array(
        'label'    => __('Site Title Color', 'estore-woocommerce'),
        'section'  => 'title_tagline'
    )));

    $wp_customize->add_setting('estore_woocommerce_logo_tagline_color', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'estore_woocommerce_logo_tagline_color', array(
        'label'    => __('Site Tagline Color', 'estore-woocommerce'),
        'section'  => 'title_tagline'
    )));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_logo', array(
        'sanitize_callback' => 'Estore_Woocommerce_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Estore_Woocommerce_Customize_Pro_Version ( $wp_customize,'pro_version_logo', array(
        'section'     => 'title_tagline',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'estore-woocommerce' ),
        'description' => esc_url( ESTORE_WOOCOMMERCE_URL ),
        'priority'    => 100
    )));

    // General Settings
     $wp_customize->add_section('estore_woocommerce_general_settings',array(
        'title' => esc_html__('General Settings','estore-woocommerce'),
        'priority'   => 30,
    ));

    $wp_customize->add_setting('estore_woocommerce_site_width_layout',array(
        'default' => 'Full Width',
        'sanitize_callback' => 'estore_woocommerce_sanitize_choices'
    ));
    $wp_customize->add_control('estore_woocommerce_site_width_layout',array(
        'label'       => esc_html__( 'Site Width Layout','estore-woocommerce' ),
        'type' => 'radio',
        'section' => 'estore_woocommerce_general_settings',
        'choices' => array(
            'Full Width' => __('Full Width','estore-woocommerce'),
            'Wide Width' => __('Wide Width','estore-woocommerce'),
            'Container Width' => __('Container Width','estore-woocommerce')
        ),
    ) );

    $wp_customize->add_setting('estore_woocommerce_preloader_hide', array(
        'default' => 0,
        'sanitize_callback' => 'estore_woocommerce_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'estore_woocommerce_preloader_hide',array(
        'label'          => __( 'Show Theme Preloader', 'estore-woocommerce' ),
        'section'        => 'estore_woocommerce_general_settings',
        'settings'       => 'estore_woocommerce_preloader_hide',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('estore_woocommerce_preloader_type',array(
        'default' => 'Preloader 1',
        'sanitize_callback' => 'estore_woocommerce_sanitize_choices'
    ));
    $wp_customize->add_control('estore_woocommerce_preloader_type',array(
        'type' => 'radio',
        'label' => esc_html__('Preloader Type','estore-woocommerce'),
        'section' => 'estore_woocommerce_general_settings',
        'choices' => array(
            'Preloader 1' => __('Preloader 1','estore-woocommerce'),
            'Preloader 2' => __('Preloader 2','estore-woocommerce'),
        ),
    ) );

    $wp_customize->add_setting( 'estore_woocommerce_preloader_bg_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'estore_woocommerce_preloader_bg_color', array(
        'label' => esc_html__('Preloader Background Color','estore-woocommerce'),
        'section' => 'estore_woocommerce_general_settings',
        'settings' => 'estore_woocommerce_preloader_bg_color'
    )));

    $wp_customize->add_setting( 'estore_woocommerce_preloader_dot_1_color', array(
        'default' => '#29AAE2',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'estore_woocommerce_preloader_dot_1_color', array(
        'label' => esc_html__('Preloader First Dot Color','estore-woocommerce'),
        'section' => 'estore_woocommerce_general_settings',
        'settings' => 'estore_woocommerce_preloader_dot_1_color',
        'active_callback' => 'estore_woocommerce_preloader1'
    )));

    $wp_customize->add_setting( 'estore_woocommerce_preloader_dot_2_color', array(
        'default' => '#151515',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'estore_woocommerce_preloader_dot_2_color', array(
        'label' => esc_html__('Preloader Second Dot Color','estore-woocommerce'),
        'section' => 'estore_woocommerce_general_settings',
        'settings' => 'estore_woocommerce_preloader_dot_2_color',
        'active_callback' => 'estore_woocommerce_preloader1'
    )));

    $wp_customize->add_setting( 'estore_woocommerce_preloader2_dot_color', array(
        'default' => '#2b93ff',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'estore_woocommerce_preloader2_dot_color', array(
        'label' => esc_html__('Preloader Dot Color','estore-woocommerce'),
        'section' => 'estore_woocommerce_general_settings',
        'settings' => 'estore_woocommerce_preloader2_dot_color',
        'active_callback' => 'estore_woocommerce_preloader2'
    )));

    $wp_customize->add_setting('estore_woocommerce_scroll_hide', array(
        'default' => false,
        'sanitize_callback' => 'estore_woocommerce_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'estore_woocommerce_scroll_hide',array(
        'label'          => __( 'Show Theme Scroll To Top', 'estore-woocommerce' ),
        'section'        => 'estore_woocommerce_general_settings',
        'settings'       => 'estore_woocommerce_scroll_hide',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('estore_woocommerce_scroll_top_position',array(
        'default' => 'Right',
        'sanitize_callback' => 'estore_woocommerce_sanitize_choices'
    ));
    $wp_customize->add_control('estore_woocommerce_scroll_top_position',array(
        'label'       => esc_html__( 'Scroll To Top Positions','estore-woocommerce' ),
        'type' => 'radio',
        'section' => 'estore_woocommerce_general_settings',
        'choices' => array(
            'Right' => __('Right','estore-woocommerce'),
            'Left' => __('Left','estore-woocommerce'),
            'Center' => __('Center','estore-woocommerce')
        ),
    ) );

    $wp_customize->add_setting( 'estore_woocommerce_scroll_bg_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'estore_woocommerce_scroll_bg_color', array(
        'label' => esc_html__('Scroll Top Background Color','estore-woocommerce'),
        'section' => 'estore_woocommerce_general_settings',
        'settings' => 'estore_woocommerce_scroll_bg_color'
    )));

    $wp_customize->add_setting( 'estore_woocommerce_scroll_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'estore_woocommerce_scroll_color', array(
        'label' => esc_html__('Scroll Top Color','estore-woocommerce'),
        'section' => 'estore_woocommerce_general_settings',
        'settings' => 'estore_woocommerce_scroll_color'
    )));

    $wp_customize->add_setting('estore_woocommerce_scroll_font_size',array(
        'default'   => '16',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('estore_woocommerce_scroll_font_size',array(
        'label' => __('Scroll Top Font Size','estore-woocommerce'),
        'description' => __('Put in px','estore-woocommerce'),
        'section'   => 'estore_woocommerce_general_settings',
        'type'      => 'number'
    ));

    $wp_customize->add_setting( 'estore_woocommerce_scroll_to_top_border_radius', array(
        'default'              => '0',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'estore_woocommerce_sanitize_number_range'
    ) );
    $wp_customize->add_control( 'estore_woocommerce_scroll_to_top_border_radius', array(
        'label'       => esc_html__( 'Scroll To Top Border Radius','estore-woocommerce' ),
        'section'     => 'estore_woocommerce_general_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 50,
        ),
    ) );

    // Product Columns
   $wp_customize->add_setting( 'estore_woocommerce_products_per_row' , array(
       'default'           => '3',
       'transport'         => 'refresh',
       'sanitize_callback' => 'estore_woocommerce_sanitize_select',
   ) );

   $wp_customize->add_control('estore_woocommerce_products_per_row', array(
       'label' => __( 'Product per row', 'estore-woocommerce' ),
       'section'  => 'estore_woocommerce_general_settings',
       'type'     => 'select',
       'choices'  => array(
           '2' => '2',
           '3' => '3',
           '4' => '4',
       ),
   ) );

   //Woocommerce Single Product page Sidebar
    $wp_customize->add_setting('estore_woocommerce_woocommerce_single_product_page_sidebar', array(
        'default' => true,
        'sanitize_callback' => 'estore_woocommerce_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'estore_woocommerce_woocommerce_single_product_page_sidebar',array(
        'label'          => __( 'Hide Single Product Page Sidebar', 'estore-woocommerce' ),
        'section'        => 'estore_woocommerce_general_settings',
        'settings'       => 'estore_woocommerce_woocommerce_single_product_page_sidebar',
        'type'           => 'checkbox',
    )));

  $wp_customize->add_setting('estore_woocommerce_single_product_sidebar_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'estore_woocommerce_sanitize_choices'
    ));
    $wp_customize->add_control('estore_woocommerce_single_product_sidebar_layout',array(
        'type' => 'select',
        'label' => __('Woocommerce Single Product Page Sidebar','estore-woocommerce'),
        'section' => 'estore_woocommerce_general_settings',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','estore-woocommerce'),
            'Right Sidebar' => __('Right Sidebar','estore-woocommerce'),
        ),
    ) );

    //Woocommerce shop page Sidebar
    $wp_customize->add_setting('estore_woocommerce_woocommerce_shop_page_sidebar', array(
        'default' => true,
        'sanitize_callback' => 'estore_woocommerce_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'estore_woocommerce_woocommerce_shop_page_sidebar',array(
        'label'          => __( 'Hide Shop Page Sidebar', 'estore-woocommerce' ),
        'section'        => 'estore_woocommerce_general_settings',
        'settings'       => 'estore_woocommerce_woocommerce_shop_page_sidebar',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('estore_woocommerce_shop_page_sidebar_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'estore_woocommerce_sanitize_choices'
    ));
    $wp_customize->add_control('estore_woocommerce_shop_page_sidebar_layout',array(
        'type' => 'select',
        'label' => __('Woocommerce Shop Page Sidebar','estore-woocommerce'),
        'section' => 'estore_woocommerce_general_settings',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','estore-woocommerce'),
            'Right Sidebar' => __('Right Sidebar','estore-woocommerce'),
        ),
    ) );

    $wp_customize->add_setting('estore_woocommerce_woocommerce_product_sale',array(
        'default' => 'Left',
        'sanitize_callback' => 'estore_woocommerce_sanitize_choices'
    ));
    $wp_customize->add_control('estore_woocommerce_woocommerce_product_sale',array(
        'label'       => esc_html__( 'Woocommerce Product Sale Positions','estore-woocommerce' ),
        'type' => 'radio',
        'section' => 'estore_woocommerce_general_settings',
        'choices' => array(
            'Right' => __('Right','estore-woocommerce'),
            'Left' => __('Left','estore-woocommerce'),
            'Center' => __('Center','estore-woocommerce')
        ),
    ) );

    $wp_customize->add_setting( 'estore_woocommerce_woo_product_sale_border_radius', array(
        'default'              => '',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'estore_woocommerce_sanitize_number_range'
    ) );
    $wp_customize->add_control( 'estore_woocommerce_woo_product_sale_border_radius', array(
        'label'       => esc_html__( 'Woocommerce Product Sale Border Radius','estore-woocommerce' ),
        'section'     => 'estore_woocommerce_general_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 50,
        ),
    ) );

    //Products border radius
    $wp_customize->add_setting( 'estore_woocommerce_woo_product_border_radius', array(
        'default'              => '0',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'estore_woocommerce_sanitize_number_range'
    ) );
    $wp_customize->add_control( 'estore_woocommerce_woo_product_border_radius', array(
        'label'       => esc_html__( 'Product Border Radius','estore-woocommerce' ),
        'section'     => 'estore_woocommerce_general_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 150,
        ),
    ) );

    // Pro Version
    $wp_customize->add_setting( 'pro_version_general_setting', array(
        'sanitize_callback' => 'Estore_Woocommerce_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Estore_Woocommerce_Customize_Pro_Version ( $wp_customize,'pro_version_general_setting', array(
        'section'     => 'estore_woocommerce_general_settings',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'estore-woocommerce' ),
        'description' => esc_url( ESTORE_WOOCOMMERCE_URL ),
        'priority'    => 100
    )));

    //Top Bar
    $wp_customize->add_section('estore_woocommerce_topbar',array(
        'title' => esc_html__('Topbar Option','estore-woocommerce')
    ));

    $wp_customize->add_setting('estore_woocommerce_topbar_phone_text',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('estore_woocommerce_topbar_phone_text',array(
        'label' => esc_html__('Phone Text','estore-woocommerce'),
        'section' => 'estore_woocommerce_topbar',
        'setting' => 'estore_woocommerce_topbar_phone_text',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('estore_woocommerce_topbar_phone_number',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('estore_woocommerce_topbar_phone_number',array(
        'label' => esc_html__('Phone Number','estore-woocommerce'),
        'section' => 'estore_woocommerce_topbar',
        'setting' => 'estore_woocommerce_topbar_phone_number',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('estore_woocommerce_topbar_checkout_button',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('estore_woocommerce_topbar_checkout_button',array(
        'label' => esc_html__('CheckOut Button','estore-woocommerce'),
        'section' => 'estore_woocommerce_topbar',
        'setting' => 'estore_woocommerce_topbar_checkout_button',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('estore_woocommerce_topbar_about_url',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('estore_woocommerce_topbar_about_url',array(
        'label' => esc_html__('Button Url 1','estore-woocommerce'),
        'section' => 'estore_woocommerce_topbar',
        'setting' => 'estore_woocommerce_topbar_about_url',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('estore_woocommerce_topbar_order_button',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('estore_woocommerce_topbar_order_button',array(
        'label' => esc_html__('Button Text 3','estore-woocommerce'),
        'section' => 'estore_woocommerce_topbar',
        'setting' => 'estore_woocommerce_topbar_order_button',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('estore_woocommerce_topbar_order_url',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('estore_woocommerce_topbar_order_url',array(
        'label' => esc_html__('Button Url 3','estore-woocommerce'),
        'section' => 'estore_woocommerce_topbar',
        'setting' => 'estore_woocommerce_topbar_order_url',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('estore_woocommerce_topbar1_wishlist_url',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('estore_woocommerce_topbar1_wishlist_url',array(
        'label' => esc_html__('Wishlist url','estore-woocommerce'),
        'section' => 'estore_woocommerce_topbar',
        'setting' => 'estore_woocommerce_topbar1_wishlist_url',
        'type'  => 'text'
    ));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_topbar_setting', array(
        'sanitize_callback' => 'Estore_Woocommerce_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Estore_Woocommerce_Customize_Pro_Version ( $wp_customize,'pro_version_topbar_setting', array(
        'section'     => 'estore_woocommerce_topbar',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'estore-woocommerce' ),
        'description' => esc_url( ESTORE_WOOCOMMERCE_URL ),
        'priority'    => 100
    )));

    //Header
    $wp_customize->add_section('estore_woocommerce_header',array(
        'title' => esc_html__('Header Option','estore-woocommerce')
    ));

    $wp_customize->add_setting('estore_woocommerce_header_location_button',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('estore_woocommerce_header_location_button',array(
        'label' => esc_html__('Location Text','estore-woocommerce'),
        'section' => 'estore_woocommerce_header',
        'setting' => 'estore_woocommerce_header_location_button',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('estore_woocommerce_header_locaion_url',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('estore_woocommerce_header_locaion_url',array(
        'label' => esc_html__('Location Url','estore-woocommerce'),
        'section' => 'estore_woocommerce_header',
        'setting' => 'estore_woocommerce_header_locaion_url',
        'type'  => 'text'
    ));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_header_setting', array(
        'sanitize_callback' => 'Estore_Woocommerce_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Estore_Woocommerce_Customize_Pro_Version ( $wp_customize,'pro_version_header_setting', array(
        'section'     => 'estore_woocommerce_header',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'estore-woocommerce' ),
        'description' => esc_url( ESTORE_WOOCOMMERCE_URL ),
        'priority'    => 100
    )));

    //Menu Settings
    $wp_customize->add_section('estore_woocommerce_menu_settings',array(
        'title' => esc_html__('Menus Settings','estore-woocommerce'),
    ));

    $wp_customize->add_setting('estore_woocommerce_menu_font_size',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('estore_woocommerce_menu_font_size',array(
        'label' => esc_html__('Menu Font Size','estore-woocommerce'),
        'section' => 'estore_woocommerce_menu_settings',
        'type'  => 'number'
    ));

    $wp_customize->add_setting('estore_woocommerce_nav_menu_text_transform',array(
        'default'=> 'Capitalize',
        'sanitize_callback' => 'estore_woocommerce_sanitize_choices'
    ));
    $wp_customize->add_control('estore_woocommerce_nav_menu_text_transform',array(
        'type' => 'radio',
        'label' => esc_html__('Menu Text Transform','estore-woocommerce'),
        'choices' => array(
            'Uppercase' => __('Uppercase','estore-woocommerce'),
            'Capitalize' => __('Capitalize','estore-woocommerce'),
            'Lowercase' => __('Lowercase','estore-woocommerce'),
        ),
        'section'=> 'estore_woocommerce_menu_settings',
    ));

    $wp_customize->add_setting('estore_woocommerce_nav_menu_font_weight',array(
        'default'=> '500',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('estore_woocommerce_nav_menu_font_weight',array(
        'type' => 'number',
        'label' => esc_html__('Menu Font Weight','estore-woocommerce'),
        'input_attrs' => array(
            'step'             => 100,
            'min'              => 100,
            'max'              => 1000,
        ),
        'section'=> 'estore_woocommerce_menu_settings',
    ));

     //Slider
    $wp_customize->add_section('estore_woocommerce_top_slider',array(
        'title' => esc_html__('Slider Settings','estore-woocommerce'),
        'description' => esc_html__('Here you have to add 3 different pages in below dropdown. Note: Image Dimensions 1400 x 550 px','estore-woocommerce')
    ));

    $wp_customize->add_setting('estore_woocommerce_top_slider_setting', array(
        'default' => 1,
        'sanitize_callback' => 'estore_woocommerce_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'estore_woocommerce_top_slider_setting',array(
        'label'          => __( 'Enable Disable Slider', 'estore-woocommerce' ),
        'section'        => 'estore_woocommerce_top_slider',
        'settings'       => 'estore_woocommerce_top_slider_setting',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('estore_woocommerce_slider_title_setting', array(
        'default' => 1,
        'sanitize_callback' => 'estore_woocommerce_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'estore_woocommerce_slider_title_setting',array(
        'label'          => __( 'Enable Disable Slider Title', 'estore-woocommerce' ),
        'section'        => 'estore_woocommerce_top_slider',
        'settings'       => 'estore_woocommerce_slider_title_setting',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('estore_woocommerce_slider_content_setting', array(
        'default' => 1,
        'sanitize_callback' => 'estore_woocommerce_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'estore_woocommerce_slider_content_setting',array(
        'label'          => __( 'Enable Disable Slider Content', 'estore-woocommerce' ),
        'section'        => 'estore_woocommerce_top_slider',
        'settings'       => 'estore_woocommerce_slider_content_setting',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('estore_woocommerce_slider_button_setting', array(
        'default' => 1,
        'sanitize_callback' => 'estore_woocommerce_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'estore_woocommerce_slider_button_setting',array(
        'label'          => __( 'Enable Disable Slider Button', 'estore-woocommerce' ),
        'section'        => 'estore_woocommerce_top_slider',
        'settings'       => 'estore_woocommerce_slider_button_setting',
        'type'           => 'checkbox',
    )));

    for ( $estore_woocommerce_count = 1; $estore_woocommerce_count <= 3; $estore_woocommerce_count++ ) {

        $wp_customize->add_setting( 'estore_woocommerce_top_slider_page' . $estore_woocommerce_count, array(
            'default'           => '',
            'sanitize_callback' => 'estore_woocommerce_sanitize_dropdown_pages'
        ) );
        $wp_customize->add_control( 'estore_woocommerce_top_slider_page' . $estore_woocommerce_count, array(
            'label'    => __( 'Select Slide Page', 'estore-woocommerce' ),
            'section'  => 'estore_woocommerce_top_slider',
            'type'     => 'dropdown-pages'
        ) );
    }

    //Slider button text
    $wp_customize->add_setting('estore_woocommerce_slider_button_text',array(
        'default'=> '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('estore_woocommerce_slider_button_text',array(
        'label' => __('Slider Button Text','estore-woocommerce'),
        'section'=> 'estore_woocommerce_top_slider',
        'type'=> 'text'
    ));         

     //Opacity
    $wp_customize->add_setting('estore_woocommerce_slider_opacity_setting', array(
        'default' => true,
        'sanitize_callback' => 'estore_woocommerce_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'estore_woocommerce_slider_opacity_setting',array(
        'label'    => __( 'Show Image Opacity', 'estore-woocommerce' ),
        'section'  => 'estore_woocommerce_top_slider',
        'type'     => 'checkbox',
    )));

    $wp_customize->add_setting( 'estore_woocommerce_image_opacity_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'estore_woocommerce_image_opacity_color', array(
        'label' => __('Slider Image Opacity Color', 'estore-woocommerce'),
        'section' => 'estore_woocommerce_top_slider',
        'settings' => 'estore_woocommerce_image_opacity_color',
    )));

    $wp_customize->add_setting('estore_woocommerce_slider_opacity',array(
        'default'=> '0.5',
        'sanitize_callback' => 'estore_woocommerce_sanitize_choices'
    ));
    $wp_customize->add_control('estore_woocommerce_slider_opacity',array(
        'type' => 'select',
        'label' => esc_html__('Slider Image Opacity','estore-woocommerce'),
        'choices' => array(
            '0'   => '0',
            '0.1' => '0.1',
            '0.2' => '0.2',
            '0.3' => '0.3',
            '0.4' => '0.4',
            '0.5' => '0.5',
            '0.6' => '0.6',
            '0.7' => '0.7',
            '0.8' => '0.8',
            '0.9' => '0.9',
            '1'   => '1',
        ),
        'section'=> 'estore_woocommerce_top_slider',
    ));

     //Slider height
    $wp_customize->add_setting('estore_woocommerce_slider_img_height',array(
        'default'=> '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('estore_woocommerce_slider_img_height',array(
        'label' => __('Slider Height','estore-woocommerce'),
        'description'   => __('Add the slider height in px(eg. 500px).','estore-woocommerce'),
        'input_attrs' => array(
            'placeholder' => __( '500px', 'estore-woocommerce' ),
        ),
        'section'=> 'estore_woocommerce_top_slider',
        'type'=> 'text'
    ));

    $wp_customize->add_setting('estore_woocommerce_slider_content_layout',array(
        'default'=> 'Left',
        'sanitize_callback' => 'estore_woocommerce_sanitize_choices'
    ));
    $wp_customize->add_control('estore_woocommerce_slider_content_layout',array(
        'type' => 'radio',
        'label' => esc_html__('Slider Content Layout','estore-woocommerce'),
        'choices' => array(
            'Left' => __('Left','estore-woocommerce'),
            'Center' => __('Center','estore-woocommerce'),
            'Right' => __('Right','estore-woocommerce'),
        ),
        'section'=> 'estore_woocommerce_top_slider',
    ));

    $wp_customize->add_setting('estore_woocommerce_slider_excerpt_length',array(
        'sanitize_callback' => 'estore_woocommerce_sanitize_number_range',
        'default'  => 15,
    ));
    $wp_customize->add_control('estore_woocommerce_slider_excerpt_length',array(
        'label'       => esc_html__('Slider Excerpt Length', 'estore-woocommerce'),
        'section'     => 'estore_woocommerce_top_slider',
        'type'        => 'range',
        'input_attrs' => array(
            'step' => 1,
            'min'  => 1,
            'max'  => 50,
        ),
    ));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_slider_setting', array(
        'sanitize_callback' => 'Estore_Woocommerce_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Estore_Woocommerce_Customize_Pro_Version ( $wp_customize,'pro_version_slider_setting', array(
        'section'     => 'estore_woocommerce_top_slider',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'estore-woocommerce' ),
        'description' => esc_url( ESTORE_WOOCOMMERCE_URL ),
        'priority'    => 100
    )));

    // Best Sells Product
    $wp_customize->add_section('estore_woocommerce_best_sells',array(
        'title' => esc_html__('Best Sells Option','estore-woocommerce')
    ));

    $wp_customize->add_setting('estore_woocommerce_best_sells_section_heading',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('estore_woocommerce_best_sells_section_heading',array(
        'label' => __('Heading','estore-woocommerce'),
        'section' => 'estore_woocommerce_best_sells',
        'setting' => 'estore_woocommerce_best_sells_section_heading',
        'type'    => 'text'
    ));

    $wp_customize->add_setting('estore_woocommerce_best_sells_section_button',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('estore_woocommerce_best_sells_section_button',array(
        'label' => esc_html__('Button Text','estore-woocommerce'),
        'section' => 'estore_woocommerce_best_sells',
        'setting' => 'estore_woocommerce_best_sells_section_button',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('estore_woocommerce_best_sells_section_button_url',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('estore_woocommerce_best_sells_section_button_url',array(
        'label' => esc_html__('Button Url ','estore-woocommerce'),
        'section' => 'estore_woocommerce_best_sells',
        'setting' => 'estore_woocommerce_best_sells_section_button_url',
        'type'  => 'text'
    ));

    if(class_exists('woocommerce')){
        $estore_woocommerce_args = array(
            'type'                     => 'product',
            'child_of'                 => 0,
            'parent'                   => '',
            'orderby'                  => 'term_group',
            'order'                    => 'ASC',
            'hide_empty'               => false,
            'hierarchical'             => 1,
            'number'                   => '',
            'taxonomy'                 => 'product_cat',
            'pad_counts'               => false
        );
        $categories = get_categories( $estore_woocommerce_args );
        $cats = array();
        $i = 0;
        foreach($categories as $category){
            if($i==0){
                $default = $category->slug;
                $i++;
            }
            $cats[$category->slug] = $category->name;
        }
        $wp_customize->add_setting('estore_woocommerce_cate_tab',array(
            'sanitize_callback' => 'estore_woocommerce_sanitize_select',
        ));
        $wp_customize->add_control('estore_woocommerce_cate_tab',array(
            'type'    => 'select',
            'choices' => $cats,
            'label' => __('Select Product Category','estore-woocommerce'),
            'section' => 'estore_woocommerce_best_sells',
        ));
    }

    // Pro Version
    $wp_customize->add_setting( 'pro_version_best_seller_setting', array(
        'sanitize_callback' => 'Estore_Woocommerce_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Estore_Woocommerce_Customize_Pro_Version ( $wp_customize,'pro_version_best_seller_setting', array(
        'section'     => 'estore_woocommerce_best_sells',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'estore-woocommerce' ),
        'description' => esc_url( ESTORE_WOOCOMMERCE_URL ),
        'priority'    => 100
    )));
    
    // Footer
    $wp_customize->add_section('estore_woocommerce_site_footer_section', array(
        'title' => esc_html__('Footer', 'estore-woocommerce'),
    ));

    $wp_customize->add_setting('estore_woocommerce_show_hide_footer',array(
        'default' => true,
        'sanitize_callback' => 'estore_woocommerce_sanitize_checkbox'
    ));
    $wp_customize->add_control('estore_woocommerce_show_hide_footer',array(
        'type' => 'checkbox',
        'label' => __('Show / Hide Footer','estore-woocommerce'),
        'section' => 'estore_woocommerce_site_footer_section',
        'priority' => 1,
    ));

    $wp_customize->add_setting('estore_woocommerce_footer_bg_image',array(
        'default'   => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'estore_woocommerce_footer_bg_image',array(
        'label' => __('Footer Background Image','estore-woocommerce'),
        'section' => 'estore_woocommerce_site_footer_section',
        'priority' => 1,
    )));

    $wp_customize->add_setting('estore_woocommerce_footer_bg_image_position',array(
        'default'=> 'scroll',
        'sanitize_callback' => 'estore_woocommerce_sanitize_choices'
    ));
    $wp_customize->add_control('estore_woocommerce_footer_bg_image_position',array(
        'type' => 'select',
        'label' => __('Footer Background Image Position','estore-woocommerce'),
        'choices' => array(
            'fixed' => __('fixed','estore-woocommerce'),
            'scroll' => __('scroll','estore-woocommerce'),
        ),
        'section'=> 'estore_woocommerce_site_footer_section',
    ));

    $wp_customize->add_setting( 'estore_woocommerce_footer_bg_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'estore_woocommerce_footer_bg_color', array(
        'label' => __('Footer Background Color', 'estore-woocommerce'),
        'section' => 'estore_woocommerce_site_footer_section',
        'settings' => 'estore_woocommerce_footer_bg_color',
    )));

    $wp_customize->add_setting( 'estore_woocommerce_footer_content_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'estore_woocommerce_footer_content_color', array(
        'label' => __('Footer Content Color', 'estore-woocommerce'),
        'section' => 'estore_woocommerce_site_footer_section',
        'settings' => 'estore_woocommerce_footer_content_color',
    )));

    $wp_customize->add_setting('estore_woocommerce_footer_widget_heading_alignment',array(
        'default' => 'Left',
        'transport' => 'refresh',
        'sanitize_callback' => 'estore_woocommerce_sanitize_choices'
    ));
    $wp_customize->add_control('estore_woocommerce_footer_widget_heading_alignment',array(
        'type' => 'select',
        'label' => __('Footer Widget Heading Alignment','estore-woocommerce'),
        'section' => 'estore_woocommerce_site_footer_section',
        'choices' => array(
            'Left' => __('Left','estore-woocommerce'),
            'Center' => __('Center','estore-woocommerce'),
            'Right' => __('Right','estore-woocommerce')
        ),
    ) );

    $wp_customize->add_setting('estore_woocommerce_footer_widget_content_alignment',array(
        'default' => 'Left',
        'transport' => 'refresh',
        'sanitize_callback' => 'estore_woocommerce_sanitize_choices'
    ));
    $wp_customize->add_control('estore_woocommerce_footer_widget_content_alignment',array(
        'type' => 'select',
        'label' => __('Footer Widget Content Alignment','estore-woocommerce'),
        'section' => 'estore_woocommerce_site_footer_section',
        'choices' => array(
            'Left' => __('Left','estore-woocommerce'),
            'Center' => __('Center','estore-woocommerce'),
            'Right' => __('Right','estore-woocommerce')
        ),
    ) );

    $wp_customize->add_setting('estore_woocommerce_show_hide_copyright',array(
        'default' => true,
        'sanitize_callback' => 'estore_woocommerce_sanitize_checkbox'
    ));
    $wp_customize->add_control('estore_woocommerce_show_hide_copyright',array(
        'type' => 'checkbox',
        'label' => __('Show / Hide Copyright','estore-woocommerce'),
        'section' => 'estore_woocommerce_site_footer_section',
    ));

    $wp_customize->add_setting('estore_woocommerce_footer_text_setting', array(
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('estore_woocommerce_footer_text_setting', array(
        'label' => __('Replace the footer text', 'estore-woocommerce'),
        'section' => 'estore_woocommerce_site_footer_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('estore_woocommerce_copyright_content_alignment',array(
        'default' => 'Center',
        'transport' => 'refresh',
        'sanitize_callback' => 'estore_woocommerce_sanitize_choices'
    ));
    $wp_customize->add_control('estore_woocommerce_copyright_content_alignment',array(
        'type' => 'select',
        'label' => __('Copyright Content Alignment','estore-woocommerce'),
        'section' => 'estore_woocommerce_site_footer_section',
        'choices' => array(
            'Left' => __('Left','estore-woocommerce'),
            'Center' => __('Center','estore-woocommerce'),
            'Right' => __('Right','estore-woocommerce')
        ),
    ) );

    $wp_customize->add_setting('estore_woocommerce_copyright_background_color', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'estore_woocommerce_copyright_background_color', array(
        'label'    => __('Copyright Background Color', 'estore-woocommerce'),
        'section'  => 'estore_woocommerce_site_footer_section',
    )));

    $wp_customize->add_setting( 'estore_woocommerce_copyright_text_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'estore_woocommerce_copyright_text_color', array(
        'label' => __('Copyright Text Color', 'estore-woocommerce'),
        'section' => 'estore_woocommerce_site_footer_section',
        'settings' => 'estore_woocommerce_copyright_text_color',
    )));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_footer_setting', array(
        'sanitize_callback' => 'Estore_Woocommerce_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Estore_Woocommerce_Customize_Pro_Version ( $wp_customize,'pro_version_footer_setting', array(
        'section'     => 'estore_woocommerce_site_footer_section',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'estore-woocommerce' ),
        'description' => esc_url( ESTORE_WOOCOMMERCE_URL ),
        'priority'    => 100
    )));

    // Post Settings
     $wp_customize->add_section('estore_woocommerce_post_settings',array(
        'title' => esc_html__('Post Settings','estore-woocommerce'),
        'priority'   =>40,
    ));

    $wp_customize->add_setting('estore_woocommerce_post_page_title',array(
        'sanitize_callback' => 'estore_woocommerce_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('estore_woocommerce_post_page_title',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Title', 'estore-woocommerce'),
        'section'     => 'estore_woocommerce_post_settings',
        'description' => esc_html__('Check this box to enable title on post page.', 'estore-woocommerce'),
    ));

    $wp_customize->add_setting('estore_woocommerce_post_page_meta',array(
        'sanitize_callback' => 'estore_woocommerce_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('estore_woocommerce_post_page_meta',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Meta', 'estore-woocommerce'),
        'section'     => 'estore_woocommerce_post_settings',
        'description' => esc_html__('Check this box to enable meta on post page.', 'estore-woocommerce'),
    ));

    $wp_customize->add_setting('estore_woocommerce_post_page_thumb',array(
        'sanitize_callback' => 'estore_woocommerce_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('estore_woocommerce_post_page_thumb',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Thumbnail', 'estore-woocommerce'),
        'section'     => 'estore_woocommerce_post_settings',
        'description' => esc_html__('Check this box to enable thumbnail on post page.', 'estore-woocommerce'),
    ));

    $wp_customize->add_setting('estore_woocommerce_post_page_content',array(
        'sanitize_callback' => 'estore_woocommerce_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('estore_woocommerce_post_page_content',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Content', 'estore-woocommerce'),
        'section'     => 'estore_woocommerce_post_settings',
        'description' => esc_html__('Check this box to enable content on post page.', 'estore-woocommerce'),
    ));

    $wp_customize->add_setting('estore_woocommerce_post_page_excerpt_length',array(
        'sanitize_callback' => 'estore_woocommerce_sanitize_number_range',
        'default'           => 30,
    ));
    $wp_customize->add_control('estore_woocommerce_post_page_excerpt_length',array(
        'label'       => esc_html__('Post Page Excerpt Length', 'estore-woocommerce'),
        'section'     => 'estore_woocommerce_post_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 50,
        ),
    ));

    $wp_customize->add_setting('estore_woocommerce_post_page_excerpt_suffix',array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => '[...]',
    ));
    $wp_customize->add_control('estore_woocommerce_post_page_excerpt_suffix',array(
        'type'        => 'text',
        'label'       => esc_html__('Post Page Excerpt Suffix', 'estore-woocommerce'),
        'section'     => 'estore_woocommerce_post_settings',
        'description' => esc_html__('For Ex. [...], etc', 'estore-woocommerce'),
    ));

    $wp_customize->add_setting('estore_woocommerce_post_page_btn',array(
        'sanitize_callback' => 'estore_woocommerce_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('estore_woocommerce_post_page_btn',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Button', 'estore-woocommerce'),
        'section'     => 'estore_woocommerce_post_settings',
        'description' => esc_html__('Check this box to enable button on post page.', 'estore-woocommerce'),
    ));

    $wp_customize->add_setting( 'estore_woocommerce_blog_post_columns', array(
        'default'  => 'Two',
        'sanitize_callback' => 'estore_woocommerce_sanitize_choices'
    ));
    $wp_customize->add_control( 'estore_woocommerce_blog_post_columns', array(
        'section' => 'estore_woocommerce_post_settings',
        'type' => 'select',
        'label' => __( 'No. of Posts per row', 'estore-woocommerce' ),
        'choices' => array(
            'One'  => __( 'One', 'estore-woocommerce' ),
            'Two' => __( 'Two', 'estore-woocommerce' ),
            'Three' => __( 'Three', 'estore-woocommerce' ),
        )
    ));

    $wp_customize->add_setting('estore_woocommerce_post_page_pagination',array(
        'sanitize_callback' => 'estore_woocommerce_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('estore_woocommerce_post_page_pagination',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Pagination', 'estore-woocommerce'),
        'section'     => 'estore_woocommerce_post_settings',
        'description' => esc_html__('Check this box to enable pagination on post page.', 'estore-woocommerce'),
    ));

    $wp_customize->add_setting( 'estore_woocommerce_blog_pagination_type', array(
        'default'           => 'blog-nav-numbers',
        'sanitize_callback' => 'estore_woocommerce_sanitize_choices'
    ));
    $wp_customize->add_control( 'estore_woocommerce_blog_pagination_type', array(
        'section' => 'estore_woocommerce_post_settings',
        'type' => 'select',
        'label' => __( 'Post Pagination Type', 'estore-woocommerce' ),
        'choices' => array(
            'blog-nav-numbers'  => __( 'Numeric', 'estore-woocommerce' ),
            'next-prev' => __( 'Older/Newer Posts', 'estore-woocommerce' ),
        )
    ));

    $wp_customize->add_setting( 'estore_woocommerce_blog_sidebar_position', array(
        'default'           => 'Right Side',
        'sanitize_callback' => 'estore_woocommerce_sanitize_choices'
    ));
    $wp_customize->add_control( 'estore_woocommerce_blog_sidebar_position', array(
        'section' => 'estore_woocommerce_post_settings',
        'type' => 'select',
        'label' => __( 'Post Page Sidebar Position', 'estore-woocommerce' ),
        'choices' => array(
            'Right Side' => __( 'Right Side', 'estore-woocommerce' ),
            'Left Side' => __( 'Left Side', 'estore-woocommerce' ),
        )
    ));

    $wp_customize->add_setting('estore_woocommerce_single_post_thumb',array(
        'sanitize_callback' => 'estore_woocommerce_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('estore_woocommerce_single_post_thumb',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Post Thumbnail', 'estore-woocommerce'),
        'section'     => 'estore_woocommerce_post_settings',
        'description' => esc_html__('Check this box to enable post thumbnail on single post.', 'estore-woocommerce'),
    ));

    $wp_customize->add_setting( 'estore_woocommerce_single_post_page_image_border_radius', array(
        'default'              => '0',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'estore_woocommerce_sanitize_number_range'
    ) );
    $wp_customize->add_control( 'estore_woocommerce_single_post_page_image_border_radius', array(
        'label'       => esc_html__( 'Single Post Page Image Border Radius','estore-woocommerce' ),
        'section'     => 'estore_woocommerce_post_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 50,
        ),
    ) );

    $wp_customize->add_setting( 'estore_woocommerce_single_post_page_image_box_shadow', array(
        'default'              => '0',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'estore_woocommerce_sanitize_number_range'
    ) );
    $wp_customize->add_control( 'estore_woocommerce_single_post_page_image_box_shadow', array(
        'label'       => esc_html__( 'Single Post Page Image Box Shadow','estore-woocommerce' ),
        'section'     => 'estore_woocommerce_post_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 50,
        ),
    ) );

    $wp_customize->add_setting('estore_woocommerce_single_post_meta',array(
        'sanitize_callback' => 'estore_woocommerce_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('estore_woocommerce_single_post_meta',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Post Meta', 'estore-woocommerce'),
        'section'     => 'estore_woocommerce_post_settings',
        'description' => esc_html__('Check this box to enable single post meta such as post date, author, category, comment etc.', 'estore-woocommerce'),
    ));

    $wp_customize->add_setting('estore_woocommerce_single_post_title',array(
            'sanitize_callback' => 'estore_woocommerce_sanitize_checkbox',
            'default'           => 1,
    ));
    $wp_customize->add_control('estore_woocommerce_single_post_title',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Post Title', 'estore-woocommerce'),
        'section'     => 'estore_woocommerce_post_settings',
        'description' => esc_html__('Check this box to enable title on single post.', 'estore-woocommerce'),
    ));

    $wp_customize->add_setting('estore_woocommerce_single_post_page_content',array(
        'sanitize_callback' => 'estore_woocommerce_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('estore_woocommerce_single_post_page_content',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Post Page Content', 'estore-woocommerce'),
        'section'     => 'estore_woocommerce_post_settings',
        'description' => esc_html__('Check this box to enable content on single post page.', 'estore-woocommerce'),
    ));

    $wp_customize->add_setting('estore_woocommerce_single_post_tags',array(
        'sanitize_callback' => 'estore_woocommerce_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('estore_woocommerce_single_post_tags',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Post Tags', 'estore-woocommerce'),
        'section'     => 'estore_woocommerce_post_settings',
        'description' => esc_html__('Check this box to enable single post tags', 'estore-woocommerce'),
    ));

    $wp_customize->add_setting( 'estore_woocommerce_single_post_sidebar_position', array(
        'default'           => 'Right Side',
        'sanitize_callback' => 'estore_woocommerce_sanitize_choices'
    ));
    $wp_customize->add_control( 'estore_woocommerce_single_post_sidebar_position', array(
        'section' => 'estore_woocommerce_post_settings',
        'type' => 'select',
        'label' => __( 'Single Post Sidebar Position', 'estore-woocommerce' ),
        'choices' => array(
            'Right Side' => __( 'Right Side', 'estore-woocommerce' ),
            'Left Side' => __( 'Left Side', 'estore-woocommerce' ),
        )
    ));

    $wp_customize->add_setting('estore_woocommerce_single_post_navigation_show_hide',array(
        'default' => true,
        'sanitize_callback' => 'estore_woocommerce_sanitize_checkbox'
    ));
    $wp_customize->add_control('estore_woocommerce_single_post_navigation_show_hide',array(
        'type' => 'checkbox',
        'label' => __('Show / Hide Post Navigation','estore-woocommerce'),
        'section' => 'estore_woocommerce_post_settings',
    ));

    $wp_customize->add_setting('estore_woocommerce_single_post_comment_title',array(
        'default'=> 'Leave a Reply',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('estore_woocommerce_single_post_comment_title',array(
        'label' => __('Add Comment Title','estore-woocommerce'),
        'input_attrs' => array(
        'placeholder' => __( 'Leave a Reply', 'estore-woocommerce' ),
        ),
        'section'=> 'estore_woocommerce_post_settings',
        'type'=> 'text'
    ));

    $wp_customize->add_setting('estore_woocommerce_single_post_comment_btn_text',array(
        'default'=> 'Post Comment',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('estore_woocommerce_single_post_comment_btn_text',array(
        'label' => __('Add Comment Button Text','estore-woocommerce'),
        'input_attrs' => array(
            'placeholder' => __( 'Post Comment', 'estore-woocommerce' ),
        ),
        'section'=> 'estore_woocommerce_post_settings',
        'type'=> 'text'
    ));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_post_setting', array(
        'sanitize_callback' => 'Estore_Woocommerce_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Estore_Woocommerce_Customize_Pro_Version ( $wp_customize,'pro_version_post_setting', array(
        'section'     => 'estore_woocommerce_post_settings',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'estore-woocommerce' ),
        'description' => esc_url( ESTORE_WOOCOMMERCE_URL ),
        'priority'    => 100
    )));

    // Page Settings
    $wp_customize->add_section('estore_woocommerce_page_settings',array(
        'title' => esc_html__('Page Settings','estore-woocommerce'),
        'priority'   =>50,
    ));

    $wp_customize->add_setting('estore_woocommerce_single_page_title',array(
        'sanitize_callback' => 'estore_woocommerce_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('estore_woocommerce_single_page_title',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Page Title', 'estore-woocommerce'),
        'section'     => 'estore_woocommerce_page_settings',
        'description' => esc_html__('Check this box to enable title on single page.', 'estore-woocommerce'),
    ));

    $wp_customize->add_setting('estore_woocommerce_single_page_thumb',array(
        'sanitize_callback' => 'estore_woocommerce_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('estore_woocommerce_single_page_thumb',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Page Thumbnail', 'estore-woocommerce'),
        'section'     => 'estore_woocommerce_page_settings',
        'description' => esc_html__('Check this box to enable page thumbnail on single page.', 'estore-woocommerce'),
    ));

    $wp_customize->add_setting( 'estore_woocommerce_single_page_sidebar_layout', array(
        'default'           => 'No Sidebar',
        'sanitize_callback' => 'estore_woocommerce_sanitize_choices'
    ));
    $wp_customize->add_control( 'estore_woocommerce_single_page_sidebar_layout', array(
        'section' => 'estore_woocommerce_page_settings',
        'type' => 'select',
        'label' => __( 'Single Page Sidebar Position', 'estore-woocommerce' ),
        'choices' => array(
            'No Sidebar' => __( 'No Sidebar', 'estore-woocommerce' ),
            'Right Side' => __( 'Right Side', 'estore-woocommerce' ),
            'Left Side' => __( 'Left Side', 'estore-woocommerce' ),
        )
    ));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_single_page_setting', array(
        'sanitize_callback' => 'Estore_Woocommerce_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Estore_Woocommerce_Customize_Pro_Version ( $wp_customize,'pro_version_single_page_setting', array(
        'section'     => 'estore_woocommerce_page_settings',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'estore-woocommerce' ),
        'description' => esc_url( ESTORE_WOOCOMMERCE_URL ),
        'priority'    => 100
    )));
}
add_action('customize_register', 'estore_woocommerce_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function estore_woocommerce_customize_partial_blogname(){
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function estore_woocommerce_customize_partial_blogdescription(){
    bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function estore_woocommerce_customize_preview_js(){
    wp_enqueue_script('estore-woocommerce-customizer', esc_url(get_template_directory_uri()) . '/assets/js/customizer.js', array('customize-preview'), '20151215', true);
}
add_action('customize_preview_init', 'estore_woocommerce_customize_preview_js');

/*
** Load dynamic logic for the customizer controls area.
*/
function estore_woocommerce_panels_js() {
    wp_enqueue_style( 'estore-woocommerce-customizer-layout-css', get_theme_file_uri( '/assets/css/customizer-layout.css' ) );
    wp_enqueue_script( 'estore-woocommerce-customize-layout', get_theme_file_uri( '/assets/js/customize-layout.js' ), array(), '1.2', true );
}
add_action( 'customize_controls_enqueue_scripts', 'estore_woocommerce_panels_js' );