<?php
// Custom template tags for this theme.

// @package WordPress
// @subpackage WP_Trek
// @since WP Trek 1.0

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
// Add FontAwesome Kit code.
if ( ! function_exists( 'wptrek_fapro') ) :
	function wptrek_fapro(){
		echo get_option('get_fontawesome');
	}   
endif;