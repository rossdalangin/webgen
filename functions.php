<?php
/**
 * FitPro functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package FitPro
 */

if ( ! function_exists( 'fitpro_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function fitpro_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 */
		load_theme_textdomain( 'fitpro', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'fitpro' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'fitpro_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'fitpro_setup' );

/**
 * Enqueue scripts and styles.
 */
function fitpro_scripts() {
	// Enqueue Google Fonts
	$heading_font = get_theme_mod( 'fitpro_heading_font', 'Poppins' );
	$font_families = array(
		'Lato:wght@400;700',
		$heading_font . ':wght@700',
	);
	$fonts_url = 'https://fonts.googleapis.com/css2?family=' . implode( '&family=', array_map( 'urlencode', $font_families ) ) . '&display=swap';
	wp_enqueue_style( 'fitpro-fonts', $fonts_url, array(), null );

	// Enqueue the main stylesheet, which contains theme information.
	wp_enqueue_style( 'fitpro-style', get_stylesheet_uri(), array(), '1.0' );

	// Enqueue the primary stylesheet for theme styling.
	wp_enqueue_style( 'fitpro-main-style', get_template_directory_uri() . '/assets/css/main.css', array('fitpro-style'), '1.0' );

	// Enqueue the main JavaScript file.
	// The last parameter `true` loads the script in the footer.
	wp_enqueue_script( 'fitpro-main-js', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'fitpro_scripts' );

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Custom Post Type definitions.
 */
require get_template_directory() . '/inc/post-types.php';

/**
 * Adds SEO features like meta descriptions and schema markup.
 */
function fitpro_seo_features() {
	// Meta Description
	$description = '';
	if ( is_front_page() || is_home() ) {
		$description = get_bloginfo( 'description', 'display' );
	} elseif ( is_singular() ) {
		$post = get_queried_object();
		if ( ! empty( $post->post_excerpt ) ) {
			$description = wp_strip_all_tags( $post->post_excerpt, true );
		} else {
			$description = wp_trim_words( wp_strip_all_tags( $post->post_content ), 55, '...' );
		}
	}

	if ( ! empty( $description ) ) {
		echo '<meta name="description" content="' . esc_attr( $description ) . '">' . "\n";
	}

	// Schema.org Markup
	$schema = array(
		'@context'  => 'https://schema.org',
	);

	if ( is_singular( 'post' ) ) {
		$post = get_queried_object();
		$schema['@type'] = 'Article';
		$schema['headline'] = get_the_title();
		$schema['author'] = array(
			'@type' => 'Person',
			'name'  => get_the_author(),
		);
		$schema['datePublished'] = get_the_date( 'c' );
		$schema['dateModified'] = get_the_modified_date( 'c' );
		if ( has_post_thumbnail() ) {
			$schema['image'] = get_the_post_thumbnail_url( $post->ID, 'full' );
		}
	} else {
		$schema['@type'] = 'WebSite';
		$schema['name'] = get_bloginfo( 'name' );
		$schema['url'] = home_url();
	}

	echo '<script type="application/ld+json">' . wp_json_encode( $schema ) . '</script>' . "\n";
}
add_action( 'wp_head', 'fitpro_seo_features' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function fitpro_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Column 1', 'fitpro' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Add widgets here.', 'fitpro' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
    register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Column 2', 'fitpro' ),
			'id'            => 'footer-2',
			'description'   => esc_html__( 'Add widgets here.', 'fitpro' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
    register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Column 3', 'fitpro' ),
			'id'            => 'footer-3',
			'description'   => esc_html__( 'Add widgets here.', 'fitpro' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
    register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Column 4', 'fitpro' ),
			'id'            => 'footer-4',
			'description'   => esc_html__( 'Add widgets here.', 'fitpro' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'fitpro_widgets_init' );
