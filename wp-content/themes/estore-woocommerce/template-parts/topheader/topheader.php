<?php
/**
 * Displays top header
 *
 * @package Estore Woocommerce
 */
?>

<div class="top-info text-end py-2">
	<div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-4 col-sm-12 col-12 align-self-center top-box text-start">
                <div class="header-phone">  
                    <?php if ( get_theme_mod('estore_woocommerce_topbar_phone_number') != "" ) {?>
                        <i class="fas fa-phone"></i><span><?php echo esc_html(get_theme_mod('estore_woocommerce_topbar_phone_text')); ?></span><a href="tel:<?php echo esc_attr(get_theme_mod('estore_woocommerce_topbar_phone_number')); ?>"><?php echo esc_html(get_theme_mod('estore_woocommerce_topbar_phone_number')); ?></a>
                    <?php }?>
                </div>
            </div>
            <div class="col-lg-5 col-md-8 col-sm-12 col-12 align-self-center right-box">
                <span class="text-center translate-btn">
                    <?php if(class_exists('GTranslate')){ ?>
                        <?php echo do_shortcode('[gtranslate]', 'estore-woocommerce');?>
                    <?php }?>
                </span>
                <?php if ( get_theme_mod('estore_woocommerce_topbar_checkout_button') != "" || get_theme_mod('estore_woocommerce_topbar_about_url') != ""  ) {?>
                   <span ><a href="<?php echo esc_url(get_theme_mod('estore_woocommerce_topbar_about_url')); ?>"><?php echo esc_html(get_theme_mod('estore_woocommerce_topbar_checkout_button')); ?></a></span>
                <?php }?>
                <?php if(class_exists('woocommerce')){ ?>
                    <span class="user-btn">
                        <?php if ( is_user_logged_in() ) { ?>
                            <a class="account-btn" href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="<?php esc_attr_e('My Account','estore-woocommerce'); ?>"><?php esc_html_e('My Account','estore-woocommerce'); ?></a>
                        <?php } 
                        else { ?>
                            <a class="account-btn" href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="<?php esc_attr_e('My Account','estore-woocommerce'); ?>"><?php esc_html_e('My Account','estore-woocommerce'); ?></a>
                        <?php } ?>
                    </span>
                <?php }?>
                <?php if ( get_theme_mod('estore_woocommerce_topbar_order_button') != "" || get_theme_mod('estore_woocommerce_topbar_order_url') != ""  ) {?>
                <span ><a href="<?php echo esc_url(get_theme_mod('estore_woocommerce_topbar_order_url')); ?>"><?php echo esc_html(get_theme_mod('estore_woocommerce_topbar_order_button')); ?></a></span>
                <?php }?>
            </div>
        </div>
	</div>
</div>