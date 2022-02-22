<?php
/**
 * Medical Doctor Theme Customizer
 * @package Medical Doctor
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function medical_doctor_customize_register( $wp_customize ) {	

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-selector.php' );

	class Medical_Doctor_WP_Customize_Range_Control extends WP_Customize_Control{
	    public $type = 'custom_range';
	    public function enqueue(){
	        wp_enqueue_script(
	            'cs-range-control',
	            false,
	            true
	        );
	    }
	    public function render_content(){?>
	        <label>
	            <?php if ( ! empty( $this->label )) : ?>
	                <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
	            <?php endif; ?>
	            <div class="cs-range-value"><?php echo esc_html($this->value()); ?></div>
	            <input data-input-type="range" type="range" <?php $this->input_attrs(); ?> value="<?php echo esc_attr($this->value()); ?>" <?php $this->link(); ?> />
	            <?php if ( ! empty( $this->description )) : ?>
	                <span class="description customize-control-description"><?php echo esc_html($this->description); ?></span>
	            <?php endif; ?>
	        </label>
        <?php }
	}

	//add home page setting pannel
	$wp_customize->add_panel( 'medical_doctor_panel_id', array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Theme Settings', 'medical-doctor' ),
		'description' => __( 'Description of what this panel does.', 'medical-doctor' ),
	) );

	// font array
	$medical_doctor_font_array = array(
		'' => 'No Fonts',
		'Abril Fatface' => 'Abril Fatface',
		'Acme' => 'Acme',
		'Anton' => 'Anton',
		'Architects Daughter' => 'Architects Daughter',
		'Arimo' => 'Arimo',
		'Arsenal' => 'Arsenal', 
		'Arvo' => 'Arvo',
		'Alegreya' => 'Alegreya',
		'Alfa Slab One' => 'Alfa Slab One',
		'Averia Serif Libre' => 'Averia Serif Libre',
		'Bangers' => 'Bangers', 
		'Boogaloo' => 'Boogaloo',
		'Bad Script' => 'Bad Script',
		'Bitter' => 'Bitter',
		'Bree Serif' => 'Bree Serif',
		'BenchNine' => 'BenchNine', 
		'Cabin' => 'Cabin', 
		'Cardo' => 'Cardo',
		'Courgette' => 'Courgette',
		'Cherry Swash' => 'Cherry Swash',
		'Cormorant Garamond' => 'Cormorant Garamond',
		'Crimson Text' => 'Crimson Text',
		'Cuprum' => 'Cuprum', 
		'Cookie' => 'Cookie', 
		'Chewy' => 'Chewy', 
		'Days One' => 'Days One', 
		'Dosis' => 'Dosis',
		'Droid Sans' => 'Droid Sans',
		'Economica' => 'Economica',
		'Fredoka One' => 'Fredoka One',
		'Fjalla One' => 'Fjalla One',
		'Francois One' => 'Francois One',
		'Frank Ruhl Libre' => 'Frank Ruhl Libre',
		'Gloria Hallelujah' => 'Gloria Hallelujah',
		'Great Vibes' => 'Great Vibes',
		'Handlee' => 'Handlee', 
		'Hammersmith One' => 'Hammersmith One',
		'Inconsolata' => 'Inconsolata', 
		'Indie Flower' => 'Indie Flower', 
		'IM Fell English SC' => 'IM Fell English SC', 
		'Julius Sans One' => 'Julius Sans One',
		'Josefin Slab' => 'Josefin Slab', 
		'Josefin Sans' => 'Josefin Sans', 
		'Kanit' => 'Kanit', 
		'Lobster' => 'Lobster', 
		'Lato' => 'Lato',
		'Lora' => 'Lora', 
		'Libre Baskerville' =>'Libre Baskerville',
		'Lobster Two' => 'Lobster Two',
		'Merriweather' =>'Merriweather', 
		'Monda' => 'Monda',
		'Montserrat' => 'Montserrat',
		'Muli' => 'Muli', 
		'Marck Script' => 'Marck Script',
		'Noto Serif' => 'Noto Serif',
		'Open Sans' => 'Open Sans', 
		'Overpass' => 'Overpass',
		'Overpass Mono' => 'Overpass Mono',
		'Oxygen' => 'Oxygen', 
		'Orbitron' => 'Orbitron', 
		'Patua One' => 'Patua One', 
		'Pacifico' => 'Pacifico',
		'Padauk' => 'Padauk', 
		'Playball' => 'Playball',
		'Playfair Display' => 'Playfair Display', 
		'PT Sans' => 'PT Sans',
		'Philosopher' => 'Philosopher',
		'Permanent Marker' => 'Permanent Marker',
		'Poiret One' => 'Poiret One', 
		'Quicksand' => 'Quicksand', 
		'Quattrocento Sans' => 'Quattrocento Sans', 
		'Raleway' => 'Raleway', 
		'Rubik' => 'Rubik', 
		'Rokkitt' => 'Rokkitt', 
		'Russo One' => 'Russo One', 
		'Righteous' => 'Righteous', 
		'Slabo' => 'Slabo', 
		'Source Sans Pro' => 'Source Sans Pro', 
		'Shadows Into Light Two' =>'Shadows Into Light Two', 
		'Shadows Into Light' => 'Shadows Into Light', 
		'Sacramento' => 'Sacramento', 
		'Shrikhand' => 'Shrikhand', 
		'Tangerine' => 'Tangerine',
		'Ubuntu' => 'Ubuntu', 
		'VT323' => 'VT323', 
		'Varela Round' => 'Varela Round', 
		'Vampiro One' => 'Vampiro One',
		'Vollkorn' => 'Vollkorn',
		'Volkhov' => 'Volkhov', 
		'Yanone Kaffeesatz' => 'Yanone Kaffeesatz',
   );

	//Typography
	$wp_customize->add_section( 'medical_doctor_typography', array(
    	'title' => __( 'Typography', 'medical-doctor' ),
		'priority'   => 30,
		'panel' => 'medical_doctor_panel_id'
	) );
	
	// This is Paragraph Color picker setting
	$wp_customize->add_setting( 'medical_doctor_paragraph_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'medical_doctor_paragraph_color', array(
		'label' => __('Paragraph Color', 'medical-doctor'),
		'section' => 'medical_doctor_typography',
		'settings' => 'medical_doctor_paragraph_color',
	)));

	//This is Paragraph FontFamily picker setting
	$wp_customize->add_setting('medical_doctor_paragraph_font_family',array(
	  	'default' => '',
	  	'capability' => 'edit_theme_options',
	  	'sanitize_callback' => 'medical_doctor_sanitize_choices'
	));
	$wp_customize->add_control(
	   'medical_doctor_paragraph_font_family', array(
	   'section'  => 'medical_doctor_typography',
	   'label'    => __( 'Paragraph Fonts','medical-doctor'),
	   'type'     => 'select',
	   'choices'  => $medical_doctor_font_array,
	));

	$wp_customize->add_setting('medical_doctor_paragraph_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('medical_doctor_paragraph_font_size',array(
		'label'	=> __('Paragraph Font Size','medical-doctor'),
		'section'	=> 'medical_doctor_typography',
		'setting'	=> 'medical_doctor_paragraph_font_size',
		'type'	=> 'text'
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'medical_doctor_atag_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'medical_doctor_atag_color', array(
		'label' => __('"a" Tag Color', 'medical-doctor'),
		'section' => 'medical_doctor_typography',
		'settings' => 'medical_doctor_atag_color',
	)));

	//This is "a" Tag FontFamily picker setting
	$wp_customize->add_setting('medical_doctor_atag_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'medical_doctor_sanitize_choices'
	));
	$wp_customize->add_control(
	   'medical_doctor_atag_font_family', array(
	   'section'  => 'medical_doctor_typography',
	   'label'    => __( '"a" Tag Fonts','medical-doctor'),
	   'type'     => 'select',
	   'choices'  => $medical_doctor_font_array,
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'medical_doctor_li_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'medical_doctor_li_color', array(
		'label' => __('"li" Tag Color', 'medical-doctor'),
		'section' => 'medical_doctor_typography',
		'settings' => 'medical_doctor_li_color',
	)));

	//This is "li" Tag FontFamily picker setting
	$wp_customize->add_setting('medical_doctor_li_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'medical_doctor_sanitize_choices'
	));
	$wp_customize->add_control(
	   'medical_doctor_li_font_family', array(
	   'section'  => 'medical_doctor_typography',
	   'label'    => __( '"li" Tag Fonts','medical-doctor'),
	   'type'     => 'select',
	   'choices'  => $medical_doctor_font_array,
	));

	// This is H1 Color picker setting
	$wp_customize->add_setting( 'medical_doctor_h1_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'medical_doctor_h1_color', array(
		'label' => __('H1 Color', 'medical-doctor'),
		'section' => 'medical_doctor_typography',
		'settings' => 'medical_doctor_h1_color',
	)));

	//This is H1 FontFamily picker setting
	$wp_customize->add_setting('medical_doctor_h1_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'medical_doctor_sanitize_choices'
	));
	$wp_customize->add_control(
	   'medical_doctor_h1_font_family', array(
	   'section'  => 'medical_doctor_typography',
	   'label'    => __( 'H1 Fonts','medical-doctor'),
	   'type'     => 'select',
	   'choices'  => $medical_doctor_font_array,
	));

	//This is H1 FontSize setting
	$wp_customize->add_setting('medical_doctor_h1_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('medical_doctor_h1_font_size',array(
		'label'	=> __('H1 Font Size','medical-doctor'),
		'section'	=> 'medical_doctor_typography',
		'setting'	=> 'medical_doctor_h1_font_size',
		'type'	=> 'text'
	));

	// This is H2 Color picker setting
	$wp_customize->add_setting( 'medical_doctor_h2_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'medical_doctor_h2_color', array(
		'label' => __('h2 Color', 'medical-doctor'),
		'section' => 'medical_doctor_typography',
		'settings' => 'medical_doctor_h2_color',
	)));

	//This is H2 FontFamily picker setting
	$wp_customize->add_setting('medical_doctor_h2_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'medical_doctor_sanitize_choices'
	));
	$wp_customize->add_control(
	   'medical_doctor_h2_font_family', array(
	   'section'  => 'medical_doctor_typography',
	   'label'    => __( 'h2 Fonts','medical-doctor'),
	   'type'     => 'select',
	   'choices'  => $medical_doctor_font_array,
	));

	//This is H2 FontSize setting
	$wp_customize->add_setting('medical_doctor_h2_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('medical_doctor_h2_font_size',array(
		'label'	=> __('h2 Font Size','medical-doctor'),
		'section'	=> 'medical_doctor_typography',
		'setting'	=> 'medical_doctor_h2_font_size',
		'type'	=> 'text'
	));

	// This is H3 Color picker setting
	$wp_customize->add_setting( 'medical_doctor_h3_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'medical_doctor_h3_color', array(
		'label' => __('h3 Color', 'medical-doctor'),
		'section' => 'medical_doctor_typography',
		'settings' => 'medical_doctor_h3_color',
	)));

	//This is H3 FontFamily picker setting
	$wp_customize->add_setting('medical_doctor_h3_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'medical_doctor_sanitize_choices'
	));
	$wp_customize->add_control(
	   'medical_doctor_h3_font_family', array(
	   'section'  => 'medical_doctor_typography',
	   'label'    => __( 'h3 Fonts','medical-doctor'),
	   'type'     => 'select',
	   'choices'  => $medical_doctor_font_array,
	));

	//This is H3 FontSize setting
	$wp_customize->add_setting('medical_doctor_h3_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('medical_doctor_h3_font_size',array(
		'label'	=> __('h3 Font Size','medical-doctor'),
		'section'	=> 'medical_doctor_typography',
		'setting'	=> 'medical_doctor_h3_font_size',
		'type'	=> 'text'
	));

	// This is H4 Color picker setting
	$wp_customize->add_setting( 'medical_doctor_h4_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'medical_doctor_h4_color', array(
		'label' => __('h4 Color', 'medical-doctor'),
		'section' => 'medical_doctor_typography',
		'settings' => 'medical_doctor_h4_color',
	)));

	//This is H4 FontFamily picker setting
	$wp_customize->add_setting('medical_doctor_h4_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'medical_doctor_sanitize_choices'
	));
	$wp_customize->add_control(
	   'medical_doctor_h4_font_family', array(
	   'section'  => 'medical_doctor_typography',
	   'label'    => __( 'h4 Fonts','medical-doctor'),
	   'type'     => 'select',
	   'choices'  => $medical_doctor_font_array,
	));

	//This is H4 FontSize setting
	$wp_customize->add_setting('medical_doctor_h4_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('medical_doctor_h4_font_size',array(
		'label'	=> __('h4 Font Size','medical-doctor'),
		'section'	=> 'medical_doctor_typography',
		'setting'	=> 'medical_doctor_h4_font_size',
		'type'	=> 'text'
	));

	// This is H5 Color picker setting
	$wp_customize->add_setting( 'medical_doctor_h5_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'medical_doctor_h5_color', array(
		'label' => __('h5 Color', 'medical-doctor'),
		'section' => 'medical_doctor_typography',
		'settings' => 'medical_doctor_h5_color',
	)));

	//This is H5 FontFamily picker setting
	$wp_customize->add_setting('medical_doctor_h5_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'medical_doctor_sanitize_choices'
	));
	$wp_customize->add_control(
	   'medical_doctor_h5_font_family', array(
	   'section'  => 'medical_doctor_typography',
	   'label'    => __( 'h5 Fonts','medical-doctor'),
	   'type'     => 'select',
	   'choices'  => $medical_doctor_font_array,
	));

	//This is H5 FontSize setting
	$wp_customize->add_setting('medical_doctor_h5_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('medical_doctor_h5_font_size',array(
		'label'	=> __('h5 Font Size','medical-doctor'),
		'section'	=> 'medical_doctor_typography',
		'setting'	=> 'medical_doctor_h5_font_size',
		'type'	=> 'text'
	));

	// This is H6 Color picker setting
	$wp_customize->add_setting( 'medical_doctor_h6_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'medical_doctor_h6_color', array(
		'label' => __('h6 Color', 'medical-doctor'),
		'section' => 'medical_doctor_typography',
		'settings' => 'medical_doctor_h6_color',
	)));

	//This is H6 FontFamily picker setting
	$wp_customize->add_setting('medical_doctor_h6_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'medical_doctor_sanitize_choices'
	));
	$wp_customize->add_control(
	   'medical_doctor_h6_font_family', array(
	   'section'  => 'medical_doctor_typography',
	   'label'    => __( 'h6 Fonts','medical-doctor'),
	   'type'     => 'select',
	   'choices'  => $medical_doctor_font_array,
	));

	//This is H6 FontSize setting
	$wp_customize->add_setting('medical_doctor_h6_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('medical_doctor_h6_font_size',array(
		'label'	=> __('h6 Font Size','medical-doctor'),
		'section'	=> 'medical_doctor_typography',
		'setting'	=> 'medical_doctor_h6_font_size',
		'type'	=> 'text'
	));

	//Topbar section
	$wp_customize->add_section('medical_doctor_topbar_icon',array(
		'title'	=> __('Topbar Section','medical-doctor'),
		'description'	=> __('Add Header Content here','medical-doctor'),
		'priority'	=> null,
		'panel' => 'medical_doctor_panel_id',
	));

	$wp_customize->add_setting('medical_doctor_top_header',array(
      'default' => false,
      'sanitize_callback'	=> 'medical_doctor_sanitize_checkbox'
   ));
   $wp_customize->add_control('medical_doctor_top_header',array(
      'type' => 'checkbox',
      'label' => __('Enable Top Header','medical-doctor'),
      'section' => 'medical_doctor_topbar_icon'
   ));

   $wp_customize->add_setting('medical_doctor_topbar_padding',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('medical_doctor_topbar_padding',array(
		'label'	=> esc_html__('Topbar Padding','medical-doctor'),
		'section'=> 'medical_doctor_topbar_icon',
	));

   $wp_customize->add_setting('medical_doctor_top_topbar_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'medical_doctor_sanitize_float'
	));
	$wp_customize->add_control('medical_doctor_top_topbar_padding',array(
		'description'	=> __('Top','medical-doctor'),
		'input_attrs' => array(
         'step' => 1,
			'min' => 0,
			'max' => 50,
      ),
		'section'=> 'medical_doctor_topbar_icon',
		'type'=> 'number',
	));

	$wp_customize->add_setting('medical_doctor_bottom_topbar_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'medical_doctor_sanitize_float'
	));
	$wp_customize->add_control('medical_doctor_bottom_topbar_padding',array(
		'description'	=> __('Bottom','medical-doctor'),
		'input_attrs' => array(
         'step' => 1,
			'min' => 0,
			'max' => 50,
      ),
		'section'=> 'medical_doctor_topbar_icon',
		'type'=> 'number',
	));

   $wp_customize->add_setting('medical_doctor_sticky_header',array(
      'default' => '',
      'sanitize_callback'	=> 'medical_doctor_sanitize_checkbox'
  	));
	$wp_customize->add_control('medical_doctor_sticky_header',array(
		'type' => 'checkbox',
		'label' => __('Stick header on Desktop','medical-doctor'),
		'section' => 'medical_doctor_topbar_icon'
	));

 	$wp_customize->add_setting('medical_doctor_sticky_header_padding',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('medical_doctor_sticky_header_padding',array(
		'label'	=> esc_html__('Sticky Header Padding','medical-doctor'),
		'section'=> 'medical_doctor_topbar_icon',
		'type' => 'hidden',
	));

 	$wp_customize->add_setting('medical_doctor_top_sticky_header_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'medical_doctor_sanitize_float'
	));
	$wp_customize->add_control('medical_doctor_top_sticky_header_padding',array(
		'description'	=> __('Top','medical-doctor'),
		'input_attrs' => array(
         'step' => 1,
			'min' => 0,
			'max' => 50,
     	),
		'section'=> 'medical_doctor_topbar_icon',
		'type'=> 'number'
	));

	$wp_customize->add_setting('medical_doctor_bottom_sticky_header_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'medical_doctor_sanitize_float'
	));
	$wp_customize->add_control('medical_doctor_bottom_sticky_header_padding',array(
		'description'	=> __('Bottom','medical-doctor'),
		'input_attrs' => array(
         'step' => 1,
			'min' => 0,
			'max' => 50,
     	),
		'section'=> 'medical_doctor_topbar_icon',
		'type'=> 'number'
	));

	$wp_customize->add_setting('medical_doctor_booking_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('medical_doctor_booking_text',array(
		'label'	=> __('Add Book Button Text','medical-doctor'),
		'section' => 'medical_doctor_topbar_icon',
		'setting' => 'medical_doctor_booking_text',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('medical_doctor_booking_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('medical_doctor_booking_url',array(
		'label'	=> __('Add Book Button Link','medical-doctor'),
		'section' => 'medical_doctor_topbar_icon',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('medical_doctor_topbar_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('medical_doctor_topbar_text',array(
		'label'	=> __('Add Appointment Text','medical-doctor'),
		'section' => 'medical_doctor_topbar_icon',
		'setting' => 'medical_doctor_topbar_text',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('medical_doctor_phone_icon',array(
		'default'	=> 'fas fa-phone',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Medical_Doctor_Icon_Selector(
     	$wp_customize,'medical_doctor_phone_icon',array(
		'label'	=> __('Phone Icon','medical-doctor'),
		'section' => 'medical_doctor_topbar_icon',
		'type'	  => 'icon',
	)));

	$wp_customize->add_setting('medical_doctor_call',array(
		'default'	=> '',
		'sanitize_callback'	=> 'medical_doctor_sanitize_phone_number'
	));
	$wp_customize->add_control('medical_doctor_call',array(
		'label'	=> __('Add Phone No.','medical-doctor'),
		'section' => 'medical_doctor_topbar_icon',
		'setting' => 'medical_doctor_call',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('medical_doctor_facebook_link',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('medical_doctor_facebook_link',array(
		'label'	=> __('Add Facebook Link','medical-doctor'),
		'section' => 'medical_doctor_topbar_icon',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('medical_doctor_linkedin_link',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('medical_doctor_linkedin_link',array(
		'label'	=> __('Add Linkedin Link','medical-doctor'),
		'section' => 'medical_doctor_topbar_icon',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('medical_doctor_twitter_link',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('medical_doctor_twitter_link',array(
		'label'	=> __('Add Twitter Link','medical-doctor'),
		'section' => 'medical_doctor_topbar_icon',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('medical_doctor_intagram_link',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('medical_doctor_intagram_link',array(
		'label'	=> __('Add Instagram Link','medical-doctor'),
		'section' => 'medical_doctor_topbar_icon',
		'type'	=> 'url'
	));

	// Header
	$wp_customize->add_section('medical_doctor_header',array(
		'title'	=> __('Header','medical-doctor'),
		'priority'	=> null,
		'panel' => 'medical_doctor_panel_id',
	));

	$wp_customize->add_setting( 'medical_doctor_menu_font_size', array(
		'default'=> '15',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( new Medical_Doctor_WP_Customize_Range_Control( $wp_customize, 'medical_doctor_menu_font_size', array(
		'label'  => __('Menu Font Size','medical-doctor'),
		'section'  => 'medical_doctor_header',
		'description' => __('Measurement is in pixel.','medical-doctor'),
		'input_attrs' => array(
		   'min' => 0,
		   'max' => 50,
		)
    )));

 	$wp_customize->add_setting('medical_doctor_menu_font_weight',array(
		'default' => '',
		'sanitize_callback' => 'medical_doctor_sanitize_choices'
	));
	$wp_customize->add_control('medical_doctor_menu_font_weight',array(
		'type' => 'select',
		'label' => __('Menu Font Weight','medical-doctor'),
		'section' => 'medical_doctor_header',
		'choices' => array(
		   '100' => __('100','medical-doctor'),
		   '200' => __('200','medical-doctor'),
		   '300' => __('300','medical-doctor'),
		   '400' => __('400','medical-doctor'),
		   '500' => __('500','medical-doctor'),
		   '600' => __('600','medical-doctor'),
		   '700' => __('700','medical-doctor'),
		   '800' => __('800','medical-doctor'),
		   '900' => __('900','medical-doctor'),
		),
	) );

	$wp_customize->add_setting('medical_doctor_topbar_button_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('medical_doctor_topbar_button_text',array(
		'label'	=> __('Add Button Text','medical-doctor'),
		'section' => 'medical_doctor_header',
		'setting' => 'medical_doctor_topbar_button_text',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('medical_doctor_topbar_button_link',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('medical_doctor_topbar_button_link',array(
		'label'	=> __('Add Button Link','medical-doctor'),
		'section' => 'medical_doctor_header',
		'setting' => 'medical_doctor_topbar_button_link',
		'type'	=> 'url'
	));

	//Slider section
  	$wp_customize->add_section('medical_doctor_slider',array(
		'title' => __('Slider Section','medical-doctor'),
		'description' => '',
		'priority'  => null,
		'panel' => 'medical_doctor_panel_id',
	)); 

	$wp_customize->add_setting('medical_doctor_show_slider',array(
		'default' => false,
		'sanitize_callback'	=> 'medical_doctor_sanitize_checkbox'
	));
	$wp_customize->add_control('medical_doctor_show_slider',array(
     	'type' => 'checkbox',
   	'label' => __('Show / Hide Slider','medical-doctor'),
   	'section' => 'medical_doctor_slider'
	));

	$wp_customize->add_setting('medical_doctor_slider_title',array(
     'default' => true,
     'sanitize_callback'	=> 'medical_doctor_sanitize_checkbox'
	));
	$wp_customize->add_control('medical_doctor_slider_title',array(
     	'type' => 'checkbox',
   	'label' => __('Show / Hide Slider Title','medical-doctor'),
   	'section' => 'medical_doctor_slider'
	));

	$wp_customize->add_setting('medical_doctor_slider_button',array(
		'default' => true,
		'sanitize_callback'	=> 'medical_doctor_sanitize_checkbox'
	));
	$wp_customize->add_control('medical_doctor_slider_button',array(
     	'type' => 'checkbox',
   	'label' => __('Show / Hide Slider Button','medical-doctor'),
   	'section' => 'medical_doctor_slider'
	));

	for ( $count = 1; $count <= 4; $count++ ) {
		$wp_customize->add_setting( 'medical_doctor_slidersettings_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'medical_doctor_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'medical_doctor_slidersettings_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'medical-doctor' ),
			'section'  => 'medical_doctor_slider',
			'type'     => 'dropdown-pages'
		) 	);
	}

	$wp_customize->add_setting( 'medical_doctor_slider_button_label', array(
		'default' => __('READ MORE','medical-doctor'),
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'medical_doctor_slider_button_label', array(
		'label' => esc_html__( 'Slider Button Label','medical-doctor' ),
		'section' => 'medical_doctor_slider',
		'type'    => 'text',
		'settings'    => 'medical_doctor_slider_button_label'
	) );

	//Services Section
	$wp_customize->add_section('medical_doctor_service_section',array(
		'title'	=> __('Services Section','medical-doctor'),
		'description'	=> __('Add Service sections below.','medical-doctor'),
		'panel' => 'medical_doctor_panel_id',
	));

	$wp_customize->add_setting('medical_doctor_small_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('medical_doctor_small_title',array(
		'label'	=> __('Section Small Title','medical-doctor'),
		'section'	=> 'medical_doctor_service_section',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('medical_doctor_section_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('medical_doctor_section_title',array(
		'label'	=> __('Section Title','medical-doctor'),
		'section'	=> 'medical_doctor_service_section',
		'type'		=> 'text'
	));

	$categories = get_categories();
		$cat_posts = array();
		$i = 0;
		$cat_posts[]='Select';	
		foreach($categories as $category){
			if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_posts[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('medical_doctor_services_category',array(
		'default'	=> 'select',
		'sanitize_callback' => 'medical_doctor_sanitize_choices',
	));
	$wp_customize->add_control('medical_doctor_services_category',array(
		'type'    => 'select',
		'choices' => $cat_posts,
		'label' => __('Select Category to display service posts','medical-doctor'),
		'section' => 'medical_doctor_service_section',
	));

	//layout setting
	$wp_customize->add_section( 'medical_doctor_theme_layout', array(
    	'title' => __( 'Blog Settings', 'medical-doctor' ),   
		'priority' => null,
		'panel' => 'medical_doctor_panel_id'
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('medical_doctor_layout',array(
		'default' => 'Right Sidebar',
		'sanitize_callback' => 'medical_doctor_sanitize_choices'
	) );
	$wp_customize->add_control(new Medical_Doctor_Image_Radio_Control($wp_customize, 'medical_doctor_layout', array(
		'type' => 'radio',
		'label' => esc_html__('Select Sidebar layout', 'medical-doctor'),
		'section' => 'medical_doctor_theme_layout',
		'settings' => 'medical_doctor_layout',
		'choices' => array(
		   'Right Sidebar' => esc_url(get_template_directory_uri()) . '/images/layout3.png',
		   'Left Sidebar' => esc_url(get_template_directory_uri()) . '/images/layout2.png',
		   'One Column' => esc_url(get_template_directory_uri()) . '/images/layout1.png',
		   'Three Columns' => esc_url(get_template_directory_uri()) . '/images/layout4.png',
		   'Four Columns' => esc_url(get_template_directory_uri()) . '/images/layout5.png',
		   'Grid Layout' => esc_url(get_template_directory_uri()) . '/images/layout6.png'
	))));

	$wp_customize->add_setting('medical_doctor_blog_post_display_type',array(
		'default' => 'blocks',
		'sanitize_callback' => 'medical_doctor_sanitize_choices'
	));
	$wp_customize->add_control('medical_doctor_blog_post_display_type', array(
		'type' => 'select',
		'label' => __( 'Blog Page Display Type', 'medical-doctor' ),
		'section' => 'medical_doctor_theme_layout',
		'choices' => array(
		   'blocks' => __('Blocks','medical-doctor'),
		   'without blocks' => __('Without Blocks','medical-doctor'),
		),
    ));

	$wp_customize->add_setting('medical_doctor_metafields_date',array(
		'default' => 'true',
		'sanitize_callback'	=> 'medical_doctor_sanitize_checkbox'
	));
	$wp_customize->add_control('medical_doctor_metafields_date',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Date ','medical-doctor'),
		'section' => 'medical_doctor_theme_layout'
	));

	$wp_customize->add_setting('medical_doctor_metafields_author',array(
		'default' => 'true',
		'sanitize_callback'	=> 'medical_doctor_sanitize_checkbox'
	));
	$wp_customize->add_control('medical_doctor_metafields_author',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Author','medical-doctor'),
		'section' => 'medical_doctor_theme_layout'
	));

	$wp_customize->add_setting('medical_doctor_metafields_comment',array(
		'default' => 'true',
		'sanitize_callback'	=> 'medical_doctor_sanitize_checkbox'
	));
	$wp_customize->add_control('medical_doctor_metafields_comment',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Comments','medical-doctor'),
		'section' => 'medical_doctor_theme_layout'
	));

	$wp_customize->add_setting('medical_doctor_metafields_time',array(
		'default' => 'true',
		'sanitize_callback'	=> 'medical_doctor_sanitize_checkbox'
	));
	$wp_customize->add_control('medical_doctor_metafields_time',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Time','medical-doctor'),
		'section' => 'medical_doctor_theme_layout'
	));

	$wp_customize->add_setting('medical_doctor_post_navigation',array(
		'default' => 'true',
		'sanitize_callback' => 'medical_doctor_sanitize_checkbox'
	));
	$wp_customize->add_control('medical_doctor_post_navigation',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Post Navigation','medical-doctor'),
		'section' => 'medical_doctor_theme_layout'
	));

 	$wp_customize->add_setting('medical_doctor_blog_post_content',array(
    	'default' => 'Excerpt Content',
     	'sanitize_callback' => 'medical_doctor_sanitize_choices'
	));
	$wp_customize->add_control('medical_doctor_blog_post_content',array(
		'type' => 'radio',
		'label' => __('Blog Post Content Type','medical-doctor'),
		'section' => 'medical_doctor_theme_layout',
		'choices' => array(
		   'No Content' => __('No Content','medical-doctor'),
		   'Full Content' => __('Full Content','medical-doctor'),
		   'Excerpt Content' => __('Excerpt Content','medical-doctor'),
		),
	) );

 	$wp_customize->add_setting( 'medical_doctor_post_excerpt_number', array(
		'default'              => 20,
		'sanitize_callback'	=> 'medical_doctor_sanitize_float'
	) );
	$wp_customize->add_control( 'medical_doctor_post_excerpt_number', array(
		'label' => esc_html__( 'Blog Post Excerpt Number (Max 50)','medical-doctor' ),
		'section' => 'medical_doctor_theme_layout',
		'type'    => 'number',
		'settings' => 'medical_doctor_post_excerpt_number',
		'input_attrs' => array(
			'step'  => 1,
			'min'   => 0,
			'max'   => 50,
		),
		'active_callback' => 'medical_doctor_excerpt_enabled'
	) );

	$wp_customize->add_setting( 'medical_doctor_button_excerpt_suffix', array(
		'default'   => '...',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'medical_doctor_button_excerpt_suffix', array(
		'label'       => esc_html__( 'Post Excerpt Suffix','medical-doctor' ),
		'section'     => 'medical_doctor_theme_layout',
		'type'        => 'text',
		'settings'    => 'medical_doctor_button_excerpt_suffix',
		'active_callback' => 'medical_doctor_excerpt_enabled'
	) );

	$wp_customize->add_setting( 'medical_doctor_feature_image_border_radius', array(
		'default'=> '0',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( new Medical_Doctor_WP_Customize_Range_Control( $wp_customize, 'medical_doctor_feature_image_border_radius', array(
     	'label'  => __('Featured Image Border Radius','medical-doctor'),
     	'section'  => 'medical_doctor_theme_layout',
     	'description' => __('Measurement is in pixel.','medical-doctor'),
     	'input_attrs' => array(
         'min' => 0,
         'max' => 50,
     	),
 	)));

 	$wp_customize->add_setting( 'medical_doctor_feature_image_shadow', array(
		'default'=> '0',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( new Medical_Doctor_WP_Customize_Range_Control( $wp_customize, 'medical_doctor_feature_image_shadow', array(
		'label'  => __('Featured Image Shadow','medical-doctor'),
		'section'  => 'medical_doctor_theme_layout',
		'description' => __('Measurement is in pixel.','medical-doctor'),
		'input_attrs' => array(
		   'min' => 0,
		   'max' => 50,
		),
    )));

	$wp_customize->add_setting( 'medical_doctor_pagination_type', array(
		'default'			=> 'page-numbers',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control( 'medical_doctor_pagination_type', array(
		'section' => 'medical_doctor_theme_layout',
		'type' => 'select',
		'label' => __( 'Blog Pagination Style', 'medical-doctor' ),
		'choices' => array(
		   'page-numbers' => __('Number', 'medical-doctor' ),
	   	'next-prev' => __('Next/Prev', 'medical-doctor' ),
	)));

	$wp_customize->add_setting('medical_doctor_blog_nav_position',array(
		'default' => 'bottom',
		'sanitize_callback' => 'medical_doctor_sanitize_choices'
	));
	$wp_customize->add_control('medical_doctor_blog_nav_position', array(
		'type' => 'select',
		'label' => __( 'Blog Post Navigation Position', 'medical-doctor' ),
		'section' => 'medical_doctor_theme_layout',
		'choices' => array(
		   'top' => __('Top','medical-doctor'),
		   'bottom' => __('Bottom','medical-doctor'),
		   'both' => __('Both','medical-doctor')
		),
 	));

	$wp_customize->add_section( 'medical_doctor_single_post_settings', array(
		'title' => __( 'Single Post Options', 'medical-doctor' ),
		'panel' => 'medical_doctor_panel_id',
	));

	$wp_customize->add_setting('medical_doctor_single_post_breadcrumb',array(
		'default' => 'true',
		'sanitize_callback' => 'medical_doctor_sanitize_checkbox'
	));
	$wp_customize->add_control('medical_doctor_single_post_breadcrumb',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Single Post Breadcrumb','medical-doctor'),
		'section' => 'medical_doctor_single_post_settings'
	));

	$wp_customize->add_setting('medical_doctor_single_post_date',array(
		'default' => 'true',
		'sanitize_callback'	=> 'medical_doctor_sanitize_checkbox'
	));
	$wp_customize->add_control('medical_doctor_single_post_date',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Single Post Date','medical-doctor'),
		'section' => 'medical_doctor_single_post_settings'
	));

	$wp_customize->add_setting('medical_doctor_single_post_author',array(
		'default' => 'true',
		'sanitize_callback'	=> 'medical_doctor_sanitize_checkbox'
	));
	$wp_customize->add_control('medical_doctor_single_post_author',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Single Post Author','medical-doctor'),
		'section' => 'medical_doctor_single_post_settings'
	));

	$wp_customize->add_setting('medical_doctor_single_post_comment_no',array(
		'default' => 'true',
		'sanitize_callback'	=> 'medical_doctor_sanitize_checkbox'
	));
	$wp_customize->add_control('medical_doctor_single_post_comment_no',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Single Post Comment Number','medical-doctor'),
		'section' => 'medical_doctor_single_post_settings'
	));

	$wp_customize->add_setting('medical_doctor_metafields_tags',array(
		'default' => 'true',
		'sanitize_callback'	=> 'medical_doctor_sanitize_checkbox'
	));
	$wp_customize->add_control('medical_doctor_metafields_tags',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Single Post Tags','medical-doctor'),
		'section' => 'medical_doctor_single_post_settings'
	));

	$wp_customize->add_setting('medical_doctor_single_post_image',array(
		'default' => 'true',
		'sanitize_callback'	=> 'medical_doctor_sanitize_checkbox'
	));
	$wp_customize->add_control('medical_doctor_single_post_image',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Single Post Featured Image','medical-doctor'),
		'section' => 'medical_doctor_single_post_settings'
	));

	$wp_customize->add_setting( 'medical_doctor_post_featured_image', array(
		'default' => 'in-content',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control( 'medical_doctor_post_featured_image', array(
		'section' => 'medical_doctor_single_post_settings',
		'type' => 'radio',
		'label' => __( 'Featured Image Display Type', 'medical-doctor' ),
		'choices'		=> array(
		   'banner'  => __('as Banner Image', 'medical-doctor'),
		   'in-content' => __( 'as Featured Image', 'medical-doctor' ),
	)));

	$wp_customize->add_setting('medical_doctor_single_post_nav',array(
		'default' => 'true',
		'sanitize_callback'	=> 'medical_doctor_sanitize_checkbox'
	));
	$wp_customize->add_control('medical_doctor_single_post_nav',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Single Post Navigation','medical-doctor'),
		'section' => 'medical_doctor_single_post_settings'
	));

 	$wp_customize->add_setting( 'medical_doctor_single_post_prev_nav_text', array(
		'default' => __('Previous','medical-doctor' ),
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'medical_doctor_single_post_prev_nav_text', array(
		'label' => esc_html__( 'Single Post Previous Nav text','medical-doctor' ),
		'section'     => 'medical_doctor_single_post_settings',
		'type'        => 'text',
		'settings'    => 'medical_doctor_single_post_prev_nav_text'
	) );

	$wp_customize->add_setting( 'medical_doctor_single_post_next_nav_text', array(
		'default' => __('Next','medical-doctor' ),
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'medical_doctor_single_post_next_nav_text', array(
		'label' => esc_html__( 'Single Post Next Nav text','medical-doctor' ),
		'section'     => 'medical_doctor_single_post_settings',
		'type'        => 'text',
		'settings'    => 'medical_doctor_single_post_next_nav_text'
	) );

	$wp_customize->add_setting('medical_doctor_single_post_comment',array(
		'default' => 'true',
		'sanitize_callback'	=> 'medical_doctor_sanitize_checkbox'
	));
	$wp_customize->add_control('medical_doctor_single_post_comment',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Single Post comment','medical-doctor'),
		'section' => 'medical_doctor_single_post_settings'
	));

	$wp_customize->add_setting( 'medical_doctor_comment_width', array(
		'default'=> '100',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( new Medical_Doctor_WP_Customize_Range_Control( $wp_customize, 'medical_doctor_comment_width', array(
		'label'  => __('Comment textarea width','medical-doctor'),
		'section'  => 'medical_doctor_single_post_settings',
		'description' => __('Measurement is in %.','medical-doctor'),
		'input_attrs' => array(
		   'min' => 0,
		   'max' => 100,
		),
    )));

	$wp_customize->add_setting('medical_doctor_comment_title',array(
		'default' => __('Leave a Reply','medical-doctor' ),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('medical_doctor_comment_title',array(
		'type' => 'text',
		'label' => __('Comment form Title','medical-doctor'),
		'section' => 'medical_doctor_single_post_settings'
	));

	$wp_customize->add_setting('medical_doctor_comment_submit_text',array(
		'default' => __('Post Comment','medical-doctor' ),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('medical_doctor_comment_submit_text',array(
		'type' => 'text',
		'label' => __('Comment Submit Button Label','medical-doctor'),
		'section' => 'medical_doctor_single_post_settings'
	));

	$wp_customize->add_setting('medical_doctor_related_posts',array(
		'default' => true,
		'sanitize_callback'	=> 'medical_doctor_sanitize_checkbox'
	));
	$wp_customize->add_control('medical_doctor_related_posts',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Related Posts','medical-doctor'),
		'section' => 'medical_doctor_single_post_settings'
	));

	$wp_customize->add_setting('medical_doctor_related_posts_title',array(
		'default' => __('You May Also Like','medical-doctor' ),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('medical_doctor_related_posts_title',array(
		'type' => 'text',
		'label' => __('Related Posts Title','medical-doctor'),
		'section' => 'medical_doctor_single_post_settings'
	));

 	$wp_customize->add_setting( 'medical_doctor_related_post_count', array(
		'default' => 3,
		'sanitize_callback'	=> 'medical_doctor_sanitize_float'
	) );
	$wp_customize->add_control( 'medical_doctor_related_post_count', array(
		'label' => esc_html__( 'Related Posts Count','medical-doctor' ),
		'section' => 'medical_doctor_single_post_settings',
		'type' => 'number',
		'settings' => 'medical_doctor_related_post_count',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 6,
		),
	) );

	$wp_customize->add_setting( 'medical_doctor_post_shown_by', array(
		'default' => 'categories',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control( 'medical_doctor_post_shown_by', array(
		'section' => 'medical_doctor_single_post_settings',
		'type' => 'radio',
		'label' => __( 'Related Posts must be shown:', 'medical-doctor' ),
		'choices'		=> array(
		   'categories'  => __('By Categories', 'medical-doctor'),
		   'tags' => __( 'By Tags', 'medical-doctor' ),
	)));

	// Button option
	$wp_customize->add_section( 'medical_doctor_button_options', array(
		'title' =>  __( 'Button Options', 'medical-doctor' ),
		'panel' => 'medical_doctor_panel_id',
	));

 	$wp_customize->add_setting( 'medical_doctor_blog_button_text', array(
		'default'   => __('Read Full','medical-doctor' ),
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'medical_doctor_blog_button_text', array(
		'label'       => esc_html__( 'Blog Post Button Label','medical-doctor' ),
		'section'     => 'medical_doctor_button_options',
		'type'        => 'text',
		'settings'    => 'medical_doctor_blog_button_text'
	) );

	$wp_customize->add_setting('medical_doctor_button_padding',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('medical_doctor_button_padding',array(
		'label'	=> esc_html__('Button Padding','medical-doctor'),
		'section'=> 'medical_doctor_button_options',
		'active_callback' => 'medical_doctor_button_enabled'
	));

	$wp_customize->add_setting('medical_doctor_top_button_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'medical_doctor_sanitize_float'
	));
	$wp_customize->add_control('medical_doctor_top_button_padding',array(
		'label'	=> __('Top','medical-doctor'),
		'input_attrs' => array(
         'step'             => 1,
			'min'              => 0,
			'max'              => 50,
     	),
		'section'=> 'medical_doctor_button_options',
		'type'=> 'number',
		'active_callback' => 'medical_doctor_button_enabled'
	));

	$wp_customize->add_setting('medical_doctor_bottom_button_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'medical_doctor_sanitize_float'
	));
	$wp_customize->add_control('medical_doctor_bottom_button_padding',array(
		'label'	=> __('Bottom','medical-doctor'),
		'input_attrs' => array(
         'step'             => 1,
			'min'              => 0,
			'max'              => 50,
     	),
		'section'=> 'medical_doctor_button_options',
		'type'=> 'number',
		'active_callback' => 'medical_doctor_button_enabled'
	));

	$wp_customize->add_setting('medical_doctor_left_button_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'medical_doctor_sanitize_float'
	));
	$wp_customize->add_control('medical_doctor_left_button_padding',array(
		'label'	=> __('Left','medical-doctor'),
		'input_attrs' => array(
      	'step'             => 1,
			'min'              => 0,
			'max'              => 50,
     	),
		'section'=> 'medical_doctor_button_options',
		'type'=> 'number',
		'active_callback' => 'medical_doctor_button_enabled'
	));

	$wp_customize->add_setting('medical_doctor_right_button_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'medical_doctor_sanitize_float'
	));
	$wp_customize->add_control('medical_doctor_right_button_padding',array(
		'label'	=> __('Right','medical-doctor'),
		'input_attrs' => array(
         'step'             => 1,
			'min'              => 0,
			'max'              => 50,
 	 	),
		'section'=> 'medical_doctor_button_options',
		'type'=> 'number',
		'active_callback' => 'medical_doctor_button_enabled'
	));

	$wp_customize->add_setting( 'medical_doctor_button_border_radius', array(
		'default'=> 0,
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( new Medical_Doctor_WP_Customize_Range_Control( $wp_customize, 'medical_doctor_button_border_radius', array(
      'label'  => __('Border Radius','medical-doctor'),
      'section'  => 'medical_doctor_button_options',
      'description' => __('Measurement is in pixel.','medical-doctor'),
      'input_attrs' => array(
          'min' => 0,
          'max' => 50,
      ),
		'active_callback' => 'medical_doctor_button_enabled'
 	)));

    //Sidebar setting
	$wp_customize->add_section( 'medical_doctor_sidebar_options', array(
    	'title'   => __( 'Sidebar options', 'medical-doctor'),
		'priority'   => null,
		'panel' => 'medical_doctor_panel_id'
	) );

	$wp_customize->add_setting('medical_doctor_single_page_layout',array(
		'default' => 'One Column',
		'sanitize_callback' => 'medical_doctor_sanitize_choices'
 	));
	$wp_customize->add_control('medical_doctor_single_page_layout', array(
		'type' => 'select',
		'label' => __( 'Single Page Layout', 'medical-doctor' ),
		'section' => 'medical_doctor_sidebar_options',
		'choices' => array(
		   'Left Sidebar' => __('Left Sidebar','medical-doctor'),
		   'Right Sidebar' => __('Right Sidebar','medical-doctor'),
		   'One Column' => __('One Column','medical-doctor')
		),
 	));

 	$wp_customize->add_setting('medical_doctor_single_post_layout',array(
		'default' => 'Right Sidebar',
		'sanitize_callback' => 'medical_doctor_sanitize_choices'
 	));
	$wp_customize->add_control('medical_doctor_single_post_layout', array(
		'type' => 'select',
		'label' => __( 'Single Post Layout', 'medical-doctor' ),
		'section' => 'medical_doctor_sidebar_options',
		'choices' => array(
		   'Left Sidebar' => __('Left Sidebar','medical-doctor'),
		   'Right Sidebar' => __('Right Sidebar','medical-doctor'),
		   'One Column' => __('One Column','medical-doctor')
		),
 	));

    //Advance Options
	$wp_customize->add_section( 'medical_doctor_advance_options', array(
    	'title' => __( 'Advance Options', 'medical-doctor' ),
		'priority'   => null,
		'panel' => 'medical_doctor_panel_id'
	) );

	$wp_customize->add_setting('medical_doctor_preloader',array(
		'default' => false,
		'sanitize_callback'	=> 'medical_doctor_sanitize_checkbox'
	));
	$wp_customize->add_control('medical_doctor_preloader',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Preloader','medical-doctor'),
		'section' => 'medical_doctor_advance_options'
	));

 	$wp_customize->add_setting( 'medical_doctor_preloader_color', array(
		'default' => '#333333',
		'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'medical_doctor_preloader_color', array(
  		'label' => __('Preloader Color', 'medical-doctor'),
		'section' => 'medical_doctor_advance_options',
		'settings' => 'medical_doctor_preloader_color',
  	)));

  	$wp_customize->add_setting( 'medical_doctor_preloader_bg_color', array(
		'default' => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'medical_doctor_preloader_bg_color', array(
  		'label' => __('Preloader Background Color', 'medical-doctor'),
		'section' => 'medical_doctor_advance_options',
		'settings' => 'medical_doctor_preloader_bg_color',
  	)));

  	$wp_customize->add_setting('medical_doctor_preloader_type',array(
		'default' => 'Square',
		'sanitize_callback' => 'medical_doctor_sanitize_choices'
	));
	$wp_customize->add_control('medical_doctor_preloader_type',array(
		'type' => 'radio',
		'label' => __('Preloader Type','medical-doctor'),
		'section' => 'medical_doctor_advance_options',
		'choices' => array(
		   'Square' => __('Square','medical-doctor'),
		   'Circle' => __('Circle','medical-doctor'),
		)
	) );

	$wp_customize->add_setting('medical_doctor_theme_layout_options',array(
		'default' => 'Default Theme',
		'sanitize_callback' => 'medical_doctor_sanitize_choices'
	));
	$wp_customize->add_control('medical_doctor_theme_layout_options',array(
		'type' => 'radio',
		'label' => __('Theme Layout','medical-doctor'),
		'section' => 'medical_doctor_advance_options',
		'choices' => array(
		   'Default Theme' => __('Default Theme','medical-doctor'),
		   'Container Theme' => __('Container Theme','medical-doctor'),
		   'Box Container Theme' => __('Box Container Theme','medical-doctor'),
		),
	) );

	//404 Page Option
	$wp_customize->add_section('medical_doctor_404_settings',array(
		'title'	=> __('404 Page & Search Result Settings','medical-doctor'),
		'priority'	=> null,
		'panel' => 'medical_doctor_panel_id',
	));

	$wp_customize->add_setting('medical_doctor_404_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('medical_doctor_404_title',array(
		'label'	=> __('404 Title','medical-doctor'),
		'section'	=> 'medical_doctor_404_settings',
		'type'		=> 'text'
	));	

	$wp_customize->add_setting('medical_doctor_404_button_label',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('medical_doctor_404_button_label',array(
		'label'	=> __('404 button Label','medical-doctor'),
		'section'	=> 'medical_doctor_404_settings',
		'type'		=> 'text'
	));	

	$wp_customize->add_setting('medical_doctor_search_result_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('medical_doctor_search_result_title',array(
		'label'	=> __('No Search Result Title','medical-doctor'),
		'section'	=> 'medical_doctor_404_settings',
		'type'		=> 'text'
	));	

	$wp_customize->add_setting('medical_doctor_search_result_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('medical_doctor_search_result_text',array(
		'label'	=> __('No Search Result Text','medical-doctor'),
		'section'	=> 'medical_doctor_404_settings',
		'type'		=> 'text'
	));	

	//Responsive Settings
	$wp_customize->add_section('medical_doctor_responsive_options',array(
		'title'	=> __('Responsive Options','medical-doctor'),
		'panel' => 'medical_doctor_panel_id'
	));

	$wp_customize->add_setting('medical_doctor_menu_open_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Medical_Doctor_Icon_Selector(
     	$wp_customize,'medical_doctor_menu_open_icon',array(
		'label'	=> __('Menu Open Icon','medical-doctor'),
		'section' => 'medical_doctor_responsive_options',
		'type'	  => 'icon',
	)));

	$wp_customize->add_setting('medical_doctor_mobile_menu_label',array(
		'default' => __('Menu','medical-doctor'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('medical_doctor_mobile_menu_label',array(
		'type' => 'text',
		'label' => __('Mobile Menu Label','medical-doctor'),
		'section' => 'medical_doctor_responsive_options'
	));

	$wp_customize->add_setting('medical_doctor_menu_close_icon',array(
		'default'	=> 'fas fa-times-circle',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Medical_Doctor_Icon_Selector(
     	$wp_customize,'medical_doctor_menu_close_icon',array(
		'label'	=> __('Menu Close Icon','medical-doctor'),
		'section' => 'medical_doctor_responsive_options',
		'type'	  => 'icon',
	)));

	$wp_customize->add_setting('medical_doctor_close_menu_label',array(
		'default' => __('Close Menu','medical-doctor'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('medical_doctor_close_menu_label',array(
		'type' => 'text',
		'label' => __('Close Menu Label','medical-doctor'),
		'section' => 'medical_doctor_responsive_options'
	));

	$wp_customize->add_setting('medical_doctor_hide_topbar_responsive',array(
		'default' => true,
		'sanitize_callback'	=> 'medical_doctor_sanitize_checkbox'
	));
	$wp_customize->add_control('medical_doctor_hide_topbar_responsive',array(
     	'type' => 'checkbox',
		'label' => __('Enable Top Header','medical-doctor'),
		'section' => 'medical_doctor_responsive_options',
	));

	//Woocommerce Options
	$wp_customize->add_section('medical_doctor_woocommerce',array(
		'title'	=> __('WooCommerce Options','medical-doctor'),
		'panel' => 'medical_doctor_panel_id',
	));

	$wp_customize->add_setting('medical_doctor_shop_page_sidebar',array(
		'default' => true,
		'sanitize_callback' => 'medical_doctor_sanitize_checkbox'
	));
	$wp_customize->add_control('medical_doctor_shop_page_sidebar',array(
		'type' => 'checkbox',
		'label' => __('Enable Shop Page Sidebar','medical-doctor'),
		'section' => 'medical_doctor_woocommerce'
	));

	$wp_customize->add_setting('medical_doctor_shop_page_navigation',array(
		'default' => true,
		'sanitize_callback' => 'medical_doctor_sanitize_checkbox'
	));
	$wp_customize->add_control('medical_doctor_shop_page_navigation',array(
		'type' => 'checkbox',
		'label' => __('Enable Shop Page Pagination','medical-doctor'),
		'section' => 'medical_doctor_woocommerce'
	));

	$wp_customize->add_setting('medical_doctor_single_product_sidebar',array(
		'default' => true,
		'sanitize_callback'	=> 'medical_doctor_sanitize_checkbox'
	));
	$wp_customize->add_control('medical_doctor_single_product_sidebar',array(
		'type' => 'checkbox',
		'label' => __('Enable Single Product Page Sidebar','medical-doctor'),
		'section' => 'medical_doctor_woocommerce'
	));

	$wp_customize->add_setting('medical_doctor_single_related_products',array(
		'default' => true,
		'sanitize_callback' => 'medical_doctor_sanitize_checkbox'
	));
	$wp_customize->add_control('medical_doctor_single_related_products',array(
		'type' => 'checkbox',
		'label' => __('Enable Related Products','medical-doctor'),
		'section' => 'medical_doctor_woocommerce'
	));

 	$wp_customize->add_setting('medical_doctor_products_per_page',array(
		'default'=> '9',
		'sanitize_callback'	=> 'medical_doctor_sanitize_float'
	));
	$wp_customize->add_control('medical_doctor_products_per_page',array(
		'label'	=> __('Products Per Page','medical-doctor'),
		'input_attrs' => array(
         'step'             => 1,
			'min'              => 0,
			'max'              => 50,
     	),
		'section'=> 'medical_doctor_woocommerce',
		'type'=> 'number',
	));

	$wp_customize->add_setting('medical_doctor_products_per_row',array(
		'default'=> '3',
		'sanitize_callback'	=> 'medical_doctor_sanitize_choices'
	));
	$wp_customize->add_control('medical_doctor_products_per_row',array(
		'label'	=> __('Products Per Row','medical-doctor'),
		'choices' => array(
         '2' => '2',
			'3' => '3',
			'4' => '4',
     	),
		'section'=> 'medical_doctor_woocommerce',
		'type'=> 'select',
	));

	$wp_customize->add_setting('medical_doctor_product_border',array(
		'default' => true,
		'sanitize_callback'	=> 'medical_doctor_sanitize_checkbox'
	));
	$wp_customize->add_control('medical_doctor_product_border',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide product border','medical-doctor'),
		'section' => 'medical_doctor_woocommerce',
	));

 	$wp_customize->add_setting('medical_doctor_product_padding',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('medical_doctor_product_padding',array(
		'label'	=> esc_html__('Product Padding','medical-doctor'),
		'section'=> 'medical_doctor_woocommerce',
	));

	$wp_customize->add_setting( 'medical_doctor_product_top_padding',array(
		'default' => 10,
		'sanitize_callback' => 'medical_doctor_sanitize_float'
	));
	$wp_customize->add_control('medical_doctor_product_top_padding', array(
		'label' => esc_html__( 'Top','medical-doctor' ),
		'type' => 'number',
		'section' => 'medical_doctor_woocommerce',
		'input_attrs' => array(
			'min' => -1,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting('medical_doctor_product_bottom_padding',array(
		'default' => 10,
		'sanitize_callback' => 'medical_doctor_sanitize_float'
	));
	$wp_customize->add_control('medical_doctor_product_bottom_padding', array(
		'label' => esc_html__( 'Bottom','medical-doctor' ),
		'type' => 'number',
		'section' => 'medical_doctor_woocommerce',
		'input_attrs' => array(
			'min' => -1,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting('medical_doctor_product_left_padding',array(
		'default' => 10,
		'sanitize_callback' => 'medical_doctor_sanitize_float'
	));
	$wp_customize->add_control('medical_doctor_product_left_padding', array(
		'label' => esc_html__( 'Left','medical-doctor' ),
		'type' => 'number',
		'section' => 'medical_doctor_woocommerce',
		'input_attrs' => array(
			'min' => -1,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'medical_doctor_product_right_padding',array(
		'default' => 10,
		'sanitize_callback' => 'medical_doctor_sanitize_float'
	));
	$wp_customize->add_control('medical_doctor_product_right_padding', array(
		'label' => esc_html__( 'Right','medical-doctor' ),
		'type' => 'number',
		'section' => 'medical_doctor_woocommerce',
		'input_attrs' => array(
			'min' => -1,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'medical_doctor_product_border_radius',array(
		'default' => '0',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control( new Medical_Doctor_WP_Customize_Range_Control( $wp_customize, 'medical_doctor_product_border_radius', array(
		'label'  => __('Product Border Radius','medical-doctor'),
		'section'  => 'medical_doctor_woocommerce',
		'description' => __('Measurement is in pixel.','medical-doctor'),
		'input_attrs' => array(
		   'min' => 0,
		   'max' => 50,
		)
    )));

	$wp_customize->add_setting('medical_doctor_product_button_padding',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('medical_doctor_product_button_padding',array(
		'label'	=> esc_html__('Product Button Padding','medical-doctor'),
		'section'=> 'medical_doctor_woocommerce',
	));

	$wp_customize->add_setting( 'medical_doctor_product_button_top_padding',array(
		'default' => 10,
		'sanitize_callback' => 'medical_doctor_sanitize_float'
	));
	$wp_customize->add_control('medical_doctor_product_button_top_padding', array(
		'label' => esc_html__( 'Top','medical-doctor' ),
		'type' => 'number',
		'section' => 'medical_doctor_woocommerce',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting('medical_doctor_product_button_bottom_padding',array(
		'default' => 10,
		'sanitize_callback' => 'medical_doctor_sanitize_float'
	));
	$wp_customize->add_control('medical_doctor_product_button_bottom_padding', array(
		'label' => esc_html__( 'Bottom','medical-doctor' ),
		'type' => 'number',
		'section' => 'medical_doctor_woocommerce',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting('medical_doctor_product_button_left_padding',array(
		'default' => 12,
		'sanitize_callback' => 'medical_doctor_sanitize_float'
	));
	$wp_customize->add_control('medical_doctor_product_button_left_padding', array(
		'label' => esc_html__( 'Left','medical-doctor' ),
		'type' => 'number',
		'section' => 'medical_doctor_woocommerce',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'medical_doctor_product_button_right_padding',array(
		'default' => 12,
		'sanitize_callback' => 'medical_doctor_sanitize_float'
	));
	$wp_customize->add_control('medical_doctor_product_button_right_padding', array(
		'label' => esc_html__( 'Right','medical-doctor' ),
		'type' => 'number',
		'section' => 'medical_doctor_woocommerce',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'medical_doctor_product_button_border_radius',array(
		'default' => '0',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control( new Medical_Doctor_WP_Customize_Range_Control( $wp_customize, 'medical_doctor_product_button_border_radius', array(
		'label'  => __('Product Button Border Radius','medical-doctor'),
		'section'  => 'medical_doctor_woocommerce',
		'description' => __('Measurement is in pixel.','medical-doctor'),
		'input_attrs' => array(
		   'min' => 0,
		   'max' => 50,
		)
 	)));

 	$wp_customize->add_setting('medical_doctor_product_sale_position',array(
     'default' => 'Right',
     'sanitize_callback' => 'medical_doctor_sanitize_choices'
	));
	$wp_customize->add_control('medical_doctor_product_sale_position',array(
		'type' => 'radio',
		'label' => __('Product Sale Position','medical-doctor'),
		'section' => 'medical_doctor_woocommerce',
		'choices' => array(
		   'Left' => __('Left','medical-doctor'),
		   'Right' => __('Right','medical-doctor'),
		),
	) );

	$wp_customize->add_setting( 'medical_doctor_product_sale_font_size',array(
		'default' => '13',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control( new Medical_Doctor_WP_Customize_Range_Control( $wp_customize, 'medical_doctor_product_sale_font_size', array(
		'label'  => __('Product Sale Font Size','medical-doctor'),
		'section'  => 'medical_doctor_woocommerce',
		'description' => __('Measurement is in pixel.','medical-doctor'),
		'input_attrs' => array(
		   'min' => 0,
		   'max' => 50,
		)
 	)));

 	$wp_customize->add_setting('medical_doctor_product_sale_padding',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('medical_doctor_product_sale_padding',array(
		'label'	=> esc_html__('Product Sale Padding','medical-doctor'),
		'section'=> 'medical_doctor_woocommerce',
	));

	$wp_customize->add_setting( 'medical_doctor_product_sale_top_padding',array(
		'default' => 0,
		'sanitize_callback' => 'medical_doctor_sanitize_float'
	));
	$wp_customize->add_control('medical_doctor_product_sale_top_padding', array(
		'label' => esc_html__( 'Top','medical-doctor' ),
		'type' => 'number',
		'section' => 'medical_doctor_woocommerce',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting('medical_doctor_product_sale_bottom_padding',array(
		'default' => 0,
		'sanitize_callback' => 'medical_doctor_sanitize_float'
	));
	$wp_customize->add_control('medical_doctor_product_sale_bottom_padding', array(
		'label' => esc_html__( 'Bottom','medical-doctor' ),
		'type' => 'number',
		'section' => 'medical_doctor_woocommerce',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting('medical_doctor_product_sale_left_padding',array(
		'default' => 0,
		'sanitize_callback' => 'medical_doctor_sanitize_float'
	));
	$wp_customize->add_control('medical_doctor_product_sale_left_padding', array(
		'label' => esc_html__( 'Left','medical-doctor' ),
		'type' => 'number',
		'section' => 'medical_doctor_woocommerce',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting('medical_doctor_product_sale_right_padding',array(
		'default' => 0,
		'sanitize_callback' => 'medical_doctor_sanitize_float'
	));
	$wp_customize->add_control('medical_doctor_product_sale_right_padding', array(
		'label' => esc_html__( 'Right','medical-doctor' ),
		'type' => 'number',
		'section' => 'medical_doctor_woocommerce',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'medical_doctor_product_sale_border_radius',array(
		'default' => '10',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control( new Medical_Doctor_WP_Customize_Range_Control( $wp_customize, 'medical_doctor_product_sale_border_radius', array(
		'label'  => __('Product Sale Border Radius','medical-doctor'),
		'section'  => 'medical_doctor_woocommerce',
		'description' => __('Measurement is in pixel.','medical-doctor'),
		'input_attrs' => array(
		   'min' => 0,
		   'max' => 50,
		)
    )));

	//footer text
	$wp_customize->add_section('medical_doctor_footer_section',array(
		'title'	=> __('Footer Section','medical-doctor'),
		'panel' => 'medical_doctor_panel_id'
	));

	$wp_customize->add_setting('medical_doctor_hide_scroll',array(
		'default' => 'true',
		'sanitize_callback'	=> 'medical_doctor_sanitize_checkbox'
	));
	$wp_customize->add_control('medical_doctor_hide_scroll',array(
     	'type' => 'checkbox',
   	'label' => __('Show / Hide Back To Top','medical-doctor'),
   	'section' => 'medical_doctor_footer_section',
	));

	$wp_customize->add_setting('medical_doctor_back_to_top',array(
		'default' => 'Right',
		'sanitize_callback' => 'medical_doctor_sanitize_choices'
	));
	$wp_customize->add_control('medical_doctor_back_to_top',array(
		'type' => 'radio',
		'label' => __('Back to Top Alignment','medical-doctor'),
		'section' => 'medical_doctor_footer_section',
		'choices' => array(
		   'Left' => __('Left','medical-doctor'),
		   'Right' => __('Right','medical-doctor'),
		   'Center' => __('Center','medical-doctor'),
		),
	) );

	$wp_customize->add_setting('medical_doctor_footer_bg_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'medical_doctor_footer_bg_color', array(
		'label'    => __('Footer Background Color', 'medical-doctor'),
		'section'  => 'medical_doctor_footer_section',
	)));

	$wp_customize->add_setting('medical_doctor_footer_bg_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'medical_doctor_footer_bg_image',array(
		'label' => __('Footer Background Image','medical-doctor'),
		'section' => 'medical_doctor_footer_section'
	)));

	$wp_customize->add_setting('medical_doctor_footer_widget',array(
		'default'           => '4',
		'sanitize_callback' => 'medical_doctor_sanitize_choices',
	));
	$wp_customize->add_control('medical_doctor_footer_widget',array(
		'type'        => 'radio',
		'label'       => __('No. of Footer columns', 'medical-doctor'),
		'section'     => 'medical_doctor_footer_section',
		'description' => __('Select the number of footer columns and add your widgets in the footer.', 'medical-doctor'),
		'choices' => array(
		   '1'   => __('One column', 'medical-doctor'),
		   '2'  => __('Two columns', 'medical-doctor'),
		   '3' => __('Three columns', 'medical-doctor'),
		   '4' => __('Four columns', 'medical-doctor')
		),
	)); 

 	$wp_customize->add_setting('medical_doctor_copyright_padding',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('medical_doctor_copyright_padding',array(
		'label'	=> esc_html__('Copyright Padding','medical-doctor'),
		'section'=> 'medical_doctor_footer_section',
	));

    $wp_customize->add_setting('medical_doctor_top_copyright_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'medical_doctor_sanitize_float'
	));
	$wp_customize->add_control('medical_doctor_top_copyright_padding',array(
		'description'	=> __('Top','medical-doctor'),
		'input_attrs' => array(
         'step' => 1,
			'min' => 0,
			'max' => 50,
     	),
		'section'=> 'medical_doctor_footer_section',
		'type'=> 'number'
	));

	$wp_customize->add_setting('medical_doctor_bottom_copyright_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'medical_doctor_sanitize_float'
	));
	$wp_customize->add_control('medical_doctor_bottom_copyright_padding',array(
		'description'	=> __('Bottom','medical-doctor'),
		'input_attrs' => array(
         'step' => 1,
			'min' => 0,
			'max' => 50,
     	),
		'section'=> 'medical_doctor_footer_section',
		'type'=> 'number'
	));

	$wp_customize->add_setting('medical_doctor_copyright_alignment',array(
		'default' => 'center',
		'sanitize_callback' => 'medical_doctor_sanitize_choices'
	));
	$wp_customize->add_control('medical_doctor_copyright_alignment',array(
		'type' => 'radio',
		'label' => __('Copyright Alignment','medical-doctor'),
		'section' => 'medical_doctor_footer_section',
		'choices' => array(
		   'left' => __('Left','medical-doctor'),
		   'right' => __('Right','medical-doctor'),
		   'center' => __('Center','medical-doctor'),
		),
	) );

	$wp_customize->add_setting( 'medical_doctor_copyright_font_size', array(
		'default'=> '15',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( new Medical_Doctor_WP_Customize_Range_Control( $wp_customize, 'medical_doctor_copyright_font_size', array(
		'label'  => __('Copyright Font Size','medical-doctor'),
		'section'  => 'medical_doctor_footer_section',
		'description' => __('Measurement is in pixel.','medical-doctor'),
		'input_attrs' => array(
		   'min' => 0,
		   'max' => 50,
		)
 	)));
	
	$wp_customize->add_setting('medical_doctor_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('medical_doctor_text',array(
		'label'	=> __('Copyright Text','medical-doctor'),
		'description'	=> __('Add some text for footer like copyright etc.','medical-doctor'),
		'section'	=> 'medical_doctor_footer_section',
		'type'		=> 'text'
	));	
}
add_action( 'customize_register', 'medical_doctor_customize_register' );	

load_template( ABSPATH . 'wp-includes/class-wp-customize-control.php' );

// logo resize
load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

class Medical_Doctor_Image_Radio_Control extends WP_Customize_Control {

    public function render_content() {
 
        if (empty($this->choices))
            return;
 
        $name = '_customize-radio-' . $this->id;
        ?>
        <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
        <ul class="controls" id='medical-doctor-img-container'>
            <?php
            foreach ($this->choices as $value => $label) :
                $class = ($this->value() == $value) ? 'medical-doctor-radio-img-selected medical-doctor-radio-img-img' : 'medical-doctor-radio-img-img';
                ?>
                <li style="display: inline;">
                    <label>
                        <input <?php $this->link(); ?>style = 'display:none' type="radio" value="<?php echo esc_attr($value); ?>" name="<?php echo esc_attr($name); ?>" <?php
                          	$this->link();
                          	checked($this->value(), $value);
                          	?> />
                        <img role="img" src='<?php echo esc_url($label); ?>' class='<?php echo esc_attr($class); ?>' />
                    </label>
                </li>
                <?php
            endforeach;
            ?>
        </ul>
        <?php
    } 
}

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Medical_Doctor_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Medical_Doctor_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Medical_Doctor_Customize_Section_Pro(
			$manager,
			'medical_doctor_pro_link',
				array(
					'priority'   => 9,
					'title'    => esc_html__( 'Doctor Pro', 'medical-doctor' ),
					'pro_text' => esc_html__( 'Go Pro', 'medical-doctor' ),
					'pro_url'  => esc_url('https://www.themesglance.com/themes/medical-doctor-wordpress-theme/')
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'medical-doctor-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'medical-doctor-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Medical_Doctor_Customize::get_instance();