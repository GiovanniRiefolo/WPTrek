<?php
//  WPTrek functions and definitions
//  @link https://developer.wordpress.org/themes/basics/theme-functions/

//  Theme Compatibility
//  WPTrek only works in WordPress 5.5 or later.
if ( version_compare( $GLOBALS['wp_version'], '5.5', '<' ) ) {
 	require get_template_directory() . '/includes/functions/compatibility.php';
 	return;
 }

 //  Theme Setup
if ( ! function_exists( 'wptrek_setup' ) ) :

    function wptrek_setup() {

        //  WPTrek can be translated: thank you Lt. Uhura!
        load_theme_textdomain( 'wptrek', get_template_directory() . '/languages' );

        //  Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        //  Let's WordPress manage the document title for us.
        add_theme_support( 'title-tag' );

        //  Enable support for Post Thumbnails on posts and pages.
        add_theme_support( 'post-thumbnails' );
        set_post_thumbnail_size( 1200, 9999 );

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


        // Implementing selective Refresh Support for Widgets
        add_theme_support( 'customize-selective-refresh-widgets' );

        // Gutenberg dedicated theme support functions

        //  --- add support for Block Styles.
        add_theme_support( 'wp-block-styles' );

        // --- add support for wide alignment
        add_theme_support( 'align-wide' );

        //  --- add support for responsive embedded content.
        add_theme_support( 'responsive-embeds' );
    
        // --- add support for <p> anf <h*> custom line-height 
        add_theme_support( 'custom-line-height' );

        // --- add support for custom units
        add_theme_support( 'custom-units', 'rem', 'em', 'vh', 'vw', 'ch' );

        // --- add support for spacing control
        add_theme_support( 'custom-spacing');
        
        // --- add support for link color control (experimental)
        //add_theme_support('experimental-link-color');

        // --- disable custom colors
        //add_theme_support( 'disable-custom-colors' );

        // --- Disable custom font sizes
        //add_theme_support('disable-custom-font-sizes');

    }

    endif;

add_action( 'after_setup_theme', 'wptrek_setup' );


// Navigation menu
require_once get_template_directory() . '/includes/functions/navigation-menus.php';

// Image sizes
require_once get_template_directory() . '/includes/functions/image-sizes.php';

//  Assets
require_once get_template_directory() . '/includes/functions/assets.php';

// Template tags
require_once get_template_directory() . '/includes/functions/template-tags.php';

// Color palette
require_once get_template_directory() . '/includes/functions/color-palette.php';

// Extra features
require_once get_template_directory() . '/includes/functions/extra.php';

// Customizer
require_once get_template_directory() . '/includes/customizer/customizer.php';