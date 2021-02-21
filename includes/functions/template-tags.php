<?php
// Custom template tags for this theme.

// @package WordPress
// @subpackage WP_Trek
// @since WP Trek 1.0

// --- add the Google Tag code.
if ( ! function_exists( 'wptrek_get_gtag' ) ) :
	function wptrek_get_gtag() {
		$code 	= echo get_option('google_tag_snippet');
		$nocode = echo get_option('google_tag_snippet_nocode');
    }
endif;
// --- add the Facebook Pixel code.
if ( ! function_exists( 'wptrek_get_fbpx' ) ) :
	function wptrek_get_fbpx() {
		echo get_option('fb_pixel_snippet');
    }
endif;
// --- add FontAwesome Kit code.
if ( ! function_exists( 'wptrek_get_fapro') ) :
	function wptrek_get_fapro(){
		echo get_option('get_fontawesome');
	}   
endif;