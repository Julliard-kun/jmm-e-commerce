<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Estore Woocommerce
 */
?>

		<footer id="colophon" class="site-footer border-top">
		    <div class="container">
		    	<div class="footer-column">
		    		<div class="row">
				        <div class="col-lg-3 col-md-3 col-sm-6 col-12">
				          	<?php if (is_active_sidebar('estore-woocommerce-footer1')) : ?>
		                        <?php dynamic_sidebar('estore-woocommerce-footer1'); ?>
		                    <?php else : ?>
		                        <aside id="search" class="widget" role="complementary" aria-label="firstsidebar">
		                            <h5 class="widget-title"><?php esc_html_e( 'About Us', 'estore-woocommerce' ); ?></h5>
		                            <div class="textwidget">
		                            	<p><?php esc_html_e( 'Nam malesuada nulla nisi, ut faucibus magna congue nec. Ut libero tortor, tempus at auctor in, molestie at nisi. In enim ligula, consequat eu feugiat a.', 'estore-woocommerce' ); ?></p>
		                            </div>
		                        </aside>
		                    <?php endif; ?>
				        </div>
				        <div class="col-lg-3 col-md-3 col-sm-6 col-12">
				            <?php if (is_active_sidebar('estore-woocommerce-footer2')) : ?>
		                        <?php dynamic_sidebar('estore-woocommerce-footer2'); ?>
		                    <?php else : ?>
		                        <aside id="pages" class="widget">
		                            <h5 class="widget-title"><?php esc_html_e( 'Useful Links', 'estore-woocommerce' ); ?></h5>
		                            <ul class="mt-4">
		                            	<li><?php esc_html_e( 'Home', 'estore-woocommerce' ); ?></li>
		                            	<li><?php esc_html_e( 'services', 'estore-woocommerce' ); ?></li>
		                            	<li><?php esc_html_e( 'Reviews', 'estore-woocommerce' ); ?></li>
		                            	<li><?php esc_html_e( 'About Us', 'estore-woocommerce' ); ?></li>
		                            </ul>
		                        </aside>
		                    <?php endif; ?>
				        </div>
				        <div class="col-lg-3 col-md-3 col-sm-6 col-12">
				            <?php if (is_active_sidebar('estore-woocommerce-footer3')) : ?>
		                        <?php dynamic_sidebar('estore-woocommerce-footer3'); ?>
		                    <?php else : ?>
		                        <aside id="pages" class="widget">
		                            <h5 class="widget-title"><?php esc_html_e( 'Information', 'estore-woocommerce' ); ?></h5>
		                            <ul class="mt-4">
		                            	<li><?php esc_html_e( 'FAQ', 'estore-woocommerce' ); ?></li>
		                            	<li><?php esc_html_e( 'Site Maps', 'estore-woocommerce' ); ?></li>
		                            	<li><?php esc_html_e( 'Privacy Policy', 'estore-woocommerce' ); ?></li>
		                            	<li><?php esc_html_e( 'Contact Us', 'estore-woocommerce' ); ?></li>
		                            </ul>
		                        </aside>
		                    <?php endif; ?>
				        </div>
				        <div class="col-lg-3 col-md-3 col-sm-6 col-12">
				            <?php if (is_active_sidebar('estore-woocommerce-footer4')) : ?>
		                        <?php dynamic_sidebar('estore-woocommerce-footer4'); ?>
		                    <?php else : ?>
		                        <aside id="pages" class="widget">
		                            <h5 class="widget-title"><?php esc_html_e( 'Get In Touch', 'estore-woocommerce' ); ?></h5>
		                            <ul class="mt-4">
		                            	<li><?php esc_html_e( 'Via Carlo Montù 78', 'estore-woocommerce' ); ?><br><?php esc_html_e( '22021 Bellagio CO, Italy', 'estore-woocommerce' ); ?></li>
		                            	<li><?php esc_html_e( '+11 6254 7855', 'estore-woocommerce' ); ?></li>
		                            	<li><?php esc_html_e( 'support@example.com', 'estore-woocommerce' ); ?></li>
		                            </ul>
		                        </aside>
		                    <?php endif; ?>
				        </div>
			      	</div>
				</div>
		    	<?php if (get_theme_mod('estore_woocommerce_show_hide_copyright', true)) {?>
				        <div class="site-info text-center">
				            <div class="footer-menu-left">
				            	<?php  if( ! get_theme_mod('estore_woocommerce_footer_text_setting') ){ ?>
								    <a target="_blank" href="<?php echo esc_url('https://wordpress.org/', 'estore-woocommerce' ); ?>">
										<?php
										/* translators: %s: CMS name, i.e. WordPress. */
										printf( esc_html__( 'Proudly powered by %s', 'estore-woocommerce' ), 'WordPress' );
										?>
								    </a>
								    <span class="sep mr-1"> | </span>

								    <span>
								    	<a target="_blank" href="<?php echo esc_url( 'https://www.themagnifico.net/products/free-woocommerce-wordpress-theme'); ?>">
							              	<?php
							                /* translators: 1: Theme name,  */
							                printf( esc_html__( ' %1$s ', 'estore-woocommerce' ),'Estore WordPress Theme' );
							              	?>
						              	</a>
							          	<?php
							              /* translators: 1: Theme author. */
							              printf( esc_html__( 'by %1$s.', 'estore-woocommerce' ),'TheMagnifico'  );
							            ?>
				        			</span>
								<?php }?>
								<?php echo esc_html(get_theme_mod('estore_woocommerce_footer_text_setting')); ?>
				            </div>
				        </div>
				<?php } ?>
			    <?php if(get_theme_mod('estore_woocommerce_scroll_hide','')){ ?>
			    	<a id="button"><?php esc_html_e('TOP','estore-woocommerce'); ?></a>
			    <?php } ?>
		    </div>
		</footer>
	</div>
</div>

<?php wp_footer(); ?>

</body>
</html>