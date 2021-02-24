<?php
// ACF configuration
// --- define path and URL to the ACF plugin.
define('SEED_ACF_PATH', get_stylesheet_directory() . '/includes/acf/');
define('SEED_ACF_URL', get_stylesheet_directory_uri() . '/includes/acf/');

// --- include the ACF plugin.
include_once(SEED_ACF_PATH . 'acf.php');

// --- customize the url setting to fix incorrect asset URLs.
function acf_settings_url($url)
{
    return SEED_ACF_URL;
}
add_filter('acf/settings/url', 'acf_settings_url');

// --- change ACF JSON default path
function acf_json_load_point($paths)
{
    // remove original path (optional)
    unset($paths[0]);
    // append path
    $paths[] = get_template_directory() . '/inc/acf/acf-json/';
    // return
    return $paths;
}
add_filter('acf/settings/load_json', 'acf_json_load_point');

// --- hiding ACF if WP_DEBUG is disabled
function acf_settings_show_admin($show_admin)
{
    if (WP_DEBUG == false) {
        return false;
    } else {
        return true;
    }
}
add_filter('acf/settings/show_admin', 'acf_settings_show_admin');

// Option pages with 'ACF Option Pages'
function register_acf_options_pages()
{
    // Uncomment the following line to show an option page
    // if (!function_exists('acf_add_options_page'))
    //     return;
    // --- register theme setting option page
    // $option_page = acf_add_options_page(array(
    //     'page_title'    => __('Tema'),
    //     'menu_title'    => __('Tema'),
    //     'menu_slug'     => 'impostazioni-tema',
    //     'capability'    => 'edit_posts',
    //     'redirect'      => false,
    //     'icon_url' => 'dashicons-editor-code',
    //     'position' => '2.1'
    // ));
}
// Hook into acf initialization.
add_action('acf/init', 'register_acf_options_pages');