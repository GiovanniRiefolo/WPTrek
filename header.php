<?php
/**
  * This template display the <head> section
  */
?>

<!doctype html>

  <html class="no-js"  <?php language_attributes(); ?>>

	<head>
		<meta charset="utf-8">

		<!-- Force IE to use the latest rendering engine available -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<!-- WP Meta -->
		<meta charset="<?php bloginfo( 'charset' ); ?>" />

		<!-- Mobile Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Favicon fallback -->
		<!-- Check out Favicon.io 'https://favicon.io' -->
		<?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) { ?>
			<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
			<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>//apple-touch-icon.png">
            <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/favicon-32x32.png">
            <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/favicon-16x16.png">
            <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/site.webmanifest">
	    <?php } ?>

        <!-- WP Pingbacks -->
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?

		<?php wp_head(); ?>

	</head>


