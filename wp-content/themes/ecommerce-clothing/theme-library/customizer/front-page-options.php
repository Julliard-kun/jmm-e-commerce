<?php

/**
 * Front Page Options
 *
 * @package Ecommerce Clothing
 */

$wp_customize->add_panel(
	'ecommerce_clothing_front_page_options',
	array(
		'title'    => esc_html__( 'Front Page Options', 'ecommerce-clothing' ),
		'priority' => 20,
	)
);

// Banner Section.
require get_template_directory() . '/theme-library/customizer/front-page-options/banner.php';

// Tranding Product Section.
require get_template_directory() . '/theme-library/customizer/front-page-options/trending-product.php';