/*
** Scripts within the customizer controls window.
*/

(function( $ ) {
	wp.customize.bind( 'ready', function() {

	/*
	** Reusable Functions
	*/
		var optPrefix = '#customize-control-estore_woocommerce_options-';
		
		// Label
		function estore_woocommerce_customizer_label( id, title ) {

			// Site Identity

			if ( id === 'custom_logo' || id === 'site_icon' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-estore_woocommerce_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// General Setting

			if ( id === 'estore_woocommerce_scroll_hide' || id === 'estore_woocommerce_preloader_hide' || id === 'estore_woocommerce_products_per_row' || id === 'estore_woocommerce_woocommerce_product_sale' || id === 'estore_woocommerce_woo_product_border_radius')  {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-estore_woocommerce_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Topbar Option

			if ( id === 'estore_woocommerce_topbar_checkout_button' || id === 'estore_woocommerce_topbar1_wishlist_url' || id === 'estore_woocommerce_topbar_order_button' || id === 'estore_woocommerce_topbar_text' )  {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-estore_woocommerce_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Colors

			if ( id === 'estore_woocommerce_theme_color' || id === 'background_color' || id === 'background_image' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-estore_woocommerce_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Header Image

			if ( id === 'header_image' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-estore_woocommerce_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			//  Header

			if ( id === 'estore_woocommerce_header_location_button' || id === 'estore_woocommerce_topbar_phone_text' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-estore_woocommerce_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			//  Best Sells

			if ( id === 'estore_woocommerce_best_sells_section_heading' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-estore_woocommerce_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Slider

			if ( id === 'estore_woocommerce_top_slider_setting' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-estore_woocommerce_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Topbar

			if ( id === 'estore_woocommerce_topbar1_wishlist_button'  ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-estore_woocommerce_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Footer

			if ( id === 'estore_woocommerce_show_hide_footer' || id === 'estore_woocommerce_show_hide_copyright') {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-estore_woocommerce_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Post Setting

			if ( id === 'estore_woocommerce_post_page_title' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-estore_woocommerce_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Single Post Setting

			if ( id === 'estore_woocommerce_single_post_thumb' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-estore_woocommerce_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Single Post Comment Setting

			if ( id === 'estore_woocommerce_single_post_comment_title' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-estore_woocommerce_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Page Setting

			if ( id === 'estore_woocommerce_single_page_title' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-estore_woocommerce_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}
			
		}


	/*
	** Tabs
	*/

	    // Site Identity
		estore_woocommerce_customizer_label( 'custom_logo', 'Logo Setup' );
		estore_woocommerce_customizer_label( 'site_icon', 'Favicon' );

		// General Setting
		estore_woocommerce_customizer_label( 'estore_woocommerce_scroll_hide', 'Scroll To Top' );
		estore_woocommerce_customizer_label( 'estore_woocommerce_preloader_hide', 'Preloader' );
		estore_woocommerce_customizer_label( 'estore_woocommerce_products_per_row', 'Woocommerce' );
		estore_woocommerce_customizer_label( 'estore_woocommerce_woocommerce_product_sale', 'Woocommerce Product Sale' );
		estore_woocommerce_customizer_label( 'estore_woocommerce_woo_product_border_radius', 'Woocommerce Product Border Radius' );

		// Topbar Option
		estore_woocommerce_customizer_label( 'estore_woocommerce_topbar_checkout_button', 'Checkout Button' );
		estore_woocommerce_customizer_label( 'estore_woocommerce_topbar1_wishlist_url', 'Wishlist' );
		estore_woocommerce_customizer_label( 'estore_woocommerce_topbar_order_button', 'Traking Button' );
		estore_woocommerce_customizer_label( 'estore_woocommerce_topbar_text', 'Text' );

		// Colors
		estore_woocommerce_customizer_label( 'estore_woocommerce_theme_color', 'Theme Color' );
		estore_woocommerce_customizer_label( 'background_color', 'Colors' );
		estore_woocommerce_customizer_label( 'background_image', 'Image' );

		//Header Image
		estore_woocommerce_customizer_label( 'header_image', 'Header Image' );

		// Header
		estore_woocommerce_customizer_label( 'estore_woocommerce_header_location_button', 'Location' );
		estore_woocommerce_customizer_label( 'estore_woocommerce_topbar_phone_text', 'Phone Number' );

		// Best Sells
		estore_woocommerce_customizer_label( 'estore_woocommerce_best_sells_section_heading', 'Best Sells' );

		//Slider
		estore_woocommerce_customizer_label( 'estore_woocommerce_top_slider_setting', 'Slider' );
		
		// Wishlist button
		estore_woocommerce_customizer_label( 'estore_woocommerce_topbar1_wishlist_button', 'Wishlist button' );

		//Footer
		estore_woocommerce_customizer_label( 'estore_woocommerce_show_hide_footer', 'Footer' );
		estore_woocommerce_customizer_label( 'estore_woocommerce_show_hide_copyright', 'Copyright' );

		//Single Post Setting
		estore_woocommerce_customizer_label( 'estore_woocommerce_single_post_thumb', 'Single Post Setting' );
		estore_woocommerce_customizer_label( 'estore_woocommerce_single_post_comment_title', 'Single Post Comment' );

		// Post Setting
		estore_woocommerce_customizer_label( 'estore_woocommerce_post_page_title', 'Post Setting' );

		// Page Setting
		estore_woocommerce_customizer_label( 'estore_woocommerce_single_page_title', 'Page Setting' );
	

	}); // wp.customize ready

})( jQuery );
