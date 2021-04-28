<?php
// Custom template tags for this theme.

// @package WordPress
// @subpackage WP_Trek
// @since WPTrek 1.0

// --- add FontAwesome Kit code.
if ( ! function_exists( 'wptrek_get_fapro') ) :
	function wptrek_get_fapro(){
		echo get_option('get_fontawesome');
	}   
endif;