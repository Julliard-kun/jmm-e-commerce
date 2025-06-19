<?php

/**
 * Banner Section
 *
 * @package ecommerce_clothing
 */

$wp_customize->add_section(
	'ecommerce_clothing_banner_section',
	array(
		'panel'    => 'ecommerce_clothing_front_page_options',
		'title'    => esc_html__( 'Banner Section', 'ecommerce-clothing' ),
		'priority' => 10,
	)
);

// Banner Section - Enable Section.
$wp_customize->add_setting(
	'ecommerce_clothing_enable_banner_section',
	array(
		'default'           => true,
		'sanitize_callback' => 'ecommerce_clothing_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Ecommerce_Clothing_Toggle_Switch_Custom_Control(
		$wp_customize,
		'ecommerce_clothing_enable_banner_section',
		array(
			'label'    => esc_html__( 'Enable Banner Section', 'ecommerce-clothing' ),
			'section'  => 'ecommerce_clothing_banner_section',
			'settings' => 'ecommerce_clothing_enable_banner_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'ecommerce_clothing_enable_banner_section',
		array(
			'selector' => '#ecommerce_clothing_banner_section .section-link',
			'settings' => 'ecommerce_clothing_enable_banner_section',
		)
	);
}

// Banner Section - Banner Slider Content Type.
$wp_customize->add_setting(
	'ecommerce_clothing_banner_slider_content_type',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'ecommerce_clothing_sanitize_select',
	)
);

$wp_customize->add_control(
	'ecommerce_clothing_banner_slider_content_type',
	array(
		'label'           => esc_html__( 'Select Banner Slider Content Type', 'ecommerce-clothing' ),
		'section'         => 'ecommerce_clothing_banner_section',
		'settings'        => 'ecommerce_clothing_banner_slider_content_type',
		'type'            => 'select',
		'active_callback' => 'ecommerce_clothing_is_banner_slider_section_enabled',
		'choices'         => array(
			'page' => esc_html__( 'Page', 'ecommerce-clothing' ),
			'post' => esc_html__( 'Post', 'ecommerce-clothing' ),
		),
	)
);

for ( $ecommerce_clothing_i = 1; $ecommerce_clothing_i <= 3; $ecommerce_clothing_i++ ) {

	// Banner Section - Select Banner Post.
	$wp_customize->add_setting(
		'ecommerce_clothing_banner_slider_content_post_' . $ecommerce_clothing_i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'ecommerce_clothing_banner_slider_content_post_' . $ecommerce_clothing_i,
		array(
			/* translators: %d: Post Count. */
			'label'           => sprintf( esc_html__( 'Select Post %d', 'ecommerce-clothing' ), $ecommerce_clothing_i ),
			'section'         => 'ecommerce_clothing_banner_section',
			'settings'        => 'ecommerce_clothing_banner_slider_content_post_' . $ecommerce_clothing_i,
			'active_callback' => 'ecommerce_clothing_is_banner_slider_section_and_content_type_post_enabled',
			'type'            => 'select',
			'choices'         => ecommerce_clothing_get_post_choices(),
		)
	);

	// Banner Section - Select Banner Page.
	$wp_customize->add_setting(
		'ecommerce_clothing_banner_slider_content_page_' . $ecommerce_clothing_i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'ecommerce_clothing_banner_slider_content_page_' . $ecommerce_clothing_i,
		array(
			/* translators: %d: Page Count. */
			'label'           => sprintf( esc_html__( 'Select Page %d', 'ecommerce-clothing' ), $ecommerce_clothing_i ),
			'section'         => 'ecommerce_clothing_banner_section',
			'settings'        => 'ecommerce_clothing_banner_slider_content_page_' . $ecommerce_clothing_i,
			'active_callback' => 'ecommerce_clothing_is_banner_slider_section_and_content_type_page_enabled',
			'type'            => 'select',
			'choices'         => ecommerce_clothing_get_page_choices(),
		)
	);

	// Banner Section - Button Label.
	$wp_customize->add_setting(
		'ecommerce_clothing_banner_button_label_' . $ecommerce_clothing_i,
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'ecommerce_clothing_banner_button_label_' . $ecommerce_clothing_i,
		array(
			/* translators: %d: Button Label Count. */
			'label'           => sprintf( esc_html__( 'Button Label %d', 'ecommerce-clothing' ), $ecommerce_clothing_i ),
			'section'         => 'ecommerce_clothing_banner_section',
			'settings'        => 'ecommerce_clothing_banner_button_label_' . $ecommerce_clothing_i,
			'type'            => 'text',
			'active_callback' => 'ecommerce_clothing_is_banner_slider_section_enabled',
		)
	);

	// Banner Section - Button Link.
	$wp_customize->add_setting(
		'ecommerce_clothing_banner_button_link_' . $ecommerce_clothing_i,
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		'ecommerce_clothing_banner_button_link_' . $ecommerce_clothing_i,
		array(
			/* translators: %d: Button Link Count. */
			'label'           => sprintf( esc_html__( 'Button Link %d', 'ecommerce-clothing' ), $ecommerce_clothing_i ),
			'section'         => 'ecommerce_clothing_banner_section',
			'settings'        => 'ecommerce_clothing_banner_button_link_' . $ecommerce_clothing_i,
			'type'            => 'url',
			'active_callback' => 'ecommerce_clothing_is_banner_slider_section_enabled',
		)
	);
}
