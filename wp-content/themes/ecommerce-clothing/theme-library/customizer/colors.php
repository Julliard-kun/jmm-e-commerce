<?php

/**
 * Color Option
 *
 * @package ecommerce_clothing
 */

// Primary Color.
$wp_customize->add_setting(
	'primary_color',
	array(
		'default'           => '#E30045',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'primary_color',
		array(
			'label'    => __( 'Primary Color', 'ecommerce-clothing' ),
			'section'  => 'colors',
			'priority' => 5,
		)
	)
);
