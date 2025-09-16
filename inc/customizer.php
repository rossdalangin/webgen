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
    // About Page Settings
    // =================================================================
    $wp_customize->add_section( 'fitpro_about_page_section' , array(
        'title'      => __( 'About Page Content', 'fitpro' ),
        'panel'      => 'fitpro_theme_options',
        'priority'   => 40,
    ) );

    // Mission Headline
    $wp_customize->add_setting( 'fitpro_about_mission_headline', array('default' => 'Our Mission: Your Peak Performance', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control( 'fitpro_about_mission_headline', array('label' => 'Mission Headline', 'section' => 'fitpro_about_page_section', 'type' => 'text'));

    // Mission Text
    $wp_customize->add_setting( 'fitpro_about_mission_text', array('default' => 'We believe that fitness is not just about looking good—it\'s about feeling unstoppable...', 'sanitize_callback' => 'wp_kses_post'));
    $wp_customize->add_control( 'fitpro_about_mission_text', array('label' => 'Mission Text', 'section' => 'fitpro_about_page_section', 'type' => 'textarea'));

    // Story Headline
    $wp_customize->add_setting( 'fitpro_about_story_headline', array('default' => 'The FitPro Story', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control( 'fitpro_about_story_headline', array('label' => 'Story Headline', 'section' => 'fitpro_about_page_section', 'type' => 'text'));

    // Story Text
    $wp_customize->add_setting( 'fitpro_about_story_text', array('default' => 'Founded by certified coach Alex Jordan...', 'sanitize_callback' => 'wp_kses_post'));
    $wp_customize->add_control( 'fitpro_about_story_text', array('label' => 'Story Text', 'section' => 'fitpro_about_page_section', 'type' => 'textarea'));

    // Team Headline
    $wp_customize->add_setting( 'fitpro_about_team_headline', array('default' => 'Meet the Team', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control( 'fitpro_about_team_headline', array('label' => 'Team Headline', 'section' => 'fitpro_about_page_section', 'type' => 'text'));

    // Team Member 1 Name
    $wp_customize->add_setting( 'fitpro_about_team1_name', array('default' => 'Alex Jordan - Founder & Head Coach', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control( 'fitpro_about_team1_name', array('label' => 'Team Member 1 Name', 'section' => 'fitpro_about_page_section', 'type' => 'text'));
    // Team Member 1 Bio
    $wp_customize->add_setting( 'fitpro_about_team1_bio', array('default' => 'With over 10 years of experience...', 'sanitize_callback' => 'wp_kses_post'));
    $wp_customize->add_control( 'fitpro_about_team1_bio', array('label' => 'Team Member 1 Bio', 'section' => 'fitpro_about_page_section', 'type' => 'textarea'));

    // Team Member 2 Name
    $wp_customize->add_setting( 'fitpro_about_team2_name', array('default' => 'Jenna Davis - Nutrition Specialist', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control( 'fitpro_about_team2_name', array('label' => 'Team Member 2 Name', 'section' => 'fitpro_about_page_section', 'type' => 'text'));
    // Team Member 2 Bio
    $wp_customize->add_setting( 'fitpro_about_team2_bio', array('default' => 'Jenna is a registered dietitian...', 'sanitize_callback' => 'wp_kses_post'));
    $wp_customize->add_control( 'fitpro_about_team2_bio', array('label' => 'Team Member 2 Bio', 'section' => 'fitpro_about_page_section', 'type' => 'textarea'));


    // =================================================================
    // Services Page Settings
    // =================================================================
    $wp_customize->add_section( 'fitpro_services_page_section' , array(
        'title'      => __( 'Services Page Content', 'fitpro' ),
        'panel'      => 'fitpro_theme_options',
        'priority'   => 50,
    ) );

    // Service 1 Title
    $wp_customize->add_setting( 'fitpro_service1_title', array('default' => '1-on-1 Personal Training', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control( 'fitpro_service1_title', array('label' => 'Service 1 Title', 'section' => 'fitpro_services_page_section', 'type' => 'text'));
    // Service 1 Description
    $wp_customize->add_setting( 'fitpro_service1_desc', array('default' => 'Our flagship program is designed for maximum results...', 'sanitize_callback' => 'wp_kses_post'));
    $wp_customize->add_control( 'fitpro_service1_desc', array('label' => 'Service 1 Description', 'section' => 'fitpro_services_page_section', 'type' => 'textarea'));
    // Service 1 Features
    $wp_customize->add_setting( 'fitpro_service1_features', array('default' => "Fully customized weekly workout schedule\nIn-person or live video sessions\nContinuous progress tracking and adjustments", 'sanitize_callback' => 'wp_kses_post'));
    $wp_customize->add_control( 'fitpro_service1_features', array('label' => 'Service 1 Features (1 per line)', 'section' => 'fitpro_services_page_section', 'type' => 'textarea'));
    // Service 1 Price
    $wp_customize->add_setting( 'fitpro_service1_price', array('default' => 'Starting at $300/month', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control( 'fitpro_service1_price', array('label' => 'Service 1 Price', 'section' => 'fitpro_services_page_section', 'type' => 'text'));

    // Service 2 Title
    $wp_customize->add_setting( 'fitpro_service2_title', array('default' => 'Custom Nutrition Planning', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control( 'fitpro_service2_title', array('label' => 'Service 2 Title', 'section' => 'fitpro_services_page_section', 'type' => 'text'));
    // Service 2 Description
    $wp_customize->add_setting( 'fitpro_service2_desc', array('default' => 'Proper nutrition is the cornerstone...', 'sanitize_callback' => 'wp_kses_post'));
    $wp_customize->add_control( 'fitpro_service2_desc', array('label' => 'Service 2 Description', 'section' => 'fitpro_services_page_section', 'type' => 'textarea'));
    // Service 2 Features
    $wp_customize->add_setting( 'fitpro_service2_features', array('default' => "Comprehensive metabolic and lifestyle assessment\nCustomized meal plans and recipes\nWeekly check-ins and plan adjustments", 'sanitize_callback' => 'wp_kses_post'));
    $wp_customize->add_control( 'fitpro_service2_features', array('label' => 'Service 2 Features (1 per line)', 'section' => 'fitpro_services_page_section', 'type' => 'textarea'));
    // Service 2 Price
    $wp_customize->add_setting( 'fitpro_service2_price', array('default' => 'Starting at $150/month', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control( 'fitpro_service2_price', array('label' => 'Service 2 Price', 'section' => 'fitpro_services_page_section', 'type' => 'text'));

    // Service 3 Title
    $wp_customize->add_setting( 'fitpro_service3_title', array('default' => 'Online Fitness Coaching', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control( 'fitpro_service3_title', array('label' => 'Service 3 Title', 'section' => 'fitpro_services_page_section', 'type' => 'text'));
    // Service 3 Description
    $wp_customize->add_setting( 'fitpro_service3_desc', array('default' => 'Get the expertise of a world-class coach...', 'sanitize_callback' => 'wp_kses_post'));
    $wp_customize->add_control( 'fitpro_service3_desc', array('label' => 'Service 3 Description', 'section' => 'fitpro_services_page_section', 'type' => 'textarea'));
    // Service 3 Features
    $wp_customize->add_setting( 'fitpro_service3_features', array('default' => "Personalized training program delivered via our app\nVideo demonstrations for all exercises\nWeekly email check-ins and feedback", 'sanitize_callback' => 'wp_kses_post'));
    $wp_customize->add_control( 'fitpro_service3_features', array('label' => 'Service 3 Features (1 per line)', 'section' => 'fitpro_services_page_section', 'type' => 'textarea'));
    // Service 3 Price
    $wp_customize->add_setting( 'fitpro_service3_price', array('default' => 'Starting at $100/month', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control( 'fitpro_service3_price', array('label' => 'Service 3 Price', 'section' => 'fitpro_services_page_section', 'type' => 'text'));

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
