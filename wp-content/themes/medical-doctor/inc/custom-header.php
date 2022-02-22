<?php
/**
 * @package Medical Doctor
 * @subpackage medical-doctor
 * Setup the WordPress core custom header feature.
 *
 * @uses medical_doctor_header_style()
*/

function medical_doctor_custom_header_setup() {

	add_theme_support( 'custom-header', apply_filters( 'medical_doctor_custom_header_args', array(
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1284,
		'height'                 => 95,
		'wp-head-callback'       => 'medical_doctor_header_style',
	) ) );
}

add_action( 'after_setup_theme', 'medical_doctor_custom_header_setup' );

if ( ! function_exists( 'medical_doctor_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see medical_doctor_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'medical_doctor_header_style' );
function medical_doctor_header_style() {
	//Check if user has defined any header image.
	if ( get_header_image() ) :
	$medical_doctor_custom_css = "
        .menu-section{
			background-image:url('".esc_url(get_header_image())."');
			background-position: left top;
		}";
	   	wp_add_inline_style( 'medical-doctor-basic-style', $medical_doctor_custom_css );
	endif;
}
endif; //medical_doctor_header_style