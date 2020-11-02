<?php
//  WP Trek functions and definitions
//  @link https://developer.wordpress.org/themes/basics/theme-functions/

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
//  --  assets
require_once get_template_directory() . '/includes/assets.php';

//  --  custom template tags
require_once get_template_directory() . '/includes/template-tags.php';

//  --  custom fields
require_once get_template_directory() . '/includes/custom-fields.php';

//  --  custom blocks
require_once get_template_directory() . '/includes/vulcan-blocks.php';

//  --  Customizer
require_once get_template_directory() . '/classes/class-wptrek-customizer.php';

//  --  suggested plugins
require_once get_template_directory() . '/classes/class-wptrek-plugins.php';
