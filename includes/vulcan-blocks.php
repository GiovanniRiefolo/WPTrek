<?php
// Vulcan Blocks by Giovanni Riefolo
// version 0.0.1
// Licensed under GNU GPL v3.0

// blocks - Custom Categories
function seed_block_categories( $categories, $post ) {
    return array_merge(
        $categories,
        array(
            array(
                'slug' => 'extended-fields',
                'title' => __( 'Blocchi Aggiuntivi', 'extended-fields' ),
            ),
        )
    );
}
add_filter( 'block_categories', 'seed_block_categories', 2, 2 );
// blocks - registering with ACF Blocks
function register_acf_block_types() {

    acf_register_block_type(array(
        'name'				=> 'container',
        'title'				=> __('Container'),
        'description'       => __('Block container. Can be used ad content section.'),
        'render_template'   => 'blocks/container/container.php',
        'category'          => 'extended-fields',
        'icon'              => '<svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="container-storage" class="svg-inline--fa fa-container-storage fa-w-20" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M640 64V48c0-8.8-7.2-16-16-16H16C7.2 32 0 39.2 0 48v16c0 8.8 7.2 16 16 16v352c-8.8 0-16 7.2-16 16v16c0 8.8 7.2 16 16 16h608c8.8 0 16-7.2 16-16v-16c0-8.8-7.2-16-16-16V80c8.8 0 16-7.2 16-16zm-64 368H64V80h512v352zm-440-48h32c4.4 0 8-3.6 8-8V136c0-4.4-3.6-8-8-8h-32c-4.4 0-8 3.6-8 8v240c0 4.4 3.6 8 8 8zm224 0h32c4.4 0 8-3.6 8-8V136c0-4.4-3.6-8-8-8h-32c-4.4 0-8 3.6-8 8v240c0 4.4 3.6 8 8 8zm112 0h32c4.4 0 8-3.6 8-8V136c0-4.4-3.6-8-8-8h-32c-4.4 0-8 3.6-8 8v240c0 4.4 3.6 8 8 8zm-224 0h32c4.4 0 8-3.6 8-8V136c0-4.4-3.6-8-8-8h-32c-4.4 0-8 3.6-8 8v240c0 4.4 3.6 8 8 8z"></path></svg>',
        'mode'				=> 'preview',
        'enqueue_assets'    => function(){
                                wp_enqueue_style('container-style', get_theme_file_uri('blocks/container/container.css'));
                               },
        'supports'			=> array(
                                    'align' => true,
                                    'mode' => false,
                                    'jsx' => true,
                                    'anchor' => true,
                                )
    ));
    acf_register_block_type(array(
        'name'				=> 'icon',
        'title'				=> __('Icon'),
        'description'       => __('Icon SVG'),
        'render_template'   => 'blocks/icon/icon.php',
        'category'          => 'extended-fields',
        'icon'              => '<svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="shapes" class="svg-inline--fa fa-shapes fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M480 288H320c-17.67 0-32 14.33-32 32v160c0 17.67 14.33 32 32 32h160c17.67 0 32-14.33 32-32V320c0-17.67-14.33-32-32-32zm-16 176H336V336h128v128zM128 256C57.31 256 0 313.31 0 384s57.31 128 128 128 128-57.31 128-128-57.31-128-128-128zm0 208c-44.11 0-80-35.89-80-80s35.89-80 80-80 80 35.89 80 80-35.89 80-80 80zm378.98-262.86L400.07 18.29C392.95 6.1 380.47 0 368 0s-24.95 6.1-32.07 18.29L229.02 201.14c-14.26 24.38 3.56 54.86 32.07 54.86h213.82c28.51 0 46.33-30.48 32.07-54.86zM280.61 208L368 58.53 455.39 208H280.61z"></path></svg>',
        'mode'				=> 'preview',
        'enqueue_assets'    => function(){
                                    wp_enqueue_style('icon-style', get_theme_file_uri('blocks/icon/icon.css'));
                               },
        'supports'			=> array(
                                    'align' => true,
                                    'anchor' => true,
                                )
    ));

}
if( function_exists('acf_register_block_type') ) {
    add_action('acf/init', 'register_acf_block_types');
}