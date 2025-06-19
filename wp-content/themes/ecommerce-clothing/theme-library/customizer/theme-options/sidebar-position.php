<?php

/**
 * Sidebar Position
 *
 * @package ecommerce_clothing
 */

$wp_customize->add_section(
	'ecommerce_clothing_sidebar_position',
	array(
		'title' => esc_html__( 'Sidebar Position', 'ecommerce-clothing' ),
		'panel' => 'ecommerce_clothing_theme_options',
	)
);



// Add Separator Custom Control
$wp_customize->add_setting( 'ecommerce_clothing_global_sidebar_separator', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Ecommerce_Clothing_Separator_Custom_Control( $wp_customize, 'ecommerce_clothing_global_sidebar_separator', array(
	'label' => __( 'Global Sidebar Position', 'ecommerce-clothing' ),
	'section' => 'ecommerce_clothing_sidebar_position',
	'settings' => 'ecommerce_clothing_global_sidebar_separator',
)));

// Sidebar Position - Global Sidebar Position.
$wp_customize->add_setting(
	'ecommerce_clothing_sidebar_position',
	array(
		'sanitize_callback' => 'ecommerce_clothing_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'ecommerce_clothing_sidebar_position',
	array(
		'label'   => esc_html__( 'Select Sidebar Position', 'ecommerce-clothing' ),
		'section' => 'ecommerce_clothing_sidebar_position',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'ecommerce-clothing' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'ecommerce-clothing' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'ecommerce-clothing' ),
		),
	)
);


// Add Separator Custom Control
$wp_customize->add_setting( 'ecommerce_clothing_post_sidebar_separator', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Ecommerce_Clothing_Separator_Custom_Control( $wp_customize, 'ecommerce_clothing_post_sidebar_separator', array(
	'label' => __( 'Post Sidebar Position', 'ecommerce-clothing' ),
	'section' => 'ecommerce_clothing_sidebar_position',
	'settings' => 'ecommerce_clothing_post_sidebar_separator',
)));

// Sidebar Position - Post Sidebar Position.
$wp_customize->add_setting(
	'ecommerce_clothing_post_sidebar_position',
	array(
		'sanitize_callback' => 'ecommerce_clothing_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'ecommerce_clothing_post_sidebar_position',
	array(
		'label'   => esc_html__( 'Select Sidebar Position', 'ecommerce-clothing' ),
		'section' => 'ecommerce_clothing_sidebar_position',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'ecommerce-clothing' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'ecommerce-clothing' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'ecommerce-clothing' ),
		),
	)
);



// Add Separator Custom Control
$wp_customize->add_setting( 'ecommerce_clothing_page_sidebar_separator', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Ecommerce_Clothing_Separator_Custom_Control( $wp_customize, 'ecommerce_clothing_page_sidebar_separator', array(
	'label' => __( 'Page Sidebar Position', 'ecommerce-clothing' ),
	'section' => 'ecommerce_clothing_sidebar_position',
	'settings' => 'ecommerce_clothing_page_sidebar_separator',
)));

// Sidebar Position - Page Sidebar Position.
$wp_customize->add_setting(
	'ecommerce_clothing_page_sidebar_position',
	array(
		'sanitize_callback' => 'ecommerce_clothing_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'ecommerce_clothing_page_sidebar_position',
	array(
		'label'   => esc_html__( 'Select Sidebar Position', 'ecommerce-clothing' ),
		'section' => 'ecommerce_clothing_sidebar_position',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'ecommerce-clothing' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'ecommerce-clothing' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'ecommerce-clothing' ),
		),
	)
);


// Add Separator Custom Control
$wp_customize->add_setting( 'ecommerce_clothing_sidebar_width_separator', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Ecommerce_Clothing_Separator_Custom_Control( $wp_customize, 'ecommerce_clothing_sidebar_width_separator', array(
	'label' => __( 'Sidebar Width Setting', 'ecommerce-clothing' ),
	'section' => 'ecommerce_clothing_sidebar_position',
	'settings' => 'ecommerce_clothing_sidebar_width_separator',
)));


$wp_customize->add_setting( 'ecommerce_clothing_sidebar_width', array(
	'default'           => '30',
	'sanitize_callback' => 'ecommerce_clothing_sanitize_range_value',
) );

$wp_customize->add_control(new Ecommerce_Clothing_Customize_Range_Control($wp_customize, 'ecommerce_clothing_sidebar_width', array(
	'section'     => 'ecommerce_clothing_sidebar_position',
	'label'       => __( 'Adjust Sidebar Width', 'ecommerce-clothing' ),
	'description' => __( 'Adjust the width of the sidebar.', 'ecommerce-clothing' ),
	'input_attrs' => array(
		'min'  => 10,
		'max'  => 50,
		'step' => 1,
	),
)));

$wp_customize->add_setting( 'ecommerce_clothing_sidebar_widget_font_size', array(
    'default'           => 24,
    'sanitize_callback' => 'absint',
) );

// Add control for site title size
$wp_customize->add_control( 'ecommerce_clothing_sidebar_widget_font_size', array(
    'type'        => 'number',
    'section'     => 'ecommerce_clothing_sidebar_position',
    'label'       => __( 'Sidebar Widgets Heading Font Size ', 'ecommerce-clothing' ),
    'input_attrs' => array(
        'min'  => 10,
        'max'  => 100,
        'step' => 1,
    ),
));