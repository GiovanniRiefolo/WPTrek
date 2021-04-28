<?php
// ACF configuration
// --- define path and URL to the ACF plugin.
define('WPTREK_ACF_PATH', get_stylesheet_directory() . '/includes/acf/');
define('WPTREK_ACF_URL', get_stylesheet_directory_uri() . '/includes/acf/');

// --- include the ACF plugin.
include_once(WPTREK_ACF_PATH . 'acf.php');

// --- customize the url setting to fix incorrect asset URLs.
function acf_settings_url($url)
{
    return WPTREK_ACF_URL;
}
add_filter('acf/settings/url', 'acf_settings_url');

// --- change ACF JSON default path
function acf_json_load_point($paths)
{
    // remove original path (optional)
    unset($paths[0]);
    // append path
    $paths[] = get_template_directory() . '/includes/acf/acf-json/';
    // return
    return $paths;
}
add_filter('acf/settings/load_json', 'acf_json_load_point');

// --- hiding ACF if WP_DEBUG is disabled
function acf_settings_admin_visibility($show_admin)
{
    if (WP_DEBUG == false) {
        return false;
    } else {
        return true;
    }
}
add_filter('acf/settings/show_admin', 'acf_settings_admin_visibility');
