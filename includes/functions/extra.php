<?php
// Extra features

// --- remove WP Bar for no admin user
if (!current_user_can('manage_options')) {
	add_filter('show_admin_bar', '__return_false');
}

// --- load the theme styles within Gutenberg.
function seed_add_gutenberg_assets()
{
	wp_enqueue_style('seed-gutenberg', get_theme_file_uri('/assets/styles/gutenberg-editor-style.css'), false);
}
add_action('enqueue_block_editor_assets', 'seed_add_gutenberg_assets');

// --- return the expert length which is set by the theme option
function seed_excerpt_length($length)
{
	$excerpt_custom_lenght = get_theme_mod('posts_excerpt_lenght');

	if (!($excerpt_custom_lenght)) {
		return 20;
	} else {
		return $excerpt_custom_lenght;
	}
}
add_filter('excerpt_length', 'seed_excerpt_length', 999);


add_filter('excerpt_more', function () {
    return sprintf(' &hellip;');
});