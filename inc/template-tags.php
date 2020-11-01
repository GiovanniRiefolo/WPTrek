<?php
// Custom template tags for this theme.
// @package WordPress
// @subpackage WP_Trek
// @since WP Trek 1.0

// Add the Google Tag code.
if ( ! function_exists( 'wptrek_script_snippets' ) ) :
	
	function wptrek_script_snippets() {
		echo get_option('scripts_snippets');
    }
    
endif;

// Add the Google Tag code.
if ( ! function_exists( 'wptrek_gtag' ) ) :
	function wptrek_gtag() {
		echo get_option('google_tag_snippet');
    }
endif;

// Add the Facebook Pixel code.
if ( ! function_exists( 'wptrek_fbpx' ) ) :
	function wptrek_fbpx() {
		echo get_option('fb_pixel_snippet');
    }
endif;