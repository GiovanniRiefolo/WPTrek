<?php
// --- WP default

add_image_size( 'post-card' , 350, 250, false);

// --- register image sizes for page/post content
add_filter( 'image_size_names_choose', 'seed_custom_sizes' );
function seed_custom_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'post-card' => __( 'Anteprima card' ),
    ) );
}