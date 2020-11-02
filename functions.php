<?php

 /*     WP Trek functions and definitions
  *     @link https://developer.wordpress.org/themes/basics/theme-functions/
  */

//  Theme Compatibility
//  WP Trek only works in WordPress 5.5 or later.
if ( version_compare( $GLOBALS['wp_version'], '5.5', '<' ) ) {
 	require get_template_directory() . '/includes/compatibility.php';
 	return;
 }

 //  Theme Setup
if ( ! function_exists( 'wptrek_setup' ) ) :

    function wptrek_setup() {

        //  WP Trek can be translated: thank you Lt. Uhura!
        load_theme_textdomain( 'wptrek', get_template_directory() . '/languages' );

        //  Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        //  Let's WordPress manage the document title for us.
        add_theme_support( 'title-tag' );

        //  Enable support for Post Thumbnails on posts and pages.
        add_theme_support( 'post-thumbnails' );
        set_post_thumbnail_size( 1200, 9999 );

        //  WP Trek uses wp_nav_menu() in two locations.
        register_nav_menus(
            array(
                'main' => __( 'Main Menu', 'wptrek' ),
                'footer' => __( 'Footer Menu', 'wptrek' ),
            )
        );

        //  Switch default core markup for search form, comment form, and comments to output valid HTML5.
        add_theme_support(
            'html5',
            array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'navigation-widgets'
            )
        );

        //  Add support for core custom logo. Or the Starfleet logo. Or the IDIC logo as as well.
        // Custom logo.
        $logo_width  = 190;
        $logo_height = 190;

        add_theme_support(
            'custom-logo',
            array(
                'height'      => $logo_width,
                'width'       => $logo_height,
                'flex-width'  => true,
                'flex-height' => true,
            )
        );

        //  Add support for Block Styles.
        add_theme_support( 'wp-block-styles' );

        //  Add support for responsive embedded content.
        add_theme_support( 'responsive-embeds' );

        // Implementing selective Refresh Support for Widgets
        add_theme_support( 'customize-selective-refresh-widgets' );
    

    }

    endif;

add_action( 'after_setup_theme', 'wptrek_setup' );

//  Enqueuing theme scripts
function wptrek_assets(){
    //  Scripts
    wp_enqueue_script('vendors-script', get_theme_file_uri('assets/scripts/vendors.js'), array('jquery'));
    wp_enqueue_script('theme-script', get_theme_file_uri('assets/scripts/theme.js'), array('jquery', 'vendors-script'));
    //  Styles
    if ( is_front_page() ){
        wp_enqueue_script('front-page-script', get_theme_file_uri('assets/scripts/front-page.js'), array('jquery', 'theme-script'), '1.0.0', true);
        wp_enqueue_style('front-page-style', get_theme_file_uri('assets/styles/templates/front-page.css'));
    }
    //  Inner pages and 404 error pages
    if ( is_page() || is_404() ){
         wp_enqueue_script('page-default-script', get_theme_file_uri('assets/scripts/page.js'), array('jquery'));
         wp_enqueue_style('page-default-style', get_theme_file_uri('assets/styles/templates/page.css'));
    }
    //  Search page
    if ( is_search() ){
        wp_enqueue_style('search-page', get_theme_file_uri('assets/styles/templates/search-page.css'));
    }
    //  Check if fullpage is required
    if ( true === get_theme_mod( 'fullpage', true )) {
        wp_enqueue_script('fullpage-script', get_theme_file_uri('assets/scripts/libraries/fullpage.min.js'), array('jquery'));
    }
}
add_action( 'wp_enqueue_scripts', 'wptrek_assets' );

//  Custom Admin
function wptrek_admin(){
    wp_enqueue_style('admin-style', get_theme_file_uri('assets/styles/admin.css'));
}
add_action( 'admin_enqueue_scripts', 'wptrek_admin');


//  Register widget area.
function wptrek_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Post Sidebar', 'wptrek' ),
			'id'            => 'post-sidebar',
			'description'   => __( 'Add widgets here to beam them up in the post sidebar.', 'wptrek' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'wptrek_widgets_init' );


//  Required files

//  Custom template tags
require_once get_template_directory() . '/includes/template-tags.php';

//  Custom fields
require_once get_template_directory() . '/includes/custom-fields.php';

//  Customizer
require_once get_template_directory() . '/classes/class-wptrek-customizer.php';

//  Suggested plugins
require_once get_template_directory() . '/classes/class-wptrek-plugins.php';
