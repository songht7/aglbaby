<?php
	
	

	$medical_doctor_custom_css = '';

	// Layout Options
	$medical_doctor_theme_layout = get_theme_mod( 'medical_doctor_theme_layout_options','Default Theme');
    if($medical_doctor_theme_layout == 'Default Theme'){
		$medical_doctor_custom_css .='body{';
			$medical_doctor_custom_css .='max-width: 100%;';
		$medical_doctor_custom_css .='}';
	}else if($medical_doctor_theme_layout == 'Container Theme'){
		$medical_doctor_custom_css .='body{';
			$medical_doctor_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$medical_doctor_custom_css .='}';
	}else if($medical_doctor_theme_layout == 'Box Container Theme'){
		$medical_doctor_custom_css .='body{';
			$medical_doctor_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$medical_doctor_custom_css .='}';
	}
	
	/*--------- Preloader Color Option -------*/
	$medical_doctor_preloader_color = get_theme_mod('medical_doctor_preloader_color');

	if($medical_doctor_preloader_color != false){
		$medical_doctor_custom_css .=' .tg-loader{';
			$medical_doctor_custom_css .='border-color: '.esc_attr($medical_doctor_preloader_color).';';
		$medical_doctor_custom_css .='} ';
		$medical_doctor_custom_css .=' .tg-loader-inner, .preloader .preloader-container .animated-preloader, .preloader .preloader-container .animated-preloader:before{';
			$medical_doctor_custom_css .='background-color: '.esc_attr($medical_doctor_preloader_color).';';
		$medical_doctor_custom_css .='} ';
	}

	$medical_doctor_preloader_bg_color = get_theme_mod('medical_doctor_preloader_bg_color');

	if($medical_doctor_preloader_bg_color != false){
		$medical_doctor_custom_css .=' #overlayer, .preloader{';
			$medical_doctor_custom_css .='background-color: '.esc_attr($medical_doctor_preloader_bg_color).';';
		$medical_doctor_custom_css .='} ';
	}

	/*--------- Top Header ----------*/
	$medical_doctor_top_bar = get_theme_mod('medical_doctor_top_header',false);

	if($medical_doctor_top_bar == false){
		$medical_doctor_custom_css .=' .page-template-custom-front-page #header{';
			$medical_doctor_custom_css .='top: 10px;';
		$medical_doctor_custom_css .='} ';
	}

	/*------------ Button Settings option-----------------*/

	$medical_doctor_top_button_padding = get_theme_mod('medical_doctor_top_button_padding');
	$medical_doctor_bottom_button_padding = get_theme_mod('medical_doctor_bottom_button_padding');
	$medical_doctor_left_button_padding = get_theme_mod('medical_doctor_left_button_padding');
	$medical_doctor_right_button_padding = get_theme_mod('medical_doctor_right_button_padding');
	if($medical_doctor_top_button_padding != false || $medical_doctor_bottom_button_padding != false || $medical_doctor_left_button_padding != false || $medical_doctor_right_button_padding != false){
		$medical_doctor_custom_css .='.blogbtn a, .read-more a, #comments input[type="submit"].submit{';
			$medical_doctor_custom_css .='padding-top: '.esc_attr($medical_doctor_top_button_padding).'px; padding-bottom: '.esc_attr($medical_doctor_bottom_button_padding).'px; padding-left: '.esc_attr($medical_doctor_left_button_padding).'px; padding-right: '.esc_attr($medical_doctor_right_button_padding).'px; display:inline-block;';
		$medical_doctor_custom_css .='}';
	}

	$medical_doctor_button_border_radius = get_theme_mod('medical_doctor_button_border_radius');
	$medical_doctor_custom_css .='.blogbtn a, .read-more a, #comments input[type="submit"].submit{';
		$medical_doctor_custom_css .='border-radius: '.esc_attr($medical_doctor_button_border_radius).'px;';
	$medical_doctor_custom_css .='}';

	/*----------- Copyright css -----*/
	$medical_doctor_copyright_top_padding = get_theme_mod('medical_doctor_top_copyright_padding');
	$medical_doctor_copyright_bottom_padding = get_theme_mod('medical_doctor_bottom_copyright_padding');
	if($medical_doctor_copyright_top_padding != '' || $medical_doctor_copyright_bottom_padding != ''){
		$medical_doctor_custom_css .='.inner{';
			$medical_doctor_custom_css .='padding-top: '.esc_attr($medical_doctor_copyright_top_padding).'px; padding-bottom: '.esc_attr($medical_doctor_copyright_bottom_padding).'px; ';
		$medical_doctor_custom_css .='}';
	}

	$medical_doctor_copyright_alignment = get_theme_mod('medical_doctor_copyright_alignment', 'center');
	if($medical_doctor_copyright_alignment == 'center' ){
		$medical_doctor_custom_css .='#footer .copyright p{';
			$medical_doctor_custom_css .='text-align: '. $medical_doctor_copyright_alignment .';';
		$medical_doctor_custom_css .='}';
	}elseif($medical_doctor_copyright_alignment == 'left' ){
		$medical_doctor_custom_css .='#footer .copyright p{';
			$medical_doctor_custom_css .=' text-align: '. $medical_doctor_copyright_alignment .';';
		$medical_doctor_custom_css .='}';
	}elseif($medical_doctor_copyright_alignment == 'right' ){
		$medical_doctor_custom_css .='#footer .copyright p{';
			$medical_doctor_custom_css .='text-align: '. $medical_doctor_copyright_alignment .';';
		$medical_doctor_custom_css .='}';
	}

	$medical_doctor_copyright_font_size = get_theme_mod('medical_doctor_copyright_font_size');
	$medical_doctor_custom_css .='#footer .copyright p{';
		$medical_doctor_custom_css .='font-size: '.esc_attr($medical_doctor_copyright_font_size).'px;';
	$medical_doctor_custom_css .='}';

	/*------ Topbar padding ------*/
	$medical_doctor_top_topbar_padding = get_theme_mod('medical_doctor_top_topbar_padding');
	$medical_doctor_bottom_topbar_padding = get_theme_mod('medical_doctor_bottom_topbar_padding');
	if($medical_doctor_top_topbar_padding != false || $medical_doctor_bottom_topbar_padding != false){
		$medical_doctor_custom_css .='.top-bar, .page-template-custom-front-page .top-bar{';
			$medical_doctor_custom_css .='padding-top: '.esc_attr($medical_doctor_top_topbar_padding).'px !important; padding-bottom: '.esc_attr($medical_doctor_bottom_topbar_padding).'px !important; ';
		$medical_doctor_custom_css .='}';
	}

	/*------ Woocommerce ----*/
	$medical_doctor_product_border = get_theme_mod('medical_doctor_product_border',true);

	if($medical_doctor_product_border == false){
		$medical_doctor_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$medical_doctor_custom_css .='border: 0;';
		$medical_doctor_custom_css .='}';
	}

	$medical_doctor_product_top = get_theme_mod('medical_doctor_product_top_padding',10);
	$medical_doctor_product_bottom = get_theme_mod('medical_doctor_product_bottom_padding',10);
	$medical_doctor_product_left = get_theme_mod('medical_doctor_product_left_padding',10);
	$medical_doctor_product_right = get_theme_mod('medical_doctor_product_right_padding',10);
	if($medical_doctor_product_top != false || $medical_doctor_product_bottom != false || $medical_doctor_product_left != false || $medical_doctor_product_right != false){
		$medical_doctor_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$medical_doctor_custom_css .='padding-top: '.esc_attr($medical_doctor_product_top).'px; padding-bottom: '.esc_attr($medical_doctor_product_bottom).'px; padding-left: '.esc_attr($medical_doctor_product_left).'px; padding-right: '.esc_attr($medical_doctor_product_right).'px;';
		$medical_doctor_custom_css .='}';
	}

	$medical_doctor_product_border_radius = get_theme_mod('medical_doctor_product_border_radius');
	if($medical_doctor_product_border_radius != false){
		$medical_doctor_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$medical_doctor_custom_css .='border-radius: '.esc_attr($medical_doctor_product_border_radius).'px;';
		$medical_doctor_custom_css .='}';
	}

	/*----- WooCommerce button css --------*/
	$medical_doctor_product_button_top = get_theme_mod('medical_doctor_product_button_top_padding',10);
	$medical_doctor_product_button_bottom = get_theme_mod('medical_doctor_product_button_bottom_padding',10);
	$medical_doctor_product_button_left = get_theme_mod('medical_doctor_product_button_left_padding',12);
	$medical_doctor_product_button_right = get_theme_mod('medical_doctor_product_button_right_padding',12);
	if($medical_doctor_product_button_top != false || $medical_doctor_product_button_bottom != false || $medical_doctor_product_button_left != false || $medical_doctor_product_button_right != false){
		$medical_doctor_custom_css .='.woocommerce ul.products li.product .button, .woocommerce div.product form.cart .button, a.button.wc-forward, .woocommerce .cart .button, .woocommerce .cart input.button, .woocommerce #payment #place_order, .woocommerce-page #payment #place_order, button.woocommerce-button.button.woocommerce-form-login__submit, .woocommerce button.button:disabled, .woocommerce button.button:disabled[disabled]{';
			$medical_doctor_custom_css .='padding-top: '.esc_attr($medical_doctor_product_button_top).'px; padding-bottom: '.esc_attr($medical_doctor_product_button_bottom).'px; padding-left: '.esc_attr($medical_doctor_product_button_left).'px; padding-right: '.esc_attr($medical_doctor_product_button_right).'px;';
		$medical_doctor_custom_css .='}';
	}

	$medical_doctor_product_button_border_radius = get_theme_mod('medical_doctor_product_button_border_radius');
	if($medical_doctor_product_button_border_radius != false){
		$medical_doctor_custom_css .='.woocommerce ul.products li.product .button, .woocommerce div.product form.cart .button, a.button.wc-forward, .woocommerce .cart .button, .woocommerce .cart input.button, a.checkout-button.button.alt.wc-forward, .woocommerce #payment #place_order, .woocommerce-page #payment #place_order, button.woocommerce-button.button.woocommerce-form-login__submit{';
			$medical_doctor_custom_css .='border-radius: '.esc_attr($medical_doctor_product_button_border_radius).'px;';
		$medical_doctor_custom_css .='}';
	}

	/*----- WooCommerce product sale css --------*/
	$medical_doctor_product_sale_top = get_theme_mod('medical_doctor_product_sale_top_padding');
	$medical_doctor_product_sale_bottom = get_theme_mod('medical_doctor_product_sale_bottom_padding');
	$medical_doctor_product_sale_left = get_theme_mod('medical_doctor_product_sale_left_padding');
	$medical_doctor_product_sale_right = get_theme_mod('medical_doctor_product_sale_right_padding');
	if($medical_doctor_product_sale_top != false || $medical_doctor_product_sale_bottom != false || $medical_doctor_product_sale_left != false || $medical_doctor_product_sale_right != false){
		$medical_doctor_custom_css .='.woocommerce span.onsale {';
			$medical_doctor_custom_css .='padding-top: '.esc_attr($medical_doctor_product_sale_top).'px; padding-bottom: '.esc_attr($medical_doctor_product_sale_bottom).'px; padding-left: '.esc_attr($medical_doctor_product_sale_left).'px; padding-right: '.esc_attr($medical_doctor_product_sale_right).'px;';
		$medical_doctor_custom_css .='}';
	}

	$medical_doctor_product_sale_border_radius = get_theme_mod('medical_doctor_product_sale_border_radius',10);
	if($medical_doctor_product_sale_border_radius != false){
		$medical_doctor_custom_css .='.woocommerce span.onsale {';
			$medical_doctor_custom_css .='border-radius: '.esc_attr($medical_doctor_product_sale_border_radius).'px;';
		$medical_doctor_custom_css .='}';
	}

	$medical_doctor_menu_case = get_theme_mod('medical_doctor_product_sale_position', 'Right');
	if($medical_doctor_menu_case == 'Right' ){
		$medical_doctor_custom_css .='.woocommerce ul.products li.product .onsale{';
			$medical_doctor_custom_css .=' left:auto; right:0;';
		$medical_doctor_custom_css .='}';
	}elseif($medical_doctor_menu_case == 'Left' ){
		$medical_doctor_custom_css .='.woocommerce ul.products li.product .onsale{';
			$medical_doctor_custom_css .=' left:-10px; right:auto;';
		$medical_doctor_custom_css .='}';
	}

	$medical_doctor_product_sale_font_size = get_theme_mod('medical_doctor_product_sale_font_size',13);
	$medical_doctor_custom_css .='.woocommerce span.onsale {';
		$medical_doctor_custom_css .='font-size: '.esc_attr($medical_doctor_product_sale_font_size).'px;';
	$medical_doctor_custom_css .='}';


	/*---- Comment form ----*/
	$medical_doctor_comment_width = get_theme_mod('medical_doctor_comment_width', '100');
	$medical_doctor_custom_css .='#comments textarea{';
		$medical_doctor_custom_css .=' width:'.esc_attr($medical_doctor_comment_width).'%;';
	$medical_doctor_custom_css .='}';

	$medical_doctor_comment_submit_text = get_theme_mod('medical_doctor_comment_submit_text', 'Post Comment');
	if($medical_doctor_comment_submit_text == ''){
		$medical_doctor_custom_css .='#comments p.form-submit {';
			$medical_doctor_custom_css .='display: none;';
		$medical_doctor_custom_css .='}';
	}

	$medical_doctor_comment_title = get_theme_mod('medical_doctor_comment_title', 'Leave a Reply');
	if($medical_doctor_comment_title == ''){
		$medical_doctor_custom_css .='#comments h2#reply-title {';
			$medical_doctor_custom_css .='display: none;';
		$medical_doctor_custom_css .='}';
	}

	/*------ Footer background css -------*/
	$medical_doctor_footer_bg_color = get_theme_mod('medical_doctor_footer_bg_color');
	if($medical_doctor_footer_bg_color != false){
		$medical_doctor_custom_css .='.footerinner{';
			$medical_doctor_custom_css .='background-color: '.esc_attr($medical_doctor_footer_bg_color).';';
		$medical_doctor_custom_css .='}';
	}

	$medical_doctor_footer_bg_image = get_theme_mod('medical_doctor_footer_bg_image');
	if($medical_doctor_footer_bg_image != false){
		$medical_doctor_custom_css .='.footerinner{';
			$medical_doctor_custom_css .='background: url('.esc_attr($medical_doctor_footer_bg_image).');';
		$medical_doctor_custom_css .='}';
	}

	/*----- Featured image css -----*/
	$medical_doctor_feature_image_border_radius = get_theme_mod('medical_doctor_feature_image_border_radius');
	if($medical_doctor_feature_image_border_radius != false){
		$medical_doctor_custom_css .='.blog-sec img{';
			$medical_doctor_custom_css .='border-radius: '.esc_attr($medical_doctor_feature_image_border_radius).'px;';
		$medical_doctor_custom_css .='}';
	}

	$medical_doctor_feature_image_shadow = get_theme_mod('medical_doctor_feature_image_shadow');
	if($medical_doctor_feature_image_shadow != false){
		$medical_doctor_custom_css .='.blog-sec img{';
			$medical_doctor_custom_css .='box-shadow: '.esc_attr($medical_doctor_feature_image_shadow).'px '.esc_attr($medical_doctor_feature_image_shadow).'px '.esc_attr($medical_doctor_feature_image_shadow).'px #aaa;';
		$medical_doctor_custom_css .='}';
	}

	/*------ Sticky header padding ------------*/
	$medical_doctor_top_sticky_header_padding = get_theme_mod('medical_doctor_top_sticky_header_padding');
	$medical_doctor_bottom_sticky_header_padding = get_theme_mod('medical_doctor_bottom_sticky_header_padding');
	$medical_doctor_custom_css .=' .fixed-header{';
		$medical_doctor_custom_css .=' padding-top: '.esc_attr($medical_doctor_top_sticky_header_padding).'px; padding-bottom: '.esc_attr($medical_doctor_bottom_sticky_header_padding).'px';
	$medical_doctor_custom_css .='}';

	/*------ Related products ---------*/
	$medical_doctor_related_products = get_theme_mod('medical_doctor_single_related_products',true);
	if($medical_doctor_related_products == false){
		$medical_doctor_custom_css .=' .related.products{';
			$medical_doctor_custom_css .='display: none;';
		$medical_doctor_custom_css .='}';
	}

	/*-------- Menu Font Size --------*/
	$medical_doctor_menu_font_size = get_theme_mod('medical_doctor_menu_font_size',15);
	if($medical_doctor_menu_font_size != false){
		$medical_doctor_custom_css .='.nav-menu li a{';
			$medical_doctor_custom_css .='font-size: '.esc_attr($medical_doctor_menu_font_size).'px;';
		$medical_doctor_custom_css .='}';
	}

	$medical_doctor_menu_font_weight = get_theme_mod('medical_doctor_menu_font_weight');
	$medical_doctor_custom_css .='.nav-menu li a{';
		$medical_doctor_custom_css .='font-weight: '.esc_attr($medical_doctor_menu_font_weight).';';
	$medical_doctor_custom_css .='}';

	// Featured image header
	$header_image_url = medical_doctor_banner_image( $image_url = '' );
	$medical_doctor_custom_css .='#page-site-header{';
		$medical_doctor_custom_css .='background-image: url('. esc_url( $header_image_url ).'); background-size: cover;';
	$medical_doctor_custom_css .='}';

	$medical_doctor_post_featured_image = get_theme_mod('medical_doctor_post_featured_image', 'in-content');
	if($medical_doctor_post_featured_image == 'banner' ){
		$medical_doctor_custom_css .='.single #wrapper h1, .page #wrapper h1, .page #wrapper img{';
			$medical_doctor_custom_css .=' display: none;';
		$medical_doctor_custom_css .='}';
		$medical_doctor_custom_css .='.page-template-custom-front-page #page-site-header{';
			$medical_doctor_custom_css .=' display: none;';
		$medical_doctor_custom_css .='}';
	}

	// Woocommerce Shop page pagination
	$medical_doctor_shop_page_navigation = get_theme_mod('medical_doctor_shop_page_navigation',true);
	if ($medical_doctor_shop_page_navigation == false) {
		$medical_doctor_custom_css .='.woocommerce nav.woocommerce-pagination{';
			$medical_doctor_custom_css .='display: none;';
		$medical_doctor_custom_css .='}';
	}

	/*----- Blog Post display type css ------*/
	$medical_doctor_blog_post_display_type = get_theme_mod('medical_doctor_blog_post_display_type', 'blocks');
	if($medical_doctor_blog_post_display_type == 'without blocks' ){
		$medical_doctor_custom_css .='.blog .blog-sec, .blog #sidebar .widget{';
			$medical_doctor_custom_css .='border: 0;';
		$medical_doctor_custom_css .='}';
	}

	/*---------- Responsive style ---------*/
	if (get_theme_mod('medical_doctor_hide_topbar_responsive',true) == true && get_theme_mod('medical_doctor_top_header',false) == false) {
		$medical_doctor_custom_css .='.top-bar{';
			$medical_doctor_custom_css .=' display: none;';
		$medical_doctor_custom_css .='} ';
	}
	if (get_theme_mod('medical_doctor_hide_topbar_responsive',true) == false) {
		$medical_doctor_custom_css .='@media screen and (max-width: 575px){
			.top-bar{';
			$medical_doctor_custom_css .=' display: none;';
		$medical_doctor_custom_css .='} }';
	} else if(get_theme_mod('medical_doctor_hide_topbar_responsive',true) == true){
		$medical_doctor_custom_css .='@media screen and (max-width: 575px){
			.top-bar{';
			$medical_doctor_custom_css .=' display: block;';
		$medical_doctor_custom_css .='} }';
	}

	/*----- slider hide css ------*/
	$medical_doctor_show_slider = get_theme_mod('medical_doctor_show_slider',false);
	if($medical_doctor_show_slider == false ){
		$medical_doctor_custom_css .='.page-template-custom-front-page #header{';
			$medical_doctor_custom_css .='position:static; background: #192136;     border-bottom: 1px solid #192136;';
		$medical_doctor_custom_css .='}';
	}