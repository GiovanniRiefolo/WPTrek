<?php
//  Customizer options
//  @https://developer.wordpress.org/themes/customize-api/customizer-objects/

function theme_customize_register($wp_customize)
{
    $wp_customize->add_panel(
        'theme_opt',
        array(
            'title'         => __('Ottimizzazioni tema', 'wptrek'),
            'priority'      => 205,
        )
    );
    // Critical resources
    $wp_customize->add_section(
        'critical',
        array(
            'title'         => 'Percorso risorse critiche',
            'description'   => __('Inserisci il nomi dei file delle risorse critiche.', 'wptrek'),
            'priority'      => 11,
            'panel'         => 'theme_opt',
        )
    );
    // --- critical CSS
    $wp_customize->add_setting(
        'critical_css_settings',
        array(
            'type'          => 'theme_mod',
            'capability'    => 'edit_theme_options',
            'transport'     => 'refresh',
            'priority'      => 11,
        )
    );
    $wp_customize->add_control(
        'critical_css',
        array(
            'type'          => 'text',
            'section'       => 'critical',
            'priority'      => 11,
            'label'         => __('File CSS critici', 'wptrek'),
            'description'   => __('Aggiungi il nome del file per gli stili critici contenuto nella directory <code>assets/styles.</code>. Lascia vuoto per utilizzare lo stile di default <code>theme.global.critical.css</code>', 'wptrek'),
            'settings'      => 'critical_css_settings',
        )
    );
    $wp_customize->add_setting(
        'critical_css_usage',
        array(
            'type'          => 'theme_mod',
            'capability'    => 'edit_theme_options',
            'transport'     => 'refresh',
            'priority'      => 12,
        )
    );
    $wp_customize->add_control(
        'critical_css_option',
        array(
            'type'          => 'checkbox',
            'section'       => 'critical',
            'priority'      => 11,
            'label'         => __('Abilita risorse critiche', 'wptrek'),
            'description'   => __('Abilita l\'uso degli stili critici. Il file non è autogenerato ma fornito.', 'wptrek'),
            'settings'      => 'critical_css_usage',
        )
    );

    // Posts
    $wp_customize->add_panel(
        'theme_posts',
        array(
            'title'         => __('Articoli', 'wptrek'),
            'priority'      => 210,
        )
    );

    // --- excerpt
    $wp_customize->add_section(
        'posts_excerpt_section',
        array(
            'title'         => 'Estratti articoli',
            'description'   => esc_html__('Impostazione sull\'aspetto degli estratti degli articoli', 'wptrek'),
            'priority'      => 11,
            'panel'         => 'theme_posts',
        )
    );

    // --- excerpt length
    $wp_customize->add_setting(
        'posts_excerpt_lenght',
        array(
            'type'          => 'theme_mod',
            'capability'    => 'edit_theme_options',
            'transport'     => 'refresh',
            'priority'      => 11,
        )
    );
    $wp_customize->add_control(
        'posts_excerpt_opt',
        array(
            'type'          => 'number',
            'section'       => 'posts_excerpt_section',
            'priority'      => 11,
            'label'         => esc_html__('Lunghezza dell\'estratto.', 'wptrek'),
            'description'   => esc_html__('Fornisci il numero massimo di parole da visualizzare nell\'estratto degli articoli', 'wptrek'),
            'settings'      => 'posts_excerpt_lenght',
        )
    );

    // FontAwesome
    $wp_customize->add_section(
        'fontawesome',
        array(
            'title'         => 'Font Awesome',
            'description'   => __('Load globally your FontAwesome PRO Kit', 'riefolo'),
            'priority'      => 12,
            'panel'         => 'riefolo_tools',
        )
    );
    $wp_customize->add_setting(
        'get_fontawesome',
        array(
            'type'          => 'option',
            'capability'    => 'edit_theme_options',
            'transport'     => 'refresh',
            'priority'      => 12,
        )
    );
    $wp_customize->add_control(
        'fontawesome_kit',
        array(
            'type'          => 'text',
            'section'       => 'fontawesome',
            'priority'      => 12,
            'label'         => __( 'Kit code', 'riefolo' ),
            'description'   => __( 'Add your kit code / name. You can manage your kits <a href="https://fontawesome.com/kits/" target="_blank">here</a>.', 'riefolo' ),
            'settings'      => 'get_fontawesome',
        )
    );
}
add_action('customize_register', 'theme_customize_register');

//  You don't really need it
function theme_remove_css_section($wp_customize)
{
    $wp_customize->remove_section('custom_css');
}
add_action('customize_register', 'theme_remove_css_section', 15);
