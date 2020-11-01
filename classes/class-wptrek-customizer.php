<?php 

function wptrek_customize_register( $wp_customize ) {

    // Marketing Stuffs ---------------------------- //
    $wp_customize->add_panel(
        'wptrek_marketing',
        array(
            'title'         => __( 'Marketing', 'wptrek' ),
            'priority'      => 200
        )
    );
    $wp_customize->add_section(
        'wptrek_marketing_scripts',
        array(
            'title'         => 'Scripts',
            'description'   => __('Add your scripts here.', 'wptrek'),
            'panel'         => 'wptrek_marketing',
        )
        
    );
    $wp_customize->add_setting(
        'google_tag_snippet',
        array(
            'type'          => 'option',
            'capability'    => 'edit_theme_options',
            'transport'     => 'refresh',
        )
    );
    $wp_customize->add_control(
        'google_tag',
        array(
            'type'          => 'textarea',
            'section'       => 'wptrek_marketing_scripts',
            'priority'      => 10,
            'label'         => __( 'Google Tag', 'wptrek' ),
            'description'   => __( 'Add your Google Tag code here.', 'wptrek' ),
            'settings'      => 'google_tag_snippet'
        )
    );
    $wp_customize->add_setting(
        'fb_pixel_snippet',
        array(
            'type'          => 'option',
            'capability'    => 'edit_theme_options',
            'transport'     => 'refresh',
        )
    );
    $wp_customize->add_control(
        'fb_pixel',
        array(
            'type'          => 'textarea',
            'section'       => 'wptrek_marketing_scripts',
            'priority'      => 11,
            'label'         => __( 'Facebook Pixel', 'wptrek' ),
            'description'   => __( 'Add your Facebook Pixel code here.', 'wptrek' ),
            'settings'      => 'fb_pixel_snippet'
        )
    );


    // Global Animations ---------------------------- //
    $wp_customize->add_panel(
        'wptrek_libraries',
        array(
            'title'         => __( 'Animations', 'wptrek' ),
            'priority'      => 205
        )
    );
    $wp_customize->add_section(
        'libraries',
        array(
            'title'         => 'Libraries',
            'description'   => __('Activate / deactivate js animation libraries.', 'wptrek'),
            'panel'         => 'wptrek_libraries',
        ) 
    );
    $wp_customize->add_setting(
        'fullpage_settings',
        array(
            'type'          => 'theme_mod',
            'capability'    => 'edit_theme_options',
            'transport'     => 'refresh',
        )
    );
    $wp_customize->add_control(
        'fullpage',
        array(
            'type'          => 'checkbox',
            'section'       => 'libraries',
            'priority'      => 10,
            'label'         => __( 'FullPage', 'wptrek' ),
            'description'   => __( 'Use fullpage to scroll entire content sections. More info at ', 'wptrek' ) . ('<a href="https://alvarotrigo.com/fullPage" target="_blank">FullPage JS official page</a>'),
            'settings'      => 'fullpage_settings'
        )
    );

}
add_action( 'customize_register', 'wptrek_customize_register' );

  // You don't really need it
function wptrek_remove_css_section( $wp_customize ) {	
	$wp_customize->remove_section( 'custom_css' );
}
add_action( 'customize_register', 'wptrek_remove_css_section', 15 );