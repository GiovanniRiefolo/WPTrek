<?php
//  Customizer options
//  @https://developer.wordpress.org/themes/customize-api/customizer-objects/

function theme_customize_register($wp_customize)
{
    $wp_customize->add_panel(
        'theme_opt',
        array(
            'title'         => __('Ottimizzazioni tema', 'wptrek'),
            'priority'      => 205
        )
    );
    // Critical resources
    $wp_customize->add_section(
        'critical',
        array(
            'title'         => 'Percorso risorse critiche',
            'description'   => __('Inserisci il nomi dei file delle risorse critiche.', 'wptrek'),
            'priority'      => 11,
            'panel'         => 'theme_opt'
        )
    );
    // --- critical CSS
    $wp_customize->add_setting(
        'critical_css_settings',
        array(
            'type'          => 'theme_mod',
            'capability'    => 'edit_theme_options',
            'transport'     => 'refresh',
            'priority'      => 11
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
            'settings'      => 'critical_css_settings'
        )
    );
    $wp_customize->add_setting(
        'critical_css_usage',
        array(
            'type'          => 'theme_mod',
            'capability'    => 'edit_theme_options',
            'transport'     => 'refresh',
            'priority'      => 12
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
            'settings'      => 'critical_css_usage'
        )
    );

    // Posts
    $wp_customize->add_panel(
        'theme_posts',
        array(
            'title'         => __('Articoli', 'wptrek'),
            'priority'      => 210
        )
    );

    // --- excerpt
    $wp_customize->add_section(
        'posts_excerpt_section',
        array(
            'title'         => 'Estratti articoli',
            'description'   => esc_html__('Impostazione sull\'aspetto degli estratti degli articoli', 'wptrek'),
            'priority'      => 11,
            'panel'         => 'theme_posts'
        )
    );

    // --- excerpt length
    $wp_customize->add_setting(
        'posts_excerpt_lenght',
        array(
            'type'          => 'theme_mod',
            'capability'    => 'edit_theme_options',
            'transport'     => 'refresh',
            'priority'      => 11
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
            'settings'      => 'posts_excerpt_lenght'
        )
    );

    // Tipography
    $wp_customize->add_panel(
        'theme_typo',
        array(
            'title'         => __('Tipografia', 'wptrek'),
            'priority'      => 305
        )
    );

    for ($h = 1; $h < 7; $h++) {

        $wp_customize->add_section(
            'theme_h' . $h . '_section',
            array(
                'title'         => esc_html('H' . $h),
                'description'   => __('Imposta le i valori di default per i titoli H' . $h . '.', 'wptrek'),
                'priority'      => 11,
                'panel'         => 'theme_typo'
            )
        );
        // --- desktop size
        $wp_customize->add_setting(
            'theme_h' . $h . '_size',
            array(
                'type'          => 'theme_mod',
                'capability'    => 'edit_theme_options',
                'transport'     => 'refresh',
                'priority'      => 11
            )
        );
        $wp_customize->add_control(
            'theme_h' . $h . '_size_opt',
            array(
                'type'          => 'number',
                'section'       => 'theme_h' . $h . '_section',
                'priority'      => 11,
                'label'         => esc_html__('desktop size', 'wptrek'),
                'description'   => esc_html__('Dimensione titolo H' . $h . '.', 'wptrek'),
                'settings'      => 'theme_h' . $h . '_size'
            )
        );
        // --- smartphone size
        $wp_customize->add_setting(
            'theme_h' . $h . '_small_size',
            array(
                'type'          => 'theme_mod',
                'capability'    => 'edit_theme_options',
                'transport'     => 'refresh',
                'priority'      => 11
            )
        );
        $wp_customize->add_control(
            'theme_h' . $h . '_small_size_opt',
            array(
                'type'          => 'number',
                'section'       => 'theme_h' . $h . '_section',
                'priority'      => 11,
                'label'         => esc_html__('smartphone size', 'wptrek'),
                'description'   => esc_html__('Dimensione titolo H' . $h . '.', 'wptrek'),
                'settings'      => 'theme_h' . $h . '_small_size'
            )
        );
        // --- desktop line-height
        $wp_customize->add_setting(
            'theme_h' . $h . '_lheight',
            array(
                'type'          => 'theme_mod',
                'capability'    => 'edit_theme_options',
                'transport'     => 'refresh',
                'priority'      => 12
            )
        );
        $wp_customize->add_control(
            'theme_h' . $h . '_lheight_opt',
            array(
                'type'          => 'number',
                'section'       => 'theme_h' . $h . '_section',
                'priority'      => 12,
                'label'         => esc_html__('desktop line-height', 'wptrek'),
                'description'   => esc_html__('Interlinea titolo H' . $h . '.', 'wptrek'),
                'settings'      => 'theme_h' . $h . '_lheight'
            )
        );
        // --- smartphone line-height
        $wp_customize->add_setting(
            'theme_h' . $h . '_small_lheight',
            array(
                'type'          => 'theme_mod',
                'capability'    => 'edit_theme_options',
                'transport'     => 'refresh',
                'priority'      => 12
            )
        );
        $wp_customize->add_control(
            'theme_h' . $h . '_small_lheight_opt',
            array(
                'type'          => 'number',
                'section'       => 'theme_h' . $h . '_section',
                'priority'      => 12,
                'label'         => esc_html__('smartphone line-height', 'wptrek'),
                'description'   => esc_html__('Interlinea titolo H' . $h . '.', 'wptrek'),
                'settings'      => 'theme_h' . $h . '_small_lheight'
            )
        );
        // --- top margin
        $wp_customize->add_setting(
            'theme_h' . $h . '_mtop',
            array(
                'type'          => 'theme_mod',
                'capability'    => 'edit_theme_options',
                'transport'     => 'refresh',
                'priority'      => 13
            )
        );
        $wp_customize->add_control(
            'theme_h' . $h . '_mtop_opt',
            array(
                'type'          => 'number',
                'section'       => 'theme_h' . $h . '_section',
                'priority'      => 13,
                'label'         => esc_html__('top margin', 'wptrek'),
                'description'   => esc_html__('top margin per i titoli H' . $h . '.', 'wptrek'),
                'settings'      => 'theme_h' . $h . '_mtop'
            )
        );
        // --- bottom margin
        $wp_customize->add_setting(
            'theme_h' . $h . '_mbottom',
            array(
                'type'          => 'theme_mod',
                'capability'    => 'edit_theme_options',
                'transport'     => 'refresh',
                'priority'      => 13
            )
        );
        $wp_customize->add_control(
            'theme_h' . $h . '_mbottom_opt',
            array(
                'type'          => 'number',
                'section'       => 'theme_h' . $h . '_section',
                'priority'      => 13,
                'label'         => esc_html__('bottom margin', 'wptrek'),
                'description'   => esc_html__('bottom margin per i titoli H' . $h . '.', 'wptrek'),
                'settings'      => 'theme_h' . $h . '_mbottom'
            )
        );
    }
}
add_action('customize_register', 'theme_customize_register');

// This theme won't allow custom CSS
function theme_remove_css_section($wp_customize)
{
    $wp_customize->remove_section('custom_css');
}
add_action('customize_register', 'theme_remove_css_section', 15);
