<?php
//  Enqueuing theme scripts
function wptrek_assets()
{
    // Scripts
    wp_enqueue_script('vendors-script', get_theme_file_uri('assets/scripts/vendors.js'), array('jquery'));
    wp_enqueue_script('theme-script', get_theme_file_uri('assets/scripts/theme.js'), array('jquery', 'vendors-script'));
    // Styles
    wp_enqueue_style('theme-style', get_theme_file_uri('assets/styles/theme.css'), array('critical-css'));
    // --- load template specific styles
    if (is_front_page()) {
        // wp_enqueue_script('front-page-script', get_theme_file_uri('assets/scripts/front-page.js'), array('jquery', 'theme-script'), '1.0.0', true);
        // wp_enqueue_style('front-page-style', get_theme_file_uri('assets/styles/templates/front-page.css'));
    }
    // --- inner pages and 404 error pages
    if (is_page() || is_404()) {
        //  wp_enqueue_script('page-default-script', get_theme_file_uri('assets/scripts/page.js'), array('jquery'));
        //  wp_enqueue_style('page-default-style', get_theme_file_uri('assets/styles/templates/page.css'));
    }
    // --- search page
    if (is_search()) {
        // wp_enqueue_style('search-page', get_theme_file_uri('assets/styles/templates/search-page.css'));
    }
}
// --- enqueueing theme scripts and styles with wp_enqueue_scripts hook
add_action('wp_enqueue_scripts', 'wptrek_assets');

// Custom Admin
function wptrek_admin()
{
    wp_enqueue_style('admin-style', get_theme_file_uri('assets/styles/sg.admin.css'));
    if (!empty(get_option('get_fontawesome'))) {
        wp_enqueue_script('fontawesome-kit',  'https://kit.fontawesome.com/' . get_option('get_fontawesome') . '.js');
    }
}
// --- enqueueing custom admin styles with admin_enqueue_scripts hook
add_action('admin_enqueue_scripts', 'wptrek_admin');

// Custom Editor styles
function wptrek_gutenberg_styles()
{
    // --- load the theme styles within Gutenberg.
    wp_enqueue_style('wptrek-gutenberg', get_theme_file_uri('/assets/styles/sg.gutenberg.css'), false);
}
add_action('enqueue_block_editor_assets', 'wptrek_gutenberg_styles');
