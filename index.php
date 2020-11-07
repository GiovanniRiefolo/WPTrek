<?php
//  The main template file
//  @https://developer.wordpress.org/themes/basics/template-hierarchy

// @package WordPress
// @subpackage WP_Trek
// @since WP Trek 1.0

get_header(); ?>

<main <?php if ( true === get_theme_mod( 'fullpage_settings', true )) : ?>id="fullpage"<?php endif; ?> >
    <?php the_content(); ?>
</main>

<?php get_footer(); ?>