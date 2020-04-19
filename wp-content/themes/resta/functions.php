<?php
/**
 * Resta functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Resta
 */

if ( ! function_exists( 'resta_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function resta_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Resta, use a find and replace
		 * to change 'resta' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'resta', get_template_directory() . '/languages' );

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
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'resta' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'resta_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}

	// WooCommerce Support
    add_theme_support( 'woocommerce' );

endif;
add_action( 'after_setup_theme', 'resta_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function resta_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'resta_content_width', 640 );
}
add_action( 'after_setup_theme', 'resta_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function resta_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'resta' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'resta' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

    $args_footer_widgets = array(
        'name'          => esc_html__( 'Footer %d', 'resta' ),
        'id'            => 'footer-widget',
        'description'   => esc_html__( 'Add widgets here.', 'resta' ),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="font-weight-bold mb-50">',
        'after_title'   => '</h4>'
    );

    register_sidebars( 4, $args_footer_widgets );

    // Social Widget
    register_widget( 'resta_Social' );
}

add_action( 'widgets_init', 'resta_widgets_init' );

/**
 * resta
 * Widget
 */
require get_template_directory() . '/plugin/social.php';

/**
 * Breadcrumb
 */
require get_template_directory() . '/inc/breadcrumb.php';

/**
 * Enqueue scripts and styles.
 */
function resta_scripts() {

    wp_enqueue_style('resta-body-fonts', '//fonts.googleapis.com/css?family=Playball:400');
    wp_enqueue_style('resta-body-fonts', '//fonts.googleapis.com/css?family=Playfair+Display:300,700,800');
    wp_enqueue_style('resta-heading-fonts', '//fonts.googleapis.com/css?family=Poppins:300,500,800');

    // Plugin CSS
    wp_enqueue_style( 'icofont', get_template_directory_uri() . '/css/icofont.min.css', array(), '4.7.0' );
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '4.4.1' );
    wp_enqueue_style( 'magnific', get_template_directory_uri() . '/css/magnific-popup.css', array(), '1.1.1' );
    // Main Stylesheet
    wp_enqueue_style( 'resta-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' )  );
    // Responsive
    wp_enqueue_style( 'resta-responsive', get_template_directory_uri() . '/css/responsive.css', array(), wp_get_theme()->get( 'Version' ) );
    wp_enqueue_style( 'resta-plugin', get_template_directory_uri() . '/css/plugin.css', array(), wp_get_theme()->get( 'Version' ) );

    // Plugin JS
    wp_enqueue_script( 'jquery-slick', get_template_directory_uri() . '/js/slick.min.js', array('jquery'), '1.8.0', true );
    //wp_enqueue_script( 'jquery-popper', get_template_directory_uri() . '/js/popper.min.js', array('jquery'), '1.12.5', true );
    wp_enqueue_script( 'jquery-isotope', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array('jquery'), '3.0.6', true );
    wp_enqueue_script( 'jquery-magnific-popup', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', array('jquery'), '1.1.0', true );
    wp_enqueue_script( 'jquery-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '4.4.1', true );
    // Main JS
    wp_enqueue_script( 'resta-elementor-slider', get_template_directory_uri() . '/js/elementor-slider.js', array('jquery'), wp_get_theme()->get( 'Version' ), true );
    wp_enqueue_script( 'resta-main', get_template_directory_uri() . '/js/main.js', array('jquery'), wp_get_theme()->get( 'Version' ), true );

	wp_enqueue_script( 'resta-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'resta-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'resta_scripts' );

/**
 * Elementor widgets
 */
function resta_elementor_widgets() {

    if ( defined('ELEMENTOR_PATH') && class_exists('Elementor\Widget_Base') ) {
        require get_template_directory() . '/plugin/slideshow.php';
        require get_template_directory() . '/plugin/hero-banner.php';
        require get_template_directory() . '/plugin/support.php';
        require get_template_directory() . '/plugin/team.php';
        require get_template_directory() . '/plugin/heading.php';
        require get_template_directory() . '/plugin/info-box.php';
        require get_template_directory() . '/plugin/youtube-video.php';
        require get_template_directory() . '/plugin/image-with-text.php';
        require get_template_directory() . '/plugin/testimonial.php';
        require get_template_directory() . '/plugin/resta-page-title.php';
        require get_template_directory() . '/plugin/call-to-action.php';
        // Woocommerce Exists?
        if ( class_exists( 'WooCommerce' ) ) {
            require get_template_directory() . '/plugin/product-category-tab.php';
        }
        //require get_template_directory() . '/plugin/gallery.php';
    }
}
add_action( 'elementor/widgets/widgets_registered', 'resta_elementor_widgets' );

/**
 * @param $elements_manager
 * elementor Category Name
 */
function resta_elementor_widget_categories( $elements_manager ) {

    $elements_manager->add_category(
        'resta_elementor_categories',
        array(
            'title' => __( 'Resta Widgets', 'resta' ),
            'icon' => 'fa fa-plug',
        )
    );

}
add_action( 'elementor/elements/categories_registered', 'resta_elementor_widget_categories' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Woocommerce Snippet
 */
require get_template_directory() . '/inc/woocommerce.php';

/**
 * Resta Typography, Color
 */
require get_template_directory() . '/inc/typography.php';

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

/**
 * TGM Plugin activation.
 */
require_once dirname( __FILE__ ) . '/inc/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'resta_active_plugins' );

function resta_active_plugins() {

    $plugins = array(
        array(
            'name'      => __( 'Contact Form 7', 'resta' ),
            'slug'      => 'contact-form-7',
            'required'  => false,
        ),
        array(
            'name'      => __( 'Elementor Page Builder', 'resta' ),
            'slug'      => 'elementor',
            'required'  => false,
        )
    );

    tgmpa( $plugins );
}