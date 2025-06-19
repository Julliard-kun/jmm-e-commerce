<?php

/**
 * Render homepage sections.
 */
function ecommerce_clothing_homepage_sections() {
	$ecommerce_clothing_homepage_sections = array_keys( ecommerce_clothing_get_homepage_sections() );

	foreach ( $ecommerce_clothing_homepage_sections as $ecommerce_clothing_section ) {
		require get_template_directory() . '/sections/' . $ecommerce_clothing_section . '.php';
	}
}