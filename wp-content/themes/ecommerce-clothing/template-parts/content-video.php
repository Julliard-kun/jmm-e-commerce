<?php

/**
 * Template part for displaying Video Format
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ecommerce_clothing
 */

?>
<?php $ecommerce_clothing_readmore = get_theme_mod( 'ecommerce_clothing_readmore_button_text','Read More');?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="mag-post-single">
        <?php
			// Get the post ID
			$ecommerce_clothing_post_id = get_the_ID();

			// Check if there are videos embedded in the post content
			$ecommerce_clothing_post = get_post($ecommerce_clothing_post_id);
			$ecommerce_clothing_content = do_shortcode(apply_filters('the_content', $ecommerce_clothing_post->post_content));
			$ecommerce_clothing_embeds = get_media_embedded_in_content($ecommerce_clothing_content);

			if (!empty($ecommerce_clothing_embeds)) {
			    // Loop through embedded media and display videos
			    foreach ($ecommerce_clothing_embeds as $ecommerce_clothing_embed) {
			        // Check if the embed code contains a video tag or specific video providers like YouTube or Vimeo
			        if (strpos($ecommerce_clothing_embed, 'video') !== false || strpos($ecommerce_clothing_embed, 'youtube') !== false || strpos($ecommerce_clothing_embed, 'vimeo') !== false || strpos($ecommerce_clothing_embed, 'dailymotion') !== false || strpos($ecommerce_clothing_embed, 'vine') !== false || strpos($ecommerce_clothing_embed, 'wordPress.tv') !== false || strpos($ecommerce_clothing_embed, 'hulu') !== false) {
			            ?>
			            <div class="custom-embedded-video">
			                <div class="video-container">
			                    <?php echo $ecommerce_clothing_embed; ?>
			                </div>
			                <div class="video-comments">
			                    <?php
			                    // Add your comments section here
			                    comments_template(); // This will include the default WordPress comments template
			                    ?>
			                </div>
			            </div>
			            <?php
			        }
			    }
			}
	    ?>
		<div class="mag-post-detail">
			<div class="mag-post-category">
				<?php ecommerce_clothing_categories_list(); ?>
			</div>
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title mag-post-title">', '</h1>' );
			else :
				if ( get_theme_mod( 'ecommerce_clothing_post_hide_post_heading', true ) ) { 
					the_title( '<h2 class="entry-title mag-post-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			    }
			endif;
			?>
			<div class="mag-post-meta">
				<?php
				ecommerce_clothing_posted_on();
				ecommerce_clothing_posted_by();
				ecommerce_clothing_posted_comments();
				ecommerce_clothing_posted_time();
				?>
			</div>
			<?php if ( get_theme_mod( 'ecommerce_clothing_post_hide_post_content', true ) ) { ?>
				<div class="mag-post-excerpt">
					<?php the_excerpt(); ?>
				</div>
		    <?php } ?>
			<?php if ( get_theme_mod( 'ecommerce_clothing_post_readmore_button', true ) === true ) : ?>
				<div class="mag-post-read-more">
					<a href="<?php the_permalink(); ?>" class="read-more-button">
						<?php if ( ! empty( $ecommerce_clothing_readmore ) ) { ?> <?php echo esc_html( $ecommerce_clothing_readmore ); ?> <?php } ?>
						<i class="<?php echo esc_attr( get_theme_mod( 'ecommerce_clothing_readmore_btn_icon', 'fas fa-chevron-right' ) ); ?>"></i>
					</a>
				</div>
			<?php endif; ?>
		</div>
	</div>

</article><!-- #post-<?php the_ID(); ?> -->