<?php
/**
 * Template Name: Custom home page
 */
get_header(); ?>

<main id="maincontent" role="main">
  <?php do_action('medical_doctor_above_slider_section'); ?>
  
  <?php if(get_theme_mod('medical_doctor_show_slider') != ''){ ?>
    <section id="slider">
      <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel"> 
        <?php $medical_doctor_content_pages = array();
          for ( $count = 1; $count <= 4; $count++ ) {
            $mod = intval( get_theme_mod( 'medical_doctor_slidersettings_page' . $count ));
            if ( 'page-none-selected' != $mod ) {
              $medical_doctor_content_pages[] = $mod;
            }
          }
          if( !empty($medical_doctor_content_pages) ) :
          $args = array(
            'post_type' => 'page',
            'post__in' => $medical_doctor_content_pages,
            'orderby' => 'post__in'
          );
          $query = new WP_Query( $args );
          if ( $query->have_posts() ) :
            $i = 1;
        ?>
        <div class="carousel-inner" role="listbox">
          <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
            <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
              <?php the_post_thumbnail(); ?>
              <div class="carousel-caption">
                <div class="inner_carousel">
                  <?php if ( get_theme_mod('medical_doctor_slider_title',true) != '' ) {?>
                    <h1><?php the_title(); ?></h1> 
                  <?php }?>
                  <?php if ( get_theme_mod('medical_doctor_slider_button_label','READ MORE') != '' && get_theme_mod('medical_doctor_slider_button',true) != '') {?>
                    <div class ="read-more mt-md-4 mt-0">
                      <a href="<?php the_permalink(); ?>"><?php echo esc_html( get_theme_mod('medical_doctor_slider_button_label',__('READ MORE','medical-doctor')) ); ?><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('medical_doctor_slider_button_label',__('READ MORE','medical-doctor')) ); ?></span></a>
                    </div>
                  <?php }?>
                </div>
              </div>
            </div>
          <?php $i++; endwhile; 
          wp_reset_postdata();?>
        </div>
        <?php else : ?>
          <div class="no-postfound"></div>
        <?php endif;
        endif;?>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-arrow-left"></i></span>
            <span class="screen-reader-text"><?php esc_html_e('Previous','medical-doctor'); ?></span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-arrow-right"></i></span>
            <span class="screen-reader-text"><?php esc_html_e('Next','medical-doctor'); ?></span>
          </a>
      </div>
      <div class="clearfix"></div>
    </section>
  <?php }?>

  <?php do_action('medical_doctor_below_banner_section'); ?>

  <?php if( get_theme_mod('medical_doctor_small_title') != '' || get_theme_mod('medical_doctor_section_title') != '' || get_theme_mod('medical_doctor_services_category') != '') {?>
    <section id="service-section" class="py-5">
      <div class="container">
        <?php if( get_theme_mod('medical_doctor_small_title') != ''){ ?>
          <strong class="d-block text-center"><?php echo esc_html(get_theme_mod('medical_doctor_small_title')); ?></strong>
        <?php }?>
        <?php if( get_theme_mod('medical_doctor_section_title') != ''){ ?>
          <h2 class="mb-4 pt-0 text-center"><?php echo esc_html(get_theme_mod('medical_doctor_section_title')); ?></h2>
        <?php }?>
        <div class="row">
          <?php 
            $medical_doctor_catData=  get_theme_mod('medical_doctor_services_category');
            if($medical_doctor_catData){
            $page_query = new WP_Query(array( 'category_name' => esc_html( $medical_doctor_catData ,'medical-doctor')));?>
              <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
                <div class="col-lg-4 col-md-4">
                  <div class="service-box mb-4">
                    <?php the_post_thumbnail(); ?>
                    <div class="service-content py-3 px-4">
                      <h3 class="pt-0"><a href="<?php echo esc_url( get_permalink() );?>"><?php the_title(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a></h3>
                      <p><?php $excerpt = get_the_excerpt(); echo esc_html( medical_doctor_string_limit_words( $excerpt,10) ); ?></p>
                      <a href="<?php the_permalink(); ?>" class="view-btn"><?php echo esc_html('View More','medical-doctor'); ?><span class="screen-reader-text"><?php echo esc_html('View More','medical-doctor'); ?></span></a>
                    </div>
                  </div>
                </div>
                <?php endwhile;
              wp_reset_postdata();
            } 
          ?>
        </div>
      </div>
    </section>
  <?php }?>

  <?php do_action('medical_doctor_after_service_section'); ?>

  <div class="container">
    <?php while ( have_posts() ) : the_post(); ?>
      <div class="entry-content"><?php the_content(); ?></div>
    <?php endwhile; // end of the loop. ?>
  </div>
</main>

<?php get_footer(); ?>