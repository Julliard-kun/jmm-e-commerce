<?php

/**
 * The main template file
 * 
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ecommerce_clothing
 */

get_header();

$ecommerce_clothing_column = get_theme_mod( 'ecommerce_clothing_archive_column_layout', 'column-1' );
?>
<main id="primary" class="site-main">

	<?php
	if ( have_posts() ) :

		if ( is_home() && ! is_front_page() ) :

		endif;
		?>

		<div class="ecommerce_clothing-archive-layout grid-layout <?php echo esc_attr( $ecommerce_clothing_column ); ?>">
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_format() );

			endwhile;
			?>
		</div>
		<?php
		do_action( 'ecommerce_clothing_posts_pagination' );

	else :

		get_template_part( 'template-parts/content', 'none' );

	endif;
	?>

</main><!-- #main -->

<?php
if ( ecommerce_clothing_is_sidebar_enabled() ) {
	get_sidebar();
}

get_footer();