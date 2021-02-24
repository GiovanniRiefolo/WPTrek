<?php
//  Register widget area.
function wptrek_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Post Sidebar', 'wptrek' ),
			'id'            => 'post-sidebar',
			'description'   => __( 'Add widgets here to beam them up in the post sidebar.', 'wptrek' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'wptrek_widgets_init' );