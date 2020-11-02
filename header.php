<?php
//	This is the template that displays the <head> section
//	@https://developer.wordpress.org/themes/basics/template-files/#template-files

// @package WordPress
// @subpackage WP_Trek
// @since WP Trek 1.0
?>

<!doctype html>

  <html class="no-js" <?php language_attributes(); ?>>

	<head>
		<meta charset="utf-8">

		<!-- Force IE to use the latest rendering engine available -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<!-- WP Meta -->
		<meta charset="<?php bloginfo( 'charset' ); ?>" />

		<!-- Mobile Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Favicon fallback -->
		<!-- .check out Favicon.io 'https://favicon.io' -->
		<?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) { ?>
			<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
			<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>//apple-touch-icon.png">
            <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/favicon-32x32.png">
            <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/favicon-16x16.png">
            <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/site.webmanifest">
	    <?php } ?>

        <!-- WP Pingbacks -->
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php wp_head(); ?>

		<?php wptrek_gtag(); ?>
		<?php wptrek_fbpx(); ?>
		
		
		<?php
		$critical_css_usage = get_theme_mod( 'critical_css_usage', true );
		$critical_css_filename = get_theme_mod("critical_css_settings");
		
		if ( $critical_css_usage == true ) : ?>
			<style>
				<?php $critical_css_file = file_get_contents(get_template_directory_uri() . '/assets/styles/' . $critical_css_filename); ?>
				<?php echo $critical_css_file; ?>
			</style>
		<?php endif; ?>
		
		
		

	</head>

<body <?php body_class(); ?>>

