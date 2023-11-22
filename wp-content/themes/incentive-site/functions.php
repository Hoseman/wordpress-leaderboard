<?php
/**
 * Technical Test functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Technical_Test
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'technical_test_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function technical_test_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Technical Test, use a find and replace
		 * to change 'technical-test' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'technical-test', get_template_directory() . '/languages' );

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
				'menu-1' => esc_html__( 'Primary', 'technical-test' ),
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
				'technical_test_custom_background_args',
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
add_action( 'after_setup_theme', 'technical_test_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function technical_test_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'technical_test_content_width', 640 );
}
add_action( 'after_setup_theme', 'technical_test_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function technical_test_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'technical-test' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'technical-test' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'technical_test_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function technical_test_scripts() {
	wp_enqueue_style( 'technical-test-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'technical-test-style', 'rtl', 'replace' );

	wp_enqueue_script( 'technical-test-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'technical_test_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


/* enqueue custom styles */
function ah_enqueue(){
	$uri = get_template_directory_uri();
    wp_register_style('ah_google_fonts_1', 'https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500;600&display=swap');
    wp_register_style('ah_font_awesome', 'https://pro.fontawesome.com/releases/v5.2.0/css/all.css?'.uniqid());
    wp_register_style('ah_main', $uri . '/css/main.css?'.uniqid());
    wp_register_style('ah_hamburger', $uri . '/css/hamburgers.css?'.uniqid());
	wp_register_style('ah_owl', $uri . '/css/owl.carousel.min.css?'.uniqid());


    wp_enqueue_style('ah_google_fonts_1');
    wp_enqueue_style('ah_font_awesome');
    wp_enqueue_style('ah_main');
    wp_enqueue_style('ah_hamburger');
	wp_enqueue_style('ah_owl');

	//wp_register_script('ah_jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js', [], false, true);
    wp_register_script('ah_mainjs', $uri . '/js/main.js?'.uniqid(), [], false, true);

	//wp_enqueue_script('ah_jquery');
    wp_enqueue_script('ah_mainjs');

}

add_action( 'wp_enqueue_scripts', 'ah_enqueue' );
/* enqueue custom styles */


/* Customizer Additional Fields */
include( get_theme_file_path('/includes/theme-customizer.php') );
add_action('customize_register', 'ah_customize_register');
/* Customizer Additional Fields */


// function check_plugin_state(){
// 	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
//     if (is_plugin_active('leaderboard/leaderboard.php')){
//      echo 'plugin is active';
//    }else{
//     echo 'plugin is not active';
//    }
// }
// add_action('admin_init', 'check_plugin_state');