<?php

require get_template_directory() . '/inc/class-tgm-plugin-activation.php';

function estore_woocommerce_register_recommended_plugins() {
	$plugins = array(
		array(
			'name'             => __( 'Woocommerce', 'estore-woocommerce' ),
			'slug'             => 'woocommerce',
			'source'           => '',
			'required'         => false,
			'force_activation' => false,
		),
		array(
			'name'             => __( 'Magnify – Suggestive Search', 'estore-woocommerce' ),
			'slug'             => 'magnify-suggestive-search',
			'source'           => '',
			'required'         => false,
			'force_activation' => false,
		),
	);
	$config = array();
	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'estore_woocommerce_register_recommended_plugins' );