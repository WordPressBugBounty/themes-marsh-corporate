<?php
/**
 * Marsh Corporate functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Marsh Corporate
 */

if ( ! function_exists( 'marsh_corporate_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function marsh_corporate_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Marsh Corporate, use a find and replace
	 * to change 'marsh-corporate' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'marsh-corporate', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary', 'marsh-corporate' ),
	) );

	// Enable support for custom logo.
	add_theme_support( 'custom-logo' , array(
		'height'		=>45,	
		'width'			=>45,	
		'flex-height'	=>true,	
		'flex-width'	=>true,
	));

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'marsh_corporate_custom_background_args', array(
		'default-color' => 'fff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	* This theme styles the visual editor to resemble the theme style,
	* specifically font, colors, icons, and column width.
	*/
	$marsh_corporate_min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
	add_editor_style( array( '/assets/css/editor-style' . $marsh_corporate_min . '.css', marsh_corporate_fonts_url() ) );

	// Gutenberg support
	add_theme_support( 'editor-color-palette', array(
       	array(
			'name' => esc_html__( 'Tan', 'marsh-corporate' ),
			'slug' => 'tan',
			'color' => '#E6DBAD',
       	),
       	array(
           	'name' => esc_html__( 'Yellow', 'marsh-corporate' ),
           	'slug' => 'yellow',
           	'color' => '#FDE64B',
       	),
       	array(
           	'name' => esc_html__( 'Orange', 'marsh-corporate' ),
           	'slug' => 'orange',
           	'color' => '#ED7014',
       	),
       	array(
           	'name' => esc_html__( 'Red', 'marsh-corporate' ),
           	'slug' => 'red',
           	'color' => '#D0312D',
       	),
       	array(
           	'name' => esc_html__( 'Pink', 'marsh-corporate' ),
           	'slug' => 'pink',
           	'color' => '#b565a7',
       	),
       	array(
           	'name' => esc_html__( 'Purple', 'marsh-corporate' ),
           	'slug' => 'purple',
           	'color' => '#A32CC4',
       	),
       	array(
           	'name' => esc_html__( 'Blue', 'marsh-corporate' ),
           	'slug' => 'blue',
           	'color' => '#3A43BA',
       	),
       	array(
           	'name' => esc_html__( 'Green', 'marsh-corporate' ),
           	'slug' => 'green',
           	'color' => '#3BB143',
       	),
       	array(
           	'name' => esc_html__( 'Brown', 'marsh-corporate' ),
           	'slug' => 'brown',
           	'color' => '#231709',
       	),
       	array(
           	'name' => esc_html__( 'Grey', 'marsh-corporate' ),
           	'slug' => 'grey',
           	'color' => '#6C626D',
       	),
       	array(
           	'name' => esc_html__( 'Black', 'marsh-corporate' ),
           	'slug' => 'black',
           	'color' => '#000000',
       	),
   	));

	add_theme_support( 'align-wide' );
	add_theme_support( 'editor-font-sizes', array(
	   	array(
	       	'name' => esc_html__( 'small', 'marsh-corporate' ),
	       	'shortName' => esc_html__( 'S', 'marsh-corporate' ),
	       	'size' => 12,
	       	'slug' => 'small'
	   	),
	   	array(
	       	'name' => esc_html__( 'regular', 'marsh-corporate' ),
	       	'shortName' => esc_html__( 'M', 'marsh-corporate' ),
	       	'size' => 16,
	       	'slug' => 'regular'
	   	),
	   	array(
	       	'name' => esc_html__( 'larger', 'marsh-corporate' ),
	       	'shortName' => esc_html__( 'L', 'marsh-corporate' ),
	       	'size' => 36,
	       	'slug' => 'larger'
	   	),
	   	array(
	       	'name' => esc_html__( 'huge', 'marsh-corporate' ),
	       	'shortName' => esc_html__( 'XL', 'marsh-corporate' ),
	       	'size' => 48,
	       	'slug' => 'huge'
	   	)
	));
	add_theme_support('editor-styles');
	add_theme_support( 'wp-block-styles' );
}
endif;
add_action( 'after_setup_theme', 'marsh_corporate_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function marsh_corporate_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'marsh_corporate_content_width', 640 );
}
add_action( 'after_setup_theme', 'marsh_corporate_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function marsh_corporate_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'marsh-corporate' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'marsh-corporate' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
		register_sidebar( array(
		'name'          => sprintf( esc_html__( 'Footer %d', 'marsh-corporate' ), 1 ),
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => sprintf( esc_html__( 'Footer %d', 'marsh-corporate' ), 2 ),
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => sprintf( esc_html__( 'Footer %d', 'marsh-corporate' ), 3 ),
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => sprintf( esc_html__( 'Footer %d', 'marsh-corporate' ), 4 ),
		'id'            => 'footer-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'marsh_corporate_widgets_init' );

/**
 * Register custom fonts.
 */
function marsh_corporate_fonts_url() {
	$marsh_corporate_fonts_url = '';
	$marsh_corporate_fonts     = array();
	$marsh_corporate_subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Poppins, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Poppins: on or off', 'marsh-corporate' ) ) {
		$marsh_corporate_fonts[] = 'Poppins:300,400,500,600';
	}

	if ( $marsh_corporate_fonts ) {
		$marsh_corporate_fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $marsh_corporate_fonts ) ),
			'subset' => urlencode( $marsh_corporate_subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $marsh_corporate_fonts_url );
}

/**
 * Enqueue scripts and styles.
 */
function marsh_corporate_scripts() {
	$marsh_corporate_min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
	$marsh_corporate_fonts_url = marsh_corporate_fonts_url();
	if ( ! empty( $marsh_corporate_fonts_url ) ) {
		wp_enqueue_style( 'marsh-corporate-google-fonts', $marsh_corporate_fonts_url, array(), null );
	}	

	wp_enqueue_style( 'fontawesome-all', get_template_directory_uri() . '/assets/css/all' . $marsh_corporate_min . '.css', '', '6.5.2' );

	wp_enqueue_style( 'marsh-corporate-blocks', get_template_directory_uri() . '/assets/css/blocks' . $marsh_corporate_min . '.css' );
	
	wp_enqueue_style( 'marsh-corporate-style', get_stylesheet_uri() );
	
	wp_enqueue_script( 'marsh-corporate-navigation', get_template_directory_uri() . '/assets/js/navigation' . $marsh_corporate_min . '.js', array(), '20151215', true );

	wp_enqueue_script( 'marsh-corporate-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix' . $marsh_corporate_min . '.js', array(), '20151215', true );

	wp_enqueue_script( 'marsh-corporate-custom-js', get_template_directory_uri() . '/assets/js/custom' . $marsh_corporate_min . '.js', array('jquery'), '20151215', true );  

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'marsh_corporate_scripts' );

/**
 * Enqueue editor styles for Gutenberg
 *
 * @since Marsh Corporate 1.0.0
 */
function marsh_corporate_block_editor_styles() {
	$marsh_corporate_min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
	// Block styles.
	wp_enqueue_style( 'marsh-corporate-block-editor-style', get_theme_file_uri( '/assets/css/editor-blocks' . $marsh_corporate_min . '.css' ) );
	// Add custom fonts.
	wp_enqueue_style( 'marsh-corporate-fonts', marsh_corporate_fonts_url(), array(), null );
}
add_action( 'enqueue_block_editor_assets', 'marsh_corporate_block_editor_styles' );

function marsh_corporate_category_title( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    }
    return $title;
}
add_filter( 'get_the_archive_title', 'marsh_corporate_category_title' );

/**
 * Load init.
 */
require_once get_template_directory() . '/inc/init.php';

/**
 * Load Marsh Corporate Dashboard
 */
require get_template_directory() . '/inc/admin/class-marsh-corporate-admin.php';
require get_template_directory() . '/inc/admin/class-marsh-corporate-notice.php';