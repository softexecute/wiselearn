<?php


if ( ! function_exists( 'wiselearn_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function wiselearn_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on wiselearn, use a find and replace
		 * to change 'wiselearn' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'wiselearn', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary Menu', 'wiselearn' ),
		) );
		register_nav_menus( array(
			'header_menu' => esc_html__( 'Header Menu', 'wiselearn' ),
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
		add_theme_support( 'custom-background', apply_filters( 'wiselearn_custom_background_args', array(
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
endif;
add_action( 'after_setup_theme', 'wiselearn_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wiselearn_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'wiselearn_content_width', 640 );
}
add_action( 'after_setup_theme', 'wiselearn_content_width', 0 );

/**==============================================================================
 * Register widget area.
=================================================================================== */
function wiselearn_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'wiselearn' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'wiselearn' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
		register_sidebar( array(
		'name'          => esc_html__( 'Footer Column-2', 'wiselearn' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'wiselearn' ),
		'before_widget' => '<div id="%1$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="footer-widget-title">',
		'after_title'   => '</h2>',
	) );
		register_sidebar( array(
		'name'          => esc_html__( 'Footer Column-3', 'wiselearn' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here.', 'wiselearn' ),
		'before_widget' => '<div id="%1$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="footer-widget-title">',
		'after_title'   => '</h2>',
	) );
		register_sidebar( array(
		'name'          => esc_html__( 'Footer Column-4', 'wiselearn' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Add widgets here.', 'wiselearn' ),
		'before_widget' => '<div id="%1$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="footer-widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'wiselearn_widgets_init' );

/**=======================================================================
 * Enqueue scc files.
=========================================================================== */
function wiselearn_scripts() {
	wp_enqueue_style( 'wiselearn-style', get_stylesheet_uri() );
	wp_enqueue_style( 'Fonts', wiselearn_fonts_url(), array(), null);
	wp_enqueue_style( 'wiselearn-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_style( 'wiselearn-bootstrap', get_template_directory_uri() .'/assets/css/bootstrap.min.css', array(), '20151215', false );
	wp_enqueue_style( 'wiselearn-font-awesome', get_template_directory_uri() .'/assets/css/font-awesome.min.css', array(), '20151215', false );
	wp_enqueue_style( 'wiselearn-icofont', get_template_directory_uri() . '/assets/css/icofont.min.css', array(), '20151215', false );
	wp_enqueue_style( 'wiselearn-magnific', get_template_directory_uri() .'/assets/css/magnific-popup.css', array(), '20151215', false );
	wp_enqueue_style( 'wiselearn-carousel', get_template_directory_uri().'/assets/css/owl.carousel.min.css', array(), '20151215', false );
	wp_enqueue_style( 'wiselearn-animate', get_template_directory_uri() .'/assets/css/animate.css', array(), '20151215', false );
	wp_enqueue_style( 'wiselearn-main', get_template_directory_uri() . '/assets/css/main.css', array(), '20151215', false );
	wp_enqueue_style( 'wiselearn-meanmenu', get_template_directory_uri() .'/assets/css/meanmenu.min.css', array(), '20151215', false );
	wp_enqueue_style( 'wiselearn-responsive', get_template_directory_uri() .'/assets/css/responsive.css', array(), '20151215', false );

/**=======================================================================
 * Enqueue scripts files.
=========================================================================== */
	wp_enqueue_script( 'wiselearn-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	wp_enqueue_script('jquery');

	wp_enqueue_script( 'wiselearn-bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), '20151215', true );
	wp_enqueue_script( 'wiselearn-isotope', get_template_directory_uri() . '/assets/js/isotope.pkgd.min.js', array(), '20151215', true );
	wp_enqueue_script( 'wiselearn-jquery', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js', array(), '20151215', true );
	wp_enqueue_script( 'wiselearn-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array(), '20151215', true );
	wp_enqueue_script( 'wiselearn-animate', get_template_directory_uri() . '/assets/js/owl.animate.js', array(), '20151215', true );
	wp_enqueue_script( 'wiselearn-jquery.scrollUp', get_template_directory_uri() . '/assets/js/jquery.scrollUp.min.js', array(), '20151215', true );
	wp_enqueue_script( 'wiselearn-jquery.counterup', get_template_directory_uri() . '/assets/js/jquery.counterup.min.js', array(), '20151215', true );
	wp_enqueue_script( 'wiselearn-modernizr', get_template_directory_uri() . '/assets/js/modernizr.min.js', array(), '20151215', true );
	wp_enqueue_script( 'wiselearn-waypoints', get_template_directory_uri() . '/assets/js/waypoints.min.js', array(), '20151215', true );
	wp_enqueue_script( 'wiselearn-meanmenu', get_template_directory_uri() . '/assets/js/jquery.meanmenu.min.js', array(), '20151215', true );
	wp_enqueue_script( 'wiselearn-countdown', get_template_directory_uri() . '/assets/js/jquery.countdown.js', array(), '20151215', true );
	wp_enqueue_script( 'wiselearn-imagesloaded', get_template_directory_uri() . '/assets/js/imagesloaded.pkgd.min.js', array(), '20151215', true );
	wp_enqueue_script( 'wiselearn-scrollIt', get_template_directory_uri() . '/assets/js/scrollIt.min.js', array(), '20151215', true );

wp_register_script('googlemaps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyAJdanixi2Nzt7V-XXzo22neY4Eso8DXCQ', array(), '', true);
wp_enqueue_script('googlemaps');

	wp_enqueue_script( 'wiselearn-custom', get_template_directory_uri() . '/assets/js/custom.js', array(), '20151215', true );	
	wp_enqueue_script( 'wiselearn-masonry', get_template_directory_uri() . '/assets/js/masonry.pkgd.min.js', array(), '20151215', true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wiselearn_scripts' );

/**-------------------------------------------------------------------------
 * Implement the Custom Header feature.
 ---------------------------------------------------------------------------*/







/*=============================================================================
 font enquee goes here 
 ==============================================================================*/
function wiselearn_fonts_url() {
	$fonts_url = '';

	/*==========================================================================
	 * Translators: If there are characters in your language that are not
	 * supported by Libre Franklin, translate this to 'off'. Do not translate
	 * into your own language.
	 =============================================================================*/
	$libre_franklin = _x( 'on', 'Libre Franklin font: on or off', 'twentyseventeen' );

	if ( 'off' !== $libre_franklin ) {
		$font_families = array();

		$font_families[] = 'Lato:300,400,700,900';
		$font_families[] = 'Montserrat:300,400,500,600,700';
		$font_families[] = 'Pinyon+Scrip';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css?' );
	}

	return esc_url_raw( $fonts_url );
}




require get_template_directory() . '/inc/custom-header.php';

/**-----------------------------------------------------------
 * Custom template tags for this theme.
 -------------------------------------------------------------*/
require get_template_directory() . '/inc/template-tags.php';

/**-------------------------------------------------------------
 * Functions which enhance the theme by hooking into WordPress.
--------------------------------------------------------------- */
require get_template_directory() . '/inc/template-functions.php';

/**-----------------------------------------------------------------
 * Customizer additions.
 -------------------------------------------------------------------*/
require get_template_directory() . '/inc/customizer.php';
/*----------------------------------------------------------------
Comment form mobifier
----------------------------------------------------------------*/
require get_template_directory() . '/inc/comment-modifier.php';
/**-------------------------------------------------------------
 * Load Custom Comments Layout file.
 ---------------------------------------------------------------*/
require get_template_directory() . '/inc/comments-helper.php';

/*=============================================================
 * Load Code Star
 ============================================================ */
require get_template_directory() .'/inc/wiselearn_options.php';
 /*=============================================================
 * Load Custom Post type as Course 
 =============================================================== */
require get_template_directory() .'/inc/wiselearn_Course_Reg.php'; 
/*===============================================================
 Load Custom Post type as Event 
 ==============================================================*/
require get_template_directory() .'/inc/wiselearn_Event_Reg.php';
/*================================================================
 Load Custom Post type as Gallery 
==================================================================*/
require get_template_directory() .'/inc/wiselearn_Gallery_Reg.php';
 /**==============================================================
  Load Custom Recent post widget and search form 
  =================================================================*/
require get_template_directory() .'/inc/recent-post-with-thumnail.php';
require get_template_directory() .'/inc/wiselearn_search.php';
 /**=================================================================
 * Load Shotcode for wp bakary page builder 
 =====================================================================*/
 require get_template_directory() .'/inc/bakary-elements/register_file.php'; 
 /*==================================================================
  Load Shotcode for subscriber form 
 ===================================================================*/
 require get_template_directory() .'/inc/subcription_form.php';
/*======================================================================
TGM Require 
========================================================================*/ 
 require get_template_directory() .'/inc/class-tgm-plugin-activation.php';
 require get_template_directory() .'/inc/plugin_activation_reminder.php';
/**=======================================================================
 * Load Jetpack compatibility file.
 ========================================================================*/
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


?>

