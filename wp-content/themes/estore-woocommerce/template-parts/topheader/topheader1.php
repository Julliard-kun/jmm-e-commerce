<?php
/**
 * Displays top header 1
 *
 * @package Estore Woocommerce
 */
?>

<div class="top-header py-2 mb-2">
	<div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-6 col-12 align-self-center">
                <div class="navbar-brand text-center text-md-start">
                    <?php if ( has_custom_logo() ) : ?>
                        <div class="site-logo"><?php the_custom_logo(); ?></div>
                    <?php endif; ?>
                    <?php $estore_woocommerce_blog_info = get_bloginfo( 'name' ); ?>
                        <?php if ( ! empty( $estore_woocommerce_blog_info ) ) : ?>
                            <?php if ( is_front_page() && is_home() ) : ?>
                                <?php if( get_theme_mod('estore_woocommerce_logo_title_text',true) != ''){ ?>
                                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                                <?php } ?>
                            <?php else : ?>
                                <?php if( get_theme_mod('estore_woocommerce_logo_title_text',true) != ''){ ?>
                                    <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                                <?php } ?>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php
                            $estore_woocommerce_description = get_bloginfo( 'description', 'display' );
                            if ( $estore_woocommerce_description || is_customize_preview() ) :
                        ?>
                        <?php if( get_theme_mod('estore_woocommerce_theme_description',false) != ''){ ?>
                            <p class="site-description"><?php echo esc_html($estore_woocommerce_description); ?></p>
                        <?php } ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6 col-12 align-self-center pe-0 cat-box">
                <?php if(class_exists('woocommerce')){ ?>
                    <div class="all-categories">
                        <button class="cat-btn"><?php esc_html_e('All Categories','estore-woocommerce'); ?><i class="fas fa-caret-down"></i></button>
                        <div class="home_product_cat">
                          <?php $estore_woocommerce_args = array(
                              'number'     => '',
                              'orderby'    => 'title',
                              'order'      => 'ASC',
                              'hide_empty' => '',
                              'include'    => ''
                          );
                          $estore_woocommerce_product_categories = get_terms( 'product_cat', $estore_woocommerce_args );
                          $estore_woocommerce_count = count($estore_woocommerce_product_categories);
                            if ( $estore_woocommerce_count > 0 ){
                              foreach ( $estore_woocommerce_product_categories as $product_category ) {
                              echo '<h4><a href="' . get_term_link( $product_category ) . '">' . $product_category->name . '</a></h4>';
                              $estore_woocommerce_args = array(
                                'posts_per_page' => -1,
                                'tax_query' => array(
                                  'relation' => 'AND',
                                  array(
                                    'taxonomy' => 'product_cat',
                                    'field' => 'slug',
                                    'terms' => $product_category->slug
                                  )
                                ),
                                'post_type' => 'product',
                                'orderby' => 'title,'
                              );
                            }
                          }?>
                        </div>
                    </div>
                <?php }?>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-6 col-12 align-self-center product-search text-end ps-0">
                <?php if(class_exists('woocommerce')){ ?>
                    <?php get_product_search_form(); ?>
                <?php }?>
            </div>
            <div class="col-lg-2 col-md-12 col-sm-6 col-12 btn-box align-self-center text-end">
                <?php if ( get_theme_mod('estore_woocommerce_topbar1_wishlist_url') != "" ) {?>
                    <span class="wish-btn">
                        <a href="<?php echo esc_url(get_theme_mod('estore_woocommerce_topbar1_wishlist_url')); ?>"><i class="far fa-heart"></i></a>
                    </span>
                <?php }?>
                <?php if(class_exists('woocommerce')){ ?>
                    <span class="user-btn">
                        <?php if ( is_user_logged_in() ) { ?>
                            <a class="account-btn" href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="<?php esc_attr_e('My Account','estore-woocommerce'); ?>"><i class="far fa-user"></i></a>
                        <?php } 
                        else { ?>
                            <a class="account-btn" href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="<?php esc_attr_e('My Account','estore-woocommerce'); ?>"></a>
                        <?php } ?>
                    </span>
                <?php }?>
                <span class="cart_no">
                    <?php if(class_exists('woocommerce')){ ?>
                        <?php global $woocommerce; ?>
                        <a class="cart-customlocation" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php esc_attr_e( 'shopping cart','estore-woocommerce' ); ?>"><i class="fas fa-cart-plus"></i></a>
                    <?php }?>
                </span>
            </div>
        </div>
	</div>
</div>