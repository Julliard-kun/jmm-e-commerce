<?php

/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package ecommerce_clothing
 */

function ecommerce_clothing_body_classes( $ecommerce_clothing_classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$ecommerce_clothing_classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$ecommerce_clothing_classes[] = 'no-sidebar';
	}

	$ecommerce_clothing_classes[] = ecommerce_clothing_sidebar_layout();

	return $ecommerce_clothing_classes;
}
add_filter( 'body_class', 'ecommerce_clothing_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function ecommerce_clothing_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'ecommerce_clothing_pingback_header' );


/**
 * Get all posts for customizer Post content type.
 */
function ecommerce_clothing_get_post_choices() {
	$ecommerce_clothing_choices = array( '' => esc_html__( '--Select--', 'ecommerce-clothing' ) );
	$ecommerce_clothing_args    = array( 'numberposts' => -1 );
	$ecommerce_clothing_posts   = get_posts( $ecommerce_clothing_args );

	foreach ( $ecommerce_clothing_posts as $ecommerce_clothing_post ) {
		$ecommerce_clothing_id             = $ecommerce_clothing_post->ID;
		$ecommerce_clothing_title          = $ecommerce_clothing_post->post_title;
		$ecommerce_clothing_choices[ $ecommerce_clothing_id ] = $ecommerce_clothing_title;
	}

	return $ecommerce_clothing_choices;
}

/**
 * Get all pages for customizer Page content type.
 */
function ecommerce_clothing_get_page_choices() {
	$ecommerce_clothing_choices = array( '' => esc_html__( '--Select--', 'ecommerce-clothing' ) );
	$ecommerce_clothing_pages   = get_pages();

	foreach ( $ecommerce_clothing_pages as $ecommerce_clothing_page ) {
		$ecommerce_clothing_choices[ $ecommerce_clothing_page->ID ] = $ecommerce_clothing_page->post_title;
	}

	return $ecommerce_clothing_choices;
}

/**
 * Get all categories for customizer Category content type.
 */
function ecommerce_clothing_get_post_cat_choices() {
	$ecommerce_clothing_choices = array( '' => esc_html__( '--Select--', 'ecommerce-clothing' ) );
	$ecommerce_clothing_cats    = get_categories();

	foreach ( $ecommerce_clothing_cats as $ecommerce_clothing_cat ) {
		$ecommerce_clothing_choices[ $ecommerce_clothing_cat->term_id ] = $ecommerce_clothing_cat->name;
	}

	return $ecommerce_clothing_choices;
}

/**
 * Get all donation forms for customizer form content type.
 */
function ecommerce_clothing_get_post_donation_form_choices() {
	$ecommerce_clothing_choices = array( '' => esc_html__( '--Select--', 'ecommerce-clothing' ) );
	$ecommerce_clothing_posts   = get_posts(
		array(
			'post_type'   => 'give_forms',
			'numberposts' => -1,
		)
	);
	foreach ( $ecommerce_clothing_posts as $ecommerce_clothing_post ) {
		$ecommerce_clothing_choices[ $ecommerce_clothing_post->ID ] = $ecommerce_clothing_post->post_title;
	}
	return $ecommerce_clothing_choices;
}

if ( ! function_exists( 'ecommerce_clothing_excerpt_length' ) ) :
	/**
	 * Excerpt length.
	 */
	function ecommerce_clothing_excerpt_length( $ecommerce_clothing_length ) {
		if ( is_admin() ) {
			return $ecommerce_clothing_length;
		}

		return get_theme_mod( 'ecommerce_clothing_excerpt_length', 20 );
	}
endif;
add_filter( 'excerpt_length', 'ecommerce_clothing_excerpt_length', 999 );

if ( ! function_exists( 'ecommerce_clothing_excerpt_more' ) ) :
	/**
	 * Excerpt more.
	 */
	function ecommerce_clothing_excerpt_more( $ecommerce_clothing_more ) {
		if ( is_admin() ) {
			return $ecommerce_clothing_more;
		}

		return '&hellip;';
	}
endif;
add_filter( 'excerpt_more', 'ecommerce_clothing_excerpt_more' );

if ( ! function_exists( 'ecommerce_clothing_sidebar_layout' ) ) {
	/**
	 * Get sidebar layout.
	 */
	function ecommerce_clothing_sidebar_layout() {
		$ecommerce_clothing_sidebar_position      = get_theme_mod( 'ecommerce_clothing_sidebar_position', 'right-sidebar' );
		$ecommerce_clothing_sidebar_position_post = get_theme_mod( 'ecommerce_clothing_post_sidebar_position', 'right-sidebar' );
		$ecommerce_clothing_sidebar_position_page = get_theme_mod( 'ecommerce_clothing_page_sidebar_position', 'right-sidebar' );

		if ( is_single() ) {
			$ecommerce_clothing_sidebar_position = $ecommerce_clothing_sidebar_position_post;
		} elseif ( is_page() ) {
			$ecommerce_clothing_sidebar_position = $ecommerce_clothing_sidebar_position_page;
		}

		return $ecommerce_clothing_sidebar_position;
	}
}

if ( ! function_exists( 'ecommerce_clothing_is_sidebar_enabled' ) ) {
	/**
	 * Check if sidebar is enabled.
	 */
	function ecommerce_clothing_is_sidebar_enabled() {
		$ecommerce_clothing_sidebar_position      = get_theme_mod( 'ecommerce_clothing_sidebar_position', 'right-sidebar' );
		$ecommerce_clothing_sidebar_position_post = get_theme_mod( 'ecommerce_clothing_post_sidebar_position', 'right-sidebar' );
		$ecommerce_clothing_sidebar_position_page = get_theme_mod( 'ecommerce_clothing_page_sidebar_position', 'right-sidebar' );

		$ecommerce_clothing_sidebar_enabled = true;
		if ( is_home() || is_archive() || is_search() ) {
			if ( 'no-sidebar' === $ecommerce_clothing_sidebar_position ) {
				$ecommerce_clothing_sidebar_enabled = false;
			}
		} elseif ( is_single() ) {
			if ( 'no-sidebar' === $ecommerce_clothing_sidebar_position || 'no-sidebar' === $ecommerce_clothing_sidebar_position_post ) {
				$ecommerce_clothing_sidebar_enabled = false;
			}
		} elseif ( is_page() ) {
			if ( 'no-sidebar' === $ecommerce_clothing_sidebar_position || 'no-sidebar' === $ecommerce_clothing_sidebar_position_page ) {
				$ecommerce_clothing_sidebar_enabled = false;
			}
		}
		return $ecommerce_clothing_sidebar_enabled;
	}
}

if ( ! function_exists( 'ecommerce_clothing_get_homepage_sections ' ) ) {
	/**
	 * Returns homepage sections.
	 */
	function ecommerce_clothing_get_homepage_sections() {
		$ecommerce_clothing_sections = array(
			'banner'  => esc_html__( 'Banner Section', 'ecommerce-clothing' ),
			'trending-product' => esc_html__( 'Product Section', 'ecommerce-clothing' ),
		);
		return $ecommerce_clothing_sections;
	}
}

/**
 * Renders customizer section link
 */
function ecommerce_clothing_section_link( $ecommerce_clothing_section_id ) {
	$ecommerce_clothing_section_name      = str_replace( 'ecommerce_clothing_', ' ', $ecommerce_clothing_section_id );
	$ecommerce_clothing_section_name      = str_replace( '_', ' ', $ecommerce_clothing_section_name );
	$ecommerce_clothing_starting_notation = '#';
	?>
	<span class="section-link">
		<span class="section-link-title"><?php echo esc_html( $ecommerce_clothing_section_name ); ?></span>
	</span>
	<style type="text/css">
		<?php echo $ecommerce_clothing_starting_notation . $ecommerce_clothing_section_id; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>:hover .section-link {
			visibility: visible;
		}
	</style>
	<?php
}

/**
 * Adds customizer section link css
 */
function ecommerce_clothing_section_link_css() {
	if ( is_customize_preview() ) {
		?>
		<style type="text/css">
			.section-link {
				visibility: hidden;
				background-color: black;
				position: relative;
				top: 80px;
				z-index: 99;
				left: 40px;
				color: #fff;
				text-align: center;
				font-size: 20px;
				border-radius: 10px;
				padding: 20px 10px;
				text-transform: capitalize;
			}

			.section-link-title {
				padding: 0 10px;
			}

			.banner-section {
				position: relative;
			}

			.banner-section .section-link {
				position: absolute;
				top: 100px;
			}
		</style>
		<?php
	}
}
add_action( 'wp_head', 'ecommerce_clothing_section_link_css' );

/**
 * Breadcrumb.
 */
function ecommerce_clothing_breadcrumb( $ecommerce_clothing_args = array() ) {
	if ( ! get_theme_mod( 'ecommerce_clothing_enable_breadcrumb', true ) ) {
		return;
	}

	$ecommerce_clothing_args = array(
		'show_on_front' => false,
		'show_title'    => true,
		'show_browse'   => false,
	);
	breadcrumb_trail( $ecommerce_clothing_args );
}
add_action( 'ecommerce_clothing_breadcrumb', 'ecommerce_clothing_breadcrumb', 10 );

/**
 * Add separator for breadcrumb trail.
 */
function ecommerce_clothing_breadcrumb_trail_print_styles() {
	$ecommerce_clothing_breadcrumb_separator = get_theme_mod( 'ecommerce_clothing_breadcrumb_separator', '/' );

	$ecommerce_clothing_style = '
		.trail-items li::after {
			content: "' . $ecommerce_clothing_breadcrumb_separator . '";
		}'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	$ecommerce_clothing_style = apply_filters( 'ecommerce_clothing_breadcrumb_trail_inline_style', trim( str_replace( array( "\r", "\n", "\t", '  ' ), '', $ecommerce_clothing_style ) ) );

	if ( $ecommerce_clothing_style ) {
		echo "\n" . '<style type="text/css" id="breadcrumb-trail-css">' . $ecommerce_clothing_style . '</style>' . "\n"; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}
add_action( 'wp_head', 'ecommerce_clothing_breadcrumb_trail_print_styles' );

/**
 * Pagination for archive.
 */
function ecommerce_clothing_render_posts_pagination() {
	$ecommerce_clothing_is_pagination_enabled = get_theme_mod( 'ecommerce_clothing_enable_pagination', true );
	if ( $ecommerce_clothing_is_pagination_enabled ) {
		$ecommerce_clothing_pagination_type = get_theme_mod( 'ecommerce_clothing_pagination_type', 'default' );
		if ( 'default' === $ecommerce_clothing_pagination_type ) :
			the_posts_navigation();
		else :
			the_posts_pagination();
		endif;
	}
}
add_action( 'ecommerce_clothing_posts_pagination', 'ecommerce_clothing_render_posts_pagination', 10 );

/**
 * Pagination for single post.
 */
function ecommerce_clothing_render_post_navigation() {
	the_post_navigation(
		array(
			'prev_text' => '<span>&#10229;</span> <span class="nav-title">%title</span>',
			'next_text' => '<span class="nav-title">%title</span> <span>&#10230;</span>',
		)
	);
}
add_action( 'ecommerce_clothing_post_navigation', 'ecommerce_clothing_render_post_navigation' );

/**
 * Adds footer copyright text.
 */
function ecommerce_clothing_output_footer_copyright_content() {
    $ecommerce_clothing_theme_data = wp_get_theme();
    $ecommerce_clothing_copyright_text = get_theme_mod('ecommerce_clothing_footer_copyright_text');

    if (!empty($ecommerce_clothing_copyright_text)) {
        $ecommerce_clothing_text = esc_html($ecommerce_clothing_copyright_text);
    } else {
    	$ecommerce_clothing_default_text = '<a href="'. esc_url(__('https://asterthemes.com/products/free-clothing-wordpress-theme','ecommerce-clothing')) . '" target="_blank"> ' . esc_html($ecommerce_clothing_theme_data->get('Name')) . '</a>' . '&nbsp;' . esc_html__('by', 'ecommerce-clothing') . '&nbsp;<a target="_blank" href="' . esc_url($ecommerce_clothing_theme_data->get('AuthorURI')) . '">' . esc_html(ucwords($ecommerce_clothing_theme_data->get('Author'))) . '</a>';
		/* translators: %s: WordPress.org URL */
        $ecommerce_clothing_default_text .= sprintf(esc_html__(' | Powered by %s', 'ecommerce-clothing'), '<a href="' . esc_url(__('https://wordpress.org/', 'ecommerce-clothing')) . '" target="_blank">WordPress</a>. ');
        $ecommerce_clothing_text = $ecommerce_clothing_default_text;
    }
    ?>
    <span><?php echo wp_kses_post($ecommerce_clothing_text); ?></span>
    <?php
}
add_action('ecommerce_clothing_footer_copyright', 'ecommerce_clothing_output_footer_copyright_content');

if ( ! function_exists( 'ecommerce_clothing_footer_widget' ) ) :
	function ecommerce_clothing_footer_widget() {
		$ecommerce_clothing_footer_widget_column = get_theme_mod('ecommerce_clothing_footer_widget_column','4');

		$ecommerce_clothing_column_class = '';
		if ($ecommerce_clothing_footer_widget_column == '1') {
			$ecommerce_clothing_column_class = 'one-column';
		} elseif ($ecommerce_clothing_footer_widget_column == '2') {
			$ecommerce_clothing_column_class = 'two-columns';
		} elseif ($ecommerce_clothing_footer_widget_column == '3') {
			$ecommerce_clothing_column_class = 'three-columns';
		} else {
			$ecommerce_clothing_column_class = 'four-columns';
		}
	
		if($ecommerce_clothing_footer_widget_column !== ''): 
		?>
		<div class="dt_footer-widgets <?php echo esc_attr($ecommerce_clothing_column_class); ?>">
			<div class="footer-widgets-column">
				<?php
				$footer_widgets_active = false;

				// Loop to check if any footer widget is active
				for ($ecommerce_clothing_i = 1; $ecommerce_clothing_i <= $ecommerce_clothing_footer_widget_column; $ecommerce_clothing_i++) {
					if (is_active_sidebar('ecommerce-clothing-footer-widget-' . $ecommerce_clothing_i)) {
						$footer_widgets_active = true;
						break;
					}
				}

				if ($footer_widgets_active) {
					// Display active footer widgets
					for ($ecommerce_clothing_i = 1; $ecommerce_clothing_i <= $ecommerce_clothing_footer_widget_column; $ecommerce_clothing_i++) {
						if (is_active_sidebar('ecommerce-clothing-footer-widget-' . $ecommerce_clothing_i)) : ?>
							<div class="footer-one-column">
								<?php dynamic_sidebar('ecommerce-clothing-footer-widget-' . $ecommerce_clothing_i); ?>
							</div>
						<?php endif;
					}
				} else {
				?>
				<div class="footer-one-column default-widgets">
					<aside id="search-2" class="widget widget_search default_footer_search">
						<div class="widget-header">
							<h4 class="widget-title"><?php esc_html_e('Search Here', 'ecommerce-clothing'); ?></h4>
						</div>
						<?php get_search_form(); ?>
					</aside>
				</div>
				<div class="footer-one-column default-widgets">
					<aside id="recent-posts-2" class="widget widget_recent_entries">
						<h2 class="widget-title"><?php esc_html_e('Recent Posts', 'ecommerce-clothing'); ?></h2>
						<ul>
							<?php
							$recent_posts = wp_get_recent_posts(array(
								'numberposts' => 5,
								'post_status' => 'publish',
							));
							foreach ($recent_posts as $post) {
								echo '<li><a href="' . esc_url(get_permalink($post['ID'])) . '">' . esc_html($post['post_title']) . '</a></li>';
							}
							wp_reset_query();
							?>
						</ul>
					</aside>
				</div>
				<div class="footer-one-column default-widgets">
					<aside id="recent-comments-2" class="widget widget_recent_comments">
						<h2 class="widget-title"><?php esc_html_e('Recent Comments', 'ecommerce-clothing'); ?></h2>
						<ul>
							<?php
							$recent_comments = get_comments(array(
								'number' => 5,
								'status' => 'approve',
							));
							foreach ($recent_comments as $comment) {
								echo '<li><a href="' . esc_url(get_comment_link($comment)) . '">' .
									/* translators: %s: details. */
									sprintf(esc_html__('Comment on %s', 'ecommerce-clothing'), get_the_title($comment->comment_post_ID)) .
									'</a></li>';
							}
							?>
						</ul>
					</aside>
				</div>
				<div class="footer-one-column default-widgets">
					<aside id="calendar-2" class="widget widget_calendar">
						<h2 class="widget-title"><?php esc_html_e('Calendar', 'ecommerce-clothing'); ?></h2>
						<?php get_calendar(); ?>
					</aside>
				</div>
			</div>
			<?php } ?>
		</div>
		<?php
		endif;
	}
	endif;
add_action( 'ecommerce_clothing_footer_widget', 'ecommerce_clothing_footer_widget' );


function ecommerce_clothing_footer_text_transform_css() {
    $ecommerce_clothing_footer_text_transform = get_theme_mod('footer_text_transform', 'none');
    ?>
    <style type="text/css">
        .site-footer h4,footer#colophon h2.wp-block-heading,footer#colophon .widgettitle,footer#colophon .widget-title {
            text-transform: <?php echo esc_html($ecommerce_clothing_footer_text_transform); ?>;
        }
    </style>
    <?php
}
add_action('wp_head', 'ecommerce_clothing_footer_text_transform_css');

/**
 * GET START FUNCTION
 */

function ecommerce_clothing_getpage_css($hook) {
	wp_enqueue_script( 'ecommerce-clothing-admin-script', get_template_directory_uri() . '/resource/js/ecommerce-clothing-admin-notice-script.js', array( 'jquery' ) );
    wp_localize_script( 'ecommerce-clothing-admin-script', 'ecommerce_clothing_ajax_object',
        array( 'ajax_url' => admin_url( 'admin-ajax.php' ) )
    );
    wp_enqueue_style( 'ecommerce-clothing-notice-style', get_template_directory_uri() . '/resource/css/notice.css' );
}

add_action( 'admin_enqueue_scripts', 'ecommerce_clothing_getpage_css' );


add_action('wp_ajax_ecommerce_clothing_dismissable_notice', 'ecommerce_clothing_dismissable_notice');
function ecommerce_clothing_switch_theme() {
    delete_user_meta(get_current_user_id(), 'ecommerce_clothing_dismissable_notice');
}
add_action('after_switch_theme', 'ecommerce_clothing_switch_theme');
function ecommerce_clothing_dismissable_notice() {
    update_user_meta(get_current_user_id(), 'ecommerce_clothing_dismissable_notice', true);
    die();
}

function ecommerce_clothing_deprecated_hook_admin_notice() {
    global $ecommerce_clothing_pagenow;
    
    // Check if the current page is the one where you don't want the notice to appear
    if ( $ecommerce_clothing_pagenow === 'themes.php' && isset( $_GET['page'] ) && $_GET['page'] === 'ecommerce-clothing-getting-started' ) {
        return;
    }

    $ecommerce_clothing_dismissed = get_user_meta( get_current_user_id(), 'ecommerce_clothing_dismissable_notice', true );
    if ( !$ecommerce_clothing_dismissed) { ?>
        <div class="getstrat updated notice notice-success is-dismissible notice-get-started-class">
            <div class="at-admin-content" >
                <h2><?php esc_html_e('Welcome to Ecommerce Clothing', 'ecommerce-clothing'); ?></h2>
                <p><?php _e('Explore the features of our Pro Theme and take your Dental journey to the next level.', 'ecommerce-clothing'); ?></p>
                <p ><?php _e('Get Started With Theme By Clicking On Getting Started.', 'ecommerce-clothing'); ?><p>
                <div style="display: flex; justify-content: center;">
                    <a class="admin-notice-btn button button-primary button-hero" href="<?php echo esc_url( admin_url( 'themes.php?page=ecommerce-clothing-getting-started' )); ?>"><?php esc_html_e( 'Get started', 'ecommerce-clothing' ) ?></a>
                    <a  class="admin-notice-btn button button-primary button-hero" target="_blank" href="https://demo.asterthemes.com/ecommerce-clothing"><?php esc_html_e('View Demo', 'ecommerce-clothing') ?></a>
                    <a  class="admin-notice-btn button button-primary button-hero" target="_blank" href="https://asterthemes.com/products/ecommerce-store-wordpress-theme"><?php esc_html_e('Buy Now', 'ecommerce-clothing') ?></a>
                    <a  class="admin-notice-btn button button-primary button-hero" target="_blank" href="https://demo.asterthemes.com/docs/ecommerce-clothing-free/"><?php esc_html_e('Free Doc', 'ecommerce-clothing') ?></a>
                </div>
            </div>
            <div class="at-admin-image">
                <img style="width: 100%;max-width: 320px;line-height: 40px;display: inline-block;vertical-align: top;border: 2px solid #ddd;border-radius: 4px;" src="<?php echo esc_url(get_stylesheet_directory_uri()) .'/screenshot.png'; ?>" />
            </div>
        </div>
    <?php }
}

add_action( 'admin_notices', 'ecommerce_clothing_deprecated_hook_admin_notice' );


//Admin Notice For Getstart
function ecommerce_clothing_ajax_notice_handler() {
    if ( isset( $_POST['type'] ) ) {
        $type = sanitize_text_field( wp_unslash( $_POST['type'] ) );
        update_option( 'dismissed-' . $type, TRUE );
    }
}