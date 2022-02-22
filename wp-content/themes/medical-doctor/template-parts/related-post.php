<?php $related_posts = medical_doctor_related_posts_function(); ?>

<?php if ( $related_posts->have_posts() ): ?>

	<div class="related-posts clearfix py-3">
		<?php if ( get_theme_mod('medical_doctor_related_posts_title','You May Also Like') != '' ) {?>
			<h2 class="related-posts-main-title"><?php echo esc_html( get_theme_mod('medical_doctor_related_posts_title',__('You May Also Like','medical-doctor')) ); ?></h2>
		<?php }?>
		<div class="row">
			<?php while ( $related_posts->have_posts() ) : $related_posts->the_post(); ?>

				<div class="col-lg-4 col-md-4">
				    <article class="blog-sec text-start p-2 mb-4">
				        <?php if(has_post_thumbnail()) { ?>
				          <?php the_post_thumbnail(); ?> 
				        <?php }?>
				        <h3 class="text-start"><a href="<?php echo esc_url(get_permalink() ); ?>"><?php the_title(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a></h3>
			            <?php if(get_the_excerpt()) { ?>
			                <div class="entry-content"><p><?php $excerpt = get_the_excerpt(); echo esc_html( medical_doctor_string_limit_words( $excerpt, esc_attr(get_theme_mod('medical_doctor_post_excerpt_number','20')))); ?> <?php echo esc_html( get_theme_mod('medical_doctor_button_excerpt_suffix','...') ); ?></p></div>
				        <?php }?>
				        <?php if ( get_theme_mod('medical_doctor_blog_button_text','Read Full') != '' ) {?>
				            <div class="blogbtn my-3">
				              <a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small"><?php echo esc_html( get_theme_mod('medical_doctor_blog_button_text',__('Read Full', 'medical-doctor')) ); ?><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('medical_doctor_blog_button_text',__('Read Full', 'medical-doctor')) ); ?></span></a>
				            </div>
				        <?php }?>
				    </article>
				</div>

			<?php endwhile; ?>
		</div>

	</div><!--/.post-related-->
<?php endif; ?>

<?php wp_reset_postdata(); ?>