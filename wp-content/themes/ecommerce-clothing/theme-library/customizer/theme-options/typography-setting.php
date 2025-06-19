<?php

/**
 * Typography Setting
 *
 * @package ecommerce_clothing
 */

// Typography Setting
$wp_customize->add_section(
    'ecommerce_clothing_typography_setting',
    array(
        'panel' => 'ecommerce_clothing_theme_options',
        'title' => esc_html__( 'Typography Setting', 'ecommerce-clothing' ),
    )
);

$wp_customize->add_setting(
    'ecommerce_clothing_site_title_font',
    array(
        'default'           => 'Lora',
        'sanitize_callback' => 'ecommerce_clothing_sanitize_google_fonts',
    )
);

$wp_customize->add_control(
    'ecommerce_clothing_site_title_font',
    array(
        'label'    => esc_html__( 'Site Title Font Family', 'ecommerce-clothing' ),
        'section'  => 'ecommerce_clothing_typography_setting',
        'settings' => 'ecommerce_clothing_site_title_font',
        'type'     => 'select',
        'choices'  => ecommerce_clothing_get_all_google_font_families(),
    )
);

// Typography - Site Description Font.
$wp_customize->add_setting(
	'ecommerce_clothing_site_description_font',
	array(
		'default'           => 'Raleway',
		'sanitize_callback' => 'ecommerce_clothing_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'ecommerce_clothing_site_description_font',
	array(
		'label'    => esc_html__( 'Site Description Font Family', 'ecommerce-clothing' ),
		'section'  => 'ecommerce_clothing_typography_setting',
		'settings' => 'ecommerce_clothing_site_description_font',
		'type'     => 'select',
		'choices'  => ecommerce_clothing_get_all_google_font_families(),
	)
);

// Typography - Header Font.
$wp_customize->add_setting(
	'ecommerce_clothing_header_font',
	array(
		'default'           => 'Raleway',
		'sanitize_callback' => 'ecommerce_clothing_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'ecommerce_clothing_header_font',
	array(
		'label'    => esc_html__( 'Heading Font Family', 'ecommerce-clothing' ),
		'section'  => 'ecommerce_clothing_typography_setting',
		'settings' => 'ecommerce_clothing_header_font',
		'type'     => 'select',
		'choices'  => ecommerce_clothing_get_all_google_font_families(),
	)
);

// Typography - Body Font.
$wp_customize->add_setting(
	'ecommerce_clothing_content_font',
	array(
		'default'           => 'Raleway',
		'sanitize_callback' => 'ecommerce_clothing_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'ecommerce_clothing_content_font',
	array(
		'label'    => esc_html__( 'Content Font Family', 'ecommerce-clothing' ),
		'section'  => 'ecommerce_clothing_typography_setting',
		'settings' => 'ecommerce_clothing_content_font',
		'type'     => 'select',
		'choices'  => ecommerce_clothing_get_all_google_font_families(),
	)
);
