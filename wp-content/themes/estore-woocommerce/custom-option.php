<?php

    $estore_woocommerce_theme_css= "";

    /*--------------------------- Scroll to top positions -------------------*/

    $estore_woocommerce_scroll_position = get_theme_mod( 'estore_woocommerce_scroll_top_position','Right');
    if($estore_woocommerce_scroll_position == 'Right'){
        $estore_woocommerce_theme_css .='#button{';
            $estore_woocommerce_theme_css .='right: 20px;';
        $estore_woocommerce_theme_css .='}';
    }else if($estore_woocommerce_scroll_position == 'Left'){
        $estore_woocommerce_theme_css .='#button{';
            $estore_woocommerce_theme_css .='left: 20px;';
        $estore_woocommerce_theme_css .='}';
    }else if($estore_woocommerce_scroll_position == 'Center'){
        $estore_woocommerce_theme_css .='#button{';
            $estore_woocommerce_theme_css .='right: 50%;left: 50%;';
        $estore_woocommerce_theme_css .='}';
    }

    /*--------------------------- Scroll To Top Border Radius -------------------*/

    $estore_woocommerce_scroll_to_top_border_radius = get_theme_mod('estore_woocommerce_scroll_to_top_border_radius');
    $estore_woocommerce_scroll_bg_color = get_theme_mod('estore_woocommerce_scroll_bg_color');
    $estore_woocommerce_scroll_color = get_theme_mod('estore_woocommerce_scroll_color');
    $estore_woocommerce_scroll_font_size = get_theme_mod('estore_woocommerce_scroll_font_size');
    if($estore_woocommerce_scroll_to_top_border_radius != false || $estore_woocommerce_scroll_bg_color != false || $estore_woocommerce_scroll_color != false || $estore_woocommerce_scroll_font_size != false){
        $estore_woocommerce_theme_css .='#colophon a#button{';
            $estore_woocommerce_theme_css .='border-radius: '.esc_attr($estore_woocommerce_scroll_to_top_border_radius).'px; background-color: '.esc_attr($estore_woocommerce_scroll_bg_color).'; color: '.esc_attr($estore_woocommerce_scroll_color).' !important; font-size: '.esc_attr($estore_woocommerce_scroll_font_size).'px;';
        $estore_woocommerce_theme_css .='}';
    }

    /*--------------------------- Slider Opacity -------------------*/
    $estore_woocommerce_slider_opacity_setting = get_theme_mod( 'estore_woocommerce_slider_opacity_setting',true);
    $estore_woocommerce_image_opacity_color = get_theme_mod( 'estore_woocommerce_image_opacity_color');
    $estore_woocommerce_slider_opacity = get_theme_mod( 'estore_woocommerce_slider_opacity');
    if( $estore_woocommerce_slider_opacity_setting != false) {
        $estore_woocommerce_theme_css .='#top-slider .slider-box img{';
            $estore_woocommerce_theme_css .='opacity: '. $estore_woocommerce_slider_opacity. ';';
        $estore_woocommerce_theme_css .='}';
        if( $estore_woocommerce_image_opacity_color != '') {
            $estore_woocommerce_theme_css .='#top-slider .slider-box {';
                $estore_woocommerce_theme_css .='background-color: '. $estore_woocommerce_image_opacity_color. ';';
            $estore_woocommerce_theme_css .='}';
        }
    } else {
        $estore_woocommerce_theme_css .='#top-slider .slider-box img{';
            $estore_woocommerce_theme_css .='opacity: 1;';
        $estore_woocommerce_theme_css .='}';
    }

    /*---------------------------Slider Height ------------*/

    $estore_woocommerce_slider_img_height = get_theme_mod('estore_woocommerce_slider_img_height');
    if($estore_woocommerce_slider_img_height != false){
        $estore_woocommerce_theme_css .='#top-slider .owl-carousel .owl-item img{';
            $estore_woocommerce_theme_css .='height: '.esc_attr($estore_woocommerce_slider_img_height).';';
        $estore_woocommerce_theme_css .='}';
    }

    /*---------------- Single post Settings ------------------*/

    $estore_woocommerce_single_post_navigation_show_hide = get_theme_mod('estore_woocommerce_single_post_navigation_show_hide',true);
    if($estore_woocommerce_single_post_navigation_show_hide != true){
        $estore_woocommerce_theme_css .='.nav-links{';
            $estore_woocommerce_theme_css .='display: none;';
        $estore_woocommerce_theme_css .='}';
    }

    /*--------------------------- Woocommerce Product Sale Positions -------------------*/

    $estore_woocommerce_product_sale = get_theme_mod( 'estore_woocommerce_woocommerce_product_sale','Right');
    if($estore_woocommerce_product_sale == 'Right'){
        $estore_woocommerce_theme_css .='.woocommerce ul.products li.product .onsale{';
            $estore_woocommerce_theme_css .='left: auto; right: 15px;';
        $estore_woocommerce_theme_css .='}';
    }else if($estore_woocommerce_product_sale == 'Left'){
        $estore_woocommerce_theme_css .='.woocommerce ul.products li.product .onsale{';
            $estore_woocommerce_theme_css .='left: 15px; right: auto;';
        $estore_woocommerce_theme_css .='}';
    }else if($estore_woocommerce_product_sale == 'Center'){
        $estore_woocommerce_theme_css .='.woocommerce ul.products li.product .onsale{';
            $estore_woocommerce_theme_css .='right: 50%;left: 50%;';
        $estore_woocommerce_theme_css .='}';
    }

    /*--------------------------- Woocommerce Product Border Radius -------------------*/

    $estore_woocommerce_woo_product_border_radius = get_theme_mod('estore_woocommerce_woo_product_border_radius', 0);
    if($estore_woocommerce_woo_product_border_radius != false){
        $estore_woocommerce_theme_css .='.woocommerce ul.products li.product a img{';
            $estore_woocommerce_theme_css .='border-radius: '.esc_attr($estore_woocommerce_woo_product_border_radius).'px;';
        $estore_woocommerce_theme_css .='}';
    }

    /*--------------------------- Woocommerce Product Sale Border Radius -------------------*/

    $estore_woocommerce_woo_product_sale_border_radius = get_theme_mod('estore_woocommerce_woo_product_sale_border_radius');
    if($estore_woocommerce_woo_product_sale_border_radius != false){
        $estore_woocommerce_theme_css .='.woocommerce ul.products li.product .onsale{';
            $estore_woocommerce_theme_css .='border-radius: '.esc_attr($estore_woocommerce_woo_product_sale_border_radius).'px;';
        $estore_woocommerce_theme_css .='}';
    }

    /*--------------------------- Single Post Page Image Box Shadow -------------------*/

    $estore_woocommerce_single_post_page_image_box_shadow = get_theme_mod('estore_woocommerce_single_post_page_image_box_shadow',0);
    if($estore_woocommerce_single_post_page_image_box_shadow != false){
        $estore_woocommerce_theme_css .='.single-post .entry-header img{';
            $estore_woocommerce_theme_css .='box-shadow: '.esc_attr($estore_woocommerce_single_post_page_image_box_shadow).'px '.esc_attr($estore_woocommerce_single_post_page_image_box_shadow).'px '.esc_attr($estore_woocommerce_single_post_page_image_box_shadow).'px #cccccc;';
        $estore_woocommerce_theme_css .='}';
    }

     /*--------------------------- Single Post Page Image Border Radius -------------------*/

    $estore_woocommerce_single_post_page_image_border_radius = get_theme_mod('estore_woocommerce_single_post_page_image_border_radius', 0);
    if($estore_woocommerce_single_post_page_image_border_radius != false){
        $estore_woocommerce_theme_css .='.single-post .entry-header img{';
            $estore_woocommerce_theme_css .='border-radius: '.esc_attr($estore_woocommerce_single_post_page_image_border_radius).'px;';
        $estore_woocommerce_theme_css .='}';
    }

    /*--------------------------- Footer Background Image Position -------------------*/

    $estore_woocommerce_footer_bg_image_position = get_theme_mod( 'estore_woocommerce_footer_bg_image_position','scroll');
    if($estore_woocommerce_footer_bg_image_position == 'fixed'){
        $estore_woocommerce_theme_css .='#colophon{';
            $estore_woocommerce_theme_css .='background-attachment: fixed !important; background-position: center !important;';
        $estore_woocommerce_theme_css .='}';
    }elseif ($estore_woocommerce_footer_bg_image_position == 'scroll'){
        $estore_woocommerce_theme_css .='#colophon{';
            $estore_woocommerce_theme_css .='background-attachment: scroll !important; background-position: center !important;';
        $estore_woocommerce_theme_css .='}';
    }

    /*--------------------------- Footer Widget Heading Alignment -------------------*/

    $estore_woocommerce_footer_widget_heading_alignment = get_theme_mod( 'estore_woocommerce_footer_widget_heading_alignment','Left');
    if($estore_woocommerce_footer_widget_heading_alignment == 'Left'){
        $estore_woocommerce_theme_css .='#colophon h5, h5.footer-column-widget-title{';
        $estore_woocommerce_theme_css .='text-align: left;';
        $estore_woocommerce_theme_css .='}';
    }else if($estore_woocommerce_footer_widget_heading_alignment == 'Center'){
        $estore_woocommerce_theme_css .='#colophon h5, h5.footer-column-widget-title{';
            $estore_woocommerce_theme_css .='text-align: center;';
        $estore_woocommerce_theme_css .='}';
    }else if($estore_woocommerce_footer_widget_heading_alignment == 'Right'){
        $estore_woocommerce_theme_css .='#colophon h5, h5.footer-column-widget-title{';
            $estore_woocommerce_theme_css .='text-align: right;';
        $estore_woocommerce_theme_css .='}';
    }                                                                               

    /*--------------------------- Footer background image -------------------*/

    $estore_woocommerce_footer_bg_image = get_theme_mod('estore_woocommerce_footer_bg_image');
    if($estore_woocommerce_footer_bg_image != false){
        $estore_woocommerce_theme_css .='#colophon{';
            $estore_woocommerce_theme_css .='background: url('.esc_attr($estore_woocommerce_footer_bg_image).');';
        $estore_woocommerce_theme_css .='}';
    }

    /*--------------------------- Copyright Background Color -------------------*/

    $estore_woocommerce_copyright_background_color = get_theme_mod('estore_woocommerce_copyright_background_color');
    if($estore_woocommerce_copyright_background_color != false){
        $estore_woocommerce_theme_css .='.footer_info{';
            $estore_woocommerce_theme_css .='background-color: '.esc_attr($estore_woocommerce_copyright_background_color).' !important;';
        $estore_woocommerce_theme_css .='}';
    } 

    /*--------------------------- Site Title And Tagline Color -------------------*/

    $estore_woocommerce_logo_title_color = get_theme_mod('estore_woocommerce_logo_title_color');
    if($estore_woocommerce_logo_title_color != false){
        $estore_woocommerce_theme_css .='p.site-title a, .navbar-brand a{';
            $estore_woocommerce_theme_css .='color: '.esc_attr($estore_woocommerce_logo_title_color).' !important;';
        $estore_woocommerce_theme_css .='}';
    }

    $estore_woocommerce_logo_tagline_color = get_theme_mod('estore_woocommerce_logo_tagline_color');
    if($estore_woocommerce_logo_tagline_color != false){
        $estore_woocommerce_theme_css .='.logo p.site-description, .navbar-brand p{';
            $estore_woocommerce_theme_css .='color: '.esc_attr($estore_woocommerce_logo_tagline_color).'  !important;';
        $estore_woocommerce_theme_css .='}';
    }

    /*--------------------------- Footer Widget Content Alignment -------------------*/

    $estore_woocommerce_footer_widget_content_alignment = get_theme_mod( 'estore_woocommerce_footer_widget_content_alignment','Left');
    if($estore_woocommerce_footer_widget_content_alignment == 'Left'){
        $estore_woocommerce_theme_css .='#colophon ul, #colophon p, .tagcloud, .widget{';
        $estore_woocommerce_theme_css .='text-align: left;';
        $estore_woocommerce_theme_css .='}';
    }else if($estore_woocommerce_footer_widget_content_alignment == 'Center'){
        $estore_woocommerce_theme_css .='#colophon ul, #colophon p, .tagcloud, .widget{';
            $estore_woocommerce_theme_css .='text-align: center;';
        $estore_woocommerce_theme_css .='}';
    }else if($estore_woocommerce_footer_widget_content_alignment == 'Right'){
        $estore_woocommerce_theme_css .='#colophon ul, #colophon p, .tagcloud, .widget{';
            $estore_woocommerce_theme_css .='text-align: right;';
        $estore_woocommerce_theme_css .='}';
    }

    /*--------------------------- Copyright Content Alignment -------------------*/

    $estore_woocommerce_copyright_content_alignment = get_theme_mod( 'estore_woocommerce_copyright_content_alignment','Center');
    if($estore_woocommerce_copyright_content_alignment == 'Left'){
        $estore_woocommerce_theme_css .='.footer-menu-left{';
        $estore_woocommerce_theme_css .='text-align: left;';
        $estore_woocommerce_theme_css .='}';
    }else if($estore_woocommerce_copyright_content_alignment == 'Center'){
        $estore_woocommerce_theme_css .='.footer-menu-left{';
            $estore_woocommerce_theme_css .='text-align: center;';
        $estore_woocommerce_theme_css .='}';
    }else if($estore_woocommerce_copyright_content_alignment == 'Right'){
        $estore_woocommerce_theme_css .='.footer-menu-left{';
            $estore_woocommerce_theme_css .='text-align: right;';
        $estore_woocommerce_theme_css .='}';
    }

    /*------------------ Nav Menus -------------------*/

    $estore_woocommerce_nav_menu = get_theme_mod( 'estore_woocommerce_nav_menu_text_transform','Capitalize');
    if($estore_woocommerce_nav_menu == 'Capitalize'){
        $estore_woocommerce_theme_css .='.main-navigation .menu > li > a{';
            $estore_woocommerce_theme_css .='text-transform:Capitalize;';
        $estore_woocommerce_theme_css .='}';
    }
    if($estore_woocommerce_nav_menu == 'Lowercase'){
        $estore_woocommerce_theme_css .='.main-navigation .menu > li > a{';
            $estore_woocommerce_theme_css .='text-transform:Lowercase;';
        $estore_woocommerce_theme_css .='}';
    }
    if($estore_woocommerce_nav_menu == 'Uppercase'){
        $estore_woocommerce_theme_css .='.main-navigation .menu > li > a{';
            $estore_woocommerce_theme_css .='text-transform:Uppercase;';
        $estore_woocommerce_theme_css .='}';
    }

    $estore_woocommerce_menu_font_size = get_theme_mod( 'estore_woocommerce_menu_font_size');
    if($estore_woocommerce_menu_font_size != ''){
        $estore_woocommerce_theme_css .='.main-navigation .menu > li > a{';
            $estore_woocommerce_theme_css .='font-size: '.esc_attr($estore_woocommerce_menu_font_size).'px;';
        $estore_woocommerce_theme_css .='}';
    }

    $estore_woocommerce_nav_menu_font_weight = get_theme_mod( 'estore_woocommerce_nav_menu_font_weight',500);
    if($estore_woocommerce_menu_font_size != ''){
        $estore_woocommerce_theme_css .='.main-navigation .menu > li > a{';
            $estore_woocommerce_theme_css .='font-weight: '.esc_attr($estore_woocommerce_nav_menu_font_weight).';';
        $estore_woocommerce_theme_css .='}';
    }

    /*------------------ Slider CSS -------------------*/

    $estore_woocommerce_slider_content_layout = get_theme_mod( 'estore_woocommerce_slider_content_layout','Left');
    if($estore_woocommerce_slider_content_layout == 'Left'){
        $estore_woocommerce_theme_css .='.slider-inner-box, #top-slider .slider-inner-box p{';
            $estore_woocommerce_theme_css .='text-align : left;';
        $estore_woocommerce_theme_css .='}';
    }
    if($estore_woocommerce_slider_content_layout == 'Center'){
        $estore_woocommerce_theme_css .='.slider-inner-box, #top-slider .slider-inner-box p{';
            $estore_woocommerce_theme_css .='text-align : center;';
        $estore_woocommerce_theme_css .='}';
    }
    if($estore_woocommerce_slider_content_layout == 'Right'){
        $estore_woocommerce_theme_css .='.slider-inner-box, #top-slider .slider-inner-box p{';
            $estore_woocommerce_theme_css .='text-align : right;';
        $estore_woocommerce_theme_css .='}';
    }

    /*------------------ Footer CSS -------------------*/
    $estore_woocommerce_footer_bg_color = get_theme_mod( 'estore_woocommerce_footer_bg_color');
    if($estore_woocommerce_footer_bg_color != '' ){
        $estore_woocommerce_theme_css .='#colophon {';
            $estore_woocommerce_theme_css .='background-color: '.esc_attr($estore_woocommerce_footer_bg_color).'; ';
        $estore_woocommerce_theme_css .='}';
    }

    $estore_woocommerce_footer_content_color = get_theme_mod( 'estore_woocommerce_footer_content_color');
    if($estore_woocommerce_footer_content_color != ''){
        $estore_woocommerce_theme_css .='#colophon, #colophon a, #colophon h5, #colophon .widget #wp-calendar caption {';
            $estore_woocommerce_theme_css .='color: '.esc_attr($estore_woocommerce_footer_content_color).';';
        $estore_woocommerce_theme_css .='}';
    }

    /*------------------ Copyright CSS -------------------*/
    $estore_woocommerce_copyright_text_color = get_theme_mod( 'estore_woocommerce_copyright_text_color');
    if($estore_woocommerce_copyright_text_color != ''){
        $estore_woocommerce_theme_css .='#colophon .site-info a, #colophon .site-info span {';
            $estore_woocommerce_theme_css .='color: '.esc_attr($estore_woocommerce_copyright_text_color).';';
        $estore_woocommerce_theme_css .='}';
    }