<?php
/**
  * WP Trek compatibility
  * Prevents WP Trek from running on WordPress versions prior to 5.5,
  * since this theme in not meant to be backward compatible beyond
  * that version and it relies on many new features introduces from
  * 5.5 onward
  */

// Prevent switching to WP Trek on old version of WordPress
function wptrek_switch_theme() {
	switch_theme( WP_DEFAULT_THEME );
	unset( $_GET['activated'] );
	add_action( 'admin_notices', 'wptrek_upgrade_notice' );
}
add_action( 'after_switch_theme', 'wptrek_switch_theme' );

// Add a message for unsuccessful theme switch
function wptrek_upgrade_notice() {
	$message = sprintf( __( 'WP Trek requires at least WordPress version 5.5. You are running version %s. Please upgrade and try again.', 'wptrek' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

// Prevent Customizer from being loaded on WordPress versions prior to 5.5
function wptrek_customize() {
	wp_die(
		sprintf(
			__( 'WP Trek requires at least WordPress version 5.5. You are running version %s. Please upgrade and try again.', 'wptrek' ),
			$GLOBALS['wp_version']
		),
		'',
		array(
			'back_link' => true,
		)
	);
}
add_action( 'load-customize.php', 'wptrek_customize' );


// Prevent Theme Preview from being loaded on WordPress versions prior to 5.5
function wptrek_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( __( 'WP Trek requires at least WordPress version 5.5. You are running version %s. Please upgrade and try again.', 'wptrek' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'wptrek_preview' );