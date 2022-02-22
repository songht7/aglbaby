<?php
/**
 * The template part for displaying a message that posts cannot be found.
 * @package Medical Doctor
 */
?>

<header role="banner">
	<h2 class="entry-title"><?php echo esc_html( get_theme_mod('medical_doctor_search_result_title',__('Nothing Found', 'medical-doctor' )) ); ?></h2>
</header>

<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>	
	<p><?php printf( esc_html__( 'Ready to publish your first post? Get started here.', 'medical-doctor' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
<?php elseif ( is_search() ) : ?>
	<p><?php echo esc_html( get_theme_mod('medical_doctor_search_result_text',__('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'medical-doctor' )) ); ?></p><br />
		<?php get_search_form(); ?>
<?php else : ?>
	<p><?php esc_html_e( 'Dont worry it happens to the best of us.', 'medical-doctor' ); ?></p><br />
	<div class="read-moresec mt-3">
		<a href="<?php echo esc_url( home_url() ); ?>" class="button py-2 px-4"><?php esc_html_e( 'Return to the home page', 'medical-doctor' ); ?><span class="screen-reader-text"><?php esc_html_e( 'Return to the home page', 'medical-doctor' ); ?></span></a>
	</div>
<?php endif; ?>