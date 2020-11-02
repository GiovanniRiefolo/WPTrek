<?php 
//  Enqueuing theme scripts
function wptrek_assets(){
    
    //  Scripts
    wp_enqueue_script('vendors-script', get_theme_file_uri('assets/scripts/vendors.js'), array('jquery'));
    wp_enqueue_script('theme-script', get_theme_file_uri('assets/scripts/theme.js'), array('jquery', 'vendors-script'));
    //  Styles
    wp_enqueue_style('theme-style', get_theme_file_uri('assets/styles/theme.css'), array('critical-css'));
    //  --  load template specific styles
    if ( is_front_page() ){
        // wp_enqueue_script('front-page-script', get_theme_file_uri('assets/scripts/front-page.js'), array('jquery', 'theme-script'), '1.0.0', true);
        // wp_enqueue_style('front-page-style', get_theme_file_uri('assets/styles/templates/front-page.css'));
    }
    //  --  inner pages and 404 error pages
    if ( is_page() || is_404() ){
        //  wp_enqueue_script('page-default-script', get_theme_file_uri('assets/scripts/page.js'), array('jquery'));
        //  wp_enqueue_style('page-default-style', get_theme_file_uri('assets/styles/templates/page.css'));
    }
    //  --  search page
    if ( is_search() ){
        // wp_enqueue_style('search-page', get_theme_file_uri('assets/styles/templates/search-page.css'));
    }
    //  --  check if fullpage is required
    if ( true === get_theme_mod( 'fullpage_settings', true )) {
        wp_enqueue_script('fullpage-script', get_theme_file_uri('assets/scripts/libraries/fullpage.min.js'));
        wp_enqueue_script('fullpage-script-ext', get_theme_file_uri('assets/scripts/libraries/fullpage.extensions.min.js'), array('fullpage-script'));
        wp_enqueue_style('fullpage-styles', get_theme_file_uri('assets/styles/scss/fullpage/fullpage.min.css'));
    }
}
add_action( 'wp_enqueue_scripts', 'wptrek_assets' );

//  Custom Admin
function wptrek_admin(){
    wp_enqueue_style('admin-style', get_theme_file_uri('assets/styles/sg.admin.css'));
}
add_action( 'admin_enqueue_scripts', 'wptrek_admin');

