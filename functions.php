<?php
/**
 * britstrap functions and definitions
 *
 * @package britstrap
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

if ( ! function_exists( 'britstrap_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function britstrap_setup() {

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on britstrap, use a find and replace
	 * to change 'britstrap' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'britstrap', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	/**
	 * This theme uses wp_nav_menu() in 5 locations.
	 */
	 register_nav_menus( array(
		'top' => __( 'Top Menu', 'britstrap' ),
		'primary' => __( 'Primary Menu', 'britstrap' ),
		'sitemap' => __( 'Site Map', 'britstrap' ),
		'footer' => __( 'Footer Menu', 'britstrap' ),
		'subfooter' => __( 'Sub Footer', 'britstrap' )
	) );

	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	/**
	 * Setup the WordPress core custom background feature.
	 */
	add_theme_support( 'custom-background', apply_filters( 'britstrap_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => ''
	) ) );
}
endif; // britstrap_setup
add_action( 'after_setup_theme', 'britstrap_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function britstrap_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'britstrap' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix">',
		'after_widget'  => '</div></aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1><div class="widget-content">',
	) );
}
add_action( 'widgets_init', 'britstrap_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function britstrap_scripts() {

	wp_enqueue_style( 'britstrap-styles', get_stylesheet_uri() );

	wp_enqueue_script( 'britstrap-scripts', get_template_directory_uri() . '/js/dist/britstrap.js', array('jquery'), '20120206', true );

}
add_action( 'wp_enqueue_scripts', 'britstrap_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom main nav structure to conform with Bootstrap navbar.
 * britstrap_walker_nav_menu
 */
require get_template_directory() . '/inc/walker-nav-menu.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
