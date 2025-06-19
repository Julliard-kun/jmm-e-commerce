<?php

function ecommerce_clothing_sanitize_select( $ecommerce_clothing_input, $ecommerce_clothing_setting ) {
	$ecommerce_clothing_input = sanitize_key( $ecommerce_clothing_input );
	$ecommerce_clothing_choices = $ecommerce_clothing_setting->manager->get_control( $ecommerce_clothing_setting->id )->choices;
	return ( array_key_exists( $ecommerce_clothing_input, $ecommerce_clothing_choices ) ? $ecommerce_clothing_input : $ecommerce_clothing_setting->default );
}

function ecommerce_clothing_sanitize_switch( $ecommerce_clothing_input ) {
	if ( true === $ecommerce_clothing_input ) {
		return true;
	} else {
		return false;
	}
}

function ecommerce_clothing_sanitize_google_fonts( $ecommerce_clothing_input, $ecommerce_clothing_setting ) {
	$ecommerce_clothing_choices = $ecommerce_clothing_setting->manager->get_control( $ecommerce_clothing_setting->id )->choices;
	return ( array_key_exists( $ecommerce_clothing_input, $ecommerce_clothing_choices ) ? $ecommerce_clothing_input : $ecommerce_clothing_setting->default );
}
/**
 * Sanitize HTML input.
 *
 * @param string $ecommerce_clothing_input HTML input to sanitize.
 * @return string Sanitized HTML.
 */
function ecommerce_clothing_sanitize_html( $ecommerce_clothing_input ) {
    return wp_kses_post( $ecommerce_clothing_input );
}

/**
 * Sanitize URL input.
 *
 * @param string $ecommerce_clothing_input URL input to sanitize.
 * @return string Sanitized URL.
 */
function ecommerce_clothing_sanitize_url( $ecommerce_clothing_input ) {
    return esc_url_raw( $ecommerce_clothing_input );
}

// Sanitize Scroll Top Position
function ecommerce_clothing_sanitize_scroll_top_position( $ecommerce_clothing_input ) {
    $valid_positions = array( 'bottom-right', 'bottom-left', 'bottom-center' );
    if ( in_array( $ecommerce_clothing_input, $valid_positions ) ) {
        return $ecommerce_clothing_input;
    } else {
        return 'bottom-right'; // Default to bottom-right if invalid value
    }
}

function ecommerce_clothing_sanitize_choices( $ecommerce_clothing_input, $ecommerce_clothing_setting ) {
	global $wp_customize; 
	$ecommerce_clothing_control = $wp_customize->get_control( $ecommerce_clothing_setting->id ); 
	if ( array_key_exists( $ecommerce_clothing_input, $ecommerce_clothing_control->choices ) ) {
		return $ecommerce_clothing_input;
	} else {
		return $ecommerce_clothing_setting->default;
	}
}

function ecommerce_clothing_sanitize_range_value( $ecommerce_clothing_number, $ecommerce_clothing_setting ) {

	// Ensure input is an absolute integer.
	$ecommerce_clothing_number = absint( $ecommerce_clothing_number );

	// Get the input attributes associated with the setting.
	$ecommerce_clothing_atts = $ecommerce_clothing_setting->manager->get_control( $ecommerce_clothing_setting->id )->input_attrs;

	// Get minimum number in the range.
	$ecommerce_clothing_min = ( isset( $ecommerce_clothing_atts['min'] ) ? $ecommerce_clothing_atts['min'] : $ecommerce_clothing_number );

	// Get maximum number in the range.
	$ecommerce_clothing_max = ( isset( $ecommerce_clothing_atts['max'] ) ? $ecommerce_clothing_atts['max'] : $ecommerce_clothing_number );

	// Get step.
	$ecommerce_clothing_step = ( isset( $ecommerce_clothing_atts['step'] ) ? $ecommerce_clothing_atts['step'] : 1 );

	// If the number is within the valid range, return it; otherwise, return the default.
	return ( $ecommerce_clothing_min <= $ecommerce_clothing_number && $ecommerce_clothing_number <= $ecommerce_clothing_max && is_int( $ecommerce_clothing_number / $ecommerce_clothing_step ) ? $ecommerce_clothing_number : $ecommerce_clothing_setting->default );
}