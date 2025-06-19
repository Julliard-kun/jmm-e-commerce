<?php

/**
 * Pige Title Options
 *
 * @package ecommerce_clothing
 */



$wp_customize->add_section(
	'ecommerce_clothing_page_title_options',
	array(
		'panel' => 'ecommerce_clothing_theme_options',
		'title' => esc_html__( 'Page Title', 'ecommerce-clothing' ),
	)
);

$wp_customize->add_setting(
    'ecommerce_clothing_page_header_visibility',
    array(
        'default'           => 'all-devices',
        'sanitize_callback' => 'ecommerce_clothing_sanitize_select',
    )
);

$wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize,
        'ecommerce_clothing_page_header_visibility',
        array(
            'label'    => esc_html__( 'Page Header Visibility', 'ecommerce-clothing' ),
            'type'     => 'select',
            'section'  => 'ecommerce_clothing_page_title_options',
            'settings' => 'ecommerce_clothing_page_header_visibility',
            'priority' => 10,
            'choices'  => array(
                'all-devices'        => esc_html__( 'Show on all devices', 'ecommerce-clothing' ),
                'hide-tablet'        => esc_html__( 'Hide on Tablet', 'ecommerce-clothing' ),
                'hide-mobile'        => esc_html__( 'Hide on Mobile', 'ecommerce-clothing' ),
                'hide-tablet-mobile' => esc_html__( 'Hide on Tablet & Mobile', 'ecommerce-clothing' ),
                'hide-all-devices'   => esc_html__( 'Hide on all devices', 'ecommerce-clothing' ),
            ),
        )
    )
);

$wp_customize->add_setting( 'ecommerce_clothing_page_title_background_separator', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Ecommerce_Clothing_Separator_Custom_Control( $wp_customize, 'ecommerce_clothing_page_title_background_separator', array(
	'label' => __( 'Page Title BG Image & Color Setting', 'ecommerce-clothing' ),
	'section' => 'ecommerce_clothing_page_title_options',
	'settings' => 'ecommerce_clothing_page_title_background_separator',
)));


$wp_customize->add_setting(
	'ecommerce_clothing_page_header_style',
	array(
		'sanitize_callback' => 'ecommerce_clothing_sanitize_switch',
		'default'           => False,
	)
);

$wp_customize->add_control(
	new Ecommerce_Clothing_Toggle_Switch_Custom_Control(
		$wp_customize,
		'ecommerce_clothing_page_header_style',
		array(
			'label'   => esc_html__('Page Title Background Image', 'ecommerce-clothing'),
			'section' => 'ecommerce_clothing_page_title_options',
		)
	)
);

$wp_customize->add_setting( 'ecommerce_clothing_page_header_background_image', array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ecommerce_clothing_page_header_background_image', array(
    'label'    => __( 'Background Image', 'ecommerce-clothing' ),
    'section'  => 'ecommerce_clothing_page_title_options',
	'description' => __('Choose either a background image or a color. If a background image is selected, the background color will not be visible.', 'ecommerce-clothing'),
    'settings' => 'ecommerce_clothing_page_header_background_image',
	'active_callback' => 'ecommerce_clothing_is_pagetitle_bcakground_image_enabled',
)));

$wp_customize->add_setting('ecommerce_clothing_page_header_image_height', array(
	'default'           => 200,
	'sanitize_callback' => 'ecommerce_clothing_sanitize_range_value',
));

$wp_customize->add_control(new Ecommerce_Clothing_Customize_Range_Control($wp_customize, 'ecommerce_clothing_page_header_image_height', array(
		'label'       => __('Image Height', 'ecommerce-clothing'),
		'section'     => 'ecommerce_clothing_page_title_options',
		'settings'    => 'ecommerce_clothing_page_header_image_height',
		'active_callback' => 'ecommerce_clothing_is_pagetitle_bcakground_image_enabled',
		'input_attrs' => array(
			'min'  => 0,
			'max'  => 1000,
			'step' => 5,
		),
)));

$wp_customize->add_setting('ecommerce_clothing_page_title_background_color_setting', array(
    'default' => '#eaeaea',
    'sanitize_callback' => 'sanitize_hex_color',
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ecommerce_clothing_page_title_background_color_setting', array(
    'label' => __('Page Title Background Color', 'ecommerce-clothing'),
    'section' => 'ecommerce_clothing_page_title_options',
)));

$wp_customize->add_setting('ecommerce_clothing_pagetitle_height', array(
    'default'           => 50,
    'sanitize_callback' => 'ecommerce_clothing_sanitize_range_value',
));

$wp_customize->add_control(new Ecommerce_Clothing_Customize_Range_Control($wp_customize, 'ecommerce_clothing_pagetitle_height', array(
    'label'       => __('Set Height', 'ecommerce-clothing'),
    'description' => __('This setting controls the page title height when no background image is set. If a background image is set, this setting will not apply.', 'ecommerce-clothing'),
    'section'     => 'ecommerce_clothing_page_title_options',
    'settings'    => 'ecommerce_clothing_pagetitle_height',
    'input_attrs' => array(
        'min'  => 0,
        'max'  => 300,
        'step' => 5,
    ),
)));

$wp_customize->add_setting( 'ecommerce_clothing_page_title_style_separator', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Ecommerce_Clothing_Separator_Custom_Control( $wp_customize, 'ecommerce_clothing_page_title_style_separator', array(
	'label' => __( 'Page Title Styling Setting', 'ecommerce-clothing' ),
	'section' => 'ecommerce_clothing_page_title_options',
	'settings' => 'ecommerce_clothing_page_title_style_separator',
)));


$wp_customize->add_setting( 'ecommerce_clothing_page_header_heading_tag', array(
	'default'   => 'h1',
	'sanitize_callback' => 'ecommerce_clothing_sanitize_select',
) );

$wp_customize->add_control( 'ecommerce_clothing_page_header_heading_tag', array(
	'label'   => __( 'Page Title Heading Tag', 'ecommerce-clothing' ),
	'section' => 'ecommerce_clothing_page_title_options',
	'type'    => 'select',
	'choices' => array(
		'h1' => __( 'H1', 'ecommerce-clothing' ),
		'h2' => __( 'H2', 'ecommerce-clothing' ),
		'h3' => __( 'H3', 'ecommerce-clothing' ),
		'h4' => __( 'H4', 'ecommerce-clothing' ),
		'h5' => __( 'H5', 'ecommerce-clothing' ),
		'h6' => __( 'H6', 'ecommerce-clothing' ),
		'p' => __( 'p', 'ecommerce-clothing' ),
		'a' => __( 'a', 'ecommerce-clothing' ),
		'div' => __( 'div', 'ecommerce-clothing' ),
		'span' => __( 'span', 'ecommerce-clothing' ),
	),
) );


$wp_customize->add_setting('ecommerce_clothing_page_header_layout', array(
	'default' => 'left',
	'sanitize_callback' => 'sanitize_text_field',
));

$wp_customize->add_control('ecommerce_clothing_page_header_layout', array(
	'label' => __('Style', 'ecommerce-clothing'),
	'section' => 'ecommerce_clothing_page_title_options',
	'description' => __('"Flex Layout Style" wont work below 600px (mobile media)', 'ecommerce-clothing'),
	'settings' => 'ecommerce_clothing_page_header_layout',
	'type' => 'radio',
	'choices' => array(
		'left' => __('Classic', 'ecommerce-clothing'),
		'right' => __('Aligned Right', 'ecommerce-clothing'),
		'center' => __('Centered Focus', 'ecommerce-clothing'),
		'flex' => __('Flex Layout', 'ecommerce-clothing'),
	),
));