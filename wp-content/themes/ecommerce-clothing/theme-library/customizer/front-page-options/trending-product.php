<?php

/**
 * Service Section
 *
 * @package ecommerce_clothing
 */

$wp_customize->add_section(
	'ecommerce_clothing_product_section',
	array(
		'panel'    => 'ecommerce_clothing_front_page_options',
		'title'    => esc_html__( 'Product Section', 'ecommerce-clothing' ),
		'priority' => 10,
	)
);

// Service Section - Enable Section.
$wp_customize->add_setting(
	'ecommerce_clothing_enable_service_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'ecommerce_clothing_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Ecommerce_Clothing_Toggle_Switch_Custom_Control(
		$wp_customize,
		'ecommerce_clothing_enable_service_section',
		array(
			'label'    => esc_html__( 'Enable Product Section', 'ecommerce-clothing' ),
			'section'  => 'ecommerce_clothing_product_section',
			'settings' => 'ecommerce_clothing_enable_service_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'ecommerce_clothing_enable_service_section',
		array(
			'selector' => '#ecommerce_clothing_service_section .section-link',
			'settings' => 'ecommerce_clothing_enable_service_section',
		)
	);
}

// Service Section - Button Label.
$wp_customize->add_setting(
	'ecommerce_clothing_trending_product_heading',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'ecommerce_clothing_trending_product_heading',
	array(
		'label'           => esc_html__( 'Heading', 'ecommerce-clothing' ),
		'section'         => 'ecommerce_clothing_product_section',
		'settings'        => 'ecommerce_clothing_trending_product_heading',
		'type'            => 'text',
		'active_callback' => 'ecommerce_clothing_is_service_section_enabled',
	)
);

$wp_customize->add_setting(
	'ecommerce_clothing_services_number',
	array(
	    'default'=> '',
	    'sanitize_callback' => 'sanitize_text_field'
));
$wp_customize->add_control(
	'ecommerce_clothing_services_number',
	array(
	    'label' => esc_html__('No of Tabs to show','ecommerce-clothing'),
	    'description' => esc_html__('Add Tabs Then Refresh this page to show Fields','ecommerce-clothing'),
	    'section'=> 'ecommerce_clothing_product_section',
	    'type' => 'number',
	    'input_attrs' => array(
	    'step'  => 1,
			'min'  => 0,
			'max'  => 4,
	    ),
	    'active_callback' => 'ecommerce_clothing_is_service_section_enabled',
	)
);

$ecommerce_clothing_featured_post = get_theme_mod('ecommerce_clothing_services_number','');
for ( $ecommerce_clothing_j = 1; $ecommerce_clothing_j <= $ecommerce_clothing_featured_post; $ecommerce_clothing_j++ ) {

    $wp_customize->add_setting(
    	'ecommerce_clothing_services_text'.$ecommerce_clothing_j,
    	array(
	        'default'=> '',
	        'sanitize_callback' => 'sanitize_text_field'
    	)
    );
    $wp_customize->add_control(
    	'ecommerce_clothing_services_text'.$ecommerce_clothing_j,
    	array(
	        'label' => esc_html__('Tab ','ecommerce-clothing').$ecommerce_clothing_j,
	        'section'=> 'ecommerce_clothing_product_section',
	        'type'=> 'text',
	        'active_callback' => 'ecommerce_clothing_is_service_section_enabled',
    	)
    );

	    $ecommerce_clothing_args = array(
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
	$ecommerce_clothing_categories = get_categories($ecommerce_clothing_args);
	$ecommerce_clothing_cat_posts = array();
	$ecommerce_clothing_m = 0;
	$ecommerce_clothing_cat_posts[]='Select';
	foreach($ecommerce_clothing_categories as $ecommerce_clothing_category){
		if($ecommerce_clothing_m==0){
			$default = $ecommerce_clothing_category->term_id;
			$ecommerce_clothing_m++;
		}
		$ecommerce_clothing_cat_posts[$ecommerce_clothing_category->term_id] = $ecommerce_clothing_category->name;
	}


	$wp_customize->add_setting('ecommerce_clothing_trending_product_category'.$ecommerce_clothing_j,array(
		'default'	=> 'select',
		'sanitize_callback' => 'ecommerce_clothing_sanitize_select',
	));
	$wp_customize->add_control('ecommerce_clothing_trending_product_category'.$ecommerce_clothing_j,array(
		'type'    => 'select',
		'choices' => $ecommerce_clothing_cat_posts,
		'label' => __('Select category to display products ','ecommerce-clothing'),
		'section' => 'ecommerce_clothing_product_section',
		'active_callback' => 'ecommerce_clothing_is_service_section_enabled',
	));
}