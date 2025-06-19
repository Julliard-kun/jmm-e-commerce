<?php
/**
 * The template for displaying comments
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ecommerce_clothing
 */

if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	if ( have_comments() ) :
		?>
		<h2 class="comments-title">
			<?php
			$ecommerce_clothing_comment_count = get_comments_number();
			if ( '1' === $ecommerce_clothing_comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'ecommerce-clothing' ),
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			} else {
				printf(
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $ecommerce_clothing_comment_count, 'comments title', 'ecommerce-clothing' ) ),
					number_format_i18n( $ecommerce_clothing_comment_count ), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			}
			?>
		</h2>

		<?php the_comments_navigation(); ?>

		<ol class="comment-list">
			<?php
			wp_list_comments(
				array(
					'style'      => 'ol',
					'short_ping' => true,
				)
			);
			?>
		</ol>

		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'ecommerce-clothing' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().

	comment_form(
		array(
			'title_reply' => esc_html(get_theme_mod('ecommerce_clothing_blog_post_comment_title',__('Leave a Reply','ecommerce-clothing' )) ),
		)
	);
	?>

</div>
