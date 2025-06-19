<?php
/**
 * Displays main header
 *
 * @package Estore Woocommerce
 */
?>

<div class="main-header text-center text-md-start">
    <div class="container">
        <div class="row nav-box">
            <div class="col-lg-10 col-md-4 col-sm-4 col-4 align-self-center">
                <?php get_template_part('template-parts/navigation/nav'); ?>
            </div>
            <div class="col-lg-2 col-md-8 col-sm-8 col-8 align-self-center">
              <?php if ( get_theme_mod('estore_woocommerce_header_locaion_url') != "" || get_theme_mod('estore_woocommerce_header_location_button') != ""  ) {?>
                <a class="deals-btn" href="<?php echo esc_url(get_theme_mod('estore_woocommerce_header_locaion_url')); ?>"><i class="fas fa-map-marker-alt"></i><?php echo esc_html(get_theme_mod('estore_woocommerce_header_location_button')); ?></a>
              <?php }?>
            </div>
        </div>
    </div>
</div>
