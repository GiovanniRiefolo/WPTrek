<?php
// Blocks

    function custom_block_categories( $categories, $post ) {
        return array_merge(
            $categories,
            array(
                array(
                    'slug' => 'lamitex',
                    'title' => __( 'Lamitex', 'lamitex' ),
                    'icon'  => 'dashicons-flag',
                ),
            )
        );
    }
    add_filter( 'block_categories', 'custom_block_categories', 10, 2 );

// --- registering ACF Blocks
    function register_acf_block_types()
    {
        // --- custom latest post
        acf_register_block_type(array(
            'name'              => 'container',
            'title'             => __('Container'),
            'description'       => __('Blocco contenitore'),
            'render_template'   => 'blocks/carousel/carousel.php',
            'category'          => 'lamitex',
            'icon'              => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!-- Font Awesome Pro 6.0.0-alpha2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) --><path d="M512 32H160.004C124.656 32 96.004 60.652 96.004 96V320C96.004 355.346 124.656 384 160.004 384H512C547.348 384 576 355.346 576 320V96C576 60.652 547.348 32 512 32ZM528 320C528 328.822 520.822 336 512 336H496L386.654 175.125C383.686 170.672 378.689 168 373.342 168C367.99 168 362.994 170.672 360.029 175.125L297.285 269.234L274.934 238.574C271.918 234.441 267.113 232 262.002 232C256.893 232 252.088 234.441 249.072 238.574L176 336H160.004C151.182 336 144.004 328.822 144.004 320V96C144.004 87.178 151.182 80 160.004 80H512C520.822 80 528 87.178 528 96V320ZM48.002 400V96C21.49 96 0 117.492 0 144V416C0 451.344 28.654 480 64.002 480H432.012C458.521 480 480.014 458.508 480.014 432H80.002C62.328 432 48.002 417.672 48.002 400ZM224 112C206.328 112 192 126.328 192 144S206.328 176 224 176C241.678 176 256.002 161.672 256.002 144S241.678 112 224 112Z"/></svg>',
            'enqueue_assets'    => function () {
                wp_enqueue_style('swiper-style', get_theme_file_uri('blocks/carousel/swiper.bundle.min.css'));
                wp_enqueue_style('carousel-style', get_theme_file_uri('blocks/carousel/carousel.css'));
                wp_enqueue_script('swiper-script', get_theme_file_uri('blocks/carousel/swiper.bundle.min.js'), array(), '', true);
                wp_enqueue_script('carousel-script', get_theme_file_uri('blocks/carousel/carousel.js'), array('swiper-script'), '', true);
            },
            'mode'                => 'preview',
            'supports'            => array(
                'align' => true,
                'anchor' => true,

            ),
        ));
    }
    if (function_exists('acf_register_block_type')) {
        add_action('acf/init', 'register_acf_block_types');
    }
