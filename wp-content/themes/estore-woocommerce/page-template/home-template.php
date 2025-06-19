<?php
/**
 * Template Name: Home Template
 */

get_header(); ?>

<main id="skip-content">
  <?php if(get_theme_mod('estore_woocommerce_top_slider_setting',1) == 1){ ?>
    <section id="top-slider" >
      <?php $estore_woocommerce_slide_pages = array();
        for ( $estore_woocommerce_count = 1; $estore_woocommerce_count <= 3; $estore_woocommerce_count++ ) {
          $estore_woocommerce_mod = intval( get_theme_mod( 'estore_woocommerce_top_slider_page' . $estore_woocommerce_count ));
          if ( 'page-none-selected' != $estore_woocommerce_mod ) {
            $estore_woocommerce_slide_pages[] = $estore_woocommerce_mod;
          }
        }
        if( !empty($estore_woocommerce_slide_pages) ) :
          $estore_woocommerce_args = array(
            'post_type' => 'page',
            'post__in' => $estore_woocommerce_slide_pages,
            'orderby' => 'post__in'
          );
          $estore_woocommerce_query = new WP_Query( $estore_woocommerce_args );
          if ( $estore_woocommerce_query->have_posts() ) :
            $i = 1;
      ?>
      <div class="owl-carousel" role="listbox">
        <?php  while ( $estore_woocommerce_query->have_posts() ) : $estore_woocommerce_query->the_post(); ?>
          <div class="slider-box">
            <?php if(has_post_thumbnail()){
              the_post_thumbnail();
              } else{?>
              <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/image/slider.png" alt="" />
            <?php } ?>
            <div class="slider-inner-box">
              <?php if(get_theme_mod('estore_woocommerce_slider_title_setting',1) == 1){ ?>
                <h2 class="m-0"><?php the_title(); ?></h2>
              <?php }?>
              <?php if(get_theme_mod('estore_woocommerce_slider_content_setting',1) == 1){ ?>
                <p><?php echo wp_trim_words( get_the_content(), esc_attr(get_theme_mod('estore_woocommerce_slider_excerpt_length', 15)) ); ?></p>
              <?php }?>
              <?php if(get_theme_mod('estore_woocommerce_slider_button_setting',1) == 1 && get_theme_mod('estore_woocommerce_slider_button_text','Shop Collection') != ''){ ?>
                <div class="slide-btn mt-5"><a href="<?php the_permalink(); ?>"><?php esc_html_e(get_theme_mod('estore_woocommerce_slider_button_text','Shop Collection')); ?></a></div>
              <?php }?>
            </div>
          </div>
        <?php $i++; endwhile;
        wp_reset_postdata();?>
      </div>
      <?php else : ?>
        <div class="no-postfound"></div>
      <?php endif;
      endif;?>
    </section>
  <?php }?>

  <section id="best-sell" class=" py-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-12 col-12">
          <div class="heading mb-3">
            <?php if ( get_theme_mod('estore_woocommerce_best_sells_section_heading') != "" ) {?>
              <h3 class="main_heading text-center m-0"><?php echo esc_html(get_theme_mod('estore_woocommerce_best_sells_section_heading')); ?>
              </h3>
            <?php }?>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 col-12 section-btn">
          <?php if ( get_theme_mod('estore_woocommerce_best_sells_section_button_url') != "" || get_theme_mod('estore_woocommerce_best_sells_section_button') != "" ) {?>
          <a class="sell-btn" href="<?php echo esc_url(get_theme_mod('estore_woocommerce_best_sells_section_button_url')); ?>"><?php echo esc_html(get_theme_mod('estore_woocommerce_best_sells_section_button')); ?></a>
          <?php }?>
        </div>
      </div>
      
      <?php if(class_exists('woocommerce')){ ?>
       <div class="owl-carousel">
          <?php 
             $args = array(
              'post_type' => 'product',
              'product_cat' =>  get_theme_mod('estore_woocommerce_cate_tab'),
              'orderby' =>'date','order' => 'DESC' );
             $loop = new WP_Query( $args );           
             while ( $loop->have_posts() ){
             $loop->the_post(); 
             global $product; ?>
            <div class="sells-product">
              <div class="prodimg_box">
                <a href="<?php echo esc_url(get_permalink( $loop->post->ID )); ?>" title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>">
                <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'our_product'); else echo '<img src="'.esc_url(wc_placeholder_img_src()).'" alt="Placeholder" width="300px" height="300px" />'; ?>
                </a>
                <span class="discount_amt">
                  <?php $percentages = estore_woocommerce_woocommerce_get_product_sale_percentages( $product );
                      $label       = estore_woocommerce_woocommerce_get_product_sale_percentage_label( $percentages, '' );
                       echo $label;
                  ?><?php esc_html_e(' Off ','estore-woocommerce'); ?> 
                </span>
                <?php if(class_exists('YITH_WCWL')){ ?>
                  <span class="wishlist"><?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?></span>
                <?php }?>
              </div>
              <div class="text_box">
                <span class="woo-cat"><?php echo wc_get_product_category_list( $product->get_id(),); ?></span>
                <h4 class="hidedesktop p-0 mb-2"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                <div class="rating mb-2">
                  <?php if( $product->is_type( 'simple' ) ){ woocommerce_template_loop_rating( $loop->post, $product ); } ?>
                </div>
                <p class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?> mb-2"><?php echo $product->get_price_html(); ?></p>
                <div class="sale_cart text-center">
                  <?php if( $product->is_type( 'simple' ) ){ woocommerce_template_loop_add_to_cart( $loop->post, $product ); } ?>
                </div>
              </div>
            </div>
          <?php  } wp_reset_query(); ?>
       </div>
      <?php }?>
    </div>
  </section>
  <section id="page-content">
    <div class="container">
      <div class="py-5">
        <?php
          if ( have_posts() ) :
            while ( have_posts() ) : the_post();
              the_content();
            endwhile;
          endif;
        ?>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>