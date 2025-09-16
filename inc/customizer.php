<?php
/**
 * FitPro Theme Customizer
 *
 * @package FitPro
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function fitpro_customize_register( $wp_customize ) {
	// Default settings transport
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	// Selective refresh for site title and description
	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'fitpro_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'fitpro_customize_partial_blogdescription',
			)
		);
	}

    // --- FitPro Theme Options Panel ---
    $wp_customize->add_panel( 'fitpro_theme_options', array(
        'title'       => __( 'FitPro Theme Options', 'fitpro' ),
        'priority'    => 160,
        'capability'  => 'edit_theme_options',
    ) );

    // --- Color Section ---
    $wp_customize->add_section( 'fitpro_colors_section', array(
        'title'       => __( 'Theme Colors', 'fitpro' ),
        'panel'       => 'fitpro_theme_options',
        'priority'    => 10,
    ) );

    // Accent Color Setting
    $wp_customize->add_setting( 'fitpro_accent_color', array(
        'default'     => '#00ff7f', // Vibrant Green
        'transport'   => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'fitpro_accent_color', array(
        'label'       => __( 'Accent Color', 'fitpro' ),
        'description' => __( 'Set the primary accent color for buttons and links.', 'fitpro' ),
        'section'     => 'fitpro_colors_section',
    ) ) );

    // --- Typography Section ---
    $wp_customize->add_section( 'fitpro_typography_section' , array(
        'title'      => __( 'Typography', 'fitpro' ),
        'panel'      => 'fitpro_theme_options',
        'priority'   => 20,
    ) );

    // Heading Font Setting
    $wp_customize->add_setting( 'fitpro_heading_font', array(
        'default'   => 'Poppins',
        'transport' => 'refresh',
        'sanitize_callback' => 'fitpro_sanitize_font_choice',
    ) );

    $wp_customize->add_control( 'fitpro_heading_font', array(
        'label'    => __( 'Heading Font', 'fitpro' ),
        'section'  => 'fitpro_typography_section',
        'type'     => 'select',
        'choices'  => array(
            'Poppins'     => 'Poppins',
            'Montserrat'  => 'Montserrat',
            'Roboto Slab' => 'Roboto Slab',
            'Oswald'      => 'Oswald',
        ),
    ) );

    // --- Footer Section ---
    $wp_customize->add_section( 'fitpro_footer_section' , array(
        'title'      => __( 'Footer Settings', 'fitpro' ),
        'panel'      => 'fitpro_theme_options',
        'priority'   => 30,
    ) );

    // Footer Copyright Text Setting
    $wp_customize->add_setting( 'fitpro_footer_copyright_text', array(
        'default'   => get_bloginfo( 'name' ) . '. All Rights Reserved.',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'fitpro_footer_copyright_text', array(
        'label'    => __( 'Footer Copyright Text', 'fitpro' ),
        'section'  => 'fitpro_footer_section',
        'type'     => 'textarea',
    ) );

    // Add selective refresh for footer text
    $wp_customize->selective_refresh->add_partial( 'fitpro_footer_copyright_text', array(
        'selector' => '.site-info .copyright-text',
        'render_callback' => 'fitpro_customize_partial_footer_copyright_text',
    ) );

    // =================================================================
    // Homepage Sections Panel
    // =================================================================
    $wp_customize->add_panel( 'fitpro_homepage_panel', array(
        'title'       => __( 'Homepage Sections', 'fitpro' ),
        'priority'    => 170,
        'capability'  => 'edit_theme_options',
    ) );

    // --- Hero Section ---
    $wp_customize->add_section( 'fitpro_hero_section' , array(
        'title' => __( 'Hero Section', 'fitpro' ),
        'panel' => 'fitpro_homepage_panel',
        'priority' => 10
    ));
    $wp_customize->add_setting( 'fitpro_hero_order', array('default' => 10, 'sanitize_callback' => 'absint'));
    $wp_customize->add_control( 'fitpro_hero_order', array('label' => 'Display Order', 'section' => 'fitpro_hero_section', 'type' => 'number'));
    $wp_customize->add_setting( 'fitpro_hero_headline', array('default' => 'Transform Your Body, Transform Your Life', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control( 'fitpro_hero_headline', array('label' => 'Headline', 'section' => 'fitpro_hero_section', 'type' => 'text'));
    $wp_customize->add_setting( 'fitpro_hero_subheadline', array('default' => 'Stop guessing. Start seeing results. Get a personalized fitness and nutrition plan from our world-class coaches.', 'sanitize_callback' => 'wp_kses_post'));
    $wp_customize->add_control( 'fitpro_hero_subheadline', array('label' => 'Sub-headline', 'section' => 'fitpro_hero_section', 'type' => 'textarea'));
    $wp_customize->add_setting( 'fitpro_hero_button_text', array('default' => 'Get Your Free Consultation', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control( 'fitpro_hero_button_text', array('label' => 'Button Text', 'section' => 'fitpro_hero_section', 'type' => 'text'));
    $wp_customize->add_setting( 'fitpro_hero_button_url', array('default' => '#contact', 'sanitize_callback' => 'esc_url_raw'));
    $wp_customize->add_control( 'fitpro_hero_button_url', array('label' => 'Button URL', 'section' => 'fitpro_hero_section', 'type' => 'url'));

    // Hero Background Image
    $wp_customize->add_setting( 'fitpro_hero_background_image' );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'fitpro_hero_background_image', array(
        'label'    => __( 'Background Image', 'fitpro' ),
        'section'  => 'fitpro_hero_section',
        'settings' => 'fitpro_hero_background_image',
    ) ) );

    // Second Button
    $wp_customize->add_setting( 'fitpro_hero_button2_text', array('default' => 'Learn More', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control( 'fitpro_hero_button2_text', array('label' => 'Second Button Text', 'section' => 'fitpro_hero_section', 'type' => 'text'));
    $wp_customize->add_setting( 'fitpro_hero_button2_url', array('default' => '', 'sanitize_callback' => 'esc_url_raw'));
    $wp_customize->add_control( 'fitpro_hero_button2_url', array('label' => 'Second Button URL', 'section' => 'fitpro_hero_section', 'type' => 'url'));


    // --- Services Preview Section ---
    $wp_customize->add_section( 'fitpro_services_preview_section' , array(
        'title' => __( 'Services Preview Section', 'fitpro' ),
        'panel' => 'fitpro_homepage_panel',
        'priority' => 20
    ));
    $wp_customize->add_setting( 'fitpro_services_preview_order', array('default' => 20, 'sanitize_callback' => 'absint'));
    $wp_customize->add_control( 'fitpro_services_preview_order', array('label' => 'Display Order', 'section' => 'fitpro_services_preview_section', 'type' => 'number'));
    $wp_customize->add_setting( 'fitpro_services_headline', array('default' => 'Our Core Programs', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control( 'fitpro_services_headline', array('label' => 'Section Headline', 'section' => 'fitpro_services_preview_section', 'type' => 'text'));
    $wp_customize->add_setting( 'fitpro_services_subheadline', array('default' => 'Designed to deliver results, no matter your starting point.', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control( 'fitpro_services_subheadline', array('label' => 'Section Sub-headline', 'section' => 'fitpro_services_preview_section', 'type' => 'text'));
    // Note: The services shown here are the 3 most recent from the "Services" CPT.

    // --- Testimonials Section ---
    $wp_customize->add_section( 'fitpro_testimonials_section' , array(
        'title' => __( 'Testimonials Section', 'fitpro' ),
        'panel' => 'fitpro_homepage_panel',
        'priority' => 30
    ));
    $wp_customize->add_setting( 'fitpro_testimonials_order', array('default' => 30, 'sanitize_callback' => 'absint'));
    $wp_customize->add_control( 'fitpro_testimonials_order', array('label' => 'Display Order', 'section' => 'fitpro_testimonials_section', 'type' => 'number'));
    $wp_customize->add_setting( 'fitpro_testimonials_headline', array('default' => 'What Our Clients Say', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control( 'fitpro_testimonials_headline', array('label' => 'Section Headline', 'section' => 'fitpro_testimonials_section', 'type' => 'text'));
    $wp_customize->add_setting( 'fitpro_testimonials_subheadline', array('default' => 'Real people, real results.', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control( 'fitpro_testimonials_subheadline', array('label' => 'Section Sub-headline', 'section' => 'fitpro_testimonials_section', 'type' => 'text'));
    // Testimonial 1
    $wp_customize->add_setting( 'fitpro_testimonial1_text', array('default' => '"I\'ve tried countless programs, but nothing stuck. The personalized approach here was a game-changer. I\'m down 30 pounds and have more energy than ever. I didn\'t just get a plan; I got a new lifestyle."', 'sanitize_callback' => 'wp_kses_post'));
    $wp_customize->add_control( 'fitpro_testimonial1_text', array('label' => 'Testimonial 1 Text', 'section' => 'fitpro_testimonials_section', 'type' => 'textarea'));
    $wp_customize->add_setting( 'fitpro_testimonial1_author', array('default' => '- Sarah L.', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control( 'fitpro_testimonial1_author', array('label' => 'Testimonial 1 Author', 'section' => 'fitpro_testimonials_section', 'type' => 'text'));
    // Testimonial 2
    $wp_customize->add_setting( 'fitpro_testimonial2_text', array('default' => '"As someone who was new to the gym, I was intimidated. My coach was incredibly supportive and taught me proper form and technique. After just 3 months, I feel stronger, healthier, and more confident in my own skin."', 'sanitize_callback' => 'wp_kses_post'));
    $wp_customize->add_control( 'fitpro_testimonial2_text', array('label' => 'Testimonial 2 Text', 'section' => 'fitpro_testimonials_section', 'type' => 'textarea'));
    $wp_customize->add_setting( 'fitpro_testimonial2_author', array('default' => '- Mark T.', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control( 'fitpro_testimonial2_author', array('label' => 'Testimonial 2 Author', 'section' => 'fitpro_testimonials_section', 'type' => 'text'));

    // --- Blog Section ---
    $wp_customize->add_section( 'fitpro_blog_section' , array(
        'title' => __( 'Blog Section', 'fitpro' ),
        'panel' => 'fitpro_homepage_panel',
        'priority' => 40
    ));
    $wp_customize->add_setting( 'fitpro_blog_order', array('default' => 40, 'sanitize_callback' => 'absint'));
    $wp_customize->add_control( 'fitpro_blog_order', array('label' => 'Display Order', 'section' => 'fitpro_blog_section', 'type' => 'number'));
    $wp_customize->add_setting( 'fitpro_blog_headline', array('default' => 'Latest From The Blog', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control( 'fitpro_blog_headline', array('label' => 'Section Headline', 'section' => 'fitpro_blog_section', 'type' => 'text'));
    $wp_customize->add_setting( 'fitpro_blog_subheadline', array('default' => 'Actionable tips to help you on your fitness journey.', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control( 'fitpro_blog_subheadline', array('label' => 'Section Sub-headline', 'section' => 'fitpro_blog_section', 'type' => 'text'));

    // --- CTA Section ---
    $wp_customize->add_section( 'fitpro_cta_section' , array(
        'title' => __( 'CTA Section', 'fitpro' ),
        'panel' => 'fitpro_homepage_panel',
        'priority' => 50
    ));
    $wp_customize->add_setting( 'fitpro_cta_order', array('default' => 50, 'sanitize_callback' => 'absint'));
    $wp_customize->add_control( 'fitpro_cta_order', array('label' => 'Display Order', 'section' => 'fitpro_cta_section', 'type' => 'number'));
    $wp_customize->add_setting( 'fitpro_cta_headline', array('default' => 'Ready to Start Your Transformation?', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control( 'fitpro_cta_headline', array('label' => 'Headline', 'section' => 'fitpro_cta_section', 'type' => 'text'));
    $wp_customize->add_setting( 'fitpro_cta_subheadline', array('default' => 'Your first step is a conversation with us. Fill out the form below for a free, no-obligation consultation to see if we\'re the right fit for you.', 'sanitize_callback' => 'wp_kses_post'));
    $wp_customize->add_control( 'fitpro_cta_subheadline', array('label' => 'Sub-headline', 'section' => 'fitpro_cta_section', 'type' => 'textarea'));
}
add_action( 'customize_register', 'fitpro_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 */
function fitpro_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 */
function fitpro_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Render the footer copyright text for the selective refresh partial.
 */
function fitpro_customize_partial_footer_copyright_text() {
    $copyright_text = get_theme_mod( 'fitpro_footer_copyright_text', get_bloginfo( 'name' ) . '. All Rights Reserved.' );
    echo '&copy; ' . date_i18n( 'Y' ) . ' ' . esc_html( $copyright_text );
}

/**
 * Sanitize font choice.
 */
function fitpro_sanitize_font_choice( $input ) {
    $valid_fonts = array( 'Poppins', 'Montserrat', 'Roboto Slab', 'Oswald' );
    if ( in_array( $input, $valid_fonts, true ) ) {
        return $input;
    }
    return 'Poppins';
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function fitpro_customize_preview_js() {
	wp_enqueue_script( 'fitpro-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '1.0', true );
}
add_action( 'customize_preview_init', 'fitpro_customize_preview_js' );

/**
 * Generates and outputs the custom CSS for the theme.
 */
function fitpro_custom_css() {
    $accent_color = get_theme_mod( 'fitpro_accent_color', '#00ff7f' );
    $heading_font = get_theme_mod( 'fitpro_heading_font', 'Poppins' );

    $css = '';
    $style_block_needed = false;

    if ( $accent_color !== '#00ff7f' ) {
        $css .= '--color-accent: ' . esc_attr( $accent_color ) . ';';
        $style_block_needed = true;
    }

    if ( $heading_font !== 'Poppins' ) {
        $css .= '--font-heading: "' . esc_attr( $heading_font ) . '", sans-serif;';
        $style_block_needed = true;
    }

    if ( $style_block_needed ) {
        echo '<style type="text/css">:root {' . wp_strip_all_tags( $css ) . '}</style>';
    }
}
add_action( 'wp_head', 'fitpro_custom_css' );
