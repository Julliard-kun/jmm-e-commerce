<?php

/**
 * Custom template tags for this theme
 *
 * @package ecommerce_clothing
 */

 if ( ! function_exists( 'ecommerce_clothing_posted_on_single' ) ) :
    /**
     * Prints HTML with meta information for the current post-date/time on single posts.
     */
    function ecommerce_clothing_posted_on_single() {
        if ( get_theme_mod( 'ecommerce_clothing_single_post_hide_date', true ) ) {
                $ecommerce_clothing_time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
            if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
                $ecommerce_clothing_time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
            }

            $ecommerce_clothing_time_string = sprintf(
                $ecommerce_clothing_time_string,
                esc_attr( get_the_date( DATE_W3C ) ),
                esc_html( get_the_date() ),
                esc_attr( get_the_modified_date( DATE_W3C ) ),
                esc_html( get_the_modified_date() )
            );

            // Get the user-selected icon from theme mod
            $ecommerce_clothing_post_date_icon = get_theme_mod('ecommerce_clothing_post_date_icon', 'far fa-clock');

            // Output post date with dynamic icon
            $ecommerce_clothing_posted_on = '<span class="post-date">
                <a href="' . esc_url( get_permalink() ) . '" rel="bookmark">
                    <i class="' . esc_attr( $ecommerce_clothing_post_date_icon ) . '"></i> ' . $ecommerce_clothing_time_string . '
                </a>
            </span>';
    
            echo $ecommerce_clothing_posted_on; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            return;
        }
    }
endif;

if ( ! function_exists( 'ecommerce_clothing_posted_on' ) ) :
    /**
     * Prints HTML with meta information for the current post-date/time.
     */
    function ecommerce_clothing_posted_on() {
        if ( get_theme_mod( 'ecommerce_clothing_post_hide_date', true ) ) {
            $ecommerce_clothing_time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
            if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
                $ecommerce_clothing_time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
            }
    
            $ecommerce_clothing_time_string = sprintf(
                $ecommerce_clothing_time_string,
                esc_attr( get_the_date( DATE_W3C ) ),
                esc_html( get_the_date() ),
                esc_attr( get_the_modified_date( DATE_W3C ) ),
                esc_html( get_the_modified_date() )
            );

            // Get the user-selected icon from theme mod
            $ecommerce_clothing_post_date_icon = get_theme_mod('ecommerce_clothing_post_date_icon', 'far fa-clock');

            // Output post date with dynamic icon
            $ecommerce_clothing_posted_on = '<span class="post-date">
                <a href="' . esc_url( get_permalink() ) . '" rel="bookmark">
                    <i class="' . esc_attr( $ecommerce_clothing_post_date_icon ) . '"></i> ' . $ecommerce_clothing_time_string . '
                </a>
            </span>';
    
            echo $ecommerce_clothing_posted_on; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            return;
        }
    }
endif;

if ( ! function_exists( 'ecommerce_clothing_posted_by_single' ) ) :
    /**
     * Prints HTML with meta information for the current author on single posts.
     */
    function ecommerce_clothing_posted_by_single() {
        if ( get_theme_mod( 'ecommerce_clothing_single_post_hide_author', true ) ) {
            // Get the custom author icon from the Customizer
            $ecommerce_clothing_post_author_icon = get_theme_mod( 'ecommerce_clothing_post_author_icon', 'fas fa-user' );

            $ecommerce_clothing_byline = '<a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">
                <i class="' . esc_attr( $ecommerce_clothing_post_author_icon ) . '"></i> ' . esc_html( get_the_author() ) . '
            </a>';

            echo '<span class="post-author">' . $ecommerce_clothing_byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            return;
        }
    }
endif;

if ( ! function_exists( 'ecommerce_clothing_posted_by' ) ) :
    /**
     * Prints HTML with meta information for the current author.
     */
    function ecommerce_clothing_posted_by() {
        if ( get_theme_mod( 'ecommerce_clothing_post_hide_author', true ) ) {
            // Get the custom author icon from the Customizer
            $ecommerce_clothing_post_author_icon = get_theme_mod( 'ecommerce_clothing_post_author_icon', 'fas fa-user' );

            $ecommerce_clothing_byline = '<a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">
                <i class="' . esc_attr( $ecommerce_clothing_post_author_icon ) . '"></i> ' . esc_html( get_the_author() ) . '
            </a>';

            echo '<span class="post-author">' . $ecommerce_clothing_byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            return;
        }
    }
endif;

if ( ! function_exists( 'ecommerce_clothing_posted_comments_single' ) ) :
    /**
     * Prints HTML with meta information for the current comment count on single posts.
     */
    function ecommerce_clothing_posted_comments_single() {
        if ( get_theme_mod( 'ecommerce_clothing_single_post_hide_comments', true ) ) {
            $ecommerce_clothing_comment_count = get_comments_number();
            $ecommerce_clothing_comment_text  = sprintf(
                /* translators: %s: comment count */
                _n( '%s Comment', '%s Comments', $ecommerce_clothing_comment_count, 'ecommerce-clothing' ),
                number_format_i18n( $ecommerce_clothing_comment_count )
            );

           // Get the custom comments icon from the Customizer, defaulting to 'fas fa-comments'
           $ecommerce_clothing_post_comments_icon = get_theme_mod( 'ecommerce_clothing_post_comments_icon', 'fas fa-comments' );

           echo '<span class="post-comments">
               <i class="' . esc_attr( $ecommerce_clothing_post_comments_icon ) . '"></i> ' . esc_html( $ecommerce_clothing_comment_text ) . '
           </span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
           return;
        }
    }
endif;

if ( ! function_exists( 'ecommerce_clothing_posted_comments' ) ) :
    /**
     * Prints HTML with meta information for the current comment count.
     */
    function ecommerce_clothing_posted_comments() {
        if ( get_theme_mod( 'ecommerce_clothing_post_hide_comments', true ) ) {
            $ecommerce_clothing_comment_count = get_comments_number();
            $ecommerce_clothing_comment_text  = sprintf(
                /* translators: %s: comment count */
                _n( '%s Comment', '%s Comments', $ecommerce_clothing_comment_count, 'ecommerce-clothing' ),
                number_format_i18n( $ecommerce_clothing_comment_count )
            );

            // Get the custom comments icon from the Customizer, defaulting to 'fas fa-comments'
            $ecommerce_clothing_post_comments_icon = get_theme_mod( 'ecommerce_clothing_post_comments_icon', 'fas fa-comments' );

            echo '<span class="post-comments">
                <i class="' . esc_attr( $ecommerce_clothing_post_comments_icon ) . '"></i> ' . esc_html( $ecommerce_clothing_comment_text ) . '
            </span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            return;
        }
    }
endif;

if ( ! function_exists( 'ecommerce_clothing_posted_time_single' ) ) :
    /**
     * Prints HTML with meta information for the current post time on single posts.
     */
    function ecommerce_clothing_posted_time_single() {
        if ( get_theme_mod( 'ecommerce_clothing_single_post_hide_time', true ) ) {
            // Get the custom post time icon from the Customizer, defaulting to 'fas fa-clock'
            $ecommerce_clothing_post_time_icon = get_theme_mod( 'ecommerce_clothing_post_time_icon', 'fas fa-clock' );

            $ecommerce_clothing_posted_on = sprintf(
                /* translators: %s: post time */
                esc_html__( 'Posted at %s', 'ecommerce-clothing' ),
                '<a href="' . esc_url( get_permalink() ) . '"><time datetime="' . esc_attr( get_the_time( 'c' ) ) . '">' . esc_html( get_the_time() ) . '</time></a>'
            );

            echo '<span class="post-time"><i class="' . esc_attr( $ecommerce_clothing_post_time_icon ) . '"></i> ' . $ecommerce_clothing_posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            return;
        }
    }
endif;

if ( ! function_exists( 'ecommerce_clothing_posted_time' ) ) :
    /**
     * Prints HTML with meta information for the current post time.
     */
    function ecommerce_clothing_posted_time() {
        if ( get_theme_mod( 'ecommerce_clothing_post_hide_time', true ) ) {
            // Get the custom post time icon from the Customizer, defaulting to 'fas fa-clock'
            $ecommerce_clothing_post_time_icon = get_theme_mod( 'ecommerce_clothing_post_time_icon', 'fas fa-clock' );
            
            $ecommerce_clothing_posted_on = sprintf(
                /* translators: %s: post time */
                esc_html__( 'Posted at %s', 'ecommerce-clothing' ),
                '<a href="' . esc_url( get_permalink() ) . '"><time datetime="' . esc_attr( get_the_time( 'c' ) ) . '">' . esc_html( get_the_time() ) . '</time></a>'
            );

            echo '<span class="post-time"><i class="' . esc_attr( $ecommerce_clothing_post_time_icon ) . '"></i> ' . $ecommerce_clothing_posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            return;
        }
    }
endif;

if ( ! function_exists( 'ecommerce_clothing_categories_single_list' ) ) :
    function ecommerce_clothing_categories_single_list( $with_background = false ) {
        if ( is_singular( 'post' ) ) {
            $ecommerce_clothing_hide_category = get_theme_mod( 'ecommerce_clothing_single_post_hide_category', true );

            if ( $ecommerce_clothing_hide_category ) {
                $ecommerce_clothing_categories = get_the_category();
                $ecommerce_clothing_separator  = '';
                $ecommerce_clothing_output     = '';
                if ( ! empty( $ecommerce_clothing_categories ) ) {
                    foreach ( $ecommerce_clothing_categories as $category ) {
                        $ecommerce_clothing_output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a>' . $ecommerce_clothing_separator;
                    }
                    echo trim( $ecommerce_clothing_output, $ecommerce_clothing_separator );
                }
            }
        }
    }
endif;

if ( ! function_exists( 'ecommerce_clothing_categories_list' ) ) :
    function ecommerce_clothing_categories_list( $with_background = false ) {
        $ecommerce_clothing_hide_category = get_theme_mod( 'ecommerce_clothing_post_hide_category', true );

        if ( $ecommerce_clothing_hide_category ) {
            $ecommerce_clothing_categories = get_the_category();
            $ecommerce_clothing_separator  = '';
            $ecommerce_clothing_output     = '';
            if ( ! empty( $ecommerce_clothing_categories ) ) {
                foreach ( $ecommerce_clothing_categories as $category ) {
                    $ecommerce_clothing_output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a>' . $ecommerce_clothing_separator;
                }
                echo trim( $ecommerce_clothing_output, $ecommerce_clothing_separator );
            }
        }
    }
endif;

if ( ! function_exists( 'ecommerce_clothing_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the tags and comments.
	 */
	function ecommerce_clothing_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() && is_singular() ) {
			$ecommerce_clothing_hide_tag = get_theme_mod( 'ecommerce_clothing_post_hide_tags', true );

			if ( $ecommerce_clothing_hide_tag ) {
				/* translators: used between list items, there is a space after the comma */
				$ecommerce_clothing_tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'ecommerce-clothing' ) );
				if ( $ecommerce_clothing_tags_list ) {
					/* translators: 1: list of tags. */
					printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'ecommerce-clothing' ) . '</span>', $ecommerce_clothing_tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				}
			}
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'ecommerce-clothing' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'ecommerce_clothing_post_thumbnail' ) ) :
    /**
     * Display the post thumbnail.
     */
    function ecommerce_clothing_post_thumbnail() {
        // Return early if the post is password protected, an attachment, or does not have a post thumbnail.
        if ( post_password_required() || is_attachment() ) {
            return;
        }

        // Display post thumbnail for singular views.
        if ( is_singular() ) :
            // Check theme setting to hide the featured image in single posts.
            if ( get_theme_mod( 'ecommerce_clothing_single_post_hide_feature_image', false ) ) {
                return;
            }
            ?>
            <div class="post-thumbnail">
                <?php 
                if ( has_post_thumbnail() ) {
                    the_post_thumbnail(); 
                } else {
                    // URL of the default image
                    $ecommerce_clothing_default_image_url = get_template_directory_uri() . '/resource/img/default.png';
                    echo '<img src="' . esc_url( $ecommerce_clothing_default_image_url ) . '" alt="' . esc_attr( get_the_title() ) . '">';
                }
                ?>
            </div><!-- .post-thumbnail -->
        <?php else :
            // Check theme setting to hide the featured image in non-singular posts.
            if ( !get_theme_mod( 'ecommerce_clothing_post_hide_feature_image', true ) ) {
                return;
            }
            ?>
            <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
                <?php
                if ( has_post_thumbnail() ) {
                    the_post_thumbnail(
                        'post-thumbnail',
                        array(
                            'alt' => the_title_attribute(
                                array(
                                    'echo' => false,
                                )
                            ),
                        )
                    );
                } else {
                    // URL of the default image
                    $ecommerce_clothing_default_image_url = get_template_directory_uri() . '/resource/img/default.png';
                    echo '<img src="' . esc_url( $ecommerce_clothing_default_image_url ) . '" alt="' . esc_attr( get_the_title() ) . '">';
                }
                ?>
            </a>
        <?php endif; // End is_singular().
    }
endif;


if ( ! function_exists( 'wp_body_open' ) ) :
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
endif;