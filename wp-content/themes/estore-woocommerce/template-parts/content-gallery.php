<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Estore Woocommerce
 */

$estore_woocommerce_post_page_title =  get_theme_mod( 'estore_woocommerce_post_page_title', 1 );
$estore_woocommerce_post_page_meta =  get_theme_mod( 'estore_woocommerce_post_page_meta', 1 );
$estore_woocommerce_post_page_btn = get_theme_mod( 'estore_woocommerce_post_page_btn', 1 );
$estore_woocommerce_post_page_content =  get_theme_mod( 'estore_woocommerce_post_page_content', 1 );
?>

  <div class="<?php if(get_theme_mod('estore_woocommerce_blog_post_columns','Two') == 'Two'){?>col-lg-6 col-md-6<?php } elseif(get_theme_mod('estore_woocommerce_blog_post_columns','Two') == 'Three'){?>col-lg-4 col-md-6<?php }?>">
    <article id="post-<?php the_ID(); ?>" <?php post_class('article-box'); ?>>
      <?php
        if ( ! is_single() ) {
          // If not a single post, highlight the gallery.
          if ( get_post_gallery() ) {
            echo '<div class="entry-gallery">';
              echo ( get_post_gallery() );
            echo '</div>';
          };
        };
      ?>
      <div class="serv-cont">
        <?php if ($estore_woocommerce_post_page_meta == 1 ) {?>
          <div class="meta-info-box my-2">
            <span class="entry-author"><?php esc_html_e('BY','estore-woocommerce'); ?> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a></span>
            <span class="ms-2"><?php echo esc_html(get_the_date()); ?></span>
          </div>
        <?php }?>
        <div class="post-summery mt-2">
          <?php if ($estore_woocommerce_post_page_title == 1 ) {?>
            <?php the_title('<h3 class="entry-title pb-2"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>');?>
          <?php }?>
          <?php if ($estore_woocommerce_post_page_content == 1 ) {?>
            <p><?php echo wp_trim_words( get_the_content(), esc_attr(get_theme_mod('estore_woocommerce_post_page_excerpt_length', 30)) ); ?><?php echo esc_html(get_theme_mod('estore_woocommerce_post_page_excerpt_suffix','[...]')); ?></p>
          <?php }?>
          <?php if ($estore_woocommerce_post_page_btn == 1 ) {?>
            <a href="<?php the_permalink(); ?>" class="btn-text"><?php esc_html_e('Read More','estore-woocommerce'); ?></a>
          <?php }?>
        </div>
      </div>
    </article>
  </div>