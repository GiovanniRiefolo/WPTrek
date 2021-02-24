<?php 
//  WP Trek uses wp_nav_menu() in two locations.
        register_nav_menus(
            array(
                'main' => __( 'Main Menu', 'wptrek' ),
                'footer' => __( 'Footer Menu', 'wptrek' ),
            )
        );