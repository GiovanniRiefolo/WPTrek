<?php
// Define path and URL to the ACF plugin.
define( 'MY_ACF_PATH', get_stylesheet_directory() . '/includes/acf/' );
define( 'MY_ACF_URL', get_stylesheet_directory_uri() . '/includes/acf/' );

// Include the ACF plugin.
include_once( MY_ACF_PATH . 'acf.php' );

// Customize the url setting to fix incorrect asset URLs.
function my_acf_settings_url( $url ) {
    return MY_ACF_URL;
}
add_filter('acf/settings/url', 'my_acf_settings_url');

// (Optional) Hide the ACF admin menu item.

function my_acf_settings_show_admin( $show_admin ) {   
    if (WP_DEBUG == false){
        return false;
    } else {
        return true;
    }
}
add_filter('acf/settings/show_admin', 'my_acf_settings_show_admin');



function my_acf_json_load_point( $paths ) {
    // remove original path (optional)
    unset($paths[0]);
    // append path
    $paths[] = get_template_directory() . '/includes/acf/acf-json/';
    // return
    return $paths;
}
add_filter('acf/settings/load_json', 'my_acf_json_load_point');