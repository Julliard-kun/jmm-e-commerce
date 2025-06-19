<?php

/**
 * Single Post Options
 *
 * @package ecommerce_clothing
 */

$wp_customize->add_section(
	'ecommerce_clothing_single_post_options',
	array(
		'title' => esc_html__( 'Single Post Options', 'ecommerce-clothing' ),
		'panel' => 'ecommerce_clothing_theme_options',
	)
);


// Post Options - Show / Hide Date.
$wp_customize->add_setting(
	'ecommerce_clothing_single_post_hide_date',
	array(
		'default'           => true,
		'sanitize_callback' => 'ecommerce_clothing_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Ecommerce_Clothing_Toggle_Switch_Custom_Control(
		$wp_customize,
		'ecommerce_clothing_single_post_hide_date',
		array(
			'label'   => esc_html__( 'Show / Hide Date', 'ecommerce-clothing' ),
			'section' => 'ecommerce_clothing_single_post_options',
		)
	)
);

// Post Options - Show / Hide Author.
$wp_customize->add_setting(
	'ecommerce_clothing_single_post_hide_author',
	array(
		'default'           => true,
		'sanitize_callback' => 'ecommerce_clothing_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Ecommerce_Clothing_Toggle_Switch_Custom_Control(
		$wp_customize,
		'ecommerce_clothing_single_post_hide_author',
		array(
			'label'   => esc_html__( 'Show / Hide Author', 'ecommerce-clothing' ),
			'section' => 'ecommerce_clothing_single_post_options',
		)
	)
);

// Post Options - Show / Hide Comments.
$wp_customize->add_setting(
	'ecommerce_clothing_single_post_hide_comments',
	array(
		'default'           => true,
		'sanitize_callback' => 'ecommerce_clothing_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Ecommerce_Clothing_Toggle_Switch_Custom_Control(
		$wp_customize,
		'ecommerce_clothing_single_post_hide_comments',
		array(
			'label'   => esc_html__( 'Show / Hide Comments', 'ecommerce-clothing' ),
			'section' => 'ecommerce_clothing_single_post_options',
		)
	)
);

// Post Options - Show / Hide Time.
$wp_customize->add_setting(
	'ecommerce_clothing_single_post_hide_time',
	array(
		'default'           => true,
		'sanitize_callback' => 'ecommerce_clothing_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Ecommerce_Clothing_Toggle_Switch_Custom_Control(
		$wp_customize,
		'ecommerce_clothing_single_post_hide_time',
		array(
			'label'   => esc_html__( 'Show / Hide Time', 'ecommerce-clothing' ),
			'section' => 'ecommerce_clothing_single_post_options',
		)
	)
);

// Post Options - Show / Hide Category.
$wp_customize->add_setting(
	'ecommerce_clothing_single_post_hide_category',
	array(
		'default'           => true,
		'sanitize_callback' => 'ecommerce_clothing_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Ecommerce_Clothing_Toggle_Switch_Custom_Control(
		$wp_customize,
		'ecommerce_clothing_single_post_hide_category',
		array(
			'label'   => esc_html__( 'Show / Hide Category', 'ecommerce-clothing' ),
			'section' => 'ecommerce_clothing_single_post_options',
		)
	)
);

// Post Options - Show / Hide Tag.
$wp_customize->add_setting(
	'ecommerce_clothing_post_hide_tags',
	array(
		'default'           => true,
		'sanitize_callback' => 'ecommerce_clothing_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Ecommerce_Clothing_Toggle_Switch_Custom_Control(
		$wp_customize,
		'ecommerce_clothing_post_hide_tags',
		array(
			'label'   => esc_html__( 'Show / Hide Tag', 'ecommerce-clothing' ),
			'section' => 'ecommerce_clothing_single_post_options',
		)
	)
);

// Post Options - Comment Title.
$wp_customize->add_setting(
	'ecommerce_clothing_blog_post_comment_title',
	array(
		'default'=> 'Leave a Reply',
		'sanitize_callback'	=> 'sanitize_text_field'
	)
);

$wp_customize->add_control(
	'ecommerce_clothing_blog_post_comment_title',
	array(
		'label'	=> __('Comment Title','ecommerce-clothing'),
		'input_attrs' => array(
			'placeholder' => __( 'Leave a Reply', 'ecommerce-clothing' ),
		),
		'section'=> 'ecommerce_clothing_single_post_options',
		'type'=> 'text'
	)
);