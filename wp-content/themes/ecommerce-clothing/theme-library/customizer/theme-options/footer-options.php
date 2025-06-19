<?php

/**
 * Footer Options
 *
 * @package ecommerce_clothing
 */

$wp_customize->add_section(
	'ecommerce_clothing_footer_options',
	array(
		'panel' => 'ecommerce_clothing_theme_options',
		'title' => esc_html__( 'Footer Options', 'ecommerce-clothing' ),
	)
);


// Add Separator Custom Control
$wp_customize->add_setting( 'ecommerce_clothing_footer_separators', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Ecommerce_Clothing_Separator_Custom_Control( $wp_customize, 'ecommerce_clothing_footer_separators', array(
	'label' => __( 'Footer Settings', 'ecommerce-clothing' ),
	'section' => 'ecommerce_clothing_footer_options',
	'settings' => 'ecommerce_clothing_footer_separators',
)));

// Footer Section - Enable Section.
$wp_customize->add_setting(
	'ecommerce_clothing_enable_footer_section',
	array(
		'default'           => true,
		'sanitize_callback' => 'ecommerce_clothing_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Ecommerce_Clothing_Toggle_Switch_Custom_Control(
		$wp_customize,
		'ecommerce_clothing_enable_footer_section',
		array(
			'label'    => esc_html__( 'Show / Hide Footer', 'ecommerce-clothing' ),
			'section'  => 'ecommerce_clothing_footer_options',
			'settings' => 'ecommerce_clothing_enable_footer_section',
		)
	)
);

// column // 
$wp_customize->add_setting(
	'ecommerce_clothing_footer_widget_column',
	array(
        'default'			=> '4',
		'capability'     	=> 'edit_theme_options',
		'sanitize_callback' => 'ecommerce_clothing_sanitize_select',
		
	)
);	

$wp_customize->add_control(
	'ecommerce_clothing_footer_widget_column',
	array(
	    'label'   		=> __('Select Widget Column','ecommerce-clothing'),
		'description' => __('Note: Default footer widgets are shown. Add your preferred widgets in (Appearance > Widgets > Footer) to see changes.', 'ecommerce-clothing'),
	    'section' 		=> 'ecommerce_clothing_footer_options',
		'type'			=> 'select',
		'choices'        => 
		array(
			'' => __( 'None', 'ecommerce-clothing' ),
			'1' => __( '1 Column', 'ecommerce-clothing' ),
			'2' => __( '2 Column', 'ecommerce-clothing' ),
			'3' => __( '3 Column', 'ecommerce-clothing' ),
			'4' => __( '4 Column', 'ecommerce-clothing' )
		) 
	) 
);

//  BG Color // 
$wp_customize->add_setting('footer_background_color_setting', array(
    'default' => '#000',
    'sanitize_callback' => 'sanitize_hex_color',
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_background_color_setting', array(
    'label' => __('Footer Background Color', 'ecommerce-clothing'),
    'section' => 'ecommerce_clothing_footer_options',
)));

// Footer Background Image Setting
$wp_customize->add_setting('footer_background_image_setting', array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
));

$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'footer_background_image_setting', array(
    'label' => __('Footer Background Image', 'ecommerce-clothing'),
    'section' => 'ecommerce_clothing_footer_options',
)));

// Footer Background Attachment
$wp_customize->add_setting(
	'ecommerce_clothing_footer_image_attachment_setting',
	array(
		'default'=> 'scroll',
		'sanitize_callback' => 'ecommerce_clothing_sanitize_choices'
	)
);

$wp_customize->add_control(
	'ecommerce_clothing_footer_image_attachment_setting',
	array(
		'type' => 'select',
		'label' => __('Footer Background Attatchment','ecommerce-clothing'),
		'choices' => array(
			'fixed' => __('fixed','ecommerce-clothing'),
			'scroll' => __('scroll','ecommerce-clothing'),
		),
		'section'=> 'ecommerce_clothing_footer_options',
  	)
);

$wp_customize->add_setting('footer_text_transform', array(
    'default' => 'none',
    'sanitize_callback' => 'sanitize_text_field',
));

// Add Footer Text Transform Control
$wp_customize->add_control('footer_text_transform', array(
    'label' => __('Footer Heading Text Transform', 'ecommerce-clothing'),
    'section' => 'ecommerce_clothing_footer_options',
    'settings' => 'footer_text_transform',
    'type' => 'select',
    'choices' => array(
        'none' => __('None', 'ecommerce-clothing'),
        'capitalize' => __('Capitalize', 'ecommerce-clothing'),
        'uppercase' => __('Uppercase', 'ecommerce-clothing'),
        'lowercase' => __('Lowercase', 'ecommerce-clothing'),
    ),
));

// Footer Heading Alignment
$wp_customize->add_setting(
	'ecommerce_clothing_footer_header_align',
	array(
		'default' 			=> 'left',
		'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control(
	'ecommerce_clothing_footer_header_align',
	array(
		'label' => __('Footer Heading Alignment ','ecommerce-clothing'),
		'section' => 'ecommerce_clothing_footer_options',
		'type'			=> 'select',
		'choices' => 
		array(
			'left' => __('Left','ecommerce-clothing'),
			'right' => __('Right','ecommerce-clothing'),
			'center' => __('Center','ecommerce-clothing'),
		),
	)
);

// Add Separator Custom Control
$wp_customize->add_setting( 'ecommerce_clothing_copyright_separators', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Ecommerce_Clothing_Separator_Custom_Control( $wp_customize, 'ecommerce_clothing_copyright_separators', array(
	'label' => __( 'Copyright Settings', 'ecommerce-clothing' ),
	'section' => 'ecommerce_clothing_footer_options',
	'settings' => 'ecommerce_clothing_copyright_separators',
)));

// Copyright Section - Enable Section.
$wp_customize->add_setting(
	'ecommerce_clothing_enable_copyright_section',
	array(
		'default'           => true,
		'sanitize_callback' => 'ecommerce_clothing_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Ecommerce_Clothing_Toggle_Switch_Custom_Control(
		$wp_customize,
		'ecommerce_clothing_enable_copyright_section',
		array(
			'label'    => esc_html__( 'Show / Hide Copyright', 'ecommerce-clothing' ),
			'section'  => 'ecommerce_clothing_footer_options',
			'settings' => 'ecommerce_clothing_enable_copyright_section',
		)
	)
);

$wp_customize->add_setting(
	'ecommerce_clothing_footer_copyright_text',
	array(
		'default'           => '',
		'sanitize_callback' => 'wp_kses_post',
		'transport'         => 'refresh',
	)
);

$wp_customize->add_control(
	'ecommerce_clothing_footer_copyright_text',
	array(
		'label'    => esc_html__( 'Copyright Text', 'ecommerce-clothing' ),
		'section'  => 'ecommerce_clothing_footer_options',
		'settings' => 'ecommerce_clothing_footer_copyright_text',
		'type'     => 'textarea',
	)
);

//Copyright Alignment
$wp_customize->add_setting(
	'ecommerce_clothing_footer_bottom_align',
	array(
		'default' 			=> 'center',
		'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control(
	'ecommerce_clothing_footer_bottom_align',
	array(
		'label' => __('Copyright Alignment ','ecommerce-clothing'),
		'section' => 'ecommerce_clothing_footer_options',
		'type'			=> 'select',
		'choices' => 
		array(
			'left' => __('Left','ecommerce-clothing'),
			'right' => __('Right','ecommerce-clothing'),
			'center' => __('Center','ecommerce-clothing'),
		),
	)
);

// Add Separator Custom Control
$wp_customize->add_setting( 'ecommerce_clothing_scroll_separators', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Ecommerce_Clothing_Separator_Custom_Control( $wp_customize, 'ecommerce_clothing_scroll_separators', array(
	'label' => __( 'Scroll Top Settings', 'ecommerce-clothing' ),
	'section' => 'ecommerce_clothing_footer_options',
	'settings' => 'ecommerce_clothing_scroll_separators',
)));

// Footer Options - Scroll Top.
$wp_customize->add_setting(
	'ecommerce_clothing_scroll_top',
	array(
		'sanitize_callback' => 'ecommerce_clothing_sanitize_switch',
		'default'           => true,
	)
);

$wp_customize->add_control(
	new Ecommerce_Clothing_Toggle_Switch_Custom_Control(
		$wp_customize,
		'ecommerce_clothing_scroll_top',
		array(
			'label'   => esc_html__( 'Enable Scroll Top Button', 'ecommerce-clothing' ),
			'section' => 'ecommerce_clothing_footer_options',
		)
	)
);

// icon // 
$wp_customize->add_setting(
	'ecommerce_clothing_scroll_btn_icon',
	array(
        'default' => 'fas fa-chevron-up',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
		
	)
);	

$wp_customize->add_control(new Ecommerce_Clothing_Change_Icon_Control($wp_customize, 
	'ecommerce_clothing_scroll_btn_icon',
	array(
	    'label'   		=> __('Scroll Top Icon','ecommerce-clothing'),
	    'section' 		=> 'ecommerce_clothing_footer_options',
		'iconset' => 'fa',
	))  
);


$wp_customize->add_setting( 'ecommerce_clothing_scroll_top_position', array(
    'default'           => 'bottom-right',
    'sanitize_callback' => 'ecommerce_clothing_sanitize_scroll_top_position',
) );

// Add control for Scroll Top Button Position
$wp_customize->add_control( 'ecommerce_clothing_scroll_top_position', array(
    'label'    => __( 'Scroll Top Button Position', 'ecommerce-clothing' ),
    'section'  => 'ecommerce_clothing_footer_options',
    'settings' => 'ecommerce_clothing_scroll_top_position',
    'type'     => 'select',
    'choices'  => array(
        'bottom-right' => __( 'Bottom Right', 'ecommerce-clothing' ),
        'bottom-left'  => __( 'Bottom Left', 'ecommerce-clothing' ),
        'bottom-center'=> __( 'Bottom Center', 'ecommerce-clothing' ),
    ),
) );

$wp_customize->add_setting( 'ecommerce_clothing_scroll_top_shape', array(
    'default'           => 'box',
    'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'ecommerce_clothing_scroll_top_shape', array(
    'label'    => __( 'Scroll to Top Button Shape', 'ecommerce-clothing' ),
    'section'  => 'ecommerce_clothing_footer_options',
    'settings' => 'ecommerce_clothing_scroll_top_shape',
    'type'     => 'radio',
    'choices'  => array(
        'box'        => __( 'Box', 'ecommerce-clothing' ),
        'curved-box' => __( 'Curved Box', 'ecommerce-clothing' ),
        'circle'     => __( 'Circle', 'ecommerce-clothing' ),
    ),
) );