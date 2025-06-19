<?php
/**
 * Getting Started Page.
 *
 * @package ecommerce_clothing
 */


if( ! function_exists( 'ecommerce_clothing_getting_started_menu' ) ) :
/**
 * Adding Getting Started Page in admin menu
 */
function ecommerce_clothing_getting_started_menu(){	
	add_theme_page(
		__( 'Getting Started', 'ecommerce-clothing' ),
		__( 'Getting Started', 'ecommerce-clothing' ),
		'manage_options',
		'ecommerce-clothing-getting-started',
		'ecommerce_clothing_getting_started_page'
	);
}
endif;
add_action( 'admin_menu', 'ecommerce_clothing_getting_started_menu' );

if( ! function_exists( 'ecommerce_clothing_getting_started_admin_scripts' ) ) :
/**
 * Load Getting Started styles in the admin
 */
function ecommerce_clothing_getting_started_admin_scripts( $hook ){
	// Load styles only on our page
	if( 'appearance_page_ecommerce-clothing-getting-started' != $hook ) return;

    wp_enqueue_style( 'ecommerce-clothing-getting-started', get_template_directory_uri() . '/resource/css/getting-started.css', false, ECOMMERCE_CLOTHING_THEME_VERSION );

    wp_enqueue_script( 'ecommerce-clothing-getting-started', get_template_directory_uri() . '/resource/js/getting-started.js', array( 'jquery' ), ECOMMERCE_CLOTHING_THEME_VERSION, true );
}
endif;
add_action( 'admin_enqueue_scripts', 'ecommerce_clothing_getting_started_admin_scripts' );

if( ! function_exists( 'ecommerce_clothing_getting_started_page' ) ) :
/**
 * Callback function for admin page.
*/
function ecommerce_clothing_getting_started_page(){ 
	$ecommerce_clothing_theme = wp_get_theme();?>
	<div class="wrap getting-started">
		<div class="intro-wrap">
			<div class="intro cointaner">
				<div class="intro-content">
					<h3><?php echo esc_html( 'Welcome to', 'ecommerce-clothing' );?> <span class="theme-name"><?php echo esc_html( ECOMMERCE_CLOTHING_THEME_NAME ); ?></span></h3>
					<p class="about-text">
						<?php
						// Remove last sentence of description.
						$ecommerce_clothing_description = explode( '. ', $ecommerce_clothing_theme->get( 'Description' ) );

						$ecommerce_clothing_description = implode( '. ', $ecommerce_clothing_description );

						echo esc_html( $ecommerce_clothing_description . '' );
					?></p>
					<div class="btns-getstart">
						<a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>"target="_blank" class="button button-primary"><?php esc_html_e( 'Customize', 'ecommerce-clothing' ); ?></a>
						<a class="button button-primary" href="<?php echo esc_url( 'https://wordpress.org/support/theme/ecommerce-clothing/reviews/#new-post' ); ?>" title="<?php esc_attr_e( 'Visit the Review', 'ecommerce-clothing' ); ?>" target="_blank">
							<?php esc_html_e( 'Review', 'ecommerce-clothing' ); ?>
						</a>
						<a class="button button-primary" href="<?php echo esc_url( 'https://wordpress.org/support/theme/ecommerce-clothing' ); ?>" title="<?php esc_attr_e( 'Visit the Support', 'ecommerce-clothing' ); ?>" target="_blank">
							<?php esc_html_e( 'Contact Support', 'ecommerce-clothing' ); ?>
						</a>
					</div>
					<div class="btns-wizard">
						<a class="wizard" href="<?php echo esc_url( admin_url( 'themes.php?page=ecommerceclothing-wizard' ) ); ?>"target="_blank" class="button button-primary"><?php esc_html_e( 'One Click Demo Setup', 'ecommerce-clothing' ); ?></a>
					</div>
				</div>
				<div class="intro-img">
					<img src="<?php echo esc_url(get_template_directory_uri()) .'/screenshot.png'; ?>" />
				</div>
				
			</div>
		</div>

		<div class="cointaner panels">
			<ul class="inline-list">
				<li class="current">
                    <a id="help" href="javascript:void(0);">
                        <?php esc_html_e( 'Getting Started', 'ecommerce-clothing' ); ?>
                    </a>
                </li>
				<li>
                    <a id="free-pro-panel" href="javascript:void(0);">
                        <?php esc_html_e( 'Free Vs Pro', 'ecommerce-clothing' ); ?>
                    </a>
                </li>
			</ul>
			<div id="panel" class="panel">
				<?php require get_template_directory() . '/theme-library/getting-started/tabs/help-panel.php'; ?>
				<?php require get_template_directory() . '/theme-library/getting-started/tabs/free-vs-pro-panel.php'; ?>
				<?php require get_template_directory() . '/theme-library/getting-started/tabs/link-panel.php'; ?>
			</div>
		</div>
	</div>
	<?php
}
endif;